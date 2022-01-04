<div class="form-group {{ $errors->has('category') ? 'has-error' : ''}}">
    <label for="category" class="control-label">{{ 'หมวดหมู่' }}</label>
    <select name="category" class="form-control" id="category" >
    @foreach (json_decode('{"รายรับ":"รายรับ"}', true) as $optionKey => $optionValue)
        <option value="{{ $optionKey }}" {{ (isset($category->type) && $category->type == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
    @endforeach
</select>
    {!! $errors->first('category', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('topic') ? 'has-error' : ''}}">
    <label for="topic" class="control-label">{{ 'หมวดหมู่' }}</label>
    <select name="topic" class="form-control" id="topic" >
    @foreach (json_decode('{"เงินเดือน":"เงินเดือน","ได้รับมา":"ได้รับมา"}', true) as $optionKey => $optionValue)
        <option value="{{ $optionKey }}" {{ (isset($category->topic) && $category->topic == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
    @endforeach
</select>
    {!! $errors->first('topic', '<p class="help-block">:message</p>') !!}
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


<div class="form-group {{ $errors->has('income') ? 'has-error' : ''}}">
    <label for="income" class="control-label">{{ 'จำนวนเงิน' }}</label>
    <input class="form-control" name="income" type="number" id="income" value="{{ isset($income->income) ? $transaction->income : ''}}" >
    {!! $errors->first('income', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'อัพเดท' : 'Create' }}">
</div>
