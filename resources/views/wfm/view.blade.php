@extends('template.main')
@section('contain')
<div class="container-fluid bg-white">
    <div class="row">
        <div class="col">
            <div class="">
                <div class="container-fluid mt-4">
                    <div class="row">
                    @if (Auth::user()->role == 'admin')
                        <h4 class="col-8 form-title mt-4">View Form Update Deployment</h4>

                        <a href="{{ route('wfm.edit',$wfm->id) }}" class="col-2 mt-4" Style="color : black;" type="button"> 
                            <i class="fas fa-edit mr-2"></i>Edit
                        </a>
                        <form action="{{ route('wfm.delete',$wfm->id) }}" method="POST" class="col-2 mt-4 d-inline" onsubmit="return validasiHapus()">
                        @csrf
                        @method('delete')
                        <button class="dropdown-item" type="submit" onclick="return validasiHapus();"><i class="fas fa-trash mr-2"></i> Hapus</button>
                    </div>
                    @else
                    <h4 class="">View Form Update Deployment</h4>
                    <form href="#" class="col-2 mt-4">
                    </form>
                        <form action="#"class="col-2 mt-4 d-inline">
                      
                    </div>
                        @endif

                    <div class="form-row mt-3">
                        <div class="col">
                            <label for="tgl_bulan_th">TGL/BLN/THN</label>
                            <input type="date" name="tgl_bulan_th" id="tgl_bulan_th" class="form-control"
                                value="{{ $wfm->tgl_bulan_th }}" disabled="disabled"> 
                        </div>
                        <div class="col">
                            <label for="no_ao">NO. AO</label>
                            <input type="text" name="no_ao" id="no_ao" class="form-control" value="{{ $wfm->no_ao }}"disabled="disabled">
                        </div>
                        <div class="col">
                            <label for="witel">WITEL</label>
                            <select name="witel" id="witel" class="form-control " disabled="disabled">
                                <option value="{{ $wfm->witel }}">{{ $wfm->witel }}</option>
                                @foreach ($database as $item)
                                @if ($item->witel !== '')
                                <option value="{{ $item->witel }}">{{ $item->witel }}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-row mt-3">
                        <div class="col">
                            <label for="olo_isp">OLO / ISP</label>
                            <select name="olo_isp" id="olo_isp" class="form-control" disabled="disabled">
                                <option value="{{ $wfm->olo_isp }}">{{ $wfm->olo_isp }}</option>
                                @foreach ($database as $item)
                                <option value="{{ $item->olo_isp }}">{{ $item->olo_isp }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col">
                            <label for="site_kriteria">SITE KRITERIA</label>
                            <select name="site_kriteria" id="site_kriteria" class="form-control" disabled="disabled">
                                <option value="{{ $wfm->site_kriteria }}">{{ $wfm->site_kriteria }}</option>
                                @foreach ($database as $item)
                                @if ($item->site_kriteria !== '')
                                <option value="{{ $item->site_kriteria }}">{{ $item->site_kriteria }}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="col">
                            <label for="sid">SID</label>
                            <input type="text" name="sid" id="sid" class="form-control" value="{{ $wfm->sid }}" disabled="disabled">
                        </div>
                    </div>

                    <div class="form-row mt-3">
                        <div class="col">
                            <label for="site_id">SITE ID</label>
                            <input type="text" name="site_id" id="site_id" class="form-control"
                                value="{{ $wfm->site_id }}" disabled="disabled"> 
                        </div>
                        <div class="col">
                            <label for="order_type">ORDER TYPE</label>
                            <select name="order_type" id="order_type" class="form-control" disabled="disabled">
                                <option value="{{ $wfm->order_type }}">{{ $wfm->order_type }}</option>
                                @foreach ($database as $item)
                                @if ($item->order_type !== '')
                                <option value="{{ $item->order_type }}">{{ $item->order_type }}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="col">
                            <label for="produk">PRODUK</label>
                            <select name="produk" id="produk" class="form-control" disabled="disabled">
                                <option value="{{ $wfm->produk }}">{{ $wfm->produk }}</option>
                                @foreach ($database as $item)
                                @if ($item->produk !== '')
                                <option value="{{ $item->produk }}">{{ $item->produk }}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-row mt-3">
                        <div class="col">
                            <label for="satuan">SATUAN</label>
                            <select name="satuan" id="satuan" class="form-control" disabled="disabled">
                                <option value="{{ $wfm->satuan }}">{{ $wfm->satuan }}</option>
                                @foreach ($database as $item)
                                @if ($item->satuan !== '')
                                <option value="{{ $item->satuan }}">{{ $item->satuan }}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="col">
                            <label for="kapasitas_bw">KAPASITAS [BW]</label>
                            <input type="text" name="kapasitas_bw" id="kapasitas_bw" class="form-control"
                                value="{{ $wfm->kapasitas_bw }}" disabled="disabled">
                        </div>
                        <div class="col">
                            <label for="longitude">LONGITUDE</label>
                            <input type="text" name="longitude" id="longitude" class="form-control"
                                value="{{ $wfm->longitude }}" disabled="disabled">
                        </div>
                    </div>

                    <div class="form-row mt-3">
                        <div class="col">
                            <label for="latitude">LATITUDE</label>
                            <input type="text" name="latitude" id="latitude" class="form-control"
                                value="{{ $wfm->latitude }}" disabled="disabled"> 
                        </div>
                        <div class="col">
                            <label for="alamat_asal">ALAMAT ASAL</label>
                            <textarea class="form-control" name="alamat_asal" id="alamat_asal" rows="3"
                                value="{{ $wfm->alamat_asal }}" disabled="disabled">{{ $wfm->alamat_asal }} </textarea>
                        </div>
                        <div class="col">
                            <label for="alamat_tujuan">ALAMAT TUJUAN</label>
                            <textarea class="form-control" name="alamat_tujuan" id="alamat_tujuan" rows="3"
                                value="{{ $wfm->alamat_tujuan }}" disabled="disabled">{{ $wfm->alamat_tujuan }}</textarea>
                        </div>
                    </div>        
                    
                    <div class="form-row mt-3">
                        <div class="col">
                            <label for="status_ncx">STATUS NCX</label>
                            <select name="status_ncx" id="status_ncx" class="form-control" disabled="disabled">
                                <option value="{{ $wfm->status_ncx }}">{{ $wfm->status_ncx }}</option>
                                @foreach ($database as $item)
                                @if ($item->status_ncx !== '')
                                <option value="{{ $item->status_ncx }}">{{ $item->status_ncx }}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="col">
                            <label for="berita_acara">BERITA ACARA</label>
                            <input type="text" name="berita_acara" id="berita_acara" class="form-control"
                                value="{{ $wfm->berita_acara }}" disabled="disabled">
                        </div>
                        <div class="col">
                            <label for="tgl_complete">TGL COMPLETE WFM</label>
                            <input type="date" name="tgl_complete" id="tgl_complete" class="form-control"
                                value="{{ $wfm->tgl_complete }}" disabled="disabled">
                        </div>
                    </div>

                    <div class="form-row mt-3">
                        <div class="col">
                            <label for="status_wfm">STATUS WFM</label>
                            <input type="text" name="status_wfm" id="status_wfm" class="form-control"
                                value="{{ $wfm->status_wfm }}" disabled="disabled">
                        </div>
                        <div class="col">
                            <label for="alasan_cancel">ALASAN CANCEL</label>
                            <input type="text" name="alasan_cancel" id="alasan_cancel" class="form-control"
                                value="{{ $wfm->alasan_cancel }}" disabled="disabled">
                        </div>
                        <div class="col">
                            <label for="cancel_by">CANCEL By</label>
                            <input type="text" name="cancel_by" id="cancel_by" class="form-control"
                                value="{{ $wfm->cancel_by }}" disabled="disabled">
                        </div>
                    </div>

                    <div class="form-row mt-3">
                        <div class="col">
                            <label for="start_cancel">START CANCEL DATE</label>
                            <input type="date" name="start_cancel" id="start_cancel" class="form-control"
                                value="{{ $wfm->start_cancel }}" disabled="disabled">
                        </div>
                        <div class="col">
                            <label for="ready_after_cancel">READY AFTER CANCEL</label>
                            <input type="date" name="ready_after_cancel" id="ready_after_cancel" class="form-control"
                                value="{{ $wfm->ready_after_cancel }}" disabled="disabled">
                        </div>
                        <div class="col">
                            <label for="integrasi">INTEGRASI</label>
                            <input type="date" name="integrasi" id="integrasi" class="form-control"
                                value="{{ $wfm->integrasi }}" disabled="disabled">
                        </div>
                    </div>

                    <div class="form-row mt-3">
                        <div class="col">
                            <label for="nometro">METRO</label>
                            <input type="text" name="metro" id="metro" class="form-control" value="{{ $wfm->metro }}" disabled="disabled">
                        </div>
                        <div class="col">
                            <label for="ip">IP</label>
                            <input type="text" name="ip" id="ip" class="form-control" value="{{ $wfm->ip }}" disabled="disabled">
                        </div>
                        <div class="col">
                            <label for="port">PORT</label>
                            <input type="text" name="port" id="port" class="form-control" value="{{ $wfm->port }}" disabled="disabled">
                        </div>
                    </div>

                    <div class="form-row mt-3">
                        <div class="col">
                            <label for="metro2">METRO</label>
                            <input type="text" name="metro2" id="metro2" class="form-control"
                                value="{{ $wfm->metro2 }}" disabled="disabled">
                        </div>
                        <div class="col">
                            <label for="ip2">IP</label>
                            <input type="text" name="ip2" id="ip2" class="form-control" value="{{ $wfm->ip2 }}" disabled="disabled"> 
                        </div>
                        <div class="col">
                            <label for="port2">PORT</label>
                            <input type="text" name="port2" id="port2" class="form-control" value="{{ $wfm->port2 }}" disabled="disabled">
                        </div>
                    </div>

                    <div class="form-row mt-3">
                        <div class="col">
                            <label for="vlan">VLAN</label>
                            <input type="text" name="vlan" id="vlan" class="form-control" value="{{ $wfm->vlan }}" disabled="disabled">
                        </div>
                        <div class="col">
                            <label for="vcid">VCID</label>
                            <input type="text" name="vcid" id="vcid" class="form-control" value="{{ $wfm->vcid }}" disabled="disabled">
                        </div>
                        <div class="col">
                            <label for="gpon">GPON</label>
                            <input type="text" name="gpon" id="gpon" class="form-control" value="{{ $wfm->gpon }}" disabled="disabled">
                        </div>
                    </div>

                    <div class="form-row mt-3">
                        <div class="col">
                            <label for="ip3">IP</label>
                            <input type="text" name="ip3" id="ip3" class="form-control" value="{{ $wfm->ip3 }}" disabled="disabled">
                        </div>
                        <div class="col">
                            <label for="port3">PORT</label>
                            <input type="text" name="port3" id="port3" class="form-control" value="{{ $wfm->port3 }}" disabled="disabled">
                        </div>
                        <div class="col">
                            <label for="sn">SN</label>
                            <input type="text" name="sn" id="sn" class="form-control" value="{{ $wfm->sn }}" disabled="disabled">
                        </div>
                    </div>

                    <div class="form-row mt-3">
                        <div class="col">
                            <label for="port4">PORT</label>
                            <input type="text" name="port4" id="port4" class="form-control" value="{{ $wfm->port4 }}" disabled="disabled">
                        </div>
                        <div class="col">
                            <label for="type">TYPE</label>
                            <input type="text" name="type" id="type" class="form-control" value="{{ $wfm->type }}" disabled="disabled">
                        </div>
                        <div class="col">
                            <label for="nama">NAMA SWITCH</label>
                            <textarea class="form-control" name="nama" id="nama" rows="3"
                                value="{{ $wfm->nama }}" disabled="disabled">{{ $wfm->nama }}</textarea>
                        </div>
                    </div>

                    <div class="form-row mt-3">
                        <div class="col">
                            <label for="ip4">IP SWITCH</label>
                            <textarea class="form-control" name="ip4" id="ip4" rows="3"
                                value="{{ $wfm->ip4 }}" disabled="disabled">{{ $wfm->ip4 }}</textarea>
                        </div>
                        <div class="col">
                            <label for="downlink">DOWNLINK</label>
                            <textarea class="form-control" name="downlink" id="downlink" rows="3"
                                value="{{ $wfm->downlink }}" disabled="disabled">{{ $wfm->downlink }}</textarea>
                        </div>
                        <div class="col">
                            <label for="type_switch">TYPE SWITCH</label>
                            <textarea class="form-control" name="type_switch" id="type_switch" rows="3"
                                value="{{ $wfm->type_switch }}" disabled="disabled">{{ $wfm->type_switch }}</textarea>
                        </div>
                    </div>

                    <div class="form-row mt-3">
                        <div class="col">
                            <label for="capture_metro_backhaul">CAPTURE METRO BACKHAUL</label>
                            <textarea class="form-control" name="capture_metro_backhaul" id="capture_metro_backhaul"
                                rows="3"
                                value="{{ $wfm->capture_metro_backhaul }}" disabled="disabled">{{ $wfm->capture_metro_backhaul }}</textarea>
                        </div>
                        <div class="col">
                            <label for="capture_metro_access">CAPTURE METRO ACCESS</label>
                            <textarea class="form-control" name="capture_metro_access" id="capture_metro_access"
                                rows="3"
                                value="{{ $wfm->capture_metro_access }}" disabled="disabled">{{ $wfm->capture_metro_access }}</textarea>
                        </div>
                        <div class="col">
                            <label for="capture_gpon">CAPTURE GPON</label>
                            <textarea class="form-control" name="capture_gpon" id="capture_gpon" rows="3"
                                value="{{ $wfm->capture_gpon }}" disabled="disabled">{{ $wfm->capture_gpon }}</textarea>
                        </div>
                    </div>


                        <div class="form-row mt-3">
                            <div class="col-4 mb-4">
                                <label for="pic">PIC</label>
                                <input type="text" name="pic" id="pic" class="form-control" disabled="disabled">
                            </div>
                        </div>
            
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
