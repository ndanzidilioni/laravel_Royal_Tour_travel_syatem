@extends('layouts.MainLayOutNav')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="view-header">
                <div class="pull-right text-right" style="line-height: 14px">
                    <small>Lotus Tour Management<br>Tour<br> <span class="c-white">v.1.0</span></small>
                </div>
                <div class="header-icon">
                    <i class="page-header-icon fa fa-plane"></i>
                </div>
                <div class="header-title">
                    <h3 class="m-b-xs">Tour / Guide / Hotel Management System</h3>
                </div>
            </div>
            <hr>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-2 col-xs-6">
            <div class="panel panel-filled activer-border">
                <div class="panel-body">
                    <h3 class="m-b-none">Customer</h3>
                    <span class="slight slight-align ">
                       <br/>
                       <i class="fa fa-home  text-warning"></i>Guide Home
                       <br/>
                      <a class="btn btn-default" href="{!! url('system/tour/guide') !!}">Guide</a>
                    </span>
                </div>
            </div>
        </div>

        <div class="col-lg-2 col-xs-6">
            <div class="panel panel-filled">
                <div class="panel-body">
                    <h3 class="m-b-none">Hotels</h3>
                    <span class="slight slight-align">
                                <br/>
                               <i class="fa fa-home  text-warning"> </i>
                                Hotel Home
                                <br/>
                             <a class="btn btn-default" href="{!! url("/system/tour/hotels") !!}">Hotel</a>
                           </span>

                </div>
            </div>
        </div>

        <div class="col-lg-2 col-xs-6">
            <div class="panel panel-filled">
                <div class="panel-body">
                    <h3 class="m-b-none">Tour</h3>
                    <span class="slight slight-align">
                                <br/>
                               <i class="fa fa-home  text-warning"> </i>
                                Tour Home
                                <br/>
                             <a class="btn btn-default" href="{!! url('system/tour/manage') !!}">Tour</a>
                           </span>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <br />
        <br />
        <h3>All Tours</h3>
        <div class="col-md-8">
            <table class="table table-responsive table-bordered">
                <tr>
                    <th>Name</th>
                    <th>Code</th>
                    <th>Arrival</th>
                    <th>Departure</th>
                    <th>Description</th>
                    <th>Availability</td>
                </tr>

                @foreach($tours as $tour)
                    <tr>
                        <td>{!! $tour->name !!}</td>
                        <td>{!! $tour->code !!}</td>
                        <td>{!! $tour->arrival !!}</td>
                        <td>{!! $tour->departure !!}</td>
                        <td>{!! $tour->description !!}</td>
                        <td>{!! $tour->coustomer_count !!}</td>
                    </tr>
                @endforeach

            </table>
        </div>
    </div>

@endsection