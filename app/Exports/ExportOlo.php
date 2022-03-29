<?php

namespace App\Exports;

use App\Models\OloTabel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportOlo implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return OloTabel::all();
    }

    public function headings() : array
    {
        return ['olo_id','olo_nama'];
    }
}
