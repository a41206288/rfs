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
                ->orderBy('location')
                ->where('mission_list_id', $mission_list_id)
                ->get();
//            dd($missions);



            $mission_lists = DB::table('mission_lists')->get();

//            $mission_new_locations =  DB::table('mission_new_locations')
//                ->where('mission_list_id', $mission_list_id)
//                ->orderBy('analysis_time')
//                ->get();
////            dd($mission_new_locations);
//
//            //計算總欲增援人數
//            $executive_require_people_num = DB::table('mission_new_locations')
//                ->where('mission_list_id', $mission_list_id)
//                ->sum('executive_require_people_num');
////            dd($relieverFreeUserAmounts);



            //計算向中央要求總增援數用
            $mission_support_people = DB::table('mission_support_people')
                ->join('roles','roles.id','=','mission_support_people.id')
//                ->where('mission_list_id', $mission_list_id)

               ->get();

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
                $mission_support_people_array[$mission_support_person->mission_list_id][ $i]['role'] = $mission_support_person->description;
                $mission_support_people_array[$mission_support_person->mission_list_id][ $i]['mission_support_people_num'] = $mission_support_person->mission_support_people_num;
//                $mission_support_people_array[$mission_support_person->mission_list_id][ $i]['mission_support_people_reason'] = $mission_support_person->mission_support_people_reason;

            }
//            dd($mission_support_people_array);


            $mission_help_others = DB::table('mission_help_others')
                ->join('mission_lists','mission_lists.mission_list_id','=','mission_help_others.mission_list_id')
//                ->where('', ) 依照 mission_support_person_id 排
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
                $mission_help_other_array[$mission_help_other->mission_support_person_id][ $i]['mission_name'] = $mission_help_other->mission_name;
                $mission_help_other_array[$mission_help_other->mission_support_person_id][ $i]['mission_help_other_num'] = $mission_help_other->mission_help_other_num;
            }
//            dd($mission_help_other_array);


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

            //計算個嚴重程度傷患人數
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
        }



//這裡是最久以前註解的東西


//      //dd(Auth::user()->mission_list_id);
//        $missions_list_id=Auth::user()->mission_list_id;
//        dd(Auth::user());
//        if($missions_list_id != 1){
//        //讀取mission所有資料
//        $missions = DB::table('missions')
//            ->orderBy('country_or_city_input')
//            ->orderBy('township_or_district_input')
//            ->orderBy('location')
//            ->where('mission_list_id', $missions_list_id)
//            ->get();
////dd($missions);
//        //讀取縣市
//        $country_or_city_inputs = DB::table('missions')
//            ->orderBy('country_or_city_input')
//            ->where('mission_list_id', $missions_list_id)
//            ->distinct()
//            ->lists('country_or_city_input','country_or_city_input');
//        $country_or_city_inputs = array_add($country_or_city_inputs, '請選擇', '請選擇');
////        $new_country_or_city_inputs=[];
////        foreach( $country_or_city_inputs as  $country_or_city_input){
////            $new_country_or_city_inputs[$country_or_city_input] = $country_or_city_input;
////        }
////        $new_country_or_city_inputs = array_add($new_country_or_city_inputs, '請選擇', '請選擇');
//
//        ///讀取鄉鎮區
//        $new_township_or_district_inputs=[];
//        $new_township_or_district_inputs = array_add($new_township_or_district_inputs, '請選擇', '請選擇');
//
//        //讀取通報 local_reports
//        $local_reports = DB::table('local_reports')
//
//            ->get();
//       // dd($local_reports);
//        //dd($local_reports->$local_report_content);
//        $local_reports_array =[];
//        foreach($local_reports as $local_report){
//
//            $local_reports_array[$local_report->mission_id][$local_report->local_report_id]['content'] = $local_report->local_report_content;
//            $local_reports_array[$local_report->mission_id][$local_report->local_report_id]['time'] = $local_report->created_at;
//        }
//      //  dd($local_reports_array);
//
//        //取出各任務的脫困組人員個數
//        $relieverMissionUsers = DB::table('users')
//            ->join('role_user','users.id','=','role_user.user_id')
//            ->select('mission_id',DB::raw('count(*) as total'))
//            ->where('role_id','=',4 )
//            ->where('mission_list_id', $missions_list_id)
//            ->groupBy('mission_id')
//            ->get();
//
//        $relieverMissionUsersArray =[];
//        foreach($missions as $mission){
//            $unfind = false;
//            foreach($relieverMissionUsers as $relieverMissionUser){
//                if($mission->mission_id == $relieverMissionUser->mission_id) {
//                    $unfind = true;
//                    $relieverMissionUsersArray[$mission->mission_id] = $relieverMissionUser->total;
//                }
//            }
//            if( $unfind == false ) {
//                $relieverMissionUsersArray[$mission->mission_id] = 0;
//            }
//        }
//        }else{
//            $missions = null;
//            $country_or_city_inputs = null;
//            $new_township_or_district_inputs = null;
//            $local_reports_array = null;
//            $relieverMissionUsersArray = null;
//
//        }

//dd($relieverMissionUsersArray);
        //dd($country_or_city_inputs);
        return view('manage_pages.mission_manage_local')
//            ->with('mission_new_locations', $mission_new_locations)
//            ->with('relieverFreeUserAmounts', $relieverFreeUserAmounts)
//            ->with('executive_require_people_num', $executive_require_people_num)
//            ->with('EmtUserAmounts', $EmtUserAmounts)
//            ->with('local_reports_arrays', $local_reports_arrays)
//            ->with('mission_new_locations', $mission_new_locations)
//            ->with('executiveRequireArrays', $executiveRequireArrays)
//            ->with('relieverNewLocationUsersArrays', $relieverNewLocationUsersArrays)
//            ->with('relieverFreeUsersArrays', $relieverFreeUsersArrays)
//            ->with('relieverNewLocationUserAmountsArrays', $relieverNewLocationUserAmountsArrays)
//            ->with('mission_support_people', $mission_support_people)
                ->with('victim_num_arrays', $victim_num_arrays)
                ->with('mission_support_people_array', $mission_support_people_array)
                ->with('mission_help_other_array', $mission_help_other_array)
                ->with('mission_list_id', $mission_list_id)
            ;

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
    public function update(Request $request)
    {
//        $inputs=$request->except('_token');
////        dd($inputs);
//        $emt = 0;
//        $reliever = 1;
//        $support_type =$request->input('support_type');
//        $mission_list_id=Auth::user()->mission_list_id;
//        if($support_type == $emt)
//        {
//            $local_emt_num = $request->input('local_emt_num');
//            DB::table('mission_support_people')->where('mission_list_id',$mission_list_id)->update(['local_emt_num' => $local_emt_num]);
//            DB::table('mission_new_locations')->where('mission_list_id',$mission_list_id)->where('mission_new_locations_id',1)->update(['executive_require_people_num' => 0,'executive_require_reason'=>""]);
//
//
//        }
//        elseif($support_type == $reliever)
//        {
//            $local_reliever_num = $request->input('local_reliever_num');
//            DB::table('mission_support_people')->where('mission_list_id',$mission_list_id)->update(['local_reliever_num' => $local_reliever_num]);
//        }
        return Redirect::to('mission/manage/local');

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
