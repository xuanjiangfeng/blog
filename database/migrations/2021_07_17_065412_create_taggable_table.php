<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateTaggableTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('taggables', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tag_tag_id')->comment('标签id');
            $table->integer('taggable_id')->comment('模型id');
            $table->string('taggable_type')->comment('标签所属模型');
            $table->timestamps();
        });

        // 表注释
        DB::statement("ALTER TABLE taggables comment '标签与文章和视频关系表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('taggables');
    }
}
