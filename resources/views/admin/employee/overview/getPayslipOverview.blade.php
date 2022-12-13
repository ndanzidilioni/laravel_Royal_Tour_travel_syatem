@extends('layouts.MainLayOutNav')

@section('content')
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-9">
            <h3>PaySlip Overview</h3>

            <table class="table table-responsive">

                <tr>
                    <th>Salary Slip ID</th>
                    <th>Pay</th>
                    <th>OT</th>
                    <th>Leaves</th>
                    <th>Travels</th>
                    <th>EPF</th>
                </tr>

                <tr>
                    <td>{!! $salarySlip->id !!}</td>
                    <td>{!! $salarySlip->pay !!}</td>
                    <td>
                        <ul>
                            @foreach($overTimes as $overTime)
                                <li>Hours : {!! $overTime->hours !!} | Date : {!! $overTime->timesheet->day->toDateString() !!}</li>
                            @endforeach
                        </ul>
                    </td>
                    <td>
                        <ul style="list-style-type: none; margin: 0; padding: 0;">
                            @foreach($leaves as $leave)
                                <li>Date and Time : {!! $leave->time !!}</li>
                            @endforeach
                        </ul>
                    </td>
                    <td>
                        <ul>
                            @foreach($travels as $travel)
                                <li>Amount : {!! $travel->amount !!} | Date : {!! $travel->date->toDateString() !!}</li>
                            @endforeach
                        </ul>
                    </td>

                    <td>
                        {!! $epf->amount !!}
                    </td>
                </tr>

            </table>

        </div>

        @include('admin.employee.stats._statPartial')
    </div>
@endsection