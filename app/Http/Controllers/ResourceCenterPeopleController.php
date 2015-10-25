<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ResourceCenterPeopleController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//應徵志工人員資料
		$center_support_person_details = DB::table('center_support_person_details')
			->join('center_support_people','center_support_people.center_support_person_id','=','center_support_person_details.center_support_person_id')
			->join('roles','roles.id','=','center_support_people.id')
			->get();
//		dd($center_support_person_details);


//		$center_support_person_details = DB::table('center_support_person_details')
//			->join('center_support_people','center_support_people.center_support_person_id','=','center_support_person_details.center_support_person_id')
//			->join('roles','roles.id','=','center_support_people.id')
//			->distinct()
//			->lists('description','center_support_person_detail_id');

		//取出每個向民眾招募人員需求表有多少人應徵了 頁面地方會進行計算
		$center_support_person_details_array =[];
        foreach($center_support_person_details as $center_support_person_detail){
			$center_support_person_details_array[$center_support_person_detail->center_support_person_id][$center_support_person_detail->center_support_person_detail_id] = $center_support_person_detail->center_support_person_detail_name;
	  }
//	 dd($center_support_person_details_array);

		//向民眾招募人員需求表
		$center_support_people = DB::table('center_support_people')
			->join('roles','roles.id','=','center_support_people.id')
			->get();
//				dd($center_support_people);

		//計算中心待命的脫困組人數
		$relieverFreeUsers = DB::table('users')
			->join('role_user','users.id','=','role_user.user_id')
			->join('works_ons','works_ons.id','=','role_user.user_id')
			->where('mission_list_id','=',1)
			->where('role_user.role_id','=',5)
			->get();
//        dd($relieverFreeUsers);

		//計算中心待命的醫療組人數
		$emtFreeUsers = DB::table('users')
			->join('role_user','users.id','=','role_user.user_id')
			->join('works_ons','works_ons.id','=','role_user.user_id')
			->where('mission_list_id','=',1)
			->where('role_user.role_id','=',6)
			->get();
//        dd($emtFreeUsers);

		$mission_support_people = DB::table('mission_support_people')
			->join('mission_lists','mission_lists.mission_list_id','=','mission_support_people.mission_list_id')
			->orderBy('mission_support_people.created_at','desc')
			->get();
//		dd($mission_support_people);


		//讀取任務列表
		$mission_names = DB::table('mission_support_people')
			->join('mission_lists','mission_lists.mission_list_id','=','mission_support_people.mission_list_id')
			->orderBy('mission_name')
			->where('mission_support_people.mission_list_id', '>' , 1)
			->lists('mission_name','mission_name');
		$mission_names = array_add($mission_names, '-', '-');
//dd($mission_names);

		//讀取任務列表
		$mission_names = DB::table('mission_support_people')
			->join('mission_lists','mission_lists.mission_list_id','=','mission_support_people.mission_list_id')
			->orderBy('mission_name')
			->where('mission_support_people.mission_list_id', '>' , 1)
			->lists('mission_name','mission_name');
		$mission_names = array_add($mission_names, '-', '-');
//dd($mission_names);

		//讀取權限列表
		$roles = DB::table('roles')
			->lists('description','name');
		$roles = array_add($roles, '請選擇', '請選擇');
		$roles = array_except($roles, array('Administrator', 'to', 'remove'));
		$roles = array_except($roles, array('Center', 'to', 'remove'));
		$roles = array_except($roles, array('Masses', 'to', 'remove'));
//dd($roles);

        return view('manage_pages.people_manage_resource_c')
			->with('center_support_person_details', $center_support_person_details)
			->with('center_support_people', $center_support_people)
			->with('relieverFreeUsers', $relieverFreeUsers)
			->with('emtFreeUsers', $emtFreeUsers)
			->with('mission_support_people', $mission_support_people)
			->with('mission_names', $mission_names)
			->with('roles', $roles)
			->with('center_support_person_details_array', $center_support_person_details_array)
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
