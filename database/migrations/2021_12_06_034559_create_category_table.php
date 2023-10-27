<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category', function (Blueprint $table) {
            $table->id();
            $table->Integer('parent_id')->nullable();
            $table->string('name',250);
            $table->string('language',220)->nullable();
            $table->string('phone',60)->nullable();
            $table->string('email',60)->nullable();
            $table->text('address')->nullable();
            $table->string('img',255)->nullable();
            $table->string('category_type',255)->nullable();
            $table->Integer('user_id')->nullable();
            $table->text('description')->nullable();
            $table->Integer('status')->nullable();
            $table->string("num_of_staff")->nullable();
            $table->string('block',60)->nullable();
            $table->text('google_embeded')->nullable();
            $table->Integer('deleted')->nullable();
            $table->date('publish_date')->nullable();
            $table->date('unpublish_date')->nullable();
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
        Schema::dropIfExists('category');
    }
}
