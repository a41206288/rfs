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
                <tr><th width="5%">任務編號</th><th width="10%">名稱</th><th colspan="2" width="15%">負責人</th><th  colspan="2" width="30%">通報</th><th  colspan="3" width="30%">最新回報</th></tr>
                @if (isset($mission_lists) )
                @foreach ($mission_lists as $mission_list )
                    @if ($mission_list->mission_name != "未分配任務")
                <tr class="header expand" style="border-top-width:3px; border-top-style:solid; border-top-color: #dddddd"><td rowspan="2">{!!$mission_list->mission_list_id!!}</td><td rowspan="2">{!!$mission_list->mission_name!!}</td><td rowspan="2" width="5%">姓名 <span class="sign"></span></td><td rowspan="2" width="10%">{!!$mission_list_charge_Array[$mission_list->mission_list_id."name"]!!}</td><th>編號</th><th>內容 <span class="sign"></span></th><th>時間</th><th>內容 <span class="sign"></span></th><th width="10%">增援需求</th></tr>
                  <div style="display: none">
                 @if(count($reports_array[$mission_list->mission_list_id]) < 3 && count($mission_contents_array[$mission_list->mission_list_id]) <3)
                                {!!$n=  4;!!}
                @elseif(count($reports_array[$mission_list->mission_list_id]) > count($mission_contents_array[$mission_list->mission_list_id]))
                           {!!$n = count($reports_array[$mission_list->mission_list_id])+1;!!}
                @elseif(count($reports_array[$mission_list->mission_list_id]) < count($mission_contents_array[$mission_list->mission_list_id]))
                                {!!$n = count($mission_contents_array[$mission_list->mission_list_id])+1;!!}
                @endif
                  </div>

                @for($i=1;$i<$n;$i++)
                    {{--{!!dd($n);!!}--}}
                                <tr>
                                @if($i==1)
                                    @elseif($i==2)
                                <td colspan="2"></td><td>電話</td><td>{!!$mission_list_charge_Array[$mission_list->mission_list_id."phone"]!!}</td>
                                @elseif($i==3)
                                    <td colspan="2"></td><td>Email</td><td> {!!$mission_list_charge_Array[$mission_list->mission_list_id."email"]!!}</td>
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
                                    <td>{!!$reports_array[$mission_list->mission_list_id][$i]['time']!!}</td>
                                   <td>{!!$reports_array[$mission_list->mission_list_id][$i]['content']!!}</td>
                                    @else
                                        <td colspan="2"></td>
                                @endif
                                    <td>

                                @if($i==1 && $mission_support_people_Array[$mission_list->mission_list_id."amount"] !=0 )
                                      <button class="btn-circle btn-danger" data-toggle="modal" data-target="#supportPeopleBlock{!!$mission_list->mission_list_id!!}">人員</button>
                                            <!-- Modal -->
                                            <div class="modal fade" id="supportPeopleBlock{!!$mission_list->mission_list_id!!}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        {!! Form::open(array('url' => 'mission/manage/supportPeople', 'method' => 'post','class' => 'form-horizontal')) !!}
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                            <h4 class="modal-title" id="myModalLabel"><b>需求人員內容</b></h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <table class="table table-bordered">
                                                                <tr><th>任務編號</th><td>{!!$mission_list->mission_list_id!!}</td><th>任務名稱</th><td>{!!$mission_list->mission_name!!}</td></tr>
                                                                <tr><th>脫困組人數</th><td></td><th>醫療組人數</th><td></td></tr>
                                                                <tr><th>所屬通報數量</th><td></td><th>現場地點數量</th><td></td></tr>
                                                                <tr  class="header_no_next expand"><th colspan="4">查看任務現場<span class="sign"></span></th></tr>
                                                                <tr><td>編號</td><td colspan="3">地點名稱</td></tr>
                                                                <tr class="header_no_next expand"><th colspan="4">需求人員</th></tr>
                                                                <tr><th>需求種類</th><th class="text-right">需求人數</th><th>中心待命人員數</th><th>欲分配人數</th></tr>
                                                                <tr><td>醫療組</td><td class="text-right">12</td><td class="text-right">35</td><td>{!! Form::text('emt','',['class' => 'form-control text-right']) !!}</td></tr>
                                                                <tr><td>脫困組</td><td class="text-right">12</td><td class="text-right">10</td><td>{!! Form::text('reliever','',['class' => 'form-control text-right']) !!}</td></tr>
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
                                @if($i==1 && isset($mission_support_product_Array[$mission_list->mission_list_id."id"] ) )
                                    <button class="btn-circle btn-warning" data-toggle="modal" data-target="#supportProductsBlock{!!$mission_list->mission_list_id!!}">物資</button>
                                        <!-- Modal -->
                                        <div class="modal fade" id="supportProductsBlock{!!$mission_list->mission_list_id!!}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    {!! Form::open(array('url' => 'call/manage/createMission', 'method' => 'post','class' => 'form-horizontal')) !!}
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                        <h4 class="modal-title" id="myModalLabel"><b>需求物資清單</b></h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <table class="table table-bordered" >
                                                            <tr><th>任務編號</th><td>{!!$mission_list->mission_list_id!!}</td><th>任務名稱</th><td>{!!$mission_list->mission_name!!}</td></tr>
                                                            <tr><th>脫困組人數</th><td></td><th>醫療組人數</th><td></td></tr>
                                                            <tr><th>所屬通報數量</th><td></td><th>現場地點數量</th><td></td></tr>
                                                            <tr><th colspan="4">需求物資</th></tr>
                                                            <tr><th>需求物資名稱</th><th class="text-right">需求數量</th><th>中心庫存數</th><th>欲分配數量</th></tr>
                                                            <tr><td>泡麵</td><td class="text-right">12</td><td class="text-right">35</td><td>{!! Form::text('emt','',['class' => 'form-control text-right']) !!}</td></tr>
                                                            <tr><td>水</td><td class="text-right">12</td><td class="text-right">10</td><td>{!! Form::text('reliever','',['class' => 'form-control text-right']) !!}</td></tr>
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
    <script type="text/javascript" src="/js/bootstrap.min.js"></script>

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
