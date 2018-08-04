<?php
/**
 * Created by PhpStorm.
 * User: rachmann mua <muarachmann@gmail.com>
 * Date: 5/24/18
 * Time: 2:16 PM
 */
?>

<!-- Footer -->
<footer id="page-footer">
    <section id="footer-top">
        <div class="container">
            <div class="footer-inner">
                <div class="footer-social">
                    <figure>Follow us:</figure>
                    <div class="icons">
                        <a href=""><i class="fa fa-twitter"></i></a>
                        <a href=""><i class="fa fa-facebook"></i></a>
                        <a href=""><i class="fa fa-youtube-play"></i></a>
                    </div><!-- /.icons -->
                </div><!-- /.social -->
                <div class="search pull-right">
                    <h3>Subscribe to Our Newsletter</h3>
                    <form action="/newsletter" method="POST">
                    <div class="input-group">
                        <input type="email" class="form-control" id="user_email" name="user_email" placeholder="Email ..." required>
                        <span class="input-group-btn">
                        <button type="submit" class="btn">Subscribe <i class="glyphicon glyphicon-send" aria-hidden="true"></i></button>
                    </span>
                    </div><!-- /input-group -->
                        {{ csrf_field() }}
                    </form>
                </div><!-- /.pull-right -->
            </div><!-- /.footer-inner -->
        </div><!-- /.container -->
    </section><!-- /#footer-top -->

    <section id="footer-content">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-12">
                    <aside class="logo">
                        <img src="img/logo.png" class="vertical-center">
                    </aside>
                </div><!-- /.col-md-3 -->
                <div class="col-md-3 col-sm-4">
                    <aside>
                        <header><h4>Contact Us</h4></header>
                        <address>
                            <strong>Nkeksi Tech</strong>
                            <br>
                            <span>Re-inventing in Africa</span>
                            <br><br>
                            <span>Cameroon, Buea - Molyko</span>
                            <br>
                            <abbr title="Telephone">Telephone:</abbr> +(237) 673367517 | 670518086 | 679731423
                            <br>
                            <abbr title="Email">Email:</abbr> <a href="#">nkeksi2017@gmail.com</a>
                        </address>
                    </aside>
                </div><!-- /.col-md-3 -->
                <div class="col-md-3 col-sm-4">
                    <aside>
                        <header><h4>Important Links</h4></header>
                        <ul class="list-links">
                            <li><a href="#">Future Students</a></li>
                            <li><a href="#">Alumni</a></li>
                            <li><a href="#">Give a Donation</a></li>
                            <li><a href="/team">Our Team</a></li>
                            <li><a href="#">FAQs & Help</a></li>
                            <li><a href="/contact">Contact Us</a></li>
                        </ul>
                    </aside>
                </div><!-- /.col-md-3 -->
                <div class="col-md-3 col-sm-4">
                    <aside>
                        <header><h4>About <span class="yellow">Nkeksi-tech</span></h4></header>
                        <p>
                            We are committed to making everyone enrolled on any of our tutorials satisfied by providing mentorship as shown on the courses page. Also, we are committed to provide adequate technology informations, tech startup news,  ... <a href="/about" style="color: coral !important;"> view more</a>
                        </p>
                        <br>
                        <div>
                            <a href="/about" class="pull-left">
                                <button type="submit"  class="btn btn-framed">Read More <i class="fa fa-arrow-right"></i></button>
                            </a>
                        </div>
                    </aside>
                </div><!-- /.col-md-3 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
        <div class="background"><img src="assets/img/background-city.png" class="" alt=""></div>
    </section><!-- /#footer-content -->

    <section id="footer-bottom">
        <div class="container">
            <div class="footer-inner">
                <div class="copyright">© 2018 Nkeksi-tech, All rights reserved</div><!-- /.copyright -->
            </div><!-- /.footer-inner -->
        </div><!-- /.container -->
    </section><!-- /#footer-bottom -->

</footer>
<!-- end Footer -->

<script type="text/javascript" src="{{ asset('js/jquery-2.1.0.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery-migrate-1.2.1.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/selectize.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/owl.carousel.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery.validate.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery.placeholder.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jQuery.equalHeights.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/icheck.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery.vanillabox-0.1.5.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/retina-1.1.0.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/iziToast.min.js') }}"></script>
<script src="{{ asset('js/parsley.min.js') }}"></script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyChbyx56ElyVBpoD0PHdaAo5HR498HwXic&callback=initMap"
  type="text/javascript"></script>


<script type="text/javascript" src="{{ asset('js/nkeksi.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/custom.js') }}"></script>

<script type="text/javascript">
   var token =  '{!! csrf_token() !!}';
   var urlLike = '{{ route('like') }}';
   var urlGoing = '{{ route('going') }}';
   var urlquickregister = '{{ route('quickregister') }}';

@if(session()->has('success'))
    iziToast.success({
    title: 'Success',
    message:'{{session()->get("success")}}',
    icon: 'fa fa-check'
    });
@endif


@if(session()->has('error'))
iziToast.error({
    title: 'Warning',
    message:'{{session()->get("error")}}',
    icon: 'fa fa-warning'
});
    @endif

   var map;

   function initMap() {
       var latitude = 27.7172453; // YOUR LATITUDE VALUE
       var longitude = 85.3239605; // YOUR LONGITUDE VALUE

       var myLatLng = {lat: latitude, lng: longitude};

       map = new google.maps.Map(document.getElementById('eventMap'), {
           center: myLatLng,
           zoom: 14
       });

       var marker = new google.maps.Marker({
           position: myLatLng,
           map: map,
           //title: 'Hello World'

           // setting latitude & longitude as title of the marker
           // title is shown when you hover over the marker
           title: latitude + ', ' + longitude
       });
   }


</script>