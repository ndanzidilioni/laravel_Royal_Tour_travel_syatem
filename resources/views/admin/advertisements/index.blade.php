@extends('layouts.MainLayOutNav')


@section('content')


    <div class="col-md-9">

        <h1>Advertising and Marketing</h1>

    <div class="container">
        <div class="row">
            <div class="col-xs-12 com-md-3">
                @include('admin.advertisements.partials._custNav')
            </div>
            <div class="col-xs-12 com-md-6">
                <h3>Advertising and Marketing</h3>
                <h4>List of Advertisement</h4>
                <ul>
                    @foreach ($advertisements as $ad)
                        <li>
                            <h3>{!! $ad->name !!} </h3>
                            <h4>
                                {!! "Ad ID: " !!}
                                <small> {!! $ad->id !!}</small>
                                <br />
                                {!! "Ad Type: " !!}
                                <small> {!! $ad->advertisement->name !!}</small>
                                <br />
                            </h4>
                                <a href="/system/advertisements/{{ $ad->id }}" class="btn btn-xs btn-primary">Show</a>
                                <a href="/system/advertisements/{{ $ad->id }}/edit" class="btn btn-xs btn-primary">Edit this Ad</a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="col-xs-12 com-md-3"></div>
        </div>
    </div>
</div>

    @stop
