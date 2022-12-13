<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Lotus Travels</title>


    {!! Html::style('css/bootstrap.min.css') !!}
    {!! Html::style('css/fontawesome.min.js') !!}
    {!! Html::style('css/custom.min.css') !!}
    {!! Html::style('css/formValidation.min.css') !!}
    {!! Html::style('css/AdminLTE.min.css') !!}

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }
    </style>

    @yield('styles')
</head>
<body id="app-layout">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    Lotus AlphaDev
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/system') }}">Home</a></li>
                    <li><a href="{{ url('/system/employee') }}">HR</a></li>
                    <li><a href="{{ url('/system/package') }}">Package</a></li>
                    <li><a href="{{ url('/system/customer') }}">Customer</a></li>
                    <li><a href="{{ url('/system/accounts') }}">Accounts</a></li>
                    <li><a href="{{ url('/system/rental') }}">Rental</a></li>
                    <li><a href="{{ url('/system/tour') }}">Tour</a></li>
                    <li><a href="{{ url('/system/advertisements') }}">Advertisements and Marketing</a></li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    <!-- JavaScripts -->
    {!! Html::script('js/jquery.min.js') !!}

    {!! Html::script('js/bootstrap.min.js') !!}

    {!! Html::script('js/app.min.js') !!}

    {!! Html::script('js/formValidation.min.js') !!}

    @yield('js')
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
</body>
</html>
