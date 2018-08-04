<?php
/**
 * Created by PhpStorm.
 * User: mua rachmann <muarachmann@gmail.com>
 * Date: 5/24/18
 * Time: 4:17 PM
 */
?>

@extends('layout.main')

@section('title', '404 | Nkeksi-tech')

@section('page-class' , 'page-sub-page')

@section('breadcrumb')
    <!-- Breadcrumb -->
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="/">Home</a></li>
            <li class="active">Error Page</li>
        </ol>
    </div>
    <!-- end Breadcrumb -->
@endsection

@section('header')
    @include('includes.header2')
@endsection



@section('content')
    <!-- Page Content -->
    <div id="page-content">
        <div class="container">
            <!--MAIN Content-->
            <div id="page-main">
                <section id="right-sidebar">
                    <header><h2>404 Page</h2></header>
                    <p>
                        You are seeing this page probably because the url you are trying to access does not exists. Try going back <a href="/">here</a>
                    </p>
                   <img src="img/404-img.jpg" class="center-block" height="400">
                </section>
            </div><!-- /#page-main -->
            <!-- end MAIN Content -->
        </div><!-- /.container -->
    </div>
    <!-- end Page Content -->
    @endsection