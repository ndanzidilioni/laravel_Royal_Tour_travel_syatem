@extends('layouts.MainLayOutNav')

@section('content')

        <div class="row">
            <div class="row">
                <a class="btn btn-default" href="/system">Home</a>
                <a class="btn btn-default" href="/system/package">Package</a>
                <a style="background-color: aliceblue;" class="btn btn-default" href="/system/package/create">Add</a>
            </div>

            <hr />
            <div class="col-sm-12 col-md-12">
                @include('notifications._message')
                <h2>Edit Package
                    <br />
                    <small>Package ID : {!! $package->id !!}</small>
                </h2>
                <br />

                {!! Form::model($package, ['method' => 'PATCH', 'action' => ['Package\PackageController@update', $package->id]]) !!}
                @include('admin.package.partials._formPartial', ['btn' => 'Update Package',])
                {!! Form::close() !!}

                <div class="col-sm-12 col-md-3">

                </div>
            </div>
        </div>

@endsection