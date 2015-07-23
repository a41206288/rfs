@extends('manage_master')
@section('title')
EMT災民
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
    <h4><b>災民資料</b></h4><hr>
    {{--姓名--}}
    {{--性別--}}
    {{--年齡--}}
    {{--電話--}}
    {{--住址--}}
    {{--身分證字號--}}
    {{--診斷時間--}}
    {{--傷重程度--}}
    {{--詳細診斷--}}
    {{--處置方式--}}
    {{--目前所在地點--}}

    {!! Form::open(array('url' => 'call/input', 'method' => 'post','class' => 'form-horizontal', 'id' => 'formInput', 'onSubmit' => 'return checkForm();')) !!}
    <div class="col-xs-6 col-sm-4 col-md-4" >
        <table>
            <tr><td colspan="2"><b>個人資料</b></td></tr>
            <tr>
                <td width="20%">姓名</td><td  width="80%">{!! Form::text('lname','',['class' => 'form-control', 'required']) !!}</td>
            </tr>
            <tr>
                <td>名字</td><td>{!! Form::text('fname','',['class' => 'form-control']) !!}</td>
            </tr>
            <tr>
                <td>年齡</td><td> {!! Form::number('age', '', ['id' =>  'age', 'class' => 'form-control', 'min'=>'0']) !!}</td>
            </tr>
            <tr>
                <td>身分證字號</td><td>{!! Form::text('id','',['class' => 'form-control', 'id' => 'id']) !!}</td>
            </tr>
            <tr>
                <td>聯絡電話</td><td>{!! Form::text('phone','',['class' => 'form-control', 'id' => 'phone']) !!}</td>
            </tr>
            <tr>
                <td>住址</td><td>{!! Form::text('address','',['class' => 'form-control']) !!}</td>
            </tr>


        </table>

    </div>

    <div class="col-xs-6 col-sm-4 col-md-4" >

        <table>
            <tr><td colspan="2"><b>災民狀態</b></td></tr>
            <tr>
                <td width="24%">傷重程度</td>

                <td width="38%"><select class="form-control " name="building" id="building">
                        <option value="">請選擇</option>
                        <option value="">重度</option>
                        <option value="">中度</option>
                        <option value="">輕度</option>
                        <option value="">正常</option>
                    </select></td>
            </tr>

            <tr>
                <td>詳細診斷</td><td>{!! Form::textarea('remark','',['class' => 'form-control ','style'=>'resize:none']) !!}</td>
            </tr>
           </table>
    </div>
    <div class="col-xs-6 col-sm-4 col-md-4" >
        <table>
            <tr>
                <td>目前所在地</td>
            </tr>
            <tr>
                <td>{!! Form::text('location','',['class' => 'form-control']) !!}</td>
            </tr>
            <tr>
            <td>處置方式</td>
            </tr>
            <tr>
                <td>{!! Form::textarea('remark','',['class' => 'form-control ','style'=>'resize:none']) !!}</td>
            </tr>


        </table>
        <div class="text-center">
            <br>

            <br><br>
            {!! Form::submit('新增災民資料', ['class' => 'btn btn-primary btn-sm']) !!}
        </div >
    </div>

@endsection
