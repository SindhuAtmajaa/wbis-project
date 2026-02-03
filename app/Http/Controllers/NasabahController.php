<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PengajuanAgunan;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth; //wajib import class Auth

class NasabahController extends Controller
{
    public function index()
    {
        $data = [
            'title'         => 'Data Nasabah',
            'menuNasabah'   => 'active',
            'nasabah'       => PengajuanAgunan::with(['cabang','kjpp','verifikator'])->get(),
        ];
         return view('admin/nasabah/index',$data);
    }

    public function verify($id)
    {
        $item = PengajuanAgunan::findOrFail($id);

        if ($item->status_verifikasi !== 'draft') {
            return redirect()->back()->with('error', 'Data Sudah Diverifikasi');
        }

        // Gunakan Auth::id() sebagai pengganti auth()->id()
        $item->update([
            'verifikator_id'    => Auth::id(), 
            'status_verifikasi' => 'verified'
        ]);

        return redirect()->back()->with('success', 'Data berhasil diverifikasi.');
    }

    public function cancel($id)
    {
        $item = PengajuanAgunan::findOrFail($id);

        // Cek apakah yang login adalah yang memverifikasi
        if (Auth::id() !== $item->verifikator_id) {
            return redirect()->back()->with('error', 'Anda tidak memiliki otoritas.');
        }

        $item->update([
            'status_verifikasi' => 'dibatalkan'
        ]);

        return redirect()->back()->with('success', 'Verifikasi dibatalkan.');
    }
}
