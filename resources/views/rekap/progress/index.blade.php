@extends('template.main')

@section('contain')
<div class="container-fluid isi">
    <div class="row">
        <div class="col">
            <span id="ct" class="mt-3 d-block text-right"></span>
            <ul class="nav tab-nav ml-n1 my-3">
                <li class="nav-item tab-rekap-item">
                    <a href="{{ route('rekap.index') }}#rekap-deployment" class="tab-rekap">Rekap Deployment</a>
                </li>
                <li class="nav-item tab-rekap-item">
                    <a href="{{ route('rekapProgress.index') }}#rekap-progress" class="tab-rekap tab-active">Rekap
                        Progress</a>
                </li>
            </ul>
            <div class="col">
            <div class="m-0 p-0" id="filterform">
                <h4 class="filter-title" title="Filter"><i class="las la-filter"></i> Filter</h4>
                <div class="clear-filter">
                    <a href="{{ route('rekapProgress.index') }}">Clear Filters</a>
                </div>
                <form action="{{ route('rekapProgress.index') }}" method="GET">
                    {{-- filter field --}}
                    <div class="form-row">
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

            {{-- Table Rekap Progress --}}
            <div class="card mt-2 mb-5 shadow-sm" id="rekap-progress">
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col">
                            <h2 class="">Rekap Progress</h2>
                        </div>
                        <div class="col text-right button-list">
                            <a href="{{route('rekap.export')}}" class="btn btn-second-thin">
                                <i class="las la-download"></i> Export
                            </a>
                        </div>
                    </div>
                    <table class="table table-hover" id="table_id_2">
                        <thead>
                            <tr>
                                <th class="text-center">NO</th>
                                <th>OLO</th>
                                <th class="text-center">PLAN AKTIVASI</th>
                                <th class="text-center">PLAN MODIFY</th>
                                <th class="text-center">PLAN DISCONNECT</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $totalPlanAktivasi = 0;
                            $totalPlanModify = 0;
                            $totalPlanDisconnect = 0;
                            @endphp
                            @foreach ($rekap_pro as $item_repro)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $item_repro->OLO }}</td>
                                <td class="text-center">{{ $item_repro->PLAN_AKTIVASI }}</td>
                                <td class="text-center">{{ $item_repro->PLAN_MODIFY }}</td>
                                <td class="text-center">{{ $item_repro->PLAN_DISCONNECT }}</td>
                                {{-- <td class="text-center">{{ $item->PLAN_MODIFY }}</td>
                                <td class="text-center">{{ $item->PLAN_DISCONNECT }}</td> --}}
                            </tr>
                            @php
                            $totalPlanAktivasi += $item_repro->PLAN_AKTIVASI;
                            $totalPlanModify += $item_repro->PLAN_MODIFY;
                            $totalPlanDisconnect += $item_repro->PLAN_DISCONNECT;
                            @endphp
                            @endforeach
                        </tbody>

                        <tfoot>
                            <tr>
                                <th colspan="2" class="text-center">TOTAL</th>
                                <th class="text-center">{{ $totalPlanAktivasi }}</th>
                                <th class="text-center">{{ $totalPlanModify }}</th>
                                <th class="text-center">{{ $totalPlanDisconnect }}</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
