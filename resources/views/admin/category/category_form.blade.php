<div class="form-group {{ $errors->has('type') ? 'has-error' : ''}}">
    <label for="type" class="control-label">{{ 'ประเภท' }}</label>
    <select name="type" class="form-control" id="type" >
    @foreach (json_decode('{"รายรับ":"รายรับ","รายจ่าย":"รายจ่าย"}', true) as $optionKey => $optionValue)
        <option value="{{ $optionKey }}" {{ (isset($category->type) && $category->type == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
    @endforeach
</select>
    {!! $errors->first('category', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('topic') ? 'has-error' : ''}}">
    <label for="topic" class="control-label">{{ 'ชื่อหมวดหมู่' }}</label>
    <input class="form-control" rows="5" name="topic" type="text" id="topic" value="{{ isset($category->topic) ? $category->topic : ''}}">
    {!! $errors->first('topic', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'อัพเดท' : 'Create' }}">
</div>
