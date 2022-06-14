<?php

namespace App\Exports;

use App\Models\JenisNteTabel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportJenisNte implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return JenisNteTabel::all()->sortBy('jenis_nte_nama');
    }

    public function headings() : array
    {
        return ['jenis_nte_id','jenis_nte_nama'];
    }
}
