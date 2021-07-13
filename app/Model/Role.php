<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    /**
     * 与模型关联的数据表。
     *
     * @var string
     */
    protected $table = 'role';

    // 主键
    protected $primaryKey = 'role_id';

    /**
     * 该角色有哪些用户
     * 多对多 关联（反向）
     * 第一个参数 关联的模型
     * 第二个参数 连接表的表名
     * 第三个参数 本模型在连接表中的外键
     * 第四个参数 关联模型在连接表中的外键
     */
    public function user()
    {
        return $this->belongsToMany('App\Model\User', 'role_user', 'role_user_role_id', 'role_user_user_id');
    }
}
