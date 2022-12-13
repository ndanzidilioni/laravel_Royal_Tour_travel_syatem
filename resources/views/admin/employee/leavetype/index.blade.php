@extends('layouts.MainLayOutNav')

@section('content')
    <div class="row">
        <div class="col-xs-9">
            <h3>All Leave Types List <br />
                <small><a href="{!! url('/system/extras/leavetype/create') !!}">Add new Leave type </a></small>
            </h3>

            <br/>

            <table class="table table-responsive table-bordered">
                <tr>
                    <th>LeaveType ID</th>
                    <th>LeaveType Name</th>
                    <th>Edit</th>
                </tr>


                @foreach($leavetypes as $leavetype)
                    <tr>
                        <td>{!! $leavetype->id !!}</td>
                        <td>{!! $leavetype->name !!}</td>
                        <td><a href="{!! url('/system/extras/leavetype/'. $leavetype->id.'/edit') !!}">Edit</a></td>
                    </tr>
                @endforeach

            </table>

        </div>
    </div>
@endsection