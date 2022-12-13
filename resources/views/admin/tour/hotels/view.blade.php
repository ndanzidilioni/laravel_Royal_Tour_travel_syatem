@extends('layouts.MainLayOutNav')
@section('content')
    <div class="row">

        <h3>Detailed View of Hotel <a href="#">{!! $hotel->name !!}</a>,
            <small>{!! $hotel->city !!}</small>
        </h3>

        <br/>

        <div class="col-md-3"></div>
        <div class="col-md-6">
            <table class="table table-responsive">
                <tr>
                    <th>Name</th>
                    <td>{!! $hotel->name !!}</td>
                </tr>

                <tr>
                    <th>Phone</th>
                    <td>{!! $hotel->phone !!}</td>
                </tr>

                <tr>
                    <th>Email</th>
                    <td>{!! $hotel->email !!}</td>
                </tr>

                <tr>
                    <th>City</th>
                    <td>{!! $hotel->city !!}</td>
                </tr>

                <tr>
                    <th>Total Expenses</th>
                    <td>{!! $hotel->expenses !!}</td>
                </tr>

                <tr>
                    <th>Added At</th>
                    <td>{!! $hotel->created_at->toDateString() !!}</td>
                </tr>

            </table>
        </div>
        <div class="col-md-3"></div>
    </div>
@endsection


