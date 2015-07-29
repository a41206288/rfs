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
        DB:: table('donate_products')->delete();
        DB:: table('center_support_products')->delete();
        DB:: table('buys')->delete();
        DB:: table('companies')->delete();
        DB:: table('center_support_people')->delete();
        DB:: table('center_support_person_details')->delete();
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
        $product_total_amount->safe_amount = 300;
        $product_total_amount->amount = 90;
        $product_total_amount->save();

        $product_total_amount = new App\Local_safe_amount;
        $product_total_amount->local_safe_amount_id = 3;
        $product_total_amount->mission_list_id = 1;
        $product_total_amount->product_total_amount_id = 3;
        $product_total_amount->safe_amount = 210;
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
        $donate->lname = "周";
        $donate->fname = "沃昂";
        $donate->phone = "0900100187";
        $donate->save();

        $donate_product = new App\Donate_product;
        $donate_product->donate_id = 1;
        $donate_product->product_total_amount_id = 1;
        $donate_product->donate_amount = 10;
        $donate_product->arrived = 0;
        $donate_product->save();

        $donate_product = new App\Donate_product;
        $donate_product->donate_id = 1;
        $donate_product->product_total_amount_id = 2;
        $donate_product->donate_amount = 30;
        $donate_product->arrived = 0;
        $donate_product->save();


        $donate = new App\Donate;
        $donate->donate_id = 2;
        $donate->lname = "蔡";
        $donate->email = "tsai982@yahoo.com.tw";
        $donate->phone = "0900200287";
        $donate->save();

        $donate_product = new App\Donate_product;
        $donate_product->donate_id = 2;
        $donate_product->product_total_amount_id = 2;
        $donate_product->donate_amount = 20;
        $donate_product->arrived = 1;
        $donate_product->save();

        $donate_product = new App\Donate_product;
        $donate_product->donate_id = 2;
        $donate_product->product_total_amount_id = 4;
        $donate_product->donate_amount = 50;
        $donate_product->arrived = 0;
        $donate_product->save();

        $donate = new App\Donate;
        $donate->donate_id = 3;
        $donate->lname = "游";
        $donate->fname = "逸慈";
        $donate->email = "yo123yo@yahoo.com.tw";
        $donate->save();

        $donate_product = new App\Donate_product;
        $donate_product->donate_id = 3;
        $donate_product->product_total_amount_id = 5;
        $donate_product->donate_amount = 10;
        $donate_product->arrived = 0;
        $donate_product->save();

        $donate = new App\Donate;
        $donate->donate_id = 4;
        $donate->lname = "劉";
        $donate->email = "wowawow@yahoo.com.tw";
        $donate->phone = "0900400487";
        $donate->save();

        $donate_product = new App\Donate_product;
        $donate_product->donate_id = 4;
        $donate_product->product_total_amount_id = 6;
        $donate_product->donate_amount = 20;
        $donate_product->arrived = 0;
        $donate_product->save();

        $donate_product = new App\Donate_product;
        $donate_product->donate_id = 4;
        $donate_product->product_total_amount_id = 7;
        $donate_product->donate_amount = 40;
        $donate_product->arrived = 0;
        $donate_product->save();

        $donate_product = new App\Donate_product;
        $donate_product->donate_id = 4;
        $donate_product->product_total_amount_id = 8;
        $donate_product->donate_amount = 60;
        $donate_product->arrived = 0;
        $donate_product->save();

