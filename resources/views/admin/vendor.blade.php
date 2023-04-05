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
                            <div class="col-xl-4">
                                <div class="row">
                                    <div class="col-xl-12 col-lg-6 col-md-6 col-sm-6">
                                        <!--begin::Card-->
                                        <div class="card card-custom gutter-b card-stretch">
                                            <!--begin::Body-->
                                            <div class="card-body pt-4">
                                                <!--begin::Toolbar-->

                                                <!--end::Toolbar-->
                                                <!--begin::User-->
                                                <div class="d-flex align-items-end mb-7">
                                                    <!--begin::Pic-->
                                                    <div class="d-flex align-items-center">
                                                        <!--begin::Pic-->
                                                        <div class="flex-shrink-0 mr-4 mt-lg-0 mt-3">
                                                            <div class="symbol symbol-circle symbol-lg-75">
                                                                <img src="{{asset(auth::user()->UserImage)}}"
                                                                    alt="image">
                                                            </div>
                                                            <div
                                                                class="symbol symbol-lg-75 symbol-circle symbol-primary d-none">
                                                                <span class="font-size-h3 font-weight-boldest">JM</span>
                                                            </div>
                                                        </div>
                                                        <!--end::Pic-->
                                                        <!--begin::Title-->
                                                        <div class="d-flex flex-column">
                                                            <a href="#"
                                                                class="text-dark font-weight-bold text-hover-primary font-size-h4 mb-0">{{auth::user()->user_name}}</a>

                                                        </div>
                                                        <!--end::Title-->
                                                    </div>
                                                    <!--end::Title-->
                                                </div>
                                                <!--end::User-->
                                                <!--begin::Desc-->
                                                <p class="mb-7">

                                                </p>
                                                <!--end::Desc-->
                                                <!--begin::Info-->
                                                <div class="mb-7 mt-10">
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <span class="text-dark-75 font-weight-bolder mr-2">Email:</span>
                                                        <a href="#"
                                                            class="text-muted text-hover-primary">{{auth::user()->user_email}}</a>
                                                    </div>
                                                    <div class="d-flex justify-content-between align-items-cente my-1">
                                                        <span class="text-dark-75 font-weight-bolder mr-2">Phone:</span>
                                                        <a href="#" class="text-muted text-hover-primary">{{auth::user()->user_phonenumber}}</a>
                                                    </div>

                                                </div>
                                                <!--end::Info-->
                                                <div class="mb-7 mt-10">
                                                    <a href="{{url('editProfile')}}"
                                                        class="btn btn-block btn-sm btn-light-success font-weight-bolder text-uppercase py-4">Edit
                                                        Profile</a>
                                                    <a href="{{url('changePassword')}}"
                                                        class="btn btn-block btn-sm btn-light-warning font-weight-bolder text-uppercase py-4">Change
                                                        Password</a>
                                                </div>
                                            </div>
                                            <!--end::Body-->
                                        </div>
                                        <!--end::Card-->
                                    </div>



                                </div>
                            </div>
                            <div class="col-xl-8">
                                <div class="row">
                                    <div class="col-xl-6">
                                        <!--begin::Tiles Widget 11-->
                                        <div class="card card-custom bg-success gutter-b" style="height: 150px">
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
                                                <a href="{{route('productList')}}"
                                                    class="text-inverse-primary font-weight-bold font-size-lg mt-1">Products</a>
                                            </div>
                                        </div>
                                        <!--end::Tiles Widget 11-->
                                    </div>

                                    <div class="col-xl-6">
                                        <!--begin::Tiles Widget 11-->
                                        <div class="card card-custom bg-warning gutter-b" style="height: 150px">
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

                                                <div class="text-inverse-primary font-weight-bolder font-size-h2 mt-3">-
                                                </div>
                                                <a href=""
                                                    class="text-inverse-primary font-weight-bold font-size-lg mt-1">Product
                                                    Details</a>
                                            </div>
                                        </div>
                                        <!--end::Tiles Widget 11-->
                                    </div>

                                    <div class="col-xl-6">
                                        <!--begin::Tiles Widget 11-->
                                        <div class="card card-custom bg-dark gutter-b" style="height: 150px">
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

                                                <div class="text-inverse-primary font-weight-bolder font-size-h2 mt-3">-
                                                </div>
                                                <a href=""
                                                    class="text-inverse-primary font-weight-bold font-size-lg mt-1">Prod.
                                                    Attribute</a>
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
                                                <a href="{{route('servicesList')}}"
                                                    class="text-inverse-primary font-weight-bold font-size-lg mt-1">Services</a>
                                            </div>
                                        </div>
                                        <!--end::Tiles Widget 11-->
                                    </div>




                                </div>

                            </div>
                            <div class="col-xl-4">
                                <!--begin::Tiles Widget 1-->
                                <div class="card card-custom gutter-b card-stretch">
                                    <!--begin::Header-->
                                    <div class="card-header border-0 pt-5">
                                        <div class="card-title">
                                            <div class="card-label">
                                                <div class="font-weight-bolder">Weekly Sales Stats</div>
                                                <div class="font-size-sm text-muted mt-2">890,344 Sales</div>
                                            </div>
                                        </div>

                                    </div>
                                    <!--end::Header-->
                                    <!--begin::Body-->
                                    <div class="card-body d-flex flex-column px-0">
                                        <!--begin::Chart-->
                                        <div id="kt_tiles_widget_1_chart" data-color="danger" style="height: 125px">
                                        </div>
                                        <!--end::Chart-->
                                        <!--begin::Items-->
                                        <div class="flex-grow-1 card-spacer-x">
                                            <!--begin::Item-->
                                            <div class="d-flex align-items-center justify-content-between mb-10">
                                                <div class="d-flex align-items-center mr-2">
                                                    <div class="symbol symbol-50 symbol-light mr-3 flex-shrink-0">
                                                        <div class="symbol-label">
                                                            <img src="https://preview.keenthemes.com/metronic/theme/html/demo2/dist/assets/media/svg/misc/006-plurk.svg"
                                                                alt="" class="h-50" />
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <a href="#"
                                                            class="font-size-h6 text-dark-75 text-hover-primary font-weight-bolder">Top
                                                            Authors</a>
                                                        <div class="font-size-sm text-muted font-weight-bold mt-1">Ricky
                                                            Hunt, Sandra Trepp</div>
                                                    </div>
                                                </div>
                                                <div
                                                    class="label label-light label-inline font-weight-bold text-dark-50 py-4 px-3 font-size-base">
                                                    +105$</div>
                                            </div>
                                            <!--end::Item-->
                                            <!--begin::Item-->
                                            <div class="d-flex align-items-center justify-content-between mb-10">
                                                <div class="d-flex align-items-center mr-2">
                                                    <div class="symbol symbol-50 symbol-light mr-3 flex-shrink-0">
                                                        <div class="symbol-label">
                                                            <img src="https://preview.keenthemes.com/metronic/theme/html/demo2/dist/assets/media/svg/misc/015-telegram.svg"
                                                                alt="" class="h-50" />
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <a href="#"
                                                            class="font-size-h6 text-dark-75 text-hover-primary font-weight-bolder">Bestsellers</a>
                                                        <div class="font-size-sm text-muted font-weight-bold mt-1">
                                                            Pitstop Email Marketing</div>
                                                    </div>
                                                </div>
                                                <div
                                                    class="label label-light label-inline font-weight-bold text-dark-50 py-4 px-3 font-size-base">
                                                    +60$</div>
                                            </div>
                                            <!--end::Item-->
                                            <!--begin::Item-->
                                            <div class="d-flex align-items-center justify-content-between">
                                                <div class="d-flex align-items-center mr-2">
                                                    <div class="symbol symbol-50 symbol-light mr-3 flex-shrink-0">
                                                        <div class="symbol-label">
                                                            <img src="https://preview.keenthemes.com/metronic/theme/html/demo2/dist/assets/media/svg/misc/003-puzzle.svg"
                                                                alt="" class="h-50" />
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <a href="#"
                                                            class="font-size-h6 text-dark-75 text-hover-primary font-weight-bolder">Top
                                                            Engagement</a>
                                                        <div class="font-size-sm text-muted font-weight-bold mt-1">
                                                            KT.com solution provider</div>
                                                    </div>
                                                </div>
                                                <div
                                                    class="label label-light label-inline font-weight-bold text-dark-50 py-4 px-3 font-size-base">
                                                    +75$</div>
                                            </div>
                                            <!--end::Item-->
                                        </div>
                                        <!--end::Items-->
                                    </div>
                                    <!--end::Body-->
                                </div>
                                <!--end::Tiles Widget 1-->
                            </div>
                            <div class="col-xl-8">


                                <!--begin::Base Table Widget 5-->
                                <div class="card card-custom card-stretch gutter-b">
                                    <!--begin::Header-->
                                    <div class="card-header border-0 pt-5">
                                        <h3 class="card-title align-items-start flex-column">
                                            <span class="card-label font-weight-bolder text-dark">Orders</span>
                                            <span class="text-muted mt-3 font-weight-bold font-size-lg">84 + New
                                                Orders</span>
                                        </h3>

                                    </div>
                                    <!--end::Header-->
                                    <!--begin::Body-->
                                    <div class="card-body pt-2 pb-0">
                                        <!--begin::Table-->
                                        <div class="table-responsive">
                                            <table class="table table-borderless table-vertical-center">
                                                <thead>
                                                    <tr>
                                                        <th class="p-0" style="width: 200px"></th>
                                                        <th class="p-0" style="min-width: 100px"></th>
                                                        <th class="p-0" style="min-width: 100px"></th>
                                                        <th class="p-0" style="min-width: 100px"></th>
                                                        <th class="p-0" style="min-width: 50px"></th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <tr>

                                                        <td class="pl-0">
                                                            <a href="#"
                                                                class="text-dark font-weight-bolder text-hover-primary mb-1 font-size-lg">text
                                                                text</a>
                                                            <span
                                                                class="text-muted font-weight-bold d-block">customerq@app.com</span>
                                                        </td>
                                                        <td class="pl-0">
                                                            <a href="#"
                                                                class="text-dark font-weight-bolder text-hover-primary mb-1 font-size-lg">a0b078b8-53c5-eb11-9e8a-1c98ec18b82f</a>
                                                            <span
                                                                class="text-muted font-weight-bold d-block">400.00</span>
                                                        </td>
                                                        <td class="text-right">
                                                            <span class="text-muted font-weight-500">Friday, 04 June
                                                                2021</span>
                                                        </td>

                                                        <td class="text-right">
                                                            <span
                                                                class="label label-lg label-light-danger label-inline">
                                                                Pending</span>
                                                        </td>

                                                        <td class="text-right pr-0">
                                                            <a href="/Order/OrderDetails?id=a0b078b8-53c5-eb11-9e8a-1c98ec18b82f"
                                                                class="btn btn-icon btn-light btn-sm">
                                                                <span class="svg-icon svg-icon-md svg-icon-info">
                                                                    <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2020-07-07-181510/theme/html/demo2/dist/../src/media/svg/icons/Communication/Clipboard-list.svg--><svg
                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                        width="24px" height="24px" viewBox="0 0 24 24"
                                                                        version="1.1">
                                                                        <g stroke="none" stroke-width="1" fill="none"
                                                                            fill-rule="evenodd">
                                                                            <rect x="0" y="0" width="24" height="24">
                                                                            </rect>
                                                                            <path
                                                                                d="M8,3 L8,3.5 C8,4.32842712 8.67157288,5 9.5,5 L14.5,5 C15.3284271,5 16,4.32842712 16,3.5 L16,3 L18,3 C19.1045695,3 20,3.8954305 20,5 L20,21 C20,22.1045695 19.1045695,23 18,23 L6,23 C4.8954305,23 4,22.1045695 4,21 L4,5 C4,3.8954305 4.8954305,3 6,3 L8,3 Z"
                                                                                fill="#000000" opacity="0.3"></path>
                                                                            <path
                                                                                d="M11,2 C11,1.44771525 11.4477153,1 12,1 C12.5522847,1 13,1.44771525 13,2 L14.5,2 C14.7761424,2 15,2.22385763 15,2.5 L15,3.5 C15,3.77614237 14.7761424,4 14.5,4 L9.5,4 C9.22385763,4 9,3.77614237 9,3.5 L9,2.5 C9,2.22385763 9.22385763,2 9.5,2 L11,2 Z"
                                                                                fill="#000000"></path>
                                                                            <rect fill="#000000" opacity="0.3" x="10"
                                                                                y="9" width="7" height="2" rx="1">
                                                                            </rect>
                                                                            <rect fill="#000000" opacity="0.3" x="7"
                                                                                y="9" width="2" height="2" rx="1">
                                                                            </rect>
                                                                            <rect fill="#000000" opacity="0.3" x="7"
                                                                                y="13" width="2" height="2" rx="1">
                                                                            </rect>
                                                                            <rect fill="#000000" opacity="0.3" x="10"
                                                                                y="13" width="7" height="2" rx="1">
                                                                            </rect>
                                                                            <rect fill="#000000" opacity="0.3" x="7"
                                                                                y="17" width="2" height="2" rx="1">
                                                                            </rect>
                                                                            <rect fill="#000000" opacity="0.3" x="10"
                                                                                y="17" width="7" height="2" rx="1">
                                                                            </rect>
                                                                        </g>
                                                                    </svg>
                                                                    <!--end::Svg Icon-->
                                                                </span>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <tr>

                                                        <td class="pl-0">
                                                            <a href="#"
                                                                class="text-dark font-weight-bolder text-hover-primary mb-1 font-size-lg">text
                                                                text</a>
                                                            <span
                                                                class="text-muted font-weight-bold d-block">customerq@app.com</span>
                                                        </td>
                                                        <td class="pl-0">
                                                            <a href="#"
                                                                class="text-dark font-weight-bolder text-hover-primary mb-1 font-size-lg">3bc4d328-4ec5-eb11-9e8a-1c98ec18b82f</a>
                                                            <span
                                                                class="text-muted font-weight-bold d-block">200.00</span>
                                                        </td>
                                                        <td class="text-right">
                                                            <span class="text-muted font-weight-500">Friday, 04 June
                                                                2021</span>
                                                        </td>

                                                        <td class="text-right">
                                                            <span
                                                                class="label label-lg label-light-danger label-inline">
                                                                Pending</span>
                                                        </td>

                                                        <td class="text-right pr-0">
                                                            <a href="/Order/OrderDetails?id=3bc4d328-4ec5-eb11-9e8a-1c98ec18b82f"
                                                                class="btn btn-icon btn-light btn-sm">
                                                                <span class="svg-icon svg-icon-md svg-icon-info">
                                                                    <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2020-07-07-181510/theme/html/demo2/dist/../src/media/svg/icons/Communication/Clipboard-list.svg--><svg
                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                        width="24px" height="24px" viewBox="0 0 24 24"
                                                                        version="1.1">
                                                                        <g stroke="none" stroke-width="1" fill="none"
                                                                            fill-rule="evenodd">
                                                                            <rect x="0" y="0" width="24" height="24">
                                                                            </rect>
                                                                            <path
                                                                                d="M8,3 L8,3.5 C8,4.32842712 8.67157288,5 9.5,5 L14.5,5 C15.3284271,5 16,4.32842712 16,3.5 L16,3 L18,3 C19.1045695,3 20,3.8954305 20,5 L20,21 C20,22.1045695 19.1045695,23 18,23 L6,23 C4.8954305,23 4,22.1045695 4,21 L4,5 C4,3.8954305 4.8954305,3 6,3 L8,3 Z"
                                                                                fill="#000000" opacity="0.3"></path>
                                                                            <path
                                                                                d="M11,2 C11,1.44771525 11.4477153,1 12,1 C12.5522847,1 13,1.44771525 13,2 L14.5,2 C14.7761424,2 15,2.22385763 15,2.5 L15,3.5 C15,3.77614237 14.7761424,4 14.5,4 L9.5,4 C9.22385763,4 9,3.77614237 9,3.5 L9,2.5 C9,2.22385763 9.22385763,2 9.5,2 L11,2 Z"
                                                                                fill="#000000"></path>
                                                                            <rect fill="#000000" opacity="0.3" x="10"
                                                                                y="9" width="7" height="2" rx="1">
                                                                            </rect>
                                                                            <rect fill="#000000" opacity="0.3" x="7"
                                                                                y="9" width="2" height="2" rx="1">
                                                                            </rect>
                                                                            <rect fill="#000000" opacity="0.3" x="7"
                                                                                y="13" width="2" height="2" rx="1">
                                                                            </rect>
                                                                            <rect fill="#000000" opacity="0.3" x="10"
                                                                                y="13" width="7" height="2" rx="1">
                                                                            </rect>
                                                                            <rect fill="#000000" opacity="0.3" x="7"
                                                                                y="17" width="2" height="2" rx="1">
                                                                            </rect>
                                                                            <rect fill="#000000" opacity="0.3" x="10"
                                                                                y="17" width="7" height="2" rx="1">
                                                                            </rect>
                                                                        </g>
                                                                    </svg>
                                                                    <!--end::Svg Icon-->
                                                                </span>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <tr>

                                                        <td class="pl-0">
                                                            <a href="#"
                                                                class="text-dark font-weight-bolder text-hover-primary mb-1 font-size-lg">text
                                                                text</a>
                                                            <span
                                                                class="text-muted font-weight-bold d-block">customerq@app.com</span>
                                                        </td>
                                                        <td class="pl-0">
                                                            <a href="#"
                                                                class="text-dark font-weight-bolder text-hover-primary mb-1 font-size-lg">a4f3bce4-3fc5-eb11-9e8a-1c98ec18b82f</a>
                                                            <span
                                                                class="text-muted font-weight-bold d-block">200.00</span>
                                                        </td>
                                                        <td class="text-right">
                                                            <span class="text-muted font-weight-500">Friday, 04 June
                                                                2021</span>
                                                        </td>

                                                        <td class="text-right">
                                                            <span
                                                                class="label label-lg label-light-danger label-inline">
                                                                Pending</span>
                                                        </td>

                                                        <td class="text-right pr-0">
                                                            <a href="/Order/OrderDetails?id=a4f3bce4-3fc5-eb11-9e8a-1c98ec18b82f"
                                                                class="btn btn-icon btn-light btn-sm">
                                                                <span class="svg-icon svg-icon-md svg-icon-info">
                                                                    <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2020-07-07-181510/theme/html/demo2/dist/../src/media/svg/icons/Communication/Clipboard-list.svg--><svg
                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                        width="24px" height="24px" viewBox="0 0 24 24"
                                                                        version="1.1">
                                                                        <g stroke="none" stroke-width="1" fill="none"
                                                                            fill-rule="evenodd">
                                                                            <rect x="0" y="0" width="24" height="24">
                                                                            </rect>
                                                                            <path
                                                                                d="M8,3 L8,3.5 C8,4.32842712 8.67157288,5 9.5,5 L14.5,5 C15.3284271,5 16,4.32842712 16,3.5 L16,3 L18,3 C19.1045695,3 20,3.8954305 20,5 L20,21 C20,22.1045695 19.1045695,23 18,23 L6,23 C4.8954305,23 4,22.1045695 4,21 L4,5 C4,3.8954305 4.8954305,3 6,3 L8,3 Z"
                                                                                fill="#000000" opacity="0.3"></path>
                                                                            <path
                                                                                d="M11,2 C11,1.44771525 11.4477153,1 12,1 C12.5522847,1 13,1.44771525 13,2 L14.5,2 C14.7761424,2 15,2.22385763 15,2.5 L15,3.5 C15,3.77614237 14.7761424,4 14.5,4 L9.5,4 C9.22385763,4 9,3.77614237 9,3.5 L9,2.5 C9,2.22385763 9.22385763,2 9.5,2 L11,2 Z"
                                                                                fill="#000000"></path>
                                                                            <rect fill="#000000" opacity="0.3" x="10"
                                                                                y="9" width="7" height="2" rx="1">
                                                                            </rect>
                                                                            <rect fill="#000000" opacity="0.3" x="7"
                                                                                y="9" width="2" height="2" rx="1">
                                                                            </rect>
                                                                            <rect fill="#000000" opacity="0.3" x="7"
                                                                                y="13" width="2" height="2" rx="1">
                                                                            </rect>
                                                                            <rect fill="#000000" opacity="0.3" x="10"
                                                                                y="13" width="7" height="2" rx="1">
                                                                            </rect>
                                                                            <rect fill="#000000" opacity="0.3" x="7"
                                                                                y="17" width="2" height="2" rx="1">
                                                                            </rect>
                                                                            <rect fill="#000000" opacity="0.3" x="10"
                                                                                y="17" width="7" height="2" rx="1">
                                                                            </rect>
                                                                        </g>
                                                                    </svg>
                                                                    <!--end::Svg Icon-->
                                                                </span>
                                                            </a>
                                                        </td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                        </div>
                                        <!--end::Tablet-->
                                    </div>
                                    <!--end::Body-->
                                </div>
                                <!--end::Base Table Widget 5-->
                            </div>
                        </div>
                        <!--end::Row-->
                        <!--end::Dashboard-->
                    </div>
                    <!--end::Container-->
                </div>
                <!--end::Entry-->
            </div>
            <!--end::Content-->
            <!--begin::Footer-->
            @include("admin.dashboard.footer")
            <!--end::Footer-->
        </div>
        <!--end::Wrapper-->
    </div>
    <!--end::Page-->
