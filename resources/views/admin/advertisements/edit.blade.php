@extends('layouts.MainLayOutNav')


@section('content')


    <div class="col-md-9">

    <h1>Update</h1>

    <hr/>
    <div class="col-xs-12 com-md-3">

    </div>

    <div class="col-xs-12 com-md-6">

    {!! Form::model($ad,['method' => 'PATCH', 'action' => ['Advertisements\AdvertisingController@update', $ad->id], 'files' => true]) !!}

    <div>
        <br><br />
        {!! Form::label('name', 'Advertisement Name : ') !!}
        {!! Form::text('name',null,['class' => 'form-control']) !!}
        <br><br />
        {!! Form::label('type_id', 'Advertisement Type : ') !!}
        {!! Form::select('type_id', $type_id, null, ['class' => 'form-control']) !!}

        <br><br />

        {!! Form::label('file','Upload new Ad material here: ') !!}
        {!! Form::file('file') !!}

        <br><br />

        {!! Form::submit('Update',['class' => 'btn btn-primary form-control']) !!}
        <br><br />
        <a href="/system/advertisements/" class="btn btn-primary form-control">Back</a>



    </div>
        </div>

    {!! Form::close()!!}

        </div>

    @if($errors->any())

        <ul class="alert alert-danger">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>

            @endforeach

        </ul>

    @endif

@stop