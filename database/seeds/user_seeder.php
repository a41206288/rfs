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
        DB:: table('mission')->delete();
        DB:: table('mission_list')->delete();

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
        $mission_list->mission_name = '路面修復';
        $mission_list->save();
        $mission = new App\Mission;
        $mission->mission_id = 1;
        $mission->mission_type = '道路斷裂';
        $mission->mission_content = '該地點路面已下陷約15公分';
        $mission->fname = '林';
        $mission->lname = '小君';
        $mission->phone = '0912345678';
        $mission->email = 'qwe@yahoo.com.tw';
        $mission->location = '台中市西屯區文華路90號';
        $mission->mission_list_id = 1;
        $mission->save();

        $mission_list = new App\Mission_list;
        $mission_list->mission_list_id = 2;
        $mission_list->mission_name = '水管管線修復';
        $mission_list->save();
        $mission = new App\Mission;
        $mission->mission_id = 2;
        $mission->mission_type = '管線斷裂';
        $mission->mission_content = '水管破裂造成路上積水';
        $mission->fname = '程';
        $mission->lname = '耀文';
        $mission->phone = '0923456781';
        $mission->email = 'asd@yahoo.com.tw';
        $mission->location = '台中市西屯區逢甲路10號';
        $mission->mission_list_id = 2;
        $mission->save();

        $mission_list = new App\Mission_list;
        $mission_list->mission_list_id = 3;
        $mission_list->mission_name = '滅火並救出受傷民眾';
        $mission_list->save();
        $mission = new App\Mission;
        $mission->mission_id = 3;
        $mission->mission_type = '建築物爆炸';
        $mission->mission_content = '店家爆炸旁邊幾家住戶也遭到波及';
        $mission->fname = '耿';
        $mission->lname = '雅珍';
        $mission->phone = '0934567812';
        $mission->email = 'zxc@yahoo.com.tw';
        $mission->location = '台中市西屯區福星路431號';
        $mission->mission_list_id = 3;
        $mission->save();

        $mission_list = new App\Mission_list;
        $mission_list->mission_list_id = 4;
        $mission_list->mission_name = '救出受困民眾';
        $mission_list->save();
        $mission = new App\Mission;
        $mission->mission_id = 4;
        $mission->mission_type = '建築物倒塌';
        $mission->mission_content = '住家房屋倒塌,有3人受困其中';
        $mission->fname = '江';
        $mission->lname = '鳩';
        $mission->phone = '0945678123';
        $mission->email = 'rty@yahoo.com.tw';
        $mission->location = '台中市西屯區福星路420號';
        $mission->mission_list_id = 4;
        $mission->save();

        $mission_list = new App\Mission_list;
        $mission_list->mission_list_id = 5;
        $mission_list->mission_name = '滅火並處理斷裂電線';
        $mission_list->save();
        $mission = new App\Mission;
        $mission->mission_id = 5;
        $mission->mission_type = '道路倒塌';
        $mission->mission_content = '電線杆倒塌,變電箱起火燃燒';
        $mission->fname = '李';
        $mission->lname = '鑫';
        $mission->phone = '0967812345';
        $mission->email = 'fgh@yahoo.com.tw';
        $mission->location = '台中市西屯區西安街201號';
        $mission->mission_list_id = 5;
        $mission->save();

        $mission_list = new App\Mission_list;
        $mission_list->mission_list_id = 6;
        $mission_list->mission_name = '處理積水';
        $mission_list->save();
        $mission = new App\Mission;
        $mission->mission_id = 6;
        $mission->mission_type = '道路淹水';
        $mission->mission_content = '地下湧出大量水,造成路上嚴重積水';
        $mission->fname = '李';
        $mission->lname = '家偉';
        $mission->phone = '0978123456';
        $mission->email = 'vbn@yahoo.com.tw';
        $mission->location = '台中市西屯區逢甲路10號';
        $mission->mission_list_id = 6;
        $mission->save();

        $mission_list = new App\Mission_list;
        $mission_list->mission_list_id = 7;
        $mission_list->mission_name = '確認是否有人受困倒塌房屋中';
        $mission_list->save();
        $mission = new App\Mission;
        $mission->mission_id = 7;
        $mission->mission_type = '建築物倒塌';
        $mission->mission_content = '住家房子倒塌,無法確認是否有人受困';
        $mission->fname = '黃';
        $mission->lname = '祐錫';
        $mission->phone = '0981234567';
        $mission->email = 'uio@yahoo.com.tw';
        $mission->location = '台中市西屯區福星路433號';
        $mission->mission_list_id = 7;
        $mission->save();

        $mission_list = new App\Mission_list;
        $mission_list->mission_list_id = 8;
        $mission_list->mission_name = '滅火並確定是否有人受困';
        $mission_list->save();
        $mission = new App\Mission;
        $mission->mission_id = 8;
        $mission->mission_type = '建築物起火';
        $mission->mission_content = '資電館2樓以上起火並冒出濃煙';
        $mission->fname = '葉';
        $mission->lname = '伊富';
        $mission->phone = '0987654321';
        $mission->email = 'jkl@yahoo.com.tw';
        $mission->location = '台中市西屯區文華路100號';
        $mission->mission_list_id = 8;
        $mission->save();

        $mission_list = new App\Mission_list;
        $mission_list->mission_list_id = 9;
        $mission_list->mission_name = '確認道路狀況是否造成危險';
        $mission_list->save();
        $mission = new App\Mission;
        $mission->mission_id = 9;
        $mission->mission_type = '道路斷裂';
        $mission->mission_content = '路面有多處裂痕';
        $mission->fname = '陳';
        $mission->lname = '恩五';
        $mission->phone = '0976543218';
        $mission->email = 'qaz@yahoo.com.tw';
        $mission->location = '台中市西屯區中港路二段111號';
        $mission->mission_list_id = 9;
        $mission->save();

        $mission_list = new App\Mission_list;
        $mission_list->mission_list_id = 10;
        $mission_list->mission_name = '封鎖橋梁周圍';
        $mission_list->save();
        $mission = new App\Mission;
        $mission->mission_id = 10;
        $mission->mission_type = '橋梁斷裂';
        $mission->mission_content = '橋梁已斷裂無法通行';
        $mission->fname = '吳';
        $mission->lname = '亞軒';
        $mission->phone = '0965432187';
        $mission->email = 'wsx@yahoo.com.tw';
        $mission->location = '台中市西屯區朝陽橋';
        $mission->mission_list_id = 10;
        $mission->save();

    }
}