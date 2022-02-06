<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class StatusIntegrasiTabel
 * 
 * @property int $status_integrasi_id
 * @property string|null $status_integrasi_nama
 * 
 * @property Collection|DeploymentTabel[] $deployment_tabels
 *
 * @package App\Models
 */
class StatusIntegrasiTabel extends Model
{
	protected $table = 'status_integrasi_tabel';
	protected $primaryKey = 'status_integrasi_id';
	public $timestamps = false;

	protected $fillable = [
		'status_integrasi_nama'
	];

	public function deployment_tabels()
	{
		return $this->hasMany(DeploymentTabel::class, 'status_integrasi_id');
	}
}
