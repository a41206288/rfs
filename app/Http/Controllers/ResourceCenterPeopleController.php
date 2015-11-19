<?php namespace App\Http\Controllers;

use App\Center_support_people_skill;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Mission_help_other;
use App\Mission_help_other_user;
use App\Mission_support_person;
use App\Role_skill;
use App\Skill;
use App\User;
use App\Works_on;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Kodeine\Acl\Models\Eloquent\Permission;
use Kodeine\Acl\Models\Eloquent\Role;

class ResourceCenterPeopleController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{

		$mission_lists = DB::table('mission_lists')
			->get();
//		dd($mission_lists);



		//應徵志工人員資料
		$center_support_person_details = DB::table('center_support_person_details')
			->join('center_support_people','center_support_people.center_support_person_id','=','center_support_person_details.center_support_person_id')
			->join('roles','roles.id','=','center_support_people.role_id')
			->get();
//		dd($center_support_person_details);

		//取出應徵志工人員資料有幾種種類
		$center_support_person_detail_roles = DB::table('center_support_person_details')
			->join('center_support_people','center_support_people.center_support_person_id','=','center_support_person_details.center_support_person_id')
			->join('roles','roles.id','=','center_support_people.role_id')
			->groupBy('description')
			->lists('description','description')
			;
		$center_support_person_detail_roles = array_add($center_support_person_detail_roles, '', '職位');
//				dd($center_support_person_detail_roles);


		//取出每個向民眾招募人員需求表有多少人應徵了 頁面地方會進行計算
		$center_support_person_details_array =[];
        foreach($center_support_person_details as $center_support_person_detail){
			$center_support_person_details_array[$center_support_person_detail->center_support_person_id][$center_support_person_detail->center_support_person_detail_id] = $center_support_person_detail->center_support_person_detail_name;
	  }
//	 dd($center_support_person_details_array);

		//向民眾招募人員需求表
		$center_support_people = DB::table('center_support_people')
			->join('roles','roles.id','=','center_support_people.role_id')
			->get();
//				dd($center_support_people);

		//取出向民眾招募人員需求表的技能
		$center_support_people_skills = DB::table('center_support_people_skills')
			->join('skills','skills.skill_id','=','center_support_people_skills.skill_id')
			->get();

		$center_support_people_skills_array = [];
		foreach($center_support_people_skills as $center_support_people_skill){
			$center_support_people_skills_array[$center_support_people_skill->center_support_person_id][$center_support_people_skill->skill_id] = $center_support_people_skill->skill_name;
		}

//		dd($center_support_people_skills_array);

		//取出所有技能
		$skills = DB::table('skills')
	->get();
//		dd($skills);


		//用以下兩陣列來判斷支援其他地方的救災人員是支援哪裡(配合$missionUsers) 讀取時再用mission_list來判斷名稱
		$user_help_missions = DB::table('mission_help_others')
			->join('mission_help_other_users','mission_help_other_users.mission_help_other_id','=','mission_help_others.mission_help_other_id')
//                ->join('mission_support_people','mission_support_people.mission_support_person_id','=','mission_help_others.mission_support_person_id')
			->get();
//        dd($user_help_missions);


		$help_missions_and_names = DB::table('mission_support_people')
			->join('mission_lists','mission_lists.mission_list_id','=','mission_support_people.mission_list_id')
//                ->join('mission_support_people','mission_support_people.mission_support_person_id','=','mission_help_others.mission_support_person_id')
			->get();
//        dd($help_missions_and_names);



		//計算中心待命的各種類人數
		$centerFreeUsers = DB::table('users')
			->join('role_user','users.id','=','role_user.user_id')
			->join('works_ons','works_ons.id','=','role_user.user_id')
			->join('roles','roles.id','=','role_user.role_id')
			->leftjoin('mission_help_other_users','mission_help_other_users.id','=','users.id')
			->where('mission_list_id','=',1)
            ->where('description','<>',"地方指揮官")
			->orderBy('arrive_mission')
            ->orderBy('status')
			->orderBy('role_id')
			->get();
//        dd($centerFreeUsers);

