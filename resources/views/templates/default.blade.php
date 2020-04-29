<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from fox-admin-templates.multipurposethemes.com/fox-admin-template/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 26 Feb 2020 16:10:21 GMT -->
@include('templates.partials._head')

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    @include('templates.partials._navbar')

    <!-- Left side column. contains the logo and sidebar -->
    @include('templates.partials._sidebar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @yield('content')
    </div>
    <!-- /.content-wrapper -->
    @include('templates.partials._footer')

</div>
<!-- ./wrapper -->

@include('templates.partials._script')
<!-- Mirrored from fox-admin-templates.multipurposethemes.com/fox-admin-template/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 26 Feb 2020 16:13:32 GMT -->
</html>
