<!doctype html>
<head>
    <meta charset="utf-8" />
    <title>Vev</title>
    <link rel="shortcut icon" href="{{asset('asset/admin/media/logos/tab-icon.png')}}" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="description" content="Updates and statistics" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <link href="{{asset('asset/admin/plugins/global/plugins.bundlec3e8.css?v=7.0.6')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('asset/plugins/custom/datatables/datatables.bundlec3e8.css?v=7.0.6')}}" rel="stylesheet">
    <link href="{{asset('asset/admin/plugins/custom/prismjs/prismjs.bundlec3e8.css?v=7.0.6')}}" rel="stylesheet">
    <link href="{{asset('asset/admin/css/style.bundlec3e8.css?v=7.0.6')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('asset/admin/plugins/custom/fullcalendar/fullcalendar.bundlec3e8.css?v=7.0.6')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('asset/admin/css/pages/login/login-4c3e8.css?v=7.0.6')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('asset/admin/plugins/custom/uppy/uppy.bundlec3e8.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('asset/css/style.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/v2.1.1/mapbox-gl.css">
    <script src="https://api.mapbox.com/mapbox-gl-js/v2.1.1/mapbox-gl.js"></script>

    <style>
    .apexcharts-legend.apexcharts-align-center.position-left {
        left: 90px !important;
    }
    </style>
</head>
<!--end::Head-->
<!--begin::Body-->
<link rel="dns-prefetch" href="//fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
<script type="text/javascript">
    var APP_URL = {!! json_encode(url('/')) !!}
</script>
<body id="kt_body" style="background-image: url({{asset('asset/admin/media/bg/Banner2.jpg')}});-moz-box-shadow: 10px 10px 5px #ccc;);"
    class="quick-panel-right demo-panel-right offcanvas-right header-fixed subheader-enabled page-loading">
    @yield('content')
    <script>
    var HOST_URL = "https://preview.keenthemes.com/metronic/theme/html/tools/preview";
    </script>
    <script>
    var KTAppSettings = {
        "breakpoints": {
            "sm": 576,
            "md": 768,
            "lg": 992,
            "xl": 1200,
            "xxl": 1200
        },
        "colors": {
            "theme": {
                "base": {
                    "white": "#ffffff",
                    "primary": "#6993FF",
                    "secondary": "#E5EAEE",
                    "success": "#1BC5BD",
                    "info": "#8950FC",
                    "warning": "#FFA800",
                    "danger": "#F64E60",
                    "light": "#F3F6F9",
                    "dark": "#212121"
                },
                "light": {
                    "white": "#ffffff",
                    "primary": "#E1E9FF",
                    "secondary": "#ECF0F3",
                    "success": "#C9F7F5",
                    "info": "#EEE5FF",
                    "warning": "#FFF4DE",
                    "danger": "#FFE2E5",
                    "light": "#F3F6F9",
                    "dark": "#D6D6E0"
                },
                "inverse": {
                    "white": "#ffffff",
                    "primary": "#ffffff",
                    "secondary": "#212121",
                    "success": "#ffffff",
                    "info": "#ffffff",
                    "warning": "#ffffff",
                    "danger": "#ffffff",
                    "light": "#464E5F",
                    "dark": "#ffffff"
                }
            },
            "gray": {
                "gray-100": "#F3F6F9",
                "gray-200": "#ECF0F3",
                "gray-300": "#E5EAEE",
                "gray-400": "#D6D6E0",
                "gray-500": "#B5B5C3",
                "gray-600": "#80808F",
                "gray-700": "#464E5F",
                "gray-800": "#1B283F",
                "gray-900": "#212121"
            }
        },
        "font-family": "Poppins"
    };
    </script>


    <script src="{{asset('asset/plugins/global/plugins.bundlec3e8.js?v=7.0.6')}}"></script>
    <script src="{{asset('asset/plugins/custom/prismjs/prismjs.bundlec3e8.js?v=7.0.6')}}"></script>
    <script src="{{asset('asset/admin/js/scripts.bundlec3e8.js?v=7.0.6')}}"></script>
    <script src="{{asset('asset/admin/js/pages/crud/forms/widgets/bootstrap-datepickerc3e8.js?v=7.0.6')}}"></script>
    <script src="{{asset('asset/admin/js/widgetsc3e8.js?v=7.0.6')}}"></script>
    <script src="{{asset('asset/admin/js/pages/crud/datatables/basic/paginationsc3e8.js?v=7.0.6')}}"></script>
    <script src="{{asset('asset/admin/js/pages/crud/forms/widgets/form-repeaterc3e8.js?v=7.0.6')}}"></script>
    <script src="{{asset('asset/admin/js/pages/crud/file-upload/image-inputc3e8.js?v=7.0.6')}}"></script>




</body>

