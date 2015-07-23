@extends('user_master')
@section('title')

@endsection

@section('content')

    <br><br><br><br><br>
    <center>感謝您{{ $string  }}</center>
    <br>
    <center>5秒鐘之後將自動回到原本頁面</center>

@endsection


@section('javascript')
    <script language="JavaScript1.2" type="text/javascript">
        function delayURL(url, time) {
            setTimeout("top.location.href='" + url + "'", time);
        }
    </script>
    <script type="text/javascript">
        delayURL("input", 5000);
    </script>
@endsection

