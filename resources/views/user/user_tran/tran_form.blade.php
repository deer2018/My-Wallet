<div class="form-group {{ $errors->has('category_type') ? 'has-error' : ''}}">
    <label for="category_type" class="control-label">{{ 'หมวดหมู่' }}</label>
    <select name="category_type" class="form-control" id="category_type" >
    @foreach (json_decode('{"รายรับ":"รายรับ","รายจ่าย":"รายจ่าย"}', true) as $optionKey => $optionValue)
        <option value="{{ $optionKey }}" {{ (isset($transaction->category_type) && $transaction->category_type == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
    @endforeach
</select>
    {!! $errors->first('category_type', '<p class="help-block">:message</p>') !!}
</div>

{{-- <div class="form-group {{ $errors->has('transaction') ? 'has-error' : ''}}">
    <label for="transaction" class="control-label">{{ 'ชื่อหมวดหมู่' }}</label>
    <select name="transaction" class="form-control" id="transaction" >
    @foreach (json_decode('{"ค่าเช่าหอ":"ค่าเช่าหอ","ค่าอาหาร":"ค่าอาหาร"}', true) as $optionKey => $optionValue)
        <option value="{{ $optionKey }}" {{ (isset($transaction->category_type) && $transaction->category_type == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
    @endforeach
</select>
    {!! $errors->first('category', '<p class="help-block">:message</p>') !!}
</div> --}}

{{-- <div class="form-group {{ $errors->has('topic') ? 'has-error' : ''}}">
    <label for="topic" class="control-label">{{ 'ชื่อหมวดหมู่' }}</label>
    <input class="form-control" name="topic" type="text" id="topic" value="{{ isset($category->topic) ? $category->topic : ''}}" >
    {!! $errors->first('topic', '<p class="help-block">:message</p>') !!}
</div> --}}

<div class="form-group {{ $errors->has('comment') ? 'has-error' : ''}}">
    <label for="comment" class="control-label">{{ 'รายละเอียด' }}</label>
    <input class="form-control" rows="5" name="comment" type="text" id="comment" value="{{ isset($transaction->comment) ? $transaction->comment : ''}}">{!! $errors->first('comment', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group {{ $errors->has('value') ? 'has-error' : ''}}">
    <label for="value" class="control-label">{{ 'จำนวนเงิน' }}</label>
    <input class="form-control" name="value" type="number" id="value" value="{{ isset($transaction->value) ? $transaction->value : ''}}" >
    {!! $errors->first('value', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'อัพเดท' : 'Create' }}">
</div>
