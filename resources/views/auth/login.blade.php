@extends('auth.layouts.main')
@push('title')
    <title>Laravel | Log in</title>
@endpush
@section('auth-main-section')

    <body class="hold-transition login-page"
    style="background-image:url('auth/assets/img/42-3456x2304.jpg'); background-repeat:no-repeat; background-size:cover;background-position: center;
    background-blend-mode: luminosity;">
        <div class="login-box" style="opacity: 0.9;">
            <!-- /.login-logo -->
            <div class="card card-outline card-primary">
                <div class="card-header text-center">
                    <a href="{{ route('register') }}" class="h1"><b>Laravel</b> Login</a>
                </div>
                <div class="card-body">
                    <p class="login-box-msg">Sign in to start your session</p>

                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif

                    <form action="{{ route('login') }}" method="post">
                        @csrf
                        <div class="input-group mb-3">
                            <input type="email" name="email" id="email" class="form-control" placeholder="Email">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" name="password" id="password" class="form-control"
                                placeholder="Password">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <div class="captcha">
                                <span>{!! captcha_img('math') !!}</span>
                                <button type="button" class="btn btn-danger reload" id="reload">&#x21bb;</button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-8">
                                <span><input type="text" class="form-control" placeholder="Enter Captcha" name="captcha"
                                        id="captcha"></span>
                                @error('captcha')
                                    <div class="alert alert-danger text-light text-center m-2" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <!-- /.col -->
                            <div class="col-4">
                                <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                            </div>
                            <!-- /.col -->
                        </div>
                    </form>
                    <p class="mb-0">
                        <a href="{{ route('register') }}" class="text-center">Register a new membership</a>
                    </p>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.login-box -->
    @endsection
