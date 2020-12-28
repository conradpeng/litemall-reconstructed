<?php

namespace App\Http\Controllers\Wx;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class AuthController extends Controller
{
    public function register(Request $request){
        // 获取参数
        // 验证参数是否为空
        $username = $request->input('username');
        $password = $request->input('password');
        $mobile = $request->input('mobile');
        $code = $request->input('code');

        // if(empty($username) || empty($password) || empty($mobile) || empty($code)){
        //     return ['errno' => '401', 'errmsg' => '信息不能为空'];
        // }
        // 验证用户是否存在
        $userService = new UserService();
        $user = $userService->getByUsername($username);
        if(!is_null($user)){
            return ['errno' => '704', 'errmsg' => '用户名已注册'];
        }
        // 验证手机是否已注册
        $user = $userService->getByMobile($mobile);
        if(!is_null($user)){
            return ['errno' => '705', 'errmsg' => '手机号已经注册'];
        }
        // 验证手机号格式
        $validator = Validator::make(['mobile' => $mobile], ['mobile' => 'regex:/^1[345789][0-9]{9}$/']);
        if($validator->fails()){
            return ['errno' => '707', 'errmsg' => '手机号格式不正确'];
        }
        // 验证验证码是否正确

        // 写入用户表
        $user = new User();
        $user->username = $username;
        $user->password = Hash::make($password);
        $user->mobile = $mobile;
        $user->avatar = "https://yanxuan.nosdn.127.net/80841d741d7fa3073e0ae27bf487339f.jpg?imageView&quality=90&thumbnail=64x64";
        $user->nickname = $username;
        $user->last_login_time = Carbon::now()->toDateTimeString();
        $user->last_login_ip = $request->getClientIp();
        $user->save();

        // 新用户发券

        // 返回用户信息和token
        $token = '';
        $userInfo = ['username' => $user->username, 'avatar' => $user->avatar];
        return [
            'errno' => 0,
            'errmsg' => '成功',
            'data' => [
                'token' => $token,
                'userInfo' => $userInfo
        ]];
    }
}
