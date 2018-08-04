<?php
/**
 * Created by PhpStorm.
 * User: mua rachman <muarachmann@gmail.com>
 * Date: 5/24/18
 * Time: 2:39 PM
 */
?>

@extends('layout.main')

@section('title', 'Member| Nkeksi-tech')

@section('page-class' , 'page-sub-page page-member-detail')

@section('breadcrumb')
    <!-- Breadcrumb -->
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="/">Home</a></li>
            <li><a href="/team">Team</a></li>
            <li class="active">{{ $member->fullname }}</li>
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
            <!--MAIN Content-->
            <div class="col-md-8">
                <div id="page-main">
                    <section id="members">
                        <header><h1>Member Details</h1></header>
                        <div class="author-block member-detail">
                            <figure class="author-picture"><img src="{{ asset('img/team/'.$member->profile_pic) }}" alt="{{ $member->fullname }}"></figure>
                            <article class="paragraph-wrapper">
                                <div class="inner">
                                    <header><h2>{{ $member->fullname }}</h2></header>
                                    <figure>{{ $member->protection }}</figure>
                                    <hr>
                                    <div class="contact">
                                        <h5><strong>Contact Member</strong></h5>
                                        <p><span class="fa fa-envelope"></span> Email : {{ $member->email }}</p>

                                        @if($member->site != NULL)
                                            <p><span class="fa fa-globe"></span> Website : <a target="_blank" href="http://{{ $member->site }}">{!! $member->site !!}</a></p>
                                        @endif


                                        <hr>
                                        <h5><strong>Social Profile</strong></h5>
                                        <div class="icons">
                                            @if($member->linkedin != NULL)
                                                <a href="{{ $member->linkedin }}" target="_blank"><i class="fa fa-linkedin"></i></a>
                                            @endif
                                            @if($member->facebook != NULL)
                                                <a href="{{ $member->facebook }}" target="_blank"><i class="fa fa-facebook"></i></a>
                                            @endif

                                            @if($member->twitter != NULL)
                                                <a href="{{ $member->twitter }}" target="_blank"><i class="fa fa-twitter"></i></a>
                                            @endif
                                            @if($member->google != NULL)
                                                <a href="{{ $member->google }}" target="_blank"><i class="fa fa-google-plus"></i></a>
                                            @endif
                                        </div><!-- /.icons -->
                                    </div>
                                    <h3>Biography</h3>
                                    <p>
                                    {!! $member->about !!}
                                    </p>
                                    <h3>Member's Courses</h3>
                                    <div class="table-responsive">
                                        <table class="table table-hover course-list-table tablesorter">
                                            <thead>
                                            <tr>
                                                <th>Course Name</th>
                                                <th class="starts">Starts</th>
                                                <th class="length">Length</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <th class="course-title"><a href="course-detail-v1.html">Introduction to modo 701</a></th>
                                                <th>01-03-2014</th>
                                                <th>3 months</th>
                                            </tr>
                                            <tr>
                                                <th class="course-title"><a href="course-detail-v1.html">Become self marketer</a></th>
                                                <th>03-03-2014</th>
                                                <th>2 lessons</th>
                                            </tr>
                                            <tr>
                                                <th class="course-title"><a href="course-detail-v1.html">How to find long term customers</a></th>
                                                <th>06-03-2014</th>
                                                <th>1 month</th>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </article>
                        </div><!-- /.author -->
                    </section>
                </div><!-- /#page-main -->
            </div><!-- /.col-md-8 -->

            <!--SIDEBAR Content-->
            <div class="col-md-4">
               @include('includes.sidebar')
            </div><!-- /.col-md-4 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</div>
<!-- end Page Content -->
    @endsection
