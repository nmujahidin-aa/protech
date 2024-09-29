<!--begin::Navbar-->
<div class="app-navbar flex-lg-grow-1" id="kt_app_header_navbar">
    <div class="app-navbar-item d-flex align-items-stretch flex-lg-grow-1 me-1 me-lg-0">
        <!--begin::Search-->
        <div id="kt_header_search" class="header-search d-flex align-items-center w-lg-275px" data-kt-search-keypress="true" data-kt-search-min-length="2" data-kt-search-enter="enter" data-kt-search-layout="menu" data-kt-search-responsive="true" data-kt-menu-trigger="auto" data-kt-menu-permanent="true" data-kt-menu-placement="bottom-start">
            <!--begin::Tablet and mobile search toggle-->
            <div data-kt-search-element="toggle" class="search-toggle-mobile d-flex d-lg-none align-items-center">
                <div class="d-flex">
                    <i class="ki-outline ki-magnifier fs-1"></i>
                </div>
            </div>
            <!--end::Tablet and mobile search toggle-->
            <!--begin::Form(use d-none d-lg-block classes for responsive search)-->
            <form data-kt-search-element="form" class="d-none d-lg-block w-100 position-relative mb-5 mb-lg-0" autocomplete="off">
                <!--begin::Hidden input(Added to disable form autocomplete)-->
                <input type="hidden" />
                <!--end::Hidden input-->
                <!--begin::Icon-->
                <i class="ki-outline ki-magnifier search-icon fs-2 text-gray-500 position-absolute top-50 translate-middle-y ms-5"></i>
                <!--end::Icon-->
                <!--begin::Input-->
                <input type="text" class="search-input form-control form-control-solid ps-13" name="search" value="" placeholder="Search..." data-kt-search-element="input" />
                <!--end::Input-->
                <!--begin::Spinner-->
                <span class="search-spinner position-absolute top-50 end-0 translate-middle-y lh-0 d-none me-5" data-kt-search-element="spinner">
                    <span class="spinner-border h-15px w-15px align-middle text-gray-500"></span>
                </span>
                <!--end::Spinner-->
                <!--begin::Reset-->
                <span class="search-reset btn btn-flush btn-active-color-primary position-absolute top-50 end-0 translate-middle-y lh-0 d-none me-4" data-kt-search-element="clear">
                    <i class="ki-outline ki-cross fs-2 fs-lg-1 me-0"></i>
                </span>
                <!--end::Reset-->
            </form>
            <!--end::Form-->
        </div>
        <!--end::Search-->
    </div>
    <!--begin::Activities-->
    <div class="app-navbar-item ms-1 ms-md-3">
        <!--begin::Menu- wrapper-->
        <div class="btn btn-icon btn-custom btn-color-gray-500 btn-active-light btn-active-color-primary w-35px h-35px w-md-40px h-md-40px" data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end" id="kt_activities_toggle">
            <i class="ki-outline ki-notification-on fs-2"></i>
        </div>
        <!--end::Menu wrapper-->
    </div>
    <!--end::Activities-->
    <!--begin::My apps links-->
    <div class="app-navbar-item ms-1 ms-md-3">
        <!--begin::Menu- wrapper-->
        <div class="btn btn-icon btn-custom btn-color-gray-500 btn-active-light btn-active-color-primary w-35px h-35px w-md-40px h-md-40px" data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
            <img src="{{URL::to('/')}}/assets/media/avatars/blank.png" class="rounded-circle w-30px"  alt="account">
        </div>
        <!--begin::My apps-->
        <div class="menu menu-sub menu-sub-dropdown menu-column w-100 w-sm-350px" data-kt-menu="true">
            <!--begin::Card-->
            <div class="card">
                <!--begin::Card header-->
                <div class="card-header">
                    <!--begin::Card title-->
                    <div class="card-title">
                        <div class="d-flex justify-content-start">
                            <img src="{{URL::to('/')}}/assets/media/avatars/blank.png" class="rounded-circle w-40px h-40px"  alt="account">
                            <div class="px-2 lh-1 pt-1">
                                <span class="fw-semibold fs-4">{{Auth::user()->name}}</span><br>
                                <span class="fw-light fs-6">{{Auth::user()->email}}</span>
                            </div>
                        </div>
                    </div>
                    <!--end::Card title-->
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body py-5">
                    <!--begin::Scroll-->
                    <div class="me-n5">
                        <a href="" class="d-flex justify-content-start text-gray-800 text-hover-primary bg-hover-light rounded py-2 px-3 mb-1">
                            <i class="ki-outline ki-user-edit fs-3 me-2"></i>
                            <span class="fw-semibold"> Profile</span>
                        </a>
                    </div>
                    <!--end::Scroll-->
                    <div class="me-n5">
                        <a href="" class="d-flex justify-content-start text-gray-800 text-hover-primary bg-hover-light rounded py-2 px-3 mb-1">
                            <i class="ki-outline ki-setting fs-3 me-2"></i>
                            <span class="fw-semibold"> Pengaturan</span>
                        </a>
                    </div>
                    <!--end::Scroll-->
                </div>
                <!--end::Card body-->
                <!--begin::Card footer-->
                <div class="card-footer">
                    <a href="{{route('auth.logout')}}" class="d-flex justify-content-start text-gray-800 text-hover-primary bg-hover-light rounded py-2 px-3 mb-1">
                        <i class="ki-outline ki-exit-right fs-3 me-2"></i>
                        <span class="fw-semibold"> Keluar</span>
                    </a>
                </div>
                <!--end::Card footer-->

            </div>
            <!--end::Card-->
        </div>
        <!--end::My apps-->
        <!--end::Menu wrapper-->
    </div>
    <!--end::My apps links-->
</div>
<!--end::Navbar-->
