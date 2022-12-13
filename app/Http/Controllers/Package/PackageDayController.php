<?php

namespace App\Http\Controllers\Package;

use App\Models\Package\Package;
use App\Models\Package\PackageDay;
use Flash;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Redirect;

class PackageDayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($package)
    {
        $pkg = Package::findOrFail($package);

        return view('admin.package.days.index', compact('pkg'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($package)
    {
        return view('admin.package.days.create', compact('package'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $package)
    {
        $this->validate($request, [
            'day' => 'required',
            'description' => 'required'
        ]);

        PackageDay::create([
            'package_id' => $package,
            'day' => $request->day,
            'description' => $request->description
        ]);

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
    public function edit($package, $id)
    {
        $day = PackageDay::findOrFail($id);

        return view('admin.package.days.edit', compact('package', 'day'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $package, $id)
    {
        $day = PackageDay::findOrFail($id);

        $day->day = $request->day;
        $day->description = $request->description;

        if($day->save()) {
            Flash::success("Day updated !");
        } else {
            Flash::error("Day could not be updated !");
        }

        return Redirect::action('Package\PackageController@index');

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
