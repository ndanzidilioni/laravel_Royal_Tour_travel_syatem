@extends('layouts.MainLayOutNav')

@section('content')
        <div class="row">
            <div class="col-sm-12 col-md-9">
                @include('notifications._message')
                <h3>All Guides
                    <br/>
                    <small><a href="{!! url('/system/tour/guide/create') !!}">Add Guide</a></small>
                </h3>

                <br />
                <br />

                <table class="table table-responsive">
                    <tr>
                        <th>Guide ID</th>
                        <th>Guide Name</th>
                        <th>Guide LName</th>
                        <th>Guide NIC</th>
                        <th>Guide Gender</th>
                        <th>Edit</th>
                    </tr>

                    @foreach($guides as $guide)
                        <tr>
                            <td>{!! $guide->id !!}</td>
                            <td>{!! $guide->name !!}</td>
                            <td>{!! $guide->lastname !!}</td>
                            <td>{!! $guide->nic !!}</td>
                            <td>{!! ($guide->gender) == 1 ? "Male" : "Female"  !!}</td>
                            <td><a href="{!! url('/system/tour/guide/'.$guide->id.'/edit')  !!}">Edit</a></td>
                        </tr>
                    @endforeach

                </table>

            </div>

        </div>

@stop
