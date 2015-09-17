
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

    <!-- Fixed navbar -->
    <div class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
              @yield('link')
          </ul>

          <ul class="nav navbar-nav navbar-right">

              {{--{!! Form::open(array('route' => 'route.logout')) !!}--}}

                  {{--{!! Form::submit('logout', ['class' => 'btn btn-primary ']) !!}--}}

              {{--{!! Form::close() !!}--}}
            {{--<li><a href="#">helen</a></li>--}}

              {{--<!-- Logout -->           --}}
              {{--<li><a href="?logout=true">登出系統</a></li>--}}
              <li  class="navbar-text">{!! Auth::user()->name!!}</li>
              <li >{!! Html::link('logout', '登出') !!}</li>
              {{--{{ Auth::user()->name}} 已登入，{!! Html::link('logout', '登出') !!}--}}
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>
    <br><br><br><br>
    <div>
        <div class="col-xs-16 col-sm-12 col-md-12" >
            @yield('content')
        </div>
        <div class="col-xs-10 col-sm-7 col-md-7" >
            @yield('content_c7')
        </div>
        <div class="col-xs-6 col-sm-5 col-md-5">
            @yield('content_c5')
        </div>


    </div>



    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    @yield('script')
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    {{--<script src="../../dist/js/bootstrap.min.js"></script>--}}
    <link href="/css/jquery-ui.css" rel="stylesheet">
    <script type="text/javascript" src="/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/js/jquery-ui.min.js"></script>
    <script src="/js/holder.js"></script>
    <script src="/js/application.js"></script>
    @yield('javascript')

  </body>
</html>
