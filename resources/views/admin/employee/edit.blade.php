@extends('layouts.MainLayOutNav')

@section('content')
    <div class="row">
        <div class="col-sm-12 col-md-9">
            @include('notifications._message')
            <h2>Edit Employee
                <br/>
                <small>Employee ID : {!! $employee->id !!}</small>
            </h2>
            <br/>

            {!! Form::model($employee, ['method' => 'PATCH', 'action' => ['Employee\EmployeeController@update', $employee->id], 'id' => 'form']) !!}
            @include('admin.employee.partials._unEditableFormPartial', ['btn' => 'Update Employee', 'password' => false, 'terminate' => true])
            {!! Form::close() !!}

        </div>
    </div>
@endsection

@section('js')
    <script>
        $('#form').formValidation({
            framework: 'bootstrap',
            icon: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
//                name: {
//                    validators: {
//                        notEmpty: {
//                            message: 'Name should not be empty'
//                        },
//                        regexp: {
//                            regexp: /^[a-z\s]+$/i,
//                            message: 'The name can consist of alphabetical characters and spaces only'
//                        }
//                    }
//                },
//                lastname: {
//                    validators: {
//                        notEmpty: {
//                            message: 'Last Name should be empty !'
//                        },
//                        regexp: {
//                            regexp: /^[a-z\s]+$/i,
//                            message: 'The last name can consist of alphabetical characters and spaces only'
//                        }
//                    }
//                },
//
//                email: {
//                    validators: {
//                        notEmpty: {
//                            message: 'Email should be empty'
//                        },
//                        emailAddress: {
//                            message: 'Should be a valid email address'
//                        }
//                    }
//                },
//
//                nic: {
//                    validators: {
//                        notEmpty: {
//                            message: 'NIC Shouldnt be Empty'
//                        },
//                        regexp: {
//                            regexp: /^[0-9]{9}[vVxX]$/,
//                            message: 'NIC is in wrong format'
//                        }
//                    }
//                },

                basic: {
                    validators: {
                        notEmpty: {
                            message: 'Basic salary should be empty '
                        },
                        greaterThan: {
                            value: 8000,
                            message: 'Basic salary should be greater than 8000'
                        }
                    }
                },

                address: {
                    validators: {
                        notEmpty: {
                            message: 'Address should not be empty'
                        },
                        stringLength: {
                            min: 10,
                            message: 'This does not look like an valid address'
                        }
                    }
                },

                hour_rate: {
                    validators: {
                        notEmpty: {
                            message: 'Hourly Rate should not be empty !'
                        },
                        greaterThan: {
                            value: 0,
                            message: 'Hourly rate should be less than 0'
                        }
                    }
                },

//                gender: {
//                    validators: {
//                        notEmpty: {
//                            message: 'Gender should be selected !'
//                        },
//                    }
//                }

            }
        });
    </script>
@endsection