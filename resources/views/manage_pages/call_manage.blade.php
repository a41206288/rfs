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
                        {{--@foreach ($country_or_cities as $country_or_city)--}}

                    {{--<td>{!! $country_or_city!!}</td>--}}


                    {{--@endforeach--}}
                        @if (isset($country_or_city_inputs) && isset($township_or_district_inputs))

                            {{--@foreach ($missions as $mission)--}}
                                {{--{!! Form::select($mission->country_or_city_input,$mission->country_or_city_input) !!}--}}

                                {!! Form::select('country',$country_or_city_inputs,'請選擇')!!}
                                {!! Form::select('township',$township_or_district_inputs,'請選擇')!!}

                        @endif
                    </th>
                    {{--@endforeach--}}



                    <th width="10%">{!! Form::submit('save', ['class' => 'btn btn-default ']) !!}<br></th>
                </tr>

            </thead>
            <tbody>
            @if (isset($missions))

                    @foreach ($missions as $mission )
                        <tr>
                            @if (isset($mission) && $mission->mission_list_id==1 )
                            <td>{!! $mission->mission_id!!}</td>
                            <td>{!! $mission->mission_content!!}</td>
                            <td>{!! $mission->country_or_city_input." ".$mission->township_or_district_input." ".$mission->location!!}</td>
                                <td>{!! Form::select('mission_list',$mission_names, '請選擇') !!}</td>
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
