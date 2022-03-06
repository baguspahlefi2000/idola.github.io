<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * Class WitelTabel
 * 
 * @property int $witel_id
 * @property string|null $witel_nama
 * 
 * @property Collection|DeploymentTabel[] $deployment_tabels
 * @property Collection|ProgressLapanganTabel[] $progress_lapangan_tabels
 *
 * @package App\Models
 */
class WitelTabel extends Model
{
	protected $table = 'witel_tabel';
	protected $primaryKey = 'witel_id';
	public $timestamps = false;

	protected $fillable = [
		'witel_nama'
	];

	public function deployment_tabels()
	{
		return $this->hasMany(DeploymentTabel::class, 'witel_id');
	}

	public function progress_lapangan_tabels()
	{
		return $this->hasMany(ProgressLapanganTabel::class, 'witel_id');
	}

	public function assurance_tabels()
	{
		return $this->hasMany(AssuranceTabel::class, 'witel_id');
	}

	public function scopeRekapWitel($query){
		return $query->addSelect(DB::raw('
        COUNT(witel_id) - 1 as REKAP_WITEL'));
	}
}
