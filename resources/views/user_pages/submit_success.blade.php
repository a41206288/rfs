@extends('user_master')
@section('title')

@endsection

@section('content')

    <br><br><br><br><br>
    <center>感謝您{{ $string  }}</center>
    <br>
    @if( isset($mission_id_string) )
        <center>{{ $mission_id_string  }}</center>
        <br>
        <center>請按<a href="http://localhost:8000/">返回</a>回到首頁</center>
    @else
        <center><div id="second"></div></center>
    @endif


@endsection


@section('javascript')
    <script language="JavaScript1.2" type="text/javascript">
        function delayURL(url, time) {
            document.getElementById('second').innerHTML = time/1000+"秒後將自動回到首頁";
            if(time == 1000){
                setTimeout("top.location.href='" + url + "'", time);
            }
            else{
                setTimeout(function(){delayURL(url, time-1000)}, 1000);
            }
        }
    </script>
    <script type="text/javascript">
        if(document.getElementById('second').length != 0){
            delayURL("http://localhost:8000/", 5000);
        }
    </script>
@endsection

