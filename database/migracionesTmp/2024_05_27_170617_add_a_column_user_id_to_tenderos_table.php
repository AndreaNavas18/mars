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
            $table->bigInteger('user_id')->nullable()->after('puntos');
            $table->string('cedula')->nullable()->after('apellido');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tenderos', function (Blueprint $table) {
            //
            $table->dropColumn('user_id');
            $table->dropColumn('cedula');

        });
    }
};
