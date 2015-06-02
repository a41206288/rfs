@extends('user_master')
@section('title')
    捐贈物資
@endsection
@section('donate_input_active')
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
    <h4><b>我要捐贈</b></h4><hr>
    {!! Form::open(array('url' => 'call/input', 'method' => 'post','class' => 'form-horizontal')) !!}
    <div class="col-xs-6 col-sm-4 col-md-4" >
        <table>
            <tr><td colspan="2"><b>捐贈人資料</b></td></tr>
            <tr>
                <td width="20%"><font color="#ff0b11">*</font>姓氏</td><td  width="80%">{!! Form::text('lname','',['class' => 'form-control', 'required']) !!}</td>
            </tr>
            <tr>
                <td>姓名</td><td>{!! Form::text('fname','',['class' => 'form-control']) !!}</td>
            </tr>
            <tr>
                <td>聯絡電話</td><td>{!! Form::text('phone','',['class' => 'form-control']) !!}</td>
            </tr>
            <tr>
                <td>E-mail</td><td>{!! Form::text('email','',['class' => 'form-control','type'=>'email']) !!}</td>
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

        <table >
            <tr><td colspan="2"><b>捐贈物資</b></td></tr>
            <tr >
                <td width="20%">物資名稱</td><td width="10%"></td><td width="10%"> {!! Form::selectRange('number', 10, 20,'',['class' => 'form-control'])!!}</td>
            </tr>




        </table>
    </div>
    {!! Form::close() !!}
    <div class="col-xs-6 col-sm-4 col-md-4" >
        <div style="height:400px;width:100%;overflow:auto;">
        <table class="btn-group-vertical" >
            <tr><td colspan="2"><b>需求物資列表</b>(請在此選擇欲捐贈物品)</td></tr>

                <tr class="btn btn-block btn-default btn-sm"><td width="20%">泡麵</td><td width="10%"></td><td width="10%">23</td></tr>
                <tr class="btn btn-block btn-default btn-sm"><td width="20%">泡麵</td><td width="10%"></td><td width="10%">23</td></tr>
                <tr class="btn btn-block btn-default btn-sm"><td width="20%">泡麵</td><td width="10%"></td><td width="10%">23</td></tr>
                <tr class="btn btn-block btn-default btn-sm"><td width="20%">泡麵</td><td width="10%"></td><td width="10%">23</td></tr>
                <tr class="btn btn-block btn-default btn-sm"><td width="20%">泡麵</td><td width="10%"></td><td width="10%">23</td></tr>
                <tr class="btn btn-block btn-default btn-sm"><td width="20%">泡麵</td><td width="10%"></td><td width="10%">23</td></tr>
                <tr class="btn btn-block btn-default btn-sm"><td width="20%">泡麵</td><td width="10%"></td><td width="10%">23</td></tr>
                <tr class="btn btn-block btn-default btn-sm"><td width="20%">泡麵</td><td width="10%"></td><td width="10%">23</td></tr>
                <tr class="btn btn-block btn-default btn-sm"><td width="20%">泡麵</td><td width="10%"></td><td width="10%">23</td></tr> <tr class="btn btn-block btn-default btn-sm"><td width="20%">泡麵</td><td width="10%"></td><td width="10%">23</td></tr>





        </table>
        </div>
    </div>
@endsection