<div class="form-group">
    {!! Form::label('registeredNo', 'Registered No :') !!}
    {!! Form::text('registered', null, ['class' => 'form-control','disabled']) !!}
</div>
<div class="form-group">
    {!! Form::label('name', 'Name :') !!}
    {!! Form::text('name', null, ['class' => 'form-control','disabled']) !!}
</div>
<div class="form-group">
    {!! Form::label('number','Contact  Number :') !!}
    {!! Form::text('number', null,['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('email','Email :') !!}
    {!! Form::text('email', null,['class' => 'form-control' ]) !!}
</div>
{!! Form::submit($btn, ['class' => 'btn btn-default btn-block']) !!}