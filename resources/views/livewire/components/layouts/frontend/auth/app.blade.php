<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>Color Admin | Login v2</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />

	<!-- ================== BEGIN core-css ================== -->
	<link href="{{ asset('assets') }}/css/vendor.min.css" rel="stylesheet" />
	<link href="{{ asset('assets') }}/css/default/app.min.css" rel="stylesheet" />
	<!-- ================== END core-css ================== -->
</head>
<body class='pace-top'>
	<!-- BEGIN #loader -->
	<div id="loader" class="app-loader">
		<span class="spinner"></span>
	</div>
	<!-- END #loader -->


	<!-- BEGIN #app -->
	<div id="app" class="app">

        {{ $slot }}

		<!-- BEGIN theme-panel -->
        @include('livewire.components.layouts.frontend.auth.theme-panel')
		<!-- END theme-panel -->
		<!-- BEGIN scroll-top-btn -->
		<a href="javascript:;" class="btn btn-icon btn-circle btn-theme btn-scroll-to-top" data-toggle="scroll-to-top"><i class="fa fa-angle-up"></i></a>
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
