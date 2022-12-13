@extends('layouts.MainLayOutNav')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-3"></div>

            <div class="col-xs-12 col-sm-6">
                <h3>Account Overview</h3>
                <br/>
                {{--<div id="perf_div"></div>--}}
                {{--@columnchart('Finances', 'perf_div')--}}

                <select name="graph" id="graph" class="form-control">
                    <option selected value="1">Area Graph</option>
                    <option value="2">Bar Graph</option>
                </select>

                <div class="panel-body">
                    <div class="text-center slight">
                    </div>

                    <div class="flot-chart" id="graph_1" style="height: 160px;margin-top: 5px">
                        <div class="flot-chart-content" id="flot-line-chart"></div>
                    </div>

                    <div class="flot-chart hidden" id="graph_2" style="height: 160px;margin-top: 5px">
                        <div class="flot-chart-content" id="flot-bars-chart"></div>
                    </div>

                    <div class="small text-center">All Expenses and Income for {!! \Carbon\Carbon::now()->format('F Y') !!} </div>
                </div>


            </div>

            <div class="col-xs-12 col-sm-3"></div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{!! url('/vendor/flot/jquery.pie.js') !!}"></script>

    <script>
        $(document).ready(function () {
            // Flot charts data and options
            var data1 = {!! json_encode($sendArray) !!};
            var data2 = {!! json_encode($sendArray2) !!};

            var data1 = [[0, 16], [1, 24], [2, 11], [3, 7], [4, 10], [5, 15], [6, 24], [7, 30]];


            var chartUsersOptions = {
                series: {
                    splines: {
                        show: true,
                        tension: 0.4,
                        lineWidth: 1,
                        fill: 1

                    }

                },
                grid: {
                    tickColor: "#404652",
                    borderWidth: 0,
                    borderColor: '#404652',
                    color: '#404652'
                },
                colors: ["#f7af3e", "#DE9536"]
            };

            var chartUsersOptions2 = {
                series: {
                    bars: {
                        show: true
                    }
                },
                colors: ["#f7af3e", "#DE9536"]
            };

            $.plot($("#flot-line-chart"), [
                {data: data2, label: "Income"},
                {data: data1, label: "Expense"}
            ], chartUsersOptions);

            $.plot($("#flot-bars-chart"), [
                {data: data2, label: "Income"},
                {data: data1, label: "Expense"}
            ], chartUsersOptions2);

            $('#graph').on('change', function (e) {
                var selectedValue = $(this).val();

                if(selectedValue == 1) {
                    $('#graph_1').removeClass('hidden');
                    $('#graph_2').addClass('hidden');
                } else {
                    $('#graph_1').addClass('hidden');
                    $('#graph_2').removeClass('hidden');
                }

            })
        });
    </script>
@endsection

