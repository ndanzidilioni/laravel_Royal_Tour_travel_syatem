@extends('layouts.MainLayOutNav')

@section('content')
    <div class="row">
        <div class="col-xs-9">
            <h3>Add Leave Type</h3>
            @include('notifications._message')
            {!! Form::open(['action' => 'Employee\LeaveType@store']) !!}
                @include('admin.employee.leavetype._formPartial', ['btn' => 'Add Leave Type'])
            {!! Form::close() !!}
        </div>
    </div>
@endsection