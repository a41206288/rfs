@extends('manage_master')
@section('title')
    任務管理
@endsection
@section('link')
    {{--<li>{!! Html::link('analysis/manage/local', '現場分析地點管理') !!}</li>--}}
    <li>{!! Html::link('mission/manage/local', '任務管理') !!}</li>
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

    <div class="col-xs-9 col-sm-7 col-md-7" >
        <h4><b>任務管理</b></h4>
        <pre>綠色:完成任務，閒置&nbsp;&nbsp;&nbsp;&nbsp;橘色:任務執行中&nbsp;&nbsp;&nbsp;&nbsp; 紅色:任務執行中且要求增援</pre>
        <table class="table table-bordered">
            <thead>

            </thead>
            <tbody>
                <tr><th colspan="15">救災人員數 (單位: 人)</th></tr>
                <tr>
                    <th width="12%" class="success">脫困</th><td class="text-right success" width="6%">{!!$EmtUserAmounts[0]->total!!}</td><td width="7%" class="success">{!! Form::select('name', array('執行中' => '執行中', '已完成' => '已完成'), '已完成', []) !!}</td>
                    <th width="12%" class="success">救火</th><td class="text-right success" width="6%">{!!$EmtUserAmounts[0]->total!!}</td><td width="7%" class="success">{!! Form::select('name', array('執行中' => '執行中', '已完成' => '已完成'), '已完成', []) !!}</td>
                    <th width="12%"  class="danger">清潔</th><td class="text-right danger" width="6%">{!!$EmtUserAmounts[0]->total!!}</td><td width="7%" class="danger">{!! Form::select('name', array('執行中' => '執行中', '已完成' => '已完成'), '執行中', []) !!}</td>


                </tr>
                <tr>
                    <th width="12%" class="danger">醫療</th><td class="text-right danger" width="6%">{!!$EmtUserAmounts[0]->total!!}</td><td width="7%" class="danger">{!! Form::select('name', array('執行中' => '執行中', '已完成' => '已完成'), '執行中', []) !!}</td>
                    <th width="12%" class="success">管線修復</th><td class="text-right success" width="6%">{!!$EmtUserAmounts[0]->total!!}</td><td width="7%" class="success">{!! Form::select('name', array('執行中' => '執行中', '已完成' => '已完成'), '已完成', []) !!}</td>
                    <th width="12%" class="warning">警戒</th><td class="text-right warning" width="6%">123</td><td width="7%" class="warning">{!! Form::select('name', array('執行中' => '執行中', '已完成' => '已完成'), '執行中', []) !!}</td>
                    {{--<th width="10%">清潔</th><td class="text-right" width="10%">{!!$EmtUserAmounts[0]->total!!}</td>--}}
                    {{--<th width="10%">道路修復</th><td class="text-right" width="10%">{!!$EmtUserAmounts[0]->total!!}</td>--}}
                    {{--<th width="10%">醫療</th><td class="text-right" width="10%">{!!$EmtUserAmounts[0]->total!!}</td>--}}
                </tr>
                <tr>
                    <th width="12%" class="danger">道路修復</th><td class="text-right danger" width="6%">{!!$EmtUserAmounts[0]->total!!}</td><td width="7%" class="danger">{!! Form::select('name', array('執行中' => '執行中', '已完成' => '已完成'), '執行中', []) !!}</td>
                </tr>
                {{--<tr><th>醫療組</th><td colspan="2"><b>醫療組人數 (單位: 人)</b></td><td class="text-right" colspan="2">{!!$EmtUserAmounts[0]->total!!}</td></tr>--}}
            </tbody>

        </table>
        <br>
        <table class=" table table-bordered">
            <thead>
                <tr><th colspan="15">災民人數 (單位: 人)</th></tr>

            </thead>
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


            {!! Form::open(array('url' => 'report/local', 'method' => 'post','class' => 'form-horizontal')) !!}
            @if($executiveRequireArrays[1][1]['executive_require_people_num'] != 0 &&  $executiveRequireArrays[1][1]['executive_require_reason'] != "")
                <tr class="alert alert-danger"><td rowspan="2"><b>增援需求</b></td>
                    <th>日期</th>
                    <th>時間</th>
                    <th colspan="2">向中央要求增援人數</th>
                    <th colspan="4">原因/備註</th>
                    <td colspan="1">{!! Form::submit('向中央回報', ['class' => 'btn btn-default btn-sm btn-primary']) !!}</td>
                </tr>
                <tr class="alert alert-danger"><td>{{ (new Carbon\Carbon($executiveRequireArrays[1][1]['updated_at']))->formatLocalized('%Y/%m/%d')}}</td>
                    <td>{{ (new Carbon\Carbon($executiveRequireArrays[1][1]['updated_at']))->formatLocalized('%H:%M:%S')}}</td>
                    <td>{!!$executiveRequireArrays[1][1]['executive_require_people_num']!!} 人</td>
                    <td>{!! Form::number('local_emt_num', $executiveRequireArrays[1][1]['executive_require_people_num'], ['id' =>  'reliever', 'class' => 'form-control text-right','min'=>'0']) !!}</td>
                    <td colspan="5">{!!$executiveRequireArrays[1][1]['executive_require_reason']!!}</td></tr>
            @endif
            {!! Form::hidden('support_type','0') !!}
            {!! Form::hidden('local_emt_num',$executiveRequireArrays[1][1]['executive_require_people_num']) !!}
            {!! Form::close() !!}
            {{--<tr><th colspan="10">最新回報  <span class="sign"></span> </th></tr>--}}
            {{--<tr><th colspan="2">日期</th><th colspan="2">時間</th><th colspan="6">內容</th></tr>--}}

            {{--舊版--}}
                {{--<div style="display: none">--}}
                    {{--@if(isset($local_reports_arrays[1]))--}}
                        {{--{!!$n=count($local_reports_arrays[1])!!}--}}

                    {{--@else--}}
                        {{--{!!$n=1!!}--}}
                    {{--@endif--}}
                {{--</div>--}}
                {{--@for($i=1;$i<=$n;$i++)--}}
                    {{--<tr>--}}
                        {{--@if(isset($local_reports_arrays[1]))--}}
                            {{--<td>{!!$local_reports_arrays[1][$i]['time']!!}</td>--}}
                            {{--<td colspan="2">{{ (new Carbon\Carbon($local_reports_arrays[1][$i]['time']))->formatLocalized('%Y/%m/%d') }}</td>--}}
                            {{--<td colspan="2">{{ (new Carbon\Carbon($local_reports_arrays[1][$i]['time']))->formatLocalized('%H:%M:%S') }}</td>--}}
                            {{--<td colspan="6">{!!$local_reports_arrays[1][$i]['content']!!}</td>--}}
                        {{--@else--}}
                            {{--<td colspan="10">尚未有最新回報。</td>--}}
                    {{--@endif--}}
                {{--@endfor--}}
            </tbody>


            {{--@if($i==1 && $executiveRequireArrays[1][1]['executive_require_people_num'] != 0 &&  $executiveRequireArrays[1][1]['executive_require_reason'] != "")--}}
                        {{--<td><button class="btn-circle btn-danger" data-toggle="modal" data-target="#emt">--}}
                                {{--人員--}}
                        {{--</button>--}}

                        {{--<!-- Modal -->--}}
                        {{--<div class="modal fade" id="emt" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">--}}
                            {{--<div class="modal-dialog" style="width:  800px">--}}
                                {{--{!! Form::open(array('url' => 'analysis/manage/local', 'method' => 'post','class' => 'form-horizontal')) !!}--}}
                                {{--<div class="modal-content">--}}
                                    {{--<div class="modal-header">--}}
                                        {{--<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>--}}
                                        {{--<h4 class="modal-title" id="myModalLabel"><b>增援需求</b></h4>--}}
                                    {{--</div>--}}
                                    {{--<div class="modal-body">--}}
                                        {{--<table class="table table-bordered">--}}
                                            {{--<tr><th>發布日期</th><td>{{ (new Carbon\Carbon($executiveRequireArrays[1][1]['updated_at']))->formatLocalized('%Y/%m/%d')}}</td>--}}
                                                {{--<th>發布時間</th><td>{{ (new Carbon\Carbon($executiveRequireArrays[1][1]['updated_at']))->formatLocalized('%H:%M:%S')}}</td>--}}
                                                {{--<th>欲增援人數</th><td>{!!$executiveRequireArrays[1][1]['executive_require_people_num']!!} 人</td></tr>--}}
                                            {{--<tr><th colspan="6">原因/備註</th></tr>--}}
                                            {{--<tr><td colspan="6">{!!$executiveRequireArrays[1][1]['executive_require_reason']!!}</td></tr>--}}
                                        {{--</table>--}}
                                    {{--</div>--}}
                                    {{--<div class="modal-footer">--}}
                                        {{--<button type="button" class="btn btn-default" data-dismiss="modal">取消</button>--}}

                                        {{--{!! Form::submit('向中央通報', ['class' => 'btn btn-default btn-sm btn-primary']) !!}--}}
                                    {{--</div>--}}
                                    {{--{!! Form::close() !!}--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}


            {{--@else--}}
                {{--<td></td>--}}
            {{--@endif--}}
            {{--</tr>--}}

        </table>
        <br>
        <pre>綠色:招募人員 50 % 以上&nbsp;&nbsp;&nbsp;&nbsp;橘色:招募人員 50 % 以下&nbsp;&nbsp;&nbsp;&nbsp; 紅色:尚未招募到人員</pre>
        <table class="table table-bordered">
            <thead>
                <tr><th colspan="6">增援列表  (單位: 人)</th></tr>
                <tr><th width="12%">人員種類</th><th width="15%">欲增援人數</th><th width="15%">缺額</th><th colspan="3" width="45%">已招募人員報到</th></tr>
            </thead>
            <tbody>
                <tr><td  rowspan="1">醫療</td><td  rowspan="1" class="text-right success">10</td><td  rowspan="1" class="text-right success">1</td><td>四維路段</td><td class="text-right">3</td><td><button class="btn btn-default btn-sm">已到達</button></td></tr>
                {{--<tr><td>五福路段</td><td class="text-right" class="text-right">3</td><td>已到達</td></tr>--}}
                {{--<tr><td>六合路段</td><td class="text-right">3</td><td></td></tr>--}}
                <tr><td  rowspan="2">清潔</td><td  rowspan="2" class="text-right warning">10</td><td  rowspan="2" class="text-right warning">6</td><td>四維路段</td><td class="text-right">1</td><td><button class="btn btn-default btn-sm">已到達</button></td></tr>
                <tr><td>六合路段</td><td class="text-right">3</td><td><button class="btn btn-default btn-sm">已到達</button></td></tr>
                <tr><td>道路修復</td><td class="text-right danger">10</td><td class="text-right danger">0</td><td></td><td class="text-right"></td><td></td></tr>
            </tbody>
        </table>
        <br>
        <table class="table table-bordered">
            <thead>

            </thead>
            <tbody>
                <tr class="header expand"><th colspan="3">增援表單<span class="sign"></span></th></tr>
                <tr><th colspan="3">增援人員數量表 (單位: 人)</th></tr>
                <tr><th width="15%">人員種類</th><th width="15%">欲修改增援人數</th><th width="70%">欲增援原因</th></tr>
                <tr>
                    <td>脫困</td>
                    <td>{!! Form::number('name', '0', ['class' => 'form-control text-right','min'=>'0']) !!}</td>
                    <td>{!! Form::text('name','',['class' => 'form-control']) !!}</td>
                </tr>
                <tr>
                    <td>救火</td>
                    <td>{!! Form::number('name', '0', ['class' => 'form-control text-right','min'=>'0']) !!}</td>
                    <td>{!! Form::text('name','',['class' => 'form-control']) !!}</td>
                </tr>
                <tr>
                    <td>清潔</td>
                    <td>{!! Form::number('name', '0', ['class' => 'form-control text-right','min'=>'0']) !!}</td>
                    <td>{!! Form::text('name','',['class' => 'form-control']) !!}</td>
                </tr>
                <tr>
                    <td>道路修復</td>
                    <td>{!! Form::number('name', '0', ['class' => 'form-control text-right','min'=>'0']) !!}</td>
                    <td>{!! Form::text('name','',['class' => 'form-control']) !!}</td>
                </tr>
                <tr>
                    <td>醫療</td>
                    <td>{!! Form::number('name', '0', ['class' => 'form-control text-right','min'=>'0']) !!}</td>
                    <td>{!! Form::text('name','',['class' => 'form-control']) !!}</td>
                </tr>
                <tr>
                    <td>管線修復</td>
                    <td>{!! Form::number('name', '0', ['class' => 'form-control text-right','min'=>'0']) !!}</td>
                    <td>{!! Form::text('name','',['class' => 'form-control']) !!}</td>
                </tr>
                <tr>
                    <td>警戒</td>
                    <td>{!! Form::number('name', '0', ['class' => 'form-control text-right','min'=>'0']) !!}</td>
                    <td>{!! Form::text('name','',['class' => 'form-control']) !!}</td>
                </tr>

                <tr><th colspan="3" class="text-right">{!! Form::submit('送出增援表單', ['class' => 'btn btn-default btn-sm btn-primary']) !!}</th></tr>
            </tbody>
        </table>
        {{--舊版--}}
                    {{--後勤組--}}
                            {{--</table>--}}
                            {{--<br>--}}
                            {{--<table class=" table table-bordered">--}}
                                {{--<tr class="header expand"><td>後勤組</td><td>待命區人數</td><td>最新回報  <span class="sign"></span> </td><td>增援</td></tr>--}}
                                {{--<tr><td colspan="1"></td><td>12</td><td>勢無法控制, 需要更多脫困及醫療人員支援</td><td><button class="btn-circle btn-danger">人員</button></td></tr>--}}
                                {{--<tr><td colspan="2"></td><td>勢無法控制, 需要更多脫困及醫療人員支援</td></tr>--}}
                                {{--<tr><td colspan="2"></td><td>勢無法控制, 需要更多脫困及醫療人員支援</td></tr>--}}
                                {{--<tr><td colspan="2"></td><td>勢無法控制, 需要更多脫困及醫療人員支援</td></tr>--}}
                                {{--<tr><td colspan="2"></td><td>勢無法控制, 需要更多脫困及醫療人員支援</td></tr>--}}
                            {{--</table>--}}
        {{--<hr>--}}
        {{--<table class=" table table-bordered table-striped">--}}
            {{--<thead>--}}
            {{--{!! Form::open(array('url' => 'report/local', 'method' => 'post','class' => 'form-horizontal')) !!}--}}
                {{--<tr><th colspan="10">脫困組</th></tr>--}}
                {{--<tr><td width="10%"><b>救災地點總數</b></td><td width="10%">{!! count($mission_new_locations) !!} 個</td>--}}
                    {{--<td width="10%"><b>脫困組總人數</b></td><td width="10%">{!! $relieverFreeUserAmounts[0]->total !!} 人</td>--}}
                    {{--<td width="10%"><b>要求支援總人數</b></td><td width="10%">{!! $executive_require_people_num !!} 人</td>--}}
                    {{--<td width="10%"><b>欲向中央要求增援數</b></td><td width="10%">{!! $mission_support_people[0]->local_reliever_num !!} 人</td>--}}
                    {{--<td width="10%">{!! Form::number('local_reliever_num', 0, ['id' =>  'reliever', 'class' => 'form-control text-right','min'=>'0']) !!}</td>--}}
                    {{--<td width="10%"> {!! Form::submit('向中央回報', ['class' => 'btn btn-default btn-sm btn-primary']) !!}</td></tr>--}}
                {{--<tr><th colspan="2" rowspan="2">救災地點</th><th colspan="2" rowspan="2">脫困組人數</th><th colspan="6">最新回報</th></tr>--}}
                {{--<tr><th>日期</th><th >時間</th><th colspan="3">內容</th><th >分配/增援</th></tr>--}}
            {{--{!! Form::hidden('support_type','1') !!}--}}

            {{--{!! Form::close() !!}--}}
            {{--</thead>--}}
            {{--<tbody>--}}


            {{--@if (isset($mission_new_locations) )--}}
                {{--@foreach ($mission_new_locations as $mission_new_location )--}}
                    {{--@if($mission_new_location->location != "醫療組"--}}
                    {{--&& $mission_new_location->location != "物資資源組"--}}
                    {{--&& $relieverNewLocationUserAmountsArrays[$mission_new_location->mission_new_locations_id]['total'] != 0)--}}

                        {{--<div style="display: none">--}}
                            {{--@if(isset($local_reports_arrays[$mission_new_location->mission_new_locations_id]))--}}
                                {{--{!!$n=count($local_reports_arrays[$mission_new_location->mission_new_locations_id])!!}--}}
                            {{--@else--}}
                                {{--{!!$n=1!!}--}}
                            {{--@endif--}}
                        {{--</div>--}}
                        {{--@for($i=1;$i<=$n;$i++)--}}
                            {{--<tr>--}}
                                {{--@if($i==1)--}}
                                    {{--<td colspan="2">{!!$mission_new_location->location!!}</td>--}}
                                {{--@else--}}
                                    {{--<td colspan="2"></td>--}}
                                {{--@endif--}}
                                {{--@if($i==1 && isset($relieverNewLocationUserAmountsArrays))--}}
                                    {{--<td colspan="2">{!!$relieverNewLocationUserAmountsArrays[$mission_new_location->mission_new_locations_id]['total']!!} 人</td>--}}
                                {{--@else--}}
                                    {{--<td colspan="2"></td>--}}
                                {{--@endif--}}
                                {{--@if(isset($local_reports_arrays[$mission_new_location->mission_new_locations_id]))--}}
                                    {{--<td>{!!$local_reports_arrays[$mission_new_location->mission_new_locations_id][$i]['time']!!}</td>--}}
                                    {{--<td >{{ (new Carbon\Carbon($local_reports_arrays[$mission_new_location->mission_new_locations_id][$i]['time']))->formatLocalized('%Y/%m/%d') }}</td>--}}
                                    {{--<td >{{ (new Carbon\Carbon($local_reports_arrays[$mission_new_location->mission_new_locations_id][$i]['time']))->formatLocalized('%H:%M:%S') }}</td>--}}
                                    {{--<td colspan="3">{!!$local_reports_arrays[$mission_new_location->mission_new_locations_id][$i]['content']!!}</td>--}}
                                {{--@else--}}
                                    {{--<td colspan="5"></td>--}}
                                {{--@endif--}}

                                {{--@if($i==1 && $executiveRequireArrays[$mission_new_location->mission_new_locations_id][$i]['executive_require_people_num'] != 0--}}
                                {{--&& $executiveRequireArrays[$mission_new_location->mission_new_locations_id][$i]['executive_require_reason'] != "")--}}
                                    {{--<td><button class="btn-circle btn-danger" data-toggle="modal" data-target="#{!!$mission_new_location->mission_new_locations_id!!}">增援</button>--}}
                                        {{--<!-- Modal -->--}}
                                        {{--<div class="modal fade" id="{!!$mission_new_location->mission_new_locations_id!!}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">--}}
                                            {{--<div class="modal-dialog"  style="width:  800px">--}}
                                                {{--<div class="modal-content">--}}
                                                    {{--{!! Form::open(array('url' => 'mission/manage/local', 'method' => 'post','class' => 'form-horizontal')) !!}--}}
                                                    {{--{!! Form::hidden('mission_new_locations_id',$mission_new_location->mission_new_locations_id) !!}--}}
                                                    {{--<div class="modal-header">--}}
                                                        {{--<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>--}}
                                                        {{--<h4 class="modal-title" id="myModalLabel"><b>增援需求</b></h4>--}}
                                                    {{--</div>--}}
                                                    {{--<div class="modal-body ">--}}
                                                        {{--<table class="table table-bordered">--}}
                                                            {{--<tr><th>發布時間</th><td>{{ (new Carbon\Carbon($executiveRequireArrays[$mission_new_location->mission_new_locations_id][$i]['updated_at']))->formatLocalized('%Y/%m/%d')}}</td>--}}
                                                                {{--<th>發布時間</th><td>{{ (new Carbon\Carbon($executiveRequireArrays[$mission_new_location->mission_new_locations_id][$i]['updated_at']))->formatLocalized('%H:%M:%S')}}</td>--}}
                                                                {{--<th>欲增援人數</th><td>{!!$executiveRequireArrays[$mission_new_location->mission_new_locations_id][$i]['executive_require_people_num']!!} 人</td></tr>--}}
                                                            {{--<tr><th colspan="6">原因/備註</th></tr>--}}
                                                            {{--<tr><td colspan="6">{!! $executiveRequireArrays[$mission_new_location->mission_new_locations_id][$i]['executive_require_reason']!!}</td></tr>--}}
                                                        {{--</table>--}}
                                                        {{--<div class="row">--}}
                                                            {{--<div class="col-md-5" id="busy{!!$mission_new_location->mission_new_locations_id!!}">--}}
                                                                {{--<b>執行任務人員</b>--}}
                                                                {{--{!!dd($relieverNewLocationUsersArrays[$mission_new_location->mission_new_locations_id]);!!}--}}
                                                                {{--@if(isset($relieverNewLocationUsersArrays[$mission_new_location->mission_new_locations_id]))--}}
                                                                    {{--@for($j=1;$j<=count($relieverNewLocationUsersArrays[$mission_new_location->mission_new_locations_id]);$j++)--}}

                                                                        {{--<div class="input-group">--}}
                                                                            {{--<span class="form-control">{!!$relieverNewLocationUsersArrays[$mission_new_location->mission_new_locations_id][$j]['name']!!}</span>--}}
                                                                            {{--{!! Form::hidden('mission[]',$relieverNewLocationUsersArrays[$mission_new_location->mission_new_locations_id][$j]['id']) !!}--}}
                                                                            {{--<span class="input-group-btn" >--}}
                                                        {{--<button class="btn btn-default" type="button">-</button>--}}
                                                    {{--</span>--}}
                                                                        {{--</div>--}}

                                                                    {{--@endfor--}}
                                                                {{--@else--}}

                                                                {{--@endif--}}


                                                            {{--</div>--}}
                                                            {{--<div class="col-md-offset-1 col-md-5" id="idle{!!$mission_new_location->mission_new_locations_id!!}">--}}

                                                                {{--<b>未分配人員</b>--}}

                                                                {{--@if(isset($relieverFreeUsersArrays))--}}
                                                                    {{--@foreach($relieverFreeUsersArrays as $relieverFreeUsersArray)--}}
                                                                        {{--<div class="input-group">--}}
                                            {{--<span class="input-group-btn">--}}
                                                {{--<button class="btn btn-default" type="button">+</button>--}}
                                            {{--</span>--}}
                                                                            {{--<span class="form-control">{!!$relieverFreeUsersArray['name']!!}</span>--}}
                                                                            {{--{!! Form::hidden('free[]',$relieverFreeUsersArray['id']) !!}--}}
                                                                        {{--</div>--}}
                                                                    {{--@endforeach--}}
                                                                {{--@endif--}}

                                                            {{--</div>--}}
                                                        {{--</div>--}}

                                                    {{--</div>--}}

                                                    {{--<div class="modal-footer">--}}
                                                        {{--<button type="button" class="btn btn-default btn-sm" data-dismiss="modal">取消</button>--}}
                                                        {{--{!! Form::submit('送出分配', ['class' => 'btn btn-default btn-sm btn-primary']) !!}--}}
                                                    {{--</div>--}}
                                                    {{--{!! Form::close() !!}--}}
                                                {{--</div><!-- /.modal-content -->--}}
                                            {{--</div><!-- /.modal-dialog -->--}}
                                        {{--</div><!-- /.modal -->--}}
                                    {{--</td>--}}
                                {{--@elseif($i==1)--}}
                                    {{--<td><button class="btn-circle btn-default" data-toggle="modal" data-target="#{!!$mission_new_location->mission_new_locations_id!!}">分配</button>--}}
                                        {{--<!-- Modal -->--}}
                                        {{--<div class="modal fade" id="{!!$mission_new_location->mission_new_locations_id!!}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">--}}
                                            {{--<div class="modal-dialog"  style="width:  800px">--}}
                                                {{--<div class="modal-content">--}}
                                                    {{--{!! Form::open(array('url' => 'mission/manage/local', 'method' => 'post','class' => 'form-horizontal')) !!}--}}
                                                    {{--{!! Form::hidden('mission_new_locations_id',$mission_new_location->mission_new_locations_id) !!}--}}
                                                    {{--<div class="modal-header">--}}
                                                        {{--<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>--}}
                                                        {{--<h4 class="modal-title" id="myModalLabel"><b>人員分配</b></h4>--}}
                                                    {{--</div>--}}
                                                    {{--<div class="modal-body ">--}}
                                                        {{--<table class="table table-bordered">--}}
                                                        {{--<tr><th>發布時間</th><td>{{ (new Carbon\Carbon($executiveRequireArrays[$mission_new_location->mission_new_locations_id][$i]['updated_at']))->formatLocalized('%Y/%m/%d')}}</td>--}}
                                                        {{--<th>發布時間</th><td>{{ (new Carbon\Carbon($executiveRequireArrays[$mission_new_location->mission_new_locations_id][$i]['updated_at']))->formatLocalized('%H:%M:%S')}}</td>--}}
                                                        {{--<th>欲增援人數</th><td>{!!$executiveRequireArrays[$mission_new_location->mission_new_locations_id][$i]['executive_require_people_num']!!} 人</td></tr>--}}
                                                        {{--<tr><th colspan="6">原因/備註</th></tr>--}}
                                                        {{--<tr><td colspan="6">{!! $executiveRequireArrays[$mission_new_location->mission_new_locations_id][$i]['executive_require_reason']!!}</td></tr>--}}
                                                        {{--</table>--}}
                                                        {{--<div class="row">--}}
                                                            {{--<div class="col-md-5" id="busy{!!$mission_new_location->mission_new_locations_id!!}">--}}
                                                                {{--<b>執行任務人員</b>--}}
{{--                                                                {!!dd($relieverNewLocationUsersArrays[$mission_new_location->mission_new_locations_id]);!!}--}}
                                                                {{--@if(isset($relieverNewLocationUsersArrays[$mission_new_location->mission_new_locations_id]))--}}
                                                                    {{--@for($j=1;$j<=count($relieverNewLocationUsersArrays[$mission_new_location->mission_new_locations_id]);$j++)--}}

                                                                        {{--<div class="input-group">--}}
                                                                            {{--<span class="form-control">{!!$relieverNewLocationUsersArrays[$mission_new_location->mission_new_locations_id][$j]['name']!!}</span>--}}
                                                                            {{--{!! Form::hidden('mission[]',$relieverNewLocationUsersArrays[$mission_new_location->mission_new_locations_id][$j]['id']) !!}--}}
                                                                            {{--<span class="input-group-btn" >--}}
                                                        {{--<button class="btn btn-default" type="button">-</button>--}}
                                                    {{--</span>--}}
                                                                        {{--</div>--}}

                                                                    {{--@endfor--}}
                                                                {{--@else--}}

                                                                {{--@endif--}}


                                                            {{--</div>--}}
                                                            {{--<div class="col-md-offset-1 col-md-5" id="idle{!!$mission_new_location->mission_new_locations_id!!}">--}}

                                                                {{--<b>未分配人員</b>--}}

                                                                {{--@if(isset($relieverFreeUsersArrays))--}}
                                                                    {{--@foreach($relieverFreeUsersArrays as $relieverFreeUsersArray)--}}
                                                                        {{--<div class="input-group">--}}
                                            {{--<span class="input-group-btn">--}}
                                                {{--<button class="btn btn-default" type="button">+</button>--}}
                                            {{--</span>--}}
                                                                            {{--<span class="form-control">{!!$relieverFreeUsersArray['name']!!}</span>--}}
                                                                            {{--{!! Form::hidden('free[]',$relieverFreeUsersArray['id']) !!}--}}
                                                                        {{--</div>--}}
                                                                    {{--@endforeach--}}
                                                                {{--@endif--}}






                                                            {{--</div>--}}
                                                        {{--</div>--}}




                                                    {{--</div>--}}

                                                    {{--<div class="modal-footer">--}}
                                                        {{--<button type="button" class="btn btn-default btn-sm" data-dismiss="modal">取消</button>--}}
                                                        {{--{!! Form::submit('送出分配', ['class' => 'btn btn-default btn-sm btn-primary']) !!}--}}
                                                    {{--</div>--}}
                                                    {{--{!! Form::close() !!}--}}
                                                {{--</div><!-- /.modal-content -->--}}
                                            {{--</div><!-- /.modal-dialog -->--}}
                                        {{--</div><!-- /.modal -->--}}
                                    {{--</td>--}}
                                {{--@else--}}
                                    {{--<td></td>--}}
                                {{--@endif--}}

                            {{--</tr>--}}
                        {{--@endfor--}}

                    {{--@endif--}}

                {{--@endforeach--}}

            {{--@endif--}}
            {{--</tbody>--}}



        {{--</table>--}}
        {{--!!舊版!!--}}

    </div>
    <div class="col-xs-7 col-sm-5 col-md-5" >
        <ul class="nav nav-tabs">
            <li class="active"><a href="#home" data-toggle="tab">任務列表</a></li>
            <li><a href="#profile" data-toggle="tab">中央</a></li>

        </ul>
        <br>
        <!-- Tab panes -->
        <div class="tab-content">
            <div class="tab-pane active" id="home" >
                {{--style="border: 1px solid #dddddd;height: 400px;"--}}
                {{--<p><b>三多路段 : </b> 向中央請求增援: 10人 增援原因: 火勢無法控制</p>--}}
                {{--<p><b>四德路段 : </b> 向中央請求增援: 20人 增援原因:火勢無法控制</p>--}}
                {{--<p><b>中央 : </b> 從中心向三多路段派送支援人數 10人</p>--}}
                {{--<p><b>中央 : </b>  從中心向四德路段派送支援人數 20人</p>--}}
                {{--<p><b>六合路段 : </b> 向中央請求增援: 10人 增援原因: 火勢無法控制</p>--}}

                {{--版1--}}
                {{--<table class="table table-bordered">--}}
                    {{--<thead>--}}
                        {{--<tr><td colspan="2">任務列表</td></tr>--}}
                        {{--<tr><td>任務地點</td><td>任務狀態</td></tr>--}}
                    {{--</thead>--}}
                    {{--<tbody>--}}
                        {{--<tr><td  class="warning">四維路段</td><td class="warning">任務執行中</td></tr>--}}
                        {{--<tr data-toggle="modal" data-target="#myModal"><td  class="danger">五福路段</td><td  class="danger">要求增援</td></tr>--}}
                        {{--<tr><td class="success">六和路段</td><td class="success">任務完成返回中</td></tr>--}}
                    {{--</tbody>--}}
                {{--</table>--}}

                {{--<!-- Modal -->--}}
                {{--<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">--}}
                    {{--<div class="modal-dialog">--}}
                        {{--<div class="modal-content">--}}
                            {{--<div class="modal-header">--}}
                                {{--<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>--}}
                                {{--<h4 class="modal-title" id="myModalLabel">要求增援總表</h4>--}}
                            {{--</div>--}}
                            {{--<div class="modal-body">--}}
                                {{--<table>--}}
                                    {{--<tr></tr>--}}
                                {{--</table>--}}
                            {{--</div>--}}
                            {{--<div class="modal-footer">--}}
                                {{--<button type="button" class="btn btn-default" data-dismiss="modal">取消</button>--}}
                                {{--<button type="button" class="btn btn-primary">增援確定</button>--}}
                            {{--</div>--}}
                        {{--</div><!-- /.modal-content -->--}}
                    {{--</div><!-- /.modal-dialog -->--}}
                {{--</div><!-- /.modal -->--}}
                {{--!!版1!!--}}
                {{--版2--}}
                <pre>綠色:完成任務，返回中&nbsp;&nbsp;&nbsp;&nbsp;橘色:任務執行中&nbsp;&nbsp;&nbsp;&nbsp; 紅色:任務執行中且要求增援</pre>
                    <table width="100%" class="table table-bordered">
                        <thead>
                            <tr><td colspan="8">各地方人員增援列表  (單位: 人)</td></tr>
                        </thead>
                        <tbody>

                        <tr>
                            <td></td>
                            <td>脫困</td>
                            <td>救火</td>
                            <td>清潔</td>
                            <td>道路修復</td>
                            <td>醫療</td>
                            <td>管線修復</td>
                            <td>警戒</td>
                        </tr>
                        <tr class="danger">
                            <td>四維路段</td>
                            <td class="text-right">2</td>
                            <td class="text-right"></td>
                            <td class="text-right"></td>
                            <td class="text-right">1</td>
                            <td class="text-right"></td>
                            <td class="text-right"></td>
                            <td class="text-right"></td>
                        </tr>
                        <tr class="danger">
                            <td>五福路段</td>
                            <td class="text-right">3</td>
                            <td class="text-right">1</td>
                            <td class="text-right">1</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td class="text-right">2</td>
                        </tr>
                        <tr class="warning">
                            <td>六合路段</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr class="success">
                            <td>七賢路段</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>

                        </tbody>
                    </table>
                {{--!!版2!!--}}
            </div>
            <div class="tab-pane" id="profile" style="border: 1px solid #dddddd;height: 400px;">
                {!! Form::select('name', array('三多路段' => '三多路段', '四德路段' => '四德路段', '五福路段' => '五福路段'), '五福路段', ['class' => 'form-control']) !!}
                <div style="height: 400px;" >

                    <p><b>中央 : </b>能夠增加調動的人數嗎?</p>
                    <p><b>五福路段 : </b>應該還能再增加1至2人</p>
                </div>
                <div class="input-group">
                    <input type="text" class="form-control">
                  <span class="input-group-btn">
                    <button class="btn btn-default" type="button">發送訊息</button>
                  </span>
                </div><!-- /input-group -->
            </div>
        </div>



        <br><br><br>
    </div>
    {{--<div class="col-xs-6 col-sm-4 col-md-4">--}}
        {{--<h4><b>中央通知</b></h4>--}}
        {{--還不知道要放什麼~~--}}
        {{--<div class="tab-content">--}}
        {{--<div class="tab-pane active" id="news">--}}
        {{--<blockquote class="blockquote-danger">--}}
        {{--<p><b>中央指揮官指派給您新的任務</b></p>--}}
        {{--<h6>通報編號 : 1   通報時間:  2015-05-17 10:50:21</h6>--}}
        {{--<h6>通報內容:</h6>--}}
        {{--<h6>通報地址:</h6>--}}
        {{--<h6>通報人:                 通報人電話:</h6>--}}
        {{--<h6>通報人信箱:</h6>--}}
        {{--<footer>2015-05-17 10:50:21</footer>--}}
    {{--</div>--}}
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
    </script>
@endsection
