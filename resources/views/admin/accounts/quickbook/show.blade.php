@extends('layouts.MainLayOutNav')

@section('content')
        <div class="row">
            <div class="col-xs-12 col-md-9">
                <h3>QuickBook Record</h3>
                <a href="{!! url('/system/accounts/quickbook/create') !!}">Add to QuickBook</a>
                <br />
                <br />
                <br />
                <table class="table table-responsive table-bordered">
                    <tr>
                        <th>invoice ID : </th>
                        <th>Amount</th>
                        <th>Detail</th>
                    </tr>

                    <tr>
                        <td><strong>#1500{!! $quickbook->id !!}</strong></td>
                        <td>{!! $quickbook->amount !!}</td>
                        <td>{!! $quickbook->description !!}</td>
                    </tr>
                </table>

                <br/>
                <br/>
                <br/>

                <h3>Modifications of <strong>#1500{!! $quickbook->id !!}</strong></h3>

            </div>
            <div class="col-xs-12 col-md-3"></div>
        </div>
@endsection