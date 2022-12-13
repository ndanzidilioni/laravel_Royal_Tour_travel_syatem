<?php

namespace App\Http\Controllers\Tour\manage;

use App\Http\Controllers\Controller;
use App\Models\Employee\EmployeeType;
use App\Models\Package\Package;
use App\Models\Tour\Hotel;
use App\Models\Tour\Tour;
use Flash;
use Illuminate\Http\Request;
use Redirect;

class TourManageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tours = Tour::with('package')->get();

        return view('admin.tour.tour.index', compact('tours'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $packages = Package::pluck('name', 'id');

        $hotels = Hotel::pluck('name','id');

        $guides = EmployeeType::with('employees')->where('name', 'guide')->first()->employees->pluck('name', 'id');

        return view('admin.tour.tour.create', compact('packages', 'hotels', 'guides'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:3|max:50',
            'arrival' => 'required',
            'departure' => 'required',
            'arrival_time' => 'required',
            'departure_time' => 'required',
            'description' => 'required|min:10|max:1000',
            'package' => 'required',
            'hotel.*' =>'required',
            'guide.*' => 'required'

        ]);


        $tour = Tour::create([
            'name' => $request->name,
            'arrival' => $request->arrival,
            'arrival_time' => $request->arrival_time,
            'departure' => $request->departure,
            'departure_time' => $request->departure_time,
            'description' => $request->description,
            'package_id' => $request->package,
        ]);

        $tour->guides()->sync($request->guide);

        $tour->hotels()->sync($request->hotel);

        Flash::success("Tour added successfully");

        return Redirect::to('/system/tour/manage/');

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tour = Tour::find($id);

        return view('admin.tour.tour.view', compact('tour'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tour = Tour::findOrFail($id);

        $packages = Package::pluck('name', 'id');

        $hotels = Hotel::pluck('name', 'id');

        $guides = EmployeeType::with('employees')->where('name', 'guide')->first()->employees->pluck('name', 'id');

        return view('admin.tour.tour.edit', compact('tour', 'packages', 'hotels', 'guides'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $tours = Tour::findOrFail($id);

        $tours->arrival = $request->arrival;
        $tours->departure = $request->departure;
        $tours->arrival_time = $request->arrival_time;
        $tours->departure_time = $request->departure_time;

        $tours->guides($request->guide);

        $tours->hotels($request->hotels);

        if ($tours->save()) {
            Flash::success("Changes updated !");
        }

        return Redirect::to('/system/tour/manage/'.$tours->id);

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
}
