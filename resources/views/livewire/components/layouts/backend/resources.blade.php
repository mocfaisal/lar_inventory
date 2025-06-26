@section('header.css.files.global')
    {{-- <link href="{{ asset('assets') }}/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets') }}/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets') }}/css/app.min.css" rel="stylesheet" type="text/css" /> --}}

    <!-- ================== BEGIN core-css ================== -->
    <link href="{{ asset('assets') }}/css/vendor.min.css" rel="stylesheet" />
    <link href="{{ asset('assets') }}/css/default/app.min.css" rel="stylesheet" />
    <!-- ================== END core-css ================== -->
    <link href="{{ asset('assets') }}/plugins/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
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

    <script src="{{ asset('assets') }}/plugins/datatables.net/js/dataTables.min.js"></script>
    <script src="{{ asset('assets') }}/plugins/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
@endsection

@section('footer.js.code.global')
    <script data-navigate-once>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            error: function(xhr, status, error) {
                let errorMsg = xhr.responseJSON || xhr.responseText;

                Toaster.error(errorMsg);

                if (xhr.status == 401) {
                    // Toaster.error("Sorry, your session has expired. Please login again to continue");
                    // window.location.reload();
                }
            }
        });
    </script>
@endsection
