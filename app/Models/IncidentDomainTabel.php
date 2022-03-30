<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class IncidentDomainTabel extends Model
{
	protected $table = 'incident_domain_tabel';
	protected $primaryKey = 'incident_domain_id';
	public $timestamps = false;

	protected $fillable = [
		'incident_domain_nama'
	];

	public function deployment_tabels()
	{
		return $this->hasMany(AssuranceTabel::class, 'incident_domain_id');
	}

}
