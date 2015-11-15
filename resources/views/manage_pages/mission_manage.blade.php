@extends('manage_master')
@section('title')
    任務管理
@endsection
@section('link')
    {{--<li>{!! Html::link('call/manage', '通報管理') !!}</li>--}}
    <li class="active">{!! Html::link('mission/manage', '任務管理') !!}</li>
@endsection
@section('css')
    tr.header,tr.header_no_next
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
    .header_no_next .sign:after{
    content:"▼";
    display:inline-block;
    }
    .header_no_next.expand .sign:after{
    content:"▲";
    }
@endsection
@section('content')
    <div class="col-xs-16 col-sm-12 col-md-12" >
        <ul class="nav nav-tabs">
            <li  class="active"><a href="#call_tab" data-toggle="tab">民眾通報</a></li>
            <li><a href="#mission_tab" data-toggle="tab">任務進度</a></li>
            {{--<li><a href="#profile" data-toggle="tab">執行人員</a></li>--}}

        </ul>
        <br>
        <div class="tab-content">
            <div class="tab-pane" id="mission_tab">
                <div class="panel panel-default" >
                    <nav class="navbar-sm navbar-sm-default" role="navigation" style="min-height: 20px;">
                        <div class="navbar-sm-header">{{--標題--}}
                            <a class="navbar-sm-brand" href="#">任務進度列表</a>
                        </div>

                        {{--<div class="collapse navbar-sm-collapse" >--}}{{--上面按鈕欄--}}
                            {{--<ul class="nav navbar-sm-nav">--}}{{--上面按鈕欄內容 靠左對齊--}}
                                {{--<button type="button" class="btn btn-sm btn-default navbar-sm-btn">依時間排序</button>--}}
                                {{--<button type="button" class="btn btn-sm btn-default navbar-sm-btn">依地點排序</button>--}}
                                {{--<button type="button" class="btn btn-sm btn-default navbar-sm-btn">依進度排序</button>--}}
                            {{--</ul>--}}
                            {{--<ul class="nav navbar-sm-nav navbar-sm-right">--}}{{--上面按鈕欄內容 靠右對齊--}}
                            {{--</ul>--}}
                        {{--</div>--}}
                    </nav>
                    <div style="height: 450px;overflow-y: scroll;">{{--固定高度表格--}}
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th width="80px">日期</th>
                                <th width="45px">時間</th>
                                <th width="125px">任務地點</th>
                                <th width="80px">負責人</th>
                                {{--<th colspan="13">任務進度</th>--}}
                                <th width="145px" colspan="2">調派人員結束時間</th>
                                <th width="145px" colspan="2">到達任務現場時間</th>
                                <th width="145px" colspan="2">任務執行完成時間</th>
                                @if(isset($roles))
                                @foreach($roles as $role)
                                @if($role->description != '系統管理者' && $role->description != '中央指揮官' && $role->description != '地方指揮官' && $role->description != '後勤部門')
                                <th width="75px">{!! $role->description  !!}</th>
                                @endif
                                @endforeach
                                @endif
                            </tr>
                            {{--<tr>--}}
                                {{--<th>--}}
                                    {{--{!! Form::select('name', array('日期' => '日期'), '日期', []) !!}--}}
                                    {{--                            {!! Form::select('name', array('時間' => '時間'), '時間', []) !!}--}}
                                {{--</th>--}}
                                {{--<th>--}}
                                    {{--{!! Form::select('name', array('日期' => '日期'), '日期', []) !!}--}}
                                    {{--                            {!! Form::select('name', array('時間' => '時間'), '時間', []) !!}--}}
                                {{--</th>--}}
                                {{--<th>--}}
                                    {{--{!! Form::select('name', array('地點種類' => '地點種類'), '地點種類', []) !!}--}}
                                    {{--{!! Form::select('name', array('請選擇' => '請選擇'), '請選擇', []) !!}--}}
                                    {{--{!! Form::select('name', array('請選擇' => '請選擇'), '請選擇', []) !!}--}}
                                {{--</th>--}}
                                {{--<th></th>--}}
                                {{--<th colspan="2">調派人員結束時間</th>--}}
                                {{--<th colspan="2">到達任務現場時間</th>--}}
                                {{--<th colspan="2">任務執行完成時間</th>--}}
                                {{--@if(isset($roles))--}}
                                    {{--@foreach($roles as $role)--}}
                                        {{--@if($role->description != '系統管理者' && $role->description != '中央指揮官' && $role->description != '地方指揮官' && $role->description != '後勤部門')--}}
                                            {{--<th>{!! $role->description  !!}</th>--}}
                                        {{--@endif--}}
                                    {{--@endforeach--}}
                                {{--@endif--}}
                            {{--</tr>--}}
                            </thead>
                            <tbody>

                            @if (isset($mission_lists) )
                                @foreach ($mission_lists as $mission_list )
                                    @if ($mission_list->mission_name != "未分配任務")
                                        <tr>
                                            {{--<td width="14%">{{ (new Carbon\Carbon($mission->created_at))->formatLocalized('%Y/%m/%d') }}</td>--}}
                                            {{--<td width="14%">{{ (new Carbon\Carbon($mission->created_at))->formatLocalized('%H:%M:%S') }}</td>--}}
                                            <td>{{ (new Carbon\Carbon($mission_list->created_at))->formatLocalized('%Y/%m/%d') }}</td>
                                            <td>{{ (new Carbon\Carbon($mission_list->created_at))->formatLocalized('%H:%M') }}</td>
                                            <td>{!! $mission_list->mission_name!!}</td>
                                            <td>
                                                @if($mission_list_charge_Arrays[$mission_list->mission_list_id]['name'] == "")
                                                    {{--{!! dd($mission_list_charge_Array['name'] ) !!}}--}}
                                                    <button class="btn btn-default btn-sm" data-toggle="modal" data-target="#setCharge{!! $mission_list->mission_list_id!!}">
                                                        指派負責人
                                                    </button>
                                                @else
                                                    {!! $mission_list_charge_Arrays[$mission_list->mission_list_id]['name']  !!}
                                                @endif
                                            </td>
                                            <td colspan="6">
                                                @if($mission_list_charge_Arrays[$mission_list->mission_list_id]['name'] == "")

                                                @elseif(isset($mission_list->mission_complete_time))
                                                    <div class="progress">
                                                        <div class="progress-bar progress-bar-success" role="progressbar"
                                                             aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                                                            <p class="text-right">{{ (new Carbon\Carbon($mission_list->mission_complete_time))->formatLocalized('%Y/%m/%d') }}
                                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                {{ (new Carbon\Carbon($mission_list->mission_complete_time))->formatLocalized('%H:%M') }}
                                                                &nbsp;&nbsp;</p>
                                                        </div>
                                                    </div>

                                                @elseif(isset($mission_list->arrive_location_time))
                                                    <div class="progress">
                                                        <div class="progress-bar progress-bar-warning" role="progressbar"
                                                             aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 66%">
                                                            <p class="text-right">{{ (new Carbon\Carbon($mission_list->arrive_location_time))->formatLocalized('%Y/%m/%d') }}
                                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                {{ (new Carbon\Carbon($mission_list->arrive_location_time))->formatLocalized('%H:%M') }}
                                                                &nbsp;&nbsp;</p>
                                                        </div>
                                                    </div>

                                                @elseif(isset($mission_list->assign_people_finish_time))
                                                    <div class="progress">
                                                        <div class="progress-bar progress-bar-danger" role="progressbar"
                                                             aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 33%">
                                                            <p class="text-right">{{ (new Carbon\Carbon($mission_list->assign_people_finish_time))->formatLocalized('%Y/%m/%d') }}
                                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                {{ (new Carbon\Carbon($mission_list->assign_people_finish_time))->formatLocalized('%H:%M') }}
                                                                &nbsp;&nbsp;</p>
                                                        </div>
                                                    </div>
                                                @endif
                                            </td>
                                            @if(isset($roles))
                                                @foreach($roles as $role)
                                                    @if($role->description != '系統管理者' && $role->description != '中央指揮官' && $role->description != '地方指揮官' && $role->description != '後勤部門')

                                                        @if (isset($missionUserArrays) )
                                                            <td class="text-right ">{!! $missionUserArrays[$mission_list->mission_list_id][$role->slug] !!}</td>
                                                        @endif

                                                    @endif
                                                @endforeach
                                            @endif


                                        </tr>
                                    @endif
                                            <!-- Modal -->
                                        <div class="modal fade" id="setCharge{!! $mission_list->mission_list_id!!}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" style="width: 30%">
                                                <div class="modal-content">
                                                    {!! Form::open(array('url' => 'call/manage/updateMission'))!!}
                                                    {!! Form::hidden('mission_list_id',$mission_list->mission_list_id) !!}
                                                    <div class="modal-header ">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                        <h4 class="modal-title" id="myModalLabel"><b>指派負責人</b></h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        {!! Form::label('name','負責人姓名') !!}
                                                        {!! Form::text('name','',['class' => 'form-control']) !!}
                                                        {!! Form::hidden('setChargeId','') !!}
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">取消</button>
                                                        {!! Form::submit('指派負責人', ['class' => 'btn btn-primary']) !!}
                                                    </div>
                                                    {!! Form::close() !!}
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </div><!-- /.modal -->
                                @endforeach
                            @endif

                            </tbody>

                        </table>
                    </div>
                    {{--表格尾端--}}
                </div>
            </div>
            <div class="tab-pane active" id="call_tab">
                <div class="col-xs-8 col-sm-6 col-md-6" >
                    <div class="panel panel-default" >
                        {!! Form::open(array('url' => 'call/manage/save','id'=>'my_form'))!!}
                        <nav class="navbar-sm navbar-sm-default" role="navigation" style="min-height: 20px;">
                            <div class="navbar-sm-header">{{--標題--}}
                                <a class="navbar-sm-brand" href="#">尚未處理通報</a>
                            </div>

                            <div class="collapse navbar-sm-collapse" >{{--上面按鈕欄--}}
                                <ul class="nav navbar-sm-nav">{{--上面按鈕欄內容 靠左對齊--}}
                                    {!! Form::select('township_or_district', $mission_township, '選擇區', ['class' => 'navbar-sm-btn btn-sm','id' => 'township_or_district','onchange' => 'township_onchange()']) !!}
                                    {!! Form::select('rd_or_st', array('選擇路段' => '選擇路段'), '選擇路段', ['class' => 'navbar-sm-btn btn-sm','id' => 'rd_or_st']) !!}
                                </ul>

                                <ul class="nav navbar-sm-nav navbar-sm-right">{{--上面按鈕欄內容 靠右對齊--}}
                                    <button id="new_mission_list" type="button" class="btn btn-sm btn-default navbar-sm-btn">將通報新增成任務</button>
                                    {!! Form::select('mission_list_id', $mission_list_names, '將通報分配至現有任務', ['class' => 'navbar-sm-btn btn-sm','style'=>'width:170px;border: 1px solid #cccccc; border-radius: 4px;height: 30px;','onchange'=>'submit();']) !!}

                                </ul>
                            </div>
                        </nav>
                        <div style="height: 450px;overflow-y: scroll;">{{--固定高度表格--}}
                            <table class="table table-bordered">
                                <thead>

                                <tr>
                                    <th></th>
                                    <th width="80px">日期</th>
                                    <th width="45px">時間</th>
                                    <th width="125px">通報地點</th>
                                    {{--<th >通報日期/時間</th>--}}
                                    {{--<th >通報地址<br>--}}
                                    {{--@foreach ($country_or_cities as $country_or_city)--}}

                                    {{--<td>{!! $country_or_city!!}</td>--}}


                                    {{--@endforeach--}}
                                    {{--@if (isset($country_or_city_inputs) && isset($township_or_district_inputs))--}}

                                    {{--@foreach ($missions as $mission)--}}
                                    {{--{!! Form::select($mission->country_or_city_input,$mission->country_or_city_input) !!}--}}
                                    {{--{!! Form::open(array('url' => 'call/manage', 'method' => 'post')) !!}--}}
                                    {{--{!! Form::select('country',$country_or_city_inputs,'請選擇',['onchange' => 'this.form.submit()'] )!!}--}}
                                    {{--{!! Form::select('township',$township_or_district_inputs,'請選擇',['onchange' => 'this.form.submit()'])!!}--}}
                                    {{--{!! Form::close() !!}--}}
                                    {{--{!! dd($country_or_city_inputs) !!}--}}
                                    {{--{!! Form::select('country',$country_or_city_inputs,'請選擇')!!}--}}
                                    {{--{!! Form::select('country',$country_or_city_inputs,'請選擇')!!}--}}
                                    {{--{!! Form::select('township',$township_or_district_inputs,'請選擇')!!}--}}

                                    {{--@endif--}}
                                    {{--</th>--}}
                                    <th >通報內容</th>
                                    {{--<th >將通報分配至現有任務</th>--}}
                                </tr>
                                {{--<tr>--}}
                                {{--<th>--}}
                                {{--{!! Form::select('name', array('日期' => '日期'), '日期', []) !!}--}}
                                {{--{!! Form::select('name', array('時間' => '時間'), '時間', []) !!}--}}
                                {{--                                {!! Form::select('name', array('時間' => '時間'), '時間', []) !!}--}}
                                {{--</th>--}}

                                {{--<th>--}}
                                {{--{!! Form::select('name', array('地點種類' => '地點種類'), '地點種類', []) !!}--}}
                                {{--{!! Form::select('name', array('請選擇' => '請選擇'), '請選擇', []) !!}--}}
                                {{--{!! Form::select('name', array('請選擇' => '請選擇'), '請選擇', []) !!}--}}
                                {{--</th>--}}
                                {{--<th></th>--}}
                                {{--<th>--}}
                                {{--{!! Form::open(array('url' => 'call/manage/save', 'method' => 'post')) !!}--}}
                                {{--{!! Form::submit('分配至現有任務', ['class' => 'btn btn-default btn-sm']) !!}--}}
                                {{--</th>--}}
                                {{--</tr>--}}


                                </thead>
                                <tbody  id="unsigned_missions_table">
                                @if (isset($unsigned_missions))

                                    @foreach ($unsigned_missions as $unsigned_mission )
                                        <tr>
                                            <td>{!! Form::checkbox('call[]', $unsigned_mission->mission_id)!!}</td>
                                            <td>{{ (new Carbon\Carbon($unsigned_mission->created_at))->formatLocalized('%Y/%m/%d') }}</td>
                                            <td>{{ (new Carbon\Carbon($unsigned_mission->created_at))->formatLocalized('%H:%M') }}</td>

                                            @if(isset($unsigned_mission->rd_or_st_1) && isset($unsigned_mission->rd_or_st_2))
                                                <td >{!!$unsigned_mission->township_or_district_input." ".$unsigned_mission->rd_or_st_1."與".$unsigned_mission->rd_or_st_2."交叉口"!!}</td>
                                            @else
                                                <td >{!!$unsigned_mission->township_or_district_input." ".$unsigned_mission->rd_or_st_1.$unsigned_mission->location!!}</td>
                                            @endif
                                            <td >{!! $unsigned_mission->mission_content!!}</td>
                                            {{--<td width="25%">{!! $mission->country_or_city_input." ".$mission->township_or_district_input." ".$mission->location!!}</td>--}}

                                            {{--<td width="14%">{!! $mission->created_at!!}</td>--}}
                                            {{--<td width="14%">{{ (new Carbon\Carbon($mission->created_at))->formatLocalized('%Y/%m/%d') }}</td>--}}
                                            {{--<td width="14%">{{ (new Carbon\Carbon($mission->created_at))->formatLocalized('%H:%M:%S') }}</td>--}}
                                            {{--<td width="10%">{!! $mission->lname.$mission->fname!!}</td>--}}
                                            {{--<td width="10%">{!! $mission->phone!!}</td>--}}
                                            {{--<td width="10%">{!! $mission->email!!}</td>--}}


                                            {{--<td >{!! Form::select($unsigned_mission->mission_id,$mission_list_names, '請選擇',['class' => 'form-control']) !!}</td>--}}


                                            {{--<td  width="10%">--}}
                                            {{--<button class="btn btn-default btn-sm" data-toggle="modal" data-target="#createMissionBlock">--}}
                                            {{--創建新任務--}}
                                            {{--</button>--}}

                                            {{--</td>--}}

                                            {{--@if (isset($mission_names) && !isset($mission->mission_list_id) )--}}
                                            {{----}}
                                            {{--@endif--}}

                                        </tr>

                                    @endforeach

                                @endif


                                </tbody>
                            </table>
                            {!! Form::close() !!}
                        </div>
                        {{--表格尾端--}}
                    </div>

                </div>
                <div class="col-xs-8 col-sm-6 col-md-6" >
                    <div class="panel panel-default" >
                        <nav class="navbar-sm navbar-sm-default" role="navigation" style="min-height: 20px;">
                            <div class="navbar-sm-header">{{--標題--}}
                                <a class="navbar-sm-brand" href="#">目前尚未完成任務清單</a>
                            </div>

                            <div class="collapse navbar-sm-collapse" >{{--上面按鈕欄--}}
                                <ul class="nav navbar-sm-nav">{{--上面按鈕欄內容 靠左對齊--}}
                                    {{--{!! Form::select('name', array('選擇區' => '選擇區', '新興區' => '新興區', '復興區' => '復興區'), '選擇區', ['class' => 'navbar-sm-btn btn-sm']) !!}--}}
                                    {{--{!! Form::select('name', array('選擇路段' => '選擇路段', '中華路' => '中華路', '四維路' => '四維路'), '請選擇', ['class' => 'navbar-sm-btn btn-sm']) !!}--}}
                                </ul>
                                <ul class="nav navbar-sm-nav navbar-sm-right">{{--上面按鈕欄內容 靠右對齊--}}
                                    <!-- 說明按鈕 -->

                                    <a href="#" class="btn btn-default btn-sm navbar-sm-btn" data-toggle="popover" data-placement="bottom" data-trigger="hover" data-container="body"
                                       title="刪除說明"
                                       data-content="已開始執行任務，<br>不得進行刪除，請<br>與地方指揮官溝通<br>協調後再刪除。"
                                       data-html="true" role="button">刪除說明
                                    </a>
                                </ul>

                            </div>
                        </nav>
                        <div style="height: 450px;overflow-y: scroll;">{{--固定高度表格--}}
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    {{--<th></th>--}}
                                    <th width="80px">日期</th>
                                    <th width="45px">時間</th>
                                    <th width="125px">任務地點</th>
                                    <th colspan="4">通報內容</th>
                                </tr>
                                {{--<tr>--}}
                                    {{--<th>--}}
                                        {{--{!! Form::select('name', array('日期' => '日期'), '日期', []) !!}--}}
                                        {{--{!! Form::select('name', array('時間' => '時間'), '時間', []) !!}--}}
                                    {{--</th>--}}
                                    {{--<th>--}}
                                        {{--{!! Form::select('name', array('地點種類' => '地點種類'), '地點種類', []) !!}--}}
                                        {{--{!! Form::select('name', array('請選擇' => '請選擇'), '請選擇', []) !!}--}}
                                        {{--{!! Form::select('name', array('請選擇' => '請選擇'), '請選擇', []) !!}--}}
                                    {{--</th>--}}
                                    {{--<th></th>--}}
                                    {{--<th>日期</th>--}}
                                    {{--<th>時間</th>--}}
                                    {{--<th>內容</th>--}}
                                    {{--<th>通報人</th>--}}
                                {{--</tr>--}}
                                </thead>
                                <tbody>
                                @if (isset($mission_lists) )
                                    @foreach ($mission_lists as $mission_list )
                                        @if ($mission_list->mission_name != "未分配任務" && $mission_list->mission_complete_time == NULL)
                                            @if (isset($mission_contents_array[$mission_list->mission_list_id]) )
                                                <div style="display: none">
                                                    {!! $n = count($mission_contents_array[$mission_list->mission_list_id])+1 !!}
                                                </div>
                                                <tr style="border-top-width:2px; border-top-style:solid; border-top-color: #000000">
                                                    <td>{{ (new Carbon\Carbon($mission_list->created_at))->formatLocalized('%Y/%m/%d') }}</td>
                                                    <td>{{ (new Carbon\Carbon($mission_list->created_at))->formatLocalized('%H:%M') }}</td>
                                                    {{--<td>{{ (new Carbon\Carbon($mission_list->created_at))->formatLocalized('%y%m%d%H%M') }}</td>--}}
                                                    <td>{!! $mission_list->mission_name  !!}</td>
                                                    {{--@if($mission_list_charge_Arrays[$mission_list->mission_list_id]['name'] == "")--}}
                                                        {{--<td><button class="btn btn-default btn-sm" data-toggle="modal" data-target="#myModal">--}}
                                                                {{--指派負責人--}}
                                                            {{--</button></td>--}}
                                                    {{--@else--}}
                                                        {{--<td>{!! $mission_list_charge_Arrays[$mission_list->mission_list_id]['name'] !!}</td>--}}
                                                    {{--@endif--}}
                                                    {{--第一行任務--}}
                                                    {{--<td>{{ (new Carbon\Carbon($mission_contents_array[$mission_list->mission_list_id][1]['created_at']))->formatLocalized('%Y/%m/%d') }}</td>--}}

                                                    {{--<td>{{ (new Carbon\Carbon($mission_contents_array[$mission_list->mission_list_id][1]['created_at']))->formatLocalized('%H:%M') }}</td>--}}
                                                    <td>{!! $mission_contents_array[$mission_list->mission_list_id][1]['content']  !!}</td>

                                                    @if($mission_contents_array[$mission_list->mission_list_id][1]['sex'] == '男')

                                                        <td width="60px" style="border-right: none;">{!! $mission_contents_array[$mission_list->mission_list_id][1]['lname'].$mission_contents_array[$mission_list->mission_list_id][1]['fname'] !!}</td>
                                                        <td width="40px" style="border-left: none;"> 先生</td>
                                                    @elseif($mission_contents_array[$mission_list->mission_list_id][1]['sex'] == '女')
                                                        <td width="60px" style="border-right: none;">{!! $mission_contents_array[$mission_list->mission_list_id][1]['lname'].$mission_contents_array[$mission_list->mission_list_id][1]['fname'] !!}</td>
                                                        <td width="40px" style="border-left: none;">小姐</td>
                                                    @endif
                                                    <td width="80px">
                                                        {{--@if($mission_list_charge_Arrays[$mission_list->mission_list_id]['name'] == "")--}}
                                                            <!-- Button trigger modal -->
                                                            <a data-toggle="modal" data-target="#mission_list_update_Modal{!!$mission_list->mission_list_id!!}">
                                                                修改
                                                            </a>
                                                                <!-- Modal -->
                                                                <div class="modal fade" id="mission_list_update_Modal{!!$mission_list->mission_list_id!!}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                                    <div class="modal-dialog">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                                <h4 class="modal-title" id="myModalLabel">修改任務</h4>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                {!! Form::open(array('url' => 'call/manage/updateMission','onSubmit' => 'return checkForm();'))!!}
                                                                                {!! Form::hidden('mission_list_id',$mission_list->mission_list_id) !!}
                                                                                {!! Form::hidden('mission_num',$n-1) !!}
                                                                                <table class="table table-bordered">
                                                                                    <tr>
                                                                                        <th colspan="2">任務地點</th><td colspan="4">{!! Form::text('mission_name',$mission_list->mission_name,['style'=>'width:300px;border: 1px solid #cccccc; border-radius: 4px;height: 30px;','required']) !!}</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        @if($mission_list_charge_Arrays[$mission_list->mission_list_id]['name'] == "")
                                                                                            <th colspan="2">任務負責人</th><td colspan="4">{!! Form::text('mission_id',$mission_list_charge_Arrays[$mission_list->mission_list_id]['name'],['style'=>'width:300px;border: 1px solid #cccccc; border-radius: 4px;height: 30px;','placeholder' => '尚未指派負責人，請至任務進度指派' ,'disabled' => 'disabled']) !!}</td>
                                                                                        @else
                                                                                            <th colspan="2">任務負責人</th><td colspan="4">{!! Form::text('mission_id',$mission_list_charge_Arrays[$mission_list->mission_list_id]['name'],['style'=>'width:300px;border: 1px solid #cccccc; border-radius: 4px;height: 30px;','required']) !!}</td>
                                                                                            {!! Form::hidden('id',$mission_list->id) !!}
                                                                                            {!! Form::hidden('old_id',$mission_list->id) !!}
                                                                                        @endif
                                                                                    </tr>

                                                                                    <tr>
                                                                                        <th colspan="6">通報內容<font color="#ff0b11" size="1px">※如欲移除通報，請勾選欲移除之通報並按下修改即可</font></th>
                                                                                    </tr>
                                                                                    @for($i=1;$i<$n;$i++)

                                                                                        <tr>
                                                                                            <td>{!! Form::checkbox('call_to_remove_from_mission[]', $mission_contents_array[$mission_list->mission_list_id][$i]['id'])!!}</td>
                                                                                            <td>{!! $mission_contents_array[$mission_list->mission_list_id][$i]['id']  !!}</td>

                                                                                            @if(isset($mission_contents_array[$mission_list->mission_list_id][$i]['r1']) && isset($mission_contents_array[$mission_list->mission_list_id][$i]['r2']))
                                                                                                <td width="124px">{!! $mission_contents_array[$mission_list->mission_list_id][ $i]['township_or_district_input']." ".$mission_contents_array[$mission_list->mission_list_id][$i]['r1']."與".$mission_contents_array[$mission_list->mission_list_id][$i]['r2']."交叉口"!!}</td>
                                                                                            @else
                                                                                                <td width="124px">{!! $mission_contents_array[$mission_list->mission_list_id][ $i]['township_or_district_input']." ".$mission_contents_array[$mission_list->mission_list_id][$i]['r1'].$mission_contents_array[$mission_list->mission_list_id][ $i]['location'] !!}</td>
                                                                                            @endif
                                                                                            <td>{!! $mission_contents_array[$mission_list->mission_list_id][$i]['content']  !!}</td>

                                                                                            @if($mission_contents_array[$mission_list->mission_list_id][$i]['sex'] == '男')

                                                                                                <td style="border-right: none;">{!! $mission_contents_array[$mission_list->mission_list_id][$i]['lname'].$mission_contents_array[$mission_list->mission_list_id][$i]['fname'] !!}</td>
                                                                                                <td style="border-left: none;">先生</td>
                                                                                            @elseif($mission_contents_array[$mission_list->mission_list_id][$i]['sex'] == '女')
                                                                                                <td style="border-right: none;">{!! $mission_contents_array[$mission_list->mission_list_id][$i]['lname'].$mission_contents_array[$mission_list->mission_list_id][$i]['fname'] !!}</td>
                                                                                                <td style="border-left: none;">小姐</td>

                                                                                            @endif


                                                                                        </tr>
                                                                                    @endfor
                                                                                </table>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                {!! Form::submit('修改', ['class' => 'btn btn-primary','name' => 'updateMissionList']) !!}
                                                                                {!! Form::close() !!}
                                                                            </div>

                                                                        </div><!-- /.modal-content -->
                                                                    </div><!-- /.modal-dialog -->
                                                                </div><!-- /.modal -->
                                                                <!-- Modal -->
                                                        @if($mission_list->arrive_location_time == NULL)
                                                            /
                                                            <a data-toggle="modal" data-target="#mission_list_remove_Modal{!!$mission_list->mission_list_id!!}">
                                                                刪除
                                                            </a>
                                                            <!-- Modal -->
                                                            <div class="modal fade" id="mission_list_remove_Modal{!!$mission_list->mission_list_id!!}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                            <h4 class="modal-title" id="myModalLabel">刪除任務</h4>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            是否確認刪除此任務?<br>
                                                                            刪除整個任務後，內含所有<br>
                                                                            通報:將回到未處理通報中<br>
                                                                            工作人員:將狀態更改為任務返回中<br>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            {!! Form::open(array('url' => 'call/manage/destroyMission'))!!}
                                                                            {!! Form::hidden('mission_list_id',$mission_list->mission_list_id) !!}
                                                                            {!! Form::submit('確認刪除整個任務', ['class' => 'btn btn-danger']) !!}
                                                                            {!! Form::close() !!}
                                                                        </div>
                                                                    </div><!-- /.modal-content -->
                                                                </div><!-- /.modal-dialog -->
                                                            </div>
                                                            <!-- Modal -->

                                                        @endif
                                                    </td>
                                                </tr>

                                                {{--剩餘任務--}}
                                                @for($i=2;$i<$n;$i++)

                                                    <tr>
                                                        <td colspan="3"></td>
                                                        {{--<td>{{ (new Carbon\Carbon($mission_contents_array[$mission_list->mission_list_id][$i]['created_at']))->formatLocalized('%Y/%m/%d') }}</td>--}}

                                                        {{--<td>{{ (new Carbon\Carbon($mission_contents_array[$mission_list->mission_list_id][$i]['created_at']))->formatLocalized('%H:%M') }}</td>--}}
                                                        <td>{!! $mission_contents_array[$mission_list->mission_list_id][$i]['content']  !!}</td>

                                                        @if($mission_contents_array[$mission_list->mission_list_id][$i]['sex'] == '男')

                                                            <td style="border-right: none;">{!! $mission_contents_array[$mission_list->mission_list_id][$i]['lname'].$mission_contents_array[$mission_list->mission_list_id][$i]['fname'] !!}</td>
                                                            <td style="border-left: none;">先生</td>
                                                        @elseif($mission_contents_array[$mission_list->mission_list_id][$i]['sex'] == '女')
                                                            <td style="border-right: none;">{!! $mission_contents_array[$mission_list->mission_list_id][$i]['lname'].$mission_contents_array[$mission_list->mission_list_id][$i]['fname'] !!}</td>
                                                            <td style="border-left: none;">小姐</td>

                                                        @endif
                                                        <td></td>

                                                    </tr>
                                                @endfor
                                                    @else
                                                        <tr><td colspan="7"></td></tr>

                                            @endif
                                                    {{--<td>150929073202</td>--}}
                                                    {{--<td>三多民權交叉路口</td>--}}
                                                    {{--<td>謝卸</td>--}}
                                                    {{--<td>2015/09/29</td><td>08:14</td>--}}
                                                    {{--<td>變電箱起火</td><td>陳先生</td>--}}


                                        @endif
                                    @endforeach
                                @endif
                                                    {{--<tr style="border-top-width:2px; border-top-style:solid; border-top-color: #000000">--}}
                                                    {{--<td>150929073201</td>--}}
                                                    {{--<td>四維林森交叉路口</td>--}}
                                                    {{--<td>謝卸</td>--}}
                                                    {{--<td>2015/09/29</td><td>08:14</td>--}}
                                                    {{--<td>路樹倒塌</td><td>吳小姐</td>--}}
                                                    {{--</tr>--}}
                                                    {{--<tr>--}}
                                                    {{--<td colspan="3"></td>--}}
                                                    {{--<td>2015/09/29</td><td>08:14</td>--}}
                                                    {{--<td>路樹倒塌</td><td>吳小姐</td>--}}
                                                    {{--</tr>--}}
                                                    {{--<tr>--}}
                                                    {{--<td colspan="3"></td>--}}
                                                    {{--<td>2015/09/29</td><td>08:14</td>--}}
                                                    {{--<td>路樹倒塌</td><td>吳小姐</td>--}}
                                                    {{--</tr>--}}
                                                    {{--<tr>--}}
                                                    {{--<td colspan="3"></td>--}}
                                                    {{--<td>2015/09/29</td><td>08:14</td>--}}
                                                    {{--<td>路樹倒塌</td><td>吳小姐</td>--}}
                                                    {{--</tr>--}}

                                </tbody>
                            </table>
                        </div>
                        {{--表格尾端--}}


                    </div>


                </div>

            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="new_mission_list_Modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
        <div class="modal-dialog">
            {!! Form::open(array('url' => 'call/manage/createMission','id'=>'my_form'))!!}
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">將通報新增成任務</h4>
                </div>
                <div id="new_mission_list_Modal_content" class="modal-body">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                    {{--<button type="button" class="btn btn-primary">確認將通報新增成任務</button>--}}
                    {!! Form::submit('確認將通報新增成任務', ['class' => 'btn btn-primary']) !!}
                </div>
            </div><!-- /.modal-content -->
            {!! Form::close() !!}
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <!-- Modal -->

    <div class="modal fade" id="error_Modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">錯誤訊息</h4>
                </div>
                <div id="error_Modal_content" class="modal-body">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">關閉</button>
                    {{--<button type="button" class="btn btn-primary">Save changes</button>--}}
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->


