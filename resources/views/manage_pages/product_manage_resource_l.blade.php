@extends('manage_master')
@section('title')
    物資管理(地方)
@endsection
@section('link')
    <li>{!! Html::link('resource/manage/product/local', '物資管理') !!}</li>
    <li>{!! Html::link('resource/manage/people/local', '人員管理') !!}</li>
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
    {{--1.看到目前物資存量--}}
    {{--2.點收中央發放物資--}}
    {{--3.物資發放(借用器材)--}}
    {{--4.額外物資需求(增援)--}}
    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist">
        <li class="active"><a href="#productStatus" role="tab" data-toggle="tab"><b>物資存量管理</b></a></li>
        <li><a href="#borrow" role="tab" data-toggle="tab"><b>器材借用</b></a></li>

    </ul>
    <br><br>
    <!-- Tab panes -->
    <div class="tab-content ">
        <div class="tab-pane active" id="productStatus">
            {{--<div class="col-xs-16 col-sm-12 col-md-12" >--}}
            {{--1.看到目前物資存量<br>--}}
            {{--2.新增修改需求捐贈數量--}}
            {{--</div>--}}
            <div class="col-xs-16 col-sm-12 col-md-12" >
                <div class="col-xs-12 col-sm-8 col-md-8" >
                    <table class="table  table-striped">
                        {{--{!! Form::open(array('url' => 'call/manage/save', 'method' => 'post')) !!}--}}
                        <thead>
                        <tr><td colspan="2"><h5><b> 地方物資存量列表</b></h5></td><th class="text-right">提領人</th><td colspan="3">{!! Form::text('leader', '', ['id' =>  'leader', 'placeholder' =>  '編號 或 姓名','class' => 'form-control ', 'required']) !!}</td></tr>
                        <tr><th width="15%">物資編號</th><th width="15%">名稱</th><th width="15%">目前存量</th><th width="15%">安全存量</th><th width="10%">單位</th><th width="15%">提領數量</th></tr>
                        </thead>
                        <tbody>
                        @if (isset($local_safe_amounts))
                            @foreach ($local_safe_amounts as $local_safe_amount)
                                <tr>
                                    <td>{!! $local_safe_amount->product_total_amount_id !!}</td>
                                    <td>{!! $local_safe_amount->product_name !!}</td>
                                    <td class="text-right">{!! $local_safe_amount->amount !!}</td>
                                    <td class="text-right">{!! $local_safe_amount->safe_amount !!}</td>
                                    <td>{!! $local_safe_amount->unit !!}</td>
                                    <td>{!! Form::number('name', 0,['class' => 'form-control text-right','min'=>'0','max'=>$local_safe_amount->amount])!!}</td>
                                </tr>

                                {{--<tr><td>1</td><td>泡麵</td><td class="text-right">123</td><td class="text-right">345</td><td>包</td><td>{!! Form::number('name', 0,['class' => 'form-control text-right','min'=>'0','max'=>'100'])!!}</td></tr>--}}
                           @endforeach
                        @endif
                        <tr><td colspan="5"></td><td class="text-right">{!! Form::submit('提領', ['class' => 'btn btn-default btn-sm']) !!}</td></tr>
                        </tbody>
                        {{--{!! Form::close() !!}--}}
                    </table>
                </div>
                <div class="col-xs-4 col-sm-4 col-md-4" >
                    <table class="table  table-striped">
                        <thead>
                        <tr><td colspan="6"><h5><b>中央發放物資列表</b></h5></td></tr>

                        <tr><th>物資編號</th><th>物資名稱</th><th>發放數量</th><th>單位</th><th>實際點收數量</th></tr>
                        </thead>
                        <tbody>
                        @if (isset($mission_support_products))
                            @foreach ($mission_support_products as $mission_support_product)
                                @if($mission_support_product->resource_assign_product_amount != 0)
                                    <tr>
                                        <td>{!! $mission_support_product->product_total_amount_id !!}</td>
                                        <td>{!! $mission_support_product->product_name !!}</td>
                                        <td class="text-right">{!! $mission_support_product->resource_assign_product_amount !!}</td>
                                        <td>{!! $mission_support_product->unit !!}</td>
                                        <td>{!! Form::number('name', 0,['class' => 'form-control text-right','min'=>'0','max'=>$mission_support_product->resource_assign_product_amount])!!}</td>
                                    </tr>
                                @endif
                                {{--<tr><td>1</td><td>泡麵</td><td class="text-right">20</td><td>包</td><td>{!! Form::number('name', 0,['class' => 'form-control text-right','min'=>'0','max'=>'100'])!!}</td></tr>--}}
                                 @endforeach
                        @endif
                        <tr><td colspan="5" class="text-center">{!! Form::submit('點收完成', ['class' => 'btn btn-default btn-sm']) !!}</td></tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="tab-pane" id="borrow">

            <div class="col-xs-16 col-sm-12 col-md-12" >

                <div class="col-xs-12 col-sm-8 col-md-8" >
                    <table class="table">

                        <thead>
                        <tr><td colspan="7"><h5><b>地方器材借用表</b></h5></td></tr>
                        <tr><th>器材編號</th><th colspan="2">器材名稱</th><th>器材總數</th><th>借出數量</th><th colspan="3" class="text-right">借用資料/歸還</th></tr>
                        </thead>
                        <tbody>

                        <tr class="header expand"  style="background-color: #f9f9f9; border-top-width:3px; border-top-style:solid; border-top-color: #dddddd">
                            <td>1</td><td colspan="2">電鑽</td><td class="text-right">3</td><td class="text-right">2</td><td class="text-right" colspan="3"><span class="sign"></span></td>
                        </tr>
                        <tr><th></th><th colspan="2">借用時間</th><th>借用人</th><th>借用數量</th><th>所在地</th><th colspan="2">歸還</th></tr>
                        {{--{!! Form::open(array('url' => 'call/manage/save', 'method' => 'post')) !!}--}}
                        <tr><td></td><td>2014/08/04</td><td>04:23:32</td><td>陳芊蓉</td><td class="text-right">2</td><td>資電館(?</td><td>{!! Form::number('name', 0,['class' => 'form-control text-right','min'=>'0','max'=>'100'])!!}</td><td>{!! Form::submit('歸還', ['class' => 'btn btn-default btn-sm']) !!}</td></tr>
                        {!! Form::hidden('borrow','1') !!}
                        {{--{!! Form::close() !!}--}}
                        <tr class="header expand"  style="background-color: #f9f9f9; border-top-width:3px; border-top-style:solid; border-top-color: #dddddd">
                            <td>2</td><td colspan="2">工具箱</td><td class="text-right">3</td><td class="text-right">2</td><td class="text-right" colspan="3"><span class="sign"></span></td>
                        </tr>
                        <tr><th></th><th colspan="2">借用時間</th><th>借用人</th><th>借用數量</th><th>所在地</th><th colspan="2">歸還</th></tr>
                        {{--{!! Form::open(array('url' => 'call/manage/save', 'method' => 'post')) !!}--}}
                        <tr><td></td><td>2014/08/04</td><td>04:23:32</td><td>陳芊蓉</td><td class="text-right">2</td><td>資電館(?</td><td>{!! Form::number('name', 0,['class' => 'form-control text-right','min'=>'0','max'=>'100'])!!}</td><td>{!! Form::submit('歸還', ['class' => 'btn btn-default btn-sm']) !!}</td></tr>
                        {!! Form::hidden('borrow','1') !!}
                        {{--{!! Form::close() !!}--}}

                        </tbody>

                    </table>
                </div>
                <div class="col-xs-4 col-sm-4 col-md-4" >
                    {{--{!! Form::open(array('url' => 'call/manage/save', 'method' => 'post')) !!}--}}
                    <table class="table table-striped">
                        <thead>
                            <tr><th colspan="2"><h5><b>器材借用表單</b></h5></th></tr>
                        </thead>
                        <tbody>
                            <tr><th>借用器材</th><td>{!! Form::select('name', array('1' => '器材1', '2' => '器材2', '3' => '器材3'), '2', ['class' => 'form-control']) !!}</td></tr>
                            <tr><th>借用數量</th><td>{!! Form::number('require_number','',['id' =>  'mission_list_name','class' => 'form-control text-right', 'required','min'=>'0']) !!}</td></tr>
                            <tr><th>借用人</th><td>{!! Form::text('leader', '', ['id' =>  'leader', 'placeholder' =>  '編號 或 姓名','class' => 'form-control ', 'required']) !!}</td></tr>
                            <tr><td colspan="2" class="text-center">{!! Form::submit('借用', ['class' => 'btn btn-default btn-sm']) !!}</td></tr>
                        </tbody>
                    </table>


                    {{--{!! Form::close() !!}--}}
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


    </script>
@endsection