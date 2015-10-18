@extends('manage_master')
@section('title')
    任務管理
@endsection
@section('link')
    {{--<li>{!! Html::link('analysis/manage/local', '現場分析地點管理') !!}</li>--}}
    <li class="active">{!! Html::link('mission/manage/local', '任務管理' )!!}</li>
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

    <div class="col-xs-16 col-sm-12 col-md-12" >
        {{--<h4><b>任務管理</b></h4><div >--}}
        <div class="col-xs-9 col-sm-7 col-md-7" >

            <div class="panel panel-default" >
                <nav class="navbar-sm navbar-sm-default" role="navigation" style="min-height: 20px;">
                    <div class="navbar-sm-header">
                        <a class="navbar-sm-brand" href="#">通報列表</a>
                    </div>
                    <div class="collapse navbar-sm-collapse" id="bs-example-navbar-sm-collapse-1">
                        <ul class="nav navbar-sm-nav navbar-sm-right">
                            <button type="button" class="btn btn-sm btn-default navbar-sm-btn">通報完成</button>

                        </ul>
                    </div>
                </nav>
                <div style="height: 200px;overflow-y: scroll;">
                    <table class="table table-striped table-hover"  >
                        <thead>
                            <th width="6%"></th>
                            <th width="6%">編號</th>
                            <th width="25%">通報地址<br>
                            <th width="15%">通報內容</th>

                        </thead>
                        <tbody>
                        <tr><td> {!! Form::checkbox('name', 'value')!!}</td><td>151016051401</td><td></td><td></td></tr>
                        <tr><td> {!! Form::checkbox('name', 'value')!!}</td><td>151016051401</td><td></td><td></td></tr>
                        <tr><td> {!! Form::checkbox('name', 'value')!!}</td><td>151016051401</td><td></td><td></td></tr>
                        <tr><td> {!! Form::checkbox('name', 'value')!!}</td><td>151016051401</td><td></td><td></td></tr>
                        <tr><td> {!! Form::checkbox('name', 'value')!!}</td><td>151016051401</td><td></td><td></td></tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="panel panel-default" >
                <nav class="navbar-sm navbar-sm-default" role="navigation" style="min-height: 20px;">
                    <div class="navbar-sm-header">
                        <a class="navbar-sm-brand" href="#">救災人員列表</a>
                    </div>

                    <div class="collapse navbar-sm-collapse" >
                        <ul class="nav navbar-sm-nav">
                            <!-- Single button -->
                            {!! Form::select('name', array('全部' => '全部 (11人)', '醫療' => '醫療 (5人)', '脫困' => '脫困 (6人)'), '請選擇', ['class' => 'navbar-sm-btn btn-sm']) !!}
                        </ul>

                        <ul class="nav navbar-sm-nav navbar-sm-right">
                            <button type="button" class="btn btn-sm btn-default navbar-sm-btn">執行任務</button>
                            <button type="button" class="btn btn-sm btn-default navbar-sm-btn">閒置</button>
                            <button type="button" class="btn btn-sm btn-default navbar-sm-btn">負傷</button>
                            <!-- Single button -->
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown">
                                    支援其他任務 <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#">四維</a></li>
                                    <li><a href="#">五福</a></li>
                                </ul>
                            </div>
                            <a href="#" class="btn btn-default btn-sm" data-toggle="popover" data-placement="top" data-trigger="hover" data-container="body" title="人員顏色說明"
                               data-content="
                                                {{--綠色:完成任務，閒置<br />橘色:任務執行中<br />紅色:受傷<br />"--}}
                                                <p class=&quot;bg-success&quot;>綠色:完成任務，閒置</p>
                                                <p class=&quot;bg-warning&quot;>橘色:任務執行中</p>
                                                <p class=&quot;bg-danger&quot;>紅色:受傷</p>"
                                data-html="true" role="button">
                                人員顏色說明
                            </a>

                        </ul>
                    </div>
                </nav>
                <div style="height: 200px;overflow-y: scroll;">
                    <table class="table  table-hover table-bordered"  >
                        <thead>
                        <th width="10%"></th>
                        <th width="15%">種類</th>
                        <th width="15%">狀態</th>
                        <th width="15%">姓名<br>
                        <th width="15%">電話</th>
                        <th width="30%">備註</th>

                        </thead>
                        <tbody>
                        <tr class="success"><td> {!! Form::checkbox('name', 'value')!!}</td><td>醫療</td><td>閒置</td><td>遊鑫</td><td>0987654321</td><td><button class="btn btn-sm btn-default">報到</button></td></tr>
                        <tr class="success"><td> {!! Form::checkbox('name', 'value')!!}</td><td>醫療</td><td>閒置</td><td>遊鑫</td><td>0987654321</td><td></td></tr>
                        <tr class="danger"><td> {!! Form::checkbox('name', 'value')!!}</td><td>救火</td><td>受傷</td><td>遊鑫</td><td>0987654321</td><td></td></tr>
                        <tr class="success"><td> {!! Form::checkbox('name', 'value')!!}</td><td>救火</td><td>閒置</td><td>遊鑫</td><td>0987654321</td><td></td></tr>
                        <tr class="warning"><td> {!! Form::checkbox('name', 'value')!!}</td><td>脫困</td><td>任務執行</td><td>遊鑫</td><td>0987654321</td><td></tr>
                        <tr class="warning"><td> {!! Form::checkbox('name', 'value')!!}</td><td>脫困</td><td>任務執行</td><td>遊鑫</td><td>0987654321</td><td></tr>
                        <tr class="warning"><td> {!! Form::checkbox('name', 'value')!!}</td><td>脫困</td><td>任務執行</td><td>遊鑫</td><td>0987654321</td><td></tr>
                        </tbody>
                    </table>
                </div>
                {{--<div class="panel-footer">綠色:完成任務，閒置&nbsp;&nbsp;&nbsp;&nbsp;橘色:任務執行中&nbsp;&nbsp;&nbsp;&nbsp; 紅色:受傷</div>--}}
            </div>


        </div>
        <div class="col-xs-7 col-sm-5 col-md-5" >
            <div class="panel panel-default" >
                <nav class="navbar-sm navbar-sm-default" role="navigation" style="min-height: 20px;">
                    <div class="navbar-sm-header">
                        <a class="navbar-sm-brand" href="#">災民人數 (單位: 人)</a>
                    </div>

                    {{--<div class="collapse navbar-sm-collapse" >--}}
                        {{--<ul class="nav navbar-sm-nav navbar-sm-right">--}}
                            {{--{!! Form::select('name', array('未選' => '增援種類', '醫療' => '醫療', '脫困' => '脫困'), '請選擇', ['class' => 'navbar-sm-btn btn-sm']) !!}--}}
                            {{--{!! Form::number('name', 'default', ['min'=>'0','class' => 'text-right']) !!}--}}
                            {{--<button type="button" class="btn btn-sm btn-default navbar-sm-btn">請求增援</button>--}}
                            {{--<a href="#" class="btn btn-default btn-sm navbar-sm-btn" data-toggle="popover" data-placement="bottom" data-trigger="hover" data-container="body" title="顏色說明"--}}
                               {{--data-content="--}}
                                                {{--綠色:完成任務，閒置<br />橘色:任務執行中<br />紅色:受傷<br />"--}}
                                                {{--<p class=&quot;bg-success&quot;>綠色:完成任務，返回中</p>--}}
                                                {{--<p class=&quot;bg-warning&quot;>橘色:任務執行中</p>--}}
                                                {{--<p class=&quot;bg-danger&quot;>紅色:任務執行中且要求增援</p>"--}}
                               {{--data-html="true" role="button">--}}
                                {{--顏色說明--}}
                            {{--</a>--}}
                        {{--</ul>--}}
                    {{--</div>--}}
                </nav>
                {{--<div style="height: 160px;overflow-y: scroll;">--}}
                    <table class=" table table-bordered">
                        {{--<thead>--}}
                        {{--<tr><th colspan="15">災民人數 (單位: 人)</th></tr>--}}

                        {{--</thead>--}}
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

                        </tbody>
                    </table>
            </div>
            <div class="panel panel-default" >
                <nav class="navbar-sm navbar-sm-default" role="navigation" style="min-height: 20px;">
                    <div class="navbar-sm-header">
                        <a class="navbar-sm-brand" href="#">本任務欲增援人員列表  (單位: 人)</a>
                    </div>

                    <div class="collapse navbar-sm-collapse" >
                        <ul class="nav navbar-sm-nav navbar-sm-right">
                            {{--{!! Form::select('name', array('未選' => '增援種類', '醫療' => '醫療', '脫困' => '脫困'), '請選擇', ['class' => 'navbar-sm-btn btn-sm']) !!}--}}
                            {{--{!! Form::number('name', 'default', ['min'=>'0','class' => 'text-right']) !!}--}}
                            {{--<button type="button" class="btn btn-sm btn-default navbar-sm-btn">請求增援</button>--}}
                            <a href="#" class="btn btn-default btn-sm navbar-sm-btn" data-toggle="popover" data-placement="bottom" data-trigger="hover" data-container="body" title="顏色說明"
                               data-content="
                                                {{--綠色:完成任務，閒置<br />橘色:任務執行中<br />紅色:受傷<br />"--}}
                                                <p class=&quot;bg-success&quot;>綠色:招募人員 50 % 以上</p>
                                                <p class=&quot;bg-warning&quot;>橘色:招募人員 50 % 以下</p>
                                                <p class=&quot;bg-danger&quot;>紅色:尚未招募到人員</p>"
                               data-html="true" role="button">
                                顏色說明
                            </a>


                        </ul>
                    </div>
                </nav>
                <div style="height: 150px;overflow-y: scroll;">
                    <table class="table table-bordered">
                        <thead>
                        <tr><th width="15%">人員種類</th><th width="20%">欲增援人數</th><th width="20%">缺額</th><th colspan="3" width="45%">已招募人員報到</th></tr>
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
                </div>
                {{--<div class="panel-footer">綠色:招募人員 50 % 以上&nbsp;&nbsp;&nbsp;&nbsp;橘色:招募人員 50 % 以下&nbsp;&nbsp;&nbsp;&nbsp; 紅色:尚未招募到人員</div>--}}
                {{--<pre>綠色:招募人員 50 % 以上&nbsp;&nbsp;&nbsp;&nbsp;橘色:招募人員 50 % 以下&nbsp;&nbsp;&nbsp;&nbsp; 紅色:尚未招募到人員</pre>--}}
                <nav class="navbar-sm navbar-sm-default" role="navigation" style="min-height: 20px;">
                    <div class="collapse navbar-sm-collapse" >

                        <ul class="nav navbar-sm-nav navbar-sm-right euro-sign">
                            {!! Form::select('name', array('未選' => '增援種類', '醫療' => '醫療', '脫困' => '脫困'), '請選擇', ['class' => 'navbar-sm-btn btn-sm']) !!}
                            {!! Form::number('name', 0, ['min'=>'0','class' => 'text-right','style'=>'width:50px;border: 1px solid #cccccc; border-radius: 4px;height: 30px;']) !!}&nbsp;&nbsp;人&nbsp;&nbsp;
                            {!! Form::text('name','',['placeholder'=>'增援原因','style'=>'width:220px;border: 1px solid #cccccc; border-radius: 4px;height: 30px;']) !!}
                            <button type="button" class="btn btn-sm btn-default navbar-sm-btn">請求增援</button>


                        </ul>
                    </div>
                </nav>
            </div>
            <div class="panel panel-default" >
                <nav class="navbar-sm navbar-sm-default" role="navigation" style="min-height: 20px;">
                    <div class="navbar-sm-header">
                        <a class="navbar-sm-brand" href="#">其他任務欲增援人員列表  (單位: 人)</a>
                    </div>

                    <div class="collapse navbar-sm-collapse" >
                        <ul class="nav navbar-sm-nav navbar-sm-right">
                            {{--{!! Form::select('name', array('未選' => '增援種類', '醫療' => '醫療', '脫困' => '脫困'), '請選擇', ['class' => 'navbar-sm-btn btn-sm']) !!}--}}
                            {{--{!! Form::number('name', 'default', ['min'=>'0','class' => 'text-right']) !!}--}}
                            {{--<button type="button" class="btn btn-sm btn-default navbar-sm-btn">請求增援</button>--}}
                            <a href="#" class="btn btn-default btn-sm navbar-sm-btn" data-toggle="popover" data-placement="bottom" data-trigger="hover" data-container="body" title="顏色說明"
                               data-content="
                                                {{--綠色:完成任務，閒置<br />橘色:任務執行中<br />紅色:受傷<br />"--}}
                                                <p class=&quot;bg-success&quot;>綠色:完成任務，返回中</p>
                                                <p class=&quot;bg-warning&quot;>橘色:任務執行中</p>
                                                <p class=&quot;bg-danger&quot;>紅色:任務執行中且要求增援</p>"
                               data-html="true" role="button">
                                顏色說明
                            </a>
                        </ul>
                    </div>
                </nav>
                <div style="height: 160px;overflow-y: scroll;">
                    <table width="100%" class="table table-bordered">
                        {{--<thead>--}}
                        {{--<tr><td colspan="8">各地方人員增援列表  (單位: 人)</td></tr>--}}
                        {{--</thead>--}}
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
                </div>
                {{--<pre>綠色:完成任務，返回中&nbsp;&nbsp;&nbsp;&nbsp;橘色:任務執行中&nbsp;&nbsp;&nbsp;&nbsp; 紅色:任務執行中且要求增援</pre>--}}
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
