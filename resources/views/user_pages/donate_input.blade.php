@extends('user_master')
@section('title')
    捐贈物資
@endsection
@section('donate_input_active')
    active
@endsection
@section('css')
    table, td, th {
    border: 0px solid black;
    }

    td {
    padding: 5px;
    }
@endsection
@section('content')
    {{--<a href="#" data-toggle="tooltip" title="first tooltip">Hover over me</a>--}}
    {{--<div class="tooltip">--}}
         {{--<div class="tooltip-inner">--}}
                {{--Tooltip!--}}
              {{--</div>--}}
        {{--<div class="tooltip-arrow"></div>--}}

    {{--</div>--}}
    <h4><b>我要捐贈</b></h4><hr>

    <div class="col-xs-9 col-sm-7 col-md-7" >
        {!! Form::open(array('url' => 'donate/input', 'method' => 'post','class' => 'form-horizontal','onSubmit' => 'return checkForm();')) !!}
        <div class="col-xs-8 col-sm-6 col-md-6" >
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
        <div class="col-xs-8 col-sm-6 col-md-6" >

            <table id="donate_table">
                <thead>
                <tr><td colspan="4"><b>捐贈物資</b></td></tr>
                </thead>
            </table>


        </div>
        <div class="col-xs-16 col-sm-12 col-md-12 text-center">
            <hr>
            {!! Form::submit('送出', ['class' => 'btn btn-primary btn-sm']) !!}
        </div >
        {!! Form::close() !!}

    </div>
    <div class="col-xs-7 col-sm-5 col-md-5" >

        {{--<div style="height:400px;width:100%;overflow:auto;">--}}
            <table class="table table-condensed table-hover">
                <thead>
                    <tr><td colspan="6"><b>需求物資列表</b>(請在此選擇欲捐贈物品)</td></tr>
                    <tr><td>編號</td><td>物品名稱</td><td>需求數量</td><td>已認捐數</td><td>尚須數量</td><td>認捐</td></tr>
                </thead>
                <tbody id="needed">
                @if (isset($center_support_products) )
                    @foreach ($center_support_products as $center_support_product )
                        <div style="display: none">
                        {!!$n = $center_support_product->center_support_product_amount!!}
                        </div>
                            <tr>
                                <td>{!!$center_support_product->product_total_amount_id!!}</td>
                                <td>{!!$center_support_product->product_name!!}</td>
                                <td>{!!$center_support_product->center_support_product_amount ." ". $center_support_product->unit!!}</td>

                                @foreach ($donates as $donate )
                                    @if($donate->product_total_amount_id == $center_support_product->product_total_amount_id &&
                                    $donate->arrived == 0)
                                    {{--<tr>--}}
                                    {{--<td></td>--}}
                                    {{--<td>{!!$donate->lname!!} 先生/小姐 已捐贈</td>--}}
                                    {{--<td>{!!$donate->donate_amount." ".$center_support_product->unit!!}</td>--}}
                                    {{--</tr>--}}
                                        <div style="display: none">
                                            {!!$n = $n - $donate->donate_amount!!}
                                        </div>
                                    @endif
                                @endforeach
                                <td>{!!$center_support_product->center_support_product_amount-$n." ".$center_support_product->unit!!}</td>
                                <td>{!!$n." ".$center_support_product->unit!!}</td>
                                <td><a>詳細</a></td>

                        </tr>
                    @endforeach
                @endif

                </tbody>

            </table>

        {{--</div>--}}
    </div>

@endsection

@section('javascript')
    <script>
        /* 紀錄需求物資欄是否有點過 */
        var has_selected = new Array($('#needed tr.btn').length);
        for(var i = 0; i<has_selected.length; i++){
            has_selected[i] = false;
        }
        /* 需求物資點擊後觸發事件 */
        $('#needed tr').click(function () {
            var rowIndex = $('#needed tr').index(this); //取得tr的index
            var id = $('#needed tr').eq(rowIndex).find('td:eq(0)').text();
            var name = $('#needed tr').eq(rowIndex).find('td:eq(1)').text();
            var trLength = $('#needed tr').eq(rowIndex).find('td').length;
            var amount = $('#needed tr').eq(rowIndex).find('td:eq(4)').text();

            if(has_selected[rowIndex]){
                alert('您已經選擇了\' ' + name + ' \' ');
            }
            else{
                has_selected[rowIndex] = true;
                add_donate(id, name, amount, rowIndex);
            }
        });
        /* 刪除已選擇的物資 */
        $('#donate_table').on('click', 'input[type="button"]', function(e){
            $(this).closest('tr').remove();
            has_selected[$(this).closest('tr').attr('id')] = false;
        });

        /* 動態增加選擇的物資 */
        function add_donate(id,name,amount,index)
        {
            var obj=document.getElementById("donate_table");
            var tr = document.createElement("tr");
            tr.id = index;  //用在刪除的index
            var td = document.createElement("td");
            td.width = "40%";
            td.innerHTML = name;
            tr.appendChild(td);

            var td = document.createElement("td");
            td.width = "10%";
            tr.appendChild(td);

            var td = document.createElement("td");
            td.width = "40%";
            var select = document.createElement("select");
            select.setAttribute("class", "form-control");
            select.setAttribute("name", "product_name["+id+"]");
            for(var i = 1; i<=parseInt(amount); i++){
                var option = document.createElement("option");
                option.value = i;
                option.innerHTML = i;
                select.appendChild(option);
            }
            td.appendChild(select);
            tr.appendChild(td);

            var td = document.createElement("td");
            td.width = "10%";
            var input = document.createElement("input");
            input.setAttribute("class", "btn btn-sm");
            input.setAttribute("type", "button");
            input.value= "刪除";
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

        $('#example').tooltip(options);
    </script>
@endsection