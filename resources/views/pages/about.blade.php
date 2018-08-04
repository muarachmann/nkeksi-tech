<?php
/**
 * Created by PhpStorm.
 * User: mua rachman <muarachmann@gmail.com>
 * Date: 5/24/18
 * Time: 2:39 PM
 */
?>

@extends('layout.main')

@section('title', 'About Us | Nkeksi-tech')

@section('page-class' , 'page-sub-page page-about-us')

@section('breadcrumb')
    <!-- Breadcrumb -->
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="/">Home</a></li>
            <li class="active">About Us</li>
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
                    <section id="about">
                        <header><h1>About Us</h1></header>
                        <img src="{{ asset('img/team.jpeg') }}"><br>
                        <h2>Mission & Purpose</h2>
                        <p>

                            Every year, we find University freshmen, newly enrolled on either an engineering program, or any other science program,
                            undergraduates and a number of young technology hobbyists ("techies") who are very enthusiastic about trying their hands on something,
                            designing and building amazing prototypes.
                            Most of these brilliant ideas are in the end, shattered,
                            not necessarily because the person nurturing this dream has suddenly gone lazy or isn't interested in building his/her
                            fantasies anymore but because most of these "techies" during the planning phase of their project,
                            are not able to point out the different cheap and easy to learn tools they could use due to their lack of knowledge on the availability and usage of these tools.
                            That is why we are committed to take you through a list of different flexible and easy to learn tools that will make your project not just a fantasy but a reality.
                         </p>
                        <h2>Bold History that Fuels the Future</h2>
                        <p>

                            Since February 2017, we have been working on making every "techie" aware of the different easy tools they could use to realize their ideas.
                            This was first done by introducing the Arduino Tutorial which was a physical tutorial on which students enrolled to learn how to use the Arduino. Now, we are glad to have come up with better,
                            fun and straight to the point strategies which won't necessitate your sitting in a classroom, but that you could do remotely. This is to achieve our goal of making creative people in technology at their convenience.
                            We are committed to making everyone enrolled on any of our tutorials satisfied by providing mentorship as shown on the courses page. Also, we are committed to provide adequate technology informations,
                            tech startup news, technology seminars and conferences and any other technology event that could help build your interest in technology for a proper career choice and to feed your curiosity.
                            We’re continuing to look down the road ahead to anticipate how to improve Nkeksi-tech for our students and tech followers. Together, we’ll continue to move technology forward.

                        </p>

                        <h2>Gallery</h2>
                        <div>
                            <ul class="gallery-list">
                                <li><a href="assets/img/gallery-big-image.jpg" class="image-popup"><img src="assets/img/image-01.jpg" alt=""></a></li>
                                <li><a href="assets/img/gallery-big-image.jpg" class="image-popup"><img src="assets/img/image-02.jpg" alt=""></a></li>
                                <li><a href="assets/img/gallery-big-image.jpg" class="image-popup"><img src="assets/img/image-03.jpg" alt=""></a></li>
                                <li><a href="assets/img/gallery-big-image.jpg" class="image-popup"><img src="assets/img/image-04.jpg" alt=""></a></li>
                                <li><a href="assets/img/gallery-big-image.jpg" class="image-popup"><img src="assets/img/image-05.jpg" alt=""></a></li>
                                <li><a href="assets/img/gallery-big-image.jpg" class="image-popup"><img src="assets/img/image-06.jpg" alt=""></a></li>
                                <li><a href="assets/img/gallery-big-image.jpg" class="image-popup"><img src="assets/img/image-07.jpg" alt=""></a></li>
                                <li><a href="assets/img/gallery-big-image.jpg" class="image-popup"><img src="assets/img/image-08.jpg" alt=""></a></li>
                                <li><a href="assets/img/gallery-big-image.jpg" class="image-popup"><img src="assets/img/image-09.jpg" alt=""></a></li>
                                <li><a href="assets/img/gallery-big-image.jpg" class="image-popup"><img src="assets/img/image-10.jpg" alt=""></a></li>
                                <li><a href="assets/img/gallery-big-image.jpg" class="image-popup"><img src="assets/img/image-11.jpg" alt=""></a></li>
                                <li><a href="assets/img/gallery-big-image.jpg" class="image-popup"><img src="assets/img/image-12.jpg" alt=""></a></li>
                                <li><a href="assets/img/gallery-big-image.jpg" class="image-popup"><img src="assets/img/image-13.jpg" alt=""></a></li>
                                <li><a href="assets/img/gallery-big-image.jpg" class="image-popup"><img src="assets/img/image-14.jpg" alt=""></a></li>
                            </ul>
                            <a href="" class="read-more">Go to Gallery</a>
                        </div>
                        <h2>Research</h2>
                        <p>
                            Sed bibendum, tortor in ornare sodales, sem augue suscipit tortor, auctor placerat nisi justo vel mauris.
                            In convallis nunc nunc, in tincidunt leo volutpat et. Donec in consequat lorem.
                        </p>
                        <ul class="element-framed">
                            <li>Aenean volutpat aliquet diam, id venenatis nisi faucibus sit amet. In hac habitasse platea dictumst</li>
                            <li>Integer vel sem est. Nulla pharetra, justo vitae placerat dapibus, dui massa pellentesque magn</li>
                            <li>Sagittis magna lorem a massa. Integer convallis augue eu felis euismod, vel iaculis velit pretium</li>
                            <li>Nam et diam ut sem aliquet ultrices non eu ante</li>
                        </ul>
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
