<!--begin::Javascript-->
<script>var hostUrl = "assets/";</script>
<!--begin::Global Javascript Bundle(mandatory for all pages)-->
<script src="{{URL::to('/')}}/assets/plugins/global/plugins.bundle.js"></script>
<script src="{{URL::to('/')}}/assets/js/scripts.bundle.js"></script>
<!--end::Global Javascript Bundle-->
<!--begin::Vendors Javascript(used for this page only)-->
<script src="{{URL::to('/')}}/assets/plugins/custom/fullcalendar/fullcalendar.bundle.js"></script>
<script src="https://cdn.amcharts.com/lib/5/index.js"></script>
<script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
<script src="https://cdn.amcharts.com/lib/5/percent.js"></script>
<script src="https://cdn.amcharts.com/lib/5/radar.js"></script>
<script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
<script src="https://cdn.amcharts.com/lib/5/map.js"></script>
<script src="https://cdn.amcharts.com/lib/5/geodata/worldLow.js"></script>
<script src="https://cdn.amcharts.com/lib/5/geodata/continentsLow.js"></script>
<script src="https://cdn.amcharts.com/lib/5/geodata/usaLow.js"></script>
<script src="https://cdn.amcharts.com/lib/5/geodata/worldTimeZonesLow.js"></script>
<script src="https://cdn.amcharts.com/lib/5/geodata/worldTimeZoneAreasLow.js"></script>
<script src="{{URL::to('/')}}/assets/plugins/custom/datatables/datatables.bundle.js"></script>
<!--end::Vendors Javascript-->
<!--begin::Custom Javascript(used for this page only)-->
<script src="{{URL::to('/')}}/assets/js/widgets.bundle.js"></script>
<script src="{{URL::to('/')}}/assets/js/custom/widgets.js"></script>
<script src="{{URL::to('/')}}/assets/js/custom/apps/chat/chat.js"></script>
<script src="{{URL::to('/')}}/assets/js/custom/utilities/modals/upgrade-plan.js"></script>
<script src="{{URL::to('/')}}/assets/js/custom/utilities/modals/users-search.js"></script>
<!--begin::Sweet Alert Javascript Custom-->
<script src="{{URL::to('/')}}/vendor/sweetalert/custom.js"></script>
<!--end::Sweet Alert Javascript Custom-->
<!--end::Custom Javascript-->
<script src="{{URL::to('/')}}/assets/js/datatable.js"></script>
<!--end::Javascript-->

<!--CKEditor Build Bundles:: Only include the relevant bundles accordingly-->
{{-- <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script> --}}
<script src="{{URL::to('/')}}/assets/plugins/custom/ckeditor/ckeditor-classic.bundle.js"></script>
@yield('scripts')
