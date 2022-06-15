@extends('template.main')

@section('contain')
<div class="container">
    <div class="row justify-content-center">
        <div class="container-fluid mt-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h4 class="form-title">Form Edit Deployment</h4>
                    <form action="{{ route('dep.update', $deployment->deployment_id) }}" method="POST" enctype="multipart/form-data"
                        name="deploymentAdd">
                        @csrf
                        @method('put')
                        <div class="form-row">
                            <div class="col">
                                <label for="tanggal">TGL/BLN/THN</label>
                                <input type="date" name="tanggal" id="tanggal" class="form-control" value="{{ $deployment->tanggal }}"></input>
                            </div>
                            <div class="col">
                                <label for="ao">NO. AO</label>
                                <input type="text" name="ao" id="ao" class="form-control" value="{{ $deployment->ao }}"></input>
                            </div>
                            <div class="col">
                                <label for="witel">WITEL</label>
                                <select name="witel" id="witel" class="form-control">
                                    <option value="{{ $deployment->witel_id }}">{{ $deployment->witel_tabel->witel_nama }}</option>
                                    @foreach ($witel_data as $item)
                                    <option value="{{ $item->witel_id }}">{{ $item->witel_nama }}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-row mt-3">
                            <div class="col">
                            <label for="olo">OLO / ISP</label>
                                <select name="olo" id="olo" class="form-control">
                                    <option value="{{ $deployment->olo_id }}">{{ $deployment->olo_tabel->olo_nama }}</option>
                                    @foreach ($olo_data as $item)
                                    <option value="{{ $item->olo_id }}">{{ $item->olo_nama }}</option>
                                    @endforeach
                                </select>
                            </div>    

                            <div class="col">
                            <label for="site_kriteria">SITE KRITERIA</label>
                                <select name="site_kriteria" id="site_kriteria" class="form-control">
                                    <option value="{{ $deployment->site_kriteria_id }}">{{ $deployment->site_kriteria_tabel->site_kriteria_nama}}</option>
                                    @foreach ($site_kriteria_data as $item)
                                    <option value="{{ $item->site_kriteria_id }}">{{ $item->site_kriteria_nama }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col">
                                 <label for="sid">SID</label>
                                 <input type="text" name="sid" id="sid" class="form-control" value="{{ $deployment->sid }}">
                            </div>
                        </div>

                        <div class="form-row mt-3">
                            <div class="col">
                                <label for="site_id">SITE ID</label>
                                <input type="text" name="site_id" id="site_id" class="form-control"
                                value="{{ $deployment->site_id }}"></input>
                            </div>

                            <div class="col">
                                <label for="order_type">ORDER TYPE</label>
                                    <select name="order_type" id="order_type" class="form-control">
                                        <option value="{{ $deployment->order_type_id }}">{{ $deployment->order_type_tabel->order_type_nama }}</option>
                                        @foreach ($order_type_data as $item)
                                        <option value="{{ $item->order_type_id }}">{{ $item->order_type_nama }}</option>
                                        @endforeach
                                </select>
                            </div>

                            <div class="col">
                                <label for="produk">PRODUK</label>
                                <select name="produk" id="produk" class="form-control">
                                    <option value="{{ $deployment->produk_id }}">{{ $deployment->produk_tabel->produk_nama }}</option>
                                    @foreach ($produk_data as $item)
                                    <option value="{{ $item->produk_id }}">{{ $item->produk_nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-row mt-3">
                            <div class="col">
                            <label for="satuan">SATUAN</label>
                            <select name="satuan" id="satuan" class="form-control">
                                <option value="{{ $deployment->satuan_id }}">{{ $deployment->satuan_tabel->satuan_nama }}</option>
                                @foreach ($satuan_data as $item)
                                <option value="{{ $item->satuan_id }}">{{ $item->satuan_nama }}</option>

                                @endforeach
                            </select>
                            </div>

                            <div class="col">
                                <label for="kapasitas_bw">KAPASITAS [BW]</label>
                                <input type="text" name="kapasitas_bw" id="kapasitas_bw" class="form-control"
                                value="{{ $deployment->kapasitas_bw }}">
                            </div>

                            <div class="col">
                                <label for="longitude">LONGITUDE</label>
                                <input type="text" name="longitude" id="longitude" class="form-control"
                                value="{{ $deployment->longitude }}">
                            </div>
                        </div>

                        <div class="form-row mt-3">
                            <div class="col">
                                <label for="latitude">LATITUDE</label>
                                <input type="text" name="latitude" id="latitude" class="form-control"
                                value="{{ $deployment->latitude }}">
                            </div>

                            <div class="col">
                                <label for="alamat asal">ALAMAT ASAL</label>
                                <textarea class="form-control" name="alamat_asal" id="alamat_asal" rows="1"
                                value="{{ $deployment->alamat_asal }}">{{ $deployment->alamat_asal }}</textarea>
                            </div>

                            <div class="col">
                                <label for="alamat_tujuan">ALAMAT TUJUAN</label>
                                 <textarea class="form-control" name="alamat_tujuan" id="alamat_tujuan" rows="1"
                                 value="{{ $deployment->alamat_tujuan }}">{{ $deployment->alamat_tujuan }}</textarea>
                            </div>
                        </div>

                        <div class="form-row mt-3">
                            <div class="col mt">
                                <label for="status_ncx">STATUS NCX</label>
                                    <select name="status_ncx" id="status_ncx" class="form-control">
                                    <option value="{{ $deployment->status_ncx_id }}">{{ $deployment->status_ncx_tabel->status_ncx_nama }}</option>
                                    @foreach ($status_ncx_data as $item)

                                    <option value="{{ $item->status_ncx_id }}">{{ $item->status_ncx_nama }}</option>

                                    @endforeach
                                </select>
                            </div>

                            <div class="col">
                                <label for="berita_acara">BERITA ACARA</label>
                                <input type="text" name="berita_acara" id="berita_acara" class="form-control"
                                value="{{ $deployment->berita_acara }}">
                            </div>

                            <div class="col">
                                <label for="tgl_complete_wfm">TGL COMPLETE WFM</label>
                                <input type="date" name="tgl_complete_wfm" id="tgl_complete_wfm" class="form-control"
                                value="{{ $deployment->tgl_complete_wfm }}">

                            </div>
                        </div>

                        <div class="form-row mt-3">
                            <div class="col">
                                <label for="status_wfm">STATUS WFM</label>
                                    <select name="status_wfm" id="status_wfm" class="form-control" onclick="display();">
                                        <option value="{{ $deployment->status_wfm_id }}">{{ $deployment->status_wfm_tabel->status_wfm_nama }}</option>
                                        @foreach ($status_wfm_data as $item)
                                        <option value="{{ $item->status_wfm_id }}">{{ $item->status_wfm_nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            <div class="col">
                                <label for="alasan_cancel">ALASAN CANCEL</label>
                                <input type="text" name="alasan_cancel" id="alasan_cancel" class="form-control"
                                value="{{ $deployment->alasan_cancel }}">
                            </div>
                            <div class="col">
                                <label for="cancel_by">CANCEL By</label>
                                <input type="text" name="cancel_by" id="cancel_by" class="form-control"
                                value="{{ $deployment->cancel_by }}">
                            </div>
                        </div>

                        <div class="form-row mt-3">
                            <div class="col">
                                <label for="start_cancel">START CANCEL DATE</label>
                                <input type="date" name="start_cancel" id="start_cancel" class="form-control"
                                value="{{ $deployment->start_cancel }}">
                            </div>

                            <div class="col">
                               <label for="ready_after_cancel">READY AFTER CANCEL</label>
                                <input type="date" name="ready_after_cancel" id="ready_after_cancel" class="form-control"
                                value="{{ $deployment->ready_after_cancel }}"></input>
                            </div>
                            <div class="form-row">
                                <div class="col-6">
                                <label for="status_integrasi" class="text-nowrap">STATUS INTEGRASI</label>
                                    <select name="status_integrasi" id="status_integrasi" class="form-control" onclick="display();">
                                        <option value="{{ $deployment->status_integrasi_id }}">{{ $deployment->status_integrasi_tabel->status_integrasi_nama }}</option>
                                        @foreach ($status_integrasi_data as $item)
                                        <option value="{{ $item->status_integrasi_id }}">{{ $item->status_integrasi_nama }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-6">
                                    <label for="tanggal_integrasi" class="text-nowrap">TANGGAL INTEGRASI</label>
                                    <input type="date" name="tanggal_integrasi" id="tanggal_integrasi_a" class="form-control"
                                        value="{{ $deployment->tanggal_integrasi }}"  disabled>
                                    </input>

                                    <input type="date" name="tanggal_integrasi_b" id="tanggal_integrasi_b" class="form-control"
                                        value="{{ $deployment->tanggal_integrasi }}">
                                    </input>
                                    
                                </div>
                            </div>
                        </div>


                        <div class="form-row" style = "margin-top:7vh">
                            <div class="col">
                                <label for="metro_backhaul">METRO BACKHAUL</label>
                                <input class="form-control" name="metro_backhaul" id="metro_backhaul" rows="3"
                                    value="{{ $deployment->metro_backhaul }}"></input>
                            </div>

                            <div class="col">
                            <label for="metro_access">METRO ACCESS</label>
                                <input type="text" name="metro_access" id="metro_access" class="form-control"
                                value="{{ $deployment->metro_access }}">
                            </div>
                        </div>

                        <div class="form-row mt">
                            <div class="col">
                                <label for="ip_1">IP ME BH</label>
                                <input type="text" name="ip_1" id="ip_1" class="form-control" value="{{ $deployment->ip_1 }}">
                            </div>

                            <div class="col">
                                <label for="port_1">PORT ME BH</label>
                                <input type="text" name="port_1" id="port_1" class="form-control" value="{{ $deployment->port_1 }}">
                            </div>

                            <div class="col">
                                <label for="ip_2">IP ME ACCESS</label>
                                <input type="text" name="ip_2" id="ip_2" class="form-control" value="{{ $deployment->ip_2 }}">
                            </div>

                            <div class="col">
                                <label for="port_2">PORT ME ACCESS</label>
                                <input type="text" name="port_2" id="port_2" class="form-control" value="{{ $deployment->port_2 }}">
                            </div>
                        </div>

                        <div class="form-row mt">
                            <div class="col">
                                <label for="capture metro backhaul">CAPTURE METRO BACKHAUL</label>
                                <textarea class="form-control" name="capture_metro_backhaul" id="capture_metro_backhaul" rows="3"
                                value="{{ $deployment->capture_metro_backhaul }}">{{ $deployment->capture_metro_backhaul }}</textarea>
                            </div>

                            <div class="col">
                            <label for="capture metro access">CAPTURE METRO ACCESS</label>
                                <textarea class="form-control" name="capture_metro_access" id="capture_metro_access" rows="3"
                                value="{{ $deployment->capture_metro_access }}">{{ $deployment->capture_metro_access }}</textarea>
                            </div>
                        </div>

                        <div class="form-row" style="margin-top : 7vh">
                            <div class="col">
                                <label for="vlan">VLAN</label>
                                <input type="text" name="vlan" id="vlan" class="form-control" value="{{ $deployment->vlan }}">
                            </div>   
                            <div class="col">
                                <label for="vcid">VCID</label>
                                <input type="text" name="vcid" id="vcid" class="form-control" value="{{ $deployment->vcid }}">
                            </div>
                        </div>

                        <div class="form-row" style="margin-top:7vh">
                            <div class="col">
                                <label for="gpon">GPON</label>
                                <input type="text" name="gpon" id="gpon" class="form-control" value="{{ $deployment->gpon }}">
                            </div>

                            <div class="col">
                                <label for="sn">SN ONT</label>
                                <input type="text" name="sn" id="sn" class="form-control" value="{{ $deployment->sn }}">
                            </div>

                        </div>

                        <div class="form-row">
                            <div class="col">
                                <label for="ip_3">IP GPON</label>
                                <input type="text" name="ip_3" id="ip_3" class="form-control" value="{{ $deployment->ip_3 }}"></input>
                            </div>

                            <div class="col">
                                <label for="port_3">PORT GPON</label>
                                <input type="text" name="port_3" id="port_3" class="form-control" value="{{ $deployment->port_3 }}">
                            </div>

                            <div class="col">
                                <label for="port_4">PORT ONT</label>
                                <input type="text" name="port_4" id="port_4" class="form-control" value="{{ $deployment->port_4 }}">
                            </div>
                            <div class="col">
                            <label for="jenis_nte">TYPE ONT</label>
                                <select class="form-control" id="jenis_nte" name="jenis_nte">
                                    <option value="{{ $deployment->jenis_nte_id }}">{{ $deployment->jenis_nte_tabel->jenis_nte_nama }}</option>
                                    <option value="">Pilih TYPE ONT</option>

                                    @foreach ($jenis_nte_data as $dbs)
                                    <option value="{{ $dbs->jenis_nte_id }}">{{ $dbs->jenis_nte_nama }}</option>
                                    @endforeach
                                </select>
                            </div>

                            
                        </div>

                        <div class="form-row">
                            <div class="col-6">
                                <label for="capture gpon">CAPTURE GPON</label>
                                <textarea class="form-control" name="capture_gpon" id="capture_gpon" rows="3"
                                value="{{ $deployment->capture_gpon }}">{{ $deployment->capture_gpon }}</textarea>
                            </div>

                            <div class="col-3" onclick="displayodp();"> 
                                <label for="odp">ODP</label>
                                <select name="odp" id="odp" class="form-control" onclick="displayodp();">
                                    @foreach ($status_odp_data as $item)
                                    <option value="{{ $item->odp_id }}">{{ $item->odp_nama }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-3">
                                <label for="isi_odp">NAMA ODP</label>
                                <input class="form-control" name="isi_odp" id="isi_odp" rows="3"
                                value="{{ $deployment->odp }}"></input>
                            </div>
                            
                            
                        </div>

                        <div class="form-row">
                        <div class="col-6">
                                
                            </div>
                            <div class="col-3">
                                <label for="isi_odp">PORT ODP</label>
                                <input type="text" name="port_odp" id="port_odp" value="{{$deployment->port_odp}}"class="form-control">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-6">
                            <label for="gponcapture" class="form-label">INPUT CAPTURE GPON</label>
                                <input type="file" name="gponcapture" class="form-control" id="validatedCustomFile"></input>
                            </div>
                            <div class="col">
                                <label for="kontak pic lokasi">KONTAK PIC LOKASI</label>
                                <textarea class="form-control" name="kontak_pic_lokasi" id="kontak_pic_lokasi" rows="1"
                                value="{{ $deployment->kontak_pic_lokasi }}">{{ $deployment->kontak_pic_lokasi }}</textarea>
                            </div>
                        </div>

                        <div class="form-row mt-3">
                            <div class="col-6">
                                    <label for="capture_gpon" class="form-label">IMAGE GPON</label>
                                    <!-- Trigger the Modal -->
                                    <img id="myImg" src="{{ asset('img/'. $deployment->gponcapture)}}" alt="{{$deployment->gponcapture}}" style="width:100%;max-width:50vw;max-height:100%;">

                                    <!-- The Modal -->
                                    <div id="myModal" class="modal">

                                    <!-- The Close Button -->
                                    <span class="close">&times;</span>

                                    <!-- Modal Content (The Image) -->
                                    <img class="modal-content" id="img01">

                                    <!-- Modal Caption (Image Text) -->
                                    <div id="caption"></div>
                                    </div>
                            </div>
                        </div>
                            
                        <div class="form-group text-right mt-4">
                            <a href="{{ route('deployment.index') }}" class="btn btn-white mr-2" type="reset">Cancel</a>
                            <button type="submit" class="btn btn-main" id="tombolSimpan">Simpan Data</button>
                        </div>        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
