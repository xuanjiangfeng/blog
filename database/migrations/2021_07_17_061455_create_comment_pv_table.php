<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateCommentPvTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comment_pv', function (Blueprint $table) {
            $table->increments('comment_pv_id');
            $table->text('comment_pv_body');
            $table->integer('comment_pv_commentable_id')->comment('id');
            $table->string('comment_pv_commentable_type')->comment('模型类型');
            $table->timestamps();
        });
        // 表注释
        DB::statement("ALTER TABLE comment_pv comment '文章和视频评论表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comment_pv');
    }
}
