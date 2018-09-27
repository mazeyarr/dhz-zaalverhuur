<!DOCTYPE html>
<html>
<head>
    @include('partials.auth._head')
    @include('partials.auth._styles')
    @yield('style')
</head>
<body class="hold-transition skin-green-light sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

    @include('partials.auth.nav._topside')
    @include('partials.auth.nav._leftside')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                @yield('page-title')
                <small>@yield('page-discription')</small>
            </h1>
        </section>

        <!-- Main content -->
        <section class="content" id="app">
            @yield('content')
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    @include('partials.auth._footer')
</div>
<!-- ./wrapper -->
@include('partials.auth._scripts')
@yield('script')
</body>
</html>
