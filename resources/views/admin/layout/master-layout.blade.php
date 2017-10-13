<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name=viewport content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="keywords" content="">

    <link rel=icon href=web/assets/advence_idea_infotech.png sizes="16x16" type="image/png">
    <title>Car Portal</title>
   {{-- <link rel=icon href="web/assets/advence_idea_infotech.png" sizes="16x16" type="image/png">--}}
    @include('admin.includes.header')
    @yield('styles')
</head>

<meta name="csrf-token" content="{{ csrf_token() }}" />
<body>
<section id="container" >
    <!--header start-->
    <header class="header  blue-bg">@include('admin.includes.header-navigation')</header>
    <!--header end-->
    <!--sidebar start-->
    <aside> @include('admin.includes.left-sidebar')  </aside>
    <!--sidebar end-->

    <!--main content start-->
    <section id="main-content" >
        <section class="wrapper" >
            @include('admin.common.errors')
            @yield('content')
        </section>
    </section>
    <!--main content end-->

    <!-- Right Slidebar start -->
   {{-- <div class="sb-slidebar sb-right sb-style-overlay">  @include('admin.includes.right-sidebar') </div>--}}
    <!-- Right Slidebar end -->

    <!--footer start-->
    <footer class="site-footer"> @include('admin.includes.footer-contain') </footer>
    <!--footer end-->
</section>

<!-- js placed at the end of the document so the pages load faster -->
@include('admin.includes.footer')
<script>
    function show_confirm(obj){
        var r=confirm("Are you sure you want to delete?");
        if (r==true)
           window.location = obj.attr('href');
    }
    $('.delete').click(function(event) {
        event.preventDefault();
        show_confirm($(this));

    });
</script>
@yield('scripts')

</body>

</html>

