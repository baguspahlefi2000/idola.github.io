<?php

namespace App\Exports;

use App\Models\DeploymentTabel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\Exportable;

class ExportDeployment implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return DB::table('deployment_tabel')
        ->select('deployment_tabel.tanggal', 'deployment_tabel.ao', 'witel_tabel.witel_nama', 'olo_tabel.olo_nama', 'site_kriteria_tabel.site_kriteria_nama', 'deployment_tabel.sid', 'deployment_tabel.site_id', 'order_type_tabel.order_type_nama', 'produk_tabel.produk_nama', 'satuan_tabel.satuan_nama', 'deployment_tabel.kapasitas_bw', 'deployment_tabel.longitude', 'deployment_tabel.latitude', 'deployment_tabel.alamat_asal', 'deployment_tabel.alamat_tujuan', 'status_ncx_tabel.status_ncx_nama', 'deployment_tabel.berita_acara', 'deployment_tabel.tgl_complete_wfm', 'status_wfm_tabel.status_wfm_nama', 'deployment_tabel.alasan_cancel', 'deployment_tabel.cancel_by', 'deployment_tabel.start_cancel', 'deployment_tabel.ready_after_cancel', 'status_integrasi_tabel.status_integrasi_nama', 'deployment_tabel.tanggal_integrasi', 'deployment_tabel.metro_access', 'deployment_tabel.capture_metro_access', 'deployment_tabel.ip_1', 'deployment_tabel.port_1', 'deployment_tabel.metro_backhaul', 'deployment_tabel.capture_metro_backhaul', 'deployment_tabel.ip_2', 'deployment_tabel.port_2', 'deployment_tabel.vlan', 'deployment_tabel.vcid', 'deployment_tabel.gpon', 'deployment_tabel.capture_gpon', 'deployment_tabel.ip_3', 'deployment_tabel.port_3', 'deployment_tabel.sn', 'odp_tabel.odp_nama', 'deployment_tabel.odp', 'deployment_tabel.port_4', 'deployment_tabel.type_1', 'deployment_tabel.kontak_pic_lokasi', 'deployment_tabel.ip_4', 'deployment_tabel.downlink', 'deployment_tabel.type_2')
        ->join('witel_tabel','witel_tabel.witel_id','=','deployment_tabel.witel_id')
        ->join('olo_tabel','olo_tabel.olo_id','=','deployment_tabel.olo_id')
        ->join('site_kriteria_tabel','site_kriteria_tabel.site_kriteria_id','=','deployment_tabel.site_kriteria_id')
        ->join('order_type_tabel','order_type_tabel.order_type_id','=','deployment_tabel.order_type_id')
        ->join('produk_tabel','produk_tabel.produk_id','=','deployment_tabel.order_type_id')
        ->join('satuan_tabel','satuan_tabel.satuan_id','=','deployment_tabel.satuan_id')
        ->join('status_ncx_tabel','status_ncx_tabel.status_ncx_id','=','deployment_tabel.status_ncx_id')
        ->join('status_wfm_tabel','status_wfm_tabel.status_wfm_id','=','deployment_tabel.status_wfm_id')
        ->join('status_integrasi_tabel','status_integrasi_tabel.status_integrasi_id','=','deployment_tabel.status_integrasi_id')
        ->join('odp_tabel','odp_tabel.odp_id','=','deployment_tabel.odp_id')
        ->orderBy('deployment_tabel.tanggal','asc')
        ->get();
    }
}
