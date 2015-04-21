<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Blog Login</title>
    <style type="text/css">
        .fail {width:200px; margin: 20px auto; color: red;}
        form {font-size:16px; color:#999; font-weight: bold;}
        form {width:160px; margin:20px auto; padding: 10px; border:1px dotted #ccc;}
        form input[type="text"], form input[type="password"] {margin: 2px 0 20px; color:#999;}
        form input[type="submit"] {width: 100%; height: 30px; color:#666; font-size:16px;}
    </style>
</head>
<body>
@if ($errors->has('fail'))
    <div class="fail">{{ $errors->first('fail') }}</div>
@endif
{{ Form::open(['url'=>'login', 'method'=>'post']) }}
{{ Form::label('email', 'Email') }}
{{ Form::text('email') }}
{{ Form::label('password', 'Password') }}
{{ Form::password('password') }}
{{ Form::submit('Login') }}
{{ Form::close() }}
</body>
</html>