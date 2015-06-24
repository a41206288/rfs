<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
class AnalysisController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $mission_list_id=Auth::user()->mission_list_id;
        if($mission_list_id != 1) {

            //讀取mission_list 名稱
            $mission_list_names = DB::table('mission_lists')
                ->select('mission_name','mission_list_id')
                ->where('mission_list_id', $mission_list_id)
                ->get();
//            dd($mission_list_names);

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


        }else{
            $mission_list_names = null;
            $missions = null;
            $mission_new_locations = null;
        }
//dd($missions);
        return view('manage_pages.analysis_manage')
            ->with('mission_list_names', $mission_list_names)
            ->with('missions', $missions)
            ->with('mission_new_locations', $mission_new_locations);

	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create(Request $request)
	{

        $location=$request->get('location_name') ;
        $severe_level=$request->get('severe_level');
        $situation=$request->get('situation');
        $victim_number=$request->get('victim_number');

        $mission_list_id=Auth::user()->mission_list_id;
        DB::insert('insert into mission_new_locations (mission_list_id, location,severe_level,situation,victim_number,analysis_time) values (?,?,?,?,?,?)', array($mission_list_id, $location,$severe_level,$situation,$victim_number,date('Y-m-d H:i:s')));
        return Redirect::to('analysis/manage');
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
        $mission_list_id=Auth::user()->mission_list_id;
        if($mission_list_id != 1) {

            $mission_list_names = DB::table('mission_lists')
                ->select('mission_name','mission_list_id')
                ->where('mission_list_id', $mission_list_id)
                ->get();
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

            //取出個地點的脫困組人員
            $relieverNewLocationUsers = DB::table('users')
                ->join('role_user','users.id','=','role_user.user_id')
                ->join('works_ons','users.id','=','works_ons.id')
                ->where('role_id','=',5 )
                ->where('mission_list_id', $mission_list_id)
                ->get();
//            dd($relieverNewLocationUsers);

            //將個地點的脫困組人員依地點分類
            $relieverNewLocationUsersArray =[];
            foreach($relieverNewLocationUsers as $relieverNewLocationUser){
                $relieverNewLocationUsersArray[$relieverNewLocationUser->mission_new_locations_id][$relieverNewLocationUser->id]['name'] = $relieverNewLocationUser->name;
            }
//            dd($relieverNewLocationUsersArray);

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

        }else{
            $mission_list_names = null;
            $missions = null;
            $mission_new_locations = null;

        }
        return view('manage_pages.analysis_manage_local')
            ->with('mission_list_names', $mission_list_names)
            ->with('missions', $missions)
            ->with('mission_new_locations', $mission_new_locations)
            ->with('relieverNewLocationUsersArray', $relieverNewLocationUsersArray)
            ->with('relieverFreeUsersArray', $relieverFreeUsersArray);
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
        $inputs=$request->except('_token');
        dd($inputs);
        $location=$request->get('location_name') ;
        $severe_level=$request->get('severe_level');
        $situation=$request->get('situation');
        $victim_number=$request->get('victim_number');

//        DB::insert('insert into mission_new_locations (mission_list_id, location,severe_level,situation,victim_number,analysis_time) values (?,?,?,?,?,?)', array($mission_list_id, $location,$severe_level,$situation,$victim_number,date('Y-m-d H:i:s')));

//        DB::table('missions')->where('mission_id', $mission->mission_id)->update(['mission_list_id' => $inputs[$mission->mission_id]]);
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
