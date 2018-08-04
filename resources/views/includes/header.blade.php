<?php
/**
 * Created by PhpStorm.
 * User: rachmann mua <muarachmann@gmail.com>
 * Date: 5/24/18
 * Time: 2:16 PM
 */
?>

<!-- Header -->
<div class="navigation-wrapper">
    <div class="secondary-navigation-wrapper">
        <div class="container">
            <div class="navigation-contact pull-left"><span class="fa fa-phone"></span> Call Us:  <span class="opacity-80">(+237) 673367517 | 670518086 | 679731423</span>&nbsp;&nbsp;&nbsp; <span class="fa fa-map-marker"></span> Location: Buea - Molyko</div>
            <div class="search">
                <div class="input-group">
                    <input type="search" class="form-control" name="search" placeholder="Search">
                    <span class="input-group-btn"><button type="submit" id="search-submit" class="btn"><i class="fa fa-search"></i></button></span>
                </div><!-- /.input-group -->
            </div>
            <ul class="secondary-navigation list-unstyled">
                @guest
                    <li class="{{ Request::is('login') ? "active":"" }}"><a href="/login">Login &nbsp;&nbsp;&nbsp; /</a></li>
                    <li class="{{ Request::is('register') ? "active":"" }}"><a href="/register">Register</a></li>
                @else
                    <li><a data-toggle="{{ Request::is('dashboard') ? "tab":"" }}" href="{{ route('dashboard') }}#tab-profile"><i class="fa fa-user"></i>{{ Auth::user()->name }}</a></li>
                    <li><a data-toggle="{{ Request::is('dashboard') ? "tab":"" }}" href="{{ route('dashboard') }}#tab-my-courses">My Courses</a></li>
                    <li><a href="/logout" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Log Out</a></li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                    <li><a href="#"><img src="@if(Auth::user()->avatar != NULL ) {{asset('img/users')}}/{{ Auth::user()->avatar }} @else {{ asset('img/profile.png') }} @endif" class="img-circle" width="37" height="35"></a></li>
                @endguest
            </ul>
        </div>
    </div><!-- /.secondary-navigation -->
    <div class="primary-navigation-wrapper">
        <header class="navbar" id="top" role="banner">
            <div class="container">
                <div class="navbar-header">
                    <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <div class="navbar-brand nav" id="brand">
                        <a href="/"><img src="img/logo.png" alt="brand"></a>
                    </div>
                </div>
                <nav class="collapse navbar-collapse bs-navbar-collapse navbar-right" role="navigation">
                    <ul class="nav navbar-nav">
                        <li class="{{ Request::is('/') ? "active":"" }}">
                            <a href="/">Home</a>
                        </li>
                        <li class="{{ Request::is('courses') ? "active":"" }}">
                            <a href="/courses">Courses</a>
                        </li>
                        <li class="{{ Request::is('event') ? "active":"" }}">
                            <a href="/event">Events</a>
                        </li>
                        <li class="{{ Request::is('about') ? "active":"" }}">
                            <a href="/about">About Us</a>
                        </li>
                        <li class="{{ Request::is('team') ? "active":"" }}">
                            <a href="/team">Team</a>
                        </li>
                        <li class="{{ Request::is('blog') ? "active":"" }}">
                            <a href="/blog">Tech News</a>
                        </li>
                        <li class="{{ Request::is('contact') ? "active":"" }}">
                            <a href="/contact">Contact Us</a>
                        </li>
                    </ul>
                </nav><!-- /.navbar collapse-->
            </div><!-- /.container -->
        </header><!-- /.navbar -->
    </div><!-- /.primary-navigation -->
    <div class="background">
        <img src=""  alt="">
    </div>
</div>
<!-- end Header -->
