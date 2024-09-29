<!--
Author: Keenthemes
Product Name: MetronicProduct Version: 8.2.5
Purchase: https://1.envato.market/EA4JP
Website: http://www.keenthemes.com
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
License: For each use you must have a valid license purchased only from above link in order to legally use the theme for your project.
-->
<html lang="en">
    <x-templates.user.head/>
	<!--begin::Body-->
    <body id="kt_body" data-bs-spy="scroll" data-bs-target="#kt_landing_menu" class="bg-body position-relative app-blank" style="background-image: url('{{URL::to('/')}}/assets/image/bg/main.png'); background-size: cover; background-position: top; background-repeat: no-repeat; min-height: 100%; height: auto; background-attachment: fixed;">
        @include('sweetalert::alert')
		<!--begin::Theme mode setup on page load-->
		<!--end::Theme mode setup on page load-->
		<!--begin::Root-->
		<div class="d-flex flex-column flex-root" id="kt_app_root">
            <div class="container pt-6 d-flex justify-content-end" data-bs-toggle="modal" data-bs-target="#soundSettingsModal">
                <a class="circlebutton notification me-2">
                    <i class="ki-solid ki-notification fs-1 text-light"></i>
                </a>
                @auth
                    @if (!request()->routeIs('home.index'))
                        <a href="{{route('home.index')}}" class="circlebutton user me-2">
                            <i class="ki-solid ki-home fs-1 text-light"></i>
                        </a>
                    @endif
                    <a class="circlebutton user" data-bs-toggle="modal" data-bs-target="#userModal">
                        <i class="ki-solid ki-user fs-1 text-light"></i>
                    </a>
                @endauth
            </div>
            @yield('content')
		</div>
        <!-- Notification Modal -->
        <div class="modal fade" id="soundSettingsModal" tabindex="-1" aria-labelledby="soundSettingsModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="soundSettingsModalLabel">Sound Settings</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Background Sound Slider -->
                        <label for="backgroundVolume" class="form-label">Background Sound Volume</label>
                        <input type="range" class="form-range" id="backgroundVolume" min="0" max="100" value="50" oninput="setBackgroundVolume(this.value)">

                        <!-- Button Sound Slider -->
                        <label for="buttonVolume" class="form-label mt-3">Button Click Sound Volume</label>
                        <input type="range" class="form-range" id="buttonVolume" min="0" max="100" value="50" oninput="setButtonClickVolume(this.value)">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- User Modal -->
        <div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="userModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="userModalLabel">User Information</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Content for user information goes here.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

		<!--end::Root-->
        <x-templates.user.scripts/>
	</body>
	<!--end::Body-->
</html>

