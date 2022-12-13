@extends('layouts.MainLayOutNav')

@section('content')
    <div class="row">
        <div class="col-md-9">
            <table class="table table-responsive">
                <tr>
                    <th>Tour Code</th>
                    <th>Tour Name</th>
                    <th>Tour Date</th>
                    <th>Tour Customers</th>
                </tr>

                <tr>
                    <td>{!! $tour->code !!}</td>
                    <td>{!! $tour->name !!}</td>
                    <td>{!! $tour->arrival !!}</td>
                    <td>
                        <ul style="list-style-type: none">
                            @foreach($tour->customers as $customer)
                                <li>{!! $customer->fname !!} | <a href="{!! url('/system/customer/'.$customer->id.'/view') !!}">Edit</a></li>
                            @endforeach
                        </ul>
                    </td>
                </tr>
            </table>
        </div>
    </div>
@endsection

