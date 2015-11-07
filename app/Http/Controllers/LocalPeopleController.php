<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class LocalPeopleController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
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
	public function edit(Request $request)
	{
        $inputs=$request->except('_token');
        dd($inputs);
        return redirect()->route('localPanel');
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
//        dd($inputs);
        $mission_list_id =  $request->input('mission_list_id');
        $user_id =  $request->input('user_id');
        $mission_help_other_user_id =  $request->input('mission_help_other_user_id');
        $mission_help_other_id =  $request->input('mission_help_other_id');
//        DB::table('works_ons')->where('id',$user_id)->update(['mission_list_id' => $mission_list_id,'status' =>'閒置']);
//        DB::table('mission_help_other_users')->where('mission_help_other_user_id',$mission_help_other_user_id)->update(['arrive_mission' => 1]);
        $mission_help_other = DB::table('mission_help_others')->where('mission_help_other_id',$mission_help_other_id)->get();
        $mission_support_people_num = DB::table('mission_support_people')->select('mission_support_people_num')->where('mission_support_person_id',$mission_help_other[0]->mission_support_person_id)->get();
        dd($mission_support_people_num[0]->mission_support_people_num);
        $mission_support_people_num = $mission_support_people_num[0]->mission_support_people_num -1;
        if($mission_support_people_num == 0)
        {
            DB::table('mission_support_people')->where('mission_support_person_id',$mission_help_other[0]->mission_support_person_id)->update(['mission_support_people_num' =>$mission_support_people_num ,'mission_help_other_finish_time' => date('Y-m-d H:i:s')]);
        }
        else
        {
            DB::table('mission_support_people')->where('mission_support_person_id',$mission_help_other[0]->mission_support_person_id)->update(['mission_support_people_num' =>$mission_support_people_num]);
        }



        return redirect()->route('localPanel');
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
