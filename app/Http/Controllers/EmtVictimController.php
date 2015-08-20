<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class EmtVictimController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        return view('manage_pages.victim_EMT');//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create(Request $request)
	{
//        $input=$request->except('_token');
//        dd( $input);


        $lname =$request->input('lname');
        $fname =$request->input('fname');
        $sex =$request->input('sex');
        $age =$request->input('age');
        $person_id =$request->input('person_id');
        $phone = $request->input('phone');
        $address = $request->input('address');
        $damage_level = $request->input('damage_level');
        $damage_detail = $request->input('damage_detail');
        $now_location = $request->input('now_location');
        $disposal = $request->input('disposal');



        $center_support_person_details = new Center_support_person_detail();
        $center_support_person_details->center_support_person_detail_name = $name;
        $center_support_person_details->phone = $phone;
        $center_support_person_details->email = $email;
        $center_support_person_details->center_support_person_id = $center_support_person_id;
        $center_support_person_details->skill = $skill;
        $center_support_person_details->country_or_city_input = $country_or_city;
        $center_support_person_details->township_or_district_input = $township_or_district;
        $center_support_person_details->save();
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
