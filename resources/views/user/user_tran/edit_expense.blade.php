    {{-- เลือกรายรับ-รายจ่าย --}}
   
    <div class="form-group {{ $errors->has('category_type') ? 'has-error' : ''}}">
        <label for="category_type" class="control-label">{{ 'ประเภท' }}</label>
        <select name="category_type" class="form-control" id="category_type" disabled>
        @foreach (json_decode('{"รายจ่าย":"รายจ่าย"}', true) as $optionKey => $optionvalue)
            <option value="{{ $optionKey }}" {{ (isset($transaction->category_type) && $transaction->category_type == $optionKey) ? 'selected' : ''}}>{{ $optionvalue }}</option>
        @endforeach
    </select>
        {!! $errors->first('category_type', '<p class="help-block">:message</p>') !!}
    </div>
    


    <div class="form-group {{ $errors->has('category_id') ? 'has-error' : ''}}">
        <label for="input_category" class="control-label">{{ 'หมวดหมู่ของรายการ' }}<font size="2" color="#FF0000">*</font></label>
        <select id="input_category" name="category_id" class="form-control" required>
        <option value="" selected disabled>กรุณาเลือกหมวดหมู่</option>
        </select>
    </div>

    <div class="form-group {{ $errors->has('comment') ? 'has-error' : ''}}">
        <label for="comment" class="control-label">{{ 'รายละเอียด' }}</label>
        <input class="form-control" rows="5" name="comment" type="text" id="comment" placeholder="คำอธิบายหรือหมายเหตุเพิ่มเติม" value="{{ isset($transaction->comment) ? $transaction->comment : ''}}">{!! $errors->first('comment', '<p class="help-block">:message</p>') !!}
    </div>


    <div id="exp" style="display: block" class="form-group {{ $errors->has('expense') ? 'has-error' : ''}}">
        <label for="expense" class="control-label">{{ 'จำนวนเงิน' }}</label>
        <input class="form-control" name="expense" type="number" pattern="[0-9]+([,\.][0-9]+)?" step="0.01" placeholder="0.00" value="{{ isset($transaction->expense) ? $transaction->expense : ''}}" >               
        {!! $errors->first('expense', '<p class="help-block">:message</p>') !!}
    </div>

    <div class="form-group">
        <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'อัพเดท' : 'Create' }}">
    </div>
    
<script>
        document.addEventListener('DOMContentLoaded', (event) => {
            console.log("START");
            showTopicExpense();  
        });



        //ฟังก์ชันShow-Hide -----select = รายรับ->แสดงช่องบันทึกรายรับ, select = รายจ่าย->แสดงช่องบันทึกรายจ่าย
        document.getElementById('category_type').addEventListener("change", function(e) {
            if (e.target.value === 'รายรับ') {
                document.getElementById('exp').style.display = 'none';
                document.getElementById('inc').style.display = 'block';
                showTopicIncome();
            } else {
                document.getElementById('inc').style.display = 'none';
                document.getElementById('exp').style.display = 'block'
                showTopicExpense();
            }
        });
        
        function showTopicIncome(){
            //PARAMETERS
            fetch("{{ url('/') }}/api/category_income")
                .then(response => response.json())
                .then(result => {
                    console.log(result);
                    //UPDATE SELECT OPTION
                    let input_category = document.querySelector("#input_category");
                    input_category.innerHTML = '<option value="" selected disabled>กรุณาเลือกหมวดหมู่</option>';
                    for (let item of result) {
                        let option = document.createElement("option");
                        option.text = item.topic;
                        option.value = item.category_id;
                        input_category.appendChild(option);
                    }
                });
        }
    
        function showTopicExpense(){
            //PARAMETERS
            fetch("{{ url('/') }}/api/category_expense")
                .then(response => response.json())
                .then(result => {
                    console.log(result);
                    //UPDATE SELECT OPTION
                    let input_category = document.querySelector("#input_category");
                    input_category.innerHTML = '<option value="" selected disabled>กรุณาเลือกหมวดหมู่</option>';
                    for (let item of result) {
                        let option = document.createElement("option");
                        option.text = item.topic;
                        option.value = item.category_id;
                        input_category.appendChild(option);
                    }
                });
        }

</script>

