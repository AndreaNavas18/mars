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
        if (!Schema::hasTable('cumplimiento')) {
            Schema::create('cumplimiento', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->bigInteger('tendero_id');
                $table->bigInteger('mes_1')->nullable()->default(0);
                $table->bigInteger('mes_2')->nullable()->default(0);
                $table->bigInteger('mes_3')->nullable()->default(0);
                $table->bigInteger('mes_4')->nullable()->default(0);
                $table->bigInteger('mes_5')->nullable()->default(0);
                $table->bigInteger('mes_6')->nullable()->default(0);
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cumplimiento');
    }
};
