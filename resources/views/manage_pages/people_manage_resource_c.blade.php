@extends('manage_master')
@section('title')
    人員管理(中心)
@endsection
@section('link')
    <li>{!! Html::link('resource/manage/product/center', '物資管理') !!}</li>
    <li>{!! Html::link('resource/manage/people/center', '人員管理') !!}</li>
@endsection
@section('content')
    {{--1.新增人員需求 (人數、人員背景)--}}
    {{--2.查看應徵志工人員資料 (決定身分)--}}
    {{--3.分配人員至各地方單位--}}
    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist">
        <li class="active"><a href="#application" role="tab" data-toggle="tab"><b>招募志工</b></a></li>
        <li><a href="#assign" role="tab" data-toggle="tab"><b>分配志工</b></a></li>

    </ul>
    <br><br>
    <!-- Tab panes -->
    <div class="tab-content">
        <div class="tab-pane active" id="application">
            {{--<div class="col-xs-16 col-sm-12 col-md-12" >--}}
                {{--1.招募志工 2.決定錄取(並決定身分)--}}
            {{--</div>--}}
            <div class="col-xs-16 col-sm-12 col-md-12" >
                <div class="col-xs-10 col-sm-7 col-md-7" >
                    <table class="table  table-striped">
                        {{--{!! Form::open(array('url' => 'call/manage/save', 'method' => 'post')) !!}--}}
                        <thead>
                        <tr><td colspan="7"><h5><b>應徵志工人員資料</b></h5></td></tr>
                        <tr><th width="10%">姓名</th><th width="10%">電話</th><th width="10%">Email</th><th width="20%">所在地</th><th width="20%">技能</th><th width="20%">欲應徵職位</th>
                            <th width="10%">
                                {!! Form::submit('錄取志工', ['class' => 'btn btn-default btn-sm']) !!}
                            </th>
                        </tr>
                        </thead>
                        <tbody>

                        <tr><td>王小明</td><td>0912312312</td><td>123yahoo.com.tw</td><td>目前地點</td><td>技能</td><td>欲應徵職位</td><td>{!! Form::select('size', array('L' => '醫療組', 'S' => '脫困組')) !!}</td></tr>

                        </tbody>
                        {{--{!! Form::close() !!}--}}
                    </table>
                </div>
                <div class="col-xs-6 col-sm-5 col-md5" >
                    <table class="table  table-striped">
                        {{--{!! Form::open(array('url' => 'call/manage/save', 'method' => 'post')) !!}--}}
                        <thead>
                        <tr><td colspan="4"><h5><b>人員需求列表</b></h5></td>
                            <td class="text-right" colspan="2">
                                <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#createVolunteerNeedBlock"> 新增新的志工需求單</button>
                            </td>
                        </tr>
                        <!-- Modal -->
                        <div class="modal fade" id="createVolunteerNeedBlock" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    {{--{!! Form::open(array('url' => 'call/manage/createMission', 'method' => 'post','class' => 'form-horizontal','onSubmit' => 'return checkForm();')) !!}--}}
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h4 class="modal-title" id="myModalLabel"><b>創建新任務</b></h4>
                                    </div>
                                    <div class="modal-body">
                                        <dl class="dl-horizontal">
                                            <dt>需求人數</dt>
                                            <dd>{!! Form::number('require_number','',['id' =>  'mission_list_name','class' => 'form-control text-right', 'required','min'=>'0']) !!}</dd> <br>

                                            <dt>需求人員資格內容</dt>
                                            <dd> {!! Form::textarea('content', '', ['id' =>  'leader','class' => 'form-control', 'required','style'=>'resize: vertical']) !!}<br>

                                        </dl>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">取消</button>
                                        {!! Form::submit('招募志工', ['class' => 'btn btn-default btn-sm btn-primary']) !!}
                                    </div>
                                    {{--{!! Form::close() !!}--}}
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div><!-- /.modal -->
                        <tr><th>編號</th><th>需求人數</th><th>已招募人數</th><th>需求人員資格</th><th>建表時間</th><th>詳細</th></tr>
                        </thead>
                        <tbody>

                        <tr><td>1</td><td>23</td><td>2</td><td>需具有一般護理知識</td><td width="100px">2015-07-22 07:49:50</td><td><a>詳細</a></td></tr>

                        </tbody>
                        {{--{!! Form::close() !!}--}}
                    </table>
                </div>
            </div>
        </div>
        <div class="tab-pane" id="assign">
            {{--<div class="col-xs-16 col-sm-12 col-md-12" >--}}
                {{--3.接到中央指揮官派遣志工需求--}}
                {{--4.分配已招募到志工至各任務<br>--}}
            {{--</div>--}}


            <div class="col-xs-16 col-sm-12 col-md-12" >

                <div class="col-xs-12 col-sm-8 col-md-8" >
                    <table class="table  table-striped">
                        {{--{!! Form::open(array('url' => 'call/manage/save', 'method' => 'post')) !!}--}}
                        <thead>
                        <tr><td colspan="7"><h5><b>志工人員資料</b></h5></td></tr>
                        <tr><th>種類</th><th>姓名</th><th>電話</th><th>Email</th><th>所在地</th><th>技能</th><th>欲應徵職位</th>
                            <th>
                                {!! Form::submit('將志工分配至現有任務', ['class' => 'btn btn-default btn-sm']) !!}
                            </th>
                        </tr>
                        </thead>
                        <tbody>

                        <tr><td>醫療組</td><td>王小明</td><td>0912312312</td><td>123yahoo.com.tw</td><td>目前地點</td><th>技能</th><th>欲應徵職位</th><td>{!! Form::select('size', array('L' => '任務1', 'S' => '任務2')) !!}</td></tr>

                        </tbody>
                        {{--{!! Form::close() !!}--}}
                    </table>
                </div>
                <div class="col-xs-4 col-sm-4 col-md-4" >
                    <table class="table  table-striped">
                        <thead>
                        <tr><td colspan="7"><h5><b>人員需求列表(中央決定派遣給任務)</b></h5></td></tr>
                        <tr><th>任務編號</th><th>需求人數</th><th>需求人員種類</th></tr>
                        </thead>
                        <tbody>

                        <tr><td>1</td><td>23</td><td>醫療組</td></tr>

                        </tbody>
                    </table>

                </div>
            </div>
        </div>

    </div>

@endsection
