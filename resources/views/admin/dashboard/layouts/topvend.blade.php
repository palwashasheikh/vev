<div id="kt_header_mobile" class="header-mobile">
    <a href="index.html">
        <img alt="Logo" src="{{asset('asset/admin/media/logos/Asset 14.png')}}" class="logo-default max-h-30px" />
    </a>
    <div class="d-flex container align-items-center">
        <button class="btn p-0 burger-icon burger-icon-left ml-4" id="kt_header_mobile_toggle">
            <span></span>
        </button>
        <button class="btn btn-icon btn-hover-transparent-white p-0 ml-3" id="kt_header_mobile_topbar_toggle">
					<span class="svg-icon svg-icon-xl">
						<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24"   >
							<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
								<polygon points="0 0 24 0 24 24 0 24" />
								<path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
								<path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero" />
							</g>
						</svg>
                        <!--end::Svg Icon-->
					</span>
        </button>
    </div>
    <!--end::Toolbar-->
</div>

<div id="kt_header" class="header header-fixed">
    <div class="container d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <div class="d-flex align-items-stretch mr-3">

            <div class="header-logo">
                <a href="<?php Auth::user()->getRole() == "service provider" ? route('ServicesProvider') : route('adminDash')?>">
                    <img alt="Logo" src="{{asset('asset/admin/media/logos/Vev-logo-white.png')}}" class="logo-default max-h-40px" />
                    <img alt="Logo" src="{{asset('asset/admin/media/logos/Asset 14.png')}}" class="logo-sticky max-h-40px" />
                </a>
            </div>
            <div class="header-menu-wrapper header-menu-wrapper-left" id="kt_header_menu_wrapper">
                <div id="kt_header_menu" class="header-menu header-menu-left header-menu-mobile header-menu-layout-default">
                    <ul class="menu-nav">
                        <li class="menu-item menu-item-open menu-item-here menu-item-submenu menu-item-rel menu-item-open menu-item-here" data-menu-toggle="click" aria-haspopup="true">
                            <a href="<?php Auth::user()->getRole() == "service provider" ? route('ServicesProvider') : route('adminDash')?>" class="menu-link menu-toggle"><span class="menu-text">Dashboard</span>
                                <i class="menu-arrow"></i>
                            </a>
                        </li>
                        <li class="menu-item menu-item-submenu menu-item-rel menu-item-open-dropdown" data-menu-toggle="click" aria-haspopup="true">
                            <a href="javascript:;" class="menu-link">
                                <span class="menu-text">Orders</span>
                                <i class="menu-arrow"></i>
                            </a>
                        </li>
                        @php
                            if(Auth::user()->getRole() == "service provider"){
                        @endphp
                        <li class="menu-item menu-item-submenu menu-item-rel menu-item-open-dropdown" data-menu-toggle="click" aria-haspopup="true">
                            <a href="{{route('servicesList')}}" class="menu-link">
                                <span class="menu-text">Services</span>
                                <i class="menu-arrow"></i>
                            </a>
                        </li>
                        @php
                            }
                            else
                               if(Auth::user()->getRole() == "vendor"){

                        @endphp
                        <li class="menu-item menu-item-submenu menu-item-rel menu-item-open-dropdown" data-menu-toggle="click" aria-haspopup="true">
                            <a href="{{route('productList')}}" class="menu-link">
                                <span class="menu-text">Products</span>
                                <i class="menu-arrow"></i>
                            </a>
                        </li>
                        <li class="menu-item menu-item-submenu menu-item-rel menu-item-open-dropdown" data-menu-toggle="click" aria-haspopup="true">
                            <a href="{{route('store')}}" class="menu-link">
                                <span class="menu-text">stores</span>
                                <span class="menu-desc"></span>
                            </a>
                        </li>
                        @php
                            }
                            else{
                        @endphp
                        <li class="menu-item menu-item-submenu menu-item-rel menu-item-open-dropdown" data-menu-toggle="click" aria-haspopup="true">
                            <a href="{{route('storeList')}}" class="menu-link">
                                <span class="menu-text">stores</span>
                                <span class="menu-desc"></span>
                            </a>
                        </li>
                    <?php
                                            }
?>


                    </ul>
                    <!--end::Header Nav-->
                </div>
                <!--end::Header Menu-->
            </div>
            <!--end::Header Menu Wrapper-->
        </div>
        <!--end::Left-->
        <!--begin::Topbar-->
    @include('admin.dashboard.layouts.topmenu2')
    <!--end::Topbar-->
    </div>
    <!--end::Container-->
</div>
