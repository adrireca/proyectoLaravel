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
        Schema::create('pistas', function (Blueprint $table) {
            $table->id();
            $table->float('precioPista',unsigned: true);
            $table->boolean('luz')->default(true)->nullable();
            $table->float('precioLuz',unsigned: true);
            $table->enum('tipoPista',['tenis','padel','futbol','futbolSala'])->nullable()->default(null);
            //$table->enum('tipoSuperficie',['Dura','TierraBatida','Hierba']);
            $table->boolean('cubierta')->default(false)->nullable();
            $table->boolean('disponible')->default(true)->nullable();
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
        Schema::dropIfExists('pistas');
    }
};
