@extends('user_master')
@section('title')
    捐贈物資
@endsection
@section('donate_input_active')
    active
@endsection
@section('content')
    <style>
        table, td, th {
            border: 0px solid black;
        }

        td {
            padding: 5px;
        }
    </style>
    <h4><b>我要捐贈</b></h4><hr>
    {!! Form::open(array('url' => 'donate/input', 'method' => 'post','class' => 'form-horizontal','onSubmit' => 'return checkForm();')) !!}
    <div class="col-xs-6 col-sm-4 col-md-4" >
        <table>
            <tr><td colspan="2"><b>捐贈人資料</b></td></tr>
            <tr>
                <td width="20%"><font color="#ff0b11">*</font>姓氏</td><td  width="80%">{!! Form::text('lname','',['class' => 'form-control', 'required','id' => 'lname']) !!}</td>
            </tr>
            <tr>
                <td>名字</td><td>{!! Form::text('fname','',['class' => 'form-control']) !!}</td>
            </tr>
            <tr>
                <td>聯絡電話</td><td>{!! Form::text('phone','',['class' => 'form-control','id' => 'phone','placeholder' => '市話 或是 手機']) !!}</td>
            </tr>
            <tr>
                <td>E-mail</td><td>{!! Form::text('email','',['class' => 'form-control','type'=>'email','id' => 'email']) !!}</td>
            </tr>

            <tr>
                <td colspan="2"><font color="#ff0b11">※</font> 至少填寫1項聯絡方式，以方便我們聯絡您</td>
            </tr>
            <tr>
                <td colspan="2"><font color="#ff0b11">*</font> 請務必填寫</td>
            </tr>

        </table>
    </div>
    <div class="col-xs-6 col-sm-4 col-md-4" >

        <table id="donate_table">
            <thead>
            <tr><td colspan="2"><b>捐贈物資</b></td></tr>
            </thead>

            {{--<tr id="物資名稱1">--}}
                {{--<td width="20%">物資名稱1</td><td width="10%"></td><td width="15%"> {!! Form::selectRange('number', 10, 20,'',['class' => 'form-control'])!!}</td>--}}
                {{--<td width="5%"><input class="btn" type="button" value="刪除"/></td>--}}
            {{--</tr>--}}
            {{--<tr id="物資名稱2">--}}
                {{--<td width="20%">物資名稱2</td><td width="10%"></td><td width="15%"> {!! Form::selectRange('number', 10, 20,'',['class' => 'form-control'])!!}</td>--}}
                {{--<td width="5%"><input class="btn" type="button" value="刪除" onclick="remove_donate()" /></td>--}}
            {{--</tr>--}}






        </table>
        <hr/>
        {{-- 暫時加上submit看要不要換地方 --}}
        {!! Form::submit('送出', ['class' => 'btn btn-primary btn-sm']) !!}

    </div>
    {!! Form::close() !!}
    <div class="col-xs-6 col-sm-4 col-md-4" >
        <div style="height:400px;width:100%;overflow:auto;">
        <table class="btn-group-vertical" id="needed">
            <thead><tr><td colspan="2"><b>需求物資列表</b>(請在此選擇欲捐贈物品)</td></tr></thead>
            <tbody>
                <tr class="btn btn-block btn-default btn-sm"><td width="20%">泡麵</td><td width="10%"></td><td width="10%">99</td></tr>
                <tr class="btn btn-block btn-default btn-sm"><td width="20%">礦泉水</td><td width="10%"></td><td width="10%">95</td></tr>
                <tr class="btn btn-block btn-default btn-sm"><td width="20%">麵包</td><td width="10%"></td><td width="10%">66</td></tr>
                <tr class="btn btn-block btn-default btn-sm"><td width="20%">繃帶</td><td width="10%"></td><td width="10%">51</td></tr>
                <tr class="btn btn-block btn-default btn-sm"><td width="20%">口糧</td><td width="10%"></td><td width="10%">35</td></tr>
                <tr class="btn btn-block btn-default btn-sm"><td width="20%">雨衣</td><td width="10%"></td><td width="10%">37</td></tr>
                <tr class="btn btn-block btn-default btn-sm"><td width="20%">手電筒</td><td width="10%"></td><td width="10%">10</td></tr>
                <tr class="btn btn-block btn-default btn-sm"><td width="20%">垃圾袋</td><td width="10%"></td><td width="10%">20</td></tr>
                <tr class="btn btn-block btn-default btn-sm"><td width="20%">衛生紙</td><td width="10%"></td><td width="10%">15</td></tr>
                <tr class="btn btn-block btn-default btn-sm"><td width="20%">薄被子</td><td width="10%"></td><td width="10%">5</td></tr>
            </tbody>




        </table>
        </div>
    </div>
