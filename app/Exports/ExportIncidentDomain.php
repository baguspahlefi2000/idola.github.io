<?php

namespace App\Exports;

use App\Models\IncidentDomainTabel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportIncidentDomain implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return IncidentDomainTabel::all()->sortBy('incident_domain_nama');
    }
    public function headings() : array
    {
        return ['incident_domain_id','incident_domain_nama'];
    }
}
