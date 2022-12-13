<?php

namespace App\Http\Controllers\Employee;

use App\Models\Employee\OverTimeType;
use Flash;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Redirect;

class OverTimeTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $overtimes = OverTimeType::all();

        return view('admin.employee.ot.index', compact('overtimes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.employee.ot.create');
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
            'name' => 'required',
            'rate' => 'required'
        ]);

        OverTimeType::create([
            'name' => $request->name,
            'rate' => $request->rate,
        ]);


        Flash::success('Successfully added a OT Type');

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
        $overtime = OverTimeType::findOrFail($id);

        return view('admin.employee.ot.edit', compact('overtime'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $overtime = OverTimeType::findOrFail($id);

        return view('admin.employee.ot.edit', compact('overtime'));
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
        OverTimeType::create([
            'name' => $request->name,
            'rate' => $request->rate,
        ]);

        $overtime = OverTimeType::findOrFail($id);

        $overtime->name = $request->name;
        $overtime->rate = $request->rate;

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
