@extends("admin.dashboard.layouts.main")
@section('content')
    @include('admin.dashboard.layouts.topvend')
    @include('admin.dashboard.layouts.subheader')
<div class="container">
    <div class="flex-row-fluid ml-lg-8">
        <form class="form" action="{{route('updatePassword')}}" method="post">
            @csrf
        <div class="card card-custom">
            <!--begin::Header-->
            <div class="card-header py-3">
                <div class="card-title align-items-start flex-column">
                    <h3 class="card-label font-weight-bolder text-dark">Change Password</h3>
                    <span class="text-muted font-weight-bold font-size-sm mt-1">Change your account password</span>
                </div>
                <div class="card-toolbar">
                    <button type="submit" class="btn btn-success mr-2">Save Changes</button>
                </div>
            </div>
            <!--end::Header-->
            <!--begin::Form-->
                <div class="card-body">
                    <!--end::Alert-->
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label text-alert">Current Password</label>
                        <div class="col-lg-9 col-xl-6">
                            <input type="password" name="CurrentPassword" class="form-control form-control-lg form-control-solid mb-2" value="" placeholder="Current password" />
                            <a href="#" class="text-sm font-weight-bold">Forgot password ?</a>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label text-alert">New Password</label>
                        <div class="col-lg-9 col-xl-6">
                            <input type="password" name="NewPassword" class="form-control form-control-lg form-control-solid" value="" placeholder="New password" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label text-alert">Verify Password</label>
                        <div class="col-lg-9 col-xl-6">
                            <input type="password"  name="ConfirmPassword" class="form-control form-control-lg form-control-solid" value="" placeholder="Verify password" />
                        </div>
                    </div>

                </div>
        </div>
     </form>
    </div>
</div>
    @include("admin.dashboard.footer")
@endsection
