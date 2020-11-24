<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComparacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comparaciones', function (Blueprint $table) {
            $table->Bigincrements('id');
            $table->string('nombre');
            $table->string('bueno');
            $table->string('malo');
            $table->string('tipo');
            $table->float('valor');
            $table->float('promedio');
           
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
        Schema::dropIfExists('comparaciones');
    }
}
