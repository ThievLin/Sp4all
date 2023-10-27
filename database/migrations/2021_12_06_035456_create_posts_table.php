<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title',250);
            $table->string('action_title',220)->nullable();
            $table->Integer('show_image_feature')->nullable();
            $table->string('link',250)->nullable();
            $table->string('image',250)->nullable();
            $table->text('description')->nullable();
            $table->string('template',200)->nullable();
            $table->Integer('count')->nullable();
            $table->string('language',220)->nullable();
            $table->string('link_download',400)->nullable();
            $table->string('post_type',200)->nullable();
            $table->Integer('user_id')->nullable();
            $table->Integer('status')->nullable();
            $table->Integer('is_againt')->nullable();
            $table->Integer('deleted')->nullable();
            $table->dateTime('event_start_date')->nullable();
            $table->dateTime('event_end_date')->nullable();
            $table->float('s_from_rang')->nullable();;
            $table->float('s_to_rang')->nullable();;
            $table->string('location_job',60)->nullable();
            $table->string('job_type',60)->nullable();;
            $table->dateTime('publish_date')->nullable();
            $table->dateTime('unpublish_date')->nullable();
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
        Schema::dropIfExists('posts');
    }
}
