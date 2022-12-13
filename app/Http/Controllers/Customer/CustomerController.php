<?php
namespace App\Http\Controllers\Customer;

use App\Models\Customer\Customer;

use App\Models\Customer\CustomerTour;
use App\Models\Loyalty\Loyalty;
use App\Models\Package\Package;
use App\Models\Tour\Tour;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Flash;
use DB;
use Redirect;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     */
    public function index()
    {

        $Customers = Customer::all()->where('terminated', '=', '0');
        return view('admin.customer.index', compact('Customers'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        //get package details
        $packages = Package::where('terminated', 0)->pluck('name', 'id');
        $packagesAll = Package::all();

        //get loyalty Details
        $loyalty = Loyalty::all()->pluck('type', 'id');

        // return view.blade
        return view('admin.customer.create', compact('packages', 'loyalty', 'packagesAll'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        //Functional Validation
        $this->validate($request, [
            'tour' => 'required',
            'tourDate' => 'required',
            'fname' => 'required|min:3|max:20',
            'sname' => 'required|min:3|max:20',
            'lname' => 'required|min:3|max:20',
            'dob' => 'required|before:now',
            'gender' => 'required',
            'number' => 'required',
            'nic' => 'required|regex:/^[0-9]{9}[vVxX]$/|unique:customers,nic',
            'passport' => 'required',
            'address' => 'required|min:10|max:255',
            'payment' => 'required|numeric',
            'loyalty' => 'required'
        ]);

        $dateofBirth = Carbon::parse($request->dob)->diffInYears(Carbon::now(), false);

        //get tour customer allocation
        $customerCount = Tour::where('id', $request->tourDate)->first()->coustomer_count;

        //validate tour count
        if ($customerCount >= 40) {
            Flash::success("Maximum number of customers already allocated !");
            return Redirect::back();
            dd('count greater than 40');
        }

        //get package Price
        $price = Package::where('id', $request->tour)->first()->price;
        //get loyalty discount
        $discount = Loyalty::where('id', $request->loyalty)->first()->discount;
        //generate Discount Amount
        $discountAmount = $this->discountGenerator($price, $discount);

        //store values to customer table
        $customer = Customer::create([
            'fname' => $request->fname,
            'sname' => $request->sname,
            'lname' => $request->lname,
            'otherName' => $request->otherName,
            'age' => $dateofBirth,
            'dob' => $request->dob,
            'gender' => $request->gender,
            'number' => $request->number,
            'address' => $request->address,
            'nic' => $request->nic,
            'passport' => $request->passport,
            'loyalty_id' => $request->loyalty,
            'tour' => '1'
        ]);

        //insert customer id and tour id customer_tour table
        DB::table('customer_tour')
            ->insert([
                'customer_id' => $customer->id,
                'tour_id' => $request->tourDate
            ]);

        //insert value customer payment
        DB::table('customer_payment')
            ->insert([
                'tour_id' => $request->tourDate,
                'customer_id' => $customer->id,
                'advance' => $request->payment,
                'total'=>$discountAmount
            ]);

        //update tour table
        $customerCount = $customerCount + 1;
        DB::table('tours')
            ->where('id', $request->tourDate)
            ->update(['coustomer_count' => $customerCount]);


        return \Redirect::to('/system/customer');

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customers = Customer::findOrFail($id);
        //get customer tours
        $customerTours = CustomerTour::where('customer_id', $id)->get();
        //result compact to view
        return view('admin.customer.view', compact('customers', 'customerTours'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //get the customer details
        $customer = Customer::find($id);
        //get package details
        $packages = Package::pluck('name', 'id');
        $loyalty = Loyalty::pluck('type', 'id');
        //$tours= Tour::where('id','>', 0)->pluck('departure','id');
        //return view
        return view('admin.customer.edit', compact('customer', 'packages', 'loyalty'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'otherName' => 'required|min:3|max:15',
            'number' => 'required|numeric',
            'address' => 'required|min:10|max:255',
        ]);

        //get customer model

        $customer = Customer::findOrFail($id);
        $customer->otherName = $request->otherName;
        $customer->number = $request->number;
        $customer->address = $request->address;


        // save and exit
        if ($customer->save()) {
            Flash::success("Changes updated !");
        }

        // return to the original page
        return Redirect::back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        //get Customer
        $customer = Customer::findOrFail($id);

        if ($customer->delete()) {
            Flash::success('Customer Permanently Deleted ');
        } else {
            Flash::error('Fail Delete Customer');
        }
    }

    /**
     * Veiw List of customers with edit links.
     */
    public function view($id)
    {

        //get customer details
        $customers = Customer::findOrFail($id);
        //get customer tours
        $customerTours = CustomerTour::where('customer_id', $id)->get();
        //result compact to view
        return view('admin.customer.view', compact('customers', 'customerTours'));

    }

    public  function viewAll(){

        $Customers = Customer::all()->where('terminated', '=', '0');

        return view('admin.customer.all', compact('Customers'));
    }

    /**
     *Terminated Customer
     **/
    public function terminate($id)
    {

        $Status = DB::table('customers')->where('id', $id)->update(['terminated' => 1]);
        if ($Status) {
            Flash::success('Customer Deleted');
        } else {
            Flash::error('Error Customer deletion');
        }
        return Redirect::back();

    }

    /**
     * undo customer terminate
     * */
    public function undoterminate($id)
    {

        $Status = DB::table('customers')->where('id', $id)->update(['terminated' => 0]);
        if ($Status) {
            Flash::success('Customer Deleted');
        } else {
            Flash::error('Error Customer deletion');
        }
        return Redirect::back();

    }

    /**
     *Customer View Search
     * @param Request $request
     */
    public function search(Request $request)
    {
        dd($request);
    }

    public function newTourCreate($id)
    {
        $customersDetails = Customer::findOrFail($id);
        //get package details
        $packages = Package::where('terminated', 0)->pluck('name', 'id');

        $packagesAll = Package::all();

        $customerTours = CustomerTour::where('customer_id', $id)->get();

        return view('admin.customer.another_tour.create', compact('packages','id','customersDetails', 'packagesAll','customerTours'));
    }

    public function postNewTour(Request $request, $id)
    {
        $this->validate($request, [
            'tour' => 'required',
            'tourDate' => 'required',
            'payment'=>'required|numeric'
        ]);

        //get package Price
        $price = Package::where('id', $request->tour)->first()->price;
        $loyality=Customer::findOrFail($id);
        //get loyalty discount
        $discount = Loyalty::where('id', $loyality->loyalty_id)->first()->discount;
        //generate Discount Amount
        $discountAmount = $this->discountGenerator($price, $discount);

        //get tour customer allocation
        $customerCount = Tour::where('id', $request->tourDate)->first()->coustomer_count;

        //validate tour count
        if ($customerCount >= 40) {
            Flash::success("Maximum number of customers already allocated !");
            return Redirect::back();
            dd('count greater than 40');
        }


        DB::table('customer_tour')
            ->insert([
                'customer_id' => $id,
                'tour_id' => $request->tourDate
            ]);

        //insert value customer payment
        DB::table('customer_payment')
            ->insert([
                'tour_id' => $request->tourDate,
                'customer_id' => $id,
                'advance' => $request->payment,
                'total'=>$discountAmount
            ]);

        //update tour table
        $customerCount = $customerCount + 1;
        DB::table('tours')
            ->where('id', $request->tourDate)
            ->update(['coustomer_count' => $customerCount]);


        return \Redirect::to('/system/customer');
    }

    /**
     * @param $value
     * @param $discount
     */
    public function discountGenerator($value, $discount)
    {
        $x = ($value * $discount) / 100;
        return $value - $x;

    }

    public function NewTourStore(Request $request){

    }
}
