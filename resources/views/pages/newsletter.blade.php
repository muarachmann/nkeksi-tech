<?php
/**
 * Created by PhpStorm.
 * User: mua rachmann <muarachmann@gmail.com>
 * Date: 5/24/18
 * Time: 4:17 PM
 */
?>

@extends('layout.main')

@section('title', 'Subscribe | Nkeksi-tech')

@section('page-class' , 'page-sub-page page-contact')

@section('breadcrumb')
    <!-- Breadcrumb -->
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="/">Home</a></li>
            <li class="active">Contact Us</li>
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
            <div class="row">

                <div class="col-md-12">
                    @if(session()->has('success'))
                        <div class="alert-success">
                            <p>{{session()->get("success")}}</p>
                        </div>
                    @endif

                    <h3>Thanks</h3>
                </div>

            </div><!-- /.row -->
        </div><!-- /.container -->
    </div>
    <!-- end Page Content -->
    @endsection

