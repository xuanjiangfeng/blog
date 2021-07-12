<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    /**
     * 与模型关联的数据表。
     *
     * @var string
     */
    protected $table = 'comment';

    // 设置主键
    protected $primaryKey = 'comment_id';

    /**
     * 一对多 （反向）
     */
    public function post(){
    	return $this->belongsTo('App\Model\Post', 'comment_post_id', 'post_id');
    }
}
