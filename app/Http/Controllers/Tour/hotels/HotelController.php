<?php

namespace App\Http\Controllers\Tour\hotels;

use App\Http\Controllers\Controller;
use App\Models\Tour\Hotel;
use Flash;
use Illuminate\Http\Request;
use Redirect;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hotels = Hotel::all();

        return view('admin.tour.hotels.index', compact('hotels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tour.hotels.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //dd($request);
        $this->validate($request,[
            'name' => 'required|min:3|max:50',
            'phone'=> 'required|min:5|max:50',
            'email'=>'required|min:3|max:50|email',
            'city'=>'required|min:3|max:50',
            'expenses'=>'required|min:3|max:50'
        ]);


        Hotel::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'city'  => $request->city,
            'expenses' => $request->expenses
        ]);

        Flash::success("Hotel added successfully");

        return Redirect::to('/system/tour/hotels');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $hotel = Hotel::find($id);

        return view('admin.tour.hotels.view', compact('hotel'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $hotel = Hotel::findOrFail($id);

        return view('admin.tour.hotels.edit', compact('hotel'));
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
        $hotel = Hotel::findOrFail($id);

        //$hotel->name = $request->name;
        $hotel->phone= $request->phone;
        //$hotel->email= $request->email;
        //$hotel->city = $request->city;
        $hotel->expenses = $request ->expenses;

        if ($hotel->save ()) {
            Flash::success("Changes updated !");
        }

       return Redirect::to('/system/tour/hotels');

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
