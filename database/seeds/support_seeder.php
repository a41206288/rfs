<?php
use Illuminate\Support\Facades\DB;
use Kodeine\Acl\Models\Eloquent\Permission;
use Kodeine\Acl\Traits\HasRole;
use Illuminate\Database\Seeder;
use app\User;
use app\Post;

/**
 * Created by PhpStorm.
 * User: Tsugumi
 * Date: 2015/4/14
 * Time: 下午 03:47
 */

class support_seeder extends Seeder{
    use HasRole;
    public function run(){
        DB:: table('product_total_amounts')->delete();
        DB:: table('local_safe_amounts')->delete();
        DB:: table('donates')->delete();
//        DB:: table('buys')->delete();
//        DB:: table('companies')->delete();
//        DB:: table('interviews')->delete();
//        DB:: table('interviewers')->delete();

        $product_total_amount = new App\Product_total_amount;
        $product_total_amount->product_total_amount_id = 1;
        $product_total_amount->product_name = "泡麵";
        $product_total_amount->unit = "碗";
        $product_total_amount->save();

        $product_total_amount = new App\Product_total_amount;
        $product_total_amount->product_total_amount_id = 2;
        $product_total_amount->product_name = "礦泉水";
        $product_total_amount->unit = "瓶";
        $product_total_amount->save();

        $product_total_amount = new App\Product_total_amount;
        $product_total_amount->product_total_amount_id = 3;
        $product_total_amount->product_name = "麵包";
        $product_total_amount->unit = "個";
        $product_total_amount->save();

        $product_total_amount = new App\Product_total_amount;
        $product_total_amount->product_total_amount_id = 4;
        $product_total_amount->product_name = "繃帶";
        $product_total_amount->unit = "捲";
        $product_total_amount->save();

        $product_total_amount = new App\Product_total_amount;
        $product_total_amount->product_total_amount_id = 5;
        $product_total_amount->product_name = "口糧";
        $product_total_amount->unit = "包";
        $product_total_amount->save();

        $product_total_amount = new App\Product_total_amount;
        $product_total_amount->product_total_amount_id = 6;
        $product_total_amount->product_name = "雨衣";
        $product_total_amount->unit = "件";
        $product_total_amount->save();

        $product_total_amount = new App\Product_total_amount;
        $product_total_amount->product_total_amount_id = 7;
        $product_total_amount->product_name = "手電筒";
        $product_total_amount->unit = "支";
        $product_total_amount->save();

        $product_total_amount = new App\Product_total_amount;
        $product_total_amount->product_total_amount_id = 8;
        $product_total_amount->product_name = "垃圾袋";
        $product_total_amount->unit = "捲";
        $product_total_amount->save();

        $product_total_amount = new App\Product_total_amount;
        $product_total_amount->product_total_amount_id = 9;
        $product_total_amount->product_name = "衛生紙";
        $product_total_amount->unit = "包";
        $product_total_amount->save();

        $product_total_amount = new App\Product_total_amount;
        $product_total_amount->product_total_amount_id = 10;
        $product_total_amount->product_name = "薄被子";
        $product_total_amount->unit = "條";
        $product_total_amount->save();



        $product_total_amount = new App\Local_safe_amount;
        $product_total_amount->local_safe_amount_id = 1;
        $product_total_amount->mission_list_id = 1;
        $product_total_amount->product_total_amount_id = 1;
        $product_total_amount->safe_amount = 100;
        $product_total_amount->amount = 200;
        $product_total_amount->save();

        $product_total_amount = new App\Local_safe_amount;
        $product_total_amount->local_safe_amount_id = 2;
        $product_total_amount->mission_list_id = 1;
        $product_total_amount->product_total_amount_id = 2;
        $product_total_amount->safe_amount = 150;
        $product_total_amount->amount = 90;
        $product_total_amount->save();

        $product_total_amount = new App\Local_safe_amount;
        $product_total_amount->local_safe_amount_id = 3;
        $product_total_amount->mission_list_id = 1;
        $product_total_amount->product_total_amount_id = 3;
        $product_total_amount->safe_amount = 120;
        $product_total_amount->amount = 100;
        $product_total_amount->save();

        $product_total_amount = new App\Local_safe_amount;
        $product_total_amount->local_safe_amount_id = 4;
        $product_total_amount->mission_list_id = 1;
        $product_total_amount->product_total_amount_id = 4;
        $product_total_amount->safe_amount = 80;
        $product_total_amount->amount = 120;
        $product_total_amount->save();

        $product_total_amount = new App\Local_safe_amount;
        $product_total_amount->local_safe_amount_id = 5;
        $product_total_amount->mission_list_id = 1;
        $product_total_amount->product_total_amount_id = 5;
        $product_total_amount->safe_amount = 90;
        $product_total_amount->amount = 100;
        $product_total_amount->save();

        $product_total_amount = new App\Local_safe_amount;
        $product_total_amount->local_safe_amount_id = 6;
        $product_total_amount->mission_list_id = 1;
        $product_total_amount->product_total_amount_id = 6;
        $product_total_amount->safe_amount = 30;
        $product_total_amount->amount = 45;
        $product_total_amount->save();

        $product_total_amount = new App\Local_safe_amount;
        $product_total_amount->local_safe_amount_id = 7;
        $product_total_amount->mission_list_id = 1;
        $product_total_amount->product_total_amount_id = 7;
        $product_total_amount->safe_amount = 20;
        $product_total_amount->amount = 20;
        $product_total_amount->save();

        $product_total_amount = new App\Local_safe_amount;
        $product_total_amount->local_safe_amount_id = 8;
        $product_total_amount->mission_list_id = 1;
        $product_total_amount->product_total_amount_id = 8;
        $product_total_amount->safe_amount = 15;
        $product_total_amount->amount = 27;
        $product_total_amount->save();

        $product_total_amount = new App\Local_safe_amount;
        $product_total_amount->local_safe_amount_id = 9;
        $product_total_amount->mission_list_id = 1;
        $product_total_amount->product_total_amount_id = 9;
        $product_total_amount->safe_amount = 35;
        $product_total_amount->amount = 51;
        $product_total_amount->save();

        $product_total_amount = new App\Local_safe_amount;
        $product_total_amount->local_safe_amount_id = 10;
        $product_total_amount->mission_list_id = 1;
        $product_total_amount->product_total_amount_id = 10;
        $product_total_amount->safe_amount = 60;
        $product_total_amount->amount = 69;
        $product_total_amount->save();

        $product_total_amount = new App\Local_safe_amount;
        $product_total_amount->local_safe_amount_id = 11;
        $product_total_amount->mission_list_id = 2;
        $product_total_amount->product_total_amount_id = 2;
        $product_total_amount->safe_amount = 10;
        $product_total_amount->amount = 15;
        $product_total_amount->save();

        $product_total_amount = new App\Local_safe_amount;
        $product_total_amount->local_safe_amount_id = 12;
        $product_total_amount->mission_list_id = 2;
        $product_total_amount->product_total_amount_id = 4;
        $product_total_amount->safe_amount = 5;
        $product_total_amount->amount = 5;
        $product_total_amount->save();

        $product_total_amount = new App\Local_safe_amount;
        $product_total_amount->local_safe_amount_id = 13;
        $product_total_amount->mission_list_id = 2;
        $product_total_amount->product_total_amount_id = 7;
        $product_total_amount->safe_amount = 3;
        $product_total_amount->amount = 3;
        $product_total_amount->save();

        $product_total_amount = new App\Local_safe_amount;
        $product_total_amount->local_safe_amount_id = 14;
        $product_total_amount->mission_list_id = 3;
        $product_total_amount->product_total_amount_id = 2;
        $product_total_amount->safe_amount = 10;
        $product_total_amount->amount = 8;
        $product_total_amount->save();

        $product_total_amount = new App\Local_safe_amount;
        $product_total_amount->local_safe_amount_id = 15;
        $product_total_amount->mission_list_id = 3;
        $product_total_amount->product_total_amount_id = 4;
        $product_total_amount->safe_amount = 10;
        $product_total_amount->amount = 15;
        $product_total_amount->save();

        $product_total_amount = new App\Local_safe_amount;
        $product_total_amount->local_safe_amount_id = 16;
        $product_total_amount->mission_list_id = 4;
        $product_total_amount->product_total_amount_id = 2;
        $product_total_amount->safe_amount = 20;
        $product_total_amount->amount = 30;
        $product_total_amount->save();

        $product_total_amount = new App\Local_safe_amount;
        $product_total_amount->local_safe_amount_id = 17;
        $product_total_amount->mission_list_id = 4;
        $product_total_amount->product_total_amount_id = 5;
        $product_total_amount->safe_amount = 10;
        $product_total_amount->amount = 20;
        $product_total_amount->save();

        $product_total_amount = new App\Local_safe_amount;
        $product_total_amount->local_safe_amount_id = 18;
        $product_total_amount->mission_list_id = 4;
        $product_total_amount->product_total_amount_id = 8;
        $product_total_amount->safe_amount = 2;
        $product_total_amount->amount = 5;
        $product_total_amount->save();

        $product_total_amount = new App\Local_safe_amount;
        $product_total_amount->local_safe_amount_id = 19;
        $product_total_amount->mission_list_id = 5;
        $product_total_amount->product_total_amount_id = 2;
        $product_total_amount->safe_amount = 10;
        $product_total_amount->amount = 15;
        $product_total_amount->save();

        $product_total_amount = new App\Local_safe_amount;
        $product_total_amount->local_safe_amount_id = 20;
        $product_total_amount->mission_list_id = 5;
        $product_total_amount->product_total_amount_id = 4;
        $product_total_amount->safe_amount = 15;
        $product_total_amount->amount = 10;
        $product_total_amount->save();

        $product_total_amount = new App\Local_safe_amount;
        $product_total_amount->local_safe_amount_id = 21;
        $product_total_amount->mission_list_id = 6;
        $product_total_amount->product_total_amount_id = 2;
        $product_total_amount->safe_amount = 15;
        $product_total_amount->amount = 15;
        $product_total_amount->save();

        $product_total_amount = new App\Local_safe_amount;
        $product_total_amount->local_safe_amount_id = 22;
        $product_total_amount->mission_list_id = 6;
        $product_total_amount->product_total_amount_id = 4;
        $product_total_amount->safe_amount = 10;
        $product_total_amount->amount = 10;
        $product_total_amount->save();

        $product_total_amount = new App\Local_safe_amount;
        $product_total_amount->local_safe_amount_id = 23;
        $product_total_amount->mission_list_id = 7;
        $product_total_amount->product_total_amount_id = 2;
        $product_total_amount->safe_amount = 5;
        $product_total_amount->amount = 5;
        $product_total_amount->save();

        $product_total_amount = new App\Local_safe_amount;
        $product_total_amount->local_safe_amount_id = 24;
        $product_total_amount->mission_list_id = 7;
        $product_total_amount->product_total_amount_id = 4;
        $product_total_amount->safe_amount = 10;
        $product_total_amount->amount = 3;
        $product_total_amount->save();

        $product_total_amount = new App\Local_safe_amount;
        $product_total_amount->local_safe_amount_id = 25;
        $product_total_amount->mission_list_id = 7;
        $product_total_amount->product_total_amount_id = 6;
        $product_total_amount->safe_amount = 10;
        $product_total_amount->amount = 13;
        $product_total_amount->save();


        /* !!注意!!  email是unique */
        $donate = new App\Donate;
        $donate->donate_id = 1;
        $donate->product_total_amount_id = 2;
        $donate->amount = 10;
        $donate->lname = "周";
        $donate->fname = "沃昂";
        $donate->phone = "0900100187";
        $donate->save();

        $donate = new App\Donate;
        $donate->donate_id = 2;
        $donate->product_total_amount_id = 7;
        $donate->amount = 2;
        $donate->lname = "蔡";
        $donate->email = "tsai982@yahoo.com.tw";
        $donate->phone = "0900200287";
        $donate->save();

        $donate = new App\Donate;
        $donate->donate_id = 3;
        $donate->product_total_amount_id = 3;
        $donate->amount = 10;
        $donate->lname = "游";
        $donate->fname = "逸慈";
        $donate->email = "yo123yo@yahoo.com.tw";
        $donate->save();

        $donate = new App\Donate;
        $donate->donate_id = 4;
        $donate->product_total_amount_id = 7;
        $donate->amount = 1;
        $donate->lname = "劉";
        $donate->email = "wowawow@yahoo.com.tw";
        $donate->phone = "0900400487";
        $donate->save();

        $donate = new App\Donate;
        $donate->donate_id = 5;
        $donate->product_total_amount_id = 2;
        $donate->amount = 5;
        $donate->lname = "吳";
        $donate->fname = "蜀杏";
        $donate->email = "nonono56@yahoo.com.tw";
        $donate->phone = "0900500587";
        $donate->save();




//        $product_total_amount = new App\Product_total_amount;
//        $product_total_amount->title = 'Laravel 學習筆記';
//        $product_total_amount->save();
//
//
//        $product_total_amount = new App\Product_total_amount;
//        $product_total_amount->title = 'Laravel 學習筆記';
//        $product_total_amount->save();
//
//
//        $product_total_amount = new App\Product_total_amount;
//        $product_total_amount->title = 'Laravel 學習筆記';
//        $product_total_amount->save();
//
//
//        $product_total_amount = new App\Product_total_amount;
//        $product_total_amount->title = 'Laravel 學習筆記';
//        $product_total_amount->save();

    }
}