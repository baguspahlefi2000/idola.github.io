<?php

namespace App\Exports;

use App\Models\WitelTabel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportWitel implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return WitelTabel::all()->sortBy('witel_nama');
    }
    public function headings() : array
    {
        return ['witel_id','witel_nama'];
    }
}
