@extends('manage_master')
@section('title')
    現場分析管理
@endsection
@section('link')
    <li>{!! Html::link('analysis/manage/local', '現場分析地點管理') !!}</li>
    <li>{!! Html::link('mission/manage/local', '任務管理') !!}</li>
@endsection
@section('css')
    <style>
        .input-group {
            margin-bottom: 10px;
        }
    </style>
@endsection
@section('content')

    <h4><b>現場分析管理</b></h4>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>地點</th><th>嚴重程度</th><th>預估受困人數</th><th>現場狀況</th><th>評估時間</th><th>指派人員</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            @if (is_array($mission_new_locations) )
            @foreach ($mission_new_locations as $mission_new_location)

                @if (isset($mission_new_location)
                && $mission_new_location->location != '醫療組'
                && $mission_new_location->location != '物資資源組'
                && $relieverNewLocationUserAmountsArrays[$mission_new_location->mission_new_locations_id]['total'] == 0)
        <tr>
            <td>{!!$mission_new_location->location!!}</td>
            <td>{!!$mission_new_location->severe_level!!}</td>
            <td>{!!$mission_new_location->victim_number!!} 人</td>
            <td>{!!$mission_new_location->situation!!}</td>
            <td>{!!$mission_new_location->analysis_time!!}</td>
            <td>
                <button class="btn btn-default btn-sm" data-toggle="modal" data-target="#{!!$mission_new_location->mission_new_locations_id!!}" >
                    分派人員
                </button>
                <!-- Modal -->
                <div class="modal fade" id="{!!$mission_new_location->mission_new_locations_id!!}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog"  style="width:  800px">
                        <div class="modal-content">
                            {!! Form::open(array('url' => 'analysis/manage/local', 'method' => 'post','class' => 'form-horizontal')) !!}
                            {!! Form::hidden('mission_new_locations_id',$mission_new_location->mission_new_locations_id) !!}
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title" id="myModalLabel"><b>分派人員</b></h4>
                            </div>
                            <div class="modal-body ">
                                <div class="row">
                                    <div class="col-md-5" id="busy{!!$mission_new_location->mission_new_locations_id!!}">

                                        <b>執行任務人員</b>
                                        @if(isset($relieverNewLocationUsersArrays[$mission_new_location->mission_new_locations_id]))
                                            @for($j=1;$j<=count($relieverNewLocationUsersArrays[$mission_new_location->mission_new_locations_id]);$j++)

                                                        <div class="input-group">
                                                            <span class="form-control">{!!$relieverNewLocationUsersArrays[$mission_new_location->mission_new_locations_id][$j]['name']!!}</span>
                                                            {!! Form::hidden('mission[]',$relieverNewLocationUsersArrays[$mission_new_location->mission_new_locations_id][$j]['id']) !!}
                                                    <span class="input-group-btn" >
                                                        <button class="btn btn-default" type="button">-</button>
                                                    </span>
                                                        </div>

                                            @endfor
                                        @else

                                        @endif


                                    </div>
                                    <div class="col-md-offset-1 col-md-5" id="idle{!!$mission_new_location->mission_new_locations_id!!}">

                                        <b>未分配人員</b>

                                       @if(isset($relieverFreeUsersArrays))
                                            @foreach($relieverFreeUsersArrays as $relieverFreeUsersArray)
                                            <div class="input-group">
                                            <span class="input-group-btn">
                                                <button class="btn btn-default" type="button">+</button>
                                            </span>
                                                <span class="form-control">{!!$relieverFreeUsersArray['name']!!}</span>
                                                {!! Form::hidden('free[]',$relieverFreeUsersArray['id']) !!}
                                            </div>
                                             @endforeach
                                       @endif






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
        @endif

        </tbody>
    </table>
@endsection


@section('javascript')

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
        $(document).on('click','.btn-default', function(e){
            if($(this).closest('div').parent('div').attr('id').indexOf("busy")==0){
                add_person($(this).closest('div').find('input').val(), $(this).closest('div').find('span').eq(0).text(), $(this).closest('div').parent('div').attr('id'),true);
                $(this).closest('div').remove();
            }
            else if($(this).closest('div').parent('div').attr('id').indexOf("idle")==0){
                add_person($(this).closest('div').find('input').val(), $(this).closest('div').find('span').eq(1).text(), $(this).closest('div').parent('div').attr('id'),false);
                $(this).closest('div').remove();
            }
            else{} //其他class="btn-default"不用動作
        });

        function add_person(id,name,div_id,isBusyTable)
        {
            if(isBusyTable){
                var obj=document.getElementById(div_id.replace(/busy/,"idle"));

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

                var hidden_input= document.createElement("input");
                hidden_input.name="free[]";
                hidden_input.value=id;
                hidden_input.setAttribute("type", "hidden");
                div.appendChild(hidden_input);

                var span = document.createElement("span");
                span.setAttribute("class", "form-control");
                span.innerHTML=name;

                div.appendChild(span);

                obj.appendChild(div);
            }
            else{
                var obj=document.getElementById(div_id.replace(/idle/,"busy"));
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
                var hidden_input= document.createElement("input");
                hidden_input.name="mission[]";
                hidden_input.value=id;
                hidden_input.setAttribute("type", "hidden");
                div.appendChild(hidden_input);

                obj.appendChild(div);
            }

        }
    </script>
@endsection
