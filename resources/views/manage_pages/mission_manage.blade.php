@extends('manage_master')
@section('title')
    任務管理
@endsection
@section('link')
    <li>{!! Html::link('call/manage', '通報管理') !!}</li>
    <li>{!! Html::link('mission/manage', '任務管理') !!}</li>
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
@section('content')

<h4>任務管理</h4><br>


            <table class="table table-bordered">
                <tr><th width="5%">任務編號</th><th width="10%">名稱</th><th colspan="2" width="15%">負責人</th><th  colspan="2" width="30%">通報</th><th  colspan="3" width="30%">最新回報</th></tr>
                @if (isset($mission_lists) )
                @foreach ($mission_lists as $mission_list )
                    @if ($mission_list->mission_name != "未分配任務")
                <tr class="header expand"><td rowspan="2">{!!$mission_list->mission_list_id!!}</td><td rowspan="2">{!!$mission_list->mission_name!!}</td><td rowspan="2" width="5%">姓名 <span class="sign"></span></td><td rowspan="2" width="10%">{!!$mission_list_charge_Array[$mission_list->mission_list_id."name"]!!}</td><th>編號</th><th>內容 <span class="sign"></span></th><th>時間</th><th>內容 <span class="sign"></span></th><th width="10%">增援需求</th></tr>
                 @if(count($reports_array[$mission_list->mission_list_id]) < 3 && count($mission_contents_array[$mission_list->mission_list_id]) <3)
                                {!!$n=  4;!!}
                @elseif(count($reports_array[$mission_list->mission_list_id]) > count($mission_contents_array[$mission_list->mission_list_id]))
                           {!!$n = count($reports_array[$mission_list->mission_list_id])+1;!!}
                @elseif(count($reports_array[$mission_list->mission_list_id]) < count($mission_contents_array[$mission_list->mission_list_id]))
                                {!!$n = count($mission_contents_array[$mission_list->mission_list_id])+1;!!}
                @endif

                @for($i=1;$i<$n;$i++)
                    {{--{!!dd($n);!!}--}}
                                <tr>
                                @if($i==1)
                                    @elseif($i==2)
                                <td colspan="2"></td><td>電話</td><td>{!!$mission_list_charge_Array[$mission_list->mission_list_id."phone"]!!}</td>
                                @elseif($i==3)
                                    <td colspan="2"></td><td>Email</td><td> {!!$mission_list_charge_Array[$mission_list->mission_list_id."email"]!!}</td>
                                    @else
                                        <td colspan="4"></td>
                                @endif
                                    {{--{!!$n!!}--}}
                                @if($i <  count($mission_contents_array[$mission_list->mission_list_id])+1 && isset($mission_contents_array[$mission_list->mission_list_id][$i]))
                                    <td>{!!$mission_contents_array[$mission_list->mission_list_id][$i]['id']!!}</td>
                                    <td>{!!$mission_contents_array[$mission_list->mission_list_id][$i]['content']!!}</td>
                                @else
                                    <td colspan="2"></td>
                                @endif
                                @if($i < count($reports_array[$mission_list->mission_list_id])+1 && isset($reports_array[$mission_list->mission_list_id][$i]))
                                    <td>{!!$reports_array[$mission_list->mission_list_id][$i]['time']!!}</td>
                                   <td>{!!$reports_array[$mission_list->mission_list_id][$i]['content']!!}</td>
                                    @else
                                        <td colspan="2"></td>
                                @endif
                                    <td>

                                @if($i==1 && $mission_support_people_Array[$mission_list->mission_list_id."amount"] !=0 )
                                                                  印人員按鈕

                                @else

                                @endif
                                    @if($i==1 && isset($mission_support_product_Array[$mission_list->mission_list_id."id"] ) )
                                                    印物資按鈕

                                    @else

                                    @endif
                                    </td>
                    </tr>
                 @endfor



                    @endif
                @endforeach
            </table>

@endif

