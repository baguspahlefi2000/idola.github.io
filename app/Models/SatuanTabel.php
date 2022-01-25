<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class SatuanTabel
 * 
 * @property int $satuan_id
 * @property string|null $satuan_nama
 * 
 * @property Collection|DeploymentTabel[] $deployment_tabels
 *
 * @package App\Models
 */
class SatuanTabel extends Model
{
	protected $table = 'satuan_tabel';
	protected $primaryKey = 'satuan_id';
	public $timestamps = false;

	protected $fillable = [
		'satuan_nama'
	];

	public function deployment_tabels()
	{
		return $this->hasMany(DeploymentTabel::class, 'satuan_id');
	}
}
