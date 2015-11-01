<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

use App\Mission;
use Carbon\Carbon;

class UsersCallController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $email_users = DB::table('users')->where('email','<>','null')->lists('email');
        $email_support = DB::table('center_support_person_details')->where('email','<>','null')->lists('email');
        $email_missions = DB::table('missions')->where('email','<>','null')->lists('email');
        $send_email = array_merge($email_users, $email_support);
        $send_email = array_merge($send_email, $email_missions);
//        dd($send_email);

        return view('user_pages.call_input')->with('email', $send_email);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        $township =Input::get( 'township' );
        $street1 =Input::get( 'street1' );
        $street2 =Input::get( 'street2' );
        $adressDetail =Input::get( 'adressDetail' );
        $remark =Input::get( 'remark' );
        $lname =Input::get( 'lname' );
        $fname =Input::get( 'fname' );
        $sex =Input::get( 'sex' );
        $phone =Input::get( 'phone' );
        $email =Input::get( 'email' );
//        dd($township."\n".$street1."\n".$street2."\n".$adressDetail."\n".$remark."\n".$lname."\n".$fname."\n".$sex."\n".$phone."\n".$email);
        if($street1 == "選擇路段"){
            $street1 = NULL;
        }
        if($street2 == "選擇路段"){
            $street2 = NULL;
        }

        $create_time = date('Y-m-d H:i:s');
        $missions = new Mission;
        $missions->mission_content = $remark;
        $missions->lname = $lname;
        $missions->fname = $fname;
        $missions->sex = $sex;
        $missions->phone = $phone;
        $missions->email = $email;
        $missions->township_or_district_input = $township;
        $missions->rd_or_st_1 = $street1;
        $missions->rd_or_st_2 = $street2;
        $missions->location = $adressDetail;
        $missions->mission_list_id = 1;
        $missions->created_at = $create_time;
        $missions->updated_at = $create_time;
        $missions->save();

        $find_mission_id = DB::table('missions')
            ->where('created_at',$create_time)
            ->where('lname',$lname)
            ->where('sex',$sex)
            ->get();
//        dd($find_mission_id);
        $send_string1 = "向我們提供災情最新情況";
        $send_string2 = "【C".(new Carbon($find_mission_id[0]->created_at))->formatLocalized('%y%m%d%H%M').$find_mission_id[0]->mission_id;
        $send_string2 = $send_string2."】為您剛才通報的編號，您可以使用此編號在首頁查詢通報的處理情況";

        return view('user_pages.submit_success')
            ->with('string',$send_string1)
            ->with('mission_id_string',$send_string2);
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
