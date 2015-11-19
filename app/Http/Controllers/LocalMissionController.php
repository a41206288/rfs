<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Modify;
class LocalMissionController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{

        $id=Auth::user()->id;
        $works_ons = DB::table('works_ons')
            ->where('id', $id)
            ->select('mission_list_id')
            ->get();
        $mission_list_id = $works_ons[0]->mission_list_id;
//        dd($mission_list_id);
        if($mission_list_id != 1) {


            //讀取mission所有資料
            $missions = DB::table('missions')
//                ->orderBy('country_or_city_input')
//                ->orderBy('township_or_district_input')
                ->orderBy('created_at')
                ->where('mission_list_id', $mission_list_id)
                ->get();
//            dd($missions);
            $mission_lists = DB::table('mission_lists')
//                ->join('mission_support_people','mission_support_people.mission_list_id','=','mission_lists.mission_list_id')
                ->get();
//            dd($mission_lists);

//            $mission_new_locations =  DB::table('mission_new_locations')
//                ->where('mission_list_id', $mission_list_id)
//                ->orderBy('analysis_time')
//                ->get();
//            dd($mission_new_locations);
//
//            //計算總欲增援人數
//            $executive_require_people_num = DB::table('mission_new_locations')
//                ->where('mission_list_id', $mission_list_id)
//                ->sum('executive_require_people_num');
//            dd($relieverFreeUserAmounts);

//取出擁有增援列表的任務編號和名稱
            $mission_support_people_lists = DB::table('mission_support_people')
//                ->groupBy('mission_list_id')
                ->join('mission_lists','mission_lists.mission_list_id','=','mission_support_people.mission_list_id')
                ->select('mission_support_people.mission_list_id','mission_name')
                ->where('mission_support_people_num', '!=' , 0)
                ->distinct()
                ->get();
//            dd($mission_support_people_lists);

            //將擁有增援列表的任務編號和名稱($mission_support_people_lists)存成lists形式 給下拉式選單用
            $mission_support_people_names = [];
            foreach($mission_support_people_lists as $mission_support_people_list){
                $mission_support_people_names[$mission_support_people_list->mission_list_id] = $mission_support_people_list->mission_name;
            }
            $mission_support_people_names  = array_add($mission_support_people_names, '', '將志工分配至現有任務');
            $mission_support_people_names = array_except($mission_support_people_names, array($mission_list_id, 'to', 'remove'));
//            dd($mission_support_people_names);

//取出無增援列表任務編號和名稱
            $mission_no_support_people_lists = DB::table('mission_lists')
//                ->where('mission_complete_time', NULL )
                ->lists('mission_name','mission_list_id');
            foreach($mission_support_people_lists as $mission_support_people_list){
                $mission_no_support_people_lists = array_except($mission_no_support_people_lists, array($mission_support_people_list->mission_list_id, 'to', 'remove'));
            }
//移除未分配任務
            $mission_no_support_people_lists = array_except($mission_no_support_people_lists, array(1, 'to', 'remove'));
//            dd($mission_no_support_people_lists);

//取出無增援列表並正在執行中的任務編號和名稱
            $mission_no_support_work_people_lists = DB::table('mission_lists')
                ->where('mission_complete_time', NULL )
                ->lists('mission_name','mission_list_id');
            foreach($mission_support_people_lists as $mission_support_people_list){
                $mission_no_support_work_people_lists = array_except($mission_no_support_work_people_lists, array($mission_support_people_list->mission_list_id, 'to', 'remove'));
            }
//移除未分配任務
            $mission_no_support_work_people_lists = array_except($mission_no_support_work_people_lists, array(1, 'to', 'remove'));
//            dd($mission_no_support_work_people_lists);


            $mission_no_support_finish_people_lists = $mission_no_support_people_lists;
            foreach($mission_no_support_work_people_lists as $key => $value){
                $mission_no_support_finish_people_lists = array_except($mission_no_support_finish_people_lists, array($key, 'to', 'remove'));
            }
//            dd($mission_no_support_finish_people_lists);




            //計算向中央要求總增援數用
            $mission_support_people = DB::table('mission_support_people')
                ->join('roles','roles.id','=','mission_support_people.id')
//                ->where('mission_list_id', $mission_list_id)

               ->get();

            //取出所有人員種類
            $roles = DB::table('roles')->get();
//            dd($roles);
            //取出執行部門人員種類
            $role_of_work = DB::table('roles')
                ->where('Name','!=','Administrator')
                ->where('Name','!=','center')
                ->where('Name','!=','Local')
                ->where('Name','!=','Resource')
                ->lists('description','id');
            $role_of_work = array_add($role_of_work,'','愈增援職位');
//        dd($role_of_work);

            $mission_support_people_array =[];
            foreach($mission_support_people as $mission_support_person){
                if(!isset($mission_support_people_array[$mission_support_person->mission_list_id]))
                {
                    $i=1;
                }
                else
                {
                    $i=count($mission_support_people_array[$mission_support_person->mission_list_id])+1;
                }

                $mission_support_people_array[$mission_support_person->mission_list_id][ $i]['mission_support_person_id'] = $mission_support_person->mission_support_person_id;
                $mission_support_people_array[$mission_support_person->mission_list_id][ $i]['mission_list_id'] = $mission_support_person->mission_list_id;
                $mission_support_people_array[$mission_support_person->mission_list_id][ $i]['role'] = $mission_support_person->description;
                $mission_support_people_array[$mission_support_person->mission_list_id][ $i]['mission_support_people_num'] = $mission_support_person->mission_support_people_num;
//                $mission_support_people_array[$mission_support_person->mission_list_id][ $i]['mission_support_people_reason'] = $mission_support_person->mission_support_people_reason;

            }
//            dd($mission_support_people_array);

//外圈補零
//            $mission_support_people_array =[];
//            foreach($mission_lists as $mission_list){
//                $ab = false;
//                foreach($mission_support_people as $mission_support_person){
//                    if($mission_list->mission_list_id == $mission_support_person->mission_list_id ){
//                        $ab = true;
//                        if(!isset($mission_support_people_array[$mission_support_person->mission_list_id]))
//                        {
//                            $i=1;
//                        }
//                        else
//                        {
//                            $i=count($mission_support_people_array[$mission_support_person->mission_list_id])+1;
//                        }
//                        $mission_support_people_array[$mission_support_person->mission_list_id][ $i]['mission_support_person_id'] = $mission_support_person->mission_support_person_id;
//                        $mission_support_people_array[$mission_support_person->mission_list_id][ $i]['role'] = $mission_support_person->description;
//                        $mission_support_people_array[$mission_support_person->mission_list_id][ $i]['mission_support_people_num'] = $mission_support_person->mission_support_people_num;
////                $mission_support_people_array[$mission_support_person->mission_list_id][ $i]['mission_support_people_reason'] = $mission_support_person->mission_support_people_reason;
//
//                    }else{
//
//                    }
//
//                }
//                if($ab == false){
//                    $mission_support_people_array[$mission_list->mission_list_id][ 0]['mission_support_person_id'] = 0;
//                    $mission_support_people_array[$mission_list->mission_list_id][ 0]['role'] = "";
//                    $mission_support_people_array[$mission_list->mission_list_id][ 0]['mission_support_people_num'] = 0;
//
//                }
//            }

//取出哪個地點支援哪個地點的表
            $mission_help_others = DB::table('mission_help_others')
                ->join('mission_lists','mission_lists.mission_list_id','=','mission_help_others.mission_list_id')
                ->where('mission_help_other_finish_time', NULL)
//                    ->where('arrived',0)
                ->get();
//dd($mission_help_others);
            $mission_help_other_array =[];
            foreach($mission_help_others as $mission_help_other){
                if(!isset($mission_help_other_array[$mission_help_other->mission_support_person_id]))
                {
                    $i=1;
                }
                else
                {
                    $i=count($mission_help_other_array[$mission_help_other->mission_support_person_id])+1;
                }
                $mission_help_other_array[$mission_help_other->mission_support_person_id][ $i]['mission_help_other_id'] = $mission_help_other->mission_help_other_id;
                $mission_help_other_array[$mission_help_other->mission_support_person_id][ $i]['mission_name'] = $mission_help_other->mission_name;
                $mission_help_other_array[$mission_help_other->mission_support_person_id][ $i]['mission_list_id'] = $mission_help_other->mission_list_id;

//                $mission_help_other_array[$mission_help_other->mission_support_person_id][ $i]['mission_help_other_num'] = $mission_help_other->mission_help_other_num;
            }
//            dd($mission_help_other_array);

//            $all_arrived = DB::table('mission_help_other_users')
//                ->where('mission_help_other_id',$mission_help_other_id)
//                ->where('arrive_mission',0)
//                ->get();
//            dd($all_arrived);

            //取出哪個地點支援哪個地點的表包含哪些人
            $mission_help_other_users = DB::table('mission_help_other_users')
                ->join('works_ons','works_ons.id','=','mission_help_other_users.id')
                ->get();
//            dd($mission_help_other_users);
            $mission_help_other_users_array = [];
            foreach($mission_help_other_users as $mission_help_other_user){
                if( $mission_help_other_user->arrive_mission != 1){
                    $mission_help_other_users_array[$mission_help_other_user->mission_help_other_id][$mission_help_other_user->mission_list_id ][$mission_help_other_user->id ] = $mission_help_other_user->arrive_mission;
                }

            }
//dd($mission_help_other_users_array);




            //取出本任務有的救災人員種類
            $mission_roles =DB::table('users')
                ->join('role_user','users.id','=','role_user.user_id')
                ->join('roles','roles.id','=','role_user.role_id')
                ->join('works_ons','works_ons.id','=','role_user.user_id')
                ->lists('description','role_id');
            $mission_roles  = array_add($mission_roles, '', '人員種類');
            $mission_roles = array_except($mission_roles, array(3, 'to', 'remove'));
//        dd($mission_roles);


            //用以下兩陣列來判斷支援其他地方的救災人員是支援哪裡(配合$missionUsers) 讀取時再用mission_list來判斷名稱
            $user_help_missions = DB::table('mission_help_others')
                ->join('mission_help_other_users','mission_help_other_users.mission_help_other_id','=','mission_help_others.mission_help_other_id')
//                ->join('mission_support_people','mission_support_people.mission_support_person_id','=','mission_help_others.mission_support_person_id')
                ->get();
//        dd($user_help_missions);


            $help_missions_and_names = DB::table('mission_support_people')
                ->join('mission_lists','mission_lists.mission_list_id','=','mission_support_people.mission_list_id')
//                ->join('mission_support_people','mission_support_people.mission_support_person_id','=','mission_help_others.mission_support_person_id')
                ->get();
//        dd($help_missions_and_names);

            //取出本任務所有救災人員
            $missionUsers = DB::table('users')
                ->join('role_user','users.id','=','role_user.user_id')
                ->join('roles','roles.id','=','role_user.role_id')
                ->join('works_ons','works_ons.id','=','role_user.user_id')
                ->leftjoin('mission_help_other_users','mission_help_other_users.id','=','users.id')
                ->where('mission_list_id','=',$mission_list_id)
                ->orderBy('arrive_mission')
                ->orderBy('status')
                ->orderBy('role_id')
                ->get();
        dd($missionUsers);

            //取出所有user(用來印出其他任務支援的user)
            $mission_help_users = DB::table('users')
                ->join('role_user','users.id','=','role_user.user_id')
                ->join('roles','roles.id','=','role_user.role_id')
                ->join('works_ons','works_ons.id','=','role_user.user_id')
                ->leftjoin('mission_help_other_users','mission_help_other_users.id','=','users.id')
                ->orderBy('role_id')

                ->get();
//        dd($mission_help_users);

            //計算各嚴重程度傷患人數
            $victim_nums = DB::table('victim_details')
                ->where('mission_list_id', $mission_list_id)
                ->select('damage_level',DB::raw('count(*) as total'))
                ->groupBy('damage_level')
                ->get();
//            dd($victim_nums);

            $victim_num_arrays = [];

            for($i=0;$i<5;$i++){
                $find = 0;
                foreach($victim_nums as $victim_num){
                    if($i == $victim_num->damage_level){
                        $find = 1;
                        if($find == 1){
                            $victim_num_arrays[$i]['damage_level'] = $i;
                            $victim_num_arrays[$i]['total'] = $victim_num->total;
                        }
                    }
                }
               if($find == 0){
                   $victim_num_arrays[$i]['damage_level'] = $i;
                    $victim_num_arrays[$i]['total'] = 0;
                }
            }

//            dd($victim_num_arrays);
            $users = DB::table('users')
                ->select('id', 'user_name')
                ->get();
//            dd($users);





        }else{
            $mission_list_names = null;
            $missions = null;
            $mission_new_locations = null;
            $executiveRequireArrays = null;
            $relieverFreeUsers = null;
            $EmtUserAmounts = null;
            $relieverFreeUserAmounts = null;
            $relieverNewLocationUsers = null;
            $relieverNewLocationUsersArrays = null;
            $relieverNewLocationUserAmountsArrays = null;
            $relieverFreeUsersArrays = null;
            $local_reports_arrays = null;
            $executive_require_people_num = null;
            $mission_support_people = null;
            $mission_support_people_array = null;
            $victim_nums = null;
            $victim_num_arrays = null;
            $missionUsers = null;
            $mission_roles = null;
            $mission_help_other_array = null;
            $roles = null;
            $role_of_work = null;
            $mission_lists  = null;
            $mission_support_people_lists = null;
            $mission_no_support_people_lists = null;
            $mission_no_support_work_people_lists = null;
            $mission_no_support_finish_people_lists = null;

        }

