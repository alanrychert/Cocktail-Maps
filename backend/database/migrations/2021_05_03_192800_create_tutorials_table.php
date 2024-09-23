<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTutorialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tutorials', function (Blueprint $table) {
            $table->increments('id_tutorial');
            $table->string('nombre');
            $table->text('descripcion',200);
            $table->integer('id_trago');
            $table->string('autor');
            $table->binary('archivos_adjuntos')->nullable();
            $table->timestamps();

            $table->foreign('id_trago')->references('id_trago')->on('tragos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tutorials');
    }
}
