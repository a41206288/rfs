<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
class LoginController extends Controller {

    public function index()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required | email',
            'password' => 'required',
        ]);


        if ($validator->fails()) {
            return Redirect::make('login')
                ->withErrors($validator)
                ->withInput();
        } else {
           // $remember = ($request->has('remember')) ? true : false;
            $auth = Auth::attempt([
                'email' => $request->get('email'),
                'password' => $request->get('password'),
            ]);//, $remember
            if ($auth) {
               // $user = Auth::user();
                //更新資料
                //$user->lastlogin_ip = $request->getClientIp();
                //$user->lastlogin_at = date('Y-m-d H:i:s', time());
                //$user->save();
                //移除重新設定密碼的驗證碼
                //DB::table('password_resets')->where('email', '=', $user->email)->delete();
                //重導向至登入前頁面
               return Redirect::intended('manage');
            } else {
                return Redirect::to('login')
                    ->with('warning', '帳號或密碼錯誤');
            }
        }



    }

    public function logout()
    {

    }

}