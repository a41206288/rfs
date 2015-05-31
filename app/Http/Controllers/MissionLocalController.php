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
      //dd(Auth::user()->mission_list_id);
        $missions_list_id=Auth::user()->mission_list_id;
        //讀取mission所有資料
        $missions = DB::table('missions')
            ->orderBy('country_or_city_input')
            ->orderBy('township_or_district_input')
            ->orderBy('location')
            ->where('mission_list_id', $missions_list_id)
            ->get();

        //讀取縣市
        $country_or_city_inputs = DB::table('missions')
            ->orderBy('country_or_city_input')
            ->where('mission_list_id', $missions_list_id)
            ->distinct()
            ->lists('country_or_city_input','country_or_city_input');
        $country_or_city_inputs = array_add($country_or_city_inputs, '請選擇', '請選擇');
//        $new_country_or_city_inputs=[];
//        foreach( $country_or_city_inputs as  $country_or_city_input){
//            $new_country_or_city_inputs[$country_or_city_input] = $country_or_city_input;
//        }
//        $new_country_or_city_inputs = array_add($new_country_or_city_inputs, '請選擇', '請選擇');

        ///讀取鄉鎮區
        $new_township_or_district_inputs=[];
        $new_township_or_district_inputs = array_add($new_township_or_district_inputs, '請選擇', '請選擇');

        //讀取通報
        $reports = DB::table('reports')
            ->where('mission_list_id', $missions_list_id)
            ->get();

//        $reportsArray =[];
//        foreach($reports as $report){
//            $reportsArray[$report->mission_list_id] = $report->$report_content;
//        }
        dd($reports);

        return view('manage_pages.mission_manage_local')
            ->with('missions', $missions)
            ->with('country_or_city_inputs', $country_or_city_inputs)
            ->with('township_or_district_inputs', $new_township_or_district_inputs)
            ->with('reports', $reports);
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
