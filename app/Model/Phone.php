<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    /**
     * 与模型关联的数据表。
     *
     * @var string
     */
    protected $table = 'phone';

    /**
     *  一对一关联，定义反向关联
     * 方法名称 用关联模型 命名 ，或者 belongsToUser 这样比较能看懂
     * 第一个参数 所关联的模型 类名，  	父表
     * 第二个参数	外键  子表关联父表的字段
     * 第三个参数	主键  父表关联子表的字段
     * user  是 父表
     * phone 是 子表

     */
    public function user(){
    	return $this->belongsTo('App\Model\User','phone_user_id','id');
    }
}
