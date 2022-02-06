<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class JenisNteTabel
 * 
 * @property int $jenis_nte_id
 * @property string|null $jenis_nte_nama
 * 
 * @property Collection|DeploymentTabel[] $deployment_tabels
 *
 * @package App\Models
 */
class JenisNteTabel extends Model
{
	protected $table = 'jenis_nte_tabel';
	protected $primaryKey = 'jenis_nte_id';
	public $timestamps = false;

	protected $fillable = [
		'jenis_nte_nama'
	];

	public function deployment_tabels()
	{
		return $this->hasMany(DeploymentTabel::class, 'jenis_nte_id');
	}
}
