<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ResourceCenterProductController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//取出各地方庫存數
		$local_safe_amounts = DB::table('local_safe_amounts')
//			->leftJoin('mission_support_products', function($join)
//			{
//				$join
//					->on('mission_support_products.mission_list_id', '=', 'local_safe_amounts.mission_list_id')
//					->on('mission_support_products.product_total_amount_id', '=', 'local_safe_amounts.product_total_amount_id');
//			})
//			->join('mission_support_products','mission_support_products.mission_list_id','=','local_safe_amounts.mission_list_id')
//			->join('mission_support_products','mission_support_products.product_total_amount_id','=','local_safe_amounts.product_total_amount_id')
			->join('product_total_amounts','product_total_amounts.product_total_amount_id','=','local_safe_amounts.product_total_amount_id')
//			->orderBy('local_safe_amounts.mission_list_id')
			->get();
//dd($local_safe_amounts);

		$mission_support_products = DB::table('mission_support_products')->get();

		$local_safe_amount_and_support_product_arrays = [];
		foreach($local_safe_amounts as $local_safe_amount ){
			$unfind = false;
			foreach($mission_support_products as $mission_support_product){

				if($mission_support_product->mission_list_id == $local_safe_amount ->mission_list_id
				&& $mission_support_product->product_total_amount_id == $local_safe_amount ->product_total_amount_id){
					$unfind = true;
					$local_safe_amount_and_support_product_arrays[$local_safe_amount->local_safe_amount_id]['mission_list_id'] = $local_safe_amount->mission_list_id;
					$local_safe_amount_and_support_product_arrays[$local_safe_amount->local_safe_amount_id]['product_total_amount_id'] = $local_safe_amount->product_total_amount_id;
					$local_safe_amount_and_support_product_arrays[$local_safe_amount->local_safe_amount_id]['amount'] = $local_safe_amount->amount;
					$local_safe_amount_and_support_product_arrays[$local_safe_amount->local_safe_amount_id]['product_name'] = $local_safe_amount->product_name;
					$local_safe_amount_and_support_product_arrays[$local_safe_amount->local_safe_amount_id]['safe_amount'] = $local_safe_amount->safe_amount;
					$local_safe_amount_and_support_product_arrays[$local_safe_amount->local_safe_amount_id]['unit'] = $local_safe_amount->unit;
					$local_safe_amount_and_support_product_arrays[$local_safe_amount->local_safe_amount_id]['center_assign_product_amount'] = $mission_support_product->center_assign_product_amount;

				}
			}
			if( $unfind == false ){
				$local_safe_amount_and_support_product_arrays[$local_safe_amount->local_safe_amount_id]['mission_list_id'] = $local_safe_amount->mission_list_id;
				$local_safe_amount_and_support_product_arrays[$local_safe_amount->local_safe_amount_id]['product_total_amount_id'] = $local_safe_amount->product_total_amount_id;
				$local_safe_amount_and_support_product_arrays[$local_safe_amount->local_safe_amount_id]['amount'] = $local_safe_amount->amount;
				$local_safe_amount_and_support_product_arrays[$local_safe_amount->local_safe_amount_id]['product_name'] = $local_safe_amount->product_name;
				$local_safe_amount_and_support_product_arrays[$local_safe_amount->local_safe_amount_id]['safe_amount'] = $local_safe_amount->safe_amount;
				$local_safe_amount_and_support_product_arrays[$local_safe_amount->local_safe_amount_id]['unit'] = $local_safe_amount->unit;
				$local_safe_amount_and_support_product_arrays[$local_safe_amount->local_safe_amount_id]['center_assign_product_amount'] = 0;

			}
		}
//        dd($local_safe_amount_and_support_product_arrays);

		$local_safe_amounts_arrays =[];

		for($i=1;$i<=count($local_safe_amount_and_support_product_arrays);$i++){

			//$mission_new_location_Arrays 為空 設定第一筆讀到的mission_new_locations_id的第一筆回報的數量為1
			if(!isset($local_safe_amounts_arrays[$local_safe_amount_and_support_product_arrays[$i]['mission_list_id']]))
			{
				$j=1;
			}
			else
			{
				// 設定第二次以上讀到的mission_new_locations_id的接下來的回報數量+1
				$j=count($local_safe_amounts_arrays[$local_safe_amount_and_support_product_arrays[$i]['mission_list_id']])+1;

			}

				$local_safe_amounts_arrays[$local_safe_amount_and_support_product_arrays[$i]['mission_list_id']][$j]['product_total_amount_id'] = $local_safe_amount_and_support_product_arrays[$i]['product_total_amount_id'];
				$local_safe_amounts_arrays[$local_safe_amount_and_support_product_arrays[$i]['mission_list_id']][$j]['amount'] = $local_safe_amount_and_support_product_arrays[$i]['amount'];
				$local_safe_amounts_arrays[$local_safe_amount_and_support_product_arrays[$i]['mission_list_id']][$j]['product_name'] = $local_safe_amount_and_support_product_arrays[$i]['product_name'];
				$local_safe_amounts_arrays[$local_safe_amount_and_support_product_arrays[$i]['mission_list_id']][$j]['safe_amount'] = $local_safe_amount_and_support_product_arrays[$i]['safe_amount'];
				$local_safe_amounts_arrays[$local_safe_amount_and_support_product_arrays[$i]['mission_list_id']][$j]['unit'] = $local_safe_amount_and_support_product_arrays[$i]['unit'];
				$local_safe_amounts_arrays[$local_safe_amount_and_support_product_arrays[$i]['mission_list_id']][$j]['center_assign_product_amount'] = $local_safe_amount_and_support_product_arrays[$i]['center_assign_product_amount'];

		}

