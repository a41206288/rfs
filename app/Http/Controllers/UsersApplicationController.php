<?php namespace App\Http\Controllers;

use App\Center_support_person_detail;
use App\Center_support_person_detail_skill;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsersApplicationController extends Controller {


    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $center_support_people = DB::table('center_support_people')->get();
        $skill = DB::table('skills')->get();
        $center_support_people_skills = DB::table('center_support_people_skills')->get();
        $email_users = DB::table('users')->where('email','<>','null')->lists('email');
        $email_support = DB::table('center_support_person_details')->where('email','<>','null')->lists('email');
        $email_missions = DB::table('missions')->where('email','<>','null')->lists('email');
        $send_email = array_merge($email_users, $email_support);
        $send_email = array_merge($send_email, $email_missions);
//        dd($send_email);

        return view('user_pages.application_input')
            ->with('center_support_people', $center_support_people)
            ->with('skills', $skill)
            ->with('center_support_people_skills', $center_support_people_skills)
            ->with('email', $send_email);
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
        $phone = $request->input('phone');
        $email = $request->input('email');
        $country_or_city = $request->input('country_or_city');
        $township_or_district = $request->input('township_or_district');
        $center_support_person_id = $request->input('center_support_person_id');
        $skills = $request->input('submitskill');

//dd($skills);

        $create_time = date('Y-m-d H:i:s');
        $center_support_person_details = new Center_support_person_detail();
        $center_support_person_details->center_support_person_detail_name = $name;
        $center_support_person_details->phone = $phone;
        $center_support_person_details->email = $email;
        $center_support_person_details->center_support_person_id = $center_support_person_id;
        $center_support_person_details->skill = $skills;
        $center_support_person_details->country_or_city_input = $country_or_city;
        $center_support_person_details->township_or_district_input = $township_or_district;
        $center_support_person_details->created_at = $create_time;
        $center_support_person_details->updated_at = $create_time;
        $center_support_person_details->save();

        $temp = DB::table('center_support_person_details')
            ->where('created_at',$create_time)
            ->where('center_support_person_detail_name',$name)
            ->get();
//        dd($temp[0]->center_support_person_detail_id);

        $skill_array = explode(",",$skills);
//        dd($skill_array);
        $length = count($skill_array);
        for($i=0;$i<$length;$i++){
            $center_support_person_detail_skills = new Center_support_person_detail_skill();
            $center_support_person_detail_skills->skill_id = $skill_array[$i];
            $center_support_person_detail_skills->center_support_person_detail_id = $temp[0]->center_support_person_detail_id;
            $center_support_person_detail_skills->created_at = $create_time;
            $center_support_person_detail_skills->updated_at = $create_time;
            $center_support_person_detail_skills->save();
        }


        return view('user_pages.submit_success')->with('string',"來信應徵，日後將會通知您救災的地點");
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
