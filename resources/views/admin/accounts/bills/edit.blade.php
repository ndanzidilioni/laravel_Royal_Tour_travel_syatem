
@extends('layouts.MainLayOutNav')

@section('content')
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-9">
            <h3>Edit Bill <br/>
                <small>#{!! $bill->bill_no !!}</small>
            </h3>

            <br>

            @include('notifications._message')
            {!! Form::model($bill, ['method' => 'PATCH', 'action' => ['Accounts\BillController@update', $bill->id], 'id' => 'form']) !!}
            <div class="form-group">
                {!! Form::label('type', 'Bill Type : ') !!}
                {!! Form::select('type', $types, [$bill->type], ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('bill_no', 'Bill Number : ') !!}
                {!! Form::text('bill_no', null, ['class' => 'form-control', 'disabled']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('amount', 'Amount :') !!}
                {!! Form::number('amount', null, ['class' => 'form-control', 'min' => 0, 'disabled']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('date') !!}
                {!! Form::date('date', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Save Bill', ['class' => 'btn btn-block btn-accent', 'onclick' => 'return confirm("Are you sure to update this Bill ?")']) !!}
            </div>
            {!! Form::close() !!}
        </div>

        <div class="col-xs-12 col-sm-12 col-md-3">
            {!! Form::open(['method' => 'DELETE', 'action' => ['Accounts\BillController@destroy', $bill->id]]) !!}
                {!! Form::submit('Remove this bill', ['class' => 'btn btn-danger', 'onclick' => 'return confirm("Are you sure to remove this bill ?")']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@endsection

@section('js')
    <script type="text/javascript">
        $(document).read(function () {
            $('#form').formValidation({
                framework: 'boostrap',
                icon: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    type: {
                        validators: {
                            notEmpty: {
                                message: "Type should not be empty"
                            }
                        }
                    },
                    date: {
                        validators: {
                            notEmpty: {
                                message: 'The date should not be empty'
                            },
                            date: {
                                message: 'Should be a proper date format',
                                separator: '/'
                            }
                        }
                    }
                }
            })
        });
    </script>
@endsection