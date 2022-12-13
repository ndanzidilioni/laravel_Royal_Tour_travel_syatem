@extends('layouts.MainLayOutNav')

@section('content')
        <div class="row">
            <div class="col-xs-12 col-md-9">
                <h3>Add a QuickBook Record</h3>
                @include('notifications._message')
                {!! Form::open(['action' => 'Accounts\QuickBookController@store', 'id' => 'form']) !!}
                    @include('admin.accounts.quickbook.partials._formPartial', ['btn' => 'Add a QuickBook record'])
                {!! Form::close() !!}
            </div>
        </div>
@endsection

@section('js')
    <script type="text/javascript">
        $(document).ready(function () {
            $('#form').formValidation({
                framework: 'bootstrap',
                icon: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    amount: {
                        validators: {
                            notEmpty: {
                                message: 'Amount Should not be kept empty'
                            },
                            greaterThan: {
                                value: 0,
                                message: 'Amount Should be more than 0'
                            },
                            integer: {
                                message: 'You can enter only numbers'
                            }
                        }
                    },
                    description: {
                        validators: {
                            notEmpty: {
                                message: 'Description should not be empty'
                            },
                            stringLength: {
                                min: 30,
                                message: 'You should at least enter 30 characters !'
                            }
                        }
                    }
                }
            })
        })
    </script>
@endsection