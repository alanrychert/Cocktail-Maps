<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTragosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tragos', function (Blueprint $table) {
            $table->increments('id_trago');
            $table->string('nombre');
            $table->text('ingredientes',200);
            $table->integer('precio');
            $table->integer('id_bar');
            $table->binary('archivos_adjuntos')->nullable();
            $table->timestamps();

            $table->foreign('id_bar')->references('id_bar')->on('bars')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tragos');
    }
}
