<?php

namespace App\Exports;

use App\Models\DeploymentTabel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportRekapDeployment implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return DB::table('deployment_tabel')
        ->selectRaw('olo_tabel.olo_nama as OLO,
        SUM(CASE WHEN order_type_id = "1"  THEN 1 ELSE 0 END) as AKTIVASI,
        SUM(CASE WHEN order_type_id = "2"  THEN 1 ELSE 0 END) as MODIFY,
        SUM(CASE WHEN order_type_id = "3"  THEN 1 ELSE 0 END) as DISCONNECT,
        SUM(CASE WHEN order_type_id = "4"  THEN 1 ELSE 0 END) as RESUME,
        SUM(CASE WHEN order_type_id = "5"  THEN 1 ELSE 0 END) as SUSPEND
		')
        ->join('olo_tabel', 'olo_tabel.olo_id', '=', 'deployment_tabel.olo_id')
		->groupBy('deployment_tabel.olo_id')
        ->orderBy('AKTIVASI', 'DESC')
        ->get();
    }

    public function headings() : array
    {
        return ["OLO",
        "AKTIVASI",
        "MODIFY",
        "DISCONNECT",
        "RESUME",
        "SUSPEND"];

    }
}
