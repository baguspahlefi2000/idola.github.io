<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AssuranceTabel extends Model
{
	protected $table = 'assurance_tabel';
	protected $primaryKey = 'assurance_id';
	public $timestamps = false;

	protected $casts = [
		'olo_id' => 'int',
		'witel_id' => 'int'
	];


	protected $dates = [
		'resolved_date' => 'date'
	];

	protected $fillable = [
		'incident',
		'olo_id',
		'contact_email',
		'summary',
		'owner_group',
		'channel',
		'customer_segment',
		'service_id',
		'service_no',
		'service_type',
		'top_priority',
		'related_to_global_issue',
		'lapul',
		'gaul',
		'ttr_customer',
		'ttr_nasional',
		'ttr_regional',
		'ttr_witel',
		'ttr_mitra',
		'ttr_agent',
		'ttr_pending',
		'pending_reason',
		'workzone',
		'witel_id',
		'regional',
		'incidents_symptom',
		'solutions_segment',
		'actual_solution',
		'incident_domain',
		'resolved_date'
	];

	public function assurance_id_tabel()
	{
		return $this->belongsTo(assuranceIdTabel::class, 'assurance_id');
	}

	public function witel_tabel()
	{
		return $this->belongsTo(WitelTabel::class, 'witel_id');
	}

	public function olo_tabel()
	{
		return $this->belongsTo(OloTabel::class, 'olo_id');
	}

	public function scopeFirstCal($query){
		return $query->join('olo_tabel', 'olo_tabel.olo_id', '=', 'assurance_tabel.olo_id')
		->join('witel_tabel', 'witel_tabel.witel_id', '=', 'assurance_tabel.witel_id')
		->groupBy('incident')
		->addSelect(DB::raw(' *,
        SUM(ttr_customer + ttr_pending) as TTR_E2E,
		olo_tabel.olo_nama as REKAP_OLO_NAMA,
		witel_tabel.witel_nama as REKAP_WITEL_NAMA'));
	}

	public function scopeSecondCal($query){
		return $query
		->addSelect(DB::raw('AVG(ttr_customer + ttr_pending) as MTTR'));
	}

	public function scopeThirdCal($query){
		return $query
		->addSelect(DB::raw('
        SUM(CASE WHEN ttr_pending >= 5  THEN 1 ELSE 0 END) as NOT_COMPLY,
		SUM(CASE WHEN ttr_pending <= 5  THEN 1 ELSE 0 END) as COMPLY'));
	}

	public function scopeFourthCal($query){
		return $query->addSelect(DB::raw('
        COUNT(assurance_id) as REKAP_ASSURANCE'));
	}

}
