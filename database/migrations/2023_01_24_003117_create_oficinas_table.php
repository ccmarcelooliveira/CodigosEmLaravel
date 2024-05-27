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
        Schema::create('oficinas', function (Blueprint $table) {
            
            $table->increments('idoficina');
            $table->timestamps();
            $table->string('CmpOficina',100);
            $table->string('CmpCnpj',60);
            $table->string('CmpEndereco',100);
            $table->text('CmpObs')->nullable($value = true);
            $table->string('CmpTelFixo',20)->nullable($value = true);
            $table->string('CmpCelular',20)->nullable($value = true);
            $table->string('CmpEmail',100);
            $table->string('CmpStatus',3);
            $table->dateTime('CmpDataInclusao'); //GUARDA A DATA DE INCLUSÃO QUE CHAMAREMOS DE CONVERSÃO            
            //$table->string('token', 64)->unique();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('oficinas');
    }
};
