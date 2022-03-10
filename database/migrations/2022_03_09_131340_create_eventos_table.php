<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eventos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombreEvento');
            $table->date('fechaEvento');
            $table->string('ubicacionEvento');
            $table->integer('participantesEvento')->unsigned;
            //$table->integer('deporte_id')->unsigned;
            $table->foreignID('deporte_id')->references('id_deporte')->on('deportes');



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
        Schema::dropIfExists('eventos');
    }
};
