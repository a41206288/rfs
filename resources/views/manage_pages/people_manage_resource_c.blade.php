@extends('manage_master')
@section('title')
    人員管理(中心)
@endsection
@section('link')
    {{--<li>{!! Html::link('resource/manage/product/center', '物資管理') !!}</li>--}}
    <li class="active">{!! Html::link('resource/manage/people/center', '人員管理') !!}</li>
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
    <div class="col-xs-16 col-sm-12 col-md-12" >

        <div class="col-xs-8 col-sm-6 col-md-6" >
            <!-- Tab panes -->
            <ul class="nav nav-tabs" role="tablist">
                <li class="active"><a href="#application_lists" role="tab" data-toggle="tab" class="btn btn-sm btn-default navbar-sm-btn"><b>向民眾招募人員需求表</b></a></li>
                <li><a href="#application_person" role="tab" data-toggle="tab" class="btn btn-sm btn-default navbar-sm-btn">應徵志工人員資料表</a></li>

            </ul>
            <div class="tab-content">
                <div class="tab-pane" id="application_person">
                    <div class="panel panel-default" >
                        <nav class="navbar-sm navbar-sm-default" role="navigation" style="min-height: 20px;">
                            <div class="navbar-sm-header">{{--標題--}}
                                <a class="navbar-sm-brand" href="#">應徵志工人員資料</a>
                            </div>

                            <div class="collapse navbar-sm-collapse" >{{--上面按鈕欄--}}
                                <ul class="nav navbar-sm-nav t">{{--上面按鈕欄內容 靠右對齊--}}
                                    {!! Form::select('name', array('全部' => '全部種類', '醫療' => '醫療', '脫困' => '脫困'), '全部', ['class' => 'navbar-sm-btn btn-sm']) !!}
                                </ul>

                                <ul class="nav navbar-sm-nav navbar-sm-right">{{--上面按鈕欄內容 靠右對齊--}}
                                    {!! Form::submit('錄取志工', ['class' => 'btn btn-default btn-sm navbar-sm-btn']) !!}
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
                                    <th>人員種類</th>
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
                                <tbody>
                                @if(isset($center_support_person_details))
                                    @foreach($center_support_person_details as $center_support_person_detail)
                                        <tr>

                                            <td>{!! Form::checkbox('name', 'value')!!}</td>
                                            <td>醫療組</td>
                                            <td>{!!$center_support_person_detail->center_support_person_detail_name	!!}</td>
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
                        {{--表格尾端--}}
                    </div>
                </div>
                <div class="tab-pane active" id="application_lists">
                    <div class="panel panel-default" >
                        <nav class="navbar-sm navbar-sm-default" role="navigation" style="min-height: 20px;">
                            <div class="navbar-sm-header">{{--標題--}}
                                <a class="navbar-sm-brand" href="#">向民眾招募人員需求表(單位: 人)</a>
                            </div>

                            <div class="collapse navbar-sm-collapse" >{{--上面按鈕欄--}}
                                <ul class="nav navbar-sm-nav navbar-sm-right">{{--上面按鈕欄內容 靠右對齊--}}
                                    {!! Form::submit('修改需求人數', ['class' => 'btn btn-default btn-sm navbar-sm-btn']) !!}
                                    <button class="btn btn-default navbar-sm-btn btn-sm" data-toggle="modal" data-target="#createVolunteerNeedBlock"> 新增新的志工需求單</button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="createVolunteerNeedBlock" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                {!! Form::open(array('url' => 'call/manage/createMission', 'method' => 'post','class' => 'form-horizontal','onSubmit' => 'return checkForm();')) !!}
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                    <h4 class="modal-title" id="myModalLabel"><b>志工需求單</b></h4>
                                                </div>
                                                <div class="modal-body">


                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">取消</button>
                                                    {!! Form::submit('招募志工', ['class' => 'btn btn-default btn-sm btn-primary']) !!}
                                                </div>
                                                {!! Form::close() !!}
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->
                                    {{--<a href="#application_person" role="tab" data-toggle="tab" class="btn btn-sm btn-default navbar-sm-btn">應徵志工人員資料表</a>--}}
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
                                    <th width="15%">人員種類</th>
                                    <th width="25%">技能</th>
                                    <th width="27%">需求人數</th>
                                    <th width="18%">尚需人數</th>
                                <tr>
                                </thead>
                                <tbody>
                                @if(isset($center_support_people))
                                    @foreach($center_support_people as $center_support_person)
                                        <tr>
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
                                        </tr>
                                    @endforeach
                                @endif

                                </tbody>
                                {{--{!! Form::close() !!}--}}
                            </table>
                        </div>
                        {{--表格尾端--}}
                    </div>

                </div>
            </div>

            <div class="panel panel-default" >
                <nav class="navbar-sm navbar-sm-default" role="navigation" style="min-height: 20px;">
                    <div class="navbar-sm-header">{{--標題--}}
                        <a class="navbar-sm-brand" href="#">中央志工人員資料列表</a>
                    </div>
                    {{--<br>--}}
                    <div class="collapse navbar-sm-collapse" >{{--上面按鈕欄--}}
                        <ul class="nav navbar-sm-nav">{{--上面按鈕欄內容 靠右對齊--}}
                            <!-- select -->
                            {!! Form::select('name', array( '已報到' => '已報到', '未報到' => '未報到'), '全部', ['class' => 'navbar-sm-btn btn-sm']) !!}
                            {!! Form::select('name', array('全部' => '全部種類', '醫療' => '醫療', '脫困' => '脫困'), '全部', ['class' => 'navbar-sm-btn btn-sm']) !!}
                            {{--{!! Form::text('name','',['placeholder'=>'名字或電話','style'=>'width:130px;border: 1px solid #cccccc; border-radius: 4px;height: 30px;']) !!}--}}
                            {{--<button type="submit" class="btn btn-default navbar-sm-btn btn-sm">--}}
                                {{--<span class="glyphicon glyphicon-search"></span>--}}
                            {{--</button>--}}


                        </ul>
                        <ul class="nav navbar-sm-nav navbar-sm-right">
                            {{--{!! Form::submit('將志工分配至現有任務', ['class' => 'btn btn-default btn-sm navbar-sm-btn']) !!}--}}
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown">
                                    將志工分配至現有任務 <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#">四維</a></li>
                                    <li><a href="#">五福</a></li>
                                </ul>
                            </div>
                            {!! Form::submit('報到', ['class' => 'btn btn-default btn-sm navbar-sm-btn']) !!}
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

                            <th>種類</th>
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
                        <tbody>
                        @if(isset($emtFreeUsers))
                            @foreach($emtFreeUsers as $emtFreeUser)
                                <tr>
                                    <td>{!! Form::checkbox('name', 'value')!!}</td>
                                    {{--<td></td>--}}
                                    <td>醫療組</td>
                                    {{--<td>未報到</td>--}}
                                    <td>{!!$emtFreeUser->name!!}</td>
                                    <td>{!!$emtFreeUser->phone!!}</td>
                                    {{--<td>{!!$emtFreeUser->email!!}</td>--}}
                                    {{--<td>{!!$emtFreeUser->country_or_city_input ." ". $emtFreeUser->township_or_district_input!!}</td>--}}
                                    {{--<td>{!!$emtFreeUser->skill!!}</td>--}}
                                    {{-- <td>{!! Form::select('mission_name', $mission_names, '-') !!}</td>--}}
                                </tr>

                            @endforeach
                        @endif

                        @if(isset($relieverFreeUsers))
                            @foreach($relieverFreeUsers as $relieverFreeUser)
                                @if(isset($mission_support_people))
                                    <tr>
                                        <td>{!! Form::checkbox('name', 'value')!!}</td>
                                        {{--<td></td>--}}
                                        <td>脫困組</td>
                                        {{--<td>已報到</td>--}}
                                        <td>{!!$relieverFreeUser->name	!!}</td>
                                        <td>{!!$relieverFreeUser->phone!!}</td>
                                        {{--<td>{!!$relieverFreeUser->email!!}</td>--}}
                                        {{--<td>{!!$relieverFreeUser->country_or_city_input ." ". $relieverFreeUser->township_or_district_input!!}</td>--}}
                                        {{-- <td>{!!$relieverFreeUser->skill!!}</td>--}}
                                        {{-- <td>{!! Form::select('mission_name', $mission_names, '-') !!}</td>--}}
                                    </tr>
                                @endif
                            @endforeach
                        @endif




                        </tbody>
                        {{--{!! Form::close() !!}--}}
                    </table>
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
                {{--表格尾端--}}

            </div>
            <div class="panel panel-default" >
                <nav class="navbar-sm navbar-sm-default" role="navigation" style="min-height: 20px;">
                    <div class="navbar-sm-header">{{--標題--}}
                        <a class="navbar-sm-brand" href="#">各地方人員閒置列表  (單位: 人)</a>
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

@endsection