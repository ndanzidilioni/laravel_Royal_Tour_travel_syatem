@extends('layouts.MainLayOutNav')


@section('content')


    <div class="col-md-9">

    <h1>Feedback</h1>

    <hr/>

    <div class="container">
        <div class="row">
            <div class="col-xs-12 com-md-3">
                @include('admin.advertisements.partials._custNav')
            </div>
            <div class="col-xs-12 com-md-6">

                <ul>
                    @foreach ($feedback as $feedback)
                        <li>

                            <h3> {!! $feedback->subject !!}
                                <br />
                                <small> {!! $feedback->name !!}</small>

                                <a href="/system/advertisements/feedback/{{ $feedback->id }}" class="btn btn-xs btn-primary">View Feedback</a>
                            </h3>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="col-xs-12 com-md-3"></div>
        </div>
    </div>
    </div>
@stop
