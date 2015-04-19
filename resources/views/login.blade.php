
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

<div class="container col-md-3 col-md-offset-5 ">
    <br><br><br><br><br>
    <form class="form-signin" role="form">
        <h2 class="form-signin-heading">登入帳號</h2>
        <br>
        <input type="email" class="form-control" placeholder="Email address" required autofocus>
        <br>
        <input type="password" class="form-control" placeholder="Password" required>
        <br>
        <div  class="col-md-offset-1 ">
            <label class="checkbox">
                <input type="checkbox" value="remember-me">記住我
            </label>
        </div>
        <br>
        <button class="btn btn-lg btn-primary btn-block" type="submit">登入</button>
    </form>

</div> <!-- /container -->


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="../../dist/js/bootstrap.min.js"></script>
</body>
</html>
