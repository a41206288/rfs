<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;

class MissionController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{

        $mission_lists = DB::table('mission_lists')->get();



                $emtUsers = DB::table('users')
                    ->join('role_user','users.id','=','role_user.user_id')
                    ->select(DB::raw('count(*) as total'))
                    ->where('role_user.role_id','=',5)
                    ->groupBy('users.mission_list_id')
                    ->get();

                $relieverUsers = DB::table('users')
                    ->join('role_user','users.id','=','role_user.user_id')
                    ->select(DB::raw('count(*) as total'))
                    ->where('role_user.role_id','=',4)
                    ->groupBy('users.mission_list_id')
                    ->get();


        dd($relieverUsers);
        return view('manage_pages.mission_manage')->with('mission_lists', $mission_lists)->with('users', $users);
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