//        $donate = new App\Donate;
//        $donate->donate_id = 5;
//        $donate->center_support_product_id = 2;
//        $donate->donate_amount = 5;
//        $donate->lname = "吳";
//        $donate->fname = "蜀杏";
//        $donate->email = "nonono56@yahoo.com.tw";
//        $donate->phone = "0900500587";
//        $donate->save();
//
//        $donate = new App\Donate;
//        $donate->donate_id = 6;
//        $donate->center_support_product_id = 2;
//        $donate->donate_amount = 110;
//        $donate->lname = "林";
//        $donate->email = "linlin1919@yahoo.com.tw";
//        $donate->phone = "0900600687";
//        $donate->save();
//
//
//        $donate = new App\Donate;
//        $donate->donate_id = 7;
//        $donate->center_support_product_id = 2;
//        $donate->donate_amount = 85;
//        $donate->lname = "劉";
//        $donate->fname = "士萱";
//        $donate->email = "gs9825@yahoo.com.tw";
//        $donate->phone = "0900700787";
//        $donate->save();
//
//
//        $donate = new App\Donate;
//        $donate->donate_id = 8;
//        $donate->center_support_product_id = 3;
//        $donate->donate_amount = 50;
//        $donate->lname = "葉";
//        $donate->email = "ocean555@yahoo.com.tw";
//        $donate->phone = "0900800887";
//        $donate->save();
//
//
//        $donate = new App\Donate;
//        $donate->donate_id = 9;
//        $donate->center_support_product_id = 3;
//        $donate->donate_amount = 40;
//        $donate->lname = "黃";
//        $donate->fname = "志偉";
//        $donate->email = "jiwei889@yahoo.com.tw";
//        $donate->phone = "0900900987";
//        $donate->save();
//
//
//        $donate = new App\Donate;
//        $donate->donate_id = 10;
//        $donate->center_support_product_id = 7;
//        $donate->donate_amount = 9;
//        $donate->lname = "陳";
//        $donate->email = "chen741@yahoo.com.tw";
//        $donate->phone = "0901001087";
//        $donate->save();


        $center_support_product = new App\Center_support_product;
        $center_support_product->center_support_product_id = 1;
        $center_support_product->product_total_amount_id = 2;
        $center_support_product->center_support_product_amount = 400;
        $center_support_product->save();

        $center_support_product = new App\Center_support_product;
        $center_support_product->center_support_product_id = 2;
        $center_support_product->product_total_amount_id = 3;
        $center_support_product->center_support_product_amount = 200;
        $center_support_product->save();



        $company = new App\Company;
        $company->company_id = 1;
        $company->donate_id = 6;
        $company->phone = "0900600687";
        $company->address = "台北市信義區松智路75號";
        $company->save();

        $company = new App\Company;
        $company->company_id = 2;
        $company->donate_id = 7;
        $company->phone = "0900700787";
        $company->address = "台北市信義區松仁路89號";
        $company->save();

        $company = new App\Company;
        $company->company_id = 3;
        $company->donate_id = 8;
        $company->phone = "0900800887";
        $company->address = "高雄市前金區五福三路122號";
        $company->save();

        $company = new App\Company;
        $company->company_id = 4;
        $company->donate_id = 9;
        $company->phone = "0900900987";
        $company->address = "台中市大雅區中清路二段136號";
        $company->save();

        $company = new App\Company;
        $company->company_id = 5;
        $company->donate_id = 10;
        $company->phone = "00901001087";
        $company->address = "台中市大雅區中和五路25號";
        $company->save();



        $buy = new App\Buy;
        $buy->buy_id = 1;
        $buy->donate_id = 6;
        $buy->product_total_amount_id = 2;
        $buy->company_id = 1;
        $buy->save();

        $buy = new App\Buy;
        $buy->buy_id = 2;
        $buy->donate_id = 7;
        $buy->product_total_amount_id = 2;
        $buy->company_id = 2;
        $buy->save();

        $buy = new App\Buy;
        $buy->buy_id = 3;
        $buy->donate_id = 8;
        $buy->product_total_amount_id = 3;
        $buy->company_id = 3;
        $buy->save();

        $buy = new App\Buy;
        $buy->buy_id = 4;
        $buy->donate_id = 9;
        $buy->product_total_amount_id = 3;
        $buy->company_id = 4;
        $buy->save();

        $buy = new App\Buy;
        $buy->buy_id = 5;
        $buy->donate_id = 10;
        $buy->product_total_amount_id = 7;
        $buy->company_id = 5;
        $buy->save();


        $center_support_person = new App\Center_support_person;
        $center_support_person->center_support_person_id = 1;
        $center_support_person->center_support_person_num = 10;
        $center_support_person->center_support_person_requirement = "需要有醫療背景的人";
        $center_support_person->arrived = 0;
        $center_support_person->save();

        $center_support_person = new App\Center_support_person;
        $center_support_person->center_support_person_id = 2;
        $center_support_person->center_support_person_num = 20;
        $center_support_person->center_support_person_requirement = "需要有過救援訓練的人";
        $center_support_person->arrived = 0;
        $center_support_person->save();

        $center_support_person_detail = new App\Center_support_person_detail;
        $center_support_person_detail->center_support_person_detail_id = 1;
        $center_support_person_detail->center_support_person_detail_name = "蔣清濋";
        $center_support_person_detail->email = "clear5656@yahoo.com.tw";
        $center_support_person_detail->phone = "0900100160";
        $center_support_person_detail->center_support_person_id = 1;
        $center_support_person_detail->skill = "有醫生執照";
        $center_support_person_detail->save();

        $center_support_person_detail = new App\Center_support_person_detail;
        $center_support_person_detail->center_support_person_detail_id = 2;
        $center_support_person_detail->center_support_person_detail_name = "魏伊更";
        $center_support_person_detail->email = "one7625@yahoo.com.tw";
        $center_support_person_detail->phone = "0900200260";
        $center_support_person_detail->center_support_person_id = 1;
        $center_support_person_detail->skill = "有護士執照";
        $center_support_person_detail->save();
//
        $center_support_person_detail = new App\Center_support_person_detail;
        $center_support_person_detail->center_support_person_detail_id = 3;
        $center_support_person_detail->center_support_person_detail_name = "余世瞭";
        $center_support_person_detail->email = "fishfood@yahoo.com.tw";
        $center_support_person_detail->phone = "0900300360";
        $center_support_person_detail->center_support_person_id = 2;
        $center_support_person_detail->skill = "當過消防員";
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




    }
}