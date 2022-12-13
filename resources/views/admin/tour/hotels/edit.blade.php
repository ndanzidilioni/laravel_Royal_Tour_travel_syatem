@extends('layouts.MainLayOutNav')

@section('content')

    <div class="row">
        <div class="col-sm-12 col-md-9">
            <h3>Edit Hotel
                <br/>
                <small>Hotel ID: {!! $hotel->id!!}</small>
            </h3>

            @include('notifications._message')
            {!! Form::model($hotel, ['method' => 'PATCH', 'action' => ['Tour\hotels\HotelController@update', $hotel->id]]) !!}
            @include('admin.tour.hotels.partials._NoteEditableFormPartial', ['btn' => 'Edit Hotel', 'password' => true, 'terminate' => false])
            {!! Form::close() !!}

        </div>
    </div>

@endsection


