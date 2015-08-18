<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ResourceLocalProductController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$mission_list_id=Auth::user()->mission_list_id;
//        dd(Auth::user());
		if($mission_list_id != 1) {
			//取出該地方所有庫存數
			$local_safe_amounts = DB::table('local_safe_amounts')
				->join('product_total_amounts','product_total_amounts.product_total_amount_id','=','local_safe_amounts.product_total_amount_id')
				->where('local_safe_amounts.mission_list_id', $mission_list_id)
//				->orderBy('local_safe_amounts.product_total_amount_id')
				->get();
//			dd($local_safe_amounts);

			$mission_support_products = DB::table('mission_support_products')
				->where('mission_support_products.mission_list_id', $mission_list_id)
				->join('product_total_amounts','product_total_amounts.product_total_amount_id','=','mission_support_products.product_total_amount_id')
				->get();
//			dd($mission_support_products);

		}else{
			$local_safe_amounts = null;
			$mission_support_products = null;
		}


        return view('manage_pages.product_manage_resource_l')
			->with('local_safe_amounts', $local_safe_amounts)
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
