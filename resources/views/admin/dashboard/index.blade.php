@extends("admin.dashboard.layouts.main")

@section('content')

    <div class="d-flex flex-column flex-root">
        <!--begin::Page-->
        <div class="d-flex flex-row flex-column-fluid page">
            <!--begin::Wrapper-->
            <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
                <!--begin::Header-->
            @include('admin.dashboard.layouts.topvend')
            <!--end::Header-->
                <!--begin::Content-->
                <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                @include('admin.dashboard.layouts.subheader')
                <!--begin::Entry-->
                    <div class="d-flex flex-column-fluid">
                        <!--begin::Container-->
                        <div class="container">
                            <!--begin::Dashboard-->

                            <!--begin::Row-->
                            <div class="row">

    <div class="col-xl-8 offset-4">
        <div class="row">
            <div class="col-xl-6">
                <!--begin::Tiles Widget 11-->
                <div class="card card-custom bg-success gutter-b" style="height: 150px">
                    <div class="card-body">
                                                <span class="svg-icon svg-icon-3x svg-icon-white ml-n2">
                                                   <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                        viewBox="0 0 46.999 46.999" style="enable-background:new 0 0 46.999 46.999;" xml:space="preserve">
<g>
	<g>
		<path d="M39,14.999c0-0.329-0.161-0.637-0.433-0.823l-14.5-10c-0.342-0.236-0.793-0.236-1.135,0l-14.5,10
			C8.161,14.363,8,14.67,8,14.999v30H6v2h3h6h6h17h3v-2h-2V14.999z M16,44.999v-9h4v9H16z M22,44.999v-10c0-0.553-0.447-1-1-1h-6
			c-0.553,0-1,0.447-1,1v10h-4V15.525l13.5-9.311L37,15.525v29.475H22z"/>
		<path d="M41.06,11.671l-17-11.5c-0.34-0.228-0.781-0.228-1.121,0l-17,11.5c-0.457,0.31-0.577,0.931-0.268,1.389
			c0.309,0.456,0.93,0.578,1.389,0.268L23.5,2.206l16.439,11.121c0.172,0.116,0.367,0.172,0.56,0.172
			c0.321,0,0.636-0.154,0.829-0.439C41.637,12.602,41.517,11.981,41.06,11.671z"/>
		<path d="M33,33.999h-7c-0.553,0-1,0.447-1,1v5c0,0.553,0.447,1,1,1h7c0.553,0,1-0.447,1-1v-5C34,34.447,33.552,33.999,33,33.999z
			 M32,38.999h-5v-3h5V38.999z"/>
		<path d="M33,21.999h-7c-0.553,0-1,0.447-1,1v5c0,0.553,0.447,1,1,1h7c0.553,0,1-0.447,1-1v-5C34,22.447,33.552,21.999,33,21.999z
			 M32,26.999h-5v-3h5V26.999z"/>
		<path d="M21,21.999h-7c-0.553,0-1,0.447-1,1v5c0,0.553,0.447,1,1,1h7c0.553,0,1-0.447,1-1v-5C22,22.447,21.552,21.999,21,21.999z
			 M20,26.999h-5v-3h5V26.999z"/>
	</g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
</svg>

                                                    <!--end::Svg Icon-->
                                                </span>

                        <div class="text-inverse-primary font-weight-bolder font-size-h2 mt-3">
             {{$countstoreSevices}}
                        </div>
                        <a href="#"
                           class="text-inverse-primary font-weight-bold font-size-lg mt-1">Total Services Stores</a>
                    </div>
                </div>
                <!--end::Tiles Widget 11-->
            </div>

            <div class="col-xl-6">
                <!--begin::Tiles Widget 11-->
                <div class="card card-custom bg-warning gutter-b" style="height: 150px">
                    <div class="card-body">
                                                <span class="svg-icon svg-icon-3x svg-icon-white ml-n2">
                                                    <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2020-07-07-181510/theme/html/demo2/dist/../src/media/svg/icons/Shopping/Price2.svg-->
                                                   <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                        viewBox="0 0 46.999 46.999" style="enable-background:new 0 0 46.999 46.999;" xml:space="preserve">
