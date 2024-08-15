<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Task Management App" name="description"/>
    <meta content="Gaurank" name="author"/>
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('theme/assets/images/favicon.ico')}}">
    <!-- Bootstrap Css -->
    <link href="{{asset('theme/assets/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css"/>
    <!-- Icons Css -->
    <link href="{{asset('theme/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css"/>
    <!-- App Css-->
    <link href="{{asset('theme/assets/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css"/>
</head>
<body class="auth-body-bg">
<div class="home-btn d-none d-sm-block">
</div>
<div>
    <div class="container-fluid p-0">
        <div class="row no-gutters">
            <div class="col-lg-4">
                <div class="authentication-page-content p-4 d-flex align-items-center min-vh-100">
                    <div class="w-100">
                        <div class="row justify-content-center">
                            <div class="col-lg-9">
                                <div>
                                    <div class="text-center">
                                        <div>
                                            <h3>Task Management App</h3>
                                        </div>

                                        <h4 class="font-size-18 mt-4">Welcome Back !</h4>
                                    </div>

                                    <div class="p-2 mt-5">
                                        <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                                            @csrf

                                            <div class="form-group auth-form-group-custom mb-4">
                                                <i class="ri-user-2-line auti-custom-input-icon"></i>
                                                <label for="email">Email</label>
                                                <input id="email" type="email"
                                                       class="form-control @error('email') is-invalid @enderror"
                                                       name="email" value="{{ old('email') }}" required
                                                       autocomplete="email" placeholder="Enter Email" autofocus>
                                                @error('email')
                                                <span class="text-danger"><strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>

                                            <div class="form-group auth-form-group-custom mb-4">
                                                <i class="ri-lock-2-line auti-custom-input-icon"></i>
                                                <label for="password">Password</label>
                                                <input type="password" class="form-control" id="password"
                                                       name="password"
                                                       placeholder="Enter password">
                                                @error('password')
                                                <span class="text-danger"><strong>{{ $message }}</strong></span>
                                                @enderror
                                            </div>

                                            <div class="custom-control custom-checkbox">
                                                <input class="form-check-input" type="checkbox" name="remember"
                                                       id="remember" {{ old('remember') ? 'checked' : '' }}>
                                                <label class="form-check-label" for="remember">
                                                    {{ __('Remember Me') }}
                                                </label>
                                            </div>

                                            <div class="mt-4 text-center">
                                                <button class="btn btn-primary w-md waves-effect waves-light"
                                                        type="submit">Log In
                                                </button>
                                            </div>

{{--                                            <div class="mt-4 text-center">--}}
{{--                                                @if (Route::has('password.request'))--}}
{{--                                                    <a class="text-muted" href="{{ route('password.request') }}">--}}
{{--                                                        <i class="mdi mdi-lock mr-1"></i>{{ __('Forgot Your Password?') }}--}}
{{--                                                    </a>--}}
{{--                                                @endif--}}
{{--                                            </div>--}}

                                        </form>
                                        <div class="mt-4 text-center">
                                            <p>Don't have an account ? <a class=""
                                                                          href="{{ route('register') }}">{{ __('Register Now!') }}</a>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="mt-5 text-center">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="authentication-bg">
                    <div class="bg-overlay"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- JAVASCRIPT -->
<script src="{{asset('theme/assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
</body>
</html>

{{--@extends('layouts.app')--}}

{{--@section('content')--}}
{{--<div class="container">--}}
{{--    <div class="row justify-content-center">--}}
{{--        <div class="col-md-8">--}}
{{--            <div class="card">--}}
{{--                <div class="card-header">{{ __('Login') }}</div>--}}

{{--                <div class="card-body">--}}
{{--                    <form method="POST" action="{{ route('login') }}">--}}
{{--                        @csrf--}}

{{--                        <div class="row mb-3">--}}
{{--                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>--}}

{{--                                @error('email')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="row mb-3">--}}
{{--                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">--}}

{{--                                @error('password')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="row mb-3">--}}
{{--                            <div class="col-md-6 offset-md-4">--}}
{{--                                <div class="form-check">--}}
{{--                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>--}}

{{--                                    <label class="form-check-label" for="remember">--}}
{{--                                        {{ __('Remember Me') }}--}}
{{--                                    </label>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="row mb-0">--}}
{{--                            <div class="col-md-8 offset-md-4">--}}
{{--                                <button type="submit" class="btn btn-primary">--}}
{{--                                    {{ __('Login') }}--}}
{{--                                </button>--}}

{{--                                @if (Route::has('password.request'))--}}
{{--                                    <a class="btn btn-link" href="{{ route('password.request') }}">--}}
{{--                                        {{ __('Forgot Your Password?') }}--}}
{{--                                    </a>--}}
{{--                                @endif--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
{{--@endsection--}}
