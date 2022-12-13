<div class="form-group">
    {!! Form::label('name', 'Name :') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'disabled']) !!}
</div>

<div class="form-group">
    {!! Form::label('lastname', 'Lastname : ') !!}
    {!! Form::text('lastname', null, ['class' => 'form-control', 'disabled']) !!}
</div>


<div class="form-group">
    {!! Form::label('email', 'Email : ') !!}
    {!! Form::text('email', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('nic', 'National Identity Card : ') !!}
    {!! Form::text('nic', null, ['class' => 'form-control', 'disabled']) !!}
</div>

<div class="form-group">
    {!! Form::label('basic', 'Basic : ') !!}
    {!! Form::text('basic', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('gender','Gender :') !!}
    {!! Form::select('gender',[1 => 'Male', 0 => 'Female'], null, ['class' => 'form-control', 'disabled']) !!}
</div>

<div class="form-group">
    {!! Form::label('hired_date', 'Hire Date : ') !!}
    {!! Form::date('hired_date', \Carbon\Carbon::now()->toDateString(), ['class' => 'form-control', 'disabled']) !!}
</div>

<div class="form-group">
    {!! Form::submit($btn, ['class' => 'btn btn-default btn-block']) !!}
</div>