{{--<table class="table  table-bordered">--}}
{{--<tr>--}}
{{--<th width="5%">任務<br>編號</th>--}}
{{--<th width="15%">任務內容</th>--}}
{{--<th width="10%">負責人</th>--}}
{{--<th>脫困組<br>人數</th>--}}
{{--<th>醫療組<br>人數</th>--}}
{{--<th width="30%"><table  class="table-nonbordered" width="100%"><tr><td colspan="2">任務通報</td></tr><tr><td width="50%">通報編號</td><td width="50%">通報內容</td></tr></table>--}}
{{--<th width="40%">最新回報</th>--}}
{{--<th width="10%">增援需求</th>--}}
{{--</tr>--}}
{{--<tr>--}}
{{--<td>1</td>--}}
{{--<td>--}}
{{--<table>--}}
{{--<tr><td><b>任務名稱</b>: 逢甲地區<br><br></td></tr>--}}
{{--<tr><td><b>脫困組</b>: 20人 <b>醫療組</b>: 20人<br><br></td></tr>--}}
{{--<tr><td><b>負責人</b>:陳芊蓉</td></tr>--}}
{{--<tr><td><b>電話</b>:0921345678</td></tr>--}}
{{--<tr><td><b>Email</b>:</td></tr>--}}
{{--<tr><td>hhhhhhhhhhhhhhhhhhhhhyahoo.com.tw</td></tr>--}}


{{--</table>--}}
{{--</td>--}}
{{--<td>陳芊蓉</td>--}}
{{--<td>20</td>--}}
{{--<td>--}}
{{--<div  style="height:150px;width:100%;overflow:auto;">--}}
{{--<ul class="list-group">--}}
{{--<li class="list-group-item"><b>編號:</b> 1 <br><b>地址:</b> 台中市西屯區文華路100號<br><b>通報內容:</b>火勢無法控制, 需要更多脫困及醫療人員支援</li>--}}
{{--<li class="list-group-item"><b>編號:</b> 1 <b>地址:</b> 台中市西屯區文華路100號<br>火勢無法控制, 需要更多脫困及醫療人員支援</li>--}}
{{--<li class="list-group-item"><b>編號:</b> 1 <b>地址:</b> 台中市西屯區文華路100號<br>火勢無法控制, 需要更多脫困及醫療人員支援</li>--}}
{{--<li class="list-group-item"><b>編號:</b> 1 <b>地址:</b> 台中市西屯區文華路100號<br>火勢無法控制, 需要更多脫困及醫療人員支援</li>--}}
{{--<li class="list-group-item"><b>編號:</b> 1 <b>地址:</b> 台中市西屯區文華路100號<br>火勢無法控制, 需要更多脫困及醫療人員支援</li>--}}
{{--<li class="list-group-item"><b>編號:</b> 1 <b>地址:</b> 台中市西屯區文華路100號<br>火勢無法控制, 需要更多脫困及醫療人員支援</li>--}}
{{--<li class="list-group-item"><b>編號:</b> 1 <b>地址:</b> 台中市西屯區文華路100號<br>火勢無法控制, 需要更多脫困及醫療人員支援</li>--}}
{{--<li class="list-group-item"><b>編號:</b> 1 <b>地址:</b> 台中市西屯區文華路100號<br>火勢無法控制, 需要更多脫困及醫療人員支援</li>--}}
{{--</ul>--}}
{{--<table class="table  ">--}}
    {{--<thead>--}}
        {{--<tr>--}}
            {{--<th>通報編號</th>--}}
            {{--<th>通報內容</th>--}}
        {{--</tr>--}}
    {{--</thead>--}}
    {{--<body>--}}
        {{--<tr>--}}
            {{--<td>1</td><td>從地面裂縫中滲出水</td>--}}
        {{--</tr>--}}
        {{--<tr>--}}
            {{--<td>1</td><td>從地面裂縫中滲出水</td>--}}
        {{--</tr>--}}
        {{--<tr>--}}
            {{--<td>1</td><td>從地面裂縫中滲出水</td>--}}
        {{--</tr>--}}
        {{--<tr>--}}
            {{--<td>1</td><td>從地面裂縫中滲出水</td>--}}
        {{--</tr>--}}
        {{--<tr>--}}
            {{--<td>1</td><td>從地面裂縫中滲出水</td>--}}
        {{--</tr>--}}
        {{--<tr>--}}
            {{--<td>1</td><td>從地面裂縫中滲出水</td>--}}
        {{--</tr>--}}
        {{--<tr>--}}
            {{--<td>1</td><td>從地面裂縫中滲出水</td>--}}
        {{--</tr>--}}
        {{--<tr>--}}
            {{--<td>1</td><td>從地面裂縫中滲出水</td>--}}
        {{--</tr>--}}

    {{--</body>--}}
    {{--style="border-bottom: 2px solid #dddddd"--}}
{{--<tr style="background-color: #f9f9f9"><th>編號</th><td>1</td></tr>--}}
{{--<tr style="background-color: #f9f9f9"><th>地址</th><td>台中市西屯區文華路100號</td></tr>--}}
{{--<tr style="background-color: #f9f9f9"><th>通報內容</th><td>火勢無法控制, 需要更多脫困及醫療人員支援</td></tr>--}}
{{--<tr style="border-left: 0px solid #dddddd;border-right: 0px solid #dddddd"><td colspan="2"></td></tr>--}}
{{--<tr><th>編號</th><td>1</td></tr>--}}
{{--<tr><th>地址</th><td>台中市西屯區文華路100號</td></tr>--}}
{{--<tr><th>通報內容</th><td>火勢無法控制, 需要更多脫困及醫療人員支援</td></tr>--}}
{{--<tr><td colspan="2"></td></tr>--}}
{{--<tr style="background-color: #f9f9f9"><th>編號</th><td>1</td></tr>--}}
{{--<tr style="background-color: #f9f9f9"><th>地址</th><td>台中市西屯區文華路100號</td></tr>--}}
{{--<tr style="background-color: #f9f9f9"><th>通報內容</th><td>火勢無法控制, 需要更多脫困及醫療人員支援</td></tr>--}}
{{--<tr><td colspan="2"></td></tr>--}}
{{--<tr><th>編號</th><td>1</td></tr>--}}
{{--<tr><th>地址</th><td>台中市西屯區文華路100號</td></tr>--}}
{{--<tr><th>通報內容</th><td>火勢無法控制, 需要更多脫困及醫療人員支援</td></tr>--}}
{{--<tr><td colspan="2"></td></tr>--}}
{{--<tr style="background-color: #f9f9f9"><th>編號</th><td>1</td></tr>--}}
{{--<tr style="background-color: #f9f9f9"><th>地址</th><td>台中市西屯區文華路100號</td></tr>--}}
{{--<tr style="background-color: #f9f9f9"><th>通報內容</th><td>火勢無法控制, 需要更多脫困及醫療人員支援</td></tr>--}}
{{--</table>--}}
{{--<table class="table  table-bordered"> style="border-bottom: 2px solid #dddddd"--}}
{{--<tr><th>編號</th><td>1</td></tr>--}}
{{--<tr><th>地址</th><td>台中市西屯區文華路100號</td></tr>--}}
{{--<tr><th>通報內容</th><td>火勢無法控制, 需要更多脫困及醫療人員支援</td></tr>--}}

