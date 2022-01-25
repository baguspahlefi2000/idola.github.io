<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class StatusPLapanganTabel
 * 
 * @property int $status_p_lapangan_id
 * @property string|null $status_p_lapangan_nama
 * 
 * @property Collection|ProgressLapanganTabel[] $progress_lapangan_tabels
 *
 * @package App\Models
 */
class StatusPLapanganTabel extends Model
{
	protected $table = 'status_p_lapangan_tabel';
	protected $primaryKey = 'status_p_lapangan_id';
	public $timestamps = false;

	protected $fillable = [
		'status_p_lapangan_nama'
	];

	public function progress_lapangan_tabels()
	{
		return $this->hasMany(ProgressLapanganTabel::class, 'status_p_lapangan_id');
	}
}
