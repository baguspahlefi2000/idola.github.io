<?php

namespace App\Imports;

use App\Models\AssuranceTabel;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;

class ImportAssurance implements ToModel, WithHeadingRow, WithCustomCsvSettings
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new AssuranceTabel([
            'incident' => $row['incident'],
            'olo_id' => $row['olo_id'],
            'contact_name' => $row['contact_name'],
            'contact_phone' => $row['contact_phone'],
            'contact_email' => $row['contact_email'],
            'summary' => $row['summary'],
            'owner_group' => $row['owner_group'],
            'owner' => $row['owner'],
            'last_updated_work_log' => $row['last_updated_work_log'],
            'last_work_log_date' => $row['last_work_log_date'],
            'count_cust_info' => $row['count_cust_info'],
            'last_cust_info' => $row['last_cust_info'],
            'assigned_to' => $row['assigned_to'],
            'booking_date' => $row['booking_date'],
            'assigned_by' => $row['assigned_by'],
            'reported_priority' => $row['reported_priority'],
            'source' => $row['source'],
            'subsidiary' => $row['subsidiary'],
            'external_ticket_id' => $row['external_ticket_id'],
            'external_ticket_status' => $row['external_ticket_status'],
            'segment' => $row['segment'],
            'channel' => $row['channel'],
            'customer_segment' => $row['customer_segment'],
            'customer_type' => $row['customer_type'],
            'closed_by' => $row['closed_by'],
            'customer_id' => $row['customer_id'],
            'service_id' => $row['service_id'],
            'service_no' => $row['service_no'],
            'service_type' => $row['service_type'],
            'top_priority' => $row['top_priority'],
            'slg' => $row['slg'],
            'technology' => $row['technology'],
            'datek' => $row['datek'],
            'rk_name' => $row['rk_name'],
            'ibooster_alert_id' => $row['ibooster_alert_id'],
            'induk_gamas' => $row['induk_gamas'],
            'related_to_global_issue' => $row['related_to_global_issue'],
            'reported_date' => $row['reported_date'],
            'reported_time' => $row['reported_time'],
            'lapul' => $row['lapul'],
            'gaul' => $row['gaul'],
            'ttr_customer' => $row['ttr_customer'],
            'ttr_nasional' => $row['ttr_nasional'],
            'ttr_regional' => $row['ttr_regional'],
            'ttr_witel' => $row['ttr_witel'],
            'ttr_mitra' => $row['ttr_mitra'],
            'ttr_agent' => $row['ttr_agent'],
            'ttr_pending' => $row['ttr_pending'],
            'pending_reason' => $row['pending_reason'],
            'status' => $row['status'],
            'hasil_ukur' => $row['hasil_ukur'],
            'osm_resolved_code' => $row['osm_resolved_code'],
            'last_update_ticket' => $row['last_update_ticket'],
            'status_date' => $row['status_date'],
            'resolved_by' => $row['resolved_by'],
            'workzone' => $row['workzone'],
            'witel_id' => $row['witel_id'],
            'regional' => $row['regional'],
            'incidents_symptom' => $row['incidents_symptom'],
            'solutions_segment' => $row['solutions_segment'],
            'actual_solution' => $row['actual_solution'],
            'incident_domain_id' => $row['incident_domain_id'],
            'onu_rx_before_after' => $row['onu_rx_before_after'],
            'scc_fisik_inet' => $row['scc_fisik_inet'],
            'scc_logic' => $row['scc_logic'],
            'complete_wo_by' => $row['complete_wo_by'],
            'kode_produk' => $row['kode_produk'],
            'resolved_date' => $row['workzone']
        ]);
    }
    public function getCsvSettings(): array
    {
        return [
            'delimiter' => ';',
            'enclosure' => '"',
            'escape_character' => '"'
        ];
    }

}
