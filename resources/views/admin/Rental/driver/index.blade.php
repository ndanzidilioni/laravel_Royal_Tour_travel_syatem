@extends('layouts.MainLayOutNav')

@section('content')

        <div class="row">

            <div class="col-md-9 col-xs-12 col-sm-12">
                <h2>Driver List
                    <br />
                    <small><a href="{!! url('/system/rental/driver/create') !!}">Add Driver</a></small>
                </h2>
                @include('notifications._message')

                <br />

                <!--search Box and Results table-->

                <div id="ajax-search">
                    {!! Form::text('search', null, ['class' => 'form-control', 'id' => 'search', 'placeholder' => 'Search Driver']) !!}

                    <br/>
                    <br/>

                    <table class="ajax-table hidden table table-responsive">
                        <tr>
                            <th>Driver ID</th>
                            <th>Driver Name</th>
                            <th>Email</th>
                            <th></th>
                        </tr>
                    </table>
                </div>


                <table class="table table-responsive">
                    <tr>
                        <th>Driver ID</th>
                        <th>Name</th>
                        <th>Basic Salary</th>
                        <th>NIC</th>
                        <th>Age</th>
                        <th>Address</th>
                        <th>Availability</th>
                        <th></th>
                    </tr>

                    @foreach($users as $user)

                        <tr>
                            <td>{!! $user->id !!}</td>
                            <td>{!! $user->name !!}</td>
                            <td>{!! $user->basic !!}</td>
                            <td>{!! $user->nic !!}</td>
                            <td>{!! $user->age !!}</td>
                            <td>{!! $user->address !!}</td>
                            <td>{!! $user->terminated !!}</td>
                            <td></td>
                            <td>
                                <a href="{!! url('/system/rental/driver/'.$user->id.'/edit') !!}" class="btn btn-default">
                                    view driver
                                </a>
                            </td>
                            <td>
                                <a href="{!! url('/system/rental/'.$user->id.'/edit') !!}" class="btn btn-default">
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
        var url = '/api/secured/rental/driver/name/';

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
                                            '<td>' + data[i].name + '</td>' +
                                            '<td>' + data[i].email + '</td>' +
                                            '<td>' + '<a href="/system/rental/driver/' + data[i].id + '/edit">View Profile</a>' + '</td>' +
                                            '<tr>'
                                    );
                        }
                    }
                });
            }

        });
    </script>
@endsection