<div class="form-group">
    {!! Form::label('name', 'Over Time Name : ') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('rate', 'OT Rate') !!}
    {!! Form::number('rate', null, ['class' => 'form-control', 'min' => 0]) !!}
</div>

<div class="form-group">
    {!! Form::submit($btn, ['class' => 'btn btn-block btn-accent']) !!}
</div>