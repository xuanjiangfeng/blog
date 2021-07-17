<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Commentpv extends Model
{
    /**
     * 与模型关联的数据表。
     *
     * @var string
     */
    protected $table = 'comment_pv';

    // 设置主键
    protected $primaryKey = 'comment_pv_id';

    /**
     * 获得拥有此评论的模型。
     */
    public function comment_pv_commentable()
    {
        return $this->morphTo();
    }
}
