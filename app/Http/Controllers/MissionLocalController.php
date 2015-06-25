<?php namespace App\Http\Controllers;


use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class MissionLocalController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $mission_list_id=Auth::user()->mission_list_id;
//        dd(Auth::user());
        if($mission_list_id != 1) {


            //讀取mission所有資料
            $missions = DB::table('missions')
                ->orderBy('country_or_city_input')
                ->orderBy('township_or_district_input')
                ->orderBy('location')
                ->where('mission_list_id', $mission_list_id)
                ->get();

            $mission_new_locations =  DB::table('mission_new_locations')
                ->where('mission_list_id', $mission_list_id)
                ->orderBy('analysis_time')
                ->get();
//            dd($mission_new_locations);

            //取出該任務所有脫困組人員
            $relieverFreeUsers = DB::table('users')
                ->join('role_user','users.id','=','role_user.user_id')
                ->where('role_id','=',5 )
                ->where('mission_list_id', $mission_list_id)
                ->get();
//            dd($relieverFreeUsers);

            //取出該任務所有脫困組人員個數
            $relieverFreeUserAmounts = DB::table('users')
                ->join('role_user','users.id','=','role_user.user_id')
                ->select(DB::raw('count(*) as total'))
                ->where('role_id','=',5 )
                ->where('mission_list_id', $mission_list_id)
                ->get();
//            dd($relieverFreeUserAmounts);

            //取出個地點的脫困組人員
            $relieverNewLocationUsers = DB::table('users')
                ->join('role_user','users.id','=','role_user.user_id')
                ->join('works_ons','users.id','=','works_ons.id')
                ->where('role_id','=',5 )
                ->where('mission_list_id', $mission_list_id)
                ->get();
//            dd($relieverNewLocationUsers);

            //取出個地點的脫困組人員個數
            $relieverNewLocationUserAmounts = DB::table('users')
                ->join('role_user','users.id','=','role_user.user_id')
                ->join('works_ons','users.id','=','works_ons.id')
                ->select('mission_new_locations_id',DB::raw('count(*) as total'))
                ->where('role_id','=',5 )
                ->where('mission_list_id', $mission_list_id)
                ->groupBy('mission_new_locations_id')
                ->get();
//            dd($relieverNewLocationUserAmounts);

            $relieverNewLocationUserAmountsArrays =[];
            foreach($relieverNewLocationUserAmounts as $relieverNewLocationUserAmount){
                $relieverNewLocationUserAmountsArrays[$relieverNewLocationUserAmount->mission_new_locations_id]['total'] = $relieverNewLocationUserAmount->total;
            }
//                dd($relieverNewLocationUserAmountsArrays);
            //將個地點的脫困組人員依地點分類
            $relieverNewLocationUsersArrays =[];
            foreach($relieverNewLocationUsers as $relieverNewLocationUser){
                $relieverNewLocationUsersArrays[$relieverNewLocationUser->mission_new_locations_id][$relieverNewLocationUser->id]['name'] = $relieverNewLocationUser->name;
            }
//            dd($relieverNewLocationUsersArrays);

            //取出該任務的閒置脫困組人員
            $relieverFreeUsersArray =[];
            foreach($relieverFreeUsers as $relieverFreeUser){
                $unfind = false;
                foreach($relieverNewLocationUsers as $relieverNewLocationUser){
                    if($relieverFreeUser->user_id == $relieverNewLocationUser->user_id) {
                        $unfind = true;
                    }
                }
                if( $unfind == false ) {
                    $relieverFreeUsersArray[$relieverFreeUser->id]['name'] = $relieverFreeUser->name;
                }
            }
//            dd($relieverFreeUsersArray);

        //取出該任務的醫療組人員個數
            $EmtUserAmounts = DB::table('users')
                ->join('role_user','users.id','=','role_user.user_id')
                ->select(DB::raw('count(*) as total'))
                ->where('role_id','=',6 )
                ->where('mission_list_id', $mission_list_id)
                ->get();
//            dd($EmtUserAmounts);

            $local_reports = DB::table('local_reports')
                ->orderBy('local_reports.created_at')
                ->where('mission_list_id', $mission_list_id)
                ->get();
//  dd($local_reports);

            $local_reports_arrays =[];
            foreach($local_reports as $local_report){

                //如果$local_reports_array 為空 設定第一筆讀到的mission_new_locations_id的第一筆回報的數量為1
                if(!isset($local_reports_arrays[$local_report->mission_new_locations_id]))
                {
                    $i=1;
                }
                else
                {
                    // 設定第二次以上讀到的mission_new_locations_id的接下來的回報數量+1
                    $i=count($local_reports_arrays[$local_report->mission_new_locations_id])+1;
                }

                $local_reports_arrays[$local_report->mission_new_locations_id][$i]['content'] = $local_report->local_report_content;
                $local_reports_arrays[$local_report->mission_new_locations_id][$i]['time'] = $local_report->created_at;
            }
//         dd($local_reports_arrays);

        }else{
            $mission_list_names = null;
            $missions = null;
            $mission_new_locations = null;
            $relieverFreeUsers = null;
            $relieverNewLocationUsers = null;
            $relieverNewLocationUsersArrays = null;
            $relieverNewLocationUserAmountsArrays = null;
            $relieverFreeUsersArray = null;
            $local_reports_arrays = null;
        }






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
            ->with('mission_new_locations', $mission_new_locations)
            ->with('relieverFreeUserAmounts', $relieverFreeUserAmounts)
            ->with('EmtUserAmounts', $EmtUserAmounts)
            ->with('local_reports_arrays', $local_reports_arrays)
            ->with('$mission_new_locations', $mission_new_locations)
            ->with('relieverNewLocationUserAmountsArrays', $relieverNewLocationUserAmountsArrays);
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
        $missions_list_id=2;
        $country =$request->input('country');
        $township = $request->input('township');

        if($country!='請選擇' && $township=='請選擇')
        {
            $request->flashOnly('country');
            //讀取mission所有資料
            $missions = DB::table('missions')
                ->orderBy('country_or_city_input')
                ->orderBy('township_or_district_input')
                ->orderBy('location')
                ->where('mission_list_id', $missions_list_id)
                ->where('country_or_city_input', $country)
                ->get();

        }
        if($country!='請選擇' && $township!='請選擇')
        {
            $request->flashOnly('country');
            //讀取mission所有資料
            $missions = DB::table('missions')
                ->orderBy('country_or_city_input')
                ->orderBy('township_or_district_input')
                ->orderBy('location')
                ->where('mission_list_id', $missions_list_id)
                ->where('country_or_city_input', $country)
                ->where('township_or_district_input', $township)
                ->get();

        }
        if($country=='請選擇')
        {

            $missions = DB::table('missions')
                ->orderBy('country_or_city_input')
                ->orderBy('township_or_district_input')
                ->orderBy('location')
                ->where('mission_list_id', $missions_list_id)
                ->get();
//            dd( $missions);
        }
        //讀取縣市
        $country_or_city_inputs = DB::table('missions')
            ->orderBy('country_or_city_input')
            ->where('mission_list_id', $missions_list_id)
            ->distinct()
            ->lists('country_or_city_input','country_or_city_input');
