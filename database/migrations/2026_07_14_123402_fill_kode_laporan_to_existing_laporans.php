<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $laporans = DB::table('laporans')
            ->orderBy('id')
            ->get();

        $no = 1;

        foreach ($laporans as $laporan) {

            DB::table('laporans')
                ->where('id', $laporan->id)
                ->update([
                    'kode_laporan' =>
                        'SJR-' .
                        Carbon::parse($laporan->created_at)->format('Ymd') .
                        '-' .
                        str_pad($no, 4, '0', STR_PAD_LEFT)
                ]);

            $no++;
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::table('laporans')->update([
            'kode_laporan' => null
        ]);
    }
};