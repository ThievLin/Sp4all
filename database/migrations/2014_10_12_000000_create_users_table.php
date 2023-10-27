<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name',200)->nullable();
            $table->string('username',200);
            $table->string('email')->unique();
            $table->string('phone',50);
            $table->string('image',250)->nullable();
            $table->bigInteger('branch_id')->nullable();
            $table->text('address')->nullable();
            $table->bigInteger('status')->nullable();
            $table->string('password',200);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