		//計算中心待命的人員種類
		$centerFreeUserRoles = DB::table('users')
			->join('role_user','users.id','=','role_user.user_id')
			->join('works_ons','works_ons.id','=','role_user.user_id')
			->join('roles','roles.id','=','role_user.role_id')
			->where('mission_list_id','=',1)
			->groupBy('role_id')
			->lists('description','description');
		$centerFreeUserRoles = array_add($centerFreeUserRoles, '', '全部');
		$centerFreeUserRoles = array_except($centerFreeUserRoles, array('地方指揮官', 'to', 'remove'));
//        dd($centerFreeUserRoles);

//		//計算中心待命的脫困組人數
//		$relieverFreeUsers = DB::table('users')
//			->join('role_user','users.id','=','role_user.user_id')
//			->join('works_ons','works_ons.id','=','role_user.user_id')
//			->where('mission_list_id','=',1)
//			->where('role_user.role_id','=',5)
//			->get();
////        dd($relieverFreeUsers);



//		//計算中心待命的醫療組人數
//		$emtFreeUsers = DB::table('users')
//			->join('role_user','users.id','=','role_user.user_id')
//			->join('works_ons','works_ons.id','=','role_user.user_id')
//			->where('mission_list_id','=',1)
//			->where('role_user.role_id','=',6)
//			->get();
////        dd($emtFreeUsers);


		//取出擁有增援列表的任務編號和名稱
		$mission_support_people_lists = DB::table('mission_support_people')
//                ->groupBy('mission_list_id')
			->join('mission_lists','mission_lists.mission_list_id','=','mission_support_people.mission_list_id')
			->select('mission_support_people.mission_list_id','mission_name')
//                ->where('mission_list_id', $mission_list_id)
			->distinct()
			->get();
//            dd($mission_support_people_lists);

		//取出尚未分配人員的任務
		$mission_lists_not_assign = DB::table('mission_lists')
			->select('mission_list_id','mission_name')
			->where('assign_people_finish_time', NULL)
			->where('mission_list_id', '!=' , 1)
			->distinct()
			->get();
//dd($mission_lists_not_assign);
		//將擁有增援列表的任務編號和名稱($mission_support_people_lists)存成lists形式 給下拉式選單用
		$mission_support_people_names = [];
		foreach($mission_support_people_lists as $mission_support_people_list){
			$mission_support_people_names[$mission_support_people_list->mission_list_id] = $mission_support_people_list->mission_name;
		}
		//將尚未分配人員的任務($mission_lists_not_assign)存成lists形式 給下拉式選單用
		foreach($mission_lists_not_assign as $mission_list_not_assign){
			$mission_support_people_names[$mission_list_not_assign->mission_list_id] = $mission_list_not_assign->mission_name;
		}
		$mission_support_people_names  = array_add($mission_support_people_names, '', '將志工分配至現有任務');
//            dd($mission_support_people_names);

		//計算向中央要求總增援數用
		$mission_support_people = DB::table('mission_support_people')
			->join('roles','roles.id','=','mission_support_people.id')
//                ->where('mission_list_id', $mission_list_id)

			->get();

		//取出所有人員種類
		$roles = DB::table('roles')->get();
//        dd($roles);

//取出不在向民眾招募人員需求表裡的種類 (下拉式選單用)
        $role_of_work = DB::table('roles');

			foreach($center_support_people as $center_support_person){
				$role_of_work = $role_of_work->where('Name','!=',$center_support_person->name);
			}
			$role_of_work = $role_of_work->where('Name','!=','Administrator');
            $role_of_work = $role_of_work->where('Name','!=','center');
            $role_of_work = $role_of_work->where('Name','!=','Local');
            $role_of_work = $role_of_work->where('Name','!=','Resource');
            $role_of_work = $role_of_work->lists('description','id');
        $role_of_work = array_add($role_of_work,'','職位');
//        dd($role_of_work);



