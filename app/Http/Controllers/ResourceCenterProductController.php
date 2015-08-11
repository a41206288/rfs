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
		//よ畐计
		$local_safe_amounts = DB::table('local_safe_amounts')
//			->join('mission_support_products','mission_support_products.product_total_amount_id','=','local_safe_amounts.product_total_amount_id')
			->join('product_total_amounts','product_total_amounts.product_total_amount_id','=','local_safe_amounts.product_total_amount_id')
			->get();
//dd($local_safe_amounts);
		//いみ畐计
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

		//翴(ヴ叭)戈方菏北舱
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
//            dd($mission_support_products);
        return view('manage_pages.product_manage_resource_c')
			->with('local_safe_amounts', $local_safe_amounts)
			->with('center_amounts', $center_amounts)
			->with('center_support_products', $center_support_products)
			->with('donates', $donates)
			->with('donate_names', $donate_names)
			->with('resourceNewLocationUsers', $resourceNewLocationUsers)
			->with('mission_support_products', $mission_support_products);
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
