<?php

namespace App\Http\Controllers\Advertisements;

use App\Http\Requests\AdCreateRequest;
use App\Models\Advertisements\Advertisements;
use App\Models\Advertisements\AdvertisementType;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Redirect;
use Storage;
use Image;
use Imagine\Gd\Imagine;



class AdvertisingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $advertisements = Advertisements::all();

        return view('admin.advertisements.index', compact('advertisements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $type_id = AdvertisementType::pluck('name', 'id');

        return view('admin.advertisements.create', compact('type_id'));
    }

//    /**
//     * Store a newly created resource in storage.
//     *
//     * @param  \Illuminate\Http\Request $request
//     * @return \Illuminate\Http\Response
//     */
    public function store(AdCreateRequest $request)
    {


        Advertisements::create($request->all());

        if($request->hasFile('file')){

            $file = $request->file('file');
            $file->move('uploads', $file->getClientOriginalName());
            $fileName = $file->getClientOriginalName();
            $destinationPath = config('app.fileDestinationPath').'/'.$fileName;
            $uploaded = Storage::put($destinationPath, file_get_contents($file->getRealPath()));

            if($uploaded){

            }



        }

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
        $advertisement = Advertisements::findOrFail($id);


        return view('admin.advertisements.show', compact('advertisement'));

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
        $ad = Advertisements::findOrFail($id);

        $type_id = AdvertisementType::pluck('name', 'id');

        return view('admin.advertisements.edit', compact('ad', 'type_id'));
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
        $ad = Advertisements::findOrFail($id);


        $ad->name = $request->name;

        $ad->expense = $request->expense;

        $ad->type_id = $request->type_id;

        if($request->hasFile('file')){

////            $file = $request->file('file');
//
//            $fileName = $file->getClientOriginalName();
//            $destinationPath = config('app.fileDestinationPath').'/'.$fileName;
//            $file = Input::file('file')->move($destinationPath, $fileName);
//            $uploaded = Storage::put($destinationPath, file_get_contents($file->getRealPath()));
//
//
//
//            if($uploaded){
//
//            }






        }

        $ad->save();

        return Redirect::to('/system/advertisements');

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

//    public function upload(Request $request){
//        $file = $request->file('file');
//
//        echo 'File Name: '.$file->getClientOriginalName();
//        echo '<br>';
//
//        echo 'File Extension: '.$file->getClientOriginalExtension();
//        echo '<br>';
//
//
//        echo 'File Real Path: '.$file->getRealPath();
//        echo '<br>';
//
//
//        echo 'File Size: '.$file->getSize();
//        echo '<br>';
//
//
//        //  echo 'File Mime Type: '.$file->getMimeType();
//
//        //Move uploaded file
//        $destinationPath = 'uploads';
//        $file->move($destinationPath,$file->getClientOriginalName());
//    }

}
