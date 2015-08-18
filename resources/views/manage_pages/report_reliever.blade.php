@extends('manage_master')
@section('title')
    回報
@endsection
@section('content')
    <div class="col-xs-8 col-sm-6 col-md-6" >
        定時回報
    <table class="table table-bordered">
        <tr><th width="12%">回報日期</th><th width="13%">回報時間</th><th>回報內容</th><th>回報人</th></tr>
        {!! Form::open(array('url' => 'report/reliever', 'method' => 'post','class' => 'form-horizontal')) !!}
        <tr><td id="showbox"></td><td></td><td>{!! Form::textarea('report','',['class' => 'form-control','rows'=>'1', 'style'=>'resize: vertical','required']) !!}</td><td>{!! Form::submit('回報', ['class' => 'btn btn-default btn-sm btn-primary']) !!}</td></tr>
        {!! Form::close() !!}

        @if (isset($mission_new_locations) )
            @foreach ($mission_new_locations as $mission_new_location )
                @if($mission_new_location->location != "醫療組"
                && $mission_new_location->location != "物資資源組"
                && $relieverNewLocationUserAmountsArrays[$mission_new_location->mission_new_locations_id]['total'] != 0)

                    <div style="display: none">
                        @if(isset($local_reports_arrays[$mission_new_location->mission_new_locations_id]))
                            {!!$n=count($local_reports_arrays[$mission_new_location->mission_new_locations_id])!!}
                        @else
                            {!!$n=1!!}
                        @endif
                    </div>
                    @for($i=1;$i<=$n;$i++)
                        @if(isset($local_reports_arrays[$mission_new_location->mission_new_locations_id]))
                            <tr>
                                <td >{{ (new Carbon\Carbon($local_reports_arrays[$mission_new_location->mission_new_locations_id][$i]['time']))->formatLocalized('%Y/%m/%d') }}</td>
                                <td >{{ (new Carbon\Carbon($local_reports_arrays[$mission_new_location->mission_new_locations_id][$i]['time']))->formatLocalized('%H:%M:%S') }}</td>
                                <td>{!!$local_reports_arrays[$mission_new_location->mission_new_locations_id][$i]['content']!!}</td>
                                <td>{!!$local_reports_arrays[$mission_new_location->mission_new_locations_id][$i]['name']!!}</td>
                            </tr>
                        @else

                        @endif
                    @endfor

                @endif

            @endforeach

        @endif
        {{--<tr><td>2015-06-25 09:39:02</td><td>目前傷患醫療作業順利進行中</td><td>陳芊蓉</td></tr>--}}
        {{--<tr><td>2015-06-25 09:39:02</td><td>目前傷患醫療作業順利進行中</td><td>陳芊蓉</td></tr>--}}
        {{--<tr><td>2015-06-25 09:39:02</td><td>目前傷患醫療作業順利進行中</td><td>陳芊蓉</td></tr>--}}
        {{--<tr><td>2015-06-25 09:39:02</td><td>目前傷患醫療作業順利進行中</td><td>陳芊蓉</td></tr>--}}
        {{--<tr><td>2015-06-25 09:39:02</td><td>目前傷患醫療作業順利進行中</td><td>陳芊蓉</td></tr>--}}
        {{--<tr><td>2015-06-25 09:39:02</td><td>目前傷患醫療作業順利進行中</td><td>陳芊蓉</td></tr>--}}
        {{--<tr><td>2015-06-25 09:39:02</td><td>目前傷患醫療作業順利進行中</td><td>陳芊蓉</td></tr>--}}
        {{--<tr><td>2015-06-25 09:39:02</td><td>目前傷患醫療作業順利進行中</td><td>陳芊蓉</td></tr>--}}
        {{--<tr><td>2015-06-25 09:39:02</td><td>目前傷患醫療作業順利進行中</td><td>陳芊蓉</td></tr>--}}


    </table>
    </div>
    <div class="col-xs-8 col-sm-6 col-md-6" >
        增援回報
        <table class="table table-bordered">
            <tr><th width="12%">回報日期</th><th width="13%">回報時間</th><th>預估需求人數</th><th>需求原因</th><th>回報人</th></tr>
            {!! Form::open(array('url' => 'report/reliever', 'method' => 'post','class' => 'form-horizontal')) !!}
            <tr><td id="showbox"></td><td></td><td> {!! Form::number('require_number', '', ['id' =>  'victim_number', 'class' => 'form-control text-right', 'required','min'=>'0']) !!}</td><td>{!! Form::textarea('report','',['class' => 'form-control','rows'=>'1', 'style'=>'resize: vertical','required']) !!}</td><td>{!! Form::submit('回報', ['class' => 'btn btn-default btn-sm btn-primary']) !!}</td></tr>
            {!! Form::close() !!}

            @if (isset($mission_new_locations) )
                @foreach ($mission_new_locations as $mission_new_location )
                    @if($mission_new_location->location != "醫療組"
                    && $mission_new_location->location != "物資資源組"
                    && $relieverNewLocationUserAmountsArrays[$mission_new_location->mission_new_locations_id]['total'] != 0)

                        <div style="display: none">
                            @if(isset($executiveRequireArrays[$mission_new_location->mission_new_locations_id][1]))
                                {!!$n=count($executiveRequireArrays[$mission_new_location->mission_new_locations_id][1])!!}
                            @else
                                {!!$n=0!!}
                            @endif
                        </div>
                        @for($i=1;$i<=$n;$i++)
                            @if($i==1 && $executiveRequireArrays[$mission_new_location->mission_new_locations_id][$i]['executive_require_people_num'] != 0
                              && $executiveRequireArrays[$mission_new_location->mission_new_locations_id][$i]['executive_require_reason'] != "")
                           <tr>
                               <td>{{ (new Carbon\Carbon($executiveRequireArrays[$mission_new_location->mission_new_locations_id][$i]['updated_at']))->formatLocalized('%Y/%m/%d')}}</td>
                               <td>{{ (new Carbon\Carbon($executiveRequireArrays[$mission_new_location->mission_new_locations_id][$i]['updated_at']))->formatLocalized('%H:%M:%S')}}</td>
                               <td>{!!$executiveRequireArrays[$mission_new_location->mission_new_locations_id][$i]['executive_require_people_num']!!} 人</td>
                               <td>{!! $executiveRequireArrays[$mission_new_location->mission_new_locations_id][$i]['executive_require_reason']!!}</td>
                               <td>{!! $executiveRequireArrays[$mission_new_location->mission_new_locations_id][$i]['name']!!}</td>
                           </tr>
                            @endif
                        @endfor


                    @endif

                @endforeach

            @endif
            {{--<tr><td>2015-06-25 09:39:02</td><td class="text-right">12人</td><td>目前傷患醫療作業順利進行中</td><td>陳芊蓉</td></tr>--}}
            {{--<tr><td>2015-06-25 09:39:02</td><td class="text-right">12人</td><td>目前傷患醫療作業順利進行中</td><td>陳芊蓉</td></tr>--}}
            {{--<tr><td>2015-06-25 09:39:02</td><td class="text-right">12人</td><td>目前傷患醫療作業順利進行中</td><td>陳芊蓉</td></tr>--}}
            {{--<tr><td>2015-06-25 09:39:02</td><td class="text-right">12人</td><td>目前傷患醫療作業順利進行中</td><td>陳芊蓉</td></tr>--}}
            {{--<tr><td>2015-06-25 09:39:02</td><td class="text-right">12人</td><td>目前傷患醫療作業順利進行中</td><td>陳芊蓉</td></tr>--}}
            {{--<tr><td>2015-06-25 09:39:02</td><td class="text-right">12人</td><td>目前傷患醫療作業順利進行中</td><td>陳芊蓉</td></tr>--}}
            {{--<tr><td>2015-06-25 09:39:02</td><td class="text-right">12人</td><td>目前傷患醫療作業順利進行中</td><td>陳芊蓉</td></tr>--}}



        </table>
    </div>
