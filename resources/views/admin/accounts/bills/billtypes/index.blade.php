@extends('layouts.MainLayOutNav')

@section('content')
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-9">
            @include('notifications._message')
            <h3>All the Bills Types <br>
                <small><a href="{!! url('/system/accounts/bill/type/create') !!}">Add Bill</a></small>
            </h3>

            <br/>

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