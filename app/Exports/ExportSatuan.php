<?php

namespace App\Exports;

use App\Models\SatuanTabel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportSatuan implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return SatuanTabel::all()->sortBy('satuan_nama');
    }

    public function headings() : array
    {
        return ['satuan_id','satuan_nama'];
    }
}
