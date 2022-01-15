@extends('layouts.admin.main')

@section('content')
    <div class="container">
        <div class="row">
          

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Info {{ $users->name }}</div>
                    <div class="card-body">

                        <a href="{{ url('/admin_user/' . $users->id) }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i>ย้อนกลับ</button></a>
                        
                        </br><br>
                           
                        <div class="table-responsive">
                          <form method="POST" action="{{ url('/admin_user/' . $users->id) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            {{ csrf_field() }}


                            <div class="form-group {{ $errors->has('mastername') ? 'has-error' : ''}}">

                                <label for="mastername" class="control-label">{{ 'ชื่อ' }}</label>
                                <input class="form-control" name="mastername" type="text" id="mastername" value="{{ isset($users->mastername) ? $users->mastername : ''}}">
                                {!! $errors->first('mastername', '<p class="help-block">:message</p>') !!}
                            </div>

                            <div class="form-group {{ $errors->has('surname') ? 'has-error' : ''}}">
                                <label for="surname" class="control-label">{{ 'นามสกุล' }}</label>
                                <input class="form-control" rows="5" name="surname" type="text" id="surname" value="{{ isset($users->surname) ? $users->surname : ''}}">
                                {!! $errors->first('surname', '<p class="help-block">:message</p>') !!}
                            </div>

                            <div class="form-group {{ $errors->has('sex') ? 'has-error' : ''}}">
                                <label for="sex" class="control-label">{{ 'เพศ' }}</label>
                                <select name="sex" class="form-control" id="sex">
                                    @foreach (json_decode('{"ชาย":"ชาย","หญิง":"หญิง"}', true) as $optionKey => $optionValue)
                                    <option value="{{ $optionKey }}" {{ (isset($users->sex) && $users->sex == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
                                    @endforeach
                                </select>
                                {!! $errors->first('sex', '<p class="help-block">:message</p>') !!}
                            </div>

                            <div class="form-group {{ $errors->has('age') ? 'has-error' : ''}}">
                                <label for="age" class="control-label">{{ 'อายุ' }}</label>
                                <input class="form-control" name="age" type="number" id="age" value="{{ isset($users->age) ? $users->age : ''}}">
                                {!! $errors->first('age', '<p class="help-block">:message</p>') !!}
                            </div>

                            <div class="form-group {{ $errors->has('phone') ? 'has-error' : ''}}">
                                <label for="phone" class="control-label">{{ 'เบอร์โทรศัพท์' }}</label>
                                <input class="form-control" name="phone" type="text" id="phone" value="{{ isset($users->phone) ? $users->phone : ''}}">
                                {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
                            </div>
                   
                            <div class="container-fluid">
                                <div class="row">                  
                                       

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
