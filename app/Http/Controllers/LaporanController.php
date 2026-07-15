<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Exports\LaporanExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Mail\StatusLaporanMail;
use Illuminate\Support\Facades\Mail;

class LaporanController extends Controller
{
    /**
     * Tampilkan semua laporan
     */
   public function index(Request $request)
{
    $query = Laporan::query();

    // Pencarian Judul / Lokasi
    if ($request->filled('cari')) {
        $query->where(function ($q) use ($request) {
            $q->where('judul', 'like', '%' . $request->cari . '%')
              ->orWhere('lokasi', 'like', '%' . $request->cari . '%');
        });
    }

    // Filter Status
    if ($request->filled('status')) {
        $query->where('status', $request->status);
    }

    // Filter Tanggal Awal
    if ($request->filled('tanggal_awal')) {
        $query->whereDate('created_at', '>=', $request->tanggal_awal);
    }

    // Filter Tanggal Akhir
    if ($request->filled('tanggal_akhir')) {
        $query->whereDate('created_at', '<=', $request->tanggal_akhir);
    }

    $laporans = $query->latest()->get();

    return view('laporan.index', compact('laporans'));
}
    public function store(Request $request)
    {
        $request->validate([
            'judul'      => 'required|max:255',
            'deskripsi'  => 'required',
            'lokasi'     => 'required',
            'latitude'   => 'required',
            'longitude'  => 'required',
            'foto'       => 'nullable|image|mimes:jpg,jpeg,png|max:4096',
        ]);

        $namaFoto = null;

        if ($request->hasFile('foto')) {

            $namaFoto = time().'_'.$request->file('foto')->getClientOriginalName();

            $request->file('foto')->storeAs(
                'laporan',
                $namaFoto,
                'public'
            );
        }

        Laporan::create([

            'user_id'    => Auth::id(),
            'judul'      => $request->judul,
            'deskripsi'  => $request->deskripsi,
            'lokasi'     => $request->lokasi,
            'latitude'   => $request->latitude,
            'longitude'  => $request->longitude,
            'foto'       => $namaFoto,
            'status'     => 'Menunggu',

        ]);

        return redirect()
            ->route('laporan.index')
            ->with('success', 'Laporan berhasil ditambahkan.');
    }

    /**
     * Detail
     */
    public function show(Laporan $laporan)
    {
        return view('laporan.show', compact('laporan'));
    }

    /**
     * Form Edit
     */
    public function edit(Laporan $laporan)
    {
        return view('laporan.edit', compact('laporan'));
    }

    /**
     * Update
     */
    public function update(Request $request, Laporan $laporan)
    {
        $request->validate([
            'judul'      => 'required|max:255',
            'deskripsi'  => 'required',
            'lokasi'     => 'required',
            'status'     => 'required',
            'foto'       => 'nullable|image|mimes:jpg,jpeg,png|max:4096',
        ]);

        $data = [

            'judul'      => $request->judul,
            'deskripsi'  => $request->deskripsi,
            'lokasi'     => $request->lokasi,
            'status'     => $request->status,

        ];

        if ($request->hasFile('foto')) {

            if ($laporan->foto) {

                Storage::disk('public')->delete(
                    'laporan/'.$laporan->foto
                );

            }

            $namaFoto = time().'_'.$request->file('foto')->getClientOriginalName();

            $request->file('foto')->storeAs(
                'laporan',
                $namaFoto,
                'public'
            );

            $data['foto'] = $namaFoto;

        }
$laporan->update($data);

// Refresh data setelah update
$laporan->refresh();

// Kirim email ke pelapor
if ($laporan->user && $laporan->user->email) {

    Mail::to($laporan->user->email)
        ->send(new StatusLaporanMail($laporan));

}

return redirect()
    ->route('laporan.index')
    ->with('success', 'Laporan berhasil diperbarui dan email berhasil dikirim.');
    }

    /**
     * Peta Laporan
     */
    public function map()
    {
        $laporan = Laporan::all();

        $total = Laporan::count();

        $menunggu = Laporan::where('status', 'Menunggu')->count();

        $diproses = Laporan::where('status', 'Diproses')->count();

        $selesai = Laporan::where('status', 'Selesai')->count();

        return view('laporan.map', compact(

            'laporan',
            'total',
            'menunggu',
            'diproses',
            'selesai'

        ));
    }

    /**
     * Export PDF
     */
    public function pdf()
    {
        $laporans = Laporan::latest()->get();

        $pdf = Pdf::loadView(
            'laporan.pdf',
            compact('laporans')
        );

        $pdf->setPaper('A4', 'landscape');

        return $pdf->stream('Laporan_Jalan_Rusak.pdf');
    }
/**
 * Export Excel
 */
public function excel()
{
    return Excel::download(
        new LaporanExport,
        'Data_Laporan_Jalan_Rusak.xlsx'
    );
}
    /**
     * Hapus
     */
    public function destroy(Laporan $laporan)
    {
        if ($laporan->foto) {

            Storage::disk('public')->delete(
                'laporan/'.$laporan->foto
            );

        }

        $laporan->delete();

        return redirect()
            ->route('laporan.index')
            ->with('success', 'Laporan berhasil dihapus.');
    }
}