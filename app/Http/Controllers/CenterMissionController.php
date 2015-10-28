<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Kodeine\Acl\Traits\HasRole;
use Illuminate\Database\Eloquent\forceDelete;
use App\Mission_list;
class CenterMissionController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
                //取出mission_list 按照 未分配任務->分配人員->執行中->任務完成 排序
                $mission_lists = DB::table('mission_lists')

                    ->orderBy('assign_people_finish_time')
                    ->orderBy('arrive_location_time')
                    ->orderBy('mission_complete_time')
                    ->orderBy('mission_name')
                    ->get();
//dd($mission_lists);

                $mission_list_names = DB::table('mission_lists')
                    ->where('mission_name','!=','未分配任務')
                    ->where('mission_complete_time','=',NULL)
                    ->lists('mission_name','mission_list_id');
                $mission_list_names  = array_add($mission_list_names, '將通報分配至現有任務', '將通報分配至現有任務');
//dd($mission_list_names);


                //取出未分配任務
                 $unsigned_missions = DB::table('missions')
                    ->where('mission_list_id',1)
                     ->orderBy('created_at')
                     ->get();
//        dd($unsigned_missions);


                //取出各任務的通報內容 時間 負責人
                $mission_contents = DB::table('missions')
                ->get();
//                dd($mission_contents);

                //取出閒置的地方指揮官
                $local = DB::table('users')
                    ->join('role_user','users.id','=','role_user.user_id')
                    ->join('roles','roles.id','=','role_user.role_id')
                    ->join('works_ons','works_ons.id','=','role_user.user_id')
                    ->where('role_user.role_id','=',3)
                    ->where('works_ons.mission_list_id','=',1)
                    ->where('works_ons.status','=','閒置')
                    ->get();
//                    dd($local);

//        $mission_contents_array =[];
//        foreach($mission_contents as $mission_content){
//
//            $mission_contents_array[$mission_content->mission_list_id]['id'] = $mission_content->mission_id;
//            $mission_contents_array[$mission_content->mission_list_id]['content'] = $mission_content->mission_content;
//            $mission_contents_array[$mission_content->mission_list_id]['created_at'] = $mission_content->created_at;
//            $mission_contents_array[$mission_content->mission_list_id]['fname'] = $mission_content->fname;
//            $mission_contents_array[$mission_content->mission_list_id]['lname'] = $mission_content->lname;
//            $mission_contents_array[$mission_content->mission_list_id]['sex'] = $mission_content->sex;
//        }

        //
        $mission_contents_array =[];
        foreach($mission_contents as $mission_content){
                if(!isset($mission_contents_array[$mission_content->mission_list_id]))
                {
                    $i=1;
                }
            else
            {
                $i=count($mission_contents_array[$mission_content->mission_list_id])+1;
            }
            $mission_contents_array[$mission_content->mission_list_id][ $i]['id'] = $mission_content->mission_id;
            $mission_contents_array[$mission_content->mission_list_id][ $i]['content'] = $mission_content->mission_content;
            $mission_contents_array[$mission_content->mission_list_id][ $i]['created_at'] = $mission_content->created_at;
            $mission_contents_array[$mission_content->mission_list_id][ $i]['fname'] = $mission_content->fname;
            $mission_contents_array[$mission_content->mission_list_id][ $i]['lname'] = $mission_content->lname;
            $mission_contents_array[$mission_content->mission_list_id][ $i]['sex'] = $mission_content->sex;
            $mission_contents_array[$mission_content->mission_list_id][ $i]['township_or_district_input'] = $mission_content->township_or_district_input;
            $mission_contents_array[$mission_content->mission_list_id][ $i]['r1'] = $mission_content->rd_or_st_1;
            $mission_contents_array[$mission_content->mission_list_id][ $i]['r2'] = $mission_content->rd_or_st_1;
            $mission_contents_array[$mission_content->mission_list_id][ $i]['location'] = $mission_content->location;
        }

//        dd($mission_contents_array);

                 //取出各任務的負責人資料
                    $mission_list_charges = DB::table('mission_lists')
                        ->join('users','users.id','=','mission_lists.id')
                        ->get();
