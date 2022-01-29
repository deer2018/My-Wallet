@extends('layouts.user.main')

@section('content')
<div class="card">
<div class="card-header">ประวัติส่วนตัว</div>
<br>
<div class="container bootstrap snippets bootdey">
<div class="panel-body inf-content">
    
    <div class="row">
        
        <div class="col-md-7">
            
            <div class="table-responsive">
            <form method="POST" action="{{ url('/user_personal/' . $User->id) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                        {{ method_field('PATCH') }}
                        {{ csrf_field() }}

                        <div class="form-group {{ $errors->has('student_id') ? 'has-error' : ''}}">
                            <label for="student_id" class="control-label">{{ 'รหัสนักศึกษา' }}<font size="2" color="#FF0000">*</font></label>
                            <input class="form-control" name="student_id" type="text" id="student_id" pattern="[0-9]{11}" value="{{ isset($User->student_id) ? $User->student_id : ''}}" required>
                            {!! $errors->first('student_id', '<p class="help-block">:message</p>') !!}
                        </div>

                        <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">

                            <label for="name" class="control-label">{{ 'ชื่อที่แสดงบนเว็บไซต์' }}<font size="2" color="#FF0000">*</font></label>
                            <input class="form-control" name="name" type="text" id="name" value="{{ isset($User->name) ? $User->name : ''}}" required>
                            {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                        </div>

                        <div class="form-group {{ $errors->has('mastername') ? 'has-error' : ''}}">

                            <label for="mastername" class="control-label">{{ 'ชื่อ' }}<font size="2" color="#FF0000">*</font></label>
                            <input class="form-control" name="mastername" type="text" id="mastername" value="{{ isset($User->mastername) ? $User->mastername : ''}}" required>
                            {!! $errors->first('mastername', '<p class="help-block">:message</p>') !!}
                        </div>

                        <div class="form-group {{ $errors->has('surname') ? 'has-error' : ''}}">
                            <label for="surname" class="control-label">{{ 'นามสกุล' }}<font size="2" color="#FF0000">*</font></label>
                            <input class="form-control" rows="5" name="surname" type="text" id="surname" value="{{ isset($User->surname) ? $User->surname : ''}}" required>
                            {!! $errors->first('surname', '<p class="help-block">:message</p>') !!}
                        </div>

                        <div class="form-group {{ $errors->has('faculty') ? 'has-error' : ''}}">
                            <label for="faculty" class="control-label">{{ 'คณะ' }}</label>
                            <select name="faculty" class="form-control" id="faculty">
                                <option value=""selected disabled>-กรุณาเลือกคณะ-</option>
                                @foreach (json_decode('{"ครุศาสตร์":"ครุศาสตร์","วิทยาการจัดการ":"วิทยาการจัดการ",
                                "วิทยาศาสตร์และเทคโนโลยี":"วิทยาศาสตร์และเทคโนโลยี","เทคโนโลยีอุตสาหกรรม":"เทคโนโลยีอุตสาหกรรม"
                                ,"เทคโนโลยีการเกษตร":"เทคโนโลยีการเกษตร","มนุษยศาสตร์และสังคมศาสตร์":"มนุษยศาสตร์และสังคมศาสตร์"
                                ,"บัณฑิตวิทยาลัย":"บัณฑิตวิทยาลัย","สาธารณสุขศาสตร์":"สาธารณสุขศาสตร์"}', true) as $optionKey => $optionValue)
                                <option value="{{ $optionKey }}" {{ (isset($User->faculty) && $User->faculty == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
                                @endforeach
                            </select>
                            {!! $errors->first('faculty', '<p class="help-block">:message</p>') !!}
                        </div>

                        <div class="form-group {{ $errors->has('age') ? 'has-error' : ''}}">
                            <label for="age" class="control-label">{{ 'อายุ' }}</label>
                            <input class="form-control" name="age" type="number" id="age" value="{{ isset($User->age) ? $User->age : ''}}">
                            {!! $errors->first('age', '<p class="help-block">:message</p>') !!}
                        </div>

                        <div class="form-group {{ $errors->has('phone') ? 'has-error' : ''}}">
                            <label for="phone" class="control-label">{{ 'เบอร์โทรศัพท์' }}<font size="2" color="#FF0000">*</font></label>
                            <input class="form-control" name="phone" type="text" id="phone" value="{{ isset($User->phone) ? $User->phone : ''}}" required>
                            {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
                        </div>

                        <div class="form-group {{ $errors->has('sex') ? 'has-error' : ''}}">
                            <label for="sex" class="control-label">{{ 'เพศ' }}</label>
                            <select name="sex" class="form-control" id="sex">
                                <option value=""selected disabled>-กรุณาเลือกเพศ-</option>
                                @foreach (json_decode('{"ชาย":"ชาย","หญิง":"หญิง"}', true) as $optionKey => $optionValue)
                                <option value="{{ $optionKey }}" {{ (isset($User->sex) && $User->sex == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
                                @endforeach
                            </select>
                            {!! $errors->first('sex', '<p class="help-block">:message</p>') !!}
                        </div>


                <div class="container-fluid">
                    <div class="row">                  
                            <div class="col-md-10">
                                <a href="{{ url('/user_personal') }}" title="Back"><button class="btn btn-info" ><i  aria-hidden="true"></i>ย้อนกลับ</button></a>
                            </div>

                            <div class="col-md-2">
                                <input class="btn btn-primary" type="submit" value="บันทึก">
                            </div>
                    </div> 
                </div>       
                    <br> 
                    </form> 
            </div>
        </div>
    </div>
</div>
</div>                         
</div>

@endsection