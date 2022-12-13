@extends('layouts.MainLayOutNav')
@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="view-header">
                <div class="pull-right text-right" style="line-height: 14px">
                    <small>Lotus Tour Management<br>Rental<br> <span class="c-white">v.1.0</span></small>
                </div>
                <div class="header-icon">
                    <i class="page-header-icon fa fa-user "></i>
                </div>
                <div class="header-title">
                    <h3 class="m-b-xs">Rental Management System</h3>
                </div>
            </div>
            <hr>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3">
            <div class="panel panel-filled">
                <div class="panel-body">
                    <h3 class="m-b-none">
                        Make a Reservation</h3>
                    <span class="slight slight-align">
                                <br/>
                                <br/>
                             <a class="btn btn-default" href="{!! url('system/rental/reservation/create') !!}">Make</a>
                           </span>

                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="panel panel-filled">
                <div class="panel-body">
                    <h3 class="m-b-none">
                        List Of Reservation</h3>
                    <span class="slight slight-align">
                                <br/>
                                <br/>
                             <a class="btn btn-default" href="{!! url('system/rental/reservation') !!}">List</a>
                           </span>

                </div>
            </div>
        </div>

    </div>

    <div class="row">
        <div class="col-md-3">
            <div class="panel panel-filled">
                <div class="panel-body">
                    <h3 class="m-b-none">
                        Vehicle Management</h3>
                    <span class="slight slight-align">
                                <br/>
                                <br/>
                             <a class="btn btn-default" href="{!! url('system/rental/vehicle/create') !!}">Add</a>
                           </span>

                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="panel panel-filled">
                <div class="panel-body">
                    <h3 class="m-b-none">
                        List Of Vehicles</h3>
                    <span class="slight slight-align">
                                <br/>
                                <br/>
                             <a class="btn btn-default" href="{!! url('system/rental/vehicle') !!}">List</a>
                           </span>

                </div>
            </div>
        </div>

    </div>


    <div class="row">
        <div class="col-md-3">
            <div class="panel panel-filled">
                <div class="panel-body">
                    <h3 class="m-b-none">
                        Driver Management</h3>
                    <span class="slight slight-align">
                                <br/>
                                <br/>
                             <a class="btn btn-default" href="{!! url('system/rental/driver/create') !!}">Add</a>
                           </span>

                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="panel panel-filled">
                <div class="panel-body">
                    <h3 class="m-b-none">
                        List Of Drivers</h3>
                    <span class="slight slight-align">
                                <br/>
                                <br/>
                             <a class="btn btn-default" href="{!! url('system/rental/driver') !!}">List</a>
                           </span>

                </div>
            </div>
        </div>

    </div>


    <div class="row">
        <div class="col-md-3">
            <div class="panel panel-filled">
                <div class="panel-body">
                    <h3 class="m-b-none">
                        Incomes</h3>
                    <span class="slight slight-align">
                                <br/>
                                <br/>
                             <a class="btn btn-default" href="{!! url('system/rental/income') !!}">View</a>
                           </span>

                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="panel panel-filled">
                <div class="panel-body">
                    <h3 class="m-b-none">
                        Expenses</h3>
                    <span class="slight slight-align">
                                <br/>
                                <br/>
                             <a class="btn btn-default" href="{!! url('system/rental/expense') !!}">View</a>
                           </span>

                </div>
            </div>
        </div>

    </div>


@endsection