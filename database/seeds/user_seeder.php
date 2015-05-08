<?php
//use Kodeine\Acl\Models\Eloquent\Role;
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

class user_seeder extends Seeder{
    use HasRole;
    public function run(){
        DB:: table('users')->delete();
        DB:: table('posts')->delete();
        DB:: table('missions')->delete();
        DB:: table('mission_lists')->delete();

        $user = new App\User;
        $user->name = "王小明";
        $user->email = "123@yahoo.com.tw";
        $user->password =Hash::make ('1234');
        $user->save();

        $user = new App\User;
        $user->name = "陳小華";
        $user->email = "456@yahoo.com.tw";
        $user->password =Hash::make ('1234');
        $user->save();

        $user  = User::where('name', '=', '王小明')->first();
        $roleAdmin = Permission::where('name', '=', 'Administrator')->first();
        $user->assignRole($roleAdmin);
        $user->save();
        print_r($user->getRoles());


        $user  = User::where('name', '=', '陳小華')->first();
        $roleModerator = Permission::where('name', '=', 'Moderator')->first();
        $user->assignRole($roleModerator);
        $user->save();

        $post = new App\Post;
        $post->title = 'Laravel 學習筆記';
        $post->content = 'Laravel 是一個 PHP Web 開發框架。';
        $post->save();

        $mission_list = new App\Mission_list;
        $mission_list->mission_list_id = 1;
        $mission_list->mission_name = '西屯區';
        $mission_list->save();

        $mission_list = new App\Mission_list;
        $mission_list->mission_list_id = 2;
        $mission_list->mission_name = '北屯區';
        $mission_list->save();

        $mission_list = new App\Mission_list;
        $mission_list->mission_list_id = 3;
        $mission_list->mission_name = '台中市政府周圍';
        $mission_list->save();


        $mission = new App\Mission;
        $mission->mission_id = 1;
        $mission->mission_type = '道路斷裂';
        $mission->mission_content = '該地點路面已下陷約15公分';
        $mission->fname = '小君';
        $mission->lname = '林';
        $mission->phone = '0912345678';
        $mission->email = 'qwe@yahoo.com.tw';
        $mission->country_or_city_input = '台中';
        $mission->country_or_city = '市';
        $mission->township_or_district_input = '西屯';
        $mission->township_or_district = '區';
        $mission->location = '逢甲校門口附近';
        $mission->mission_list_id = 1;
        $mission->save();


        $mission = new App\Mission;
        $mission->mission_id = 2;
        $mission->mission_type = '管線斷裂';
        $mission->mission_content = '水管破裂造成路上積水';
        $mission->lname = '程';
        $mission->phone = '0923456781';
        $mission->country_or_city_input = '台中';
        $mission->country_or_city = '市';
        $mission->township_or_district_input = '北屯';
        $mission->township_or_district = '區';
        $mission->location = '松竹市場公車站前';
        $mission->mission_list_id = 2;
        $mission->save();

        $mission = new App\Mission;
        $mission->mission_id = 3;
        $mission->mission_type = '建築物爆炸';
        $mission->mission_content = '店家爆炸旁邊幾家住戶也遭到波及';
        $mission->fname = '雅珍';
        $mission->lname = '耿';
        $mission->phone = '0934567812';
        $mission->country_or_city_input = '台中';
        $mission->country_or_city = '市';
        $mission->township_or_district_input = '北屯';
        $mission->township_or_district = '區';
        $mission->location = '柳陽東街16號';
        $mission->mission_list_id = 2;
        $mission->save();

        $mission = new App\Mission;
        $mission->mission_id = 4;
        $mission->mission_type = '建築物倒塌';
        $mission->mission_content = '市政府倒塌,至少有3人受困其中';
        $mission->fname = '鳩';
        $mission->lname = '江';
        $mission->country_or_city_input = '台中';
        $mission->country_or_city = '市';
        $mission->township_or_district_input = '西屯';
        $mission->township_or_district = '區';
        $mission->location = '市政府';
        $mission->mission_list_id = 3;
        $mission->save();

        $mission = new App\Mission;
        $mission->mission_id = 5;
        $mission->mission_type = '道路倒塌';
        $mission->mission_content = '電線杆倒塌,變電箱起火燃燒';
        $mission->fname = '鑫';
        $mission->lname = '李';
        $mission->phone = '0967812345';
        $mission->country_or_city_input = '台中';
        $mission->country_or_city = '市';
        $mission->township_or_district_input = '西屯';
        $mission->township_or_district = '區';
        $mission->location = '公園旁';
        $mission->mission_list_id = 1;
        $mission->save();

        $mission = new App\Mission;
        $mission->mission_id = 6;
        $mission->mission_type = '道路淹水';
        $mission->mission_content = '地下湧出大量水,造成路上嚴重積水';
        $mission->lname = '李';
        $mission->phone = '0978123456';
        $mission->country_or_city_input = '台中';
        $mission->country_or_city = '市';
        $mission->township_or_district_input = '西屯';
        $mission->township_or_district = '區';
        $mission->location = '逢甲路10號';
        $mission->mission_list_id = 1;
        $mission->save();

        $mission = new App\Mission;
        $mission->mission_id = 7;
        $mission->mission_type = '建築物倒塌';
        $mission->mission_content = '住家房子倒塌,無法確認是否有人受困';
        $mission->lname = '黃';
        $mission->email = 'uio@yahoo.com.tw';
        $mission->country_or_city_input = '台中';
        $mission->country_or_city = '市';
        $mission->township_or_district_input = '北屯';
        $mission->township_or_district = '區';
        $mission->location = '青島路四段9號';
        $mission->mission_list_id = 2;
        $mission->save();

        $mission = new App\Mission;
        $mission->mission_id = 8;
        $mission->mission_type = '建築物起火';
        $mission->mission_content = '資電館2樓以上起火並冒出濃煙';
        $mission->fname = '伊富';
        $mission->lname = '葉';
        $mission->phone = '0987654321';
        $mission->country_or_city_input = '台中';
        $mission->country_or_city = '市';
        $mission->township_or_district_input = '西屯';
        $mission->township_or_district = '區';
        $mission->location = '文華路100號';
        $mission->mission_list_id = 1;
        $mission->save();

        $mission = new App\Mission;
        $mission->mission_id = 9;
        $mission->mission_type = '道路斷裂';
        $mission->mission_content = '路面有多處裂痕';
        $mission->fname = '恩五';
        $mission->lname = '陳';
        $mission->country_or_city_input = '台中';
        $mission->country_or_city = '市';
        $mission->township_or_district_input = '西屯';
        $mission->township_or_district = '區';
        $mission->location = '距一天橋10公尺左右';
        $mission->mission_list_id = 3;
        $mission->save();

        $mission = new App\Mission;
        $mission->mission_id = 10;
        $mission->mission_type = '橋梁斷裂';
        $mission->mission_content = '橋梁已斷裂無法通行';
        $mission->lname = '吳';
        $mission->phone = '0965432187';
        $mission->country_or_city_input = '台中';
        $mission->country_or_city = '市';
        $mission->township_or_district_input = '西屯';
        $mission->township_or_district = '區';
        $mission->location = '朝陽橋';
        $mission->mission_list_id = 1;
        $mission->save();

    }
}