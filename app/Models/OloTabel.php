<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class OloTabel
 * 
 * @property int $olo_id
 * @property string|null $olo_nama
 * 
 * @property Collection|DeploymentTabel[] $deployment_tabels
 * @property Collection|ProgressLapanganTabel[] $progress_lapangan_tabels
 *
 * @package App\Models
 */
class OloTabel extends Model
{
	protected $table = 'olo_tabel';
	protected $primaryKey = 'olo_id';
	public $timestamps = false;

	protected $fillable = [
		'olo_nama'
	];

	public function deployment_tabels()
	{
		return $this->hasMany(DeploymentTabel::class, 'olo_id');
	}

	public function progress_lapangan_tabels()
	{
		return $this->hasMany(ProgressLapanganTabel::class, 'olo_id');
	}
}
