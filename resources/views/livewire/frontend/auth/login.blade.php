<div>
    {{-- Stop trying to control. --}}

    <!-- BEGIN login -->
    <div class="login login-v2 fw-bold">
        <!-- BEGIN login-cover -->
        <div class="login-cover">
            <div class="login-cover-img" data-id="login-cover-image"
                style="background-image: url({{ asset('assets') }}/img/login-bg/login-bg-17.jpg)"></div>
            <div class="login-cover-bg"></div>
        </div>
        <!-- END login-cover -->

        <!-- BEGIN login-container -->
        <div class="login-container">
            <!-- BEGIN login-header -->
            <div class="login-header">
                <div class="brand pe-2">
                    <div class="d-flex align-items-center">
                        <span class="logo"></span> <b>Inventory</b> Management
                    </div>
                    {{-- <small>Bootstrap 5 Responsive Admin Template</small> --}}
                </div>
                <div class="icon">
                    <i class="fa fa-lock"></i>
                </div>
            </div>
            <!-- END login-header -->

            <!-- BEGIN login-content -->
            <div class="login-content">
                <form action="index.html" method="GET">
                    <div class="form-floating mb-20px">
                        <input type="text" class="form-control fs-13px h-45px border-0" id="emailAddress" wire:model='input_email'
                            placeholder="Email Address" />
                        <label class="d-flex align-items-center fs-13px text-gray-600" for="emailAddress">Email
                            Address</label>
                    </div>
                    <div class="form-floating mb-20px">
                        <input type="password" class="form-control fs-13px h-45px border-0" placeholder="Password" wire:model='password'/>
                        <label class="d-flex align-items-center fs-13px text-gray-600"
                            for="Password">Password</label>
                    </div>
                    <div class="form-check mb-20px">
                        <input type="checkbox" class="form-check-input border-0" id="rememberMe" value="1" />
                        <label class="form-check-label fs-13px text-gray-500" for="rememberMe">
                            Remember Me
                        </label>
                    </div>
                    <div class="mb-20px">
                        <button type="submit" class="btn btn-theme d-block w-100 h-45px btn-lg">Sign me in</button>
                    </div>
                    {{-- <div class="text-gray-500"> Not a member yet? Click <a class="text-white" href="register_v3.html">here</a> to register. </div> --}}
                </form>
            </div>
            <!-- END login-content -->
        </div>
        <!-- END login-container -->
    </div>
    <!-- END login -->

    <!-- BEGIN login-bg -->
    <div class="login-bg-list clearfix">
        <div class="login-bg-list-item active"><a class="login-bg-list-link" data-toggle="login-change-bg"
                data-img="{{ asset('assets') }}/img/login-bg/login-bg-17.jpg" href="javascript:;"
                style="background-image: url({{ asset('assets') }}/img/login-bg/login-bg-17.jpg)"></a></div>
        <div class="login-bg-list-item"><a class="login-bg-list-link" data-toggle="login-change-bg"
                data-img="{{ asset('assets') }}/img/login-bg/login-bg-16.jpg" href="javascript:;"
                style="background-image: url({{ asset('assets') }}/img/login-bg/login-bg-16.jpg)"></a></div>
        <div class="login-bg-list-item"><a class="login-bg-list-link" data-toggle="login-change-bg"
                data-img="{{ asset('assets') }}/img/login-bg/login-bg-15.jpg" href="javascript:;"
                style="background-image: url({{ asset('assets') }}/img/login-bg/login-bg-15.jpg)"></a></div>
        <div class="login-bg-list-item"><a class="login-bg-list-link" data-toggle="login-change-bg"
                data-img="{{ asset('assets') }}/img/login-bg/login-bg-14.jpg" href="javascript:;"
                style="background-image: url({{ asset('assets') }}/img/login-bg/login-bg-14.jpg)"></a></div>
        <div class="login-bg-list-item"><a class="login-bg-list-link" data-toggle="login-change-bg"
                data-img="{{ asset('assets') }}/img/login-bg/login-bg-13.jpg" href="javascript:;"
                style="background-image: url({{ asset('assets') }}/img/login-bg/login-bg-13.jpg)"></a></div>
        <div class="login-bg-list-item"><a class="login-bg-list-link" data-toggle="login-change-bg"
                data-img="{{ asset('assets') }}/img/login-bg/login-bg-12.jpg" href="javascript:;"
                style="background-image: url({{ asset('assets') }}/img/login-bg/login-bg-12.jpg)"></a></div>
    </div>
    <!-- END login-bg -->

</div>