@endsection


@section('javascript')
    <script>
        var local_data = {!! json_encode($local) !!}; //controller傳來的陣列轉乘javascript陣列
        var localUserName = Array();
        for(var i=0;i<local_data.length;i++){
            localUserName[i] = {
                value:local_data[i]['id']+"_"+local_data[i]['user_name']+"_"+local_data[i]['phone'],
                label:local_data[i]['id']+"　"+local_data[i]['user_name']+"　"+local_data[i]['phone']
            };
        }

        for(var i=0; i<$('div .modal').length; i++){
            var div = "#" + $('div .modal').eq(i).attr('id');
            $(div).find("input[name='name']").autocomplete({
                source: localUserName,
                appendTo: div,
                minLength: 0,
                select: function(event,ui){
                    var temp_local_data = ui.item.value.split("_");
                    $(this).val(temp_local_data[1]);
                    $(this).closest('div').find("input[name='setChargeId']").val(temp_local_data[0]);
                    return false;
                }
            }).focus(function() {
                $(this).autocomplete("search", $(this).val());
            });

            $(div).find("input[name='mission_id']").autocomplete({
                source: localUserName,
                appendTo: div,
                minLength: 0,
                select: function(event,ui){
                    var temp_local_data = ui.item.value.split("_");
                    $(this).val(temp_local_data[1]);
                    $(this).closest('div').find("input[name='id']").val(temp_local_data[0]);
                    return false;
                }
            }).focus(function() {
                $(this).autocomplete("search", $(this).val());
            });

        }

        var unsigned_missions_location = Array();
        for(var i=0; i<$('#unsigned_missions_table').find('tr').length; i++){
            unsigned_missions_location[i] = $('#unsigned_missions_table').find('tr').eq(i).find('td').eq(3).text();
        }
        $('#township_or_district, #rd_or_st').change(function(){
            for(var i=0; i<$('#unsigned_missions_table').find('tr').length; i++){
                if($('#township_or_district').find(':selected').text() == "選擇區"){
                    $('#unsigned_missions_table').find('tr').eq(i).show();
                }
                else if(unsigned_missions_location[i].indexOf($('#township_or_district').find(':selected').text()) != -1){
                    if($('#rd_or_st').find(':selected').text() == "選擇路段"){
                        $('#unsigned_missions_table').find('tr').eq(i).show();
                    }
                    else if(unsigned_missions_location[i].indexOf($('#rd_or_st').find(':selected').text()) != -1){
                        $('#unsigned_missions_table').find('tr').eq(i).show();
                    }
                    else{
                        $('#unsigned_missions_table').find('tr').eq(i).hide();
                    }
                }
                else{
                    $('#unsigned_missions_table').find('tr').eq(i).hide();
                }
            }
        });


    </script>
    <script language="JavaScript">
        $('.header').click(function(){
            $(this).toggleClass('expand').next().nextUntil('tr.header').slideToggle(100);
        });
        $('.header').trigger('click'); //trigger :觸發指定事件
        $('.header_no_next').click(function(){
            $(this).toggleClass('expand').nextUntil('tr.header_no_next').slideToggle(100);
        });
        $('.header_no_next').trigger('click'); //trigger :觸發指定事件

    </script>
    <script language="JavaScript">
        var mission_num = 0;
        var checked_num = 0;
