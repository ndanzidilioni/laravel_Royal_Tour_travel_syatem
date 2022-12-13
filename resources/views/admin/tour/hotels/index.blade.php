@extends('layouts.MainLayOutNav')

@section('content')

    <div class="row">
        <div class="col-sm-12 col-md-9">
            <h3>List of All Hotels
                <br />
                <small><a href="{!! url('/system/tour/hotels/create') !!}">Add Hotel</a></small>
            </h3>

            <br/>

            <table class="table table-responsive">

                <tr>
                    <th>Hotel ID</th>
                    <th>Hotel Name</th>
                    <th>Hotel City</th>
                    <th>Hotel Hotel Charges</th>
                    <th>Hotel Contact</th>
                    <th>Edit</th>
                </tr>

                @foreach($hotels as $hotel)
                    <tr>
                        <td>{!! $hotel->id !!}</td>
                        <td>{!! $hotel->name !!}</td>
                        <td>{!! $hotel->city !!}</td>
                        <td>{!! $hotel->expenses !!}</td>
                        <td>{!! $hotel->phone !!}</td>
                        <td><a href="{!! url('/system/tour/hotels/'.$hotel->id.'/edit') !!}">Edit</a></td>
                    </tr>
                @endforeach

            </table>

        </div>
    </div>
@endsection
