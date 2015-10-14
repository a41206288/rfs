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

    {{--<div class="col-xs-10 col-sm-8 col-md-8" >--}}
        <ul class="nav nav-tabs">
            <li class="active"><a href="#home" data-toggle="tab">任務進度</a></li>
            {{--<li><a href="#profile" data-toggle="tab">執行人員</a></li>--}}
            <li><a href="#call" data-toggle="tab">通報內容</a></li>
        </ul>
        <br>
        <div class="tab-content">
            <div class="tab-pane active" id="home">

                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th width="10%">任務時間</th>
                        <th width="10%">任務地點</th>
                        <th width="5%">負責人</th>
                        <th width="50%" colspan="13">任務進度</th>
                    </tr>
                    <tr>
                        <th>
                            {!! Form::select('name', array('日期' => '日期'), '日期', []) !!}
{{--                            {!! Form::select('name', array('時間' => '時間'), '時間', []) !!}--}}
                        </th>
                        <th>
                            {{--{!! Form::select('name', array('地點種類' => '地點種類'), '地點種類', []) !!}--}}
                            {!! Form::select('name', array('請選擇' => '請選擇'), '請選擇', []) !!}
                            {!! Form::select('name', array('請選擇' => '請選擇'), '請選擇', []) !!}
                        </th>
                        <th></th>
                        <th colspan="2">調派人員結束時間</th>
                        <th colspan="2">到達任務現場時間</th>
                        <th colspan="2">任務執行完成時間</th>
                        <th>脫困</th>
                        <th>救火</th>
                        <th>清潔</th>
                        <th>道路修復</th>
                        <th>醫療</th>
                        <th>管線修復</th>
                        <th>警戒</th>
                    </tr>
                    </thead>
                    <tbody>

                    @if (isset($mission_lists) )
                        @foreach ($mission_lists as $mission_list )
                            @if ($mission_list->mission_name != "未分配任務")
                            <tr>
                                {{--<td width="14%">{{ (new Carbon\Carbon($mission->created_at))->formatLocalized('%Y/%m/%d') }}</td>--}}
                                {{--<td width="14%">{{ (new Carbon\Carbon($mission->created_at))->formatLocalized('%H:%M:%S') }}</td>--}}
                                <td>{{ (new Carbon\Carbon($mission_list->created_at))->formatLocalized('%Y/%m/%d') }}
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    {{ (new Carbon\Carbon($mission_list->created_at))->formatLocalized('%H:%M') }}</td>
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
                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    {{ (new Carbon\Carbon($mission_list->assign_people_finish_time))->formatLocalized('%H:%M') }}
                                                    &nbsp;&nbsp;</p>
                                            </div>
                                        </div>

                                    @endif
                                </td>
                            </tr>
                            @endif
                      @endforeach
                    @endif
                    {{--<tr>--}}
                        {{--<td>15/09/29&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;07:32</td>--}}
                        {{--<td>三多民權交叉路口</td>--}}
                        {{--<td>謝卸</td>--}}
                        {{--<td colspan="6">--}}
                            {{--<div class="progress">--}}
                                {{--<div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 66%">--}}
                                    {{--<p class="text-right">2015/09/30 07:30 &nbsp;&nbsp;</p>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</td>--}}
                        {{--<td class="text-right warning">2</td>--}}
                        {{--<td></td>--}}
                        {{--<td class="text-right danger">2</td>--}}
                        {{--<td class="text-right danger">3</td>--}}
                        {{--<td></td>--}}
                        {{--<td class="text-right success">1</td>--}}
                        {{--<td class="text-right warning">2</td>--}}
                    {{--</tr>--}}
                    {{--<tr>--}}
                        {{--<td>15/09/29&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;07:32</td>--}}
                        {{--<td>四維林森交叉路口</td>--}}
                        {{--<td>謝卸</td>--}}
                        {{--<td  colspan="6">--}}
                            {{--<div class="progress">--}}
                                {{--<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 100%">--}}
                                    {{--<p class="text-right">2015/09/30 07:30 &nbsp;&nbsp;</p>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</td>--}}
                        {{--<td class="text-right success">2</td>--}}
                        {{--<td class="text-right success">2</td>--}}
                        {{--<td class="text-right warning">2</td>--}}
                        {{--<td></td>--}}
                        {{--<td></td>--}}
                        {{--<td></td>--}}
                        {{--<td></td>--}}
                    {{--</tr>--}}

                    </tbody>

                </table>

            </div>
            {{--<div class="tab-pane" id="profile">--}}
                {{--<table class="table table-bordered">--}}
                {{--<thead>--}}
                {{--<tr>--}}
                    {{--<th width="16%">任務編號</th>--}}
                    {{--<th width="20%">任務地點</th>--}}
                    {{--<th width="14%">負責人</th>--}}
                    {{--<th width="50%" colspan="7">任務執行人員 (單位: 人)</th>--}}
                {{--</tr>--}}
                {{--<tr>--}}
                    {{--<th>--}}
                        {{--{!! Form::select('name', array('日期' => '日期'), '日期', []) !!}--}}
{{--                        {!! Form::select('name', array('時間' => '時間'), '時間', []) !!}--}}
                    {{--</th>--}}
                    {{--<th>--}}
                        {{--{!! Form::select('name', array('地點種類' => '地點種類'), '地點種類', []) !!}--}}
                        {{--{!! Form::select('name', array('請選擇' => '請選擇'), '請選擇', []) !!}--}}
                        {{--{!! Form::select('name', array('請選擇' => '請選擇'), '請選擇', []) !!}--}}
                    {{--</th>--}}
                    {{--<th></th>--}}
                    {{--<th>脫困</th>--}}
                    {{--<th>救火</th>--}}
                    {{--<th>清潔</th>--}}
                    {{--<th>道路修復</th>--}}
                    {{--<th>醫療</th>--}}
                    {{--<th>管線修復</th>--}}
                    {{--<th>警戒</th>--}}
                {{--</tr>--}}
                {{--</thead>--}}
                {{--<tbody>--}}
                {{--<tr>--}}
                    {{--<td>150929073201</td>--}}
                    {{--<td>三多民權交叉路口</td>--}}
                    {{--<td>謝卸</td>--}}
                    {{--<td class="text-right warning">2</td>--}}
                    {{--<td></td>--}}
                    {{--<td class="text-right danger">2</td>--}}
                    {{--<td class="text-right danger">3</td>--}}
                    {{--<td></td>--}}
                    {{--<td class="text-right success">1</td>--}}
                    {{--<td class="text-right warning">2</td>--}}
                {{--</tr>--}}
                {{--<tr>--}}
                    {{--<td>150929073201</td>--}}
                    {{--<td>四維林森交叉路口</td>--}}
                    {{--<td>謝卸</td>--}}
                    {{--<td class="text-right success">2</td>--}}
                    {{--<td class="text-right success">2</td>--}}
                    {{--<td class="text-right warning">2</td>--}}
                    {{--<td></td>--}}
                    {{--<td></td>--}}
                    {{--<td></td>--}}
                    {{--<td></td>--}}
                {{--</tr>--}}
                {{--</tbody>--}}

                {{--</table>--}}

            {{--</div>--}}
            <div class="tab-pane" id="call">
                <div class="col-xs-10 col-sm-8 col-md-8" >

                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th width="16%">任務編號</th>
                        <th width="20%">任務地點</th>
                        <th width="14%">負責人</th>
                        <th width="50%" colspan="6">通報內容</th>
                    </tr>
                    <tr>
                        <th>
                            {!! Form::select('name', array('日期' => '日期'), '日期', []) !!}
                            {{--{!! Form::select('name', array('時間' => '時間'), '時間', []) !!}--}}
                        </th>
                        <th>
                            {{--{!! Form::select('name', array('地點種類' => '地點種類'), '地點種類', []) !!}--}}
                            {!! Form::select('name', array('請選擇' => '請選擇'), '請選擇', []) !!}
                            {!! Form::select('name', array('請選擇' => '請選擇'), '請選擇', []) !!}
                        </th>
                        <th></th>
                        <th>日期</th>
                        <th>時間</th>
                        <th>內容</th>
                        <th>通報人</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr style="border-top-width:2px; border-top-style:solid; border-top-color: #000000">
                        <td>150929073202</td>
                        <td>三多民權交叉路口</td>
                        <td>謝卸</td>
                        <td>2015/09/29</td><td>08:14</td>
                        <td>變電箱起火</td><td>陳先生</td>

                    </tr>
                    <tr style="border-top-width:2px; border-top-style:solid; border-top-color: #000000">
                        <td>150929073201</td>
                        <td>四維林森交叉路口</td>
                        <td>謝卸</td>
                        <td>2015/09/29</td><td>08:14</td>
                        <td>路樹倒塌</td><td>吳小姐</td>
                    </tr>
                    <tr>
                        <td colspan="3"></td>
                        <td>2015/09/29</td><td>08:14</td>
                        <td>路樹倒塌</td><td>吳小姐</td>
                    </tr>
                    <tr>
                        <td colspan="3"></td>
                        <td>2015/09/29</td><td>08:14</td>
                        <td>路樹倒塌</td><td>吳小姐</td>
                    </tr>
                    <tr>
                        <td colspan="3"></td>
                        <td>2015/09/29</td><td>08:14</td>
                        <td>路樹倒塌</td><td>吳小姐</td>
                    </tr>
                    
                    </tbody>

                </table>
                </div>
                <div class="col-xs-6 col-sm-4 col-md-4" >
                <table class="table table-bordered">
                    <thead>

                    <tr>
                        <th width="20%">通報時間</th>
                        <th width="40%">通報地址<br>
                            {{--@foreach ($country_or_cities as $country_or_city)--}}

                            {{--<td>{!! $country_or_city!!}</td>--}}


                            {{--@endforeach--}}
                            @if (isset($country_or_city_inputs) && isset($township_or_district_inputs))

                                {{--@foreach ($missions as $mission)--}}
                                {{--{!! Form::select($mission->country_or_city_input,$mission->country_or_city_input) !!}--}}
                                {!! Form::open(array('url' => 'call/manage', 'method' => 'post')) !!}
                                {!! Form::select('country',$country_or_city_inputs,'請選擇',['onchange' => 'this.form.submit()'] )!!}
                                {!! Form::select('township',$township_or_district_inputs,'請選擇',['onchange' => 'this.form.submit()'])!!}
                                {!! Form::close() !!}
                                {{--{!! dd($country_or_city_inputs) !!}--}}
                                {{--{!! Form::select('country',$country_or_city_inputs,'請選擇')!!}--}}
                                {{--{!! Form::select('country',$country_or_city_inputs,'請選擇')!!}--}}
                                {{--{!! Form::select('township',$township_or_district_inputs,'請選擇')!!}--}}

                            @endif
                        </th>
                        <th width="40%">通報內容</th>

                    </tr>
                    <tr>
                        <th>
                            {!! Form::select('name', array('日期' => '日期'), '日期', []) !!}
                            {{--                                {!! Form::select('name', array('時間' => '時間'), '時間', []) !!}--}}
                        </th>
                        <th>
                            {{--{!! Form::select('name', array('地點種類' => '地點種類'), '地點種類', []) !!}--}}
                            {!! Form::select('name', array('請選擇' => '請選擇'), '請選擇', []) !!}
                            {!! Form::select('name', array('請選擇' => '請選擇'), '請選擇', []) !!}
                        </th>
                        <th>
                            {!! Form::open(array('url' => 'call/manage/save', 'method' => 'post')) !!}
                            {!! Form::submit('分配至現有任務', ['class' => 'btn btn-default btn-sm']) !!}
                        </th>
                    </tr>

                    </thead>
                    <tbody>
                    @if (isset($missions))

                        @foreach ($missions as $mission )
                            <tr>
                                @if (isset($mission) )

                                    <td width="10%">{!! $mission->mission_id!!}</td>
                                    <td width="25%">{!! $mission->mission_content!!}</td>
                                    {{--<td width="25%">{!! $mission->country_or_city_input." ".$mission->township_or_district_input." ".$mission->location!!}</td>--}}
                                    <td width="30%">{!!$mission->township_or_district_input." ".$mission->location!!}</td>
                                    {{--<td width="14%">{!! $mission->created_at!!}</td>--}}
                                    {{--<td width="14%">{{ (new Carbon\Carbon($mission->created_at))->formatLocalized('%Y/%m/%d') }}</td>--}}
                                    {{--<td width="14%">{{ (new Carbon\Carbon($mission->created_at))->formatLocalized('%H:%M:%S') }}</td>--}}
                                    {{--<td width="10%">{!! $mission->lname.$mission->fname!!}</td>--}}
                                    {{--<td width="10%">{!! $mission->phone!!}</td>--}}
                                    {{--<td width="10%">{!! $mission->email!!}</td>--}}
                                    <td width="25%">{!! Form::select($mission->mission_id,$mission_names, '請選擇',['class' => 'form-control']) !!}</td>
                                    <td  width="10%">
                                        <button class="btn btn-default btn-sm" data-toggle="modal" data-target="#createMissionBlock">
                                            創建新任務
                                        </button>

                                    </td>
                                @endif
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
        </div></div>

    {{--</div>--}}
    {{--<div class="col-xs-6 col-sm-4 col-md-4" >--}}
        {{--<ul class="nav nav-tabs">--}}
            {{--<li class="active"><a href="#call_input" data-toggle="tab">民眾通報</a></li>--}}
            {{--<li><a href="#profile1" data-toggle="tab">現場</a></li>--}}
        {{--</ul>--}}
        {{--<br>--}}
        {{--<div class="tab-content">--}}
            {{--<div class="tab-pane active" id="call_input">--}}
                {{--<div class="table-responsive">--}}
                    {{--<table class="table table-bordered">--}}
                        {{--<thead>--}}

                        {{--<tr>--}}
                            {{--<th width="20%">通報時間</th>--}}
                            {{--<th width="40%">通報地址<br>--}}
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
                            {{--<th width="40%">通報內容</th>--}}

                        {{--</tr>--}}
                        {{--<tr>--}}
                            {{--<th>--}}
                                {{--{!! Form::select('name', array('日期' => '日期'), '日期', []) !!}--}}
{{--                                {!! Form::select('name', array('時間' => '時間'), '時間', []) !!}--}}
                            {{--</th>--}}
                            {{--<th>--}}
                                {{--{!! Form::select('name', array('地點種類' => '地點種類'), '地點種類', []) !!}--}}
                                {{--{!! Form::select('name', array('請選擇' => '請選擇'), '請選擇', []) !!}--}}
                                {{--{!! Form::select('name', array('請選擇' => '請選擇'), '請選擇', []) !!}--}}
                            {{--</th>--}}
                            {{--<th>--}}
                                {{--{!! Form::open(array('url' => 'call/manage/save', 'method' => 'post')) !!}--}}
                                {{--{!! Form::submit('分配至現有任務', ['class' => 'btn btn-default btn-sm']) !!}--}}
                            {{--</th>--}}
                        {{--</tr>--}}

                        {{--</thead>--}}
                        {{--<tbody>--}}
                        {{--@if (isset($missions))--}}

                            {{--@foreach ($missions as $mission )--}}
                                {{--<tr>--}}
                                    {{--@if (isset($mission) )--}}

                                        {{--<td width="10%">{!! $mission->mission_id!!}</td>--}}
                                        {{--<td width="25%">{!! $mission->mission_content!!}</td>--}}
                                        {{--<td width="25%">{!! $mission->country_or_city_input." ".$mission->township_or_district_input." ".$mission->location!!}</td>--}}
                                        {{--<td width="30%">{!!$mission->township_or_district_input." ".$mission->location!!}</td>--}}
                                        {{--<td width="14%">{!! $mission->created_at!!}</td>--}}
                                        {{--<td width="14%">{{ (new Carbon\Carbon($mission->created_at))->formatLocalized('%Y/%m/%d') }}</td>--}}
                                        {{--<td width="14%">{{ (new Carbon\Carbon($mission->created_at))->formatLocalized('%H:%M:%S') }}</td>--}}
                                        {{--<td width="10%">{!! $mission->lname.$mission->fname!!}</td>--}}
                                        {{--<td width="10%">{!! $mission->phone!!}</td>--}}
                                        {{--<td width="10%">{!! $mission->email!!}</td>--}}
                                        {{--<td width="25%">{!! Form::select($mission->mission_id,$mission_names, '請選擇',['class' => 'form-control']) !!}</td>--}}
                                        {{--<td  width="10%">--}}
                                            {{--<button class="btn btn-default btn-sm" data-toggle="modal" data-target="#createMissionBlock">--}}
                                                {{--創建新任務--}}
                                            {{--</button>--}}

                                        {{--</td>--}}
                                    {{--@endif--}}
                                    {{--@if (isset($mission_names) && !isset($mission->mission_list_id) )--}}
                                    {{----}}
                                    {{--@endif--}}

                                {{--</tr>--}}
                                {{--<tr>--}}

                            {{--@endforeach--}}

                        {{--@endif--}}


                        {{--</tbody>--}}
                    {{--</table>--}}
                    {{--{!! Form::close() !!}--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="tab-pane" id="profile1" style="border: 1px solid #dddddd;height: 400px;">--}}
                {{--{!! Form::select('name', array('三多路段' => '三多路段', '四德路段' => '四德路段', '五福路段' => '五福路段'), '五福路段', ['class' => 'form-control']) !!}--}}
                {{--<div style="height: 400px;" >--}}

                    {{--<p><b>中央 : </b>能夠增加調動的人數嗎?</p>--}}
                    {{--<p><b>五福路段 : </b>應該還能再增加1至2人</p>--}}
                {{--</div>--}}
                {{--<div class="input-group">--}}
                    {{--<input type="text" class="form-control">--}}
                {{--<span class="input-group-btn">--}}
                {{--<button class="btn btn-default" type="button">發送訊息</button>--}}
                {{--</span>--}}
                {{--</div><!-- /input-group -->--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
@endsection
{{--@section('content')--}}

    {{--<div class="col-xs-10 col-sm-8 col-md-8" >--}}
        {{--<pre>綠色:完成任務，閒置&nbsp;&nbsp;&nbsp;&nbsp;橘色:任務執行中&nbsp;&nbsp;&nbsp;&nbsp; 紅色:任務執行中且要求增援</pre>--}}
        {{--<table class="table table-bordered">--}}
            {{--<tr>--}}
                {{--<th>任務編號</th>--}}
                {{--<th>任務地點</th>--}}
                {{--<th>執行人員(單位: 人) <a data-toggle="popover" data-container="body"  data-placement="right"  data-content="綠色:完成任務，閒置&#13;&#10;橘色:任務執行中 紅色:任務執行中且要求增援">提示</a></th>--}}

                {{--<a data-toggle="popover" data-container="body"  data-placement="right"  data-content="綠色:完成任務，閒置&#13;&#10;橘色:任務執行中 紅色:任務執行中且要求增援">提示</a>--}}
                {{--<th>脫困組</th>--}}
                {{--<th>醫療組</th>--}}
                {{--<th>預估受困</th>--}}
                {{--<th>災民</th>--}}
                {{--<th>需求增援</th>--}}
                {{--<th>可增援</th>--}}
                {{--<th>負責人</th>--}}
                {{--<th>--}}
                    {{--<table class="table" width="100%">--}}
                        {{--<tr>--}}
                            {{--<td width="40%">進度</td><td width="60%">完成時間</td>--}}
                        {{--</tr>--}}
                    {{--</table>--}}
                {{--</th>--}}

            {{--</tr>--}}
            {{--<tr>--}}
                {{--<td>1</td>--}}
                {{--<td>三多路段</td>--}}
                {{--<td>--}}

                {{--</td>--}}

                {{--<td>--}}

                    {{--<!-- Button trigger modal -->--}}
                    {{--<button class="btn btn-default btn-sm" data-toggle="modal" data-target="#myModal">--}}
                        {{--指派負責人--}}
                    {{--</button>--}}

                    {{--<!-- Modal -->--}}
                    {{--<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">--}}
                        {{--<div class="modal-dialog">--}}
                            {{--<div class="modal-content">--}}
                                {{--<div class="modal-header">--}}
                                    {{--<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>--}}
                                    {{--<h4 class="modal-title" id="myModalLabel"> 指派負責人</h4>--}}
                                {{--</div>--}}
                                {{--<div class="modal-body">--}}
                                    {{--<div class="row">--}}
                                        {{--<div class="col-lg-10">--}}
                                            {{--<div class="input-group">--}}
                                                {{--<span class="input-group-addon">負責人</span>--}}
                                                {{--<input type="text" class="form-control" placeholder="Username">--}}
                                            {{--</div>--}}
                                            {{--<br>--}}
                                            {{--<div class="btn-group">--}}
                                                {{--<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">--}}
                                                    {{--專長 <span class="caret"></span>--}}
                                                {{--</button>--}}
                                                {{--<ul class="dropdown-menu" role="menu">--}}
                                                    {{--<li><a href="#">消防</a></li>--}}
                                                    {{--<li><a href="#">醫療</a></li>--}}
                                                {{--</ul>--}}
                                            {{--</div>--}}
                                            {{--<br><br>--}}
                                            {{--<table class="table">--}}
                                                {{--<tr>--}}
                                                    {{--<td>綠色:閒置</td>--}}
                                                    {{--<td>橘色:任務完成返回中</td>--}}
                                                    {{--<td>紅色:任務執行中</td>--}}
                                                {{--</tr>--}}
                                            {{--</table>--}}
                                            {{--<pre>綠色:閒置&nbsp;&nbsp;&nbsp;&nbsp;橘色:任務完成返回中&nbsp;&nbsp;&nbsp;&nbsp; 紅色:任務執行中</pre>--}}
                                            {{--<table class="table table-striped table-bordered table-hover">--}}
                                                {{--<thead>--}}
                                                    {{--<tr>--}}
                                                        {{--<td>專長</td>--}}
                                                        {{--<td>姓名</td>--}}
                                                        {{--<td colspan="2">最近任務完成時間</td>--}}
                                                        {{--<td>目前所在地</td>--}}


                                                    {{--</tr>--}}
                                                {{--</thead>--}}
                                                {{--<tbody>--}}
                                                    {{--<tr class="success" data-toggle="popover" data-container="body"  data-placement="right"  data-content="2015/09/17 擔任逢甲大學任務指揮官 事件規模: B級 隊員人數:30人 ">--}}
                                                        {{--<button type="button" class="btn btn-default" data-container="body" data-toggle="popover" data-placement="left" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus.">--}}
                                                        {{--Popover on left--}}
                                                        {{--</button>--}}
                                                        {{--<td>消防</td>--}}
                                                        {{--<td>謝卸</td>--}}
                                                        {{--<td>2015/09/15</td><td>07:14:35</td>--}}
                                                        {{--<td>中央</td>--}}
                                                    {{--</tr>--}}
                                                    {{--<tr class="success">--}}
                                                        {{--<td>消防</td>--}}
                                                        {{--<td>謝卸</td>--}}
                                                        {{--<td>2015/09/15</td><td>07:14:35</td>--}}
                                                        {{--<td>中央</td>--}}
                                                    {{--</tr>--}}
                                                    {{--<tr class="success">--}}
                                                        {{--<td>消防</td>--}}
                                                        {{--<td>謝卸</td>--}}
                                                        {{--<td>2015/09/15</td><td>07:14:35</td>--}}
                                                        {{--<td>中央</td>--}}
                                                    {{--</tr>--}}
                                                    {{--<tr class="success">--}}
                                                        {{--<td>消防</td>--}}
                                                        {{--<td>謝卸</td>--}}
                                                        {{--<td>2015/09/15</td><td>07:14:35</td>--}}
                                                        {{--<td>中央</td>--}}
                                                    {{--</tr>--}}
                                                    {{--<tr class="warning">--}}
                                                        {{--<td>消防</td>--}}
                                                        {{--<td>謝卸</td>--}}
                                                        {{--<td>2015/09/15</td><td>07:14:35</td>--}}
                                                        {{--<td>三多路段</td>--}}
                                                    {{--</tr>--}}
                                                    {{--<tr class="danger">--}}
                                                        {{--<td>消防</td>--}}
                                                        {{--<td>謝卸</td>--}}
                                                        {{--<td>2015/09/15</td><td>07:14:35</td>--}}
                                                        {{--<td>四德路段</td>--}}
                                                    {{--</tr>--}}
                                                {{--</tbody>--}}
                                            {{--</table>--}}
                                        {{--</div><!-- /.col-lg-9 -->--}}
                                    {{--</div><!-- /.row -->--}}
                                {{--</div>--}}
                                {{--<div class="modal-footer">--}}
                                    {{--<button type="button" class="btn btn-default" data-dismiss="modal">取消</button>--}}
                                    {{--<button type="button" class="btn btn-primary">指定為負責人</button>--}}
                                {{--</div>--}}
                            {{--</div><!-- /.modal-content -->--}}
                        {{--</div><!-- /.modal-dialog -->--}}
                    {{--</div><!-- /.modal -->--}}
                {{--</td>--}}
                {{--<td colspan="2">--}}
                    {{--<table class="table" width="100%">--}}
                        {{--<tr>--}}
                            {{--<td width="40%">調派人員</td><td width="30%"></td><td width="30%"></td>--}}
                        {{--</tr>--}}
                        {{--<tr>--}}
                            {{--<td>任務執行</td><td></td><td></td>--}}
                        {{--</tr>--}}
                        {{--<tr>--}}
                            {{--<td>任務完成</td><td></td><td></td>--}}
                        {{--</tr>--}}
                    {{--</table>--}}
                {{--</td>--}}
            {{--</tr>--}}
            {{--<tr>--}}
                {{--<td>2</td>--}}
                {{--<td>四德路段</td>--}}
                {{--<td>--}}
                    {{--<table class="table" width="100%">--}}
                        {{--<tr>--}}
                            {{--<td class="warning">醫療</td><td class="text-right warning">3</td>--}}
                        {{--</tr>--}}
                        {{--<tr>--}}
                            {{--<td class="success">脫困</td><td class="text-right success">3</td>--}}
                        {{--</tr>--}}
                    {{--</table>--}}
                {{--</td>--}}
                {{--<td>20人</td>--}}
                {{--<td>10人</td>--}}
                {{--<td>20人</td>--}}
                {{--<td>0人</td>--}}
                {{--<td>--}}
                   {{--尤驗--}}
                {{--</td>--}}
                {{--<td>--}}
                    {{--<table class="table" width="100%">--}}
                        {{--<tr>--}}
                            {{--<td width="40%">調派人員</td><td width="30%">2015/09/15</td><td width="30%">07:14:35</td>--}}
                        {{--</tr>--}}
                        {{--<tr>--}}
                            {{--<td>任務執行</td><td>2015/09/15</td><td>07:14:35</td>--}}
                        {{--</tr>--}}
                        {{--<tr>--}}
                            {{--<td>任務完成</td><td></td><td></td>--}}
                        {{--</tr>--}}
                    {{--</table>--}}
                {{--</td>--}}
            {{--</tr>--}}
            {{--<tr>--}}
                {{--<td>3</td>--}}
                {{--<td>五福路段</td>--}}
                {{--<td>--}}
                    {{--<table class="table" width="100%">--}}
                        {{--<tr>--}}
                            {{--<td class="danger">清潔</td><td class="text-right danger">3</td>--}}
                        {{--</tr>--}}
                        {{--<tr>--}}
                            {{--<td class="warning">道路修復</td><td class="text-right warning">3</td>--}}
                        {{--</tr>--}}
                    {{--</table>--}}
                {{--</td>--}}
                {{--<td>20人</td>--}}
                {{--<td>10人</td>--}}
                {{--<td>0人</td>--}}
                {{--<td>15人</td>--}}
                {{--<td>--}}
                    {{--泛立--}}
                {{--</td>--}}
               {{--<td>--}}
                   {{--<table class="table" width="100%">--}}
                       {{--<tr>--}}
                           {{--<td width="40%">調派人員</td><td width="30%">2015/09/15</td><td width="30%">07:14:35</td>--}}
                       {{--</tr>--}}
                       {{--<tr>--}}
                           {{--<td>任務執行</td><td>2015/09/15</td><td>07:14:35</td>--}}
                       {{--</tr>--}}
                       {{--<tr>--}}
                           {{--<td>任務完成</td><td>2015/09/15</td><td>07:14:35</td>--}}
                       {{--</tr>--}}
                   {{--</table>--}}
                {{--</td>--}}
            {{--<tr>--}}
                {{--<td>4</td>--}}
                {{--<td>六合路段</td>--}}
                {{--<td>--}}
                    {{--<table class="table" width="100%">--}}
                        {{--<tr>--}}
                            {{--<td class="success">管線修復</td><td class="text-right success">3</td>--}}
                        {{--</tr>--}}
                        {{--<tr>--}}
                            {{--<td class="warning">道路修復</td><td class="text-right warning">3</td>--}}
                        {{--</tr>--}}
                    {{--</table>--}}
                {{--</td>--}}
                {{--<td>20人</td>--}}
                {{--<td>10人</td>--}}
                {{--<td>0人</td>--}}
                {{--<td>15人</td>--}}
                {{--<td>謝卸</td>--}}
                {{--<td>--}}
                    {{--<table class="table" width="100%">--}}
                        {{--<tr >--}}
                            {{--<td width="40%">調派人員</td><td width="30%">2015/09/15</td><td width="30%">07:14:35</td>--}}
                        {{--</tr>--}}
                        {{--<tr >--}}
                            {{--<td>任務執行</td><td>2015/09/15</td><td>07:14:35</td>--}}
                        {{--</tr>--}}
                        {{--<tr >--}}
                            {{--<td>任務完成</td><td></td>--}}
                        {{--</tr>--}}
                    {{--</table>--}}
                {{--</td>--}}
            {{--</tr>--}}
        {{--</table>--}}
    {{--</div>--}}
    {{--<div class="col-xs-6 col-sm-4 col-md-4" >--}}
        {{--<ul class="nav nav-tabs">--}}
            {{--<li ><a href="#home" data-toggle="tab">公告</a></li>--}}
            {{--<li class="active"><a href="#profile" data-toggle="tab">現場</a></li>--}}

        {{--</ul>--}}

        {{--<!-- Tab panes -->--}}
        {{--<div class="tab-content">--}}
            {{--<div class="tab-pane " id="home" style="border: 1px solid #dddddd;height: 400px;">--}}
                {{--<p><b>三多路段 : </b> 向中央請求增援: 10人 增援原因: 火勢無法控制</p>--}}
                {{--<p><b>四德路段 : </b> 向中央請求增援: 20人 增援原因:火勢無法控制</p>--}}
                {{--<p><b>中央 : </b> 從中心向三多路段派送支援人數 10人</p>--}}
                {{--<p><b>中央 : </b>  從中心向四德路段派送支援人數 20人</p>--}}
                {{--<p><b>六合路段 : </b> 向中央請求增援: 10人 增援原因: 火勢無法控制</p>--}}

            {{--</div>--}}
            {{--<div class="tab-pane active" id="profile" style="border: 1px solid #dddddd;height: 400px;">--}}
                {{--{!! Form::select('name', array('三多路段' => '三多路段', '四德路段' => '四德路段', '五福路段' => '五福路段'), '五福路段', ['class' => 'form-control']) !!}--}}
                {{--<div style="height: 400px;" >--}}

                    {{--<p><b>中央 : </b>能夠增加調動的人數嗎?</p>--}}
                    {{--<p><b>五福路段 : </b>應該還能再增加1至2人</p>--}}
                {{--</div>--}}
                {{--<div class="input-group">--}}
                    {{--<input type="text" class="form-control">--}}
                  {{--<span class="input-group-btn">--}}
                    {{--<button class="btn btn-default" type="button">發送訊息</button>--}}
                  {{--</span>--}}
                {{--</div><!-- /input-group -->--}}
            {{--</div>--}}
        {{--</div>--}}



        {{--<br><br><br>--}}
    {{--</div>--}}


{{--@endsection--}}
{{--@section('content')--}}

{{--<h4>任務管理</h4><br>--}}


            {{--<table class="table table-bordered">--}}
                {{--<tr><th width="5%">任務編號</th><th width="10%">名稱</th>--}}
                    {{--<th colspan="2" width="15%">負責人</th>--}}
                    {{--<th  colspan="2" width="30%">通報</th><th  colspan="4" width="30%">最新回報</th></tr>--}}
                {{--@if (isset($mission_lists) )--}}
                {{--@foreach ($mission_lists as $mission_list )--}}
                    {{--@if ($mission_list->mission_name != "未分配任務")--}}
                {{--<tr class="header expand" style="border-top-width:3px; border-top-style:solid; border-top-color: #dddddd"><td rowspan="2">{!!$mission_list->mission_list_id!!}</td>--}}
                    {{--<td rowspan="2">{!!$mission_list->mission_name!!}</td>--}}
                    {{--<td rowspan="2" width="5%">姓名 <span class="sign"></span></td>--}}
                    {{--<td rowspan="2" width="10%">{!!$mission_list_charge_Array[$mission_list->mission_list_id."name"]!!}</td>--}}
                    {{--<th>編號</th><th>內容 <span class="sign"></span></th><th>通報日期</th><th>通報時間</th>--}}
                    {{--<th>內容 <span class="sign"></span></th><th width="10%">增援需求</th></tr>--}}
                  {{--<div style="display: none">--}}
                 {{--@if(count($reports_array[$mission_list->mission_list_id]) < 3 && count($mission_contents_array[$mission_list->mission_list_id]) <3)--}}
                                {{--{!!$n=  4!!}--}}
                {{--@elseif(count($reports_array[$mission_list->mission_list_id]) > count($mission_contents_array[$mission_list->mission_list_id]))--}}
                           {{--{!!$n = count($reports_array[$mission_list->mission_list_id])+1!!}--}}
                {{--@elseif(count($reports_array[$mission_list->mission_list_id]) < count($mission_contents_array[$mission_list->mission_list_id]))--}}
                                {{--{!!$n = count($mission_contents_array[$mission_list->mission_list_id])+1!!}--}}
                {{--@endif--}}
                  {{--</div>--}}

                {{--@for($i=1;$i<$n;$i++)--}}
                    {{--{!!dd($n);!!}--}}
                                {{--<tr>--}}
                                {{--@if($i==1)--}}
                                    {{--@elseif($i==2)--}}
                                        {{--<td colspan="2"></td>--}}
                                {{--<td colspan="2"></td><td>電話</td><td>{!!$mission_list_charge_Array[$mission_list->mission_list_id."phone"]!!}</td>--}}
                                {{--@elseif($i==3)--}}
                                        {{--<td colspan="2"></td>--}}
                                    {{--<td colspan="2"></td><td>Email</td><td> {!!$mission_list_charge_Array[$mission_list->mission_list_id."email"]!!}</td>--}}
                                    {{--@else--}}
                                        {{--<td colspan="4"></td>--}}
                                {{--@endif--}}
                                    {{--{!!$n!!}--}}
                                {{--@if($i <  count($mission_contents_array[$mission_list->mission_list_id])+1 && isset($mission_contents_array[$mission_list->mission_list_id][$i]))--}}
                                    {{--<td>{!!$mission_contents_array[$mission_list->mission_list_id][$i]['id']!!}</td>--}}
                                    {{--<td>{!!$mission_contents_array[$mission_list->mission_list_id][$i]['content']!!}</td>--}}
                                {{--@else--}}
                                    {{--<td colspan="2"></td>--}}
                                {{--@endif--}}
                                {{--@if($i < count($reports_array[$mission_list->mission_list_id])+1 && isset($reports_array[$mission_list->mission_list_id][$i]))--}}
                                    {{--<td>{!!$reports_array[$mission_list->mission_list_id][$i]['time']!!}</td>--}}
                                        {{--<td >{{ (new Carbon\Carbon($reports_array[$mission_list->mission_list_id][$i]['time']))->formatLocalized('%Y/%m/%d') }}</td>--}}
                                        {{--<td >{{ (new Carbon\Carbon($reports_array[$mission_list->mission_list_id][$i]['time']))->formatLocalized('%H:%M:%S') }}</td>--}}
                                   {{--<td>{!!$reports_array[$mission_list->mission_list_id][$i]['content']!!}</td>--}}
                                    {{--@else--}}
                                        {{--<td colspan="3"></td>--}}
                                {{--@endif--}}
                                    {{--<td>--}}
                                {{--@if($i==1)--}}
                                    {{--@if($mission_support_people_Array[$mission_list->mission_list_id."local_emt_num"] !=0 || $mission_support_people_Array[$mission_list->mission_list_id."local_reliever_num"] !=0)--}}
                                          {{--<button class="btn-circle btn-danger" data-toggle="modal" data-target="#supportPeopleBlock{!!$mission_list->mission_list_id!!}">人員</button>--}}
                                                {{--<!-- Modal -->--}}
                                                {{--<div class="modal fade" id="supportPeopleBlock{!!$mission_list->mission_list_id!!}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">--}}
                                                    {{--<div class="modal-dialog">--}}
                                                        {{--<div class="modal-content">--}}
                                                            {{--{!! Form::open(array('url' => 'mission/manage/support', 'method' => 'post','class' => 'form-horizontal')) !!}--}}
                                                            {{--<div class="modal-header">--}}
                                                                {{--<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>--}}
                                                                {{--<h4 class="modal-title" id="myModalLabel"><b>需求人員內容</b></h4>--}}
                                                                {{--{!! Form::hidden('support_type','1') !!}--}}
                                                            {{--</div>--}}
                                                            {{--<div class="modal-body">--}}
                                                                {{--<table class="table table-bordered">--}}
                                                                    {{--<tr><th>任務編號</th><td>{!!$mission_list->mission_list_id!!}</td><th>任務名稱</th><td>{!!$mission_list->mission_name!!}</td></tr>--}}
                                                                    {{--{!! Form::hidden('mission_list_id',$mission_list->mission_list_id) !!}--}}
                                                                    {{--<tr><th>脫困組人數</th><td>{!!$relieverUsersArrays[$mission_list->mission_list_id]!!} 人</td>--}}
                                                                    {{--<th>醫療組人數</th><td>{!!$emtUsersArrays[$mission_list->mission_list_id]!!} 人</td></tr>--}}
                                                                    {{--<tr><th>所屬通報數量</th><td>{!!$mission_total_Arrays[$mission_list->mission_list_id]!!} 則</td>--}}
                                                                    {{--<th>現場地點數量</th><td>{!!$mission_new_location_amount_arrays[$mission_list->mission_list_id]['total']!!} 個</td></tr>--}}
                                                                    {{--<tr  class="header_no_next expand"><th colspan="4">查看任務現場<span class="sign"></span></th></tr>--}}
                                                                    {{--<tr><td>編號</td><td colspan="3">地點名稱</td></tr>--}}


                                                                    {{--@if(isset($mission_new_location_Arrays[$mission_list->mission_list_id]))--}}
                                                                        {{--@for($j=1;$j<=count($mission_new_location_Arrays[$mission_list->mission_list_id]);$j++)--}}
                                                                            {{--@if($mission_new_location_Arrays[$mission_list->mission_list_id][$j]['location'] != '醫療組'--}}
                                                                            {{--&& $mission_new_location_Arrays[$mission_list->mission_list_id][$j]['location'] != '物資資源組')--}}
                                                                            {{--<tr><td>{!!$mission_new_location_Arrays[$mission_list->mission_list_id][$j]['mission_new_locations_id']!!}</td>--}}
                                                                                {{--<td colspan="3">{!!$mission_new_location_Arrays[$mission_list->mission_list_id][$j]['location']!!}</td></tr>--}}
                                                                            {{--@endif--}}
                                                                        {{--@endfor--}}
                                                                    {{--@else--}}
                                                                        {{--<tr><td></td>--}}
                                                                            {{--<td colspan="3">現場尚未分析</td></tr>--}}
                                                                    {{--@endif--}}

                                                                {{--</table>--}}
                                                                {{--<table class="table table-bordered">--}}
                                                                    {{--<tr class=""><th colspan="5">需求人員</th></tr>--}}
                                                                    {{--<tr><th>需求種類</th><th class="text-right">需求人數</th><th>中心人員數</th><th>欲分配人數</th></tr>--}}

                                                                    {{--<tr><td>醫療組</td><td class="text-right">{!!$mission_support_people_Array[$mission_list->mission_list_id."local_emt_num"]!!} 人</td>--}}
                                                                        {{--<td class="text-right">{!!$emtFreeUsers[0]->total!!} 人</td>--}}
                                                                        {{--<th>已分配數量</th>--}}
                                                                        {{--<td>{!! Form::number('emt', 0, ['id' =>  'emt', 'class' => 'form-control text-right','min'=>'0']) !!}</td></tr>--}}

                                                                    {{--<tr><td>脫困組</td><td class="text-right">{!!$mission_support_people_Array[$mission_list->mission_list_id."local_reliever_num"]!!} 人</td>--}}
                                                                        {{--<td class="text-right">{!!$relieverFreeUsers[0]->total!!} 人</td>--}}
                                                                        {{--<th>已分配數量</th>--}}
                                                                        {{--<td>{!! Form::number('reliever', 0, ['id' =>  'reliever', 'class' => 'form-control text-right','min'=>'0']) !!}</td></tr>--}}
                                                                {{--</table>--}}
                                                            {{--</div>--}}
                                                            {{--<div class="modal-footer">--}}
                                                                {{--<button type="button" class="btn btn-default btn-sm" data-dismiss="modal">取消</button>--}}
                                                                {{--{!! Form::submit('派送支援', ['class' => 'btn btn-default btn-sm btn-primary']) !!}--}}
                                                            {{--</div>--}}
                                                            {{--{!! Form::close() !!}--}}
                                                        {{--</div><!-- /.modal-content -->--}}
                                                    {{--</div><!-- /.modal-dialog -->--}}
                                                {{--</div><!-- /.modal -->--}}
                                    {{--@else--}}

                                    {{--@endif--}}
                                {{--@endif--}}
                                {{--@if($i==1 && isset($mission_support_product_Arrays[$mission_list->mission_list_id] ) )--}}
                                    {{--<button class="btn-circle btn-warning" data-toggle="modal" data-target="#supportProductsBlock{!!$mission_list->mission_list_id!!}">物資</button>--}}
                                        {{--<!-- Modal -->--}}
                                        {{--<div class="modal fade" id="supportProductsBlock{!!$mission_list->mission_list_id!!}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">--}}
                                            {{--<div class="modal-dialog">--}}
                                                {{--<div class="modal-content">--}}
                                                    {{--{!! Form::open(array('url' => 'mission/manage/support', 'method' => 'post','class' => 'form-horizontal')) !!}--}}
                                                    {{--<div class="modal-header">--}}
                                                        {{--<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>--}}
                                                        {{--<h4 class="modal-title" id="myModalLabel"><b>需求物資清單</b></h4>--}}
                                                        {{--{!! Form::hidden('support_type','0') !!}--}}
                                                    {{--</div>--}}
                                                    {{--<div class="modal-body">--}}
                                                        {{--<table class="table table-bordered" >--}}
                                                            {{--<tr><th>任務編號</th><td>{!!$mission_list->mission_list_id!!}</td><th>任務名稱</th><td>{!!$mission_list->mission_name!!}</td></tr>--}}
                                                            {{--{!! Form::hidden('mission_list_id',$mission_list->mission_list_id) !!}--}}
                                                            {{--<tr><th>脫困組人數</th><td>{!!$relieverUsersArrays[$mission_list->mission_list_id]!!} 人</td>--}}
                                                            {{--<th>醫療組人數</th><td>{!!$emtUsersArrays[$mission_list->mission_list_id]!!} 人</td></tr>--}}
                                                            {{--<tr><th>所屬通報數量</th><td>{!!$mission_total_Arrays[$mission_list->mission_list_id]!!} 則</td>--}}
                                                            {{--<th>現場地點數量</th><td>{!!$mission_new_location_amount_arrays[$mission_list->mission_list_id]['total']!!} 個</td></tr>--}}



                                                        {{--</table>--}}
                                                        {{--<table class="table table-bordered">--}}
                                                            {{--<tr><th colspan="5">需求物資</th></tr>--}}
                                                            {{--<tr><th>需求物資名稱</th><th class="text-right">需求數量</th><th>中心庫存數</th><th>欲分配數量</th></tr>--}}
                                                            {{--@if(isset($mission_support_product_Arrays[$mission_list->mission_list_id]))--}}
                                                                {{--@for($k=1;$k<=count($mission_support_product_Arrays[$mission_list->mission_list_id]);$k++)--}}

                                                                    {{--<tr><td>{!!$mission_support_product_Arrays[$mission_list->mission_list_id][$k]['product_name']!!}</td>--}}
                                                                        {{--<td class="text-right">{!!$mission_support_product_Arrays[$mission_list->mission_list_id][$k]['amount']!!}--}}
                                                                            {{--{!!$mission_support_product_Arrays[$mission_list->mission_list_id][$k]['unit']!!}--}}
                                                                        {{--</td>--}}
                                                                        {{--<td class="text-right">{!!$center_amounts_arrays[$mission_support_product_Arrays[$mission_list->mission_list_id][$k]['product_total_amount_id']]!!}--}}
                                                                            {{--{!!$mission_support_product_Arrays[$mission_list->mission_list_id][$k]['unit']!!}</td>--}}
                                                                        {{--<th>已分配數量</th>--}}
                                                                        {{--<td> {!! Form::number($mission_support_product_Arrays[$mission_list->mission_list_id][$k]['product_total_amount_id'], 0, [ 'class' => 'form-control text-right','min'=>'0']) !!}</td></tr>--}}

                                                                {{--@endfor--}}
                                                            {{--@else--}}
                                                                {{--<tr><td></td>--}}
                                                                    {{--<td colspan="3">現場尚未分析</td></tr>--}}
                                                            {{--@endif--}}
                                                        {{--</table>--}}
                                                    {{--</div>--}}
                                                    {{--<div class="modal-footer">--}}
                                                        {{--<button type="button" class="btn btn-default btn-sm" data-dismiss="modal">取消</button>--}}
                                                        {{--{!! Form::submit('派送支援', ['class' => 'btn btn-default btn-sm btn-primary']) !!}--}}
                                                    {{--</div>--}}
                                                    {{--{!! Form::close() !!}--}}
                                                {{--</div><!-- /.modal-content -->--}}
                                            {{--</div><!-- /.modal-dialog -->--}}
                                        {{--</div><!-- /.modal -->--}}
                                {{--@else--}}
                                {{--@endif--}}
                                    {{--</td>--}}
                    {{--</tr>--}}
                 {{--@endfor--}}



                    {{--@endif--}}
                {{--@endforeach--}}
            {{--</table>--}}

{{--@endif--}}

{{--@endsection--}}




@section('javascript')

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
