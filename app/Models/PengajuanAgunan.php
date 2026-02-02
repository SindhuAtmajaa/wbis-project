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
}
