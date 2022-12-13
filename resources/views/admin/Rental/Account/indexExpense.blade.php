@extends('layouts.MainLayOutNav')


@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                @include('notifications._message')
                <h2>Overview Expenditure
                    <br />
                    <small><a href="{!! url('/system/rental/account') !!}"></a></small>
                </h2>
                <br />

                <table class="table table-responsive">
                    <tr>
                        <th>Expense ID</th>
                        <th>User ID</th>
                        <th>Date and Time</th>
                        <th>Type</th>
                        <th>Amount</th>
                    </tr>

                    <!--variable to collect expenses-->

                    <?php $total=0; ?>

                    @foreach($SalarySlips as $SalarySlip)
                        <tr>
                            <td>{!! $SalarySlip->id !!}</td>
                            <td>{!! $SalarySlip->user_id  !!}</td>
                            <td>{!! \Carbon\Carbon::today() !!}</td>
                            <td>Salary Payment</td>
                            <td>{!! $SalarySlip->pay*30 !!}</td>
                            <?php $total = $total + (($SalarySlip->pay)*30) ; ?>
                        </tr>
                    @endforeach

                    <tr style="font-weight: bolder">
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>TOTAL</td>
                        <td>{!! $total !!}</td>
                    </tr>
                </table>

            </div>
            <div class="col-md-12"></div>
        </div>
    </div>
@endsection