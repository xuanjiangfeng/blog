<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    /**
     * 与模型关联的数据表。
     *
     * @var string
     */
    protected $table = 'video';

    // 设置主键
    protected $primaryKey = 'video_id';

    /**
     * 获得此视频的所有评论。一对多 多态
     * 第一个参数，对应表的模型
     * 第二个参数，对应表里面 able 的字段
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
