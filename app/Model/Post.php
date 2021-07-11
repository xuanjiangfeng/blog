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
     * 获得此文章的图像。
     */
    public function image()
    {
        return $this->morphOne('App\Model\Image', 'imageable');
    }

}
