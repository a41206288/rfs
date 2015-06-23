@extends('manage_master')
@section('title')
    現場分析管理
@endsection
@section('content')
    <style>
        .input-group {
            margin-bottom: 10px;
        }
    </style>

    <h3>任務管理</h3>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>地點</th><th>嚴重程度</th><th>預估傷亡人數</th><th>現場狀況</th><th>評估時間</th><th>指派人員</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            @foreach ($mission_new_locations as $mission_new_location)

                @if (isset($mission_new_location) )
        <tr>
            <td>{!!$mission_new_location->location!!}</td>
            <td>{!!$mission_new_location->severe_level!!}</td>
            <td>{!!$mission_new_location->victim_number!!}</td>
            <td>{!!$mission_new_location->situation!!}</td>
            <td>{!!$mission_new_location->analysis_time!!}</td>
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
                                <h4 class="modal-title" id="myModalLabel"><b>分派人員</b></h4>
                            </div>
                            <div class="modal-body ">
                                <div class="row">
                                    <div class="col-md-5" id="busy">
                                        {{--<dl class="dl-horizontal">--}}
                                        {{--<dt>任務名稱</dt>--}}
                                        {{--<dd>{!! Form::text('mission_list_name','',['id' =>  'mission_list_name','class' => 'form-control', 'required']) !!}</dd> <br>--}}
                                        {{--<dt>負責人</dt>--}}
                                        {{--<dd> {!! Form::text('leader', '', ['id' =>  'leader', 'placeholder' =>  'Enter name','class' => 'form-control', 'required']) !!}<br>--}}
                                        {{--<dt>脫困組人數</dt>--}}
                                        {{--<dd> {!! Form::text('Reliever_num', '', ['id' =>  'Reliever_num', 'class' => 'form-control', 'required']) !!}</dd> <br>--}}
                                        {{--<dt>醫療組人數</dt>--}}
                                        {{--<dd>{!! Form::text('Emt_num', '', ['id' =>  'Emt_num','class' => 'form-control', 'required']) !!}</dd>--}}
                                        {{--</dl>--}}
                                        <b>執行任務人員</b>
                                        <div class="input-group">
                                            <span class="form-control" id="basic-addon2">任務中人員1</span>
                                            <span class="input-group-btn" >
                                                <button class="btn btn-default" type="button">-</button>
                                            </span>
                                        </div>
                                        <div class="input-group">
                                            <span class="form-control" id="basic-addon2">任務中人員2</span>
                                            <span class="input-group-btn" >
                                                <button class="btn btn-default" type="button">-</button>
                                            </span>
                                        </div>
                                        <div class="input-group">
                                            <span class="form-control" id="basic-addon2">任務中人員3</span>
                                            <span class="input-group-btn" >
                                                <button class="btn btn-default" type="button">-</button>
                                            </span>
                                        </div>
                                        <div class="input-group">
                                            <span class="form-control" id="basic-addon2">任務中人員4</span>
                                            <span class="input-group-btn" >
                                                <button class="btn btn-default" type="button">-</button>
                                            </span>
                                        </div>
                                        <div class="input-group">
                                            <span class="form-control" id="basic-addon2">任務中人員5</span>
                                            <span class="input-group-btn" >
                                                <button class="btn btn-default" type="button">-</button>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-offset-1 col-md-5" id="idle">
                                        {{--<dl class="dl-horizontal ">--}}
                                        {{--<dt>任務名稱</dt>--}}
                                        {{--<dd>{!! Form::text('mission_list_name','',['id' =>  'mission_list_name','class' => 'form-control', 'required']) !!}</dd> <br>--}}
                                        {{--<dt>負責人</dt>--}}
                                        {{--<dd> {!! Form::text('leader', '', ['id' =>  'leader', 'placeholder' =>  'Enter name','class' => 'form-control', 'required']) !!}<br>--}}
                                        {{--<dt>脫困組人數</dt>--}}
                                        {{--<dd> {!! Form::text('Reliever_num', '', ['id' =>  'Reliever_num', 'class' => 'form-control', 'required']) !!}</dd> <br>--}}
                                        {{--<dt>醫療組人數</dt>--}}
                                        {{--<dd>{!! Form::text('Emt_num', '', ['id' =>  'Emt_num','class' => 'form-control', 'required']) !!}</dd>--}}
                                        {{--</dl>--}}
                                        <b>未分配人員</b>
                                        <div class="input-group">
                                            <span class="input-group-btn">
                                                <button class="btn btn-default" type="button">+</button>
                                            </span>
                                            <span class="form-control">未分配人員1</span>
                                        </div>
                                        <div class="input-group">
                                            <span class="input-group-btn">
                                                <button class="btn btn-default" type="button">+</button>
                                            </span>
                                            <span class="form-control">未分配人員2</span>
                                        </div>
                                        <div class="input-group">
                                            <span class="input-group-btn" >
                                                <button class="btn btn-default" type="button">+</button>
                                            </span>
                                            <span class="form-control">未分配人員3</span>
                                        </div>
                                        <div class="input-group">
                                            <span class="input-group-btn" >
                                                <button class="btn btn-default" type="button">+</button>
                                            </span>
                                            <span class="form-control" id="basic-addon2">未分配人員4</span>
                                        </div>
                                        <div class="input-group">
                                            <span class="input-group-btn" >
                                                <button class="btn btn-default" type="button">+</button>
                                            </span>
                                            <span class="form-control" id="basic-addon2">未分配人員5</span>
                                        </div>
                                        <div class="input-group">
                                            <span class="input-group-btn" >
                                                <button class="btn btn-default" type="button">+</button>
                                            </span>
                                            <span class="form-control" id="basic-addon2">未分配人員6</span>
                                        </div>
                                    </div>
                                </div>




                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">取消</button>
                                {!! Form::submit('送出分配', ['class' => 'btn btn-default btn-sm btn-primary']) !!}
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
@endsection


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


    <script>
        $('#idle').on('click', 'button', function(e){
            add_person($(this).closest('div').find('span').eq(1).text(),false);
            $(this).closest('div').remove();


        });
        $('#busy').on('click', 'button', function(e){
            add_person($(this).closest('div').find('span').eq(0).text(),true);
            $(this).closest('div').remove();

        });

        function add_person(name,isBusyTable)
        {
            if(isBusyTable){
                var obj=document.getElementById("idle");

                var div = document.createElement("div");
                div.setAttribute("class", "input-group");

                var span = document.createElement("span");
                span.setAttribute("class", "input-group-btn");


                var span_btn = document.createElement("button");
                span_btn.setAttribute("class", "btn btn-default");
                span_btn.setAttribute("type", "button");
                span_btn.innerHTML="+";

                span.appendChild(span_btn);
                div.appendChild(span);

                var span = document.createElement("span");
                span.setAttribute("class", "form-control");
                span.innerHTML=name;

                div.appendChild(span);

                obj.appendChild(div);
            }
            else{
                var obj=document.getElementById("busy");
                var div = document.createElement("div");
                div.setAttribute("class", "input-group");


                var span = document.createElement("span");
                span.setAttribute("class", "form-control");
                span.innerHTML=name;

                div.appendChild(span);

                var span = document.createElement("span");
                span.setAttribute("class", "input-group-btn");

                var span_btn = document.createElement("button");
                span_btn.setAttribute("class", "btn btn-default");
                span_btn.setAttribute("type", "button");
                span_btn.innerHTML="-";

                span.appendChild(span_btn);
                div.appendChild(span);

                obj.appendChild(div);
            }

        }
    </script>
@endsection
