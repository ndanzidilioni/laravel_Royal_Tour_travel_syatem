@extends('layouts.MainLayOutNav')

@section('content')
    <div class="row">
        <div class="col-xs-9">
            <h3>All Holiday List <br />
                <small><a href="{!! url('/system/extras/holidays/create') !!}">Add new Holiday </a></small>
            </h3>

            <br/>

            <table class="table table-responsive table-bordered">
                <tr>
                    <th>OT Type</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Edit</th>
                </tr>


                @foreach($holidays as $holiday)
                    <tr>
                        <td>{!! $holiday->overtime_type !!}</td>
                        <td>{!! $holiday->start_day !!}</td>
                        <td>{!! $holiday->end_day !!}</td>
                        <td><a href="{!! url('/system/extra/holiday/'. $holiday->id.'/') !!}">Edit</a></td>
                    </tr>
                @endforeach

            </table>

        </div>
    </div>
@endsection