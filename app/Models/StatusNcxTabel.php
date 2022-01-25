<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class StatusNcxTabel
 * 
 * @property int $status_ncx_id
 * @property string|null $status_ncx_nama
 * 
 * @property Collection|DeploymentTabel[] $deployment_tabels
 *
 * @package App\Models
 */
class StatusNcxTabel extends Model
{
	protected $table = 'status_ncx_tabel';
	protected $primaryKey = 'status_ncx_id';
	public $timestamps = false;

	protected $fillable = [
		'status_ncx_nama'
	];

	public function deployment_tabels()
	{
		return $this->hasMany(DeploymentTabel::class, 'status_ncx_id');
	}
}
