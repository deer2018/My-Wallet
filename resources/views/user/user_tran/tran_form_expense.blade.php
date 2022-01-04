<div class="form-group {{ $errors->has('category') ? 'has-error' : ''}}">
    <label for="category" class="control-label">{{ 'หมวดหมู่' }}</label>
    <select name="category" class="form-control" id="category" >
    @foreach (json_decode('{"รายจ่าย":"รายจ่าย"}', true) as $optionKey => $optionValue)
        <option value="{{ $optionKey }}" {{ (isset($category->type) && $category->type == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
    @endforeach
</select>
    {!! $errors->first('category', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('topic') ? 'has-error' : ''}}">
    <label for="topic" class="control-label">{{ 'ชื่อหมวดหมู่' }}</label>
    <select name="topic" class="form-control" id="topic" >
    @foreach (json_decode('{"ค่าเช่าหอ":"ค่าเช่าหอ","ค่าอาหาร":"ค่าอาหาร"}', true) as $optionKey => $optionValue)
        <option value="{{ $optionKey }}" {{ (isset($category->topic) && $category->topic == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
    @endforeach
</select>
    {!! $errors->first('category', '<p class="help-block">:message</p>') !!}
</div>

{{-- <div class="form-group {{ $errors->has('topic') ? 'has-error' : ''}}">
    <label for="topic" class="control-label">{{ 'ชื่อหมวดหมู่' }}</label>
    <input class="form-control" name="topic" type="text" id="topic" value="{{ isset($category->topic) ? $category->topic : ''}}" >
    {!! $errors->first('topic', '<p class="help-block">:message</p>') !!}
</div> --}}

<div class="form-group {{ $errors->has('comment') ? 'has-error' : ''}}">
    <label for="comment" class="control-label">{{ 'รายละเอียด' }}</label>
    <textarea class="form-control" rows="5" name="comment" type="text" id="comment" value="{{ isset($transaction->comment) ? $transaction->comment : ''}}">{!! $errors->first('comment', '<p class="help-block">:message</p>') !!}</textarea>
</div>


<div class="form-group {{ $errors->has('expense') ? 'has-error' : ''}}">
    <label for="expense" class="control-label">{{ 'จำนวนเงิน' }}</label>
    <input class="form-control" name="expense" type="number" id="expense" value="{{ isset($transaction->expense) ? $transaction->expense : ''}}" >
    {!! $errors->first('expense', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'อัพเดท' : 'Create' }}">
</div>
