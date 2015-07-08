<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
class LocalAnalysisController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $mission_list_id=Auth::user()->mission_list_id;
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
            $relieverAllUsers = DB::table('role_user')
                ->join('users','users.id','=','role_user.user_id')
                ->where('role_id','=',5 )
                ->where('mission_list_id', $mission_list_id)
                ->get();
//            dd($relieverAllUsers);

            //取出個地點的脫困組人員
            $relieverNewLocationUsers = DB::table('users')
                ->join('role_user','users.id','=','role_user.user_id')
                ->join('works_ons','users.id','=','works_ons.id')
                ->where('role_id','=',5 )
                ->where('mission_list_id', $mission_list_id)
                ->get();
//            dd($relieverNewLocationUsers);

            //將個地點的脫困組人員依地點分類
            $relieverNewLocationUsersArrays =[];
            foreach($relieverNewLocationUsers as $relieverNewLocationUser){

                //如果$local_reports_array 為空 設定第一筆讀到的mission_new_locations_id的第一筆回報的數量為1
                if(!isset($relieverNewLocationUsersArrays[$relieverNewLocationUser->mission_new_locations_id]))
                {
                    $i=1;
                }
                else
                {
                    // 設定第二次以上讀到的mission_new_locations_id的接下來的回報數量+1
                    $i=count($relieverNewLocationUsersArrays[$relieverNewLocationUser->mission_new_locations_id])+1;
                }
                $relieverNewLocationUsersArrays[$relieverNewLocationUser->mission_new_locations_id][$i]['id'] = $relieverNewLocationUser->id;
                $relieverNewLocationUsersArrays[$relieverNewLocationUser->mission_new_locations_id][$i]['name'] = $relieverNewLocationUser->name;
            }

//            dd($relieverNewLocationUsersArrays);

            //取出該任務的閒置脫困組人員
            $relieverFreeUsersArrays =[];
            foreach($relieverAllUsers as $relieverAllUser){
                $unfind = false;
                foreach($relieverNewLocationUsers as $relieverNewLocationUser){
                    if($relieverAllUser->user_id == $relieverNewLocationUser->user_id) {
                        $unfind = true;
                    }
                }
                if( $unfind == false ) {
                    $relieverFreeUsersArrays[$relieverAllUser->id]['name'] = $relieverAllUser->name;
                    $relieverFreeUsersArrays[$relieverAllUser->id]['id'] = $relieverAllUser->id;
                }
            }
//            dd($relieverFreeUsersArrays);

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


            foreach($mission_new_locations as $mission_new_location){
                $unfind = false;
                foreach($relieverNewLocationUserAmounts as $relieverNewLocationUserAmount){
                    if($relieverNewLocationUserAmount->mission_new_locations_id == $mission_new_location->mission_new_locations_id) {
                        $unfind = true;
                        $relieverNewLocationUserAmountsArrays[$mission_new_location->mission_new_locations_id]['total'] = $relieverNewLocationUserAmount->total;
                    }
                }
                if( $unfind == false ) {
                    $relieverNewLocationUserAmountsArrays[$mission_new_location->mission_new_locations_id]['total'] = 0;
                }
            }
//                dd($relieverNewLocationUserAmountsArrays);

        }else{
            $mission_list_names = null;
            $missions = null;
            $mission_new_locations = null;
            $relieverAllUsers = null;
            $relieverNewLocationUsers = null;
            $relieverNewLocationUsersArray = null;
            $relieverFreeUsersArray = null;
            $relieverNewLocationUserAmountsArrays = null;
        }
        return view('manage_pages.analysis_manage_local')
            ->with('missions', $missions)
            ->with('mission_new_locations', $mission_new_locations)
            ->with('relieverNewLocationUsersArrays', $relieverNewLocationUsersArrays)
            ->with('relieverFreeUsersArrays', $relieverFreeUsersArrays)
            ->with('relieverNewLocationUserAmountsArrays', $relieverNewLocationUserAmountsArrays);

	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{

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
	public function show()
	{


	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit(Request $request)
	{
//        $inputs=$request->except('_token');
//        dd($inputs);
        $frees=$request->input('free');
        $missions=$request->input('mission');
//        dd($missions);
        $mission_new_locations_id=$request->input('mission_new_locations_id');
        if(isset($frees)) {
            foreach ($frees as $free) {
                $delete = DB::table('works_ons')->where('id', $free)->get();
                if (isset($delete)) {
                    DB::table('works_ons')->where('id', $free)->delete();
                }
            }
        }
        if(isset($missions)) {
            foreach ($missions as $mission) {
                $insert= DB::table('works_ons')->where('id', $mission)->get();

                if($insert == null)
                {

                    DB::insert('insert into works_ons (mission_new_locations_id, id,created_at,updated_at) values (?,?,?,?)', array($mission_new_locations_id, $mission, date('Y-m-d H:i:s'), date('Y-m-d H:i:s')));
                }
                else
                {

                }
         }

        }
        return Redirect::to('analysis/manage/local');
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
//
//        dd($inputs);
        $mission_new_locations_id=$request->get('mission_new_locations_id');
        $location=$request->get('location_name') ;
        $severe_level=$request->get('severe_level');
        $situation=$request->get('situation');
        $victim_number=$request->get('victim_number');

//        DB::insert('insert into mission_new_locations (mission_list_id, location,severe_level,situation,victim_number,analysis_time) values (?,?,?,?,?,?)', array($mission_list_id, $location,$severe_level,$situation,$victim_number,date('Y-m-d H:i:s')));

        DB::table('mission_new_locations')->where('mission_new_locations_id',$mission_new_locations_id)->update(['location' => $location,'severe_level'=>$severe_level,'situation'=>$situation,'victim_number'=>$victim_number]);
        return Redirect::to('analysis/manage');
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