</div>
<!--end::Main-->


<script src="{{asset('apex/js/apexcharts.min.js')}}"></script>
<script>
var trafficOption = {
    series: [{
        name: 'Products',
        type: 'column',
        data: [440, 505, 414, 671, 227, 413, 201, 352, 752, 320, 257, 160]
    }, {
        name: 'Services',
        type: 'line',
        data: [23, 42, 35, 27, 43, 22, 17, 31, 22, 22, 12, 16]
    }],
    chart: {
        height: 350,
        type: 'line',
    },
    stroke: {
        width: [0, 4]
    },
    title: {
        text: 'Sales'
    },
    dataLabels: {
        enabled: true,
        enabledOnSeries: [1]
    },
    labels: ['01 Jul 2021', '02 Jul 2021', '03 Jul 2021',
        '04 Jul 2021', '05 Jul 2021', '06 Jul 2021',
        '07 Jul 2021', '08 Jul 2021', '09 Jul 2021',
        '10 Jul 2021', '11 Jul 2021', '12Jul 2021'
    ],
    xaxis: {
        type: 'datetime'
    },
    yaxis: [{
        title: {
            text: 'Products',
        },
    }, {
        opposite: true,
        title: {
            text: 'Services'
        }
    }]
};

var chart = new ApexCharts(document.querySelector("#trafficChart"), trafficOption);
chart.render();

