@extends('manage_master')
@section('title')
    任務管理
@endsection
@section('link')
    <li>{!! Html::link('call/manage', '通報管理') !!}</li>
    <li>{!! Html::link('mission/manage', '任務管理') !!}</li>
@endsection
@section('css')
    tr.header,tr.header_no_next
    {
    cursor:pointer;
    }
    .header .sign:after{
    content:"▼";
    display:inline-block;
    }
    .header.expand .sign:after{
    content:"▲";
    }
    .header_no_next .sign:after{
    content:"▼";
    display:inline-block;
    }
    .header_no_next.expand .sign:after{
    content:"▲";
    }
@endsection
@section('content')

<h4>任務管理</h4><br>


            <table class="table table-bordered">
                <tr><th width="5%">任務編號</th><th width="10%">名稱</th>
                    {{--<th colspan="2" width="15%">負責人</th>--}}
                    <th  colspan="2" width="30%">通報</th><th  colspan="4" width="30%">最新回報</th></tr>
                @if (isset($mission_lists) )
                @foreach ($mission_lists as $mission_list )
                    @if ($mission_list->mission_name != "未分配任務")
                <tr class="header expand" style="border-top-width:3px; border-top-style:solid; border-top-color: #dddddd"><td rowspan="2">{!!$mission_list->mission_list_id!!}</td>
                    <td rowspan="2">{!!$mission_list->mission_name!!}</td>
                    {{--<td rowspan="2" width="5%">姓名 <span class="sign"></span></td>--}}
                    {{--<td rowspan="2" width="10%">{!!$mission_list_charge_Array[$mission_list->mission_list_id."name"]!!}</td>--}}
                    <th>編號</th><th>內容 <span class="sign"></span></th><th>通報日期</th><th>通報時間</th>
                    <th>內容 <span class="sign"></span></th><th width="10%">增援需求</th></tr>
                  <div style="display: none">
                 @if(count($reports_array[$mission_list->mission_list_id]) < 3 && count($mission_contents_array[$mission_list->mission_list_id]) <3)
                                {!!$n=  4!!}
                @elseif(count($reports_array[$mission_list->mission_list_id]) > count($mission_contents_array[$mission_list->mission_list_id]))
                           {!!$n = count($reports_array[$mission_list->mission_list_id])+1!!}
                @elseif(count($reports_array[$mission_list->mission_list_id]) < count($mission_contents_array[$mission_list->mission_list_id]))
                                {!!$n = count($mission_contents_array[$mission_list->mission_list_id])+1!!}
                @endif
                  </div>

                @for($i=1;$i<$n;$i++)
                    {{--{!!dd($n);!!}--}}
                                <tr>
                                @if($i==1)
                                    @elseif($i==2)
                                        <td colspan="2"></td>
                                {{--<td colspan="2"></td><td>電話</td><td>{!!$mission_list_charge_Array[$mission_list->mission_list_id."phone"]!!}</td>--}}
                                @elseif($i==3)
                                        <td colspan="2"></td>
                                    {{--<td colspan="2"></td><td>Email</td><td> {!!$mission_list_charge_Array[$mission_list->mission_list_id."email"]!!}</td>--}}
                                    @else
                                        <td colspan="4"></td>
                                @endif
                                    {{--{!!$n!!}--}}
                                @if($i <  count($mission_contents_array[$mission_list->mission_list_id])+1 && isset($mission_contents_array[$mission_list->mission_list_id][$i]))
                                    <td>{!!$mission_contents_array[$mission_list->mission_list_id][$i]['id']!!}</td>
                                    <td>{!!$mission_contents_array[$mission_list->mission_list_id][$i]['content']!!}</td>
                                @else
                                    <td colspan="2"></td>
                                @endif
                                @if($i < count($reports_array[$mission_list->mission_list_id])+1 && isset($reports_array[$mission_list->mission_list_id][$i]))
                                    {{--<td>{!!$reports_array[$mission_list->mission_list_id][$i]['time']!!}</td>--}}
                                        <td >{{ (new Carbon\Carbon($reports_array[$mission_list->mission_list_id][$i]['time']))->formatLocalized('%Y/%m/%d') }}</td>
                                        <td >{{ (new Carbon\Carbon($reports_array[$mission_list->mission_list_id][$i]['time']))->formatLocalized('%H:%M:%S') }}</td>
                                   <td>{!!$reports_array[$mission_list->mission_list_id][$i]['content']!!}</td>
                                    @else
                                        <td colspan="3"></td>
                                @endif
                                    <td>
                                @if($i==1)
                                    @if($mission_support_people_Array[$mission_list->mission_list_id."local_emt_num"] !=0 || $mission_support_people_Array[$mission_list->mission_list_id."local_reliever_num"] !=0)
                                          <button class="btn-circle btn-danger" data-toggle="modal" data-target="#supportPeopleBlock{!!$mission_list->mission_list_id!!}">人員</button>
                                                <!-- Modal -->
                                                <div class="modal fade" id="supportPeopleBlock{!!$mission_list->mission_list_id!!}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            {!! Form::open(array('url' => 'mission/manage/support', 'method' => 'post','class' => 'form-horizontal')) !!}
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                <h4 class="modal-title" id="myModalLabel"><b>需求人員內容</b></h4>
                                                                {!! Form::hidden('support_type','1') !!}
                                                            </div>
                                                            <div class="modal-body">
                                                                <table class="table table-bordered">
                                                                    <tr><th>任務編號</th><td>{!!$mission_list->mission_list_id!!}</td><th>任務名稱</th><td>{!!$mission_list->mission_name!!}</td></tr>
                                                                    {!! Form::hidden('mission_list_id',$mission_list->mission_list_id) !!}
                                                                    <tr><th>脫困組人數</th><td>{!!$relieverUsersArrays[$mission_list->mission_list_id]!!} 人</td>
                                                                    <th>醫療組人數</th><td>{!!$emtUsersArrays[$mission_list->mission_list_id]!!} 人</td></tr>
                                                                    <tr><th>所屬通報數量</th><td>{!!$mission_total_Arrays[$mission_list->mission_list_id]!!} 則</td>
                                                                    <th>現場地點數量</th><td>{!!$mission_new_location_amount_arrays[$mission_list->mission_list_id]['total']!!} 個</td></tr>
                                                                    <tr  class="header_no_next expand"><th colspan="4">查看任務現場<span class="sign"></span></th></tr>
                                                                    <tr><td>編號</td><td colspan="3">地點名稱</td></tr>


                                                                    @if(isset($mission_new_location_Arrays[$mission_list->mission_list_id]))
                                                                        @for($j=1;$j<=count($mission_new_location_Arrays[$mission_list->mission_list_id]);$j++)
                                                                            @if($mission_new_location_Arrays[$mission_list->mission_list_id][$j]['location'] != '醫療組'
                                                                            && $mission_new_location_Arrays[$mission_list->mission_list_id][$j]['location'] != '物資資源組')
                                                                            <tr><td>{!!$mission_new_location_Arrays[$mission_list->mission_list_id][$j]['mission_new_locations_id']!!}</td>
                                                                                <td colspan="3">{!!$mission_new_location_Arrays[$mission_list->mission_list_id][$j]['location']!!}</td></tr>
                                                                            @endif
                                                                        @endfor
                                                                    @else
                                                                        <tr><td></td>
                                                                            <td colspan="3">現場尚未分析</td></tr>
                                                                    @endif

                                                                </table>
                                                                <table class="table table-bordered">
                                                                    <tr class=""><th colspan="5">需求人員</th></tr>
                                                                    <tr><th>需求種類</th><th class="text-right">需求人數</th><th>中心人員數</th><th>欲分配人數</th></tr>

                                                                    <tr><td>醫療組</td><td class="text-right">{!!$mission_support_people_Array[$mission_list->mission_list_id."local_emt_num"]!!} 人</td>
                                                                        <td class="text-right">{!!$emtFreeUsers[0]->total!!} 人</td>
                                                                        {{--<th>已分配數量</th>--}}
                                                                        <td>{!! Form::number('emt', 0, ['id' =>  'emt', 'class' => 'form-control text-right','min'=>'0']) !!}</td></tr>

                                                                    <tr><td>脫困組</td><td class="text-right">{!!$mission_support_people_Array[$mission_list->mission_list_id."local_reliever_num"]!!} 人</td>
                                                                        <td class="text-right">{!!$relieverFreeUsers[0]->total!!} 人</td>
                                                                        {{--<th>已分配數量</th>--}}
                                                                        <td>{!! Form::number('reliever', 0, ['id' =>  'reliever', 'class' => 'form-control text-right','min'=>'0']) !!}</td></tr>
                                                                </table>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">取消</button>
                                                                {!! Form::submit('派送支援', ['class' => 'btn btn-default btn-sm btn-primary']) !!}
                                                            </div>
                                                            {!! Form::close() !!}
                                                        </div><!-- /.modal-content -->
                                                    </div><!-- /.modal-dialog -->
                                                </div><!-- /.modal -->
                                    @else

                                    @endif
                                @endif
                                @if($i==1 && isset($mission_support_product_Arrays[$mission_list->mission_list_id] ) )
                                    <button class="btn-circle btn-warning" data-toggle="modal" data-target="#supportProductsBlock{!!$mission_list->mission_list_id!!}">物資</button>
                                        <!-- Modal -->
                                        <div class="modal fade" id="supportProductsBlock{!!$mission_list->mission_list_id!!}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    {!! Form::open(array('url' => 'mission/manage/support', 'method' => 'post','class' => 'form-horizontal')) !!}
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                        <h4 class="modal-title" id="myModalLabel"><b>需求物資清單</b></h4>
                                                        {!! Form::hidden('support_type','0') !!}
                                                    </div>
                                                    <div class="modal-body">
                                                        <table class="table table-bordered" >
                                                            <tr><th>任務編號</th><td>{!!$mission_list->mission_list_id!!}</td><th>任務名稱</th><td>{!!$mission_list->mission_name!!}</td></tr>
                                                            {!! Form::hidden('mission_list_id',$mission_list->mission_list_id) !!}
                                                            <tr><th>脫困組人數</th><td>{!!$relieverUsersArrays[$mission_list->mission_list_id]!!} 人</td>
                                                            <th>醫療組人數</th><td>{!!$emtUsersArrays[$mission_list->mission_list_id]!!} 人</td></tr>
                                                            <tr><th>所屬通報數量</th><td>{!!$mission_total_Arrays[$mission_list->mission_list_id]!!} 則</td>
                                                            <th>現場地點數量</th><td>{!!$mission_new_location_amount_arrays[$mission_list->mission_list_id]['total']!!} 個</td></tr>



                                                        </table>
                                                        <table class="table table-bordered">
                                                            <tr><th colspan="5">需求物資</th></tr>
                                                            <tr><th>需求物資名稱</th><th class="text-right">需求數量</th><th>中心庫存數</th><th>欲分配數量</th></tr>
                                                            @if(isset($mission_support_product_Arrays[$mission_list->mission_list_id]))
                                                                @for($k=1;$k<=count($mission_support_product_Arrays[$mission_list->mission_list_id]);$k++)

                                                                    <tr><td>{!!$mission_support_product_Arrays[$mission_list->mission_list_id][$k]['product_name']!!}</td>
                                                                        <td class="text-right">{!!$mission_support_product_Arrays[$mission_list->mission_list_id][$k]['amount']!!}
                                                                            {!!$mission_support_product_Arrays[$mission_list->mission_list_id][$k]['unit']!!}
                                                                        </td>
                                                                        <td class="text-right">{!!$center_amounts_arrays[$mission_support_product_Arrays[$mission_list->mission_list_id][$k]['product_total_amount_id']]!!}
                                                                            {!!$mission_support_product_Arrays[$mission_list->mission_list_id][$k]['unit']!!}</td>
                                                                        {{--<th>已分配數量</th>--}}
                                                                        <td> {!! Form::number($mission_support_product_Arrays[$mission_list->mission_list_id][$k]['product_total_amount_id'], 0, [ 'class' => 'form-control text-right','min'=>'0']) !!}</td></tr>

                                                                @endfor
                                                            @else
                                                                <tr><td></td>
                                                                    <td colspan="3">現場尚未分析</td></tr>
                                                            @endif
                                                        </table>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">取消</button>
                                                        {!! Form::submit('派送支援', ['class' => 'btn btn-default btn-sm btn-primary']) !!}
                                                    </div>
                                                    {!! Form::close() !!}
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </div><!-- /.modal -->
                                @else
                                @endif
                                    </td>
                    </tr>
                 @endfor



                    @endif
                @endforeach
            </table>

@endif

@endsection




@section('javascript')

    <script language="JavaScript">
        $('.header').click(function(){
            $(this).toggleClass('expand').next().nextUntil('tr.header').slideToggle(100);
        });
        $('.header').trigger('click'); //trigger :觸發指定事件
        $('.header_no_next').click(function(){
            $(this).toggleClass('expand').nextUntil('tr.header_no_next').slideToggle(100);
        });
        $('.header_no_next').trigger('click'); //trigger :觸發指定事件

    </script>
@endsection