//        dd($mission_list_charges);

//                $mission_list_charges = DB::table('users')
//                    ->join('role_user','users.id','=','role_user.user_id')
//                    ->select('mission_list_id','name','email','phone')
//                    ->where('role_user.role_id','=',3)
//                    ->get();

//        foreach($mission_list_charges as $mission_list_charge){
//            $mission_contents_array[$mission_list_charge->mission_list_id."name"] = $mission_list_charge->name;
//            $mission_contents_array[$mission_list_charge->mission_list_id."email"] = $mission_list_charge->email;
//            $mission_contents_array[$mission_list_charge->mission_list_id."phone"] = $mission_list_charge->phone;
//        }
//dd($mission_contents_array);


        $mission_list_charge_Arrays = [];
        foreach($mission_lists as $mission_list ){
            $unfind = false;
            foreach($mission_list_charges as $mission_list_charge){

                if($mission_list_charge->mission_list_id == $mission_list ->mission_list_id){
                    $unfind = true;
                    $mission_list_charge_Arrays[$mission_list->mission_list_id]['name'] = $mission_list_charge->user_name;

                }
            }
            if( $unfind == false ){
                $mission_list_charge_Arrays[$mission_list->mission_list_id]['name'] = "";
            }
        }
//        dd($mission_list_charge_Arrays);


//                $mission_list_charge_Array =[];
//
//        foreach($mission_list_charges as $mission_list_charge){
//            $mission_list_charge_Array[$mission_list_charge->mission_list_id."name"] = $mission_list_charge->name;
//            $mission_list_charge_Array[$mission_list_charge->mission_list_id."email"] = $mission_list_charge->email;
//            $mission_list_charge_Array[$mission_list_charge->mission_list_id."phone"] = $mission_list_charge->phone;
//        }
//                foreach($mission_list_charges as $mission_list_charge){
//                    $mission_list_charge_Array[$mission_list_charge->mission_list_id."name"] = $mission_list_charge->name;
//                    $mission_list_charge_Array[$mission_list_charge->mission_list_id."email"] = $mission_list_charge->email;
//                    $mission_list_charge_Array[$mission_list_charge->mission_list_id."phone"] = $mission_list_charge->phone;
//                }
//dd($mission_list_charge_Array);

        //取出所有人員種類
        $roles = DB::table('roles')->get();
//        dd($roles);

        //儲存各任務救災人員人數
        $missionUserArrays =[];

        //計算各任務脫困組人數
        $relieverUsers = DB::table('users')
            ->join('role_user','users.id','=','role_user.user_id')
            ->join('roles','roles.id','=','role_user.role_id')
            ->join('works_ons','works_ons.id','=','role_user.user_id')
            ->select('mission_list_id','slug',DB::raw('count(*) as total'))
            ->where('role_user.role_id','=',5)
            ->groupBy('mission_list_id')
            ->get();
//        dd($relieverUsers);

        $relieverUsersArrays = [];
        foreach($mission_lists as $mission_list ){
            $unfind = false;
            $slug = "";
            foreach($relieverUsers as $relieverUser){

                if($mission_list->mission_list_id == $relieverUser ->mission_list_id){
                    $unfind = true;
                    $relieverUsersArrays[$relieverUser->mission_list_id] = $relieverUser->total;
                    $missionUserArrays[$relieverUser->mission_list_id][$relieverUser->slug] = $relieverUser->total;
                }
                if($unfind == false){
                    $slug = $relieverUser->slug;
                }
            }
            if( $unfind == false ){
                $relieverUsersArrays[$mission_list->mission_list_id] = 0;
                $missionUserArrays[$mission_list->mission_list_id][$slug] = 0;
            }
        }


//        $relieverUsersArrays =[];
//        foreach($relieverUsers as $relieverUser){
//            $relieverUsersArrays[$relieverUser->mission_list_id] = $relieverUser->total;
//            $missionUserArrays[$relieverUser->mission_list_id][$relieverUser->slug] = $relieverUser->total;
//        }
//        dd($relieverUsersArrays);
//        dd($missionUserArrays);

        //計算各任務醫療人員人數
        $emtUsers = DB::table('users')
            ->join('role_user','users.id','=','role_user.user_id')
            ->join('roles','roles.id','=','role_user.role_id')
            ->join('works_ons','works_ons.id','=','role_user.user_id')
            ->select('mission_list_id','slug',DB::raw('count(*) as total'))
            ->where('role_user.role_id','=',6)
            ->groupBy('mission_list_id')
            ->get();
