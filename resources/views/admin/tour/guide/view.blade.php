@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <table class="table table-responsive">
                <tr>
                    <th>Name</th>
                    <td>{!! $guide->name !!}</td>

                </tr>
                <tr>
                    <th>Last Name</th>
                    <td>{!! $guide->lastname !!}</td>
                </tr>
                <tr>
                    <th>Email :</th>
                    <td>{!! $guide->email !!}</td>
                </tr>
            </table>
        </div>
    </div>
@endsection


