@extends('manage_master')
@section('title')
    任務管理
@endsection
@section('link')
    {{--<li>{!! Html::link('analysis/manage/local', '現場分析地點管理') !!}</li>--}}
    <li class="active">{!! Html::link('mission/manage/local', '任務管理' )!!}</li>
@endsection
@section('css')
    tr.header
    {
    cursor:pointer;
    }
    .header .sign:after{
    content:"▼";
    display:inline-block;
    }
    .header.expand .sign:after{
    content:"▲";
    }
    div#Box0 {
    right:0px;
    }
    div#Box1 {
        right:225px;
    }
    div#Box2 {
        right:500px;
    }
    div#Box3 {
    right:775px;
    }
    div#Box4 {
    right:1050px;
    }
    .contactBox {
    position:absolute;
    {{--background-color:red;--}}
    z-index:2;
    position:fixed;
    top:50px;
    {{--right:200px;--}}
    width:200px;
    height:100%;
    margin-bottom: 0px;
    background-color: #ffffff;
    border: 1px solid transparent;
    border-radius: 4px;
    box-shadow: 0 1px 1px rgba(0, 0, 0, 0.05);
    border-color: #dddddd;
    overflow-y: scroll;
    }
    .contactBox ul li{
        background-color: #f5f5f5;
    }
    .chatBox {
        position:absolute;
        {{--background-color:red;--}}
        z-index:2;
        position:fixed;
        bottom:0px;
        {{--right:200px;--}}
        width:250px;
        margin-bottom: 0px;
        background-color: #ffffff;
        border: 1px solid transparent;
        border-radius: 4px;
        box-shadow: 0 1px 1px rgba(0, 0, 0, 0.05);
        border-color: #dddddd;
    }
    .chatBoxButton {
        position:absolute;
        z-index:3;
        position:fixed;
        bottom:0px;
        right: 0;
        margin-bottom: 0px;
        border: 1px solid transparent;
    }
    .chatBox-body {
    padding: 5px;
    height: 225px;
    overflow-y: scroll;
    {{--margin-bottom: 5px;--}}
    {{--margin-top: 5px;--}}
    {{--background-color: #f5f5f5;--}}
    }
    .chatBox-heading {
    padding: 10px 15px;
    border-bottom: 1px solid transparent;
    border-top-right-radius: 3px;
    border-top-left-radius: 3px;
    color: #333333;
    background-color: #f5f5f5;
    border-color: #dddddd;
    }
    .chatBox > input {
    position:absolute;
    bottom:0px;
    }

@endsection
{{--@section('content')--}}
    {{--<div class="col-xs-10 col-sm-8 col-md-8" >--}}
    {{--</div>--}}
    {{--<div class="col-xs-10 col-sm-8 col-md-8" >--}}
    {{--</div>--}}
{{--@endsection--}}
{{--脫困--}}
{{--救火--}}
{{--清潔--}}
{{--道路修復--}}
{{--醫療--}}
{{--管線修復--}}
{{--警戒--}}
@section('content')
    {{--<div id="Box1" class="chatBox panel" style="border:1px solid #333333;">myBox--}}
        {{--<div class="panel-heading">Panel heading without title</div>--}}
        {{--<div class="panel-body">--}}
            {{--Panel content--}}
        {{--</div>--}}
    {{--</div>--}}
    <button class="btn btn-primary btn-sm chatBoxButton" type="button" data-toggle="collapse" data-target="#Box0" aria-expanded="false" aria-controls="collapseExample">
        <span class="glyphicon glyphicon-user" aria-hidden="true"></span>訊息
    </button>
    <div id="Box0" class="collapse contactBox">
        <ul class="nav nav-pills nav-stacked">
            {{--<li class="active"><a>聯絡人</a></li>--}}
            @foreach($users as $user)
                <li><a>{!! $user->user_name !!}</a></li>
            @endforeach
        </ul>
    </div>
    {{--<div id="Box2" class="panel panel-default chatBox">--}}
        {{--<div class="panel-heading">--}}
            {{--<h4 class="panel-title">--}}
                {{--<span class="glyphicon glyphicon-user" style="width: 70%;" aria-hidden="true">韓東霖</span>--}}
                {{--<button class="btn btn-default btn-xs" type="button" data-toggle="collapse" data-target="#test" aria-expanded="true" aria-controls="test">--}}
                    {{--<span class="glyphicon glyphicon-minus"></span>--}}
                {{--</button>--}}
                {{--<button class="btn btn-default btn-xs" type="button">--}}
                    {{--<span class="glyphicon glyphicon-remove"></span>--}}
                {{--</button>--}}
            {{--</h4>--}}
        {{--</div>--}}
        {{--<div id="test" class="panel-collapse collapse in">--}}
            {{--<div class="panel-body chatBox-body">--}}
                {{--<table class="table table-nonbordered">--}}
                    {{--<tr>--}}
                        {{--<th width="70px">韓東霖</th>--}}
                        {{--<td class="active">電線杆倒塌起火</td>--}}
                    {{--</tr>--}}
                {{--</table>--}}
            {{--</div>--}}
            {{--<div class="input-group">--}}
                {{--<input type="text" class="form-control">--}}
                {{--<span class="input-group-btn">--}}
                    {{--<button class="btn btn-default" type="button">傳送</button>--}}
                {{--</span>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
    {{--<div id="Box1" class="collapse in chatBox">--}}
        {{--<div class="chatBox-heading">韓東霖</div>--}}
        {{--<nav class="navbar-sm navbar-sm-default" role="navigation" style="min-height: 20px;">--}}
            {{--<div class="navbar-sm-header">--}}{{--標題--}}
                {{--<a class="navbar-sm-brand" data-toggle="collapse" href="#Box1">韓東霖</a>--}}
            {{--</div>--}}
        {{--</nav>--}}
        {{--<div class="chatBox-body">--}}
            {{--<table class="table table-nonbordered">--}}
                {{--<tr>--}}
                    {{--<th width="70px">韓東霖</th>--}}
                    {{--<td class="active">電線杆倒塌起火</td>--}}
                {{--</tr>--}}
                {{--<tr><td></td></tr>--}}
                {{--<tr>--}}
                    {{--<th width="70px"></th>--}}
                    {{--<td class="info">電線杆倒塌起火</td>--}}
                {{--</tr>--}}


            {{--</table>--}}
        {{--</div>--}}
        {{--<div class="input-group">--}}
            {{--<input type="text" class="form-control">--}}
            {{--<span class="input-group-btn">--}}
                {{--<button class="btn btn-default" type="button">傳送</button>--}}
            {{--</span>--}}
        {{--</div><!-- /input-group -->--}}
    {{--</div>--}}

    <div class="col-xs-16 col-sm-12 col-md-12" >
        {{--<h4><b>任務管理</b></h4><div >--}}
        <div class="text-right panel">
            <div class="btn-group">
                <button type="button" class="btn btn-default">出發至任務現場</button>
                <button type="button" class="btn btn-default">到達現場，並開始執行任務</button>
                <button type="button" class="btn btn-default">任務執行完成，返回至中央</button>
            </div>
        </div>
        <div class="col-xs-9 col-sm-7 col-md-7" >

            <div class="panel panel-default" >
                {!! Form::open(array('url' => 'local/mission/manage/updateMissionStatus'))!!}
                <nav class="navbar-sm navbar-sm-default" role="navigation" style="min-height: 20px;">
                    <div class="navbar-sm-header">
                        <a class="navbar-sm-brand" href="#">通報列表</a>
                    </div>
                    <div class="collapse navbar-sm-collapse" id="bs-example-navbar-sm-collapse-1">
                        <ul class="nav navbar-sm-nav navbar-sm-right">
                            {!! Form::submit('通報完成', ['class' => 'btn btn-sm btn-default navbar-sm-btn']) !!}
                            {{--<button type="button" class="btn btn-sm btn-default navbar-sm-btn">通報完成</button>--}}

                        </ul>
                    </div>
                </nav>
                <div style="height: 210px;overflow-y: scroll;">
                    <table class="table table-striped table-hover"  >
                        <thead>
                            <th></th>
                            <th>編號</th>
                            <th>通報地址<br>
                            <th>通報內容</th>
                            <th>完成日期</th>
                            <th>完成時間</th>
                        </thead>
                        <tbody>
                       @if(isset($missions))
                            @foreach($missions as $mission)
                                <tr>
                                    @if(!isset($mission->mission_complete_time))
                                        <td> {!! Form::checkbox('mission_id[]', $mission->mission_id)!!}</td>
                                    @else
                                        <td>
                                            <fieldset disabled>
                                                {!! Form::checkbox('name', 'value',['class' => 'checked'])!!}
                                            </fieldset>
                                        </td>
                                    @endif
                                    <td>C{{ (new Carbon\Carbon($mission->created_at))->formatLocalized('%y%m%d%H%M') }}{!! $mission->mission_id !!}</td>
                                    @if(isset($mission->rd_or_st_1) && isset($mission->rd_or_st_2))
                                        <td >{!!$mission->township_or_district_input." ".$mission->rd_or_st_1."與".$mission->rd_or_st_2."交叉口"!!}</td>
                                    @else
                                        <td >{!!$mission->township_or_district_input." ".$mission->rd_or_st_1.$mission->location!!}</td>
                                    @endif
                                    <td >{!! $mission->mission_content!!}</td>
                                     @if(isset($mission->mission_complete_time))
                                        <td>{{ (new Carbon\Carbon($mission->mission_complete_time))->formatLocalized('%Y/%m/%d') }}</td>
                                        <td>{{ (new Carbon\Carbon($mission->mission_complete_time))->formatLocalized('%H:%M') }}</td>
                                     @else
                                         <td colspan="2"></td>
                                     @endif

                                </tr>
                            @endforeach
                        @endif

                        </tbody>
                    </table>
                    {!! Form::close() !!}
                </div>
            </div>
            <div class="panel panel-default" >
                <nav class="navbar-sm navbar-sm-default" role="navigation" style="min-height: 20px;">
                    <div class="navbar-sm-header">
                        <a class="navbar-sm-brand" href="#">救災人員列表</a>
                    </div>

                    <div class="collapse navbar-sm-collapse" >
                        <ul class="nav navbar-sm-nav">
                            <!-- Single button -->

                            {!! Form::select('name',$mission_roles, '', ['class' => 'navbar-sm-btn btn-sm']) !!}
                        </ul>

                        <ul class="nav navbar-sm-nav navbar-sm-right">
                            {!! Form::open(array('url' => 'local/mission/manage/editPeople'))!!}
                            {{--<button type="button" class="btn btn-sm btn-default navbar-sm-btn">執行任務</button>--}}
                            {{--<button type="button" class="btn btn-sm btn-default navbar-sm-btn">閒置</button>--}}
                            {{--<button type="button" class="btn btn-sm btn-default navbar-sm-btn">負傷</button>--}}

                            {!! Form::select('mission_list_id', array('' => '更改人員狀態','執行任務' => '執行任務', '閒置' => '閒置', '負傷' => '負傷'),  '', ['class' => 'navbar-sm-btn btn-sm','style'=>'border: 1px solid #cccccc; border-radius: 4px;height: 30px;','onchange'=>'submit();']) !!}

                            <!-- Single button -->
                            {!! Form::select('mission_list_id', $mission_support_people_names, '', ['class' => 'navbar-sm-btn btn-sm','style'=>'width:170px;border: 1px solid #cccccc; border-radius: 4px;height: 30px;','onchange'=>'submit();']) !!}

                            <a href="#" class="btn btn-default btn-sm" data-toggle="popover" data-placement="top" data-trigger="hover" data-container="body" title="人員顏色說明"
                               data-content="
                                                {{--綠色:完成任務，閒置<br />橘色:任務執行中<br />紅色:受傷<br />"--}}
                                                <p class=&quot;bg-success&quot;>綠色:完成任務，閒置</p>
                                                <p class=&quot;bg-warning&quot;>橘色:任務執行中</p>
                                                <p class=&quot;bg-danger&quot;>紅色:受傷</p>"
                                data-html="true" role="button">
                                人員顏色說明
                            </a>
                            {!! Form::close() !!}

                        </ul>
                    </div>
                </nav>
                <div style="height: 210px;overflow-y: scroll;">
                    <table class="table  table-hover table-bordered"  >
                        <thead>
                        <th width="5%"></th>
                        <th width="10%">職位</th>
                        <th width="15%">狀態</th>
                        <th width="10%">姓名<br>
                        <th width="15%">電話</th>
                        <th width="45%">備註</th>

                        </thead>
                        <tbody>
                        @if(isset($mission_support_people_array[$mission_list_id]))
                            {{--計算此任務有幾張請求支援單--}}
                            <div style="display: none">
                                {!!
                                $mission_support_people_count = count($mission_support_people_array[$mission_list_id])+1
                                 !!}

                            </div>
{{--                            {!! dd($mission_support_people_count) !!}--}}

                            <tr style="border-top-width:2px; border-top-style:solid; border-top-color: #000000">
                                @for($i=1;$i<$mission_support_people_count;$i++)
                                    @if(isset($mission_help_other_array[$mission_support_people_array[$mission_list_id][$i]['mission_support_person_id']]))
                                        <div style="display: none">
                                            {{--計算每張請求支援單有多少人支援了--}}
                                            {!! $mission_help_other_count = count($mission_help_other_array[$mission_support_people_array[$mission_list_id][$i]['mission_support_person_id']])+1 !!}
                                            {!! $mission_help_other_num_total = 0 !!}
                                            {{--{!! dd($mission_help_other_count) !!}--}}
                                            {{--計算支援給我們多少人--}}
                                            @if(isset($mission_help_other_users_array[$i]))
                                                @foreach($mission_help_other_users_array[$i] as $mission_help_other_user_array)
                                                    {!! $mission_help_other_num_total = $mission_help_other_num_total + count($mission_help_other_user_array) !!}
                                                @endforeach
                                            @endif

                                        </div>
                                    @else
                                        {{--{!! dd($i) !!}--}}
                                        <div style="display: none">
                                            {!! $mission_help_other_count = 1  !!}
                                            {!! $mission_help_other_num_total = 0 !!}
                                        </div>
                                    @endif
                                    {!! Form::open(array('url' => 'local/mission/manage/updatePeople'))!!}
                                    @for($k=1;$k<$mission_help_other_count;$k++)
                                        {{--{!! dd($mission_help_other_count) !!}--}}
                                        {{--{!! dd($i) !!}--}}
                                            @foreach($mission_help_other_users_array[$mission_support_people_array[$mission_list_id][$i]['mission_support_person_id']][$mission_help_other_array[$mission_support_people_array[$mission_list_id][$i]['mission_support_person_id']][$k]['mission_list_id']] as $key => $value)
                                                @foreach($mission_help_users as $mission_help_user)
                                                    @if($key == $mission_help_user->user_id)
                                                        <tr>
                                                            <td></td>
                                                            <td>{!! $mission_help_user->description !!}</td>
                                                            <td>前往此任務中</td>

                                                            <td>{!! $mission_help_user->user_name !!}</td>
                                                            <td>{!! $mission_help_user->phone !!}</td>
                                                            {{--<td></td>--}}
                                                            @foreach($mission_lists as $mission_list)
                                                                @if($mission_help_user->mission_list_id == 1 && $mission_list->mission_list_id == $mission_help_user->mission_list_id)
                                                                    <td>
                                                                        {{--<button class="btn btn-sm btn-default">報到</button>--}}
                                                                        {!! Form::submit('報到', ['class' => 'btn btn-default btn-sm']) !!}
                                                                        {!! Form::hidden('user_id',$mission_help_user->user_id) !!}
                                                                        {!! Form::hidden('mission_help_other_user_id',$mission_help_user->mission_help_other_user_id) !!}
                                                                        {!! Form::hidden('mission_help_other_id',$mission_help_user->mission_help_other_id) !!}
                                                                        {!! Form::hidden('mission_list_id',$mission_list_id) !!}
                                                                        由中央支援
                                                                    </td>
                                                                @elseif( $mission_list->mission_list_id == $mission_help_user->mission_list_id )
                                                                    <td>
                                                                        {{--<button class="btn btn-sm btn-default">報到</button>--}}
                                                                        {!! Form::submit('報到', ['class' => 'btn btn-default btn-sm']) !!}
                                                                        {!! Form::hidden('user_id',$mission_help_user->user_id) !!}
                                                                        {!! Form::hidden('mission_help_other_user_id',$mission_help_user->mission_help_other_user_id) !!}
                                                                        {!! Form::hidden('mission_help_other_id',$mission_help_user->mission_help_other_id) !!}
                                                                        {!! Form::hidden('mission_list_id',$mission_list_id) !!}
                                                                        由 {!! $mission_list->mission_name  !!} 支援
                                                                    </td>

                                                                    {{--@elseif($mission_help_user->mission_list_id == 1)--}}
                                                                    {{--<td>由中央支援，正在前往中</td>--}}

                                                                @endif
                                                            @endforeach
                                                        </tr>
                                                    @endif
                                                @endforeach
                                            @endforeach
                                    @endfor
                                    {!! Form::close() !!}
                                @endfor
                        @endif



                        {!! Form::open(array('url' => 'local/mission/manage/editPeople'))!!}
                        @if(isset($missionUsers))
                            @foreach($missionUsers as $missionUser)
                                @if($missionUser->description != '地方指揮官')

                                    {{--@if($missionUser->arrived == 0)--}}
                                        {{--<tr>--}}
                                            {{--<td></td>--}}
                                            {{--<td>{!! $missionUser->description !!}</td>--}}
                                            {{--<td>尚未報到</td>--}}
                                            {{--<td>{!! $missionUser->user_name !!}</td>--}}
                                            {{--<td>{!! $missionUser->phone !!}</td>--}}
                                            {{--<td><button class="btn btn-sm btn-default">報到</button></td>--}}
                                        {{--</tr>--}}
                                    @if($missionUser->status == "執行任務")
                                        <tr class="warning">

                                            <td> {!! Form::checkbox('name', 'value')!!}</td>
                                            <td>{!! $missionUser->description !!}</td>
                                            <td>{!! $missionUser->status !!}</td>
                                            <td>{!! $missionUser->user_name !!}</td>
                                            <td>{!! $missionUser->phone !!}</td>
                                            <td></td>
                                        </tr>

                                    @elseif($missionUser->status == "負傷")
                                    <tr class="danger">
                                        <td> {!! Form::checkbox('name', 'value')!!}</td>
                                        <td>{!! $missionUser->description !!}</td>
                                        <td>{!! $missionUser->status !!}</td>
                                        <td>{!! $missionUser->user_name !!}</td>
                                        <td>{!! $missionUser->phone !!}</td>
                                        <td></td>
                                    </tr>
                                        {{--有arrive_mission代表此人被支援給其他任務--}}
                                        {{--arrive_mission == 0是避免同樣一人被同一任務非配兩次--}}
                                    @elseif(isset($missionUser->arrive_mission) && $missionUser->arrive_mission == 0)
                                        <tr >
                                            {{--<td> {!! Form::checkbox('name', 'value')!!}</td>--}}
                                            <td></td>
                                            <td>{!! $missionUser->description !!}</td>
                                            {{--尋找此人要被派往哪個任務--}}
                                            @foreach($user_help_missions as $user_help_mission)
                                                @if($user_help_mission->id == $missionUser->id)
                                                    {{--找到哪個任務後尋找他的任務名稱--}}
                                                    <td>派往其他任務</td>


                                                    {{--@foreach($mission_lists as $mission_list)--}}
                                                        {{--@if($mission_list->mission_list_id == $user_help_mission->mission_list_id)--}}
                                                            {{--<td>派往任務：{!! $mission_list->mission_name  !!}</td>--}}
                                                        {{--@endif--}}
                                                    {{--@endforeach--}}
                                                @endif
                                            @endforeach
                                            <td>{!! $missionUser->user_name !!}</td>
                                            <td>{!! $missionUser->phone !!}</td>
                                            @foreach($help_missions_and_names as $help_mission_and_name)
                                                @if($help_mission_and_name->mission_support_person_id == $user_help_mission->mission_support_person_id)
                                                    <td>派往{!! $help_mission_and_name->mission_name  !!}</td>
                                                @endif
                                            @endforeach
                                        </tr>
                                    @elseif($missionUser->status == "閒置")
                                        <tr class="success">
                                            <td> {!! Form::checkbox('name', 'value')!!}</td>
                                            <td>{!! $missionUser->description !!}</td>
                                            <td>{!! $missionUser->status !!}</td>
                                            <td>{!! $missionUser->user_name !!}</td>
                                            <td>{!! $missionUser->phone !!}</td>
                                            <td></td>
                                        </tr>
                                    @endif
                                @endif
                            @endforeach
                        @endif
                        {!! Form::close() !!}
                    </table>
                </div>
                {{--<div class="panel-footer">綠色:完成任務，閒置&nbsp;&nbsp;&nbsp;&nbsp;橘色:任務執行中&nbsp;&nbsp;&nbsp;&nbsp; 紅色:受傷</div>--}}
            </div>


        </div>
        <div class="col-xs-7 col-sm-5 col-md-5" >
            <div class="panel panel-default" >
                <nav class="navbar-sm navbar-sm-default" role="navigation" style="min-height: 20px;">
                    <div class="navbar-sm-header">
                        <a class="navbar-sm-brand" href="#">災民人數 (單位: 人)</a>
                    </div>

                    {{--<div class="collapse navbar-sm-collapse" >--}}
                        {{--<ul class="nav navbar-sm-nav navbar-sm-right">--}}
                            {{--{!! Form::select('name', array('未選' => '增援種類', '醫療' => '醫療', '脫困' => '脫困'), '請選擇', ['class' => 'navbar-sm-btn btn-sm']) !!}--}}
                            {{--{!! Form::number('name', 'default', ['min'=>'0','class' => 'text-right']) !!}--}}
                            {{--<button type="button" class="btn btn-sm btn-default navbar-sm-btn">請求增援</button>--}}
                            {{--<a href="#" class="btn btn-default btn-sm navbar-sm-btn" data-toggle="popover" data-placement="bottom" data-trigger="hover" data-container="body" title="顏色說明"--}}
                               {{--data-content="--}}
                                                {{--綠色:完成任務，閒置<br />橘色:任務執行中<br />紅色:受傷<br />"--}}
                                                {{--<p class=&quot;bg-success&quot;>綠色:完成任務，返回中</p>--}}
                                                {{--<p class=&quot;bg-warning&quot;>橘色:任務執行中</p>--}}
                                                {{--<p class=&quot;bg-danger&quot;>紅色:任務執行中且要求增援</p>"--}}
                               {{--data-html="true" role="button">--}}
                                {{--顏色說明--}}
                            {{--</a>--}}
                        {{--</ul>--}}
                    {{--</div>--}}
                </nav>
                {{--<div style="height: 160px;overflow-y: scroll;">--}}
                    <table class=" table table-bordered">
                        {{--<thead>--}}
                        {{--<tr><th colspan="15">災民人數 (單位: 人)</th></tr>--}}

                        {{--</thead>--}}
                        <tbody>
                        <tr>
                            @if(isset($victim_num_arrays))
                                @foreach($victim_num_arrays as $victim_num_array)
                                    <th width="10%">
                                        @if($victim_num_array['damage_level'] == 0)
                                            正常
                                        @elseif($victim_num_array['damage_level'] == 1)
                                            輕傷
                                        @elseif($victim_num_array['damage_level'] == 2)
                                            中傷
                                        @elseif($victim_num_array['damage_level'] == 3)
                                            重傷
                                        @elseif($victim_num_array['damage_level'] == 4)
                                            死亡
                                        @endif
                                    </th><td colspan="2" class="text-right">{!! $victim_num_array['total'] !!} </td>
                                @endforeach
                            @endif
                        </tr>

                        </tbody>
                    </table>
            </div>
            <div class="panel panel-default" >
                <nav class="navbar-sm navbar-sm-default" role="navigation" style="min-height: 20px;">
                    <div class="navbar-sm-header">
                        <a class="navbar-sm-brand" href="#">本任務欲增援人員列表  (單位: 人)</a>
                    </div>

                    <div class="collapse navbar-sm-collapse" >
                        <ul class="nav navbar-sm-nav navbar-sm-right">
                            {{--{!! Form::select('name', array('未選' => '增援種類', '醫療' => '醫療', '脫困' => '脫困'), '請選擇', ['class' => 'navbar-sm-btn btn-sm']) !!}--}}
                            {{--{!! Form::number('name', 'default', ['min'=>'0','class' => 'text-right']) !!}--}}
                            {{--<button type="button" class="btn btn-sm btn-default navbar-sm-btn">請求增援</button>--}}
                            <a href="#" class="btn btn-default btn-sm navbar-sm-btn" data-toggle="popover" data-placement="bottom" data-trigger="hover" data-container="body" title="顏色說明"
                               data-content="
                                                {{--綠色:完成任務，閒置<br />橘色:任務執行中<br />紅色:受傷<br />"--}}
                                                <p class=&quot;bg-success&quot;>綠色:招募人員 50 % 以上</p>
                                                <p class=&quot;bg-warning&quot;>橘色:招募人員 50 % 以下</p>
                                                <p class=&quot;bg-danger&quot;>紅色:尚未招募到人員</p>"
                               data-html="true" role="button">
                                顏色說明
                            </a>


                        </ul>
                    </div>
                </nav>
                <div style="height: 145px;overflow-y: scroll;">
                    <table class="table table-bordered">
                        <thead>
                        <tr><th>職位</th><th>欲增援人數</th><th>尚需人數</th><th colspan="3">已招募人數</th></tr>
                        </thead>
                        <tbody>

                        @if(isset($mission_support_people_array[$mission_list_id]))
                            {{--計算此任務有幾張請求支援單--}}
                            <div style="display: none">
                                {!!
                                $mission_support_people_count = count($mission_support_people_array[$mission_list_id])+1
                                 !!}

                            </div>
                            {{--{!! dd($mission_support_people_count) !!}--}}

                            <tr style="border-top-width:2px; border-top-style:solid; border-top-color: #000000">
                            @for($i=1;$i<$mission_support_people_count;$i++)
                                @if(isset($mission_help_other_array[$mission_support_people_array[$mission_list_id][$i]['mission_support_person_id']]) )
                                    <div style="display: none">
                                        {{--計算每張請求支援單有多少人支援了--}}
                                        {!! $mission_help_other_count = count($mission_help_other_array[$mission_support_people_array[$mission_list_id][$i]['mission_support_person_id']])+1 !!}
                                        {!! $mission_help_other_num_total = 0 !!}
                                        {{--{!! dd($mission_help_other_count) !!}--}}
                                        {{--計算支援給我們多少人--}}
                                        @if(isset($mission_help_other_users_array[$i]))
                                            @foreach($mission_help_other_users_array[$i] as $mission_help_other_user_array)
                                                {!! $mission_help_other_num_total = $mission_help_other_num_total + count($mission_help_other_user_array) !!}
                                            @endforeach
                                        @endif

                                        {{--@for($j=1;$j<$mission_help_other_count;$j++)--}}
                                            {{--{!! $mission_help_other_num_total = $mission_help_other_num_total + $mission_help_other_array[$mission_support_people_array[$mission_list_id][$i]['mission_support_person_id']][$j]['mission_help_other_num'] !!}--}}
                                       {{--@endfor--}}
                                    </div>
                                @else
                                    {{--{!! dd($i) !!}--}}
                                    <div style="display: none">
                                        {!! $mission_help_other_count = 1  !!}
                                        {!! $mission_help_other_num_total = 0 !!}
                                    </div>
                                @endif
                                <tr style="border-top-width:2px; border-top-style:solid; border-top-color: #000000">
                                <tr>
                                    <td  rowspan="{!! $mission_help_other_count !!}">{!! $mission_support_people_array[$mission_list_id][$i]['role'] !!}</td>
                                    @if($mission_help_other_num_total / $mission_support_people_array[$mission_list_id][$i]['mission_support_people_num'] > 0.5)
                                        <td  rowspan="{!! $mission_help_other_count !!}" class="text-right success">{!! $mission_support_people_array[$mission_list_id][$i]['mission_support_people_num'] !!}</td>
                                        <td  rowspan="{!! $mission_help_other_count !!}" class="text-right success">{!! $mission_support_people_array[$mission_list_id][$i]['mission_support_people_num'] - $mission_help_other_num_total !!}</td>
                                    @elseif($mission_help_other_num_total / $mission_support_people_array[$mission_list_id][$i]['mission_support_people_num'] == 0)
                                        <td  rowspan="{!! $mission_help_other_count !!}" class="text-right danger">{!! $mission_support_people_array[$mission_list_id][$i]['mission_support_people_num'] !!}</td>
                                        <td  rowspan="{!! $mission_help_other_count !!}" class="text-right danger">{!! $mission_support_people_array[$mission_list_id][$i]['mission_support_people_num'] - $mission_help_other_num_total !!}</td>
                                    @else
                                        <td  rowspan="{!! $mission_help_other_count !!}" class="text-right warning">{!! $mission_support_people_array[$mission_list_id][$i]['mission_support_people_num'] !!}</td>
                                        <td  rowspan="{!! $mission_help_other_count !!}" class="text-right warning">{!! $mission_support_people_array[$mission_list_id][$i]['mission_support_people_num'] - $mission_help_other_num_total !!}</td>

                                    @endif
                                    @if($mission_help_other_count == 1)
                                        <td colspan="3"></td>
                                    @endif
                                </tr>

                                @for($k=1;$k<$mission_help_other_count;$k++)
                                    {{--{!! dd($mission_help_other_count) !!}--}}
                                    <tr>
                                        @if($mission_help_other_array[$mission_support_people_array[$mission_list_id][$i]['mission_support_person_id']][$k]['mission_name'] == "未分配任務")
                                            <td>中央</td>
                                        @else
                                            <td>{!! $mission_help_other_array[$mission_support_people_array[$mission_list_id][$i]['mission_support_person_id']][$k]['mission_name']  !!}</td>
                                        @endif

                                            <td class="text-right">{!! count($mission_help_other_users_array[$mission_support_people_array[$mission_list_id][$i]['mission_support_person_id']][$mission_help_other_array[$mission_support_people_array[$mission_list_id][$i]['mission_support_person_id']][$k]['mission_list_id']])  !!}</td>

                                            {{--<td class="text-right">{!! $mission_help_other_array[$mission_support_people_array[$mission_list_id][$i]['mission_support_person_id']][$k]['mission_help_other_num']  !!}</td>--}}
                                        {{--<td>--}}
                                            {{--{!! Form::open(array('url' => 'local/mission/manage/updatePeopleSupport'))!!}--}}
                                                {{--{!! Form::hidden('mission_help_other_id',$mission_help_other_array[$mission_support_people_array[$mission_list_id][$i]['mission_support_person_id']][$k]['mission_help_other_id']) !!}--}}
                                                {{--{!! Form::submit('已到達', ['class' => 'btn btn-default btn-sm']) !!}--}}
                                            {{--{!! Form::close() !!}--}}
                                        {{--</td>--}}
                                    </tr>
                                @endfor

                            @endfor
                        @endif

                        </tbody>
                    </table>
                </div>
                {{--<div class="panel-footer">綠色:招募人員 50 % 以上&nbsp;&nbsp;&nbsp;&nbsp;橘色:招募人員 50 % 以下&nbsp;&nbsp;&nbsp;&nbsp; 紅色:尚未招募到人員</div>--}}
                {{--<pre>綠色:招募人員 50 % 以上&nbsp;&nbsp;&nbsp;&nbsp;橘色:招募人員 50 % 以下&nbsp;&nbsp;&nbsp;&nbsp; 紅色:尚未招募到人員</pre>--}}
                <nav class="navbar-sm navbar-sm-default" role="navigation" style="min-height: 20px;">
                    <div class="collapse navbar-sm-collapse" >

                        <ul class="nav navbar-sm-nav navbar-sm-right euro-sign">
                            {!! Form::open(array('url' => 'local/mission/manage/createPeopleSupport'))!!}
                                {!! Form::hidden('mission_list_id',$mission_list_id) !!}
                                {!! Form::select('mission_support_people_id',$role_of_work, '', ['class' => 'navbar-sm-btn btn-sm']) !!}
                                {!! Form::number('mission_support_people_num', 0, ['min'=>'1','class' => 'text-right','style'=>'width:50px;border: 1px solid #cccccc; border-radius: 4px;height: 30px;']) !!}&nbsp;&nbsp;人&nbsp;&nbsp;
                                {!! Form::text('mission_support_people_reason','',['placeholder'=>'增援原因','style'=>'width:200px;border: 1px solid #cccccc; border-radius: 4px;height: 30px;']) !!}
                                {!! Form::submit('請求增援', ['class' => 'btn btn-sm btn-default navbar-sm-btn']) !!}
                            {!! Form::close() !!}
                        </ul>
                    </div>
                </nav>
            </div>
            <div class="panel panel-default" >
                <nav class="navbar-sm navbar-sm-default" role="navigation" style="min-height: 20px;">
                    <div class="navbar-sm-header">
                        <a class="navbar-sm-brand" href="#">其他任務欲增援人員列表  (單位: 人)</a>
                    </div>

                    <div class="collapse navbar-sm-collapse" >
                        <ul class="nav navbar-sm-nav navbar-sm-right">
                            {{--{!! Form::select('name', array('未選' => '增援種類', '醫療' => '醫療', '脫困' => '脫困'), '請選擇', ['class' => 'navbar-sm-btn btn-sm']) !!}--}}
                            {{--{!! Form::number('name', 'default', ['min'=>'0','class' => 'text-right']) !!}--}}
                            {{--<button type="button" class="btn btn-sm btn-default navbar-sm-btn">請求增援</button>--}}
                            <a href="#" class="btn btn-default btn-sm navbar-sm-btn" data-toggle="popover" data-placement="bottom" data-trigger="hover" data-container="body" title="顏色說明"
                               data-content="
                                                {{--綠色:完成任務，閒置<br />橘色:任務執行中<br />紅色:受傷<br />"--}}
                                                <p class=&quot;bg-success&quot;>綠色:完成任務，返回中</p>
                                                <p class=&quot;bg-warning&quot;>橘色:任務執行中</p>
                                                <p class=&quot;bg-danger&quot;>紅色:任務執行中且要求增援</p>"
                               data-html="true" role="button">
                                顏色說明
                            </a>
                        </ul>
                    </div>
                </nav>
                <div style="height: 145px;overflow-y: scroll;">
                    <table width="100%" class="table table-bordered">
                        {{--<thead>--}}
                        {{--<tr><td colspan="8">各地方人員增援列表  (單位: 人)</td></tr>--}}
                        {{--</thead>--}}
                        <tbody>

                        <tr>
                            <td></td>
                            @if(isset($roles))
                                @foreach($roles as $role)
                                    @if($role->description != '系統管理者' && $role->description != '中央指揮官' && $role->description != '地方指揮官' && $role->description != '後勤部門')

                                            <td>{!! $role->description  !!}</td>

                                    @endif
                                @endforeach
                            @endif
                        </tr>

                            @if(isset($mission_support_people_lists))
                                @foreach($mission_support_people_lists as $mission_support_people_list)
                                    @if( $mission_support_people_list->mission_list_id != $mission_list_id )
                                        {{--&& $mission_list->mission_list_id != $mission_list_id--}}
                                        <tr class="danger">
                                            <td width="124px">{!! $mission_support_people_list->mission_name !!}</td>
                                            @if(isset($roles))
                                                <div style="display: none">
                                                    {!! $roles_count = count($roles)-4 !!}
                                                </div>
                                            {{--{!! dd($roles_count) !!}--}}
                                            {{--@for($i=1;$i<$roles_count;$i++)--}}
                                                {{--@if(!isset($mission_support_people_array[$mission_list->mission_list_id][$i]))--}}
                                                    {{--<td colspan="6"></td>--}}
                                                {{--@endif--}}
                                            {{--@endfor--}}
                                                @foreach($roles as $role)
                                                    @if($role->description != '系統管理者' && $role->description != '中央指揮官' && $role->description != '地方指揮官' && $role->description != '後勤部門')

                                                        @if (isset($mission_support_people_array) )
                                                            @if(isset($mission_support_people_array[$mission_support_people_list->mission_list_id]))
                                                                <div style="display: none">
                                                                    {!! $mission_support_people_array_count = count($mission_support_people_array[$mission_support_people_list->mission_list_id])+1 !!}
                                                                </div>
                                                                {{--@for($i=1;$i<$roles_count;$i++)--}}
                                                                <td class="text-right ">
                                                                    @for($j=1;$j<$mission_support_people_array_count;$j++)
                                                                        @if(isset($mission_support_people_array[$mission_support_people_list->mission_list_id][$j]))
                                                                            @if($mission_support_people_array[$mission_support_people_list->mission_list_id][$j]['role'] == $role->description)
                                                                               {!! $mission_support_people_array[$mission_support_people_list->mission_list_id][$j]['mission_support_people_num'] !!}
                                                                            @else

                                                                            @endif
                                                                        {{--@else--}}
                                                                        @endif
                                                                    @endfor

                                                                {{--@endfor--}}
                                                            @else
                                                                <td></td>
                                                            @endif

                                                        @endif

                                                    @endif
                                                @endforeach
                                            @endif
                                        </tr>
                                    @endif
                                @endforeach
                            @endif

                            @if(isset($mission_no_support_work_people_lists))
                                @foreach($mission_no_support_work_people_lists as  $key => $value)
                                    <tr class="warning">
                                        <td >{!! $value !!}</td>
                                        <td colspan="{!! $roles_count !!}"></td>
                                    <tr>
                                @endforeach
                            @endif

                        @if(isset($mission_no_support_finish_people_lists))
                            @foreach($mission_no_support_finish_people_lists as  $key => $value)
                                <tr class="success">
                                    <td>{!! $value !!}</td>
                                    <td colspan="{!! $roles_count !!}"></td>
                                <tr>
                            @endforeach
                        @endif

                        {{--<tr>--}}
                            {{--<td></td>--}}
                            {{--<td>脫困</td>--}}
                            {{--<td>救火</td>--}}
                            {{--<td>清潔</td>--}}
                            {{--<td>道路修復</td>--}}
                            {{--<td>醫療</td>--}}
                            {{--<td>管線修復</td>--}}
                            {{--<td>警戒</td>--}}
                        {{--</tr>--}}
                        {{--<tr class="danger">--}}
                            {{--<td>四維路段</td>--}}
                            {{--<td class="text-right">2</td>--}}
                            {{--<td class="text-right"></td>--}}
                            {{--<td class="text-right"></td>--}}
                            {{--<td class="text-right">1</td>--}}
                            {{--<td class="text-right"></td>--}}
                            {{--<td class="text-right"></td>--}}
                            {{--<td class="text-right"></td>--}}
                        {{--</tr>--}}


                        {{--<tr class="danger">--}}
                            {{--<td>五福路段</td>--}}
                            {{--<td class="text-right">3</td>--}}
                            {{--<td class="text-right">1</td>--}}
                            {{--<td class="text-right">1</td>--}}
                            {{--<td></td>--}}
                            {{--<td></td>--}}
                            {{--<td></td>--}}
                            {{--<td class="text-right">2</td>--}}
                        {{--</tr>--}}
                        {{--<tr class="warning">--}}
                            {{--<td>六合路段</td>--}}
                            {{--<td></td>--}}
                            {{--<td></td>--}}
                            {{--<td></td>--}}
                            {{--<td></td>--}}
                            {{--<td></td>--}}
                            {{--<td></td>--}}
                            {{--<td></td>--}}
                        {{--</tr>--}}
                        {{--<tr class="success">--}}
                            {{--<td>七賢路段</td>--}}
                            {{--<td></td>--}}
                            {{--<td></td>--}}
                            {{--<td></td>--}}
                            {{--<td></td>--}}
                            {{--<td></td>--}}
                            {{--<td></td>--}}
                            {{--<td></td>--}}
                        {{--</tr>--}}

                        </tbody>
                    </table>
                </div>
                {{--<pre>綠色:完成任務，返回中&nbsp;&nbsp;&nbsp;&nbsp;橘色:任務執行中&nbsp;&nbsp;&nbsp;&nbsp; 紅色:任務執行中且要求增援</pre>--}}
            </div>




        </div>
    </div>

@endsection
@section('javascript')

    <script language="JavaScript">
        $('.header').click(function(){
            $(this).toggleClass('expand').nextUntil('tr.header').slideToggle(100);
        });
        $('.header').trigger('click'); //trigger :觸發指定事件


    </script>
    <script>
        $(document).on('click','.btn-default', function(e){
            if($(this).closest('div').parent('div').attr('id').indexOf("busy")==0){
                add_person($(this).closest('div').find('input').val(), $(this).closest('div').find('span').eq(0).text(), $(this).closest('div').parent('div').attr('id'),true);
                $(this).closest('div').remove();
            }
            else if($(this).closest('div').parent('div').attr('id').indexOf("idle")==0){
                add_person($(this).closest('div').find('input').val(), $(this).closest('div').find('span').eq(1).text(), $(this).closest('div').parent('div').attr('id'),false);
                $(this).closest('div').remove();
            }
            else{} //其他class="btn-default"不用動作
        });
        {{--setInterval(function(){--}}
            {{--$.ajax({--}}
                {{--url: 'http://localhost:8000/local/mission/manage/chatRoom',--}}
                {{--type: 'GET',--}}
                {{--headers: {--}}
                    {{--'X-CSRF-Token': "{{ Session::token() }}"--}}
                {{--},--}}
                {{--success: function(response) {--}}
{{--//                    updateTable(response);--}}
                    {{--alert(response);--}}
                {{--},--}}
                {{--error: function(xhr) {--}}
                    {{--alert('Ajax request 發生錯誤');--}}
                {{--}--}}
            {{--});--}}
        {{--}, 3000);--}}
        $('li a').click(function(){
//            alert($(this).text());

            addChatBox($(this).text());
        });
        $('#Box0').parent().on('click','.glyphicon-remove',function(){
            $(this).closest('div').parent().remove();
//            alert("remove");
        });
        function add_person(id,name,div_id,isBusyTable)
        {
            if(isBusyTable){
                var obj=document.getElementById(div_id.replace(/busy/,"idle"));
                var div = document.createElement("div");
                div.setAttribute("class", "input-group");

                var span = document.createElement("span");
                span.setAttribute("class", "input-group-btn");


                var span_btn = document.createElement("button");
                span_btn.setAttribute("class", "btn btn-default");
                span_btn.setAttribute("type", "button");
                span_btn.innerHTML="+";

                span.appendChild(span_btn);
                div.appendChild(span);

                var hidden_input= document.createElement("input");
                hidden_input.name="free[]";
                hidden_input.value=id;
                hidden_input.setAttribute("type", "hidden");
                div.appendChild(hidden_input);

                var span = document.createElement("span");
                span.setAttribute("class", "form-control");
                span.innerHTML=name;

                div.appendChild(span);

                obj.appendChild(div);
            }
            else{
                var obj=document.getElementById(div_id.replace(/idle/,"busy"));
                var div = document.createElement("div");
                div.setAttribute("class", "input-group");


                var span = document.createElement("span");
                span.setAttribute("class", "form-control");
                span.innerHTML=name;

                div.appendChild(span);

                var span = document.createElement("span");
                span.setAttribute("class", "input-group-btn");

                var span_btn = document.createElement("button");
                span_btn.setAttribute("class", "btn btn-default");
                span_btn.setAttribute("type", "button");
                span_btn.innerHTML="-";

                span.appendChild(span_btn);
                div.appendChild(span);
                var hidden_input= document.createElement("input");
                hidden_input.name="mission[]";
                hidden_input.value=id;
                hidden_input.setAttribute("type", "hidden");
                div.appendChild(hidden_input);

                obj.appendChild(div);
            }

        }
        function addChatBox(name){
            var obj = document.getElementById("Box0").parentElement;

//            var chatBox = document.getElementById('Box2');
//            obj.removeChild(chatBox);
//            var chatBox = document.getElementById('Box1');
//            obj.removeChild(chatBox);

            var chatBox = document.createElement('div');
            chatBox.className = "panel panel-default chatBox";
            chatBox.setAttribute('id','Box1');

            var div = document.createElement('div');
            div.className = "panel-heading";
            var h4 = document.createElement('h4');
            h4.className = "panel-title";
            var span = document.createElement('span');
            span.className = "glyphicon glyphicon-user";
            span.setAttribute('style','width: 75%;');
            span.setAttribute('aria-hidden','true');
            span.innerHTML = name;
            h4.appendChild(span);
            var button = document.createElement('button');
            button.className = "btn btn-default btn-xs";
            button.setAttribute('type','button');
            button.setAttribute('data-toggle','collapse');
            button.setAttribute('data-target','#test'); //id
            button.setAttribute('aria-expanded','true');
            button.setAttribute('aria-controls','test'); //id
            var span = document.createElement('span');
            span.className = "glyphicon glyphicon-minus";
            button.appendChild(span);
            h4.appendChild(button);
            var button = document.createElement('button');
            button.className = "btn btn-default btn-xs";
            button.setAttribute('type','button');
            var span = document.createElement('span');
            span.className = "glyphicon glyphicon-remove";
            button.appendChild(span);
            h4.appendChild(button);
            div.appendChild(h4);
            chatBox.appendChild(div);


            var collapse = document.createElement('div');
            collapse.className = "panel-collapse collapse in";
            collapse.setAttribute('id','test'); //id
            var div = document.createElement('div');
            div.className = "panel-body chatBox-body";
            var table = document.createElement('table');
            table.className = "table table-nonbordered";
            var tbody = document.createElement('tbody');
            var tr = document.createElement('tr');
            var td = document.createElement('td');
            td.className = "active";
            td.innerHTML = "電線杆倒塌起火";
            tr.appendChild(td);
            var th = document.createElement('th');
            th.setAttribute('width','70px');
            tr.appendChild(th);
            tbody.appendChild(tr);
            table.appendChild(tbody);
            div.appendChild(table);
            collapse.appendChild(div);
            var div = document.createElement('div');
            div.className = "input-group";
            var input = document.createElement('input');
            input.className = "form-control";
            div.appendChild(input);
            var span = document.createElement('span');
            span.className ="input-group-btn";
            var button = document.createElement('button');
            button.className ="btn btn-default";
            button.innerHTML ="傳送";
            span.appendChild(button);
            div.appendChild(span);
            collapse.appendChild(div);
            chatBox.appendChild(collapse);

            obj.appendChild(chatBox);


        }
    </script>
@endsection
