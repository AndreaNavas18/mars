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
            $table->bigInteger('tendero_id');
            $table->bigInteger('mes_1');
            $table->bigInteger('mes_2');
            $table->bigInteger('mes_3');
            $table->bigInteger('mes_4');
            $table->bigInteger('mes_5');
            $table->bigInteger('mes_6');
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
