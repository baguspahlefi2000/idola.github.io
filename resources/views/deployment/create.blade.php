@extends('template.main')

@section('contain')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card my-5 shadow-sm">
                <div class="card-body">
                    <h4 class="form-title">Form New Deployment</h4>
                    <form action="{{ route('dep.store') }}" method="POST" enctype="multipart/form-data"
                        name="deploymentAdd">
                        @csrf
                        <div class="form-group">
                            <label for="tanggal">TGL/BLN/THN</label>
                            <input type="date" name="tanggal" id="tanggal" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="ao">NO. AO</label>
                            <input type="text" name="ao" id="ao" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="witel">WITEL</label>
                            <select name="witel" id="witel" class="form-control">
                                @foreach ($witel_data as $item)
                                <option value="{{ $item->witel_id }}">{{ $item->witel_nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="olo">OLO / ISP</label>
                            <select name="olo" id="olo" class="form-control">
                                @foreach ($olo_data as $item)
                                <option value="{{ $item->olo_id }}">{{ $item->olo_nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="site_kriteria">SITE KRITERIA</label>
                            <select name="site_kriteria" id="site_kriteria" class="form-control">
                                @foreach ($site_kriteria_data as $item)
                                <option value="{{ $item->site_kriteria_id }}">{{ $item->site_kriteria_nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="sid">SID</label>
                            <input type="text" name="sid" id="sid" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="site_id">SITE ID</label>
                            <input type="text" name="site_id" id="site_id" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="order_type">ORDER TYPE</label>
                            <select name="order_type" id="order_type" class="form-control">
                                @foreach ($order_type_data as $item)
                                <option value="{{ $item->order_type_id }}">{{ $item->order_type_nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="produk">PRODUK</label>
                            <select name="produk" id="produk" class="form-control">
                                @foreach ($produk_data as $item)
                                <option value="{{ $item->produk_id }}">{{ $item->produk_nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="satuan">SATUAN</label>
                            <select name="satuan" id="satuan" class="form-control">
                                @foreach ($satuan_data as $item)
                                <option value="{{ $item->satuan_id }}">{{ $item->satuan_nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="kapasitas_bw">KAPASITAS [BW]</label>
                            <input type="text" name="kapasitas_bw" id="kapasitas_bw" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="longitude">LONGITUDE</label>
                            <input type="text" name="longitude" id="longitude" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="latitude">LATITUDE</label>
                            <input type="text" name="latitude" id="latitude" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="alamat asal">ALAMAT ASAL</label>
                            <textarea class="form-control" name="alamat_asal" id="alamat_asal" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="alamat_tujuan">ALAMAT TUJUAN</label>
                            <textarea class="form-control" name="alamat_tujuan" id="alamat_tujuan" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="status_ncx">STATUS NCX</label>
                            <select name="status_ncx" id="status_ncx" class="form-control">
                                @foreach ($status_ncx_data as $item)
                                <option value="{{ $item->status_ncx_id }}">{{ $item->status_ncx_nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="berita_acara">BERITA ACARA</label>
                            <input type="text" name="berita_acara" id="berita_acara" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="tgl_complete_wfm">TGL COMPLETE WFM</label>
                            <input type="date" name="tgl_complete_wfm" id="tgl_complete_wfm" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="status_nfm">STATUS WFM</label>
                            <input type="text" name="status_wfm" id="status_nfm" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="alasan_cancel">ALASAN CANCEL</label>
                            <input type="text" name="alasan_cancel" id="alasan_cancel" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="cancel_by">CANCEL By</label>
                            <input type="text" name="cancel_by" id="cancel_by" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="start_cancel">START CANCEL DATE</label>
                            <input type="date" name="start_cancel" id="start_cancel" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="ready_after_cancel">READY AFTER CANCEL</label>
                            <input type="date" name="ready_after_cancel" id="ready_after_cancel" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="no">INTEGRASI</label>
                            <input type="date" name="integrasi" id="no" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="metro_1">METRO BACKHAUL</label>
                            <input type="text" name="metro_1" id="metro_1" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="ip_1">IP</label>
                            <input type="text" name="ip_1" id="ip_1" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="port_1">PORT</label>
                            <input type="text" name="port_1" id="port_1" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="metro_2">METRO ACCESS</label>
                            <input type="text" name="metro_2" id="metro_2" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="ip_2">IP</label>
                            <input type="text" name="ip_2" id="ip_2" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="port_2">PORT</label>
                            <input type="text" name="port_2" id="port_2" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="vlan">VLAN</label>
                            <input type="text" name="vlan" id="vlan" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="vcid">VCID</label>
                            <input type="text" name="vcid" id="vcid" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="gpon">GPON</label>
                            <input type="text" name="gpon" id="gpon" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="ip_3">IP</label>
                            <input type="text" name="ip_3" id="ip_3" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="port_3">PORT</label>
                            <input type="text" name="port_3" id="port_3" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="sn">SN</label>
                            <input type="text" name="sn" id="sn" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="port_4">PORT</label>
                            <input type="text" name="port_4" id="port_4" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="type_1">TYPE</label>
                            <input type="text" name="type_1" id="type_1" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="odp">ODP</label>
                            <textarea class="form-control" name="odp" id="odp" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="kontak_pic_lokasi">KONTAK PIC LOKASI</label>
                            <textarea class="form-control" name="kontak_pic_lokasi" id="kontak_pic_lokasi" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="ip_4">IP</label>
                            <textarea class="form-control" name="ip_4" id="ip_4" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="downlink">DOWNLINK</label>
                            <textarea class="form-control" name="downlink" id="downlink" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="type_2">TYPE</label>
                            <textarea class="form-control" name="type_2" id="type_2"
                                rows="3"></textarea>
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