//                dd($emtUsers);

        $emtUsersArrays =[];

        foreach($mission_lists as $mission_list ){
            $unfind = false;
            $slug = "";
            foreach($emtUsers as $emtUser){

                if($mission_list->mission_list_id == $emtUser ->mission_list_id){
                    $unfind = true;
                    $relieverUsersArrays[$emtUser->mission_list_id] = $emtUser->total;
                    $missionUserArrays[$emtUser->mission_list_id][$emtUser->slug] = $emtUser->total;
                }
                if($unfind == false){
                    $slug = $emtUser->slug;
                }
            }
            if( $unfind == false ){
                $emtUsersArrays[$mission_list->mission_list_id] = 0;
                $missionUserArrays[$mission_list->mission_list_id][$slug] = 0;
            }
        }

        //dd($emtUsersArrays);
        //dd($missionUserArrays);


        //計算各任務救火人員人數
        $fireUsers = DB::table('users')
            ->join('role_user','users.id','=','role_user.user_id')
            ->join('roles','roles.id','=','role_user.role_id')
            ->join('works_ons','works_ons.id','=','role_user.user_id')
            ->select('mission_list_id','slug',DB::raw('count(*) as total'))
            ->where('role_user.role_id','=',7)
            ->groupBy('mission_list_id')
            ->get();

        $fireUsersArrays =[];

        foreach($mission_lists as $mission_list ){
            $unfind = false;
            $slug = "";
            foreach($fireUsers as $fireUser){

                if($mission_list->mission_list_id == $fireUser ->mission_list_id){
                    $unfind = true;
                    $relieverUsersArrays[$fireUser->mission_list_id] = $fireUser->total;
                    $missionUserArrays[$fireUser->mission_list_id][$fireUser->slug] = $fireUser->total;
                }
                if($unfind == false){
                    $slug = $fireUser->slug;
                }
            }
            if( $unfind == false ){
                $fireUsersArrays[$mission_list->mission_list_id] = 0;
                $missionUserArrays[$mission_list->mission_list_id][$slug] = 0;
            }
        }

        //dd($fireUsersArrays);

        //計算各任務清潔人員人數
        $cleanUsers = DB::table('users')
            ->join('role_user','users.id','=','role_user.user_id')
            ->join('roles','roles.id','=','role_user.role_id')
            ->join('works_ons','works_ons.id','=','role_user.user_id')
            ->select('mission_list_id','slug',DB::raw('count(*) as total'))
            ->where('role_user.role_id','=',8)
            ->groupBy('mission_list_id')
            ->get();

        $cleanUsersArrays =[];

        foreach($mission_lists as $mission_list ){
            $unfind = false;
            $slug = "";
            foreach($cleanUsers as $cleanUser){

                if($mission_list->mission_list_id == $cleanUser ->mission_list_id){
                    $unfind = true;
                    $relieverUsersArrays[$cleanUser->mission_list_id] = $cleanUser->total;
                    $missionUserArrays[$cleanUser->mission_list_id][$cleanUser->slug] = $cleanUser->total;
                }
                if($unfind == false){
                    $slug = $cleanUser->slug;
                }
            }
            if( $unfind == false ){
                $cleanUsersArrays[$mission_list->mission_list_id] = 0;
                $missionUserArrays[$mission_list->mission_list_id][$slug] = 0;
            }
        }

