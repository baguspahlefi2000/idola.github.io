<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class SiteKriteriaTabel
 * 
 * @property int $site_kriteria_id
 * @property string|null $site_kriteria_nama
 * 
 * @property Collection|DeploymentTabel[] $deployment_tabels
 *
 * @package App\Models
 */
class SiteKriteriaTabel extends Model
{
	protected $table = 'site_kriteria_tabel';
	protected $primaryKey = 'site_kriteria_id';
	public $timestamps = false;

	protected $fillable = [
		'site_kriteria_nama'
	];

	public function deployment_tabels()
	{
		return $this->hasMany(DeploymentTabel::class, 'site_kriteria_id');
	}
}
