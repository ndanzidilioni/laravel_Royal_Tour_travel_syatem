<div class="form-group">
{!! Form::label('tour','Select Package') !!}
{!! Form::select('tour', $packages, null, ['placeholder' => 'Select Package...','class'=>'package_selector form-control']) !!}
 </div>
<div class="form-group">
{!! Form::label('tourDate') !!}
{!! Form::select('tourDate', [], null, ['placeholder' => 'Select Tour Date...','class'=>'form-control','id'=>'tourDate']) !!}
</div>
<div class="form-group">
{!! Form::label('fname', 'First Name :') !!}
{!! Form::text('fname', null, ['class' => 'form-control','id'=>'fname']) !!}
</div>
<div class="form-group">
{!! Form::label('sname', 'Second Name :') !!}
{!! Form::text('sname', null, ['class' => 'form-control','id'=>'sname']) !!}
</div>
<div class="form-group">
{!! Form::label('lname', 'Last Name :') !!}
{!! Form::text('lname', null, ['class' => 'form-control','id'=>'lname']) !!}
</div>
<div class="form-group">
{!! Form::label('otherName','Other Name :') !!}
{!! Form::text('otherName', null,['class' => 'form-control','id'=>'otherName' ]) !!}
</div>

<div class="form-group">
{!! Form::label('dob','Date Of Birth :') !!}
{!! Form::date('dob', \Carbon\Carbon::setTestNow()) !!}
</div>
<div class="form-group">
{!! Form::label('gender','Gender :') !!}
{!! Form::Select('gender',['1'=>'Male','0'=>'Female'], null,['class'=>'form-control']) !!}
</div>
<div class="form-group">
{!! Form::label('phoneNumber','Phone Number :') !!}
{!! Form::text('number', null,['class'=>'form-control','id'=>'contact']) !!}
</div>
<div class="form-group">
{!! Form::label('nic','NIC Number') !!}
{!! Form::text('nic', null,['class'=>'form-control','id'=>'nic']) !!}
</div>

<div class="form-group">
{!! Form::label('passport_id','Passport ID :') !!}
{!! Form::text('passport', null,['class' => 'form-control','id'=>'passport']) !!}
</div>

<div class="form-group">
{!! Form::label('address','Address  :') !!}
{!! Form::text('address', null,['class'=>'form-control','id'=>'address']) !!}
</div>

<div class="form-group">
    {!! Form::label('Payemnt','Payment :') !!}
    {!! Form::text('payment', null,['class'=>'form-control','id'=>'payment']) !!}
</div>

<div class="form-group">
{!! Form::label('Loyalty     :') !!}
{!! Form::select('loyalty', $loyalty, null, ['class'=>'form-control','id'=>'loyalty','placeholder'=>'Please Select Loyalty type']) !!}
</div>

{!! Form::submit($btn, ['class' => 'btn btn-default btn-block']) !!}