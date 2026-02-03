<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kjpp extends Model
{
    protected $fillable = ['nama_kjpp', 'rekening_kjpp']; // Sesuaikan kolom di tabel kjpps

    public function pengajuanAgunans()
    {
        return $this->hasMany(PengajuanAgunan::class, 'kjpp_id');
    }
}
