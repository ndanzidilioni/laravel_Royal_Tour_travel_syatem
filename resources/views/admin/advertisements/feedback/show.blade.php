@extends('layouts.MainLayOutNav')


@section('content')

    <div class="col-md-3"></div>
    <div class="col-md-6">

        <h1>Feedback</h1>

        <hr/>
            <div class="row">
                <div class="col-xs-12 com-md-9">

                    @include('notifications._message')

                    {!! Form::open(['method' => 'DELETE', 'action' => ['Advertisements\FeedbackController@destroy', $feedback->id], 'files' => true]) !!}
                    <ul>

                            <li>
                                <h3>{!! "Subject :" !!} {!! $feedback->subject !!}</h3>
                                    <br />
                                    {!! "Name :" !!}
                                    {!! $feedback->name !!}
                                    <br />
                                    {!! "Contact : " !!}
                                    {!! $feedback->contact !!}
                                    <br />
                                    {!! "Comment :  " !!}
                                    {!! $feedback->comment !!}
                                    <br />
                                {!! Form::submit('Delete',['class' => 'btn btn-primary form-control']) !!}
                                <br />
                                <br />
                                    <a href="/system/advertisements/feedback/" class="btn btn-primary form-control">Back</a>

                            </li>

                    </ul>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>

@stop
