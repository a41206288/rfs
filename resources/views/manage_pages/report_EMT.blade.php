@extends('manage_master')
@section('title')
    EMT回報
@endsection
@section('content')

    <div class="col-xs-8 col-sm-6 col-md-6" >
        定時回報
        <table class="table table-bordered">
            <tr><th width="25%">回報時間</th><th>回報內容</th><th>回報人</th></tr>
            {!! Form::open(array('url' => 'report/EMT', 'method' => 'post','class' => 'form-horizontal')) !!}
            <tr><td id="showbox"></td><td>{!! Form::textarea('report','',['class' => 'form-control','rows'=>'1', 'style'=>'resize: vertical','required']) !!}</td><td>{!! Form::submit('回報', ['class' => 'btn btn-default btn-sm btn-primary']) !!}</td></tr>
            {!! Form::close() !!}
            <tr><td>2015-06-25 09:39:02</td><td>目前傷患醫療作業順利進行中</td><td>陳芊蓉</td></tr>
            <tr><td>2015-06-25 09:39:02</td><td>目前傷患醫療作業順利進行中</td><td>陳芊蓉</td></tr>
            <tr><td>2015-06-25 09:39:02</td><td>目前傷患醫療作業順利進行中</td><td>陳芊蓉</td></tr>
            <tr><td>2015-06-25 09:39:02</td><td>目前傷患醫療作業順利進行中</td><td>陳芊蓉</td></tr>
            <tr><td>2015-06-25 09:39:02</td><td>目前傷患醫療作業順利進行中</td><td>陳芊蓉</td></tr>
            <tr><td>2015-06-25 09:39:02</td><td>目前傷患醫療作業順利進行中</td><td>陳芊蓉</td></tr>
            <tr><td>2015-06-25 09:39:02</td><td>目前傷患醫療作業順利進行中</td><td>陳芊蓉</td></tr>
            <tr><td>2015-06-25 09:39:02</td><td>目前傷患醫療作業順利進行中</td><td>陳芊蓉</td></tr>
            <tr><td>2015-06-25 09:39:02</td><td>目前傷患醫療作業順利進行中</td><td>陳芊蓉</td></tr>


        </table>
    </div>
    <div class="col-xs-8 col-sm-6 col-md-6" >
        增援回報
        <table class="table table-bordered">
            <tr><th width="25%">回報時間</th><th>預估需求人數</th><th>需求原因</th><th>回報人</th></tr>
            {!! Form::open(array('url' => 'report/reliever', 'method' => 'post','class' => 'form-horizontal')) !!}
            <tr><td id="showbox"></td><td> {!! Form::number('require_number', '', ['id' =>  'victim_number', 'class' => 'form-control text-right', 'required','min'=>'0']) !!}</td><td>{!! Form::textarea('report','',['class' => 'form-control','rows'=>'1', 'style'=>'resize: vertical','required']) !!}</td><td>{!! Form::submit('回報', ['class' => 'btn btn-default btn-sm btn-primary']) !!}</td></tr>
            {!! Form::close() !!}
            <tr><td>2015-06-25 09:39:02</td><td class="text-right">12人</td><td>目前傷患醫療作業順利進行中</td><td>陳芊蓉</td></tr>
            <tr><td>2015-06-25 09:39:02</td><td class="text-right">12人</td><td>目前傷患醫療作業順利進行中</td><td>陳芊蓉</td></tr>
            <tr><td>2015-06-25 09:39:02</td><td class="text-right">12人</td><td>目前傷患醫療作業順利進行中</td><td>陳芊蓉</td></tr>
            <tr><td>2015-06-25 09:39:02</td><td class="text-right">12人</td><td>目前傷患醫療作業順利進行中</td><td>陳芊蓉</td></tr>
            <tr><td>2015-06-25 09:39:02</td><td class="text-right">12人</td><td>目前傷患醫療作業順利進行中</td><td>陳芊蓉</td></tr>
            <tr><td>2015-06-25 09:39:02</td><td class="text-right">12人</td><td>目前傷患醫療作業順利進行中</td><td>陳芊蓉</td></tr>
            <tr><td>2015-06-25 09:39:02</td><td class="text-right">12人</td><td>目前傷患醫療作業順利進行中</td><td>陳芊蓉</td></tr>



        </table>
    </div>
@endsection