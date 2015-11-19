
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
      <span class='badge'></span><span class="glyphicon glyphicon-user" aria-hidden="true">訊息</span>
  </button>
  <div id="Box0" class="contactBox collapse">
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

        <script> //對話相關script
            var url = window.location.href; //目前所在之URL
            getUsers();                //一進到此頁面先取得一次人員列表
            setInterval(function(){  //之後就每3秒更新一次
                getUsers();
            },3000);
            var box0 = $('#Box0');
            var box0_parent = box0.parent();
            //點下名字開啟對話
            box0.on('click','li a',function(){
                var this_object = $(this);
                var user_name = this_object.attr('name');
                var box_num = $('.chatBox').length;
                var box_id;
                var user_id = this_object.attr('id');
                if($("#chat" + user_id).length == 0){ //尚未開啟點擊對象之對話視窗
                    if(box_num < 4){  //已點開的對話視窗<4個
                        var has_add = false;
                        var count = 1;
                        while(!has_add){
                            if($("#Box" + count).length == 0){ //如果id為  "Box" + count   的視窗不存在
                                box_id = "Box" + count;
                                addChatBox(user_name, box_id, "chat" + user_id);
                                var chat_box_body = $("#Box" + count).find('.chatBox-body');
                                var interval_id = setUpdateWithInterval("chat" + user_id, user_id);
                                $("#"+box_id).attr('name',interval_id);
                                setTimeout(function(){chat_box_body.scrollTop(chat_box_body.prop("scrollHeight"))},2000); //2秒後將對話拉到最底下
                                has_add = true;
                            }
                            count++;
                        }
                    }
                    else{   //已點開的對話視窗不<4個
                        removeChatBox($('#Box4'), $('#Box4').attr('name'));  //移除第4個對話視窗
                        box_id = "Box4";
                        addChatBox(user_name, box_id, "chat" + user_id);
                        var chat_box_body = $("#Box4").find('.chatBox-body');
                        var interval_id = setUpdateWithInterval("chat" + user_id, user_id);
                        $("#"+box_id).attr('name',interval_id);
                        setTimeout(function(){chat_box_body.scrollTop(chat_box_body.prop("scrollHeight"))},2000);  //2秒後將對話拉到最底下
                    }
                }
            });
            //點下X關閉對話
            box0_parent.on('click','.glyphicon-remove',function(){
                var get_div = $(this).closest('div').parent(); //取得對話視窗最外層div
                removeChatBox(get_div, get_div.attr('name'));
            });
            //點擊 -
            box0_parent.on('click','.glyphicon-minus',function(){
                var get_div = $(this).closest('div').parent();
                var find_collapse_div = get_div.find('div').eq(1);
                //縮小視窗不繼續更新對話
                if(find_collapse_div.attr('class') == "panel-collapse collapse in"){
                    clearInterval(get_div.attr('name'));
                }
                //打開縮小的視窗繼續更新對話
                else{
                    var user_id = find_collapse_div.attr('id').split("chat");
                    var interval_id = setUpdateWithInterval("chat" + user_id[1], user_id[1]);
                    var div_id = get_div.attr('id');
                    var chat_box_body = $("#" + div_id).find('.chatBox-body');
                    $("#" + div_id).attr('name',interval_id);
                    setTimeout(function(){chat_box_body.scrollTop(chat_box_body.prop("scrollHeight"))},2000);
                }
            });
            //按下傳送
            box0_parent.on('click',".send_btn",function(){
                var this_object = $(this);
                var input_box = this_object.closest('div').find('input');
                var input_string = input_box.val();
                var user_id = this_object.attr('id').replace("send_message_button_", "");
                input_box.val(""); //清空對話輸入區
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
                            //alert('/sendMessage error');
                        }
                    });
                }
            });
            function addChatBox(name,box_id,collapse_id){ //DOM動態新增對話視窗
                var obj = document.getElementById("Box0").parentElement;
                //第一層div
                var chatBox = document.createElement('div');
                chatBox.className = "panel panel-default chatBox";
                chatBox.setAttribute('id',box_id);
                //第二層div
                var div = document.createElement('div');
                div.className = "panel-heading";
                var h4 = document.createElement('h4');
                h4.className = "panel-title";
                var span = document.createElement('span');
                span.className = "glyphicon glyphicon-user";
                span.setAttribute('style','width: 75%;');
                span.setAttribute('aria-hidden','true');
                span.innerHTML = name;
                var span_message_num = document.createElement('span');
                span_message_num.className = "badge";
                span_message_num.setAttribute('id','message_num_' + collapse_id.replace("chat",""));
                span_message_num.setAttribute('style','background-color: #ff0000;');
                span.appendChild(span_message_num);
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
                //第2層div
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
                button.className ="btn btn-default send_btn";
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
                var tbody_trs = tbody.find('tr');
                tbody_trs.remove();
                var string = "";
                for(var i=0; i<messages.length; i++){
                    //對方
                    if(messages[i]['user_id'] == user_id){
                        string = string + "<tr><td class='active'>" + messages[i]['message_content'] + "</td><th width='50%'></th></tr>";
                    }
                    //自己
                    else{
                        string = string + "<tr><th width='50%'></th><td class='info'>" + messages[i]['message_content'] + "</td></tr>";
                    }
                    string = string + "<tr><th></th><td></td></tr>";
                }
                tbody.append(string);
            }
            function setUpdateWithInterval(chat_id,user_id){ //設定更新對話視窗，回傳interval的id以方便找到此interval並停止它
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
                            //alert("function setUpdateWithInterval error");
                        }
                });
                },1000);
                return interval;
            }
            function getUsers(){
                $.ajax({
                    url: url + '/getUser',
                    type: 'GET',
                    headers: {
                        'X-CSRF-Token': "{{ Session::token() }}"
                    },
                    success: function(response) {
                        var contact_box_button = $('#contactBoxButton');
                        if(response['has_message_to_read'] ){
                            contact_box_button.css('background-color','#ff0000'); //訊息按鈕換成紅色
                            contact_box_button.find('span').eq(0).text("!"); //驚嘆號出現
                        }
                        else{
                            contact_box_button.css('background-color','#337ab7'); //訊息按鈕換成藍色
                            contact_box_button.find('span').eq(0).text(""); //驚嘆號消失
                        }
                        updateContactBox(response);
                    },
                    error: function(xhr) {
                        //alert('function getUsers error');
                    }
                });
            }
            function updateContactBox(response){
                box0.find('ul').find('li').remove(); //移除人員列表上所有人
                for(var i=0; i<response['users'].length; i++){ //印出讀取的人員列表
                    var string = "<li><a id='" + response['users'][i]['id'] + "' name='" + response['users'][i]['user_name'] + "'>" + response['users'][i]['user_name'] + "<span class='badge'>";
                    var chat_room_id  = response['users'][i]['chat_room_id'];
                    if(typeof response['message_num'][chat_room_id] != 'undefined' && response['message_num'][chat_room_id] != 0){ //讀取未讀訊息數
                        string = string + response['message_num'][chat_room_id];
                        show_message_num_on_chat_box(response['users'][i]['id'],response['message_num'][chat_room_id]);
                    }
                    else{
                        show_message_num_on_chat_box(response['users'][i]['id'],"");
                    }
                    string = string + "</span></a></li>";
                    box0.find('ul').append(string);
                }
            }
            function show_message_num_on_chat_box(user_id,message_num){
                if($('#chat' + user_id).length != 0){
                    $('#message_num_' + user_id).text(message_num);
                }
            }
        </script>
    </body>

</html>
