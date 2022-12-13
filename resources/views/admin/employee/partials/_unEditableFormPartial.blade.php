<div class="form-group">
    {!! Form::label('name', 'Name :') !!}
        {!! Form::text('name', null, ['class' => 'form-control', 'disabled']) !!}

</div>

<div class="form-group">
    {!! Form::label('lastname', 'Lastname :') !!}
    {!! Form::text('lastname', null, ['class' => 'form-control', 'disabled']) !!}
</div>

<div class="form-group">
    {!! Form::label('email', 'Email :') !!}
    {!! Form::text('email', null, ['class' => 'form-control', 'disabled']) !!}
</div>


<div class="form-group">
    @if($password)
        {!! Form::label('password', 'Password : ') !!}
        {!! Form::password('password', ['class' => 'form-control']) !!}
    @else
        {!! Form::label('Reset password') !!}
        {!! Html::link('/system/employee/password/edit', 'Reset password ?') !!}
    @endif
</div>

<div class="form-group">
    {!! Form::label('nic', 'NIC : ') !!}
    {!! Form::text('nic', null, ['class' => 'form-control', 'disabled']) !!}
</div>

<div class="form-group">
    {!! Form::label('dob', 'Date of Birth : ') !!}
    {!! Form::datetimeLocal('dob', null, ['class' => 'form-control', 'disabled']) !!}
</div>

<div class="form-group">
    {!! Form::label('basic', 'Basic Salary') !!}
    {!! Form::text('basic', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('address', 'Address') !!}
    {!! Form::text('address', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('hour_rate', 'Hour Rate : ') !!}
    {!! Form::text('hour_rate', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('Access type : ') !!}
    <small>For MultiSelect use with Ctrl + Mouse</small>
    {!! Form::select('type_lists[]', $type_lists, null, ['multiple', 'class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('Employee Type : ') !!}
    <small>For MultiSelect use with Ctrl + Mouse</small>
    {!! Form::select('employee_types[]', $employee_type, null, ['multiple', 'class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('gender') !!}
    {!! Form::select('gender', [0 => 'female', 1 => 'male'], null, ['class' => 'form-control', 'disabled']) !!}
</div>

<div class="form-group">
    @if($terminate)
        {!! Form::label('terminated', 'is Terminated : ') !!}
        {!! Form::checkbox('terminated') !!}
    @endif
</div>

<br/>
<br/>

{!! Form::submit($btn, ['class' => 'btn btn-default btn-block']) !!}