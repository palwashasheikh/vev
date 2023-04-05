<style>
    #map { height: 300px; width: 100%; }
</style>
</head>
<body id="kt_body" style="background-image: url({{asset('asset/media/bg/dashboard-cover.jpg')}})" class="quick-panel-right demo-panel-right offcanvas-right header-fixed subheader-enabled page-loading">
    <div id="app">
    @include('admin.dashboard.layouts.topvend')

    @include('admin.dashboard.layouts.Subheader')
        <main class="py-4">
            @yield('content')
        </main>
        @include("admin.dashboard.footer")
    </div>
        <!-- Scripts -->
    <script src="{{asset('assets/plugins/global/plugins.bundlec3e8.js?v=7.0.6')}}"></script>
    <script src="{{asset('assets/plugins/custom/prismjs/prismjs.bundlec3e8.js?v=7.0.6')}}"></script>
    <script src="{{asset('assets/js/scripts.bundlec3e8.js?v=7.0.6')}}"></script>

    <script>var HOST_URL = "https://preview.keenthemes.com/metronic/theme/html/tools/preview";</script>
		<!--begin::Global Config(global config for global JS scripts)-->
		<script>var KTAppSettings = { "breakpoints": { "sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1200 }, "colors": { "theme": { "base": { "white": "#ffffff", "primary": "#6993FF", "secondary": "#E5EAEE", "success": "#1BC5BD", "info": "#8950FC", "warning": "#FFA800", "danger": "#F64E60", "light": "#F3F6F9", "dark": "#212121" }, "light": { "white": "#ffffff", "primary": "#E1E9FF", "secondary": "#ECF0F3", "success": "#C9F7F5", "info": "#EEE5FF", "warning": "#FFF4DE", "danger": "#FFE2E5", "light": "#F3F6F9", "dark": "#D6D6E0" }, "inverse": { "white": "#ffffff", "primary": "#ffffff", "secondary": "#212121", "success": "#ffffff", "info": "#ffffff", "warning": "#ffffff", "danger": "#ffffff", "light": "#464E5F", "dark": "#ffffff" } }, "gray": { "gray-100": "#F3F6F9", "gray-200": "#ECF0F3", "gray-300": "#E5EAEE", "gray-400": "#D6D6E0", "gray-500": "#B5B5C3", "gray-600": "#80808F", "gray-700": "#464E5F", "gray-800": "#1B283F", "gray-900": "#212121" } }, "font-family": "Poppins" };</script>

        <script src="{{asset('assets\js\pages\crud\file-upload\image-inputc3e8.js')}}"></script>



    @stack('custom-scripts')

</body>
</html>
