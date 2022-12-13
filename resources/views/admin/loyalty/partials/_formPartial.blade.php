{!! Form::label('loyalty', 'Loyalty :') !!}
{!! Form::text('type', null, ['class' => 'form-control']) !!}

<br/>
{!! Form::label('description', 'Description:') !!}
{!! Form::text('description', null, ['class' => 'form-control']) !!}

<br />
{!! Form::label('discount', 'Discounts :') !!}
{!! Form::text('discount', null, ['class' => 'form-control']) !!}

<br />
{!! Form::submit($btn, ['class' => 'btn btn-default btn-block']) !!}