<?php

namespace App\Exports;

use App\Models\DeploymentTabel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportDeployment implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return DB::table('deployment_tabel')
        ->select('deployment_tabel.tanggal', 'deployment_tabel.ao', 'witel_tabel.witel_nama', 'olo_tabel.olo_nama', 'site_kriteria_tabel.site_kriteria_nama', 'deployment_tabel.sid', 'deployment_tabel.site_id', 'order_type_tabel.order_type_nama', 'produk_tabel.produk_nama', 'satuan_tabel.satuan_nama', 'deployment_tabel.kapasitas_bw', 'deployment_tabel.longitude', 'deployment_tabel.latitude', 'deployment_tabel.alamat_asal', 'deployment_tabel.alamat_tujuan', 'status_ncx_tabel.status_ncx_nama', 'deployment_tabel.berita_acara', 'deployment_tabel.tgl_complete_wfm', 'status_wfm_tabel.status_wfm_nama', 'deployment_tabel.alasan_cancel', 'deployment_tabel.cancel_by', 'deployment_tabel.start_cancel', 'deployment_tabel.ready_after_cancel', 'status_integrasi_tabel.status_integrasi_nama', 'deployment_tabel.tanggal_integrasi', 'deployment_tabel.metro_access', 'deployment_tabel.capture_metro_access', 'deployment_tabel.ip_1', 'deployment_tabel.port_1', 'deployment_tabel.metro_backhaul', 'deployment_tabel.capture_metro_backhaul', 'deployment_tabel.ip_2', 'deployment_tabel.port_2', 'deployment_tabel.vlan', 'deployment_tabel.vcid', 'deployment_tabel.gpon', 'deployment_tabel.capture_gpon', 'deployment_tabel.ip_3', 'deployment_tabel.port_3', 'deployment_tabel.sn', 'odp_tabel.odp_nama', 'deployment_tabel.odp', 'deployment_tabel.port_odp', 'deployment_tabel.port_4', 'deployment_tabel.kontak_pic_lokasi', 'deployment_tabel.ip_4', 'deployment_tabel.downlink', 'deployment_tabel.type_2')
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
    public function headings() : array{
        return ['TGL/BLN/THN', 'NO. AO', 'WITEL', 'OLO/ISP', 'SITE KRITERIA', 'SID', 'SITE ID', 'ORDER TYPE', 'PRODUK', 'SATUAN', 'KAPASITAS [BW]', 'LONGITUDE', 'LATITUDE', 'ALAMAT ASAL', 'ALAMAT TUJUAN', 'STATUS NCX', 'BERITA ACARA', 'TGL COMPLETE WFM', 'STATUS WFM', 'ALASAN CANCEL', 'CANCEL By', 'START CANCEL DATE', 'READY AFTER CANCEL', 'STATUS INTEGRASI', 'TANGGAL INTEGRASI', 'METRO ACCESS', 'CAPTURE METRO ACCESS', 'IP 1', 'PORT 1', 'METRO BACKHAUL', 'CAPTURE METRO BACKHAUL', 'IP 2', 'PORT 2', 'VLAN', 'VCID', 'GPON', 'CAPTURE GPON', 'IP 3', 'PORT 3', 'SN', 'ODP', 'ISI ODP', 'PORT ODP', 'PORT 4', 'TYPE 1', 'KONTAK PIC LOKASI', 'IP 4', 'DOWNLINK', 'TYPE 2'

        ];
    }
}
