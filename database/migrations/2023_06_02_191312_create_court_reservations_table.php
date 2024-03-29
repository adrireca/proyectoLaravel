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
        Schema::create('court_reservations', function (Blueprint $table) {
            $table->id();
            $table->integer('idPista');
            $table->integer('idUser');
            $table->boolean('disponible');
            $table->string('hora');
            $table->boolean('luz');
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
        Schema::dropIfExists('court_reservations');
    }
};
