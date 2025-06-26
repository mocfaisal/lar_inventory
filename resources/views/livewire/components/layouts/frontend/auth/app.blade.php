<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Inventory Management | Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <!-- ================== BEGIN core-css ================== -->
    <link href="{{ asset('assets') }}/css/vendor.min.css" rel="stylesheet" />
    <link href="{{ asset('assets') }}/css/default/app.min.css" rel="stylesheet" />
    <!-- ================== END core-css ================== -->

    {{ Vite::useBuildDirectory('build/frontend')->withEntryPoints(['resources/js/frontend/app.js', 'resources/css/frontend/app.css']) }}

</head>

<body class='pace-top'>
    <!-- BEGIN #loader -->
    <div class="app-loader" id="loader">
        <span class="spinner"></span>
    </div>
    <!-- END #loader -->

    <!-- BEGIN #app -->
    <div class="app" id="app">

        {{ $slot }}

        <!-- BEGIN theme-panel -->
        @include('livewire.components.layouts.frontend.auth.theme-panel')
        <!-- END theme-panel -->
        <!-- BEGIN scroll-top-btn -->
        <a class="btn btn-icon btn-circle btn-theme btn-scroll-to-top" data-toggle="scroll-to-top"
            href="javascript:;"><i class="fa fa-angle-up"></i></a>
        <!-- END scroll-top-btn -->
    </div>
    <!-- END #app -->

    <!-- ================== BEGIN core-js ================== -->
    <script src="{{ asset('assets') }}/js/vendor.min.js"></script>
    <script src="{{ asset('assets') }}/js/app.min.js"></script>
    <!-- ================== END core-js ================== -->

    <!-- ================== BEGIN page-js ================== -->
    <script src="{{ asset('assets') }}/js/demo/login-v2.demo.js"></script>
    <!-- ================== END page-js ================== -->
</body>

</html>
