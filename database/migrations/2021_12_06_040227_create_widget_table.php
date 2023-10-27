<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWidgetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('widget', function (Blueprint $table) {
            $table->id();
            $table->Integer('category_id')->nullable();
            $table->Integer('post_id')->nullable();
            $table->Integer('limit_show')->nullable();
            $table->string('position',60)->nullable();
            $table->string('page_side',60)->nullable();
            $table->string('title',60)->nullable();
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
        Schema::dropIfExists('widget');
    }
}
