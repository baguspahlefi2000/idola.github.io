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
 * @property string|null $metro_backhaul
 * @property string|null $capture_metro_backhaul
 * @property string|null $ip_1
 * @property string|null $port_1
 * @property string|null $metro_access
 * @property string|null $capture_metro_access
 * @property string|null $ip_2
 * @property string|null $port_2
 * @property string|null $vlan
 * @property string|null $vcid
 * @property string|null $gpon
 * @property string|null $capture_gpon
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
 * @property string|null $gponcapture
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
		'status_wfm_id' => 'int',
		'status_integrasi_id' => 'int',
		'odp_id' => 'int',
		'jenis_nte_id' => 'int',
		'status_disconnect_detail_id' => 'int'
	];


	protected $dates = [
		'tanggal' => 'date:YYYY-MM-DD',
		'start_cancel' => 'date:YYYY-MM-DD',
		'ready_after_cancel' => 'date:YYYY-MM-DD',
		'tgl_complete_wfm' => 'date:YYYY-MM-DD',
		'tanggal_integrasi' => 'date:YYYY-MM-DD',
		'tgl_plan_cabut' => 'date:YYYY-MM-DD'
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
		'status_wfm_id',
		'alasan_cancel',
		'cancel_by',
		'start_cancel',
		'ready_after_cancel',
		'status_integrasi_id',
		'tanggal_integrasi',
		'metro_backhaul',
		'capture_metro_backhaul',
		'ip_1',
		'port_1',
		'metro_access',
		'capture_metro_access',
		'ip_2',
		'port_2',
		'vlan',
		'vcid',
		'gpon',
		'capture_gpon',
		'ip_3',
		'port_3',
		'sn',
		'odp_id',
		'odp',
		'port_odp',
		'port_4',
		'kontak_pic_lokasi',
		'ip_4',
		'downlink',
		'type_2',
		'jenis_nte_id',
		'jumlah_nte',
		'status_disconnect_detail_id',
		'tgl_plan_cabut',
		'gponcapture'
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

	public function status_wfm_tabel()
	{
		return $this->belongsTo(StatusWfmTabel::class, 'status_wfm_id');
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
            fn ($query, $status_wfm) => $query->where('status_wfm_id', '=', $status_wfm)
        );
		// filter jenis_nte
		$query->when(
            $filters['jenis_nte'] ?? false,
            fn ($query, $jenis_nte) => $query->where('jenis_nte_id', '=', $jenis_nte)
        );

		// filter status_disconnect_detail
		$query->when(
            $filters['status_disconnect_detail'] ?? false,
            fn ($query, $status_disconnect_detail) => $query->where('status_disconnect_detail_id', '=', $status_disconnect_detail)
        );

		$query->when(
            $filters['status_integrasi'] ?? false,
            fn ($query, $status_integrasi) => $query->where('status_integrasi_id', '=', $status_integrasi)
        );
	}

	public function scopeRekap($query){
		return $query->join('olo_tabel', 'olo_tabel.olo_id', '=', 'deployment_tabel.olo_id')
		->groupBy('deployment_tabel.olo_id')
		->addSelect(DB::raw('
        SUM(CASE WHEN order_type_id = "1"  THEN 1 ELSE 0 END) as AKTIVASI,
        SUM(CASE WHEN order_type_id = "2"  THEN 1 ELSE 0 END) as MODIFY,
        SUM(CASE WHEN order_type_id = "3"  THEN 1 ELSE 0 END) as DISCONNECT,
        SUM(CASE WHEN order_type_id = "4"  THEN 1 ELSE 0 END) as RESUME,
        SUM(CASE WHEN order_type_id = "5"  THEN 1 ELSE 0 END) as SUSPEND,
		olo_tabel.olo_nama as OLO'))
        ->orderBy('AKTIVASI', 'DESC');
	}


	public function scopeRekapSatu($query){


		return $query
		->addSelect(DB::raw('
        SUM(CASE WHEN order_type_id = "1"  THEN 1 ELSE 0 END) as REKAP_AKTIVASI_SATU,
        SUM(CASE WHEN order_type_id = "2"  THEN 1 ELSE 0 END) as REKAP_MODIFY_SATU,
        SUM(CASE WHEN order_type_id = "3"  THEN 1 ELSE 0 END) as REKAP_DISCONNECT_SATU'))
        ->whereBetween('tanggal',['2021-01-01','2021-12-31']);
	}

	public function scopeRekapDua($query){
		return $query
		->addSelect(DB::raw('
        SUM(CASE WHEN order_type_id = "1"  THEN 1 ELSE 0 END) as REKAP_AKTIVASI_DUA,
        SUM(CASE WHEN order_type_id = "2"  THEN 1 ELSE 0 END) as REKAP_MODIFY_DUA,
        SUM(CASE WHEN order_type_id = "3"  THEN 1 ELSE 0 END) as REKAP_DISCONNECT_DUA'))
        ->whereBetween('tanggal',['2022-01-01','2022-12-31']);
	}

	public function scopeTopProduk($query){
		return $query->join('produk_tabel', 'produk_tabel.produk_id', '=', 'deployment_tabel.produk_id')
		->groupBy('deployment_tabel.produk_id')
		->addSelect(DB::raw('
        COUNT(deployment_tabel.produk_id) as REKAP_PRODUK,
		produk_tabel.produk_nama as REKAP_PRODUK_NAMA'))
        ->orderBy('REKAP_PRODUK', 'DESC');
	}
	
	public function scopeTopOlo($query){
		return $query->join('olo_tabel', 'olo_tabel.olo_id', '=', 'deployment_tabel.olo_id')
		->groupBy('deployment_tabel.olo_id')
		->addSelect(DB::raw('
        COUNT(deployment_tabel.olo_id) as REKAP_OLO,
		olo_tabel.olo_nama as REKAP_OLO_NAMA'))
        ->orderBy('REKAP_OLO', 'DESC');
	}

	public function scopeRekapWfm($query){
		return $query
		->addSelect(DB::raw('
        SUM(CASE WHEN status_wfm_id = "1"  THEN 1 ELSE 0 END) as REKAP_ONPROGRESS,
		SUM(CASE WHEN status_wfm_id = "2" THEN 1 ELSE 0 END) + SUM(CASE WHEN status_wfm_id = "3" THEN 1 ELSE 0 END) as REKAP_DONE,
        SUM(CASE WHEN status_wfm_id = "4"  THEN 1 ELSE 0 END) as REKAP_CANCEL'));
	}

	public function scopeRekapIntegrasiSatu($query){
		return $query
		->addSelect(DB::raw('
		SUM(CASE WHEN status_wfm_id = "2" THEN 1 ELSE 0 END) + SUM(CASE WHEN status_wfm_id = "3" THEN 1 ELSE 0 END) as REKAP_DONE_INTEGRASI'))
		->where('status_integrasi_id', '=', '2');
	}

	public function scopeRekapIntegrasiDua($query){
		return $query
		->addSelect(DB::raw('
		SUM(CASE WHEN status_wfm_id = "2" THEN 1 ELSE 0 END) + SUM(CASE WHEN status_wfm_id = "3" THEN 1 ELSE 0 END) as REKAP_NOTYET_INTEGRASI'))
		->where('status_integrasi_id', '=', '1');
		
	}

	public function scopeRekapIntegrasiTiga($query){
		return $query
		->addSelect(DB::raw('
		SUM(CASE WHEN status_integrasi_id = "1" THEN 1 ELSE 0 END) as REKAP_NOTYET_INTEGRASI,
		SUM(CASE WHEN status_integrasi_id = "2" THEN 1 ELSE 0 END) as REKAP_DONE_INTEGRASI,
		SUM(CASE WHEN status_integrasi_id = "3" THEN 1 ELSE 0 END) as REKAP_BLANK_INTEGRASI'));
		
	}
	public function scopeFilterIntegrasi($query){
		if (request()->tgl_bulan_dr_integrasi || request()->tgl_bulan_sd_integrasi){
            $tgl_bulan_dr_integrasi = Carbon::parse(request()->tgl_bulan_dr_integrasi)->toDateTimeString();
            $tgl_bulan_sd_integrasi = Carbon::parse(request()->tgl_bulan_sd_integrasi)->toDateTimeString();
			return $query->whereBetween('tanggal',[$tgl_bulan_dr_integrasi,$tgl_bulan_sd_integrasi]);
		}
		
	}

	
	public function scopeExportDeployment($query){
		return $query->join('witel_tabel','witel_tabel.witel_id','=','deployment_tabel.witel_id')
		->join('olo_tabel','olo_tabel.olo_id','=','deployment_tabel.olo_id')
		->join('site_kriteria_tabel','site_kriteria_tabel.site_kriteria_id','=','deployment_tabel.site_kriteria_id')
		->join('order_type_tabel','order_type_tabel.order_type_id','=','deployment_tabel.order_type_id')
		->join('produk_tabel','produk_tabel.produk_id','=','deployment_tabel.order_type_id')
		->join('satuan_tabel','satuan_tabel.satuan_id','=','deployment_tabel.satuan_id')
		->join('status_ncx_tabel','status_ncx_tabel.status_ncx_id','=','deployment_tabel.status_ncx_id')
		->join('status_wfm_tabel','status_wfm_tabel.status_wfm_id','=','deployment_tabel.status_wfm_id')
		->join('status_integrasi_tabel','status_integrasi_tabel.status_integrasi_id','=','deployment_tabel.status_integrasi_id')
		->join('odp_tabel','odp_tabel.odp_id','=','deployment_tabel.odp_id')
		->addSelect(DB::raw('deployment_tabel.deployment_id', 'deployment_tabel.tanggal', 'deployment_tabel.ao', 'witel_tabel.witel_nama', 'olo_tabel.olo_nama', 'site_kriteria_tabel.site_kriteria_id', 'deployment_tabel.sid', 'deployment_tabel.site_id', 'order_type_tabel.order_type_nama', 'produk_tabel.produk_nama', 'satuan_tabel.satuan_nama', 'deployment_tabel.kapasitas_bw', 'deployment_tabel.longitude', 'deployment_tabel.latitude', 'deployment_tabel.alamat_asal', 'deployment_tabel.alamat_tujuan', 'status_ncx_tabel.status_ncx_nama', 'deployment_tabel.berita_acara', 'deployment_tabel.tgl_complete_wfm', 'status_wfm_tabel.status_wfm_nama', 'deployment_tabel.alasan_cancel', 'deployment_tabel.cancel_by', 'deployment_tabel.start_cancel', 'deployment_tabel.ready_after_cancel', 'status_integrasi_tabel.status_integrasi_id', 'deployment_tabel.tanggal_integrasi', 'deployment_tabel.metro_access', 'deployment_tabel.capture_metro_access', 'deployment_tabel.ip_1', 'deployment_tabel.port_1', 'deployment_tabel.metro_backhaul', 'deployment_tabel.capture_metro_backhaul', 'deployment_tabel.ip_2', 'deployment_tabel.port_2', 'deployment_tabel.vlan', 'deployment_tabel.vcid', 'deployment_tabel.gpon', 'deployment_tabel.capture_gpon', 'deployment_tabel.ip_3', 'deployment_tabel.port_3', 'deployment_tabel.sn', 'odp_tabel.odp_nama', 'deployment_tabel.odp', 'deployment_tabel.port_4', 'deployment_tabel.kontak_pic_lokasi', 'deployment_tabel.ip_4', 'deployment_tabel.downlink', 'deployment_tabel.type_2'))
		->orderBy('deployment_tabel.tanggal','asc');
	}

	

}
