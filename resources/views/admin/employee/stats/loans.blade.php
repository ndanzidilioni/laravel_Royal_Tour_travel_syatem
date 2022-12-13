@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-9">
                <h2>Employee Loans<br /></h2>
                @if($loans->isEmpty())
                    <p>You have take no loans</p>
                @else
                    <table class="table table-responsive">
                        <tr>
                            <th>Loan Amount</th>
                            <th>Monthly Decrement</th>
                            <th>Rate</th>
                            <th>Installment</th>
                        </tr>
                        @foreach($loans as $loan)
                            <tr>
                                <td>{!! $loan->amount !!}</td>
                                <td>{!! $loan->decrement !!}</td>
                                <td>{!! $loan->type->rate !!}</td>
                                <td>{!! $loan->type->installment !!}</td>
                            </tr>
                        @endforeach
                    </table>
                @endif
            </div>
        </div>
    </div>
@endsection