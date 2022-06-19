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
                    <a href="{{ route('progress.index') }}">Clear Filters</a>
                </div>
                <form action="{{ route('progress.index') }}" method="GET">
                    {{-- filter field --}}
                    <div class="form-row">
                        <div class="col">
                            <label for="no_ao">No. AO</label>
                            @if (request('no_ao'))
                            <input list="no_aos" name="no_ao" id="no_ao" class="form-control" value="{{ request('ao') }}"
                                autocomplete="off">
                            @else
                            <input list="no_aos" name="no_ao" id="no_ao" class="form-control" placeholder="Masukkan No. AO"
                                autocomplete="off">
                            @endif

                            <datalist id="no_aos">
                                @foreach ($ao_data as $progress_a)
                                <option value="{{ $progress_a->no_ao }}">{{ $progress_a->no_ao }}</option>
                                @endforeach
                            </datalist>
                        </div>
                        <div class="col">
                        <label for="tgl_bulan_dr_progress_lapangan">Dari Tanggal</label>
                        <input type="date" class="form-control" placeholder="Tanggal" name="tgl_bulan_dr_progress_lapangan"
                                id="tgl_bulan_dr_progress_lapangan">
                    </div>
                    <div class="col">
                        <label for="tgl_bulan_sd_progress_lapangan">Sampai Tanggal</label>
                        <input type="date" class="form-control" placeholder="Tanggal" name="tgl_bulan_sd_progress_lapangan"
                                id="tgl_bulan_sd_progress_lapangan">
                    </div>

                        <div class="col">
                            <label for="witel">Witel</label>
                            <select class="form-control" id="witel" name="witel">
                                @if (request('witel'))
                                <option value="{{ request('witel') }}">{{ request('witel') }}</option>
                                @else
                                <option value="">Pilih Witel</option>
                                @endif

                                @foreach ($witel_data as $dbs)
          
                                <option value="{{ $dbs->witel_id }}">{{ $dbs->witel_nama }}</option>
     
                                @endforeach
                            </select>
                        </div>

                        <div class="col">
                            <label for="olo">OLO</label>
                            <select class="form-control" id="olo" name="olo">
                                @if (request('olo'))
                                <option value="{{ request('olo') }}">{{ request('olo') }}</option>
                                @else
                                <option value="">Pilih OLO</option>
                                @endif

                                @foreach ($olo_data as $dbs)
                                <option value="{{ $dbs->olo_id }}">{{ $dbs->olo_nama }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col">
                            <label for="produk">Produk</label>
                            <select class="form-control" id="produk" name="produk">
                                @if (request('produk'))
                                <option value="{{ request('produk') }}">{{ request('produk') }}</option>
                                @else
                                <option value="">Pilih Produk</option>
                                @endif

                                @foreach ($produk_data as $dbs)
            
                                <option value="{{ $dbs->produk_id }}">{{ $dbs->produk_nama }}</option>
   
                                @endforeach
                            </select>
                        </div>

                        <div class="col">
                            <label for="progress">Progress</label>
                            <select class="form-control" id="progress" name="progress">
                                @if (request('progress'))
                                <option value="{{ request('progress')}}">{{ request('progress') }}</option>
                                @else
                                <option value="">Pilih Progress</option>
                                @endif
                                @foreach ($status_progress_data as $dbs)
            
                                <option value="{{ $dbs->status_p_lapangan_id }}">{{ $dbs->status_p_lapangan_nama }}</option>

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
                            <h2 class="">Progress Lapangan</h2>
                        </div>
                        <div class="col text-right">
                            <a href="{{ route('progress.export') }}" class="btn btn-second-thin ml-2">
                                <i class="las la-download"></i> Export
                            </a>
                        </div>
                    </div>
                    <div class="div 1">
                        <table class="table table-responsive table-hover table-coba" id="table_id" style="width: 100%">
                            <thead>
                                <tr>
                                    <th scope="col" rowspan="2">No</th>
                                    <th scope="col" rowspan="2">THN/BLN/TGL</th>
                                    <th scope="col" rowspan="2">Witel</th>
                                    <th scope="col" class="text-nowrap" rowspan="2">No Ao</th>
                                    <th scope="col" rowspan="2">Olo</th>
                                    <th scope="col" rowspan="2">Produk</th>
                                    <th scope="col" rowspan="2">Bandwith</th>
                                    <th scope="col" class="text-nowrap" rowspan="2">Alamat</th>
                                    <th scope="col" colspan="2" class="text-center">Progress PT1</th>
                                    <th scope="col" colspan="2" class="text-center">Progress PT2</th>
                                    <th scope="col" class="text-nowrap" rowspan="2">Datek ODP</th>
                                    <th scope="col" class="text-nowrap" rowspan="2">Datek GPON</th>
                                    <th scope="col" rowspan="2">Progress</th>
                                    <th scope="col" rowspan="2">Keterangan</th>
                                    @canany(['admin', 'editor'])
                                        <td class="text-center">
                                            <div class="dropleft" title="Menu">
                                                <span class="las la-ellipsis-v" id="menuEdit" data-toggle="dropdown"
                                                    aria-haspopup="true" aria-expanded="false"></span>
                                                <div class="dropdown-menu" aria-labelledby="menuEdit">
                                                    <a href="#" class="dropdown-item"
                                                        type="button">
                                                        <i class="fas fa-edit mr-2"></i>
                                                        Edit
                                                    </a>
                                                    <form action="#" method="POST"
                                                        class="d-inline" onsubmit="return validasiHapus()">
                                                        @csrf
                                                        <button class="dropdown-item" type="submit"
                                                            onclick="return confirm('Apakah Anda Ingin Menghapusnya?')"><i
                                                                class="fas fa-trash mr-2"></i> Hapus</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                        @endcanany
                                </tr>
                                <tr class="progress-lapangan">
                                    <th scope="row" class="text-nowrap">Tanggal Order</th>
                                    <th scope="row">Keterangan</th>
                                    <th scope="row" class="text-nowrap">Tanggal Order</th>
                                    <th scope="row">Keterangan</th>
                                </tr>
                            </thead>
    
                            <tbody>
                                @foreach ($progress_lapangan as $item)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td>{{ $item->tanggal }}</td>
                                    <td>{{ $item->witel_tabel->witel_nama}}</td>
                                    <td>{{ $item->ao }}</td>
                                    <td>{{ $item->olo_tabel->olo_nama }}</td>
                                    <td>{{ $item->produk_tabel->produk_nama }}</td>
                                    <td>{{ $item->bandwith}}</td>
                                    <td>{{ $item->alamat_toko }}</td>
                                    <td>{{ $item->tanggal_order_pt1 }}</td>
                                    <td>{{ $item->keterangan_pt1 }}</td>
                                    <td>{{ $item->tanggal_order_pt2 }}</td>
                                    <td>{{ $item->keterangan_pt2 }}</td>
                                    <td>{{ $item->datek_odp }}</td>
                                    <td>{{ $item->datek_gpon }}</td>
                                    <td>{{ $item->status_p_lapangan_tabel->status_p_lapangan_nama }}</td>
                                    <td>{{ $item->keterangan }}</td>
                                    @canany(['admin', 'editor'])
                                        <td class="text-center">
                                            <div class="dropleft" title="Menu">
                                                <span class="las la-ellipsis-v" id="menuEdit" data-toggle="dropdown"
                                                    aria-haspopup="true" aria-expanded="false"></span>
                                                <div class="dropdown-menu" aria-labelledby="menuEdit">
                                                    <a href="{{ route('progress.edit',$item->progress_lapangan_id) }}" class="dropdown-item"
                                                        type="button">
                                                        <i class="fas fa-edit mr-2"></i>
                                                        Edit
                                                    </a>
                                                    <form action="{{ route('progress.destroy',$item->progress_lapangan_id) }}" method="POST"
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
    </div>
</div>
@endsection