<g>
	<g>
		<path d="M39,14.999c0-0.329-0.161-0.637-0.433-0.823l-14.5-10c-0.342-0.236-0.793-0.236-1.135,0l-14.5,10
			C8.161,14.363,8,14.67,8,14.999v30H6v2h3h6h6h17h3v-2h-2V14.999z M16,44.999v-9h4v9H16z M22,44.999v-10c0-0.553-0.447-1-1-1h-6
			c-0.553,0-1,0.447-1,1v10h-4V15.525l13.5-9.311L37,15.525v29.475H22z"/>
		<path d="M41.06,11.671l-17-11.5c-0.34-0.228-0.781-0.228-1.121,0l-17,11.5c-0.457,0.31-0.577,0.931-0.268,1.389
			c0.309,0.456,0.93,0.578,1.389,0.268L23.5,2.206l16.439,11.121c0.172,0.116,0.367,0.172,0.56,0.172
			c0.321,0,0.636-0.154,0.829-0.439C41.637,12.602,41.517,11.981,41.06,11.671z"/>
		<path d="M33,33.999h-7c-0.553,0-1,0.447-1,1v5c0,0.553,0.447,1,1,1h7c0.553,0,1-0.447,1-1v-5C34,34.447,33.552,33.999,33,33.999z
			 M32,38.999h-5v-3h5V38.999z"/>
		<path d="M33,21.999h-7c-0.553,0-1,0.447-1,1v5c0,0.553,0.447,1,1,1h7c0.553,0,1-0.447,1-1v-5C34,22.447,33.552,21.999,33,21.999z
			 M32,26.999h-5v-3h5V26.999z"/>
		<path d="M21,21.999h-7c-0.553,0-1,0.447-1,1v5c0,0.553,0.447,1,1,1h7c0.553,0,1-0.447,1-1v-5C22,22.447,21.552,21.999,21,21.999z
			 M20,26.999h-5v-3h5V26.999z"/>
	</g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
</svg>

                                                    <!--end::Svg Icon-->
                                                </span>

                        <div class="text-inverse-primary font-weight-bolder font-size-h2 mt-3">
                            {{$countstoreproduct}}
                        </div>
                        <a href="#"
                           class="text-inverse-primary font-weight-bold font-size-lg mt-1">Total Product Store</a>
                    </div>
                </div>
                <!--end::Tiles Widget 11-->
            </div>

            <div class="col-xl-6">
                <!--begin::Tiles Widget 11-->
                <div class="card card-custom bg-dark gutter-b" style="height: 150px">
                    <div class="card-body">
                                                <span class="svg-icon svg-icon-3x svg-icon-white ml-n2">
                                                    <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2020-07-07-181510/theme/html/demo2/dist/../src/media/svg/icons/Shopping/Price2.svg-->
                                                    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                         viewBox="0 0 485 485" style="enable-background:new 0 0 485 485;" xml:space="preserve" fill="white">
<g>
	<g>
		<g>
			<path d="M365.521,370.035c-8.129-3.576-16.577-6.766-25.124-9.485c-8.935-4.707-30.923-17.168-40.396-26.108v-24.299
				c30.386-17.373,51.164-48.543,57.804-86.696C375.018,218.517,390,202.361,390,187.5c0-15.043-11.308-25.026-30-27.094V96.863
				l-0.107-0.628c-0.169-0.986-4.321-24.42-20.764-48.022C323.806,26.218,294.604,0,242.5,0s-81.306,26.218-96.629,48.213
				c-16.442,23.602-20.595,47.036-20.764,48.022L125,96.863v63.543c-18.692,2.068-30,12.051-30,27.094
				c0,14.861,14.982,31.017,32.196,35.946c6.646,38.168,27.428,69.337,57.804,86.697v24.299
				c-9.484,8.951-31.514,21.431-40.429,26.125c-8.754,2.875-17.194,6.094-25.134,9.587C46.613,402.73,45.032,450.37,45,452.382V485
				h395v-32.534C439.991,450.438,438.934,402.43,365.521,370.035z M360,197.5v-22.018c13.367,1.874,15,8.786,15,12.018
				c0,6.126-6.627,14.467-15.266,19.07C359.899,203.606,360,200.588,360,197.5z M110,187.5c0-3.232,1.633-10.144,15-12.018V197.5
				c0,3.088,0.101,6.107,0.266,9.07C116.627,201.967,110,193.626,110,187.5z M115,470H60v-17.366
				c0.041-0.775,0.717-10.543,8.533-23.386C79.794,410.747,98.498,397.63,115,388.969V470z M158.179,56.787
				C177.496,29.059,205.866,15,242.5,15c36.426,0,64.689,13.908,84.006,41.337c8.913,12.657,13.839,25.477,16.347,33.663H312.5
				c-20.43,0-30.222,5.881-38.861,11.07c-7.978,4.792-14.868,8.93-31.139,8.93s-23.161-4.138-31.139-8.93
				C202.722,95.881,192.93,90,172.5,90h-30.371C144.591,81.939,149.416,69.366,158.179,56.787z M141.227,216.157
				c-0.813-5.793-1.227-12.07-1.227-18.657V105h32.5c16.271,0,23.161,4.138,31.139,8.93c8.64,5.189,18.432,11.07,38.861,11.07
				c20.429,0,30.222-5.881,38.861-11.07c7.978-4.792,14.868-8.93,31.139-8.93H345v92.5c0,6.586-0.413,12.863-1.229,18.674
				c-5.158,37.347-25.102,67.55-54.733,82.874C275.075,306.315,259.418,310,242.5,310c-16.918,0-32.575-3.685-46.555-10.962
				C166.331,283.724,146.388,253.521,141.227,216.157z M285,317.299v17.312C279.87,339.974,263.614,355,242.5,355
				c-20.977,0-37.346-15.055-42.5-20.404v-17.298c13.182,5.108,27.424,7.702,42.5,7.702C257.579,325,271.824,322.405,285,317.299z
				 M185.505,470c3.688-28.172,27.832-50,56.995-50c29.163,0,53.306,21.828,56.995,50H185.505z M355,470h-40.387
				c-3.765-36.466-34.668-65-72.113-65s-68.347,28.534-72.113,65H130v-88.035c6.324-2.63,12.961-5.096,19.825-7.335l0.593-0.193
				l0.553-0.289c3.112-1.624,27.288-14.39,41.275-26.109C200.892,356.18,219.027,370,242.5,370s41.608-13.82,50.254-21.96
				c13.987,11.719,38.163,24.485,41.275,26.109l0.586,0.306l0.63,0.198c6.691,2.109,13.311,4.539,19.755,7.215V470z M425,470h-55
				v-81.196c16.637,8.626,35.449,21.721,46.642,40.288c8.042,13.342,8.356,23.407,8.358,23.408V470z"/>
			<path d="M242.5,235h20v-15H250v-32.5h-15v40C235,231.642,238.357,235,242.5,235z"/>
		</g>
	</g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
