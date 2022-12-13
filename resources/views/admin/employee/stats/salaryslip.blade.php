@extends('layouts.MainLayOutNav')

@section('content')

        <div class="row">
            <div class="col-xs-12 col-md-9">
                <h2>Employee Salary Slips <br /></h2>
                @if($salaryslips->isEmpty())
                    <p>You have no salary slips ... yet</p>
                @else
                    <table class="table-responsive table table-bordered">
                        <tr>
                            <th>Month</th>
                            <th>Pay</th>
                        </tr>
                        @foreach($salaryslips as $salaryslip)
                            <tr>
                                <td>{!! $salaryslip->month !!}</td>
                                <td>{!! $salaryslip->pay !!}</td>
                            </tr>
                        @endforeach
                    </table>
                @endif
            </div>

            @include('admin.employee.stats._statPartial')
        </div>

@endsection
