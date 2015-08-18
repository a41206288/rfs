<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
class RelieverReportController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{$mission_list_id=Auth::user()->mission_list_id;
//        dd(Auth::user());
		if($mission_list_id != 1) {
			$local_reports = DB::table('local_reports')
				->join('users','users.id','=','local_reports.id')
				->orderBy('local_reports.created_at')
				->where('local_reports.mission_list_id', $mission_list_id)
				->get();
//			dd($local_reports);

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
				$local_reports_arrays[$local_report->mission_new_locations_id][$i]['name'] = $local_report->name;
			}
//         dd($local_reports_arrays);

			$mission_new_locations =  DB::table('mission_new_locations')
				->leftJoin('users', function($join)
				{
					$join->on('users.id', '=', 'mission_new_locations.id');
				})
//				->join('users','users.id','=','mission_new_locations.id')
				->where('mission_new_locations.mission_list_id', $mission_list_id)
				->orderBy('analysis_time')
				->get();
//            dd($mission_new_locations);

			//將新地點的要求增援人數(包括醫療跟脫困)和原因分類
			$executiveRequireArrays =[];
			foreach($mission_new_locations as $mission_new_location){

				//如果$executiveRequireArrays 為空 設定第一筆讀到的mission_new_locations_id的第一筆回報的數量為1
				if(!isset($executiveRequireArrays[$mission_new_location->mission_new_locations_id]))
				{
					$i=1;
				}
				else
				{
					// 設定第二次以上讀到的mission_new_locations_id的接下來的回報數量+1
					$i=count($executiveRequireArrays[$mission_new_location->mission_new_locations_id])+1;
				}
				$executiveRequireArrays[$mission_new_location->mission_new_locations_id][$i]['executive_require_people_num'] = $mission_new_location->executive_require_people_num;
				$executiveRequireArrays[$mission_new_location->mission_new_locations_id][$i]['executive_require_reason'] = $mission_new_location->executive_require_reason;
				$executiveRequireArrays[$mission_new_location->mission_new_locations_id][$i]['updated_at'] = $mission_new_location->updated_at;
				$executiveRequireArrays[$mission_new_location->mission_new_locations_id][$i]['name'] = $mission_new_location->name;
			}
//            dd($executiveRequireArrays);


			//取出個地點的脫困組人員個數
			$relieverNewLocationUserAmounts = DB::table('users')
				->join('role_user','users.id','=','role_user.user_id')
				->join('works_ons','users.id','=','works_ons.id')
				->select('mission_new_locations_id',DB::raw('count(*) as total'))
				->where('role_id','=',5 )
				->where('works_ons.mission_list_id', $mission_list_id)
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
			$local_reports_arrays = null;
			$executiveRequireArrays = null;
			$mission_new_locations = null;
			$relieverNewLocationUserAmounts = null;
			$relieverNewLocationUserAmountsArrays = null;
		}
        return view('manage_pages.report_reliever')
			->with('local_reports_arrays', $local_reports_arrays)
			->with('mission_new_locations', $mission_new_locations)
			->with('executiveRequireArrays', $executiveRequireArrays)
			->with('relieverNewLocationUserAmountsArrays', $relieverNewLocationUserAmountsArrays);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{

        return Redirect::to('report/reliever');
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
	public function update($id)
	{
		//
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
