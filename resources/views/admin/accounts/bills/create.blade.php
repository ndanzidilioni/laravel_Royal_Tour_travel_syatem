@extends('layouts.MainLayOutNav')

@section('content')
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-9">
            <h3>Add a Bill to System
                <br>
                <small>for {!! $today->format('F Y') !!}</small>
            </h3>

            <br/>

            {!! Form::open(['action' => 'Accounts\BillController@store', 'id' => 'form']) !!}
            <div class="form-group">
                {!! Form::label('type', 'Bill Type : ') !!}
                {!! Form::select('type', $types, null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('bill_no', 'Bill Number : ') !!}
                {!! Form::text('bill_no', null , ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('amount', 'Amount : ') !!}
                {!! Form::number('amount', null, ['class' => 'form-control', 'min' => 0]) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Add Bill', ['class' => 'btn btn-accent btn-block']) !!}
            </div>

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
                    type: {
                        validators: {
                            notEmpty: {
                                message: 'You should select a bill type'
                            }
                        }
                    },
                    bill_no: {
                        validators: {
                            notEmpty: {
                                message: 'You should not keep the bill number empty'
                            },
                            stringLength: {
                                min: 3,
                                message: 'You should enter a valid bill number'
                            }
                        }
                    },
                    amount: {
                        validators: {
                            notEmpty: {
                                message: 'You cant keep the amount empty !'
                            },
                            greaterThan: {
                                value: 0,
                                message: 'You should enter a valid billed amount !'
                            }

                        }
                    }
                }
            });
        })
    </script>
@endsection