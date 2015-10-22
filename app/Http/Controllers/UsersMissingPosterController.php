<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class UsersMissingPosterController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//Ū��victim�Ҧ����
		$victim_details = DB::table('victim_details')
			->orderBy('created_at')
			->get();
        return view('user_pages.missing_poster_input')
			->with('victim_details', $victim_details);
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
	public function show()
	{
		return 'nice work!!';
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
	public function update()
	{
        //$inputs=$request->except('_token');
        //
        // dd($inputs);
        $name =Input::get( 'name' );
        $sex =Input::get( 'sex' );
        $age =Input::get( 'age' );
        $person_id =Input::get( 'person_id' );
        $phone =Input::get( 'phone' );
        $address =Input::get( 'address' );


		$victim_details = DB::table('victim_details');

			if($name != ""){
				$victim_details = $victim_details->where('name','like','%'.$name.'%');
//				$victim_details = $victim_details->get();

			}
			if($age != ""){
				$victim_details = $victim_details->where('age',$age);
//				$victim_details = $victim_details->get();
			}
			if($sex != ""){
				$victim_details = $victim_details->where('sex',$sex);
//				$victim_details = $victim_details->get();
			}
			if($person_id != ""){
				$victim_details = $victim_details->where('person_id',$person_id);
//				$victim_details = $victim_details->get();
			}
			if($phone != ""){
				$victim_details = $victim_details->where('phone',$phone);
//				$victim_details = $victim_details->get();
			}
			if($address != ""){
				$victim_details = $victim_details->where('address',$address);
//				$victim_details = $victim_details->get();
			}
		$victim_details = $victim_details->get();
//		dd($victim_details);


        return response()->json($victim_details);
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
