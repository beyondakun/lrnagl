<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class User extends Model
{

    //是否已经登陆
    public static function isLogged($user_name)
    {
        return Session::get('user_name') == $id? true : false;
    }


    //是否已经注册
    public static function isRegisted($user_name)
    {
        return User::where('name', $user_name)->first() ?: false ;
    }


    //注册成功 返回true
    public static function signup(Request $request)
    {

        $user = new User();
        $user->password = Hash::make($request->input('password'));      //加密
        $user->user_name = $request->get('user_name');

        //保存模型
        return $user->save() ? true : false;

    }


    //成功登陆 返回true
    public static function login(Request $request)
    {
        $user_name = $request->get('user_name');

        if (self::isRegisted( $user_name )) {
            $request->session()->put('user_name', $user_name);
            return true;
        }
        else {
            return false;
        }
    }


    //成功登出，返回false
    public static function logout(Request $request)
    {
        $user_name = $request->get('user_name');

        if ( session('user_name') == $user_name )
        {
            $request->session()->forget('user_name');
            return true;
        }

        return false;
    }

}
