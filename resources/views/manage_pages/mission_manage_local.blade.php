@extends('manage_master')
@section('title')
    任務管理
@endsection
@section('content')
    <h3>任務管理</h3>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>地點</th><th>嚴重程度</th><th>預估傷亡人數</th><th>現場狀況</th><th>評估時間</th><th>指派人員</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>資電館</td><td>輕度</td><td>20</td><td>暫時將此區域水管管線供水, 街道積水尚未清理</td><td>2015-06-05 08:29:14</td>
                <td>
                    <button class="btn btn-default btn-sm" data-toggle="modal" data-target="#createTeam">
                        分派人員
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="createTeam" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog"  style="width:  800px">
                            <div class="modal-content">
                                {!! Form::open(array('url' => 'call/manage/createMission', 'method' => 'post','class' => 'form-horizontal')) !!}
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title" id="myModalLabel"><b>創建新任務</b></h4>
                                </div>
                                <div class="modal-body ">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <dl class="dl-horizontal">
                                                <dt>任務名稱</dt>
                                                <dd>{!! Form::text('mission_list_name','',['id' =>  'mission_list_name','class' => 'form-control', 'required']) !!}</dd> <br>
                                                <dt>負責人</dt>
                                                <dd> {!! Form::text('leader', '', ['id' =>  'leader', 'placeholder' =>  'Enter name','class' => 'form-control', 'required']) !!}<br>
                                                <dt>脫困組人數</dt>
                                                <dd> {!! Form::text('Reliever_num', '', ['id' =>  'Reliever_num', 'class' => 'form-control', 'required']) !!}</dd> <br>
                                                <dt>醫療組人數</dt>
                                                <dd>{!! Form::text('Emt_num', '', ['id' =>  'Emt_num','class' => 'form-control', 'required']) !!}</dd>
                                            </dl>
                                        </div>
                                        <div class="col-md-6">
                                            <dl class="dl-horizontal ">
                                                <dt>任務名稱</dt>
                                                <dd>{!! Form::text('mission_list_name','',['id' =>  'mission_list_name','class' => 'form-control', 'required']) !!}</dd> <br>
                                                <dt>負責人</dt>
                                                <dd> {!! Form::text('leader', '', ['id' =>  'leader', 'placeholder' =>  'Enter name','class' => 'form-control', 'required']) !!}<br>
                                                <dt>脫困組人數</dt>
                                                <dd> {!! Form::text('Reliever_num', '', ['id' =>  'Reliever_num', 'class' => 'form-control', 'required']) !!}</dd> <br>
                                                <dt>醫療組人數</dt>
                                                <dd>{!! Form::text('Emt_num', '', ['id' =>  'Emt_num','class' => 'form-control', 'required']) !!}</dd>
                                            </dl>
                                        </div>
                                    </div>




                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">取消</button>
                                    {!! Form::submit('創建任務', ['class' => 'btn btn-default btn-sm btn-primary']) !!}
                                </div>
                                {!! Form::close() !!}
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->
                </td>
            </tr>
        </tbody>
    </table>
