<div class="form-group {{ $errors->has('attr_name') ? 'has-error' : ''}}">
    <label for="attr_name" class="control-label">{{ 'Attribute Name' }}</label>
    <input class="form-control" name="attr_name" type="text" id="attr_name" value="{{ isset($attribute->attr_name) ? $attribute->attr_name : ''}}" >
    {!! $errors->first('attr_name', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
