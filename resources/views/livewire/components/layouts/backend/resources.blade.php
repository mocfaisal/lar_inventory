@section('header.css.files.global')
    {{-- <link href="{{ asset('assets') }}/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets') }}/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets') }}/css/app.min.css" rel="stylesheet" type="text/css" /> --}}

    <!-- ================== BEGIN core-css ================== -->
    <link href="{{ asset('assets') }}/css/vendor.min.css" rel="stylesheet" />
    <link href="{{ asset('assets') }}/css/default/app.min.css" rel="stylesheet" />
    <!-- ================== END core-css ================== -->
@endsection

@section('header.css.code.global')
    <style>

    </style>
@endsection

@section('footer.js.files.global')
    <!-- ================== BEGIN core-js ================== -->
    <script src="{{ asset('assets') }}/js/vendor.min.js"></script>
    <script src="{{ asset('assets') }}/js/app.min.js"></script>
    <!-- ================== END core-js ================== -->

    <!-- ================== BEGIN page-js ================== -->
    <script src="{{ asset('assets') }}/plugins/@highlightjs/cdn-assets/highlight.min.js"></script>
    <script src="{{ asset('assets') }}/js/demo/render.highlight.js"></script>
    <!-- ================== END page-js ================== -->
@endsection

@section('footer.js.code.global')
    <script></script>
@endsection
