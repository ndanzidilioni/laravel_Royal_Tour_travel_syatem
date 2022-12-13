<div class="form-group">
    {!! Form::label('tour','Select Package') !!}
    {!! Form::select('tour', $packages, null, ['placeholder' => 'Select Package...','class'=>'package_selector form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('tourDate') !!}
    {!! Form::select('tourDate', [], null, ['placeholder' => 'Select Tour Date...','class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('payemnt','Payment :') !!}
    {!! Form::text('payment', null,['class'=>'form-control']) !!}
</div>

{!! Form::submit($btn, ['class' => 'btn btn-default btn-block']) !!}