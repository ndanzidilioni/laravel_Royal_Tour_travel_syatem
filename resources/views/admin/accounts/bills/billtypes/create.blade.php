@extends('layouts.MainLayOutNav')

@section('content')
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-9">
            <h3>Add a Bill Type to System</h3>
            <br/>
            @include('notifications._message')
            {!! Form::open(['action' => 'Accounts\BillTypeController@store', 'id' => 'form']) !!}
            <div class="form-group">
                {!! Form::label('name', 'Bill Type : ') !!}
                {!! Form::text('name', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Add Bill Type', ['class' => 'btn btn-accent btn-block']) !!}
            </div>

            {!! Form::close() !!}


            <hr>

            <h3>Current Bill Types</h3>

            @if($billTypes->isEmpty())
                <p>No Bill Types to display !</p>
            @else
                <ul>
                    @foreach($billTypes as $billType)
                        <li>{!! $billType->name !!}</li>
                    @endforeach
                </ul>
            @endif

        </div>
    </div>
@endsection