@extends('manage_master')
@section('title')
    物資管理(中心)
@endsection
@section('link')
    <li>{!! Html::link('resource/manage/product/center', '物資管理') !!}</li>
    <li>{!! Html::link('resource/manage/people/center', '人員管理') !!}</li>
@endsection
@section('css')
    tr.header,
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

    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist">
        <li><a href="#productStatus" role="tab" data-toggle="tab"><b>物資存量管理</b></a></li>
        <li><a href="#donate" role="tab" data-toggle="tab"><b>民眾捐贈單管理</b></a></li>
        <li class="active"><a href="#assign" role="tab" data-toggle="tab"><b>地方物資存量管理/分配物資</b></a></li>

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
                        <tr><td colspan="7"><h5><b>中央物資存量列表</b></h5></td></tr>
                        <tr><th width="10%">物資編號</th><th width="10%">名稱</th><th width="10%">目前存量</th><th width="10%">安全存量</th><th width="10%">單位</th></tr>
                        </thead>
                        <tbody>
                        @if (isset($center_amounts))
                            @foreach ($center_amounts as $center_amount)
                        <tr>
                            <td>{!! $center_amount->local_safe_amount_id !!}</td>
                            <td>{!! $center_amount->product_name !!}</td>
                            <td class="text-right">{!! $center_amount->amount !!}</td>
                            <td class="text-right">{!! $center_amount->safe_amount !!}</td>
                            <td>{!! $center_amount->unit !!}</td>
                        </tr>
                            @endforeach
                        @endif

                        </tbody>
                        {{--{!! Form::close() !!}--}}
                    </table>
                </div>
                <div class="col-xs-6 col-sm-5 col-md5" >
                    <table class="table  table-striped">
                        <thead>
                        <tr><td colspan="6"><h5><b>物資需求列表(向民眾募集)</b></h5></td>
                            {{--<td class="text-right" colspan="2">--}}
                                {{--<button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#createVolunteerNeedBlock"> 新增新的志工需求單</button>--}}
                            {{--</td>--}}
                        </tr>
                        {{--<!-- Modal -->--}}
                        {{--<div class="modal fade" id="createVolunteerNeedBlock" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">--}}
                            {{--<div class="modal-dialog">--}}
                                {{--<div class="modal-content">--}}
                                    {{--{!! Form::open(array('url' => 'call/manage/createMission', 'method' => 'post','class' => 'form-horizontal','onSubmit' => 'return checkForm();')) !!}--}}
                                    {{--<div class="modal-header">--}}
                                        {{--<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>--}}
                                        {{--<h4 class="modal-title" id="myModalLabel"><b>創建新任務</b></h4>--}}
                                    {{--</div>--}}
                                    {{--<div class="modal-body">--}}
                                        {{--<dl class="dl-horizontal">--}}
                                            {{--<dt>需求人數</dt>--}}
                                            {{--<dd>{!! Form::number('require_number','',['id' =>  'mission_list_name','class' => 'form-control text-right', 'required','min'=>'0']) !!}</dd> <br>--}}

                                            {{--<dt>需求人員資格內容</dt>--}}
                                            {{--<dd> {!! Form::textarea('content', '', ['id' =>  'leader','class' => 'form-control', 'required','style'=>'resize: vertical']) !!}<br>--}}

                                        {{--</dl>--}}

                                    {{--</div>--}}
                                    {{--<div class="modal-footer">--}}
                                        {{--<button type="button" class="btn btn-default btn-sm" data-dismiss="modal">取消</button>--}}
                                        {{--{!! Form::submit('招募志工', ['class' => 'btn btn-default btn-sm btn-primary']) !!}--}}
                                    {{--</div>--}}
                                    {{--{!! Form::close() !!}--}}
                                {{--</div><!-- /.modal-content -->--}}
                            {{--</div><!-- /.modal-dialog -->--}}
                        {{--</div><!-- /.modal -->--}}
                        <tr><th>物資編號</th><th>物資名稱</th><th>需求數量</th><th>已認捐數量</th><th>單位</th><th>修改</th></tr>
                        </thead>
                        <tbody>
                        @if (isset($center_support_products) )
                            @foreach ($center_support_products as $center_support_product )
                                <div style="display: none">
                                    {!!$n =0!!}
                                </div>
                                @foreach ($donates as $donate )
                                    @if($donate->product_total_amount_id == $center_support_product->product_total_amount_id &&
                                        $donate->arrived == 0)
                                        <div style="display: none">
                                            {!!$n = $n + $donate->donate_amount!!}
                                        </div>
                                    @endif
                                @endforeach
                            <tr>
                                <td>{!!$center_support_product->product_total_amount_id!!}</td>
                                <td>{!!$center_support_product->product_name!!}</td>
                                <td class="text-right">{!!$center_support_product->center_support_product_amount!!}</td>
                                <td class="text-right">{!! $n !!}</td>
                                <td>{!!$center_support_product->unit!!}</td>
                                <td><button class="btn btn-link btn-sm" data-toggle="modal" data-target="#update">修改</button></td>
                            </tr>
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
                                                <dd>{!!$center_support_product->product_total_amount_id!!}</dd><br>
                                                <dt>物資名稱</dt>
                                                <dd>{!!$center_support_product->product_name!!}</dd><br>
                                                {!! Form::hidden('product_id',$center_support_product->product_total_amount_id) !!}
                                                <dt>需求數量</dt>
                                                <dd class="text-right">{!!$center_support_product->center_support_product_amount." ".$center_support_product->unit!!}</dd><br>
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
                            @endforeach
                        @endif
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
                        @if (isset($donate_names) )
                            @foreach ($donate_names as $donate_name )
                                <tr class="header expand" style="background-color: #f9f9f9; border-top-width:3px; border-top-style:solid; border-top-color: #dddddd">
                                    <td>{!!$donate_name->donate_id!!}</td>
                                    <td>{!!$donate_name->lname.$donate_name->fname!!}</td>
                                    <td>{!!$donate_name->phone!!}</td>
                                    <td>{!!$donate_name->email!!}</td>
                                    <td><span class="sign"></span></td></tr>
                                <tr><td></td><th>物資名稱</th><th>捐贈數量</th><th>單位</th><th>點收</th></tr>
                                    @if (isset($donates) )
                                        @foreach ($donates as $donate )
                                            @if($donate->donate_id == $donate_name->donate_id && $donate->arrived == 0)

                                            <tr>
                                                <td></td>
                                                <td>{!!$donate->product_name!!}</td>
                                                <td class="text-right">{!!$donate->donate_amount!!}</td>
                                                <td>{!!$donate->unit!!}</td>
                                                <td>{!! Form::number('name', 0 ,['class' => 'form-control text-right','min'=>'0','max'=>$donate->donate_amount])!!}</td>
                                            </tr>

                                            @endif
                                        @endforeach
                                        <tr><td colspan="4"></td><td>{!! Form::submit('點收完成', ['class' => 'btn btn-default btn-sm']) !!}</td></tr>
                                    @endif
                            @endforeach
                        @endif
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

                {{--<div class="col-xs-14 col-sm-10 col-md-10" >--}}
                    <table class="table">
                        {{--{!! Form::open(array('url' => 'call/manage/save', 'method' => 'post')) !!}--}}
                        <thead>
                        <tr><td colspan="8"><h5><b>地方物資存量表</b></h5></td></tr>
                        <tr><th width="10%">任務編號</th><th colspan="2">任務名稱</th><th>負責人</th><th>負責人電話</th><th>負責人Email</th><th></th><th></th></tr>
                        </thead>
                        <tbody>
                        @if (isset($resourceNewLocationUsers) )
                            @foreach ($resourceNewLocationUsers as $resourceNewLocationUser )
                            <tr class="header expand"  style="background-color: #f9f9f9; border-top-width:3px; border-top-style:solid; border-top-color: #dddddd">
                                <td>{!!$resourceNewLocationUser->mission_list_id!!}</td>
                                <td colspan="2">{!!$resourceNewLocationUser->mission_name!!}</td>
                                <td>{!!$resourceNewLocationUser->name!!}</td>
                                <td>{!!$resourceNewLocationUser->phone!!}</td>
                                <td>{!!$resourceNewLocationUser->email!!}</td>

                                @if (isset($local_safe_amounts_arrays))
                                    <div style="display: none">
                                        @if(isset($local_safe_amounts_arrays[$resourceNewLocationUser->mission_list_id]))
                                            {!!$n=count($local_safe_amounts_arrays[$resourceNewLocationUser->mission_list_id])!!}
                                        @else
                                            {!! $n = 0 !!}
                                        @endif
                                            {!! $center = 0 !!}
                                        @for($i=1;$i<=$n;$i++)
                                            {!!$center = $center + $local_safe_amounts_arrays[$resourceNewLocationUser->mission_list_id][$i]['center_assign_product_amount']!!}
                                        @endfor
                                        @if($center == 0)
                                            <td></td><td><span class="sign"></span></td>
                                        @elseif($center > 0)
                                            <td>警告:尚未送出物資</td><td><span class="sign"></span></td>
                                        @endif
                                    </div>
                                @endif
                                {{--<td>警告:尚未送出物資</td><td><span class="sign"></span></td>--}}
                                {{--@if($mission_support_products->center_assign_product_amount == 0)--}}
                                    {{--<td>警告:尚未送出物資</td><td><span class="sign"></span></td>--}}
                                {{--@else--}}


                            </tr>
                            {{--@endif--}}
                                @if (isset($local_safe_amounts_arrays) )
                                    <div style="display: none">
                                        @if(isset($local_safe_amounts_arrays[$resourceNewLocationUser->mission_list_id]))
                                            {!!$n=count($local_safe_amounts_arrays[$resourceNewLocationUser->mission_list_id])!!}
                                        @else
                                            {!!$n=0!!}
                                        @endif
                                    </div>
                                    <tr><td width="10%"></td><th width="15%">物資編號</th><th width="15%">物資名稱</th><th width="15%">安全存量</th><th width="15%">目前存量</th><th width="5%">單位</th><th width="15%">指揮官欲分配數量</th><th width="10%">實際送出</th></tr>

                                    @for($i=1;$i<=$n;$i++)
                                        <tr>
                                            <td></td>
                                            <td>{!!$local_safe_amounts_arrays[$resourceNewLocationUser->mission_list_id][$i]['product_total_amount_id']!!}</td>
                                            <td>{!!$local_safe_amounts_arrays[$resourceNewLocationUser->mission_list_id][$i]['product_name']!!}</td>
                                            <td class="text-right">{!!$local_safe_amounts_arrays[$resourceNewLocationUser->mission_list_id][$i]['safe_amount']!!}</td>
                                            <td class="text-right">{!!$local_safe_amounts_arrays[$resourceNewLocationUser->mission_list_id][$i]['amount']!!}</td>
                                            <td>{!!$local_safe_amounts_arrays[$resourceNewLocationUser->mission_list_id][$i]['unit']!!}</td>
                                            <td class="text-right">{!!$local_safe_amounts_arrays[$resourceNewLocationUser->mission_list_id][$i]['center_assign_product_amount']!!}</td>
                                            <td>{!! Form::number('name', 0,['class' => 'form-control text-right','min'=>'0','max'=>$local_safe_amounts_arrays[$resourceNewLocationUser->mission_list_id][$i]['center_assign_product_amount']])!!}</td>
                                        </tr>

                                                    {{--@foreach ($mission_support_products as $mission_support_product )--}}
                                                        {{--<tr>--}}
                                                            {{--<td></td>--}}
                                                            {{--<td>{!!$mission_support_product->product_total_amount_id!!}</td>--}}
                                                            {{--<td>{!!$mission_support_product->product_name!!}</td>--}}
                                                            {{--<td class="text-right">{!!$mission_support_product->safe_amount!!}</td>--}}
                                                            {{--<td class="text-right">{!!$mission_support_product->amount!!}</td>--}}
                                                            {{--<td>{!!$mission_support_product->unit!!}</td>--}}
                                                            {{--<td class="text-right">{!!$mission_support_product->center_assign_product_amount!!}</td>--}}
                                                            {{--<td>{!! Form::number('name', 0,['class' => 'form-control text-right','min'=>'0','max'=>$mission_support_product->center_assign_product_amount])!!}</td></tr>--}}
                                                        {{--<tr><td colspan="3"></td><td class="text-right">{!! Form::submit('修改安全存量', ['class' => 'btn btn-default btn-sm']) !!}</td><td colspan="2"></td><td colspan="2" class="text-right">{!! Form::submit('已送出物資', ['class' => 'btn btn-default btn-sm']) !!}</td></tr>--}}
                                                    {{--@endforeach--}}
                                    @endfor

                                    <tr><td colspan="3"></td><td class="text-right">{!! Form::submit('修改安全存量', ['class' => 'btn btn-default btn-sm']) !!}</td><td colspan="2"></td><td colspan="2" class="text-right">{!! Form::submit('已送出物資', ['class' => 'btn btn-default btn-sm']) !!}</td></tr>

                                @endif

                            @endforeach
                        @endif
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
@section('javascript')

    <script language="JavaScript">
        $('.header').click(function(){
            $(this).toggleClass('expand').nextUntil('tr.header').slideToggle(100);
        });
        $('.header').trigger('click'); //trigger :觸發指定事件


    </script>
@endsection