//        dd($missionUserArrays);

        //計算各任務道路修復人員人數
        $roadUsers = DB::table('users')
            ->join('role_user','users.id','=','role_user.user_id')
            ->join('roles','roles.id','=','role_user.role_id')
            ->join('works_ons','works_ons.id','=','role_user.user_id')
            ->select('mission_list_id','slug',DB::raw('count(*) as total'))
            ->where('role_user.role_id','=',9)
            ->groupBy('mission_list_id')
            ->get();

        $roadUsersArrays =[];

        foreach($mission_lists as $mission_list ){
            $unfind = false;
            $slug = "";
            foreach($roadUsers as $roadUser){

                if($mission_list->mission_list_id == $roadUser ->mission_list_id){
                    $unfind = true;
                    $relieverUsersArrays[$roadUser->mission_list_id] = $roadUser->total;
                    $missionUserArrays[$roadUser->mission_list_id][$roadUser->slug] = $roadUser->total;
                }
                if($unfind == false){
                    $slug = $roadUser->slug;
                }
            }
            if( $unfind == false ){
                $roadUsersArrays[$mission_list->mission_list_id] = 0;
                $missionUserArrays[$mission_list->mission_list_id][$slug] = 0;
            }
        }

//        dd($missionUserArrays);

        //計算各任務管線修復人員人數
        $pipeUsers = DB::table('users')
            ->join('role_user','users.id','=','role_user.user_id')
            ->join('roles','roles.id','=','role_user.role_id')
            ->join('works_ons','works_ons.id','=','role_user.user_id')
            ->select('mission_list_id','slug',DB::raw('count(*) as total'))
            ->where('role_user.role_id','=',10)
            ->groupBy('mission_list_id')
            ->get();

        $pipeUsersArrays =[];

        foreach($mission_lists as $mission_list ){
            $unfind = false;
            $slug = "";
            foreach($pipeUsers as $pipeUser){

                if($mission_list->mission_list_id == $pipeUser ->mission_list_id){
                    $unfind = true;
                    $relieverUsersArrays[$pipeUser->mission_list_id] = $pipeUser->total;
                    $missionUserArrays[$pipeUser->mission_list_id][$pipeUser->slug] = $pipeUser->total;
                }
                if($unfind == false){
                    $slug = $pipeUser->slug;
                }
            }
            if( $unfind == false ){
                $pipeUsersArrays[$mission_list->mission_list_id] = 0;
                $missionUserArrays[$mission_list->mission_list_id][$slug] = 0;
            }
        }

//        dd($missionUserArrays);

        //計算各任務警戒人員人數
        $policeUsers = DB::table('users')
            ->join('role_user','users.id','=','role_user.user_id')
            ->join('roles','roles.id','=','role_user.role_id')
            ->join('works_ons','works_ons.id','=','role_user.user_id')
            ->select('mission_list_id','slug',DB::raw('count(*) as total'))
            ->where('role_user.role_id','=',11)
            ->groupBy('mission_list_id')
            ->get();

        $policeUsersArrays =[];

        foreach($mission_lists as $mission_list ){
            $unfind = false;
            $slug = "";
            foreach($policeUsers as $policeUser){

                if($mission_list->mission_list_id == $policeUser ->mission_list_id){
                    $unfind = true;
                    $relieverUsersArrays[$policeUser->mission_list_id] = $policeUser->total;
                    $missionUserArrays[$policeUser->mission_list_id][$policeUser->slug] = $policeUser->total;
                }
                if($unfind == false){
                    $slug = $policeUser->slug;
                }
            }
            if( $unfind == false ){
                $policeUsersArrays[$mission_list->mission_list_id] = 0;
                $missionUserArrays[$mission_list->mission_list_id][$slug] = 0;
            }
        }
        //dd($policeUsersArrays);

//        dd($missionUserArrays);






//
//
//                //計算各任務脫困人員總人數(未分配+已分配)
//                $relieverUsers = DB::table('users')
//                    ->join('role_user','users.id','=','role_user.user_id')
//                    ->select('mission_list_id',DB::raw('count(*) as total'))
//                    ->where('role_user.role_id','=',4)
//                    ->groupBy('users.mission_list_id')
//                    ->get();
////        dd($relieverUsers);
//                $relieverUsersArrays =[];
//                foreach($relieverUsers as $relieverUser){
//                    $relieverUsersArrays[$relieverUser->mission_list_id] = $relieverUser->total;
//                }
////        dd($relieverUsersArrays);
//
//
//        //計算中心待命的脫困組人數
//        $relieverFreeUsers = DB::table('users')
//            ->join('role_user','users.id','=','role_user.user_id')
//            ->select(DB::raw('count(*) as total'))
//            ->where('mission_list_id','=',1)
//            ->where('role_user.role_id','=',4)
//            ->get();
////        dd($relieverFreeUsers);
//        //計算中心待命的醫療組人數
//        $emtFreeUsers = DB::table('users')
//            ->join('role_user','users.id','=','role_user.user_id')
//            ->select(DB::raw('count(*) as total'))
//            ->where('mission_list_id','=',1)
//            ->where('role_user.role_id','=',5)
//            ->get();
////        dd($emtFreeUsers);

