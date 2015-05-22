@extends('manage_master')
@section('title')
    任務管理
@endsection

@section('content_c8')

    <h4>任務管理</h4>
    <br><br>
    <table class="table  table-bordered table-hover">
        <thead>
            <tr>
                <th width="6%">任務編號</th>
                <th width="14%">任務名稱</th>
                <th width="12%">脫困組人數</th>
                <th width="12%">醫療組人數</th>
                <th width="12%">進度條</th>
                <th width="35%">最新回報</th>
                <th width="8%">詳細</th>
            </tr>
        </thead>
        <tbody>

        @if (isset($mission_lists) )
            @foreach ($mission_lists as $mission_list )
                @if ($mission_list->mission_name != "未分配任務")

                    <tr>
                        <td >{!!$mission_list->mission_list_id!!}</td>
                        <td >{!!$mission_list->mission_name!!}</td>

                        @if (isset($relieverUsersArray) )
                            <td>{!!$relieverUsersArray[$mission_list->mission_list_id]!!} 人</td>
                        @endif

                        @if (isset($emtUsersArray) )
                            <td>{!!$emtUsersArray[$mission_list->mission_list_id]!!} 人</td>
                        @endif

                        <td>
                            <div class="progress">
                                @if (isset($reports[$mission_list->mission_list_id]) )
                                <div class="progress-bar" role="progressbar" aria-valuenow="{!!$achievement_array[$mission_list->mission_list_id]!!}" aria-valuemin="0" aria-valuemax="100"
                                     style="{{$achievement_array[$mission_list->mission_list_id]}};">
                                    {!!$achievement_array[$mission_list->mission_list_id."word"]!!}
                                </div>
                                @endif
                            </div>
                        </td>
                        <td>
                        @if (isset($reports[$mission_list->mission_list_id]) )
                            {!!$reports[$mission_list->mission_list_id]!!}
                        @endif
                        </td>
                        <td>{!! link_to('#', '詳細') !!}</td>
                    </tr>

                @endif
            @endforeach
        @endif
</tbody>
</table>

@endsection
@section('content_c4')

@if (isset($mission_lists))
<div>
<h5><b> {!!$mission_list->mission_list_id ." ". $mission_list->mission_name!!}</b></h5>
<p><b>負責人 :</b>{!!$mission_list_charge_Array[$mission_list->mission_list_id."name"]!!} <b>
        <br>Email : {!!$mission_list_charge_Array[$mission_list->mission_list_id."email"]!!}
        <br>連絡電話 : {!!$mission_list_charge_Array[$mission_list->mission_list_id."phone"]!!}</b> {!! link_to('#', '傳訊息') !!}</p>
    @endif
<br>
<ul class="nav nav-tabs">
<li><a href="#call" data-toggle="tab">通報</a></li>
<li><a href="#history" data-toggle="tab">歷史回報</a></li>

</ul>
<div class="tab-content">
<div class="tab-pane active" id="call">
    <table class="table table-hover">
        <thead>
        <tr>
            <th width="2%">通報編號</th>
            <th width="50%">通報內容</th>
            <th width="2%">脫困組人數</th>
            <th width="20%">進度條</th>
        </tr>
        </thead>
        <tbody>

            @if(isset($mission_contents))
                @foreach($mission_contents as $mission_content)
                    <tr>
            <td>{!!$mission_content->mission_id!!}</td>
            <td>{!!$mission_content->mission_content!!}</td>
            <td></td>
                        {{--@if(isset($relieverMissionUsersArray))--}}
            {{--<td>{!!$relieverMissionUsersArray[$mission_content->mission_id]!!}</td>--}}
                        {{--@endif--}}
            <td>
                <div class="progress">
                    <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 0%;">
                        進度條
                    </div>
                </div>
            </td>
        </tr>
                @endforeach
@endif


        </tbody>
    </table>
</div>
<div class="tab-pane" id="history">
    <table class="table table-hover">
        <thead>
        <tr>
            <th width="20%">回報時間</th>
            <th width="24%">回報內容</th>
        </tr>
        </thead>
        <tbody>
        @if(isset($mission_list_reports))
            @foreach($mission_list_reports as $mission_list_report)
                <tr>
                    <td width="20%">{!!$mission_list_report->updated_at!!}</td>
                    <td width="24%">{!!$mission_list_report->report_content!!}</td>
                </tr>
            @endforeach
        @endif

        </tbody>
    </table>
</div>

</div>

</div>

@endsection



@section('javascript')
    <script type="text/javascript" src="/js/bootstrap.min.js"></script>
@endsection
