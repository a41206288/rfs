<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Mission_support_person;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Modify;

class LocalPeopleSupportController extends Controller {

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
	public function create(Request $request)
	{
//        $inputs=$request->except('_token');
//        dd($inputs);
        $mission_support_people_id =  $request->input('mission_support_people_id');
        $mission_support_people_num =  $request->input('mission_support_people_num');
        $mission_support_people_reason =  $request->input('mission_support_people_reason');
        $mission_list_id = $request->input('mission_list_id');
//        dd($mission_list_id);


        if(isset($mission_support_people_id) && $mission_support_people_id != "")
        {
            $mission_support_people = DB::table('mission_support_people')
                ->where('mission_list_id',$mission_list_id)
                ->where('id',$mission_support_people_id)
                ->get();
//            dd($mission_support_people);
            if($mission_support_people != NULL)
            {
                    DB::table('mission_support_people')
                    ->where('mission_list_id',$mission_list_id)
                    ->where('id',$mission_support_people_id)
                    ->update(['mission_support_people_num' => $mission_support_people_num ,
                        'mission_support_people_reason' => $mission_support_people_reason]);
            }
            else
            {
                $mission_support_people = new Mission_support_person;
                $mission_support_people->mission_list_id = $mission_list_id ;
                $mission_support_people->id = $mission_support_people_id;
                $mission_support_people->mission_support_people_num = $mission_support_people_num;
                $mission_support_people->mission_support_people_reason = $mission_support_people_reason;
                $mission_support_people->save();
            }

        }
        return redirect()->route('localPanel');
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
//        $inputs=$request->except('_token');
//        dd($inputs);
        $mission_help_other_id =  $request->input('mission_help_other_id');
        DB::table('mission_help_others')
            ->where('mission_help_other_id',$mission_help_other_id)
            ->update(['arrived' => 1]);
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
