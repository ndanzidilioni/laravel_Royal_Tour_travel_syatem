@extends('layouts.MainLayOutNav')

@section('content')
    <div class="row">
        <div class="col-xs-9">
            <h3>Add OverTime Types</h3>
            @include('notifications._message')
            {!! Form::open(['action' => 'Employee\OverTimeTypeController@store']) !!}
                @include('admin.employee.ot._formPartial', ['btn' => 'Add OT Type'])
            {!! Form::close() !!}
        </div>
    </div>
@endsection