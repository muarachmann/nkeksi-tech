<?php
/**
 * Created by PhpStorm.
 * User: rachmann
 * Date: 5/25/18
 * Time: 1:19 PM
 */
?>

@extends('layout.admin_login')

@section('page-class' , 'hold-transition login-page')


@section('content')
    <div class="login-box">
        <div class="login-logo">
            <a href="../../index2.html"><b>Nkeksi</b> Tech</a>
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">
            <p class="login-box-msg">Sign in to start your session</p>

            <form action="../../index2.html" method="post">
                <div class="form-group has-feedback">
                    <input type="email" class="form-control" placeholder="Email">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" placeholder="Password">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="checkbox icheck">
                            <label>
                                <input type="checkbox"> &nbsp;Remember Me
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <br>
                    <br>
                    <div class="col-xs-12">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
            <p class="clearfix">
            <p class="clearfix">
            <p class="clearfix">
            <a href="#">I forgot my password</a><br>
            <a href="register.html" class="text-center">Register a new membership</a>

        </div>
        <!-- /.login-box-body -->
    </div>
    <!-- /.login-box -->
    @endsection
