@extends('layouts.MainLayOutNav')

@section('content')
        <div class="row">
            <div class="col-xs-12 col-md-9">
                <h2>Employee Leaves<br/>
                    <small>Employee ID : {!! Auth::id() !!}</small>
                </h2>

                <br/>
                <table class="table-bordered table-responsive table">
                    <tr>
                        <th>Leave Date</th>
                        <th>Leave Reason</th>
                    </tr>

                    @if($leaves->isEmpty())
                        <tr>
                            <td colspan="2" style="text-align: center">You have took no leaves</td>
                        </tr>
                    @else
                        <tr>
                            @foreach($leaves as $leave)
                                <td>Leave Date : {!! $leave->time !!}</td>
                            @endforeach
                        </tr>
                    @endif
                </table>
            </div>

            @include('admin.employee.stats._statPartial')
        </div>

@endsection