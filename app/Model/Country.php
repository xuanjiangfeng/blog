<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    /**
     * 与模型关联的数据表。
     *
     * @var string
     */
    protected $table = 'country';

    // 主键
    protected $primaryKey = 'country_id';

    /**
     *  远程一对多（相当于 a 关联 b , b 关联 c ,然后想直接 a 关联 c ，获取 c 的内容 ）
     *  例如 一个国家表，一个用户表，一个博客文章表，查询某个国家中所有博客文章
     *  第一个参数 最终表模型
     *  第二个参数 中间表模型
     *  第三个参数 中间模型的外键
     *  第四个参数 最终模型的外键
     *  第五个参数 本模型的主键
     *  第六个参数 中间模型的主键
     */
    public function posts(){
    	return $this->hasManyThrough('App\Model\Post', 'App\Model\User', 'country_id', 'post_user_id', 'country_id', 'id');
    }
}
