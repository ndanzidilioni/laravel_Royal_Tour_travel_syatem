@extends('layouts.MainLayOutNav')
<?php $timeSheets?>
@section('content')
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-9">
            <h3>Employee attendance for {!! \Carbon\Carbon::today()->toDateString() !!}</h3>

            <table class="table table-responsive">
                <tr>
                    <th> Employee ID </th>
                    <th> Employee Name </th>
                    <th> Employee Check-IN </th>
                    <th> Employee Check-OUT </th>
                </tr>

                @foreach($timeSheets as $timeSheet)
                    <tr>
                        <td>{!! $timeSheet->employee->id !!}</td>
                        <td>{!! $timeSheet->employee->name !!}</td>
                        <td>{!! $timeSheet->check_in !!}</td>
                        <td>{!! ($timeSheet->check_out) == null ? "Not Checked OUT yet" : $timeSheet->check_out !!}</td>
                    </tr>
                @endforeach
            </table>

        </div>
        <div class="col-xs-12 col-sm-12 col-md-3">

        </div>
    </div>
@endsection