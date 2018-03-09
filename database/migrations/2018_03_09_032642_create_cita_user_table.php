<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCitaUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cita_user', function (Blueprint $table) {
            $table->integer('cita_id')->unsigned();
            $table->integer('user_id')->unsigned();

            $table->primary(['cita_id', 'user_id']);

            $table->foreign('cita_id')->references('id')->on('citas');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cita_user');
    }
}
