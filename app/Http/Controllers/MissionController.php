<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Kodeine\Acl\Traits\HasRole;

use App\Mission_list;

class MissionController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{

                $mission_lists = DB::table('mission_lists')->get();

                //暫時取出任務編號為7的通報所有內容
                $mission_contents = DB::table('missions')
                //    ->groupBy('mission_list_id')
                //->where('mission_list_id','=','7')
                ->get();
//dd($mission_contents);

        $mission_first_content = DB::table('missions')
            ->groupBy('mission_list_id')
            ->get();

//        $mission_first_content_array =[];
//        foreach($mission_first_content as $mission_content){
//            $mission_first_content_array[$mission_content->mission_list_id."id"] = $mission_content->mission_id;
//            $mission_first_content_array[$mission_content->mission_list_id."content"] = $mission_content->mission_content;
//        }
        //dd($mission_first_content_array);
        $mission_contents_array =[];

        //$i = 1;
        foreach($mission_contents as $mission_content){
//            dd(array_first($mission_contents_array, function($k, $v) {return $k == 1;}, 1));
//            $first = array_first($mission_contents_array, function($k, $v) {return $k == 1;},0);
//            dd($first);
                if(!isset($mission_contents_array[$mission_content->mission_list_id]))
                {
                    $i=1;
                }
            else
            {
                $i=count($mission_contents_array[$mission_content->mission_list_id])+1;
            }

            $mission_contents_array[$mission_content->mission_list_id][ $i]['id'] = $mission_content->mission_id;
            $mission_contents_array[$mission_content->mission_list_id][ $i]['content'] = $mission_content->mission_content;
            //$i++;

        }
        //$mission_contents_array = array_dot($mission_contents_array);
        //dd($mission_contents_array);
                 //取出各任務的負責人資料
                $mission_list_charges = DB::table('users')
                    ->join('role_user','users.id','=','role_user.user_id')
                    ->select('mission_list_id','name','email','phone')
                    ->where('role_user.role_id','=',3)
                    ->get();

//        foreach($mission_list_charges as $mission_list_charge){
//            $mission_contents_array[$mission_list_charge->mission_list_id."name"] = $mission_list_charge->name;
//            $mission_contents_array[$mission_list_charge->mission_list_id."email"] = $mission_list_charge->email;
//            $mission_contents_array[$mission_list_charge->mission_list_id."phone"] = $mission_list_charge->phone;
//        }
//dd($mission_contents_array);
                $mission_list_charge_Array =[];
                foreach($mission_list_charges as $mission_list_charge){
                    $mission_list_charge_Array[$mission_list_charge->mission_list_id."name"] = $mission_list_charge->name;
                    $mission_list_charge_Array[$mission_list_charge->mission_list_id."email"] = $mission_list_charge->email;
                    $mission_list_charge_Array[$mission_list_charge->mission_list_id."phone"] = $mission_list_charge->phone;
                }
//dd($mission_list_charge_Array);

                //計算各任務醫療人員人數
                $emtUsers = DB::table('users')
                    ->join('role_user','users.id','=','role_user.user_id')
                    ->select('mission_list_id',DB::raw('count(*) as total'))
                    ->where('role_user.role_id','=',6)
                    ->groupBy('users.mission_list_id')
                    ->get();

                $emtUsersArrays =[];
                foreach($emtUsers as $emtUser){
                    $emtUsersArrays[$emtUser->mission_list_id] = $emtUser->total;
                }
//dd($emtUsersArray);


                //計算各任務脫困人員總人數(未分配+已分配)
                $relieverUsers = DB::table('users')
                    ->join('role_user','users.id','=','role_user.user_id')
                    ->select('mission_list_id',DB::raw('count(*) as total'))
                    ->where('role_user.role_id','=',5)
                    ->groupBy('users.mission_list_id')
                    ->get();

                $relieverUsersArrays =[];
                foreach($relieverUsers as $relieverUser){
                    $relieverUsersArrays[$relieverUser->mission_list_id] = $relieverUser->total;
                }
//        dd($relieverUsersArray);


