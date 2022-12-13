@extends('layouts.MainLayOutNav')

@section('content')

        <div class="row">
            <div class="col-sm-12 col-md-9">
                <h3>Edit Guide
                    <br/>
                    <small>Guide ID: {!! $guide->id!!}</small>
                </h3>
                @include('notifications._message')
                {!! Form::model($guide, ['method' => 'PATCH', 'action' => ['Tour\guide\GuideController@update', $guide->id]]) !!}
                @include('admin.tour.guide.partials._noEditableFormPartial', ['btn' => 'Edit Guide', 'password' => true, 'terminate' => false])
                {!! Form::close() !!}

            </div>

        </div>

@endsection


