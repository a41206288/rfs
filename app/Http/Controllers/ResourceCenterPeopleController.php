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
		$center_support_person_details = DB::table('center_support_person_details')
			->join('center_support_people','center_support_people.center_support_person_id','=','center_support_person_details.center_support_person_id')
			->get();
//		dd($center_support_person_details);

		$center_support_people = DB::table('center_support_people')->get();

		//計算中心待命的脫困組人數
		$relieverFreeUsers = DB::table('users')
			->join('role_user','users.id','=','role_user.user_id')
			->where('mission_list_id','=',1)
			->where('role_user.role_id','=',5)
			->get();
//        dd($relieverFreeUsers);

		//計算中心待命的醫療組人數
		$emtFreeUsers = DB::table('users')
			->join('role_user','users.id','=','role_user.user_id')
			->where('mission_list_id','=',1)
			->where('role_user.role_id','=',6)
			->get();
//        dd($emtFreeUsers);

		$mission_support_people = DB::table('mission_support_people')
			->orderBy('created_at','desc')
			->get();

        return view('manage_pages.people_manage_resource_c')
			->with('center_support_person_details', $center_support_person_details)
			->with('center_support_people', $center_support_people)
			->with('relieverFreeUsers', $relieverFreeUsers)
			->with('emtFreeUsers', $emtFreeUsers)
			->with('mission_support_people', $mission_support_people);
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
