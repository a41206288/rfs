@extends('user_master')
@section('title')
    尋人刊登
@endsection
@section('missing_poster_input_active')
    active
@endsection
@section('content')

    {{--this is to add missiing poster5--}}
    <div class="col-xs-10 col-sm-9 col-md-9" >
        <table class="table table-striped">

            <thead>
            <tr><td colspan="9"><h5><b>災民資料</b></h5></td></tr>
            <tr>
                {{--<th width="5%">編號</th>--}}
                <th width="10%">姓名</th>
                <th width="5%">性別</th>
                <th width="5%">年齡</th>
                <th width="15%">電話</th>
                {{--<td>住址</td>--}}
                {{--<td>身分證字號</td>--}}
                <th width="10%">傷重程度</th>
                <th width="20%">目前所在地點</th>
                <th width="10%">診斷日期</th>
                <th width="10%">診斷時間</th>
            </tr>

            </thead>
            <tbody>
            <tr>
                {{--<td>1</td>--}}
                <td>日向寧次</td>
                <td>男</td>
                <td>17</td>
                <td>0987654321</td>
                {{--<td>住址</td>--}}
                {{--<td>身分證字號</td>--}}
                <td>死亡</td>
                <td>戰場上</td>
                <td>2015/08/19</td>
                <td>07:37:20</td>
            </tr>

            </tbody>
        </table>
    </div>
    <div class="col-xs-6 col-sm-3 col-md-3" >
        <table class="table">
            {{--{!! Form::open(array('url' => 'missing_poster', 'method' => 'post','class' => 'form-horizontal','onSubmit' => 'return checkForm();')) !!}--}}
            <thead>
                <tr><td colspan="9"><h5><b>&nbsp;</b></h5></td></tr>
                <tr>
                    <th colspan="2">搜尋</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th width="40%" class="text-right">姓名</th><td  width="60%">{!! Form::text('name','',['class' => 'form-control']) !!}</td>
                </tr>
                <tr>
                    <th class="text-right">性別</th>
                    <td>{!! Form::select('sex', array('男' => '男', '女' => '女','其他' => '其他','請選擇' => '請選擇'),'男',['class' => 'form-control']) !!}</td>
                </tr>
                <tr>
                    <th class="text-right">年齡</th><td> {!! Form::number('age', '', ['id' =>  'age', 'class' => 'form-control', 'min'=>'0']) !!}</td>
                </tr>
                <tr>
                    <th class="text-right">身分證字號</th><td>{!! Form::text('person_id','',['class' => 'form-control']) !!}</td>
                </tr>
                <tr>
                    <th class="text-right">聯絡電話</th><td>{!! Form::text('phone','',['class' => 'form-control']) !!}</td>
                </tr>
                <tr>
                    <th class="text-right">住址</th><td>{!! Form::text('address','',['class' => 'form-control']) !!}</td>
                </tr>
                <tr><td colspan="2" class="text-right"> {!! Form::submit('查詢', ['class' => 'btn btn-default btn-sm btn-primary']) !!}</td></tr>
            </tbody>
            {{--{!! Form::close() !!}--}}
        </table>
    </div>


@endsection