</svg>

                                                    <!--end::Svg Icon-->
                                                </span>

                        <div class="text-inverse-primary font-weight-bolder font-size-h2 mt-3">
                        {{$countstoreowners}}
                        </div>
                        <a href=""
                           class="text-inverse-primary font-weight-bold font-size-lg mt-1">Total Stores Users</a>
                    </div>
                </div>
                <!--end::Tiles Widget 11-->
            </div>

            <div class="col-xl-6">
                <!--begin::Tiles Widget 11-->
                <div class="card card-custom bg-danger gutter-b" style="height: 150px">
                    <div class="card-body">
                                                <span class="svg-icon svg-icon-3x svg-icon-white ml-n2">
                                                    <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2020-07-07-181510/theme/html/demo2/dist/../src/media/svg/icons/Shopping/Price2.svg--><svg
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                        height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none"
                                                           fill-rule="evenodd">
                                                            <rect x="0" y="0" width="24" height="24"></rect>
                                                            <g transform="translate(12.500000, 12.000000) rotate(-315.000000) translate(-12.500000, -12.000000) translate(6.000000, 1.000000)"
                                                               fill="#000000" opacity="0.3">
                                                                <path
                                                                    d="M0.353553391,7.14644661 L3.35355339,7.14644661 C3.4100716,7.14644661 3.46549471,7.14175791 3.51945496,7.13274826 C3.92739876,8.3050906 5.04222146,9.14644661 6.35355339,9.14644661 C8.01040764,9.14644661 9.35355339,7.80330086 9.35355339,6.14644661 C9.35355339,4.48959236 8.01040764,3.14644661 6.35355339,3.14644661 C5.04222146,3.14644661 3.92739876,3.98780262 3.51945496,5.16014496 C3.46549471,5.15113531 3.4100716,5.14644661 3.35355339,5.14644661 L0.436511831,5.14644661 C0.912589923,2.30873327 3.3805571,0.146446609 6.35355339,0.146446609 C9.66726189,0.146446609 12.3535534,2.83273811 12.3535534,6.14644661 L12.3535534,19.1464466 C12.3535534,20.2510161 11.4581229,21.1464466 10.3535534,21.1464466 L2.35355339,21.1464466 C1.24898389,21.1464466 0.353553391,20.2510161 0.353553391,19.1464466 L0.353553391,7.14644661 Z"
                                                                    transform="translate(6.353553, 10.646447) rotate(-360.000000) translate(-6.353553, -10.646447) ">
                                                                </path>
                                                                <rect x="2.35355339" y="13.1464466" width="8" height="2"
                                                                      rx="1"></rect>
                                                                <rect x="3.35355339" y="17.1464466" width="6" height="2"
                                                                      rx="1"></rect>
                                                            </g>
                                                        </g>
                                                    </svg>
                                                    <!--end::Svg Icon-->
                                                </span>

                        <div class="text-inverse-primary font-weight-bolder font-size-h2 mt-3">
                            </div>
                        <a href=""
                           class="text-inverse-primary font-weight-bold font-size-lg mt-1">Services</a>
                    </div>
                </div>
                <!--end::Tiles Widget 11-->
            </div>




        </div>

    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
