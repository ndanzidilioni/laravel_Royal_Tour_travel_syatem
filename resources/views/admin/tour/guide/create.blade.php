@extends('layouts.MainLayOutNav')

@section('content')

        <div class="row">
            <div class="col-sm-12 col-md-9">
                <h2>Add Guide</h2>
                @include('notifications._message')
                {!! Form::open(['action' => 'Tour\guide\GuideController@store']) !!}
                @include('admin.tour.guide.partials._formPartials', ['btn' => 'Add Guide', 'password' => true, 'terminate' => false])
                {!! Form::close() !!}
            </div>
        </div>

@endsection
