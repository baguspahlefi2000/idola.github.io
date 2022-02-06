<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class StatusDisconnectDetailTabel
 * 
 * @property int $status_disconnect_detail_id
 * @property string|null $status_disconnect_detail_nama
 * 
 * @property Collection|DeploymentTabel[] $deployment_tabels
 *
 * @package App\Models
 */
class StatusDisconnectDetailTabel extends Model
{
	protected $table = 'status_disconnect_detail_tabel';
	protected $primaryKey = 'status_disconnect_detail_id';
	public $timestamps = false;

	protected $fillable = [
		'status_disconnect_detail_nama'
	];

	public function deployment_tabels()
	{
		return $this->hasMany(DeploymentTabel::class, 'status_disconnect_detail_id');
	}
}
