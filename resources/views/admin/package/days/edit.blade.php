@extends('layouts.MainLayOutNav')

@section('content')
    <div class="row">
        <div class="col-xs-9">
            <h3>Edit a package day
                <br />
                <small>package id : {!! $package !!}</small>
            </h3>

            <br />

            {!! Form::model($day, ['action' => ['Package\PackageDayController@update', $package, $day->id]]) !!}
            @include('admin.package.days._formPartial')
            {!! Form::close() !!}

        </div>
    </div>
@endsection