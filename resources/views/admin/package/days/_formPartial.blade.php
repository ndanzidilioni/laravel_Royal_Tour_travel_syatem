<div class="form-group">
    {!! Form::label('day', 'Day Number  : ') !!}
    {!! Form::text('day', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('description', 'Description for the day : ') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::submit('Add a Day', ['class' => 'btn btn-block btn-accent']) !!}
</div>