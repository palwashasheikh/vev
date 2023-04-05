@include("admin.dashboard.layouts.main")
@include('admin.dashboard.layouts.topvend')
@include('admin.dashboard.layouts.Subheader')

<div class="d-flex flex-column-fluid">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                @if (Session::has('success'))
                    <div class="alert alert-success">
                        <ul>
                            <li>{!! Session::get('success') !!}</li>
                        </ul>
                    </div>
                @endif
                <div class="card card-custom gutter-b example example-compact">
                    <div class="card-header">
                        <h1 class="card-title"> Create New Store
                        </h1>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('createStore' ) }}" accept-charset="UTF-8" class="form kt_form_1" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group row">
                                <div id="googleMap" style="width:100%;height:400px;">
                                </div>
                                <input type="hidden" id="mlat" name="mlat" value="{{$row->lat}}">
                                <input type="hidden" id="mlong" name="mlong"value="{{$row->lng}}">
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label for="store_name" class="control-label">{{ 'Store Name' }}</label>
                                    <input class="form-control" name="store_name" type="text" id="store_name" value="{{$row->store_name}}" >
                                    @if($errors->has('store_name'))
                                        <div class="error text-danger">{{ $errors->first('store_name') }}</div>
                                    @endif
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="address"  class="control-label">{{ 'Store Address' }}</label>
                                        <input class="form-control"  id="location-text-box" name="store_address"   value="{{$row->store_address}}"  type="text" >
                                        @if($errors->has('store_address'))
                                            <div class="error text-danger">{{ $errors->first('store_address') }}</div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label for="store_detail" class="control-label">{{ 'Store Detail' }}</label>
                                    <textarea class="form-control" name="store_detail" type="text"  id="store_detail" value="" >
                                        {{$row->storedetail}}
                 </textarea>
                                    @if($errors->has('store_detail'))
                                        <div class="error text-danger">{{ $errors->first('store_detail') }}</div>
                                    @endif
                                </div>
                                <div class="col-lg-6">
                                    <label for="storetype" class="control-label">{{ 'Store Type' }}</label>
                                    <select name="storetype" class="form-control" id="storetype" >
                                        <option value="{{isset($row->storeType) ? $row->storeType : 'Select Category' }}">Select Category</option>
                                        <option value="{{isset($row->storeType) ? $row->storeType : 'product'}}">product</option>
                                        <option value="{{isset($row->storeType) ? $row->storeType : 'services'}}">services</option>
                                    </select>
                                    @if($errors->has('storetype'))
                                        <div class="error text-danger">{{ $errors->first('storetype') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label for="userid" class="control-label">{{ 'Users' }}</label>
                                    <select name="userid" class="form-control" id="userid" >
                                        <option value="userId">Select User</option>
                                        @foreach ($users as $user)
                                            <option value="{{$user->id}}">{{ $user->user_name }}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('userid'))
                                        <div class="error text-danger">{{ $errors->first('userid') }}</div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label for="store_phone" class="control-label">{{ 'Store Phone' }}</label>
                                    <input class="form-control" name="store_phone" type="text" id="store_phone" value="{{$row->store_phone}}" >
                                    @if($errors->has('store_phone'))
                                        <div class="error text-danger">{{ $errors->first('store_phone') }}</div>
                                    @endif
                                </div>
                                <div class="col-lg-6">
                                    <label for="owner_mobile" class="control-label">{{ 'Mobile' }}</label>
                                    <input class="form-control" name="mobile" type="text" id="owner_mobile" value="{{$row->mobile}}" >
                                    @if($errors->has('mobile'))
                                        <div class="error text-danger">{{ $errors->first('mobile') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-6 col-xl-6">
                                    <label class="col-xl-3 col-lg-3 col-form-label ">Store Logo:</label>
                                    <div class="image-input image-input-outline image-input-circle" id="kt_image_3">
                                        <div class="image-input-wrapper" style="background-image: url(<?php echo asset('vev/content/stores/logo.png')?>)"></div>
                                        <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change avatar">
                                            <i class="fa fa-pen icon-sm text-muted"></i>
                                            <input type="file" name="storeLogo"  value="{{asset($row->logo)}}" accept=".png, .jpg, .jpeg" />
                                            <input type="hidden" name="profile_avatar_remove" />
                                        </label>
                                        <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="Cancel avatar">
															<i class="ki ki-bold-close icon-xs text-muted"></i>
														</span>
                                    </div>
                                    <span class="form-text text-muted">Allowed file types: png, jpg, jpeg.</span>
                                    @if($errors->has('storeLogo'))
                                        <div class="error text-danger">{{ $errors->first('storeLogo') }}</div>
                                    @endif

                                </div>
                                <div class="col-lg-6 col-xl-6">
                                    <label class="col-xl-3 col-lg-3 col-form-label ">Store Banner:</label>
                                    <div class="image-input image-input-outline" id="kt_image_1">
                                        <div class="image-input-wrapper " style="background-image: url(<?php echo asset('vev/content/stores/banner-default.jpg')?>); width: 600px;height: 200px"></div>
                                        <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change avatar">
                                            <i class="fa fa-pen icon-sm text-muted"></i>
                                            <input type="file" name="storeBanner" accept=".png, .jpg, .jpeg" />
                                            <input type="hidden" name="profile_avatar_remove" />
                                        </label>
                                        <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="Cancel avatar">
															<i class="ki ki-bold-close icon-xs text-muted"></i>
														</span>
                                    </div>
                                    <span class="form-text text-muted">Allowed file types: png, jpg, jpeg.</span>
                                    @if($errors->has('storeBanner'))
                                        <div class="error text-danger">{{ $errors->first('storeBanner') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function myMap() {
        window.onload = function () {
            const LAT =  55.270783;
            const LONG = 25.204849;
            var myLatlng = new google.maps.LatLng(LONG, LAT);
            var mapOptions = {
                center: myLatlng,
                zoom: 4,
                mapTypeId: google.maps.MapTypeId.ROADMAP,
                disableDefaultUI: true,
                zoomControl: true
            };
            var map = new google.maps.Map(document.getElementById("googleMap"), mapOptions);

            var marker = new google.maps.Marker({
                zoom: 13,
                center: myLatlng
            });
            google.maps.event.addListener(map, 'click', function (e) {
                var latlng = new google.maps.LatLng(e.latLng.lat(), e.latLng.lng());
                document.getElementById("mlat").value = e.latLng.lat();
                document.getElementById("mlong").value = e.latLng.lng();
                var geocoder = geocoder = new google.maps.Geocoder();
                console.log(geocoder);
                geocoder.geocode({'latLng': latlng}, function (results, status) {
                    if (status == google.maps.GeocoderStatus.OK) {
                        alert(results[1])
                        if (results[1]) {
                            $("#location-text-box").attr("value", results[1].formatted_address);
                        }
                    }
                });
            });
        }
    }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDfcnExyOHPcBOEbTrEBQO2DWAaE0Anecg&callback=myMap"></script>

@include("admin.dashboard.footer")



