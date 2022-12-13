@extends('layouts.MainLayOutNav')

@section('content')

        <div class="row">
            <div class="col-sm-12 col-md-9">
                <h3>Add a new tour
                    <br />
                    <small>for {!! \Carbon\Carbon::now()->format('F Y') !!}</small>
                </h3>
                <br />
                @include('notifications._message')
                {!! Form::open(['action' => 'Tour\manage\TourManageController@store']) !!}
                @include('admin.tour.tour.partials._formPartial', ['btn' => 'Add Tour', 'password' => true, 'terminate' => false])
                {!! Form::close() !!}

            </div>
        </div>

@endsection
