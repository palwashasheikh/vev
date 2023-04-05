@extends("dashboard.layouts.main")

@section('content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>

    	<!--begin::Main-->
		<!--begin::Header Mobile-->
		<div id="kt_header_mobile" class="header-mobile">
			<!--begin::Logo-->
			<a href="index.html">
				<img alt="Logo" src="{{asset('theme/html/demo2/dist/assets/media/logos/logo-letter-1.png')}}" class="logo-default max-h-30px" />
			</a>
			<!--end::Logo-->
			<!--begin::Toolbar-->
			<div class="d-flex align-items-center">
				<button class="btn p-0 burger-icon burger-icon-left ml-4" id="kt_header_mobile_toggle">
					<span></span>
				</button>
				<button class="btn btn-icon btn-hover-transparent-white p-0 ml-3" id="kt_header_mobile_topbar_toggle">
					<span class="svg-icon svg-icon-xl">
						<!--begin::Svg Icon | path:/metronic/theme/html/demo2/dist/assets/media/svg/icons/General/User.svg-->
						<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
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
		<!--end::Header Mobile-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Page-->
			<div class="d-flex flex-row flex-column-fluid page">
				<!--begin::Wrapper-->
				<div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
					<!--begin::Header-->
					@include('dashboard.layouts.topmenu')
					<!--end::Header-->
					<!--begin::Content-->
					<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
						<!--begin::Subheader-->
						<div class="subheader py-2 py-lg-12 subheader-transparent" id="kt_subheader">
							<div class="container d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
								<!--begin::Info-->
								
								<!--end::Info-->
								<!--begin::Toolbar-->
								<div class="d-flex align-items-center">
									<!--begin::Button-->
									<a href="#" class="btn btn-transparent-white font-weight-bold py-3 px-6 mr-2">Reports</a>
									<!--end::Button-->
									<!--begin::Dropdown-->
									<div class="dropdown dropdown-inline ml-2" data-toggle="tooltip" title="Quick actions" data-placement="top">
										<a href="#" class="btn btn-white font-weight-bold py-3 px-6" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Actions</a>
										<div class="dropdown-menu p-0 m-0 dropdown-menu-md dropdown-menu-right">
											<!--begin::Navigation-->
											<ul class="navi navi-hover py-5">
												<li class="navi-item">
													<a href="#" class="navi-link">
														<span class="navi-icon">
															<i class="flaticon2-drop"></i>
														</span>
														<span class="navi-text">New Group</span>
													</a>
												</li>
												<li class="navi-item">
													<a href="#" class="navi-link">
														<span class="navi-icon">
															<i class="flaticon2-list-3"></i>
														</span>
														<span class="navi-text">Contacts</span>
													</a>
												</li>
												<li class="navi-item">
													<a href="#" class="navi-link">
														<span class="navi-icon">
															<i class="flaticon2-rocket-1"></i>
														</span>
														<span class="navi-text">Groups</span>
														<span class="navi-link-badge">
															<span class="label label-light-primary label-inline font-weight-bold">new</span>
														</span>
													</a>
												</li>
												<li class="navi-item">
													<a href="#" class="navi-link">
														<span class="navi-icon">
															<i class="flaticon2-bell-2"></i>
														</span>
														<span class="navi-text">Calls</span>
													</a>
												</li>
												<li class="navi-item">
													<a href="#" class="navi-link">
														<span class="navi-icon">
															<i class="flaticon2-gear"></i>
														</span>
														<span class="navi-text">Settings</span>
													</a>
												</li>
												<li class="navi-separator my-3"></li>
												<li class="navi-item">
													<a href="#" class="navi-link">
														<span class="navi-icon">
															<i class="flaticon2-magnifier-tool"></i>
														</span>
														<span class="navi-text">Help</span>
													</a>
												</li>
												<li class="navi-item">
													<a href="#" class="navi-link">
														<span class="navi-icon">
															<i class="flaticon2-bell-2"></i>
														</span>
														<span class="navi-text">Privacy</span>
														<span class="navi-link-badge">
															<span class="label label-light-danger label-rounded font-weight-bold">5</span>
														</span>
													</a>
												</li>
											</ul>
											<!--end::Navigation-->
										</div>
									</div>
									<!--end::Dropdown-->
								</div>
								<!--end::Toolbar-->
							</div>
						</div>
						<!--end::Subheader-->
						<!--begin::Entry-->
						<div class="d-flex flex-column-fluid">
							<!--begin::Container-->
							<div class="container">
								<!--begin::Dashboard-->
								<!--begin::Row-->
								
								<!--end::Row-->
								<!--begin::Row-->
								<div class="row">
									
									<div class="col-lg-12 col-xxl-12">
										<!--begin::Advance Table Widget 1-->
										<div class="card card-custom card-stretch gutter-b">
											<!--begin::Header-->
											<div class="card-header border-0 py-5">
												<h3 class="card-title align-items-start flex-column">
													<span class="card-label font-weight-bolder text-dark">Stats</span>
													<span class="text-muted mt-3 font-weight-bold font-size-sm">More than <span id="dtcnt"></span> new products</span>
												</h3>
												<div class="card-toolbar">
													<a href="{{route('prd')}}" class="btn btn-success font-weight-bolder font-size-sm">
													<span class="svg-icon svg-icon-md svg-icon-white">
														<!--begin::Svg Icon | path:/metronic/theme/html/demo2/dist/assets/media/svg/icons/Communication/Add-user.svg-->
														<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
															<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																<polygon points="0 0 24 0 24 24 0 24" />
																<path d="M18,8 L16,8 C15.4477153,8 15,7.55228475 15,7 C15,6.44771525 15.4477153,6 16,6 L18,6 L18,4 C18,3.44771525 18.4477153,3 19,3 C19.5522847,3 20,3.44771525 20,4 L20,6 L22,6 C22.5522847,6 23,6.44771525 23,7 C23,7.55228475 22.5522847,8 22,8 L20,8 L20,10 C20,10.5522847 19.5522847,11 19,11 C18.4477153,11 18,10.5522847 18,10 L18,8 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
																<path d="M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero" />
															</g>
														</svg>
														<!--end::Svg Icon-->
													</span>Back to Products List</a>
												</div>
											</div>
											<!--end::Header-->
											<!--begin::Body-->
											<div class="card-body py-5">
												<!--begin::Table-->
												<div class="table-responsive">
													<form class="form" action="{{route('saveProduct')}}" method="post">
														@csrf
                                                        @method('POST')
													<div class="card-body">
													<h3 class="font-size-lg text-dark font-weight-bold mb-6"> Product Form</h3>
													<div class="mb-15">
													<div class="form-group row">
														<label class="col-lg-3 col-form-label text-right">Product Name:</label>
														<div class="col-lg-6">
														<input type="text" name="name" id="name" placeholder="Product Name" class="form-control" />
														<span class="form-text text-muted">Please enter product name</span>
														</div>
													</div>
													<div class="form-group row">
														<label class="col-lg-3 col-form-label text-right">Email address:</label>
														<div class="col-lg-6">
														<input type="text" name="pcode" id="pcode" placeholder="Product Code" class="form-control" />
														<span class="form-text text-muted">Product Code is Important</span>
														</div>
													</div>
													</div>
													
													<div class="mb-3">
													<div class="form-group row">
														<label class="col-lg-3 col-form-label text-right">Detail:</label>
														<div class="col-lg-6">
														<textarea name="detail" id="detail" cols="25" rows="5" placeholder="Product Details" class="form-control"></textarea>
														<span class="form-text text-muted">Please enter Product Details</span>
														</div>
													</div>
													<div class="form-group row">
														<label class="col-lg-3 col-form-label text-right">Image</label>
														<div class="col-lg-6">
														<div class="input-group">
														<div class="input-group-prepend"><span class="input-group-text"><i class="la la-image"></i></span></div>
														<input type="text" name="pimg" id="pimg" placeholder="Product Image" class="form-control" />
														</div>
														</div>
													</div>

													<div class="form-group row">
														<label class="col-lg-3 col-form-label text-right">Category</label>
														<div class="col-lg-6">
														<div class="input-group">
														<div class="input-group-prepend"><span class="input-group-text"><i class="la la-group">*</i></span></div>
														<select  name="category_id" id="category_id" class="form-control" required>
															<option value="">Select Category</option>
															 	@foreach($cats as $cat)
																 <option value="{{$cat->id}}">{{$cat->name}}</option>
																@endforeach
														</select>
														</div>
														</div>
													</div>

													<div class="form-group row">
														<label class="col-lg-3 col-form-label text-right">Status</label>
														<div class="col-lg-6">
														<div class="input-group">
														<div class="input-group-prepend"><span class="input-group-text"><i class="la la-tachometer"></i></span></div>
														<input type="text" name="is_active" id="is_active" placeholder="Is Active" class="form-control" />
														</div>
														</div>
													</div>		

													</div>
													</div>											
												
													<div class="card-footer">
													<div class="row">
													<div class="col-lg-3"></div>
													<div class="col-lg-6">
														<button type="submit" class="btn btn-success mr-2">Submit</button>
														<button type="reset" class="btn btn-secondary">Cancel</button>
													</div>
													</div>
													</div>
													</form>
												</div>
												
												<!--end::Table-->
											</div>
											<!--end::Body-->
										</div>
										<!--end::Advance Table Widget 1-->
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
					@include("dashboard.footer")
					<!--end::Footer-->
				</div>
				<!--end::Wrapper-->
			</div>
			<!--end::Page-->
		</div>
		<!--end::Main-->
		<!--begin::Quick Panel-->
		
		<!--end::Quick Panel-->
		<!--begin::Scrolltop-->
		<div id="kt_scrolltop" class="scrolltop">
			<span class="svg-icon">
				<!--begin::Svg Icon | path:/metronic/theme/html/demo2/dist/assets/media/svg/icons/Navigation/Up-2.svg-->
				<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
					<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
						<polygon points="0 0 24 0 24 24 0 24" />
						<rect fill="#000000" opacity="0.3" x="11" y="10" width="2" height="10" rx="1" />
						<path d="M6.70710678,12.7071068 C6.31658249,13.0976311 5.68341751,13.0976311 5.29289322,12.7071068 C4.90236893,12.3165825 4.90236893,11.6834175 5.29289322,11.2928932 L11.2928932,5.29289322 C11.6714722,4.91431428 12.2810586,4.90106866 12.6757246,5.26284586 L18.6757246,10.7628459 C19.0828436,11.1360383 19.1103465,11.7686056 18.7371541,12.1757246 C18.3639617,12.5828436 17.7313944,12.6103465 17.3242754,12.2371541 L12.0300757,7.38413782 L6.70710678,12.7071068 Z" fill="#000000" fill-rule="nonzero" />
					</g>
				</svg>
				<!--end::Svg Icon-->
			</span>
		</div>
		<!--end::Scrolltop-->
		<!--begin::Sticky Toolbar-->
		<ul class="sticky-toolbar nav flex-column pl-2 pr-2 pt-3 pb-3 mt-4">
			<!--begin::Item-->
			<li class="nav-item mb-2" id="kt_demo_panel_toggle" data-toggle="tooltip" title="Check out more demos" data-placement="right">
				<a class="btn btn-sm btn-icon btn-bg-light btn-icon-success btn-hover-success" href="#">
					<i class="flaticon2-drop"></i>
				</a>
			</li>
			<!--end::Item-->
			<!--begin::Item-->
			<li class="nav-item mb-2" data-toggle="tooltip" title="Layout Builder" data-placement="left">
				<a class="btn btn-sm btn-icon btn-bg-light btn-icon-primary btn-hover-primary" href="builder.html">
					<i class="flaticon2-gear"></i>
				</a>
			</li>
			<!--end::Item-->
			<!--begin::Item-->
			<li class="nav-item mb-2" data-toggle="tooltip" title="Documentation" data-placement="left">
				<a class="btn btn-sm btn-icon btn-bg-light btn-icon-warning btn-hover-warning" href="https://keenthemes.com/metronic/?page=docs" target="_blank">
					<i class="flaticon2-telegram-logo"></i>
				</a>
			</li>
			<!--end::Item-->
		</ul>
		<!--end::Sticky Toolbar-->
		<!--begin::Demo Panel-->
		
		<!--end::Demo Panel-->
		<script>var HOST_URL = "https://preview.keenthemes.com/metronic/theme/html/tools/preview";</script>
		<!--begin::Global Config(global config for global JS scripts)-->
		<script>var KTAppSettings = { "breakpoints": { "sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1200 }, "colors": { "theme": { "base": { "white": "#ffffff", "primary": "#6993FF", "secondary": "#E5EAEE", "success": "#1BC5BD", "info": "#8950FC", "warning": "#FFA800", "danger": "#F64E60", "light": "#F3F6F9", "dark": "#212121" }, "light": { "white": "#ffffff", "primary": "#E1E9FF", "secondary": "#ECF0F3", "success": "#C9F7F5", "info": "#EEE5FF", "warning": "#FFF4DE", "danger": "#FFE2E5", "light": "#F3F6F9", "dark": "#D6D6E0" }, "inverse": { "white": "#ffffff", "primary": "#ffffff", "secondary": "#212121", "success": "#ffffff", "info": "#ffffff", "warning": "#ffffff", "danger": "#ffffff", "light": "#464E5F", "dark": "#ffffff" } }, "gray": { "gray-100": "#F3F6F9", "gray-200": "#ECF0F3", "gray-300": "#E5EAEE", "gray-400": "#D6D6E0", "gray-500": "#B5B5C3", "gray-600": "#80808F", "gray-700": "#464E5F", "gray-800": "#1B283F", "gray-900": "#212121" } }, "font-family": "Poppins" };</script>
		<!--end::Global Config-->
		<!--begin::Global Theme Bundle(used by all pages)-->
		<script src="{{asset('theme/html/demo2/dist/assets/plugins/global/plugins.bundlec3e8.js?v=7.0.6')}}"></script>
		<script src="{{asset('theme/html/demo2/dist/assets/plugins/custom/prismjs/prismjs.bundlec3e8.js?v=7.0.6')}}"></script>
		<script src="{{asset('theme/html/demo2/dist/assets/js/scripts.bundlec3e8.js?v=7.0.6')}}"></script>
		<!--end::Global Theme Bundle-->
		<!--begin::Page Vendors(used by this page)-->
		<script src="{{asset('theme/html/demo2/dist/assets/plugins/custom/fullcalendar/fullcalendar.bundlec3e8.js?v=7.0.6')}}"></script>
		<!--end::Page Vendors-->
		<!--begin::Page Scripts(used by this page)-->
		<script src="{{asset('theme/html/demo2/dist/assets/js/pages/widgetsc3e8.js?v=7.0.6')}}"></script>
		<!--end::Page Scripts-->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>

<script type="text/javascript">
  $(function () {
    
    var table = $('.yajra-datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('plist') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'name', name: 'name'},
            {data: 'pcode', name: 'pcode'},
            {data: 'detail', name: 'detail'},
            {data: 'pimg', name: 'pimg'},
            {data: 'category_id', name: 'category_id'},
            {data: 'is_active', name: 'is_active'},
            {
                data: 'action', 
                name: 'action', 
                orderable: true, 
                searchable: true
            },
        ]
    });

	var table = $('.yajra-datatable').DataTable();
 
	var data = table.rows().data().length;

	console.log(data);

	$("#dtcnt").text(data);
    
  });
</script>

@endsection

