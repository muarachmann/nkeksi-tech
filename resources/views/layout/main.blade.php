@include('includes.head')

<body class="@yield('page-class')">
    <div class="wrapper">
    @yield('header')

    @yield('content')

@include('includes.footer')
    </div>
</body>

</html>
