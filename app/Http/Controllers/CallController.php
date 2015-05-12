<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CallController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        //讀取mission所有資料
        $missions = DB::table('missions')->orderBy('country_or_city_input')->orderBy('township_or_district_input')->orderBy('location')->get();

        //讀取縣市
        $country_or_city_inputs = DB::table('missions')->orderBy('country_or_city_input')->distinct()->lists('country_or_city_input');
        $country_or_city_inputs = array_add($country_or_city_inputs, '請選擇', '請選擇');
        //讀取鄉鎮區
        $township_or_district_inputs = DB::table('missions')->orderBy('township_or_district_input')->distinct()->lists('township_or_district_input');
        $township_or_district_inputs = array_add($township_or_district_inputs, '請選擇', '請選擇');
       // $country_or_cities = DB::table('missions')->select('country_or_city_input', 'country_or_city')->distinct()->get();

        //讀取任務列表
        $mission_names = DB::table('mission_lists')->orderBy('mission_name')->lists('mission_name');
        $mission_names = array_add($mission_names, '請選擇', '請選擇');
        return view('manage_pages.call_manage')->with('missions', $missions)
            ->with('country_or_city_inputs', $country_or_city_inputs)
            ->with('township_or_district_inputs', $township_or_district_inputs)
            ->with('mission_names', $mission_names);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return view('user_pages.call_input');
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
