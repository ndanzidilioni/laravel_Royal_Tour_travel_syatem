@extends('layouts.MainLayOutNav')


@section('content')


    <div class="col-md-9">


    <h1>Create an Advertisement Type</h1>
        @include('notifications._message')

    <hr/>
    <div class="col-xs-12 com-md-3">

    </div>

    <div class="col-xs-12 com-md-6">

    {!! Form::open(['action' => 'Advertisements\AdvertisementTypesController@store', 'files' => true]) !!}

    <br><br />

    <div>
        {!! Form::label('name','Type Name : ') !!}
        {!! Form::text('name',null,['class' => 'form-control']) !!}
        <br><br/>

        {!! Form::label('description','Description : ') !!}
        {!! Form::textarea('description',null,['class' => 'form-control']) !!}
        <br><br/>

        {!! Form::submit('Add',['class' => 'btn btn-primary form-control']) !!}
        <br><br />
        <a href="/system/advertisements/types" class="btn btn-primary form-control">Back</a>

    </div>

    {!! Form::close()!!}

    </div>
</div>

@stop


