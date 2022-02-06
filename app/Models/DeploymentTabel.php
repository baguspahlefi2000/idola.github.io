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
 * @property int $witel_id
 * @property int $olo_id
 * @property int $site_kriteria_id
 * @property string|null $sid
 * @property string|null $site_id
 * @property int $order_type_id
 * @property int $produk_id
 * @property int $satuan_id
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
 * @property int $status_integrasi_id
 * @property Carbon|null $tanggal_integrasi
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
 * @property int $odp_id
 * @property string|null $odp
 * @property string|null $port_4
 * @property string|null $type_1
 * @property string|null $kontak_pic_lokasi
 * @property string|null $ip_4
 * @property string|null $downlink
 * @property string|null $type_2
 * @property int $jenis_nte_id
 * @property string|null $jumlah_nte
 * @property int status_disconnect_detail_id
 * @property Carbon|null $tgl_plan_cabut
 * 
 * @property WitelTabel $witel_tabel
 * @property OloTabel $olo_tabel
 * @property SiteKriteriaTabel $site_kriteria_tabel
 * @property OrderTypeTabel $order_type_tabel
 * @property ProdukTabel $produk_tabel
 * @property SatuanTabel $satuan_tabel
 * @property StatusNcxTabel $status_ncx_tabel
 * @property OdpTabel $odp_tabel
 * @property StatusDisconnectDetailTabel $status_disconnect_detail_tabel
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
		'status_integrasi_id' => 'int',
		'odp_id' => 'int',
		'jenis_nte_id' => 'int',
		'status_disconnect_detail_id' => 'int'
	];

	protected $dates = [
		'tanggal',
		'start_cancel',
		'ready_after_cancel',
		'tgl_complete_wfm',
		'tanggal_integrasi',
		'tgl_plan_cabut'
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
		'status_integrasi_id',
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
		'odp',
		'port_4',
		'type_1',
		'kontak_pic_lokasi',
		'ip_4',
		'downlink',
		'type_2',
		'jenis_nte_id',
		'jumlah_nte',
		'status_disconnect_detail_id',
		'tgl_plan_cabut'
	];

	public function deployment_id_tabel()
	{
		return $this->belongsTo(deploymentIdTabel::class, 'deployment_id');
	}

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

	public function status_integrasi_tabel()
	{
		return $this->belongsTo(StatusIntegrasiTabel::class, 'status_integrasi_id');
	}

	public function odp_tabel()
	{
		return $this->belongsTo(OdpTabel::class, 'odp_id');
	}

	public function jenis_nte_tabel()
	{
		return $this->belongsTo(JenisNteTabel::class, 'jenis_nte_id');
	}

	public function status_disconnect_detail_tabel()
	{
		return $this->belongsTo(StatusDisconnectDetailTabel::class, 'status_disconnect_detail_id');
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
		// filter jenis_nte
		$query->when(
            $filters['jenis_nte'] ?? false,
            fn ($query, $jenis_nte) => $query->where('jenis_nte_id', '=', $jenis_nte)
        );
	}
	


}