		$mission_support_people_array =[];
		foreach($mission_support_people as $mission_support_person){
			if(!isset($mission_support_people_array[$mission_support_person->mission_list_id]))
			{
				$i=1;
			}
			else
			{
				$i=count($mission_support_people_array[$mission_support_person->mission_list_id])+1;
			}

			$mission_support_people_array[$mission_support_person->mission_list_id][ $i]['mission_support_person_id'] = $mission_support_person->mission_support_person_id;
//			$mission_support_people_array[$mission_support_person->mission_list_id][ $i]['mission_list_id'] = $mission_support_person->mission_list_id;
			$mission_support_people_array[$mission_support_person->mission_list_id][ $i]['role'] = $mission_support_person->description;
			$mission_support_people_array[$mission_support_person->mission_list_id][ $i]['mission_support_people_num'] = $mission_support_person->mission_support_people_num;
                $mission_support_people_array[$mission_support_person->mission_list_id][ $i]['mission_support_people_reason'] = $mission_support_person->mission_support_people_reason;

		}
//		dd($mission_support_people_array);


		//取出哪個地點支援哪個地點的表
		$mission_help_others = DB::table('mission_help_others')
			->join('mission_lists','mission_lists.mission_list_id','=','mission_help_others.mission_list_id')
			->where('mission_help_other_finish_time', NULL)
//                    ->where('arrived',0)
			->get();
//dd($mission_help_others);
		$mission_help_other_array =[];
		foreach($mission_help_others as $mission_help_other){
			if(!isset($mission_help_other_array[$mission_help_other->mission_support_person_id]))
			{
				$i=1;
			}
			else
			{
				$i=count($mission_help_other_array[$mission_help_other->mission_support_person_id])+1;
			}
			$mission_help_other_array[$mission_help_other->mission_support_person_id][ $i]['mission_help_other_id'] = $mission_help_other->mission_help_other_id;
			$mission_help_other_array[$mission_help_other->mission_support_person_id][ $i]['mission_name'] = $mission_help_other->mission_name;
			$mission_help_other_array[$mission_help_other->mission_support_person_id][ $i]['mission_list_id'] = $mission_help_other->mission_list_id;

//                $mission_help_other_array[$mission_help_other->mission_support_person_id][ $i]['mission_help_other_num'] = $mission_help_other->mission_help_other_num;
		}

		//取出哪個地點支援哪個地點的表包含哪些人
		$mission_help_other_users = DB::table('mission_help_other_users')
			->join('works_ons','works_ons.id','=','mission_help_other_users.id')
			->get();
//            dd($mission_help_other_users);
		$mission_help_other_users_array = [];
		foreach($mission_help_other_users as $mission_help_other_user){
			if( $mission_help_other_user->arrive_mission != 1){
				$mission_help_other_users_array[$mission_help_other_user->mission_help_other_id][$mission_help_other_user->mission_list_id ][$mission_help_other_user->id ] = $mission_help_other_user->arrive_mission;
			}

		}

		//儲存各任務救災人員人數
		$missionUserArrays =[];
		$missionUsers = [];


		foreach($roles as $role ){
			$missionUsers[$role->id] = DB::table('users')
				->join('role_user','users.id','=','role_user.user_id')
				->join('roles','roles.id','=','role_user.role_id')
				->join('works_ons','works_ons.id','=','role_user.user_id')
				->select('mission_list_id','slug',DB::raw('count(*) as total'))
				->where('role_user.role_id','=',$role->id)
				->where('status','=','閒置')
				->groupBy('mission_list_id')
				->get();
		}
//dd($missionUsers);

