<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">{{ 'Name' }}</label>
    <input class="form-control" name="name" type="text" id="name" value="{{ isset($menu->name) ? $menu->name : ''}}" >
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('user_id') ? 'has-error' : ''}}">
    <label for="user_id" class="control-label">{{ 'User Id' }}</label>
    <select name="user_id" class="form-control" id="user_id" >
        <option value="">Select User</option>
    @foreach ($users as $user)
        <option value="{{ $user->id }}" {{ (isset($menu->user_id) && $menu->user_id === $user->user_id) ? 'selected' : ''}}>{{ $user->name }}</option>
    @endforeach
</select>
    {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('parent_id') ? 'has-error' : ''}}">
    <label for="parent_id" class="control-label">{{ 'Parent Id' }}</label>
    <select name="parent_id" class="form-control" id="parent_id" >
        <option value="">Select Parent Menu</option>
    @foreach ($menus as $menu)
        <option value="{{ $menu->id }}" {{ (isset($menu->parent_id) && $menu->parent_id === $menu->id) ? 'selected' : ''}}>{{ $menu->name }}</option>
    @endforeach
</select>
    {!! $errors->first('parent_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('menu_link') ? 'has-error' : ''}}">
    <label for="menu_link" class="control-label">{{ 'Menu Link' }}</label>
    <input class="form-control" name="menu_link" type="text" id="menu_link" value="{{ isset($menu->menu_link) ? $menu->menu_link : ''}}" >
    {!! $errors->first('menu_link', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
