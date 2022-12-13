
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

    <!-- App styles -->
    {!! Html::style('vendor/pe-icon-7-stroke/css/pe-icon-7-stroke.css') !!}
    {!! Html::style('vendor/pe-icon-7-stroke/css/helper.css') !!}

    <link rel="stylesheet" href="{!! url('styles/stroke-icons/style.css') !!}"/>
    <link rel="stylesheet" href="{!! url('styles/style.css') !!}">

    {!! Html::style('css/formValidation.min.css') !!}

    @yield('js')

</head>
<body>

<!-- Wrapper-->
<div class="wrapper">

    <section class="content">
        @yield('content')
    </section>
    <!-- End main content-->

</div>


<!-- End wrapper-->

<!-- Vendor scripts -->
{!! Html::script('vendor/pacejs/pace.min.js') !!}
{!! Html::script('vendor/jquery/dist/jquery.min.js') !!}
{!! Html::script('vendor/bootstrap/js/bootstrap.min.js') !!}
{!! Html::script('js/formValidation.min.js') !!}
{!! Html::script('js/framework/bootstrap.min.js') !!}
{!! Html::script('vendor/toastr/toastr.min.js') !!}
{!! Html::script('/scripts/luna.js') !!}

<!-- App scripts -->

@yield('js')

</body>

</html>