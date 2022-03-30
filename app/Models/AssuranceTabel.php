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
		'contact',
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
		'status',
		'workzone',
		'witel_id',
		'regional',
		'incidents_symptom',
		'solutions_segment',
		'actual_solution',
		'incident_domain_id',
		'resolved_date',
		'resolved_time'
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

	public function incident_domain_tabel()
	{
		return $this->belongsTo(IncidentDomainTabel::class, 'incident_domain_id');
	}

	public function scopeFirstCal($query){
		return $query->join('olo_tabel', 'olo_tabel.olo_id', '=', 'assurance_tabel.olo_id')
		->join('witel_tabel', 'witel_tabel.witel_id', '=', 'assurance_tabel.witel_id')
		->join('incident_domain_tabel', 'incident_domain_tabel.incident_domain_id', '=', 'assurance_tabel.incident_domain_id')
		->groupBy('assurance_id')
		->addSelect(DB::raw(' *,
        SUM(ttr_customer + ttr_pending) as TTR_E2E,
		olo_tabel.olo_nama as REKAP_OLO_NAMA,
		witel_tabel.witel_nama as REKAP_WITEL_NAMA,
		incident_domain_tabel.incident_domain_nama as INCIDENT_DOMAIN_NAMA'));
	}

	public function scopeSecondCal($query){
		return $query
		->addSelect(DB::raw('CAST(AVG (ttr_customer + ttr_pending) AS DECIMAL (12,2)) as MTTR'));
	}

	public function scopeThirdCal($query){
		return $query
		->addSelect(DB::raw('
        SUM(CASE WHEN ttr_pending > 5  THEN 1 ELSE 0 END) as NOT_COMPLY,
		SUM(CASE WHEN ttr_pending <= 5  THEN 1 ELSE 0 END) as COMPLY'));
	}

	public function scopeFourthCal($query){
		return $query->addSelect(DB::raw('
        COUNT(assurance_id) as REKAP_ASSURANCE'));
	}

	public function scopeFifthCal($query){
		return $query->addSelect(DB::raw('
		SUM(CASE WHEN incident_domain_id = "1" THEN 1 ELSE 0 END) as REKAP_CPE,
		SUM(CASE WHEN incident_domain_id = "5" THEN 1 ELSE 0 END) + SUM(CASE WHEN incident_domain_id = "8" THEN 1 ELSE 0 END) as REKAP_ODP,
        SUM(CASE WHEN incident_domain_id = "2" THEN 1 ELSE 0 END) + SUM(CASE WHEN incident_domain_id = "3" THEN 1 ELSE 0 END)
		+ SUM(CASE WHEN incident_domain_id = "6" THEN 1 ELSE 0 END) + SUM(CASE WHEN incident_domain_id = "13" THEN 1 ELSE 0 END) as REKAP_DROPCORE,
		SUM(CASE WHEN incident_domain_id = "4" THEN 1 ELSE 0 END) + SUM(CASE WHEN incident_domain_id = "7" THEN 1 ELSE 0 END)
		+ SUM(CASE WHEN incident_domain_id = "9" THEN 1 ELSE 0 END) + SUM(CASE WHEN incident_domain_id = "11" THEN 1 ELSE 0 END) 
		+ SUM(CASE WHEN incident_domain_id = "15" THEN 1 ELSE 0 END) + SUM(CASE WHEN incident_domain_id = "16" THEN 1 ELSE 0 END) 
		+ SUM(CASE WHEN incident_domain_id = "17" THEN 1 ELSE 0 END) + SUM(CASE WHEN incident_domain_id = "18" THEN 1 ELSE 0 END) 
		+ SUM(CASE WHEN incident_domain_id = "19" THEN 1 ELSE 0 END) + SUM(CASE WHEN incident_domain_id = "20" THEN 1 ELSE 0 END) 
		+ SUM(CASE WHEN incident_domain_id = "21" THEN 1 ELSE 0 END) + SUM(CASE WHEN incident_domain_id = "22" THEN 1 ELSE 0 END) 
		+ SUM(CASE WHEN incident_domain_id = "25" THEN 1 ELSE 0 END) as REKAP_LAIN'));
	}

	public function scopeSixthCal($query){
		return $query->join('olo_tabel', 'olo_tabel.olo_id', '=', 'assurance_tabel.olo_id')
		->groupBy('assurance_tabel.olo_id')
		->addSelect(DB::raw('
        COUNT(assurance_tabel.olo_id) as REKAP_ASSURANCE,
		olo_tabel.olo_nama as REKAP_OLO_NAMA'))
        ->orderBy('REKAP_ASSURANCE', 'DESC');
	}

	public function scopeFilter($query, array $filters){
		// filter resolved_date
        if (request()->tgl_bulan_dr_assurance || request()->tgl_bulan_sd_assurance){
            $tgl_bulan_dr_assurance = Carbon::parse(request()->tgl_bulan_dr_assurance)->toDateTimeString();
            $tgl_bulan_sd_assurance = Carbon::parse(request()->tgl_bulan_sd_assurance)->toDateTimeString();
            $query->whereBetween('resolved_date',[$tgl_bulan_dr_assurance,$tgl_bulan_sd_assurance]);
		}
	}


}
