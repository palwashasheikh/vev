<div class="form-group {{ $errors->has('type_name') ? 'has-error' : ''}}">
    <label for="type_name" class="control-label">{{ 'Name' }}</label>
    <input class="form-control" name="type_name" type="text" id="type_name" value="{{ isset($pricingtype->type_name) ? $pricingtype->type_name : ''}}" >
    {!! $errors->first('type_name', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
