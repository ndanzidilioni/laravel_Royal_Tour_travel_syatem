@extends('layouts.MainLayOutNav')

@section('content')

        <div class="row">
            <div class="col-sm-12 col-md-9">
                <h3>Manage Tour
                    <br/>
                    <small>Tour code: {!! $tour->code !!}</small>
                </h3>

                @include('notifications._message')

                <br />

                {!! Form::model($tour, ['method' => 'PATCH', 'action' => ['Tour\manage\TourManageController@update', $tour->id]]) !!}
                @include('admin.tour.tour.partials._NonEditableformPartial', ['btn' => 'Edit Tour', 'password' => true, 'terminate' => false])
                {!! Form::close() !!}

            </div>
        </div>

@endsection


