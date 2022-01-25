<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class OrderTypeTabel
 * 
 * @property int $order_type_id
 * @property string|null $order_type_nama
 * 
 * @property Collection|DeploymentTabel[] $deployment_tabels
 *
 * @package App\Models
 */
class OrderTypeTabel extends Model
{
	protected $table = 'order_type_tabel';
	protected $primaryKey = 'order_type_id';
	public $timestamps = false;

	protected $fillable = [
		'order_type_nama'
	];

	public function deployment_tabels()
	{
		return $this->hasMany(DeploymentTabel::class, 'order_type_id');
	}
}