        return view('manage_pages.mission_manage_local')
                ->with('victim_num_arrays', $victim_num_arrays)
                ->with('mission_support_people_array', $mission_support_people_array)
                ->with('mission_help_other_array', $mission_help_other_array)
                ->with('mission_list_id', $mission_list_id)
                ->with('missions', $missions)
                ->with('missionUsers', $missionUsers)
                ->with('mission_roles', $mission_roles)
                ->with('roles', $roles)
                ->with('role_of_work',$role_of_work)
                ->with('mission_lists', $mission_lists)
                ->with('mission_support_people_lists', $mission_support_people_lists)
                ->with('mission_support_people_names', $mission_support_people_names)
                ->with('mission_no_support_people_lists', $mission_no_support_people_lists)
                ->with('mission_no_support_work_people_lists', $mission_no_support_work_people_lists)
                ->with('mission_no_support_finish_people_lists', $mission_no_support_finish_people_lists)
                ->with('mission_help_other_users_array', $mission_help_other_users_array)
                ->with('mission_help_other_users', $mission_help_other_users)
                ->with('user_help_missions', $user_help_missions)
                ->with('mission_help_users', $mission_help_users)
                ->with('help_missions_and_names', $help_missions_and_names)
                ->with('users', $users)

    ;


//            //將新地點的要求增援人數(包括醫療跟脫困)和原因分類
//            $executiveRequireArrays =[];
//            foreach($mission_new_locations as $mission_new_location){
//
//                //如果$executiveRequireArrays 為空 設定第一筆讀到的mission_new_locations_id的第一筆回報的數量為1
//                if(!isset($executiveRequireArrays[$mission_new_location->mission_new_locations_id]))
//                {
//                    $i=1;
//                }
//                else
//                {
//                    // 設定第二次以上讀到的mission_new_locations_id的接下來的回報數量+1
//                    $i=count($executiveRequireArrays[$mission_new_location->mission_new_locations_id])+1;
//                }
//                $executiveRequireArrays[$mission_new_location->mission_new_locations_id][$i]['executive_require_people_num'] = $mission_new_location->executive_require_people_num;
//                $executiveRequireArrays[$mission_new_location->mission_new_locations_id][$i]['executive_require_reason'] = $mission_new_location->executive_require_reason;
//                $executiveRequireArrays[$mission_new_location->mission_new_locations_id][$i]['updated_at'] = $mission_new_location->updated_at;
//            }
////            dd($executiveRequireArrays);
//
//
//            //取出該任務所有脫困組人員
//            $relieverFreeUsers = DB::table('role_user')
//                ->join('users','users.id','=','role_user.user_id')
//                ->where('role_id','=',5 )
//                ->where('mission_list_id', $mission_list_id)
//                ->get();
////            dd($relieverFreeUsers);
//
//            //取出該任務所有脫困組人員個數
//            $relieverFreeUserAmounts = DB::table('users')
//                ->join('role_user','users.id','=','role_user.user_id')
//                ->select(DB::raw('count(*) as total'))
//                ->where('role_id','=',5 )
//                ->where('mission_list_id', $mission_list_id)
//                ->get();
////            dd($relieverFreeUserAmounts);
//
//            //取出個地點的脫困組人員
//            $relieverNewLocationUsers = DB::table('users')
//                ->join('role_user','users.id','=','role_user.user_id')
//                ->join('works_ons','users.id','=','works_ons.id')
//                ->where('role_id','=',5 )
//                ->where('works_ons.mission_list_id', $mission_list_id)
//                ->get();
////            dd($relieverNewLocationUsers);
//
//            //取出個地點的脫困組人員個數
//            $relieverNewLocationUserAmounts = DB::table('users')
//                ->join('role_user','users.id','=','role_user.user_id')
//                ->join('works_ons','users.id','=','works_ons.id')
//                ->select('mission_new_locations_id',DB::raw('count(*) as total'))
//                ->where('role_id','=',5 )
//                ->where('works_ons.mission_list_id', $mission_list_id)
//                ->groupBy('mission_new_locations_id')
//                ->get();
////            dd($relieverNewLocationUserAmounts);
//
//            $relieverNewLocationUserAmountsArrays =[];
//
//
//            foreach($mission_new_locations as $mission_new_location){
//                $unfind = false;
//                foreach($relieverNewLocationUserAmounts as $relieverNewLocationUserAmount){
//                    if($relieverNewLocationUserAmount->mission_new_locations_id == $mission_new_location->mission_new_locations_id) {
//                        $unfind = true;
//                        $relieverNewLocationUserAmountsArrays[$mission_new_location->mission_new_locations_id]['total'] = $relieverNewLocationUserAmount->total;
//                    }
//                }
//                if( $unfind == false ) {
//                    $relieverNewLocationUserAmountsArrays[$mission_new_location->mission_new_locations_id]['total'] = 0;
//                }
//            }
////                dd($relieverNewLocationUserAmountsArrays);
//
//
//            //將個地點的脫困組人員依地點分類
//            $relieverNewLocationUsersArrays =[];
//            foreach($relieverNewLocationUsers as $relieverNewLocationUser){
//
//                //如果$local_reports_array 為空 設定第一筆讀到的mission_new_locations_id的第一筆回報的數量為1
//                if(!isset($relieverNewLocationUsersArrays[$relieverNewLocationUser->mission_new_locations_id]))
//                {
//                    $i=1;
//                }
//                else
//                {
//                    // 設定第二次以上讀到的mission_new_locations_id的接下來的回報數量+1
//                    $i=count($relieverNewLocationUsersArrays[$relieverNewLocationUser->mission_new_locations_id])+1;
//                }
//                $relieverNewLocationUsersArrays[$relieverNewLocationUser->mission_new_locations_id][$i]['id'] = $relieverNewLocationUser->id;
//                $relieverNewLocationUsersArrays[$relieverNewLocationUser->mission_new_locations_id][$i]['name'] = $relieverNewLocationUser->name;
//            }
////            dd($relieverNewLocationUsersArrays);
//
//            //取出該任務的閒置脫困組人員
//            $relieverFreeUsersArrays =[];
//            foreach($relieverFreeUsers as $relieverFreeUser){
//                $unfind = false;
//                foreach($relieverNewLocationUsers as $relieverNewLocationUser){
//                    if($relieverFreeUser->user_id == $relieverNewLocationUser->user_id) {
//                        $unfind = true;
//                    }
//                }
//                if( $unfind == false ) {
//                    $relieverFreeUsersArrays[$relieverFreeUser->id]['name'] = $relieverFreeUser->name;
//                    $relieverFreeUsersArrays[$relieverFreeUser->id]['id'] = $relieverFreeUser->id;
//                }
//            }
////            dd($relieverFreeUsersArrays);
//
//            //取出該任務的醫療組人員個數
//            $EmtUserAmounts = DB::table('users')
//                ->join('role_user','users.id','=','role_user.user_id')
//                ->select(DB::raw('count(*) as total'))
//                ->where('role_id','=',6 )
//                ->where('mission_list_id', $mission_list_id)
//                ->get();
////            dd($EmtUserAmounts);
//
//            $local_reports = DB::table('local_reports')
//                ->orderBy('local_reports.created_at')
//                ->where('mission_list_id', $mission_list_id)
//                ->get();
////  dd($local_reports);
//
//            $local_reports_arrays =[];
//            foreach($local_reports as $local_report){
//
//                //如果$local_reports_array 為空 設定第一筆讀到的mission_new_locations_id的第一筆回報的數量為1
//                if(!isset($local_reports_arrays[$local_report->mission_new_locations_id]))
//                {
//                    $i=1;
//                }
//                else
//                {
//                    // 設定第二次以上讀到的mission_new_locations_id的接下來的回報數量+1
//                    $i=count($local_reports_arrays[$local_report->mission_new_locations_id])+1;
//                }
//
//                $local_reports_arrays[$local_report->mission_new_locations_id][$i]['content'] = $local_report->local_report_content;
//                $local_reports_arrays[$local_report->mission_new_locations_id][$i]['time'] = $local_report->created_at;
//            }
////         dd($local_reports_arrays);

	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
    public function show(Request $request) //動態更新table
    {
        $arrived = $request->get('arrived');
        $roles = $request->get('roles');
        $mission_list_id = $request->get('mission_list_id');
        if(isset($arrived)){
            if($arrived == 1)
            {
                $response = DB::table('users');
                $response = $response->join('role_user','users.id','=','role_user.user_id');
                $response = $response->join('roles','roles.id','=','role_user.role_id');
                $response = $response->join('works_ons','works_ons.id','=','role_user.user_id');
                $response = $response->leftjoin('mission_help_other_users','mission_help_other_users.id','=','users.id');
                $response = $response->where('mission_list_id',$mission_list_id);
                $response = $response->where('roles.id','>',4);

                if($roles != ""){
                    $response = $response->where('role_id',$roles);
                }

                $response = $response->orderBy('arrive_mission');
                $response = $response->orderBy('status');
                $response = $response->orderBy('role_id');
                $response = $response->get();
            }
            elseif($arrived == 0)
            {
                //拿出所有這個任務增援
                $mission_support_people = DB::table('mission_support_people')->where('mission_list_id',$mission_list_id)->lists('mission_support_person_id');
                //拿出所有這個任務增援的支援人員 且 未報到
                $mission_help_others = DB::table('mission_help_others')
                    ->join('mission_help_other_users','mission_help_others.mission_help_other_id','=','mission_help_other_users.mission_help_other_id')
                    ->whereIn('mission_support_person_id',$mission_support_people)
                    ->where('arrive_mission', 0)
                    ->lists('id');
                $response = DB::table('users');
                $response = $response->join('role_user','users.id','=','role_user.user_id');
                $response = $response->join('roles','roles.id','=','role_user.role_id');
                $response = $response->join('works_ons','works_ons.id','=','role_user.user_id');
                $response = $response->leftjoin('mission_help_other_users','mission_help_other_users.id','=','users.id');
//                $response = $response->where('mission_list_id',$mission_list_id);
                $response = $response->where('roles.id','>',4);
                $response = $response->whereIn('user_id',$mission_help_others);
                $response = $response->where('arrive_mission', 0);

                if($roles != ""){
                    $response = $response->where('role_id',$roles);
                }

                $response = $response->orderBy('arrive_mission');
                $response = $response->orderBy('status');
                $response = $response->orderBy('role_id');
                $response = $response->get();
            }

        }
//        else{
//            $response = DB::table('center_support_person_details');
//            $response = $response->join('center_support_people','center_support_people.center_support_person_id','=','center_support_person_details.center_support_person_id');
//            $response = $response ->join('roles','roles.id','=','center_support_people.role_id');
//
//            if($roles != ""){
//                $response = $response->where('description','like','%'.$roles.'%');
//            }
//
//            $response = $response->get();
//
//        }




        return response()->json($response);
    }

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit(Request $request)
	{
//        //        $inputs=$request->except('_token');
////        dd($inputs);
//        $frees=$request->input('free');
////        dd($frees);
//        $missions=$request->input('mission');
////        dd($missions);
//        $mission_new_locations_id=$request->input('mission_new_locations_id');
//        $mission_list_id=Auth::user()->mission_list_id;
//        if(isset($frees)) {
//            foreach ($frees as $free) {
//                $delete = DB::table('works_ons')->where('id', $free)->get();
//                if (isset($delete)) {
//                    DB::table('works_ons')->where('id', $free)->delete();
//
//                    $modifies = new Modify;
//                    $modifies->old_value = $free;
//                    $modifies->modify_value = 'null';
//                    $modifies->table_name = 'works_ons';
//                    $modifies->attribute_name = 'all';
//                    $modifies->id = Auth::user()->id;
//                    $modifies->save();
////                    DB::insert('insert into works_ons (mission_list_id,mission_new_locations_id, id,created_at,updated_at) values (?,?,?,?,?)',
////                        array($mission_list_id,$mission_new_locations_id, $mission, date('Y-m-d H:i:s'), date('Y-m-d H:i:s')));
//                }
//            }
//        }
//        if(isset($missions)) {
//            foreach ($missions as $mission) {
//                $insert= DB::table('works_ons')->where('id', $mission)->get();
//
//                if($insert == null)
//                {
//
//                    DB::insert('insert into works_ons (mission_list_id,mission_new_locations_id, id,created_at,updated_at) values (?,?,?,?,?)',
//                        array($mission_list_id,$mission_new_locations_id, $mission, date('Y-m-d H:i:s'), date('Y-m-d H:i:s')));
//
//                }
//                else
//                {
//
//                }
//            }
//
//        }
//        DB::table('mission_new_locations')->where('mission_list_id',$mission_list_id)->where('mission_new_locations_id',$mission_new_locations_id)->update(['executive_require_people_num' => 0,'executive_require_reason'=>""]);
//
        return Redirect::to('mission/manage/local');
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
    public function update(Request $request)//完成通報 (更新通報完成狀態)
    {
//        $inputs=$request->except('_token');
//        dd($inputs);
        $missions_id =  $request->input('mission_id');
        if(isset($missions_id))
        {
            foreach($missions_id as $mission_id)
            {
                DB::table('missions')->where('mission_id',$mission_id)->update(['mission_complete_time' => date('Y-m-d H:i:s')]);
            }
        }


        return redirect()->route('localPanel');

    }


    /**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}



}
