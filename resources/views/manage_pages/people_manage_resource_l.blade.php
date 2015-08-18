@extends('manage_master')
@section('title')
    人員管理(地方)
@endsection
@section('link')
    <li>{!! Html::link('resource/manage/product/local', '物資管理') !!}</li>
    <li>{!! Html::link('resource/manage/people/local', '人員管理') !!}</li>
@endsection
@section('content')
    <div class="col-xs-8 col-sm-6 col-md-6" >
    {{--1.增援人員需求 (人數、人員背景) 地方指揮官--}}
    {{--2.查看報到志工人員資料--}}
    <table class="table table-striped">
        <thead>
            <tr><td colspan="2"><h5><b> 志工人員報到表</b></h5></td></tr>
            <tr><th>姓名</th><th>電話</th><th>Email</th><th>職位</th><th>技能</th><th>所在地</th><th></th></tr>
        </thead>
        <tbody>
        @if(isset($relieverFreeUsersArrays))
            @foreach($relieverFreeUsersArrays as $relieverFreeUsersArray)
            <tr>
                <td>{!! $relieverFreeUsersArray['name'] !!}</td>
                <td>{!! $relieverFreeUsersArray['phone'] !!}</td>
                <td>{!! $relieverFreeUsersArray['email'] !!}</td>
                @if($relieverFreeUsersArray['role_id'] == 5)
                    <td>脫困組</td>
                @elseif($relieverFreeUsersArray['role_id'] == 6)
                    <td>醫療組</td>
                @endif
                <td>{!! $relieverFreeUsersArray['skill'] !!}</td>
                <td>{!! $relieverFreeUsersArray['country_or_city_input'] ."". $relieverFreeUsersArray['township_or_district_input'] !!}</td>
                <td><button class="btn btn-default">報到</button></td>
            </tr>
            @endforeach
        @endif
        </tbody>
    </table>
    </div>
@endsection