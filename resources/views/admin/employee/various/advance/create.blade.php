@extends('layouts.MainLayOutNav')

@section('styles')
    {!! Html::style('css/formValidation.min.css') !!}
@endsection

@section('content')

    <div class="row">
        <div class="col-sm-12 col-md-9">
            @include('notifications._message')
            <h3>Add Advance payment to a Employee</h3>
            {!! Form::open(['id' => 'searchForm']) !!}


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

            {!! Form::submit('Add Advance Payment', ['class' => 'btn btn-default']) !!}
            {!! Form::close() !!}

            <div class="data hidden">
                <br/>
                <br/>
                <h4>Current Advance payments</h4>
            </div>

        </div>
    </div>

@endsection

@section('js')

    <script type="text/javascript">
        $(document).ready(function () {

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
                var url = "/api/secured/employee/advance/";
                $.ajax({
                    type: "GET",
                    url: url + UserID,
                    dataType: "json",
                    success: function (data) {
                        var loopedData = "";
                        for (i = 0; i < data.length; i++) {
                            loopedData += '' +
                                    '<li>' +
                                    'Advance payment number :'
                                    + data[i].id +
                                    ' | Amount : '
                                    + data[i].amount +
                                    '</li>';
                        }
                        if (data.length != 0) {
                            $('.data').removeClass('hidden').append("<ul>" + loopedData + "</ul>");
                        }
                    }
                });
            }

            $('#searchForm').formValidation({
                framework: 'bootstrap',
                icon: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    employee_names: {
                        validators: {
                            notEmpty: {
                                message: "Name shouldn't be empty !"
                            },
                            regexp: {
                                regexp: /^[a-z\s]+$/i,
                                message: 'The name can consist of alphabetical characters and spaces only'
                            }
                        }
                    },
                    amount: {
                        validators: {
                            notEmpty: {
                                message: "You cant leave amount empty"
                            },
                            greaterThan: {
                                value: 0,
                                message: 'The amount should be greater than 0 !'
                            }
                        }
                    }
                }
            })
        });
    </script>
@endsection