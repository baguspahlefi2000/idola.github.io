<?php

namespace App\Exports;

use App\Models\ProdukTabel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportProduk implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return ProdukTabel::all()->sortBy('produk_nama');
    }

    public function headings() : array
    {
        return ['produk_id','produk_nama'];
    }
}
