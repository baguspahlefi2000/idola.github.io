<?php

namespace App\Imports;

use App\Models\AssuranceTabel;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportAssurance implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new AssuranceTabel([
                'incident' => $row[1],
                'olo_id' => $row[2],
                'contact_email' => $row[3],
                'summary' => $row[4],
                'owner_group' => $row[5],
                'channel' => $row[6],
                'customer_segment' => $row[7],
                'service_id' => $row[8],
                'service_no' => $row[9],
                'service_type' => $row[10],
                'top_priority' => $row[11],
                'related_to_global_issue' => $row[12],
                'lapul' => $row[13],
                'gaul' => $row[14],
                'ttr_customer' => $row[15],
                'ttr_nasional' => $row[16],
                'ttr_regional' => $row[17],
                'ttr_witel' => $row[18],
                'ttr_mitra' => $row[19],
                'ttr_agent' => $row[20],
                'ttr_pending' => $row[21],
                'pending_reason' => $row[22],
                'status' => $row[23],
                'workzone' => $row[24],
                'witel_id' => $row[25],
                'regional' => $row[26],
                'incidents_symptom' => $row[27],
                'solutions_segment' => $row[28],
                'actual_solution' => $row[29],
                'incident_domain_id' => $row[30],
                'resolved_date' => $row[31],
                'resolved_time' => $row[32],
        ]);
    }
}
