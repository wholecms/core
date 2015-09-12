@include('backend::_layouts._head')
<body class="page-md page-header-fixed page-sidebar-closed-hide-logo page-sidebar-closed-hide-logo {{ !isset($slide_close) ? '' : 'page-sidebar-closed page-sidebar-closed-hide-logo' }}">
<div class="page-header md-shadow-z-1-i navbar navbar-fixed-top">
    @include('backend::_layouts._header')
    <!-- END HEADER INNER -->
</div>
<!-- END HEADER -->
<div class="clearfix">
</div>
<!-- BEGIN CONTAINER -->
<div class="page-container">
    <!-- BEGIN SIDEBAR -->
    <div class="page-sidebar-wrapper">
        <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
        <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
        <div class="page-sidebar md-shadow-z-2-i  navbar-collapse collapse">
            <!-- BEGIN SIDEBAR MENU -->
            <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
            <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
            <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
            <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
            <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
            <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
            @include('backend::_layouts._menu')
            <!-- END SIDEBAR MENU -->
        </div>
    </div>
    <!-- END SIDEBAR -->
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <div class="page-content">
            <!-- BEGIN PAGE HEAD -->
            <div class="page-head">
                <!-- BEGIN PAGE TITLE -->
                <div class="page-title">
                   @yield('page_title')
                    {{--<h1>Blank Page <small>blank page</small></h1>--}}
                </div>
                <!-- END PAGE TITLE -->
            </div>
            <!-- END PAGE HEAD -->
            <!-- BEGIN PAGE BREADCRUMB -->
            @yield('page_breadcrumb')

            {{--<ul class="page-breadcrumb breadcrumb">--}}
                {{--<li>--}}
                    {{--<a href="index.html">Home</a>--}}
                    {{--<i class="fa fa-circle"></i>--}}
                {{--</li>--}}
                {{--<li>--}}
                    {{--<a href="#">Page Layouts</a>--}}
                    {{--<i class="fa fa-circle"></i>--}}
                {{--</li>--}}
                {{--<li>--}}
                    {{--<a href="#">Blank Page</a>--}}
                {{--</li>--}}
            {{--</ul>--}}

            <!-- END PAGE BREADCRUMB -->
            <!-- BEGIN PAGE CONTENT INNER -->
            @yield('content')
            {{--<div class="row">--}}
                {{--<div class="col-md-12">--}}
                    {{--Page content goes here--}}
                {{--</div>--}}
            {{--</div>--}}

            <!-- END PAGE CONTENT INNER -->
        </div>
    </div>
    <!-- END CONTENT -->
</div>
<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->
@include('backend::_layouts._footer')
</body>
<!-- END BODY -->
</html>
