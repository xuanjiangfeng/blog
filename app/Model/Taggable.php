<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Taggable extends Model
{
    /**
     * 与模型关联的数据表。
     *
     * @var string
     */
    protected $table = 'taggable';

    // 设置主键
    protected $primaryKey = 'id';
}
