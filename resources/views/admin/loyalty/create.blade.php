@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <a class="btn btn-default" href="/system">Home</a>
            <a class="btn btn-default" href="/system/loyalty">Loyalty</a>
            <a style="background-color: aliceblue;" class="btn btn-default" href="/system/loyalty/create">Add</a>
            <a class="btn btn-default" href="/system/loyalty/view">Edit</a>
            <a class="btn btn-default" href="/system/loyalty/view">View</a>
        </div>
        <hr/>
        <h2>Add Loyalty</h2>
        @include('notifications._message')
        {!! Form::open(['action' => 'Loyalty\LoyaltyController@store']) !!}
        @include('admin.loyalty.partials._formPartial',['btn' => 'Add'])
        {!! Form::close() !!}
    </div>
@endsection