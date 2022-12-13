<?php

namespace App\Http\Controllers\Loyalty;

use App\Models\Loyalty\Loyalty;
use DB;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Flash;
use Redirect;

class LoyaltyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $loyalties = Loyalty::where('terminated',0)->get();
        return view('admin.loyalty.index',compact('loyalties'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.loyalty.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'type'=>'required|min:3|max:20',
            'description'=>'required|min:3|max:20',
            'discount'=>'required|numeric|min:0|max:100'
        ]);

        $loyalty = Loyalty::create([
            'type' => $request->type,
            'description' => $request->description,
            'discount' => $request->discount,
        ]);

        return \Redirect::to('/system/loyalty');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $loyalty=Loyalty::find($id);

        return view('admin.loyalty.edit',compact('loyalty'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'type'=>'required|min:3|max:20',
            'description'=>'required|min:3|max:20',
            'discount'=>'required|numeric|min:0|max:100'
        ]);

        $Loyalty = Loyalty::findOrFail($id);

        $Loyalty->type = $request->type;
        $Loyalty->description=$request->description;
        $Loyalty->discount=$request->discount;


        //boolean if need :


        // save and exit
        if ($Loyalty->save()) {
            Flash::success("Changes updated !");
        }

        // return to the original page
        return Redirect::back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function terminate($id)
    {
        $Status = DB::table('loyalty')->where('id', $id)->update(['terminated' => 1]);
        if ($Status) {
            Flash::success('Loyalty Deleted');
        } else {
            Flash::error('Loyalty Customer deletion');
        }
        return Redirect::back();

    }

    public function view()
    {
        $loyalties = Loyalty::all()->where('terminated', '=', '0');
        return view('admin.loyalty.view', compact('loyalties'));
    }

}
