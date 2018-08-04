<?php
/**
 * Created by PhpStorm.
 * User: mua rachman <muarachmann@gmail.com>
 * Date: 5/24/18
 * Time: 2:39 PM
 */
?>

@extends('layout.main')

@section('title', 'Events | Nkeksi-tech')

@section('page-class' , 'page-sub-page page-events-listing')

@section('breadcrumb')
    <!-- Breadcrumb -->
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="/">Home</a></li>
            <li class="active">Events</li>
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
                        <section class="events images" id="events">
                            <header><h1>Events</h1></header>
                            <div class="section-content">

                                @foreach($events as $event)
                                    <article class="event">
                                        <div class="event-thumbnail">
                                            <figure class="event-image">
                                                <div class="image-wrapper"><a href="{{ route('event.show', $event->id) }}"><img src="{{ asset('img/events/'.$event->event_pic) }}"></a></div>
                                            </figure>
                                            <figure class="date">
                                                <div class="month">{{ date('F',(strtotime($event->event_date))) }}</div>
                                                <div class="day">{{ date('j',(strtotime($event->event_date))) }}</div>
                                            </figure>
                                        </div>
                                        <aside>
                                            <header>
                                                <a href="{{ route('event.show', $event->id) }}">{{ $event->title }}</a>
                                            </header>
                                            <div class="additional-info"><span class="fa fa-map-marker"></span> {{ $event->location }} &nbsp;&nbsp; <span class="fa fa-clock-o"></span> {{ $event->event_time }}</div>
                                            <div class="description">
                                                <p>
                                                    {!! substr($event->info, 0,200) !!}
                                                    {!! strlen($event->info) > 200 ? "..." : "" !!}
                                                </p>
                                            </div>
                                            <a href="{{ route('event.show', $event->id) }}" class="btn btn-framed btn-color-primary btn-small">View Event</a>
                                        </aside>
                                    </article><!-- /.event -->
                                    @endforeach
                            </div><!-- /.section-content -->
                        </section><!-- /.events-images -->
                        <div class="center">
                            {{ $events->links('includes.pagination') }}
                        </div>
                    </div><!-- /#page-main -->
                </div><!-- /.col-md-8 -->

                <!--SIDEBAR Content-->
                <div class="col-md-4">
                    @include('includes.sidebar');
                </div><!-- /.col-md-4 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div>
    <!-- end Page Content -->

@endsection
