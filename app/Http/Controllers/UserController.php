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

}