var guestOption = {
    series: [{
        name: "Visits",
        data: [10, 20, 30, 40, 50, 60]
    }],
    chart: {
        type: 'area',
        height: 350,
        zoom: {
            enabled: false
        }
    },
    dataLabels: {
        enabled: false
    },
    stroke: {
        curve: 'straight'
    },
    title: {
        text: 'Guest Users',
        align: 'left'
    },
    subtitle: {
        text: 'User visits',
        align: 'left'
    },
    labels: ['01 Jul 2021', '02 Jul 2021', '03 Jul 2021',
        '04 Jul 2021', '05 Jul 2021', '06 Jul 2021',
        '07 Jul 2021', '08 Jul 2021', '09 Jul 2021',
        '10 Jul 2021', '11 Jul 2021', '12Jul 2021'
    ],
    xaxis: {
        type: 'datetime',
    },
    yaxis: {
        opposite: true
    },
    legend: {
        horizontalAlign: 'left'
    }
};

var chart2 = new ApexCharts(document.querySelector("#guestChart"), guestOption);
chart2.render();

var serviceOptions = {
    series: [{
        name: 'Nike Sales',
        data: [2.3, 3.1, 4.0, 10.1, 4.0, 3.6, 3.2, 2.3, 1.4, 0.8, 0.5, 0.2]
    }],
    chart: {
        height: 350,
        type: 'bar',
    },
    plotOptions: {
        bar: {
            borderRadius: 10,
            dataLabels: {
                position: 'top', // top, center, bottom
            },
        }
    },
    dataLabels: {
        enabled: true,
        formatter: function(val) {
            return val + "%";
        },
        offsetY: -20,
        style: {
            fontSize: '12px',
            colors: ["#304758"]
        }
    },
    xaxis: {
        categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        position: 'top',
        axisBorder: {
            show: false
        },
        axisTicks: {
            show: false
        },
        crosshairs: {
            fill: {
                type: 'gradient',
                gradient: {
                    colorFrom: '#D8E3F0',
                    colorTo: '#BED1E6',
                    stops: [0, 100],
                    opacityFrom: 0.4,
                    opacityTo: 0.5,
                }
            }
        },
        tooltip: {
            enabled: true,
        }
    },
    yaxis: {
        axisBorder: {
            show: false
        },
        axisTicks: {
            show: false,
        },
        labels: {
            show: false,
            formatter: function(val) {
                return val + "%";
            }
        }

    },
    title: {
        text: 'Monthly Sale of Nike',
        floating: true,
        offsetY: 330,
        align: 'center',
        style: {
            color: '#444'
        }
    }
};

