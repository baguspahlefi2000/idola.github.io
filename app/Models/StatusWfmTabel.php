<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class StatusWfmTabel
 * 
 * @property int $status_wfm_id
 * @property string|null $status_wfm_nama
 * 
 * @property Collection|DeploymentTabel[] $deployment_tabels
 * 
 *
 * @package App\Models
 */
class StatusWfmTabel extends Model
{
	protected $table = 'status_wfm_tabel';
	protected $primaryKey = 'status_wfm_id';
	public $timestamps = false;

	protected $fillable = [
		'status_wfm_nama'
	];

	public function deployment_tabels()
	{
		return $this->hasMany(DeploymentTabel::class, 'status_wfm_id');
	}
}
