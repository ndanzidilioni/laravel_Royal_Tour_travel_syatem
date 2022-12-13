@extends('layouts.MainLayOutNav')

@section('content')
    <div class="row">
        <div class="col-sm-12 col-md-9">
            <h2>Employee List
                <br/>
                <small><a href="{!! url('/system/employee/create') !!}">Add Employee</a></small>
            </h2>

            <br/>

            <div id="ajax-search">
                {!! Form::text('search', null, ['class' => 'form-control', 'id' => 'search', 'placeholder' => 'Search Employees']) !!}

                <br/>
                <br/>

                <table class="ajax-table hidden table table-responsive">
                    <tr>
                        <th>Employee ID</th>
                        <th>Employee Name</th>
                        <th>Profile Card</th>
                    </tr>
                </table>
            </div>

            <br/>
            <br/>
            <br/>

            <table class="table table-responsive">
                <tr>
                    <th>Employee ID</th>
                    <th>Name</th>
                    <th>System Limit</th>
                    <th>Job Role</th>
                    <th></th>
                </tr>
                @foreach($employees as $employee)
                    <tr>
                        <td>{!! $employee->id !!}</td>
                        <td>{!! $employee->name !!}</td>
                        <td>
                            <ul>
                                @foreach($employee->admin as $type)
                                    <li>{!! $type->type !!} &nbsp;</li>
                                @endforeach
                            </ul>
                        </td>

                        <td>
                            <ul>
                                @foreach($employee->employee_type as $role)
                                    <li> {!! $role->name !!} &nbsp; </li>
                                @endforeach
                            </ul>
                        </td>

                        <td>
                            <a href="{!! url('/system/employee/'.$employee->id.'/') !!}" class="btn btn-default">
                                view employee
                            </a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>

        <div class="col-sm-12 col-md-3">
            <h4>Admin / Management Options</h4>
            <ul class="list-group">
                <li class="list-group-item">
                    <a href="{!! url('/system/admin/employee/loan/create/') !!}">Allocate a loan</a>
                </li>
                <li class="list-group-item">
                    <a href="{!! url('/system/admin/employee/leave/create') !!}">Allocate a leave</a>
                </li>
                <li class="list-group-item">
                    <a href="{!! url('/system/admin/employee/advance/create') !!}">Allocate an advance payment</a>
                </li>
            </ul>
        </div>

    </div>
@endsection

@section('js')
    <script type="text/javascript">
        var url = '/api/secured/employee/name/';

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
                                            '<td>' + '<a href="/system/employee/' + data[i].id + '">View Profile</a>' + '</td>' +
                                            '<tr>'
                                    );
                        }
                    }
                });
            }

        });
    </script>
@endsection