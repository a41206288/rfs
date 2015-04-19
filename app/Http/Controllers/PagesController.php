<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class PagesController extends Controller {

	public function index()
	{
		return view('user_pages.home');
	}
	public function show()
	{
		return view('manage_pages.call_manage');
	}
    public function login()
    {
        return view('login');
    }

}
