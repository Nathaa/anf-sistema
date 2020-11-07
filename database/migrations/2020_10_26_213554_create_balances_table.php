<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBalancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('balances', function (Blueprint $table) {
            $table->Bigincrements('id');
            $table->string('nombre');
            $table->float('monto');
            $table->date('fecha_inicio');
            $table->date('fecha_final');
            $table->timestamps();
            
           
            $table->unsignedBigInteger('cuenta_id')->unsigned();
            $table->foreign('cuenta_id')->references('id')->on('cuentas')->onUpdate('cascade')->onDelete('cascade');
        });

        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('balances');
    }
}
