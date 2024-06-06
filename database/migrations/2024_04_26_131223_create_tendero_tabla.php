<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tenderos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre')->nullable();
            $table->string('cedula')->nullable();
            $table->bigInteger('user_id')->nullable();
            $table->string('producto')->nullable();
            $table->string('canal')->nullable();
            $table->string('subcanal')->nullable();
            $table->string('region_nielsen')->nullable();
            $table->string('codigo_pdv')->nullable();
            $table->integer('drop_size')->nullable();
            $table->integer('frecuencia')->nullable();
            $table->float('prob_compra')->nullable();
            $table->integer('cuota_mes')->nullable();
            $table->string('puntos')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tenderos');
    }
};
