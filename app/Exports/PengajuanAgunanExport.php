<?php

namespace App\Exports;

use App\Models\PengajuanAgunan;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class PengajuanAgunanExport implements FromView
{
    public function view(): View
    {
        $data = array(
            'nasabah'  => PengajuanAgunan::with(['cabang', 'kjpp', 'verifikator'])->get(),
            'date' => now()->format('d-m-Y_H.i.s'),
        );
        return view('admin/nasabah/excel', $data);
    }
}
