<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

use App\Donate;
use App\Donate_product;
class UsersDonateController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $center_support_products =  DB::table('center_support_products')
            ->join('product_total_amounts','product_total_amounts.product_total_amount_id','=','center_support_products.product_total_amount_id')
            ->orderBy('center_support_product_amount','desc')
            ->get();
//        dd($center_support_products);

        $donates = DB::table('donate_products')
            ->join('donates','donates.donate_id','=','donate_products.donate_id')
            ->get();
//        dd($donates);

        return view('user_pages.donate_input')
            ->with('center_support_products', $center_support_products)
            ->with('donates', $donates);
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
	public function store(Request $request)
	{
        $input=$request->except('_token');
        dd( $input);
        $lname =$request->input('lname');
        $fname =$request->input('fname');
        $phone = $request->input('phone');
        $email = $request->input('email');
        $product_name = $request->input('product_name');
//        dd( $product_name);
        $donate = new Donate;
        $donate->lname = $lname;
        $donate->fname = $fname;
        $donate->phone = $phone;
        $donate->email = $email;
        $donate->save();

        $donate_id = Donate::where('lname', '=', $lname)
            ->where('fname', '=', $fname)
            ->where('phone', '=', $phone)
            ->where('email', '=', $email)
            ->orderBy('created_at','desc')
            ->first();
//        dd( $donate_id);

        foreach ($product_name as $product_total_amount_id => $donate_amount){
            $donate_product = new Donate_product;
            $donate_product->donate_id = $donate_id->donate_id;
            $donate_product->product_total_amount_id = $product_total_amount_id;
            $donate_product->donate_amount = $donate_amount;
            $donate_product->updated_at = date('Y-m-d H:i:s');
            $donate_product->updated_at = date('Y-m-d H:i:s');
            $donate_product->save();
        }

        return view('user_pages.submit_success')->with('string',"捐贈物資，請盡快將捐贈之物資寄至「台中市西屯區逢甲路100號」");
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show()
	{

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
