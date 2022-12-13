@extends('layouts.MainLayOutNav')
@section('styles')
    {!! Html::style('css/rental/example.css') !!}
@endsection

@section('content')
    <div class="col-sm-3"></div>
    <div class="col-sm-3">
        <h1>Rental System</h1>
        <h2>Update Vehicle</h2>
        @include('notifications._message')
        {!! Form::model($vehicle, ['method' => 'PATCH', 'action' => ['Rental\RentalController@update', $vehicle->id]]) !!}
        @include('admin.rental.vehicle.partials._EditformPartial',['btn'=>'Edit Vehicle'])
        {!! Form::close() !!}
    </div>
@endsection