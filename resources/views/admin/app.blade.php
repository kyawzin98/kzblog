<!DOCTYPE html>
<html>

<head>
    @include('admin.layouts.head')
</head>

<body>

<!-- Sidenav -->
@include('admin.layouts.side_nav')

<!-- Main content -->
<div class="main-content">
    <!-- Top navbar -->
    @include('admin.layouts.top_nav')

    <!-- Header -->
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
        <div class="container-fluid">
            <div class="header-body">
                @section('page-header')

                @show
            </div>
        </div>
    </div>


    <!-- Page content -->
    <div class="container-fluid mt--7">

        @section('page-content')

        @show

        <!-- Footer -->
        @include('admin.layouts.footer')
    </div>
</div>
<!-- Argon Scripts -->
@include('admin.layouts.script')
</body>

</html>