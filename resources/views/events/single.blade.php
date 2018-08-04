<?php
/**
 * Created by PhpStorm.
 * User: rachmann mua
 * <muarachmann@gmail.com>
 * Date: 6/27/18
 * Time: 9:04 PM
 */
?>

 <?php
/**
 * Created by PhpStorm.
 * User: mua rachman <muarachmann@gmail.com>
 * Date: 5/24/18
 * Time: 2:39 PM
 */
?>

@extends('layout.main')

@section('title')
    {{ $event->title }} | Nkesi Tech
@endsection

@section('page-class' , 'page-sub-page page-blog-listing')

@section('breadcrumb')
    <!-- Breadcrumb -->
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="/">Home</a></li>
            <li><a href="/event">Events</a></li>
            <li class="active">{{ $event->title }}</li>
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
            <header><h1>{{ $event->title }}</h1></header>
            <div class="row">
                <!--MAIN Content-->
                <!-- Course Image -->
                <div class="col-md-2 col-sm-3">
                    <figure class="event-image">
                        <div class="image-wrapper"><img src="{{ asset('img/events/'.$event->event_pic) }}"></div>
                    </figure>
                </div><!-- end Course Image -->
                <!--MAIN Content-->
                <div class="col-md-6 col-sm-9">
                    <div id="page-main">
                        <section id="event-detail">
                            <article class="event-detail">
                                <section id="event-header">
                                    <header>
                                        <h2 class="event-date">{{ date('l F j , Y',(strtotime($event->event_date))) }}</h2>
                                    </header>
                                    <hr>
                                    <div class="course-count-down" id="course-count-down">
                                        <figure class="course-start">
                                            <span class="fa fa-clock-o"></span> Event starts  at: {{ $event->event_time }} &nbsp;&nbsp; <span class="fa fa-map-marker"></span> Event location: {{ $event->location }}
                                        </figure>
                                        <!-- /.event-time -->
                                    </div>
                                    <hr>
                                    @if($event->url != NULL)
                                    <figure>
                                        <span class="course-summary" id="course-length"><i class="fa fa-external-link"></i> Alternate link - <a href="{{ $event->url }}" target="_blank">{{ $event->url }}</a></span>
                                    </figure>
                                        @endif
                                    <hr>
                                    <div data-eventid="{{ $event->id }}">
                                    <figure>
                                        @if( auth()->check() )
                                            <span class="course-summary" id="course-length"><i class="fa fa-users"></i>(<span id="eventTotal">{{ $event->interested->where('interested', 1)->count() }}</span>) @if($event->interested->where('interested', 1)->count()  > 1) People Interested @else Person Interested @endif</span> <span id="goingTxt" class="btn btn-framed btn-color-primary btn-small goingBtn">{{ Auth::user()->interested->where('event_id',$event->id)->first() ? Auth::user()->interested->where('event_id',$event->id)->first()->interested === 1 ? "Not Going ?": "Going ?" : "Going ?" }}</span>
                                        @else
                                            <span class="course-summary" id="course-length"><i class="fa fa-users"></i> ({{ $event->interested->where('interested', 1)->count() }}) @if($event->interested->where('interested', 1)->count()  > 1) People Interested @else Person Interested @endif.</span>
                                        @endif
                                    </figure>
                                    </div>
                                </section><!-- /#event-header -->

                                <section id="course-info">
                                    <header><h2>Event Info</h2></header>
                                    <p>
                                        {!! $event->info !!}
                                    </p>
                                </section><!-- /#course-info -->

                                <section id="map">
                                    <header><h2>Place on Map</h2></header>
                                    <div class="map-wrapper" id="eventMap">
                                    </div>
                                </section><!-- /#map -->
                                <section id="post-pager" class="clearfix">
                                    @if($previous)
                                        <span class="pull-left"><a class="link-icon" href="{{ route( 'event.show', $previous ) }}"><span class="fa fa-arrow-circle-o-left"></span>Previous Event</a></span>
                                    @endif
                                    @if($next)
                                        <span class="pull-right"><a class="link-icon" href="{{ route( 'event.show', $next ) }}">Next Event<span class="fa fa-arrow-circle-o-right"></span></a></span>
                                    @endif
                                </section><!-- /post-pager -->
                            </article><!-- /.course-detail -->
                        </section><!-- /.course-detail -->
                    </div><!-- /#page-main -->
                </div><!-- /.col-md-8 -->

                <!-- /.col-md-8 -->
                <!--SIDEBAR Content-->
                <div class="col-md-4">
                    @include('includes.sidebar')
                </div><!-- /.col-md-4 -->
            </div>
        </div>
    </div>
@endsection
