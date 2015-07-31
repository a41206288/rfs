@extends('manage_master')
@section('title')
    物資管理(地方)
@endsection
@section('link')
    <li>{!! Html::link('resource/manage/product/local', '物資管理') !!}</li>
    <li>{!! Html::link('resource/manage/people/local', '人員管理') !!}</li>
@endsection
@section('content')
    1.看到目前物資存量
    2.點收中央發放物資
    3.物資發放(借用器材)
    4.額外物資需求(增援)
    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist">
        <li><a href="#productStatus" role="tab" data-toggle="tab"><b>物資存量管理</b></a></li>
        <li><a href="#donate" role="tab" data-toggle="tab"><b>民眾捐贈單管理</b></a></li>
        <li class="active"><a href="#assign" role="tab" data-toggle="tab"><b>分配物資</b></a></li>

    </ul>
    <br><br>
    <!-- Tab panes -->
    <div class="tab-content">
        <div class="tab-pane " id="productStatus">
            {{--<div class="col-xs-16 col-sm-12 col-md-12" >--}}
            {{--1.看到目前物資存量<br>--}}
            {{--2.新增修改需求捐贈數量--}}
            {{--</div>--}}
            <div class="col-xs-16 col-sm-12 col-md-12" >
                <div class="col-xs-10 col-sm-7 col-md-7" >
                    <table class="table  table-striped">
                        {{--{!! Form::open(array('url' => 'call/manage/save', 'method' => 'post')) !!}--}}
                        <thead>
                        <tr><td colspan="7"><h5><b> 地方物資存量列表</b></h5></td></tr>
                        <tr><th width="10%">物資編號</th><th width="10%">名稱</th><th width="10%">目前存量</th><th width="10%">安全存量</th><th width="10%">單位</th></tr>
                        </thead>
                        <tbody>

                        <tr><td>1</td><td>泡麵</td><td class="text-right">123</td><td class="text-right">345</td><td>包</td></tr>

                        </tbody>
                        {{--{!! Form::close() !!}--}}
                    </table>
                </div>
                <div class="col-xs-6 col-sm-5 col-md5" >
                    <table class="table  table-striped">
                        <thead>
                        <tr><td colspan="6"><h5><b>物資需求列表(向民眾募集)</b></h5></td></tr>

                        <tr><th>物資編號</th><th>物資名稱</th><th>需求數量</th><th>已認捐數量</th><th>單位</th><th>修改</th></tr>
                        </thead>
                        <tbody>

                        <tr><td>1</td><td>泡麵</td><td class="text-right">20</td><td class="text-right">10</td><td>包</td><td><button class="btn btn-link btn-sm" data-toggle="modal" data-target="#update">修改</button></td></tr>
                        <!-- Modal -->
                        <div class="modal fade" id="update" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    {{--{!! Form::open(array('url' => 'call/manage/createMission', 'method' => 'post','class' => 'form-horizontal','onSubmit' => 'return checkForm();')) !!}--}}
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h4 class="modal-title" id="myModalLabel"><b>修改欲募捐數量</b></h4>
                                    </div>
                                    <div class="modal-body">
                                        <dl class="dl-horizontal">
                                            <dt>物資編號</dt>
                                            <dd>1</dd><br>
                                            <dt>物資名稱</dt>
                                            <dd>泡麵</dd><br>
                                            {!! Form::hidden('product_id','value') !!}
                                            <dt>需求數量</dt>
                                            <dd class="text-right">33</dd><br>
                                            <dt>欲修改需求數量</dt>
                                            <dd class="text-right">{!! Form::number('require_number','',['id' =>  'mission_list_name','class' => 'form-control text-right','min'=>'0']) !!}</dd> <br>

                                        </dl>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">取消</button>
                                        {!! Form::submit('修改', ['class' => 'btn btn-default btn-sm btn-primary']) !!}
                                    </div>
                                </div><!-- /.modal-content -->
                                {!! Form::close() !!}
                            </div><!-- /.modal-dialog -->
                        </div><!-- /.modal -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="tab-pane" id="donate">
            {{--<div class="col-xs-16 col-sm-12 col-md-12" >--}}
            {{--3.點收捐贈單--}}
            {{--</div>--}}

            <div class="col-xs-16 col-sm-12 col-md-12" >

                <div class="col-xs-12 col-sm-8 col-md-8" >
                    <table class="table">
                        {{--{!! Form::open(array('url' => 'call/manage/save', 'method' => 'post')) !!}--}}
                        <thead>
                        <tr><td colspan="7"><h5><b>捐贈單列表</b></h5></td></tr>
                        <tr><th>捐贈單編號</th><th>捐贈人姓名</th><th>捐贈人電話</th><th>捐贈人Email</th><th></th></tr>
                        </thead>
                        <tbody>

                        <tr class="header expand" style="background-color: #f9f9f9; border-top-width:3px; border-top-style:solid; border-top-color: #dddddd"><td>1</td><td>王小明</td><td>0912312312</td><td>123yahoo.com.tw</td><td><span class="sign"></span></td></tr>
                        <tr><td></td><th>物資名稱</th><th>捐贈數量</th><th>單位</th><th>點收</th></tr>
                        <tr><td></td><td>泡麵</td><td class="text-right">100</td><td>包</td><td>{!! Form::checkbox('name', 'value')!!}</td></tr>
                        <tr><td></td><td>礦泉水</td><td class="text-right">2</td><td>瓶</td><td>{!! Form::checkbox('name', 'value')!!}</td></tr>
                        <tr><td colspan="4"></td><td>{!! Form::submit('點收完成', ['class' => 'btn btn-default btn-sm']) !!}</td></tr>
                        <tr class="header expand"  style="background-color: #f9f9f9; border-top-width:3px; border-top-style:solid; border-top-color: #dddddd"><td>1</td><td>王小明</td><td>0912312312</td><td>123yahoo.com.tw</td><td><span class="sign"></span></td></tr>
                        <tr><td>物資名稱</td><td>捐贈數量</td></tr>

                        </tbody>
                        {{--{!! Form::close() !!}--}}
                    </table>
                </div>
                {{--<div class="col-xs-4 col-sm-4 col-md-4" >--}}
                {{--<table class="table  table-striped">--}}
                {{--<thead>--}}
                {{--<tr><td colspan="7"><h5><b>人員需求列表(中央決定派遣給任務)</b></h5></td></tr>--}}
                {{--<tr><th>任務編號</th><th>需求人數</th><th>需求人員種類</th></tr>--}}
                {{--</thead>--}}
                {{--<tbody>--}}

                {{--<tr><td>1</td><td>23</td><td>醫療組</td></tr>--}}

                {{--</tbody>--}}
                {{--</table>--}}

                {{--</div>--}}
            </div>
        </div>

        <div class="tab-pane active" id="assign">
            {{--<div class="col-xs-16 col-sm-12 col-md-12" >--}}
            {{--4.分配物資(至地方)<br>--}}
            {{--4.1 看到各地方存量不足<br>--}}
            {{--4.2 修改各地方安全存量(如有增援需求)<br>--}}
            {{--</div>--}}

            <div class="col-xs-16 col-sm-12 col-md-12" >

                <div class="col-xs-12 col-sm-8 col-md-8" >
                    <table class="table">
                        {{--{!! Form::open(array('url' => 'call/manage/save', 'method' => 'post')) !!}--}}
                        <thead>
                        <tr><td colspan="8"><h5><b>地方物資存量表</b></h5></td></tr>
                        <tr><th width="10%">任務編號</th><th colspan="2">任務名稱</th><th>負責人</th><th>負責人電話</th><th>負責人Email</th></tr>
                        </thead>
                        <tbody>

                        <tr class="header expand"  style="background-color: #f9f9f9; border-top-width:3px; border-top-style:solid; border-top-color: #dddddd">
                            <td>1</td><td colspan="2">西屯區</td><td>陳芊蓉</td><td>0987654321</td><td>789yahoo.com.tw</td><td>警告:尚未送出物資</td><td><span class="sign"></span></td>
                        </tr>
                        <tr><td width="10%"></td><th width="15%">物資編號</th><th width="15%">物資名稱</th><th width="15%">安全存量</th><th width="15%">目前存量</th><th width="5%">單位</th><th width="20%">指揮官分配數量</th><th width="5%"></th></tr>
                        <tr><td></td><td>1</td><td>泡麵</td><td class="text-right">345</td><td class="text-right">123</td><td>包</td><td class="text-right">60</td><td>{!! Form::checkbox('name', 'value')!!}</td></tr>
                        <tr><td></td><td>2</td><td>礦泉水</td><td class="text-right">345</td><td class="text-right">123</td><td>瓶</td><td class="text-right">50</td><td>{!! Form::checkbox('name', 'value')!!}</td></tr>
                        <tr><td colspan="3"></td><td class="text-right">{!! Form::submit('修改安全存量', ['class' => 'btn btn-default btn-sm']) !!}</td><td colspan="2"></td><td colspan="2" class="text-right">{!! Form::submit('已送出物資', ['class' => 'btn btn-default btn-sm']) !!}</td></tr>

                        <tr class="header expand"  style="background-color: #f9f9f9; border-top-width:3px; border-top-style:solid; border-top-color: #dddddd">
                            <td>2</td><td colspan="2">北屯區</td><td>陳芊蓉</td><td>0987654321</td><td>789yahoo.com.tw</td><td></td><td><span class="sign"></span></td>
                        </tr>
                        <tr><td width="10%"></td><th width="15%">物資編號</th><th width="15%">物資名稱</th><th width="15%">目前存量</th><th width="15%">安全存量</th><th width="5%">單位</th><th width="20%">中央指揮官分配數量</th><th width="5%"></th></tr>
                        <tr><td></td><td>1</td><td>泡麵</td><td class="text-right">123</td><td class="text-right">345</td><td>包</td><td class="text-right">0</td><td>{!! Form::checkbox('name', 'value')!!}</td></tr>
                        <tr><td></td><td>2</td><td>礦泉水</td><td class="text-right">123</td><td class="text-right">345</td><td>瓶</td><td class="text-right">0</td><td>{!! Form::checkbox('name', 'value')!!}</td></tr>
                        <tr><td colspan="3"></td><td class="text-right">{!! Form::submit('修改安全存量', ['class' => 'btn btn-default btn-sm']) !!}</td><td  colspan="2"></td><td colspan="2" class="text-right">{!! Form::submit('已送出物資', ['class' => 'btn btn-default btn-sm']) !!}</td></tr>

                        </tbody>
                        {{--{!! Form::close() !!}--}}
                    </table>
                </div>
                {{--<div class="col-xs-4 col-sm-4 col-md-4" >--}}
                {{--<table class="table  table-striped">--}}
                {{--<thead>--}}
                {{--<tr><td colspan="7"><h5><b>人員需求列表(中央決定派遣給任務)</b></h5></td></tr>--}}
                {{--<tr><th>任務編號</th><th>需求人數</th><th>需求人員種類</th></tr>--}}
                {{--</thead>--}}
                {{--<tbody>--}}

                {{--<tr><td>1</td><td>23</td><td>醫療組</td></tr>--}}

                {{--</tbody>--}}
                {{--</table>--}}

                {{--</div>--}}
            </div>
        </div>

    </div>

@endsection