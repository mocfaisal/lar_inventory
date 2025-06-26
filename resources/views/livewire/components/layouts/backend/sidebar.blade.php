<!-- BEGIN #sidebar -->
<div class="app-sidebar" id="sidebar" data-bs-theme="dark">
    <!-- BEGIN scrollbar -->
    <div class="app-sidebar-content" data-scrollbar="true" data-height="100%">
        <!-- BEGIN menu -->
        <div class="menu">
            <div class="menu-profile">
                <a class="menu-profile-link" data-toggle="app-sidebar-profile" data-target="#appSidebarProfileMenu"
                    href="javascript:;">
                    <div class="menu-profile-cover with-shadow"></div>
                    <div class="menu-profile-image">
                        <img src="{{ asset('assets') }}/img/user/user-13.jpg" alt="" />
                    </div>
                    <div class="menu-profile-info">
                        <div class="d-flex align-items-center">
                            <div class="flex-grow-1">
                                {{ Session::get('user_fullname') }}
                            </div>
                            <div class="menu-caret ms-auto"></div>
                        </div>
                        <small>{{ Session::get('email') }}</small>
                    </div>
                </a>
            </div>
            <div class="collapse" id="appSidebarProfileMenu">
                <div class="menu-item pt-5px">
                    <a class="menu-link" href="javascript:;">
                        <div class="menu-icon"><i class="fa fa-cog"></i></div>
                        <div class="menu-text">Settings</div>
                    </a>
                </div>
                <div class="menu-item">
                    <a class="menu-link" href="javascript:;">
                        <div class="menu-icon"><i class="fa fa-pencil-alt"></i></div>
                        <div class="menu-text"> Send Feedback</div>
                    </a>
                </div>
                <div class="menu-item pb-5px">
                    <a class="menu-link" href="javascript:;">
                        <div class="menu-icon"><i class="fa fa-question-circle"></i></div>
                        <div class="menu-text"> Helps</div>
                    </a>
                </div>
                <div class="menu-divider m-0"></div>
            </div>
            <div class="menu-header">Navigation</div>

            <x-sidebar-menu />

            <!-- BEGIN minify-button -->
            <div class="menu-item d-flex">
                <a class="app-sidebar-minify-btn d-flex align-items-center text-decoration-none ms-auto"
                    data-toggle="app-sidebar-minify" href="javascript:;"><i class="fa fa-angle-double-left"></i></a>
            </div>
            <!-- END minify-button -->
        </div>
        <!-- END menu -->
    </div>
    <!-- END scrollbar -->
</div>
<div class="app-sidebar-bg" data-bs-theme="dark"></div>
<div class="app-sidebar-mobile-backdrop"><a class="stretched-link" data-dismiss="app-sidebar-mobile" href="#"></a>
</div>
<!-- END #sidebar -->
