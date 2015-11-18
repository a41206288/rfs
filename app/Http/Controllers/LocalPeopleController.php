<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Mission_help_other;
use App\Mission_help_other_user;
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
    public function store(Request $request)// 更改人員狀態 + 調派人員 + 報到
    {
//        $inputs=$request->except('_token');
//        dd($inputs);
        $status = $request->get('status');
        $mission_list_id= $request->get('mission_list_id');
        $mission_list_id_other = $request->get('mission_list_id_other');
        $user_ids = $request->get('user_ids');
        if($status != "" && $mission_list_id_other == "")//更改狀態
        {
            foreach($user_ids as $user_id)
            {
                DB::table('works_ons')->where('id',$user_id)->update(['status' => $status]);
            }
        }
        elseif($status == "" && $mission_list_id_other != "")//調派至其他任務 (works_on) (支援單  支援人員)
        {
//            判斷任務是初始配員還是需求增員
            $assign_people_finish = DB::table('mission_lists')->where('mission_list_id',$mission_list_id_other)->where('assign_people_finish_time','<>','null')->get();
            if($assign_people_finish != null)//需求增員
            {
                foreach($user_ids as $user_id)
                {
                    //該人員的職業
                    $role = DB::table('role_user')->where('user_id',$user_id)->get();
                    $role = $role[0]->role_id;
                    //判斷是否有此增援
                    $mission_support_person = DB::table('mission_support_people')->where('mission_list_id',$mission_list_id_other)->where('id',$role)->get();
                    //拿出該增援的所有支援
                    if($mission_support_person !=null)
                    {
                        $mission_help_others = DB::table('mission_help_others')
                            ->join('mission_help_other_users','mission_help_others.mission_help_other_id','=','mission_help_other_users.mission_help_other_id')
                            ->where('mission_support_person_id',$mission_support_person[0]->mission_support_person_id)->get();
                        //算出此增援還需要多少支援人員
                        $mission_support_people_require_num = $mission_support_person[0]->mission_support_people_num - count($mission_help_others);
                        if($mission_support_person != null && $mission_support_people_require_num != 0)
                        {
                            //查詢我方是否已經有支援該增源
                            $mission_help_other = DB::table('mission_help_others')->where('mission_support_person_id',$mission_support_person[0]->mission_support_person_id)->where('mission_list_id',$mission_list_id)->get();
                            if($mission_help_other == null)//建支援表
                            {
                                $mission_help_other = new Mission_help_other();
                                $mission_help_other->mission_support_person_id = $mission_support_person[0]->mission_support_person_id;
                                $mission_help_other->mission_list_id = $mission_list_id;
                                $mission_help_other->save();
                                $mission_help_other = DB::table('mission_help_others')->where('mission_support_person_id',$mission_support_person[0]->mission_support_person_id)->where('mission_list_id',$mission_list_id)->get();
                            }
                            //建支援人
                            $mission_help_other_users = new Mission_help_other_user();
                            $mission_help_other_users->mission_help_other_id = $mission_help_other[0]->mission_help_other_id;
                            $mission_help_other_users->id = $user_id;
                            $mission_help_other_users->arrive_mission = 0 ;
                            $mission_help_other_users->save();
                        }
                    }
                }
            }
//            else//初始配員
//            {
//                foreach($user_ids as $user_id)
//                {
//                    DB::table('works_ons')->where('id',$user_id)->update(['mission_list_id' => $mission_list_id_other]);
//                }
//            }
        }
        elseif($status == "" && $mission_list_id_other == "")//增援人員報到
        {


            $missionUsers = DB::table('users')
                ->join('role_user','users.id','=','role_user.user_id')
                ->join('roles','roles.id','=','role_user.role_id')
                ->join('works_ons','works_ons.id','=','role_user.user_id')
                ->leftjoin('mission_help_other_users','mission_help_other_users.id','=','users.id')
                ->whereIn('user_id',$user_ids)
                ->where('arrive_mission', 0)
                ->orderBy('arrive_mission')
                ->orderBy('status')
                ->orderBy('role_id')
                ->get();

            foreach($missionUsers as $missionUser)
            {
                //更改work_on
                DB::table('works_ons')->where('id',$missionUser->user_id)->update(['mission_list_id' => $mission_list_id,'status' =>'閒置']);
                //更改支援人員狀態為已到達
                DB::table('mission_help_other_users')->where('mission_help_other_user_id',$missionUser->mission_help_other_user_id)->update(['arrive_mission' => 1]);
                //更改增援人員需求總數
                $mission_help_other = DB::table('mission_help_others')->where('mission_help_other_id',$missionUser->mission_help_other_id)->get();
                $mission_support_people_num = DB::table('mission_support_people')->select('mission_support_people_num')->where('mission_support_person_id',$mission_help_other[0]->mission_support_person_id)->get();
//        dd($mission_support_people_num[0]->mission_support_people_num);
                $mission_support_people_num = $mission_support_people_num[0]->mission_support_people_num -1;
                DB::table('mission_support_people')->where('mission_support_person_id',$mission_help_other[0]->mission_support_person_id)->update(['mission_support_people_num' =>$mission_support_people_num]);
                //如果支援單人員都已經到達 紀錄完成時間

//        計算mission_help_others 的人員是否都已經到了
                $all_arrived = DB::table('mission_help_other_users')
                    ->where('mission_help_other_id',$missionUser->mission_help_other_id)
                    ->where('arrive_mission',0)
                    ->get();
//dd($all_arrived);
                if($all_arrived == NULL)
                {
                    DB::table('mission_help_others')->where('mission_help_other_id',$missionUser->mission_help_other_id)->update(['mission_help_other_finish_time' =>date('Y-m-d H:i:s') ]);
                }
            }
        }
        return redirect()->route('localPanel');
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
	public function update(Request $request)//增援人員報到
	{
//        $inputs=$request->except('_token');
//        dd($inputs);


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
