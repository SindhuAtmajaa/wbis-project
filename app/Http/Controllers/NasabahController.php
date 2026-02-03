<?php

namespace App\Http\Controllers;

use App\Models\Kjpp;
use App\Models\Cabang;
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

    public function create()
    {
        $data = [
            'title'         => 'Tambah Data Nasabah',
            'menuNasabah'   => 'active',
            // Ambil data master untuk pilihan di dropdown
            'cabangs'       => Cabang::all(),
            'kjpps'         => Kjpp::all(),
        ];
        return view('admin/nasabah/create',$data);
    }

    public function store(Request $request)
    {
        // 1. Validasi Super Lengkap untuk Semua Kolom Form Kamu
        $request->validate([
            'nama_nasabah'       => 'required|string|max:255',
            'cabang_id'          => 'required|exists:cabangs,id',
            'kcp'                => 'required|string',
            'jenis_agunan'       => 'required|string',
            'beban_biaya'        => 'required',
            'npwp'               => 'required|string|max:20',
            'dokumen'            => 'required',
            'kjpp_id'            => 'required|exists:kjpps,id',
            'tgl_order'          => 'required|date',
            'tgl_survey'         => 'required|date',
            'tgl_bap_jadi'       => 'required|date',
            'nominal'            => 'required|numeric|min:0',
            'biaya_transportasi' => 'nullable|numeric|min:0',
            'keterangan'         => 'nullable|string',
            'status_pembayaran'  => 'nullable|string',
            'tgl_bayar'          => 'nullable|date',
            'nama_ao'            => 'nullable|string',
            'unit'               => 'nullable|string',
        ], [
            // Pesan Error
            'nama_nasabah.required' => 'Nama debitur wajib diisi.',
            'cabang_id.required'    => 'Cabang tidak boleh kosong.',
            'cabang_id.exists'      => 'Cabang yang dipilih tidak valid dalam database.',
            'kjpp_id.required'      => 'KJPP tidak boleh kosong.',
            'tgl_order.required'    => 'Tanggal Order tidak boleh kosong.',
            'tgl_survey.required'   => 'Tanggal Survey tidak boleh kosong.',
            'tgl_bap_jadi.required' => 'Tanggal BAP tidak boleh kosong.',
            'nominal.required'      => 'Nominal tidak boleh kosong.',
            'nominal.numeric'       => 'Nominal harus berupa angka (tanpa titik/huruf).',
            'biaya_transportasi.numeric' => 'Biaya transportasi harus berupa angka.',
            'kcp.required'            => 'KCP tidak boleh kosong.',
            'jenis_agunan.required'   => 'Jenis agunan tidak boleh kosong.',
            'beban_biaya.required'    => 'Beban biaya tidak boleh kosong.',
            'npwp.required'           => 'NPWP tidak boleh kosong.',
            'dokumen.required'        => 'Dokumen tidak boleh kosong.',
        ]);

        // 2. Ambil semua input ke variabel $nasabah
        $nasabah = $request->all();
        
        // Tambahkan status verifikasi secara otomatis (default data baru adalah 'draft')
        $nasabah['status_verifikasi'] = 'draft';

        // 3. Simpan ke database menggunakan Mass Assignment
        \App\Models\PengajuanAgunan::create($nasabah);

        return redirect()->route('nasabahCreate')->with('success', 'Data pengajuan berhasil disimpan!');
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
