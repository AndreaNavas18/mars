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
        Schema::table('vendedores', function (Blueprint $table) {
            //
            $table->string('apellido')->nullable()->after('nombre');
            $table->string('usuario')->nullable()->after('apellido');

            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('vendedores', function (Blueprint $table) {
            //
            $table->dropColumn('apellido');
            $table->dropColumn('usuario');
        });
    }
};
