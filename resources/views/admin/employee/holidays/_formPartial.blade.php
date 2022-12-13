<div class="form-group">
    {!! Form::label('ottype', 'Over Time Type : ') !!}
    {!! Form::select('ottype', $types, null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('start_day', 'Start Date') !!}
    {!! Form::date('start_day', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('end_day', 'Start Date') !!}
    {!! Form::date('end_day', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::submit('Add Holiday', ['class' => 'btn btn-block btn-accent']) !!}
</div>