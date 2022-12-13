<?php

namespace App\Http\Controllers\Package;

use App\Models\Package\Package;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Flash;
use Redirect;
use Illuminate\Support\Facades\DB;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $packages = Package::all()->where('terminated', '=', '0');
        //Package Home Redirection
        return view('admin.package.index', compact('packages'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.package.create');
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
            'code' => 'required|numeric|min:3|unique:package,code',
            'name' => 'required|min:5|max:20',
            'country' => 'required|max:50',
            'destination' => 'required|min:3',
            'days' => 'required|numeric|min:1',
            'price' => 'required|numeric|min:1'
        ]);

        $package = Package::create([
            'code' => $request->code,
            'name' => $request->name,
            'country' => $request->country,
            'destination' => $request->destination,
            'days' => $request->days,
            'price' => $request->price,
            'description' => $request->description
        ]);

        return Redirect::to('/system/package/days/'.$package->id.'/create');
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
        $package = Package::find($id);

        return view('admin.package.edit', compact('package'));
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
            'code' => 'required|numeric',
            'name' => 'required|min:1|max:20',
            'country' => 'required|min:1|max:50',
            'destination' => 'required|min:5',
            'days' => 'required|numeric|min:1',
            'price' => 'required|numeric|min:1'
        ]);

        $package = Package::findOrFail($id);

        $package->code = $request->code;
        $package->name = $request->name;
        $package->country = $request->country;
        $package->destination = $request->destination;
        $package->days = $request->days;
        $package->price = $request->price;
        $package->description = $request->description;

        // save and exit
        if ($package->save()) {
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
        //
    }

    //termiate package

    public function terminate($id)
    {
        //delete temporally by set package teminated atribute to true
        $success = DB::table('package')->where('id', $id)->update(['terminated' => 1]);
        //if success return true flash message to redirect page
        if ($success) {
            Flash::success('Package Successfully Deleted');
        } else {
            Flash::error('Error Package deletion');
        }
        return Redirect::back();

    }
}
