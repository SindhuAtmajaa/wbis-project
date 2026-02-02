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
        Schema::create('pengajuan_agunan', function (Blueprint $table) {
            $table->id();

            $table->string('nama_nasabah',150);
            $table->string('kcp',100)->nullable(); //boleh kosong

            $table->string('jenis_agunan', 20);
            $table->string('beban_biaya', 20);
            $table->string('npwp', 20);
            $table->string('dokumen',300);

            $table->date('tgl_order')->nullable();
            $table->date('tgl_survey')->nullable();
            $table->date('tgl_bap_jadi')->nullable();
            $table->integer('waktu');
            $table->bigInteger('nominal')->nullable();
            $table->bigInteger('biaya_transportasi')->nullable();
            $table->bigInteger('denda');
            $table->enum('service_level',['sesuai','tidak sesuai']);

            $table->string('keterangan')->nullable();
            $table->string('status_pembayaran',100)->nullable();
            $table->date('tgl_bayar')->nullable();
            $table->string('nama_ao',50)->nullable();
            $table->string('unit',50)->nullable();

            $table->foreignId('cabang_id')->constrained();
            $table->foreignId('kjpp_id')->constrained();
            $table->foreignId('verifikator_id')->nullable()->constrained('users');
            

            $table->enum('status_verifikasi',['draft','verified','dibatalkan'])->default('draft');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengajuan_agunan');
    }
};