        //計算未分配個數的脫困組人數
        $relieverFreeUsers = DB::table('users')
            ->join('role_user','users.id','=','role_user.user_id')
            ->select(DB::raw('count(*) as total'))
            ->where('mission_list_id','=',1)
            ->where('role_user.role_id','=',5)
            ->get();
//        dd($relieverFreeUsers);
        //計算未分配個數的醫療組人數
        $emtFreeUsers = DB::table('users')
            ->join('role_user','users.id','=','role_user.user_id')
            ->select(DB::raw('count(*) as total'))
            ->where('mission_list_id','=',1)
            ->where('role_user.role_id','=',6)
            ->get();
//        dd($emtFreeUsers);

//取出所有現場資料
        $mission_new_locations =  DB::table('mission_new_locations')
            ->orderBy('analysis_time')
            ->get();
//dd($mission_new_locations);
        $mission_new_location_Arrays =[];
        foreach($mission_new_locations as $mission_new_location){

            //$mission_new_location_Arrays 為空 設定第一筆讀到的mission_new_locations_id的第一筆回報的數量為1
            if(!isset($mission_new_location_Arrays[$mission_new_location->mission_list_id]))
            {
                $i=1;
            }
            else
            {
                // 設定第二次以上讀到的mission_new_locations_id的接下來的回報數量+1
                $i=count($mission_new_location_Arrays[$mission_new_location->mission_list_id])+1;
            }

            $mission_new_location_Arrays[$mission_new_location->mission_list_id][$i]['mission_new_locations_id'] = $mission_new_location->mission_new_locations_id;
            $mission_new_location_Arrays[$mission_new_location->mission_list_id][$i]['location'] = $mission_new_location->location;
        }
//dd($mission_new_location_Arrays);

        //計算現場個數
        $mission_new_location_amounts =  DB::table('mission_new_locations')
            ->select('mission_list_id',DB::raw('count(*) as total'))
            ->orderBy('mission_list_id')
            ->get();
//        dd($mission_new_locations);

        $mission_new_location_amount_arrays = [];
        foreach($mission_lists as $mission_list ){
            $unfind = false;
            foreach($mission_new_location_amounts as $mission_new_location_amount){

                if($mission_new_location_amount->mission_list_id == $mission_list ->mission_list_id){
                    $unfind = true;
                    $mission_new_location_amount_arrays[$mission_list->mission_list_id]['total'] = $mission_new_location_amount->total;

                }
            }
            if( $unfind == false ){
                $mission_new_location_amount_arrays[$mission_list->mission_list_id]['total'] = 0;
            }
        }
//        dd($mission_new_location_amount_arrays);


        $reports = DB::table('reports')->get();


        $reports_array =[];
        foreach($reports as $report){

            if(!isset($reports_array[$report->mission_list_id]))
            {
                $i=1;
            }
            else
            {
                $i=count($reports_array[$report->mission_list_id])+1;
            }

            $reports_array[$report->mission_list_id][$i]['content'] = $report->report_content;
            $reports_array[$report->mission_list_id][$i]['time'] = $report->created_at;
        }
//         dd($reports_array);


        //取出取出需求增員人數(醫療+脫困)
      $mission_support_people = DB::table('mission_support_people')->get();
        //dd($mission_support_people);

        $mission_support_people_Array =[];
        foreach($mission_support_people as $mission_support_person){
            $mission_support_people_Array[$mission_support_person->mission_list_id."emt_num"] = $mission_support_person->emt_num;
            $mission_support_people_Array[$mission_support_person->mission_list_id."reliever_num"] = $mission_support_person->reliever_num;
            $mission_support_people_Array[$mission_support_person->mission_list_id."created_at"] = $mission_support_person->created_at;
        }
//dd($mission_support_people_Array );

        $mission_support_products = DB::table('mission_support_products')->get();
        //dd($mission_support_people);

