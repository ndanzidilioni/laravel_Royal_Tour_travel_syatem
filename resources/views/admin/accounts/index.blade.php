@extends('layouts.MainLayOutNav')

@section('content')
        <div class="row">
            <div class="col-xs-12 col-sm-9">
                <h3>Account Overview</h3>

                <ol>
                    <li><a href="{!! url('/system/accounts/graphs/') !!}">View Graphs</a></li>
                    <li><a href="{!! url('/system/accounts/quickbook/') !!}">Access QuickBook</a></li>
                </ol>

                <br/>
                <br/>

                <h3>Income and Expenses of the Month <br/>
                    <small>{!! \Carbon\Carbon::today()->format('F Y') !!}</small>
                </h3>
                @if($expenses->count() <= 0)
                    <p>Nothing found to display !</p>
                @else
                    @for($i = 0; $i < $expenses->count(); $i++)
                        <table class="table-bordered table table-responsive">
                            <tr>
                                <th>Day</th>
                                <th>Income</th>
                                <th>Expense</th>
                                <th>Options</th>
                            </tr>
                            <tr>
                                <td>{!! $expenses[$i]->day !!}</td>
                                <td>{!! $expenses[$i]->expense !!}</td>
                                <td>{!! $incomes[$i]->income !!}</td>
                                <td>
                                    <div class="btn-group">
                                        <a class="btn btn-xs btn-accent"
                                           href="{!! url('/system/accounts/stats/'.$expenses[$i]->id.'/expense') !!}">Related
                                            Expenses</a>
                                        <a class="btn btn-xs btn-accent"
                                           href="{!! url('/system/accounts/stats/'.$expenses[$i]->id.'/income') !!}">Related
                                            Income</a>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    @endfor
                @endif

            </div>

            <div class="col-xs-12 col-sm-3">
                <a href="{!! url('/system/accounts/calculate/income') !!}">Demo income</a>
                <br>
                <a href="{!! url('/system/accounts/calculate/expense') !!}">Demo expense</a>
            </div>
        </div>
@endsection