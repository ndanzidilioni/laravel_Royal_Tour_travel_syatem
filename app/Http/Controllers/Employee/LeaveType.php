<?php

namespace App\Http\Controllers\Employee;

use App\Models\Employee\LeaveTypes;
use Flash;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Redirect;

class LeaveType extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $leavetypes = LeaveTypes::all();

        return view('admin.employee.leavetype.index', compact('leavetypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.employee.leavetype.create');
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
            'name' => 'required'
        ]);

        LeaveTypes::create([
            'name' => $request->name
        ]);

        Flash::success('Leave Type Added Succesffuly !');

        return Redirect::back();

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
        $leavetype = LeaveTypes::findOrFail($id);

        return view('admin.employee.leavetype.edit', compact('leavetype'));
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
        $leavetype = LeaveTypes::findOrFail($id);

        $this->validate($request, [
            'name' => 'required'
        ]);

        $leavetype->name = $request->name;

        if($leavetype->save()) {
            Flash::success("Leave Type updated Successfully !");
        } else {
            Flash::error('Could not update the leave type');
        }

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
}
