@extends('manage_master')
@section('title')
    現場分析
@endsection
@section('content')
    <table class="table-nonbordered">
        @if (isset($mission_list_names) )

            <tr><th>任務編號 :</th><td> {!!Auth::user()->mission_list_id;!!} </td><th>任務名稱 :</th><td> {!!$mission_list_names[0]->mission_name;!!}</td></tr>

        @endif
    </table>
    <hr>
    <div class="col-xs-7 col-sm-6 col-md-5">

        <h5><b>通報地點</b></h5>

        <br><br>
        <table class="table table-bordered">
            <thead>
                <tr><th>分析狀態</th><th>編號</th><th>地址</th><th>內容</th></tr>
            </thead>

            <tbody>
            @foreach ($missions as $mission)

                @if (isset($mission) )
                <tr>
                    @if ( is_null($mission->complete_time) )
                        <td>分析未完成</td>
                    @else
                        <td>分析完成 <br>{!!$mission->complete_time!!}</td>

                    @endif
                    <td>{!!$mission->mission_id!!}</td><td>{!!$mission->location!!}</td><td>{!!$mission->mission_content!!}</td>
                </tr>
            @endif

            @endforeach


            </tbody>
        </table>
    </div>
    <div class="col-xs-9 col-sm-6 col-md-7" >
        <h5><b>創建的地點</b></h5>
        <p class="text-right"><button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#createLocalBlock">創建地點</button></p>
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
                            <dd> {!! Form::textarea('situation','',['class' => 'form-control','style'=>'resize:none', 'required']) !!}</dd><br>
                            <dt>包含的通報</dt>
                            <dd>
                                <table class="table table-bordered">
                                    <tr><td></td><td>通報編號</td><td>通報地址</td><td>通報內容</td></tr>
                                    @foreach ($missions as $mission)

                                        @if (isset($mission) )
                                            <tr>

                                                @if ( is_null($mission->complete_time) )
                                                    <td>{!!Form::checkbox('calls[]', $mission->mission_id)!!}</td>
                                                    <td>{!!$mission->mission_id!!}</td><td>{!!$mission->location!!}</td><td>{!!$mission->mission_content!!}</td>
                                                @endif

                                            </tr>
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
        <table class="table table-bordered">
            <thead>
                <tr><th>地點</th><th>嚴重程度</th><th>預估傷亡人數</th><th>現場狀況</th><th>評估時間</th><th>修改</th></tr>
            </thead>
            <tbody>
            @foreach ($mission_new_locations as $mission_new_location)

                @if (isset($mission_new_location)
                 && $mission_new_location->location != '醫療組'
                && $mission_new_location->location != '物資資源組')
                    <tr>

                        <td>{!!$mission_new_location->location!!}</td>
                        <td>{!!$mission_new_location->severe_level!!}</td>
                        <td>{!!$mission_new_location->victim_number!!}</td>
                        <td>{!!$mission_new_location->situation!!}</td>
                        <td>{!!$mission_new_location->analysis_time!!}</td>
                        <td><button class="btn btn-link btn-sm"data-toggle="modal" data-target="#updateLocalBlock{!!$mission_new_location->mission_new_locations_id!!}">修改</button></td>
                        <!-- Modal -->
                        {!! Form::open(array('url' => 'analysis/manage/updateLocation', 'method' => 'post','class' => 'form-horizontal')) !!}
                        <div class="modal fade" id="updateLocalBlock{!!$mission_new_location->mission_new_locations_id!!}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">

                                    {{--{!!dd($mission_new_location->mission_new_locations_id)!!}--}}
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h4 class="modal-title" id="myModalLabel" ><b>修改地點</b></h4>
                                    </div>

                                    <div class="modal-body">

                                        <dl class="dl-horizontal">
                                            <dt>編號</dt>
                                            <dd>
                                                {!!$mission_new_location->mission_new_locations_id!!}
                                                {!! Form::hidden('mission_new_locations_id',$mission_new_location->mission_new_locations_id,['id' =>  'mission_new_locations_id','class' => 'form-control']) !!}
                                            </dd> <br>
                                            <dt>地點名稱</dt>
                                            <dd> {!! Form::text('location_name',$mission_new_location->location,['id' =>  'location_name','class' => 'form-control', 'required']) !!}</dd> <br>
                                            <dt>嚴重程度</dt>
                                            <dd> {!! Form::select('severe_level', array('輕度' => '輕度', '中度' => '中度', '重度' => '重度'), $mission_new_location->severe_level, ['id' =>  'severe_level','class' => 'form-control', 'required']) !!}<br>
                                            <dt>預估傷亡人數</dt>
                                            <dd> {!! Form::number('victim_number', $mission_new_location->victim_number, ['id' =>  'victim_number', 'class' => 'form-control', 'required','min'=>'0']) !!}</dd> <br>
                                            <dt>現場狀況</dt>
                                            <dd> {!! Form::textarea('situation',$mission_new_location->situation,['class' => 'form-control','style'=>'resize:none', 'required']) !!}</dd>
                                            <dt>包含的通報</dt>
                                            <dd>
                                                {{--<table class="table table-bordered">--}}
                                                    {{--<tr><td></td><td>通報編號</td><td>通報地址</td><td>通報內容</td></tr>--}}
                                                    {{--@foreach ($missions as $mission)--}}

                                                        {{--@if (isset($mission) )--}}
                                                            {{--<tr>--}}

                                                                {{--@if ( is_null($mission->complete_time) )--}}
                                                                    {{--<td>{!!Form::checkbox('calls[]', $mission->mission_id)!!}</td>--}}
                                                                    {{--<td>{!!$mission->mission_id!!}</td><td>{!!$mission->location!!}</td><td>{!!$mission->mission_content!!}</td>--}}
                                                                {{--@endif--}}

                                                            {{--</tr>--}}
                                                        {{--@endif--}}

                                                    {{--@endforeach--}}
                                                {{--</table>--}}
                                            </dd>
                                        </dl>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">取消</button>
                                        {!! Form::submit('修改地點', ['class' => 'btn btn-default btn-sm btn-primary']) !!}
                                    </div>

                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div><!-- /.modal -->
                        {!! Form::close() !!}
                    </tr>
                @endif

            @endforeach

            </tbody>
        </table>

    </div>

@endsection
@section('javascript')
    <script type="text/javascript" src="/js/bootstrap.min.js"></script>

@endsection
