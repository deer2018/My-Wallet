<div class="form-group {{ $errors->has('detail') ? 'has-error' : ''}}">
    <label for="detail" class="control-label">{{ 'รายละเอียด' }}</label>
    <input class="form-control" rows="5" name="detail" type="text" id="detail" placeholder="คำอธิบายหรือหมายเหตุเพิ่มเติม" value="{{ isset($detail->detail) ? $detail->detail : ''}}">{!! $errors->first('comment', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group">
    <input class="btn btn-primary" type="submit" >
</div>