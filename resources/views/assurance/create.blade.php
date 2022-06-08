@extends('template.main')

@section('contain')
<div class="container">
    <div class="row justify-content-center">
        <div class="container-fluid mt-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h4 class="form-title">Form New Assurance</h4>
                    <form action="{{ route('assurance.store') }}" method="POST" enctype="multipart/form-data"
                        name="deploymentAdd">
                        @csrf
                        <div class="form-row">
                            <div class="col">
                                <label for="incident">Incident</label>
                                <input type="text" name="incident" id="incident" class="form-control">     
                            </div>
                            <div class="col">
                                <label for="olo">OLO / ISP</label>
                                <select name="olo_id" id="olo_id" class="form-control" required>
                                <option value="">Pilih OLO</option>
                                    @foreach ($olo_data as $item)
                                    <option value="{{ $item->olo_id }}">{{ $item->olo_nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col">
                                <label for="contact_name">Contact Name</label>
                                <input type="text" name="contact_name" id="contact_name" class="form-control">     
                            </div>
                            <div class="col">
                                <label for="contact_phone">Contact phone</label>
                                <input type="text" name="contact_phone" id="contact_phone" class="form-control">     
                            </div>
                            
                        </div>

                        <div class="form-row mt-3">
                            <div class="col">
                                <label for="contact_email">Contact Email</label>
                                <input type="text" name="contact_email" id="contact_email" class="form-control">     
                            </div>
                            <div class="col">
                                <label for="summary">Summary</label>
                                <input type="text" name="summary" id="summary" class="form-control">
                            </div>
                            <div class="col">
                                <label for="owner_group">Owner Group</label>
                                <input type="text" name="owner_group" id="owner_group" class="form-control">
                            </div>
                            <div class="col">
                                <label for="owner">Owner</label>
                                <input type="text" name="owner" id="owner" class="form-control">
                            </div>
                        </div>

                        <div class="form-row mt-3">
                            
                            <div class="col">
                                <label for="last_updated_work_log">Last Updated Work Log</label>
                                <input type="text" name="last_updated_work_log" id="last_updated_work_log" class="form-control">
                            </div>
                            <div class="col">
                                <label for="last_updated_work_date">Last Updated Work Date</label>
                                <input type="text" name="last_updated_work_date" id="last_updated_work_date" class="form-control">
                            </div>
                            <div class="col">
                                <label for="count_cust_info">Count Cust Info</label>
                                <input type="text" name="NULL" id="NULL" class="form-control">
                            </div>
                        </div>

                        <div class="form-row mt-3">
                            
                            <div class="col">
                                <label for="assigned_to">Assigned To</label>
                                <input type="text" name="assigned_to" id="assigned_to" class="form-control">
                            </div>
                            <div class="col">
                                <label for="booking_date">Booking Date</label>
                                <input class="form-control" name="booking_date" id="booking_date">
                            </div>
                            <div class="col">
                                <label for="assigned_by">Assigned By</label>
                                <input class="form-control" name="assigned_by" id="assigned_by">
                            </div>
                            <div class="col">
                                <label for="reported_priority">Reported Priority</label>
                                <input class="form-control" name="reported_priority" id="reported_priority">
                            </div>
                        </div>

                        <div class="form-row mt-3">
                            
                            
                            <div class="col">
                                <label for="source">Source</label>
                                <input type="form-control" name="source" id="source" class="form-control">
                            </div>
                            <div class="col">
                                <label for="subsidiary">Subsidiary</label>
                                <input type="form-control" name="subsidiary" id="subsidiary" class="form-control">
                            </div>
                            <div class="col">
                                <label for="external_ticket_id">External Ticket ID</label>
                                <input type="form-control" name="external_ticket_id" id="external_ticket_id" class="form-control">
                            </div>
                            <div class="col">
                                <label for="segment">Segment</label>
                                <input type="form-control" name="segment" id="segment" class="form-control">
                            </div>
                        </div>

                        <div class="form-row mt-3">
                            <div class="col">
                                <label for="external_ticket_status">External Ticket Status</label>
                                <input type="form-control" name="external_ticket_status" id="external_ticket_status" class="form-control">
                            </div>
                            <div class="col">
                                <label for="channel">Channel</label>
                                <input type="form-control" name="channel" id="channel" class="form-control">
                            </div>
                            <div class="col">
                                <label for="customer_segment">Customer Segment</label>
                                <input type="form-control" name="customer_segment" id="customer_type" class="form-control">
                            </div>
                            <div class="col">
                                <label for="closed_by">Closed By</label>
                                <input type="form-control" name="closed_by" id="closed_by" class="form-control">
                            </div>
                        </div>

                        <div class="form-row mt-3">
                                <div class="col">
                                    <label for="customer_id">Customer ID</label>
                                    <input type="form-control" name="customer_id" id="customer_id" class="form-control">
                                </div>
                                <div class="col">
                                    <label for="service_id">Service ID</label>
                                    <input type="form-control" name="service_id" id="service_id" class="form-control">
                                </div>
    
                                <div class="col">
                                    <label for="service_no">Service NO</label>
                                    <input type="form-control" name="service_no" id="service_no" class="form-control">
                                </div>
                                <div class="col">
                                    <label for="service_type">Service Type</label>
                                    <input type="form-control" name="service_type" id="service_type" class="form-control">
                                </div>
                        </div>

                        <div class="form-row mt-3">
                            <div class="col">
                                <label for="top_priority">Top Priority</label>
                                <input type="text" name="top_priority" id="top_priority" class="form-control">
                            </div>

                            <div class="col">
                                <label for="slg">SLG</label>
                                <input type="text" name="slg" id="slg" class="form-control">
                            </div>

                            <div class="col">
                                <label for="technology">Technology</label>
                                <input type="text" name="technology" id="technology" class="form-control">
                            </div>
                            <div class="col">
                                <label for="datek">Datek</label>
                                <input type="form-control" name="datek" id="datek" class="form-control">
                            </div>
                        </div>

                        <div class="form-row mt">
                            <div class="col">
                                <label for="datek">RK Name</label>
                                <input type="form-control" name="rk_name" id="rk_name   " class="form-control">
                            </div>
                            <div class="col">
                                <label for="ibooster_alert_ID">IBooster Alert ID</label>
                                <input type="form-control" name="ibooster_alert_ID" id="vlan" class="form-control">
                            </div>   
                            <div class="col">
                                <label for="induk_gamas">Induk Gamas</label>
                                <input type="form-control" name="induk_gamas" id="induk_gamas" class="form-control">
                            </div>
                            <div class="col">
                                <label for="related_to_gpon_issue">Related To Gpon Issue</label>
                                <input type="text" name="related_to_gpon_issue" id="related_to_gpon_issue" class="form-control" >
                            </div>
                        </div>

                        <div class="form-row" style="margin-top:7vh">
                            <div class="col">
                                <label for="reported_date">Reported Date</label>
                                <input type="form-control" name="reported_Date" id="reported_date" class="form-control">
                            </div>
                            <div class="col">
                                <label for="reported_time">Reported Time</label>
                                <input type="form-control" name="reported_time" id="reported_time" class="form-control">
                            </div>
                            <div class="col">
                                <label for="lapul">Lapul</label>
                                <input type="text" name="lapul" id="lapul" class="form-control">
                            </div>
                            <div class="col">
                                <label for="lapul">Gaul</label>
                                <input type="form-control" name="gaul" id="gaul" class="form-control">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col">
                                <label for="ttr_customer">TTR Customer</label>
                                <input type="form-control" name="ttr_customer" id="ttr_customer" class="form-control">
                            </div>
                            <div class="col">
                                <label for="ttr_nasional">TTR Nasional</label>
                                <input type="form-control" name="ttr_nasional" id="ttr_nasional" class="form-control">
                            </div>
                            <div class="col">
                                <label for="ttr_regional">TTR Regional</label>
                                <input type="form-control" name="ttr_regional" id="ttr_regional" class="form-control">
                            </div>
                            <div class="col">
                                <label for="ttr_witel">TTR Witel</label>
                                <input type="form-control" name="ttr_regional" id="ttr_regional" class="form-control">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col">
                                <label for="ttr_mitra">TTR Mitra</label>
                                <input type="form-control" name="ttr_mitra" id="ttr_mitra" class="form-control">
                            </div>
                            <div class="col">
                                <label for="ttr_agent">TTR Agent</label>
                                <input type="form-control" name="ttr_agent" id="ttr_agent" class="form-control">
                            </div>
                            <div class="col">
                                <label for="ttr_pending">TTR Pending</label>
                                <input type="form-control" name="ttr_pending" id="ttr_agent" class="form-control">
                            </div>
                            <div class="col">
                                <label for="pending_reason">Pending Reason</label>
                                <input class="form-control" name="pending_reason" id="pending_reason">
                            </div>
                        </div>

                        <div class="form-row">     
                            <div class="col">
                                <label for="status">Status</label>
                                <input type="form-control" name="status" id="status" class="form-control">
                            </div>
                            <div class="col">
                                <label for="hasil_ukur">Hasil Ukur</label>
                                <input type="form-control" name="hasil_ukur" id="hasil_ukur" class="form-control">
                            </div>
                            <div class="col">
                                <label for="osm_reason_code">Osm Reason Code</label>
                                <input class="form-control" name="osm_reason_code" id="osm_reason_code">
                            </div>
                            <div class="col">
                                <label for="last_update_ticket">Last Update Ticket</label>
                                <input type="form-control" name="last_update_ticket" id="last_update_ticket" class="form-control">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col">
                                <label for="status_date">Status Date</label>
                                <input type="form-control" name="hasil_ukur" id="hasil_ukur" class="form-control">
                            </div>
                            <div class="col">
                                <label for="resolved_by">Resolved By</label>
                                <input class="form-control" name="resolved_by" id="resolved_by">
                            </div>
                            <div class="col">
                                <label for="workzone">Workzone</label>
                                <input type="form-control" name="last_update_ticket" id="last_update_ticket" class="form-control">
                            </div>
                            <div class="col">
                                <label for="witel">Witel</label>
                                <select name="witel_id" id="witel_id" class="form-control" required>
                                <option value="">Pilih WITEL</option>
                                    @foreach ($witel_data as $item)
                                    <option value="{{ $item->witel_id }}">{{ $item->witel_nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col">
                                <label for="regional">Regional</label>
                                <input class="form-control" name="regional" id="regional">
                            </div>
                            <div class="col">
                                <label for="incidents_symptom">Incident Symptom</label>
                                <input type="form-control" name="incidents_symptom" id="incidents_symptom" class="form-control">
                            </div>
                            <div class="col">
                                <label for="incident_domain_id">Solution Domain ID</label>
                                <select name="incident_domain_id" id="incident_domain_id" class="form-control" required>
                                <option value="">Pilih Solution Domain</option>
                                    @foreach ($incident_domain_data as $item)
                                    <option value="{{ $item->incident_domain_id }}">{{ $item->incident_domain_nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col">
                                <label for="onu_rx_before_after">ONU RX Before After</label>
                                <input class="form-control" name="onu_rx_before_after" id="onu_rx_before_after">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col">
                                <label for="scc_fisik_inet">SCC Fisik Inet</label>
                                <input type="form-control" name="scc_fisik_inet" id="scc_fisik_inet" class="form-control">
                            </div>
                            <div class="col">
                                <label for="scc_logic">SCC Logic</label>
                                <input type="form-control" name="scc_logic" id="scc_logic" class="form-control">
                            </div>
                            <div class="col">
                                <label for="complete_wo_by">Complete WO By</label>
                                <input class="form-control" name="complete_wo_by" id="complete_wo_by">
                            </div>
                            <div class="col">
                                <label for="kode_produk">Kode Produk</label>
                                <input type="form-control" name="kode_produk" id="kode_produk" class="form-control">
                            </div>
                            <div class="col">
                                <label for="resolved_date">Resolved Date</label>
                                <input type="form-control" name="resolved_date" id="resolved_date" class="form-control">
                            </div>
                        </div>
                        <div class="form-group text-right mt-4">
                            <a href="{{ route('assurance.index') }}" class="btn btn-white mr-2" type="reset">Cancel</a>
                            <button type="submit" class="btn btn-main" id="tombolSimpan">Simpan Data</button>
                        </div>        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
