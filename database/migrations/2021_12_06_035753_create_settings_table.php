<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('website_name',250);
            $table->string('website_url',250)->nullable();
            $table->string('language',220)->nullable();
            $table->text('description')->nullable();
            $table->string('work_time',220)->nullable();
            $table->text('address')->nullable();
            $table->text('phone')->nullable();
            $table->text('email')->nullable();
            $table->string('logo_image',250)->nullable();
            $table->string('logo_text',250)->nullable();
            $table->string('favicon_image',250)->nullable();
            $table->string('copyright',200)->nullable();
            $table->text('address_site')->nullable();
            $table->Integer('is_slide_only_page')->nullable();
            $table->text('link_fb')->nullable();
            $table->Integer('user_id')->nullable();
            $table->text('google_map')->nullable();
            $table->text('facebooklink')->nullable();
            $table->text('visitor_counter')->nullable();
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
        Schema::dropIfExists('settings');
    }
}
