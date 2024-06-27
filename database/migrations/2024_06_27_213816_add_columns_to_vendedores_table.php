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
            $table->bigInteger('cedula')->nullable()->after('nombre');
            $table->string('email', 100)->nullable()->after('cedula');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('vendedores', function (Blueprint $table) {
            //
            $table->dropColumn('cedula');
            $table->dropColumn('email');
        });
    }
};
