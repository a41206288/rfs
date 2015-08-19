@extends('user_master')
@section('title')
    人員招募
@endsection
@section('application_active')
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
    <h4><b>我要應徵</b></h4><hr>


    <div class="col-xs-12 col-sm-8 col-md-8" >
        {!! Form::open(array('url' => 'application/input', 'method' => 'post','class' => 'form-horizontal', 'id' => 'formInput', 'onSubmit' => 'return checkForm();')) !!}
        <div class="col-xs-12 col-sm-8 col-md-8" >
            <table>
                <tr><td colspan="2"><b>個人資料</b></td></tr>
                <tr>
                    <td width="30%"><font color="#ff0b11">*</font>姓名</td><td  width="70%" colspan="2">{!! Form::text('name','',['class' => 'form-control', 'required']) !!}</td>
                </tr>

                <tr>
                    <td><font color="#ff0b11">※</font>聯絡電話</td><td colspan="2">{!! Form::text('phone','',['class' => 'form-control', 'id' => 'phone', 'required']) !!}</td>
                </tr>
                <tr>
                    <td><font color="#ff0b11">※</font>E-mail</td><td colspan="2">{!! Form::text('email','',['class' => 'form-control','type'=>'email', 'id' => 'email', 'required']) !!}</td>
                </tr>
                <tr>
                    <td width="30%"><font color="#ff0b11">*</font>目前所在地點</td>
                    <td width="35%"><select class="form-control " name="country_or_city" id="country_or_city" onchange="country_onchange()" >
                            <option value="">請選擇縣/市</option>
                        </select></td>
                    <td width="35%"><select class="form-control" name="township_or_district" id="township_or_district">
                            <option value="">請選擇鄉鎮區</option>
                        </select></td>
                </tr>
                <tr><td><br></td></tr>
                <tr>
                    <td colspan="3"><font color="#ff0b11">※</font> 至少填寫1項聯絡方式，以方便我們聯絡您</td>
                </tr>
                <tr>
                    <td colspan="3"><font color="#ff0b11">*</font> 請務必填寫</td>
                </tr>

            </table>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4" >
            <table>
                <tr><td colspan="3"><b>您選擇的志工種類</b></td></tr>
                <tr><td><input type="hidden" value="-1" id="center_support_person_id" name="center_support_person_id"></td><td colspan="2" id="choose">尚未選擇</td></tr>
                <tr><td colspan="3"><br></td></tr>
                <tr><td colspan="3"><b>特殊技能 </b>( 此欄為選填 )</td></tr>
                <tr>
                    <td></td><td  colspan="2">{!! Form::textarea('skill','',['class' => 'form-control', 'id' => 'skill','style'=>'resize: vertical']) !!}</td>
                </tr>
            </table>
        </div>

        <div class="col-xs-16 col-sm-12 col-md-12 text-center">
            <hr>
            {!! Form::submit('送出', ['class' => 'btn btn-primary btn-sm']) !!}
        </div >
        {!! Form::close() !!}
    </div>
    <div class="col-xs-4 col-sm-4 col-md-4" >
        <div style="height:400px;width:100%;overflow:auto;">
            <table class="btn-group-vertical">
                <thead><tr><td colspan="2"><b>應徵志工種類</b>(請在此選擇欲應徵的志工種類)</td></tr></thead>
                <tbody id="needed">
                @if(isset($center_support_people))
                    @foreach($center_support_people as $center_support_person)
                        <tr class="btn btn-block btn-default btn-sm">
                            <td><input type="hidden" value="{!! $center_support_person->center_support_person_id !!}"/></td>
                            <td>{!!$center_support_person->center_support_person_requirement ." ". $center_support_person->center_support_person_num!!} 人</td>

                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>


@endsection

