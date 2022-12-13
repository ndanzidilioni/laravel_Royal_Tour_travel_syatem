@extends('layouts.MainLayOutNav')

@section('content')
    <div class="row">
        <div class="col-xs-9">
            <h3>All OT Types List <br />
                <small><a href="{!! url('/system/extras/ottypes/create') !!}">Add new OT Type </a></small>
            </h3>

            <br/>

            <table class="table table-responsive table-bordered">
                <tr>
                    <th>OT ID</th>
                    <th>OT Name</th>
                    <th>OT Rate</th>
                    <th>Edit</th>
                </tr>


                @foreach($overtimes as $overtime)
                    <tr>
                        <td>{!! $overtime->id !!}</td>
                        <td>{!! $overtime->name !!}</td>
                        <td>{!! $overtime->rate !!}</td>
                        <td><a href="{!! url('/system/extras/ottypes/'. $overtime->id.'/edit') !!}">Edit</a></td>
                    </tr>
                @endforeach

            </table>

        </div>
    </div>
@endsection