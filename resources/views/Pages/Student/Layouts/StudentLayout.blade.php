<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>IOCL STUDUNT</title>
    {{--    <link rel="icon" href="favicon.ico" type="image/x-icon">--}}
    <link rel="stylesheet" href="{{asset('studentAssets/plugins/bootstrap/css/bootstrap.min.css')}}"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <!-- Custom Css -->
    <link rel="stylesheet" href="{{asset('studentAssets/css/main.css')}}">
    <link rel="stylesheet" href="{{asset('studentAssets/css/themes/all-themes.css')}}"/>
    <script>
        let BASE_URL = "{{url("")}}/";
    </script>
</head>
<body class="theme-green " oncontextmenu="return false;">

@include('Pages.Student.Components.StudentHeader')
<section class="content home">
    <div class="container-fluid">
        @yield('content')
    </div>
</section>
<div class="color-bg"></div>
<script src="{{asset("studentAssets/bundles/libscripts.bundle.js")}}"></script>
<script src="{{asset("studentAssets/bundles/vendorscripts.bundle.js")}}"></script>
<script src="{{asset('studentAssets/plugins/jquery-sparkline/jquery.sparkline.min.js')}}"></script>

<script src="{{asset('studentAssets/bundles/mainscripts.bundle.js')}}"></script><!-- Custom Js -->
<script src="{{asset('studentAssets/js/pages/index.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{asset('studentAssets/js/pages/ui/modals.js')}}"></script>
<script src="{{asset('studentAssets/js/StudentScript.js')}}"></script>
</body>
</html>
