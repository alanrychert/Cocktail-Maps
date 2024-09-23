<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEtiquetablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('etiquetables', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('etiquetable_id');
            $table->string('etiquetable_type');
            $table->unsignedBigInteger('etiqueta_id');
            $table->foreign('etiqueta_id')->references('id')->on('etiquetas')->onDelete('cascade');

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
        Schema::dropIfExists('etiquetables');
    }
}
