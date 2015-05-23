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
        $missions = DB::table('missions')->orderBy('country_or_city_input')->orderBy('township_or_district_input')->orderBy('location')->where('mission_list_id', 1)->get();

        //讀取縣市
        $country_or_city_inputs = DB::table('missions')->orderBy('country_or_city_input')->where('mission_list_id', 1)->distinct()->lists('country_or_city_input','country_or_city_input');
        $country_or_city_inputs = array_add($country_or_city_inputs, '請選擇', '請選擇');
//        $new_country_or_city_inputs=[];
//        foreach( $country_or_city_inputs as  $country_or_city_input){
//            $new_country_or_city_inputs[$country_or_city_input] = $country_or_city_input;
//        }
//        $new_country_or_city_inputs = array_add($new_country_or_city_inputs, '請選擇', '請選擇');

        ///讀取鄉鎮區
        $new_township_or_district_inputs=[];
        $new_township_or_district_inputs = array_add($new_township_or_district_inputs, '請選擇', '請選擇');
        //讀取任務列表
        $mission_names = DB::table('mission_lists')->orderBy('mission_name')->where('mission_list_id', '>' , 1)->lists('mission_name','mission_list_id');
        $mission_names = array_add($mission_names, '請選擇', '請選擇');
        $users_name = DB::table('users')->orderBy('id')->lists('name');

        return view('manage_pages.call_manage')->with('missions', $missions)
            ->with('country_or_city_inputs', $country_or_city_inputs)
            ->with('township_or_district_inputs', $new_township_or_district_inputs)
            ->with('mission_names', $mission_names)
            ->with('users_name', $users_name);
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
	public function store(Request $request)
	{

        $inputs=$request->except('_token');
        $missions_index = DB::table('missions')->select('mission_id')->where('mission_list_id', 1)->get();

        //dd($inputs);
        foreach($missions_index as $mission)
        {
//            dd($mission->mission_id);
            if(isset($inputs[$mission->mission_id]) && $inputs[$mission->mission_id]!='請選擇')
            {

                DB::table('missions')->where('mission_id', $mission->mission_id)->update(['mission_list_id' => $inputs[$mission->mission_id]]);

            }
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


        $country =$request->input('country');
        $township = $request->input('township');
//dd( $country);
        if($country!='請選擇' && $township=='請選擇')
        {
            $request->flashOnly('country');
            //讀取mission所有資料
            $missions = DB::table('missions')->orderBy('country_or_city_input')->orderBy('township_or_district_input')->orderBy('location')->where('mission_list_id', 1)->where('country_or_city_input', $country)->get();

        }
        if($country!='請選擇' && $township!='請選擇')
        {
            $request->flashOnly('country');
            //讀取mission所有資料
            $missions = DB::table('missions')->orderBy('country_or_city_input')->orderBy('township_or_district_input')->orderBy('location')->where('mission_list_id', 1)->where('country_or_city_input', $country)->where('township_or_district_input', $township)->get();

        }
        if($country=='請選擇')
        {

            $missions = DB::table('missions')->orderBy('country_or_city_input')->orderBy('township_or_district_input')->orderBy('location')->where('mission_list_id', 1)->get();
//            dd( $missions);
        }
        //讀取縣市
        $country_or_city_inputs = DB::table('missions')->orderBy('country_or_city_input')->where('mission_list_id', 1)->distinct()->lists('country_or_city_input','country_or_city_input');
//        $new_country_or_city_inputs=[];
//        foreach( $country_or_city_inputs as  $country_or_city_input){
//            $new_country_or_city_inputs[$country_or_city_input] = $country_or_city_input;
//        }
//        $new_country_or_city_inputs = array_add($new_country_or_city_inputs, '請選擇', '請選擇');
        $country_or_city_inputs = array_add($country_or_city_inputs, '請選擇', '請選擇');

        //讀取鄉鎮區
        if($country!='請選擇')
        {
            $township_or_district_inputs = DB::table('missions')->orderBy('township_or_district_input')->where('mission_list_id', 1)->where('country_or_city_input', $country)->distinct()->lists('township_or_district_input','township_or_district_input');
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
        $mission_names = DB::table('mission_lists')->orderBy('mission_name')->where('mission_list_id', '>' , 1)->lists('mission_name','mission_list_id');
        $mission_names = array_add($mission_names, '請選擇', '請選擇');

        $users_name = DB::table('users')->select('name')->get();
        return view('manage_pages.call_manage')->with('missions', $missions)
            ->with('country_or_city_inputs', $country_or_city_inputs)
            ->with('township_or_district_inputs',  $township_or_district_inputs)
            ->with('mission_names', $mission_names)
            ->with('users_name',$users_name);
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
