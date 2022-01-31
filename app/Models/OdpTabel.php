<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class OdpTabel
 * 
 * @property int $odp_id
 * @property string|null $odp_nama
 * 
 * @property Collection|DeploymentTabel[] $deployment_tabels
 *
 * @package App\Models
 */
class OdpTabel extends Model
{
	protected $table = 'odp_tabel';
	protected $primaryKey = 'odp_id';
	public $timestamps = false;

	protected $fillable = [
		'odp_nama'
	];

	public function deployment_tabels()
	{
		return $this->hasMany(DeploymentTabel::class, 'odp_id');
	}
}
