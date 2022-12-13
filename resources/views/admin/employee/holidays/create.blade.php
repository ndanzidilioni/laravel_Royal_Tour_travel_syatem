@extends('layouts.MainLayOutNav')

@section('content')
    <div class="row">
        <div class="col-xs-9">
            <h3>Add Holidays</h3>
            @include('notifications._message')
            {!! Form::open(['action' => 'Employee\HolidayController@store']) !!}
                @include('admin.employee.holidays._formPartial', ['btn' => 'Add Holiday'])
            {!! Form::close() !!}
        </div>
    </div>
@endsection