@extends('template.main')

@section('contain')
<div class="container-fluid isi">
    @if (session()->has('success'))
    <div class="success-tambah align-items-center mt-3" id="success-tambah">
        <div class="d-flex">
            <div class="ml-3 p-2 align-self-center text-success">
                <i class="las la-check display-4"></i>
            </div>
            <div class="p-2 flex-grow-1 border-right">
                <h3 class="mt-2">Success</h3>
                <p class="pesan-berhasil">{{ session('success') }}</p>
            </div>
            <div class="px-4 align-self-center">
                <button id="close-flash" class="close" onclick="hideFlash()">
                    <span class="font-weight-normal">CLOSE</span>
                </button>
            </div>
        </div>
    </div>
    @endif
    <div class="row">
        <div class="col">
            <div class="m-0 p-0" id="filterform">
                <h4 class="filter-title" title="Filter"><i class="las la-filter"></i> Filter</h4>
                <div class="clear-filter">
                    <a href="{{ route('deployment.index') }}">Clear Filters</a>
                </div>
                <form action="{{ route('deployment.index') }}" method="GET">
                    {{-- filter field --}}
                    <div class="form-row">
                        <div class="col">
                            <label for="no_ao">No. AO</label>
                            @if (request('no_ao'))
                            <input list="no_aos" name="no_ao" id="no_ao" class="form-control"
                            placeholder="Masukkan No. AO" value="{{ request('no_ao') }}" autocomplete="off">
                            @else
                            <input list="no_aos" name="no_ao" id="no_ao" class="form-control"
                                placeholder="Masukkan No. AO" autocomplete="off">
                            @endif

                            <datalist id="no_aos">
                                @foreach ($ao_data as $wfm_ao)
                                <option value="{{ $wfm_ao->no_ao }}">{{ $wfm_ao->no_ao }}</option>
                                @endforeach
                            </datalist>
                        </div>
                    <div class="col">
                        <label for="tgl_bulan_dr">Dari Tanggal</label>
                        <input type="date" class="form-control" placeholder="Tanggal" name="tgl_bulan_dr"
                                id="tgl_bulan_dr">
                    </div>
                    <div class="col">
                        <label for="tgl_bulan_th_sd">Sampai Tanggal</label>
                        <input type="date" class="form-control" placeholder="Tanggal" name="tgl_bulan_sd"
                                id="tgl_bulan_sd">
                    </div>
                    <div class="col">
                            <label for="witel">Witel</label>
                            <select class="form-control" id="witel" name="witel">

                                @if (request('witel'))
                                <option value="{{ request('witel') }}">
                                Pilih Witel
                                </option>
                                @else
                                <option value="">Pilih Witel</option>
                                @endif

                                @foreach ($witel_data as $dbs)
                                <option value="{{ $dbs->witel_id }}">{{ $dbs->witel_nama }}</option>
                                @endforeach
                            </select>
                    </div>
                    </div> 
                    <div class="form-row mt-3">
                        <div class="col">
                            <label for="olo">OLO</label>
                            <select class="form-control" id="olo" name="olo">
                                @if (request('olo'))
                                <option value="{{ request('olo') }}">Pilih OLO</option>
                                @else
                                <option value="">Pilih OLO</option>
                                @endif

                                @foreach ($olo_data as $dbs)
                                <option value="{{ $dbs->olo_id }}">{{ $dbs->olo_nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col">
                            <label for="order_type">Order Type</label>
                            <select class="form-control" id="order_type" name="order_type">
                                @if (request('order_type'))
                                <option value="{{ request('order_type') }}">Pilih Order Type</option>
                                @else
                                <option value="">Pilih Order Type</option>
                                @endif

                                @foreach ($order_type_data as $dbs)
                                <option value="{{ $dbs->order_type_id }}">{{ $dbs->order_type_nama }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col">
                            <label for="produk">Produk</label>
                            <select class="form-control" id="produk" name="produk">
                                @if (request('produk'))
                                <option value="{{ request('produk') }}">Pilih Produk</option>
                                @else
                                <option value="">Pilih Produk</option>
                                @endif

                                @foreach ($produk_data as $dbs)
                                <option value="{{ $dbs->produk_id }}">{{ $dbs->produk_nama }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col">
                            <label for="status_ncx">Status NCX</label>
                            <select class="form-control" id="status_ncx" name="status_ncx">
                                @if (request('status_ncx'))
                                <option value="{{ request('status_ncx') }}">Pilih Status NCX</option>
                                @else
                                <option value="">Pilih Status NCX</option>
                                @endif

                                @foreach ($status_ncx_data as $dbs)
                                <option value="{{ $dbs->status_ncx_id }}">{{ $dbs->status_ncx_nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-row mt-3">
                        <div class="col-3">
                            <label for="status_wfm">Status WFM</label>
                            <select class="form-control" id="status_wfm" name="status_wfm">
                                @if (request('status_wfm'))
                                <option value="{{ request('status_wfm') }}">Pilih Status WFM</option>
                                @else
                                <option value="">Pilih Status WFM</option>
                                @endif

                                @foreach ($status_wfm_data as $wfm_a)
                                <option value="{{ $wfm_a->status_wfm_id }}">{{ $wfm_a->status_wfm_nama }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-3">
                            <label for="status_integrasi">Status Integrasi</label>
                            <select class="form-control" id="status_integrasi" name="status_integrasi">
                                @if (request('status_integrasi'))
                                <option value="{{ request('status_integrasi') }}">Pilih Status Integrasi</option>
                                @else
                                <option value="">Pilih Status Integrasi</option>
                                @endif

                                @foreach ($status_integrasi_data as $dbs)
                                <option value="{{ $dbs->status_integrasi_id }}">{{ $dbs->status_integrasi_nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>                 
                    
                    


                    
                    {{-- akhir filter field --}}

                    {{-- button filter --}}
                    <div class="mt-3 text-right">
                        <button class="btn btn-reset px-4 py-3/2" type="reset">Reset</button>
                        <button class="btn btn-filter px-4 py-3/2" type="submit">Filter</button>
                    </div>
                </form>
            </div>
            {{-- akhir form filter --}}
            

   

            <span id="ct" class="mt-3 d-block text-right"></span>
            <div class="card mt-2 mb-5 shadow-sm">
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col">
                            <h2 class="">Deployment</h2>
                        </div>
                        <div class="col text-right">
                            <a href="{{ route('deployment.export') }}" class="btn btn-second-thin ml-2">
                                <i class="las la-download"></i> Export
                            </a>
                        </div>
                    </div>
                <div class="div 1">
                    <table class="table table-responsive table-hover table-coba" id="table_id">
                        <thead>
                            <th>No</th>
                            <th>THN/BLN/TGL</th>
                            <th class="text-nowrap">NO. AO</th>
                            <th>WITEL</th>
                            <th class="text-nowrap">OLO / ISP</th>
                            <th class="text-nowrap">SITE KRITERIA</th>
                            <th>SID</th>
                            <th class="text-nowrap">SITE ID</th>
                            <th class="text-nowrap">ORDER TYPE</th>
                            <th>PRODUK</th>
                            <th>SATUAN</th>
                            <th class="text-nowrap">KAPASITAS [BW]</th>
                            <th>LONGITUDE</th>
                            <th>LATITUDE</th>
                            <th class="text-nowrap">ALAMAT ASAL</th>
                            <th class="text-nowrap">ALAMAT TUJUAN</th>
                            <th class="text-nowrap">STATUS NCX</th>
                            <th class="text-nowrap">BERITA ACARA</th>
                            <th class="text-nowrap">TGL COMPLETE WFM</th>
                            <th class="text-nowrap">STATUS WFM</th>
                            <th class="text-nowrap">ALASAN CANCEL</th>
                            <th class="text-nowrap">CANCEL By</th>
                            <th class="text-nowrap">START CANCEL DATE</th>
                            <th class="text-nowrap">READY AFTER CANCEL</th>
                            <th>STATUS INTEGRASI</th>
                            <th>TANGGAL INTEGRASI</th>
                            <th class="text-nowrap">METRO ACCESS</th>
                            <th>IP</th>
                            <th>PORT</th>
                            <th class="text-nowrap">METRO BACKHAUL</th>
                            <th>IP</th>
                            <th>PORT</th>
                            <th>VLAN</th>
                            <th>VCID</th>
                            <th>GPON</th>
                            <th>IP</th>
                            <th>PORT</th>
                            <th>SN</th>
                            <th>ODP</th>
                            <th>PORT</th>
                            <th>TYPE</th>
                            <th class="text-nowrap">KONTAK PIC</th>
                            <th>IP</th>
                            <th>DOWNLINK</th>
                            <th>TYPE2</th>
                            @canany(['admin', 'editor'])
                            <th scope="col"><span class="las la-ellipsis-v"></span></th>
                            @endcanany
                        </thead>
                        <tbody>
                            @foreach ($deployment as $wfm)
                            <tr>
                                <td class="text-center">{{$loop->iteration }}</td>
                                <td>{{$wfm->tanggal }}</td>
                                <td>{{$wfm->ao }}</td>
                                <td>{{$wfm->witel_tabel->witel_nama}}</td>
                                <td>{{$wfm->olo_tabel->olo_nama }}</td>
                                <td>{{$wfm->site_kriteria_tabel->site_kriteria_nama }}</td>
                                <td>{{$wfm->sid }}</td>
                                <td>{{$wfm->site_id }}</td>
                                <td>{{$wfm->order_type_tabel->order_type_nama}}</td>
                                <td>{{$wfm->produk_tabel->produk_nama}}</td>
                                <td>{{$wfm->satuan_tabel->satuan_nama}}</td>
                                <td>{{$wfm->kapasitas_bw }}</td>
                                <td>{{$wfm->longitude }}</td>
                                <td>{{$wfm->latitude }}</td>
                                <td>{{$wfm->alamat_asal }}</td>
                                <td>{{$wfm->alamat_tujuan}}</td>
                                <td>{{$wfm->status_ncx_tabel->status_ncx_nama }}</td>
                                <td>{{$wfm->berita_acara }}</td>
                                <td>{{$wfm->tgl_complete_wfm}}</td>
                                <td>{{$wfm->status_wfm_tabel->status_wfm_nama }}</td>
                                <td>{{$wfm->alasan_cancel }}</td>
                                <td>{{$wfm->cancel_by }}</td>
                                <td>{{$wfm->start_cancel }}</td>
                                <td>{{$wfm->ready_after_cancel }}</td>
                                <td>{{$wfm->status_integrasi_tabel->status_integrasi_nama }}</td>
                                <td>{{$wfm->tanggal_integrasi }}</td>
                                <td>{{$wfm->metro_access }}</td>
                                <td>{{$wfm->ip_1 }}</td>
                                <td>{{$wfm->port_1 }}</td>
                                <td>{{$wfm->metro_backhaul }}</td>
                                <td>{{$wfm->ip_2 }}</td>
                                <td>{{$wfm->port_2 }}</td>
                                <td>{{$wfm->vlan }}</td>
                                <td>{{$wfm->vcid }}</td>
                                <td>{{$wfm->gpon }}</td>
                                <td>{{$wfm->ip_3 }}</td>
                                <td>{{$wfm->port_3 }}</td>
                                <td>{{$wfm->sn }}</td>
                                <td>{{ $wfm->odp_tabel->odp_nama }}</td>
                                <td>{{$wfm->port_4 }}</td>
                                <td>{{$wfm->jenis_nte_tabel->jenis_nte_nama }}</td>
                                <td>{{ $wfm->kontak_pic_lokasi }}</td>
                                <td>{{ $wfm->ip_4 }}</td>
                                <td>{{ $wfm->downlink }}</td>
                                <td>{{ $wfm->type_2 }}</td>

                                @canany(['admin', 'editor'])
                                    <td class="text-center">
                                        <div class="dropleft" title="Menu">
                                            <span class="las la-ellipsis-v" id="menuEdit" data-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false"></span>
                                            <div class="dropdown-menu" aria-labelledby="menuEdit">
                                                <a href="{{ route('dep.edit',$wfm->deployment_id) }}" class="dropdown-item"
                                                    type="button">
                                                    <i class="fas fa-edit mr-2"></i>
                                                    Edit
                                                </a>
                                                <form action="{{ route('dep.destroy',$wfm->deployment_id) }}" method="POST"
                                                    class="d-inline" onsubmit="return validasiHapus()">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="dropdown-item" type="submit"
                                                        onclick="return confirm('Apakah Anda Ingin Menghapusnya?')"><i
                                                            class="fas fa-trash mr-2"></i> Hapus</button>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                    @endcanany

                                
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
