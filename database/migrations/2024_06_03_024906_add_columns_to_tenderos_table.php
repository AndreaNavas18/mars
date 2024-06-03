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
        Schema::table('tenderos', function (Blueprint $table) {
            //
            $table->integer('frecuencia')->nullable()->after('drop_size');
            $table->float('prob_compra')->nullable()->after('frecuencia');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tenderos', function (Blueprint $table) {
            //
        });
    }
};
