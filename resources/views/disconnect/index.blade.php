@extends('template.main')

@section('contain')
<div class="container-fluid isi">
    <div class="row">
        <div class="col">
            <div class="m-0 p-0" id="filterform">
                <h4 class="filter-title" title="Filter"><i class="las la-filter"></i> Filter</h4>
                <div class="clear-filter">
                    <a href="{{ route('disconnect.index') }}" class="">Clear Filters</a>
                </div>
                <form action="{{ route('disconnect.index') }}" method="GET">
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
                            <label for="jenis_nte">Jenis NTE</label>
                            <select class="form-control" id="jenis_nte" name="jenis_nte">
                                @if (request('jenis_nte'))
                                <option value="{{ request('jenis_nte') }}">Pilih Jenis NTE</option>
                                @else
                                <option value="">Pilih Jenis NTE</option>
                                @endif

                                @foreach ($jenis_nte_data as $dbs)
                                <option value="{{ $dbs->jenis_nte_id }}">{{ $dbs->jenis_nte_nama }}</option>
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
                    <h2 class="title-table">Disconnect</h2>
                    <table class="table table-responsive-lg table-hover" id="table_id">
                        <thead>
                            <tr>
                                <th scope="col">NO</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">AO</th>
                                <th scope="col">WITEL</th>
                                <th scope="col">OLO</th>
                                <th scope="col">ALAMAT</th>
                                <th scope="col">JENIS NTE</th>
                                <th scope="col">JUMLAH NTE</th>
                                <th scope="col">STATUS</th>
                                <th scope="col">PLAN CABUT</th>
                                <th scope="col">PIC</th>
                                @canany(['admin', 'editor'])
                                <th scope="col"><span class="las la-ellipsis-v"></span></th>
                                @endcanany
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($disconnect as $items)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $items->tanggal }}</td>
                                <td>{{ $items->ao }}</td>
                                <td>{{ $items->witel_tabel->witel_nama }}</td>
                                <td>{{ $items->olo_tabel->olo_nama }}</td>
                                <td>{{ $items->alamat_asal}}</td>
                                <td>{{ $items->jenis_nte_tabel->jenis_nte_nama }}</td>
                                <td>{{ $items->jumlah_nte }}</td>
                                <td>{{ $items->status_disconnect_detail_tabel->status_disconnect_detail_nama }}</td>
                                <td>{{ $items->tgl_plan_cabut }}</td>
                                <td>{{ $items->kontak_pic_lokasi }}</td>
                                @canany(['admin', 'editor'])
                                <td class="text-center">
                                    <div class="dropleft" title="Menu">
                                        <span class="las la-ellipsis-v" id="menuEdit" data-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false"></span>
                                        <div class="dropdown-menu" aria-labelledby="menuEdit">
                                            <a href="{{ route('disconnect.edit',$items->deployment_id) }}" class="dropdown-item"
                                                type="button">
                                                <i class="fas fa-edit mr-2"></i>
                                                Edit
                                            </a>
                                            <form action="{{ route('disconnect.destroy',$items->deployment_id) }}" method="POST"
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

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('database.import')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="exampleFormControlFile1">Pilih file</label>
                                <input type="file" name="file" class="form-control-file" id="exampleFormControlFile1"
                                    required>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-secondary">Import</button>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
