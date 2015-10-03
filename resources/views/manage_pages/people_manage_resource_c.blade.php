@extends('manage_master')
@section('title')
    人員管理(中心)
@endsection
@section('link')
    <li>{!! Html::link('resource/manage/product/center', '物資管理') !!}</li>
    <li>{!! Html::link('resource/manage/people/center', '人員管理') !!}</li>
@endsection
@section('css')
    tr.header,tr.header_no_next
    {
    cursor:pointer;
    }
    .header .sign:after{
    content:"▲";
    display:inline-block;
    }
    .header.expand .sign:after{
    content:"▼";
    }

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
                <div class="col-xs-8 col-sm-6 col-md-6" >
                    <table class="table  table-striped">
                        {{--{!! Form::open(array('url' => 'call/manage/save', 'method' => 'post')) !!}--}}
                        <thead>
                        <tr><td colspan="7"><h5><b>應徵志工人員資料</b></h5></td></tr>
                        <tr><th width="10%">姓名</th><th width="10%">電話</th>
                            {{--<th width="10%">Email</th>--}}
                            <th width="20%">現居地</th>
                            <th width="20%">人員種類</th>
                            <th width="20%">技能</th>
                            {{--<th width="10%">欲應徵職位</th>--}}
                            <th width="20%">
                                {!! Form::submit('錄取志工', ['class' => 'btn btn-default btn-sm']) !!}
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(isset($center_support_person_details))
                            @foreach($center_support_person_details as $center_support_person_detail)
                                <tr><td>{!!$center_support_person_detail->center_support_person_detail_name	!!}</td>
                                    <td>{!!$center_support_person_detail->phone!!}</td>
                                    {{--<td>{!!$center_support_person_detail->email!!}</td>--}}
                                    <td>{!!$center_support_person_detail->country_or_city_input ." ". $center_support_person_detail->township_or_district_input !!}</td>
                                    <td>醫療組</td>
                                    <td>{!!$center_support_person_detail->skill!!}</td>
                                    {{--<td>{!!$center_support_person_detail->center_support_person_requirement!!}</td>--}}

                                             {{--<td>{!! Form::select('yesOrNo', $roles,'請選擇') !!}</td>--}}
                                    <td>
                                        {!! Form::select('yesOrNo', array('錄取' => '錄取', '不錄取' => '不錄取','請選擇' => '請選擇'), '請選擇', ['class' => 'form-control']) !!}
                                    </td>

                                </tr>
                            @endforeach
                        @endif

                        </tbody>
                        {{--{!! Form::close() !!}--}}
                    </table>
                </div>
                <div class="col-xs-8 col-sm-6 col-md-6" >
                    <table class="table">
                        {{--{!! Form::open(array('url' => 'call/manage/save', 'method' => 'post')) !!}--}}
                        <thead>
                        <tr><td colspan="4"><h5><b>人員需求/報到列表 (單位: 人)</b></h5></td>
                            <td class="text-right" colspan="2">
                                <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#createVolunteerNeedBlock"> 新增新的志工需求單</button>
                                <!-- Modal -->
                                <div class="modal fade" id="createVolunteerNeedBlock" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            {{--{!! Form::open(array('url' => 'call/manage/createMission', 'method' => 'post','class' => 'form-horizontal','onSubmit' => 'return checkForm();')) !!}--}}
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                <h4 class="modal-title" id="myModalLabel"><b>創建新人員需求列表</b></h4>
                                            </div>
                                            <div class="modal-body">
                                                <dl class="dl-horizontal">
                                                    <dt>需求人數</dt>
                                                    <dd>{!! Form::number('require_number','',['class' => 'form-control text-right', 'required','min'=>'0']) !!}</dd> <br>

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
                            </td>
                        </tr>

                        <tr>
                            <th width="10%">建表日期</th>
                            <th width="10%">時間</th>
                            {{--<th>編號</th>--}}
                            <th width="15%">人員種類</th>
                            <th width="25%">技能</th>
                            <th width="27%">需求人數 {!! Form::submit('修改數量', ['class' => 'btn btn-default btn-sm ']) !!}</th>
                            <th width="18%">尚需人數</th>
                            {{--<th>需求人員資格</th>--}}


                            {{--<th>詳細</th></tr>--}}
                        </thead>
                        <tbody>
                        @if(isset($center_support_people))
                            @foreach($center_support_people as $center_support_person)


                                <tr class="active header">
                                    <td>{{ (new Carbon\Carbon($center_support_person->created_at))->formatLocalized('%Y/%m/%d') }}</td>
                                    <td>{{ (new Carbon\Carbon($center_support_person->created_at))->formatLocalized('%H:%M:%S') }}</td>
                                    <td>醫療組<span class="sign"></span></td>
                                    <td>具有醫師執照</td>
                                    {{--<td>{!!$center_support_person->center_support_person_id	!!}</td>--}}
                                    <td>
                                        {!! Form::number('center_support_person_num', $center_support_person->center_support_person_num, ['min'=>'0','class' => 'form-control text-right']) !!}

                                        {{--{!!$center_support_person->center_support_person_num	!!} --}}
                                    </td>
                                    <td class="text-right">{!!$center_support_person->called_person_num	!!} </td>
                                    {{--<td>{!!$center_support_person->center_support_person_requirement!!}</td>--}}

                                    {{--<td >{{ (new Carbon\Carbon($center_support_person->created_at))->formatLocalized('%Y/%m/%d') }}</td>--}}
                                    {{--<td >{{ (new Carbon\Carbon($center_support_person->created_at))->formatLocalized('%H:%M:%S') }}</td>--}}
                                    {{--<td width="100px">2015-07-22 07:49:50</td>--}}
                                    {{--<td>--}}
                                        {{--<button class="btn btn-link btn-sm" data-toggle="modal" data-target="#update{!!$center_support_person->center_support_person_id!!}">修改</button>--}}
                                    {{--<!-- Modal -->--}}
                                    {{--<div class="modal fade" id="update{!!$center_support_person->center_support_person_id!!}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">--}}
                                        {{--<div class="modal-dialog">--}}
                                            {{--<div class="modal-content">--}}
                                                {{--{!! Form::open(array('url' => 'call/manage/createMission', 'method' => 'post','class' => 'form-horizontal','onSubmit' => 'return checkForm();')) !!}--}}
                                                {{--<div class="modal-header">--}}
                                                    {{--<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>--}}
                                                    {{--<h4 class="modal-title" id="myModalLabel"><b>修改人員需求列表</b></h4>--}}
                                                {{--</div>--}}
                                                {{--<div class="modal-body">--}}
                                                    {{--<dl class="dl-horizontal">--}}
                                                        {{--<dt>人員需求列表編號</dt>--}}
                                                        {{--<dd>{!!$center_support_person->center_support_person_id!!}</dd><br>--}}
                                                        {{--<dt>需求人數</dt>--}}
                                                        {{--<dd>{!! Form::number('center_support_person_num', $center_support_person->center_support_person_num, [ 'class' => 'form-control', 'required','min'=>'0']) !!}</dd><br>--}}
                                                        {{--<dt>需求人員資格</dt>--}}
                                                        {{--<dd>{!! Form::textarea('center_support_person_requirement',$center_support_person->center_support_person_requirement,['class' => 'form-control','style'=>'resize: vertical', 'required']) !!}</dd><br>--}}
                                                       {{--</dl>--}}
                                                {{--</div>--}}
                                                {{--<div class="modal-footer">--}}
                                                    {{--<button type="button" class="btn btn-default btn-sm" data-dismiss="modal">取消</button>--}}
                                                    {{--{!! Form::submit('修改', ['class' => 'btn btn-default btn-sm btn-primary']) !!}--}}
                                                {{--</div>--}}
                                            {{--</div><!-- /.modal-content -->--}}
                                            {{--{!! Form::close() !!}--}}
                                        {{--</div><!-- /.modal-dialog -->--}}
                                    {{--</div><!-- /.modal -->--}}
                                    {{--</td>--}}
                                </tr>
                                <tr>
                                    <th colspan="2"></th>
                                    <th>姓名</th><th>電話</th>
                                    {{--<th width="10%">Email</th>--}}
                                    <th>現居地</th>
                                    <th>
                                        報到
                                    </th>

                                </tr>
                                <tr>
                                    <td  colspan="2"></td>
                                    <td>蔣清濋</td>
                                    <td>0900100160</td>
                                    <td>台中市 北屯區</td>
                                    <td class="text-right">{!! Form::submit('報到', ['class' => 'btn btn-default btn-sm ']) !!}</td>
                                    {{--<td></td>--}}
                                </tr>
                                <tr>
                                    <td  colspan="2"></td>
                                    <td>魏伊更</td>
                                    <td>0900200260</td>
                                    <td>台北市 萬華區</td>
                                    <td class="text-right">{!! Form::submit('報到', ['class' => 'btn btn-default btn-sm ']) !!}</td>
                                    {{--<td></td>--}}
                                </tr>
                                <tr>
                                    <td  colspan="2"></td>
                                    <td>余世瞭</td>
                                    <td>0900300360</td>
                                    <td>苗栗縣 公館鄉</td>
                                    <td class="text-right">{!! Form::submit('報到', ['class' => 'btn btn-default btn-sm ']) !!}</td>
                                    {{--<td></td>--}}
                                </tr>

                            @endforeach
                        @endif

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

                <div class="col-xs-8 col-sm-6 col-md-6" >
                    <table class="table  table-striped">
                        {{--{!! Form::open(array('url' => 'call/manage/save', 'method' => 'post')) !!}--}}
                        <thead>
                        <tr><td colspan="7"><h5><b>志工人員資料</b></h5></td></tr>

                        <tr>
                            <th>種類</th>
                            <th>姓名</th>
                            <th>電話</th>
                            {{--<th>Email</th>--}}
                            {{--<th>所在地</th>--}}
                            <th>技能</th>
                            <th>
                                {!! Form::submit('將志工分配至現有任務', ['class' => 'btn btn-default btn-sm']) !!}
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(isset($emtFreeUsers))
                            @foreach($emtFreeUsers as $emtFreeUser)

                                <tr><td>醫療組</td>
                                    <td>{!!$emtFreeUser->name!!}</td>
                                    <td>{!!$emtFreeUser->phone!!}</td>
                                    {{--<td>{!!$emtFreeUser->email!!}</td>--}}
                                    {{--<td>{!!$emtFreeUser->country_or_city_input ." ". $emtFreeUser->township_or_district_input!!}</td>--}}
                                    <td>{!!$emtFreeUser->skill!!}</td>
                                    <td>{!! Form::select('mission_name', $mission_names, '-') !!}</td></tr>

                            @endforeach
                        @endif

                        @if(isset($relieverFreeUsers))
                            @foreach($relieverFreeUsers as $relieverFreeUser)
                                @if(isset($mission_support_people))
                                    <tr><td>脫困組</td>
                                        <td>{!!$relieverFreeUser->name	!!}</td>
                                        <td>{!!$relieverFreeUser->phone!!}</td>
{{--                                        <td>{!!$relieverFreeUser->email!!}</td>--}}
{{--                                        <td>{!!$relieverFreeUser->country_or_city_input ." ". $relieverFreeUser->township_or_district_input!!}</td>--}}
                                        <td>{!!$relieverFreeUser->skill!!}</td>
                                        <td>{!! Form::select('mission_name', $mission_names, '-') !!}</td></tr>
                                @endif
                            @endforeach
                        @endif




                        </tbody>
                        {{--{!! Form::close() !!}--}}
                    </table>
                </div>
                <div class="col-xs-8 col-sm-6 col-md-6" >
                    {{--<table class="table  table-striped">--}}
                        {{--<thead>--}}
                        {{--<tr><td colspan="7"><h5><b>人員需求列表(中央決定派遣給任務)</b></h5></td></tr>--}}
                        {{--<tr><th>任務名稱</th><th>需求醫療組人數</th><th>需求脫困組人數</th><th>發布日期</th><th>發布時間</th></tr>--}}
                        {{--</thead>--}}
                        {{--<tbody>--}}
                        {{--@if(isset($mission_support_people))--}}
                            {{--@foreach($mission_support_people as $mission_support_person)--}}

                                {{--<tr><td>{!!$mission_support_person->mission_name!!}</td>--}}
                                    {{--<td>{!!$mission_support_person->local_emt_num!!} 人</td>--}}
                                    {{--<td>{!!$mission_support_person->local_reliever_num!!} 人</td>--}}
                                    {{--<td >{{ (new Carbon\Carbon($mission_support_person->created_at))->formatLocalized('%Y/%m/%d') }}</td>--}}
                                    {{--<td >{{ (new Carbon\Carbon($mission_support_person->created_at))->formatLocalized('%H:%M:%S') }}</td></tr>--}}


                            {{--@endforeach--}}
                        {{--@endif--}}


                        {{--</tbody>--}}
                    {{--</table>--}}
                    {{--<pre>綠色:完成任務，返回中&nbsp;&nbsp;&nbsp;&nbsp;橘色:任務執行中&nbsp;&nbsp;&nbsp;&nbsp; 紅色:任務執行中且要求增援</pre>--}}
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
                        {{--<tr>--}}
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
                        {{--<tr>--}}
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

                        </tbody>
                    </table>

                </div>
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
        $('.header_no_next').click(function(){
            $(this).toggleClass('expand').nextUntil('tr.header_no_next').slideToggle(100);
        });
        $('.header_no_next').trigger('click'); //trigger :觸發指定事件

    </script>

@endsection