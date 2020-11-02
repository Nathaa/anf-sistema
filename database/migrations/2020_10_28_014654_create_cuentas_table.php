<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCuentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cuentas', function (Blueprint $table) {
            $table->Bigincrements('id');
             $table->string('codigo');
             $table->string('codigo_padre');
            $table->string('nombre');
            $table->string('descripcion');
            $table->timestamps();

            $table->unsignedBigInteger('balances_id')->unsigned();
            $table->foreign('balances_id')->references('id')->on('balances')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('resultados_id')->unsigned();
            $table->foreign('resultados_id')->references('id')->on('resultados')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('empresas_id')->unsigned();
            $table->foreign('empresas_id')->references('id')->on('empresas')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('tipocuentas_id')->unsigned();
            $table->foreign('tipocuentas_id')->references('id')->on('tipocuentas')->onUpdate('cascade')->onDelete('cascade');
            
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cuentas');
    }
}
