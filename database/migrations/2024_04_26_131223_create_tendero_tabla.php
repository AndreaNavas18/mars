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
            $table->string('nombre',100)->nullable();
            $table->string('cedula',100)->nullable();
            $table->bigInteger('user_id')->nullable();
            $table->string('producto',100)->nullable();
            $table->string('canal',100)->nullable();
            $table->string('subcanal',100)->nullable();
            $table->string('region_nielsen',100)->nullable();
            $table->string('codigo_pdv',100)->nullable();
            $table->bigInteger('drop_size')->nullable();
            $table->bigInteger('frecuencia')->nullable();
            $table->float('prob_compra')->nullable();
            $table->bigInteger('cuota_mes')->nullable();
            $table->string('puntos',100)->nullable();
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