		foreach($mission_lists as $mission_list ){
			foreach($roles as $role){
				foreach($missionUsers[$role->id] as $missionUser){
					if($mission_list->mission_list_id == $missionUser ->mission_list_id){
						$missionUserArrays[$missionUser->mission_list_id][$missionUser->slug] = $missionUser->total;
					}
				}
			}
		}

//		dd($missionUserArrays);



//		//計算各任務脫困組人數
//		$relieverUsers = DB::table('users')
//			->join('role_user','users.id','=','role_user.user_id')
//			->join('roles','roles.id','=','role_user.role_id')
//			->join('works_ons','works_ons.id','=','role_user.user_id')
//			->select('mission_list_id','slug',DB::raw('count(*) as total'))
//			->where('role_user.role_id','=',5)
//			->where('status','=','閒置')
//			->groupBy('mission_list_id')
//			->get();
////        dd($relieverUsers);

//		$relieverUsersArrays = [];
//		foreach($mission_lists as $mission_list ){
//			$unfind = false;
//			$slug = "";
//				foreach($relieverUsers as $relieverUser){
//
//					if($mission_list->mission_list_id == $relieverUser ->mission_list_id){
//						$unfind = true;
//						$relieverUsersArrays[$relieverUser->mission_list_id] = $relieverUser->total;
//						$missionUserArrays[$relieverUser->mission_list_id][$relieverUser->slug] = $relieverUser->total;
//					}
//					if($unfind == false){
//						$slug = $relieverUser->slug;
//					}
//				}
//				if( $unfind == false ){
//					$relieverUsersArrays[$mission_list->mission_list_id] = 0;
//					$missionUserArrays[$mission_list->mission_list_id][$slug] = 0;
//				}
//		}


//        $relieverUsersArrays =[];
//        foreach($relieverUsers as $relieverUser){
//            $relieverUsersArrays[$relieverUser->mission_list_id] = $relieverUser->total;
//            $missionUserArrays[$relieverUser->mission_list_id][$relieverUser->slug] = $relieverUser->total;
//        }
//        dd($relieverUsersArrays);
//        dd($missionUserArrays);



//		//讀取任務列表
//		$mission_names = DB::table('mission_support_people')
//			->join('mission_lists','mission_lists.mission_list_id','=','mission_support_people.mission_list_id')
//			->orderBy('mission_name')
//			->where('mission_support_people.mission_list_id', '>' , 1)
//			->lists('mission_name','mission_name');
//		$mission_names = array_add($mission_names, '-', '-');
////dd($mission_names);


//		//讀取權限列表
//		$roles = DB::table('roles')
//			->lists('description','name');
//		$roles = array_add($roles, '請選擇', '請選擇');
//		$roles = array_except($roles, array('Administrator', 'to', 'remove'));
//		$roles = array_except($roles, array('Center', 'to', 'remove'));
//		$roles = array_except($roles, array('Masses', 'to', 'remove'));
////dd($roles);
		$users = DB::table('users')
			->select('id', 'user_name')
			->get();
        return view('manage_pages.people_manage_resource_c')
			->with('mission_lists', $mission_lists)
			->with('center_support_person_details', $center_support_person_details)
			->with('center_support_people', $center_support_people)
//			->with('relieverFreeUsers', $relieverFreeUsers)
//			->with('emtFreeUsers', $emtFreeUsers)
			->with('mission_support_people', $mission_support_people)
//			->with('mission_names', $mission_names)
			->with('roles', $roles)
            ->with('role_of_work', $role_of_work)
			->with('center_support_person_details_array', $center_support_person_details_array)
			->with('center_support_person_detail_roles', $center_support_person_detail_roles)
			->with('centerFreeUsers', $centerFreeUsers)
			->with('centerFreeUserRoles', $centerFreeUserRoles)
			->with('mission_support_people_lists', $mission_support_people_lists)
			->with('mission_support_people_array', $mission_support_people_array)
			->with('mission_support_people_names', $mission_support_people_names)
			->with('missionUserArrays', $missionUserArrays)
			->with('center_support_people_skills_array', $center_support_people_skills_array)
			->with('skills', $skills)
			->with('users', $users)
			->with('mission_help_other_array', $mission_help_other_array)
			->with('mission_help_other_users_array', $mission_help_other_users_array)
			->with('user_help_missions', $user_help_missions)
			->with('help_missions_and_names', $help_missions_and_names)