////取出所有現場資料
//        $mission_new_locations =  DB::table('mission_new_locations')
//            ->orderBy('analysis_time')
//            ->get();
////dd($mission_new_locations);
//        $mission_new_location_Arrays =[];
//        foreach($mission_new_locations as $mission_new_location){
//
//            //$mission_new_location_Arrays 為空 設定第一筆讀到的mission_new_locations_id的第一筆回報的數量為1
//            if(!isset($mission_new_location_Arrays[$mission_new_location->mission_list_id]))
//            {
//                $i=1;
//            }
//            else
//            {
//                // 設定第二次以上讀到的mission_new_locations_id的接下來的回報數量+1
//                $i=count($mission_new_location_Arrays[$mission_new_location->mission_list_id])+1;
//            }
//
//            $mission_new_location_Arrays[$mission_new_location->mission_list_id][$i]['mission_new_locations_id'] = $mission_new_location->mission_new_locations_id;
//            $mission_new_location_Arrays[$mission_new_location->mission_list_id][$i]['location'] = $mission_new_location->location;
//        }
////dd($mission_new_location_Arrays);

//        //計算現場個數
//        $mission_new_location_amounts =  DB::table('mission_new_locations')
//            ->select('mission_list_id',DB::raw('count(*) as total'))
//            ->orderBy('mission_list_id')
//            ->get();
////        dd($mission_new_locations);
//
//        $mission_new_location_amount_arrays = [];
//        foreach($mission_lists as $mission_list ){
//            $unfind = false;
//            foreach($mission_new_location_amounts as $mission_new_location_amount){
//
//                if($mission_new_location_amount->mission_list_id == $mission_list ->mission_list_id){
//                    $unfind = true;
//                    $mission_new_location_amount_arrays[$mission_list->mission_list_id]['total'] = $mission_new_location_amount->total;
//
//                }
//            }
//            if( $unfind == false ){
//                $mission_new_location_amount_arrays[$mission_list->mission_list_id]['total'] = 0;
//            }
//        }
////        dd($mission_new_location_amount_arrays);


        $reports = DB::table('reports')->get();


        $reports_array =[];
        foreach($reports as $report){

            if(!isset($reports_array[$report->mission_list_id]))
            {
                $i=1;
            }
            else
            {
                $i=count($reports_array[$report->mission_list_id])+1;
            }

            $reports_array[$report->mission_list_id][$i]['content'] = $report->report_content;
            $reports_array[$report->mission_list_id][$i]['time'] = $report->created_at;
        }
//         dd($reports_array);


