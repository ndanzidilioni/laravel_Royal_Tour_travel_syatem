<?php

namespace App\Http\Controllers\Ticket;

use App\Models\Agent\Agent;
use App\Models\Customer\Customer;
use App\Models\Customer\CustomerTicket;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Flash;
use Redirect;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tickets=CustomerTicket::all();
        return view('admin.ticket.index',compact('tickets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $agents = Agent::where('terminated', 0)->pluck('name', 'id');

        return view('admin.ticket.create', compact('agents'));
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
            'fname' => 'required|min:3|max:20',
            'sname' => 'required|min:3|max:20',
            'lname' => 'required|min:3|max:20',
            'contact' => 'required',
            'nic' => 'required|regex:/^[0-9]{9}[vVxX]$/|unique:customers,nic',
            'from' => 'required',
            'to' => 'required',
            'departure' => 'required|after:now',
            'quantity' => 'required|numeric',
            'agent' => 'required',
            'amount' => 'required|numeric'
        ]);

        //enter into customer table

        $customer = Customer::create(
            [
                'fname' => $request->fname,
                'sname' => $request->sname,
                'lname' => $request->lname,
                'otherName' => $request->otherName,
                'number' => $request->contact,
                'nic' => $request->nic,
                'loyalty_id' => 1,
                'rental' => 1,
            ]
        );

        //enter data into ticket table
        $currentDate = Carbon::today()->toDateString();

        //add value in to customer tickets table
        $ticket = CustomerTicket::create(
            [
                'customer_id' => $customer->id,
                'agent_id' => $request->agent,
                'from' => $request->from,
                'to' => $request->to,
                'departure' => $request->departure,
                'class' => $request->class,
                'qty' => $request->quantity,
                'note' => $request->note,
                'amount' => $request->amount,
                'create' => $currentDate
            ]
        );

        // save and exit
        if ($customer->save() && $ticket->save()) {
            Flash::success("New Order created !");
        } else {
            Flash::error("Some error , Please try again !");
        }

        // return to the original page
        return Redirect::back();


    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /*
     * Allocated exiting customer
     * */

    public function allocate($id){

        dd($id);
    }

    public function all(){
        $tickets=CustomerTicket::all();
        return view('admin.ticket.view',compact('tickets'));
    }
}
