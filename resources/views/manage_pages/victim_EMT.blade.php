@extends('manage_master')
@section('title')
EMT災民
@endsection
@section('content')
    <style>
        table, td, th {
            border: 0px solid black;
        }

        td {
            padding: 5px;
        }
    </style>

    <table class="table table-striped">

        <thead>
        <tr><td colspan="9"><h5><b>災民資料</b></h5></td>
            <td>
                <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#createVictim"> 新增災民資料</button>
                <!-- Modal -->
                <div class="modal fade" id="createVictim" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog" style="width: 80%">
                        <div class="modal-content">
                            {{--{!! Form::open(array('url' => 'call/manage/createMission', 'method' => 'post','class' => 'form-horizontal','onSubmit' => 'return checkForm();')) !!}--}}
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title" id="myModalLabel"><b>新增災民資料</b></h4>
                            </div>
                            <div class="modal-body">
                                <table width="100%">
                                    <tr>
                                        <td width="30%">
                                            <table width="100%">
                                                <tr><td colspan="2"><b>個人資料</b></td></tr>
                                                <tr>
                                                    <th width="40%" class="text-right">姓名</th><td  width="60%">{!! Form::text('lname','',['class' => 'form-control', 'required']) !!}</td>
                                                </tr>
                                                <tr>
                                                    <th class="text-right">名字</th><td>{!! Form::text('fname','',['class' => 'form-control']) !!}</td>
                                                </tr>
                                                <tr>
                                                    <th class="text-right">年齡</th><td> {!! Form::number('age', '', ['id' =>  'age', 'class' => 'form-control', 'min'=>'0']) !!}</td>
                                                </tr>
                                                <tr>
                                                    <th class="text-right">身分證字號</th><td>{!! Form::text('id','',['class' => 'form-control', 'id' => 'id']) !!}</td>
                                                </tr>
                                                <tr>
                                                    <th class="text-right">聯絡電話</th><td>{!! Form::text('phone','',['class' => 'form-control', 'id' => 'phone']) !!}</td>
                                                </tr>
                                                <tr>
                                                    <th class="text-right">住址</th><td>{!! Form::text('address','',['class' => 'form-control']) !!}</td>
                                                </tr>
                                            </table>
                                        </td>
                                        <td width="70%">
                                            <table width="100%">
                                                <tr><td colspan="3"><b>災民狀態</b></td></tr>
                                                <tr>
                                                    <td width="50%">
                                                        {{--<table width="100%">--}}
                                                            {{--<tr>--}}
                                                                {{--<th width="24%" class="text-right">傷重程度</th>--}}

                                                                {{--<td width="38%"><select class="form-control " name="building" id="building">--}}
                                                                        {{--<option value="">請選擇</option>--}}
                                                                        {{--<option value="">重度</option>--}}
                                                                        {{--<option value="">中度</option>--}}
                                                                        {{--<option value="">輕度</option>--}}
                                                                        {{--<option value="">正常</option>--}}
                                                                    {{--</select></td>--}}
                                                            {{--</tr>--}}

                                                            {{--<tr>--}}
                                                                {{--<th class="text-right">詳細診斷</th><td>{!! Form::textarea('remark','',['class' => 'form-control ','style'=>'resize:none']) !!}</td>--}}
                                                            {{--</tr>--}}
                                                        {{--</table>--}}
                                                    </td>
                                                    <td width="5%"></td>
                                                    <td width="50%">
                                                        <table width="100%">
                                                            <tr>
                                                                <th>目前所在地</th>
                                                            </tr>
                                                            <tr>
                                                                <td>{!! Form::text('location','',['class' => 'form-control']) !!}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>處置方式</th>
                                                            </tr>
                                                            <tr>
                                                                <td>{!! Form::textarea('remark','',['class' => 'form-control ','style'=>'resize:none']) !!}</td>
                                                            </tr>


                                                        </table>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                        {{--<td width="35%">--}}
                                            {{--<table width="100%">--}}
                                                {{--<tr><td colspan="2"><b>災民狀態</b></td></tr>--}}
                                                {{--<tr>--}}
                                                    {{--<th width="24%" class="text-right">傷重程度</th>--}}

                                                    {{--<td width="38%"><select class="form-control " name="building" id="building">--}}
                                                            {{--<option value="">請選擇</option>--}}
                                                            {{--<option value="">重度</option>--}}
                                                            {{--<option value="">中度</option>--}}
                                                            {{--<option value="">輕度</option>--}}
                                                            {{--<option value="">正常</option>--}}
                                                        {{--</select></td>--}}
                                                {{--</tr>--}}

                                                {{--<tr>--}}
                                                    {{--<th class="text-right">詳細診斷</th><td>{!! Form::textarea('remark','',['class' => 'form-control ','style'=>'resize:none']) !!}</td>--}}
                                                {{--</tr>--}}
                                            {{--</table>--}}
                                        {{--</td>--}}
                                        {{--<td width="5%"></td>--}}
                                        {{--<td width="30%">--}}
                                            {{--<table width="100%">--}}
                                                {{--<tr>--}}
                                                    {{--<th>目前所在地</th>--}}
                                                {{--</tr>--}}
                                                {{--<tr>--}}
                                                    {{--<td>{!! Form::text('location','',['class' => 'form-control']) !!}</td>--}}
                                                {{--</tr>--}}
                                                {{--<tr>--}}
                                                    {{--<th>處置方式</th>--}}
                                                {{--</tr>--}}
                                                {{--<tr>--}}
                                                    {{--<td>{!! Form::textarea('remark','',['class' => 'form-control ','style'=>'resize:none']) !!}</td>--}}
                                                {{--</tr>--}}


                                            {{--</table>--}}
                                        {{--</td>--}}
                                    </tr>
                                </table>





                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">取消</button>
                                {!! Form::submit('新增災民資料', ['class' => 'btn btn-default btn-sm btn-primary']) !!}
                            </div>
                            {{--{!! Form::close() !!}--}}
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->
            </td>
        </tr>
        <tr>
            <th width="5%">編號</th>
            <th width="10%">姓名</th>
            <th width="5%">性別</th>
            <th width="5%">年齡</th>
            <th width="15%">電話</th>
            {{--<td>住址</td>--}}
            {{--<td>身分證字號</td>--}}
            <th width="10%">傷重程度</th>
            <th width="20%">目前所在地點</th>
            <th width="10%">診斷日期</th>
            <th width="10%">診斷時間</th>
            <th width="10%">詳細/修改</th>
        </tr>

        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>日向寧次</td>
                <td>男</td>
                <td>17</td>
                <td>0987654321</td>
                {{--<td>住址</td>--}}
                {{--<td>身分證字號</td>--}}
                <td>重傷</td>
                <td>戰場上</td>
                <td>2015/08/19</td>
                <td>07:37:20</td>
                <td>
                    <button class="btn btn-link btn-sm" data-toggle="modal" data-target="#update">修改</button>

                    <!-- Modal -->
                    <div class="modal fade" id="update" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog" style="width: 80%">
                            <div class="modal-content">
                                {{--{!! Form::open(array('url' => 'call/manage/createMission', 'method' => 'post','class' => 'form-horizontal','onSubmit' => 'return checkForm();')) !!}--}}
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title" id="myModalLabel"><b>修改欲募捐數量</b></h4>
                                </div>
                                <div class="modal-body">
                                    <dl class="dl-horizontal">
                                        {{--<dt>物資編號</dt>--}}
                                        {{--<dd>{!!$center_support_product->product_total_amount_id!!}</dd><br>--}}
                                        {{--<dt>物資名稱</dt>--}}
                                        {{--<dd>{!!$center_support_product->product_name!!}</dd><br>--}}
                                        {{--{!! Form::hidden('product_id',$center_support_product->product_total_amount_id) !!}--}}
                                        {{--<dt>需求數量</dt>--}}
                                        {{--<dd>{!!$center_support_product->center_support_product_amount." ".$center_support_product->unit!!}</dd><br>--}}
                                        {{--<dt>欲修改需求數量</dt>--}}
                                        {{--<dd class="text-right">{!! Form::number('require_number','',['id' =>  'mission_list_name','class' => 'form-control text-right','min'=>'0']) !!}</dd> <br>--}}

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
                </td>
            </tr>

        </tbody>
    </table>



@endsection
