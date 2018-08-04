<?php
/**
 * Created by PhpStorm.
 * User: mua rachmann
 * Date: 5/24/18
 * Time: 1:33 PM
 */
?>
        <!DOCTYPE html>

<html lang="en-US">
<head>
    <meta charset="UTF-8"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-122724185-1"></script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());
        
          gtag('config', 'UA-122724185-1');
        </script>
        
        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        <script>
          (adsbygoogle = window.adsbygoogle || []).push({
            google_ad_client: "ca-pub-5995798069396444",
            enable_page_level_ads: true
          });
        </script>

    
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href="{{ asset('css/font-awesome.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/selectize.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/vanillabox/vanillabox.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/vanillabox/vanillabox.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/iziToast.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/parsley.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" type="text/css">

    <title>@yield('title')</title>

</head>
