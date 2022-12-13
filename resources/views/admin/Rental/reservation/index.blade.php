@extends('layouts.MainLayOutNav')


@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-9">
                @include('notifications._message')
                <h2>Reservation List
                    <br />
                    <small><a href="{!! url('/system/rental/reservation/create') !!}">Add Reservation</a></small>
                </h2>


                <!--search Box and Results table-->

                <div id="ajax-search">
                    {!! Form::text('search', null, ['class' => 'form-control', 'id' => 'search', 'placeholder' => 'Search Reservation By Date']) !!}

                    <br/>
                    <br/>

                    <table class="ajax-table hidden table table-responsive">
                        <tr>
                            <th>Reservation ID</th>
                            <th>Start_date</th>
                            <th>End_date</th>
                            <th>Destination</th>
                            <th>Customer </th>
                            <th></th>
                        </tr>
                    </table>
                </div>

                <table class="table table-responsive">
                    <tr>
                        <th>Reservation ID</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>No of Days</th>
                        <th>Total Cost</th>
                        <th>Driver Name</th>
                        <th>Destination</th>
                        <th></th>
                    </tr>

                    @foreach($reservations as $reservation)
                        <?php

                        $x = \App\User::find($reservation->driver_id);

                        ?>

                        <tr>
                            <td>{!! $reservation->id !!}</td>
                            <td>{!! $reservation->start_date!!}</td>
                            <td>{!! $reservation->end_date !!}</td>
                            <td>{!! $reservation->start_date->diffInDays($reservation->end_date, false) !!}</td>
                            <td>{!! $reservation->start_date->diffInDays($reservation->end_date, false)*1200 !!}</td>
                            <td>{!! $x->name !!}</td>
                            <td>{!! $reservation->destination !!}</td>
                            <td></td>
                            <td>
                                <a href="{!! url('/system/rental/reservation/'.$reservation->id.'/edit') !!}"
                                   class="btn btn-default">
                                    view reservation
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </table>


            </div>
            <div class="col-md-12"></div>
        </div>
    </div>
@endsection

//js(ajax) for search


@section('js')
    <script type="text/javascript">
        var url = '/api/secured/rental/reservation/date/';

        var typingTimer;                //timer identifier

        var doneTypingInterval = 250;  //time in ms (5 seconds)

        $(document).on('keyup', '#search', function () {

            clearTimeout(typingTimer);

            var value = $('#search').val();

            if (value == "" || value == " ") {
                $('.ajax-table').find("tr:gt(0)").remove().addClass('hidden');
            } else {
                typingTimer = setTimeout(doneTyping, doneTypingInterval);
            }

            function doneTyping() {
                $('.ajax-table').find("tr:gt(0)").remove();

                $.ajax({
                    type: "GET",
                    url: url + value,
                    dataType: "json",
                    success: function (data) {
                        $('.ajax-table').removeClass('hidden');
                        for (i = 0; i < data.length; i++) {
                            $('.ajax-table')
                                    .append(
                                            '<tr>' +
                                            '<td>' + data[i].id + '</td>' +
                                            '<td>' + data[i].start_date + '</td>' +
                                            '<td>' + data[i].end_date + '</td>' +
                                            '<td>' + data[i].destination + '</td>' +
                                            '<td>' + data[i].customer_id + '</td>' +
                                            '<td>' + '<a href="/system/rental/reservation/' + data[i].id + '/edit">View Reservation</a>' + '</td>' +
                                            '<tr>'
                                    );
                        }
                    }
                });
            }

        });
    </script>
@endsection
