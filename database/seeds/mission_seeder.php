<?php
use Illuminate\Support\Facades\DB;
use Kodeine\Acl\Models\Eloquent\Permission;
use app\User;
use app\Post;
use Kodeine\Acl\Traits\HasRole;
use Illuminate\Database\Seeder;
/**
 * Created by PhpStorm.
 * User: Tsugumi
 * Date: 2015/4/14
 * Time: 下午 03:47
 */

class mission_seeder extends Seeder{
    use HasRole;
    public function run(){
        DB:: table('missions')->delete();
        DB:: table('mission_lists')->delete();
        DB:: table('mission_support_people')->delete();
        DB:: table('mission_support_products')->delete();
        DB:: table('mission_new_locations')->delete();
        DB:: table('local_reports')->delete();
        DB:: table('reports')->delete();


        $mission_list = new App\Mission_list;
        $mission_list->mission_list_id = 1;
        $mission_list->mission_name = '未分配任務';
        $mission_list->save();

        $mission_list = new App\Mission_list;
        $mission_list->mission_list_id = 2;
        $mission_list->mission_name = '西屯區';
        $mission_list->save();

        $mission_list = new App\Mission_list;
        $mission_list->mission_list_id = 3;
        $mission_list->mission_name = '北屯區';
        $mission_list->save();

        $mission_list = new App\Mission_list;
        $mission_list->mission_list_id = 4;
        $mission_list->mission_name = '台中市政府周圍';
        $mission_list->save();

        $mission_list = new App\Mission_list;
        $mission_list->mission_list_id = 5;
        $mission_list->mission_name = '新莊區';
        $mission_list->save();

        $mission_list = new App\Mission_list;
        $mission_list->mission_list_id = 6;
        $mission_list->mission_name = '高雄市';
        $mission_list->save();

        $mission_list = new App\Mission_list;
        $mission_list->mission_list_id = 7;
        $mission_list->mission_name = '台北市';
        $mission_list->save();

        //人員需求
        $mission_support_person = new App\Mission_support_person;
        $mission_support_person->mission_list_id = 2;
        $mission_support_person->emt_num = 10;
        $mission_support_person->reliever_num = 20;
        $mission_support_person->save();

        $mission_support_person = new App\Mission_support_person;
        $mission_support_person->mission_list_id = 3;
        $mission_support_person->emt_num = 0;
        $mission_support_person->reliever_num = 10;
        $mission_support_person->save();

        $mission_support_person = new App\Mission_support_person;
        $mission_support_person->mission_list_id = 4;
        $mission_support_person->emt_num = 5;
        $mission_support_person->reliever_num = 0;
        $mission_support_person->save();

        $mission_support_person = new App\Mission_support_person;
        $mission_support_person->mission_list_id = 5;
        $mission_support_person->emt_num = 30;
        $mission_support_person->reliever_num = 20;
        $mission_support_person->save();

        $mission_support_person = new App\Mission_support_person;
        $mission_support_person->mission_list_id = 6;
        $mission_support_person->emt_num = 10;
        $mission_support_person->reliever_num = 5;
        $mission_support_person->save();

        $mission_support_person = new App\Mission_support_person;
        $mission_support_person->mission_list_id = 7;
        $mission_support_person->emt_num = 0;
        $mission_support_person->reliever_num = 0;
        $mission_support_person->save();

        //物資支援
        $mission_support_person = new App\Mission_support_product;
        $mission_support_person->mission_list_id = 2;
        $mission_support_person->product_total_amount_id = 2;
        $mission_support_person->amount = 10;
        $mission_support_person->save();

        $mission_support_person = new App\Mission_support_product;
        $mission_support_person->mission_list_id = 2;
        $mission_support_person->product_total_amount_id = 3;
        $mission_support_person->amount = 10;
        $mission_support_person->save();

        $mission_support_person = new App\Mission_support_product;
        $mission_support_person->mission_list_id = 2;
        $mission_support_person->product_total_amount_id = 4;
        $mission_support_person->amount = 10;
        $mission_support_person->save();

        $mission_support_person = new App\Mission_support_product;
        $mission_support_person->mission_list_id = 3;
        $mission_support_person->product_total_amount_id = 3;
        $mission_support_person->amount = 30;
        $mission_support_person->save();

        $mission_support_person = new App\Mission_support_product;
        $mission_support_person->mission_list_id = 4;
        $mission_support_person->product_total_amount_id = 4;
        $mission_support_person->amount = 10;
        $mission_support_person->save();


        $mission_support_person = new App\Mission_support_product;
        $mission_support_person->mission_list_id = 6;
        $mission_support_person->product_total_amount_id = 5;
        $mission_support_person->amount = 10;
        $mission_support_person->save();



        $mission = new App\Mission;
        $mission->mission_id = 1;
        $mission->mission_type = '道路斷裂';
        $mission->mission_content = '該地點路面已下陷約15公分';
        $mission->fname = '小君';
        $mission->lname = '林';
        $mission->phone = '0912345678';
        $mission->email = 'qwe@yahoo.com.tw';
        $mission->country_or_city_input = '台中市';
        $mission->township_or_district_input = '西屯區';
        $mission->location = '逢甲校門口附近';
        $mission->mission_list_id = 1;
        $mission->save();


        $mission = new App\Mission;
        $mission->mission_id = 2;
        $mission->mission_type = '管線斷裂';
        $mission->mission_content = '水管破裂造成路上積水';
        $mission->lname = '程';
        $mission->phone = '0923456781';
        $mission->country_or_city_input = '台中市';
        $mission->township_or_district_input = '北屯區';
        $mission->location = '松竹市場公車站前';
        $mission->mission_list_id = 1;
        $mission->save();

        $mission = new App\Mission;
        $mission->mission_id = 3;
        $mission->mission_type = '建築物爆炸';
        $mission->mission_content = '店家爆炸旁邊幾家住戶也遭到波及';
        $mission->fname = '雅珍';
        $mission->lname = '耿';
        $mission->phone = '0934567812';
        $mission->country_or_city_input = '台中市';
        $mission->township_or_district_input = '北屯區';
        $mission->location = '柳陽東街16號';
        $mission->mission_list_id = 3;
        $mission->save();

        $mission = new App\Mission;
        $mission->mission_id = 4;
        $mission->mission_type = '建築物倒塌';
        $mission->mission_content = '市政府倒塌,至少有3人受困其中';
        $mission->fname = '鳩';
        $mission->lname = '江';
        $mission->country_or_city_input = '台中市';
        $mission->township_or_district_input = '西屯區';
        $mission->location = '市政府';
        $mission->mission_list_id = 4;
        $mission->save();

        $mission = new App\Mission;
        $mission->mission_id = 5;
        $mission->mission_type = '道路倒塌';
        $mission->mission_content = '電線杆倒塌,變電箱起火燃燒';
        $mission->fname = '鑫';
        $mission->lname = '李';
        $mission->phone = '0967812345';
        $mission->country_or_city_input = '台中市';
        $mission->township_or_district_input = '西屯區';
        $mission->location = '公園旁';
        $mission->mission_list_id = 2;
        $mission->mission_new_locations_id = 3;
        $mission->save();

        $mission = new App\Mission;
        $mission->mission_id = 6;
        $mission->mission_type = '道路淹水';
        $mission->mission_content = '地下湧出大量水,造成路上嚴重積水';
        $mission->lname = '李';
        $mission->phone = '0978123456';
        $mission->country_or_city_input = '台中市';
        $mission->township_or_district_input = '西屯區';
        $mission->location = '逢甲路10號';
        $mission->mission_list_id = 2;
        $mission->mission_new_locations_id = 4;
        $mission->save();

        $mission = new App\Mission;
        $mission->mission_id = 7;
        $mission->mission_type = '建築物倒塌';
        $mission->mission_content = '住家房子倒塌,無法確認是否有人受困';
        $mission->lname = '黃';
        $mission->email = 'uio@yahoo.com.tw';
        $mission->country_or_city_input = '台中市';
        $mission->township_or_district_input = '北屯區';
        $mission->location = '青島路四段9號';
        $mission->mission_list_id = 3;
        $mission->mission_new_locations_id = 13;
        $mission->save();

        $mission = new App\Mission;
        $mission->mission_id = 8;
        $mission->mission_type = '建築物起火';
        $mission->mission_content = '資電館2樓以上起火並冒出濃煙';
        $mission->fname = '伊富';
        $mission->lname = '葉';
        $mission->phone = '0987654321';
        $mission->country_or_city_input = '台中市';
        $mission->township_or_district_input = '西屯區';
        $mission->location = '文華路100號';
        $mission->mission_list_id = 2;
        $mission->complete_time = date('Y-m-d H:i:s');
        $mission->save();

        $mission = new App\Mission;
        $mission->mission_id = 9;
        $mission->mission_type = '道路斷裂';
        $mission->mission_content = '路面有多處裂痕';
        $mission->fname = '恩五';
        $mission->lname = '陳';
        $mission->country_or_city_input = '台中市';
        $mission->township_or_district_input = '西屯區';
        $mission->location = '距一天橋10公尺左右';
        $mission->mission_list_id = 4;
        $mission->mission_new_locations_id = 14;
        $mission->save();

        $mission = new App\Mission;
        $mission->mission_id = 10;
        $mission->mission_type = '橋梁斷裂';
        $mission->mission_content = '橋梁已斷裂無法通行';
        $mission->lname = '吳';
        $mission->phone = '0965432187';
        $mission->country_or_city_input = '台中市';
        $mission->township_or_district_input = '西屯區';
        $mission->location = '朝陽橋';
        $mission->mission_list_id = 2;
        $mission->mission_new_locations_id = 18;
        $mission->save();

        $mission = new App\Mission;
        $mission->mission_id = 11;
        $mission->mission_type = '建築物倒塌';
        $mission->mission_content = '3層樓高之建築物倒塌,一旁的道路有一線道因建築物倒塌而無法通行';
        $mission->fname = '威德';
        $mission->lname = '簡';
        $mission->phone = '0987548754';
        $mission->country_or_city_input = '新北市';
        $mission->township_or_district_input = '新莊區';
        $mission->location = '中正路621號';
        $mission->mission_list_id = 5;
        $mission->complete_time = date('Y-m-d H:i:s');
        $mission->save();

        $mission = new App\Mission;
        $mission->mission_id = 12;
        $mission->mission_type = '管線斷裂';
        $mission->mission_content = '從地面裂縫中滲出水';
        $mission->lname = '王';
        $mission->phone = '0912345678';
        $mission->country_or_city_input = '台北市';
        $mission->township_or_district_input = '中正區';
        $mission->location = '杭州南路一段55號';
        $mission->mission_list_id = 7;
        $mission->mission_new_locations_id = 26;
        $mission->complete_time = date('Y-m-d H:i:s');
        $mission->save();

        $mission = new App\Mission;
        $mission->mission_id = 13;
        $mission->mission_type = '建築物起火';
        $mission->mission_content = '建築物內冒出濃煙, 確定內部無受困者';
        $mission->lname = '何';
        $mission->phone = '0912345678';
        $mission->country_or_city_input = '台北市';
        $mission->township_or_district_input = '中正區';
        $mission->location = '台新銀行';
        $mission->mission_list_id = 7;
        $mission->save();

        $mission = new App\Mission;
        $mission->mission_id = 14;
        $mission->mission_type = '道路起火';
        $mission->mission_content = '電線杆倒塌起火';
        $mission->fname = '一文';
        $mission->lname = '柯';
        $mission->phone = '0902020101';
        $mission->country_or_city_input = '高雄市';
        $mission->township_or_district_input = '苓雅區';
        $mission->location = '仁德街';
        $mission->mission_list_id = 6;
        $mission->mission_new_locations_id = 22;
        $mission->complete_time = date('Y-m-d H:i:s');
        $mission->save();

        $mission = new App\Mission;
        $mission->mission_id = 15;
        $mission->mission_type = '道路斷裂';
        $mission->mission_content = '道路多處地方斷裂且變形';
        $mission->lname = '紀';
        $mission->email = 'yui@yahoo.com.tw';
        $mission->country_or_city_input = '高雄市';
        $mission->township_or_district_input = '前金區';
        $mission->location = '85大樓周圍';
        $mission->mission_list_id = 6;
        $mission->mission_new_locations_id = 23;
        $mission->save();

        $mission = new App\Mission;
        $mission->mission_id = 16;
        $mission->mission_type = '管線斷裂';
        $mission->mission_content = '地面有兩處不斷冒出水';
        $mission->lname = '蔡';
        $mission->phone = '0923232323';
        $mission->country_or_city_input = '新北市';
        $mission->township_or_district_input = '新莊區';
        $mission->location = '中正路669號';
        $mission->mission_list_id = 1;
        $mission->save();

        $mission = new App\Mission;
        $mission->mission_id = 17;
        $mission->mission_type = '建築物爆炸';
        $mission->mission_content = '一民宅爆炸, 火勢蔓延至周遭房屋';
        $mission->fname = '耀承';
        $mission->lname = '陳';
        $mission->email = 'tps@yahoo.com.tw';
        $mission->country_or_city_input = '新北市';
        $mission->township_or_district_input = '新莊區';
        $mission->location = '距捷運站5公尺處';
        $mission->mission_list_id = 5;
        $mission->mission_new_locations_id = 19;
        $mission->complete_time = date('Y-m-d H:i:s');
        $mission->save();

        $mission = new App\Mission;
        $mission->mission_id = 18;
        $mission->mission_type = '建築物倒塌';
        $mission->mission_content = '一棟5層樓高的房子倒塌, 尚有12人受困';
        $mission->fname = '耀恩';
        $mission->lname = '林';
        $mission->phone = '0918181818';
        $mission->email = 'qrqweqwe@yahoo.com.tw';
        $mission->country_or_city_input = '高雄市';
        $mission->township_or_district_input = '三民區';
        $mission->location = '明吉路公車站附近';
        $mission->mission_list_id = 1;
        $mission->save();

        $mission = new App\Mission;
        $mission->mission_id = 19;
        $mission->mission_type = '橋梁斷裂';
        $mission->mission_content = '橋梁中央已有多處裂痕';
        $mission->lname = '蔣';
        $mission->phone = '0919191919';
        $mission->email = 'wwwwwe@yahoo.com.tw';
        $mission->country_or_city_input = '高雄市';
        $mission->township_or_district_input = '三民區';
        $mission->location = '九如橋';
        $mission->mission_list_id = 1;
        $mission->save();

        $mission = new App\Mission;
        $mission->mission_id = 20;
        $mission->mission_type = '建築物淹水';
        $mission->mission_content = '火車站內水管損壞造成車站淹水';
        $mission->fname = '偉';
        $mission->lname = '蔡';
        $mission->email = 's7sddf@yahoo.com.tw';
        $mission->country_or_city_input = '花蓮縣';
        $mission->township_or_district_input = '花蓮市';
        $mission->location = '花蓮火車站';
        $mission->mission_list_id = 1;
        $mission->save();

        $mission = new App\Mission;
        $mission->mission_id = 21;
        $mission->mission_type = '建築物起火';
        $mission->mission_content = '1樓為起火點, 已延燒至2樓';
        $mission->lname = '馬';
        $mission->phone = '0921212121';
        $mission->country_or_city_input = '花蓮縣';
        $mission->township_or_district_input = '壽豐鄉';
        $mission->location = '東華大學體育館';
        $mission->mission_list_id = 1;
        $mission->save();

        $mission = new App\Mission;
        $mission->mission_id = 22;
        $mission->mission_type = '管線斷裂';
        $mission->mission_content = '路旁消防栓遭車輛撞毀';
        $mission->fname = '索衛';
        $mission->lname = '吳';
        $mission->phone = '0922222222';
        $mission->country_or_city_input = '新北市';
        $mission->township_or_district_input = '蘆洲區';
        $mission->location = '長榮路238號';
        $mission->mission_list_id = 1;
        $mission->save();

        $mission = new App\Mission;
        $mission->mission_id = 23;
        $mission->mission_type = '建築物爆炸';
        $mission->mission_content = '1樓店家爆炸起火, 無法確定是否有人受困';
        $mission->lname = '韓';
        $mission->country_or_city_input = '新北市';
        $mission->township_or_district_input = '蘆洲區';
        $mission->location = '民族路502號';
        $mission->mission_list_id = 1;
        $mission->save();

        $mission = new App\Mission;
        $mission->mission_id = 24;
        $mission->mission_type = '建築物爆炸';
        $mission->mission_content = '加油站爆炸, 周圍建築也遭受波及';
        $mission->fname = '澤君';
        $mission->lname = '徐';
        $mission->phone = '0924242424';
        $mission->country_or_city_input = '台北市';
        $mission->township_or_district_input = '松山區';
        $mission->location = '機場前';
        $mission->mission_list_id = 1;
        $mission->save();

        $mission = new App\Mission;
        $mission->mission_id = 25;
        $mission->mission_type = '道路起火';
        $mission->mission_content = '路上發生車禍, 車輛已起火燃燒';
        $mission->fname = '祏日';
        $mission->lname = '王';
        $mission->country_or_city_input = '台北市';
        $mission->township_or_district_input = '松山區';
        $mission->location = '民權東路三段144號';
        $mission->mission_list_id = 1;
        $mission->save();

        $mission = new App\Mission;
        $mission->mission_id = 26;
        $mission->mission_type = '道路淹水';
        $mission->mission_content = '水不斷從水溝蓋中流出';
        $mission->lname = '郭';
        $mission->email = 'qwe1q3w2q@yahoo.com.tw';
        $mission->country_or_city_input = '台中市';
        $mission->township_or_district_input = '北屯區';
        $mission->location = '大華新村公車站附近';
        $mission->mission_list_id = 1;
        $mission->save();

        $mission = new App\Mission;
        $mission->mission_id = 27;
        $mission->mission_type = '建築物倒塌';
        $mission->mission_content = '騎樓部分坍塌';
        $mission->fname = '育豪';
        $mission->lname = '彭';
        $mission->phone = '0927272727';
        $mission->country_or_city_input = '台中市';
        $mission->township_or_district_input = '北屯區';
        $mission->location = '東山路一段185號';
        $mission->mission_list_id = 1;
        $mission->save();

        $mission = new App\Mission;
        $mission->mission_id = 28;
        $mission->mission_type = '建築物爆炸';
        $mission->mission_content = '餐廳瓦斯爆炸';
        $mission->fname = '育豪';
        $mission->lname = '彭';
        $mission->phone = '0927272727';
        $mission->country_or_city_input = '台中市';
        $mission->township_or_district_input = '西屯區';
        $mission->location = '文心路二段57號';
        $mission->mission_list_id = 4;
        $mission->complete_time = date('Y-m-d H:i:s');
        $mission->save();

        $mission = new App\Mission;
        $mission->mission_id = 29;
        $mission->mission_type = '管線斷裂';
        $mission->mission_content = '建築物內多處管線斷裂漏水';
        $mission->lname = '王';
        $mission->phone = '0928282828';
        $mission->email = 'dbsegaq@yahoo.com.tw';
        $mission->country_or_city_input = '台北市';
        $mission->township_or_district_input = '中正區';
        $mission->location = '光華商場';
        $mission->mission_list_id = 7;
        $mission->complete_time = date('Y-m-d H:i:s');
        $mission->save();

        $mission = new App\Mission;
        $mission->mission_id = 30;
        $mission->mission_type = '道路起火';
        $mission->mission_content = '商家招牌砸中路過車輛, 車輛有起火之可能';
        $mission->lname = '金';
        $mission->phone = '0930303030';
        $mission->country_or_city_input = '台北市';
        $mission->township_or_district_input = '中正區';
        $mission->location = '開南商工公車站前';
        $mission->mission_list_id = 7;
        $mission->save();

        $mission = new App\Mission;
        $mission->mission_id = 31;
        $mission->mission_type = '建築物倒塌';
        $mission->mission_content = '建築物主要出入口皆坍塌, 尚無法確認有多少人受困';
        $mission->lname = '謝';
        $mission->fname = '妮眛';
        $mission->phone = '0931313131';
        $mission->country_or_city_input = '台北市';
        $mission->township_or_district_input = '中正區';
        $mission->location = '徐州路2號';
        $mission->mission_list_id = 7;
        $mission->save();
//

        $mission = new App\Mission_new_location;
        $mission->mission_new_locations_id = 1;
        $mission->mission_list_id = 2;
        $mission->location = '醫療組';
        $mission->save();

        $mission = new App\Mission_new_location;
        $mission->mission_new_locations_id = 2;
        $mission->mission_list_id = 2;
        $mission->location = '物資資源組';
        $mission->save();

        $mission = new App\Mission_new_location;
        $mission->mission_new_locations_id = 3;
        $mission->mission_list_id = 2;
        $mission->victim_number = 50;
        $mission->situation = '建築物主要出入口皆坍塌, 尚無法確認有多少人受困';
        $mission->location = '資電館';
        $mission->analysis_time = date('Y-m-d H:i:s');
        $mission->save();

        $mission = new App\Mission_new_location;
        $mission->mission_new_locations_id = 4;
        $mission->mission_list_id = 2;
        $mission->victim_number = 30;
        $mission->situation = '火勢無法控制, 需要更多脫困及醫療人員支援';
        $mission->location = '商學大樓';
        $mission->analysis_time = date('Y-m-d H:i:s');
        $mission->save();

        $mission = new App\Mission_new_location;
        $mission->mission_new_locations_id = 5;
        $mission->mission_list_id = 2;
        $mission->victim_number = 40;
        $mission->situation = '體育館樓梯與支架坍方, 館內有多人受困';
        $mission->location = '體育館';
        $mission->analysis_time = date('Y-m-d H:i:s');
        $mission->save();

        $mission = new App\Mission_new_location;
        $mission->mission_new_locations_id = 6;
        $mission->mission_list_id = 2;
        $mission->victim_number = 10;
        $mission->situation = '人言大樓施工設施掉落, 造成道路阻礙與人員傷亡';
        $mission->location = '人言大樓';
        $mission->analysis_time = date('Y-m-d H:i:s');
        $mission->save();

        $mission = new App\Mission_new_location;
        $mission->mission_new_locations_id = 7;
        $mission->mission_list_id = 3;
        $mission->location = '醫療組';
        $mission->save();

        $mission = new App\Mission_new_location;
        $mission->mission_new_locations_id = 8;
        $mission->mission_list_id = 3;
        $mission->location = '物資資源組';
        $mission->save();

        $mission = new App\Mission_new_location;
        $mission->mission_new_locations_id = 9;
        $mission->mission_list_id = 3;
        $mission->victim_number = 5;
        $mission->situation = '火勢延燒至一旁住戶';
        $mission->location = '柳陽東街16號';
        $mission->analysis_time = date('Y-m-d H:i:s');
        $mission->save();

        $mission = new App\Mission_new_location;
        $mission->mission_new_locations_id = 10;
        $mission->mission_list_id = 3;
        $mission->victim_number = 0;
        $mission->situation = '住家崩塌之入口處挖開沒有崩塌之危險';
        $mission->location = '青島路四段9號';
        $mission->analysis_time = date('Y-m-d H:i:s');
        $mission->save();

        $mission = new App\Mission_new_location;
        $mission->mission_new_locations_id = 11;
        $mission->mission_list_id = 4;
        $mission->location = '醫療組';
        $mission->save();

        $mission = new App\Mission_new_location;
        $mission->mission_new_locations_id = 12;
        $mission->mission_list_id = 4;
        $mission->location = '物資資源組';
        $mission->save();

        $mission = new App\Mission_new_location;
        $mission->mission_new_locations_id = 13;
        $mission->mission_list_id = 4;
        $mission->victim_number = 10;
        $mission->situation = '各出入口皆坍塌嚴重，需較大型開挖工具';
        $mission->location = '市政府';
        $mission->analysis_time = date('Y-m-d H:i:s');
        $mission->save();

        $mission = new App\Mission_new_location;
        $mission->mission_new_locations_id = 14;
        $mission->mission_list_id = 4;
        $mission->victim_number = 10;
        $mission->situation = '路面裂痕不深，為了避免裂痕加深應封鎖路段';
        $mission->location = '天橋旁';
        $mission->analysis_time = date('Y-m-d H:i:s');
        $mission->save();

        $mission = new App\Mission_new_location;
        $mission->mission_new_locations_id = 15;
        $mission->mission_list_id = 4;
        $mission->victim_number = 10;
        $mission->situation = '餐廳仍在燃燒，裡面的客人已全部逃出';
        $mission->location = '文心路二段57號';
        $mission->analysis_time = date('Y-m-d H:i:s');
        $mission->save();

        $mission = new App\Mission_new_location;
        $mission->mission_new_locations_id = 16;
        $mission->mission_list_id = 5;
        $mission->location = '醫療組';
        $mission->save();

        $mission = new App\Mission_new_location;
        $mission->mission_new_locations_id = 17;
        $mission->mission_list_id = 5;
        $mission->location = '物資資源組';
        $mission->save();

        $mission = new App\Mission_new_location;
        $mission->mission_new_locations_id = 18;
        $mission->mission_list_id = 5;
        $mission->victim_number = 0;
        $mission->situation = '每個出入口皆不易開鑿，且尚未確認是否有受困者';
        $mission->location = '中正路621號';
        $mission->analysis_time = date('Y-m-d H:i:s');
        $mission->save();

        $mission = new App\Mission_new_location;
        $mission->mission_new_locations_id = 19;
        $mission->mission_list_id = 5;
        $mission->victim_number = 2;
        $mission->situation = '火勢不大且附近有消防栓可以使用';
        $mission->location = '捷運站旁';
        $mission->analysis_time = date('Y-m-d H:i:s');
        $mission->save();

        $mission = new App\Mission_new_location;
        $mission->mission_new_locations_id = 20;
        $mission->mission_list_id = 6;
        $mission->location = '醫療組';
        $mission->save();

        $mission = new App\Mission_new_location;
        $mission->mission_new_locations_id = 21;
        $mission->mission_list_id = 6;
        $mission->location = '物資資源組';
        $mission->save();

        $mission = new App\Mission_new_location;
        $mission->mission_new_locations_id = 22;
        $mission->mission_list_id = 6;
        $mission->victim_number = 10;
        $mission->situation = '抵達時只剩一點火，無延燒至一旁住宅';
        $mission->location = '仁德街';
        $mission->analysis_time = date('Y-m-d H:i:s');
        $mission->save();

        $mission = new App\Mission_new_location;
        $mission->mission_new_locations_id = 23;
        $mission->mission_list_id = 6;
        $mission->victim_number = 10;
        $mission->situation = '道路多處嚴重變形，車輛無法通過';
        $mission->location = '85大樓周圍';
        $mission->analysis_time = date('Y-m-d H:i:s');
        $mission->save();

        $mission = new App\Mission_new_location;
        $mission->mission_new_locations_id = 24;
        $mission->mission_list_id = 7;
        $mission->location = '醫療組';
        $mission->save();

        $mission = new App\Mission_new_location;
        $mission->mission_new_locations_id = 25;
        $mission->mission_list_id = 7;
        $mission->location = '物資資源組';
        $mission->save();

        $mission = new App\Mission_new_location;
        $mission->mission_new_locations_id = 26;
        $mission->mission_list_id = 7;
        $mission->victim_number = 16;
        $mission->situation = '持續從地面慎出水，正在尋找此段水源開關';
        $mission->location = '杭州南路一段55號';
        $mission->analysis_time = date('Y-m-d H:i:s');
        $mission->save();

        $mission = new App\Mission_new_location;
        $mission->mission_new_locations_id = 27;
        $mission->mission_list_id = 7;
        $mission->victim_number = 0;
        $mission->situation = '確認濃煙來源為此棟5樓之機房';
        $mission->location = '台新銀行';
        $mission->analysis_time = date('Y-m-d H:i:s');
        $mission->save();

        $mission = new App\Mission_new_location;
        $mission->mission_new_locations_id = 28;
        $mission->mission_list_id = 7;
        $mission->victim_number = 10;
        $mission->situation = '多處管線斷裂嚴重，需要專業水電人員修理';
        $mission->location = '光華商場';
        $mission->analysis_time = date('Y-m-d H:i:s');
        $mission->save();

        $mission = new App\Mission_new_location;
        $mission->mission_new_locations_id = 29;
        $mission->mission_list_id = 7;
        $mission->victim_number = 10;
        $mission->situation = '駕駛與2名乘客昏迷並受困於車中';
        $mission->location = '開南商工公車站前';
        $mission->analysis_time = date('Y-m-d H:i:s');
        $mission->save();

        $mission = new App\Mission_new_location;
        $mission->mission_new_locations_id = 30;
        $mission->mission_list_id = 7;
        $mission->victim_number = 10;
        $mission->situation = '出入口開鑿進行順利';
        $mission->location = '徐州路2號';
        $mission->analysis_time = date('Y-m-d H:i:s');
        $mission->save();



        $report = new App\Report;
        $report->mission_list_id = 2;
        $report->report_content = "火勢無法控制, 需要更多脫困及醫療人員支援";
        $report->save();

        $report = new App\Report;
        $report->mission_list_id = 3;
        $report->report_content = "確定將所有受困民眾救出";
        $report->save();

        $report = new App\Report;
        $report->mission_list_id = 4;
        $report->report_content = "暫時將此區域水管管線供水, 街道積水尚未清理";
        $report->save();

        $report = new App\Report;
        $report->mission_list_id = 5;
        $report->report_content = "任務皆完成, 且將危險區域圍起避免民眾誤闖";
        $report->save();

        $report = new App\Report;
        $report->mission_list_id = 6;
        $report->report_content = "已將道路封鎖, 並指引車輛到安全的地方";
        $report->save();

        $report = new App\Report;
        $report->mission_list_id = 7;
        $report->report_content = "確定無人受困, 且火勢已撲滅";
        $report->save();



        $local_report = new App\Local_report;
        //$local_report->local_report_id = 1;
        $local_report->mission_new_locations_id = 1;
        $local_report->local_report_content = '目前傷患醫療作業順利進行中';
        $local_report->id = 6;
        $local_report->mission_list_id = 2;
        $local_report->save();

        $local_report = new App\Local_report;
        //$local_report->local_report_id = 1;
        $local_report->mission_new_locations_id = 3;
        $local_report->local_report_content = '人手不足火勢無法控制住，有繼續延燒至一旁住宅的危險';
        $local_report->id = 7;
        $local_report->mission_list_id = 2;
        $local_report->save();

        $local_report = new App\Local_report;
        //$local_report->local_report_id = 2;
        $local_report->mission_new_locations_id = 3;
        $local_report->local_report_content = '已救出3人，但從被救出名眾口中得知有2人可能被困在3樓的會議室';
        $local_report->mission_list_id = 2;
        $local_report->id = 38;
        $local_report->save();

        $local_report = new App\Local_report;
       // $local_report->local_report_id = 3;
        $local_report->mission_new_locations_id = 4;
        $local_report->local_report_content = '火勢已撲滅，等待大型機具將電線杆從路中央移開';
        $local_report->mission_list_id = 2;
        $local_report->id = 14;
        $local_report->save();

        $local_report = new App\Local_report;
        //$local_report->local_report_id = 4;
        $local_report->mission_new_locations_id = 4;
        $local_report->local_report_content = '已將附近水管管線關閉，正在清理積水';
        $local_report->mission_list_id = 2;
        $local_report->id = 52;
        $local_report->save();


        $local_report = new App\Local_report;
       // $local_report->local_report_id = 5;
        $local_report->mission_new_locations_id = 13;
        $local_report->local_report_content = '1樓未發現受困民眾，2樓坍塌較嚴重需要較多時間才能確定是否有人受困';
        $local_report->mission_list_id = 3;
        $local_report->id = 15;
        $local_report->save();

        $local_report = new App\Local_report;
       // $local_report->local_report_id = 6;
        $local_report->mission_new_locations_id = 3;
        $local_report->local_report_content = '確認是機房起火並且已控制住火勢';
        $local_report->mission_list_id = 2;
        $local_report->id = 45;
        $local_report->save();

        $local_report = new App\Local_report;
        //$local_report->local_report_id = 7;
        $local_report->mission_new_locations_id = 14;
        $local_report->local_report_content = '目前無法確認路面裂痕原因，先將此路段封閉避免有危險';
        $local_report->mission_list_id = 4;
        $local_report->id = 16;
        $local_report->save();

//        $local_report = new App\Local_report;
//        //$local_report->local_report_id = 8;
//        $local_report->local_report_content = '將通往橋梁之路段封鎖，並佈署人員於此看守';
//        $local_report->mission_id = 10;
//        $local_report->save();
//
        $local_report = new App\Local_report;
        //$local_report->local_report_id = 9;
        $local_report->mission_new_locations_id = 18;
        $local_report->local_report_content = '正在確認是否有人被埋在房子下，時間緊迫需要更多人幫忙';
        $local_report->mission_list_id = 5;
        $local_report->id = 10;
        $local_report->save();

        $local_report = new App\Local_report;
       // $local_report->local_report_id = 10;
        $local_report->mission_new_locations_id = 26;
        $local_report->local_report_content = '連絡不到水電相關人員，水依舊不斷湧出';
        $local_report->mission_list_id = 7;
        $local_report->id = 12;
        $local_report->save();

        $local_report = new App\Local_report;
       // $local_report->local_report_id = 11;
        $local_report->mission_new_locations_id = 27;
        $local_report->local_report_content = '機房內火勢已完全撲滅';
        $local_report->mission_list_id = 7;
        $local_report->id = 24;
        $local_report->save();

        $local_report = new App\Local_report;
        //$local_report->local_report_id = 12;
        $local_report->mission_new_locations_id = 22;
        $local_report->local_report_content = '電線杆的火已撲滅，並將電線杆移至路邊';
        $local_report->mission_list_id = 6;
        $local_report->id = 41;
        $local_report->save();

        $local_report = new App\Local_report;
        //$local_report->local_report_id = 13;
        $local_report->mission_new_locations_id = 23;
        $local_report->local_report_content = '已將此路段封鎖';
        $local_report->mission_list_id = 6;
        $local_report->id = 18;
        $local_report->save();

        $local_report = new App\Local_report;
        //$local_report->local_report_id = 14;
        $local_report->mission_new_locations_id = 19;
        $local_report->local_report_content = '起火處已撲滅，但周遭房屋仍在燃燒';
        $local_report->mission_list_id = 5;
        $local_report->id = 17;
        $local_report->save();

        $local_report = new App\Local_report;
        //$local_report->local_report_id = 15;
        $local_report->mission_new_locations_id = 15;
        $local_report->local_report_content = '專業救火的人員尚未到達，火勢逐漸變大';
        $local_report->mission_list_id = 4;
        $local_report->id = 28;
        $local_report->save();

        $local_report = new App\Local_report;
        //$local_report->local_report_id = 16;
        $local_report->mission_new_locations_id = 28;
        $local_report->local_report_content = '關閉整棟建築之水管管線，正在等待水電人員修理';
        $local_report->mission_list_id = 7;
        $local_report->id = 47;
        $local_report->save();

//        $local_report = new App\Local_report;
//        //$local_report->local_report_id = 17;
//        $local_report->mission_new_locations_id = 27;
//        $local_report->local_report_content = '已將車上受傷民眾救出，車輛沒撞擊到油箱無爆炸之可能';
//        $local_report->mission_id = 30;
//        $local_report->mission_list_id = 7;
//        $local_report->id = 24;
//        $local_report->save();
//
//        $local_report = new App\Local_report;
//        //$local_report->local_report_id = 18;
//        $local_report->mission_new_locations_id = 27;
//        $local_report->local_report_content = '有人員正在挖通出入口處，因目前建築結構脆弱，開挖作業要較為謹慎且需要時間';
//        $local_report->mission_id = 31;
//        $local_report->mission_list_id = 7;
//        $local_report->id = 24;
//        $local_report->save();
    }
}