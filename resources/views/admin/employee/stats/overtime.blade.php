@extends('layouts.MainLayOutNav')

@section('content')
        <div class="row">
            <div class="col-xs-12 col-md-9">
                <h2>Employee Over Times<br /></h2>
                @if($overtimes->isEmpty())
                    <p>You have not worked over time</p>
                @else
                    <table class="">
                        <tr>
                            <th>Date</th>
                            <th>Pay</th>
                            <th>Hours</th>
                        </tr>
                        @foreach($overtimes as $overtime)
                            <tr>
                                <td>{!! $overtime->created_at->toDateString() !!} </td>
                                <td>{!! $overtime->hours !!} </td>
                                <td>{!! $overtime->pay !!} </td>
                            </tr>
                        @endforeach
                    </table>
                @endif
            </div>
            @include('admin.employee.stats._statPartial')
        </div>

@endsection