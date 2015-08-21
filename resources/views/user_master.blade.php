<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@if (trim($__env->yieldContent('title'))) @yield('title') - @endif{{ Config::get('config.sitename') }}</title>
	<link href="{{ asset('/css/app.css') }}" rel="stylesheet">

	<!-- Fonts -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
    <style type="text/css">
        @yield('css')
    </style>
</head>
<body>
	<div class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
            <br>
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href=""><font size="10" color="#000"><b>RFS</b></font></a>
                <p class="navbar-text visible-lg ">救災資訊網</p>

            </div>
            <br><br><br>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav" id="nav_change">
                    <li class="@yield('home_active')">{!! link_to('/', '首頁') !!}</li>
                    <li class="@yield('guidance_active')">{!! link_to('guidance', '防災宣導') !!}</li>
                    <li class="@yield('guidance_map_active')">{!! link_to('#', '防災地圖') !!}</li>
                    <li class="@yield('call_input_active')">{!! link_to('call/input', '我要通報') !!}</li>
                    <li class="@yield('donate_input_active')">{!! link_to('donate/input', '我要捐贈') !!}</li>
                    <li class="@yield('application_active')">{!! link_to('application/input', '我要應徵人員') !!}</li>
                    <li class="@yield('missing_poster_input_active')">{!! link_to('missing_poster', '我要尋人') !!}</li>
                   

                </ul>

                <ul class="nav navbar-nav navbar-right">
                    <li>{!! link_to('login', '我要登入') !!}</li>

                    <li class="navbar-form"> 
                        <form action="search/" role="search">
                            <div class="form-group">
                                <input class="form-control" placeholder="Search" type="text" name="q" value="">
                            </div>
                            <div class="form-group">
                                <select class="form-control" name="type">
                                    <option value="">所有</option>
                                    <option value="blog.BlogPost">新聞</option>

                                    <option value="pages.Page">留言</option>

                                </select>
                            </div>
                            <button type="submit" class="btn btn-default">
                                <span class="glyphicon glyphicon-search"></span>
                            </button>
                        </form>
                    </li>
                   
                </ul>
            </div><!--/.nav-collapse -->
         </div>
    </div>
    <br><br><br><br><br><br><br><!--/.composing -->
    {{--<div class="col-xs-14 col-sm-11 col-md-11 middle" >--}}
    <div class="col-md-offset-1 col-md-10 middle" >
	    @yield('content')
    </div>
    <!-- Bootstrap core JavaScript
       ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    @yield('script')
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    @yield('javascript')

</body>
</html>
