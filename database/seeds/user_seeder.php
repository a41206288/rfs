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

        $user  = User::where('name', '=', '王小明')->first();
        $roleAdmin = Permission::where('name', '=', 'Administrator')->first();
        $user->assignRole($roleAdmin);
        $user->save();
        //print_r($user->getRoles());

        $user = new App\User;
        $user->name = "陳小華";
        $user->email = "456@yahoo.com.tw";
        $user->password =Hash::make ('1234');
        $user->save();

        $user  = User::where('name', '=', '陳小華')->first();
//        $roleAdmin = Permission::where('name', '=', 'Administrator')->first();
//        $user->assignRole($roleAdmin);
        $roleCenterCommander = Permission::where('name', '=', 'CenterCommander')->first();
        $user->assignRole($roleCenterCommander);
        $user->save();

        $user = new App\User;
        $user->name = "陳芊蓉";
        $user->email = "789@yahoo.com.tw";
        $user->password =Hash::make ('1234');
        $user->save();

        $user  = User::where('name', '=', '陳芊蓉')->first();
//        $roleAdmin = Permission::where('name', '=', 'Administrator')->first();
//        $user->assignRole($roleAdmin);
        $roleReliever = Permission::where('name', '=', 'Masses')->first();
        $user->assignRole( $roleReliever );
        $user->save();

        $user = new App\User;
        $user->name = "葉雯情";
        $user->email = "004@yahoo.com.tw";
        $user->password =Hash::make ('1234');
        $user->save();

        $user  = User::where('name', '=', '葉雯情')->first();
        $roleAdmin = Permission::where('name', '=', 'Reliever')->first();
        $user->assignRole($roleAdmin);
        $user->mission_list_id = 1;
        $user->save();
        //print_r($user->getRoles());

        $user = new App\User;
        $user->name = "林麗雯";
        $user->email = "005@yahoo.com.tw";
        $user->password =Hash::make ('1234');
        $user->save();

        $user  = User::where('name', '=', '林麗雯')->first();
        $roleAdmin = Permission::where('name', '=', 'emt')->first();
        $user->assignRole($roleAdmin);
        $user->mission_list_id = 1;
        $user->save();
        //print_r($user->getRoles());

        $user = new App\User;
        $user->name = "韓東霖";
        $user->email = "006@yahoo.com.tw";
        $user->password =Hash::make ('1234');
        $user->save();

        $user  = User::where('name', '=', '韓東霖')->first();
        $roleAdmin = Permission::where('name', '=', 'emt')->first();
        $user->assignRole($roleAdmin);
        $user->mission_list_id = 2;
        $user->save();
        //print_r($user->getRoles());

        $user = new App\User;
        $user->name = "王麗芳";
        $user->email = "007@yahoo.com.tw";
        $user->password =Hash::make ('1234');
        $user->save();

        $user  = User::where('name', '=', '王麗芳')->first();
        $roleAdmin = Permission::where('name', '=', 'Reliever')->first();
        $user->assignRole($roleAdmin);
        $user->mission_list = 5;
        $user->mission_list_id = 2;
        $user->save();
        //print_r($user->getRoles());

        $user = new App\User;
        $user->name = "吳番薯";
        $user->email = "008@yahoo.com.tw";
        $user->password =Hash::make ('1234');
        $user->save();

        $user  = User::where('name', '=', '吳番薯')->first();
        $roleAdmin = Permission::where('name', '=', 'Reliever')->first();
        $user->assignRole($roleAdmin);
        $user->mission_list = 3;
        $user->mission_list_id = 3;
        $user->save();
        //print_r($user->getRoles());

        $user = new App\User;
        $user->name = "葉欣偉";
        $user->email = "009@yahoo.com.tw";
        $user->password =Hash::make ('1234');
        $user->save();

        $user  = User::where('name', '=', '葉欣偉')->first();
        $roleAdmin = Permission::where('name', '=', 'Reliever')->first();
        $user->assignRole($roleAdmin);
        $user->mission_list = 4;
        $user->mission_list_id = 4;
        $user->save();
        //print_r($user->getRoles());

        $user = new App\User;
        $user->name = "楊光冽";
        $user->email = "010@yahoo.com.tw";
        $user->password =Hash::make ('1234');
        $user->save();

        $user  = User::where('name', '=', '楊光冽')->first();
        $roleAdmin = Permission::where('name', '=', 'Reliever')->first();
        $user->assignRole($roleAdmin);
        $user->mission_list = 11;
        $user->mission_list_id = 5;
        $user->save();
        //print_r($user->getRoles());

        $user = new App\User;
        $user->name = "簡道鉗";
        $user->email = "011@yahoo.com.tw";
        $user->password =Hash::make ('1234');
        $user->save();

        $user  = User::where('name', '=', '簡道鉗')->first();
        $roleAdmin = Permission::where('name', '=', 'Reliever')->first();
        $user->assignRole($roleAdmin);
        $user->mission_list = 14;
        $user->mission_list_id = 6;
        $user->save();
        //print_r($user->getRoles());

        $user = new App\User;
        $user->name = "林語";
        $user->email = "012@yahoo.com.tw";
        $user->password =Hash::make ('1234');
        $user->save();

        $user  = User::where('name', '=', '林語')->first();
        $roleAdmin = Permission::where('name', '=', 'Reliever')->first();
        $user->assignRole($roleAdmin);
        $user->mission_list = 12;
        $user->mission_list_id = 7;
        $user->save();
        //print_r($user->getRoles());

        $user = new App\User;
        $user->name = "耿夜";
        $user->email = "013@yahoo.com.tw";
        $user->password =Hash::make ('1234');
        $user->save();

        $user  = User::where('name', '=', '耿夜')->first();
        $roleAdmin = Permission::where('name', '=', 'Reliever')->first();
        $user->assignRole($roleAdmin);
        $user->mission_list_id = 1;
        $user->save();
        //print_r($user->getRoles());

        $user = new App\User;
        $user->name = "彭士萱";
        $user->email = "014@yahoo.com.tw";
        $user->password =Hash::make ('1234');
        $user->save();

        $user  = User::where('name', '=', '彭士萱')->first();
        $roleAdmin = Permission::where('name', '=', 'Reliever')->first();
        $user->assignRole($roleAdmin);
        $user->mission_list = 6;
        $user->mission_list_id = 2;
        $user->save();
        //print_r($user->getRoles());

        $user = new App\User;
        $user->name = "黃奇偉";
        $user->email = "015@yahoo.com.tw";
        $user->password =Hash::make ('1234');
        $user->save();

        $user  = User::where('name', '=', '黃奇偉')->first();
        $roleAdmin = Permission::where('name', '=', 'Reliever')->first();
        $user->assignRole($roleAdmin);
        $user->mission_list = 7;
        $user->mission_list_id = 3;
        $user->save();
        //print_r($user->getRoles());

        $user = new App\User;
        $user->name = "丁凝";
        $user->email = "016@yahoo.com.tw";
        $user->password =Hash::make ('1234');
        $user->save();

        $user  = User::where('name', '=', '丁凝')->first();
        $roleAdmin = Permission::where('name', '=', 'Reliever')->first();
        $user->assignRole($roleAdmin);
        $user->mission_list = 9;
        $user->mission_list_id = 4;
        $user->save();
        //print_r($user->getRoles());

        $user = new App\User;
        $user->name = "曾家琪";
        $user->email = "017@yahoo.com.tw";
        $user->password =Hash::make ('1234');
        $user->save();

        $user  = User::where('name', '=', '曾家琪')->first();
        $roleAdmin = Permission::where('name', '=', 'Reliever')->first();
        $user->assignRole($roleAdmin);
        $user->mission_list = 17;
        $user->mission_list_id = 5;
        $user->save();
        //print_r($user->getRoles());

        $user = new App\User;
        $user->name = "顧溪中";
        $user->email = "018@yahoo.com.tw";
        $user->password =Hash::make ('1234');
        $user->save();

        $user  = User::where('name', '=', '顧溪中')->first();
        $roleAdmin = Permission::where('name', '=', 'Reliever')->first();
        $user->assignRole($roleAdmin);
        $user->mission_list = 15;
        $user->mission_list_id = 6;
        $user->save();
        //print_r($user->getRoles());

        $user = new App\User;
        $user->name = "鍾渝";
        $user->email = "019@yahoo.com.tw";
        $user->password =Hash::make ('1234');
        $user->save();

        $user  = User::where('name', '=', '鍾渝')->first();
        $roleAdmin = Permission::where('name', '=', 'Reliever')->first();
        $user->assignRole($roleAdmin);
        $user->mission_list = 13;
        $user->mission_list_id = 7;
        $user->save();
        //print_r($user->getRoles());

        $user = new App\User;
        $user->name = "金南響";
        $user->email = "020@yahoo.com.tw";
        $user->password =Hash::make ('1234');
        $user->save();

        $user  = User::where('name', '=', '金南響')->first();
        $roleAdmin = Permission::where('name', '=', 'emt')->first();
        $user->assignRole($roleAdmin);
        $user->mission_list_id = 3;
        $user->save();
        //print_r($user->getRoles());

        $user = new App\User;
        $user->name = "呂伙棲";
        $user->email = "021@yahoo.com.tw";
        $user->password =Hash::make ('1234');
        $user->save();

        $user  = User::where('name', '=', '呂伙棲')->first();
        $roleAdmin = Permission::where('name', '=', 'emt')->first();
        $user->assignRole($roleAdmin);
        $user->mission_list_id = 4;
        $user->save();
        //print_r($user->getRoles());

        $user = new App\User;
        $user->name = "江晉玖";
        $user->email = "022@yahoo.com.tw";
        $user->password =Hash::make ('1234');
        $user->save();

        $user  = User::where('name', '=', '江晉玖')->first();
        $roleAdmin = Permission::where('name', '=', 'emt')->first();
        $user->assignRole($roleAdmin);
        $user->mission_list_id = 5;
        $user->save();
        //print_r($user->getRoles());

        $user = new App\User;
        $user->name = "高吉夙";
        $user->email = "023@yahoo.com.tw";
        $user->password =Hash::make ('1234');
        $user->save();

        $user  = User::where('name', '=', '高吉夙')->first();
        $roleAdmin = Permission::where('name', '=', 'emt')->first();
        $user->assignRole($roleAdmin);
        $user->mission_list_id = 6;
        $user->save();
        //print_r($user->getRoles());

        $user = new App\User;
        $user->name = "柯苛科";
        $user->email = "024@yahoo.com.tw";
        $user->password =Hash::make ('1234');
        $user->save();

        $user  = User::where('name', '=', '柯苛科')->first();
        $roleAdmin = Permission::where('name', '=', 'emt')->first();
        $user->assignRole($roleAdmin);
        $user->mission_list_id = 7;
        $user->save();
        //print_r($user->getRoles());

        $user = new App\User;
        $user->name = "白卓逸";
        $user->email = "025@yahoo.com.tw";
        $user->password =Hash::make ('1234');
        $user->save();

        $user  = User::where('name', '=', '白卓逸')->first();
        $roleAdmin = Permission::where('name', '=', 'emt')->first();
        $user->assignRole($roleAdmin);
        $user->mission_list_id = 7;
        $user->save();
        //print_r($user->getRoles());

        $user = new App\User;
        $user->name = "郭曉建";
        $user->email = "026@yahoo.com.tw";
        $user->password =Hash::make ('1234');
        $user->save();

        $user  = User::where('name', '=', '郭曉建')->first();
        $roleAdmin = Permission::where('name', '=', 'emt')->first();
        $user->assignRole($roleAdmin);
        $user->mission_list_id = 2;
        $user->save();
        //print_r($user->getRoles());

        $user = new App\User;
        $user->name = "詹絳";
        $user->email = "027@yahoo.com.tw";
        $user->password =Hash::make ('1234');
        $user->save();

        $user  = User::where('name', '=', '詹絳')->first();
        $roleAdmin = Permission::where('name', '=', 'emt')->first();
        $user->assignRole($roleAdmin);
        $user->mission_list_id = 3;
        $user->save();
        //print_r($user->getRoles());

        $user = new App\User;
        $user->name = "趙漾刻";
        $user->email = "028@yahoo.com.tw";
        $user->password =Hash::make ('1234');
        $user->save();

        $user  = User::where('name', '=', '趙漾刻')->first();
        $roleAdmin = Permission::where('name', '=', 'emt')->first();
        $user->assignRole($roleAdmin);
        $user->mission_list_id = 4;
        $user->save();
        //print_r($user->getRoles());

        $user = new App\User;
        $user->name = "朱禮姚";
        $user->email = "029@yahoo.com.tw";
        $user->password =Hash::make ('1234');
        $user->save();

        $user  = User::where('name', '=', '朱禮姚')->first();
        $roleAdmin = Permission::where('name', '=', 'emt')->first();
        $user->assignRole($roleAdmin);
        $user->mission_list_id = 5;
        $user->save();
        //print_r($user->getRoles());

        $user = new App\User;
        $user->name = "唐臥土";
        $user->email = "030@yahoo.com.tw";
        $user->password =Hash::make ('1234');
        $user->save();

        $user  = User::where('name', '=', '唐臥土')->first();
        $roleAdmin = Permission::where('name', '=', 'emt')->first();
        $user->assignRole($roleAdmin);
        $user->mission_list_id = 6;
        $user->save();
        //print_r($user->getRoles());

        $user = new App\User;
        $user->name = "尤燕";
        $user->email = "031@yahoo.com.tw";
        $user->password =Hash::make ('1234');
        $user->save();

        $user  = User::where('name', '=', '尤燕')->first();
        $roleAdmin = Permission::where('name', '=', 'LocalCommander')->first();
        $user->assignRole($roleAdmin);
        $user->mission_list_id = 1;
        $user->save();
        //print_r($user->getRoles());

        $user = new App\User;
        $user->name = "謝卸";
        $user->email = "032@yahoo.com.tw";
        $user->password =Hash::make ('1234');
        $user->save();

        $user  = User::where('name', '=', '謝卸')->first();
        $roleAdmin = Permission::where('name', '=', 'LocalCommander')->first();
        $user->assignRole($roleAdmin);
        $user->mission_list_id = 2;
        $user->save();
        //print_r($user->getRoles());

        $user = new App\User;
        $user->name = "莊簿郝";
        $user->email = "033@yahoo.com.tw";
        $user->password =Hash::make ('1234');
        $user->save();

        $user  = User::where('name', '=', '莊簿郝')->first();
        $roleAdmin = Permission::where('name', '=', 'LocalCommander')->first();
        $user->assignRole($roleAdmin);
        $user->mission_list_id = 3;
        $user->save();
        //print_r($user->getRoles());

        $user = new App\User;
        $user->name = "鄭織恩";
        $user->email = "034@yahoo.com.tw";
        $user->password =Hash::make ('1234');
        $user->save();

        $user  = User::where('name', '=', '鄭織恩')->first();
        $roleAdmin = Permission::where('name', '=', 'LocalCommander')->first();
        $user->assignRole($roleAdmin);
        $user->mission_list_id = 4;
        $user->save();
        //print_r($user->getRoles());

        $user = new App\User;
        $user->name = "許瑗慈";
        $user->email = "035@yahoo.com.tw";
        $user->password =Hash::make ('1234');
        $user->save();

        $user  = User::where('name', '=', '許瑗慈')->first();
        $roleAdmin = Permission::where('name', '=', 'LocalCommander')->first();
        $user->assignRole($roleAdmin);
        $user->mission_list_id = 5;
        $user->save();
        //print_r($user->getRoles());

        $user = new App\User;
        $user->name = "張俞";
        $user->email = "036@yahoo.com.tw";
        $user->password =Hash::make ('1234');
        $user->save();

        $user  = User::where('name', '=', '張俞')->first();
        $roleAdmin = Permission::where('name', '=', 'LocalCommander')->first();
        $user->assignRole($roleAdmin);
        $user->mission_list_id = 6;
        $user->save();
        //print_r($user->getRoles());

        $user = new App\User;
        $user->name = "劉夏萊";
        $user->email = "037@yahoo.com.tw";
        $user->password =Hash::make ('1234');
        $user->save();

        $user  = User::where('name', '=', '劉夏萊')->first();
        $roleAdmin = Permission::where('name', '=', 'LocalCommander')->first();
        $user->assignRole($roleAdmin);
        $user->mission_list_id = 7;
        $user->save();
        //print_r($user->getRoles());



        $post = new App\Post;
        $post->title = 'Laravel 學習筆記';
        $post->content = 'Laravel 是一個 PHP Web 開發框架。';
        $post->save();

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


        $mission = new App\Mission;
        $mission->mission_id = 1;
        $mission->mission_type = '道路斷裂';
        $mission->mission_content = '該地點路面已下陷約15公分';
        $mission->fname = '小君';
        $mission->lname = '林';
        $mission->phone = '0912345678';
        $mission->email = 'qwe@yahoo.com.tw';
        $mission->country_or_city_input = '台中市';
       // $mission->country_or_city = '';
        $mission->township_or_district_input = '西屯區';
        //$mission->township_or_district = '區';
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
        //$mission->country_or_city = '';
        $mission->township_or_district_input = '北屯區';
        //$mission->township_or_district = '';
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
        //$mission->country_or_city = '';
        $mission->township_or_district_input = '北屯區';
        //$mission->township_or_district = '';
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
        //$mission->country_or_city = '市';
        $mission->township_or_district_input = '西屯區';
       // $mission->township_or_district = '區';
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
        //$mission->country_or_city = '市';
        $mission->township_or_district_input = '西屯區';
        //$mission->township_or_district = '區';
        $mission->location = '公園旁';
        $mission->mission_list_id = 2;
        $mission->save();

        $mission = new App\Mission;
        $mission->mission_id = 6;
        $mission->mission_type = '道路淹水';
        $mission->mission_content = '地下湧出大量水,造成路上嚴重積水';
        $mission->lname = '李';
        $mission->phone = '0978123456';
        $mission->country_or_city_input = '台中市';
        //$mission->country_or_city = '市';
        $mission->township_or_district_input = '西屯區';
       // $mission->township_or_district = '區';
        $mission->location = '逢甲路10號';
        $mission->mission_list_id = 2;
        $mission->save();

        $mission = new App\Mission;
        $mission->mission_id = 7;
        $mission->mission_type = '建築物倒塌';
        $mission->mission_content = '住家房子倒塌,無法確認是否有人受困';
        $mission->lname = '黃';
        $mission->email = 'uio@yahoo.com.tw';
        $mission->country_or_city_input = '台中市';
       // $mission->country_or_city = '市';
        $mission->township_or_district_input = '北屯區';
        //$mission->township_or_district = '區';
        $mission->location = '青島路四段9號';
        $mission->mission_list_id = 3;
        $mission->save();

        $mission = new App\Mission;
        $mission->mission_id = 8;
        $mission->mission_type = '建築物起火';
        $mission->mission_content = '資電館2樓以上起火並冒出濃煙';
        $mission->fname = '伊富';
        $mission->lname = '葉';
        $mission->phone = '0987654321';
        $mission->country_or_city_input = '台中市';
        //$mission->country_or_city = '市';
        $mission->township_or_district_input = '西屯區';
        //$mission->township_or_district = '區';
        $mission->location = '文華路100號';
        $mission->mission_list_id = 2;
        $mission->save();

        $mission = new App\Mission;
        $mission->mission_id = 9;
        $mission->mission_type = '道路斷裂';
        $mission->mission_content = '路面有多處裂痕';
        $mission->fname = '恩五';
        $mission->lname = '陳';
        $mission->country_or_city_input = '台中市';
        //$mission->country_or_city = '市';
        $mission->township_or_district_input = '西屯區';
        //$mission->township_or_district = '區';
        $mission->location = '距一天橋10公尺左右';
        $mission->mission_list_id = 4;
        $mission->save();

        $mission = new App\Mission;
        $mission->mission_id = 10;
        $mission->mission_type = '橋梁斷裂';
        $mission->mission_content = '橋梁已斷裂無法通行';
        $mission->lname = '吳';
        $mission->phone = '0965432187';
        $mission->country_or_city_input = '台中市';
        //$mission->country_or_city = '市';
        $mission->township_or_district_input = '西屯區';
       // $mission->township_or_district = '區';
        $mission->location = '朝陽橋';
        $mission->mission_list_id = 2;
        $mission->save();

        $mission = new App\Mission;
        $mission->mission_id = 11;
        $mission->mission_type = '建築物倒塌';
        $mission->mission_content = '3層樓高之建築物倒塌,一旁的道路有一線道因建築物倒塌而無法通行';
        $mission->fname = '威德';
        $mission->lname = '簡';
        $mission->phone = '0987548754';
        $mission->country_or_city_input = '新北市';
        //$mission->country_or_city = '市';
        $mission->township_or_district_input = '新莊區';
       // $mission->township_or_district = '區';
        $mission->location = '中正路621號';
        $mission->mission_list_id = 5;
        $mission->save();

        $mission = new App\Mission;
        $mission->mission_id = 12;
        $mission->mission_type = '管線斷裂';
        $mission->mission_content = '從地面裂縫中滲出水';
        $mission->lname = '王';
        $mission->phone = '0912345678';
        $mission->country_or_city_input = '台北市';
        //$mission->country_or_city = '市';
        $mission->township_or_district_input = '中正區';
        //$mission->township_or_district = '區';
        $mission->location = '杭州南路一段55號';
        $mission->mission_list_id = 7;
        $mission->save();

        $mission = new App\Mission;
        $mission->mission_id = 13;
        $mission->mission_type = '建築物起火';
        $mission->mission_content = '建築物內冒出濃煙, 確定內部無受困者';
        $mission->lname = '何';
        $mission->phone = '0912345678';
        $mission->country_or_city_input = '台北市';
       // $mission->country_or_city = '市';
        $mission->township_or_district_input = '中正區';
       // $mission->township_or_district = '區';
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
        //$mission->country_or_city = '市';
        $mission->township_or_district_input = '苓雅區';
       // $mission->township_or_district = '區';
        $mission->location = '仁德街';
        $mission->mission_list_id = 6;
        $mission->save();

        $mission = new App\Mission;
        $mission->mission_id = 15;
        $mission->mission_type = '道路斷裂';
        $mission->mission_content = '道路多處地方斷裂且變形';
        $mission->lname = '紀';
        $mission->email = 'yui@yahoo.com.tw';
        $mission->country_or_city_input = '高雄市';
       // $mission->country_or_city = '市';
        $mission->township_or_district_input = '前金區';
        //$mission->township_or_district = '區';
        $mission->location = '85大樓周圍';
        $mission->mission_list_id = 6;
        $mission->save();

        $mission = new App\Mission;
        $mission->mission_id = 16;
        $mission->mission_type = '管線斷裂';
        $mission->mission_content = '地面有兩處不斷冒出水';
        $mission->lname = '蔡';
        $mission->phone = '0923232323';
        $mission->country_or_city_input = '新北市';
        //$mission->country_or_city = '市';
        $mission->township_or_district_input = '新莊區';
        //$mission->township_or_district = '區';
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
        //$mission->country_or_city = '市';
        $mission->township_or_district_input = '新莊區';
       // $mission->township_or_district = '區';
        $mission->location = '距捷運站5公尺處';
        $mission->mission_list_id = 5;
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
        // $mission->country_or_city = '';
        $mission->township_or_district_input = '三民區';
        //$mission->township_or_district = '區';
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
        // $mission->country_or_city = '';
        $mission->township_or_district_input = '三民區';
        //$mission->township_or_district = '區';
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
        // $mission->country_or_city = '';
        $mission->township_or_district_input = '花蓮市';
        //$mission->township_or_district = '區';
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
        // $mission->country_or_city = '';
        $mission->township_or_district_input = '壽豐鄉';
        //$mission->township_or_district = '區';
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
        // $mission->country_or_city = '';
        $mission->township_or_district_input = '蘆洲區';
        //$mission->township_or_district = '區';
        $mission->location = '長榮路238號';
        $mission->mission_list_id = 1;
        $mission->save();

        $mission = new App\Mission;
        $mission->mission_id = 23;
        $mission->mission_type = '建築物爆炸';
        $mission->mission_content = '1樓店家爆炸起火, 無法確定是否有人受困';
        $mission->lname = '韓';
        $mission->country_or_city_input = '新北市';
        // $mission->country_or_city = '';
        $mission->township_or_district_input = '蘆洲區';
        //$mission->township_or_district = '區';
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
        // $mission->country_or_city = '';
        $mission->township_or_district_input = '松山區';
        //$mission->township_or_district = '區';
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
        // $mission->country_or_city = '';
        $mission->township_or_district_input = '松山區';
        //$mission->township_or_district = '區';
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
        // $mission->country_or_city = '';
        $mission->township_or_district_input = '北屯區';
        //$mission->township_or_district = '區';
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
        // $mission->country_or_city = '';
        $mission->township_or_district_input = '北屯區';
        //$mission->township_or_district = '區';
        $mission->location = '東山路一段185號';
        $mission->mission_list_id = 1;
        $mission->save();

    }
}