var chart3 = new ApexCharts(document.querySelector("#serviceChart"), serviceOptions);
chart3.render();


var smOptions = {
    series: [76, 67, 61, 90],
    chart: {
        height: 390,
        type: 'radialBar',
    },
    plotOptions: {
        radialBar: {
            offsetY: 0,
            startAngle: 0,
            endAngle: 270,
            hollow: {
                margin: 5,
                size: '30%',
                background: 'transparent',
                image: undefined,
            },
            dataLabels: {
                name: {
                    show: false,
                },
                value: {
                    show: false,
                }
            }
        }
    },
    colors: ['#1ab7ea', '#0084ff', '#39539E', '#0077B5'],
    labels: ['Vimeo', 'Messenger', 'Facebook', 'LinkedIn'],
    legend: {
        show: true,
        floating: true,
        fontSize: '16px',
        position: 'left',
        offsetX: 160,
        offsetY: 15,
        labels: {
            useSeriesColors: true,
        },
        markers: {
            size: 0
        },
        formatter: function(seriesName, opts) {
            return seriesName + ":  " + opts.w.globals.series[opts.seriesIndex]
        },
        itemMargin: {
            vertical: 3
        }
    },
    responsive: [{
        breakpoint: 480,
        options: {
            legend: {
                show: false
            }
        }
    }]
};

var chart4 = new ApexCharts(document.querySelector("#smChart"), smOptions);
chart4.render();
</script>
@endsection
