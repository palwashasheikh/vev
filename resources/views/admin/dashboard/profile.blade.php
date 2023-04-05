@extends("admin.dashboard.layouts.main")
@section('content')
    @include('admin.dashboard.layouts.topvend')
    @include('admin.dashboard.layouts.subheader')
<div class="container">
            <div class="flex-row-fluid ml-lg-8">
                <form class="form" method="post" action="{{route('updateProfile')}}" enctype="multipart/form-data">
                    @csrf
                <div class="card card-custom card-stretch">

                    <div class="card-header py-3">
                        <div class="card-title align-items-start flex-column">
                            <h3 class="card-label font-weight-bolder text-dark">Personal Information</h3>
                            <span class="text-muted font-weight-bold font-size-sm mt-1">Update your personal informaiton</span>
                        </div>
                        <div class="card-toolbar">
                            <button type="submit" class="btn btn-success mr-2">Save Changes</button>
                        </div>
                    </div>
                        <div class="card-body">
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label text-right">User Photo</label>
                                <div class="col-lg-9 col-xl-6">
                                    <div class="image-input image-input-outline" id="kt_image_1">
                                        <div class="image-input-wrapper " style="background-image: url(<?php echo asset('asset/admin/media/users/blank.png')?>")></div>
                                        <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change avatar">
                                            <i class="fa fa-pen icon-sm text-muted"></i>
                                            <input type="file"  name="image" accept=".png, .jpg, .jpeg" />
                                            <input type="hidden" name="profile_avatar_remove" />
                                        </label>
                                        <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="Cancel avatar">
															<i class="ki ki-bold-close icon-xs text-muted"></i>
														</span>
                                    </div>
                                    <span class="form-text text-muted">Allowed file types: png, jpg, jpeg.</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label text-right">User Name</label>
                                <div class="col-lg-9 col-xl-6">
                                    <input class="form-control  form-control-lg form-control-solid" type="text"  name="user_name"  value="{{$user->user_name}}" />
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-xl-3"></label>
                                <div class="col-lg-9 col-xl-6">
                                    <h5 class="font-weight-bold mt-10 mb-6">Contact Info</h5>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label text-right">Contact Phone</label>
                                <div class="col-lg-9 col-xl-6">
                                    <div class="input-group input-group-lg input-group-solid">
                                        <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="la la-phone"></i>
                                        </span>
                                        </div>
                                        <input type="text"  name="phone"  class="form-control form-control-lg form-control-solid"  value="{{$user->user_phonenumber}}" placeholder="Phone" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label text-right">Email Address</label>
                                <div class="col-lg-9 col-xl-6">
                                    <div class="input-group input-group-lg input-group-solid">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="la la-at"></i>
                                            </span>
                                        </div>
                                        <input type="text" name="email" class="form-control form-control-lg form-control-solid"  value="{{$user->user_email}}" placeholder="Email" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label text-right">Email Address</label>
                                <div class="col-lg-9 col-xl-6">
                                    <div class="input-group input-group-lg input-group-solid">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="la la-address-card"></i>
                                            </span>
                                        </div>
                                        <input type="text" name="address" class="form-control form-control-lg form-control-solid"  value="{{$user->user_address}}" placeholder="Address" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label text-right">Birth Date</label>
                                <div class="col-lg-9 col-xl-6">
                                <div class="input-group input-group-lg input-group-solid">
                                    <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="la la-calendar"></i>
                                            </span>
                                    </div>
                                    <input class="form-control" name="userBirthDate" type="date" value="{{$user->UserBirthDate}}" id="example-date-input">
                                </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label text-right">Gender</label>
                                <div class="radio-inline">
                                    <label class="radio">
                                        <input type="radio" name="IsUserMale"  value="0"  {{ ($user->IsUserMale =="0")? "checked" : "" }}/>
                                        <span></span>Male</label>
                                    <label class="radio">
                                        <input type="radio" name="IsUserMale"  value="1" {{ ($user->IsUserMale == "1")? "checked" : ""}}/>
                                        <span></span>Female</label>
                                </div>
                        </div>
                    </div>
                </div>
                 </form>
                </div>
</div>
    @include("admin.dashboard.footer")
@endsection
