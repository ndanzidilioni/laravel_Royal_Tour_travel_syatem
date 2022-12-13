@extends('layouts.MainLayOutNav')

@section('styles')
    <style type="text/css">
        .list-group-item {
            background-color: #363942;
        }
    </style>
@endsection

@section('content')

        <div class="row">
            <div class="col-xs-12 col-md-9">
                <h2>Employee View <br />
                <small>employee id : {!! $employee->id !!}</small>
                </h2>
                <br />

                <table class="table table-bordered table-responsive">
                    <tr>
                        <th>Item</th>
                        <th>Detail</th>
                    </tr>

                    <tr>
                        <td>FullName : </td>
                        <td>{!! $employee->name !!} {!! $employee->lastname !!}</td>
                    </tr>

                    <tr>
                        <td>Email</td>
                        <td>{!! $employee->email !!}</td>
                    </tr>

                    <tr>
                        <td>NIC</td>
                        <td>{!! $employee->nic !!}</td>
                    </tr>

                    <tr>
                        <td>Age</td>
                        <td>{!! $employee->age !!}</td>
                    </tr>

                    <tr>
                        <td>Address</td>
                        <td>{!! $employee->address !!}</td>
                    </tr>

                    <tr>
                        <td>Hourly Rate</td>
                        <td>{!! $employee->hour_rate !!}</td>
                    </tr>

                    <tr>
                        <td>Basic Salary</td>
                        <td>{!! $employee->basic !!}</td>
                    </tr>

                    <tr>
                        <td>Hourly rate</td>
                        <td>{!! $employee->hour_rate !!}</td>
                    </tr>

                    <tr>
                        <td>Gender</td>
                        <td>{!! ($employee->gender == true) ? "Male" : "Female" !!}</td>
                    </tr>

                    <tr>
                        <td>Hired Date</td>
                        <td>{!! $employee->hire_date !!}</td>
                    </tr>

                    @if($employee->terminated == true)
                        <tr>
                            <td>Termination date</td>
                            <td>{!! $employee->terminated_date !!}</td>
                        </tr>
                    @endif

                </table>
            </div>
            <div class="col-xs-12 col-md-3">
                <ul class="list-group">
                    <li class="list-group-item">
                        <a href="{!! url('system/employee/'.$employee->id.'/stats/salary-slips') !!}">Salary Slips</a>
                    </li>

                    <li class="list-group-item">
                        <a href="{!! url('system/employee/'.$employee->id.'/stats/overtimes') !!}">Over Time</a>
                    </li>

                    <li class="list-group-item">
                        <a href="{!! url('system/employee/'.$employee->id.'/stats/leaves') !!}">Leaves</a>
                    </li>

                    <li class="list-group-item">
                        <a href="{!! url('system/employee/'.$employee->id.'/stats/attendance') !!}">Attendance</a>
                    </li>

                    <li class="list-group-item">
                        <a href="{!! url('system/employee/'.$employee->id.'/stats/travel') !!}">Travel</a>
                    </li>

                    <li class="list-group-item">
                        <a href="{!! url('system/employee/'.$employee->id.'/stats/loans') !!}">Loans</a>
                    </li>

                </ul>

                <br />
                <br />
                <h4>Admin / Management Options</h4>
                <ul class="list-group">
                    <li class="list-group-item">
                        <a href="{!! url('/system/admin/employee/loan/create/') !!}">Allocate a loan</a>
                    </li>
                    <li class="list-group-item">
                        <a href="{!! url('/system/admin/employee/leave/create') !!}">Allocate a leave</a>
                    </li>
                    <li class="list-group-item">
                        <a href="{!! url('/system/admin/employee/advance/create') !!}">Allocate an advance payment</a>
                    </li>
                    <li class="list-group-item">
                        <a href="{!! url('/system/extras/leavetype/create') !!}">Allocate LeaveType</a>
                    </li>
                    <li class="list-group-item">
                        <a href="{!! url('/system/extras/holidays/create') !!}">Add Holidays</a>
                    </li>
                    <li class="list-group-item">
                        <a href="{!! url('/system/extras/ottypes/create') !!}">Allocate OT Types</a>
                    </li>
                </ul>
            </div>
        </div>

@endsection