@extends('layouts.app')
@section('title', 'PROTECH')
@section('content')
<div class="d-flex justify-content-center align-items-center" style="flex: 1; margin-top: -50px;">
    <div style="width: 75%">
        <div class="card" style="background-color: rgba(0, 0, 0, 0.2); border: 5px solid #cccccc;">
            <div class="card-body">
                <!--begin::Form-->
                <form class="form w-100" method="POST" novalidate="novalidate" id="kt_sign_in_form" data-kt-redirect-url="{{route('auth.login.post')}}" action="{{route('auth.login.post')}}">
                    @csrf
                    <!--begin::Heading-->
                    <!--begin::Login options-->
                    <div class="d-flex justify-content-center g-3 mb-9">
                        <!--begin::Col-->
                        <img src="{{URL::to('/')}}/assets/image/logo/logo-text.png" alt="logo" style="max-width: 25vh;">
                        <!--end::Col-->
                    </div>
                    <!--end::Login options-->
                    <div class="text-center mb-11">
                        <!--begin::Title-->
                        <h1 class="text-light fw-bolder mb-3">Masuk</h1>
                        <!--end::Title-->
                        <!--begin::Subtitle-->
                        <div class="text-light fw-semibold fs-6">Masuk menggunakan akun <b>PROTECH</b> Learn kamu ya</div>
                        <!--end::Subtitle=-->
                    </div>
                    <!--begin::Heading-->
                    <!--begin::Input group=-->
                    <div class="fv-row mb-8">
                        <!--begin::Email-->
                        <input type="text" placeholder="Email" name="email" autocomplete="off" class="form-control bg-transparent text-light" />
                        <!--end::Email-->
                    </div>
                    <!--end::Input group=-->
                    <div class="fv-row mb-3">
                        <!--begin::Password-->
                        <input type="password" placeholder="Password" name="password" autocomplete="off" class="form-control bg-transparent text-light" />
                        <!--end::Password-->
                    </div>
                    <!--end::Input group=-->
                    <!--begin::Wrapper-->
                    <div class="d-flex flex-end flex-wrap gap-3 fs-base fw-semibold mb-8">
                        <!--begin::Link-->
                        <a href="#" class="link-primary">Lupa Password ?</a>
                        <span class="text-light">Hubungi Bu Puri</span>
                        <!--end::Link-->
                    </div>
                    <!--end::Wrapper-->
                    <!--begin::Submit button-->
                    <div class="d-grid mb-10">
                        <button type="submit" id="kt_sign_in_submit" class="btn btn-light">
                            <!--begin::Indicator label-->
                            <span class="indicator-label">Masuk</span>
                            <!--end::Indicator label-->
                            <!--begin::Indicator progress-->
                            <span class="indicator-progress">Please wait...
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            <!--end::Indicator progress-->
                        </button>
                    </div>
                    <!--end::Submit button-->
                    <!--begin::Sign up-->
                    <div class="text-gray-500 text-center fw-semibold fs-6">Belum memiliki akun?
                    <a href="#" class="link-light">Minta Bu Puri.</a></div>
                    <!--end::Sign up-->
                </form>
                <!--end::Form-->
            </div>
        </div>
    </div>
</div>
@endsection