{{--</table>--}}

{{--</div>--}}
{{--</td>--}}
{{--<td>--}}
{{--<div  style="height:150px;width:100%;overflow:auto;">--}}
{{--<ul class="list-group">--}}
{{--<li class="list-group-item"><b>2014/05/13 14:00:30</b><br>火勢無法控制, 需要更多脫困及醫療人員支援</li>--}}
{{--<li class="list-group-item"><b>2014/05/13 14:00:30</b><br>火勢無法控制, 需要更多脫困及醫療人員支援</li>--}}
{{--<li class="list-group-item"><b>2014/05/13 14:00:30</b><br>火勢無法控制, 需要更多脫困及醫療人員支援</li>--}}
{{--<li class="list-group-item"><b>2014/05/13 14:00:30</b><br>火勢無法控制, 需要更多脫困及醫療人員支援</li>--}}
{{--<li class="list-group-item"><b>2014/05/13 14:00:30</b><br>火勢無法控制, 需要更多脫困及醫療人員支援</li>--}}
{{--<li class="list-group-item"><b>2014/05/13 14:00:30</b><br>火勢無法控制, 需要更多脫困及醫療人員支援</li>--}}
{{--<li class="list-group-item"><b>2014/05/13 14:00:30</b><br>火勢無法控制, 需要更多脫困及醫療人員支援</li>--}}
{{--<li class="list-group-item"><b>2014/05/13 14:00:30</b><br>火勢無法控制, 需要更多脫困及醫療人員支援</li>--}}
{{--<li class="list-group-item"><b>2014/05/13 14:00:30</b><br>火勢無法控制, 需要更多脫困及醫療人員支援</li>--}}
{{--<li class="list-group-item"><b>2014/05/13 14:00:30</b><br>火勢無法控制, 需要更多脫困及醫療人員支援</li>--}}
{{--<li class="list-group-item"><b>2014/05/13 14:00:30</b><br>火勢無法控制, 需要更多脫困及醫療人員支援</li>--}}

