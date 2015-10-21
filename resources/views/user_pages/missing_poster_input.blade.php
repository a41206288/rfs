@extends('user_master')
@section('title')
    尋人刊登
@endsection
@section('missing_poster_input_active')
    active
@endsection
@section('content')

    {{--this is to add missiing poster5--}}
    <div class="col-xs-10 col-sm-9 col-md-9" >
        <table class="table table-striped">

            <thead>
            <tr><td colspan="9"><h5><b>災民資料</b></h5></td></tr>
            <tr>
                {{--<th width="5%">編號</th>--}}
                <th width="10%">姓名</th>
                <th width="5%">性別</th>
                <th width="5%">年齡</th>
                <th width="15%">電話</th>
                {{--<td>住址</td>--}}
                {{--<td>身分證字號</td>--}}
                <th width="10%">傷重程度</th>
                <th width="20%">目前所在地點</th>
                <th width="10%">診斷日期</th>
                <th width="10%">診斷時間</th>
            </tr>

            </thead>
            <tbody id="victimTable">
            @if(isset($victim_details))
                @foreach($victim_details as $victim_detail)
                    <tr>
                        <td>{!! $victim_detail->name !!}</td>
                        <td>{!! $victim_detail->sex !!}</td>
                        <td>{!! $victim_detail->age !!}</td>
                        <td>{!! $victim_detail->phone !!}</td>
                        {{--<td>住址</td>--}}
                        {{--<td>身分證字號</td>--}}
                        @if($victim_detail->damage_level == 0)
                            <td>正常</td>
                        @elseif($victim_detail->damage_level == 1)
                            <td>輕傷</td>
                        @elseif($victim_detail->damage_level == 2)
                            <td>中傷</td>
                        @elseif($victim_detail->damage_level == 3)
                            <td>重傷</td>
                        @elseif($victim_detail->damage_level == 4)
                            <td>死亡</td>
                        @endif
                        <td>{!! $victim_detail->now_location !!}</td>
                        <td >{{ (new Carbon\Carbon($victim_detail->updated_at))->formatLocalized('%Y/%m/%d') }}</td>
                        <td >{{ (new Carbon\Carbon($victim_detail->updated_at))->formatLocalized('%H:%M:%S') }}</td>
                     </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>
    <div class="col-xs-6 col-sm-3 col-md-3" >
        <table class="table">
            {!! Form::open(array('url' => 'missing_poster', 'method' => 'post','id' => 'form', 'class' => 'form-horizontal','onSubmit' => 'return false;')) !!}
            <thead>
                <tr><td colspan="9"><h5><b>&nbsp;</b></h5></td></tr>
                <tr>
                    <th colspan="2">搜尋</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th width="40%" class="text-right">姓名</th><td  width="60%">{!! Form::text('name','',['id' =>  'name','class' => 'form-control']) !!}</td>
                </tr>
                <tr>
                    <th class="text-right">性別</th>
                    <td>{!! Form::select('sex', array('男' => '男', '女' => '女','其他' => '其他','' => '請選擇'),'',['id' =>  'sex','class' => 'form-control']) !!}</td>
                </tr>
                <tr>
                    <th class="text-right">年齡</th><td> {!! Form::number('age', '', ['id' =>  'age', 'class' => 'form-control', 'min'=>'0']) !!}</td>
                </tr>
                <tr>
                    <th class="text-right">身分證字號</th><td>{!! Form::text('person_id','',['id' =>  'person_id', 'class' => 'form-control']) !!}</td>
                </tr>
                <tr>
                    <th class="text-right">聯絡電話</th><td>{!! Form::text('phone','',['id' =>  'phone', 'class' => 'form-control']) !!}</td>
                </tr>
                <tr>
                    <th class="text-right">住址</th><td>{!! Form::text('address','',['id' =>  'address', 'class' => 'form-control']) !!}</td>
                </tr>
                <tr><td colspan="2" class="text-right"> {!! Form::submit('查詢', ['class' => 'btn btn-default btn-sm btn-primary','id' => 'testajax']) !!}</td></tr>
            </tbody>
            {!! Form::close() !!}
        </table>
    </div>


