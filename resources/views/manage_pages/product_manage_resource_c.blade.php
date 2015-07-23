@extends('manage_master')
@section('title')
    物資管理(中心)
@endsection
@section('link')
    <li>{!! Html::link('resource/manage/product/center', '物資管理') !!}</li>
    <li>{!! Html::link('resource/manage/people/center', '人員管理') !!}</li>
@endsection
@section('content')
    1.看到目前物資存量
    2.新增修改需求捐贈數量
    3.點收捐贈單
    4.分配物資(至地方)
        4.1 看到各地方存量不足
        4.2 修改各地方安全存量(如有增援需求)
    5.
@endsection