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
    @elseif (session()->has('failed'))
    <div class="success-tambah align-items-center mt-3" id="success-tambah">
        <div class="d-flex">
            <div class="ml-3 p-2 align-self-center text-danger">
                <i class="las la-close display-4"></i>
            </div>
            <div class="p-2 flex-grow-1 border-right">
                <h3 class="mt-2">Failed</h3>
                <p class="pesan-gagal">{{ session('failed') }}</p>
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
                    <a href="{{ route('assurance.index') }}">Clear Filters</a>
                </div>
                <form action="{{ route('assurance.index') }}" method="GET">
                    {{-- filter field --}}
                    <div class="form-row">
                        <div class="col">
                            <label for="incident_domain">Incident Domain</label>
                            <select class="form-control" id="incident_domain" name="incident_domain">

                                @if (request('incident_domain'))
                                <option value="{{ request('incident_domain') }}">
                                Pilih Incident Domain
                                </option>
                                @else
                                <option value="">Pilih Incident Domain</option>
                                @endif

                                @foreach ($incident_domain_data as $dbs)
                                <option value="{{ $dbs->incident_domain_id }}">{{ $dbs->incident_domain_nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col">
                            <label for="tgl_bulan_dr_assurance">Dari Tanggal</label>
                            <input type="date" class="form-control" placeholder="Tanggal" name="tgl_bulan_dr_assurance"
                                    id="tgl_bulan_dr_assurance">
                        </div>
                        <div class="col">
                            <label for="tgl_bulan_sd_assurance">Sampai Tanggal</label>
                            <input type="date" class="form-control" placeholder="Tanggal" name="tgl_bulan_sd_assurance"
                                    id="tgl_bulan_sd_assurance">
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
                    </div>                  
                    {{-- akhir filter field --}}

                    {{-- button filter --}}
                    <div class="mt-3 text-right">
                        <button class="btn btn-reset px-4 py-3/2" type="reset">Reset</button>
                        <button class="btn btn-filter px-4 py-3/2" type="submit">Filter</button>
                    </div>
                </form>
            </div>

            <span id="ct" class="mt-3 d-block text-right"></span>
            <div class="card mt-2 mb-5 shadow-sm">
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col">
                            <h2 class="">Assurance</h2>
                        </div>
                        <div class="col text-right">
                            {{-- notifikasi form validasi --}}
                            @if ($errors->has('file'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('file') }}</strong>
                            </span>
                            @endif
                    
                            {{-- notifikasi sukses --}}
                            @if ($sukses = Session::get('sukses'))
                            <div class="alert alert-success alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button> 
                                <strong>{{ $sukses }}</strong>
                            </div>
                            @endif
                            
                            {{-- import/exportBtn --}}
                            <button type="button" class="btn btn-outline" data-toggle="modal"
                                data-target="#importButton">
                                <i class="las la-upload"></i> Import
                            </button>

                            <a href="{{ route('assurance.export') }}" class="btn btn-second-thin ml-2">
                                <i class="las la-download"></i> Export
                            </a>

                            <!-- Import Excel -->
                            <div class="modal fade" id="importButton" data-backdrop="static" data-keyboard="false" tabindex="-1"
                            aria-labelledby="importButtonLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="importButtonLabel">Import Excel</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('assurance.import')}}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <p class="text-left"><i class="las la-info-circle"></i> Sebelum Import pastikan sesuai dengan template!</p>
                                            <div class="input-group mb-3">
                                                <div class="custom-file">
                                                <input type="file" class="form-control" id="file" name="file" aria-describedby="inputGroupFileAddon04" aria-label="Upload" required
                                                 accept=".xlsx, .csv, .xls, .ods, .tsv">
                                                    <label class="custom-file-label" for="file">Pilih File</label>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-second btn-block">Import</button>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-second-thin text-bold" data-toggle="modal"
                                            data-target="#templateButton">Lihat Template</button>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                
                <div class="div 1">
                    <table class="table table-responsive table-hover table-coba" id="table_id">
                        <thead>
                            <th>No</th>
                            <th>Incident</th>
                            <th>Customer Name</th>
                            <th>Summary</th>
                            <th class="text-nowrap">Service ID</th>
                            <th class="text-nowrap">Related to Global Issue</th>
                            <th>Gaul</th>
                            <th class="text-nowrap">REPORTED DATE</th>
                            <th class="text-nowrap">REPORTED TIME</th>
                            <th class="text-nowrap">TTR E2E</th>
                            <th class="text-nowrap">TTR Customer</th>
                            <th class="text-nowrap">TTR Nasional</th>
                            <th class="text-nowrap">TTR Regional</th>
                            <th class="text-nowrap">TTR Witel</th>
                            <th class="text-nowrap">TTR Mitra</th>
                            <th class="text-nowrap">TTR Agent</th>
                            <th class="text-nowrap">TTR Pending</th>
                            <th class="text-nowrap">Pending Reason</th>
                            <th>Workzone</th>
                            <th>Witel</th>
                            <th>Incident's Symptom</th>
                            <th>Solution's Segment</th>
                            <th>Actual Solution</th>
                            <th>Incident Domain</th>
                            <th>Resolved Date</th>
                            @canany(['admin', 'editor'])
                            <th scope="col"><span class="las la-ellipsis-v"></span></th>
                            @endcanany
                        </thead>
                        <tbody>
                            @foreach ($assurance as $data)
                            <tr>
                                <td class="text-center">{{$loop->iteration }}</td>
                                <td>{{$data->incident }}</td>
                                <td>{{$data->REKAP_OLO_NAMA }}</td>
                                <td>{{$data->summary }}</td>
                                <td>{{$data->service_id }}</td>
                                <td>{{$data->related_to_global_issue }}</td>
                                <td>{{$data->gaul }}</td>
                                <td>{{$data->reported_date }}</td>
                                <td>{{$data->reported_time }}</td>
                                <td>{{$data->TTR_E2E }}</td>
                                <td>{{$data->ttr_customer }}</td>
                                <td>{{$data->ttr_nasional }}</td>
                                <td>{{$data->ttr_regional }}</td>
                                <td>{{$data->ttr_witel }}</td>
                                <td>{{$data->ttr_mitra }}</td>
                                <td>{{$data->ttr_agent }}</td>
                                <td>{{$data->ttr_pending }}</td>
                                <td>{{$data->pending_reason }}</td>
                                <td>{{$data->workzone }}</td>
                                <td>{{$data->REKAP_WITEL_NAMA}}</td>
                                <td>{{$data->incidents_symptom }}</td>
                                <td>{{$data->solutions_segment }}</td>
                                <td>{{$data->actual_solution }}</td>
                                <td>{{$data->INCIDENT_DOMAIN_NAMA }}</td>
                                <td>{{$data->resolved_date }}</td>
                                @canany(['admin', 'editor'])
                                <td class="text-center">
                                    <div class="dropleft" title="Menu">
                                        <span class="las la-ellipsis-v" id="menuEdit" data-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false"></span>
                                        <div class="dropdown-menu" aria-labelledby="menuEdit">
                                            <a href="{{ route('assurance.edit',$data->assurance_id) }}" class="dropdown-item"
                                                type="button">
                                                <i class="fas fa-edit mr-2"></i>
                                                Edit
                                            </a>
                                            <form action="{{ route('assurance.destroy',$data->assurance_id) }}" method="POST"
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
