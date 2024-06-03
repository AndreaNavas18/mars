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
            $table->string('producto')->nullable()->after('puntos');
            $table->string('canal')->nullable()->after('producto');
            $table->string('subcanal')->nullable()->after('canal');
            $table->string('region_nielsen')->nullable()->after('subcanal');
            $table->string('codigo_pdv')->nullable()->after('region_nielsen');
            $table->string('nombre_pdv')->nullable()->after('codigo_pdv');
            $table->integer('drop_size')->nullable()->after('nombre_pdv');
            $table->float('frecuencia')->nullable()->after('drop_size');
            $table->string('prob_compra')->nullable()->after('frecuencia');
            $table->integer('cuota_mes')->nullable()->after('prob_compra');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tenderos', function (Blueprint $table) {
            //
            $table->dropColumn('producto');
            $table->dropColumn('canal');
            $table->dropColumn('subcanal');
            $table->dropColumn('region_nielsen');
            $table->dropColumn('codigo_pdv');
            $table->dropColumn('nombre_pdv');
            $table->dropColumn('drop_size');
            $table->dropColumn('frecuencia');
            $table->dropColumn('prob_compra');
            $table->dropColumn('cuota_mes');

        });
    }
};
