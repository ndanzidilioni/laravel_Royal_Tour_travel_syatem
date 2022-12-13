@extends('layouts.MainLayOutNav')

@section('content')
    <div class="row">
        <div class="col-xs-9">
            <h3>Add Holidays</h3>
            @include('notifications._message')
            {!! Form::model($holiday, ['action' => 'Employee\HolidayController@store']) !!}
            @include('admin.employee.holidays._formPartial', ['btn' => 'Edit'])
            {!! Form::close() !!}
        </div>
    </div>
@endsection