<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    /**
     * 与模型关联的数据表。
     *
     * @var string
     */
    protected $table = 'image';

    // 主键
    protected $primaryKey = 'image_id';

    // 场景：文章模型和用户模型都需要用到图片，就把图片模型设置为公共的，
    // imageable_type 所填哪个模型就是哪类模型的图片， 模型要填完整路径 App\Model\Post 、 App\Model\User
    // imageable_id  所属模型下的主键id
    
    /**
     * 获得拥有此图像的模型。
     */
    public function imageable()
    {
        return $this->morphTo();
    }


}