@endsection
@section('javascript')

    {{--<script>--}}
        {{--Date.prototype.format = function(format) //author: meizz--}}
        {{--{--}}
            {{--var o = {--}}
                {{--"M+" : this.getMonth()+1, //month--}}
                {{--"d+" : this.getDate(),    //day--}}
                {{--"h+" : this.getHours(),   //hour--}}
                {{--"m+" : this.getMinutes(), //minute--}}
                {{--"s+" : this.getSeconds(), //second--}}
                {{--"q+" : Math.floor((this.getMonth()+3)/3),  //quarter--}}
                {{--"S" : this.getMilliseconds() //millisecond--}}
            {{--}--}}
            {{--if(/(y+)/.test(format)) format=format.replace(RegExp.$1,--}}
                    {{--(this.getFullYear()+"").substr(4 - RegExp.$1.length));--}}
            {{--for(var k in o)if(new RegExp("("+ k +")").test(format))--}}
                {{--format = format.replace(RegExp.$1,--}}
                        {{--RegExp.$1.length==1 ? o[k] :--}}
                                {{--("00"+ o[k]).substr((""+ o[k]).length));--}}
            {{--return format;--}}
        {{--}--}}
        {{--alert(new Date().format("yyyy-MM-dd hh:mm:ss"));--}}
    {{--</script>--}}
@endsection