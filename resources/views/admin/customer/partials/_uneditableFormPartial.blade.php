<?php
    $disable='disabled';
?>

<div class="form-group">
    {!! Form::label('fname', 'First Name :') !!}
    {!! Form::text('fname', null, ['class' => 'form-control',$disable]) !!}
</div>
<div class="form-group">
    {!! Form::label('sname', 'Second Name :') !!}
    {!! Form::text('sname', null, ['class' => 'form-control',$disable]) !!}
</div>
<div class="form-group">
    {!! Form::label('lname', 'Last Name :') !!}
    {!! Form::text('lname', null, ['class' => 'form-control',$disable]) !!}
</div>
<div class="form-group">
    {!! Form::label('otherName','Other Name :') !!}
    {!! Form::text('otherName', null,['class' => 'form-control' ]) !!}
</div>

<div class="form-group">
    {!! Form::label('phoneNumber','Phone Number :') !!}
    {!! Form::text('number', null,['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('nic','NIC Number') !!}
    {!! Form::text('nic', null,['class'=>'form-control',$disable]) !!}
</div>

<div class="form-group">
    {!! Form::label('passport_id','Passport ID :') !!}
    {!! Form::text('passport', null,['class' => 'form-control',$disable]) !!}
</div>

<div class="form-group">
    {!! Form::label('address','Address  :') !!}
    {!! Form::text('address', null,['class'=>'form-control']) !!}
</div>


<br />
@if($advance_payment)
    <div class="form-group">
        {!! Form::label('advance-payemnt','Advance Payment :') !!}
        {!! Form::text('advancePayment', null,['class'=>'form-control',$disable]) !!}
    </div>
@endif

{!! Form::submit($btn, ['class' => 'btn btn-default btn-block']) !!}