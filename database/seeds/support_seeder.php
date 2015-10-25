<?php
use Illuminate\Support\Facades\DB;
use Kodeine\Acl\Models\Eloquent\Permission;
use Kodeine\Acl\Traits\HasRole;
use Illuminate\Database\Seeder;
use app\User;
use app\Post;
use app\Skill;
use app\Skill_support_person;
use app\Skill_user;

/**
 * Created by PhpStorm.
 * User: Tsugumi
 * Date: 2015/4/14
 * Time: 下午 03:47
 */

class support_seeder extends Seeder{
    use HasRole;
    public function run(){
//        DB:: table('product_total_amounts')->delete();
//        DB:: table('local_safe_amounts')->delete();
//        DB:: table('donates')->delete();
//        DB:: table('donate_products')->delete();
        DB:: table('center_support_people')->delete();
        DB:: table('center_support_person_details')->delete();
        DB:: table('mission_support_people')->delete();
        DB:: table('mission_help_others')->delete();
        DB:: table('skills')->delete();
        DB:: table('center_support_people_skills')->delete();
        DB:: table('center_support_person_detail_skills')->delete();
        DB:: table('user_skills')->delete();
//        DB:: table('center_support_products')->delete();
//        DB:: table('buys')->delete();
//        DB:: table('companies')->delete();
//        DB:: table('interviews')->delete();
//        DB:: table('interviewers')->delete();


//        $product_total_amount = new App\Product_total_amount;
//        $product_total_amount->product_total_amount_id = 1;
//        $product_total_amount->product_name = "泡麵";
//        $product_total_amount->unit = "碗";
//        $product_total_amount->save();
//
//        $product_total_amount = new App\Product_total_amount;
//        $product_total_amount->product_total_amount_id = 2;
//        $product_total_amount->product_name = "礦泉水";
//        $product_total_amount->unit = "瓶";
//        $product_total_amount->save();
//
//        $product_total_amount = new App\Product_total_amount;
//        $product_total_amount->product_total_amount_id = 3;
//        $product_total_amount->product_name = "麵包";
//        $product_total_amount->unit = "個";
//        $product_total_amount->save();
//
//        $product_total_amount = new App\Product_total_amount;
//        $product_total_amount->product_total_amount_id = 4;
//        $product_total_amount->product_name = "繃帶";
//        $product_total_amount->unit = "捲";
//        $product_total_amount->save();
//
//        $product_total_amount = new App\Product_total_amount;
//        $product_total_amount->product_total_amount_id = 5;
//        $product_total_amount->product_name = "口糧";
//        $product_total_amount->unit = "包";
//        $product_total_amount->save();
//
//        $product_total_amount = new App\Product_total_amount;
//        $product_total_amount->product_total_amount_id = 6;
//        $product_total_amount->product_name = "雨衣";
//        $product_total_amount->unit = "件";
//        $product_total_amount->save();
//
//        $product_total_amount = new App\Product_total_amount;
//        $product_total_amount->product_total_amount_id = 7;
//        $product_total_amount->product_name = "手電筒";
//        $product_total_amount->unit = "支";
//        $product_total_amount->save();
//
//        $product_total_amount = new App\Product_total_amount;
//        $product_total_amount->product_total_amount_id = 8;
//        $product_total_amount->product_name = "垃圾袋";
//        $product_total_amount->unit = "捲";
//        $product_total_amount->save();
//
//        $product_total_amount = new App\Product_total_amount;
//        $product_total_amount->product_total_amount_id = 9;
//        $product_total_amount->product_name = "衛生紙";
//        $product_total_amount->unit = "包";
//        $product_total_amount->save();
//
//        $product_total_amount = new App\Product_total_amount;
//        $product_total_amount->product_total_amount_id = 10;
//        $product_total_amount->product_name = "薄被子";
//        $product_total_amount->unit = "條";
//        $product_total_amount->save();
//
//
//
//        $product_total_amount = new App\Local_safe_amount;
//        $product_total_amount->local_safe_amount_id = 1;
//        $product_total_amount->mission_list_id = 1;
//        $product_total_amount->product_total_amount_id = 1;
//        $product_total_amount->safe_amount = 100;
//        $product_total_amount->amount = 200;
//        $product_total_amount->save();
//
//        $product_total_amount = new App\Local_safe_amount;
//        $product_total_amount->local_safe_amount_id = 2;
//        $product_total_amount->mission_list_id = 1;
//        $product_total_amount->product_total_amount_id = 2;
//        $product_total_amount->safe_amount = 300;
//        $product_total_amount->amount = 90;
//        $product_total_amount->save();
//
//        $product_total_amount = new App\Local_safe_amount;
//        $product_total_amount->local_safe_amount_id = 3;
//        $product_total_amount->mission_list_id = 1;
//        $product_total_amount->product_total_amount_id = 3;
//        $product_total_amount->safe_amount = 210;
//        $product_total_amount->amount = 100;
//        $product_total_amount->save();
//
//        $product_total_amount = new App\Local_safe_amount;
//        $product_total_amount->local_safe_amount_id = 4;
//        $product_total_amount->mission_list_id = 1;
//        $product_total_amount->product_total_amount_id = 4;
//        $product_total_amount->safe_amount = 80;
//        $product_total_amount->amount = 120;
//        $product_total_amount->save();
//
//        $product_total_amount = new App\Local_safe_amount;
//        $product_total_amount->local_safe_amount_id = 5;
//        $product_total_amount->mission_list_id = 1;
//        $product_total_amount->product_total_amount_id = 5;
//        $product_total_amount->safe_amount = 90;
//        $product_total_amount->amount = 100;
//        $product_total_amount->save();
//
//        $product_total_amount = new App\Local_safe_amount;
//        $product_total_amount->local_safe_amount_id = 6;
//        $product_total_amount->mission_list_id = 1;
//        $product_total_amount->product_total_amount_id = 6;
//        $product_total_amount->safe_amount = 30;
//        $product_total_amount->amount = 45;
//        $product_total_amount->save();
//
//        $product_total_amount = new App\Local_safe_amount;
//        $product_total_amount->local_safe_amount_id = 7;
//        $product_total_amount->mission_list_id = 1;
//        $product_total_amount->product_total_amount_id = 7;
//        $product_total_amount->safe_amount = 20;
//        $product_total_amount->amount = 20;
//        $product_total_amount->save();
//
//        $product_total_amount = new App\Local_safe_amount;
//        $product_total_amount->local_safe_amount_id = 8;
//        $product_total_amount->mission_list_id = 1;
//        $product_total_amount->product_total_amount_id = 8;
//        $product_total_amount->safe_amount = 15;
//        $product_total_amount->amount = 27;
//        $product_total_amount->save();
//
//        $product_total_amount = new App\Local_safe_amount;
//        $product_total_amount->local_safe_amount_id = 9;
//        $product_total_amount->mission_list_id = 1;
//        $product_total_amount->product_total_amount_id = 9;
//        $product_total_amount->safe_amount = 35;
//        $product_total_amount->amount = 51;
//        $product_total_amount->save();
//
//        $product_total_amount = new App\Local_safe_amount;
//        $product_total_amount->local_safe_amount_id = 10;
//        $product_total_amount->mission_list_id = 1;
//        $product_total_amount->product_total_amount_id = 10;
//        $product_total_amount->safe_amount = 60;
//        $product_total_amount->amount = 69;
//        $product_total_amount->save();
//
//        $product_total_amount = new App\Local_safe_amount;
//        $product_total_amount->local_safe_amount_id = 11;
//        $product_total_amount->mission_list_id = 2;
//        $product_total_amount->product_total_amount_id = 1;
//        $product_total_amount->safe_amount = 6;
//        $product_total_amount->amount = 6;
//        $product_total_amount->save();
//
//        $product_total_amount = new App\Local_safe_amount;
//        $product_total_amount->local_safe_amount_id = 12;
//        $product_total_amount->mission_list_id = 2;
//        $product_total_amount->product_total_amount_id = 2;
//        $product_total_amount->safe_amount = 10;
//        $product_total_amount->amount = 15;
//        $product_total_amount->save();
//
//        $product_total_amount = new App\Local_safe_amount;
//        $product_total_amount->local_safe_amount_id = 13;
//        $product_total_amount->mission_list_id = 2;
//        $product_total_amount->product_total_amount_id = 3;
//        $product_total_amount->safe_amount = 5;
//        $product_total_amount->amount = 5;
//        $product_total_amount->save();
//
//        $product_total_amount = new App\Local_safe_amount;
//        $product_total_amount->local_safe_amount_id = 14;
//        $product_total_amount->mission_list_id = 2;
//        $product_total_amount->product_total_amount_id = 4;
//        $product_total_amount->safe_amount = 5;
//        $product_total_amount->amount = 5;
//        $product_total_amount->save();
//
//        $product_total_amount = new App\Local_safe_amount;
//        $product_total_amount->local_safe_amount_id = 15;
//        $product_total_amount->mission_list_id = 2;
//        $product_total_amount->product_total_amount_id = 5;
//        $product_total_amount->safe_amount = 10;
//        $product_total_amount->amount = 10;
//        $product_total_amount->save();
//
//        $product_total_amount = new App\Local_safe_amount;
//        $product_total_amount->local_safe_amount_id = 16;
//        $product_total_amount->mission_list_id = 2;
//        $product_total_amount->product_total_amount_id = 6;
//        $product_total_amount->safe_amount = 3;
//        $product_total_amount->amount = 3;
//        $product_total_amount->save();
//
//        $product_total_amount = new App\Local_safe_amount;
//        $product_total_amount->local_safe_amount_id = 17;
//        $product_total_amount->mission_list_id = 2;
//        $product_total_amount->product_total_amount_id = 7;
//        $product_total_amount->safe_amount = 3;
//        $product_total_amount->amount = 3;
//        $product_total_amount->save();
//
//        $product_total_amount = new App\Local_safe_amount;
//        $product_total_amount->local_safe_amount_id = 18;
//        $product_total_amount->mission_list_id = 2;
//        $product_total_amount->product_total_amount_id = 8;
//        $product_total_amount->safe_amount = 3;
//        $product_total_amount->amount = 4;
//        $product_total_amount->save();
//
//        $product_total_amount = new App\Local_safe_amount;
//        $product_total_amount->local_safe_amount_id = 19;
//        $product_total_amount->mission_list_id = 2;
//        $product_total_amount->product_total_amount_id = 9;
//        $product_total_amount->safe_amount = 1;
//        $product_total_amount->amount = 1;
//        $product_total_amount->save();
//
//        $product_total_amount = new App\Local_safe_amount;
//        $product_total_amount->local_safe_amount_id = 20;
//        $product_total_amount->mission_list_id = 2;
//        $product_total_amount->product_total_amount_id = 10;
//        $product_total_amount->safe_amount = 4;
//        $product_total_amount->amount = 5;
//        $product_total_amount->save();
//
//        $product_total_amount = new App\Local_safe_amount;
//        $product_total_amount->local_safe_amount_id = 21;
//        $product_total_amount->mission_list_id = 3;
//        $product_total_amount->product_total_amount_id = 1;
//        $product_total_amount->safe_amount = 9;
//        $product_total_amount->amount = 5;
//        $product_total_amount->save();
//
//        $product_total_amount = new App\Local_safe_amount;
//        $product_total_amount->local_safe_amount_id = 22;
//        $product_total_amount->mission_list_id = 3;
//        $product_total_amount->product_total_amount_id = 2;
//        $product_total_amount->safe_amount = 10;
//        $product_total_amount->amount = 8;
//        $product_total_amount->save();
//
//        $product_total_amount = new App\Local_safe_amount;
//        $product_total_amount->local_safe_amount_id = 23;
//        $product_total_amount->mission_list_id = 3;
//        $product_total_amount->product_total_amount_id = 3;
//        $product_total_amount->safe_amount = 3;
//        $product_total_amount->amount = 5;
//        $product_total_amount->save();
//
//        $product_total_amount = new App\Local_safe_amount;
//        $product_total_amount->local_safe_amount_id = 24;
//        $product_total_amount->mission_list_id = 3;
//        $product_total_amount->product_total_amount_id = 4;
//        $product_total_amount->safe_amount = 10;
//        $product_total_amount->amount = 15;
//        $product_total_amount->save();
//
//        $product_total_amount = new App\Local_safe_amount;
//        $product_total_amount->local_safe_amount_id = 25;
//        $product_total_amount->mission_list_id = 3;
//        $product_total_amount->product_total_amount_id = 5;
//        $product_total_amount->safe_amount = 15;
//        $product_total_amount->amount = 10;
//        $product_total_amount->save();
//
//        $product_total_amount = new App\Local_safe_amount;
//        $product_total_amount->local_safe_amount_id = 26;
//        $product_total_amount->mission_list_id = 3;
//        $product_total_amount->product_total_amount_id = 6;
//        $product_total_amount->safe_amount = 2;
//        $product_total_amount->amount = 2;
//        $product_total_amount->save();
//
//        $product_total_amount = new App\Local_safe_amount;
//        $product_total_amount->local_safe_amount_id = 27;
//        $product_total_amount->mission_list_id = 3;
//        $product_total_amount->product_total_amount_id = 7;
//        $product_total_amount->safe_amount = 5;
//        $product_total_amount->amount = 7;
//        $product_total_amount->save();
//
//        $product_total_amount = new App\Local_safe_amount;
//        $product_total_amount->local_safe_amount_id = 28;
//        $product_total_amount->mission_list_id = 3;
//        $product_total_amount->product_total_amount_id = 8;
//        $product_total_amount->safe_amount = 5;
//        $product_total_amount->amount = 5;
//        $product_total_amount->save();
//
//        $product_total_amount = new App\Local_safe_amount;
//        $product_total_amount->local_safe_amount_id = 29;
//        $product_total_amount->mission_list_id = 3;
//        $product_total_amount->product_total_amount_id = 9;
//        $product_total_amount->safe_amount = 2;
//        $product_total_amount->amount = 3;
//        $product_total_amount->save();
//
//        $product_total_amount = new App\Local_safe_amount;
//        $product_total_amount->local_safe_amount_id = 30;
//        $product_total_amount->mission_list_id = 3;
//        $product_total_amount->product_total_amount_id = 10;
//        $product_total_amount->safe_amount = 10;
//        $product_total_amount->amount = 15;
//        $product_total_amount->save();
//
//        $product_total_amount = new App\Local_safe_amount;
//        $product_total_amount->local_safe_amount_id = 31;
//        $product_total_amount->mission_list_id = 4;
//        $product_total_amount->product_total_amount_id = 1;
//        $product_total_amount->safe_amount = 10;
//        $product_total_amount->amount = 10;
//        $product_total_amount->save();
//
//        $product_total_amount = new App\Local_safe_amount;
//        $product_total_amount->local_safe_amount_id = 32;
//        $product_total_amount->mission_list_id = 4;
//        $product_total_amount->product_total_amount_id = 2;
//        $product_total_amount->safe_amount = 20;
//        $product_total_amount->amount = 30;
//        $product_total_amount->save();
//
//        $product_total_amount = new App\Local_safe_amount;
//        $product_total_amount->local_safe_amount_id = 33;
//        $product_total_amount->mission_list_id = 4;
//        $product_total_amount->product_total_amount_id = 3;
//        $product_total_amount->safe_amount = 5;
//        $product_total_amount->amount = 10;
//        $product_total_amount->save();
//
//        $product_total_amount = new App\Local_safe_amount;
//        $product_total_amount->local_safe_amount_id = 34;
//        $product_total_amount->mission_list_id = 4;
//        $product_total_amount->product_total_amount_id = 4;
//        $product_total_amount->safe_amount = 15;
//        $product_total_amount->amount = 7;
//        $product_total_amount->save();
//
//        $product_total_amount = new App\Local_safe_amount;
//        $product_total_amount->local_safe_amount_id = 35;
//        $product_total_amount->mission_list_id = 4;
//        $product_total_amount->product_total_amount_id = 5;
//        $product_total_amount->safe_amount = 10;
//        $product_total_amount->amount = 20;
//        $product_total_amount->save();
//
//        $product_total_amount = new App\Local_safe_amount;
//        $product_total_amount->local_safe_amount_id = 36;
//        $product_total_amount->mission_list_id = 4;
//        $product_total_amount->product_total_amount_id = 6;
//        $product_total_amount->safe_amount = 5;
//        $product_total_amount->amount = 5;
//        $product_total_amount->save();
//
//        $product_total_amount = new App\Local_safe_amount;
//        $product_total_amount->local_safe_amount_id = 37;
//        $product_total_amount->mission_list_id = 4;
//        $product_total_amount->product_total_amount_id = 7;
//        $product_total_amount->safe_amount = 8;
//        $product_total_amount->amount = 3;
//        $product_total_amount->save();
//
//        $product_total_amount = new App\Local_safe_amount;
//        $product_total_amount->local_safe_amount_id = 38;
//        $product_total_amount->mission_list_id = 4;
//        $product_total_amount->product_total_amount_id = 8;
//        $product_total_amount->safe_amount = 2;
//        $product_total_amount->amount = 5;
//        $product_total_amount->save();
//
//        $product_total_amount = new App\Local_safe_amount;
//        $product_total_amount->local_safe_amount_id = 39;
//        $product_total_amount->mission_list_id = 4;
//        $product_total_amount->product_total_amount_id = 9;
//        $product_total_amount->safe_amount = 2;
//        $product_total_amount->amount = 2;
//        $product_total_amount->save();
//
//        $product_total_amount = new App\Local_safe_amount;
//        $product_total_amount->local_safe_amount_id = 40;
//        $product_total_amount->mission_list_id = 4;
//        $product_total_amount->product_total_amount_id = 10;
//        $product_total_amount->safe_amount = 10;
//        $product_total_amount->amount = 12;
//        $product_total_amount->save();
//
//        $product_total_amount = new App\Local_safe_amount;
//        $product_total_amount->local_safe_amount_id = 41;
//        $product_total_amount->mission_list_id = 5;
//        $product_total_amount->product_total_amount_id = 1;
//        $product_total_amount->safe_amount = 10;
//        $product_total_amount->amount = 20;
//        $product_total_amount->save();
//
//        $product_total_amount = new App\Local_safe_amount;
//        $product_total_amount->local_safe_amount_id = 42;
//        $product_total_amount->mission_list_id = 5;
//        $product_total_amount->product_total_amount_id = 2;
//        $product_total_amount->safe_amount = 10;
//        $product_total_amount->amount = 15;
//        $product_total_amount->save();
//
//        $product_total_amount = new App\Local_safe_amount;
//        $product_total_amount->local_safe_amount_id = 43;
//        $product_total_amount->mission_list_id = 5;
//        $product_total_amount->product_total_amount_id = 3;
//        $product_total_amount->safe_amount = 10;
//        $product_total_amount->amount = 10;
//        $product_total_amount->save();
//
//        $product_total_amount = new App\Local_safe_amount;
//        $product_total_amount->local_safe_amount_id = 44;
//        $product_total_amount->mission_list_id = 5;
//        $product_total_amount->product_total_amount_id = 4;
//        $product_total_amount->safe_amount = 15;
//        $product_total_amount->amount = 10;
//        $product_total_amount->save();
//
//        $product_total_amount = new App\Local_safe_amount;
//        $product_total_amount->local_safe_amount_id = 45;
//        $product_total_amount->mission_list_id = 5;
//        $product_total_amount->product_total_amount_id = 5;
//        $product_total_amount->safe_amount = 5;
//        $product_total_amount->amount = 10;
//        $product_total_amount->save();
//
//        $product_total_amount = new App\Local_safe_amount;
//        $product_total_amount->local_safe_amount_id = 46;
//        $product_total_amount->mission_list_id = 5;
//        $product_total_amount->product_total_amount_id = 6;
//        $product_total_amount->safe_amount = 9;
//        $product_total_amount->amount = 11;
//        $product_total_amount->save();
//
//        $product_total_amount = new App\Local_safe_amount;
//        $product_total_amount->local_safe_amount_id = 47;
//        $product_total_amount->mission_list_id = 5;
//        $product_total_amount->product_total_amount_id = 7;
//        $product_total_amount->safe_amount = 10;
//        $product_total_amount->amount = 15;
//        $product_total_amount->save();
//
//        $product_total_amount = new App\Local_safe_amount;
//        $product_total_amount->local_safe_amount_id = 48;
//        $product_total_amount->mission_list_id = 5;
//        $product_total_amount->product_total_amount_id = 8;
//        $product_total_amount->safe_amount = 5;
//        $product_total_amount->amount = 6;
//        $product_total_amount->save();
//
//        $product_total_amount = new App\Local_safe_amount;
//        $product_total_amount->local_safe_amount_id = 49;
//        $product_total_amount->mission_list_id = 5;
//        $product_total_amount->product_total_amount_id = 9;
//        $product_total_amount->safe_amount = 5;
//        $product_total_amount->amount = 7;
//        $product_total_amount->save();
//
//        $product_total_amount = new App\Local_safe_amount;
//        $product_total_amount->local_safe_amount_id = 50;
//        $product_total_amount->mission_list_id = 5;
//        $product_total_amount->product_total_amount_id = 10;
//        $product_total_amount->safe_amount = 5;
//        $product_total_amount->amount = 9;
//        $product_total_amount->save();
//
//        $product_total_amount = new App\Local_safe_amount;
//        $product_total_amount->local_safe_amount_id = 51;
//        $product_total_amount->mission_list_id = 6;
//        $product_total_amount->product_total_amount_id = 1;
//        $product_total_amount->safe_amount = 8;
//        $product_total_amount->amount = 10;
//        $product_total_amount->save();
//
//        $product_total_amount = new App\Local_safe_amount;
//        $product_total_amount->local_safe_amount_id = 52;
//        $product_total_amount->mission_list_id = 6;
//        $product_total_amount->product_total_amount_id = 2;
//        $product_total_amount->safe_amount = 15;
//        $product_total_amount->amount = 15;
//        $product_total_amount->save();
//
//        $product_total_amount = new App\Local_safe_amount;
//        $product_total_amount->local_safe_amount_id = 53;
//        $product_total_amount->mission_list_id = 6;
//        $product_total_amount->product_total_amount_id = 3;
//        $product_total_amount->safe_amount = 5;
//        $product_total_amount->amount = 5;
//        $product_total_amount->save();
//
//        $product_total_amount = new App\Local_safe_amount;
//        $product_total_amount->local_safe_amount_id = 54;
//        $product_total_amount->mission_list_id = 6;
//        $product_total_amount->product_total_amount_id = 4;
//        $product_total_amount->safe_amount = 10;
//        $product_total_amount->amount = 10;
//        $product_total_amount->save();
//
//        $product_total_amount = new App\Local_safe_amount;
//        $product_total_amount->local_safe_amount_id = 55;
//        $product_total_amount->mission_list_id = 6;
//        $product_total_amount->product_total_amount_id = 5;
//        $product_total_amount->safe_amount = 5;
//        $product_total_amount->amount = 0;
//        $product_total_amount->save();
//
//        $product_total_amount = new App\Local_safe_amount;
//        $product_total_amount->local_safe_amount_id = 56;
//        $product_total_amount->mission_list_id = 6;
//        $product_total_amount->product_total_amount_id = 6;
//        $product_total_amount->safe_amount = 15;
//        $product_total_amount->amount = 16;
//        $product_total_amount->save();
//
//        $product_total_amount = new App\Local_safe_amount;
//        $product_total_amount->local_safe_amount_id = 57;
//        $product_total_amount->mission_list_id = 6;
//        $product_total_amount->product_total_amount_id = 7;
//        $product_total_amount->safe_amount = 5;
//        $product_total_amount->amount = 6;
//        $product_total_amount->save();
//
//        $product_total_amount = new App\Local_safe_amount;
//        $product_total_amount->local_safe_amount_id = 58;
//        $product_total_amount->mission_list_id = 6;
//        $product_total_amount->product_total_amount_id = 8;
//        $product_total_amount->safe_amount = 5;
//        $product_total_amount->amount = 3;
//        $product_total_amount->save();
//
//        $product_total_amount = new App\Local_safe_amount;
//        $product_total_amount->local_safe_amount_id = 59;
//        $product_total_amount->mission_list_id = 6;
//        $product_total_amount->product_total_amount_id = 9;
//        $product_total_amount->safe_amount = 3;
//        $product_total_amount->amount = 5;
//        $product_total_amount->save();
//
//        $product_total_amount = new App\Local_safe_amount;
//        $product_total_amount->local_safe_amount_id = 60;
//        $product_total_amount->mission_list_id = 6;
//        $product_total_amount->product_total_amount_id = 10;
//        $product_total_amount->safe_amount = 5;
//        $product_total_amount->amount = 5;
//        $product_total_amount->save();
//
//        $product_total_amount = new App\Local_safe_amount;
//        $product_total_amount->local_safe_amount_id = 61;
//        $product_total_amount->mission_list_id = 7;
//        $product_total_amount->product_total_amount_id = 1;
//        $product_total_amount->safe_amount = 10;
//        $product_total_amount->amount = 6;
//        $product_total_amount->save();
//
//        $product_total_amount = new App\Local_safe_amount;
//        $product_total_amount->local_safe_amount_id = 62;
//        $product_total_amount->mission_list_id = 7;
//        $product_total_amount->product_total_amount_id = 2;
//        $product_total_amount->safe_amount = 5;
//        $product_total_amount->amount = 5;
//        $product_total_amount->save();
//
//        $product_total_amount = new App\Local_safe_amount;
//        $product_total_amount->local_safe_amount_id = 63;
//        $product_total_amount->mission_list_id = 7;
//        $product_total_amount->product_total_amount_id = 3;
//        $product_total_amount->safe_amount = 10;
//        $product_total_amount->amount = 15;
//        $product_total_amount->save();
//
//        $product_total_amount = new App\Local_safe_amount;
//        $product_total_amount->local_safe_amount_id = 64;
//        $product_total_amount->mission_list_id = 7;
//        $product_total_amount->product_total_amount_id = 4;
//        $product_total_amount->safe_amount = 10;
//        $product_total_amount->amount = 3;
//        $product_total_amount->save();
//
//        $product_total_amount = new App\Local_safe_amount;
//        $product_total_amount->local_safe_amount_id = 65;
//        $product_total_amount->mission_list_id = 7;
//        $product_total_amount->product_total_amount_id = 5;
//        $product_total_amount->safe_amount = 5;
//        $product_total_amount->amount = 10;
//        $product_total_amount->save();
//
//        $product_total_amount = new App\Local_safe_amount;
//        $product_total_amount->local_safe_amount_id = 66;
//        $product_total_amount->mission_list_id = 7;
//        $product_total_amount->product_total_amount_id = 6;
//        $product_total_amount->safe_amount = 10;
//        $product_total_amount->amount = 13;
//        $product_total_amount->save();
//
//        $product_total_amount = new App\Local_safe_amount;
//        $product_total_amount->local_safe_amount_id = 67;
//        $product_total_amount->mission_list_id = 7;
//        $product_total_amount->product_total_amount_id = 7;
//        $product_total_amount->safe_amount = 10;
//        $product_total_amount->amount = 20;
//        $product_total_amount->save();
//
//        $product_total_amount = new App\Local_safe_amount;
//        $product_total_amount->local_safe_amount_id = 68;
//        $product_total_amount->mission_list_id = 7;
//        $product_total_amount->product_total_amount_id = 8;
//        $product_total_amount->safe_amount = 5;
//        $product_total_amount->amount = 13;
//        $product_total_amount->save();
//
//        $product_total_amount = new App\Local_safe_amount;
//        $product_total_amount->local_safe_amount_id = 69;
//        $product_total_amount->mission_list_id = 7;
//        $product_total_amount->product_total_amount_id = 9;
//        $product_total_amount->safe_amount = 5;
//        $product_total_amount->amount = 8;
//        $product_total_amount->save();
//
//
//
//        $product_total_amount = new App\Local_safe_amount;
//        $product_total_amount->local_safe_amount_id = 70;
//        $product_total_amount->mission_list_id = 7;
//        $product_total_amount->product_total_amount_id = 10;
//        $product_total_amount->safe_amount = 10;
//        $product_total_amount->amount = 10;
//        $product_total_amount->save();
//
//
//
//        /* !!注意!!  email是unique */
//        $donate = new App\Donate;
//        $donate->donate_id = 1;
//        $donate->lname = "周";
//        $donate->fname = "沃昂";
//        $donate->phone = "0900100187";
//        $donate->save();
//
//        $donate_product = new App\Donate_product;
//        $donate_product->donate_id = 1;
//        $donate_product->product_total_amount_id = 1;
//        $donate_product->donate_amount = 10;
//        $donate_product->arrived = 0;
//        $donate_product->save();
//
//        $donate_product = new App\Donate_product;
//        $donate_product->donate_id = 1;
//        $donate_product->product_total_amount_id = 2;
//        $donate_product->donate_amount = 30;
//        $donate_product->arrived = 0;
//        $donate_product->save();
//
//
//        $donate = new App\Donate;
//        $donate->donate_id = 2;
//        $donate->lname = "蔡";
//        $donate->email = "tsai982@yahoo.com.tw";
//        $donate->phone = "0900200287";
//        $donate->save();
//
//        $donate_product = new App\Donate_product;
//        $donate_product->donate_id = 2;
//        $donate_product->product_total_amount_id = 2;
//        $donate_product->donate_amount = 20;
//        $donate_product->arrived = 1;
//        $donate_product->save();
//
//        $donate_product = new App\Donate_product;
//        $donate_product->donate_id = 2;
//        $donate_product->product_total_amount_id = 4;
//        $donate_product->donate_amount = 50;
//        $donate_product->arrived = 0;
//        $donate_product->save();
//
//        $donate = new App\Donate;
//        $donate->donate_id = 3;
//        $donate->lname = "游";
//        $donate->fname = "逸慈";
//        $donate->email = "yo123yo@yahoo.com.tw";
//        $donate->save();
//
//        $donate_product = new App\Donate_product;
//        $donate_product->donate_id = 3;
//        $donate_product->product_total_amount_id = 5;
//        $donate_product->donate_amount = 10;
//        $donate_product->arrived = 0;
//        $donate_product->save();
//
//        $donate = new App\Donate;
//        $donate->donate_id = 4;
//        $donate->lname = "劉";
//        $donate->email = "wowawow@yahoo.com.tw";
//        $donate->phone = "0900400487";
//        $donate->save();
//
//        $donate_product = new App\Donate_product;
//        $donate_product->donate_id = 4;
//        $donate_product->product_total_amount_id = 6;
//        $donate_product->donate_amount = 20;
//        $donate_product->arrived = 0;
//        $donate_product->save();
//
//        $donate_product = new App\Donate_product;
//        $donate_product->donate_id = 4;
//        $donate_product->product_total_amount_id = 7;
//        $donate_product->donate_amount = 40;
//        $donate_product->arrived = 0;
//        $donate_product->save();
//
//        $donate_product = new App\Donate_product;
//        $donate_product->donate_id = 4;
//        $donate_product->product_total_amount_id = 8;
//        $donate_product->donate_amount = 60;
//        $donate_product->arrived = 0;
//        $donate_product->save();
//
////        $donate = new App\Donate;
////        $donate->donate_id = 5;
////        $donate->center_support_product_id = 2;
////        $donate->donate_amount = 5;
////        $donate->lname = "吳";
////        $donate->fname = "蜀杏";
////        $donate->email = "nonono56@yahoo.com.tw";
////        $donate->phone = "0900500587";
////        $donate->save();
////
////        $donate = new App\Donate;
////        $donate->donate_id = 6;
////        $donate->center_support_product_id = 2;
////        $donate->donate_amount = 110;
////        $donate->lname = "林";
////        $donate->email = "linlin1919@yahoo.com.tw";
////        $donate->phone = "0900600687";
////        $donate->save();
////
////
////        $donate = new App\Donate;
////        $donate->donate_id = 7;
////        $donate->center_support_product_id = 2;
////        $donate->donate_amount = 85;
////        $donate->lname = "劉";
////        $donate->fname = "士萱";
////        $donate->email = "gs9825@yahoo.com.tw";
////        $donate->phone = "0900700787";
////        $donate->save();
////
////
////        $donate = new App\Donate;
////        $donate->donate_id = 8;
////        $donate->center_support_product_id = 3;
////        $donate->donate_amount = 50;
////        $donate->lname = "葉";
////        $donate->email = "ocean555@yahoo.com.tw";
////        $donate->phone = "0900800887";
////        $donate->save();
////
////
////        $donate = new App\Donate;
////        $donate->donate_id = 9;
////        $donate->center_support_product_id = 3;
////        $donate->donate_amount = 40;
////        $donate->lname = "黃";
////        $donate->fname = "志偉";
////        $donate->email = "jiwei889@yahoo.com.tw";
////        $donate->phone = "0900900987";
////        $donate->save();
////
////
////        $donate = new App\Donate;
////        $donate->donate_id = 10;
////        $donate->center_support_product_id = 7;
////        $donate->donate_amount = 9;
////        $donate->lname = "陳";
////        $donate->email = "chen741@yahoo.com.tw";
////        $donate->phone = "0901001087";
////        $donate->save();
//
//
//        $center_support_product = new App\Center_support_product;
//        $center_support_product->center_support_product_id = 1;
//        $center_support_product->product_total_amount_id = 2;
//        $center_support_product->center_support_product_amount = 400;
//        $center_support_product->save();
//
//        $center_support_product = new App\Center_support_product;
//        $center_support_product->center_support_product_id = 2;
//        $center_support_product->product_total_amount_id = 3;
//        $center_support_product->center_support_product_amount = 200;
//        $center_support_product->save();
//
//
//
//        $company = new App\Company;
//        $company->company_id = 1;
//        $company->donate_id = 6;
//        $company->phone = "0900600687";
//        $company->address = "台北市信義區松智路75號";
//        $company->save();
//
//        $company = new App\Company;
//        $company->company_id = 2;
//        $company->donate_id = 7;
//        $company->phone = "0900700787";
//        $company->address = "台北市信義區松仁路89號";
//        $company->save();
//
//        $company = new App\Company;
//        $company->company_id = 3;
//        $company->donate_id = 8;
//        $company->phone = "0900800887";
//        $company->address = "高雄市前金區五福三路122號";
//        $company->save();
//
//        $company = new App\Company;
//        $company->company_id = 4;
//        $company->donate_id = 9;
//        $company->phone = "0900900987";
//        $company->address = "台中市大雅區中清路二段136號";
//        $company->save();
//
//        $company = new App\Company;
//        $company->company_id = 5;
//        $company->donate_id = 10;
//        $company->phone = "00901001087";
//        $company->address = "台中市大雅區中和五路25號";
//        $company->save();
//
//
//
//        $buy = new App\Buy;
//        $buy->buy_id = 1;
//        $buy->donate_id = 6;
//        $buy->product_total_amount_id = 2;
//        $buy->company_id = 1;
//        $buy->save();
//
//        $buy = new App\Buy;
//        $buy->buy_id = 2;
//        $buy->donate_id = 7;
//        $buy->product_total_amount_id = 2;
//        $buy->company_id = 2;
//        $buy->save();
//
//        $buy = new App\Buy;
//        $buy->buy_id = 3;
//        $buy->donate_id = 8;
//        $buy->product_total_amount_id = 3;
//        $buy->company_id = 3;
//        $buy->save();
//
//        $buy = new App\Buy;
//        $buy->buy_id = 4;
//        $buy->donate_id = 9;
//        $buy->product_total_amount_id = 3;
//        $buy->company_id = 4;
//        $buy->save();
//
//        $buy = new App\Buy;
//        $buy->buy_id = 5;
//        $buy->donate_id = 10;
//        $buy->product_total_amount_id = 7;
//        $buy->company_id = 5;
//        $buy->save();


        $center_support_person = new App\Center_support_person;
        $center_support_person->center_support_person_id = 1;
        $center_support_person->center_support_person_num = 10;
        $center_support_person->id = 6; //醫療
        $center_support_person->center_support_person_requirement = "醫療組";
        $center_support_person->center_support_person_introduction = "";
        $center_support_person->save();

        $center_support_person = new App\Center_support_person;
        $center_support_person->center_support_person_id = 2;
        $center_support_person->center_support_person_num = 20;
        $center_support_person->id = 7; //脫困
        $center_support_person->center_support_person_requirement = "脫困組";
        $center_support_person->center_support_person_introduction = "";
        $center_support_person->save();

        $center_support_person = new App\Center_support_person;
        $center_support_person->center_support_person_id = 3;
        $center_support_person->center_support_person_num = 5;
        $center_support_person->id = 10;//管線
        $center_support_person->center_support_person_requirement = "管線修復組";
        $center_support_person->center_support_person_introduction = "";
        $center_support_person->save();

        $center_support_person_detail = new App\Center_support_person_detail;
        $center_support_person_detail->center_support_person_detail_id = 1;
        $center_support_person_detail->center_support_person_detail_name = "蔣清濋";
        $center_support_person_detail->email = "clear5656@yahoo.com.tw";
        $center_support_person_detail->phone = "0900100160";
        $center_support_person_detail->center_support_person_id = 1;
        $center_support_person_detail->skill = "有醫生執照";
        $center_support_person_detail->country_or_city_input = "台中市";
        $center_support_person_detail->township_or_district_input = "北屯區";
        $center_support_person_detail->save();

        $center_support_person_detail = new App\Center_support_person_detail;
        $center_support_person_detail->center_support_person_detail_id = 2;
        $center_support_person_detail->center_support_person_detail_name = "魏伊更";
        $center_support_person_detail->email = "one7625@yahoo.com.tw";
        $center_support_person_detail->phone = "0900200260";
        $center_support_person_detail->center_support_person_id = 1;
        $center_support_person_detail->skill = "有護士執照";
        $center_support_person_detail->country_or_city_input = "台北市";
        $center_support_person_detail->township_or_district_input = "萬華區";
        $center_support_person_detail->save();
//
        $center_support_person_detail = new App\Center_support_person_detail;
        $center_support_person_detail->center_support_person_detail_id = 3;
        $center_support_person_detail->center_support_person_detail_name = "余世瞭";
        $center_support_person_detail->email = "fishfood@yahoo.com.tw";
        $center_support_person_detail->phone = "0900300360";
        $center_support_person_detail->center_support_person_id = 2;
        $center_support_person_detail->skill = "當過消防員";
        $center_support_person_detail->country_or_city_input = "苗栗縣";
        $center_support_person_detail->township_or_district_input = "公館鄉";
        $center_support_person_detail->save();


        $skill = new App\skill;
        $skill->skill_id = 1;
        $skill->skill_name = "外傷治療";
        $skill->save();

        $skill = new App\skill;
        $skill->skill_id = 2;
        $skill->skill_name = "傷患照料";
        $skill->save();

        $skill = new App\skill;
        $skill->skill_id = 3;
        $skill->skill_name = "水電管線維修";
        $skill->save();

        $skill = new App\skill;
        $skill->skill_id = 4;
        $skill->skill_name = "交通指揮";
        $skill->save();

        $skill = new App\skill;
        $skill->skill_id = 5;
        $skill->skill_name = "協助脫困";
        $skill->save();

        $skill = new App\skill;
        $skill->skill_id = 6;
        $skill->skill_name = "滅火";
        $skill->save();

        //向民眾招募人員需求表的技能

        $center_support_people_skill = new App\Center_support_people_skill;
        $center_support_people_skill->center_support_people_skill_id = 1;
        $center_support_people_skill->center_support_person_id = 1;
        $center_support_people_skill->skill_id = 1;
        $center_support_people_skill->save();

        $center_support_people_skill = new App\Center_support_people_skill;
        $center_support_people_skill->center_support_people_skill_id = 2;
        $center_support_people_skill->center_support_person_id = 2;
        $center_support_people_skill->skill_id = 2;
        $center_support_people_skill->save();

        $center_support_people_skill = new App\Center_support_people_skill;
        $center_support_people_skill->center_support_people_skill_id = 3;
        $center_support_people_skill->center_support_person_id = 3;
        $center_support_people_skill->skill_id = 3;
        $center_support_people_skill->save();

        //應徵志工人員的技能

        $center_support_person_detail = new App\Center_support_person_detail_skill;
        $center_support_person_detail->center_support_person_detail_skill_id = 1;
        $center_support_person_detail->center_support_person_detail_id = 1;
        $center_support_person_detail->skill_id = 1;
        $center_support_person_detail->save();

        $center_support_person_detail = new App\Center_support_person_detail_skill;
        $center_support_person_detail->center_support_person_detail_skill_id = 2;
        $center_support_person_detail->center_support_person_detail_id = 1;
        $center_support_person_detail->skill_id = 2;
        $center_support_person_detail->save();

        $center_support_person_detail = new App\Center_support_person_detail_skill;
        $center_support_person_detail->center_support_person_detail_skill_id = 3;
        $center_support_person_detail->center_support_person_detail_id = 2;
        $center_support_person_detail->skill_id = 2;
        $center_support_person_detail->save();

        $center_support_person_detail = new App\Center_support_person_detail_skill;
        $center_support_person_detail->center_support_person_detail_skill_id = 4;
        $center_support_person_detail->center_support_person_detail_id = 3;
        $center_support_person_detail->skill_id = 3;
        $center_support_person_detail->save();



//
//        $center_support_person_detail = new App\Center_support_person_detail;
//        $center_support_person_detail->center_support_person_detail_id = 4;
//        $center_support_person_detail->center_support_person_detail_name = "游黛佳";
//        $center_support_person_detail->email = "bring5489@yahoo.com.tw";
//        $center_support_person_detail->phone = "0900400460";
//        $center_support_person_detail->center_support_person_id = 1;
//        $center_support_person_detail->skill = "救生員";
//        $center_support_person_detail->save();
//
//        $center_support_person_detail = new App\Center_support_person_detail;
//        $center_support_person_detail->center_support_person_detail_id = 5;
//        $center_support_person_detail->center_support_person_detail_name = "柯綺倫";
//        $center_support_person_detail->email = "wheel885@yahoo.com.tw";
//        $center_support_person_detail->phone = "0900500560";
//        $center_support_person_detail->center_support_person_id = 1;
//        $center_support_person_detail->skill = "修車";
//        $center_support_person_detail->save();

        //地方愈增援人員

        $mission_support_person = new App\Mission_support_person;
        $mission_support_person->mission_support_person_id = 1;
        $mission_support_person->mission_list_id = 2;
        $mission_support_person->id = 6;
        $mission_support_person->mission_support_people_num = 3;
        $mission_support_person->mission_support_people_reason = "目前醫療人手不足，需要更多增援";
        $mission_support_person->save();

        $mission_support_person = new App\Mission_support_person;
        $mission_support_person->mission_support_person_id = 2;
        $mission_support_person->mission_list_id = 2;
        $mission_support_person->id = 7;
        $mission_support_person->mission_support_people_num = 2;
        $mission_support_person->mission_support_people_reason = "火勢太大無法控制，需要增援";
        $mission_support_person->save();

        $mission_support_person = new App\Mission_support_person;
        $mission_support_person->mission_support_person_id = 3;
        $mission_support_person->mission_list_id = 2;
        $mission_support_person->id = 9;
        $mission_support_person->mission_support_people_num = 4;
        $mission_support_person->mission_support_people_reason = "目前道路修復上遇到障礙缺乏人手，需要支援";
        $mission_support_person->save();

        $mission_support_person = new App\Mission_support_person;
        $mission_support_person->mission_support_person_id = 4;
        $mission_support_person->mission_list_id = 4;
        $mission_support_person->id = 10;
        $mission_support_person->mission_support_people_num = 3;
        $mission_support_person->mission_support_people_reason = "目前高壓電線修復上遇到障礙缺乏人手，需要支援";
        $mission_support_person->save();

        $mission_support_person = new App\Mission_support_person;
        $mission_support_person->mission_support_person_id = 5;
        $mission_support_person->mission_list_id = 5;
        $mission_support_person->id = 10;
        $mission_support_person->mission_support_people_num = 2;
        $mission_support_person->mission_support_people_reason = "目前水管管線修復上遇到障礙缺乏人手，需要支援";
        $mission_support_person->save();



        //愈支援其他地方

        $mission_help_other = new App\Mission_help_other;
        $mission_help_other->mission_help_other_id = 1;
        $mission_help_other->mission_support_person_id = 1;
        $mission_help_other->mission_list_id = 1;
        $mission_help_other->mission_help_other_num = 1;
        $mission_help_other->arrived = 0;
        $mission_help_other->save();

        $mission_help_other = new App\Mission_help_other;
        $mission_help_other->mission_help_other_id = 2;
        $mission_help_other->mission_support_person_id = 2;
        $mission_help_other->mission_list_id = 1;
        $mission_help_other->mission_help_other_num = 1;
        $mission_help_other->arrived = 0;
        $mission_help_other->save();

        $mission_help_other = new App\Mission_help_other;
        $mission_help_other->mission_help_other_id = 3;
        $mission_help_other->mission_support_person_id = 1;
        $mission_help_other->mission_list_id = 4;
        $mission_help_other->mission_help_other_num = 1;
        $mission_help_other->arrived = 0;
        $mission_help_other->save();

        $mission_help_other = new App\Mission_help_other;
        $mission_help_other->mission_help_other_id = 4;
        $mission_help_other->mission_support_person_id = 4;
        $mission_help_other->mission_list_id = 2;
        $mission_help_other->mission_help_other_num = 1;
        $mission_help_other->arrived = 0;
        $mission_help_other->save();




    }
}