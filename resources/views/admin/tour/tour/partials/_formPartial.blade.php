<div class="form-group">
    {!! Form::label('name', 'Name :') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('code', 'Code : ') !!}
    {!! Form::text('code', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('arrival', 'Arrival Date : ') !!}
    {!! Form::date('arrival', \Carbon\Carbon::now()->toDateString(), ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('departure', 'Departure Date: ') !!}
    {!! Form::date('departure', \Carbon\Carbon::now()->toDateString(), ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('arrival_time', 'Arrival time : ') !!}
    {!! Form::time('arrival_time', \Carbon\Carbon::now()->toTimeString(), ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('departure_time', 'Departure time : ') !!}
    {!! Form::time('departure_time',\Carbon\Carbon::now()->toTimeString(), ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('package', 'Select Package : ') !!}
    {!! Form::select('package', $packages, null, ['placeholder' => 'Select Package...', 'class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('hotel', 'Select Hotel : ') !!} <small>for multiple selection use CRTL + Mouse</small>
    {!! Form::select('hotel[]', $hotels, null, ['placeholder' => 'Select Hotel...','class'=>'form-control', 'multiple']) !!}
</div>

<div class="form-group">
    {!! Form::label('guide', 'Select Guide : ') !!} <small>for multiple selection use CRTL + Mouse</small>
    {!! Form::select('guide[]', $guides, null, ['placeholder' => 'Select Guide...','class'=>'form-control', 'multiple']) !!}
</div>

<div class="form-group">
    {!! Form::label('description', 'Description : ') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::submit($btn, ['class' => 'btn btn-accent btn-block']) !!}
</div>