<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    /**
     * 与模型关联的数据表。
     *
     * @var string
     */
    protected $table = 'tag';

    // 设置主键
    protected $primaryKey = 'tag_id';


    /**
     * 获取拥有这个标签的文章
     */
    public function post()
    {
        return $this->morphedByMany('App\Model\Post', 'taggable');
    }

    /**
     *获取拥有这个标签的视频
     */
    public function video()
    {
        return $this->morphedByMany('App\Model\Video', 'taggable');
    }
}
