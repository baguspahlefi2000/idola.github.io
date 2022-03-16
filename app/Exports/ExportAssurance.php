<?php

namespace App\Exports;

use App\Models\AssuranceTabel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\Exportable;

class ExportAssurance implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return DB::table('assurance_tabel')
        ->selectRaw(' incident,
        olo_tabel.olo_nama as REKAP_OLO_NAMA,
        contact_email,
        summary,
        owner_group,
        channel,
        customer_segment,
        service_id,
        service_no,
        service_type,
        top_priority,
        related_to_global_issue,
        lapul,
        gaul,
        SUM(ttr_customer + ttr_pending) as TTR_E2E,
        ttr_customer,
        ttr_nasional,
        ttr_regional,
        ttr_witel,
        ttr_mitra,
        ttr_agent,
        ttr_pending,
        pending_reason,
        status,
        workzone,
		witel_tabel.witel_nama as REKAP_WITEL_NAMA,
        regional,
        incidents_symptom,
        solutions_symptom,
        actual_solution,
		incident_domain_tabel.incident_domain_nama as INCIDENT_DOMAIN_NAMA,
        resolved_date,
        resolved_time
		')
        ->join('olo_tabel', 'olo_tabel.olo_id', '=', 'assurance_tabel.olo_id')
        ->join('witel_tabel', 'witel_tabel.witel_id', '=', 'assurance_tabel.witel_id')
		->join('incident_domain_tabel', 'incident_domain_tabel.incident_domain_id', '=', 'assurance_tabel.incident_domain_id')
		->groupBy('assurance_id')
        ->get();
    }
}
