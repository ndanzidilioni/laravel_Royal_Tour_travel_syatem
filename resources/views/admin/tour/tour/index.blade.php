@extends('layouts.MainLayOutNav')

@section('content')
    <div class="row">
        <div class="col-md-9">
            <h3>All Tours scheduled <br />
                <small>for month {!! \Carbon\Carbon::now()->format('F Y') !!}</small>
            </h3>

            <br>

            <table class="table table-responsive">
                <tr>
                    <th>Tour Code</th>
                    <th>Tour Name</th>
                    <th>Package Name</th>
                    <th>Arrival and Departure Dates</th>
                    <th>Availability Count</th>
                    <th>Manage Tour</th>
                </tr>

                @if($tours->isEmpty())
                    <tr>
                        <td colspan="5">Empty Tours</td>
                    </tr>
                @else
                    @foreach($tours as $tour)
                        <tr>
                            <td>{!! $tour->code !!}</td>
                            <td>{!! $tour->name !!}</td>
                            <td>{!! $tour->package->name !!}</td>
                            <td>{!! $tour->arrival !!} - {!! $tour->departure !!}</td>
                            <td>{!! $tour->coustomer_count !!}</td>
                            <td><a class="btn btn-accent" href="{!! url('/system/tour/manage/'.$tour->id.'/edit') !!}">Manage</a></td>
                        </tr>
                    @endforeach
                @endif

            </table>

        </div>
    </div>
@stop
