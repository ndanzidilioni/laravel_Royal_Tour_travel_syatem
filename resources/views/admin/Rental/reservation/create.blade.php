@extends('layouts.MainLayOutNav')
@section('styles')
    {!! Html::style('css/rental/example.css') !!}
@endsection

@section('content')
    <div class="col-sm-3"></div>
    <div class="col-sm-6">
        <h1>Rental System</h1>
        <h2>Make A Reservation</h2>
        @include('notifications._message')



        <div id="ajax-search">
            {!! Form::text('search', null, ['class' => 'form-control', 'id' => 'search', 'placeholder' => 'Search Customer']) !!}
            <br/>
            <br/>

            <table class="ajax-table hidden table table-responsive">
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Middle Name</th>
                    <th>Last Name</th>
                    <th>NIC</th>
                    <th></th>
                </tr>
            </table>
        </div>


        {!! Form::open(['action' => 'Rental\ReservationController@store']) !!}
                        @include('admin.rental.reservation.partials._formPartial',['btn'=>'Add Reservation'])
        {!! Form::close() !!}
    </div>

@endsection


//js(ajax) for search


@section('js')
    <script type="text/javascript">
        var url = '/api/secured/rental/reservation/add/';

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
                                            '<td>' + data[i].fname + '</td>' +
                                            '<td>' + data[i].sname + '</td>' +
                                            '<td>' + data[i].lname + '</td>' +
                                            '<td>' + data[i].nic + '</td>' +
                                            '<td>' + '<button id="toText"> Add </button>' + '</td>' +
                                            '<tr>'
                                    );
                        }
                    }
                });
            }

        });
    </script>
@endsection
@section('js')
    <script type="text/javascript">

        $(document).ready(function () {
            $(document).on('click', "#toText", function() {
                console.log($(this));
            });
        });

    </script>
@endsection