<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations. Migrasi ini mengupdate kolom mejadi nullablle
     */
    public function up(): void
    {
        Schema::table('pengajuan_agunan', function (Blueprint $table) {
        $table->integer('waktu')->nullable()->change();
        $table->bigInteger('denda')->nullable()->change();
        $table->enum('service_level', ['sesuai', 'tidak sesuai'])->nullable()->change();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pengajuan_agunan', function (Blueprint $table) {
        $table->integer('waktu')->nullable(false)->change();
        $table->bigInteger('denda')->nullable(false)->change();
        $table->enum('service_level', ['sesuai', 'tidak sesuai'])->nullable(false)->change();
    });
    }
};
