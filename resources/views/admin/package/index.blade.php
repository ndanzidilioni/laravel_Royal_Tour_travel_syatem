@extends('layouts.MainLayOutNav')
@section('content')

    @include('notifications._message')

    <div class="row">
        <div class="col-lg-12">
            <div class="view-header">
                <div class="pull-right text-right" style="line-height: 14px">
                    <small>Lotus Tour Management<br>Package<br> <span class="c-white">v.1.0</span></small>
                </div>
                <div class="header-icon">
                    <i class="page-header-icon fa fa-briefcase"></i>
                </div>
                <div class="header-title">
                    <h3 class="m-b-xs">Package Management System</h3>
                </div>
            </div>
            <hr>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-2 col-xs-6">
            <div class="panel panel-filled activer-border">
                <div class="panel-body">
                    <h3 class="m-b-none">Package Lists</h3>
                    <span class="slight slight-align">
                       <br/>
                       <i class="fa fa-home  text-warning"></i> All Packages
                       <br/>
                      <a class="btn btn-default" href="{!! url('system/package') !!}">Package</a>
                    </span>
                </div>
            </div>
        </div>
        <div class="col-lg-2 col-xs-6">
            <div class="panel panel-filled">
                <div class="panel-body">
                    <h3 class="m-b-none">Add Package</h3>
                    <span class="slight slight-align ">
                       <br/>
                       <i class="fa fa-home  text-warning"></i>Add new Package
                       <br/>
                      <a class="btn btn-default" href="{!! url('system/package/create') !!}">Package</a>
                    </span>
                </div>
            </div>
        </div>
    </div>

    <br/>

    <table class="table table-responsive">
        <tr>
            <th>ID</th>
            <th>Code</th>
            <th>Name</th>
            <th>Country</th>
            <th>Destination</th>
            <th>Days</th>
            <th>Price</th>
            <th>Description</th>
            <th>Option</th>
        </tr>
        <?php $count = 1; ?>
        @foreach($packages as $package)
            <tr>
                <td><?php echo $count; $count++ ?></td>
                <td>{!! $package->code  !!}</td>
                <td>{!! $package->name !!}</td>
                <td>{!! $package->country !!}</td>
                <td>{!! $package->destination !!}</td>
                <td>{!! $package->days !!}</td>
                <td>{!! $package->price !!}</td>
                <td>{!! $package->description !!}</td>
                <td>
                    <a href="{!! url('/system/package/'.$package->id.'/edit') !!}" class="btn btn-default">
                        Edit
                    </a>
                    <a href="{!! url('/system/package/'.$package->id.'/terminate') !!}" class="btn btn-default">
                        Delete
                    </a>
                </td>
            </tr>
        @endforeach
    </table>
@endsection