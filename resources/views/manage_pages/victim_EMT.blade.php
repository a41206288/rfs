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
                            {!! Form::open(array('url' => 'victim/EMT/create', 'method' => 'post','class' => 'form-horizontal','onSubmit' => 'return checkForm();')) !!}
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
                                                {{--<tr>--}}
                                                    {{--<th width="40%" class="text-right">姓氏</th><td  width="60%">{!! Form::text('lname','',['class' => 'form-control']) !!}</td>--}}
                                                {{--</tr>--}}
                                                <tr>
                                                    <th class="text-right">姓名</th><td>{!! Form::text('name','',['class' => 'form-control']) !!}</td>
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
                                                    <td width="38%">{!! Form::select('damage_level', array('請選擇' => '請選擇','0' => '正常','1' => '輕傷','2' => '中傷', '3' => '重傷','4' => '死亡'),'請選擇',['class' => 'form-control']) !!}</td>                                                   </td>
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
                            {!! Form::close() !!}
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
        @if(isset($victim_details))
            @foreach($victim_details as $victim_detail)
            <tr>
                <td>{!! $victim_detail->victim_detail_id !!}</td>
                <td>{!! $victim_detail->name !!}</td>
                <td>{!! $victim_detail->sex !!}</td>
                <td>{!! $victim_detail->age !!}</td>
                <td>{!! $victim_detail->phone !!}</td>
                {{--<td>住址</td>--}}
                {{--<td>身分證字號</td>--}}
                @if($victim_detail->damage_level == 0)
                    <td>正常</td>
                @elseif($victim_detail->damage_level == 1)
                    <td>輕傷</td>
                @elseif($victim_detail->damage_level == 2)
                    <td>中傷</td>
                @elseif($victim_detail->damage_level == 3)
                    <td>重傷</td>
                @elseif($victim_detail->damage_level == 4)
                    <td>死亡</td>
                @endif
                <td>{!! $victim_detail->now_location !!}</td>
                <td >{{ (new Carbon\Carbon($victim_detail->updated_at))->formatLocalized('%Y/%m/%d') }}</td>
                <td >{{ (new Carbon\Carbon($victim_detail->updated_at))->formatLocalized('%H:%M:%S') }}</td>
                <td>
                    <button class="btn btn-link btn-sm" data-toggle="modal" data-target="#update{!! $victim_detail->victim_detail_id  !!}">詳細/修改</button>

                    <!-- Modal -->
                    <div class="modal fade" id="update{!! $victim_detail->victim_detail_id  !!}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog" style="width: 80%">
                            <div class="modal-content">
                                {!! Form::open(array('url' => 'victim/EMT/edit', 'method' => 'post','class' => 'form-horizontal','onSubmit' => 'return checkForm();')) !!}
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title" id="myModalLabel"><b>修改災民資料</b></h4>
                                    {!! Form::hidden('victim_detail_id',$victim_detail->victim_detail_id) !!}
                                </div>
                                <div class="modal-body">
                                    <div class="modal-body">
                                        <table width="100%">
                                            <tr><th>個人資料</th><th colspan="2">災民狀態</th></tr>
                                            <tr>
                                                <td width="30%">
                                                    <table width="100%">
                                                        {{--<tr>--}}
                                                            {{--<th width="40%" class="text-right">姓名</th><td  width="60%">{!! Form::text('lname',$victim_detail->fname,['class' => 'form-control']) !!}</td>--}}
                                                        {{--</tr>--}}
                                                        <tr>
                                                            <th class="text-right">姓名</th><td>{!! Form::text('name',$victim_detail->name,['class' => 'form-control']) !!}</td>
                                                        </tr>
                                                        <tr>
                                                            <th class="text-right">性別</th>
                                                            <td>{!! Form::select('sex', array('男' => '男', '女' => '女','其他' => '其他','請選擇' => '請選擇') ,$victim_detail->sex,['class' => 'form-control']) !!}</td>
                                                        </tr>
                                                        <tr>
                                                            <th class="text-right">年齡</th><td> {!! Form::number('age', $victim_detail->age, ['id' =>  'age', 'class' => 'form-control', 'min'=>'0']) !!}</td>
                                                        </tr>
                                                        <tr>
                                                            <th class="text-right">身分證字號</th><td>{!! Form::text('person_id',$victim_detail->person_id,['class' => 'form-control']) !!}</td>
                                                        </tr>
                                                        <tr>
                                                            <th class="text-right">聯絡電話</th><td>{!! Form::text('phone',$victim_detail->phone,['class' => 'form-control']) !!}</td>
                                                        </tr>
                                                        <tr>
                                                            <th class="text-right">住址</th><td>{!! Form::text('address',$victim_detail->address,['class' => 'form-control']) !!}</td>
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
                                                            <td width="38%">{!! Form::select('damage_level', array('請選擇' => '請選擇','0' => '正常','1' => '輕傷','2' => '中傷', '3' => '重傷','4' => '死亡'),$victim_detail->damage_level,['class' => 'form-control']) !!}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>詳細診斷</th>
                                                        </tr>
                                                        <tr>
                                                            <td>{!! Form::textarea('damage_detail',$victim_detail->damage_detail,['class' => 'form-control ','style'=>'resize:none']) !!}</td>
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
                                                            <td>{!! Form::text('now_location',$victim_detail->now_location,['class' => 'form-control']) !!}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>處置方式</th>
                                                        </tr>
                                                        <tr>
                                                            <td>{!! Form::textarea('disposal',$victim_detail->disposal,['class' => 'form-control ','style'=>'resize:none']) !!}</td>
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
                            {!! Form::close() !!}
                        </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->
                </td>
            </tr>
            @endforeach
        @endif
        </tbody>
    </table>



@endsection