        $mission_support_product_Array =[];
        foreach($mission_support_products as $mission_support_product){
            $mission_support_product_Array[$mission_support_product->mission_list_id."id"] = $mission_support_product->mission_list_id;
            $mission_support_product_Array[$mission_support_product->mission_list_id."amount"] = $mission_support_product->amount;
            $mission_support_product_Array[$mission_support_product->mission_list_id."created_at"] = $mission_support_product->created_at;
        }
        //dd($mission_support_product_Array);

                //計算總通報個數
                $mission_totals = DB::table('missions')
                ->select('mission_list_id',DB::raw('count(*) as total'))
                ->groupBy('mission_list_id')
                ->get();
//                dd($missions_total);
                 $mission_total_Arrays =[];
                foreach($mission_totals as $mission_total){
                    $mission_total_Arrays[$mission_total->mission_list_id] = $mission_total->total;
                }
//                        dd($mission_total_Arrays);

                //計算已完成通報個數
                $complete_missions = DB::table('missions')
                ->select('mission_list_id',DB::raw('count(*) as total'))
                ->where('mission_list_id','!=',1)
                ->where('complete_time','!=','NULL')
                ->groupBy('mission_list_id')
                ->get();

                //計算各任務達成率
                $achievement_array = [];
                foreach($mission_totals as $mission ){
                    $unfind = false;
                    foreach($complete_missions as $complete_mission){

                        if($mission->mission_list_id == $complete_mission ->mission_list_id){
                            $unfind = true;
                            $achievement_array[$mission->mission_list_id] = 'width: '.round(($complete_mission->total/$mission->total)*100) ."%";
                            $achievement_array[$mission->mission_list_id."word"] = round(($complete_mission->total/$mission->total)*100) ."%";
                        }
                    }
                if( $unfind == false ){
                        $achievement_array[$mission->mission_list_id] = 'width: 0%';
                        $achievement_array[$mission->mission_list_id."word"] = '0%';
                    }
                }


        return view('manage_pages.mission_manage')
            ->with('mission_lists', $mission_lists)
            ->with('mission_total_Arrays', $mission_total_Arrays)
            ->with('emtUsersArrays', $emtUsersArrays)
            ->with('relieverUsersArrays', $relieverUsersArrays)
            ->with('mission_new_location_Arrays', $mission_new_location_Arrays)
            ->with('mission_new_location_amount_arrays', $mission_new_location_amount_arrays)
            ->with('relieverFreeUsers', $relieverFreeUsers)
            ->with('emtFreeUsers', $emtFreeUsers)
            ->with('reports_array', $reports_array)
            //->with('mission_list_reports', $mission_list_reports)
            ->with('achievement_array', $achievement_array)
            ->with('mission_list_charge_Array', $mission_list_charge_Array)
            ->with('mission_contents', $mission_contents)
            ->with('mission_contents_array', $mission_contents_array)
            ->with('mission_support_people_Array', $mission_support_people_Array)
            ->with('mission_support_product_Array', $mission_support_product_Array);
           // ->with('mission_first_content_array', $mission_first_content_array);

	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create(Request $request)
	{
        
        $mission_list_name =$request->input('mission_list_name');
        $leader = $request->input('leader');
//        dd($mission_list_name);
        $mission_list = new Mission_list;
        $mission_list->mission_name = $mission_list_name;
        $mission_list->save();
        return redirect()->route('administratorPanel');
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
    public function auto_complete(Request $request){


        $mission_leader_name = $request->input('leader');
//        dd($mission_leader_name);
        $results = array();

        $queries = DB::table('users')
            ->where('name', 'LIKE', '%'.$mission_leader_name.'%')
            ->orWhere('id', 'LIKE', '%'.$mission_leader_name.'%')
            ->take(5)->get();
//        dd($queries);
        foreach ($queries as $query)
        {
            $results[] = [ 'id' => $query->id, 'value' => $query->name ];
        }
        return Response::json($results);
    }
}
