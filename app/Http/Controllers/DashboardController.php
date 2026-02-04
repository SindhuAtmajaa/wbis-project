<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\PengajuanAgunan;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
   public function index()
    {
        // --- 1. LOGIKA UNTUK 4 CARD UTAMA (OTOMATIS) ---
        
        // Menghitung total seluruh baris data order
        $totalOrder = PengajuanAgunan::count();

        // Menghitung akumulasi nominal dari seluruh data
        $totalSeluruhNominal = PengajuanAgunan::sum('nominal');

        // Mencari Cabang Teraktif berdasarkan jumlah order terbanyak
        $cabangTeraktif = PengajuanAgunan::select('cabang_id', DB::raw('count(*) as total'))
            ->groupBy('cabang_id')
            ->orderBy('total', 'desc')
            ->with('cabang')
            ->first();
        $namaCabangTeraktif = $cabangTeraktif->cabang->nama_cabang ?? '-';

        // Mencari Nominal Tertinggi dari satu baris data agunan
        $agunanTermahal = PengajuanAgunan::orderBy('nominal', 'desc')->first();
        $nominalTertinggi = $agunanTermahal->nominal ?? 0;


        // --- 2. LOGIKA UNTUK CHART (GRAFIK) ---

        // Bar Chart: Jumlah Order per Cabang
        $orderPerCabang = PengajuanAgunan::select('cabang_id', DB::raw('count(*) as total'))
            ->groupBy('cabang_id')
            ->with('cabang') 
            ->get();
        $labelsBar = $orderPerCabang->pluck('cabang.nama_cabang');
        $valuesBar = $orderPerCabang->pluck('total');

        // Bar Chart: Rekap Nominal per Cabang (Warna Hijau)
        $nominalPerCabang = PengajuanAgunan::select('cabang_id', DB::raw('SUM(nominal) as total_nominal'))
            ->groupBy('cabang_id')
            ->with('cabang')
            ->get();
        $labelsNominal = $nominalPerCabang->map(function($item) {
            return $item->cabang->nama_cabang ?? 'N/A';
        });
        $valuesNominal = $nominalPerCabang->pluck('total_nominal');

        // Pie Chart: SMG vs Selain SMG
        $dataSMG = PengajuanAgunan::whereHas('cabang', function($query) {
            $query->where('nama_cabang', 'SMG');
        })->count();
        $dataSelainSMG = $totalOrder - $dataSMG;

        // Bar Chart: Rekap KJPP (Warna Merah)
        $orderPerKJPP = PengajuanAgunan::select('kjpp_id', DB::raw('count(*) as total'))
            ->groupBy('kjpp_id')
            ->with('kjpp')
            ->get();
        $labelsKJPP = $orderPerKJPP->pluck('kjpp.nama_kjpp');
        $valuesKJPP = $orderPerKJPP->pluck('total');

        // Bar Chart: Rekap Verifikator (Warna Kuning)
        $orderPerVerifikator = PengajuanAgunan::select('verifikator_id', DB::raw('count(*) as total'))
            ->whereNotNull('verifikator_id')
            ->groupBy('verifikator_id')
            ->with('verifikator')
            ->get();
        $labelsVerif = $orderPerVerifikator->pluck('verifikator.nama');
        $valuesVerif = $orderPerVerifikator->pluck('total');


        // --- 3. PENGIRIMAN DATA KE VIEW ---
        
        $data = [
            "title"                    => "Dashboard",
            "menuDashboard"            => "active",
            
            // Data untuk 4 Card Utama (Summary)
            "totalOrder"               => $totalOrder,
            "totalSeluruhNominal"      => $totalSeluruhNominal,
            "namaCabangTeraktif"       => $namaCabangTeraktif,
            "nominalTertinggi"         => $nominalTertinggi,
            
            // Data untuk Charts (Visualisasi)
            "labelsBar"                => $labelsBar,
            "valuesBar"                => $valuesBar,
            "labelsNominal"            => $labelsNominal,
            "valuesNominal"            => $valuesNominal,
            "labelsPie"                => ['SMG', 'Selain SMG'],
            "valuesPie"                => [$dataSMG, $dataSelainSMG],
            "labelsKJPP"               => $labelsKJPP,
            "valuesKJPP"               => $valuesKJPP,
            "labelsVerif"              => $labelsVerif,
            "valuesVerif"              => $valuesVerif,
            
            // Statistik tambahan
            "jumlahStaff"              => User::where('jabatan', 'Staff')->count(),
        ];

        return view('dashboard', $data); 
    }
}