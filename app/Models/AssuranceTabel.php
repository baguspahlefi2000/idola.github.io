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
		'last_work_log_date' => 'datetime:YYYY-MM-DD HH:MM:SS',
		'booking_date' => 'datetime:YYYY-MM-DD HH:MM:SS',
		'reported_date' => 'date:YYYY-MM-DD',
		'last_update_ticket' => 'datetime:YYYY-MM-DD HH:MM:SS',
		'status_date' => 'datetime:YYYY-MM-DD HH:MM:SS',
		'resolved_date' => 'datetime:YYYY-MM-DD HH:MM:SS'
	];

	protected $fillable = [
		'incident',
		'olo_id',
		'contact_name',
		'contact_phone',
		'contact_email',
		'summary',
		'owner_group',
		'owner',
		'last_updated_work_log',
		'last_work_log_date',
		'count_cust_info',
		'last_cust_info',
		'assigned_to',
		'booking_date',
		'assigned_by',
		'reported_priority',
		'source',
		'subsidiary',
		'external_ticket_id',
		'external_ticket_status',
		'segment',
		'channel',
		'customer_segment',
		'customer_type',
		'closed_by',
		'customer_id',
		'service_id',
		'service_no',
		'service_type',
		'top_priority',
		'slg',
		'technology',
		'datek',
		'rk_name',
		'ibooster_alert_id',
		'induk_gamas',
		'related_to_global_issue',
		'reported_date',
		'reported_time',
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
		'hasil_ukur',
		'osm_resolved_code',
		'last_update_ticket',
		'status_date',
		'resolved_by',
		'workzone',
		'witel_id',
		'regional',
		'incidents_symptom',
		'solutions_segment',
		'actual_solution',
		'incident_domain_id',
		'onu_rx_before_after',
		'scc_fisik_inet',
		'scc_logic',
		'complete_wo_by',
		'kode_produk',
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
        IF(pending_reason = "Travel time", ttr_customer + ttr_pending, 0) as TTR_E2E,
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
		return $query->join('incident_domain_tabel', 'incident_domain_tabel.incident_domain_id', '=', 'assurance_tabel.incident_domain_id')
		->addSelect(DB::raw('
		SUM(CASE WHEN incident_domain_tabel.incident_domain_nama LIKE "%DROPCORE%" THEN 1 ELSE 0 END) as REKAP_DROPCORE,
		SUM(CASE WHEN incident_domain_tabel.incident_domain_nama LIKE "%ODP%" THEN 1 ELSE 0 END) as REKAP_ODP,
		SUM(CASE WHEN incident_domain_tabel.incident_domain_nama LIKE "%CPE%" THEN 1 ELSE 0 END) as REKAP_CPE,
		SUM(CASE WHEN incident_domain_tabel.incident_domain_nama NOT REGEXP "DROPCORE|ODP|CPE" THEN 1 ELSE 0 END) as REKAP_ETC'));
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
		// filter reported_date
        if (request()->tgl_bulan_dr_assurance || request()->tgl_bulan_sd_assurance){
            $tgl_bulan_dr_assurance = Carbon::parse(request()->tgl_bulan_dr_assurance)->toDateTimeString();
            $tgl_bulan_sd_assurance = Carbon::parse(request()->tgl_bulan_sd_assurance)->toDateTimeString();
            $query->whereBetween('reported_date',[$tgl_bulan_dr_assurance,$tgl_bulan_sd_assurance]);
		}
	}


}
