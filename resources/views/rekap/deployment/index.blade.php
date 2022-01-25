@extends('template.main')

@section('contain')
<div class="container-fluid isi">
    <div class="row">
        <div class="col">
            <div class="m-0 p-0" id="filterform">
                <h4 class="filter-title" title="Filter"><i class="las la-filter"></i> Filter</h4>
                <div class="clear-filter">
                    <a href="{{ route('rekap.index') }}">Clear Filters</a>
                </div>
                <form action="{{ route('rekap.index') }}" method="GET">
                    {{-- filter field --}}
                    <div class="form-row">
                        <div class="col">
                            <label for="ao">No. AO</label>
                            
                            
                            <input list="aos" name="ao" id="ao" class="form-control" placeholder="Masukkan No. AO"
                                autocomplete="off">
           

                            <datalist id="aos">
            
                                <option value=""></option>
                            
                            </datalist>
                        </div>
                        <div class="col">
                            <label for="tanggal">Tanggal</label>
                            <input type="date" class="form-control" placeholder="Tanggal" name="tanggal" id="tanggal"
                                value="">
                        </div>

                        <div class="col">
                            <label for="witel">Witel</label>
                            <select class="form-control" id="witel" name="witel">
                                
                                <option value="">witel </option>
                               
                                <option value="">Pilih Witel</option>
                               

                             
                                <option value="">dbs witel </option>
                             
                            </select>
                        </div>

                        <div class="col">
                            <label for="olo">OLO</label>
                            <select class="form-control" id="olo" name="olo">
                              
                                <option value="">olo</option>
                                
                                <option value="">Pilih OLO</option>
                                

                                
                                <option value="">olo isp</option>
                                
                            </select>
                        </div>

                        <div class="col">
                            <label for="produk">Produk</label>
                            <select class="form-control" id="produk" name="produk">
                              
                                <option value="">produk </option>
                              
                                <option value="">Pilih Produk</option>

                                <option value="">Produk</option>

                            </select>
                        </div>

                        <div class="col">
                            <label for="progress">Progress</label>
                            <select class="form-control" id="progress" name="progress">
   
                                <option value="">Progress</option>

                                <option value="">Pilih Progress</option>


                                <option value="In Progress">In Progress</option>
                                <option value="Done">Done</option>
                                <option value="Cancel">Cancel</option>
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
            <ul class="nav tab-nav ml-n1 my-3">
                <li class="nav-item tab-rekap-item">
                    <a href="{{ route('rekap.index') }}#rekap-deployment" class="tab-rekap tab-active">Rekap
                        Deployment</a>
                </li>
                <li class="nav-item tab-rekap-item">
                    <a href="{{ route('rekapProgress.index') }}#rekap-progress" class="tab-rekap">Rekap Progress</a>
                </li>
            </ul>

            <div class="card mt-2 mb-2 shadow-sm" id="rekap-deployment">
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col">
                            <h2 class="">Rekap Deployment</h2>
                        </div>
                        <div class="col text-right button-list">
                            <a href="{{route('rekap.export')}}" class="btn btn-second-thin">
                                <i class="las la-download"></i> Export
                            </a>
                        </div>
                    </div>
                    <table class="table table-hover table-responsive-md" id="table_id">
                        <thead>
                            <tr>
                                <th class="text-center">NO</th>
                                <th>OLO</th>
                                <th class="text-center">Plan AKTIVASI</th>
                                <th class="text-center">PLAN MODIFY</th>
                                <th class="text-center">PLAN DISCONNECT</th>
                                <th class="text-center">AKTIVASI</th>
                                <th class="text-center">MODIFY</th>
                                <th class="text-center">DISCONNECT</th>
                                <th class="text-center">RESUME</th>
                                <th class="text-center">SUSPEND</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $aktivasi = 0;
                                $modify = 0;
                                $dc = 0;
                                $resume = 0;
                                $suspend = 0;
                                $olo_id = 0;
                                $totalPlanModify = 0;
                                $totalPlanDisconnect = 0;
                            ?>

                            
                            @foreach ($rekap as $item)
                            
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $item->olo_isp }}</td>
                                <td class="text-center">{{ $item->olo_id }}</td>
                                <td class="text-center">0</td>
                                <td class="text-center">0</td>
                                <td class="text-center">{{ $item->AKTIVASI }}</td>
                                <td class="text-center">{{ $item->MODIF }}</td>
                                <td class="text-center">{{ $item->DISCONNECT }}</td>
                                <td class="text-center">{{ $item->RESUME }}</td>
                                <td class="text-center">{{ $item->SUSPEND }}</td>
                            </tr>
                            <?php
                                $olo_id += $item->olo_id;
                                $aktivasi += $item->AKTIVASI;
                                $modify += $item->MODIF;
                                $dc += $item->DISCONNECT;
                                $resume += $item->RESUME;
                                $suspend += $item->SUSPEND;
                                ?>
                            @endforeach
                        </tbody>

                        <tfoot>
                            <tr>
                                <th colspan="2" class="text-center">TOTAL</th>
                                <td class="text-center">{{ $olo_id }}</td>
                                <td class="text-center">0</td>
                                <td class="text-center">0</td>
                                <th class="text-center">{{ $aktivasi }}</th>
                                <th class="text-center">{{ $modify }}</th>
                                <th class="text-center">{{ $dc }}</th>
                                <th class="text-center">{{ $resume }}</th>
                                <th class="text-center">{{ $suspend }}</th>
                            </tr>
                        </tfoot>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
