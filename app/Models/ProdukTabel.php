<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * Class ProdukTabel
 * 
 * @property int $produk_id
 * @property string|null $produk_nama
 * 
 * @property Collection|DeploymentTabel[] $deployment_tabels
 * @property Collection|ProgressLapanganTabel[] $progress_lapangan_tabels
 *
 * @package App\Models
 */
class ProdukTabel extends Model
{
	protected $table = 'produk_tabel';
	protected $primaryKey = 'produk_id';
	public $timestamps = false;

	protected $fillable = [
		'produk_nama'
	];

	public function deployment_tabels()
	{
		return $this->hasMany(DeploymentTabel::class, 'produk_id');
	}

	public function progress_lapangan_tabels()
	{
		return $this->hasMany(ProgressLapanganTabel::class, 'produk_id');
	}
	public function scopeRekapProduk($query){
		return $query->addSelect(DB::raw('
        COUNT(produk_id) - 1 as REKAP_PRODUK'));
	}
}
