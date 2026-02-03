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
        Schema::table('pengajuan_agunan', function (Blueprint $table) {
        // Tambahkan parameter kedua untuk memberi nama unik secara manual
        $table->foreign('cabang_id', 'fk_pengajuan_cabang_unique') 
            ->references('id')->on('cabangs')
            ->onUpdate('cascade')
            ->onDelete('restrict');

        $table->foreign('kjpp_id', 'fk_pengajuan_kjpp_unique')
            ->references('id')->on('kjpps')
            ->onUpdate('cascade')
            ->onDelete('restrict');

        $table->foreign('verifikator_id', 'fk_pengajuan_user_unique')
            ->references('id')->on('users')
            ->onUpdate('cascade')
            ->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::table('pengajuan_agunan', function (Blueprint $table) {
            $table->dropForeign(['cabang_id']);
            $table->dropForeign(['kjpp_id']);
            $table->dropForeign(['verifikator_id']);
        });
    }
};
