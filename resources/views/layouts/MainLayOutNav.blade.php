@if(Auth::check() == false)
      <?php return Redirect::to('/');?>
@endif
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900' rel='stylesheet' type='text/css'>

    <!-- Page title -->
    <title>Lotus Travels | Admin DashBoard </title>

    <!-- Vendor styles -->
    {!! Html::style('css/font-awesome.min.css') !!}
    <link rel="stylesheet" href="{!! url('vendor/animate.css/animate.css') !!}"/>
    <link rel="stylesheet" href="{!! url('vendor/bootstrap/css/bootstrap.css') !!}"/>
    <link rel="stylesheet" href="{!! url('vendor/toastr/toastr.min.css') !!}"/>

    <!-- App styles -->
    {!! Html::style('vendor/pe-icon-7-stroke/css/pe-icon-7-stroke.css') !!}
    {!! Html::style('vendor/pe-icon-7-stroke/css/helper.css') !!}

    <link rel="stylesheet" href="{!! url('styles/stroke-icons/style.css') !!}"/>
    <link rel="stylesheet" href="{!! url('styles/style.css') !!}">

    @yield('styles')

</head>
<body>
<!-- Wrapper-->
<div class="wrapper">

    <!-- Header-->
        @include('admin.partials._navBar')
    <!-- End header-->

    <!-- Navigation-->
        @include('admin.partials.sideBar')
    <!-- End navigation-->

    <!-- Main content-->
    <section class="content">

        <div class="container-fluid">

            @yield('content')

        </div>

    </section>
    <!-- End main content-->

</div>
<!-- End wrapper-->

<!-- modals -->
@yield('modals')

<!-- Vendor scripts -->
{!! Html::script('vendor/pacejs/pace.min.js') !!}
{!! Html::script('vendor/jquery/dist/jquery.min.js') !!}
{!! Html::script('vendor/bootstrap/js/bootstrap.min.js') !!}

{!! Html::script('js/formValidation.min.js') !!}
{!! Html::script('js/framework/bootstrap.min.js') !!}

{!! Html::script('vendor/toastr/toastr.min.js') !!}
{!! Html::script('vendor/sparkline/index.js') !!}
{!! Html::script('vendor/flot/jquery.flot.min.js') !!}
{!! Html::script('vendor/flot/jquery.flot.resize.min.js') !!}
{!! Html::script('vendor/flot/jquery.flot.spline.js') !!}
{!! Html::script('/scripts/luna.js') !!}


<!-- App scripts -->
@yield('js')

<script>
    $(document).ready(function () {


        // Sparkline charts
        var sparklineCharts = function () {
            $(".sparkline").sparkline([20, 34, 43, 43, 35, 44, 32, 44, 52, 45], {
                type: 'line',
                lineColor: '#FFFFFF',
                lineWidth: 3,
                fillColor: '#404652',
                height: 47,
                width: '100%'
            });

            $(".sparkline7").sparkline([10, 34, 13, 33, 35, 24, 32, 24, 52, 35], {
                type: 'line',
                lineColor: '#FFFFFF',
                lineWidth: 3,
                fillColor: '#f7af3e',
                height: 75,
                width: '100%'
            });

            $(".sparkline1").sparkline([0, 6, 8, 3, 2, 4, 3, 4, 9, 5, 3, 4, 4, 5, 1, 6, 7, 15, 6, 4, 0], {
                type: 'line',
                lineColor: '#2978BB',
                lineWidth: 3,
                fillColor: '#2978BB',
                height: 170,
                width: '100%'
            });

            $(".sparkline3").sparkline([-8, 2, 4, 3, 5, 4, 3, 5, 5, 6, 3, 9, 7, 3, 5, 6, 9, 5, 6, 7, 2, 3, 9, 6, 6, 7, 8, 10, 15, 16, 17, 15], {

                type: 'line',
                lineColor: '#fff',
                lineWidth: 3,
                fillColor: '#393D47',
                height: 70,
                width: '100%'
            });

            $(".sparkline5").sparkline([0, 6, 8, 3, 2, 4, 3, 4, 9, 5, 3, 4, 4, 5], {
                type: 'line',
                lineColor: '#f7af3e',
                lineWidth: 2,
                fillColor: '#2F323B',
                height: 20,
                width: '100%'
            });
            $(".sparkline6").sparkline([0, 1, 4, 2, 2, 4, 1, 4, 3, 2, 3, 4, 4, 2, 4, 2, 1, 3], {
                type: 'bar',
                barColor: '#f7af3e',
                height: 20,
                width: '100%'
            });

            $(".sparkline8").sparkline([4, 2], {
                type: 'pie',
                sliceColors: ['#f7af3e', '#404652']
            });
            $(".sparkline9").sparkline([3, 2], {
                type: 'pie',
                sliceColors: ['#f7af3e', '#404652']
            });
            $(".sparkline10").sparkline([4, 1], {
                type: 'pie',
                sliceColors: ['#f7af3e', '#404652']
            });
            $(".sparkline11").sparkline([1, 3], {
                type: 'pie',
                sliceColors: ['#f7af3e', '#404652']
            });
            $(".sparkline12").sparkline([3, 5], {
                type: 'pie',
                sliceColors: ['#f7af3e', '#404652']
            });
            $(".sparkline13").sparkline([6, 2], {
                type: 'pie',
                sliceColors: ['#f7af3e', '#404652']
            });
        };

        var sparkResize;

        // Resize sparkline charts on window resize
        $(window).resize(function () {
            clearTimeout(sparkResize);
            sparkResize = setTimeout(sparklineCharts, 100);
        });

        // Run sparkline
        sparklineCharts();


//        // Flot charts data and options
//        var data1 = [[0, 16], [1, 24], [2, 11], [3, 7], [4, 10], [5, 15], [6, 24], [7, 30]];
//        var data2 = [[0, 26], [1, 44], [2, 31], [3, 27], [4, 36], [5, 46], [6, 56], [7, 66]];
//
//        var chartUsersOptions = {
//            series: {
//                splines: {
//                    show: true,
//                    tension: 0.4,
//                    lineWidth: 1,
//                    fill: 1
//
//                }
//
//            },
//            grid: {
//                tickColor: "#404652",
//                borderWidth: 0,
//                borderColor: '#404652',
//                color: '#404652'
//            },
//            colors: ["#f7af3e", "#DE9536"]
//        };
//
//        $.plot($("#flot-line-chart"), [data2, data1], chartUsersOptions);


        // Run toastr notification with Welcome message
//        setTimeout(function () {
//            toastr.options = {
//                "positionClass": "toast-top-right",
//                "closeButton": true,
//                "progressBar": true,
//                "showEasing": "swing",
//                "timeOut": "6000"
//            };
//            toastr.warning('<strong>You entered to LUNA</strong> <br/><small>Premium admin theme with Dark UI style. </small>');
//        }, 1600)


    });
</script>

</body>

</html>