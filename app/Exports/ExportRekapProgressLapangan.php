<?php

namespace App\Exports;

use App\Models\ProgressLapanganTabel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\Exportable;

class ExportRekapProgressLapangan implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return DB::table('progress_lapangan_tabel')
        ->selectRaw('olo_tabel.olo_nama as OLO,
        SUM(CASE WHEN progress_lapangan_tabel.status_p_lapangan_id = "1"  THEN 1 ELSE 0 END) as PLAN_AKTIVASI,
        SUM(CASE WHEN progress_lapangan_tabel.status_p_lapangan_id = "2"  THEN 0 ELSE 0 END) as PLAN_MODIFY,
        SUM(CASE WHEN progress_lapangan_tabel.status_p_lapangan_id = "3"  THEN 0 ELSE 0 END) as PLAN_DISCONNECT
		')
        ->join('olo_tabel', 'olo_tabel.olo_id', '=', 'progress_lapangan_tabel.olo_id')
		->groupBy('progress_lapangan_tabel.olo_id')
        ->orderBy('PLAN_AKTIVASI', 'DESC')
        ->get();
    }
}
