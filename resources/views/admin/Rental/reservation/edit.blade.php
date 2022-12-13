@extends('layouts.MainLayOutNav')
@section('styles')
    {!! Html::style('css/rental/example.css') !!}
@endsection

@section('content')
    <div class="col-sm-3"></div>
    <div class="col-sm-3">
        <h1>Rental System</h1>
        <h2>Update Reservation</h2>
        @include('notifications._message')
        {!! Form::model($reservation, ['method' => 'PATCH', 'action' => ['Rental\ReservationController@update', $reservation->id]]) !!}
        @include('admin.rental.reservation.partials._EditformPartial',['btn'=>'Edit Reservation'])
        {!! Form::close() !!}
    </div>


@endsection