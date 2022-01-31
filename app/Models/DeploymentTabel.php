<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * Class DeploymentTabel
 * 
 * @property int $deployment_id
 * @property Carbon|null $tanggal
 * @property string|null $ao
 * @property int|null $witel_id
 * @property int $olo_id
 * @property int $site_kriteria_id
 * @property string|null $sid
 * @property string|null $site_id
 * @property int $order_type_id
 * @property int $produk_id
 * @property int|null $satuan_id
 * @property string|null $kapasitas_bw
 * @property string|null $longitude
 * @property string|null $latitude
 * @property string|null $alamat_asal
 * @property string|null $alamat_tujuan
 * @property int $status_ncx_id
 * @property string|null $berita_acara
 * @property string|null $tgl_complete_wfm
 * @property string|null $status_wfm
 * @property string|null $alasan_cancel
 * @property string|null $cancel_by
 * @property Carbon|null $start_cancel
 * @property Carbon|null $ready_after_cancel
 * @property string|null $tanggal_integrasi
 * @property string|null $metro_1
 * @property string|null $ip_1
 * @property string|null $port_1
 * @property string|null $metro_2
 * @property string|null $ip_2
 * @property string|null $port_2
 * @property string|null $vlan
 * @property string|null $vcid
 * @property string|null $gpon
 * @property string|null $ip_3
 * @property string|null $port_3
 * @property string|null $sn
 * @property string|null $odp
 * @property string|null $port_4
 * @property string|null $type_1
 * @property string|null $kontak_pic_lokasi
 * @property string|null $ip_4
 * @property string|null $downlink
 * @property string|null $type_2
 * 
 * @property WitelTabel $witel_tabel
 * @property OloTabel $olo_tabel
 * @property SiteKriteriaTabel $site_kriteria_tabel
 * @property OrderTypeTabel $order_type_tabel
 * @property ProdukTabel $produk_tabel
 * @property SatuanTabel $satuan_tabel
 * @property StatusNcxTabel $status_ncx_tabel
 * @property OdpTabel $odp_tabel
 *
 * @package App\Models
 */
class DeploymentTabel extends Model
{
	protected $table = 'deployment_tabel';
	protected $primaryKey = 'deployment_id';
	public $timestamps = false;

	protected $casts = [
		'witel_id' => 'int',
		'olo_id' => 'int',
		'site_kriteria_id' => 'int',
		'order_type_id' => 'int',
		'produk_id' => 'int',
		'satuan_id' => 'int',
		'status_ncx_id' => 'int',
		'odp_id' => 'int'
	];

	protected $dates = [
		'tanggal',
		'start_cancel',
		'ready_after_cancel',
		'tanggal_integrasi'
	];

	protected $fillable = [
		'tanggal',
		'ao',
		'witel_id',
		'olo_id',
		'site_kriteria_id',
		'sid',
		'site_id',
		'order_type_id',
		'produk_id',
		'satuan_id',
		'kapasitas_bw',
		'longitude',
		'latitude',
		'alamat_asal',
		'alamat_tujuan',
		'status_ncx_id',
		'berita_acara',
		'tgl_complete_wfm',
		'status_wfm',
		'alasan_cancel',
		'cancel_by',
		'start_cancel',
		'ready_after_cancel',
		'tanggal_integrasi',
		'metro_1',
		'ip_1',
		'port_1',
		'metro_2',
		'ip_2',
		'port_2',
		'vlan',
		'vcid',
		'gpon',
		'ip_3',
		'port_3',
		'sn',
		'odp_id',
		'port_4',
		'type_1',
		'kontak_pic_lokasi',
		'ip_4',
		'downlink',
		'type_2'
	];

	public function witel_tabel()
	{
		return $this->belongsTo(WitelTabel::class, 'witel_id');
	}

	public function olo_tabel()
	{
		return $this->belongsTo(OloTabel::class, 'olo_id');
	}

	public function site_kriteria_tabel()
	{
		return $this->belongsTo(SiteKriteriaTabel::class, 'site_kriteria_id');
	}

	public function order_type_tabel()
	{
		return $this->belongsTo(OrderTypeTabel::class, 'order_type_id');
	}

	public function produk_tabel()
	{
		return $this->belongsTo(ProdukTabel::class, 'produk_id');
	}

	public function satuan_tabel()
	{
		return $this->belongsTo(SatuanTabel::class, 'satuan_id');
	}

	public function status_ncx_tabel()
	{
		return $this->belongsTo(StatusNcxTabel::class, 'status_ncx_id');
	}

	public function odp_tabel()
	{
		return $this->belongsTo(OdpTabel::class, 'odp_id');
	}

	public function scopeFilter($query, array $filters){
		// filter no ao
        $query->when(
            $filters['no_ao'] ?? false,
            fn ($query, $no_ao) => $query->where('ao', '=', $no_ao)
        );
		// filter tanggal
        if (request()->tgl_bulan_dr || request()->tgl_bulan_sd){
            $tgl_bulan_dr = Carbon::parse(request()->tgl_bulan_dr)->toDateTimeString();
            $tgl_bulan_sd = Carbon::parse(request()->tgl_bulan_sd)->toDateTimeString();
            $query->whereBetween('tanggal',[$tgl_bulan_dr,$tgl_bulan_sd]);
        }
		// filter witel
		$query->when(
            $filters['witel'] ?? false,
            fn ($query, $witel) => $query->where('witel_id', '=', $witel)
        );
		// filter olo
        $query->when(
            $filters['olo'] ?? false,
            fn ($query, $olo) => $query->where('olo_id', '=', $olo)
        );
		// filter order_type
        $query->when(
            $filters['order_type'] ?? false,
            fn ($query, $order_type) => $query->where('order_type_id', '=', $order_type)
        );
		// filter produk
        $query->when(
            $filters['produk'] ?? false,
            fn ($query, $produk) => $query->where('produk_id', '=', $produk)
        );
		// filter status_ncx
		 $query->when(
            $filters['status_ncx'] ?? false,
            fn ($query, $status_ncx) => $query->where('status_ncx_id', '=', $status_ncx )
        );
		// filter status_wfm
		$query->when(
            $filters['status_wfm'] ?? false,
            fn ($query, $status_wfm) => $query->where('status_wfm', '=', $status_wfm)
        );
	}
	


}
