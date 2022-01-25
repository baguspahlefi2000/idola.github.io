<?php

namespace App\Models;
use Carbon\Carbon;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wfm extends Model
{
    use HasFactory;
    protected $fillable = [
        'tgl_bulan_th',
        'no_ao',
        'witel',
        'olo_isp',
        'site_kriteria',
        'sid',
        'site_id',
        'order_type',
        'produk',
        'satuan',
        'kapasitas_bw',
        'longitude',
        'latitude',
        'alamat_asal',
        'alamat_tujuan',
        'status_ncx',
        'berita_acara',
        'tgl_complete',
        'status_wfm',
        'alasan_cancel',
        'cancel_by',
        'start_cancel',
        'ready_after_cancel',
        'integrasi',
        'metro',
        'ip',
        'port',
        'metro2',
        'ip2',
        'port2',
        'vlan',
        'vcid',
        'gpon',
        'ip3',
        'port3',
        'sn',
        'port4',
        'type',
        'nama',
        'ip4',
        'downlink',
        'type_switch',
        'capture_metro_backhaul',
        'capture_metro_access',
        'capture_gpon',
        'capture_gpon_image',
        'pic'
    ];

    public function diconnect($query)
    {
        return $this->hasOne(Diconnect::class);
    }

    // filter
    public function scopeFilter($quedry, array $filters)
    {
        // filter no ao
        $quedry->when(
            $filters['no_ao'] ?? false,
            fn ($quedry, $no_ao) => $quedry->where('no_ao', 'like', '%' . $no_ao . '%')
        );

        // filter tanggal
        if (request()->tgl_bulan_dr || request()->tgl_bulan_sd){
            $tgl_bulan_dr = Carbon::parse(request()->tgl_bulan_dr)->toDateTimeString();
            $tgl_bulan_sd = Carbon::parse(request()->tgl_bulan_sd)->toDateTimeString();
            $quedry->whereBetween('tgl_bulan_th',[$tgl_bulan_dr,$tgl_bulan_sd]);
        }
        else{
            $quedry->latest();
        }
        

        // filter olo
        $quedry->when(
            $filters['olo_isp'] ?? false,
            fn ($qudery, $olo_isp) => $quedry->where('olo_isp', 'like', '%' . $olo_isp . '%')
        );

        // filter witel
        $quedry->when(
            $filters['witel'] ?? false,
            fn ($quedry, $witel) => $quedry->where('witel', 'like', '%' . $witel)
        );

        // filter order_type
        $quedry->when(
            $filters['order_type'] ?? false,
            fn ($quedry, $order_type) => $quedry->where('order_type', 'like', '%' . $order_type . '%')
        );

        // filter produk
        $quedry->when(
            $filters['produk'] ?? false,
            fn ($quedry, $produk) => $quedry->where('produk', 'like', '%' . $produk . '%')
        );

        // filter status_ncx
        $quedry->when(
            $filters['status_ncx'] ?? false,
            fn ($quedry, $status_ncx) => $quedry->where('status_ncx', 'like', '%' . $status_ncx . '%')
        );

        // filter status_wfm
        $quedry->when(
            $filters['status_wfm'] ?? false,
            fn ($quedry, $status_wfm) => $quedry->where('status_wfm', 'like', '%' . $status_wfm . '%')
        );
    }

}
