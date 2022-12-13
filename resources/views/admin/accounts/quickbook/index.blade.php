@extends('layouts.MainLayOutNav')

@section('content')

    <div class="row">
        <div class="col-xs-12 col-md-9">
            @include('notifications._message')
            <h3>QuickBook Records
                <br/>
                <small><a href="{!! url('/system/accounts/quickbook/create') !!}">New QuickBook Record</a></small>
            </h3>

            <br/>

            <small>All Records for {!! \Carbon\Carbon::today()->toDateString() !!}</small>
            <table class="table table-responsive table-bordered">
                <tr>
                    <th>QuickBook ID</th>
                    <th>Amount</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
                @foreach($quickbooks as $quickbook)
                    <tr>
                        <td>#1500{!! $quickbook->id !!}</td>
                        <td>{!! $quickbook->amount !!}</td>
                        <td>{!! $quickbook->created_at->toDateTimeString() !!}</td>
                        <td><a href="{!! url('/system/accounts/quickbook/'.$quickbook->id.'/edit') !!}">Edit</a></td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>

@endsection