<div class="form-group {{ $errors->has('category_type') ? 'has-error' : ''}}">
    <label for="category_type" class="control-label">{{ 'หมวดหมู่' }}</label>
    <select name="category_type" class="form-control" id="category_type" >
    @foreach (json_decode('{"รายรับ":"รายรับ","รายจ่าย":"รายจ่าย"}', true) as $optionKey => $optionvalue)
        <option value="{{ $optionKey }}" {{ (isset($transaction->category_type) && $transaction->category_type == $optionKey) ? 'selected' : ''}}>{{ $optionvalue }}</option>
    @endforeach
</select>
    {!! $errors->first('category_type', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('comment') ? 'has-error' : ''}}">
    <label for="comment" class="control-label">{{ 'รายละเอียด' }}</label>
    <input class="form-control" rows="5" name="comment" type="text" id="comment" placeholder="คำอธิบายหรือหมายเหตุเพิ่มเติม" value="{{ isset($transaction->comment) ? $transaction->comment : ''}}">{!! $errors->first('comment', '<p class="help-block">:message</p>') !!}
</div>


    <div id="inc" class="form-group {{ $errors->has('income') ? 'has-error' : ''}}">
        <label for="income" class="control-label">{{ 'จำนวนเงิน' }}</label>
        <input class="form-control" name="income" type="number" pattern="[0-9]+([,\.][0-9]+)?" step="0.01" placeholder="0.00" id="income" value="{{ isset($transaction->income) ? $transaction->income : ''}}" >
        {!! $errors->first('income', '<p class="help-block">:message</p>') !!}
    </div>

    <div id="exp" style="display: none;" class="form-group  {{ $errors->has('expense') ? 'has-error' : ''}}">
        <label for="expense" class="control-label">{{ 'จำนวนเงิน' }}</label>
        <input class="form-control" name="expense" type="number" pattern="[0-9]+([,\.][0-9]+)?" step="0.01" placeholder="0.00" id="expense" value="{{ isset($transaction->expense) ? $transaction->expense : ''}}" >
        {!! $errors->first('expense', '<p class="help-block">:message</p>') !!}
    </div>

<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'อัพเดท' : 'Create' }}">
</div>


<script>
    //ฟังก์ชันShow-Hide -----select = รายรับ->แสดงช่องบันทึกรายรับ, select = รายจ่าย->แสดงช่องบันทึกรายจ่าย
document.getElementById('category_type').addEventListener("change", function (e) {
    if (e.target.value === 'รายรับ') {
        document.getElementById('exp').style.display = 'none';
        document.getElementById('inc').style.display = 'block';
    } else {
        document.getElementById('inc').style.display = 'none';
        document.getElementById('exp').style.display = 'block'
    }
});
</script>