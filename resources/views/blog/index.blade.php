<?php
/**
 * Created by PhpStorm.
 * User: mua rachman <muarachmann@gmail.com>
 * Date: 5/24/18
 * Time: 2:39 PM
 */
?>

@extends('layout.main')

@section('title', 'Tech News | Nkeksi-tech')

@section('page-class' , 'page-sub-page page-blog-listing')

@section('breadcrumb')
    <!-- Breadcrumb -->
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="/">Home</a></li>
            <li class="active">Tech News</li>
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
                    <section class="blog-listing" id="blog-listing">
                        <header><h1>Tech News</h1></header>
                        <div class="row">
                        @foreach ($posts as $key=> $post )
                            @if ($key %2 != 0)
                            <div class="col-md-6 col-sm-6">
                                <article class="blog-listing-post">
                                    <figure class="blog-thumbnail">
                                        <figure class="blog-meta"><span class="fa fa-calendar-o"></span>{{ date('d-m-Y',(strtotime($post->created_at))) }}</figure>
                                        <div class="image-wrapper"><a href="{{ route('blog.show',$post->id) }}"><img src="{{ asset('img/blogPosts/'.$post->featured_file) }}"></a></div>
                                    </figure>
                                    <aside>
                                        <header>
                                            <a href="{{ route('blog.show',$post->id) }}"><h3>{{ $post->title }}</h3></a>
                                        </header>
                                        <div class="description">
                                            <p>
                                               {!! substr($post->body, 0,200) !!}
                                                {!! strlen($post->body) > 200 ? "..." : "" !!}
                                            </p>
                                        </div>
                                        <a href="{{ route('blog.show',$post->id) }}" class="read-more stick-to-bottom">Read More</a>
                                    </aside>
                                </article><!-- /article -->
                            </div><!-- /.col-md-6 -->
                            @else
                            <div class="col-md-6 col-sm-6">
                                <article class="blog-listing-post">
                                    <figure class="blog-thumbnail">
                                        <figure class="blog-meta"><span class="fa fa-calendar-o"></span>{{ date('d-m-Y',(strtotime($post->created_at))) }}</figure>
                                        <div class="image-wrapper"><a href="{{ route('blog.show',$post->id) }}"><img src="{{ asset('img/blogPosts/'.$post->featured_file) }}"></a></div>
                                    </figure>
                                    <aside>
                                        <header>
                                            <a href="{{ route('blog.show',$post->id) }}"><h3>{{ $post->title }}</h3></a>
                                        </header>
                                        <div class="description">
                                            <p>
                                                {!! substr($post->body, 0,200) !!}
                                                {!! strlen($post->body) > 200 ? "..." : "" !!}
                                            </p>
                                        </div>
                                        <a href="{{ route('blog.show',$post->id) }}" class="read-more stick-to-bottom">Read More</a>
                                    </aside>
                                </article><!-- /article -->
                            </div><!-- /.col-md-6 -->
                            @endif
                        @endforeach
                        </div>
                    </section><!-- /.blog-listing -->
                    <div class="center">
                        {{ $posts->links('includes.pagination') }}
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
