<!--begin::Head-->
<head>
    <title>@yield('title', 'PROTECH')</title>
    <meta charset="utf-8" />
    <meta name="description" content="The most advanced Bootstrap 5 Admin Theme with 40 unique prebuilt layouts on Themeforest trusted by 100,000 beginners and professionals. Multi-demo, Dark Mode, RTL support and complete React, Angular, Vue, Asp.Net Core, Rails, Spring, Blazor, Django, Express.js, Node.js, Flask, Symfony & Laravel versions. Grab your copy now and get life-time updates for free." />
    <meta name="keywords" content="metronic, bootstrap, bootstrap 5, angular, VueJs, React, Asp.Net Core, Rails, Spring, Blazor, Django, Express.js, Node.js, Flask, Symfony & Laravel starter kits, admin themes, web design, figma, web development, free templates, free admin themes, bootstrap theme, bootstrap template, bootstrap dashboard, bootstrap dak mode, bootstrap button, bootstrap datepicker, bootstrap timepicker, fullcalendar, datatables, flaticon" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="Metronic - The World's #1 Selling Bootstrap Admin Template by KeenThemes" />
    <meta property="og:url" content="https://keenthemes.com/metronic" />
    <meta property="og:site_name" content="Metronic by Keenthemes" />
    <link rel="canonical" href="http://landing.html" />
    <link rel="shortcut icon" href="{{URL::to('/')}}/assets/image/logo/logo.png" />
    <!--begin::Fonts(mandatory for all pages)-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
    <link rel="shortcut icon" href="{{URL::to('/')}}/assets/image/logo/logo.png" type="image/x-icon">
    <!--end::Fonts-->
    <!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
    <link href="{{URL::to('/')}}/assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
    <link href="{{URL::to('/')}}/assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
    <link href="{{URL::to('/')}}/vendor/sweetalert/custom.css" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="{{URL::to('/')}}/assets/plugins/global/fonts/recoleta.otf">
    <link rel="stylesheet" href="{{URL::to('/')}}/assets/plugins/global/fonts/Recoleta-Bold.ttf">
    <style>
        .button {
            width: 150px;
            height: 40px;
            border-radius: 100px;
            background-color: #9945d6; /* Warna tombol, bisa disesuaikan */
            color: #ffffff; /* Warna ikon */
            border: none;
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
            box-shadow: #00000029 0px 8px 6px 0px;
        }
        .button:hover {
            background-color: #7c1cc2;
        }

        .button i {
            font-size: 32px; /* Ukuran ikon, bisa disesuaikan */
        }

        .circlebutton {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background-color: #9945d6; /* Warna tombol, bisa disesuaikan */
            color: #ffffff; /* Warna ikon */
            border: none;
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
        }
        .circlebutton:hover {
            background-color: #7c1cc2;
        }

        .circlebutton i {
            font-size: 32px; /* Ukuran ikon, bisa disesuaikan */
        }

        .background-test {
            background-color: #9945d6; /* Warna background, bisa disesuaikan */
        }

        .background {
            background-color: #9945d6; /* Warna background, bisa disesuaikan */
            opacity: 0.8; /* Opacity background, bisa disesuaikan */
            transition: transform 0.3s ease-in-out, opacity 0.3s ease-in-out;
        }
        .background:hover {
            opacity: 1; /* Opacity background, bisa disesuaikan */
            transform: translateY(-12px); /* Bergerak ke atas sebesar 12px */
        }

        .background:active {
            transform: translateY(-5px); /* Sedikit bergerak ke atas saat diklik */
        }

        .bg-purple{
            background-color: #9945d6; /* Warna background, bisa disesuaikan */
            opacity: 0.6; /* Opacity background, bisa disesuaikan */
            transition: transform 0.3s ease-in-out, opacity 0.3s ease-in-out;
            border: 5px solid #cccccc;
        }
        .bg-purple:hover{
            opacity: 1; /* Opacity background, bisa disesuaikan */
        }

        @font-face {
            font-family: 'Recoleta-Bold';
            src: url('{{URL::to('/')}}/assets/plugins/global/fonts/Recoleta-Bold.ttf') format('truetype');
            font-weight: bold;
            font-style: normal;
        }

        .custom-font {
            font-family: 'Recoleta-Bold', sans-serif;
            font-size: 25px; /* Sesuaikan ukuran font sesuai kebutuhan */
            color: #9945d6; /* Warna teks */
        }
        .recoleta {
            font-family: 'Recoleta-Bold', sans-serif;
            letter-spacing: 1px;
        }
    </style>

    @yield('style')
    <!--end::Global Stylesheets Bundle-->
    <script>// Frame-busting to prevent site from being loaded within a frame without permission (click-jacking) if (window.top != window.self) { window.top.location.replace(window.self.location.href); }</script>
</head>
<!--end::Head-->
