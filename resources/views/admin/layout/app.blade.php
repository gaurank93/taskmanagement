<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Task Management App" name="description"/>
    <meta content="gaurank" name="author"/>
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('assets/images/favicon.ico')}}">
    <!-- Bootstrap Css -->
    <link href="{{asset('theme/assets/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css"/>
    <!-- Icons Css -->
    <link href="{{asset('theme/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css"/>
    <!-- App Css-->
    <link href="{{asset('theme/assets/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="{{asset('theme/assets/libs/toastr/build/toastr.min.css')}}">
    @stack('header_script')
</head>

<body data-sidebar="dark">

<!-- Begin page -->
<div id="layout-wrapper">
    @include('admin.layout.header')
    <!-- ========== Left Sidebar Start ========== -->
    @include('admin.layout.sidebar')
    <!-- Left Sidebar End -->
    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">
        @yield('content')
        <!-- End Page-content -->
        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        @
                        <script>document.write(new Date().getFullYear())</script>
                    </div>
                    <div class="col-sm-6">
                        <div class="text-sm-right d-none d-sm-block">
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <!-- end main content-->
</div>
<!-- END layout-wrapper -->

<!-- JAVASCRIPT -->
<script src="{{asset('theme/assets/libs/jquery/jquery.min.js')}}"></script>
<script src="{{asset('theme/assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('theme/assets/libs/metismenu/metisMenu.min.js')}}"></script>
<script src="{{asset('theme/assets/libs/simplebar/simplebar.min.js')}}"></script>
<script src="{{asset('theme/assets/libs/node-waves/waves.min.js')}}"></script>
<script src="{{asset('theme/assets/js/app.js')}}"></script>
<script src="{{asset('theme/assets/libs/toastr/build/toastr.min.js')}}"></script>
@stack('footer_script')
@include('admin.layout.message')
</body>
</html>
