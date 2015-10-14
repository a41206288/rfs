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
//        DB:: table('mission_new_locations')->delete();

        $mission_list = new App\Mission_list;
        $mission_list->mission_list_id = 1;
        $mission_list->mission_name = '未分配任務';
        $mission_list->save();

        $mission_list = new App\Mission_list;
        $mission_list->mission_list_id = 2;
        $mission_list->mission_name = '三多一路（283巷一弄）';
        $mission_list->id = 3;
        $mission_list->assign_people_finish_time = date('Y-m-d H:i:s');
        $mission_list->save();

        $mission_list = new App\Mission_list;
        $mission_list->mission_list_id = 3;
        $mission_list->mission_name = '三多二路（福德三路至凱旋路口）';
        $mission_list->save();

        $mission_list = new App\Mission_list;
        $mission_list->mission_list_id = 4;
        $mission_list->mission_name = '三多一路與武慶三路路口';
        $mission_list->id = 4;
        $mission_list->assign_people_finish_time = date('Y-m-d H:i:s');
        $mission_list->arrive_location_time = date('Y-m-d H:i:s');
        $mission_list->save();

        $mission_list = new App\Mission_list;
        $mission_list->mission_list_id = 5;
        $mission_list->mission_name = '甲樹路（996巷與聖公路間的產業道路）';
        $mission_list->id = 5;
        $mission_list->assign_people_finish_time = date('Y-m-d H:i:s');
        $mission_list->arrive_location_time = date('Y-m-d H:i:s');
        $mission_list->mission_complete_time =  date('Y-m-d H:i:s');
        $mission_list->save();

//        $mission_list = new App\Mission_list;
//        $mission_list->mission_list_id = 5;
//        $mission_list->mission_name = '三民區';
//        $mission_list->save();



        $mission = new App\Mission;
        $mission->mission_id = 1;
        //$mission->mission_type = '道路起火';
        $mission->mission_content = '電線杆倒塌起火';
        $mission->fname = '一文';
        $mission->lname = '柯';
        $mission->phone = '0902020101';
        //$mission->country_or_city_input = '高雄市';
        $mission->township_or_district_input = '苓雅區';
        $mission->rd_or_st_1 = '三多一路';
//        $mission->rd_or_st_2 = '武慶三路';
        $mission->location = '283巷一弄';
        $mission->mission_list_id = 2;
        //$mission->complete_time = date('Y-m-d H:i:s');
        $mission->save();

        $mission = new App\Mission;
        $mission->mission_id = 2;
//        $mission->mission_type = '道路斷裂';
        $mission->mission_content = '道路多處地方斷裂且變形';
        $mission->lname = '紀';
        $mission->email = 'yui@yahoo.com.tw';
        $mission->rd_or_st_1 = '三多一路';
         $mission->location = '283巷二弄';
        $mission->mission_list_id = 2;
        $mission->save();

        $mission = new App\Mission;
        $mission->mission_id = 3;
//        $mission->mission_type = '建築物倒塌';
        $mission->mission_content = '多處房子出入處已坍塌, 尚有12人受困';
        $mission->fname = '耀恩';
        $mission->lname = '林';
        $mission->phone = '0918181818';
        $mission->email = 'qrqweqwe@yahoo.com.tw';
        $mission->township_or_district_input = '苓雅區';
        $mission->rd_or_st_1 = '三多一路';
        $mission->rd_or_st_2 = '武慶三路';
//        $mission->location = '全聯';
        $mission->mission_list_id = 3;
        $mission->save();

        $mission = new App\Mission;
        $mission->mission_id = 4;
//        $mission->mission_type = '建築物起火';
        $mission->mission_content = '強風吹斷高壓電線';
        $mission->lname = '蔣';
        $mission->phone = '0919191919';
        $mission->email = 'wwwwwe@yahoo.com.tw';
        $mission->township_or_district_input = '橋頭區';
        $mission->rd_or_st_1 = '甲樹路';
        $mission->location = '996巷與聖公路間的產業道路';
        $mission->mission_list_id = 5;
        $mission->save();

        $mission = new App\Mission;
        $mission->mission_id = 5;
//        $mission->mission_type = '管線斷裂';
        $mission->mission_content = '爆炸將地下水管管線炸斷，路上積水';
        $mission->fname = '鑫';
        $mission->lname = '李';
        $mission->phone = '0967812345';
        $mission->rd_or_st_1 = '苓雅區';
        $mission->location = '三多二路（福德三路至凱旋路口）';
        $mission->mission_list_id = 3;
        $mission->save();

        $mission = new App\Mission;
        $mission->mission_id = 6;
//        $mission->mission_type = '道路斷裂';
        $mission->mission_content = '道路因爆炸塌陷';
        $mission->lname = '李';
        $mission->phone = '0978123456';
        $mission->township_or_district_input = '前鎮區';
        $mission->rd_or_st_1 = '廣東三街';
        $mission->rd_or_st_2 = '一心一路';
        $mission->mission_list_id = 1;
        $mission->save();

        $mission = new App\Mission;
        $mission->mission_id = 7;
//        $mission->mission_type = '建築物倒塌';
        $mission->mission_content = '多處的路燈及樹已倒塌';
        $mission->lname = '黃';
        $mission->email = 'uio@yahoo.com.tw';
        $mission->township_or_district_input = '新興區';
        $mission->location = '忠孝公園';
        $mission->mission_list_id = 1;
        $mission->save();

        $mission = new App\Mission;
        $mission->mission_id = 8;
