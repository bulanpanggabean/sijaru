<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Laporan;
use App\Models\Masyarakat;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // Statistik utama
        $totalLaporan = Laporan::count();
        $menunggu = Laporan::where('status', 'Menunggu')->count();
        $diproses = Laporan::where('status', 'Diproses')->count();
        $selesai = Laporan::where('status', 'Selesai')->count();

        $totalMasyarakat = Masyarakat::count();
        $totalAdmin = Admin::count();

        // Laporan terbaru
        $laporanTerbaru = Laporan::latest()->take(5)->get();

        // Grafik bulanan
        $grafikBulanan = [];

        for ($i = 1; $i <= 12; $i++) {
            $grafikBulanan[] = Laporan::whereMonth('created_at', $i)
                ->whereYear('created_at', date('Y'))
                ->count();
        }

        // Statistik waktu
        $hariIni = Laporan::whereDate('created_at', Carbon::today())->count();

        $mingguIni = Laporan::whereBetween(
            'created_at',
            [
                Carbon::now()->startOfWeek(),
                Carbon::now()->endOfWeek()
            ]
        )->count();

        $bulanIni = Laporan::whereMonth('created_at', Carbon::now()->month)
            ->whereYear('created_at', Carbon::now()->year)
            ->count();

        // Persentase penyelesaian
        $progress = $totalLaporan > 0
            ? round(($selesai / $totalLaporan) * 100)
            : 0;

        return view('dashboard', compact(
            'totalLaporan',
            'menunggu',
            'diproses',
            'selesai',
            'totalMasyarakat',
            'totalAdmin',
            'laporanTerbaru',
            'grafikBulanan',
            'hariIni',
            'mingguIni',
            'bulanIni',
            'progress'
        ));
    }
}