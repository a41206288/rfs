@extends('manage_master')
@section('title')
    任務管理
@endsection

@section('content_c9')

    <h4>任務管理</h4>
    <br><br>
    <table class="table  table-bordered table-hover">
        <thead>
            <tr>
                <th width="20%">任務名稱</th>
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
                        <td >{!!$mission_list->mission_name!!}</td>

                        @if (isset($relieverUsersArray) )
                            <td>{!!$relieverUsersArray[$mission_list->mission_list_id]!!}</td>
                        @endif

                        @if (isset($emtUsersArray) )
                            <td>{!!$emtUsersArray[$mission_list->mission_list_id]!!}</td>
                        @endif

                        <td>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 0%;">
                                    進度條
                                </div>
                            </div>
                        </td>
                        <td>最新回報</td>
                        {{--{!! Form::open(array('url' => 'mission/manage', 'method' => 'post')) !!}--}}
                        {{--{!! Form::select('country',$country_or_city_inputs,'請選擇',['onchange' => 'this.form.submit()'] )!!}--}}
                        <td>{!! link_to('#', '詳細') !!}</td>
                        {{--{!! Form::close() !!}--}}

                    </tr>

                @endif
            @endforeach
        @endif
</tbody>
</table>

@endsection
@section('content_c3')
<div>
<h5><b>任務編號 任務名稱</b></h5>
<p><b>負責人 :</b> 陳曉明 <b>連絡電話 :</b>0912345678 {!! link_to('#', '傳訊息') !!}</p>

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
            <th width="20%">通報編號</th>
            <th width="24%">通報內容</th>
            <th width="12%">進度條</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>通報編號</td>
            <td>通報內容</td>
            <td>
                <div class="progress">
                    <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 0%;">
                        進度條
                    </div>
                </div>
            </td>

        </tr>
        <tr>
            <td >1</td>
            <td>通報內容</td>
            <td>
                <div class="progress">
                    <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
                        60%
                    </div>
                </div>
            </td>

        </tr>
        <tr>
            <td >2</td>
            <td>通報內容</td>
            <td>
                <div class="progress">
                    <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
                        60%
                    </div>
                </div>
            </td>

        </tr>
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
        <tr>
            <td>回報時間</td>
            <td>通報內容</td>


        </tr>
        <tr>
            <td>回報時間</td>
            <td>通報內容</td>
        </tr>
        <tr>
            <td>回報時間</td>
            <td>通報內容</td>
        </tr>
        </tbody>
    </table>
</div>

</div>

</div>

@endsection



@section('javascript')
    <script type="text/javascript" src="/js/bootstrap.min.js"></script>
@endsection
