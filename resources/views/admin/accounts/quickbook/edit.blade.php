@extends('layouts.MainLayOutNav')

@section('content')
        <div class="row">
            <div class="col-xs-12 col-md-9">
                <h3>Edit a QuickBook Record</h3>
                @include('notifications._message')
                {!! Form::model($quickbook, ['method' => 'PATCH', 'action' => ['Accounts\QuickBookController@update', $quickbook->id]]) !!}
                @include('admin.accounts.quickbook.partials._formPartial', ['btn' => 'Edit QuickBook record'])
                {!! Form::close() !!}
            </div>
            <div class="col-xs-12 col-md-3">
                {!! Form::open(['method' => 'DELETE', 'action' => ['Accounts\QuickBookController@destroy', $quickbook->id]]) !!}
                {!! Form::submit('Delete this QuickBook record', ['onclick' => 'return confirm("Are you sure to remove this record")', 'class' => 'btn btn-danger']) !!}
                {!! Form::close() !!}
            </div>
        </div>
@endsection