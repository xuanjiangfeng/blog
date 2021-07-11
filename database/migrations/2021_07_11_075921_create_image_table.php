<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
class CreateImageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('image', function (Blueprint $table) {
            $table->increments('image_id');
            $table->text('image_body')->commit('内容');
            $table->integer('imageable_id')->commit('id');
            $table->string('imageable_type')->commit('哪个模型');
            $table->timestamps();

        });

        // 表注释
        DB::statement("ALTER TABLE image comment '图形表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('image');
    }
}
