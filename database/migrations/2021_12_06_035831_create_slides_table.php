<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlidesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('slides', function (Blueprint $table) {
            $table->id();
            $table->string('name',250)->nullable();
            $table->string('language',220)->nullable();
            $table->text('description')->nullable();
            $table->Integer('status')->nullable();
            $table->Integer('slide_type_id')->nullable();
            $table->Integer('user_id')->nullable();
            $table->Integer('deleted')->nullable();
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
        Schema::dropIfExists('slides');
    }
}
