@extends('layouts.MainLayOutNav')

@section('content')
        <div class="row">
            <div class="col-sm-12 col-md-9">

                @include('notifications._message')
                <h3>Add Leave to a Employee</h3>

                {!! Form::open(['id' => 'form']) !!}
                <div class="form-group">
                    {!! Form::label('leave_type_lists') !!}
                    {!! Form::select('leave_type_lists', $leave_type_lists, null, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('employee_names', 'Select employee : ') !!}
                    {!! Form::text('employee_names', null, ['class' => 'form-control']) !!}
                </div>

                <div class="ajax-result hidden">
                    <table class="table table-responsive">
                        <tr>
                            <th>Employee ID</th>
                            <th>Employee Name</th>
                        </tr>
                    </table>
                </div>

                <div class="form-group">
                    {!! Form::label('reason', 'Reason :') !!}
                    {!! Form::textarea('reason', null, ['class' => 'form-control']) !!}
                </div>

                {!! Form::submit('Add leave', ['class' => 'btn btn-default']) !!}
                {!! Form::close() !!}

                <div class="data hidden">
                    <br/>
                    <br/>
                    <h4>Current Leaves</h4>
                </div>
            </div>

        </div>

@endsection

@section('js')
    <script type="text/javascript">

        // Total AJAX Functionality
        $(document).on('keyup', '#employee_names', function () {

            // Clear Table if empty
            if ($('#employee_names').val() == " " || $('#employee_names').val() == "") {
                $('.ajax-result > table ').find("tr:gt(0)").remove();
                $('.ajax-result').addClass('hidden');
            }

            $('.ajax-result > table ').find("tr:gt(0)").remove();

            // Getters
            var textData = $('#employee_names').val();

            var url = '/api/secured/employee/name/' + textData;

            // Ajax Search and Table Population
            $.ajax({
                type: "GET",
                url: url,
                dataType: 'json',
                success: function (data) {
                    $('.ajax-result').removeClass('hidden');
                    for (i = 0; i < data.length; i++) {
                        $('.ajax-result > table ')
                                .append(
                                        '<tr data-id="' + data[i].id + '" data-name="' + data[i].name + '" class="table-row">' +
                                        '<td>' + data[i].id + '</td>' +
                                        '<td>' + data[i].name + '</td>'
                                        + '</tr>'
                                );
                    }
                }

            });

        });

        $(document).on('click', '.table-row', function () {
            if (confirm("Are you sure select this employee ?")) {
                $('#employee_names').val($(this).attr('data-id'));
                $('.ajax-result').addClass('hidden');
                ajaxUpdate($(this).attr('data-id'));
            }
        });

        function ajaxUpdate(UserID) {
            var url = "/api/secured/employee/leaves/";
            $.ajax({
                type: "GET",
                url: url + UserID,
                dataType: "json",
                success: function (data) {
                    var loopedData = "";
                    for (i = 0; i < data.length; i++) {
                        loopedData += '' +
                                '<li>' +
                                'Leave number :'
                                + data[i].id +
                                ' | Time : '
                                + data[i].time +
                                ' | Reason : '
                                + data[i].reason +
                                '</li>';
                    }

                    if (data.length != 0) {
                        $('.data').removeClass('hidden').append("<ul>" + loopedData + "</ul>");
                    }
                }
            });
        }

        $('#form').formValidation({
            framework: 'bootstrap',
            icon: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                leave_type_lists: {
                    validators: {
                        notEmpty: {
                            message: "You should select a type !"
                        }
                    }
                },
                employee_names: {
                    validators: {
                        notEmpty: {
                            message: 'You should not keep the employee name empty'
                        }
                    }
                },
                reason: {
                    validators: {
                        notEmpty: {
                            message: "Message should not be empty"
                        },
                        stringLength: {
                            min: 30,
                            message: 'You should enter a reason having more than 30 characters'
                        }
                    }
                }
            }
        });

    </script>
@endsection