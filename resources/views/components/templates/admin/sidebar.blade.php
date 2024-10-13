<!--begin::Sidebar-->
<div id="kt_app_sidebar" class="app-sidebar flex-column" data-kt-drawer="true" data-kt-drawer-name="app-sidebar" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="250px" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_app_sidebar_mobile_toggle">
    <div class="app-sidebar-logo flex-shrink-0 d-none d-md-flex flex-center align-items-center" id="kt_app_sidebar_logo">
        <!--begin::Logo-->
        <a href="index.html">
            <img alt="Logo" src="{{URL::to('/')}}/assets/media/logos/landing.svg" class="h-25px d-none d-sm-inline app-sidebar-logo-default theme-light-show" />
            <img alt="Logo" src="{{URL::to('/')}}/assets/media/logos/landing-dark.svg" class="h-25px theme-dark-show" />
        </a>
        <!--end::Logo-->
        <!--begin::Aside toggle-->
        <div class="d-flex align-items-center d-lg-none ms-n3 me-1" title="Show aside menu">
            <div class="btn btn-icon btn-active-color-primary w-30px h-30px" id="kt_aside_mobile_toggle">
                <i class="ki-outline ki-abstract-14 fs-1"></i>
            </div>
        </div>
        <!--end::Aside toggle-->
    </div>
    <!--begin::sidebar menu-->
    <div class="app-sidebar-menu flex-column-fluid">
        <!--begin::Menu wrapper-->
        <div id="kt_app_sidebar_menu_wrapper" class="hover-scroll-overlay-y my-5" data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_app_sidebar_logo, #kt_app_sidebar_footer" data-kt-scroll-wrappers="#kt_app_sidebar_menu" data-kt-scroll-offset="5px">
            <!--begin::Menu-->
            <div class="menu menu-column menu-rounded menu-sub-indention fw-bold px-6" id="#kt_app_sidebar_menu" data-kt-menu="true" data-kt-menu-expand="false">
                <!--begin:Menu item-->
                <div data-kt-menu-trigger="click" class="menu-item @if(request()->routeIs('dashboard.dashboard.*')) here show @endif menu-accordion">
                    <a href="{{route('dashboard.dashboard.index')}}" class="menu-link">
                        <span class="menu-icon">
                            <i class="ki-duotone ki-category fs-2">
                                <i class="path1"></i>
                                <i class="path2"></i>
                                <i class="path3"></i>
                                <i class="path4"></i>
                            </i>
                        </span>
                        <span class="menu-title">Dashboard</span>
                        <span class="menu-arrow"></span>
                    </a>
                </div>
                <!--end:Menu item-->
                <div class="my-3 px-5">
                    <span class="menu-title text-warning">Preparasi</span>
                </div>
                <div data-kt-menu-trigger="click" class="menu-item  @if(request()->routeIs('dashboard.introduction.*')) here show @endif menu-accordion">
                    <a href="{{route('dashboard.introduction.index')}}" class="menu-link">
                        <span class="menu-icon">
                            <i class="ki-duotone ki-book-square fs-2">
                                <i class="path1"></i>
                                <i class="path2"></i>
                                <i class="path3"></i>
                            </i>
                        </span>
                        <span class="menu-title">Pendahuluan</span>
                        <span class="menu-arrow"></span>
                    </a>
                </div>
                <!--begin:Menu item-->
                <div data-kt-menu-trigger="click" class="menu-item  @if(request()->routeIs('dashboard.material.*')) here show @endif menu-accordion">
                    <a href="{{route('dashboard.material.index')}}" class="menu-link">
                        <span class="menu-icon">
                            <i class="ki-duotone ki-setting-3 fs-2">
                                <i class="path1"></i>
                                <i class="path2"></i>
                                <i class="path3"></i>
                                <i class="path4"></i>
                                <i class="path5"></i>
                            </i>
                        </span>
                        <span class="menu-title">Materi</span>
                        <span class="menu-arrow"></span>
                    </a>
                </div>
                <!--end:Menu item-->
                <!--begin:Menu item-->
                <div data-kt-menu-trigger="click" class="menu-item  @if(request()->routeIs('dashboard.video.*')) here show @endif menu-accordion">
                    <a href="{{route('dashboard.video.index')}}" class="menu-link">
                        <span class="menu-icon">
                            <i class="ki-duotone ki-youtube fs-2">
                                <i class="path1"></i>
                                <i class="path2"></i>
                                <i class="path3"></i>
                            </i>
                        </span>
                        <span class="menu-title">Video</span>
                        <span class="menu-arrow"></span>
                    </a>
                </div>
                <!--end:Menu item-->
                <div data-kt-menu-trigger="click" class="menu-item  @if(request()->routeIs('dashboard.evaluation.*')) here show @endif menu-accordion">
                    <a href="{{route('dashboard.evaluation.index')}}" class="menu-link">
                        <span class="menu-icon">
                            <i class="ki-duotone ki-youtube fs-2">
                                <i class="path1"></i>
                                <i class="path2"></i>
                                <i class="path3"></i>
                            </i>
                        </span>
                        <span class="menu-title">Soal Evaluasi</span>
                        <span class="menu-arrow"></span>
                    </a>
                </div>
                <!--end:Menu item-->
                <div class="my-3 px-5">
                    <span class="menu-title text-warning">Menu Guru</span>
                </div>
                <div data-kt-menu-trigger="click" class="menu-item @if(request()->routeIs('dashboard.team.*')) here show @endif menu-accordion">
                    <a href="{{route('dashboard.team.index')}}" class="menu-link">
                        <span class="menu-icon">
                            <i class="ki-duotone ki-people fs-2">
                                <i class="path1"></i>
                                <i class="path2"></i>
                                <i class="path3"></i>
                                <i class="path4"></i>
                                <i class="path5"></i>
                            </i>
                        </span>
                        <span class="menu-title">Bentuk Kelompok</span>
                        <span class="menu-arrow"></span>
                    </a>
                </div>
                <!--begin:Menu item-->
                <div data-kt-menu-trigger="click" class="menu-item  @if(request()->routeIs('dashboard.worksheet.*')) here show @endif menu-accordion">
                    <a href="{{route('dashboard.worksheet.index')}}" class="menu-link">
                        <span class="menu-icon">
                            <i class="ki-duotone ki-book-square fs-2">
                                <i class="path1"></i>
                                <i class="path2"></i>
                                <i class="path3"></i>
                            </i>
                        </span>
                        <span class="menu-title">E-lkpd</span>
                        <span class="menu-arrow"></span>
                    </a>
                </div>
                <!--end:Menu item-->
                <div data-kt-menu-trigger="click" class="menu-item  @if(request()->routeIs('dashboard.assignment.*')) here show @endif menu-accordion">
                    <a href="{{route('dashboard.assignment.index')}}" class="menu-link">
                        <span class="menu-icon">
                            <i class="ki-duotone ki-chart-line-star fs-2">
                                <i class="path1"></i>
                                <i class="path2"></i>
                                <i class="path3"></i>
                            </i>
                        </span>
                        <span class="menu-title">Penugasan Kelompok</span>
                        <span class="menu-arrow"></span>
                    </a>
                </div>

                <!--end:Menu item-->
                {{-- <div data-kt-menu-trigger="click" class="menu-item  @if(request()->routeIs('dashboard.user-answer.*')) here show @endif menu-accordion">
                    <a href="{{route('dashboard.user-answer.index')}}" class="menu-link">
                        <span class="menu-icon">
                            <i class="ki-duotone ki-note fs-2">
                                <i class="path1"></i>
                                <i class="path2"></i>
                                <i class="path3"></i>
                            </i>
                        </span>
                        <span class="menu-title">Jawaban</span>
                        <span class="menu-arrow"></span>
                    </a>
                </div> --}}
                <!--end:Menu item-->
                <div class="my-3 px-5">
                    <span class="menu-title text-warning">Superadmin</span>
                </div>
                <div data-kt-menu-trigger="click" class="menu-item  @if(request()->routeIs('dashboard.user.*')) here show @endif menu-accordion">
                    <a href="{{route('dashboard.user.index')}}" class="menu-link">
                        <span class="menu-icon">
                            <i class="ki-duotone ki-user-tick fs-2">
                                <i class="path1"></i>
                                <i class="path2"></i>
                                <i class="path3"></i>
                                <i class="path4"></i>
                                <i class="path5"></i>
                            </i>
                        </span>
                        <span class="menu-title">User</span>
                        <span class="menu-arrow"></span>
                    </a>
                </div>
            </div>
            <!--end::Menu-->
        </div>
        <!--end::Menu wrapper-->
    </div>
    <!--end::sidebar menu-->
</div>
<!--end::Sidebar-->
