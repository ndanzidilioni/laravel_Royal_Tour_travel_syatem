
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

</head>
<body>

<!-- Wrapper-->
<div class="wrapper">

<section class="content">

    <div class="back-link">
        <a href="{!! url('/system') !!}" class="btn btn-accent">Back to Dashboard</a>
    </div>

    <div class="container-center animated slideInDown">


        <div class="view-header">
            <div class="header-icon">
                <i class="pe page-header-icon pe-7s-unlock"></i>
            </div>
            <div class="header-title">
                <h3>Login</h3>
                <small>
                    Please enter your credentials to login.
                </small>
            </div>
        </div>

        <div class="panel panel-filled">
            <div class="panel-body">
                @include('notifications._message')
                {!! Form::open(['url' => '/login', 'id' => 'loginForm']) !!}
                    <div class="form-group">
                        <label class="control-label" for="email">Username</label>
                        <input type="text" placeholder="example@gmail.com" title="Please enter you username"
                               required name="email" id="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="password">Password</label>
                        <input type="password" title="Please enter your password" placeholder="******" required name="password" id="password" class="form-control">
                    </div>
                    <div>
                        <button class="btn btn-accent">Login</button>
                        <a class="btn btn-default" href="register.html">Register</a>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>

    </div>
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

<script>
    $(document).ready(function() {
        $('#loginForm').formValidation({
            framework: 'bootstrap',
            icon: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                email: {
                    validators: {
                        notEmpty : {
                            message: 'Email Field should not be empty !'
                        },
                        emailAddress: {
                            message: 'This Should be a email !'
                        }
                    }
                },
                password: {
                    notEmpty: {
                        message: 'You Cant leave empty for password !'
                    }
                }
            }
        })
    });
</script>

</body>

</html>