{{--</ul>--}}
{{--<table class="table table-striped table-bordered" width="100%">--}}

{{--<tr><td><b>2014/05/13 14:00:30</b><br>火勢無法控制, 需要更多脫困及醫療人員支援</td></tr>--}}
{{--<tr><td><b>2014/05/13 14:00:30</b><br>火勢無法控制, 需要更多脫困及醫療人員支援</td></tr>--}}
{{--<tr><td><b>2014/05/13 14:00:30</b><br>火勢無法控制, 需要更多脫困及醫療人員支援</td></tr>--}}
{{--<tr><td><b>2014/05/13 14:00:30</b><br>火勢無法控制, 需要更多脫困及醫療人員支援</td></tr>--}}
{{--<tr><td><b>2014/05/13 14:00:30</b><br>火勢無法控制, 需要更多脫困及醫療人員支援</td></tr>--}}

{{--</table>--}}
{{--</div>--}}
{{--</td>--}}
{{--<td>增援需求</td>--}}
{{--</tr>--}}


{{--</table>--}}

@endsection


{{--@section('content_c7')--}}

    {{--<h4>任務管理</h4>--}}
    {{--<br><br>--}}
    {{--<table class="table  table-bordered table-hover">--}}
        {{--<thead>--}}
            {{--<tr>--}}
                {{--<th width="8%">任務<br>編號</th>--}}
                {{--<th width="14%">任務名稱</th>--}}
                {{--<th width="12%">脫困組<br>人數</th>--}}
                {{--<th width="12%">醫療組<br>人數</th>--}}
                {{--<th width="12%">進度條</th>--}}
                {{--<th width="35%">最新回報</th>--}}
                {{--<th width="7%">詳細</th>--}}
            {{--</tr>--}}
        {{--</thead>--}}
        {{--<tbody>--}}

        {{--@if (isset($mission_lists) )--}}
            {{--@foreach ($mission_lists as $mission_list )--}}
                {{--@if ($mission_list->mission_name != "未分配任務")--}}

                    {{--<tr>--}}
                        {{--<td >{!!$mission_list->mission_list_id!!}</td>--}}
                        {{--<td >{!!$mission_list->mission_name!!}</td>--}}

                        {{--@if (isset($relieverUsersArray) )--}}
                            {{--<td>{!!$relieverUsersArray[$mission_list->mission_list_id]!!} 人</td>--}}
                        {{--@endif--}}

                        {{--@if (isset($emtUsersArray) )--}}
                            {{--<td>{!!$emtUsersArray[$mission_list->mission_list_id]!!} 人</td>--}}
                        {{--@endif--}}

                        {{--<td>--}}
                            {{--<div class="progress">--}}
                                {{--@if (isset($reports[$mission_list->mission_list_id]) )--}}
                                {{--<div class="progress-bar" role="progressbar" aria-valuenow="{!!$achievement_array[$mission_list->mission_list_id]!!}" aria-valuemin="0" aria-valuemax="100"--}}
                                     {{--style="{{$achievement_array[$mission_list->mission_list_id]}};">--}}
                                    {{--{!!$achievement_array[$mission_list->mission_list_id."word"]!!}--}}
                                {{--</div>--}}
                                {{--@endif--}}
                            {{--</div>--}}
                        {{--</td>--}}
                        {{--<td>--}}
                        {{--@if (isset($reports[$mission_list->mission_list_id]) )--}}
                            {{--{!!$reports[$mission_list->mission_list_id]!!}--}}
                        {{--@endif--}}
                        {{--</td>--}}
                        {{--<td>{!! link_to('#', '詳細') !!}</td>--}}
                    {{--</tr>--}}

                {{--@endif--}}
            {{--@endforeach--}}
        {{--@endif--}}
{{--</tbody>--}}
{{--</table>--}}

