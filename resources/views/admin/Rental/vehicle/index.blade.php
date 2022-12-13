@extends('layouts.MainLayOutNav')

@section('content')

    <div class="row">

        <div class="col-md-9 col-xs-12 col-sm-12">
            @include('notifications._message')
            <h2>Vehicle List
                <br/>
                <small>
                    <a href="{!! url('/system/rental/vehicle/create') !!}">Add Vehicle</a>
                </small>
            </h2>

            <br/>

            <div id="ajax-search">
                {!! Form::text('search', null, ['class' => 'form-control', 'id' => 'search', 'placeholder' => 'Search Vehicle']) !!}

                <br/>
                <br/>

                <table class="ajax-table hidden table table-responsive">
                    <tr>
                        <th>Vehicle ID</th>
                        <th>Vehicle Name</th>
                        <th>Added Date</th>
                        <th>Availability</th>
                        <th></th>
                    </tr>
                </table>
            </div>


            <table class="table table-responsive">
                <tr>
                    <th>Vehicle ID</th>
                    <th>Name</th>
                    <th>Registered No</th>
                    <th>Manufactured Year</th>
                    <th>Color</th>
                    <th>Type</th>
                    <th>Body Type</th>
                    <th>Cost Per Day</th>
                    <th>Terminated</th>
                    <th></th>
                </tr>

                @foreach($vehicles as $vehicle)
                    <tr>
                        <td>{!! $vehicle->id !!}</td>
                        <td>{!! $vehicle->vehicle_name !!}</td>
                        <td>{!! $vehicle->reg_no !!}</td>
                        <td>{!! $vehicle->m_year !!}</td>
                        <td>{!! $vehicle->color !!}</td>
                        <td>{!! $vehicle->type !!}</td>
                        <td>{!! $vehicle->b_type !!}</td>
                        <td>{!! $vehicle->cost_per_day !!}</td>
                        <td>{!! $vehicle->terminated !!}</td>
                        <td></td>
                        <td>
                            <a href="{!! url('/system/rental/vehicle/'.$vehicle->id.'/edit') !!}"
                               class="btn btn-default">
                                view vehicle
                            </a>
                        </td>
                        <td>
                            <a href="{!! url('/system/rental/reservation/create',$vehicle->vehicle_name) !!}"
                               class="btn btn-default">
                                make reservation
                            </a>
                        </td>
                    </tr>
                @endforeach
            </table>

        </div>
    </div>

@endsection


@section('js')
    <script type="text/javascript">
        var url = '/api/secured/rental/vehicle/name/';

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
                                            '<td>' + data[i].vehicle_name+ '</td>' +
                                            '<td>' + data[i].created_at+ '</td>' +
                                            '<td>' + data[i].terminated+ '</td>' +
                                            '<td>' + '<a href="/system/rental/vehicle/' + data[i].id + '/edit">View Vehicle</a>' + '</td>' +
                                            '<tr>'
                                    );
                        }
                    }
                });
            }

        });
    </script>
@endsection