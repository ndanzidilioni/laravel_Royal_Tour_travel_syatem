@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <a class="btn btn-default" href="/system">Home</a>
            <a class="btn btn-default" href="/system/loyalty">Loyalty</a>
            <a class="btn btn-default" href="/system/loyalty/create">Add</a>
            <a style="background-color: aliceblue;" class="btn btn-default" href="/system/loyalty/view">Edit</a>
            <a class="btn btn-default" href="/system/loyalty/view">View</a>
            <hr />
            <div class="col-sm-12 col-md-12">
                @include('notifications._message')
                <h2>Edit Loyalty
                    <br />
                    <small>Loyalty ID : {!! $loyalty->id !!}</small>
                </h2>
                <br />

                {!! Form::model($loyalty, ['method' => 'PATCH', 'action' => ['Loyalty\LoyaltyController@update', $loyalty->id]]) !!}
                @include('admin.loyalty.partials._formPartial', ['btn' => 'Update Loyalty'])
                {!! Form::close() !!}

                <div class="col-sm-12 col-md-3">

                </div>
            </div>
        </div>
    </div>
@endsection