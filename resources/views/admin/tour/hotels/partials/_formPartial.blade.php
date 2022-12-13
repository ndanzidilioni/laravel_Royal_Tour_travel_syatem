<div class="form-group">
    {!! Form::label('name', 'Name :') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('phone', 'Phone : ') !!}
    {!! Form::text('phone', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('emai', 'Email : ') !!}
    {!! Form::text('email', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('city', 'City : ') !!}
    {!! Form::text('city', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('expenses', 'Expenses : ') !!}
    {!! Form::text('expenses', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::submit($btn, ['class' => 'btn btn-default btn-block']) !!}
</div>