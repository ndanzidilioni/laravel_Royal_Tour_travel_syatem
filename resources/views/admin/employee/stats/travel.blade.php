@extends('layouts.MainLayOutNav')

@section('content')
        <div class="row">
            <div class="col-xs-12 col-md-9">
                <h2>Employee Travels<br /></h2>
                @if($travels->isEmpty())
                    <p>You have no travels to show</p>
                @else
                    <table class="table table-responsive table-bordered">
                        <tr>
                            <th>Date</th>
                            <th>Amount</th>
                        </tr>
                        @foreach($travels as $travel)
                            <tr>
                                <td>{!! $travel->date !!}</td>
                                <td>{!! $travel->amount !!}</td>
                            </tr>
                        @endforeach
                    </table>
                @endif
            </div>

            @include('admin.employee.stats._statPartial')
        </div>
@endsection