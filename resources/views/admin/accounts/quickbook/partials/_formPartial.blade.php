<div class="form-group">
    {!! Form::label('type', 'Expense or Income') !!}
    {!! Form::select('type', [0 => 'expense', 1 => 'income'], null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('amount', 'Amount : ') !!}
    {!! Form::number('amount', null, ['class' => 'form-control', 'min' => 0]) !!}
</div>

<div class="form-group">
    {!! Form::label('description', 'Description :') !!}
    {!! Form::textarea('description', null,['class'=> 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::submit($btn, ['class' => 'btn btn-block btn-accent']) !!}
</div>