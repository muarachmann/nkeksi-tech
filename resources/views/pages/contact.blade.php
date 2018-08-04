<?php
/**
 * Created by PhpStorm.
 * User: mua rachmann <muarachmann@gmail.com>
 * Date: 5/24/18
 * Time: 4:17 PM
 */
?>

@extends('layout.main')

@section('title', 'Contact Us | Nkeksi-tech')

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
                <!--MAIN Content-->
                <div class="col-md-8">
                    <div id="page-main">
                        <section id="contact">
                            <header><h1>Contact Us</h1></header>
                            <div class="row">
                                <div class="col-md-6">
                                    <address>
                                        <h3>Nkeksi Tech</h3>
                                        <br>
                                        <span>Reinventing technology in Africa</span>
                                        <br><br>
                                        <span>Buea - Molyko</span>
                                        <br>
                                        <abbr title="Telephone">Telephone:</abbr> (+237) 673367517 | 670518086
                                        <br>
                                        <abbr title="Email">Email:</abbr> <a href="#">nkeksi2017@gmail.com</a>
                                    </address>
                                    <div class="icons">
                                        <a href=""><i class="fa fa-twitter"></i></a>
                                        <a href=""><i class="fa fa-facebook"></i></a>
                                        <a href=""><i class="fa fa-pinterest"></i></a>
                                        <a href=""><i class="fa fa-youtube-play"></i></a>
                                    </div><!-- /.icons -->
                                    <hr>
                                    <p>
                                        We are available at our office space, You may want to pass by for a coffee.
                                    </p>
                                </div>
                                <div class="col-md-6">
                                    <div class="map-wrapper">
                                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3979.347512816777!2d9.288245414760324!3d4.151893296981346!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x106131b22930afcd%3A0xe7dfa8e14afee74!2sNkeksi-tech!5e0!3m2!1sen!2scm!4v1527182218660" width="350" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>                                </div>
                            </div>
                        </section>
                        <section id="contact-form" class="clearfix">
                            <header><h2>Send Us a Message</h2></header>
                            <form class="contact-form" id="contactform" method="POST" action="{{ url('/contact') }}">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="input-group">
                                            <div class="controls">
                                                <label for="name">Your Name *</label>
                                                <input type="text" name="name" id="name" value="@guest @else{{ Auth::user()->name }}@endguest" required>
                                            </div><!-- /.controls -->
                                        </div><!-- /.control-group -->
                                    </div><!-- /.col-md-4 -->
                                    <div class="col-md-6">
                                        <div class="input-group">
                                            <div class="controls">
                                                <label for="email">Your Email *</label>
                                                <input type="email" name="email" value="@guest @else{{ Auth::user()->email }}@endguest" id="email" required>
                                            </div><!-- /.controls -->
                                        </div><!-- /.control-group -->
                                    </div><!-- /.col-md-4 -->
                                </div><!-- /.row -->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="input-group">
                                            <div class="controls">
                                                <label for="subject">Subject *</label>
                                                <input type="text" name="subject" id="subject" required>
                                            </div><!-- /.controls -->
                                        </div><!-- /.control-group -->
                                    </div><!-- /.col-md-4 -->
                                </div><!-- /.row -->
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="input-group">
                                            <div class="controls">
                                                <label for="message">Your Message *</label>
                                                <textarea name="message" id="message" required></textarea>
                                            </div><!-- /.controls -->
                                        </div><!-- /.control-group -->
                                    </div><!-- /.col-md-4 -->
                                </div><!-- /.row -->
                                <div class="pull-right">
                                    <input type="submit" class="btn btn-color-primary" value="Send a Message">
                                </div><!-- /.form-actions -->
                                <div id="form-status"></div>
                            </form><!-- /.footer-form -->
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

