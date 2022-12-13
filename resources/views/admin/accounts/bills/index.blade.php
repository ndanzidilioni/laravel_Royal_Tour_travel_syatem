@extends('layouts.MainLayOutNav')

@section('content')
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-9">
            @include('notifications._message')
            <h3>All the Bills for Month
                <small>{!! \Carbon\Carbon::now()->format('F Y') !!}</small>
                <br/>
                <small><a href="{!! url('/system/accounts/bill/create') !!}">Add Bill</a></small>
            </h3>

            <br/>

            <div style="margin-bottom: 20px">
                <div class="row">
                    <div class="col-xs-4">
                        {!! Form::label('search_from', 'From Month : ') !!}
                        {!! Form::date('search_from', \Carbon\Carbon::now()->startOfMonth()->toDateString(), ['class' => 'form-control']) !!}
                    </div>
                    <div class="col-xs-4">
                        {!! Form::label('search_to', 'To Month : ') !!}
                        {!! Form::date('search_to', \Carbon\Carbon::now()->toDateString(), ['class' => 'form-control']) !!}
                    </div>
                    <div class="col-xs-4" style="padding: 23px !important;">
                        {!! Form::submit('Search', ['class' =>  'btn btn-block btn-default', 'id' => 'search']) !!}
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    {!! Form::label('types', 'Select a Bill type') !!}
                    {!! Form::select('types', $billTypes, null, ['class' => 'form-control']) !!}
                </div>
            </div>

            <div style="padding-bottom: 30px"></div>

            <h3>Bill List</h3>
            <table class="table table-responsive ajax-table">
                <tr>
                    <th>Bill ID</th>
                    <th>Bill Type</th>
                    <th>Bill Number</th>
                    <th>Billed Date</th>
                    <th>Billed Amount</th>
                    <th>Action</th>
                </tr>

                @foreach($bills as $bill)
                    <tr>
                        <td>{!! $bill->id !!}</td>
                        <td>{!! $bill->billType->name !!}</td>
                        <td>{!! $bill->bill_no !!}</td>
                        <td>{!! $bill->date !!}</td>
                        <td>{!! $bill->amount !!}</td>
                        <td><a href="{!! url('/system/accounts/bill/'.$bill->id.'/edit') !!}">Edit</a></td>
                    </tr>
                @endforeach

            </table>
        </div>
    </div>
@endsection


@section('js')
    <script type="text/javascript">
        $(document).ready(function () {
            $('#types').on('change', function () {
                var url = '/api/secured/accounts/bills/type/' + $(this).val();

                var table = $('.ajax-table');

                table.find("tr:gt(0)").remove();

                $.ajax({
                    type: 'GET',
                    url: url,
                    dataType: 'json',
                    success: function (data) {
                        for (var i = 0; i < data.length; i++) {
                            table.append(
                                    "<tr>" +
                                    "<td>" + data[i].id + "</td>" +
                                    "<td>" + data[i].billtype_id + "</td>" +
                                    "<td>" + data[i].bill_no + "</td>" +
                                    "<td>" + data[i].date + "</td>" +
                                    "<td>" + data[i].amount + "</td>" +
                                    "<td><a href='/system/accounts/bill/" + data[i].id + "/edit'>Edit</a></td>" +
                                    "</tr>");
                        }
                    }
                });

            })

            $('#search').on('click', function () {

                var from = $('#search_from').val();

                var to = $('#search_to').val();

                var table = $('.ajax-table');

                var url = '/api/secured/accounts/bills/month/' + from + '/' + to + '';

                table.find("tr:gt(0)").remove();

                $.ajax({
                    type: 'GET',
                    url: url,
                    dataType: 'json',
                    success: function (data) {
                        for (var i = 0; i < data.length; i++)
                        {
                            table.append(
                                    "<tr>" +
                                    "<td>"+ data[i].id +"</td>" +
                                    "<td>"+ data[i].billtype_id +"</td>" +
                                    "<td>"+ data[i].bill_no +"</td>" +
                                    "<td>"+ data[i].date +"</td>" +
                                    "<td>"+ data[i].amount +"</td>" +
                                    '<td><a href="/system/accounts/bill/'+data[i].id+'/edit">Edit</a></td>' +
                                    "</tr>"
                            );
                        }
                    }
                });


            })
        });
    </script>
@endsection