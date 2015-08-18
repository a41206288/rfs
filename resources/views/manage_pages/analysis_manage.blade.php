@extends('manage_master')
@section('title')
    現場分析
@endsection
@section('content')
    <table class="table-nonbordered">
        @if (isset($mission_list_names) )

            <tr><th>任務編號 :</th><td> {!!Auth::user()->mission_list_id!!} </td><th>任務名稱 :</th><td> {!!$mission_list_names[0]->mission_name!!}</td></tr>

        @endif
    </table>
    <hr>
    <div class="col-xs-4 col-sm-4 col-md-4">

        <table class="table table-striped">
            {!! Form::open(array('url' => 'analysis/manage/editLocation', 'method' => 'post','class' => 'form-horizontal')) !!}
            <thead>
                <tr><th colspan="2"><h5><b>尚未分析通報</b></h5></th><th class="text-right" colspan="2"> {!! Form::submit('將通報歸類至已分析現場', ['class' => 'btn btn-default btn-sm']) !!}</th></tr>
                <tr><th width="15%">編號</th><th width="30%">地址</th><th width="35%">內容</th><th width="20%"></th></tr>
            </thead>

            <tbody>
            @foreach ($missions as $mission)

                @if (isset($mission) )

                    @if ( $mission->mission_new_locations_id == 0 )
                        <tr>
                        <td>{!!$mission->mission_id!!}</td><td>{!!$mission->location!!}</td><td>{!!$mission->mission_content!!}</td><td>{!! Form::select($mission->mission_id,$mission_new_locations_names, '請選擇') !!}</td>
                        </tr>
                    @else

                    @endif

            @endif

            @endforeach

            <tr></tr>
            </tbody>
            {!! Form::close() !!}
        </table>
    </div>
    <div class="col-xs-12 col-sm-8 col-md-8" >


        <table class="table table-striped">
            <thead>
                <tr>
                    <th colspan="6"><h5><b>創建的地點</b></h5></th>
                    <td><button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#createLocalBlock">創建地點</button>
                        <!-- Modal -->
                        <div class="modal fade" id="createLocalBlock" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    {!! Form::open(array('url' => 'analysis/manage/createLocation', 'method' => 'post','class' => 'form-horizontal')) !!}
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h4 class="modal-title" id="myModalLabel" ><b>創建新地點</b></h4>
                                    </div>
                                    <div class="modal-body">
                                        <dl class="dl-horizontal">
                                            <dt>地點名稱</dt>
                                            <dd> {!! Form::text('location_name','',['id' =>  'location_name','class' => 'form-control', 'required']) !!}</dd> <br>
                                            <dt>嚴重程度</dt>
                                            <dd> {!! Form::select('severe_level', array('輕度' => '輕度', '中度' => '中度', '重度' => '重度'), '輕度', ['id' =>  'severe_level','class' => 'form-control', 'required']) !!}<br>
                                            <dt>預估傷亡人數</dt>
                                            <dd> {!! Form::number('victim_number', '', ['id' =>  'victim_number', 'class' => 'form-control', 'required','min'=>'0']) !!}</dd> <br>
                                            <dt>現場狀況</dt>
                                            <dd> {!! Form::textarea('situation','',['class' => 'form-control','style'=>'resize: vertical', 'required']) !!}</dd><br>
                                            <dt>包含的通報</dt>
                                            <dd>
                                                <table width="100%">
                                                    <thead>
                                                        <tr style="border:1pt solid  #ddd;"><th></th><th>編號</th><th>地點</th><th>內容</th></tr>
                                                    </thead>
                                                    @foreach ($missions as $mission)

                                                        @if (isset($mission) )
                                                            @if ( $mission->mission_new_locations_id == 0 )
                                                                <tr style="border:1pt solid  #ddd;">
                                                                    <td width="10%" class="text-center">{!!Form::checkbox('calls[]', $mission->mission_id)!!}</td>
                                                                    <td width="15%">{!!$mission->mission_id!!}</td>
                                                                    <td width="30%">{!!$mission->location!!}</td>
                                                                    <td width="45%">{!!$mission->mission_content!!}</td>

                                                                </tr>
                                                            @endif
                                                        @endif
                                                    @endforeach
                                                </table>
                                            </dd>
                                        </dl>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">取消</button>
                                        {!! Form::submit('創建地點', ['class' => 'btn btn-default btn-sm btn-primary']) !!}
                                    </div>
                                    {!! Form::close() !!}
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div><!-- /.modal -->
                    </td>

                </tr>

                <tr><th>地點</th><th>嚴重程度</th><th>預估受困人數</th><th>現場狀況</th><th>評估日期</th><th>評估時間</th><th>修改</th></tr>
            </thead>

            <tbody>
            @foreach ($mission_new_locations as $mission_new_location)

                @if (isset($mission_new_location)
                 && $mission_new_location->location != '醫療組'
                && $mission_new_location->location != '物資資源組')
                    <tr>

                        <td>{!!$mission_new_location->location!!}</td>
                        <td>{!!$mission_new_location->severe_level!!}</td>
                        <td>{!!$mission_new_location->victim_number!!} 人</td>
                        <td>{!!$mission_new_location->situation!!}</td>
                        {{--<td>{!!$mission_new_location->analysis_time!!}</td>--}}
                        <td >{{ (new Carbon\Carbon($mission_new_location->analysis_time))->formatLocalized('%Y/%m/%d') }}</td>
                        <td >{{ (new Carbon\Carbon($mission_new_location->analysis_time))->formatLocalized('%H:%M:%S') }}</td>
                        <td><button class="btn btn-link btn-sm"data-toggle="modal" data-target="#updateLocalBlock{!!$mission_new_location->mission_new_locations_id!!}">修改</button>
                            <!-- Modal -->
                            <div class="modal fade" id="updateLocalBlock{!!$mission_new_location->mission_new_locations_id!!}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">

                                        {!! Form::open(array('url' => 'analysis/manage/updateLocation', 'method' => 'post','class' => 'form-horizontal')) !!}
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel" ><b>修改地點</b></h4>
                                        </div>

                                        <div class="modal-body">

                                            <dl class="dl-horizontal">
                                                <dt>編號</dt>
                                                <dd>
                                                    {!!$mission_new_location->mission_new_locations_id!!}
                                                    {!! Form::hidden('mission_new_locations_id',$mission_new_location->mission_new_locations_id) !!}
                                                </dd> <br>
                                                <dt>地點名稱</dt>
                                                <dd> {!! Form::text('location_name',$mission_new_location->location,['id' =>  'location_name','class' => 'form-control', 'required']) !!}</dd> <br>
                                                <dt>嚴重程度</dt>
                                                <dd> {!! Form::select('severe_level', array('輕度' => '輕度', '中度' => '中度', '重度' => '重度'), $mission_new_location->severe_level, ['id' =>  'severe_level','class' => 'form-control', 'required']) !!}<br>
                                                <dt>預估傷亡人數</dt>
                                                <dd> {!! Form::number('victim_number', $mission_new_location->victim_number, ['id' =>  'victim_number', 'class' => 'form-control', 'required','min'=>'0']) !!}</dd> <br>
                                                <dt>現場狀況</dt>
                                                <dd> {!! Form::textarea('situation',$mission_new_location->situation,['class' => 'form-control','style'=>'resize: vertical', 'required']) !!}</dd><br>
                                                <dt>包含的通報</dt>
                                                <dd>
                                                    <table width="100%">
                                                        <thead>
                                                        <tr style="border:1pt solid  #ddd;"><th></th><th>編號</th><th>地點</th><th>內容</th></tr>
                                                        </thead>
                                                        @foreach ($missions as $mission)

                                                            @if (isset($mission) )
                                                                @if ( $mission->mission_new_locations_id == $mission_new_location->mission_new_locations_id )
                                                                    <tr style="border:1pt solid  #ddd;">
                                                                        <td width="10%" class="text-center">{!!Form::checkbox('calls[]', $mission->mission_id,['checked'])!!}</td>
                                                                        <td width="15%">{!!$mission->mission_id!!}</td>
                                                                        <td width="30%">{!!$mission->location!!}</td>
                                                                        <td width="45%">{!!$mission->mission_content!!}</td>

                                                                    </tr>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                    </table>
                                                </dd>
                                            </dl>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">取消</button>
                                            {!! Form::submit('修改地點', ['class' => 'btn btn-default btn-sm btn-primary']) !!}
                                        </div>
                                        {!! Form::close() !!}
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div><!-- /.modal -->
                            <button class="btn btn-link btn-sm"data-toggle="modal" data-target="#deleteLocalBlock{!!$mission_new_location->mission_new_locations_id!!}">刪除</button>
                            <!-- Modal -->
                            <div class="modal fade" id="deleteLocalBlock{!!$mission_new_location->mission_new_locations_id!!}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">

                                        {!! Form::open(array('url' => 'analysis/manage/deleteLocation', 'method' => 'post','class' => 'form-horizontal')) !!}
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel" ><b>刪除地點</b></h4>
                                        </div>
                                        {!! Form::hidden('mission_new_locations_id',$mission_new_location->mission_new_locations_id) !!}
                                        <div class="modal-body text-center">
                                            <b>刪除後就無法復原資料了，是否確定刪除此地點 ?</b>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">取消</button>
                                            {!! Form::submit('刪除地點', ['class' => 'btn btn-default btn-sm btn-primary']) !!}
                                        </div>
                                        {!! Form::close() !!}
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div><!-- /.modal -->
                        </td>


                    </tr>
                @endif

            @endforeach

            </tbody>
        </table>

    </div>

@endsection
