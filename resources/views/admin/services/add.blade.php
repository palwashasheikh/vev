@include("admin.dashboard.layouts.main")
<div id="servicesList">
    @include('admin.dashboard.layouts.topvend')
    @include('admin.dashboard.layouts.Subheader')

    <div class="d-flex flex-column-fluid">
    <div class="container">
        <div class="row">
            @if ($errors->any())
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
            <div class="col-lg-12">
                <div class="card card-custom gutter-b example example-compact">
                    <div class="card-header">
                        <h1 class="card-title"> Create New Service
                        </h1>
                    </div>
                    <div class="card-body">
                        <form class="form kt_form_1" action="{{route('saveService')}}" method="post"  enctype="multipart/form-data" >
                            {{ csrf_field() }}
                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <label class="required fw-bold fs-6 mb-2">Service Name:</label>
                                        <input type="text" name="serviceName"  class="form-control" placeholder="Enter service name" />
                                        @if($errors->has('serviceName'))
                                            <div class="error text-danger">{{ $errors->first('serviceName') }}</div>
                                        @endif
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Service Code:</label>
                                            <input type="text"  name="serviceCode" class="form-control form-control-sm" placeholder="Service Code" />
                                            @if($errors->has('serviceCode'))
                                                <div class="error text-danger">{{ $errors->first('serviceCode') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            <div class="form-group row">
                                <div class="col-lg-6">
                                <label for="exampleTextarea">Detail:</label>
                                <textarea class="form-control"  name="serviceDetail" id="exampleTextarea" rows="3"></textarea>
                                    @if($errors->has('serviceDetail'))
                                        <div class="error text-danger">{{ $errors->first('serviceDetail') }}</div>
                                    @endif
                                </div>
                                <div class="col-lg-6">
                                <div class="form-group {{ $errors->has('categoriesId') ? 'has-error' : ''}}">
                                    <label for="categoriesId" class="control-label">{{ 'categoriesId' }}</label>
                                    <select name="categoriesId" class="form-control" id="categoriesId" >
                                        <option value="categoriesId">Select Category</option>
                                        @foreach ($servicesCat as $cat)
                                            <option value="{{$cat->categoriesId}}">{{ $cat->categoriesName }}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('categoriesId'))
                                        <div class="error text-danger">{{ $errors->first('categoriesId') }}</div>
                                    @endif
                                </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-12">
                                    <div class="form-group row">
                                        <label class="col-form-label mt-9">Services Images:</label>
                                        <div class="col-lg-6 col-md-9 col-sm-12">
                                            <div class="uppy" id="kt_uppy_3">
                                                <div class="uppy-drag"></div>
                                                <div class="uppy-informer"></div>
                                                <div class="uppy-progress"></div>
                                                <div class="uppy-thumbnails"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

  <div id="servicedetail">
    <!--begin::Form group-->
    <div class="form-group row">
        <div data-repeater-list="servicedetail">
            <div data-repeater-item class="form-group row">
                <div class="col-md-3">
                    <label class="form-label">Date:</label>
                    <input type="date"  name="date" class="form-control mb-2 mb-md-0" placeholder="Enter Date" />
                </div>
                <div class="col-md-3">
                    <label class="form-label">Duration:</label>
                    <input type="text"  name="duration" class="form-control mb-2 mb-md-0" placeholder="Enter Duration" />
                </div>
                 <div class="col-md-3">
                    <label class="form-label">Price:</label>
                    <input type="number"  name="price" class="form-control mb-2 mb-md-0" placeholder="Enter Price" />
                </div>
                <div class="col-md-3">
                    <a href="javascript:;" data-repeater-delete class="btn btn-sm btn-light-danger mt-3 mt-md-8">
                        <i class="la la-trash-o"></i>Delete
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="form-group mt-5">
        <a href="javascript:;" data-repeater-create class="btn btn-light-primary">
            <i class="la la-plus"></i>Add
        </a>
    </div>
</div>
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <script type="text/javascript">


$('#servicedetail').repeater({
    initEmpty: false,

    defaultValues: {
        'text-input': 'foo'
    },

    show: function () {
        $(this).slideDown();
    },

    hide: function (deleteElement) {
        $(this).slideUp(deleteElement);
    }
});
    </script>



@include("admin.dashboard.footer")
