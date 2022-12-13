@extends('layouts.MainLayOutNav')

@section('content')
        <div class="row">
            <div class="col-xs-12 col-md-9">
                <h4>Salary Expenses</h4>
                @if($salaryExpenses->isEmpty())
                    <p>No Expenses !</p>
                @else
                    @foreach($salaryExpenses as $salaryExpense)
                        <table class="table table-responsive table-bordered">
                            <tr>
                                <th>USER ID</th>
                                <th>Date</th>
                                <th>Amount</th>
                            </tr>

                            <tr>
                                <td>{!! $salaryExpense->id !!}</td>
                                <td>{!! $salaryExpense->day !!}</td>
                                <td>{!! $salaryExpense->amount !!}</td>
                            </tr>
                        </table>
                    @endforeach
                @endif
            </div>

            <div class="col-xs-12 col-sm-3"></div>
        </div>
@endsection