{{--@endsection--}}
{{--@section('content_c5')--}}

{{--@if (isset($mission_lists))--}}
{{--<div>--}}
{{--<h5><b> {!!$mission_list->mission_list_id ." ". $mission_list->mission_name!!}</b></h5>--}}
{{--<p><b>負責人 :</b>{!!$mission_list_charge_Array[$mission_list->mission_list_id."name"]!!} <b>--}}
        {{--<br>Email : {!!$mission_list_charge_Array[$mission_list->mission_list_id."email"]!!}--}}
        {{--<br>連絡電話 : {!!$mission_list_charge_Array[$mission_list->mission_list_id."phone"]!!}</b> {!! link_to('#', '傳訊息') !!}</p>--}}
    {{--@endif--}}
{{--<br>--}}
{{--<ul class="nav nav-tabs">--}}
{{--<li><a href="#call" data-toggle="tab">通報</a></li>--}}
{{--<li><a href="#history" data-toggle="tab">歷史回報</a></li>--}}

{{--</ul>--}}
{{--<div class="tab-content">--}}
{{--<div class="tab-pane active" id="call">--}}
    {{--<table class="table table-hover">--}}
        {{--<thead>--}}
        {{--<tr>--}}
            {{--<th width="20%">通報<br>編號</th>--}}
            {{--<th width="40%">通報內容</th>--}}
            {{--<th width="20%">脫困組<br>人數</th>--}}
            {{--<th width="20%">進度條</th>--}}
        {{--</tr>--}}
        {{--</thead>--}}
        {{--<tbody>--}}

            {{--@if(isset($mission_contents))--}}
                {{--@foreach($mission_contents as $mission_content)--}}
                    {{--<tr>--}}
            {{--<td>{!!$mission_content->mission_id!!}</td>--}}
            {{--<td>{!!$mission_content->mission_content!!}</td>--}}
           {{--@if(isset($relieverMissionUsersArray))--}}
            {{--<td>{!!$relieverMissionUsersArray[$mission_content->mission_id]!!} 人</td>--}}
           {{--@endif--}}
            {{--<td>--}}
                {{--<div class="progress">--}}
                    {{--<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 0%;">--}}
                        {{--進度條--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</td>--}}
        {{--</tr>--}}
                {{--@endforeach--}}
{{--@endif--}}


        {{--</tbody>--}}
    {{--</table>--}}
{{--</div>--}}
{{--<div class="tab-pane" id="history">--}}
    {{--<table class="table table-hover">--}}
        {{--<thead>--}}
        {{--<tr>--}}
            {{--<th width="20%">回報時間</th>--}}
            {{--<th width="24%">回報內容</th>--}}
        {{--</tr>--}}
        {{--</thead>--}}
        {{--<tbody>--}}
        {{--@if(isset($mission_list_reports))--}}
            {{--@foreach($mission_list_reports as $mission_list_report)--}}
                {{--<tr>--}}
                    {{--<td width="20%">{!!$mission_list_report->updated_at!!}</td>--}}
                    {{--<td width="24%">{!!$mission_list_report->report_content!!}</td>--}}
                {{--</tr>--}}
            {{--@endforeach--}}
        {{--@endif--}}

        {{--</tbody>--}}
    {{--</table>--}}
{{--</div>--}}

{{--</div>--}}

{{--</div>--}}

{{--@endsection--}}



@section('javascript')
    <script type="text/javascript" src="/js/bootstrap.min.js"></script>

    <script language="JavaScript">
        $('.header').click(function(){
            $(this).toggleClass('expand').next().nextUntil('tr.header').slideToggle(100);
        });
        $('.header').trigger('click'); //trigger :觸發指定事件
    </script>
@endsection
