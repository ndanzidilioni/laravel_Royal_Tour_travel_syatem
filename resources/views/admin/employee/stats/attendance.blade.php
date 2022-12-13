@extends('layouts.MainLayOutNav')

@section('content')

        <div class="row">
            <div class="col-xs-12 col-md-9">
                <h3>Employee Attendance<br/>
                    <small>Employee ID : {!! Auth::id() !!}</small>
                </h3>
                <br/>
                <br/>

                @if($attendances->isEmpty())
                    <p>You have no attendance</p>
                @else

                    <table class="table table-responsive table-bordered">
                        <tr>
                            <th>Date</th>
                            <th>Check in time</th>
                            <th>Check out time</th>
                        </tr>

                        @foreach($attendances as $attendance)
                            <tr>
                                <td>
                                    <strong>Attended Date : {!! $attendance->day->toDateString() !!}</strong>
                                </td>

                                <td>
                                    <strong>Checked IN : {!! $attendance->check_in->toTimeString() !!}</strong>
                                </td>

                                <td>
                                    <strong>
                                        Check OUT : {!! ($attendance->check_out == null) ? "Not checked out !" : $attendance->check_out->toTimeString() !!}</strong>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                @endif
            </div>

            @include('admin.employee.stats._statPartial')
        </div>

@endsection