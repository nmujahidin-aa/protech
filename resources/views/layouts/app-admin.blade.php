<!DOCTYPE html>
<html lang="en">
	<x-templates.admin.head/>
	<!--begin::Body-->
	<body id="kt_app_body" data-kt-app-header-fixed="true" data-kt-app-header-fixed-mobile="true" data-kt-app-sidebar-enabled="true" data-kt-app-sidebar-fixed="true" data-kt-app-sidebar-hoverable="true" data-kt-app-sidebar-push-header="true" data-kt-app-sidebar-push-toolbar="true" data-kt-app-sidebar-push-footer="true" class="app-default" style="background-color: #f9f9f9;">
		@include('sweetalert::alert')
        <!--begin::Theme mode setup on page load-->
		<script>var defaultThemeMode = "light"; var themeMode; if ( document.documentElement ) { if ( document.documentElement.hasAttribute("data-bs-theme-mode")) { themeMode = document.documentElement.getAttribute("data-bs-theme-mode"); } else { if ( localStorage.getItem("data-bs-theme") !== null ) { themeMode = localStorage.getItem("data-bs-theme"); } else { themeMode = defaultThemeMode; } } if (themeMode === "system") { themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light"; } document.documentElement.setAttribute("data-bs-theme", themeMode); }</script>
		<!--end::Theme mode setup on page load-->
		<!--begin::App-->
		<div class="d-flex flex-column flex-root app-root" id="kt_app_root">
			<!--begin::Page-->
			<div class="app-page flex-column flex-column-fluid" id="kt_app_page">
				<!--begin::Header-->
				<div id="kt_app_header" class="app-header" data-kt-sticky="true" data-kt-sticky-activate="{default: true, lg: true}" data-kt-sticky-name="app-header-minimize" data-kt-sticky-animation="false" data-kt-sticky-offset="{default: '0px', lg: '0px'}">
					<!--begin::Header container-->
					<div class="app-container container-fluid d-flex align-items-stretch flex-stack" id="kt_app_header_container">
						<!--begin::Sidebar toggle-->
						<div class="d-flex align-items-center d-block d-lg-none ms-n3" title="Show sidebar menu">
							<div class="btn btn-icon btn-active-color-primary w-35px h-35px me-1" id="kt_app_sidebar_mobile_toggle">
								<i class="ki-outline ki-abstract-14 fs-2"></i>
							</div>
							<!--begin::Logo image-->
							<a href="index.html">
								<img alt="Logo" src="{{URL::to('/')}}/assets/media/logos/demo55-small.svg" class="h-25px theme-light-show" />
								<img alt="Logo" src="{{URL::to('/')}}/assets/media/logos/demo55-small-dark.svg" class="h-25px theme-dark-show" />
							</a>
							<!--end::Logo image-->
						</div>
						<!--end::Sidebar toggle-->
						<x-templates.admin.navbar/>
					</div>
					<!--end::Header container-->
				</div>
				<!--end::Header-->
				<!--begin::Wrapper-->
				<div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
                    <x-templates.admin.sidebar/>
					<!--begin::Main-->
                    @yield('content')
					<!--end:::Main-->
				</div>
				<!--end::Wrapper-->
			</div>
			<!--end::Page-->
		</div>
		<!--end::App-->
		<!--begin::Scrolltop-->
		<div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
			<i class="ki-outline ki-arrow-up"></i>
		</div>
		<!--end::Scrolltop--
		<!--end::Modals-->
		<x-templates.admin.scripts/>
	</body>
	<!--end::Body-->
</html>
