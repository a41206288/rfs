@extends('manage_master')
@section('title')
    通報管理
@endsection
@section('link')
    <li>{!! Html::link('call/manage', '通報管理') !!}</li>
    <li>{!! Html::link('mission/manage', '任務管理') !!}</li>
@endsection
@section('content_c9')

    <div class="table-responsive">


        <table class="table table-striped">
            <thead>
                 <tr >
                    <td colspan="7"><h4>通報管理</h4></td>
                    <td >
                        <button class="btn btn-default btn-sm" data-toggle="modal" data-target="#createMissionBlock">
                            創建新任務
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
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">取消</button>
                                {!! Form::submit('創建任務', ['class' => 'btn btn-default btn-sm btn-primary']) !!}
                            </div>
                            {!! Form::close() !!}
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->




                <tr>
                    <th width="10%">編號</th>
                    <th width="15%">通報內容</th>
                    <th width="25%">通報地址<br>
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
                        {!! Form::submit('將通報分配至現有的任務', ['class' => 'btn btn-default btn-sm']) !!}
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
    <h5><b>現有救災任務</b></h5>
    <hr>
    <table class="table">
        <thead>
            <tr>
                <th>編號</th>
                <th>任務名稱</th>
                <th>通報數</th>
                <th>脫困組</th>
                <th>醫療組</th>
            </tr>
        </thead>

    </table>
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
