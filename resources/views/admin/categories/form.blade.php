<div class="form-group {{ $errors->has('cat_name') ? 'has-error' : ''}}">
    <label for="cat_name" class="control-label">{{ 'Category Name' }}</label>
    <input class="form-control" name="cat_name" type="text" id="cat_name" value="{{ isset($category->cat_name) ? $category->cat_name : ''}}" >
    {!! $errors->first('cat_name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('parent_id') ? 'has-error' : ''}}">
    <label for="parent_id" class="control-label">{{ 'Parent Id' }}</label>
    <select name="parent_id" class="form-control" id="parent_id" >
        <option value="">Select Parent Category</option>
    @foreach ($cats as $cat)
        <option value="{{ $cat->id }}" {{ (isset($category->parent_id) && $category->parent_id === $cat->id) ? 'selected' : ''}}>{{ $cat->cat_name }}</option>
    @endforeach
</select>
    {!! $errors->first('parent_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('cat_type') ? 'has-error' : ''}}">
    <label for="cat_type" class="control-label">{{ 'Category For' }}</label>
    <select name="cat_type" class="form-control" id="cat_type" >
        <option value="">Select Category for</option>
        <option value="1">Product</option>
        <option value="0">Services</option>
    </select>
    {!! $errors->first('cat_type', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
