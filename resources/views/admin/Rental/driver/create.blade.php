@extends('layouts.MainLayOutNav')
@section('styles')
    {!! Html::style('css/rental/example.css') !!}
@endsection

@section('content')
    <div class="col-sm-9">
        <h3>Rental System
            <br>
            <small>Add Driver</small>
        </h3>
        @include('notifications._message')
        {!! Form::open(['action' => 'Rental\DriverController@store']) !!}
            @include('admin.rental.driver.partials._formPartial',['btn'=>'Add Driver','password'=>true])
        {!! Form::close() !!}
    </div>

@endsection