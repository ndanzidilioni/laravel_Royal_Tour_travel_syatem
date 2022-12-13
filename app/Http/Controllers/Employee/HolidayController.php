<?php

namespace App\Http\Controllers\Employee;

use App\Models\Employee\OverTimeType;
use App\Models\General\Holidays;
use Flash;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Redirect;

class HolidayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $holidays = Holidays::all();

        return view('admin.employee.holidays.index', compact('holidays'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = OverTimeType::pluck('name', 'id')->all();

        return view('admin.employee.holidays.create', compact('types'));
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
            'ottype' => 'required',
            'start_day' => 'required|after:today',
            'end_day' => 'required|after:today'
        ]);

        Holidays::create([
            'overtime_type' => $request->ottype,
            'start_day' => $request->start_day,
            'end_day' => $request->end_day
        ]);

        Flash::success('Holiday added successfully !');

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
        $holiday = Holidays::findOrFail($id);

        $types = OverTimeType::pluck('name', 'id')->all();

        return view('admin.employee.holidays.edit', compact('holiday', 'types'));
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
        $holiday = Holidays::findOrFail($id);

        $holiday->overtime_type = $request->ottype;
        $holiday->start_day = $request->start_day;
        $holiday->end_day = $request->end_day;

        if($holiday->save()) {
            Flash::success('Holiday updated successfully');
        } else {
            Flash::error('Update Failed');
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