//		dd($local_safe_amounts_arrays);

		//取出中心庫存數
		$center_amounts = DB::table('local_safe_amounts')
			->join('product_total_amounts','product_total_amounts.product_total_amount_id','=','local_safe_amounts.product_total_amount_id')
			->where('mission_list_id','=',1)
			->get();

		$center_support_products =  DB::table('center_support_products')
			->join('product_total_amounts','product_total_amounts.product_total_amount_id','=','center_support_products.product_total_amount_id')
			->orderBy('center_support_product_amount','desc')
			->get();
//        dd($center_support_products);

		$donates = DB::table('donate_products')
			->join('donates','donates.donate_id','=','donate_products.donate_id')
			->join('product_total_amounts','product_total_amounts.product_total_amount_id','=','donate_products.product_total_amount_id')
			->get();
//        dd($donates);

		$donate_names = DB::table('donates')
			->get();
//        dd($donate_names);

		//取出個地點(各任務)的資源監控組人員
		$resourceNewLocationUsers = DB::table('users')
			->join('role_user','users.id','=','role_user.user_id')
			->join('works_ons','users.id','=','works_ons.id')
			->join('mission_lists','mission_lists.mission_list_id','=','users.mission_list_id')
			->where('role_id','=',7 )
			->get();
//            dd($resourceNewLocationUsers);

		$mission_support_products = DB::table('mission_support_products')
			->leftJoin('local_safe_amounts', function($join)
			{
				$join->on('local_safe_amounts.product_total_amount_id', '=', 'mission_support_products.product_total_amount_id')
					->on('local_safe_amounts.mission_list_id', '=', 'mission_support_products.mission_list_id');
			})
//
			->join('product_total_amounts','product_total_amounts.product_total_amount_id','=','mission_support_products.product_total_amount_id')
//			->join('local_safe_amounts','local_safe_amounts.product_total_amount_id','=','mission_support_products.product_total_amount_id')
			->get();
//		dd($mission_support_products);

		$mission_support_product_Arrays =[];

		foreach($mission_support_products as $mission_support_product){

			//$mission_new_location_Arrays 為空 設定第一筆讀到的mission_new_locations_id的第一筆回報的數量為1
			if(!isset($mission_support_product_Arrays[$mission_support_product->mission_list_id]))
			{
				$i=1;
			}
			else
			{
				// 設定第二次以上讀到的mission_new_locations_id的接下來的回報數量+1
				$i=count($mission_support_product_Arrays[$mission_support_product->mission_list_id])+1;
			}

			$mission_support_product_Arrays[$mission_support_product->mission_list_id][$i]['product_total_amount_id'] = $mission_support_product->product_total_amount_id;
			$mission_support_product_Arrays[$mission_support_product->mission_list_id][$i]['amount'] = $mission_support_product->mission_support_product_amount;
			$mission_support_product_Arrays[$mission_support_product->mission_list_id][$i]['product_name'] = $mission_support_product->product_name;
			$mission_support_product_Arrays[$mission_support_product->mission_list_id][$i]['safe_amount'] = $mission_support_product->safe_amount;
			$mission_support_product_Arrays[$mission_support_product->mission_list_id][$i]['unit'] = $mission_support_product->unit;
			$mission_support_product_Arrays[$mission_support_product->mission_list_id][$i]['center_assign_product_amount'] = $mission_support_product->center_assign_product_amount;
		}

//		$mission_support_product_Array =[];
//		foreach($mission_support_products as $mission_support_product){
//			$mission_support_product_Array[$mission_support_product->mission_list_id."product_total_amount_id"] = $mission_support_product->product_total_amount_id;
//			$mission_support_product_Array[$mission_support_product->mission_list_id."product_name"] = $mission_support_product->product_name;
//			$mission_support_product_Array[$mission_support_product->mission_list_id."safe_amount"] = $mission_support_product->safe_amount;
//			$mission_support_product_Array[$mission_support_product->mission_list_id."amount"] = $mission_support_product->amount;
//			$mission_support_product_Array[$mission_support_product->mission_list_id."unit"] = $mission_support_product->unit;
//			$mission_support_product_Array[$mission_support_product->mission_list_id."center_assign_product_amount"] = $mission_support_product->center_assign_product_amount;
//		}
//		dd($mission_support_product_Arrays);

		return view('manage_pages.product_manage_resource_c')
			->with('local_safe_amounts_arrays', $local_safe_amounts_arrays)
			->with('center_amounts', $center_amounts)
			->with('center_support_products', $center_support_products)
			->with('donates', $donates)
			->with('donate_names', $donate_names)
			->with('resourceNewLocationUsers', $resourceNewLocationUsers)
			->with('mission_support_products', $mission_support_products)
			->with('mission_support_product_Arrays', $mission_support_product_Arrays);

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
