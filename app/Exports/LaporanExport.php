<?php

namespace App\Exports;

use App\Models\Laporan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class LaporanExport implements FromCollection, WithHeadings
{
    /**
     * Mengambil seluruh data laporan
     */
    public function collection()
    {
        return Laporan::select(
            'id',
            'judul',
            'deskripsi',
            'lokasi',
            'latitude',
            'longitude',
            'status',
            'created_at'
        )->get();
    }

    /**
     * Header Excel
     */
    public function headings(): array
    {
        return [
            'ID',
            'Judul',
            'Deskripsi',
            'Lokasi',
            'Latitude',
            'Longitude',
            'Status',
            'Tanggal'
        ];
    }
}