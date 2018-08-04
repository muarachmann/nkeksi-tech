<?php
/**
 * Created by PhpStorm.
 * User: mua rachman <muarachmann@gmail.com>
 * Date: 5/24/18
 * Time: 2:39 PM
 */
?>

@extends('layout.main')

@section('title', 'Team | Nkeksi-tech')

@section('page-class' , 'page-sub-page page-members')

@section('breadcrumb')
    <!-- Breadcrumb -->
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="/">Home</a></li>
            <li class="active">Team</li>
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
            <section id="our-staff">
                <header><h2 class="no-divider">Our Team</h2></header>
                @foreach($team as $member)
                <div class="author-block">
                    <a href="/team/{{ $member->id }}"><figure class="author-picture"><img src="{{ asset('img/team/'.$member->profile_pic) }}" alt="{{ $member->fullname }}"></figure></a>
                    <article class="paragraph-wrapper">
                        <div class="inner">
                            <header><a href="/team/{{ $member->id }}" style="text-transform: capitalize;">{{ $member->fullname }}</a></header>
                            <figure>{{ $member->profession }}</figure>
                            <p>
                                {!! substr($member->about, 0,200) !!}
                                {!! strlen($member->about) > 200 ? "..." : "" !!}
                            </p>
                            <a href="/team/{{ $member->id }}" class="btn btn-framed btn-small btn-color-primary">Full Bio</a>
                        </div>
                    </article>
                </div><!-- /.author -->
                @endforeach
            </section><!-- /#our-staff -->
        </section>
    </div><!-- /#page-main -->
</div><!-- /.col-md-8 -->

    <!--SIDEBAR Content-->
    <div class="col-md-4">
    @include('includes.sidebar')
    </div>

    </div><!-- /.row -->
    </div><!-- /.container -->
    </div>
    <!-- end Page Content -->


@endsection
