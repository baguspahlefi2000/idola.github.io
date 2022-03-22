<?php

namespace App\Exports;

use App\Models\ProgressLapanganTabel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportProgressLapangan implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    

    public function collection()
    {
        return DB::table('progress_lapangan_tabel')
        ->select('progress_lapangan_tabel.tanggal', 'witel_tabel.witel_nama', 'progress_lapangan_tabel.ao', 'olo_tabel.olo_nama', 'produk_tabel.produk_nama', 'progress_lapangan_tabel.bandwith', 'progress_lapangan_tabel.alamat_toko', 'progress_lapangan_tabel.tanggal_order_pt1', 'progress_lapangan_tabel.keterangan_pt1', 'progress_lapangan_tabel.tanggal_order_pt2', 'progress_lapangan_tabel.keterangan_pt2', 'progress_lapangan_tabel.datek_odp',  'progress_lapangan_tabel.datek_gpon', 'status_p_lapangan_tabel.status_p_lapangan_nama', 'progress_lapangan_tabel.keterangan')
        ->join('witel_tabel','witel_tabel.witel_id','=','progress_lapangan_tabel.witel_id')
        ->join('olo_tabel','olo_tabel.olo_id','=','progress_lapangan_tabel.olo_id')
        ->join('produk_tabel','produk_tabel.produk_id','=','progress_lapangan_tabel.produk_id')
        ->join('status_p_lapangan_tabel','status_p_lapangan_tabel.status_p_lapangan_id','=','progress_lapangan_tabel.status_p_lapangan_id')
        ->orderBy('progress_lapangan_tabel.tanggal','asc')
        ->get();
    }

    public function headings() : array
    {
        return ['TANGGAL', 'WITEL', 'NO AO', 'OLO', 'LAYANAN', 'BANDWITH', 'ALAMAT', 'TANGGAL ORDER PT1', 'KETERANGAN PT1', 'TANGGAL ORDER PT2', 'KETERANGAN PT2', 'DATEK ODP', 'DATEK GPON', 'PROGRESS', 'progress_lapangan_tabel.keterangan'];
    }
}
