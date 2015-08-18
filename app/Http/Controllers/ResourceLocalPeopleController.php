<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ResourceLocalPeopleController extends Controller {

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

			//取出該任務所有脫困組人員
			$relieverFreeUsers = DB::table('role_user')
				->join('users','users.id','=','role_user.user_id')
				->whereIn('role_id',array(5,6) )
				->where('mission_list_id', $mission_list_id)
				->orderBy('role_id')
				->get();
//            dd($relieverFreeUsers);

			//取出個地點的脫困組人員
			$relieverNewLocationUsers = DB::table('users')
				->join('role_user','users.id','=','role_user.user_id')
				->join('works_ons','users.id','=','works_ons.id')
				->whereIn('role_id',array(5,6) )
				->where('works_ons.mission_list_id', $mission_list_id)
				->orderBy('role_id')
				->get();
//            dd($relieverNewLocationUsers);

			//取出該任務的閒置脫困組人員
			$relieverFreeUsersArrays =[];
			foreach($relieverFreeUsers as $relieverFreeUser){
				$unfind = false;
				foreach($relieverNewLocationUsers as $relieverNewLocationUser){
					if($relieverFreeUser->user_id == $relieverNewLocationUser->user_id ) {
						$unfind = true;
					}
				}
				if( $unfind == false && $relieverFreeUser->arrived == 0) {
					$relieverFreeUsersArrays[$relieverFreeUser->id]['name'] = $relieverFreeUser->name;
					$relieverFreeUsersArrays[$relieverFreeUser->id]['id'] = $relieverFreeUser->id;
					$relieverFreeUsersArrays[$relieverFreeUser->id]['role_id'] = $relieverFreeUser->role_id;
					$relieverFreeUsersArrays[$relieverFreeUser->id]['email'] = $relieverFreeUser->email;
					$relieverFreeUsersArrays[$relieverFreeUser->id]['phone'] = $relieverFreeUser->phone;
					$relieverFreeUsersArrays[$relieverFreeUser->id]['skill'] = $relieverFreeUser->skill;
					$relieverFreeUsersArrays[$relieverFreeUser->id]['country_or_city_input'] = $relieverFreeUser->country_or_city_input;
					$relieverFreeUsersArrays[$relieverFreeUser->id]['township_or_district_input'] = $relieverFreeUser->township_or_district_input;
				}
			}
//            dd($relieverFreeUsersArrays);
		}else{
			$relieverFreeUsers = null;
			$relieverNewLocationUsers = null;
			$relieverFreeUsersArrays = null;
		}
        return view('manage_pages.people_manage_resource_l')
			->with('relieverFreeUsersArrays', $relieverFreeUsersArrays);
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
