@extends('layouts.MainLayOutNav')
@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="view-header">
                <div class="pull-right text-right" style="line-height: 14px">
                    <small>Lotus Tour Management<br>Package<br> <span class="c-white">v.1.0</span></small>
                </div>
                <div class="header-icon">
                    <i class="page-header-icon fa fa-briefcase"></i>
                </div>
                <div class="header-title">
                    <h3 class="m-b-xs">Package Management System</h3>
                </div>
            </div>
            <hr>
        </div>
    </div>

    <br/>

    <div class="row">
        <div class="col-md-9">
            <h2>Add Package</h2>
            @include('notifications._message')
            {!! Form::open(['action' => 'Package\PackageController@store', 'id' => 'form']) !!}
            @include('admin.package.partials._formPartial',['btn' => 'Add Package'])
        </div>
    </div>

@endsection


@section('js')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#form').formValidation({
                framework: 'bootstrap',
                icon: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    code: {
                        validators: {
                            notEmpty: {
                                message: "Package Code should not be empty"
                            },
                            stringLength: {
                                min: 5,
                                max: 5,
                                message: "Package code should be 5 characters"
                            }
                        }
                    },
                    country: {
                        validators: {
                            notEmpty: {
                                message: "Country should not be empty"
                            }
                        }
                    },
                    name: {
                        validators: {
                            notEmpty: {
                                message: "Package name should not be empty"
                            },
                            stringLength: {
                                min: 5,
                                max: 5,
                                message: "Package name should be 5 characters"
                            }
                        }
                    },
                    destination: {
                        validators: {
                            notEmpty: {
                                message: {
                                    message: "Destination should not be empty !"
                                }
                            },
                            stringLength: {
                                min: 3,
                                max: 50,
                                message: "The destination should be around 10 - 50"
                            }
                        }
                    }
                }
            })
        });
    </script>
@endsection