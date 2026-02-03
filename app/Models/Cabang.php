<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cabang extends Model
{
    // Jika nama tabelmu 'cabangs', Laravel sudah otomatis tahu.
    // Tapi jika namanya berbeda, tambahkan: protected $table = 'nama_tabel';

    protected $fillable = ['nama_cabang', 'sla'];

    public function pengajuanAgunans()
    {
        return $this->hasMany(PengajuanAgunan::class, 'cabang_id');
    }
}
