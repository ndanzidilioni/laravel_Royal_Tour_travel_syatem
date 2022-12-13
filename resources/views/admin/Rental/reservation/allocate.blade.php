@extends('layouts.MainLayOutNav')
@section('styles')
    {!! Html::style('css/rental/example.css') !!}
@endsection

@section('content')
    <div class="col-sm-3">
        <h1>Rental System</h1>
        <h2>Reservation</h2>
        @include('notifications._message')
        {!! Form::model($reservation, ['method' => 'PATCH', 'action' => ['Rental\ReservationController@update', $reservation->id]]) !!}
        @include('admin.rental.reservation.partials._formPartial',['btn'=>'Edit Reservation'])
        {!! Form::close() !!}
    </div>

@endsection