	;
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create(Request $request)//新增新的招募志工單
	{
        $inputs=$request->except('_token');
        dd($inputs);

        return redirect()->route('resourcePanel');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)// 更改人員狀態 + 調派人員
	{
        $inputs=$request->except('_token');
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
            //判斷任務是初始配員還是需求增員
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
//                    dd($mission_support_people);
                   //拿出該增援的所有支援
                    $mission_help_others = DB::table('mission_help_others')
                                           ->join('mission_help_other_users','mission_help_others.mission_help_other_id','=','mission_help_other_users.mission_help_other_id')
                                           ->where('mission_support_person_id',$mission_support_person[0]->mission_support_person_id)->get();
                    //算出此增援還需要多少支援人員
                    $mission_support_people_require_num = $mission_support_person[0]->mission_support_people_num - count($mission_help_others);
//                    dd($mission_support_people_require_num);
                    if($mission_support_person != null && $mission_support_people_require_num != 0)
                    {
                        //查詢我方是否已經有支援該增源
                        $mission_help_other = DB::table('mission_help_others')->where('mission_support_person_id',$mission_support_person[0]->mission_support_person_id)->where('mission_list_id',$mission_list_id)->get();
//                        dd($mission_help_other);
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
//                    dd("等於0");
                }
            }
            else//初始配員
            {
                foreach($user_ids as $user_id)
                {
                    DB::table('works_ons')->where('id',$user_id)->update(['mission_list_id' => $mission_list_id_other]);
                }
            }

        }
        elseif($status == "" && $mission_list_id_other == "")//錄取人員報到
        {

            foreach($user_ids as $user_id)
            {

            }
        }
        return redirect()->route('resourcePanel');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show(Request $request) //動態更新table
	{
        $arrived = $request->get('arrived');
        $roles = $request->get('roles');

        if(isset($arrived)){
            $response = DB::table('users');
            $response = $response->join('role_user','users.id','=','role_user.user_id');
            $response = $response->join('works_ons','works_ons.id','=','role_user.user_id');
            $response = $response->join('roles','roles.id','=','role_user.role_id');
            $response = $response->where('mission_list_id','=',1);
            $response = $response->where('roles.id','>',4);

            if($roles != ""){
                $response = $response->where('description','like','%'.$roles.'%');
            }

            $response = $response->where('arrived',$arrived);
            $response = $response->orderBy('role_id');
             $response = $response->get();
        }
        else{
            $response = DB::table('center_support_person_details');
            $response = $response->join('center_support_people','center_support_people.center_support_person_id','=','center_support_person_details.center_support_person_id');
            $response = $response ->join('roles','roles.id','=','center_support_people.role_id');

            if($roles != ""){
                $response = $response->where('description','like','%'.$roles.'%');
            }

            $response = $response->get();

        }




        return response()->json($response);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit(Request $request) //修改招募志工人數
	{
        $inputs=$request->except('_token');
//        dd($inputs);
        if(isset($inputs))
        {
            foreach($inputs as $key=>$value)
            {
                DB::table('center_support_people')->where('center_support_person_id',$key)->update(['center_support_person_num' => $value]);
            }
        }
        return redirect()->route('resourcePanel');
	}
//    /**
//     * Show the form for editing the specified resource.
//     *
//     * @param  int  $id
//     * @return Response
//     */
//    public function editSkill(Request $request) //修改技能
//    {
//        $inputs=$request->except('_token');
//        $center_support_people_id=$request->input('center_support_people_id');
//        $new_skills=$request->input('skills');
//
//
//        $old_skills=DB::table('center_support_people_skills')
//            ->where('center_support_person_id',$center_support_people_id)
//            ->lists('skill_id');
////        dd(in_array($old_skills[0],$new_skills) );
//
//        foreach($new_skills as $new_skill){
//            if(in_array(intval($new_skill),$old_skills) == false){
//                $center_support_people_skills = new Center_support_people_skill();
//                $center_support_people_skills->center_support_person_id = $center_support_people_id;
//                $center_support_people_skills->skill_id = $new_skill;
//                $center_support_people_skills->save();
//            }
//        }
//        foreach($old_skills as $old_skill){
//            if(in_array($old_skill,$new_skills) == false){
//                DB::table('center_support_people_skills')
//                    ->where('center_support_person_id',$center_support_people_id)
//                    ->where('skill_id',$old_skill)
//                    ->delete();
//            }
//        }
//
//        return redirect()->route('resourcePanel');
//
//    }

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request)//錄取志工
	{
//        $inputs=$request->except('_token');
//        dd($inputs);

        $center_support_person_detail_ids=$request->input('center_support_person_detail_ids');
        if(isset($center_support_person_detail_ids))
        {
            foreach($center_support_person_detail_ids as $center_support_person_detail_id){
//                $user_id = DB::table('users')->select(DB::raw('count(*) as total'))->get();
//                $user_id = $user_id[0]->total + 1;
                $center_support_person_detail = DB::table('center_support_person_details')->where('center_support_person_detail_id',$center_support_person_detail_id)->get();
//            dd($center_support_person_detail[0]);
                $user = new User();
//                $user->id = $user_id;
                $user->user_name = $center_support_person_detail[0]->center_support_person_detail_name;
                $user->email = $center_support_person_detail[0]->email;
                $user->password =Hash::make ('1234');
                $user->phone = $center_support_person_detail[0]->phone;
                $user->country_or_city_input = $center_support_person_detail[0]->country_or_city_input;
                $user->township_or_district_input = $center_support_person_detail[0]->township_or_district_input;
                $user->arrived = 0;
                $user->save();

                $user_id = DB::table('users')->where('email',$center_support_person_detail[0]->email)->get();
                $user_id = $user_id[0]->id;
                $center_support_person_role = DB::table('center_support_people')->select('id')->where('center_support_person_id',$center_support_person_detail[0]->center_support_person_id)->get();
//                dd($center_support_person_role);
                $user  = User::where('id', '=', $user_id)->first();
                $role = Permission::where('id', '=',$center_support_person_role[0]->id)->first();
                $user->assignRole($role);
                $user->save();

                $Works_on = new Works_on();
                $Works_on->id = $user_id;
                $Works_on->mission_list_id = 1;
//                $Works_on->status = '執行任務';
                $Works_on->save();

                DB::table('center_support_person_details')->where('center_support_person_detail_id',$center_support_person_detail_id)->delete();
            }
        }

        return redirect()->route('resourcePanel');
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
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function creatSkill(Request $request) //新增技能
    {
        $inputs=$request->except('_token');
//        dd($inputs);
        $skill=$request->input('skill');
        $Skill= new Skill();
        $Skill->skill_name = $skill;
        $Skill->save();

        return redirect()->route('resourcePanel');

    }
    public function creatRole(Request $request) //新增職業
    {
        $inputs=$request->except('_token');
//        dd($inputs);
        $role_name=$request->input('role_name');
        $skills=$request->input('skills');

        // 建立新的 role
        $role = new Role();
		$createRole = $role->create([
			'name' => $role_name,
			'slug' => $role_name,
			'description' => $role_name
		]);

		$permission = new Permission();
		$permRole = $permission->create([
			'name'        => $role_name,
			'slug'        => [          // pass an array of permissions.
				'create'     => true,
				'view'       => true,
				'update'     => true,
				'delete'     => true,
				'view.phone' => true
			],
			'description' => $role_name
		]);

		$createRole->assignPermission($permRole);


		//建立 role skill
		$role_id = Permission::where('name', '=', $role_name)->first();
		foreach($skills as $key => $value){
			$role_skills = new Role_skill();
			$role_skills->role_id = $role_id->id;
			$role_skills->skill_id = $value;
			$role_skills->save();
		}

        return redirect()->route('resourcePanel');

    }

}
