<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PagesController extends Controller {

	public function index()
	{
		return view('user_pages.home');
	}
	public function show()
	{
        $missions = DB::table('missions')->get();
        $country_or_cities = DB::table('missions')->lists('country_or_city_input');

		return view('manage_pages.call_manage')->with('missions', $missions)->with('country_or_cities', $country_or_cities);
	}


}
