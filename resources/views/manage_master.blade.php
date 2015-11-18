
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
              div#Box0 {
              right:0px;
          }
          div#Box1 {
              right:225px;
          }
          div#Box2 {
              right:500px;
          }
          div#Box3 {
              right:775px;
          }
          div#Box4 {
              right:1050px;
          }
          .contactBox {
              position:absolute;
          {{--background-color:red;--}}
              z-index:2;
              position:fixed;
              top:50px;
          {{--right:200px;--}}
              width:200px;
              height:100%;
              margin-bottom: 0px;
              background-color: #ffffff;
              border: 1px solid transparent;
              border-radius: 4px;
              box-shadow: 0 1px 1px rgba(0, 0, 0, 0.05);
              border-color: #dddddd;
              overflow-y: scroll;
          }
          .contactBox ul li{
              background-color: #f5f5f5;
          }
          .chatBox {
              position:absolute;
          {{--background-color:red;--}}
              z-index:2;
              position:fixed;
              bottom:0px;
          {{--right:200px;--}}
              width:250px;
              margin-bottom: 0px;
              background-color: #ffffff;
              border: 1px solid transparent;
              border-radius: 4px;
              box-shadow: 0 1px 1px rgba(0, 0, 0, 0.05);
              border-color: #dddddd;
          }
          .contactBoxButton {
              position:absolute;
              z-index:3;
              position:fixed;
              bottom:0px;
              right: 0;
              margin-bottom: 0px;
              border: 1px solid transparent;
          }
          .chatBox-body {
              padding: 5px;
              height: 225px;
              overflow-y: scroll;
          {{--margin-bottom: 5px;--}}
          {{--margin-top: 5px;--}}
          {{--background-color: #f5f5f5;--}}
          }
          .chatBox-heading {
              padding: 10px 15px;
              border-bottom: 1px solid transparent;
              border-top-right-radius: 3px;
              border-top-left-radius: 3px;
              color: #333333;
              background-color: #f5f5f5;
              border-color: #dddddd;
          }
          .chatBox > input {
              position:absolute;
              bottom:0px;
          }
      </style>
  </head>

  <body>
  <button id="contactBoxButton" class="btn btn-primary btn-sm contactBoxButton" type="button" data-toggle="collapse" data-target="#Box0" aria-expanded="false" aria-controls="collapseExample">
      <span class="glyphicon glyphicon-user" aria-hidden="true"></span>訊息
  </button>
  <div id="Box0" class="collapse contactBox">
      <ul class="nav nav-pills nav-stacked">
          {{--<li class="active"><a>聯絡人</a></li>--}}
      </ul>
  </div>
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
    <br><br><br>
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

        <div class="modal fade" id="error_Modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">錯誤訊息</h4>
                    </div>
                    <div id="error_Modal_content" class="modal-body">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">關閉</button>
                        {{--<button type="button" class="btn btn-primary">Save changes</button>--}}
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

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
  <script>
      var url = window.location.href; //目前所在之URL
      //讀取人員姓名
      $('#contactBoxButton').one('click',function(){
          $.ajax({
              url: url + '/getUser',
              type: 'GET',
              headers: {
                  'X-CSRF-Token': "{{ Session::token() }}"
              },
              success: function(response) {
                  for(var i=0; i<response.length; i++){
                      var string = "<li><a id='" + response[i]['id'] + "' name='" + response[i]['user_name'] + "'>" + response[i]['user_name'] + "<span class='badge'>1</span></a></li>";
                      $('#Box0').find('ul').append(string);
                  }
              },
              error: function(xhr) {
                  alert('Ajax request 發生錯誤');
              }
          });
      });
      //點下名字開啟對話
      $('#Box0').on('click','li a',function(){
          var user_name = $(this).attr('name');
          var box_num = $('.chatBox').length;
          var box_id;
          var user_id = $(this).attr('id');
          if($("#chat" + user_id).length == 0){ //尚未開啟點擊對象之對話視窗
              if(box_num < 4){
                  var has_add = false;
                  var count = 1;
                  while(!has_add){
                      if($("#Box" + count).length == 0){
                          box_id = "Box" + count;
                          addChatBox(user_name, box_id, "chat" + user_id);
                          var interval_id = setUpdateWithInterval("chat" + user_id, user_id);
                          $("#"+box_id).attr('name',interval_id);
                          has_add = true;
                      }
                      count++;
                  }
              }
              else{
                  removeChatBox($('#Box4'), $('#Box4').attr('name'));
                  box_id = "Box4";
                  addChatBox(user_name, box_id, "chat" + user_id);
                  var interval_id = setUpdateWithInterval("chat" + user_id, user_id);
                  $("#"+box_id).attr('name',interval_id);
              }
          }
      });
      //點下X關閉對話
      $('#Box0').parent().on('click','.glyphicon-remove',function(){
          var get_div = $(this).closest('div').parent();
          removeChatBox(get_div, get_div.attr('name'));
      });
      //按下傳送
      $('#Box0').parent().on('click',"button[name='send_message_button']",function(){
          var input_string = $(this).closest('div').find('input').val();
          var user_id = $(this).attr('id').replace("send_message_button_", "");
          $(this).closest('div').find('input').val("");
          if(input_string != ""){
              $.ajax({
                  url: url + '/sendMessage',
                  type: 'POST',
                  headers: {
                      'X-CSRF-Token': "{{ Session::token() }}"
                  },
                  data:{
                      message: input_string,
                      user_id: user_id
                  },
                  success: function(response) {

                  },
                  error: function(xhr) {
                      alert('Ajax request 發生錯誤');
                  }
              });
          }
      });
      function addChatBox(name,box_id,collapse_id){
          var obj = document.getElementById("Box0").parentElement;

          var chatBox = document.createElement('div');
          chatBox.className = "panel panel-default chatBox";
          chatBox.setAttribute('id',box_id);

          var div = document.createElement('div');
          div.className = "panel-heading";
          var h4 = document.createElement('h4');
          h4.className = "panel-title";
          var span = document.createElement('span');
          span.className = "glyphicon glyphicon-user";
          span.setAttribute('style','width: 75%;');
          span.setAttribute('aria-hidden','true');
          span.innerHTML = name;
          h4.appendChild(span);
          var button = document.createElement('button');
          button.className = "btn btn-default btn-xs";
          button.setAttribute('type','button');
          button.setAttribute('data-toggle','collapse');
          button.setAttribute('data-target','#' + collapse_id);
          button.setAttribute('aria-expanded','true');
          button.setAttribute('aria-controls',collapse_id);
          var span = document.createElement('span');
          span.className = "glyphicon glyphicon-minus";
          button.appendChild(span);
          h4.appendChild(button);
          var button = document.createElement('button');
          button.className = "btn btn-default btn-xs";
          button.setAttribute('type','button');
          var span = document.createElement('span');
          span.className = "glyphicon glyphicon-remove";
          button.appendChild(span);
          h4.appendChild(button);
          div.appendChild(h4);
          chatBox.appendChild(div);

          var collapse = document.createElement('div');
          collapse.className = "panel-collapse collapse in";
          collapse.setAttribute('id',collapse_id);
          var div = document.createElement('div');
          div.className = "panel-body chatBox-body";
          var table = document.createElement('table');
          table.className = "table table-nonbordered";
          var tbody = document.createElement('tbody');
          table.appendChild(tbody);
          div.appendChild(table);
          collapse.appendChild(div);
          var div = document.createElement('div');
          div.className = "input-group";
          var input = document.createElement('input');
          input.className = "form-control";
          div.appendChild(input);
          var span = document.createElement('span');
          span.className ="input-group-btn";
          var button = document.createElement('button');
          button.className ="btn btn-default";
          button.setAttribute('name','send_message_button');
          button.setAttribute('id','send_message_button_' + collapse_id.replace("chat",""));
          button.innerHTML ="傳送";
          span.appendChild(button);
          div.appendChild(span);
          collapse.appendChild(div);
          chatBox.appendChild(collapse);

          obj.appendChild(chatBox);
      }
      function removeChatBox(box,interval){
          box.remove();               //關閉對話視窗
          clearInterval(interval);   //關閉interval
      }
      function updateChatBox(messages,chat_id,user_id){
          var tbody = $("#"+chat_id).find('tbody');
          tbody.find('tr').remove();
          for(var i=0; i<messages.length; i++){
              //對方
              if(messages[i]['user_id'] == user_id){
                  tbody.append("<tr></tr>");
                  var tr_num = tbody.find('tr').length;
                  tbody.find('tr').eq(tr_num-1).append("<td class='active'>" + messages[i]['message_content'] + "</td>");
                  tbody.find('tr').eq(tr_num-1).append("<th width='70px'></th>");
              }
              //自己
              else{
                  tbody.append("<tr></tr>");
                  var tr_num = tbody.find('tr').length;
                  tbody.find('tr').eq(tr_num-1).append("<th width='70px'></th>");
                  tbody.find('tr').eq(tr_num-1).append("<td class='info'>" + messages[i]['message_content'] + "</td>");
              }
              tbody.append("<tr><th></th><td></td></tr>");
          }


      }
      function setUpdateWithInterval(chat_id,user_id){
          var interval = setInterval(function(){
              $.ajax({
                  url: url + '/updateChatRoom',
                  type: 'POST',
                  headers: {
                      'X-CSRF-Token': "{{ Session::token() }}"
                  },
                  data:{
                      user_id: user_id
                  },
                  success: function(response) {
                      updateChatBox(response,chat_id,user_id);
                  },
                  error: function(xhr) {

                  }
              });
          },1000);
          return interval;
      }
  </script>
  </body>
</html>