@section('javascript')
    <script>
        $('#needed tr').click(function () {
            var rowIndex = $('#needed tr').index(this); //取得tr的index
            var choose_type = $('#needed').find('tr').eq(rowIndex).find('td:eq(1)').text();
            var string_index = choose_type.search("的人");
            choose_type = choose_type.slice(0,string_index+2);
            $('#choose').text(choose_type);
            $('#center_support_person_id').attr("value", $('#needed').find('tr').eq(rowIndex).find('td:eq(0)').find('input').attr("value"));
        });
        function checkForm()
        {
            if( !isPhone( $('#phone').val() ) )
            {
                $('#phone').focus();
                return false;
            }
            if( !isEmail( $('#email').val() ) )
            {
                $('#email').focus();
                return false;
            }
            if($('#choose').text() == "尚未選擇")
        {
            alert("請在右方的志工種類中，選擇您要應徵的類型");
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
    <script>
        counrty_array = new Array('請選擇縣市','台北市','基隆市','新北市','宜蘭縣','新竹市','新竹縣','桃園縣','苗栗縣','台中市','彰化縣',
                '南投縣','嘉義市','嘉義縣','雲林縣','台南市','高雄市','屏東縣','台東縣','花蓮縣','澎湖縣','金門縣','連江縣');
        township_array = new Array(counrty_array.length);
        for(var i = 0; i < counrty_array.length; i++){
            township_array[i] = new Array();
        }
        township_array[0] = new Array("請選擇區");
        township_array[1] = new Array("中正區", "大同區", "中山區", "松山區", "大安區", "萬華區", "信義區","士林區", "北投區",
                "內湖區", "南港區", "文山區");
        township_array[2] = new Array("仁愛區", "信義區", "中正區", "中山區", "安樂區", "暖暖區", "七堵區");
        township_array[3] = new Array("萬里區", "金山區", "板橋區", "汐止區", "深坑區", "石碇區", "瑞芳區","平溪區", "雙溪區",
                "貢寮區", "新店區", "坪林區", "烏來區", "永和區","中和區", "土城區", "三峽區", "樹林區",
                "鶯歌區", "三重區", "新莊區","泰山區", "林口區", "蘆洲區", "五股區", "八里區", "淡水區",
                "三芝區", "石門區");
        township_array[4] = new Array("宜蘭市", "頭城鎮", "礁溪鄉", "壯圍鄉", "員山鄉", "羅東鎮", "三星鄉", "大同鄉", "五結鄉",
                "冬山鄉", "蘇澳鎮", "南澳鄉", "釣魚台");
        township_array[5] = new Array("東區", "北區", "香山區");
        township_array[6] = new Array("竹北市", "湖口鄉", "新豐鄉", "新埔鎮", "關西鎮", "芎林鄉", "寶山鄉", "竹東鎮", "五峰鄉",
                "橫山鄉", "尖石鄉", "北埔鄉", "峨嵋鄉");
        township_array[7] = new Array("中壢市", "平鎮市", "龍潭鄉", "楊梅市", "新屋鄉", "觀音鄉", "桃園市", "龜山鄉", "八德市",
                "大溪鎮", "復興鄉", "大園鄉", "蘆竹市");
        township_array[8] = new Array("竹南鎮", "頭份鎮", "三灣鄉", "南庄鄉", "獅潭鄉", "後龍鎮", "通霄鎮", "苑裡鎮", "苗栗市",
                "造橋鄉", "頭屋鄉", "公館鄉", "大湖鄉", "泰安鄉", "鉰鑼鄉", "三義鄉", "西湖鄉", "卓蘭鎮");
        township_array[9] = new Array("中區", "東區", "南區", "西區", "北區", "北屯區", "西屯區", "南屯區", "太平區", "大里區",
                "霧峰區", "烏日區", "豐原區", "后里區", "石岡區", "東勢區", "和平區", "新社區", "潭子區",
                "大雅區", "神岡區", "大肚區", "沙鹿區", "龍井區", "梧棲區", "清水區", "大甲區", "外圃區",
                "大安區");
        township_array[10] = new Array("彰化市", "芬園鄉", "花壇鄉", "秀水鄉", "鹿港鎮", "福興鄉", "線西鄉", "和美鎮", "伸港鄉",
                "員林鎮", "社頭鄉", "永靖鄉", "埔心鄉", "溪湖鎮", "大村鄉", "埔鹽鄉", "田中鎮", "北斗鎮",
                "田尾鄉", "埤頭鄉", "溪州鄉", "竹塘鄉", "二林鎮", "大城鄉", "芳苑鄉", "二水鄉");
        township_array[11] = new Array("南投市", "中寮鄉", "草屯鎮", "國姓鄉", "埔里鎮", "仁愛鄉", "名間鄉", "集集鄉", "水里鄉",
                "魚池鄉", "信義鄉", "竹山鎮", "鹿谷鄉");
        township_array[12] = new Array("東區", "西區");
        township_array[13] = new Array("番路鄉", "梅山鄉", "竹崎鄉", "阿里山鄉", "中埔鄉", "大埔鄉", "水上鄉", "鹿草鄉", "太保市",
                "朴子市", "東石鄉", "六腳鄉", "新港鄉", "民雄鄉", "大林鎮", "溪口鄉", "義竹鄉", "布袋鎮");
        township_array[14] = new Array("斗南鎮", "大埤鄉", "虎尾鎮", "土庫鎮", "褒忠鄉", "東勢鄉", "臺西鄉", "崙背鄉", "麥寮鄉",
                "斗六市", "林內鄉", "古坑鄉", "莿桐鄉", "西螺鎮", "二崙鄉", "北港鎮", "水林鄉", "口湖鄉", "四湖鄉", "元長鄉");
        township_array[15] = new Array("中西區", "東區", "南區", "北區", "安平區", "安南區", "永康區", "歸仁區", "新化區", "左鎮區",
                "玉井區", "楠西區", "南化區", "仁德區", "關廟區", "龍崎區", "官田區", "麻豆區", "佳里區", "西港區",
                "七股區", "將軍區", "學甲區", "北門區", "新營區", "後壁區", "白河區", "東山區", "六甲區", "下營區",
                "柳營區", "鹽水區", "善化區", "大內區", "山上區", "新市區", "安定區");
        township_array[16] = new Array("新興區", "前金區", "苓雅區", "鹽埕區", "鼓山區", "旗津區", "前鎮區", "三民區", "楠梓區",
                "小港區", "左營區", "仁武區", "大社區", "東沙群島", "南沙群島", "岡山區", "路竹區", "阿蓮區", "田寮區",
                "燕巢區", "橋頭區", "梓官區", "彌陀區", "永安區", "湖內區", "鳳山區", "大寮區", "林園區", "鳥松區",
                "大樹區", "旗山區", "美濃區", "六龜區", "內門區", "杉林區", "甲仙區", "桃源區", "那瑪夏區", "茂林區", "茄萣區");
        township_array[17] = new Array("屏東市", "三地門鄉", "霧臺鄉", "瑪家鄉", "九如鄉", "里港鄉", "高樹鄉", "鹽埔鄉", "長治鄉",
                "麟洛鄉", "竹田鄉", "內埔鄉", "萬丹鄉", "潮州鎮", "泰武鄉", "來義鄉", "萬巒鄉", "嵌頂鄉", "新埤鄉",
                "南州鄉", "林邊鄉", "東港鎮", "琉球鄉", "佳冬鄉", "新園鄉", "枋寮鄉", "枋山鄉", "春日鄉", "獅子鄉",
                "車城鄉", "牡丹鄉", "恆春鎮", "滿州鄉");
        township_array[18] = new Array("臺東市", "綠島鄉", "蘭嶼鄉", "延平鄉", "卑南鄉", "鹿野鄉", "關山鎮", "海端鄉", "池上鄉",
                "東河鄉", "成功鎮", "長濱鄉", "太麻里鄉", "金峰鄉", "大武鄉", "達仁鄉");
        township_array[19] = new Array("花蓮市", "新城鄉", "秀林鄉", "吉安鄉", "壽豐鄉", "鳳林鎮", "光復鄉", "豐濱鄉", "瑞穗鄉",
                "萬榮鄉", "玉里鎮", "卓溪鄉", "富里鄉");
        township_array[20] = new Array("馬公市", "西嶼鄉", "望安鄉", "七美鄉", "白沙鄉", "湖西鄉");
        township_array[21] = new Array("金沙鎮", "金湖鎮", "金寧鄉", "金城鎮", "烈嶼鄉", "烏坵鄉");
        township_array[22] = new Array("南竿鄉", "北竿鄉", "莒光鄉", "東引鄉");

        $("#country_or_city option").remove();
        for (j = 0; j < counrty_array.length; j ++) {
            $("#country_or_city").append($("<option></option>").text(counrty_array[j]) );
        }

        function country_onchange() {
            var index = $('#country_or_city').find(':selected').index();
            $("#township_or_district option").remove();
            for (j = 0; j < township_array[index].length; j ++) {
                $("#township_or_district").append($("<option></option>").text(township_array[index][j]) );
            }
        }
    </script>
@endsection