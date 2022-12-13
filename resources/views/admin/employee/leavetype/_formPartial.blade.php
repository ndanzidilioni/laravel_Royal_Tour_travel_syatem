<div class="form-group">
    {!! Form::label('name', 'Over Time Name : ') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::submit($btn, ['class' => 'btn btn-block btn-accent']) !!}
</div>