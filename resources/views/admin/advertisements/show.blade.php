@extends('layouts.MainLayOutNav')


@section('content')

    <div class="col-md-3"></div>
    <div class="col-md-6">

        <h1>Ad Material</h1>

        <hr/>
        <div class="row">
            <div class="col-xs-12 com-md-9">

                @include('notifications._message')

                {!! Form::open(['action' => ['Advertisements\AdvertisingController@show', $advertisement->id], 'files' => true]) !!}
                <ul>

                    <li>
                        <h3>{!! "Ad ID :" !!} {!! $advertisement->id !!}</h3>
                        <h4>

                        <br />
                        {!! "Name :" !!}
                        {!! $advertisement->name !!}
                        <br />
                        {!! "Type ID : " !!}
                        {!! $advertisement->advertisement->name !!}
                        <br />

                            {!! "Description : " !!}
                            <small>
                            {!! $advertisement->description !!}
                            </small>

                            <br />
                        {{--{!! "File : " !!}--}}
                            {{--{{ HTML::image($advertisement->file), '', array('class' => 'file'));}}--}}

                        {{--<br />--}}
                            </h4>

                        {!! Form::submit('Delete',['class' => 'btn btn-primary form-control']) !!}
                        <br />
                        <a href="/system/advertisements" class="btn btn-primary form-control">Back</a>


                    </li>

                </ul>

                {!! Form::close() !!}
            </div>
        </div>
    </div>

@stop