//        //取出各任務需求增員人數(醫療+脫困)
//      $mission_support_people = DB::table('mission_support_people')->get();
////        dd($mission_support_people);
//
//        $mission_support_people_Array =[];
//        foreach($mission_support_people as $mission_support_person){
//            $mission_support_people_Array[$mission_support_person->mission_list_id."local_emt_num"] = $mission_support_person->local_emt_num;
//            $mission_support_people_Array[$mission_support_person->mission_list_id."local_reliever_num"] = $mission_support_person->local_reliever_num;
//            $mission_support_people_Array[$mission_support_person->mission_list_id."created_at"] = $mission_support_person->created_at;
//        }
////dd($mission_support_people_Array );
//
//        //取出各任務物資需求
//        $mission_support_products = DB::table('mission_support_products')
//            ->join('product_total_amounts','product_total_amounts.product_total_amount_id','=','mission_support_products.product_total_amount_id')
//            ->get();
////        dd($mission_support_products);
//
//        $mission_support_product_Arrays =[];
//
//        foreach($mission_support_products as $mission_support_product){
//
//            //$mission_new_location_Arrays 為空 設定第一筆讀到的mission_new_locations_id的第一筆回報的數量為1
//            if(!isset($mission_support_product_Arrays[$mission_support_product->mission_list_id]))
//            {
//                $i=1;
//            }
//            else
//            {
//                // 設定第二次以上讀到的mission_new_locations_id的接下來的回報數量+1
//                $i=count($mission_support_product_Arrays[$mission_support_product->mission_list_id])+1;
//            }
//
//            $mission_support_product_Arrays[$mission_support_product->mission_list_id][$i]['product_total_amount_id'] = $mission_support_product->product_total_amount_id;
//            $mission_support_product_Arrays[$mission_support_product->mission_list_id][$i]['amount'] = $mission_support_product->mission_support_product_amount;
//            $mission_support_product_Arrays[$mission_support_product->mission_list_id][$i]['product_name'] = $mission_support_product->product_name;
//            $mission_support_product_Arrays[$mission_support_product->mission_list_id][$i]['unit'] = $mission_support_product->unit;
//        }
//        dd($mission_support_product_Array);

//        dd($mission_support_product_Arrays);

//                //取出中心庫存數
//                    $center_amounts = DB::table('local_safe_amounts')
//                    ->where('mission_list_id','=',1)
//                    ->get();
////                        dd($center_safe_amounts);
//                $center_amounts_arrays =[];
//                foreach($center_amounts as $center_amount){
//                    $center_amounts_arrays[$center_amount->product_total_amount_id] = $center_amount->amount;
//                }
//                                dd($center_amounts_Arrays);

//        // 安全存量
//        $product_total_amount_saves = DB::table('local_safe_amounts')
//            ->select('product_total_amount_id',DB::raw('amount-safe_amount as total'))
//            ->groupBy('product_total_amount_id')
//            ->get();


                //計算總通報個數
                $mission_totals = DB::table('missions')
                ->select('mission_list_id',DB::raw('count(*) as total'))
                ->groupBy('mission_list_id')
                ->get();
//                dd($missions_total);
                 $mission_total_Arrays =[];
                foreach($mission_totals as $mission_total){
                    $mission_total_Arrays[$mission_total->mission_list_id] = $mission_total->total;
                }
//                        dd($mission_total_Arrays);

//                //計算已完成通報個數
//                $complete_missions = DB::table('missions')
//                ->select('mission_list_id',DB::raw('count(*) as total'))
//                ->where('mission_list_id','!=',1)
//                ->where('complete_time','!=','NULL')
//                ->groupBy('mission_list_id')
//                ->get();
//
//                //計算各任務達成率
//                $achievement_array = [];
//                foreach($mission_totals as $mission ){
//                    $unfind = false;
//                    foreach($complete_missions as $complete_mission){
//
//                        if($mission->mission_list_id == $complete_mission ->mission_list_id){
//                            $unfind = true;
//                            $achievement_array[$mission->mission_list_id] = 'width: '.round(($complete_mission->total/$mission->total)*100) ."%";
//                            $achievement_array[$mission->mission_list_id."word"] = round(($complete_mission->total/$mission->total)*100) ."%";
//                        }
//                    }
//                if( $unfind == false ){
//                        $achievement_array[$mission->mission_list_id] = 'width: 0%';
//                        $achievement_array[$mission->mission_list_id."word"] = '0%';
//                    }
//                }


        return view('manage_pages.mission_manage')
            ->with('mission_lists', $mission_lists)
            ->with('mission_total_Arrays', $mission_total_Arrays)
            ->with('reports_array', $reports_array)
            ->with('mission_list_charge_Arrays', $mission_list_charge_Arrays)
            ->with('mission_contents_array', $mission_contents_array)
            ->with('roles', $roles)
            ->with('missionUserArrays', $missionUserArrays)
            ->with('unsigned_missions', $unsigned_missions)
            ->with('mission_list_names', $mission_list_names)
            ->with('local', $local)
