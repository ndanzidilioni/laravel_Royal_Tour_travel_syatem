@extends('layouts.MainLayOutNav')

@section('content')
    <div class="row">
        <div class="col-xs-9">
            <h3>Edit Over Time Types</h3>
            @include('notifications._message')
            {!! Form::model($overtime, ['action' => 'Employee\OverTimeTypeController@store']) !!}
            @include('admin.employee.ot._formPartial', ['btn' => 'Edit'])
            {!! Form::close() !!}
        </div>
    </div>
@endsection