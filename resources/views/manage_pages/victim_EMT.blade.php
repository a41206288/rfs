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
{{--                            {!! Form::open(array('url' => 'victim/EMT/create', 'method' => 'post','class' => 'form-horizontal','onSubmit' => 'return checkForm();')) !!}--}}
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title" id="myModalLabel"><b>新增災民資料</b></h4>
                            </div>
                            <div class="modal-body">
                                <table width="100%">
                                    <tr><th>個人資料</th><th colspan="2">災民狀態</th></tr>
                                    <tr>
                                        <td width="30%">
                                            <table width="100%">
                                                <tr>
                                                    <th width="40%" class="text-right">姓名</th><td  width="60%">{!! Form::text('lname','',['class' => 'form-control']) !!}</td>
                                                </tr>
                                                <tr>
                                                    <th class="text-right">名字</th><td>{!! Form::text('fname','',['class' => 'form-control']) !!}</td>
                                                </tr>
                                                <tr>
                                                    <th class="text-right">性別</th>
                                                    <td>{!! Form::select('sex', array('男' => '男', '女' => '女','其他' => '其他','請選擇' => '請選擇'),'請選擇',['class' => 'form-control']) !!}</td>
                                                </tr>
                                                <tr>
                                                    <th class="text-right">年齡</th><td> {!! Form::number('age', '', ['id' =>  'age', 'class' => 'form-control', 'min'=>'0']) !!}</td>
                                                </tr>
                                                <tr>
                                                    <th class="text-right">身分證字號</th><td>{!! Form::text('person_id','',['class' => 'form-control', 'id' => 'id']) !!}</td>
                                                </tr>
                                                <tr>
                                                    <th class="text-right">聯絡電話</th><td>{!! Form::text('phone','',['class' => 'form-control', 'id' => 'phone']) !!}</td>
                                                </tr>
                                                <tr>
                                                    <th class="text-right">住址</th><td>{!! Form::text('address','',['class' => 'form-control']) !!}</td>
                                                </tr>
                                            </table>
                                        </td>
                                        <td width="5%"></td>
                                        <td width="30%">
                                            <table width="100%">
                                                <tr>
                                                    <th width="24%">傷重程度</th>
                                                </tr>
                                                <tr>
                                                    <td width="38%">{!! Form::select('damage_level', array('請選擇' => '請選擇','4' => '死亡', '3' => '重傷','2' => '中傷','1' => '輕傷','0' => '4'),'重傷',['class' => 'form-control']) !!}</td>                                                   </td>
                                                </tr>
                                                <tr>
                                                    <th>詳細診斷</th>
                                                </tr>
                                                <tr>
                                                    <td>{!! Form::textarea('damage_detail','',['class' => 'form-control ','style'=>'resize:none']) !!}</td>
                                                </tr>
                                            </table>
                                        </td>
                                        <td width="5%"></td>
                                        <td width="30%">
                                            <table width="100%">
                                                <tr>
                                                    <th>目前所在地</th>
                                                </tr>
                                                <tr>
                                                    <td>{!! Form::text('now_location','',['class' => 'form-control']) !!}</td>
                                                </tr>
                                                <tr>
                                                    <th>處置方式</th>
                                                </tr>
                                                <tr>
                                                    <td>{!! Form::textarea('disposal','',['class' => 'form-control ','style'=>'resize:none']) !!}</td>
                                                </tr>


                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">取消</button>
                                {!! Form::submit('新增災民資料', ['class' => 'btn btn-default btn-sm btn-primary']) !!}
                            </div>
{{--                            {!! Form::close() !!}--}}
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
                                {{--{!! Form::open(array('url' => 'victim/EMT/edit', 'method' => 'post','class' => 'form-horizontal','onSubmit' => 'return checkForm();')) !!}--}}
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title" id="myModalLabel"><b>修改欲募捐數量</b></h4>
                                </div>
                                <div class="modal-body">
                                    <div class="modal-body">
                                        <table width="100%">
                                            <tr><th>個人資料</th><th colspan="2">災民狀態</th></tr>
                                            <tr>
                                                <td width="30%">
                                                    <table width="100%">
                                                        <tr>
                                                            <th width="40%" class="text-right">姓名</th><td  width="60%">{!! Form::text('lname','日向寧次',['class' => 'form-control']) !!}</td>
                                                        </tr>
                                                        <tr>
                                                            <th class="text-right">名字</th><td>{!! Form::text('fname','寧次',['class' => 'form-control']) !!}</td>
                                                        </tr>
                                                        <tr>
                                                            <th class="text-right">性別</th>
                                                            <td>{!! Form::select('sex', array('男' => '男', '女' => '女','其他' => '其他','請選擇' => '請選擇'),'男',['class' => 'form-control']) !!}</td>
                                                        </tr>
                                                        <tr>
                                                            <th class="text-right">年齡</th><td> {!! Form::number('age', '17', ['id' =>  'age', 'class' => 'form-control', 'min'=>'0']) !!}</td>
                                                        </tr>
                                                        <tr>
                                                            <th class="text-right">身分證字號</th><td>{!! Form::text('person_id','k123456789',['class' => 'form-control']) !!}</td>
                                                        </tr>
                                                        <tr>
                                                            <th class="text-right">聯絡電話</th><td>{!! Form::text('phone','0987654321',['class' => 'form-control']) !!}</td>
                                                        </tr>
                                                        <tr>
                                                            <th class="text-right">住址</th><td>{!! Form::text('address','台中市西屯區',['class' => 'form-control']) !!}</td>
                                                        </tr>
                                                    </table>
                                                </td>
                                                <td width="5%"></td>
                                                <td width="30%">
                                                    <table width="100%">
                                                        <tr>
                                                            <th width="24%">傷重程度</th>
                                                        </tr>
                                                        <tr>
                                                            <td width="38%">{!! Form::select('damage_level', array('請選擇' => '請選擇','4' => '死亡', '3' => '重傷','2' => '中傷','1' => '輕傷','0' => '4'),'重傷',['class' => 'form-control']) !!}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>詳細診斷</th>
                                                        </tr>
                                                        <tr>
                                                            <td>{!! Form::textarea('damage_detail','尖銳物品貫穿身體',['class' => 'form-control ','style'=>'resize:none']) !!}</td>
                                                        </tr>
                                                    </table>
                                                </td>
                                                <td width="5%"></td>
                                                <td width="30%">
                                                    <table width="100%">
                                                        <tr>
                                                            <th>目前所在地</th>
                                                        </tr>
                                                        <tr>
                                                            <td>{!! Form::text('now_location','戰場上',['class' => 'form-control']) !!}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>處置方式</th>
                                                        </tr>
                                                        <tr>
                                                            <td>{!! Form::textarea('disposal','放棄治療',['class' => 'form-control ','style'=>'resize:none']) !!}</td>
                                                        </tr>


                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">取消</button>
                                    {!! Form::submit('修改', ['class' => 'btn btn-default btn-sm btn-primary']) !!}
                                </div>
                            </div><!-- /.modal-content -->
                            {{--{!! Form::close() !!}--}}
                        </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->
                </td>
            </tr>

        </tbody>
    </table>



@endsection