//        $new_country_or_city_inputs=[];
//        foreach( $country_or_city_inputs as  $country_or_city_input){
//            $new_country_or_city_inputs[$country_or_city_input] = $country_or_city_input;
//        }
//        $new_country_or_city_inputs = array_add($new_country_or_city_inputs, '請選擇', '請選擇');
        $country_or_city_inputs = array_add($country_or_city_inputs, '請選擇', '請選擇');

        //讀取鄉鎮區
        if($country!='請選擇')
        {
            $township_or_district_inputs = DB::table('missions')
                ->orderBy('township_or_district_input')
                ->where('mission_list_id', $missions_list_id)
                ->where('country_or_city_input', $country)
                ->distinct()
                ->lists('township_or_district_input','township_or_district_input');
//            $new_township_or_district_inputs=[];
//            foreach( $township_or_district_inputs as  $township_or_district_input){
//                $new_township_or_district_inputs[$township_or_district_input] = $township_or_district_input;
//            }

        }
        else
        {
            $township_or_district_inputs=[];
            $township_or_district_inputs = array_add($township_or_district_inputs, '請選擇', '請選擇');
        }
//        $new_township_or_district_inputs = array_add($new_township_or_district_inputs, '請選擇', '請選擇');
        $township_or_district_inputs = array_add( $township_or_district_inputs, '請選擇', '請選擇');
        //讀取任務列表

        return view('manage_pages.mission_manage_local')->with('missions', $missions)
            ->with('country_or_city_inputs', $country_or_city_inputs)
            ->with('township_or_district_inputs', $township_or_district_inputs);
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
