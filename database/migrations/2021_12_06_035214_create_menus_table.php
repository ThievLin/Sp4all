<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->string('name',250);
            $table->Integer('parent_id')->nullable();
            $table->string('link',250)->nullable();
            $table->string('language',220)->nullable();
            $table->Integer('menu_type_id')->nullable();
            $table->float('ordering',10,2)->nullable();
            $table->string('image',250)->nullable();
            $table->Integer('status')->nullable();
            $table->Integer('user_id')->nullable();
            $table->string('modul_class',255)->nullable();
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
        Schema::dropIfExists('menus');
    }
}
