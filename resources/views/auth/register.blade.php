@extends('layout.main')

@section('title', 'Register | Nkeksi-tech')

@section('page-class' , 'page-sub-page page-register-sign-in')


@section('breadcrumb')
<!-- Breadcrumb -->
<div class="container">
    <ol class="breadcrumb">
        <li><a href="/">Home</a></li>
        <li class="active">Register Account</li>
    </ol>
</div>
<!-- end Breadcrumb -->
    @endsection


@section('header')
    @include('includes.header2')
@endsection

@section('content')
<div class="container">
    <h2 class="center">Create New Account</h2>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}" data-parsley-validate>
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name *</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address  *</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="phone" class="col-md-4 control-label">Phone Number *</label>

                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control" name="phone" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="location" class="col-md-4 control-label">Location</label>

                            <div class="col-md-6">
                                <input id="location" type="text" class="form-control" name="location">
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password *</label>

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
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password *</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>
                        <div class="form-group row">
                        <label for="avatar" class="col-md-4 control-label">Profile Picture</label>
                            <div class="col-md-6">
                                <input id="avatar" type="file" class="form-control" name="avatar">
                            </div>
                        </div>
                        <div class="form-group">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" required>I Understand <a href="/terms">Terms & Conditions</a>
                            </label>
                        </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
