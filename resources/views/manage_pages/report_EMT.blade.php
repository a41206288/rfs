@extends('manage_master')
@section('title')
    EMT回報
@endsection
@section('content')

    <div class="col-xs-8 col-sm-6 col-md-6" >
        定時回報
        <table class="table table-bordered">
            <tr><th width="12%">回報日期</th><th width="13%">回報時間</th><th>回報內容</th><th>回報人</th></tr>
            {!! Form::open(array('url' => 'report/EMT', 'method' => 'post','class' => 'form-horizontal')) !!}
            <tr><td id="showbox"></td><td></td><td>{!! Form::textarea('report','',['class' => 'form-control','rows'=>'1', 'style'=>'resize: vertical','required']) !!}</td><td>{!! Form::submit('回報', ['class' => 'btn btn-default btn-sm btn-primary']) !!}</td></tr>
            {!! Form::close() !!}

            <div style="display: none">
                @if(isset($local_reports_arrays[1]))
                    {!!$n=count($local_reports_arrays[1])!!}

                @else
                    {!!$n=1!!}
                @endif
            </div>
            @for($i=1;$i<=$n;$i++)
                @if(isset($local_reports_arrays[1]))
                    {{--<td>{!!$local_reports_arrays[1][$i]['time']!!}</td>--}}
                <tr>
                    <td >{{ (new Carbon\Carbon($local_reports_arrays[1][$i]['time']))->formatLocalized('%Y/%m/%d') }}</td>
                    <td >{{ (new Carbon\Carbon($local_reports_arrays[1][$i]['time']))->formatLocalized('%H:%M:%S') }}</td>
                    <td>{!!$local_reports_arrays[1][$i]['content']!!}</td>
                    <td>{!!$local_reports_arrays[1][$i]['name']!!}</td>
                </tr>
                @else
                    <td colspan="2">尚未有最新回報。</td>
                @endif
            @endfor

        </table>
    </div>
    <div class="col-xs-8 col-sm-6 col-md-6" >
        增援回報
        <table class="table table-bordered">
            <tr><th width="12%">回報日期</th><th width="13%">回報時間</th><th>預估需求人數</th><th>需求原因</th><th>回報人</th></tr>
            {!! Form::open(array('url' => 'report/reliever', 'method' => 'post','class' => 'form-horizontal')) !!}
            <tr><td id="showbox"></td><td></td><td> {!! Form::number('require_number', '', ['id' =>  'victim_number', 'class' => 'form-control text-right', 'required','min'=>'0']) !!}</td><td>{!! Form::textarea('report','',['class' => 'form-control','rows'=>'1', 'style'=>'resize: vertical','required']) !!}</td><td>{!! Form::submit('回報', ['class' => 'btn btn-default btn-sm btn-primary']) !!}</td></tr>
            {!! Form::close() !!}

            <tr>
                <td >{{ (new Carbon\Carbon($executiveRequireArrays[1][1]['updated_at']))->formatLocalized('%Y/%m/%d')}}</td>
                <td >{{ (new Carbon\Carbon($executiveRequireArrays[1][1]['updated_at']))->formatLocalized('%H:%M:%S')}}</td>
                <td>{!!$executiveRequireArrays[1][1]['executive_require_people_num']!!} 人</td>
                <td>{!!$executiveRequireArrays[1][1]['executive_require_reason']!!}</td>
                <td>{!!$executiveRequireArrays[1][1]['name']!!}</td>
            </tr>

        </table>
    </div>
@endsection