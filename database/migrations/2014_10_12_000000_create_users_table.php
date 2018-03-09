<?php

use Illuminate\Support\Facades\Schema;
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
            $table->boolean('esMedico');
            $table->string('name');
            $table->string('lastName');
            $table->string('userName')->unique();
            $table->string('email')->unique();
            $table->string('avatar');
            $table->string('num_sanitario')->nullable()->unique();
            $table->date('birthdate')->nullable();
            $table->string('dni')->unique()->nullable();
            $table->string('movil')->unique();
            $table->string('website')->nullable();
            $table->string('about')->nullable();
            $table->string('especialidad')->nullable();
            $table->string('num_colegiado')->nullable()->unique();
            $table->text('curriculum')->nullable();
            $table->integer('favoritos')->nullable();
            $table->boolean('destacado')->nullable();
            $table->string('password');
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
