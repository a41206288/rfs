@extends('manage_master')
@section('title')
    通報管理
@endsection
@section('content_c8')
    <div class="table-responsive">
        {!! Form::open(array('url' => 'call_manage', 'method' => 'post')) !!}
        <table class="table table-striped">
            <thead>
                <tr>
                    <th width="10%">通報編號</th>
                    <th width="40%">通報內容</th>
                    <th width="40%">通報地址
                        @if (isset($missions))

                            @foreach ($missions as $mission)
                                {!! Form::select('size', array('L' => '$mission->country_or_city_input'. '$mission->country_or_city_input->country_or_city','請選擇'=>'請選擇'), '請選擇') !!}
                                {!! Form::select('size', array('L' => '西屯區', '請選擇'=>'請選擇'), '請選擇') !!}
                                {!! Form::select('size', array('L' => '文華路', 'S' => '西屯路','請選擇'=>'請選擇'), '請選擇') !!}
                    </th>
                    @endforeach

                    @endif

                    <th width="10%">{!! Form::submit('save', ['class' => 'btn btn-default ']) !!}<br></th>
                </tr>

            </thead>
            <tbody>
            @if (isset($missions))

                    @foreach ($missions as $mission)
                        <tr>
                            <td>{!! $mission->mission_id!!}</td>
                            <td>{!! $mission->mission_content!!}</td>
                            <td>{!! $mission->location!!}</td>
                            <td>{!! Form::select('size', array('L' => 'Large', 'S' => 'Small','請選擇'=>'請選擇'), '請選擇') !!}</td>
                        </tr>
                        <tr>

                    @endforeach

            @endif


            </tbody>
        </table>
        {!! Form::close() !!}
    </div>



@endsection
