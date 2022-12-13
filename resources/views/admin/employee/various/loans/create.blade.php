@extends('layouts.MainLayOutNav')

@section('content')
        <div class="row">
            <div class="col-sm-12 col-md-9">
                <h3>Add Loan to a Employee</h3>

                @include('notifications._message')

                {!! Form::open(['id' => 'form']) !!}

                <div class="form-group">
                    {!! Form::label('loan_name_lists', 'Loan Name : ') !!}
                    {!! Form::select('loan_name_lists', $loan_name_lists, null, ['class' => 'form-control']) !!}
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
                    {!! Form::label('amount', 'Amount :') !!}
                    {!! Form::text('amount', null, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('decrement', 'Decrement :') !!}
                    {!! Form::text('decrement', null, ['class' => 'form-control']) !!}
                </div>

                {!! Form::submit('Add loan', ['class' => 'btn btn-default']) !!}
                {!! Form::close() !!}

                <div class="data hidden">
                    <br/>
                    <br/>
                    <h4>Current Loans</h4>
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
            var url = "/api/secured/employee/loans/";
            $.ajax({
                type: "GET",
                url: url + UserID,
                dataType: "json",
                success: function (data) {
                    var loopedData = "";
                    for (i = 0; i < data.length; i++) {
                        loopedData += '' +
                                '<li>' +
                                'Loan number :'
                                + data[i].id +
                                ' | Amount is : '
                                + data[i].amount +
                                ' | Remains : '
                                + data[i].remaining +
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
                loan_name_lists: {
                    validators: {
                        notEmpty: {
                            message: 'You should select a type !'
                        }
                    }
                },
                employee_names: {
                    validators: {
                        notEmpty: {
                            message: 'You should eneter employee name'
                        }
                    }
                },
                amount: {
                    validators: {
                        notEmpty: {
                            message: 'You should an amount'
                        },
                        greaterThan: {
                            value: 0,
                            message: 'Amount should be greater than 0'
                        }
                    }
                },
                decrement: {
                    validators: {
                        notEmpty: {
                            message: 'You should enter an decrement value'
                        },
                        greaterThan: {
                            value: 0,
                            message: 'You should enter a value greater than 0'
                        }
                    }
                }
            }
        })

    </script>
@endsection