//        $mission->mission_type = '道路淹水';
        $mission->mission_content = '此處排水孔遭堵塞無法排水';
        $mission->fname = '伊富';
        $mission->lname = '葉';
        $mission->phone = '0987654321';
        $mission->township_or_district_input = '新興區';
        $mission->location = '德智街1號';
        $mission->mission_list_id = 1;
        $mission->save();

        $mission = new App\Mission;
        $mission->mission_id = 9;
//        $mission->mission_type = '建築物倒塌';
        $mission->mission_content = '校門附近建築遭倒下的樹壓毀';
        $mission->fname = '恩五';
        $mission->lname = '陳';
        $mission->township_or_district_input = '新興區';
        $mission->location = '高雄高商';
        $mission->mission_list_id = 1;
        $mission->save();

//        $mission = new App\Mission;
//        $mission->mission_id = 10;
//        $mission->mission_type = '道路爆炸';
//        $mission->mission_content = '電線杆倒塌起火';
//        $mission->lname = '吳';
//        $mission->phone = '0965432187';
//        $mission->country_or_city_input = '高雄市';
//        $mission->township_or_district_input = '三民區';
//        $mission->location = '復興一路200號';
//        $mission->mission_list_id = 5;
//        $mission->save();
//
//        $mission = new App\Mission;
//        $mission->mission_id = 11;
//        $mission->mission_type = '建築物起火';
//        $mission->mission_content = '2樓處起火燃燒，可能延燒至樓上';
//        $mission->fname = '威德';
//        $mission->lname = '簡';
//        $mission->phone = '0987548754';
//        $mission->country_or_city_input = '高雄市';
//        $mission->township_or_district_input = '三民區';
//        $mission->location = '鐵路新村公車站附近';
//        $mission->mission_list_id = 5;
//        $mission->save();
//
//        $mission = new App\Mission;
//        $mission->mission_id = 12;
//        $mission->mission_type = '建築物淹水';
//        $mission->mission_content = '地下室遭水淹沒';
//        $mission->lname = '王';
//        $mission->phone = '0912345678';
//        $mission->country_or_city_input = '高雄市';
//        $mission->township_or_district_input = '三民區';
//        $mission->location = '建國二路121號';
//        $mission->mission_list_id = 5;
//        $mission->save();



//        $mission = new App\Mission_new_location;
//        $mission->mission_new_locations_id = 1;
//        $mission->mission_list_id = 2;
//        $mission->location = '醫療組';
//        $mission->save();
//
//        $mission = new App\Mission_new_location;
//        $mission->mission_new_locations_id = 2;
//        $mission->mission_list_id = 2;
//        $mission->location = '物資資源組';
//        $mission->save();
//
//        $mission = new App\Mission_new_location;
//        $mission->mission_new_locations_id = 3;
//        $mission->mission_list_id = 2;
//        $mission->victim_number = 0;
//        $mission->situation = '電線杆仍在燃燒，但不會造成周遭危險';
//        $mission->location = '三多一路';
//        $mission->analysis_time = date('Y-m-d H:i:s');
//        $mission->save();
//
//        $mission = new App\Mission_new_location;
//        $mission->mission_new_locations_id = 4;
//        $mission->mission_list_id = 2;
//        $mission->victim_number = 10;
//        $mission->situation = '坍塌處約有半層樓深，已禁止車輛及行人經過此路段';
//        $mission->location = '三信家商前';
//        $mission->analysis_time = date('Y-m-d H:i:s');
//        $mission->save();
//
//        $mission = new App\Mission_new_location;
//        $mission->mission_new_locations_id = 1;
//        $mission->mission_list_id = 3;
//        $mission->location = '醫療組';
//        $mission->save();
//
//        $mission = new App\Mission_new_location;
//        $mission->mission_new_locations_id = 2;
//        $mission->mission_list_id = 3;
//        $mission->location = '物資資源組';
//        $mission->save();
//
//        $mission = new App\Mission_new_location;
//        $mission->mission_new_locations_id = 3;
//        $mission->mission_list_id = 3;
//        $mission->victim_number = 5;
//        $mission->situation = '水不斷湧出，正在與水利公司聯絡以停止管線供水';
//        $mission->location = '正薪醫院前';
//        $mission->analysis_time = date('Y-m-d H:i:s');
//        $mission->save();
//
//        $mission = new App\Mission_new_location;
//        $mission->mission_new_locations_id = 1;
//        $mission->mission_list_id = 4;
//        $mission->location = '醫療組';
//        $mission->save();
//
//        $mission = new App\Mission_new_location;
//        $mission->mission_new_locations_id = 2;
//        $mission->mission_list_id = 4;
//        $mission->location = '物資資源組';
//        $mission->save();
//
//
//        $mission = new App\Mission_new_location;
//        $mission->mission_new_locations_id = 3;
//        $mission->mission_list_id = 4;
//        $mission->victim_number = 10;
//        $mission->situation = '將部分樹及路燈移至路旁，仍在繼續作業中';
//        $mission->location = '忠孝公園';
//        $mission->analysis_time = date('Y-m-d H:i:s');
//        $mission->save();
//
//        $mission = new App\Mission_new_location;
//        $mission->mission_new_locations_id = 4;
//        $mission->mission_list_id = 4;
//        $mission->victim_number = 10;
//        $mission->situation = '已清除排水孔上的異物，正在觀察排水情況是否良好';
//        $mission->location = '德智街1號';
//        $mission->analysis_time = date('Y-m-d H:i:s');
//        $mission->save();


    }
}