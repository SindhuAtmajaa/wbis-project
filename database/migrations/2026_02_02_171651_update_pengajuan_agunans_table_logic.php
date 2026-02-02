<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Trigger saat INSERT
    DB::statement("
        CREATE TRIGGER hitung_sebelum_insert_agunan
        BEFORE INSERT ON pengajuan_agunan
        FOR EACH ROW
        BEGIN
            DECLARE v_sla INT DEFAULT 0;
            
            -- Menggunakan 'cabang_id' sesuai struktur tabelmu
            SELECT sla INTO v_sla FROM cabangs WHERE id = NEW.cabang_id LIMIT 1;

            -- Hitung Waktu
            IF NEW.tgl_bap_jadi IS NOT NULL AND NEW.tgl_survey IS NOT NULL THEN
                SET NEW.waktu = DATEDIFF(NEW.tgl_bap_jadi, NEW.tgl_survey);
            ELSE
                SET NEW.waktu = 0;
            END IF;

            -- Hitung Denda & Service Level
            -- Pastikan v_sla tidak null agar hitungan benar
            IF v_sla IS NOT NULL AND NEW.waktu > v_sla THEN
                SET NEW.denda = NEW.nominal * 0.1;
                SET NEW.service_level = 'tidak sesuai';
            ELSE
                SET NEW.denda = 0;
                SET NEW.service_level = 'sesuai';
            END IF;
        END
    ");

    // Trigger saat UPDATE
    DB::statement("
        CREATE TRIGGER hitung_sebelum_update_agunan
        BEFORE UPDATE ON pengajuan_agunan
        FOR EACH ROW
        BEGIN
            DECLARE v_sla INT DEFAULT 0;
            
            SELECT sla INTO v_sla FROM cabangs WHERE id = NEW.cabang_id LIMIT 1;

            IF NEW.tgl_bap_jadi IS NOT NULL AND NEW.tgl_survey IS NOT NULL THEN
                SET NEW.waktu = DATEDIFF(NEW.tgl_bap_jadi, NEW.tgl_survey);
            ELSE
                SET NEW.waktu = 0;
            END IF;

            IF v_sla IS NOT NULL AND NEW.waktu > v_sla THEN
                SET NEW.denda = NEW.nominal * 0.1;
                SET NEW.service_level = 'tidak sesuai';
            ELSE
                SET NEW.denda = 0;
                SET NEW.service_level = 'sesuai';
            END IF;
        END
    ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Balikkan ke kolom biasa jika kamu melakukan rollback
        DB::statement("ALTER TABLE pengajuan_agunan MODIFY COLUMN waktu INT");
        DB::statement("ALTER TABLE pengajuan_agunan MODIFY COLUMN denda DECIMAL(15,2)");
        DB::statement("ALTER TABLE pengajuan_agunan MODIFY COLUMN service_level ENUM('sesuai', 'tidak sesuai')");
    }
};