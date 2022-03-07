<?php


class IncidentDomainTabel extends Model
{
	protected $table = 'incident_domain_tabel';
	protected $primaryKey = 'incident_domain_id';
	public $timestamps = false;

	protected $fillable = [
		'indicent_domain_nama'
	];

	public function deployment_tabels()
	{
		return $this->hasMany(DeploymentTabel::class, 'produk_id');
	}

}
