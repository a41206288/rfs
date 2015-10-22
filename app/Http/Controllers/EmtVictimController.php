<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Victim_detail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class EmtVictimController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
            //Ū��victim�Ҧ����
            $victim_details = DB::table('victim_details')
                ->get();
         return view('manage_pages.victim_EMT')
             ->with('victim_details', $victim_details);
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
        $name =$request->input('name');
        $sex =$request->input('sex');
        $age =$request->input('age');
        $person_id =$request->input('person_id');
        $phone = $request->input('phone');
        $address = $request->input('address');
        $damage_level = $request->input('damage_level');
        $damage_detail = $request->input('damage_detail');
        $now_location = $request->input('now_location');
        $disposal = $request->input('disposal');

        $victim_details = new Victim_detail();
        $victim_details->name = $name;
        $victim_details->sex = $sex;
        $victim_details->age = $age;
        $victim_details->person_id = $person_id;
        $victim_details->phone = $phone;
        $victim_details->address = $address;
        $victim_details->damage_level = $damage_level;
        $victim_details->damage_detail = $damage_detail;
        $victim_details->now_location = $now_location;
        $victim_details->disposal = $disposal;
        $victim_details->created_at = date('Y-m-d H:i:s');
        $victim_details->updated_at = date('Y-m-d H:i:s');
        $victim_details->save();

        return Redirect::to('victim/EMT');
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
        $name =$request->input('name');
        $sex =$request->input('sex');
        $age =$request->input('age');
        $person_id =$request->input('person_id');
        $phone = $request->input('phone');
        $address = $request->input('address');
        $damage_level = $request->input('damage_level');
        $damage_detail = $request->input('damage_detail');
        $now_location = $request->input('now_location');
        $disposal = $request->input('disposal');
        $victim_detail_id = $request->input('victim_detail_id');


        $victim_details = Victim_detail::where('victim_detail_id',$victim_detail_id)->first();

        $victim_details->name = $name;
        $victim_details->sex = $sex;
        $victim_details->age = $age;
        $victim_details->person_id = $person_id;
        $victim_details->phone = $phone;
        $victim_details->address = $address;
        $victim_details->damage_level = $damage_level;
        $victim_details->damage_detail = $damage_detail;
        $victim_details->now_location = $now_location;
        $victim_details->disposal = $disposal;
        $victim_details->updated_at = date('Y-m-d H:i:s');
//            dd($victim_details);
        $victim_details->save();

        return Redirect::to('victim/EMT');
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
//         dd($inputs);
//        $name =Input::get( 'name' );
        $sex =Input::get( 'sex' );
//        $age =Input::get( 'age' );
//        $person_id =Input::get( 'person_id' );
//        $phone =Input::get( 'phone' );
//        $address =Input::get( 'address' );


        $victim_details = DB::table('victim_details');

//        if($name != ""){
//            $victim_details = $victim_details->where('name','like','%'.$name.'%');
//            //$victim_details = $victim_details->get();
//
//        }
//        if($age != ""){
//            $victim_details = $victim_details->where('age',$age);
//            //$victim_details = $victim_details->get();
//        }
        if($sex != ""){
            $victim_details = $victim_details->where('sex',$sex);
            //$victim_details = $victim_details->get();
        }
//        if($person_id != ""){
//            $victim_details = $victim_details->where('person_id',$person_id);
//            //$victim_details = $victim_details->get();
//        }
//        if($phone != ""){
//            $victim_details = $victim_details->where('phone',$phone);
//            //$victim_details = $victim_details->get();
//        }
//        if($address != ""){
//            $victim_details = $victim_details->where('address',$address);
//            //$victim_details = $victim_details->get();
//        }
        $victim_details = $victim_details->get();
        //dd($victim_details);


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
