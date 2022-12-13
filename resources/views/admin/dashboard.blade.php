@extends('layouts.MainLayOutNav')

@section('content')

        <div class="row">
            <div class="col-lg-12">
                <div class="view-header">
                    <div class="pull-right text-right" style="line-height: 14px">
                        <small>Royal Tour Management<br>Dashboard<br> <span class="c-white">v.1.0</span></small>
                    </div>
                    <div class="header-icon">
                        <i class="page-header-icon fa fa-user "></i>
                    </div>
                    <div class="header-title">
                        <h3 class="m-b-xs">Royal Travels - Dashboard</h3>
                    </div>
                    <div class="header-title">
                        <small>
                            Hello, {!! Auth::user()->name !!}
                        </small>
                        <br/>
                        <small>
                            @if(Auth::user()->admin)
                                What you are allowed for ,
                                    @foreach(Auth::user()->admin as $adminTypes)
                                        |{!! $adminTypes->type !!}|
                                    @endforeach
                            @else

                            @endif
                        </small>
                    </div>
                </div>
                <hr>
            </div>
        </div>

        <div class="row">

            <div class="col-md-3">
                <div class="panel panel-filled">
                    <div class="panel-body">
                        <h3 style="text-align: center" class="m-b-none">
                            Employee
                            <span class="slight slight-align ">
                               <br/>
                               <i class="fa fa-home  text-warning"> </i>
                                Employee Home
                               <br/>
                              <a class="btn btn-default" href="/system/employee">Employee</a>
                           </span>
                        </h3>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="panel panel-filled">
                    <div class="panel-body">
                        <h3 style="text-align: center" class="m-b-none">
                            Package
                            <span class="slight slight-align ">
                               <br/>
                               <i class="fa fa-home  text-warning"> </i>
                                Package Home
                               <br/>
                              <a class="btn btn-default" href="/system/package">Employee</a>
                           </span>
                        </h3>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="panel panel-filled">
                    <div class="panel-body">
                        <h3 style="text-align: center" class="m-b-none">
                            Customer
                            <span class="slight slight-align ">
                               <br/>
                               <i class="fa fa-home  text-warning"> </i>
                                Customer Home
                               <br/>
                              <a class="btn btn-default" href="/system/customer">Customer</a>
                           </span>
                        </h3>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="panel panel-filled">
                    <div class="panel-body">
                        <h3 style="text-align: center" class="m-b-none">
                            Ticket
                            <span class="slight slight-align ">
                               <br/>
                               <i class="fa fa-home  text-warning"> </i>
                                Ticket Home
                               <br/>
                              <a class="btn btn-default" href="/system/ticket">Ticket</a>
                           </span>
                        </h3>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="panel panel-filled">
                    <div class="panel-body">
                        <h3 style="text-align: center" class="m-b-none">
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

            <div class="col-md-3">
                <div class="panel panel-filled">
                    <div class="panel-body">
                        <h3 style="text-align: center" class="m-b-none">
                            Tour
                            <span class="slight slight-align ">
                               <br/>
                               <i class="fa fa-home  text-warning"> </i>
                                Tour Home
                               <br/>
                              <a class="btn btn-default" href="/system/tour">Tour</a>
                           </span>
                        </h3>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="panel panel-filled">
                    <div class="panel-body">
                        <h3 style="text-align: center" class="m-b-none">
                            Account
                            <span class="slight slight-align ">
                               <br/>
                               <i class="fa fa-home  text-warning"> </i>
                                Account Home
                               <br/>
                              <a class="btn btn-default" href="/system/tour">Account</a>
                           </span>
                        </h3>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="panel panel-filled">
                    <div class="panel-body">
                        <h3 style="text-align: center" class="m-b-none">
                            Rental
                            <span class="slight slight-align ">
                               <br/>
                               <i class="fa fa-home  text-warning"> </i>
                                Rental Home
                               <br/>
                              <a class="btn btn-default" href="/system/rental">Rental</a>
                           </span>
                        </h3>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="panel panel-filled">
                    <div class="panel-body">
                        <h3 style="text-align: center" class="m-b-none">
                            Advertisements
                            <span class="slight slight-align ">
                               <br/>
                               <i class="fa fa-home  text-warning"> </i>
                                Advertisements Home
                               <br/>
                              <a class="btn btn-default" href="/system/advertisements">Advertisements</a>
                           </span>
                        </h3>
                    </div>
                </div>
            </div>


        </div>


@endsection