@endsection

@section('javascript')
    <script>
        /* 紀錄需求物資欄是否有點過 */
        var has_selected = new Array($('#needed tr').length-1);  //扣掉標題
        for(var i = 0; i<has_selected.length; i++){
            has_selected[i] = false;
        }
        /* 需求物資點擊後觸發事件 */
        $('#needed tr').click(function () {
            var rowIndex = $('#needed tr').index(this); //取得tr的index
            if(rowIndex==0){}  //標題tr不做任何事
            else if(has_selected[rowIndex]){
                alert('您已經選擇了\' ' + $('#needed').find('tr').eq(rowIndex).find('td:eq(0)').text() + ' \' ');
            }
            else{
                has_selected[rowIndex] = true;
                add_donate($('#needed').find('tr').eq(rowIndex).find('td:eq(0)').text(), $('#needed').find('tr').eq(rowIndex).find('td:eq(2)').text(),rowIndex);
            }

        });
        /* 刪除已選擇的物資 */
        $('#donate_table').on('click', 'input[type="button"]', function(e){
            $(this).closest('tr').remove();
            has_selected[$(this).closest('tr').attr('id')] = false;
        });

        /* 動態增加選擇的物資 */
        function add_donate(name,amount,index)
        {
            var obj=document.getElementById("donate_table");
            var tr = document.createElement("tr");
            tr.id = index;  //用在刪除的index
            var td = document.createElement("td");
            td.width = "20%";
            td.innerHTML = name;
            tr.appendChild(td);

            var td = document.createElement("td");
            td.width = "10%";
            tr.appendChild(td);

            var td = document.createElement("td");
            td.width = "15%";
            var select = document.createElement("select");
            select.setAttribute("class", "form-control");
            select.setAttribute("name", "number");
            for(var i = 1; i<=parseInt(amount); i++){
                var option = document.createElement("option");
                option.value = i;
                option.innerHTML = i;
                select.appendChild(option);
            }
            td.appendChild(select);
            tr.appendChild(td);

            var td = document.createElement("td");
            td.width = "5%";
            var input = document.createElement("input");
            input.setAttribute("class", "btn");
            input.setAttribute("type", "button");
            input.value = "刪除";
            td.appendChild(input);
            tr.appendChild(td);
            obj.appendChild(tr);

        }


        function checkForm()
        {
            if($('#phone').val() == "" && $('#email').val()=="")
            {
                alert("至少填寫1項聯絡方式");
                $('#phone').focus();
                return false;
            }
            if( !isPhone( $('#phone').val() ) )
            {
                $('#phone').focus();
                return false;
            }
            if( $('#email').val() != "" && !isEmail( $('#email').val() ) )
            {
                $('#email').focus();
                return false;
            }
            if($('#donate_table tr').length<2)
            {
                alert("請選擇要捐贈的物資");
                return false;
            }
            return true;
        }

        function isPhone(phoneNum) {
            if(phoneNum!=''){
                if(phoneNum.length == 10){
                    var regex = /^0[249]{1}[0-9]{8}$/;
                    if( !regex.test(phoneNum)){
                        alert("電話格式有誤，請檢查是否輸入正確");
                        return false;
                    }
                    else{
                        return true;
                    }
                }
                else if(phoneNum.length == 9){
                    var regex = /^0[345678]{1}[0-9]{7}$/;
                    if( !regex.test(phoneNum)){
                        alert("電話格式有誤，請檢查是否輸入正確");
                        return false;
                    }
                    else{
                        return true;
                    }
                }
                else{
                    alert("您輸入了" + phoneNum.length + "碼電話號碼\n請再次檢查您輸入的資料是否有誤\n若為市話請記得加上區碼");
                    return true;
                }
            }
            return true;
        }

        function isEmail(email) {
            var regex = /^[A-Za-z0-9]\w*[A-Za-z0-9]\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z]+$/;
            if ( !regex.test(email) ) {
                alert("信箱格式不正確");
                return false;
            }
            else{
                return true;
            }
        }
    </script>
@endsection