<div class="form-group {{ $errors->has('store_id') ? 'has-error' : ''}}">
    <label for="store_id" class="control-label">{{ 'Store' }}</label>
    <select name="store_id" class="form-control" id="store_id">
        <option value="">Select Store</option>
        @foreach ($stores as $store)
        <option value="{{ $store->id }}">{{ $store->store_name }}</option>
        @endforeach
    </select>
    {!! $errors->first('product_id', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('product_id') ? 'has-error' : ''}}">
    <label for="product_id" class="control-label">{{ 'Product Id' }}</label>
    <select name="product_id" class="form-control" id="product_id">
    </select>
    {!! $errors->first('product_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('product_code') ? 'has-error' : ''}}">
    <label for="product_code" class="control-label">{{ 'Product Code' }}</label>
    <input class="form-control" name="product_code" type="text" id="product_code"
        value="{{ isset($productdetail->product_code) ? $productdetail->product_code : ''}}">
    {!! $errors->first('product_code', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('details') ? 'has-error' : ''}}">
    <label for="details" class="control-label">{{ 'Details' }}</label>
    <input class="form-control" name="details" type="text" id="details"
        value="{{ isset($productdetail->details) ? $productdetail->details : ''}}">
    {!! $errors->first('details', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('category_id') ? 'has-error' : ''}}">
    <label for="category_id" class="control-label">{{ 'Category Id' }}</label>
    <select name="category_id" class="form-control" id="category_id">
        <option value="">Select Category</option>
        @foreach ($cats as $cat)
        <option value="{{ $cat->id }}"
            {{ (isset($productdetail->category_id) && $productdetail->category_id === $cat->id) ? 'selected' : ''}}>
            {{ $cat->cat_name }}</option>
        @endforeach
    </select>
    {!! $errors->first('category_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('stock_unit') ? 'has-error' : ''}}">
    <label for="stock_unit" class="control-label">{{ 'Stock Unit' }}</label>
    <input class="form-control" name="stock_unit" type="number" id="stock_unit"
        value="{{ isset($productdetail->stock_unit) ? $productdetail->stock_unit : ''}}">
    {!! $errors->first('stock_unit', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('price') ? 'has-error' : ''}}">
    <label for="price" class="control-label">{{ 'Price' }}</label>
    <input class="form-control" name="price" type="number" id="price"
        value="{{ isset($productdetail->price) ? $productdetail->price : ''}}">
    {!! $errors->first('price', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('discount') ? 'has-error' : ''}}">
    <label for="discount" class="control-label">{{ 'Discount' }}</label>
    <input class="form-control" name="discount" type="number" id="discount"
        value="{{ isset($productdetail->discount) ? $productdetail->discount : ''}}">
    {!! $errors->first('discount', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('discount_start') ? 'has-error' : ''}}">
    <label for="discount_start" class="control-label">{{ 'Discount Start' }}</label>
    <input class="form-control" name="discount_start" type="date" id="discount_start"
        value="{{ isset($productdetail->discount_start) ? $productdetail->discount_start : ''}}">
    {!! $errors->first('discount_start', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('discount_end') ? 'has-error' : ''}}">
    <label for="discount_end" class="control-label">{{ 'Discount End' }}</label>
    <input class="form-control" name="discount_end" type="date" id="discount_end"
        value="{{ isset($productdetail->discount_end) ? $productdetail->discount_end : ''}}">
    {!! $errors->first('discount_end', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('price_type_id') ? 'has-error' : ''}}">
    <label for="price_type_id" class="control-label">{{ 'Price Type Id' }}</label>
    <select name="price_type_id" class="form-control" id="price_type_id">
        <option value="">Select Pricing Type</option>
        @foreach ($pricingTypes as $pricetype)
        <option value="{{ $pricetype->id }}"
            {{ (isset($productdetail->price_type_id) && $productdetail->price_type_id === $pricetype->id) ? 'selected' : ''}}>
            {{ $pricetype->type_name }}</option>
        @endforeach
    </select>
    {!! $errors->first('price_type_id', '<p class="help-block">:message</p>') !!}
</div>




<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
@push('custom-scripts')
<script src="{{asset('prd_det.js')}}"></script>
@endpush