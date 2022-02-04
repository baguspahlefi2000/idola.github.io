@extends('template.main')
@section('contain')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card my-5 shadow-sm">
                <div class="card-body ">
                    <h4 class="form-title">Form Update Deployment</h4>
                    <form action="{{ route('dep.update', $deployment->deployment_id) }}" method="POST">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="tanggal">TGL/BLN/THN</label>
                            <input type="date" name="tanggal" id="tanggal" class="form-control"
                                value="{{ $deployment->tanggal }}">
                                {{ $deployment->tanggal }}
                            </input>
                        </div>
                        <div class="form-group">
                            <label for="no_ao">NO. AO</label>
                            <input type="text" name="ao" id="ao" class="form-control" value="{{ $deployment->ao }}">
                            </input>
                        </div>
                        <div class="form-group">
                            <label for="witel">WITEL</label>
                            <select name="witel" id="witel" class="form-control">
                                <option value="{{ $deployment->witel_id }}">{{ $deployment->witel_tabel->witel_nama }}</option>
                                @foreach ($witel_data as $item)
           
                                <option value="{{ $item->witel_id }}">{{ $item->witel_nama }}</option>

                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="olo">OLO / ISP</label>
                            <select name="olo" id="olo" class="form-control">
                                <option value="{{ $deployment->olo_id }}">{{ $deployment->olo_tabel->olo_nama }}</option>
                                @foreach ($olo_data as $item)
                                <option value="{{ $item->olo_id }}">{{ $item->olo_nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="site_kriteria">SITE KRITERIA</label>
                            <select name="site_kriteria" id="site_kriteria" class="form-control">
                                <option value="{{ $deployment->site_kriteria_id }}">{{ $deployment->site_kriteria_tabel->site_kriteria_nama}}</option>
                                @foreach ($site_kriteria_data as $item)

                                <option value="{{ $item->site_kriteria_id }}">{{ $item->site_kriteria_nama }}</option>

                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="sid">SID</label>
                            <input type="text" name="sid" id="sid" class="form-control" value="{{ $deployment->sid }}">
                        </div>
                        <div class="form-group">
                            <label for="site_id">SITE ID</label>
                            <input type="text" name="site_id" id="site_id" class="form-control"
                                value="{{ $deployment->site_id }}">
                        </div>
                        <div class="form-group">
                            <label for="order_type">ORDER TYPE</label>
                            <select name="order_type" id="order_type" class="form-control">
                                <option value="{{ $deployment->order_type }}">{{ $deployment->order_type_tabel->order_type_nama }}</option>
                                @foreach ($order_type_data as $item)

                                <option value="{{ $item->order_type_id }}">{{ $item->order_type_nama }}</option>

                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="produk">PRODUK</label>
                            <select name="produk" id="produk" class="form-control">
                                <option value="{{ $deployment->produk_id }}">{{ $deployment->produk_tabel->produk_nama }}</option>
                                @foreach ($produk_data as $item)

                                <option value="{{ $item->produk_id }}">{{ $item->produk_nama }}</option>

                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="satuan">SATUAN</label>
                            <select name="satuan" id="satuan" class="form-control">
                                <option value="{{ $deployment->satuan_id }}">{{ $deployment->satuan_tabel->satuan_nama }}</option>
                                @foreach ($satuan_data as $item)
)
                                <option value="{{ $item->satuan_id }}">{{ $item->satuan_nama }}</option>

                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="kapasitas_bw">KAPASITAS [BW]</label>
                            <input type="text" name="kapasitas_bw" id="kapasitas_bw" class="form-control"
                                value="{{ $deployment->kapasitas_bw }}">
                        </div>
                        <div class="form-group">
                            <label for="longitude">LONGITUDE</label>
                            <input type="text" name="longitude" id="longitude" class="form-control"
                                value="{{ $deployment->longitude }}">
                        </div>
                        <div class="form-group">
                            <label for="latitude">LATITUDE</label>
                            <input type="text" name="latitude" id="latitude" class="form-control"
                                value="{{ $deployment->latitude }}">
                        </div>
                        <div class="form-group">
                            <label for="alamat_asal">ALAMAT ASAL</label>
                            <textarea class="form-control" name="alamat_asal" id="alamat_asal" rows="3"
                                value="{{ $deployment->alamat_asal }}">{{ $deployment->alamat_asal }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="alamat_tujuan">ALAMAT TUJUAN</label>
                            <textarea class="form-control" name="alamat_tujuan" id="alamat_tujuan" rows="3"
                                value="{{ $deployment->alamat_tujuan }}">{{ $deployment->alamat_tujuan }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="status_ncx">STATUS NCX</label>
                            <select name="status_ncx" id="status_ncx" class="form-control">
                                <option value="{{ $deployment->status_ncx_id }}">{{ $deployment->status_ncx_tabel->status_ncx_nama }}</option>
                                @foreach ($status_ncx_data as $item)

                                <option value="{{ $item->status_ncx_id }}">{{ $item->status_ncx_nama }}</option>

                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="berita_acara">BERITA ACARA</label>
                            <input type="text" name="berita_acara" id="berita_acara" class="form-control"
                                value="{{ $deployment->berita_acara }}">
                        </div>
                        <div class="form-group">
                            <label for="tgl_complete">TGL COMPLETE WFM</label>
                            <input type="date" name="tgl_complete" id="tgl_complete" class="form-control"
                                value="{{ $deployment->tgl_complete_wfm }}">
                        </div>
                        <div class="form-group">
                            <label for="status_wfm">STATUS WFM</labrel>
                            <input type="text" name="status_wfm" id="status_wfm" class="form-control"
                                value="{{ $deployment->status_wfm }}">
                        </div>
                        <div class="form-group">
                            <label for="alasan_cancel">ALASAN CANCEL</label>
                            <input type="text" name="alasan_cancel" id="alasan_cancel" class="form-control"
                                value="{{ $deployment->alasan_cancel }}">
                        </div>
                        <div class="form-group">
                            <label for="cancel_by">CANCEL By</label>
                            <input type="text" name="cancel_by" id="cancel_by" class="form-control"
                                value="{{ $deployment->cancel_by }}">
                        </div>
                        <div class="form-group">
                            <label for="start_cancel">START CANCEL DATE</label>
                            <input type="date" name="start_cancel" id="start_cancel" class="form-control"
                                value="{{ $deployment->start_cancel }}">
                                {{ $deployment->start_cancel }}
                            </input>
                        </div>
                        <div class="form-group">
                            <label for="ready_after_cancel">READY AFTER CANCEL</label>
                            <input type="date" name="ready_after_cancel" id="ready_after_cancel" class="form-control"
                                value="{{ $deployment->ready_after_cancel }}">
                                {{ $deployment->ready_after_cancel }}
                            </input>
                        </div>
                        <div class="form-group">
                            <label for="integrasi">TANGGAL INTEGRASI</label>
                            <input type="date" name="integrasi" id="integrasi" class="form-control"
                                value="{{ $deployment->tanggal_integrasi }}">
                                {{ $deployment->tanggal_integrasi }}
                            </input>
                        </div>
                        <div class="form-group">
                            <label for="nometro">METRO</label>
                            <input type="text" name="metro" id="metro" class="form-control" value="{{ $deployment->metro_1 }}">
                            {{ $deployment->metro }}
                            </input>
                        </div>
                        <div class="form-group">
                            <label for="ip">IP 1</label>
                            <input type="text" name="ip" id="ip" class="form-control" value="{{ $deployment->ip_1 }}">
                        </div>
                        <div class="form-group">
                            <label for="port">PORT</label>
                            <input type="text" name="port" id="port" class="form-control" value="{{ $deployment->port_1 }}">
                        </div>
                        <div class="form-group">
                            <label for="metro2">METRO</label>
                            <input type="text" name="metro2" id="metro2" class="form-control"
                                value="{{ $deployment->metro_2 }}">
                        </div>
                        <div class="form-group">
                            <label for="ip2">IP 2</label>
                            <input type="text" name="ip2" id="ip2" class="form-control" value="{{ $deployment->ip_2 }}">
                        </div>
                        <div class="form-group">
                            <label for="port2">PORT</label>
                            <input type="text" name="port2" id="port2" class="form-control" value="{{ $deployment->port_2 }}">
                        </div>
                        <div class="form-group">
                            <label for="vlan">VLAN</label>
                            <input type="text" name="vlan" id="vlan" class="form-control" value="{{ $deployment->vlan }}">
                        </div>
                        <div class="form-group">
                            <label for="vcid">VCID</label>
                            <input type="text" name="vcid" id="vcid" class="form-control" value="{{ $deployment->vcid }}">
                        </div>
                        <div class="form-group">
                            <label for="gpon">GPON</label>
                            <input type="text" name="gpon" id="gpon" class="form-control" value="{{ $deployment->gpon }}">
                        </div>
                        <div class="form-group">
                            <label for="ip3">IP 3</label>
                            <input type="text" name="ip3" id="ip3" class="form-control" value="{{ $deployment->ip_3 }}">
                        </div>
                        <div class="form-group">
                            <label for="port3">PORT 3</label>
                            <input type="text" name="port3" id="port3" class="form-control" value="{{ $deployment->port_3 }}">
                        </div>
                        <div class="form-group">
                            <label for="sn">SN</label>
                            <input type="text" name="sn" id="sn" class="form-control" value="{{ $deployment->sn }}">
                        </div>
                        <div class="form-group">
                            <label for="odp">ODP</label>
                            <select name="odp" id="odp" class="form-control">
                                @foreach ($status_odp_data as $item)
                                <option value="{{ $item->odp_id }}">{{ $item->odp_nama }}</option>
                                @endforeach
                            </select>
                            </div>
                        <div class="form-group">
                            <label for="port4">PORT 4</label>
                            <input type="text" name="port4" id="port4" class="form-control" value="{{ $deployment->port_4 }}">
                        </div>
                        <div class="form-group">
                            <label for="type">TYPE 1</label>
                            <input type="text" name="type" id="type" class="form-control" value="{{ $deployment->type_1 }}">
                        </div>

                        <div class="form-group">
                            <label for="ip4">IP SWITCH</label>
                            <textarea class="form-control" name="ip4" id="ip4" rows="3"
                                value="{{ $deployment->ip_4 }}">{{ $deployment->ip_4 }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="downlink">DOWNLINK</label>
                            <textarea class="form-control" name="downlink" id="downlink" rows="3"
                                value="{{ $deployment->downlink }}">{{ $deployment->downlink }}</textarea>
                        </div>

                        <div class="form-group text-right mt-4">
                            <a href="{{ route('deployment.index') }}" class="btn btn-white mr-2" type="reset">Cancel</a>
                            <button type="submit" class="btn btn-main" onclick="return validasiEdit();">Update
                                Data</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
