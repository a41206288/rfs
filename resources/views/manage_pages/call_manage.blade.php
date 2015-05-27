@extends('manage_master')
@section('title')
    通報管理
@endsection
@section('content_c9')

    <div class="table-responsive">


        <table class="table table-striped">
            <thead>
                <tr class="text-right">

                    <td colspan="8">
                        <button class="btn btn-default btn-sm" data-toggle="modal" data-target="#createMissionBlock">
                            創建任務
                        </button>

                    </td>
                </tr>
                <!-- Modal -->
                <div class="modal fade" id="createMissionBlock" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            {!! Form::open(array('url' => 'call/manage/createMission', 'method' => 'post','class' => 'form-horizontal')) !!}
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title" id="myModalLabel"><b>創建新任務</b></h4>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">任務名稱</label>
                                    <div class="col-sm-10">
                                        {!! Form::text('mission_list_name','',['id' =>  'mission_list_name','class' => 'form-control', 'required']) !!}
                                    </div>
                                </div>
                                <br>
                                <br>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">負責人</label>
                                    <div class="col-sm-10">
                                        {!! Form::text('leader', '', ['id' =>  'leader', 'placeholder' =>  'Enter name','class' => 'form-control']) !!}
                                    </div>
                                </div>
                                <br>
                                <br>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">取消</button>
                                {!! Form::submit('創建任務', ['class' => 'btn btn-default btn-sm']) !!}
                            </div>
                            {!! Form::close() !!}
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->




                <tr>
                    <th width="10%">編號</th>
                    <th width="20%">通報內容</th>
                    <th width="20%">通報地址<br>
                        {{--@foreach ($country_or_cities as $country_or_city)--}}

                    {{--<td>{!! $country_or_city!!}</td>--}}


                    {{--@endforeach--}}
                        @if (isset($country_or_city_inputs) && isset($township_or_district_inputs))

                            {{--@foreach ($missions as $mission)--}}
                                {{--{!! Form::select($mission->country_or_city_input,$mission->country_or_city_input) !!}--}}
                            {!! Form::open(array('url' => 'call/manage', 'method' => 'post')) !!}
                            {!! Form::select('country',$country_or_city_inputs,'請選擇',['onchange' => 'this.form.submit()'] )!!}
                            {!! Form::select('township',$township_or_district_inputs,'請選擇',['onchange' => 'this.form.submit()'])!!}
                            {!! Form::close() !!}

                            {{--{!! Form::select('country',$country_or_city_inputs,'請選擇')!!}--}}
                            {{--{!! Form::select('township',$township_or_district_inputs,'請選擇')!!}--}}

                        @endif
                    </th>
                    {{--@endforeach--}}
                    <th width="10%">通報時間</th>
                    <th width="10%">通報人</th>
                    <th width="10%">通報人電話</th>
                    <th width="10%">通報人信箱 </th>
                    <th width="10%" class="text-right">
                        {!! Form::open(array('url' => 'call/manage/save', 'method' => 'post')) !!}
                        {!! Form::submit('分配通報', ['class' => 'btn btn-default btn-sm']) !!}
                    </th>
                </tr>

            </thead>
            <tbody>
            @if (isset($missions))

                    @foreach ($missions as $mission )
                        <tr>
                            @if (isset($mission) )
                                <td width="10%">{!! $mission->mission_id!!}</td>
                                <td width="20%">{!! $mission->mission_content!!}</td>
                                <td width="20%">{!! $mission->country_or_city_input." ".$mission->township_or_district_input." ".$mission->location!!}</td>
                                <td width="10%">{!! $mission->created_at!!}</td>
                                <td width="10%">{!! $mission->lname.$mission->fname!!}</td>
                                <td width="10%">{!! $mission->phone!!}</td>
                                <td width="10%">{!! $mission->email!!}</td>
                                <td width="10%">{!! Form::select($mission->mission_id,$mission_names, '請選擇') !!}</td>
                            @endif
                            {{--@if (isset($mission_names) && !isset($mission->mission_list_id) )--}}
                                {{----}}
                            {{--@endif--}}

                        </tr>
                        <tr>

                    @endforeach

            @endif


            </tbody>
        </table>
        {!! Form::close() !!}
    </div>

@endsection

@section('content_c3')
@endsection

@section('javascript')
    <link href="/css/jquery-ui.css" rel="stylesheet">
    <script type="text/javascript" src="/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/js/jquery-ui.min.js"></script>

    <script language="JavaScript">

        var readData   = <?php echo json_encode($users_data); ?>;
        for(var i = 0; i<readData.length; i++)
        {
            readData[i] = readData[i].join(" - "); //陣列所有項目合成字串 ,每項間用" - "隔開
        }

        $(document).ready(function(){
            $("#leader").autocomplete({source: readData, appendTo:"#createMissionBlock"});
        });
    </script>

@endsection
