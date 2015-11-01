@extends('user_master')
@section('title')
    首頁
@endsection
@section('home_active')
    active
@endsection
{{--@section('css')--}}
   {{--td {--}}
    {{--width:250px;--}}
    {{--white-space:nowrap;--}}
    {{--text-overflow:ellipsis;--}}
    {{---o-text-overflow:ellipsis;--}}
    {{--overflow: hidden;--}}
    {{--}--}}
{{--@endsection--}}
@section('content_12')
    <br><br>
    <div class="text-right navbar-form">
        <form onsubmit="return false;">
            <div class="form-group">
                <input class="form-control" placeholder="搜尋任務/通報編號" type="text" name="search" id="search">
            </div>

            <button type="button" class="btn btn-default" id="submit">
                <span class="glyphicon glyphicon-search"></span>
            </button>
        </form>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">任務列表</div>
        <div class="panel-body">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th width="10%">任務時間</th>
                    <th width="15%">任務地點</th>
                    {{--<th width="14%">負責人</th>--}}
                    <th width="35%" colspan="6">任務進度</th>
                    <th colspan="2">通報</th>
                </tr>
                <tr>
                    <th>
                        {!! Form::select('date', $dates, '請選擇日期', ['id' => 'date']) !!}
                    </th>
                    <th>
                        {!! Form::select('township', $mission_township, '選擇區', ['id' => 'township','onchange' => 'township_onchange()']) !!}
                        {!! Form::select('street', array('選擇路段' => '選擇路段'), '選擇路段', ['id' => 'street']) !!}
                    </th>

                    <th colspan="2">調派人員結束時間</th>
                    <th colspan="2">到達任務現場時間</th>
                    <th colspan="2">任務執行完成時間</th>
                    <th>內容</th>
                    {{--<th>通報人</th>--}}
                </tr>
                </thead>
                <tbody id="callTable">
                @if (isset($mission_lists) )
                    @foreach ($mission_lists as $mission_list )
                        @if ($mission_list->mission_name != "未分配任務")
                            <tr>
                                <td>{{ (new Carbon\Carbon($mission_list->created_at))->formatLocalized('%Y/%m/%d') }}
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    {{ (new Carbon\Carbon($mission_list->created_at))->formatLocalized('%H:%M') }}</td>
                                <td>{!! $mission_list->mission_name!!}</td>
                                <td colspan="6">
                                    @if($mission_list_charge_Arrays[$mission_list->mission_list_id]['name'] == "")

                                    @elseif(isset($mission_list->mission_complete_time))
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-success" role="progressbar"
                                                 aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                                                <p class="text-right">{{ (new Carbon\Carbon($mission_list->mission_complete_time))->formatLocalized('%Y/%m/%d') }}
                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    {{ (new Carbon\Carbon($mission_list->mission_complete_time))->formatLocalized('%H:%M') }}
                                                    &nbsp;&nbsp;</p>
                                            </div>
                                        </div>

                                    @elseif(isset($mission_list->arrive_location_time))
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-warning" role="progressbar"
                                                 aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 66%">
                                                <p class="text-right">{{ (new Carbon\Carbon($mission_list->arrive_location_time))->formatLocalized('%Y/%m/%d') }}
                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    {{ (new Carbon\Carbon($mission_list->arrive_location_time))->formatLocalized('%H:%M') }}
                                                    &nbsp;&nbsp;</p>
                                            </div>
                                        </div>

                                    @elseif(isset($mission_list->assign_people_finish_time))
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-danger" role="progressbar"
                                                 aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 33%">
                                                <p class="text-right">{{ (new Carbon\Carbon($mission_list->assign_people_finish_time))->formatLocalized('%Y/%m/%d') }}
                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    {{ (new Carbon\Carbon($mission_list->assign_people_finish_time))->formatLocalized('%H:%M') }}
                                                    &nbsp;&nbsp;</p>
                                            </div>
                                        </div>
                                    @endif
                                </td>

                                <td width="100%" class="btn-group">
                                    <?php $hasadd = false; ?>
                                    @foreach( $missions as $mission )
                                        @if( $mission_list->mission_list_id == $mission->mission_list_id)
                                            @if($hasadd == false)
                                                <a type="button" class=" btn-s list-group-item dropdown-toggle" data-toggle="dropdown">
                                                    {{ (new Carbon\Carbon($mission->created_at))->formatLocalized('%Y/%m/%d') }}
                                                    &nbsp;&nbsp;&nbsp;
                                                    {{ (new Carbon\Carbon($mission->created_at))->formatLocalized('%H:%M') }}
                                                    &nbsp;&nbsp;
                                                    {!! $mission->mission_content !!}
                                                    <span class="glyphicon glyphicon-chevron-down"></span>
                                                </a>
                                                <?php $hasadd = true; ?>
                                            @endif
                                        @endif
                                    @endforeach
                                    @if($hasadd == false)
                                            <a type="button" class=" btn-s list-group-item dropdown-toggle" data-toggle="dropdown">
                                                &nbsp;&nbsp;<span class="glyphicon glyphicon-chevron-down"></span>
                                            </a>
                                    @endif

                                    <ul class="dropdown-menu" role="menu">
                                    <?php $haspassfirst=false ?>
                                    @foreach( $missions as $mission )
                                        @if( $mission_list->mission_list_id == $mission->mission_list_id)
                                            @if($haspassfirst==true)
                                                <li>
                                                    <a href="#">
                                                        {{ (new Carbon\Carbon($mission->created_at))->formatLocalized('%Y/%m/%d') }}
                                                        &nbsp;&nbsp;&nbsp;
                                                        {{ (new Carbon\Carbon($mission->created_at))->formatLocalized('%H:%M') }}
                                                        &nbsp;&nbsp;
                                                        {!! $mission->mission_content !!}
                                                    </a>
                                                </li>
                                            @elseif($haspassfirst==false)
                                                <?php $haspassfirst=true ?>
                                            @endif
                                        @endif
                                    @endforeach

                                    </ul>
                                </td>

                            </tr>
                        @endif
                    @endforeach
                @endif
                {{--<tr>--}}
                    {{--<td>15/09/29&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;07:32</td>--}}
                    {{--<td  >四維林森交叉路口</td>--}}
                    {{--<td  colspan="6">--}}
                        {{--<div class="progress">--}}
                            {{--<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 100%">--}}
                                {{--<p class="text-right">2015/09/30 07:30 &nbsp;&nbsp;</p>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</td>--}}
                    {{--<td>15/09/29&nbsp;&nbsp;&nbsp;&nbsp07:32</td>--}}
                    {{--<td width="100%" class="btn-group">--}}

                        {{--<a type="button" class=" btn-s list-group-item dropdown-toggle" data-toggle="dropdown">--}}
                            {{--15/09/29&nbsp;&nbsp;&nbsp07:32&nbsp;&nbsp;路樹倒塌壓過路面<span class="glyphicon glyphicon-chevron-down"></span>--}}
                        {{--</a>--}}
                        {{--<ul class="dropdown-menu" role="menu">--}}
                            {{--<li><a href="#"> 15/09/29&nbsp;&nbsp;&nbsp07:32&nbsp;&nbsp;路樹倒塌壓過路面</a></li>--}}
                            {{--<li><a href="#"> 15/09/29&nbsp;&nbsp;&nbsp07:32&nbsp;&nbsp;路樹倒塌壓過路面</a></li>--}}
                            {{--<li><a href="#"> 15/09/29&nbsp;&nbsp;&nbsp07:32&nbsp;&nbsp;路樹倒塌壓過路面</a></li>--}}
                        {{--</ul>--}}

                    {{--</td>--}}
                {{--</tr>--}}
                </tbody>
            </table>
        </div>
    </div>


@endsection
@section('javascript')
    <script>
        //移除只有一個任務按下會出現的空白
        for(var i=0;i<$('tr').find('.btn-group').length;i++){
            if($('tr').find('.btn-group').eq(i).find('ul').find('li').length == 0){
                $('tr').find('.btn-group').eq(i).find('ul').remove();
            }
        }
        $('#sex').change(function(){
            alert("U change sex select bar");

        });
        $('#date, #township, #street').change(function(){
//            alert( $('#township option:selected').text() +"--"+ $('#street option:selected').text());
            $.ajax({
                url: 'update',
                type: 'POST',
                headers: {
                    'X-CSRF-Token': "{{ Session::token() }}"
                },
                data: {
                    date: $('#date option:selected').text(),
                    township: $('#township option:selected').text(),
                    street: $('#street option:selected').text()
                },
                success: function(response) {
//                    alert("Controller return : " + response['x']);
                    updateTable(response);
                },
                error: function(xhr) {
                    alert('Ajax request 發生錯誤');
                }
            });
        });
        $('#submit').click(function(){
//            alert($('#search').val());
            if($('#search').val() != ""){
                $.ajax({
                    url: 'update',
                    type: 'POST',
                    headers: {
                        'X-CSRF-Token': "{{ Session::token() }}"
                    },
                    data: {
                        search: $('#search').val()
                    },
                    success: function(response) {
//                        alert("Controller return : " + response['x'][0]['created_at'] + "  " + response['x'][0]['mission_list_id']);
                        $('#search').val("");
                        updateTable(response);
                    },
                    error: function(xhr) {
                        alert('Ajax request 發生錯誤');
                    }
                });
            }
            else{
                alert("請輸入編號");
            }

        });
        function updateTable(newdata){
            var obj = document.getElementById("callTable");
            while(obj.firstChild){
                obj.removeChild(obj.firstChild)
            }
            var DataLength = newdata['mission_lists'].length;  //使用讀取資料庫時
//            alert(DataLength);
            for(var i=0; i<DataLength; i++){
                var tr = document.createElement('tr');
                var td = document.createElement('td');
                td.innerHTML = newdata['mission_lists'][i]['created_at'];
                tr.appendChild(td);
                var td = document.createElement('td');
                td.innerHTML = newdata['mission_lists'][i]['mission_name'];
                tr.appendChild(td);
                var td = document.createElement('td');
                td.colSpan = "6";
                var div1 = document.createElement('div');
                div1.className = "progress";
                var div2 = document.createElement('div');
                div2.setAttribute("role","progressbar");
                div2.setAttribute("aria-valuenow","40");
                div2.setAttribute("aria-valuemin","0");
                div2.setAttribute("aria-valuemax","100");
                var p = document.createElement('p');
                //任務執行完成時間
                if( newdata['mission_lists'][i]['mission_complete_time'] != null){
                    div2.className = "progress-bar progress-bar-success";
                    div2.style.width = "100%";
                    p.innerHTML = newdata['mission_lists'][i]['mission_complete_time'] + "&nbsp;&nbsp;";
                    p.className = "text-right";
                    div2.appendChild(p);
                    div1.appendChild(div2);
                    td.appendChild(div1);
                }
                //到達任務現場時間
                else if(newdata['mission_lists'][i]['arrive_location_time'] != null){
                    div2.className = "progress-bar progress-bar-warning";
                    div2.style.width = "66%";
                    p.innerHTML = newdata['mission_lists'][i]['arrive_location_time'] + "&nbsp;&nbsp;";
                    p.className = "text-right";
                    div2.appendChild(p);
                    div1.appendChild(div2);
                    td.appendChild(div1);
                }
                //調派人員結束時間
                else if(newdata['mission_lists'][i]['assign_people_finish_time'] != null){
                    div2.className = "progress-bar progress-bar-danger";
                    div2.style.width = "33%";
                    p.innerHTML = newdata['mission_lists'][i]['assign_people_finish_time'] + "&nbsp;&nbsp;";
                    p.className = "text-right";
                    div2.appendChild(p);
                    div1.appendChild(div2);
                    td.appendChild(div1);
                }
                else{}
                tr.appendChild(td);

                var thisListMissions = Array();
                for(var j=0; j<newdata['missions'].length;j++){
                    if(newdata['missions'][j]['mission_list_id'] == newdata['mission_lists'][i]['mission_list_id']){
                        thisListMissions.push(newdata['missions'][j]);
                    }
                }
                var td = document.createElement('td');
                td.width = "100%";
                td.className = "btn-group";

                if(thisListMissions.length == 0){
                    var a = document.createElement('a');
                    a.className = "btn-s list-group-item dropdown-toggle";
                    a.setAttribute("type","button");
                    a.setAttribute("data-toggle","dropdown");
                    a.innerHTML = "&nbsp;&nbsp;";
                    var span = document.createElement('span');
                    span.className = "glyphicon glyphicon-chevron-down";
                    a.appendChild(span);
                    td.appendChild(a);
                }
                else{
                    var a = document.createElement('a');
                    a.className = "btn-s list-group-item dropdown-toggle";
                    a.setAttribute("type","button");
                    a.setAttribute("data-toggle","dropdown");
                    a.innerHTML = thisListMissions[0]['created_at'] + "   " + thisListMissions[0]['mission_content'];
                    var span = document.createElement('span');
                    span.className = "glyphicon glyphicon-chevron-down";
                    a.appendChild(span);
                    td.appendChild(a);
                    if(thisListMissions.length > 1){
                        var ul = document.createElement('ul');
                        ul.className = "dropdown-menu";
                        ul.setAttribute("role","menu");
                        for(var j=1; j<thisListMissions.length; j++){
                            var li = document.createElement('li');
                            var a = document.createElement('a');
                            a.innerHTML = thisListMissions[j]['created_at'] + "   " + thisListMissions[j]['mission_content'];
                            a.setAttribute("href","#");
                            li.appendChild(a);
                            ul.appendChild(li);
                        }
                        td.appendChild(ul);
                    }
                }

                tr.appendChild(td);
                obj.appendChild(tr);
            }

        }

        /*讀取通報所在的區及路，並將區和路對應 */
        var read_road ={!! json_encode($mission_road) !!};
        var read_township ={!! json_encode($mission_township) !!};
        var rd_array = new Array(read_township.length);
        rd_array[0] = ['選擇路段'];
        for(var i=1; i<rd_array.length; i++){
            var temp_array = new Array('選擇路段');
            for(var j=0; j<read_road.length; j++){
                if(read_road[j]['township_or_district_input'] == read_township[i]){
                    if(read_road[j]['rd_or_st_1'] != null && temp_array.indexOf(read_road[j]['rd_or_st_1']) == -1){
                        temp_array.push(read_road[j]['rd_or_st_1']);
                    }
                    if(read_road[j]['rd_or_st_2'] != null && temp_array.indexOf(read_road[j]['rd_or_st_2']) == -1){
                        temp_array.push(read_road[j]['rd_or_st_2']);
                    }
                }
            }
            rd_array[i] = temp_array;
        }
        function township_onchange() {
            var index = $('#township').find(':selected').index();
            $("#street option").remove();
            for (j = 0; j < rd_array[index].length; j ++) {
                $("#street").append($("<option></option>").text(rd_array[index][j]) );
            }
        }
    </script>
@endsection
