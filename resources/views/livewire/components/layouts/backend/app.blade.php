@include('livewire.components.layouts.backend.resources')

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <title>{{ $title ?? 'Inventory' }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @yield('header.css.files.global')
    @yield('header.css.files.private')

    @yield('header.css.code.global')
    @yield('header.css.code.private')

    {{ Vite::useBuildDirectory('build/backend')->withEntryPoints(['resources/js/backend/app.js', 'resources/css/backend/app.css']) }}

</head>

<body>
    <!-- BEGIN #loader -->
    <div class="app-loader" id="loader">
        <span class="spinner"></span>
    </div>
    <!-- END #loader -->

    <!-- BEGIN #app -->
    <div class="app app-content-full-height app-header-fixed app-sidebar-fixed app-gradient-enabled" id="app">

        @include('livewire.components.layouts.backend.header')

        @include('livewire.components.layouts.backend.sidebar')

        <!-- BEGIN #content -->
        <div class="app-content d-flex flex-column p-0" id="content">
            <!-- BEGIN content-container -->
            <div class="app-content-padding flex-grow-1 overflow-hidden" data-scrollbar="true" data-height="100%">
                <!-- BEGIN breadcrumb -->
                {{-- <ol class="breadcrumb float-xl-end">
                    <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
                    <li class="breadcrumb-item"><a href="javascript:;">Page Options</a></li>
                    <li class="breadcrumb-item active">Page with Footer</li>
                </ol> --}}
                <!-- END breadcrumb -->
                <!-- BEGIN page-header -->
                <h1 class="page-header">@yield('page.header') <small>@yield('page.header.small')</small></h1>
                <!-- END page-header -->

                <!-- BEGIN panel -->
                {{ $slot }}
                <!-- END panel -->
            </div>
            <!-- END content-container -->

            <!-- BEGIN #footer -->
            @include('livewire.components.layouts.backend.footer')
            <!-- END #footer -->

        </div>
        <!-- END #content -->

        @include('livewire.components.layouts.backend.theme-panel')

        <!-- BEGIN scroll-top-btn -->
        <a class="btn btn-icon btn-circle btn-theme btn-scroll-to-top" data-toggle="scroll-to-top"
            href="javascript:;"><i class="fa fa-angle-up"></i></a>
        <!-- END scroll-top-btn -->
    </div>
    <!-- END #app -->

    @yield('footer.js.files.global')
    @yield('footer.js.files.private')
    @yield('footer.js.code.global')
    @yield('footer.js.code.private')
</body>

</html>
