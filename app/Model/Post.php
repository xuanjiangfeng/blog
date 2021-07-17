<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * 与模型关联的数据表。
     *
     * @var string
     */
    protected $table = 'post';

    // 主键
    protected $primaryKey = 'post_id';

    /**
     *  一对多 关联
     * 一个博客下有多个评论
     * 第一个参数 所关联的表
     * 第二个参数 子表的外键
     * 第三个参数 父表的主键
     */
    public function comment(){
        return $this->hasMany('App\Model\Comment', 'comment_post_id', 'post_id');
    }

    /**
     * 获得此文章的图像。
     */
    public function image()
    {
        return $this->morphOne('App\Model\Image', 'imageable');
    }

    /**
     * 获得此文章的所有评论。一对多 多态
     */
    public function commentpv()
    {
        return $this->morphMany('App\Model\Commentpv', 'comment_pv_commentable');
    }

    /**
     * 获取文章标签 多对多 多态
     */
    public function tag()
    {
        return $this->morphToMany('App\Model\Tag', 'taggable');
    }

}
