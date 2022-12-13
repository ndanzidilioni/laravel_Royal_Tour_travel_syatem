@extends('layouts.MainLayOutNav')

@section('content')

        <div class="row">
            <div class="col-sm-12 col-md-9">
                <h2>Add Hotel</h2>
                @include('notifications._message')
                {!! Form::open(['action' => 'Tour\hotels\HotelController@store']) !!}
                @include('admin.tour.hotels.partials._formPartial', ['btn' => 'Add Hotel', 'password' => true, 'terminate' => false])
                {!! Form::close() !!}

            </div>

        </div>

@endsection
