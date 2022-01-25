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
 * @property string|null $integrasi
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
 * @property string|null $port_4
 * @property string|null $type_1
 * @property string|null $odp
 * @property string|null $kontak_pic_lokasi
 * @property string|null $ip_4
 * @property string|null $downlink
 * @property string|null $type_2
 * 
 * @property WitelTabel|null $witel_tabel
 * @property OloTabel $olo_tabel
 * @property SiteKriteriaTabel $site_kriteria_tabel
 * @property OrderTypeTabel $order_type_tabel
 * @property ProdukTabel $produk_tabel
 * @property SatuanTabel|null $satuan_tabel
 * @property StatusNcxTabel $status_ncx_tabel
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
		'status_ncx_id' => 'int'
	];

	protected $dates = [
		'tanggal',
		'start_cancel',
		'ready_after_cancel'
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
		'integrasi',
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
		'port_4',
		'type_1',
		'odp',
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


	public function scopeFilter($deployment_data, array $filters)
	{
		
		//filter ao
		$deployment_data->when(
            $filters['no_ao'] ?? false,
            fn ($deployment_data, $no_ao) => $deployment_data->where('ao', 'LIKE', '%' . $no_ao . '%')
        );
		// filter tanggal
        if (request()->tgl_bulan_dr || request()->tgl_bulan_sd){
            $tgl_bulan_dr = Carbon::parse(request()->tgl_bulan_dr)->toDateTimeString();
            $tgl_bulan_sd = Carbon::parse(request()->tgl_bulan_sd)->toDateTimeString();
            $deployment_data->whereBetween('TANGGAL',[$tgl_bulan_dr,$tgl_bulan_sd]);
        }
        else{

        }
        

        // filter olo
        $deployment_data->when(
            $filters['olo'] ?? false,
            fn ($deployment_data, $olo_isp) => $deployment_data->where('OLO', 'like', '%' . $olo_isp . '%')
        );

        // filter witel
        $deployment_data->when(
            $filters['witel'] ?? false,
            fn ($deployment_data, $witel) => $deployment_data->where('WITEL', 'like', '%' . $witel)
        );

        // filter order_type
        $deployment_data->when(
            $filters['order_type'] ?? false,
            fn ($deployment_data, $order_type) => $deployment_data->where('ORDER_TYPE', 'like', '%' . $order_type . '%')
        );

        // filter produk
        $deployment_data->when(
            $filters['produk'] ?? false,
            fn ($deployment_data, $produk) => $deployment_data->where('PRODUK', 'like', '%' . $produk . '%')
        );

        // filter status_ncx
        $deployment_data->when(
            $filters['status_ncx'] ?? false,
            fn ($deployment_data, $status_ncx) => $deployment_data->where('STATUS_NCX', 'like', '%' . $status_ncx . '%')
        );

        // filter status_wfm
        $deployment_data->when(
            $filters['status_wfm'] ?? false,
            fn ($deployment_data, $status_wfm) => $deployment_data->where('STATUS_WFM', 'like', '%' . $status_wfm . '%')
        );
	}


}
