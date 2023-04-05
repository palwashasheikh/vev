@include("admin.dashboard.layouts.main")
@include('admin.dashboard.layouts.topvend')
@include('admin.dashboard.layouts.Subheader')

<div class="d-flex flex-column-fluid">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-custom gutter-b example example-compact">
                    <div class="card-header">
                        <h1 class="card-title"> Create New Products
                        </h1>
                    </div>
                    <div class="card-body">
                        <form class="form kt_form_1"  action="{{route('addProduct')}}" method="post"  enctype="multipart/form-data">
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    @csrf

                                    <label class="required fw-bold fs-6 mb-2">Product Name:</label>
                                    <input type="text" name="ProductName"  value="{{$row->name}}" class="form-control" placeholder="Enter Product name" />
                                    @if($errors->has('ProductName'))
                                        <div class="error text-danger">{{ $errors->first('ProductName') }}</div>
                                    @endif
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Product Price:</label>
                                        <input type="text"  name="productPrice" value="{{$row->price}}" class="form-control form-control-sm" placeholder="Enter Product Price" />
                                        @if($errors->has('productPrice'))
                                            <div class="error text-danger">{{ $errors->first('productPrice') }}</div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label for="exampleTextarea">Detail:</label>
                                    <textarea class="form-control"  name="productDetail" value="{{$row->detail}}" id="exampleTextarea" rows="3"></textarea>
                                    @if($errors->has('productDetail'))
                                        <div class="error text-danger">{{ $errors->first('productDetail') }}</div>
                                    @endif
                                </div>
                                <div class="col-lg-6">
                                    <label for="categoriesId" class="control-label">Categories:</label>
                                    <select name="categoriesId" class="form-control" value="" id="categoriesId">
                                        <option value="{{$row->categoriesId}}">Select Category</option>
                                        @foreach ($prductsCat as $cat)
                                            <option value="{{$cat->categoriesId}}">{{ $cat->categoriesName }}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('categoriesId'))
                                        <div class="error text-danger">{{ $errors->first('categoriesId') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-12">
                                    <div class="form-group row">
                                        <label class="col-form-label mt-9">Products Images:</label>
                                        <div class="col-lg-6 col-md-9 col-sm-12">
                                            <div class="fv-row">
                                                <!--begin::Dropzone-->
                                                <div class="dropzone" id="kt_dropzonejs_example_1">
                                                    <!--begin::Message-->
                                                    <div class="dz-message needsclick">
                                                        <i class="bi bi-file-earmark-arrow-up text-primary fs-3x"></i>
                                                        <div class="ms-4">
                                                            <h3 class="m-dropzone__msg-title">Drop files here or click to upload.</h3>
                                                            <span class="m-dropzone__msg-desc">Only "jpg|jpeg|gif|png|bmp" files extension's are allowed for upload</span>
                                                        </div>
                                                        <!--end::Info-->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div id="productdetail">
                                <!--begin::Form group-->
                                <div class="form-group row">
                                    <div data-repeater-list="productdetail">
                                        <div data-repeater-item class="form-group row">
                                            <div class="col-md-3">
                                                <label class="form-label">Color:</label>
                                                <input  type="text" value="{{$row->Value}}"  name="color" class="form-control mb-2 mb-md-0" placeholder="Enter Color" />
                                            </div>
                                            <div class="col-md-3">
                                                <label class="form-label">Size:</label>
                                                <input type="number"  value="{{$row->Value}}" name="size" class="form-control mb-2 mb-md-0" placeholder="Enter Size    " />
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
<script>






    $('#productdetail').repeater({
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
