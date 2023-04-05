@include("admin.dashboard.layouts.main")
{{--@section('contents')--}}
    <div id="servicesList">
        @include('admin.dashboard.layouts.topvend')

        @include('admin.dashboard.layouts.Subheader')

        <main class="py-4">
               @include("admin.services.list")
{{--            <!-- @include("admin.services.add") -->--}}
        </main>

    </div>

@include("admin.dashboard.footer")