//            ->with('emtUsersArrays', $emtUsersArrays)
//            ->with('relieverUsersArrays', $relieverUsersArrays)
//            ->with('mission_new_location_Arrays', $mission_new_location_Arrays)
//            ->with('mission_new_location_amount_arrays', $mission_new_location_amount_arrays)
//            ->with('relieverFreeUsers', $relieverFreeUsers)
//            ->with('emtFreeUsers', $emtFreeUsers)
//            ->with('mission_list_reports', $mission_list_reports)
//            ->with('achievement_array', $achievement_array)
//            ->with('mission_contents', $mission_contents)
//            ->with('mission_support_people_Array', $mission_support_people_Array)
//            ->with('mission_support_product_Arrays', $mission_support_product_Arrays)
//            ->with('center_amounts_arrays', $center_amounts_arrays)
            ;

	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create(Request $request)
	{
//        $inputs=$request->except('_token');
//        dd($inputs);
        $mission_list_name =$request->input('new_mission_name');
        $mission_list_id = DB::table('mission_lists')->select(DB::raw('count(*) as total'))->get();
        $mission_list_id = $mission_list_id[0]->total + 1;
//        dd($mission_list_id);
        $mission_id =$request->input('mission_id');

//        dd($mission_list_name);
        $mission_list = new Mission_list;
        $mission_list->mission_list_id = $mission_list_id ;
        $mission_list->mission_name = $mission_list_name;
        $mission_list->save();
//        dd($mission_list->mission_list_id );
        DB::table('missions')->where('mission_id',$mission_id)->update(['mission_list_id' => $mission_list_id]);
        return redirect()->route('centerPanel');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
//        $inputs=$request->except('_token','support_type','mission_list_id');
//        dd($inputs);
        $people = 1;
        $product = 0;

        $support_type=$request->input('support_type');
        $mission_list_id=$request->input('mission_list_id');
        if($support_type==$people)
        {
            $emt=$request->input('emt');
            $reliever=$request->input('reliever');
            DB::table('mission_support_people')->where('mission_list_id',$mission_list_id)->update(['assign_emt_num' => $emt,'assign_reliever_num'=>$reliever]);
        }
        else if($support_type==$product)
        {
            $products=$request->except('_token','support_type','mission_list_id');
        }

        return redirect()->route('administratorPanel');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request)
	{
//        $inputs=$request->except('_token');
//        dd($inputs);
        $mission_list_id = $request->input('mission_list_id');
        $mission_name = $request->input('mission_name');
        $id = $request->input('id');
        $old_id = $request->input('old_id');
        $call_to_remove_from_missions = $request->input('call_to_remove_from_mission');

        if(isset($mission_name))
        {
            DB::table('mission_lists')->where('mission_list_id',$mission_list_id)->update(['mission_name' => $mission_name]);
        }
        if(isset($id) && isset($old_id) && $id != $old_id)
        {
            DB::table('mission_lists')->where('mission_list_id',$mission_list_id)->update(['id' => $id]);
        }
        if(isset($call_to_remove_from_missions))
        {
            foreach($call_to_remove_from_missions as $call_to_remove_from_mission)
            {
                DB::table('missions')->where('mission_id',$call_to_remove_from_mission)->update(['mission_list_id' => 1]);
            }
        }
        return redirect()->route('centerPanel');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy(Request $request)
	{
//        $inputs=$request->except('_token');
//        dd($inputs);
        //任務本身 mission list
        //通報 mission
        //救災人員 work_on
        //mission_help_others  ((?
        //mission_support_people ((?
        //victim_details ((?
        //reports ((???
        $mission_list_id = $request->input('mission_list_id');
        DB::table('missions')->where('mission_list_id',$mission_list_id)->update(['mission_list_id' => 1]);
        DB::table('works_ons')->where('mission_list_id',$mission_list_id)->update(['mission_list_id' => 1,'status' => '執行任務']);
//        DB::table('works_ons')->where('mission_list_id',$mission_list_id)->update(['status' => '返回中']);
        DB::table('mission_lists')->where('mission_list_id',$mission_list_id)->delete();


        return redirect()->route('centerPanel');
	}

}
