<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminTaskTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('worknature');
            $table->string('onskills');
            $table->string('worktitle');
            $table->string('workdescription');
            $table->string('whatinitforme');
            $table->decimal('usercredits');
            $table->decimal('guidecredits');
            $table->decimal('reviewercredits');
            $table->string('uploads')->nullable(); 
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
        Schema::dropIfExists('admin_tasks');
    }
}
