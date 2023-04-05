@include("admin.dashboard.layouts.main")
@include('admin.dashboard.layouts.topvend')
@include('admin.dashboard.layouts.Subheader')
<div class="main-content">
<div class="section">
    <div class="section-body">
    <div class="row">
        <div class="col-4 col-md-4 col-lg-4">
            <div class="card">
                <div class="card-body card-profile shop-edit-button">
                    @foreach($store as $stores)
                        <img class="profile-user-img img-responsive img-circle" src="{{asset($stores->logo)}}" alt="User profile picture">
                        <h3 class="text-center">{{$stores->store_name}}</h3>
                        <p class="text-center">
                            {{$stores->store_address}}
                        </p>
                    @endforeach

                    <a href="https://demo.food-express.xyz/admin/shopedit/9" class="btn btn-sm btn-icon btn-primary shop-edit-icon" data-toggle="tooltip" data-placement="top" data-original-title="Edit"> <i class="far fa-edit"></i></a>
                </div>
            </div>
            <div class="card">
                @foreach($user as $users)
                <div class="card-body card-profile">
                    <img class="profile-user-img img-responsive img-circle"  src="{{asset($users->UserImage)}}" alt="User profile picture">
                    <h3 class="text-center">{{$users->user_name}}</h3>
                    <ul class="list-group">
                        <li class="list-group-item profile-list-group-item"><span class="float-left font-weight-bold">Username</span><span class="float-right">{{$users->user_name}}</span></li>
                        <li class="list-group-item profile-list-group-item"><span class="float-left font-weight-bold">Phone</span> <span class="float-right">{{$users->user_phonenumber}}</span></li>
                        <li class="list-group-item profile-list-group-item"><span class="float-left font-weight-bold">Email</span> <span class="float-right">{{$users->user_email}}</span></li>
                        <li class="list-group-item profile-list-group-item"><span class="float-left font-weight-bold">Address</span> <span class="float-right profile-list-group-item-addresss">{{$users->user_address}}</span></li>
                        <li class="list-group-item profile-list-group-item"><span class="float-left font-weight-bold">Status</span> <span class="float-right profile-list-group-item-addresss">Active</span></li>
                        @endforeach
                    </ul>
                </div>
                <!-- /.box-body -->
            </div>
        </div>

        <div class="col-8 col-md-8 col-lg-8">

            <div class="card">
                <div class="card-body">
                    <div class="profile-desc">
                        <div class="single-profile">
                            @foreach($store as $stores)
                            <p><b>Name: </b> {{$stores->store_name}}</p>
                        </div>
                        <div class="single-profile">
                            <p><b>Location: </b>{{$stores->store_address}} </p>
                        </div>
                        <div class="single-profile">
                            <p><b>Type: </b>{{$stores->storeType}} </p>
                        </div>
                        <div class="single-profile">
                            <p><b>Latitude: </b> {{$stores->lat}}</p>
                        </div>
                        <div class="single-profile">
                            <p><b>Longitude: </b> {{$stores->lng}}</p>
                        </div>
                        <div class="single-profile">
                            <p><b>Current Status: </b> Active</p>
                        </div>
                        <div class="single-full-profile">
                            <p><b>Description: </b> {{$stores->storedetail}}.</p>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <?php
                if(Auth::user()->getRole() == "service provider"){
           ?>
            <div class="card">
                <div class="card-header">
                    <a href="https://demo.food-express.xyz/admin/shop/9/products/create" class="btn btn-primary"><i class="fas fa-plus"></i> Add Shop Services
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <div id="maintable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer"><div class="row">
                                <div class="col-sm-12 col-md-6">
                                    <div class="dataTables_length" id="maintable_length">
                                        <label>Show <select name="maintable_length" aria-controls="maintable" class="custom-select custom-select-sm form-control form-control-sm">
                                                <option value="10">10</option>
                                                <option value="25">25</option>
                                                <option value="50">50</option>
                                                <option value="100">100</option>
                                            </select> entries</label>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <div id="maintable_filter" class="dataTables_filter">
                                        <label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="maintable"></label>
                                    </div>
                                </div>
                            </div>
                            <div class="row"><div class="col-sm-12">
                                    <table class="table table-striped dataTable no-footer" id="maintable" data-shopid="9" data-url="https://demo.food-express.xyz/admin/get-shop-product" data-hidecolumn="1" role="grid" aria-describedby="maintable_info" style="width: 1005px;">
                                        <thead>
                                        <tr role="row"><th class="sorting_disabled" rowspan="1" colspan="1" style="width: 56px;">ID</th>
                                            <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 288px;">Services</th>
                                            <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 108px;">Price</th>
                                            <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 130px;">Category</th>
                                            <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 149px;">Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($recentservices as $recentservices)
                                        <tr role="row">
                                            <td>{{$recentservices->id}}</td>
                                            <td>{{$recentservices->name}}</td>
                                            <td>{{$recentservices->price}}</td>
                                            <td>{{$recentservices->categoriesName}}</td>
                                            <td><a href="https://demo.food-express.xyz/admin/shop/9/products/17/edit" class="btn btn-sm btn-icon float-left btn-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"> <i class="far fa-edit"></i></a>
                                                <form class="float-left pl-2" action="https://demo.food-express.xyz/admin/shop/9/products/17/delete" method="POST">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="ATKirntBzFPDUJVyUN3VkPegTqhWhoZCgsiDcPac">
                                                    <button class="btn btn-sm btn-icon btn-danger" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    <div id="maintable_processing" class="dataTables_processing card" style="display: none;">Processing...</div></div></div><div class="row"><div class="col-sm-12 col-md-5"><div class="dataTables_info" id="maintable_info" role="status" aria-live="polite">Showing 1 to 10 of 17 entries</div></div><div class="col-sm-12 col-md-7"><div class="dataTables_paginate paging_simple_numbers" id="maintable_paginate"><ul class="pagination"><li class="paginate_button page-item previous disabled" id="maintable_previous"><a href="#" aria-controls="maintable" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li><li class="paginate_button page-item active"><a href="#" aria-controls="maintable" data-dt-idx="1" tabindex="0" class="page-link">1</a></li><li class="paginate_button page-item "><a href="#" aria-controls="maintable" data-dt-idx="2" tabindex="0" class="page-link">2</a></li><li class="paginate_button page-item next" id="maintable_next">
                                                <a href="#" aria-controls="maintable" data-dt-idx="3" tabindex="0" class="page-link">Next</a>
                                               </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            }
            else{
            if(Auth::user()->getRole() == "vendor"){
            ?>
            <div class="card">
                <div class="card-header">
                    <a href="{{route('form')}}" class="btn btn-primary"><i class="fas fa-plus"></i> Add Shop Products
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <div id="maintable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer"><div class="row">
                                <div class="col-sm-12 col-md-6">
                                    <div class="dataTables_length" id="maintable_length">
                                        <label>Show <select name="maintable_length" aria-controls="maintable" class="custom-select custom-select-sm form-control form-control-sm">
                                                <option value="10">10</option>
                                                <option value="25">25</option>
                                                <option value="50">50</option>
                                                <option value="100">100</option>
                                            </select> entries</label>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <div id="maintable_filter" class="dataTables_filter">
                                        <label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="maintable"></label>
                                    </div>
                                </div>
                            </div>
                            <div class="row"><div class="col-sm-12">
                                    <table class="table table-striped dataTable no-footer" id="maintable" data-shopid="9" data-url="https://demo.food-express.xyz/admin/get-shop-product" data-hidecolumn="1" role="grid" aria-describedby="maintable_info" style="width: 1005px;">
                                        <thead>
                                        <tr role="row"><th class="sorting_disabled" rowspan="1" colspan="1" style="width: 56px;">ID</th>
                                            <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 288px;">Products</th>
                                            <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 108px;">Price</th>
                                            <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 130px;">Category</th>
                                            <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 149px;">Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($recentservices as $recentservices)
                                            <tr role="row">
                                                <td>{{$recentservices->id}}</td>
                                                <td>{{$recentservices->name}}</td>
                                                <td>{{$recentservices->price}}</td>
                                                <td>{{$recentservices->categoriesName}}</td>
                                                <td><a href="https://demo.food-express.xyz/admin/shop/9/products/17/edit" class="btn btn-sm btn-icon float-left btn-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"> <i class="far fa-edit"></i></a>
                                                    <form class="float-left pl-2" action="https://demo.food-express.xyz/admin/shop/9/products/17/delete" method="POST">
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        <input type="hidden" name="_token" value="ATKirntBzFPDUJVyUN3VkPegTqhWhoZCgsiDcPac">
                                                        <button class="btn btn-sm btn-icon btn-danger" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    <div id="maintable_processing" class="dataTables_processing card" style="display: none;">Processing...</div></div></div><div class="row"><div class="col-sm-12 col-md-5"><div class="dataTables_info" id="maintable_info" role="status" aria-live="polite">Showing 1 to 10 of 17 entries</div></div><div class="col-sm-12 col-md-7"><div class="dataTables_paginate paging_simple_numbers" id="maintable_paginate"><ul class="pagination"><li class="paginate_button page-item previous disabled" id="maintable_previous"><a href="#" aria-controls="maintable" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li><li class="paginate_button page-item active"><a href="#" aria-controls="maintable" data-dt-idx="1" tabindex="0" class="page-link">1</a></li><li class="paginate_button page-item "><a href="#" aria-controls="maintable" data-dt-idx="2" tabindex="0" class="page-link">2</a></li><li class="paginate_button page-item next" id="maintable_next">
                                                <a href="#" aria-controls="maintable" data-dt-idx="3" tabindex="0" class="page-link">Next</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
                      }
            }
                      ?>
        </div>
    </div>

</div>

</div>
</div>
