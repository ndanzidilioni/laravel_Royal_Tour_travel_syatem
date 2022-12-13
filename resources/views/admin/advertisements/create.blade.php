@extends('layouts.MainLayOutNav')


@section('content')


    <div class="col-md-9">

    <h1>Create an Advertisement</h1>
   @include('notifications._message')

    <hr/>
    <div class="col-xs-12 com-md-3">

    </div>

    <div class="col-xs-12 com-md-6">

    {!! Form::open(['action' => 'Advertisements\AdvertisingController@store', 'files' => true]) !!}

    <div>

        <br><br />

        {!! Form::label('name','Advertisement Name : ') !!}
        {!! Form::text('name',null,['class' => 'form-control']) !!}
        <br><br/>
        {!! Form::label('type_id', 'Advertisement Type : ') !!}
        {!! Form::select('type_id', $type_id, null, ['class' => 'form-control']) !!}

        <br><br />

        {!! Form::label('expense', 'Expense: ') !!}
        {!! Form::text('expense', null,['class' => 'form-control']) !!}

        <br><br />

        {!! Form::label('description','Description : ') !!}
        {!! Form::textarea('description',null,['class' => 'form-control']) !!}
        <br><br/>

        {!! Form::label('file','Upload Ad material here: ') !!}
        {!! Form::file('file') !!}


        <br><br/>

        {!! Form::submit('Add',['class' => 'btn btn-primary form-control']) !!}
        <br><br />

        <a href="/system/advertisements/" class="btn btn-primary form-control">Back</a>

    </div>


    {!! Form::close()!!}

    </div>
</div>

@stop


