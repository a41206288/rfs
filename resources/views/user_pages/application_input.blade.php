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
    {!! Form::open(array('url' => 'application/input', 'method' => 'post','class' => 'form-horizontal', 'id' => 'formInput', 'onSubmit' => 'return checkForm();')) !!}


    <div class="col-xs-6 col-sm-4 col-md-4" >
        <table>
            <tr><td colspan="2"><b>個人資料</b></td></tr>
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
    <div class="col-xs-6 col-sm-4 col-md-4" >
        <table>
            <tr><td colspan="2"><b>特殊技能</b></td></tr>
            <tr>
                <td></td><td>{!! Form::text('skill','',['class' => 'form-control', 'id' => 'skill']) !!}</td>
            </tr>
            <tr>
                <td colspan="2"><font color="#ff0b11">※</font> 此欄為選填</td>
            </tr>

        </table>
        <div class="text-center">
            <br><br><br><br><br>
            {!! Form::submit('送出', ['class' => 'btn btn-primary btn-sm']) !!}
        </div >
    </div>
    <div class="col-xs-6 col-sm-4 col-md-4" >
        <div style="height:400px;width:100%;overflow:auto;">
            <table class="btn-group-vertical" id="needed">
                <thead><tr><td colspan="2"><b>應徵志工種類</b>(請在此選擇欲應徵的志工種類)</td></tr></thead>
                <tbody>
                @if(isset($center_support_people))
                    @foreach($center_support_people as $center_support_person)
                        <tr class="btn btn-block btn-default btn-sm"><td></td><td>{!!$center_support_person->center_support_person_requirement ." ". $center_support_person->center_support_person_num!!} 人</td></tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>

    {!! Form::close() !!}
@endsection

@section('javascript')
    <script>
        function checkForm()
        {
            if($('#phone').val() == "" && $('#email').val()=="")
            {
                alert("至少填寫1項聯絡方式");
                $('#phone').focus();
                return false;
            }
            if( !isPhone( $('#phone').val() ) )
            {
                $('#phone').focus();
                return false;
            }
            if( $('#email').val() != "" && !isEmail( $('#email').val() ) )
            {
                $('#email').focus();
                return false;
            }
            return true;
        }

        function isPhone(phoneNum) {
            if(phoneNum!=''){
                if(phoneNum.length == 10){
                    var regex = /^0[249]{1}[0-9]{8}$/;
                    if( !regex.test(phoneNum)){
                        alert("電話格式有誤，請檢查是否輸入正確");
                        return false;
                    }
                    else{
                        return true;
                    }
                }
                else if(phoneNum.length == 9){
                    var regex = /^0[345678]{1}[0-9]{7}$/;
                    if( !regex.test(phoneNum)){
                        alert("電話格式有誤，請檢查是否輸入正確");
                        return false;
                    }
                    else{
                        return true;
                    }
                }
                else{
                    alert("您輸入了" + phoneNum.length + "碼電話號碼\n請再次檢查您輸入的資料是否有誤\n若為市話請記得加上區碼");
                    return true;
                }
            }
            return true;
        }

        function isEmail(email) {
            var regex = /^[A-Za-z0-9]\w*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z]+$/;
            if ( !regex.test(email) ) {
                alert("信箱格式不正確");
                return false;
            }
            else{
                return true;
            }
        }
    </script>
@endsection