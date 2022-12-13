<?php

namespace App\Http\Controllers\Advertisements;

use App\Http\Requests\AdTypeRequest;
use App\Models\Advertisements\AdvertisementType;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Redirect;

class AdvertisementTypesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $types = AdvertisementType::all();


        return view('admin.advertisements.advertisementtypes.index', compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.advertisements.advertisementtypes.create');
    }

//    /**
//     * Store a newly created resource in storage.
//     *
//     * @param  \Illuminate\Http\Request $request
//     * @return \Illuminate\Http\Response
//     */
    public function store(AdTypeRequest $request)
    {

        AdvertisementType::create($request->all());

        return Redirect::to('/system/advertisements/types');



    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $type = AdvertisementType::findOrFail($id);

        return view('admin.advertisements.advertisementtypes.show', compact('type'));

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
        $type = AdvertisementType::findOrFail($id);

        return view('admin.advertisements.advertisementtypes.edit', compact('type'));
    }

//    /**
//     * Update the specified resource in storage.
//     *
//     * @param  \Illuminate\Http\Request $request
//     * @param  int $id
//     * @return \Illuminate\Http\Response
//     */
    public function update(Request $request, $id)
    {
        //
        $type = AdvertisementType::findOrFail($id);

        $type->name = $request->name;

        $type->description = $request->description;

        $type->save();

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
        //
    }

}
