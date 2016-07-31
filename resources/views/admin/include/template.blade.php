<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Fortute</title>
    @include('admin.include.link')
</head>

<body class="hold-transition skin-yellow sidebar-mini">
    
    @include('admin.include.header')

    <div id="page-container" style="background: #222d32;">
        <!-- BEGIN SIDEBAR -->
        
    
        @include('admin.include.left-sidebar')
        <!-- BEGIN RIGHTBAR -->
        
        <!-- END RIGHTBAR -->

        @yield('content')
        
        <!-- page-content -->

        @include('admin.include.footer')

        @include('admin.include.script')

    </div>
    <!-- page-container -->


</body>

</html>