@endsection
@section('javascript')
    <script>
        {{--setInterval(function(){--}}
            {{--$.ajax({--}}
                {{--url: 'http://localhost:8000/missing_poster/update',--}}
                {{--type: 'POST',--}}
                {{--headers: {--}}
                    {{--'X-CSRF-Token': "{{ Session::token() }}"--}}
                {{--},--}}
                {{--data: {--}}
                    {{--name: "",--}}
                    {{--sex: "",--}}
                    {{--age: "",--}}
                    {{--person_id: "",--}}
                    {{--phone: "",--}}
                    {{--address: ""--}}
                {{--},--}}
                {{--success: function(response) {--}}
                    {{--updateTable(response);--}}
                {{--},--}}
                {{--error: function(xhr) {--}}
                    {{--alert('Ajax request 發生錯誤');--}}
                {{--}--}}
            {{--});--}}
        {{--}, 3000);--}}
        $('#testajax').click(function(){
//            alert($('#name').val());
            if( checkForm() ){
                $.ajax({
                    url: 'http://localhost:8000/missing_poster/update',
                    type: 'POST',
                    headers: {
                        'X-CSRF-Token': "{{ Session::token() }}"
                    },
                    data: {
                        name: $('#name').val(),
                        sex: $('#sex').val(),
                        age: $('#age').val(),
                        person_id: $('#person_id').val(),
                        phone: $('#phone').val(),
                        address: $('#address').val()
                    },
                    success: function(response) {
                        updateTable(response);
                    },
                    error: function(xhr) {
                        alert('Ajax request 發生錯誤');
                    }
                });
            }

        });
        function updateTable(victimData){
            var obj = document.getElementById("victimTable");
            while(obj.firstChild){
                obj.removeChild(obj.firstChild)
            }
            var DataLength = victimData.length;
            for(var i=0; i<DataLength; i++){
                var tr = document.createElement('tr');
                var td = document.createElement('td');
                td.innerHTML = victimData[i]['name'];
                tr.appendChild(td);
                var td = document.createElement('td');
                td.innerHTML = victimData[i]['sex'];
                tr.appendChild(td);
                var td = document.createElement('td');
                td.innerHTML = victimData[i]['age'];
                tr.appendChild(td);
                var td = document.createElement('td');
                td.innerHTML = victimData[i]['phone'];
                tr.appendChild(td);
                var td = document.createElement('td');
                switch(parseInt(victimData[i]['damage_level'])) {
                    case 0:
                        td.innerHTML = "正常";
                        break;
                    case 1:
                        td.innerHTML = "輕傷";
                        break;
                    case 2:
                        td.innerHTML = "中傷";
                        break;
                    case 3:
                        td.innerHTML = "重傷";
                        break;
                    case 4:
                        td.innerHTML = "死亡";
                        break;
                }
                tr.appendChild(td);
                var td = document.createElement('td');
                td.innerHTML = victimData[i]['now_location'];
                tr.appendChild(td);
                var datetime = victimData[i]['updated_at'].split(" ");
                var td = document.createElement('td');
                td.innerHTML = datetime[0];
                tr.appendChild(td);
                var td = document.createElement('td');
                td.innerHTML = datetime[1];
                tr.appendChild(td);
                obj.appendChild(tr);
            }

        }
        function checkForm(){
            var name = $('#name').val();
            var sex = $('#sex').val();
            var age = $('#age').val();
            var person_id = $('#person_id').val();
            var phone = $('#phone').val();
            var address = $('#address').val();
            if(name == "" && sex == "" && age == "" && person_id == "" && phone == "" && address == ""){
                alert("請輸入資料以進行查詢!!");
                return false;
            }
            else{
                return true;
            }
        }
    </script>
@endsection