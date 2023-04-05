@include("admin.dashboard.layouts.main")
@include('admin.dashboard.layouts.topvend')
@include('admin.dashboard.layouts.Subheader')
<script src="{{asset('asset/js/script.js')}}">

</script>

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
                        <form class="form kt_form_1"  action="{{route('addProduct')}}" method="post"  enctype="multipart/form-data"  id="addForm">
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    @csrf

                                    <label class="required fw-bold fs-6 mb-2">Product Name:</label>
                                    <input type="text" name="ProductName"  class="form-control" placeholder="Enter Product name" />
                                    @if($errors->has('ProductName'))
                                        <div class="error text-danger">{{ $errors->first('ProductName') }}</div>
                                    @endif
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Product Price:</label>
                                        <input type="text"  name="productPrice" class="form-control form-control-sm" placeholder="Enter Product Price" />
                                        @if($errors->has('productPrice'))
                                            <div class="error text-danger">{{ $errors->first('productPrice') }}</div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label for="exampleTextarea">Detail:</label>
                                    <textarea class="form-control"  name="productDetail" id="exampleTextarea" rows="3"></textarea>
                                    @if($errors->has('productDetail'))
                                        <div class="error text-danger">{{ $errors->first('productDetail') }}</div>
                                    @endif
                                </div>
                                <div class="col-lg-6">
                                        <label for="categoriesId" class="control-label">Categories:</label>
                                        <select name="categoriesId" class="form-control" id="categoriesId">
                                            <option value="categoriesId">Select Category</option>
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
                                <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Product Code:</label>
                                            <input type="text"  name="productCode" class="form-control form-control-sm" placeholder="Enter Product Code" />
                                            @if($errors->has('productCode'))
                                                <div class="error text-danger">{{ $errors->first('productCode') }}</div>
                                            @endif
                                        </div>
                                </div>
                                <div class="col-lg-6">
                                    <label class="control-label">Product Images:</label>
                                    <div class="custom-file">
                                        <div id="filediv">
                                        <input name="file[]" type="file" multiple="multiple" class="custom-file-input"  id="files customFile">
                                        <label class="custom-file-label" for="customFile">Choose max 3 file</label>
                                            <input type="button" id="add_more" class="upload" value="Add More Files"/>
                                            @if($errors->has('file'))
                                                <div class="error text-danger">{{ $errors->first('file') }}</div>
                                            @endif
                                        </div>
                                     </div>
                                </div>
                            </div>

                            <div id="attributes">
                                <!--begin::Form group-->
                                <div class="form-group row">
                                    <div data-repeater-list="attributes">
                                        <div data-repeater-item class="form-group row">
                                            <div class="col-md-6">
                                                <label class="form-label">Attributes Name</label>
                                                <input type="text"  name="attributeName" class="form-control" placeholder="Enter attribute " />
                                            </div>
                                            <div class="col-md-6">
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

                            <div id="productdetail">
                                <!--begin::Form group-->
                                <div class="form-group row">
                                    <div data-repeater-list="productdetail">
                                        <div data-repeater-item class="form-group row">
                                            <div class="col-md-4">
                                                <label class="form-label">First Modifier:</label>
                                                <input type="text"  name="Modifier1" class="form-control" placeholder="Enter first Modifier " />
                                                @if($errors->has('Modifier1'))
                                                    <div class="error text-danger">{{ $errors->first('Modifier1') }}</div>
                                                @endif
                                            </div>
                                            <div class="col-md-4">
                                                <label class="form-label">Second Modifier:</label>
                                                <input type="text"  name="Modifier2" class="form-control" placeholder="Enter second  Modifier " />
                                                @if($errors->has('Modifier2'))
                                                    <div class="error text-danger">{{ $errors->first('Modifier2') }}</div>
                                                @endif
                                            </div>
                                            <div class="col-md-4">
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

    $('#attributes').repeater({
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
