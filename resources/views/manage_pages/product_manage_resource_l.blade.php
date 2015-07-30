@extends('manage_master')
@section('title')
    物資管理(地方)
@endsection
@section('link')
    <li>{!! Html::link('resource/manage/product/local', '物資管理') !!}</li>
    <li>{!! Html::link('resource/manage/people/local', '人員管理') !!}</li>
@endsection
@section('content')
    1.看到目前物資存量
    2.點收中央發放物資
    3.物資發放(借用器材)
    4.額外物資需求(增援)
@endsection