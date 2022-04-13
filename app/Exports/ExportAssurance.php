<?php

namespace App\Exports;

use App\Models\AssuranceTabel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportAssurance implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    
    
    public function collection()
    {
        return DB::table('assurance_tabel')
        ->selectRaw('assurance_id,
        incident,
        olo_tabel.olo_nama as REKAP_OLO_NAMA,
        contact_name,
        contact_phone,
        contact_email,
        summary,
        owner_group,
        owner,
        last_updated_work_log,
        last_work_log_date,
        count_cust_info,
        last_cust_info,
        assigned_to,
        booking_date,
        assigned_by,
        reported_priority,
        source,
        subsidiary,
        external_ticket_id,
        external_ticket_status,
        segment,
        channel,
        customer_segment,
        customer_type,
        closed_by,
        customer_id,
        service_id,
        service_no,
        service_type,
        top_priority,
        slg,
        technology,
        datek,
        rk_name,
        ibooster_alert_id,
        induk_gamas,
        related_to_global_issue,
        reported_date,
        reported_time,
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
        hasil_ukur,
        osm_resolved_code,
        last_update_ticket,
        status_date,
        resolved_by,
        workzone,
        witel_tabel.witel_nama as REKAP_WITEL_NAMA,
        regional,
        incidents_symptom,
        solutions_segment,
        actual_solution,
		incident_domain_tabel.incident_domain_nama as INCIDENT_DOMAIN_NAMA,
        onu_rx_before_after,
        scc_fisik_inet,
        scc_logic,
        complete_wo_by,
        kode_produk,
        resolved_date
		')
        ->join('olo_tabel', 'olo_tabel.olo_id', '=', 'assurance_tabel.olo_id')
        ->join('witel_tabel', 'witel_tabel.witel_id', '=', 'assurance_tabel.witel_id')
		->join('incident_domain_tabel', 'incident_domain_tabel.incident_domain_id', '=', 'assurance_tabel.incident_domain_id')
		->groupBy('assurance_id')
        ->orderBy('reported_date')
        ->get();
    }

    public function headings() : array
    {
        return ["Incident",
        "Customer Name",
        "Contact Name",
        "Contact Phone",
        "Contact Email",
        "Summary",
        "Owner Group",
        "Owner",
        "Last Updated Work Log",
        "Last Work Log Date",
        "Count CustInfo",
        "Last CustInfo",
        "Assigned to",
        "Booking Date",
        "Assigned by",
        "Reported Priority",
        "Source",
        "Subsidiary",
        "External Ticket ID",
        "External Ticket Status",
        "Segment	Channel",
        "Customer Segment",
        "Customer Type",
        "Closed By",
        "Customer ID",
        "Service ID",
        "Service No",
        "Service Type",
        "Top Priority",
        "SLG",
        "Technology",
        "Datek",
        "RK Name",
        "Ibooster Alert ID",
        "Induk Gamas",
        "Related to Global Issue",
        "Reported Date",
        "Reported Time",
        "Lapul",
        "Gaul",
        "TTR E2E",
        "TTR Customer",
        "TTR Nasional",
        "TTR Regional",
        "TTR Witel",
        "TTR Mitra",
        "TTR Agent",
        "TTR Pending",
        "Pending Reason",
        "Status",
        "Hasil Ukur",
        "OSM Resolved Code",
        "Last Update Ticket",
        "Status Date",
        "Resolved By",
        "Workzone",
        "Witel",
        "Regional",
        "Incident's Symptom",
        "Solution's Segment",
        "Actual Solution",
        "Incident Domain",
        "ONU Rx Before After",
        "SCC fisik inet",
        "SCC logic",
        "Complete WO by",
        "Kode Produk",
        "Resolved Date"];

    }
}
