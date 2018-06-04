<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login |School</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="/loginResource/images/icons/favicon.ico"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/loginResource/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/loginResource/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/loginResource/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/loginResource/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/loginResource/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/loginResource/vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/loginResource/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/loginResource/vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/loginResource/css/util.css">
    <link rel="stylesheet" type="text/css" href="/loginResource/css/main.css">
    <!--===============================================================================================-->
</head>
<body>

<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <div class="login100-form-title" style="background-image: url(/loginResource/images/bg-01.jpg);">
					<span class="login100-form-title-1">
                        @if(isset($msg))
                            {{$msg}}
                            @else
                            {{'Log In'}}
                        @endif
					</span>
            </div>

            {{ Form::open(array('url' => '/loginweb', 'method' => 'post', 'class'=>'login100-form validate-form')) }}

            <div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
                <span class="label-input100">Username</span>
                <input class="input100" type="text" name="username" placeholder="Enter username" required>
                <span class="focus-input100"></span>
            </div>

            <div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
                <span class="label-input100">Password</span>
                <input class="input100" type="password" name="password" placeholder="Enter password" required>
                <span class="focus-input100"></span>
            </div>
            <div class="container-login100-form-btn">
                <button type="submit" class="login100-form-btn">
                    Log In
                </button>
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>

<!--===============================================================================================-->
<script src="/loginResource/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="/loginResource/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
<script src="/loginResource/vendor/bootstrap/js/popper.js"></script>
<script src="/loginResource/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="/loginResource/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
<script src="/loginResource/vendor/daterangepicker/moment.min.js"></script>
<script src="/loginResource/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
<script src="/loginResource/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
<script src="/loginResource/js/main.js"></script>

</body>
</html>