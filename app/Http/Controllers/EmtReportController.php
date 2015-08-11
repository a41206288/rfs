<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
class EmtReportController extends Controller {

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
			$executiveRequireArrays = null;
			$local_reports_arrays = null;
		}
        return view('manage_pages.report_EMT')
			->with('local_reports_arrays', $local_reports_arrays);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return Redirect::to('report/EMT');
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
