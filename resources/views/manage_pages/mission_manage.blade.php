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
                <th width="20%">任務名稱</th>
                <th width="12%">脫困組人數</th>
                <th width="12%">醫療組人數</th>
                <th width="12%">進度條</th>
                <th width="35%">最新回報</th>
                <th width="8%">詳細</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td >任務名稱</td>
                <td>脫困組人數</td>
                <td>醫療組人數</td>
                <td>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 0%;">
                            進度條
                        </div>
                    </div>
                </td>
                <td>最新回報</td>
                <td>{!! link_to('#', '詳細') !!}</td>
            </tr>
            <tr>
                <td >逢甲區域</td>
                <td>32</td>
                <td>28</td>
                <td>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
                            60%
                        </div>
                    </div>
                </td>
                <td>門已破壞</td>
                <td>{!! link_to('#', '詳細') !!}</td>
            </tr>
            <tr>
                <td >逢甲區域</td>
                <td>32</td>
                <td>28</td>
                <td>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
                            60%
                        </div>
                    </div>
                </td>
                <td>門已破壞</td>
                <td>{!! link_to('#', '詳細') !!}</td>
            </tr>
        </tbody>
    </table>

@endsection
@section('content_c4')
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
    {{ HTML::script('js/bootstrap.js') }}
@endsection
