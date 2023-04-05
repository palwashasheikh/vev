       <div id="kt_header" class="header header-fixed">
						<!--begin::Container-->
						<div class="container d-flex align-items-stretch justify-content-between">
							<!--begin::Left-->
							<div class="d-flex align-items-stretch mr-3">
								<!--begin::Header Logo-->
								<div class="header-logo">
									<a href="index.html">
										<img alt="Logo" src="{{asset('asset/admin/media/logos/Asset 14.png')}}" class="logo-default max-h-40px" />
										<img alt="Logo" src="{{asset('theme/html/demo2/dist/assets/media/logos/logo-letter-1.png')}}" class="logo-sticky max-h-40px" />
									</a>
								</div>
								<!--end::Header Logo-->
								<!--begin::Header Menu Wrapper-->
								<div class="header-menu-wrapper header-menu-wrapper-left" id="kt_header_menu_wrapper">
									<!--begin::Header Menu-->
									<div id="kt_header_menu" class="header-menu header-menu-left header-menu-mobile header-menu-layout-default">
										<!--begin::Header Nav-->
										<ul class="menu-nav">
											<li class="menu-item menu-item-open menu-item-here menu-item-submenu menu-item-rel menu-item-open menu-item-here" data-menu-toggle="click" aria-haspopup="true">
												<a href="{{route('adminDash')}}" class="menu-link">
													<span class="menu-text">Dashboard</span>
													<i class="menu-arrow"></i>
												</a>
											</li>
											@include('admin.dashboard.layouts.menus')
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
