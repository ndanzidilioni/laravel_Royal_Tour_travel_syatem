@extends('layouts.MainLayOutNav')


@section('content')


    <div class="col-md-9">


    <h1>Update</h1>

    <hr/>
    <div class="col-xs-12 com-md-3">

    </div>
    <div class="col-xs-12 com-md-6">

    {!! Form::model($type,['method' => 'PATCH', 'action' => ['Advertisements\AdvertisementTypesController@update', $type->id]]) !!}

    <br><br />

    <div>

        {!! Form::label('name', 'Type Name : ') !!}
        {!! Form::text('name',null,['class' => 'form-control']) !!}
        <br><br />
        {!! Form::label('description','Description : ') !!}
        {!! Form::text('description',null,['class' => 'form-control']) !!}
        <br><br/>

        {!! Form::submit('Update',['class' => 'btn btn-primary form-control']) !!}
        <br><br />
        <a href="/system/advertisements/types" class="btn btn-primary form-control">Back</a>

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