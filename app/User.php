<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class User extends Model
{

    //是否已经登陆
    public static function isLogged($id)
    {
        return Session::get('id') == $id? true : false;
    }


    //是否已经注册
    public static function isRegisted($id)
    {
        return User::find($id);
    }


    //注册
    public static function signup(Request $request)
    {
        $user = new User();
        $user->password = Hash::make($request->input('password')); //加密
        $user->name = $request->input('user_name');

        //保存模型
        if ($user->save())
            return true;
        else
            return false;
    }


}
