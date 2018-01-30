<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->String('name');
            $table->String('email');
            $table->String('number')->nullable();  
            $table->String('dob')->nullable();  
            $table->String('qualification')->nullable();  
            $table->String('specialization')->nullable();  
            $table->String('marks')->nullable();  
            $table->String('passout')->nullable();  
            $table->String('collegeaddress')->nullable();  
            $table->String('homeaddress')->nullable();  
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
        Schema::dropIfExists('profiles');
    }
}
