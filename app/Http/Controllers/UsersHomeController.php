<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

use Carbon\Carbon;

class UsersHomeController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{

        //取出mission_list 按照 未分配任務->分配人員->執行中->任務完成 排序
        $mission_lists = DB::table('mission_lists')
            ->orderBy('mission_complete_time')
            ->orderBy('updated_at','desc')
            ->orderBy('arrive_location_time')
            ->orderBy('updated_at','desc')
            ->orderBy('assign_people_finish_time')
            ->orderBy('updated_at','desc')
            ->get();
//dd($mission_lists);

        //取出未分配任務
        $unsigned_missions = DB::table('missions')
            ->where('mission_list_id',1)
            ->orderBy('created_at')
            ->get();
//        dd($unsigned_missions);

        //取出各任務的通報內容 時間 負責人
        $mission_contents = DB::table('missions')
            ->get();
//dd($mission_contents);

        //讀取所有已分配任務
        $missions = DB::table('missions')
            ->where('mission_list_id','>',1)
            ->get();
//        dd($missions);

        $dates = DB::table('mission_lists')
            ->select('created_at')
            ->lists('created_at');

        foreach($dates as $index => $date){
            $temp = explode(" ", $dates[$index]);
            $dates[$index] = $temp[0];
        }
        $dates = array_unique($dates); //去除陣列重複值
        array_unshift($dates,'請選擇日期'); //在陣列最前面加上日期
//dd($dates);

        $mission_township = DB::table('missions')
            ->where('mission_list_id','>',1)
            ->orderBy('created_at')
            ->lists('township_or_district_input');
        $mission_township = array_unique($mission_township);
        array_unshift($mission_township,'選擇區');
//        dd($mission_township);

        $mission_road = DB::table('missions')
            ->select('township_or_district_input','rd_or_st_1','rd_or_st_2')
            ->where('mission_list_id','>',1)
            ->orderBy('township_or_district_input')
            ->get();
//                dd($mission_road);


        //
        $mission_contents_array =[];
        foreach($mission_contents as $mission_content){
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
            $mission_contents_array[$mission_content->mission_list_id][ $i]['created_at'] = $mission_content->created_at;
            $mission_contents_array[$mission_content->mission_list_id][ $i]['fname'] = $mission_content->fname;
            $mission_contents_array[$mission_content->mission_list_id][ $i]['lname'] = $mission_content->lname;
            $mission_contents_array[$mission_content->mission_list_id][ $i]['sex'] = $mission_content->sex;
            $mission_contents_array[$mission_content->mission_list_id][ $i]['township_or_district_input'] = $mission_content->township_or_district_input;
            $mission_contents_array[$mission_content->mission_list_id][ $i]['r1'] = $mission_content->rd_or_st_1;
            $mission_contents_array[$mission_content->mission_list_id][ $i]['r2'] = $mission_content->rd_or_st_2;
            $mission_contents_array[$mission_content->mission_list_id][ $i]['location'] = $mission_content->location;
        }

//        dd($mission_contents_array);

        //取出各任務的負責人資料
        $mission_list_charges = DB::table('mission_lists')
            ->join('users','users.id','=','mission_lists.id')
            ->get();
//        dd($mission_list_charges);



        $mission_list_charge_Arrays = [];
        foreach($mission_lists as $mission_list ){
            $unfind = false;
            foreach($mission_list_charges as $mission_list_charge){

                if($mission_list_charge->mission_list_id == $mission_list ->mission_list_id){
                    $unfind = true;
                    $mission_list_charge_Arrays[$mission_list->mission_list_id]['name'] = $mission_list_charge->user_name;

                }
            }
            if( $unfind == false ){
                $mission_list_charge_Arrays[$mission_list->mission_list_id]['name'] = "";
            }
        }
//        dd($mission_list_charge_Arrays);






        return view('user_pages.home')
            ->with('mission_lists', $mission_lists)
            ->with('mission_list_charge_Arrays', $mission_list_charge_Arrays)
            ->with('mission_contents_array', $mission_contents_array)
            ->with('unsigned_missions', $unsigned_missions)
            ->with('missions', $missions)
            ->with('dates', $dates)
            ->with('mission_township', $mission_township)
            ->with('mission_road', $mission_road)
            ;

//        return view('user_pages.home');
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
	public function update()
	{
        $date =Input::get( 'date' );
        $township =Input::get( 'township' );
        $street =Input::get( 'street' );
        $search =Input::get( 'search' );

        $missions = DB::table('missions')
            ->where('mission_list_id','>',1)
            ->get();
        //使用任務編號搜尋
        if($search != null){
            $get_mission_new_ids = DB::table('missions')
                ->select('created_at','mission_list_id','mission_id')
                ->get();
            $length = count($get_mission_new_ids);
//            $get_mission_new_id_array = array();
            $find_mission_list_id = 0;
            for($i=0; $i<$length; $i++){
                $id_string = "C".(new Carbon($get_mission_new_ids[$i]->created_at))->formatLocalized('%y%m%d%H%M').$get_mission_new_ids[$i]->mission_id;
                if($search == $id_string){
                    $find_mission_list_id = $get_mission_new_ids[$i]->mission_list_id;
                }
            }
            $mission_lists = DB::table('mission_lists')
                ->where('mission_list_id','>','1')
                ->where('mission_list_id',$find_mission_list_id)
                ->get();
        }
        //使用日期,地點搜尋
        else{
            $find_mission1 = DB::table('missions')->where('mission_list_id','>',1);
            if($street != "選擇路段"){
                $find_mission1 = $find_mission1->where('rd_or_st_1',$street);
            }
            if($township != "選擇區"){
                $find_mission1 = $find_mission1->where('township_or_district_input',$township);
            }
            $find_mission1 = $find_mission1->lists('mission_list_id');

            $find_mission2 = DB::table('missions')->where('mission_list_id','>',1);
            if($street != "選擇路段"){
                $find_mission2 = $find_mission2->where('rd_or_st_2',$street);
            }
            if($township != "選擇區"){
                $find_mission2 = $find_mission2->where('township_or_district_input',$township);
            }
            $find_mission2 = $find_mission2->lists('mission_list_id');

            $find_mission_list_id = array_merge($find_mission1,$find_mission2);
            $find_mission_list_id = array_unique($find_mission_list_id);


            if($date == "請選擇日期"){
                $date = "";
            }
            $mission_lists = DB::table('mission_lists')
                ->where('mission_list_id','>','1')
                ->where('created_at','like','%'.$date.'%');
            if($township != "選擇區" || $street != "選擇路段"){
                $mission_lists = $mission_lists->whereIn('mission_list_id', $find_mission_list_id);
            }
            $mission_lists = $mission_lists->get();
        }



        $response = array(
            'mission_lists' => $mission_lists,
            'missions' => $missions,
            'find_mission_list_id' => $find_mission_list_id
        );

        return $response;//$date."   ".$area."   ".$search
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
