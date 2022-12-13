<?php

namespace App\Http\Controllers\rental;

use App\Models\Employee\EmployeeTravelType;
use App\Models\Employee\EmployeeType;
use App\User;

use Flash;
use App\Http\Controllers\Controller;
use Redirect;
use Illuminate\Http\Request;

class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        
        $users = EmployeeType::with('employees')->where('name', 'driver')->first()->employees;

        return view('admin.rental.driver.index', compact('users'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.rental.driver.create');
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

        // validate the request object
        $this->validate($request, [

            'name' => 'required|min:3|max:15',
            'lastname' => 'required|min:3|max:15',
            'email' => 'required|email',
            'password' => 'required|min:3|max:20',
            'nic' => 'required|regex:/^[0-9]{9}[vVxX]$/',
            'dob' => 'required|date',
            'address'=>'required|min:5|max:100',
            'basic'=>'required|min:1|max:10',

        ]);
      
        // Driver object
        $driver = User::create([
            'name' => $request->name,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'age' => $request->dob,
            'password' => bcrypt($request->passsword),
            'nic' => $request->nic,
            'basic' => (double)$request->basic,
            'address' => $request -> address,
           // 'terminated' => ($request->has('terminated')) ? 1 : 0,
            
        ]);

        //passing a row to many to many table
        \DB::table('employee_type_user')->insert(
            ['employee_type_id'=>5 , 'user_id'=> $driver->id]
        );

        // \DB::raw("insert into employee_type_user (employee_type_id, user_id) values (5, $driver->id)");

        // Sends a success message
        Flash::success("Driver Added Successfully !");

        // return to a url
        return Redirect::to('/system/rental/driver');
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
        $driver = User::findOrFail($id);

        return view('admin.rental.driver.edit', compact('driver'));
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
        //dd($request);
        // validate the request object
        $this->validate($request, [

           // 'name' => 'required|min:3|max:15',
            'lastname' => 'required|min:5|max:15',
            'email' => 'required|max:50',
            'basic' => 'required',
            'nic' => 'required|min:10|max:10',
          //  'age' => 'required|min:2|max:2',

        ]);

        $user = User::findOrFail($id);

       // $user->name = $request->name;
        $user->lastname = $request->lastname;
        $user->email = $request->email;
      //  $user->age = $request->age;
        $user->address = $request->address;
        $user->password = $request->password;
        $user->nic = $request->nic;
        $user->basic = $request->basic;
        $user->terminated = ($request->has('terminated')) ? 1 : 0;

        if($user->save()) {
            Flash::success("Driver Details updated successfully");
        } else {
            Flash::error("An Error occured !");
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
