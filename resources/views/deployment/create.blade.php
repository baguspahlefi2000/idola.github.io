@extends('template.main')

@section('contain')
<div class="container">
    <div class="row justify-content-center">
        <div class="container-fluid mt-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h4 class="form-title">Form New Deployment</h4>
                    <form action="{{ route('dep.store') }}" method="POST" enctype="multipart/form-data"
                        name="deploymentAdd">
                        @csrf
                        <div class="form-row">
                            <div class="col">
                            <label for="tanggal">TGL/BLN/THN</label>
                            <input type="date" name="tanggal" id="tanggal" class="form-control" required>
                            </div>

                            <div class="col">
                                <label for="ao">NO. AO</label>
                                <input type="text" name="ao" id="ao" class="form-control">
                            </div>
                            <div class="col">
                                <label for="witel">WITEL</label>
                                <select name="witel" id="witel" class="form-control" required>
                                <option value="">Pilih Witel</option>
                                    @foreach ($witel_data as $item)
                                    <option value="{{ $item->witel_id }}">{{ $item->witel_nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-row mt-3">
                            <div class="col">
                                <label for="olo">OLO / ISP</label>
                                <select name="olo" id="olo" class="form-control" required>
                                <option value="">Pilih OLO</option>
                                    @foreach ($olo_data as $item)
                                    <option value="{{ $item->olo_id }}">{{ $item->olo_nama }}</option>
                                    @endforeach
                                </select>
                            </div>    
                            <div class="col">
                                <label for="site_kriteria">SITE KRITERIA</label>
                                <select name="site_kriteria" id="site_kriteria" class="form-control" required>
                                <option value="">Pilih Site Kriteria</option>
                                    @foreach ($site_kriteria_data as $item)
                                    <option value="{{ $item->site_kriteria_id }}">{{ $item->site_kriteria_nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col">
                                <label for="sid">SID</label>
                                <input type="text" name="sid" id="sid" class="form-control">
                            </div>
                        </div>

                        <div class="form-row mt-3">
                            <div class="col">
                                <label for="site_id">SITE ID</label>
                                <input type="text" name="site_id" id="site_id" class="form-control">
                            </div>
                            <div class="col">
                                <label for="order_type">ORDER TYPE</label>
                                <select name="order_type" id="order_type" class="form-control" required>
                                <option value="">Pilih Order Type</option>
                                    @foreach ($order_type_data as $item)
                                    <option value="{{ $item->order_type_id }}">{{ $item->order_type_nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col">
                                <label for="produk">PRODUK</label>
                                <select name="produk" id="produk" class="form-control" required>
                                <option value="">Pilih Produk</option>
                                    @foreach ($produk_data as $item)
                                    <option value="{{ $item->produk_id }}">{{ $item->produk_nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-row mt-3">
                            <div class="col">
                            <label for="satuan">SATUAN</label>
                            <select name="satuan" id="satuan" class="form-control" required>
                            <option value="">Pilih Satuan</option>
                                @foreach ($satuan_data as $item)
                                <option value="{{ $item->satuan_id }}">{{ $item->satuan_nama }}</option>
                                @endforeach
                            </select>
                            </div>
                            <div class="col">
                                <label for="kapasitas_bw">KAPASITAS [BW]</label>
                                <input type="text" name="kapasitas_bw" id="kapasitas_bw" class="form-control">
                            </div>
                            <div class="col">
                                <label for="longitude">LONGITUDE</label>
                                <input type="text" name="longitude" id="longitude" class="form-control">
                            </div>
                        </div>

                        <div class="form-row mt-3">
                            <div class="col">
                            <label for="latitude">LATITUDE</label>
                            <input type="text" name="latitude" id="latitude" class="form-control">
                            </div>
                            <div class="col">
                                <label for="alamat asal">ALAMAT ASAL</label>
                                <textarea class="form-control" name="alamat_asal" id="alamat_asal" rows="1"></textarea>
                            </div>
                            <div class="col">
                                <label for="alamat_tujuan">ALAMAT TUJUAN</label>
                                <textarea class="form-control" name="alamat_tujuan" id="alamat_tujuan" rows="1"></textarea>
                            </div>
                        </div>

                        <div class="form-row mt-3">
                            <div class="col">
                                <label for="status_ncx">STATUS NCX</label>
                                <select name="status_ncx" id="status_ncx" class="form-control" required>
                                <option value="">Pilih Status NCX</option>
                                    @foreach ($status_ncx_data as $item)
                                    <option value="{{ $item->status_ncx_id }}">{{ $item->status_ncx_nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col">
                                <label for="berita_acara">BERITA ACARA</label>
                                <input type="text" name="berita_acara" id="berita_acara" class="form-control">
                            </div>
                            <div class="col">
                                <label for="tgl_complete_wfm">TGL COMPLETE WFM</label>
                                <input type="date" name="tgl_complete_wfm" id="tgl_complete_wfm" class="form-control">
                            </div>
                        </div>

                        <div class="form-row mt-3">
                            <div class="col">
                                <label for="status_nfm">STATUS WFM</label>
                                <input type="text" name="status_wfm" id="status_nfm" class="form-control">
                            </div>
                            <div class="col">
                                <label for="alasan_cancel">ALASAN CANCEL</label>
                                <input type="text" name="alasan_cancel" id="alasan_cancel" class="form-control">
                            </div>
                            <div class="col">
                                <label for="cancel_by">CANCEL By</label>
                                <input type="text" name="cancel_by" id="cancel_by" class="form-control">
                            </div>
                        </div>

                        <div class="form-row mt-3">
                            <div class="col">
                                <label for="start_cancel">START CANCEL DATE</label>
                                <input type="date" name="start_cancel" id="start_cancel" class="form-control">
                            </div>
                            <div class="col">
                                <label for="ready_after_cancel">READY AFTER CANCEL</label>
                                <input type="date" name="ready_after_cancel" id="ready_after_cancel" class="form-control">
                            </div>
                            <div class="form-row">
                                <div class="col-5">
                                    <label for="start_cancel">STATUS INTEGRASI</label>
                                    <select name="status_integrasi" id="status_integrasi" class="form-control" onclick="display();" required>
                                        @foreach ($status_integrasi_data as $item)
                                        <option value="{{ $item->status_integrasi_id }}">{{ $item->status_integrasi_nama }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-7">
                                    <label for="tanggal_integrasi">TANGGAL INTEGRASI</label>
                                    <input type="date" name="tanggal_integrasi" id="tanggal_integrasi_a" class="form-control" disabled>
                                    </input>

                                    <input type="date" name="tanggal_integrasi_b" id="tanggal_integrasi_b" class="form-control">
                                    </input>
                                    
                                </div>
                            </div>
                        </div>


                        <div class="form-row" style = "margin-top:7vh">
                        <div class="col">
                                <label for="metro_backhaul">METRO BACKHAUL</label>
                                <input class="form-control" name="metro_backhaul" id="metro_backhaul" rows="3"></input>
                            </div>

                            <div class="col">
                                <label for="metro_access">METRO ACCESS</label>
                                <input class="form-control" name="metro_access" id="metro_access" rows="3"></input>
                            </div>
                        </div>

                        <div class="form-row mt">
                            <div class="col">
                                    <label for="ip_1">IP ME BH</label>
                                    <input type="text" name="ip_1" id="ip_1" class="form-control">
                            </div>

                            <div class="col">
                                <label for="port_1">PORT ME BH</label>
                                <input type="text" name="port_1" id="port_1" class="form-control">
                            </div>

                            <div class="col">
                                <label for="ip_2">IP ME ACCESS</label>
                                <input type="text" name="ip_2" id="ip_2" class="form-control">
                            </div>

                            <div class="col">
                                <label for="port_2">PORT ME ACCESS</label>
                                <input type="text" name="port_2" id="port_2" class="form-control">
                            </div>
                        </div>

                        <div class="form-row mt">
                            <div class="col">
                                <label for="capture_metro_backhaul">CAPTURE METRO BACKHAUL</label>
                                <textarea class="form-control" name="capture_metro_backhaul" id="capture_metro_backhaul" rows="3"></textarea>
                            </div>
                            <div class="col">
                                <label for="capture_metro_access">CAPTURE METRO ACCESS</label>
                                <textarea class="form-control" name="capture_metro_access" id="capture_metro_access" rows="3"></textarea>
                            </div>
                        </div>

                        <div class="form-row" style="margin-top : 7vh">
                            <div class="col">
                                <label for="vlan">VLAN</label>
                                <input type="text" name="vlan" id="vlan" class="form-control">
                            </div>   
                            <div class="col">
                                <label for="vcid">VCID</label>
                                <input type="text" name="vcid" id="vcid" class="form-control">
                            </div>
                        </div>

                        <div class="form-row" style="margin-top:7vh">
                            <div class="col">
                                    <label for="gpon">GPON</label>
                                    <input type="text" name="gpon" id="gpon" class="form-control" ></input>
                            </div>

                            <div class="col">
                                <label for="sn">SN ONT</label>
                                <input type="text" name="sn" id="sn" class="form-control">
                            </div>

                        </div>

                        <div class="form-row">
                            <div class="col">
                                <label for="ip_3">IP GPON</label>
                                <input type="text" name="ip_3" id="ip_3" class="form-control">
                            </div>

                            <div class="col">
                                <label for="port_3">PORT GPON</label>
                                <input type="text" name="port_3" id="port_3" class="form-control">
                            </div>

                          

                            <div class="col">
                                    <label for="port_4">PORT ONT</label>
                                    <input type="text" name="port_4" id="port_4" class="form-control">
                            </div>
                            <div class="col">
                                <label for="type_1">TYPE ONT</label>
                                <input type="text" name="type_1" id="type_1" class="form-control">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-6">
                                    <label for="capture_gpon">CAPTURE GPON </label>
                                    <textarea class="form-control" name="capture_gpon" id="capture_gpon" rows="3"></textarea>
                            </div>

                            <div class="col-3" onclick="displayodp();"> 
                            <label for="odp">ODP</label>
                            <select name="odp" id="odp" class="form-control">
                                @foreach ($status_odp_data as $item)
                                <option value="{{ $item->odp_id }}">{{ $item->odp_nama }}</option>
                                @endforeach
                            </select>
                            </div>

                            <div class="col-3">
                                <label for="isi_odp">NAMA ODP</label>
                                <textarea class="form-control" name="isi_odp" id="isi_odp" rows="1"></textarea>
                            </div>
                            
                           
                        </div>

                        

                        <div class="form-row">
                            
                        </div>

                        

                        <div class="form-row">
                            <div class="col-6">
                            <label for="gponcapture" class="form-label">INPUT CAPTURE GPON</label>
                                <input type="file" name="gponcapture" class="form-control" id="validatedCustomFile"></input>
                            </div>
                            <div class="col">
                                <label for="kontak_pic_lokasi">KONTAK PIC LOKASI</label>
                                <input class="form-control" name="kontak_pic_lokasi" id="kontak_pic_lokasi" rows="3"></input>
                            </div>
                            
                            
                        </div>

                        <div class="form-row mt-3 justify-content-end">
                           
                        </div>

                        <div class="form-row mt-3">
                        
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
