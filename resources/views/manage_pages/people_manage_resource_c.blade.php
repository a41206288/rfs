@extends('manage_master')
@section('title')
    人員管理(中心)
@endsection
@section('link')
    {{--<li>{!! Html::link('resource/manage/product/center', '物資管理') !!}</li>--}}
    <li class="active">{!! Html::link('resource/center/manage/people', '人員管理') !!}</li>
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
    .divA a:link {
    text-decoration: underline;
    }
@endsection
@section('content')
    {{--1.新增人員需求 (人數、人員背景)--}}
    {{--2.查看應徵志工人員資料 (決定身分)--}}
    {{--3.分配人員至各地方單位--}}
    <!-- Nav tabs -->
    <div class="col-xs-16 col-sm-12 col-md-12" >

        <div class="col-xs-8 col-sm-6 col-md-6" >
            <!-- Tab panes -->
            <ul class="nav nav-tabs" role="tablist">
                <li class="active"><a href="#application_lists" role="tab" data-toggle="tab" class="btn btn-sm btn-default navbar-sm-btn"><b>向民眾招募志工列表</b></a></li>
                <li><a href="#application_person" role="tab" data-toggle="tab" class="btn btn-sm btn-default navbar-sm-btn">已應徵志工名單</a></li>
                <li><a href="#new_person" role="tab" data-toggle="tab" class="btn btn-sm btn-default navbar-sm-btn">新增職位</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane" id="application_person">
                    <div class="panel panel-default" >
                        {!! Form::open(array('url' => 'resource/manage/people/center/updatePeople','onsubmit' => 'return checkForm("center_support_person");'))!!}
                        <nav class="navbar-sm navbar-sm-default" role="navigation" style="min-height: 20px;">
                            <div class="navbar-sm-header">{{--標題--}}
                                <a class="navbar-sm-brand" href="#">已應徵志工名單</a>
                            </div>

                            <div class="collapse navbar-sm-collapse" >{{--上面按鈕欄--}}
                                <ul class="nav navbar-sm-nav ">{{--上面按鈕欄內容 靠右對齊--}}
                                    {!! Form::select('center_support_person_detail_role', $center_support_person_detail_roles, '', ['class' => 'navbar-sm-btn btn-sm', 'id' => 'center_support_person_detail_role']) !!}
                                </ul>

                                <ul class="nav navbar-sm-nav navbar-sm-right">{{--上面按鈕欄內容 靠右對齊--}}
                                    {!! Form::submit('錄取志工', ['class' => 'btn btn-default btn-sm navbar-sm-btn','id' => 'submit_center_support_person']) !!}
                                    {{--<a href="#application_lists" role="tab" data-toggle="tab" class="btn btn-sm btn-default navbar-sm-btn"><b>向民眾招募人員需求表</b></a>--}}
                                </ul>
                            </div>
                        </nav>
                        <div style="height: 200px;overflow-y: scroll;">{{--固定高度表格--}}
                            <table class="table table-striped">
                                {{--{!! Form::open(array('url' => 'call/manage/save', 'method' => 'post')) !!}--}}
                                <thead>
                                <tr>
                                    <th></th>
                                    <th>職位</th>
                                    <th>姓名</th>
                                    <th>電話</th>
                                    {{--<th width="10%">Email</th>--}}
                                    <th>現居地</th>

                                    {{--<th>技能</th>--}}
                                    {{--<th width="10%">欲應徵職位</th>--}}
                                    {{--<th width="20%">--}}
                                    {{--{!! Form::submit('錄取志工', ['class' => 'btn btn-default btn-sm']) !!}--}}
                                    {{--</th>--}}
                                </tr>
                                </thead>
                                <tbody id="center_support_person_table">

                                {{--應徵志工人員資料--}}
                                @if(isset($center_support_person_details))
                                    @foreach($center_support_person_details as $center_support_person_detail)
                                        <tr>

                                            <td>{!! Form::checkbox('center_support_person_detail_ids[]', $center_support_person_detail->center_support_person_detail_id)!!}</td>
                                            <td>{!!$center_support_person_detail->description!!}</td>
                                            <td>{!!$center_support_person_detail->center_support_person_detail_name!!}</td>
                                            <td>{!!$center_support_person_detail->phone!!}</td>
                                            {{--<td>{!!$center_support_person_detail->email!!}</td>--}}
                                            <td>{!!$center_support_person_detail->country_or_city_input ." ". $center_support_person_detail->township_or_district_input !!}</td>

                                            {{--<td>{!!$center_support_person_detail->skill!!}</td>--}}
                                            {{--<td>{!!$center_support_person_detail->center_support_person_requirement!!}</td>--}}

                                            {{--<td>{!! Form::select('yesOrNo', $roles,'請選擇') !!}</td>--}}
                                            {{--<td>--}}
                                            {{--{!! Form::select('yesOrNo', array('錄取' => '錄取', '不錄取' => '不錄取','請選擇' => '請選擇'), '請選擇', ['class' => 'form-control']) !!}--}}
                                            {{--</td>--}}

                                        </tr>
                                    @endforeach
                                @endif

                                </tbody>
                                {{--{!! Form::close() !!}--}}
                            </table>
                        </div>
                        {!! Form::close() !!}
                        {{--表格尾端--}}
                    </div>
                </div>
                <div class="tab-pane active" id="application_lists">
                    <div class="panel panel-default" >

                        <nav class="navbar-sm navbar-sm-default" role="navigation" style="min-height: 20px;">
                            <div class="navbar-sm-header">{{--標題--}}
                                <a class="navbar-sm-brand" href="#">向民眾招募志工列表(單位: 人)</a>
                            </div>

                            <div class="collapse navbar-sm-collapse" >{{--上面按鈕欄--}}
                                {{--<ul class="nav navbar-sm-nav">--}}{{--上面按鈕欄內容 靠左對齊--}}
                                    {{--<button class="btn btn-default navbar-sm-btn btn-sm" data-toggle="modal" data-target="#createVolunteerNeedBlock"> 新增新的志工需求單</button>--}}
                                    {{--<!-- Modal -->--}}
                                    {{--<div class="modal fade" id="createVolunteerNeedBlock" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">--}}

                                    {{--<div class="modal-dialog">--}}
                                        {{--<div class="modal-content">--}}
                                            {{--{!! Form::open(array('url' => 'resource/manage/people/center/createPeopleSupport', 'method' => 'post')) !!}--}}
                                            {{--<div class="modal-header">--}}
                                                {{--<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>--}}
                                                {{--<h4 class="modal-title" id="myModalLabel"><b>志工需求單</b></h4>--}}
                                                {{--</div>--}}
                                                {{--<div class="modal-body">--}}
                                                    {{--{!! Form::select('mission_support_people_id',$role_of_work, '', ['class' => 'form-control']) !!}--}}

                                                {{--</div>--}}
                                                {{--<div class="modal-footer">--}}
                                                {{--<button type="button" class="btn btn-default btn-sm" data-dismiss="modal">取消</button>--}}
                                                {{--{!! Form::submit('招募志工', ['class' => 'btn btn-default btn-sm btn-primary']) !!}--}}
                                                {{--</div>--}}
                                                {{--{!! Form::close() !!}--}}
                                            {{--</div><!-- /.modal-content -->--}}
                                        {{--</div><!-- /.modal-dialog -->--}}
                                    {{--</div><!-- /.modal -->--}}
                                {{--</ul>--}}
                                <ul class="nav navbar-sm-nav navbar-sm-right">{{--上面按鈕欄內容 靠右對齊--}}

                                    {!! Form::open(array('url' => 'resource/manage/people/center/editPeopleSupport'))!!}
                                    {!! Form::submit('修改需求人數', ['class' => 'btn btn-default btn-sm navbar-sm-btn']) !!}


                                </ul>
                            </div>
                        </nav>
                        <div style="height: 200px;overflow-y: scroll;">{{--固定高度表格--}}
                            <table class="table table-striped">
                                {{--{!! Form::open(array('url' => 'call/manage/save', 'method' => 'post')) !!}--}}
                                <thead>
                                <tr>
                                    <th width="10%">建表日期</th>
                                    <th width="10%">時間</th>
                                    {{--<th>編號</th>--}}
                                    <th width="15%">職位</th>
                                    {{--<th width="25%">技能</th>--}}
                                    <th width="27%">需求人數</th>
                                    <th width="18%">尚需人數</th>
                                <tr>
                                </thead>
                                <tbody>

                                {{--向民眾招募人員需求表--}}
                                @if(isset($center_support_people))
                                    @foreach($center_support_people as $center_support_person)
                                        <tr>
                                            <td>{{ (new Carbon\Carbon($center_support_person->created_at))->formatLocalized('%Y/%m/%d') }}</td>
                                            <td>{{ (new Carbon\Carbon($center_support_person->created_at))->formatLocalized('%H:%M') }}</td>
                                            <td>
                                                {{--{!!$center_support_person->description  !!}--}}
                                                <a id="{!!$center_support_person->slug!!}" name="change_skill" href="#" class="" data-toggle="popover" data-placement="bottom" data-trigger="hover" data-container="body"
                                                   {{--title="所需技能 "--}}
                                                   {{--data-content="讀取該職業技能<br />"--}}
                                                   data-html="true" role="button"> {!!$center_support_person->description  !!}
                                                </a>


                                            </td>
                                            <td>
                                                {!! Form::number($center_support_person->center_support_person_id, $center_support_person->center_support_person_num, ['min'=>'0','class' => 'form-control text-right']) !!}
                                            </td>
                                            @if(isset($center_support_person_details_array[$center_support_person->center_support_person_id]))
                                                <td class="text-right">{!! $center_support_person->center_support_person_num - count($center_support_person_details_array[$center_support_person->center_support_person_id])!!} </td>
                                            @else
                                                <td class="text-right">{!! $center_support_person->center_support_person_num !!} </td>
                                            @endif
                                        </tr>
                                    @endforeach
                                @endif

                                </tbody>
                                {{--{!! Form::close() !!}--}}
                            </table>
                        </div>
                        {!! Form::close() !!}
                        @if(isset($center_support_people))
                            @foreach($center_support_people as $center_support_person)
                                <!-- Modal -->
                                <div class="modal fade" id="change_{!!$center_support_person->slug!!}_Modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            {!! Form::open(array('url' => 'resource/manage/people/center/editSkill', 'method' => 'post', 'onSubmit' => 'checkForm();')) !!}
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                <h4 class="modal-title" id="myModalLabel">修改技能</h4>
                                            </div>
                                            <div class="modal-body">
                                                <table class="table table-striped">
                                                    <tr><td width="20%">組別</td><td>{!!$center_support_person->description  !!}</td></tr>
                                                    <tr><td>技能</td>
                                                        <td>
                                                            @foreach($skills as $skill)
                                                                @if(isset($center_support_people_skills_array[$center_support_person->center_support_person_id][$skill->skill_id]))
                                                                    <label>
                                                                        <input name="skills[]" type="checkbox" value="{!! $skill->skill_id !!}" checked> {!! $skill->skill_name !!}
                                                                    </label>
                                                                @else
                                                                    <label>
                                                                        <input name="skills[]" type="checkbox" value="{!! $skill->skill_id !!}" > {!! $skill->skill_name !!}
                                                                    </label>
                                                                @endif
                                                            @endforeach
                                                            {!! Form::hidden('center_support_people_id',$center_support_person->center_support_person_id) !!}
                                                        </td>
                                                    </tr>
                                                </table>

                                            </div>
                                            <div class="modal-footer">
                                                {{--<button type="button" class="btn btn-default" data-dismiss="modal">修改</button>--}}
                                                {{--<button type="button" class="btn btn-primary">修改</button>--}}
                                                {!! Form::submit('修改', ['class' => 'btn btn-default btn-sm navbar-sm-btn']) !!}
                                            </div>
                                            {!! Form::close() !!}
                                        </div><!-- /.modal-content -->
                                    </div><!-- /.modal-dialog -->
                                </div><!-- /.modal -->
                            @endforeach
                        @endif
                        {{--表格尾端--}}
                        <nav class="navbar-sm navbar-sm-default" role="navigation" style="min-height: 20px;">
                            <div class="collapse navbar-sm-collapse" >

                                <ul class="nav navbar-sm-nav navbar-sm-right">
                                    {!! Form::open(array('url' => 'resource/manage/people/center/createPeopleSupport', 'method' => 'post')) !!}
                                    {!! Form::select('mission_support_people_id',$role_of_work, '', ['class' => 'navbar-sm-btn btn-sm']) !!}
                                    {!! Form::number('mission_support_people_num', 0, ['min'=>'1','class' => 'text-right','style'=>'width:200px;border: 1px solid #cccccc; border-radius: 4px;height: 30px;']) !!}&nbsp;&nbsp;人&nbsp;&nbsp;
                                    {{--{!! Form::text('mission_support_people_reason','',['placeholder'=>'增援原因','style'=>'width:220px;border: 1px solid #cccccc; border-radius: 4px;height: 30px;']) !!}--}}
                                    {!! Form::submit('新增新的志工需求單', ['class' => 'btn btn-sm btn-default navbar-sm-btn']) !!}
                                    {!! Form::close() !!}
                                </ul>
                            </div>
                        </nav>
                    </div>

                </div>
                <div class="tab-pane" id="new_person">
                    <div class="panel panel-default" >
                        {!! Form::open(array('url' => 'resource/manage/people/center/updatePeople'))!!}
                        <nav class="navbar-sm navbar-sm-default" role="navigation" style="min-height: 20px;">
                            <div class="navbar-sm-header">{{--標題--}}
                                <a class="navbar-sm-brand" href="#">新增職位</a>
                            </div>

                        </nav>
                        <div style="height: 200px;overflow-y: scroll;">{{--固定高度表格--}}
                            <table class="table">

                                <tbody id="center_support_person_table">
                                <tr>
                                    <td width="25%"><b>職位名稱：</b></td>
                                    <td width="25%"><input type="text" class="form-control"></td>
                                    <td width="25%"></td><td width="25%"></td>
                                </tr>
                                <tr>
                                    <td>
                                        <label>
                                            <input name="skills[]" type="checkbox" value="" >外傷治療
                                        </label>
                                    </td>
                                    <td>
                                        <label>
                                            <input name="skills[]" type="checkbox" value="" >傷患照料
                                        </label>
                                    </td>
                                    <td>
                                        <label>
                                            <input name="skills[]" type="checkbox" value="" >水電管線維修
                                        </label>
                                    </td>
                                    <td>
                                        <label>
                                            <input name="skills[]" type="checkbox" value="" >交通指揮
                                        </label>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label>
                                            <input name="skills[]" type="checkbox" value="" >協助脫困
                                        </label>
                                    </td>
                                    <td>
                                        <label>
                                            <input name="skills[]" type="checkbox" value="" >滅火
                                        </label>
                                    </td>
                                    <td>
                                        <label>
                                            {{--<input name="skills[]" type="checkbox" value="" disabled="true">--}}
                                            <input name="skills[]" type="text" class="form-control" placeholder="新增技能">

                                        </label>
                                    </td>
                                    <td>
                                        <button class="btn btn-default">新增</button>
                                    </td>
                                </tr>


                                </tbody>
                                {{--{!! Form::close() !!}--}}
                            </table>
                        </div>
                        <nav class="navbar-sm navbar-sm-default" role="navigation" style="min-height: 20px;">
                            <div class="collapse navbar-sm-collapse" >
                                <ul class="nav navbar-sm-nav navbar-sm-right">
                                    {!! Form::submit('新增職位', ['class' => 'btn btn-sm btn-default navbar-sm-btn']) !!}
                                </ul>
                            </div>
                        </nav>
                        {!! Form::close() !!}
                        {{--表格尾端--}}
                    </div>
                </div>
            </div>

            <div class="panel panel-default" >
                <nav class="navbar-sm navbar-sm-default" role="navigation" style="min-height: 20px;">
                    <div class="navbar-sm-header">{{--標題--}}
                        <a class="navbar-sm-brand" href="#">中央閒置志工資料列表</a>
                    </div>
                    {{--<br>--}}
                    <div class="collapse navbar-sm-collapse" >{{--上面按鈕欄--}}
                        <ul class="nav navbar-sm-nav">{{--上面按鈕欄內容 靠右對齊--}}
                            <!-- select -->
                            {!! Form::select('arrived', array( '已報到' => '已報到', '未報到' => '未報到'), '全部', ['class' => 'navbar-sm-btn btn-sm', 'id' => 'arrived']) !!}
                            {!! Form::select('center_user_roles', $centerFreeUserRoles, '全部', ['class' => 'navbar-sm-btn btn-sm', 'id' => 'center_user_roles']) !!}
                            {{--{!! Form::text('name','',['placeholder'=>'名字或電話','style'=>'width:130px;border: 1px solid #cccccc; border-radius: 4px;height: 30px;']) !!}--}}
                            {{--<button type="submit" class="btn btn-default navbar-sm-btn btn-sm">--}}
                                {{--<span class="glyphicon glyphicon-search"></span>--}}
                            {{--</button>--}}


                        </ul>
                        {!! Form::open(array('url' => 'resource/manage/people/center/editPeople','onsubmit' => 'return checkForm("free_users");','id' => 'form_free_users'))!!}
                        <ul class="nav navbar-sm-nav navbar-sm-right">
                            {{--{!! Form::submit('將志工分配至現有任務', ['class' => 'btn btn-default btn-sm navbar-sm-btn']) !!}--}}
                            <div class="btn-group">
                                {{--<button type="button" class="btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown">--}}
                                    {{--將志工分配至現有任務 <span class="caret"></span>--}}
                                {{--</button>--}}
                                {{--<ul class="dropdown-menu" role="menu">--}}

                                    {{--@if(isset($mission_lists))--}}
                                        {{--@foreach($mission_lists as $mission_list)--}}
                                            {{--@if($mission_list->mission_name != '未分配任務')--}}
                                                {{--<li><a href="#">{!! $mission_list->mission_name !!}</a></li>--}}
                                            {{--@endif--}}
                                        {{--@endforeach--}}
                                    {{--@endif--}}
                                {{--</ul>--}}
                                {!! Form::select('mission_list_id', $mission_support_people_names, '', ['class' => 'navbar-sm-btn btn-sm','style'=>'width:170px;border: 1px solid #cccccc; border-radius: 4px;height: 30px;']) !!}
                            </div>
                            {!! Form::submit('報到', ['class' => 'btn btn-default btn-sm navbar-sm-btn', 'id' => 'submit_arrived', 'style' => 'display: none;']) !!}
                        </ul>
                    </div>
                </nav>
                <div style="height: 200px;overflow-y: scroll;">{{--固定高度表格--}}
                    <table class="table  table-striped">
                        {{--{!! Form::open(array('url' => 'call/manage/save', 'method' => 'post')) !!}--}}
                        <thead>
                        {{--<tr><td colspan="7"><h5><b>志工人員資料</b></h5></td></tr>--}}

                        <tr>
                            <th></th>

                            <th>職位</th>
                            {{--<th>狀態</th>--}}
                            <th>姓名</th>
                            <th>電話</th>
                            {{--<th>Email</th>--}}
                            {{--<th>所在地</th>--}}
                            {{--<th>技能</th>--}}
                            {{--<th>--}}
                                {{--{!! Form::submit('將志工分配至現有任務', ['class' => 'btn btn-default btn-sm']) !!}--}}
                            {{--</th>--}}
                            {{--<th>備註</th>--}}
                        </tr>
                        </thead>
                        <tbody id="free_users_table">
                        @if(isset($centerFreeUsers))
                            @foreach($centerFreeUsers as $centerFreeUser)
                                @if($centerFreeUser->arrived == 1)
                                    <tr>
                                        <td>{!! Form::checkbox('user_ids[]', $centerFreeUser->user_id)!!}</td>
                                        {{--<td></td>--}}
                                        <td>{!!$centerFreeUser->description!!}</td>
                                        <td>{!!$centerFreeUser->user_name!!}</td>
                                        <td>{!!$centerFreeUser->phone!!}</td>
                                    </tr>
                                @endif
                            @endforeach
                        @endif

                        {{--@if(isset($relieverFreeUsers))--}}
                            {{--@foreach($relieverFreeUsers as $relieverFreeUser)--}}
                                {{--@if(isset($mission_support_people))--}}
                                    {{--<tr>--}}
                                        {{--<td>{!! Form::checkbox('name', 'value')!!}</td>--}}
                                        {{--<td></td>--}}
                                        {{--<td>脫困組</td>--}}
                                        {{--<td>已報到</td>--}}
                                        {{--<td>{!!$relieverFreeUser->user_name!!}</td>--}}
                                        {{--<td>{!!$relieverFreeUser->phone!!}</td>--}}
                                        {{--<td>{!!$relieverFreeUser->email!!}</td>--}}
                                        {{--<td>{!!$relieverFreeUser->country_or_city_input ." ". $relieverFreeUser->township_or_district_input!!}</td>--}}
                                        {{-- <td>{!!$relieverFreeUser->skill!!}</td>--}}
                                        {{-- <td>{!! Form::select('mission_name', $mission_names, '-') !!}</td>--}}
                                    {{--</tr>--}}
                                {{--@endif--}}
                            {{--@endforeach--}}
                        {{--@endif--}}




                        </tbody>

                    </table>
                    {!! Form::close() !!}
                </div>
                {{--表格尾端--}}

            </div>
        </div>
        <div class="col-xs-8 col-sm-6 col-md-6" >
            <br><br>
            <div class="panel panel-default" >
                <nav class="navbar-sm navbar-sm-default" role="navigation" style="min-height: 20px;">
                    <div class="navbar-sm-header">{{--標題--}}
                        <a class="navbar-sm-brand" href="#">各地方人員增援需求列表  (單位: 人)</a>
                    </div>

                    <div class="collapse navbar-sm-collapse" >{{--上面按鈕欄--}}
                        <ul class="nav navbar-sm-nav">{{--上面按鈕欄內容 靠左對齊--}}
                        </ul>
                        <ul class="nav navbar-sm-nav navbar-sm-right">{{--上面按鈕欄內容 靠右對齊--}}
                            <a href="#" class="btn btn-default btn-sm navbar-sm-btn" data-toggle="popover" data-placement="top" data-trigger="hover" data-container="body"
                               title="功能說明"
                               data-content="將滑鼠移至增援人數上，可看到其他任務欲增援人員原因"
                               data-html="true" role="button">功能說明
                            </a>
                        </ul>
                    </div>
                </nav>
                <div style="height: 200px;overflow-y: scroll;">{{--固定高度表格--}}
                    <table width="100%" class="table table-bordered">
                        <thead>
                        {{--<tr><td colspan="8">各地方人員增援列表  (單位: 人)</td></tr>--}}
                        </thead>
                        <tbody>

                        <tr>
                            <td></td>
                            @if(isset($roles))
                                @foreach($roles as $role)
                                    @if($role->description != '系統管理者' && $role->description != '中央指揮官' && $role->description != '地方指揮官' && $role->description != '後勤部門')

                                        <td>{!! $role->description  !!}</td>

                                    @endif
                                @endforeach
                            @endif
                        </tr>
                        {{--<tr>--}}
                        @if(isset($mission_support_people_lists))
                            @foreach($mission_support_people_lists as $mission_support_people_list)

                                    {{--&& $mission_list->mission_list_id != $mission_list_id--}}
                                    <tr>
                                        <td width="124px">{!! $mission_support_people_list->mission_name !!}</td>
                                        @if(isset($roles))
                                            <div style="display: none">
                                                {!! $roles_count = count($roles)-4 !!}
                                            </div>
                                            {{--{!! dd($roles_count) !!}--}}
                                            {{--@for($i=1;$i<$roles_count;$i++)--}}
                                            {{--@if(!isset($mission_support_people_array[$mission_list->mission_list_id][$i]))--}}
                                            {{--<td colspan="6"></td>--}}
                                            {{--@endif--}}
                                            {{--@endfor--}}
                                            @foreach($roles as $role)
                                                @if($role->description != '系統管理者' && $role->description != '中央指揮官' && $role->description != '地方指揮官' && $role->description != '後勤部門')

                                                    @if (isset($mission_support_people_array) )
                                                        @if(isset($mission_support_people_array[$mission_support_people_list->mission_list_id]))
                                                            <div style="display: none">
                                                                {!! $mission_support_people_array_count = count($mission_support_people_array[$mission_support_people_list->mission_list_id])+1 !!}
                                                            </div>
                                                            {{--@for($i=1;$i<$roles_count;$i++)--}}
                                                            <td class="text-right divA">
                                                                @for($j=1;$j<$mission_support_people_array_count;$j++)
                                                                    @if(isset($mission_support_people_array[$mission_support_people_list->mission_list_id][$j]))
                                                                        @if($mission_support_people_array[$mission_support_people_list->mission_list_id][$j]['role'] == $role->description)

                                                                            <a href="#" class="" data-toggle="popover" data-placement="bottom" data-trigger="hover" data-container="body"
                                                                               title="增援原因"
                                                                               data-content=" {!! $mission_support_people_array[$mission_support_people_list->mission_list_id][$j]['mission_support_people_reason'] !!}"
                                                                               data-html="true" role="button"> {!! $mission_support_people_array[$mission_support_people_list->mission_list_id][$j]['mission_support_people_num'] !!}
                                                                            </a>
                                                                        @else

                                                                        @endif
                                                                        {{--@else--}}
                                                                    @endif
                                                                @endfor
                                                            </td>
                                                            {{--@endfor--}}
                                                        @else
                                                            <td></td>
                                                        @endif

                                                    @endif

                                                @endif
                                            @endforeach
                                        @endif
                                    </tr>

                            @endforeach
                        @endif

                        </tbody>
                    </table>
                </div>
                {{--表格尾端--}}

            </div>
            <div class="panel panel-default" >
                <nav class="navbar-sm navbar-sm-default" role="navigation" style="min-height: 20px;">
                    <div class="navbar-sm-header">{{--標題--}}
                        <a class="navbar-sm-brand" href="#">各地方閒置人員列表  (單位: 人)</a>
                    </div>

                    <div class="collapse navbar-sm-collapse" >{{--上面按鈕欄--}}
                        <ul class="nav navbar-sm-nav">{{--上面按鈕欄內容 靠左對齊--}}
                        </ul>
                        <ul class="nav navbar-sm-nav navbar-sm-right">{{--上面按鈕欄內容 靠右對齊--}}

                        </ul>
                    </div>
                </nav>
                <div style="height: 200px;overflow-y: scroll;">{{--固定高度表格--}}
                    <table width="100%" class="table table-bordered">
                        <thead>
                        {{--<tr><td colspan="8">各地方人員增援列表  (單位: 人)</td></tr>--}}
                        </thead>
                        <tbody>

                        <tr>
                            <td></td>
                            @if(isset($roles))
                                @foreach($roles as $role)
                                    @if($role->description != '系統管理者' && $role->description != '中央指揮官' && $role->description != '地方指揮官' && $role->description != '後勤部門')

                                        <td>{!! $role->description  !!}</td>

                                    @endif
                                @endforeach
                            @endif
                        </tr>
                        {{--<tr>--}}

                            @if (isset($mission_lists) )
                                @foreach ($mission_lists as $mission_list )
                                    @if ($mission_list->mission_name != "未分配任務")
                                        <tr>
                                            <td>{!! $mission_list->mission_name !!}</td>
                                            @if(isset($roles))
                                                @foreach($roles as $role)
                                                    @if($role->description != '系統管理者' && $role->description != '中央指揮官' && $role->description != '地方指揮官' && $role->description != '後勤部門')

                                                        @if (isset($missionUserArrays[$mission_list->mission_list_id][$role->slug]) )
                                                            <td class="text-right success" >{!! $missionUserArrays[$mission_list->mission_list_id][$role->slug] !!}</td>
                                                        @else
                                                            <td class="text-right "></td>
                                                        @endif

                                                    @endif
                                                @endforeach
                                            @endif
                                        </tr>
                                    @endif
                                @endforeach
                            @endif

                        {{--<tr>--}}
                        {{--<tr class="danger">--}}
                            {{--<td>五福路段</td>--}}
                            {{--<td class="text-right">3</td>--}}
                            {{--<td class="text-right">1</td>--}}
                            {{--<td class="text-right">1</td>--}}
                            {{--<td></td>--}}
                            {{--<td></td>--}}
                            {{--<td></td>--}}
                            {{--<td class="text-right">2</td>--}}
                        {{--</tr>--}}

                        </tbody>
                    </table>
                </div>
                {{--表格尾端--}}

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
    <script>
        $("a[name='change_skill']").click(function(){
//            alert($(this).attr('id'));
            var model_name = "#change_" + $(this).attr('id') + "_Modal"
            $(model_name).modal('show');
        });
        $('#free_users_table,#center_support_person_table').find('tr').click(function () {
            $(this).find("input[type='checkbox']").click();
        });
        $("#arrived, #center_user_roles").change(function () {
            if($('#arrived option:selected').text() == "已報到"){
                var send = 1;
                $("select[name='mission_list_id']").show();
                $('#submit_arrived').hide();
            }
            else{
                var send = 0;
                $("select[name='mission_list_id']").hide();
                $('#submit_arrived').show();
            }
            $.ajax({
                url: 'http://localhost:8000/resource/manage/people/center/updateTable',
                type: 'POST',
                headers: {
                    'X-CSRF-Token': "{{ Session::token() }}"
                },
                data: {
                    arrived: send,
                    roles: $('#center_user_roles option:selected').text()
                },
                success: function(response) {
                    updateTable(response,"free_users_table");
//                    alert(response);
                },
                error: function(xhr) {
                    alert('Ajax request 發生錯誤');
                }
            });
        });
        $('#center_support_person_detail_role').change(function(){
            $.ajax({
                url: 'http://localhost:8000/resource/manage/people/center/updateTable',
                type: 'POST',
                headers: {
                    'X-CSRF-Token': "{{ Session::token() }}"
                },
                data: {
                    roles: $('#center_support_person_detail_role option:selected').text()
                },
                success: function(response) {
                    updateTable(response,"center_support_person_table");
                },
                error: function(xhr) {
                    alert('Ajax request 發生錯誤');
                }
            });
        });
        function updateTable(newData,tableId){
            var obj = document.getElementById(tableId);
            while(obj.firstChild){
                obj.removeChild(obj.firstChild)
            }
            if(tableId == "center_support_person_table"){
                for(var i=0; i<newData.length; i++){
                    var tr = document.createElement('tr');
                    var td = document.createElement('td');
                    var input = document.createElement('input');
                    input.setAttribute("type", "checkbox");
                    input.setAttribute("name", "center_support_person_detail_ids[]");
                    input.setAttribute("value", newData[i]['center_support_person_detail_id']);
                    td.appendChild(input);
                    tr.appendChild(td);
                    var td = document.createElement('td');
                    td.innerHTML = newData[i]['description'];
                    tr.appendChild(td);
                    var td = document.createElement('td');
                    td.innerHTML = newData[i]['center_support_person_detail_name'];
                    tr.appendChild(td);
                    var td = document.createElement('td');
                    td.innerHTML = newData[i]['phone'];
                    tr.appendChild(td);
                    var td = document.createElement('td');
                    td.innerHTML = newData[i]['country_or_city_input'] + "" + newData[i]['township_or_district_input'];
                    tr.appendChild(td);
                    obj.appendChild(tr);
                }
            }
            if(tableId == "free_users_table"){
                for(var i=0; i<newData.length; i++){
                    var tr = document.createElement('tr');
                    var td = document.createElement('td');
                    var input = document.createElement('input');
                    input.setAttribute("type", "checkbox");
                    input.setAttribute("name", "user_ids[]");
                    input.setAttribute("value", newData[i]['user_id']);
                    td.appendChild(input);
                    tr.appendChild(td);
                    var td = document.createElement('td');
                    td.innerHTML = newData[i]['description'];
                    tr.appendChild(td);
                    var td = document.createElement('td');
                    td.innerHTML = newData[i]['user_name'];
                    tr.appendChild(td);
                    var td = document.createElement('td');
                    td.innerHTML = newData[i]['phone'];
                    tr.appendChild(td);
                    obj.appendChild(tr);
                }
            }
        }
    </script>
    <script>
        var checked_center_support_person = 0;
        var checked_center_free_user = 0;
        $('#submit_center_support_person').click(function(){
            checked_center_support_person = $("input[name='center_support_person_detail_ids[]']:checked").length;
        });
        $("select[name='mission_list_id']").change(function(){
            checked_center_free_user = $("input[name='user_ids[]']:checked").length;
            $('#form_free_users').submit();
        });
        $('#submit_arrived').click(function(){
            checked_center_free_user = $("input[name='user_ids[]']:checked").length;
        });

        function checkForm(form){
            if(form == "center_support_person"){
                if(checked_center_support_person > 0){
                    return true;
                }
                alert("請至少勾選1位人員");
                return false;
            }
            if(form == "free_users"){
                if(checked_center_free_user > 0){
                    return true;
                }
                alert("請至少勾選1位人員");
                return false;
            }
            return false;
        }
    </script>

@endsection