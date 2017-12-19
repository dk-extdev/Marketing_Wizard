<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_videos', function (Blueprint $table) {
            $table->increments('user_video_id');
            $table->string('video_url')->default('');
            $table->integer('user_id');
            $table->string('project_id');
            $table->string('project_title');
            $table->string('customer_name');
            $table->string('customer_domain');
            $table->string('main_text')->default('');
            $table->string('customer_main_video');
            $table->string('background');
            $table->string('textcolor');
            $table->string('intro');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_videos');
    }
}
