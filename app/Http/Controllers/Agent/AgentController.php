<?php

namespace App\Http\Controllers\Agent;

use App\Models\Agent\Agent;
use Illuminate\Http\Request;
use Flash;
use Redirect;
use DB;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AgentController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        $agent = Agent::all()->where('terminated', '=', '0');
        return view('admin.agent.index',compact('agent'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function create()
    {
        return view('admin.agent.create');
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
            'registeredNo'=>'required|numeric|unique:agent,registered',
            'name' => 'required|min:3|max:15',
            'number' => 'required|numeric',
            'email'=>'required'
        ]);

        $agent=Agent::create([
            'registered'=>$request->registeredNo,
            'name' => $request->name,
            'number'=>$request->number,
            'email'=>$request->email
        ]);

        Flash::success("Succesfully Added !");
        return \Redirect::to('/system/agent/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function show($id)
    {
        $agent=Agent::find($id);
        return view('admin.agent.show',compact('agent'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        $agent=Agent::findOrFail($id);
        return view('admin.agent.edit',compact('agent'));
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
        $this->validate($request, [
            'number' => 'required|min:3|max:20',
            'email' => 'required'
        ]);

        //get customer model

        $agent= Agent::findOrFail($id);
        $agent->number = $request->number;
        $agent->email = $request->email;


        // save and exit
        if ($agent->save()) {
            Flash::success("Changes updated !");
        }else{
            Flash::error("Currently request cannot be process !");
        }

        // return to the original page
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

    //show all agents

    public function viewAgents(){

        $agent = Agent::where('terminated', '=', '0')->get();
        return view('admin.agent.view',compact('agent'));

    }


    //Agent termination
    public function terminate($id){
        $Status = DB::table('agent')->where('id', $id)->update(['terminated' => 1]);
        if ($Status) {
            Flash::success('Agent  Deleted');
        } else {
            Flash::error('Error Agent deletion');
        }
        return \Redirect::to('/system/agent');

    }
    public function undo($id){
        $Status = DB::table('agent')->where('id', $id)->update(['terminated' => 0]);
        if ($Status) {
            Flash::success('Agent  Rest');
        } else {
            Flash::error('Error Agent Reset');
        }
        return \Redirect::to('/system/agent');
    }

}
