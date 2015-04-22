<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>RFS</title>

    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">

    <!-- Fonts -->
    <link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

<div class="container col-md-3 col-md-offset-4">
    <br><br><br><br><br><br>
    {!! Form::open(array('url' => 'login', 'method' => 'post')) !!}


        <h2 class="form-signin-heading"><b>帳號登入</b></h2>
        {!! Form::email('email', null, ['id' => 'email', 'placeholder' => '請輸入信箱', 'class' => 'form-control', 'required']) !!}
        <br>
        {!! Form::password('password', ['id' => 'password', 'placeholder' => '請輸入密碼', 'class' => 'form-control', 'required']) !!}
        <br>
        <div class="form-group">
            {!! Form::checkbox('remember', 'remember', null, ['id' => 'remember']) !!}
            {!! Form::label('remember', '記住我') !!}
        </div>
        <br>
        <div class="text-right">
        {!! Form::submit('login', ['class' => 'btn btn-primary ']) !!}
        </div>

    {!! Form::close() !!}
</div> <!-- /container -->
<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="../../dist/js/bootstrap.min.js"></script>
</body>
</html>