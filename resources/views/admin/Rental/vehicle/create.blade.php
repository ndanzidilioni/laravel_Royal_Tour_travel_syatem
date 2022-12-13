@extends('layouts.MainLayOutNav')
@section('styles')
    {!! Html::style('css/rental/example.css') !!}
@endsection

@section('content')
    <div class="col-sm-3"></div>
    <div class="col-sm-3">
        <h1>Rental System</h1>
        <h2>Add Vehicle</h2>
        @include('notifications._message')
        {!! Form::open(['action' => 'Rental\RentalController@store']) !!}
            @include('admin.rental.vehicle.partials._formPartial',['btn'=>'Add Vehicle'])
        {!! Form::close() !!}
    </div>

@endsection