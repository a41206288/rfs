@extends('manage_master')
@section('title')
    任務管理
@endsection
@section('link')
    <li>{!! Html::link('call/manage', '通報管理') !!}</li>
    <li>{!! Html::link('mission/manage', '任務管理') !!}</li>
@endsection
@section('css')
    tr.header
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
@endsection
@section('content')

<h4>任務管理</h4><br>


            <table class="table table-bordered">
                <tr><th width="5%">任務編號</th><th width="10%">名稱</th><th colspan="2" width="15%">負責人</th><th  colspan="2" width="30%">通報</th><th  colspan="3" width="30%">最新回報</th></tr>
                @if (isset($mission_lists) )
                @foreach ($mission_lists as $mission_list )
                    @if ($mission_list->mission_name != "未分配任務")
                <tr class="header expand"><td rowspan="2">{!!$mission_list->mission_list_id!!}</td><td rowspan="2">{!!$mission_list->mission_name!!}</td><td rowspan="2" width="5%">姓名 <span class="sign"></span></td><td rowspan="2" width="10%">{!!$mission_list_charge_Array[$mission_list->mission_list_id."name"]!!}</td><th>編號</th><th>內容 <span class="sign"></span></th><th>時間</th><th>內容 <span class="sign"></span></th><th width="10%">增援需求</th></tr>
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
                                                                  印人員按鈕

                                @else

                                @endif
                                    @if($i==1 && isset($mission_support_product_Array[$mission_list->mission_list_id."id"] ) )
                                                    印物資按鈕

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
    </script>
@endsection
