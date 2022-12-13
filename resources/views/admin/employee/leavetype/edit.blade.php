@extends('layouts.MainLayOutNav')

@section('content')
    <div class="row">
        <div class="col-xs-9">
            <h3>Edit Leave Type</h3>
            @include('notifications._message')
            {!! Form::model($leavetype, ['action' => 'Employee\LeaveType@store']) !!}
            @include('admin.employee.leavetype._formPartial', ['btn' => 'Edit'])
            {!! Form::close() !!}
        </div>
    </div>
@endsection