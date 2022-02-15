<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * Class ProgressLapanganTabel
 * 
 * @property int $progress_lapangan_id
 * @property Carbon|null $tanggal
 * @property int|null $witel_id
 * @property string|null $ao
 * @property int $olo_id
 * @property int $produk_id
 * @property string|null $alamat_toko
 * @property Carbon|null $tanggal_order_pt1
 * @property string|null $keterangan_pt1
 * @property Carbon|null $tanggal_order_pt2
 * @property string|null $keterangan_pt2
 * @property string|null $datek_odp
 * @property int $status_p_lapangan_id
 * @property string|null $datek_gpon
 * @property string|null $keterangan
 * 
 * @property WitelTabel|null $witel_tabel
 * @property OloTabel $olo_tabel
 * @property ProdukTabel $produk_tabel
 * @property StatusPLapanganTabel $status_p_lapangan_tabel
 *
 * @package App\Models
 */
class ProgressLapanganTabel extends Model
{
	protected $table = 'progress_lapangan_tabel';
	protected $primaryKey = 'progress_lapangan_id';
	public $timestamps = false;

	protected $casts = [
		'witel_id' => 'int',
		'olo_id' => 'int',
		'produk_id' => 'int',
		'status_p_lapangan_id' => 'int'
	];

	protected $dates = [
		'tanggal'=> 'date:YYYY-MM-DD',
		'tanggal_order_pt1'=> 'date:YYYY-MM-DD',
		'tanggal_order_pt2'=> 'date:YYYY-MM-DD'
	];

	protected $fillable = [
		'tanggal',
		'witel_id',
		'ao',
		'olo_id',
		'produk_id',
		'alamat_toko',
		'tanggal_order_pt1',
		'keterangan_pt1',
		'tanggal_order_pt2',
		'keterangan_pt2',
		'datek_odp',
		'status_p_lapangan_id',
		'datek_gpon',
		'keterangan'
	];

	public function progress_lapangan_id()
	{
		return $this->belongsTo(ProgressLapanganTabel::class, 'progress_lapangan_id');
	}

	public function witel_tabel()
	{
		return $this->belongsTo(WitelTabel::class, 'witel_id');
	}

	public function olo_tabel()
	{
		return $this->belongsTo(OloTabel::class, 'olo_id');
	}

	public function produk_tabel()
	{
		return $this->belongsTo(ProdukTabel::class, 'produk_id');
	}

	public function status_p_lapangan_tabel()
	{
		return $this->belongsTo(StatusPLapanganTabel::class, 'status_p_lapangan_id');
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

		// filter progress
		$query->when(
            $filters['progress'] ?? false,
            fn ($query, $progress) => $query->where('status_p_lapangan_id', '=', $progress)
        );
	}

	public function scopeRekapProgress($query){
		return $query->join('olo_tabel', 'olo_tabel.olo_id', '=', 'progress_lapangan_tabel.olo_id')
		->groupBy('progress_lapangan_tabel.olo_id')
		->addSelect(DB::raw('
        SUM(CASE WHEN status_p_lapangan_id = "1"  THEN 1 ELSE 0 END) as PLAN_AKTIVASI,
        SUM(CASE WHEN status_p_lapangan_id = "2"  THEN 1 ELSE 0 END) as PLAN_MODIFY,
        SUM(CASE WHEN status_p_lapangan_id = "3"  THEN 1 ELSE 0 END) as PLAN_DISCONNECT,
		olo_tabel.olo_nama as OLO'))
        ->orderBy('PLAN_AKTIVASI', 'DESC');
	}
}
