@extends('manage_master')
@section('title')
    通報管理
@endsection
@section('content_c9')

    <div class="table-responsive">


        <table class="table table-striped">
            <thead>
                <tr>
                    <th width="10%">編號</th>
                    <th width="20%">通報內容</th>
                    <th width="20%">通報地址<br>
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
                    <th width="10%">通報人信箱</th>
                    {!! Form::open(array('url' => 'call/manage/save', 'method' => 'post')) !!}
                    <th width="10%">{!! Form::submit('save', ['class' => 'btn btn-default ']) !!}<br></th>
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
