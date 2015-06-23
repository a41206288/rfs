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
        DB:: table('buys')->delete();
        DB:: table('companies')->delete();
        DB:: table('interviews')->delete();
        DB:: table('interviewers')->delete();

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

        $donate = new App\Donate;
        $donate->donate_id = 6;
        $donate->product_total_amount_id = 2;
        $donate->amount = 110;
        $donate->lname = "林";
        $donate->email = "linlin1919@yahoo.com.tw";
        $donate->phone = "0900600687";
        $donate->save();


        $donate = new App\Donate;
        $donate->donate_id = 7;
        $donate->product_total_amount_id = 2;
        $donate->amount = 85;
        $donate->lname = "劉";
        $donate->fname = "士萱";
        $donate->email = "gs9825@yahoo.com.tw";
        $donate->phone = "0900700787";
        $donate->save();


        $donate = new App\Donate;
        $donate->donate_id = 8;
        $donate->product_total_amount_id = 3;
        $donate->amount = 50;
        $donate->lname = "葉";
        $donate->email = "ocean555@yahoo.com.tw";
        $donate->phone = "0900800887";
        $donate->save();


        $donate = new App\Donate;
        $donate->donate_id = 9;
        $donate->product_total_amount_id = 3;
        $donate->amount = 40;
        $donate->lname = "黃";
        $donate->fname = "志偉";
        $donate->email = "jiwei889@yahoo.com.tw";
        $donate->phone = "0900900987";
        $donate->save();


        $donate = new App\Donate;
        $donate->donate_id = 10;
        $donate->product_total_amount_id = 7;
        $donate->amount = 9;
        $donate->lname = "陳";
        $donate->email = "chen741@yahoo.com.tw";
        $donate->phone = "0901001087";
        $donate->save();




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



        $interview = new App\Interview;
        $interview->interview_id = 1;
        $interview->interview_goal = 10;
        $interview->save();



        $interviewer = new App\Interviewer;
        $interviewer->interviewer_id = 1;
        $interviewer->interview_name = "蔣清濋";
        $interviewer->email = "clear5656@yahoo.com.tw";
        $interviewer->phone = "0900100160";
        $interviewer->interview_id = 1;
        $interviewer->skill = "修理水電";
        $interviewer->save();

        $interviewer = new App\Interviewer;
        $interviewer->interviewer_id = 2;
        $interviewer->interview_name = "魏伊更";
        $interviewer->email = "one7625@yahoo.com.tw";
        $interviewer->phone = "0900200260";
        $interviewer->interview_id = 1;
        $interviewer->skill = "有護士執照";
        $interviewer->save();

        $interviewer = new App\Interviewer;
        $interviewer->interviewer_id = 3;
        $interviewer->interview_name = "余世瞭";
        $interviewer->email = "fishfood@yahoo.com.tw";
        $interviewer->phone = "0900300360";
        $interviewer->interview_id = 1;
        $interviewer->skill = "當過消防員";
        $interviewer->save();

        $interviewer = new App\Interviewer;
        $interviewer->interviewer_id = 4;
        $interviewer->interview_name = "游黛佳";
        $interviewer->email = "bring5489@yahoo.com.tw";
        $interviewer->phone = "0900400460";
        $interviewer->interview_id = 1;
        $interviewer->skill = "救生員";
        $interviewer->save();

        $interviewer = new App\Interviewer;
        $interviewer->interviewer_id = 5;
        $interviewer->interview_name = "柯綺倫";
        $interviewer->email = "wheel885@yahoo.com.tw";
        $interviewer->phone = "0900500560";
        $interviewer->interview_id = 1;
        $interviewer->skill = "修車";
        $interviewer->save();




    }
}