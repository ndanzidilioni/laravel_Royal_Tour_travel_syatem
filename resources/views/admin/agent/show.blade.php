@extends('layouts.MainLayOutNav')
@section('content')
    <div class="row">
        <div class="col-lg-2 col-xs-6">
            <div class="panel panel-filled">
                <div class="panel-body">
                    <h3 class="m-b-none">
                        Agent
                        <span class="slight slight-align ">
                               <br/>
                               <i class="fa fa-home  text-warning"> </i>
                                Agent Home
                               <br/>
                              <a class="btn btn-default" href="/system/agent">Agent</a>
                           </span>
                    </h3>
                </div>
            </div>
        </div>

        <div class="col-lg-2 col-xs-6">
            <div class="panel panel-filled">
                <div class="panel-body">
                    <h3 class="m-b-none">
                        Add
                        <span class="slight slight-align">
                                <br/>
                               <i class="fa fa-home  text-warning"> </i>
                                New Agent
                                <br/>
                             <a class="btn btn-default" href="/system/agent/create">Add</a>
                           </span>
                    </h3>
                </div>
            </div>
        </div>

        <div class="col-lg-2 col-xs-6">
            <div class="panel panel-filled activer-border">
                <div class="panel-body">
                    <h3 class="m-b-none">
                        View
                        <span class="slight slight-align">
                                <br/>
                               <i class="fa fa-home  text-warning"> </i>
                                Agent  Details
                                <br/>
                             <a class="btn btn-default" href="/system/agent/{!! $agent->id !!}">View</a>
                           </span>
                    </h3>
                </div>
            </div>
        </div>

    </div>



    <div class="row">
        <div class="col-md-12">

            <div class="panel panel-filled">

                <div class="panel-body">

                    <h4>Agent :</h4>
                    <p>Registered ID : {!! $agent->registered !!}</p>
                    <table class="table table-bordered table-responsive">
                        <tbody>
                            <tr>
                                <td>Name</td>
                                <td>{!! $agent->name !!}</td>
                            </tr>
                            <tr>
                                <td>Contact Number</td>
                                <td>{!! $agent->number !!}</td>
                            </tr>
                            <tr>
                                <td>Email Address</td>
                                <td>{!! $agent->email !!}</td>
                            </tr>
                            <tr>
                                <td>Option </td>
                                <td>
                                    <a class="btn btn-default" href="/system/agent/{!! $agent->id !!}/edit">
                                       Edit
                                    </a>
                                    <a class="btn btn-default" href="/system/agent/{!! $agent->id !!}/terminate">
                                        Delete
                                    </a>
                                    <a class="btn btn-default" href="/system/agent/{!! $agent->id !!}/undo">
                                        Rest
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                </div>

            </div>

        </div>
    </div>
@endsection