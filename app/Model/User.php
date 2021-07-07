<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    /**
     * 获取关联用户的手机号，一对一关联
     * 方法名称 用关联模型 命名 ，或者 hasOnePhone 这样比较能看懂
     * 第一个参数 所关联的模型 类名，  	子表
     * 第二个参数	外键  	子表关联父表的字段
     * 第三个参数	主键 	父表关联子表的字段
     * user  是 父表
     * phone 是 子表
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