@endsection
{{--@section('content_c7')--}}


    {{--<div class="table-responsive">--}}


        {{--<table class="table table-hover  table-nonbordered">--}}
            {{--<thead>--}}
            {{--<tr>--}}
                {{--<th width="10%">編號</th>--}}
                {{--<th width="15%">通報內容</th>--}}
                {{--<th width="25%">通報地址<br>--}}
                    {{--@foreach ($country_or_cities as $country_or_city)--}}

                    {{--<td>{!! $country_or_city!!}</td>--}}


                    {{--@endforeach--}}
                    {{--@if (isset($country_or_city_inputs) && isset($township_or_district_inputs))--}}

                        {{--@foreach ($missions as $mission)--}}
                        {{--{!! Form::select($mission->country_or_city_input,$mission->country_or_city_input) !!}--}}
                        {{--{!! Form::open(array('url' => 'mission/manage/local', 'method' => 'post')) !!}--}}
                        {{--{!! Form::select('country',$country_or_city_inputs,'請選擇',['onchange' => 'this.form.submit()'] )!!}--}}
                        {{--{!! Form::select('township',$township_or_district_inputs,'請選擇',['onchange' => 'this.form.submit()'])!!}--}}
                        {{--{!! Form::close() !!}--}}

                        {{--{!! Form::select('country',$country_or_city_inputs,'請選擇')!!}--}}
                        {{--{!! Form::select('township',$township_or_district_inputs,'請選擇')!!}--}}

                    {{--@endif--}}
                {{--</th>--}}
                {{--@endforeach--}}
                {{--<th width="10%">脫困組<br>人數</th>--}}
                {{--<th width="40%">最新回報</th>--}}



            {{--</tr>--}}

            {{--</thead>--}}
            {{--<tbody>--}}
            {{--{!! Form::open(array('url' => 'call/manage/save', 'method' => 'post')) !!}--}}
            {{--@if (isset($missions))--}}

                {{--@foreach ($missions as $mission )--}}
                    {{--@if ( Auth::user()->mission_list_id != 1)--}}

                    {{--<tr class="active">--}}

                            {{--<td rowspan="2" width="10%">{!! $mission->mission_id!!}</td>--}}
                            {{--<td width="15%">{!! $mission->mission_content!!}</td>--}}
                            {{--<td width="25%">{!! $mission->country_or_city_input." ".$mission->township_or_district_input." ".$mission->location!!}</td>--}}
                            {{--<td width="10%">{!!$relieverMissionUsersArray[$mission->mission_id]!!} 人</td>--}}
                            {{--<td rowspan="2" width="40%">--}}
                                {{--<div style="height:120px;width:100%;overflow:auto;">--}}
                                    {{--<ul class="list-group">--}}
                                        {{--@foreach ($local_reports_array as $local_report_array )--}}
                                            {{--@if (isset($local_reports_array) )--}}
                                                {{--@foreach ($local_reports_array[$mission->mission_id] as $local_report_array_id )--}}
                                        {{--<li class="list-group-item"><b>{!!$local_report_array_id['time']!!}</b><br>{!! $local_report_array_id['content']!!}</li>--}}
                                                {{--@endforeach--}}
                                            {{--@endif--}}
                                        {{--@endforeach--}}
                                    {{--</ul>--}}


                                {{--</div>--}}
                            {{--</td>--}}

                    {{--</tr>--}}
                    {{--<tr  class="active" style="height:10px;">--}}
                        {{--<td colspan="3">--}}

                                {{--<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 50%;">--}}
                                    {{--進度條--}}
                                {{--</div>--}}
                        {{--</td>--}}

                    {{--</tr>--}}
                    {{--@endif--}}
                    {{--<tr><td colspan="5"></td></tr>--}}
                {{--@endforeach--}}

            {{--@endif--}}
            {{--{!! Form::close() !!}--}}
            {{--</tbody>--}}
            {{--<tfoot>--}}
            {{--<tr>--}}
                {{--<th width="10%">編號</th>--}}
                {{--<th width="15%">通報內容</th>--}}
                {{--<th width="25%">通報地址<br>--}}
                    {{--@foreach ($country_or_cities as $country_or_city)--}}

                    {{--<td>{!! $country_or_city!!}</td>--}}


                    {{--@endforeach--}}
                    {{--@if (isset($country_or_city_inputs) && isset($township_or_district_inputs))--}}

                        {{--@foreach ($missions as $mission)--}}
                        {{--{!! Form::select($mission->country_or_city_input,$mission->country_or_city_input) !!}--}}
                        {{--{!! Form::open(array('url' => 'mission/manage/local', 'method' => 'post')) !!}--}}
                        {{--{!! Form::select('country',$country_or_city_inputs,'請選擇',['onchange' => 'this.form.submit()'] )!!}--}}
                        {{--{!! Form::select('township',$township_or_district_inputs,'請選擇',['onchange' => 'this.form.submit()'])!!}--}}
                        {{--{!! Form::close() !!}--}}

                        {{--{!! Form::select('country',$country_or_city_inputs,'請選擇')!!}--}}
                        {{--{!! Form::select('township',$township_or_district_inputs,'請選擇')!!}--}}

                    {{--@endif--}}
                {{--</th>--}}
                {{--@endforeach--}}
                {{--<th width="10%">脫困組<br>人數</th>--}}
                {{--<th width="40%">最新回報</th>--}}



            {{--</tr>--}}

            {{--</tfoot>--}}
        {{--</table>--}}

    {{--</div>--}}

{{--@endsection--}}

{{--@section('content_c5')--}}

        {{--<div>--}}

            {{--<br>--}}
            {{--<ul class="nav nav-tabs">--}}
                {{--<li><a href="#news" data-toggle="tab"><b>各項通知 </b><span class="badge" >14</span></a></li>--}}
                {{--<li><a href="#supplies" data-toggle="tab"><b>調動人員</b></a></li>--}}
                {{--<li><a href="#product" data-toggle="tab"><b>物資狀況</b></a></li>--}}
                {{--<li><a href="#victim" data-toggle="tab"><b>災民狀況</b></a></li>--}}

            {{--</ul>--}}
            {{--<br>--}}
            {{--<div class="tab-content">--}}
                {{--<div class="tab-pane active" id="news">--}}
                    {{--<blockquote class="blockquote-danger">--}}
                        {{--<p><b>中央指揮官指派給您新的任務</b></p>--}}
                        {{--<h6>通報編號 : 1   通報時間:  2015-05-17 10:50:21</h6>--}}
                        {{--<h6>通報內容:</h6>--}}
                        {{--<h6>通報地址:</h6>--}}
                        {{--<h6>通報人:                 通報人電話:</h6>--}}
                        {{--<h6>通報人信箱:</h6>--}}
                        {{--<footer>2015-05-17 10:50:21</footer>--}}
                    {{--</blockquote>--}}
                    {{--<blockquote class="blockquote-success">--}}
                        {{--<p><b>中央指揮官同意您派出人員支援至其他受災區域</b></p>--}}
                        {{--<h6>任務編號 : 1   </h6>--}}
                        {{--<h6>要求增援人數:</h6>--}}
                        {{--<h6>要求增援地址:</h6>--}}
                        {{--<h6>負責人:                 負責人電話:</h6>--}}
                        {{--<h5  class="text-center">請盡速將增援人員派往該處</h5>--}}
                        {{--<footer>2015-05-17 10:50:21</footer>--}}
                    {{--</blockquote>--}}
                    {{--<blockquote class="blockquote-success">--}}
                        {{--<p><b>中央指揮官同意您派出物資支援至其他受災區域</b></p>--}}
                        {{--<h6>任務編號 : 1   </h6>--}}
                        {{--<h6>要求增援物資:</h6>--}}
                        {{--<table width="100%" >--}}
                            {{--<thead>--}}
                            {{--<tr>--}}
                                {{--<th>物資名稱</th>--}}
                                {{--<th>數量</th>--}}
                                {{--<th>單位</th>--}}
                            {{--</tr></th>--}}
                            {{--</thead>--}}
                            {{--<tbody>--}}
                            {{--<tr>--}}
                                {{--<td></td>--}}
                                {{--<td></td>--}}
                                {{--<td></td>--}}
                            {{--</tr>--}}
                            {{--<tr>--}}
                                {{--<td></td>--}}
                                {{--<td></td>--}}
                                {{--<td></td>--}}
                            {{--</tr>--}}
                            {{--</tbody>--}}
                        {{--</table>--}}
                        {{--<h6>要求增援地址:</h6>--}}
                        {{--<h6>負責人:                 負責人電話:</h6>--}}
                        {{--<h5 class="text-center">請盡速將增援物資送往該處</h5>--}}
                        {{--<footer>2015-05-17 10:50:21</footer>--}}
                    {{--</blockquote>--}}
                    {{--<blockquote class="blockquote-warning">--}}
                        {{--<p><b>其他地方指揮官發出了人員增援需求</b></p>--}}
                        {{--<h6>任務編號 : 1   </h6>--}}
                        {{--<h6>要求增援人數:</h6>--}}
                        {{--<h6>要求增援地址:</h6>--}}
                        {{--<h6>負責人:                 負責人電話:</h6>--}}
                        {{--<button class="btn btn-default btn-sm" data-toggle="modal" data-target="#">--}}
                            {{--派出支援--}}
                        {{--</button>--}}
                        {{--<footer>2015-05-17 10:50:21</footer>--}}
                    {{--</blockquote>--}}
                    {{--<blockquote class="blockquote-warning">--}}
                        {{--<p><b>其他地方指揮官發出了物資增援需求</b></p>--}}
                        {{--<h6>任務編號 : 1   </h6>--}}
                        {{--<h6>要求增援物資:</h6>--}}
                        {{--<table width="100%" >--}}
                            {{--<thead>--}}
                                {{--<tr>--}}
                                    {{--<th>物資名稱</th>--}}
                                    {{--<th>數量</th>--}}
                                    {{--<th>單位</th>--}}
                                {{--</tr></th>--}}
                            {{--</thead>--}}
                            {{--<tbody>--}}
                                {{--<tr>--}}
                                    {{--<td></td>--}}
                                    {{--<td></td>--}}
                                    {{--<td></td>--}}
                                {{--</tr>--}}
                                {{--<tr>--}}
                                    {{--<td></td>--}}
                                    {{--<td></td>--}}
                                    {{--<td></td>--}}
                                {{--</tr>--}}
                            {{--</tbody>--}}
                        {{--</table>--}}
                        {{--<h6>要求增援地址:</h6>--}}
                        {{--<h6>負責人:                 負責人電話:</h6>--}}
                        {{--<button class="btn btn-default btn-sm" data-toggle="modal" data-target="#">--}}
                            {{--送出物資--}}
                        {{--</button>--}}
                        {{--<footer>2015-05-17 10:50:21</footer>--}}
                    {{--</blockquote>--}}
                    {{--<blockquote class="blockquote-warning">--}}
                        {{--<p><b>救災執行人員發出了人員增援需求</b></p>--}}
                        {{--<h6>通報編號 : 1   </h6>--}}
                        {{--<h6>要求增援人數:</h6>--}}
                        {{--<h6>要求增援地址:</h6>--}}
                        {{--<h6>負責人:                 負責人電話:</h6>--}}
                        {{--<button class="btn btn-default btn-sm" data-toggle="tab" data-target="#supplies">--}}
                            {{--調派人手--}}
                        {{--</button>--}}
                        {{--<footer>2015-05-17 10:50:21</footer>--}}
                    {{--</blockquote>--}}
                {{--</div>--}}
                {{--<div class="tab-pane" id="supplies">--}}
                    {{--{!! Form::open(array('url' => '', 'method' => 'post')) !!}--}}
                    {{--{!! Form::submit('儲存人員分配', ['class' => 'btn btn-default btn-sm ']) !!}--}}
                    {{--<hr>--}}
                    {{--<table class="table table-nonbordered">--}}
                        {{--<tr>--}}
                            {{--<td width="15%"><b>通報編號 </b></td>--}}
                            {{--<td width="20%">--}}
                                {{--<select>--}}
                                    {{--這裡要填入任務裡所有通報編號--}}
                                    {{--<option>1</option>--}}
                                    {{--<option>2</option>--}}
                                {{--</select>--}}
                            {{--</td>--}}
                            {{--<td width="15%"><b>通報內容 </b></td>--}}
                            {{--<td width="50%">這裡放內容</td>--}}
                        {{--</tr>--}}
                        {{--<tr>--}}
                            {{--<td  width="15%"><b>人員數量 </b></td><td width="20%">放數量</td>--}}
                            {{--<td  width="15%"><b>通報地址 </b></td><td width="50%">這裡放通報地址</td>--}}
                        {{--</tr>--}}
                    {{--</table>--}}
                    {{--<div style="height:200px;width:100%;overflow:auto;">--}}
                        {{--<table id="mission_box" class="table-bordered table" ondrop="Drop(event)" ondragover="AllowDrop(event)" width="100%">--}}
                            {{--<thead>--}}
                                {{--<tr  id="call_1" draggable="false" ondragstart="Drag(event)">--}}
                                    {{--<th>人員姓名</th>--}}
                                    {{--<th>連絡電話</th>--}}
                                    {{--<th>Email</th>--}}
                                {{--</tr>--}}
                            {{--</thead>--}}
                            {{--<tbody>--}}

                            {{--<tr  id="call_2" draggable="true" ondragstart="Drag(event)">--}}
                                {{--<td>小明</td>--}}
                                {{--<td>00981234567</td>--}}
                                {{--<td>1234 yahoo.com.tw</td>--}}
                            {{--</tr>--}}
                            {{--<tr  id="call_7" draggable="true" ondragstart="Drag(event)">--}}
                                {{--<td>小明</td>--}}
                                {{--<td>00981234567</td>--}}
                                {{--<td>1234 yahoo.com.tw</td>--}}
                            {{--</tr>--}}
                            {{--<tr  id="call_7" draggable="true" ondragstart="Drag(event)">--}}
                                {{--<td>小明</td>--}}
                                {{--<td>00981234567</td>--}}
                                {{--<td>1234 yahoo.com.tw</td>--}}
                            {{--</tr>--}}
                            {{--<tr  id="call_9" draggable="true" ondragstart="Drag(event)">--}}
                                {{--<td>小明</td>--}}
                                {{--<td>00981234567</td>--}}
                                {{--<td>1234 yahoo.com.tw</td>--}}
                            {{--</tr>--}}
                            {{--<tr  id="call_10" draggable="true" ondragstart="Drag(event)">--}}
                                {{--<td>小明</td>--}}
                                {{--<td>00981234567</td>--}}
                                {{--<td>1234 yahoo.com.tw</td>--}}
                            {{--</tr>--}}
                            {{--<tr  id="call_11" draggable="true" ondragstart="Drag(event)">--}}
                                {{--<td>小明</td>--}}
                                {{--<td>00981234567</td>--}}
                                {{--<td>1234 yahoo.com.tw</td>--}}
                            {{--</tr>--}}
                            {{--</tbody>--}}
                        {{--</table>--}}
                    {{--</div>--}}
                    {{--<hr>--}}
                    {{--<table class="table table-nonbordered">--}}
                        {{--<tr>--}}
                            {{--<td width="15%"><b>通報編號 </b></td>--}}
                            {{--<td width="20%">--}}
                                {{--<select>--}}
                                    {{--這裡要填入任務裡所有通報編號--}}
                                    {{--<option>1</option>--}}
                                    {{--<option>2</option>--}}
                                {{--</select>--}}
                            {{--</td>--}}
                            {{--<td width="15%"><b>通報內容 </b></td>--}}
                            {{--<td width="50%">這裡放內容</td>--}}
                        {{--</tr>--}}
                        {{--<tr>--}}
                            {{--<td  width="15%"><b>人員數量 </b></td><td width="20%">放數量</td>--}}
                            {{--<td  width="15%"><b>通報地址 </b></td><td width="50%">這裡放通報地址</td>--}}
                        {{--</tr>--}}
                    {{--</table>--}}
                    {{--<div style="height:200px;width:100%;overflow:auto;">--}}
                        {{--<table id="mission_box" class="table-bordered table" ondrop="Drop(event)" ondragover="AllowDrop(event)" width="100%">--}}
                            {{--<thead>--}}
                            {{--<tr  id="call_1" draggable="false" ondragstart="Drag(event)">--}}
                                {{--<th>人員姓名</th>--}}
                                {{--<th>連絡電話</th>--}}
                                {{--<th>Email</th>--}}
                            {{--</tr>--}}
                            {{--</thead>--}}
                            {{--<tbody>--}}

                            {{--<tr  id="call_2" draggable="true" ondragstart="Drag(event)">--}}
                                {{--<td>小明</td>--}}
                                {{--<td>00981234567</td>--}}
                                {{--<td>1234 yahoo.com.tw</td>--}}
                            {{--</tr>--}}
                            {{--<tr  id="call_7" draggable="true" ondragstart="Drag(event)">--}}
                                {{--<td>小明</td>--}}
                                {{--<td>00981234567</td>--}}
                                {{--<td>1234 yahoo.com.tw</td>--}}
                            {{--</tr>--}}
                            {{--<tr  id="call_7" draggable="true" ondragstart="Drag(event)">--}}
                                {{--<td>小明</td>--}}
                                {{--<td>00981234567</td>--}}
                                {{--<td>1234 yahoo.com.tw</td>--}}
                            {{--</tr>--}}
                            {{--<tr  id="call_9" draggable="true" ondragstart="Drag(event)">--}}
                                {{--<td>小明</td>--}}
                                {{--<td>00981234567</td>--}}
                                {{--<td>1234 yahoo.com.tw</td>--}}
                            {{--</tr>--}}
                            {{--<tr  id="call_10" draggable="true" ondragstart="Drag(event)">--}}
                                {{--<td>小明</td>--}}
                                {{--<td>00981234567</td>--}}
                                {{--<td>1234 yahoo.com.tw</td>--}}
                            {{--</tr>--}}
                            {{--<tr  id="call_11" draggable="true" ondragstart="Drag(event)">--}}
                                {{--<td>小明</td>--}}
                                {{--<td>00981234567</td>--}}
                                {{--<td>1234 yahoo.com.tw</td>--}}
                            {{--</tr>--}}
                            {{--</tbody>--}}
                        {{--</table>--}}
                    {{--</div>--}}
                    {{--{!! Form::close() !!}--}}
                {{--</div>--}}
                {{--<div class="tab-pane" id="product">--}}
                    {{--<div style="height:500px;width:100%;overflow:auto;">--}}
                    {{--<table class="table-bordered table">--}}
                        {{--<thead>--}}
                        {{--<tr>--}}
                            {{--<th  width="5%" class="action-checkbox-column">--}}
                                {{--<input type="checkbox" id="action-toggle" />--}}
                            {{--</th>--}}
                            {{--<th  width="10%">編號</th>--}}
                            {{--<th  width="15%">物資名稱</th>--}}
                            {{--<th  width="10%">單位</th>--}}
                            {{--<th  width="10%">數量</th>--}}
                            {{--<th  width="20%">安全存量</th>--}}
                            {{--<th  width="30%">警告標語</th>--}}
                        {{--</tr>--}}
                        {{--</thead>--}}
                        {{--<tbody>--}}
                                                        {{--<!--印出物資資料--}}
                                                            {{--<td class="action-checkbox-column">--}}
                                                            {{--<input type="checkbox" id="action-toggle" />--}}
                                                            {{--</td>--}}
                                                            {{--<td>物資編號</td>--}}
                                                            {{--<td>物資名稱</td>--}}
                                                            {{--<td>單位</td>--}}
                                                            {{--<td>數量</td>--}}
                                                            {{--<td>安全存量</td>--}}
                                                            {{--<td>警告標語</td>--}}

                                                            {{--<td><a href='update.php?id=".$row_result["cID"]."'>存放位置編號</a></td>-->--}}
                        {{--</tbody>--}}
                    {{--</table>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="tab-pane" id="victim">--}}
                    {{--<b>災民資料統計</b>--}}
                    {{--<table class="table table-bordered">--}}
                        {{--<tr>--}}
                            {{--<td width="20%"><b>災民總數 </b></td><td>放數量</td>--}}
                            {{--<td  colspan="6"></td>--}}
                        {{--</tr>--}}
                        {{--<tr>--}}
                            {{--<td><b>正常 </b></td><td>放數量</td>--}}
                            {{--<td><b>輕傷 </b></td><td>放數量</td>--}}

                        {{--</tr>--}}
                        {{--<tr>--}}
                            {{--<td><b>重傷 </b></td><td>放數量</td>--}}
                            {{--<td><b>死亡 </b></td><td>放數量</td>--}}
                        {{--</tr>--}}
                    {{--</table>--}}
                    {{--<div style="height:500px;width:100%;overflow:auto;">--}}
                    {{--<table class="table-bordered table">--}}
                        {{--<thead>--}}
                        {{--<tr>--}}
                            {{--<th  width="15%">收容編號</th>--}}
                            {{--<th  width="20%">姓名</th>--}}
                            {{--<th  width="25%">災民狀態</th>--}}
                            {{--<th  width="40%">安置位置</th>--}}
                        {{--</tr>--}}
                        {{--</thead>--}}
                        {{--<tbody>--}}

                        {{--</tbody>--}}
                    {{--</table>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}

        {{--</div>--}}

{{--@endsection--}}

@section('javascript')
    <script type="text/javascript" src="/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        function AllowDrop(event){
            event.preventDefault();
        }
        function Drag(event){
            event.dataTransfer.setData("text",event.currentTarget.id);
        }
        function Drop(event){
            event.preventDefault();
            var data=event.dataTransfer.getData("text");
            event.currentTarget.appendChild(document.getElementById(data));
        }
        var element_count = 0;

    </script>
@endsection
