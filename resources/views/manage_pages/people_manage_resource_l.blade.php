@extends('manage_master')
@section('title')
    人員管理(地方)
@endsection
@section('content')
    <div class="col-xs-8 col-sm-6 col-md-6" >
    {{--1.增援人員需求 (人數、人員背景) 地方指揮官--}}
    2.查看報到志工人員資料
    <table class="table table-bordered">
        <tr><th>姓名</th><th>電話</th><th>Email</th><th>所在地</th><th></th></tr>
        <tr><td>王小明</td><td>0912312312</td><td>123yahoo.com.tw</td><td>目前地點</td><td><button class="btn btn-default">報到</button></td></tr>
    </table>
    </div>
@endsection