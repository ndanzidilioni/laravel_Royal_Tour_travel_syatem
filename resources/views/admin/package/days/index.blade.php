@extends('layouts.MainLayOutNav')

@section('content')
    <div class="row">
        <div class="col-xs-9">
            <h3>Add Days to Package
                <br/>
                <small>package id : {!! $pkg->id !!}</small>
            </h3>

            <br/>

            <h4>List of day details</h4>
            @if($pkg->details->isEmpty())
                <p>No Additional information on this Package</p>
            @else
                <table class="table table-responsive table-bordered">
                    <tr>
                        <th>Day Number</th>
                        <th>Day Description</th>
                    </tr>
                    @foreach($pkg->details as$day)
                        <tr>
                            <td>{!! $day->day !!}</td>
                            <td>{!! $day->description !!}</td>
                        </tr>
                    @endforeach
                </table>
            @endif
        </div>
    </div>
@endsection