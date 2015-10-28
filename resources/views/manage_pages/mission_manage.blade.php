@extends('manage_master')
@section('title')
    任務管理
@endsection
@section('link')
    {{--<li>{!! Html::link('call/manage', '通報管理') !!}</li>--}}
    <li>{!! Html::link('mission/manage', '任務管理') !!}</li>
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

                        <div class="collapse navbar-sm-collapse" >{{--上面按鈕欄--}}
                            <ul class="nav navbar-sm-nav">{{--上面按鈕欄內容 靠左對齊--}}
                                <button type="button" class="btn btn-sm btn-default navbar-sm-btn">依時間排序</button>
                                <button type="button" class="btn btn-sm btn-default navbar-sm-btn">依地點排序</button>
                                <button type="button" class="btn btn-sm btn-default navbar-sm-btn">依進度排序</button>
                            </ul>
                            <ul class="nav navbar-sm-nav navbar-sm-right">{{--上面按鈕欄內容 靠右對齊--}}
                            </ul>
                        </div>
                    </nav>
                    <div style="height: 450px;overflow-y: scroll;">{{--固定高度表格--}}
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th width="80px">日期</th>
                                <th width="45px">時間</th>
                                <th width="125px">任務地點</th>
                                <th width="50px">負責人</th>
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
                                                    <button class="btn btn-default btn-sm" data-toggle="modal" data-target="#myModal">
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
                                @endforeach
                            @endif
                            <!-- Modal -->
                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog" style="width: 80%">
                                    <div class="modal-content">
                                        {!! Form::open(array('url' => 'victim/EMT/create', 'method' => 'post','class' => 'form-horizontal','onSubmit' => 'return checkForm();')) !!}
                                        <div class="modal-header ">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel"><b>新增災民資料</b></h4>
                                        </div>
                                        <div class="modal-body">
                                            {!! Form::text('now_location','',['class' => 'form-control']) !!}
                                            {!! Form::label('writein','',['class' => 'form-control','disabled' => 'disabled']) !!}
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">取消</button>
                                        </div>
                                        {!! Form::close() !!}
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div><!-- /.modal -->
                            </tbody>

                        </table>
                    </div>
                    {{--表格尾端--}}
                </div>
            </div>
            <div class="tab-pane active" id="call_tab">
                <div class="col-xs-8 col-sm-6 col-md-6" >
                    <div class="panel panel-default" >
                        <nav class="navbar-sm navbar-sm-default" role="navigation" style="min-height: 20px;">
                            <div class="navbar-sm-header">{{--標題--}}
                                <a class="navbar-sm-brand" href="#">尚未處理通報</a>
                            </div>

                            <div class="collapse navbar-sm-collapse" >{{--上面按鈕欄--}}
                                <ul class="nav navbar-sm-nav">{{--上面按鈕欄內容 靠左對齊--}}
                                    {!! Form::select('name', array('選擇區' => '選擇區', '新興區' => '新興區', '復興區' => '復興區'), '選擇區', ['class' => 'navbar-sm-btn btn-sm']) !!}
                                    {!! Form::select('name', array('選擇路段' => '選擇路段', '中華路' => '中華路', '四維路' => '四維路'), '請選擇', ['class' => 'navbar-sm-btn btn-sm']) !!}
                                </ul>

                                <ul class="nav navbar-sm-nav navbar-sm-right">{{--上面按鈕欄內容 靠右對齊--}}
                                    <button type="button" class="btn btn-sm btn-default navbar-sm-btn">將通報新增成任務</button>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-default  navbar-sm-btn dropdown-toggle" data-toggle="dropdown">
                                            將通報分配至現有任務 <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu" role="menu">
                                            <li><a href="#">四維</a></li>
                                            <li><a href="#">五福</a></li>
                                        </ul>
                                    </div>
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
                                    <th width="125px">任務地點</th>
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
                                <tbody>
                                @if (isset($unsigned_missions))

                                    @foreach ($unsigned_missions as $unsigned_mission )
                                        <tr>
                                            <td>{!! Form::checkbox('name', 'value')!!}</td>
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
                                        <tr>

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
                                <a class="navbar-sm-brand" href="#">尚未處理通報</a>
                            </div>

                            <div class="collapse navbar-sm-collapse" >{{--上面按鈕欄--}}
                                <ul class="nav navbar-sm-nav">{{--上面按鈕欄內容 靠左對齊--}}
                                    {!! Form::select('name', array('選擇區' => '選擇區', '新興區' => '新興區', '復興區' => '復興區'), '選擇區', ['class' => 'navbar-sm-btn btn-sm']) !!}
                                    {!! Form::select('name', array('選擇路段' => '選擇路段', '中華路' => '中華路', '四維路' => '四維路'), '請選擇', ['class' => 'navbar-sm-btn btn-sm']) !!}
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
                                    <th colspan="6">通報內容</th>
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
                                        @if ($mission_list->mission_name != "未分配任務")
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

                                                        <td style="border-right: none;">{!! $mission_contents_array[$mission_list->mission_list_id][1]['lname'].$mission_contents_array[$mission_list->mission_list_id][1]['fname'] !!}</td>
                                                        <td style="border-left: none;"> 先生</td>
                                                    @elseif($mission_contents_array[$mission_list->mission_list_id][1]['sex'] == '女')
                                                        <td style="border-right: none;">{!! $mission_contents_array[$mission_list->mission_list_id][1]['lname'].$mission_contents_array[$mission_list->mission_list_id][1]['fname'] !!}</td>
                                                        <td style="border-left: none;">小姐</td>
                                                    @endif


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
                                                @endfor
                                                    </tr>
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


@endsection


@section('javascript')
    <script>
        var local_data = {!! json_encode($local) !!}; //controller傳來的陣列轉乘javascript陣列
        var localUserName = Array();
        for(var i=0;i<local_data.length;i++){
            localUserName[i] = {value:local_data[i]['user_name'],label:local_data[i]['user_name']};
        }

        for(var i=0; i<$('div .modal').length; i++){
            var div = "#" + $('div .modal').eq(i).attr('id');
            $(div).find("input[name='now_location']").autocomplete({
                source: localUserName,
                appendTo: div,
                minLength: 0,
                select: function(event,ui){
                    $(div).find("input[name='writein']").val(ui.item.value);
                    return false;
                }
            });
            $(div).find("input[name='now_location']").click(function(){
                $(div).find("input[name='now_location']").keydown();
            });
        }
//        $("input[name='now_location']").click(function(e){ $('#' + e.target.id).keydown() });
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

@endsection
