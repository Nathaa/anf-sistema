<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRatiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ratios', function (Blueprint $table) {
            $table->Bigincrements('id');
            $table->string('nombre');
            $table->string('monto');
            $table->date('fecha_ini');
            $table->date('fecha_fin');
            $table->integer('empresa');

           
           
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
        Schema::dropIfExists('ratios');
    }
}
