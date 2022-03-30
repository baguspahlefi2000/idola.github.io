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
                'contact' => $row['contact'],
                'summary' => $row['summary'],
                'owner_group' => $row['owner_group'],
                'external_ticket_id' => $row['external_ticket_id'],
                'channel' => $row['channel'],
                'customer_segment' => $row['customer_segment'],
                'service_id' => $row['service_id'],
                'service_no' => $row['service_no'],
                'service_type' => $row['service_type'],
                'top_priority' => $row['top_priority'],
                'slg' => $row['slg'],
                'reported_date' => $row['reported_date'],
                'reported_time' => $row['reported_time'],
                'induk_gamas' => $row['induk_gamas'],
                'related_to_global_issue' => $row['related_to_global_issue'],
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
                'status_date' => $row['status_date'],
                'status_time' => $row['status_time'],
                'resolved_by' => $row['resolved_by'],
                'workzone' => $row['workzone'],
                'witel_id' => $row['witel_id'],
                'regional' => $row['regional'],
                'incidents_symptom' => $row['incidents_symptom'],
                'solutions_segment' => $row['solutions_segment'],
                'actual_solution' => $row['actual_solution'],
                'incident_domain_id' => $row['incident_domain_id'],
                'resolved_date' => $row['resolved_date'],
                'resolved_time' => $row['resolved_time'],
        ]);
    }
    public function getCsvSettings(): array
    {
        return [
            'delimiter' => ';',
            'enclosure' => '"',
            'escape_character' => '"',
            'input_encoding' => 'ISO-8859-1'
        ];
    }

}
