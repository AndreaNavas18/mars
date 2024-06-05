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
        Schema::create('cumplimiento', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('tendero_id');
            $table->integer('mes_1');
            $table->integer('mes_2');
            $table->integer('mes_3');
            $table->integer('mes_4');
            $table->integer('mes_5');
            $table->integer('mes_6');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cumplimiento');
    }
};
