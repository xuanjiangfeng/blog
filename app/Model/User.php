<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    /**
     * 获取关联用户的手机号，一对一关联
     */
    public function phone(){
    	return $this->hasOne('App\Model\Phone','phone_user_id','id');
    }

    // 推荐写法
    public function profile()
    {
        // 获取用户属性信息
        return $this->hasOne(UserProfile::class,'user_id','id');
    }
}
