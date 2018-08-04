
@include('includes.admin_header')
@include('includes.admin_navbar')


@include('includes.admin_sidebar')

<div class="content-wrapper">
     <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                @yield('page-title')
                <small> -Nkeksi tech</small>
            </h1>
            <div>
              @yield('add-btn-page')
            </div>
            @yield('breadcrumbs')
        </section>
       <section class="content">
            @include('includes.admin_navbar2')
         @yield('content')

       </section>


</div>


@include('includes.admin_footer')