//        var canChange = false;
        $("input[name='updateMissionList']").click(function(){
            mission_num = $(this).parent().parent().find("input[name='mission_num']").val();
            checked_num = $(this).parent().parent().find('input:checked').length;
//            if(typeof  $(this).parent().parent().find("input[name='old_id']").val() === "undefined"){}
//            else{
//                canChange = true;
//            }
        });

        function checkForm()
        {
            if(mission_num - checked_num == 0){
//                alert("一個任務內至少要有一個通報");
                var obj = document.getElementById("error_Modal_content");
                obj.innerHTML = "一個任務內至少要有一個通報";
                $('#error_Modal').modal('show');
                return false;
            }
//            if(!canChange){
//                alert("只能");
//                return false;
//            }
            return true;
        }


        $('#new_mission_list').click(function(){
           if($('#unsigned_missions_table').find("input:checked").length == 1)
           {
               var obj = document.getElementById("new_mission_list_Modal_content");
               while(obj.firstChild){
                   obj.removeChild(obj.firstChild)
               }
//               obj.innerHTML = $('#unsigned_missions_table').find("input:checked").closest('tr').find('td').eq(3).text();
               var dl = document.createElement('dl');
               dl.setAttribute('class','dl-horizontal');
               var dt = document.createElement('dt');
               dt.innerHTML ="任務地點";
               dl.appendChild(dt);
               var dd = document.createElement('dd');
               var input = document.createElement('input');
               input.setAttribute('class','form-control');
               input.setAttribute('name','new_mission_name');
               input.setAttribute('value', $('#unsigned_missions_table').find("input:checked").closest('tr').find('td').eq(3).text());
               dd.appendChild(input);
               var input = document.createElement('input');
               input.setAttribute('name','mission_id');
               input.setAttribute('type','hidden');
               input.setAttribute('value', $('#unsigned_missions_table').find("input:checked").attr('value'));
               dd.appendChild(input);
               dl.appendChild(dd);
               var br = document.createElement('br');
               dl.appendChild(br);
               var dt = document.createElement('dt');
               dt.innerHTML ="通報內容";
               dl.appendChild(dt);
               var dd = document.createElement('dd');
               dd.innerHTML =$('#unsigned_missions_table').find("input:checked").closest('tr').find('td').eq(4).text();
               dl.appendChild(dd);


           obj.appendChild(dl);
               $('#new_mission_list_Modal').modal('show');
           }
           else if($('#unsigned_missions_table').find("input:checked").length == 0)
           {
               var obj = document.getElementById("error_Modal_content");
               obj.innerHTML = "您並未勾選欲新增為任務之通報，請先勾選通報後再進行新增。";

               $('#error_Modal').modal('show');
//               alert("未勾選欲新增為任務之通報");
           }
            else
           {
               var obj = document.getElementById("error_Modal_content");
               obj.innerHTML = "您勾選的通報數超過一個，一次只能新增一筆通報為一個任務。";
               $('#error_Modal').modal('show');
//               alert("一次只能新增一筆通報為一個任務");

           }
        });
        /*讀取通報所在的區及路，並將區和路對應 */
        var read_road ={!! json_encode($mission_road) !!};
        var read_township ={!! json_encode($mission_township) !!};
        var rd_array = new Array(read_township.length);
        rd_array[0] = ['選擇路段'];
        for(var i=1; i<rd_array.length; i++){
            var temp_array = new Array('選擇路段');
            for(var j=0; j<read_road.length; j++){
                if(read_road[j]['township_or_district_input'] == read_township[i]){
                    if(read_road[j]['rd_or_st_1'] != null && temp_array.indexOf(read_road[j]['rd_or_st_1']) == -1){
                        temp_array.push(read_road[j]['rd_or_st_1']);
                    }
                    if(read_road[j]['rd_or_st_2'] != null && temp_array.indexOf(read_road[j]['rd_or_st_2']) == -1){
                        temp_array.push(read_road[j]['rd_or_st_2']);
                    }
                }
            }
            rd_array[i] = temp_array;
        }
        function township_onchange() {
            var index = $('#township_or_district').find(':selected').index();
            $("#rd_or_st option").remove();
            for (j = 0; j < rd_array[index].length; j ++) {
                $("#rd_or_st").append($("<option></option>").text(rd_array[index][j]) );
            }
        }

    </script>



@endsection
