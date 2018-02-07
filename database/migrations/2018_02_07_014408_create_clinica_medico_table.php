<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClinicaMedicoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clinica_medico', function (Blueprint $table) {
            $table->integer('clinica_id')->unsigned();
            $table->integer('medico_id')->unsigned();

            $table->primary(['clinica_id', 'medico_id']);

            $table->foreign('clinica_id')->references('id')->on('clinicas');
            $table->foreign('medico_id')->references('id')->on('medicos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clinica_medico');
    }
}
