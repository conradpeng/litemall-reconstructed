<?php

namespace App\Services;

use App\Models\User;

class UserService
{
    /**
     * 根据用户名查询用户信息
     * @param $username
     * @return User|null|Model
     *
     */
    public function getByUsername($username){
        return User::query()->where('username', $username)->where('deleted', 0)->first();
    }

    /**
     * 根据电话号码查询用户信息
     * @param $mobile
     * @return User|null|Model
     *
     */
    public function getByMobile($mobile){
        return User::query()->where('mobile', $mobile)->where('deleted', 0)->first();
    }
}
