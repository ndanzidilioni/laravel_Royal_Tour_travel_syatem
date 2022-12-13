@extends('layouts.MainLayOutNav')


@section('content')


    <div class="col-md-9">

    <h1>Advertising and Marketing</h1>

    <hr/>

    <div class="container">
        <div class="row">
            <div class="col-xs-12 com-md-3">
                @include('admin.advertisements.partials._custNav')
            </div>
            <div class="col-xs-12 com-md-6">
                <h1>Ad and Marketing Material Types</h1>
                <ul>
                    @foreach ($types as $type)

                        <li>
                            <h3> {!! $type->name !!}
                                <br />
                                <small> {!! $type->description !!}</small>
                                <a href="/system/advertisements/types/{{ $type->id }}/edit" class="btn btn-xs btn-primary">Edit this Type</a>
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
