<?php
/**
 * Created by PhpStorm.
 * User: mua rachmann <muarachmann@gmail.com>
 * Date: 5/24/18
 * Time: 1:39 PM
 */
?>

@extends('layout.main')

@section('title', 'Nkeksi-tech')

@section('page-class' , 'page-homepage-carousel')

@section('header')
    @include('includes.header')
    @endsection

@section('content')
    <!-- Slider -->
    <div id="homepage-carousel">
        <div class="container">
            <div class="homepage-carousel-wrapper">
                <div class="row">
                    <div class="col-md-6 col-sm-7">
                        <div class="image-carousel">
                            <div class="image-carousel-slide"><img src="img/slides/slide1.jpeg" alt=""></div>
                            <div class="image-carousel-slide"><img src="img/slides/slide2.jpeg" alt=""></div>
                            <div class="image-carousel-slide"><img src="img/slides/slide3.jpeg" alt=""></div>
                            <div class="image-carousel-slide"><img src="img/slides/slide4.jpeg" alt=""></div>
                            <div class="image-carousel-slide"><img src="img/slides/slide5.jpeg" alt=""></div>
                            <div class="image-carousel-slide"><img src="img/slides/slide6.jpeg" alt=""></div>
                            <div class="image-carousel-slide"><img src="img/slides/slide7.jpeg" alt=""></div>
                        </div><!-- /.slider-image -->
                    </div><!-- /.col-md-6 -->
                    <div class="col-md-6 col-sm-5">
                        <div class="slider-content">
                            <div class="row">
                                <div class="col-md-12">
                                    <h1>Join the <span class="yellow">Nkeksi-tech</span> community of modern thinking students</h1>
                                    <form id="slider-form" role="form" action="" method="post">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="input-group">
                                                    <input class="form-control has-dark-background" name="myName" id="slider-name" placeholder="Full Name" type="text" required>
                                                </div>
                                            </div><!-- /.col-md-6 -->
                                            <div class="col-md-6">
                                                <div class="input-group">
                                                    <input class="form-control has-dark-background" name="myEmail" id="slider-email" placeholder="Email" type="email" required>
                                                </div>
                                            </div><!-- /.col-md-6 -->
                                        </div><!-- /.row -->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="input-group">
                                                    <select name="location" id="slider-location" class="has-dark-background">
                                                        <option value="">Location</option>
                                                        <option value="Buea">Buea</option>
                                                        <option value="Bamenda">Bamenda</option>
                                                        <option value="Douala">Douala</option>
                                                        <option value="Yaounde">Yaounde</option>
                                                    </select>
                                                </div><!-- /.form-group -->
                                            </div><!-- /.col-md-6 -->
                                            <div class="col-md-6">
                                                <div class="input-group">
                                                    <select name="slider-course" id="slider-course" class="has-dark-background">
                                                        <option value="- Not selected -">Courses</option>
                                                        <option value="Art and Design">Art and Design</option>
                                                        <option value="Marketing">Marketing</option>
                                                        <option value="Science">Science</option>
                                                        <option value="History and Psychology"></option>
                                                    </select>
                                                </div><!-- /.form-group -->
                                            </div><!-- /.col-md-6 -->
                                        </div><!-- /.row -->
                                        <button type="submit" id="slider-submit" class="btn btn-framed pull-right">Submit</button>
                                        <div id="form-status"></div>
                                    </form>
                                </div><!-- /.col-md-12 -->
                            </div><!-- /.row -->
                        </div><!-- /.slider-content -->
                    </div><!-- /.col-md-6 -->
                </div><!-- /.row -->
                <div class="background"></div>
            </div><!-- /.slider-wrapper -->
            <div class="slider-inner"></div>
        </div><!-- /.container -->
    </div>
    <!-- end Slider -->

    <section id="featured-courses">
        <div class="block">
            <div class="container">
                <header><h2>Featured Courses</h2></header>
                <div class="row">
                    <div class="col-md-3 col-sm-3">
                        <article class="featured-course">
                            <figure class="image">
                                <div class="image-wrapper"><a href="course-detail-v1.html"><img src="img/arduino.png"></a></div>
                            </figure>
                            <div class="description">
                                <a href="course-detail-v1.html"><h3>Arduino Training: Build powerful, robust circuits</h3></a>
                                <a href="#" class="course-category">Electrical , programming</a>
                                <hr>
                                <div class="course-meta">
                                    <span class="course-date"><i class="fa fa-calendar-o"></i>01-03-2014</span>
                                    <span class="course-length"><i class="fa fa-clock-o"></i>3 months</span>
                                </div>
                                <div class="stick-to-bottom"><a href="course-detail-v1.html" class="btn btn-framed btn-color-grey btn-small">View Details</a></div>
                            </div>
                        </article><!-- /.featured-course -->
                    </div><!-- /.col-md-3 -->
                    <div class="col-md-3 col-sm-3">
                        <article class="featured-course">
                            <figure class="image">
                                <div class="image-wrapper"><a href="course-detail-v1.html"><img src="img/proteus.jpeg"></a></div>
                            </figure>
                            <div class="description">
                                <a href="course-detail-v1.html"><h3>Proteus Circuit Designs: Proteus Basics</h3></a>
                                <a href="#" class="course-category">Electrical</a>
                                <hr>
                                <div class="course-meta">
                                    <span class="course-date"><i class="fa fa-calendar-o"></i>01-03-2014</span>
                                    <span class="course-length"><i class="fa fa-clock-o"></i>3 months</span>
                                </div>
                                <div class="stick-to-bottom"><a href="course-detail-v1.html" class="btn btn-framed btn-color-grey btn-small">View Details</a></div>
                            </div>
                        </article><!-- /.featured-course -->
                    </div><!-- /.col-md-3 -->
                    <div class="col-md-3 col-sm-3">
                        <article class="featured-course">
                            <figure class="image">
                                <div class="image-wrapper"><a href="course-detail-v1.html"><img src="img/python.jpeg"></a></div>
                            </figure>
                            <div class="description">
                                <a href="course-detail-v1.html"><h3>Python Basics: Complete course</h3></a>
                                <a href="#" class="course-category">programming</a>
                                <hr>
                                <div class="course-meta">
                                    <span class="course-date"><i class="fa fa-calendar-o"></i>01-03-2014</span>
                                    <span class="course-length"><i class="fa fa-clock-o"></i>3 months</span>
                                </div>
                                <div class="stick-to-bottom"><a href="course-detail-v1.html" class="btn btn-framed btn-color-grey btn-small">View Details</a></div>
                            </div>
                        </article><!-- /.featured-course -->
                    </div><!-- /.col-md-3 -->
                    <div class="col-md-3 col-sm-3">
                        <article class="featured-course clearfix">
                            <figure class="image">
                                <div class="image-wrapper"><a href="course-detail-v1.html"><img src="img/firebase.jpeg"></a></div>
                            </figure>
                            <div class="description">
                                <a href="course-detail-v1.html"><h3>Firebase for the Beginners: Complete Course</h3></a>
                                <a href="#" class="course-category">JavaScript, framework</a>
                                <hr>
                                <div class="course-meta">
                                    <span class="course-date"><i class="fa fa-calendar-o"></i>01-03-2014</span>
                                    <span class="course-length"><i class="fa fa-clock-o"></i>3 months</span>
                                </div>
                                <div class="stick-to-bottom"><a href="course-detail-v1.html" class="btn btn-framed btn-color-grey btn-small">View Details</a></div>
                            </div>
                        </article><!-- /.featured-course -->
                    </div><!-- /.col-md-3 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
            <div class="background background-color-grey-background"></div>
        </div><!-- /.block -->
    </section>
    <!-- /#featured-courses -->


    @endsection
