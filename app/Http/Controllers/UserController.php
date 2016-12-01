<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{

    //注册控制器
    public function signup(Request $request)
    {
        return User::signup($request) ? $request->get('user_name') : 'failed saving model:user';
    }


    //登录控制器
    public function login(Request $request)
    {
        return User::login($request) ? session('user_name') . ' is logged.' :  $request->get('user_name') . ' failed to log in';
    }

    public function logout(Request $request)
    {
        return User::logout($request) ? $request->get('user_name') . ' logged out.' : $request->get('user_name') . ' failed to log out.';
    }
}
