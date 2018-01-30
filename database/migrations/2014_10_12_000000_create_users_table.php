<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('name');
            $table->string('email');
            $table->string('password');
            $table->string('remember_token')->nullable();
            $table->string('number')->nullable();
            $table->string('dob')->nullable();  
            $table->string('qualification')->nullable();  
            $table->string('specialization')->nullable();  
            $table->string('passout')->nullable();  
            $table->string('collegeaddress')->nullable();  
            $table->string('homeaddress')->nullable();
            $table->string('profilepic')->nullable();  
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
