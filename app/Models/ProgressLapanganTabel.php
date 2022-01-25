<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

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
		'tanggal',
		'tanggal_order_pt1',
		'tanggal_order_pt2'
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
}
