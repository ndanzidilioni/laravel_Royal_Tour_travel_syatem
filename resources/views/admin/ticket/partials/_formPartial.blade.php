
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
    {!! Form::label('contact', 'Contact Number :') !!}
    {!! Form::text('contact', null, ['class' => 'form-control','id'=>'contact']) !!}
</div>

<div class="form-group">
    {!! Form::label('nic', 'NIC :') !!}
    {!! Form::text('nic', null, ['class' => 'form-control','id'=>'nic']) !!}
</div>

<div class="form-group">
    {!! Form::label('from', 'From :') !!}
    {!! Form::text('from', null, ['class' => 'form-control','id'=>'from']) !!}
</div>

<div class="form-group">
    {!! Form::label('to', 'To :') !!}
    {!! Form::text('to', null, ['class' => 'form-control','id'=>'to']) !!}
</div>

<div class="form-group">
    {!! Form::label('departure','Departure :') !!}
    {!! Form::date('departure', \Carbon\Carbon::setTestNow()) !!}
</div>

<div class="form-group">
    {!! Form::label('class','Class :') !!}
    {!! Form::Select('class',['Luxury'=>'Luxury','Business'=>'Business','Economy'=>'Economy'], null,['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('quantity', 'Quantity :') !!}
    {!! Form::text('quantity', null, ['class' => 'form-control','id'=>'quantity']) !!}
</div>

<div class="form-group">
    {!! Form::label('note', 'Note :') !!}
    {!! Form::text('note', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('agent','Select Agent') !!}
    {!! Form::select('agent', $agents, null, ['class'=>'form-control','id'=>'agent']) !!}
</div>

<div class="form-group">
    {!! Form::label('amount', 'Net Amount :') !!}
    {!! Form::text('amount', null, ['class' => 'form-control','id'=>'amount']) !!}
</div>


{!! Form::submit($btn, ['class' => 'btn btn-default btn-block']) !!}