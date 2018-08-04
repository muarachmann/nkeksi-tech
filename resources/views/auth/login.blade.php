@extends('layout.main')

@section('title', 'Login| Nkeksi-tech')

@section('page-class' , 'page-sub-page page-register-sign-in')


@section('breadcrumb')
    <!-- Breadcrumb -->
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="/">Home</a></li>
            <li class="active">Login into account</li>
        </ol>
    </div>
    <!-- end Breadcrumb -->
@endsection


@section('header')
    @include('includes.header2')
@endsection

@section('content')
<div class="container">
    <h2 class="center">Login</h2>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="container col-md-12 text-center">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>
                            </div>
                        </div>
                    </form>
                    <br><br>
                    <div class="text-center">
                    <h2 class="text-center">OR login via social media</h2>
                    </div>
                     <br><br>
                    <div class="text-center">
                        <a href="login/linkedin" class="btn btn-sm btn-social btn-linkedin">
                            <i class="fa fa-linkedin"></i> Sign in with LinkedIn
                        </a>
                        <a href="login/facebook" class="btn btn-sm btn-social btn-facebook">
                            <i class="fa fa-facebook"></i> Sign in with Facebook
                        </a>
                        <a href="login/google" class="btn btn-sm btn-social btn-google">
                            <i class="fa fa-google-plus"></i> Sign in with Google
                        </a>
                    </div>
                     <br>
                     <div class="text-center">
                        <p class="clearfix">
                        <a href="login/twitter" class="btn btn-sm btn-social btn-twitter">
                            <i class="fa fa-twitter"></i> Sign in with Twitter
                        </a>
                    </p>
                     </div>
                     
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
