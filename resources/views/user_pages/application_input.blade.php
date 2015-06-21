@extends('user_master')
@section('title')
    人員招募
@endsection
@section('application_active')
    active
@endsection
@section('content')
    <style>
        table, td, th {
            border: 0px solid black;
        }

        td {
            padding: 5px;
        }
    </style>
    <h4><b>我要應徵</b></h4><hr>
    {!! Form::open(array('url' => '#', 'method' => 'post','class' => 'form-horizontal', 'id' => 'formInput', 'onSubmit' => 'return checkForm();')) !!}

    <div class="col-xs-6 col-sm-4 col-md-4" >

        <table>
            <tr><td colspan="2"><b>通報內容</b></td></tr>
            <tr>
                <td width="24%"><font color="#ff0b11">*</font>事件種類</td>

                <td width="38%"><select class="form-control " name="building" id="building">
                        <option value="">請選擇</option>
                        <option value="">建築物</option>
                        <option value="">道路</option>
                        <option value="">橋梁</option>
                        <option value="">管線</option>
                        <option value="">河流</option>
                    </select></td>
                <td width="38%"><select class="form-control" name="state" id="state">
                        <option value="">請選擇</option>
                        <option value="">倒塌</option>
                        <option value="">斷裂</option>
                        <option value="">淹水</option>
                        <option value="">爆炸</option>
                        <option value="">起火</option>
                    </select></td>
            </tr>
            <tr>
                <td></td><td colspan="2">其他</td>
            </tr>
            <tr>
                <td></td><td colspan="2">{!! Form::text('other','',['class' => 'form-control', 'id' => 'other']) !!}</td>
            </tr>
            <tr>
                <td>事件備註</td><td colspan="2">{!! Form::textarea('remark','',['class' => 'form-control ','style'=>'resize:none']) !!}</td>
            </tr>

        </table>
    </div>
    <div class="col-xs-6 col-sm-4 col-md-4" >

        <table>
            <tr><td colspan="2"><font color="#ff0b11">*</font><b>地點</b></td></tr>
            <tr>
                <td width="50%"><select class="form-control " name="country_or_city" id="country_or_city" onchange="country_onchange()" >
                        <option value="">請選擇縣/市</option>
                    </select></td>
                <td width="50%"><select class="form-control" name="township_or_district" id="township_or_district">
                        <option value="">請選擇區</option>
                    </select></td>
            </tr>
            <tr>
                <td colspan="2">{!! Form::text('adressDetail','',['class' => 'form-control', 'placeholder' => '詳細位置', 'id' => 'adressDetail']) !!}</td>
            </tr>
            <tr>
                <td colspan="2" class="text-center">or</td>
            </tr>
            <tr>
                <td colspan="2">{!! Form::textarea('remark','',['class' => 'form-control','style'=>'resize:none']) !!}</td>
            </tr>

        </table>
    </div>
    <div class="col-xs-6 col-sm-4 col-md-4" >
        <table>
            <tr><td colspan="2"><b>報案人資料</b></td></tr>
            <tr>
                <td width="20%"><font color="#ff0b11">*</font>姓氏</td><td  width="80%">{!! Form::text('lname','',['class' => 'form-control', 'required']) !!}</td>
            </tr>
            <tr>
                <td>名字</td><td>{!! Form::text('fname','',['class' => 'form-control']) !!}</td>
            </tr>
            <tr>
                <td>聯絡電話</td><td>{!! Form::text('phone','',['class' => 'form-control', 'id' => 'phone']) !!}</td>
            </tr>
            <tr>
                <td>E-mail</td><td>{!! Form::text('email','',['class' => 'form-control','type'=>'email', 'id' => 'email']) !!}</td>
            </tr>

            <tr>
                <td colspan="2"><font color="#ff0b11">※</font> 至少填寫1項聯絡方式，以方便我們聯絡您</td>
            </tr>
            <tr>
                <td colspan="2"><font color="#ff0b11">*</font> 請務必填寫</td>
            </tr>

        </table>
    </div>
    <div class="text-center">
        <br>

        <br><br>
        {!! Form::submit('通報給救災中心', ['class' => 'btn btn-primary btn-sm']) !!}
    </div >
    {!! Form::close() !!}
@endsection