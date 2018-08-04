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
        {{ $post->title }} | Nkesi Tech
@endsection

@section('page-class' , 'page-sub-page page-blog-listing')

@section('breadcrumb')
    <!-- Breadcrumb -->
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="/">Home</a></li>
            <li><a href="/blog">Tech News</a></li>
            <li class="active">{{ $post->title }}</li>
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
                    <section id="blog-detail">
                        <header><h1>Tech News</h1></header>
                        <article class="blog-detail" data-postid="{{ $post->id }}">
                            <header class="blog-detail-header">
                                <img src="{{ asset('img/blogPosts/'.$post->featured_file) }}"  style="text-align:center !important;">
                                <h2>{{ $post->title }}</h2>
                                <div class="blog-detail-meta">
                                    <span class="date"><i class="fa fa-calendar-o"></i>{{ date('d-m-Y',(strtotime($post->created_at))) }}</span>
                                    <span class="author"><span class="fa fa-user"></span><a href="/team/{{ $post->team->id }}">{{ $post->team->fullname  }}</a></span>
                                    <span class="comments"><span class="fa fa-comment-o"></span>{{ $post->comments()->count() }} @if($post->comments()->count() > 1) comments @else comment @endif </span>
                                    @if( auth()->check() )
                                        <span class="likeBtn"><span class="{{ Auth::user()->likes()->where('post_id',$post->id)->first() ? Auth::user()->likes()->where('post_id',$post->id)->first()->like === 1 ? "fa fa-thumbs-up text-info": "fa fa-thumbs-o-up" : "fa fa-thumbs-o-up" }}"></span><span id="likeTxt">{{ $post->likes()->where('like', 1)->count() }} @if($post->likes()->where('like', 1)->count() > 1) likes @else like</span> @endif </span>
                                        @else
                                        <span class="like"><span class="fa fa-thumbs-o-up"></span><span id="likeTxt">{{ $post->likes()->where('like', 1)->count() }} @if($post->likes()->where('like', 1)->count() >1 ) likes @else like</span> @endif </span>
                                        @endif
                                </div>
                            </header>
                            <hr>
                            <div>
                                {!! $post->body !!}
                            </div>
                            <p><span style="font-weight: bolder;font-size: 11px">Category :</span>&nbsp;&nbsp;<a href="" class="btn btn-framed btn-color-primary btn-small">{{ $post->category->name }}</a></p>
                            <footer>
                                <section id="share-post">
                                    <div class="icons">
                                        <span>Share:</span>
                                        <a href="#"><i class="fa fa-twitter"></i></a>
                                        <a href="#"><i class="fa fa-facebook"></i></a>
                                        <a href="#"><i class="fa fa-pinterest"></i></a>
                                        <a href="#"><i class="fa fa-youtube-play"></i></a>
                                    </div><!-- /.icons -->
                                </section><!-- /share -->
                                <hr>
                                <section id="tags">
                                    @foreach ($post->tags as $tag)
                                      <a href="#" class="tag">{{ $tag->name }}</a>  
                                    @endforeach
                                </section><!-- /tags -->
                                <p class="clearfix"></p>
                                <p class="clearfix"></p>
                                <div id="gceResults">
                                <h1 style="text-align:center">GCE RESULTS OUT !!!!!!</h1>
                                <object data="{{ asset('img/blogPosts/2018_OLGEN.pdf') }}" type="application/pdf" style="width: 100%;" height="500">
                                 </object>
                                  <p class="clearfix"></p>
                                <p class="clearfix"></p>
                                  <div class="margin_bottom">
                                            <a href="{{ asset('img/blogPosts/2018_OLGEN.pdf') }}" target="_self" class="btn btn-framed btn-small btn-color-primary" style="text-decoration: none;"> DOWNLOAD O LEVEL RESULTS
                                                <i class="icon-eye"></i>
                                            </a>
                                            <a href="{{ asset('img/blogPosts/2018_AL_GEN.pdf') }}" download target="_self" class="btn btn-framed btn-small btn-color-primary" style="text-decoration: none;"> DOWNLOAD A LEVEL RESULTS
                                                <i class="icon-download"></i>
                                            </a>
                                        </div>
                                        </div>
                                <section id="about-author" class="author-block">
                                    <figure class="author-picture"><img src="{{ asset('img/admin/profile.png') }}"></figure>
                                    <article class="paragraph-wrapper">
                                        <div class="inner">
                                            <header>Nkeksi Tech</header>
                                            <figure>Re-inventing Technology in Africa</figure>
                                            <p>
                                                We are committed to making everyone enrolled on any of our tutorials satisfied by providing mentorship as shown on the courses page. Also, we are committed to provide adequate technology informations, tech startup news, technology seminars and conferences and any other technology event that could help build your interest in technology for a proper career choice and to feed your curiosity
                                                ... view more
                                            </p>
                                        </div>
                                    </article>
                                </section><!-- /about-author -->
                                <section id="post-pager" class="clearfix">
                                    @if($previous)
                                        <span class="pull-left"><a class="link-icon" href="{{ route( 'blog.show', $previous ) }}"><span class="fa fa-arrow-circle-o-left"></span>Previous Post</a></span>
                                    @endif
                                    @if($next)
                                        <span class="pull-right"><a class="link-icon" href="{{ route( 'blog.show', $next ) }}">Next Post<span class="fa fa-arrow-circle-o-right"></span></a></span>
                                    @endif
                                </section><!-- /post-pager -->
                            </footer>
                        </article>
                    </section><!-- /.blog-detail -->

                    <hr>

                    <section id="related-articles">
                        <header><h2>Related Articles</h2></header>
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <article class="blog-listing-post">
                                    <figure class="blog-thumbnail">
                                        <figure class="blog-meta"><span class="fa fa-file-text-o"></span>08-24-2014</figure>
                                        <div class="image-wrapper"><a href="blog-detail.html"><img src="assets/img/blog-01.jpg"></a></div>
                                    </figure>
                                    <aside>
                                        <header>
                                            <a href="blog-detail.html"><h3>Conservatory Exhibit: The garden of india a country and culture revealed</h3></a>
                                        </header>
                                    </aside>
                                </article><!-- /article -->
                            </div><!-- /.col-md-6 -->
                            <div class="col-md-6 col-sm-6">
                                <article class="blog-listing-post">
                                    <figure class="blog-thumbnail">
                                        <figure class="blog-meta"><span class="fa fa-file-text-o"></span>08-24-2014</figure>
                                        <div class="image-wrapper"><a href="blog-detail.html"><img src="assets/img/blog-02.jpg"></a></div>
                                    </figure>
                                    <aside>
                                        <header>
                                            <a href="blog-detail.html"><h3>Pellentesque dignissim fermentum nunc vel ultricies. Vivamus nec</h3></a>
                                        </header>
                                    </aside>
                                </article><!-- /article -->
                            </div><!-- /.col-md-6 -->
                        </div><!-- /.row -->
                    </section><!-- /related articles -->

                    <hr>
                        @include('comments.show')
                        @include('comments.create')
                </div><!-- /#page-main -->
            </div><!-- /.col-md-8 -->
             <!--SIDEBAR Content-->
            <div class="col-md-4">
                @include('includes.sidebar')
            </div><!-- /.col-md-4 -->
            </div>
            </div>
            </div>
@endsection