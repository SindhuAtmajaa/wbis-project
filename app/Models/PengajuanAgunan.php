<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class PengajuanAgunan extends Model
{
    //sementara solusi gpt, narik nama table karena direname menjadi tidak plural
    use HasFactory;

    // Tambahkan ini supaya Laravel tahu nama tabel sebenarnya
    protected $table = 'pengajuan_agunan';

    // 1. Kolom yang boleh diisi manual (Mass Assignment)
    protected $fillable = [
        'nama_nasabah', 'kcp', 'jenis_agunan', 'beban_biaya', 'npwp', 
        'dokumen', 'tgl_order', 'tgl_survey', 'tgl_bap_jadi', 'nominal', 
        'biaya_transportasi', 'keterangan', 'status_pembayaran', 
        'tgl_bayar', 'nama_ao', 'unit', 'cabang_id', 'kjpp_id', 'verifikator_id', 
        'status_verifikasi',
    ];

    // 2. Relasi ke Model Cabang
    public function cabang()
    {
        // Parameter kedua 'cabang_id' adalah kolom kunci di tabel pengajuan_agunan
        return $this->belongsTo(Cabang::class, 'cabang_id');
    }

    // 3. Relasi ke Model Kjpp
    public function kjpp()
    {
        // Parameter kedua 'kjpp_id' adalah kolom kunci di tabel pengajuan_agunan
        return $this->belongsTo(Kjpp::class, 'kjpp_id');
    }

    // 4. Relasi ke Model User sebagai Verifikator
    public function verifikator()
    {
        // Kita hubungkan kolom verifikator_id ke model User
        return $this->belongsTo(User::class, 'verifikator_id');
    }

    // 5. Casting untuk tanggal
    protected $casts = [
        'tgl_order' => 'datetime',
        'tgl_survey' => 'datetime',
        'tgl_bap_jadi' => 'datetime',
        'tgl_bayar' => 'datetime',
    ];
}
