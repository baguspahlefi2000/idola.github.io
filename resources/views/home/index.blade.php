@extends('template.main')

@section('contain')
<div class="container-fluid">
    <div class="head-text my-4">
        <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 tulisan">
                <h4>OLO CUSTOMER DATA HIGHLIGHTS</h4>
             </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                <span id="ct" class="mt-3 d-block text-right"></span>
            </div>
        </div>
    </div>

    <!-- Data Semua -->
    <div class="card">
        <div class="card-body">
        <!-- Data Row 1 -->
        <div class="row mx-auto">
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                <div class="form-row row-rumah">
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 mt-4">
                        <div class="rumah-1 p-2">
                            <label class="mt-4" for="witel">Witel</label><br>
                            @foreach ($witel as $item)
                            <div class="mt-0 mb-3 bg-light text-dark rounded isi-rumah">{{ $item->REKAP_WITEL }}</div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 mt-4">
                        <div class="rumah-2 p-2">
                            <label class="mt-4" for="produk">Produk</label>
                            @foreach ($produk as $item)
                            <div class="mt-0 mb-3 bg-light text-dark rounded isi-rumah">{{ $item->REKAP_PRODUK }}</div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 mt-4">
                    <div class="rumah-3 p-2">
                        <label class="mt-4" for="witel">Customer</label>
                        @foreach ($customer as $item)
                        <div class="mt-0 mb-3 bg-light text-dark rounded isi-rumah">{{ $item->REKAP_CUSTOMER }}</div>
                        @endforeach
                    </div>
                    </div>
                    
                    
                </div>
                <div class="row mt-4 table-rekap mx-auto">
                    <div class="col">
                        <table class="table table-borderless table-satu">
                            <thead>
                                <th> </th>
                                <th class="text-nowrap text-center">New Install</th>
                                <th class="text-center">Modify</th>
                                <th class="text-nowrap text-center">Disconnect</th>
                                <th class="text-nowrap text-center">Total</th>
                            </thead>
                            <tbody>
                                <?php
                                    $totalSatu = 0;
                                    
                                ?>
                                <td class="tahun">2021</td>
                                @foreach ($rekapSatu as $item)
                                <td><div class="data-1">{{ $item->REKAP_AKTIVASI_SATU }}</div></td>
                                <td><div class="data-1">{{ $item->REKAP_MODIFY_SATU }}</div></td>
                                <td><div class="data-1">{{ $item->REKAP_DISCONNECT_SATU }}</div></td>
                                <?php
                                    $totalSatu = $item->REKAP_AKTIVASI_SATU + $item->REKAP_MODIFY_SATU + $item->REKAP_DISCONNECT_SATU;
                                ?>
                                <td><div class="total-1">{{ $totalSatu }}</div></td>
                                @endforeach
                            </tbody>
                            <tbody>
                                <?php
                                    $totalDua = 0;
                                    
                                ?>
                                <td class="tahun">2022</td>
                                @foreach ($rekapDua as $item)
                                <td><div class="data-2">{{ $item->REKAP_AKTIVASI_DUA }}</div></td>
                                <td><div class="data-2">{{ $item->REKAP_MODIFY_DUA }}</div></td>
                                <td><div class="data-2">{{ $item->REKAP_DISCONNECT_DUA }}</div></td>
                                <?php
                                    $totalDua = $item->REKAP_AKTIVASI_DUA + $item->REKAP_MODIFY_DUA + $item->REKAP_DISCONNECT_DUA;
                                ?>
                                <td><div class="total-2">{{ $totalDua }}</div></td>
                               
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 mt-4">
                <div class="form-row img-teknisi">
                    <img src="{{ asset('img/teknisi-olo.png') }}" alt="">
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 mt-4">
                <div class="form-row img-teknisi">
                    <img src="{{ asset('img/teknisi-ff.png') }}" alt="">
                </div>
            </div>
        </div>
        <!--Tutup Data Row 1 -->

        <!-- Data Row 2 -->
        <div class="row">
            <div class="col-xl-4 col-lg-4 p-0 mt-4">
                <div class="row">
                    <div class="col">
                        <h5>Top 10 Produk OLO</h5>
                    </div>
                    <div class="col">
                        <h5 class="text-right">Top 10 OLO</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                        <table class="table table-kiri">
                            @foreach ($topProduk as $item)
                            <tr>
                                <td class="angka">{{ $loop->iteration }}</td>
                                <td class="text">{{ $item->REKAP_PRODUK_NAMA }}</td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                        <table class="table table-kanan nopadding">
                            @foreach ($topOlo as $item)
                            <tr>
                                <td class="text">{{ $item->REKAP_OLO_NAMA }}</td>
                                <td class="angka">{{ $loop->iteration }}</td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
            
            <div class="col-xl-4 col-lg-4 text-center mx-auto mt-4">
                <div class="assurance">
                    <div class="container">
                    <div class="row">
                        <h5 class="ml-2">Rekap Assurance</h5>
                    </div>
                    <form class="text-left" action="{{ route('home.index') }}" method="GET">
                        <div class="row tanggal ">
                            <div class="col-6">
                            <h6 for="tgl_bulan_dr_assurance">Dari Tanggal</h6>
                                <input type="date" class="form-control" placeholder="Tanggal" name="tgl_bulan_dr_assurance"
                                        id="tgl_bulan_dr_assurance">
                            </div>
                            <div class="col-6">
                            <h6 for="tgl_bulan_sd_assurance">Sampai Tanggal</h6>
                                <input type="date" class="form-control" placeholder="Tanggal" name="tgl_bulan_sd_assurance"
                                        id="tgl_bulan_sd_assurance">
                            </div>
                            <div class="col-6">
                                <button class="btn btn-reset px-4 py-2 mt-4 mr-2" type="submit">Reset</button>
                            </div>
                            <div class="col-6">
                                <button class="btn btn-filter px-4 py-2 mt-4 mr-2" type="submit">Filter</button>
                            </div>
                        </div>
                    </form>
                        <div class="row py-3 mt-3">
                            <div class="col-3">
                                <div class="row">
                                    <div class="container">
                                        <h6>Comply</h6>
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <div class="container">
                                        <h6>Not Comply</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col content-comply">
                            @foreach ($comply_not_comply as $item)
                                <div class="row">
                                    <div class="container comply">
                                        {{ $item->COMPLY }}
                                    </div>
                                </div>
                                <div class="row mt-lg-2">
                                    <div class="container not-comply">
                                    {{ $item->NOT_COMPLY }}
                                    </div>
                                </div>
                            @endforeach
                            </div>
                            <div class="col content-total mx-3">
                                <div class="row total">
                                    <div class="container" style="font-weight:bold;">
                                        Total
                                    </div>
                                </div>
                                <div class="row isi-total">
                                    <div class="container">
                                    @foreach ($rekap_assurance as $item)
                                        <h1 class="text-white">{{ $item->REKAP_ASSURANCE }}</h1>
                                    @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="col mttr">
                                <div class="row">
                                    <div class="container mt-2 fw-bold">
                                        <b>MTTR</b>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="container mt-2 isi-mttr">
                                    @foreach ($mttr as $item)
                                        <b>{{ $item->MTTR }}</b>
                                    @endforeach 
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col text-center">
                                <h3>OLO Terganggu</h3>
                            </div>
                        </div>
                        <div class="row g-3 justify-content-center">
                            <div class="col-2 d-flex justify-content-center tabel-ruwet">
                                <table class="table table-kiri-assurance" id="table_id">
                                    <thead>
                                        <th>Olo nama</th>
                                        <th>Jumlah</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($top_assurance as $item)
                                        <tr>
                                            <td class="text text-nowrap text-left">{{ $item->REKAP_OLO_NAMA }}</td>
                                            <td class="angka">{{ $item->REKAP_ASSURANCE }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row my-2 mb-4">
                            <div class="container">
                                <div id="container">
                            </div>
                            @foreach ($segment_gangguan as $item)
                                <?php
                                    $dropcore = $item->REKAP_DROPCORE;
                                    $odp = $item->REKAP_ODP;
                                    $cpe = $item->REKAP_CPE;
                                    $etc = $item->REKAP_ETC;
                                ?>
                            @endforeach
                            
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>

            <div class="col-xl-4 col-lg-4 mt-4">
                <div class="progressff pl-3">
                    <div class="row">
                        <h5 class="ml-2">Progress Fulfillment</h5>
                    </div>
                    <form action="{{ route('home.index') }}" method="GET">
                        <div class="row tanggal ">
                            <div class="col-6">
                            <h6 for="tgl_bulan_dr">Dari Tanggal</h6>
                                <input type="date" class="form-control" placeholder="Tanggal" name="tgl_bulan_dr"
                                        id="tgl_bulan_dr">
                            </div>
                            <div class="col-6">
                            <h6 for="tgl_bulan_th_sd">Sampai Tanggal</h6>
                                <input type="date" class="form-control" placeholder="Tanggal" name="tgl_bulan_sd"
                                        id="tgl_bulan_sd">
                            </div>
                            <div class="col-6">
                                <button class="btn btn-reset px-4 py-2 mt-4 mr-2" type="submit">Reset</button>
                            </div>
                            <div class="col-6">
                                <button class="btn btn-filter px-4 py-2 mt-4 mr-2" type="submit">Filter</button>
                            </div>
                        </div>
                    </form>
         
                        <div class="isi-ff">
                            <div class="row mt-4 text-center mx-4">
                                <div class="col">
                                    <h6>Complete</h6>
                                </div>
                                <div class="col">
                                    <h6>On Progress</h6>
                                </div>
                                <div class="col">
                                    <h6>Cancel</h6>
                                </div>
                            </div>
                            <?php
                                $totalff = 0;
                            ?>
                        
                            <div class="row text-center text-white mt-1 mb-4 mx-4">
                            @foreach ($rekapWfm as $item)
                                <div class="col-4 integrasi">
                                    <h4 class="p-3">{{ $item->REKAP_DONE }}</h4>
                                </div>
                                <div class="col-4 integrasi-2">
                                    <h4 class="p-3">{{ $item->REKAP_ONPROGRESS }}</h4>
                                </div>
                                <div class="col-4 integrasi-3">
                                    <h4 class="p-3">{{ $item->REKAP_CANCEL }}</h4>
                                </div>
                            @endforeach
                            </div>
    
                            <hr class="vertical-line">
                            <hr class="vertical-line-2">
    
                            <div class="row mt-4">
                                <div class="col-7">
                                    <div class="row text-center">
                                        <div class="col-lg done-integrasi">
                                            @foreach ($rekapIntegrasiSatu as $item)
                                            <h4 class="mt-1 p-3 text-white">{{ $item->REKAP_DONE_INTEGRASI }}</h4>
                                            @endforeach
                                        </div>
                                        <div class="col-lg menunggu-integrasi">
                                            @foreach ($rekapIntegrasiDua as $item)
                                            <h4 class="mt-3 text-white text-center">{{ $item->REKAP_NOTYET_INTEGRASI }}</h4>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <h6>Done Integrasi</h6>
                                        </div>
                                        <div class="col">
                                            <h6 class="text-menunggu-integrasi">Menunggu Integrasi</h6>
                                        </div>
                                    </div>
                                </div>
    
                            </div>

                            
    
                            <div class="row justify-content-end pr-3">
                                <div class="col-4 totaltxtff text-center text-white">
                                    <h6 class="pt-2 align-middle">Total</h6>
                                </div>
                            </div>
                            
                            <div class="row justify-content-end pr-3">
                                @foreach ($rekapWfm as $item)
                                <?php
                                $totalff = $item->REKAP_DONE + $item->REKAP_ONPROGRESS + $item->REKAP_CANCEL;
                                ?>
                                <div class="col-4 totalff">
                                    <h2 class="py-3 text-center text-white">{{ $totalff }}</h2>
                                </div>
                                @endforeach
                            </div>
                        </div>
                </div>

                <div class="progresslapangan">
                    <div class="row">
                        <h5 class="ml-3">Progress Lapangan</h5>
                    </div>
                    <form action="{{ route('home.index') }}" method="GET">
                        <div class="row tanggal ">
                            <div class="col-6">
                            <h6 for="tgl_bulan_dr_progress_lapangan">Dari Tanggal</h6>
                                <input type="date" class="form-control" placeholder="Tanggal" name="tgl_bulan_dr_progress_lapangan"
                                        id="tgl_bulan_dr_progress_lapangan">
                            </div>
                            <div class="col-6">
                            <h6 for="tgl_bulan_sd_progress_lapangan">Sampai Tanggal</h6>
                                <input type="date" class="form-control" placeholder="Tanggal" name="tgl_bulan_sd_progress_lapangan"
                                        id="tgl_bulan_sd_progress_lapangan">
                            </div>
                            <div class="col-6">
                                <button class="btn btn-reset px-4 py-2 mt-4 mr-2" type="submit">Reset</button>
                            </div>
                            <div class="col-6">
                                <button class="btn btn-filter px-4 py-2 mt-4 mr-2" type="submit">Filter</button>
                            </div>
                        </div>
                    </form>
         
                        <div class="isi-progresslapangan mt-4">
                            @foreach ($rekap_status_proglapangan as $item)
                            <div class="row mx-auto">
                                <div class="col">
                                    <div class="row txtprogresslapangan">
                                        <h6>Done</h6>
                                    </div>
                                    <div class="row bg-doneprogresslapangan">
                                        <h4 class="m-auto text-white  txt-progresslapangan">{{ $item->REKAP_DONE_PROGLAPANGAN }}</h4>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="row txtprogresslapangan">
                                        <h6 class="text-nowrap">In Progress</h6>
                                    </div>
                                    <div class="row bg-inprogresslapangan">
                                        <h4 class="m-auto text-white  txt-progresslapangan">{{ $item->REKAP_INPROG_PROGLAPANGAN }}</h4>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="row txtprogresslapangan">
                                        <h6>Cancel</h6>
                                    </div>
                                    <div class="row bg-cancelprogresslapangan">
                                        <h4 class="m-auto text-white txt-progresslapangan">{{ $item->REKAP_CANCEL_PROGLAPANGAN }}</h4>
                                    </div>
                                </div>
                                <?php
                                $totalff = 0;
                                $totalff = $item->REKAP_DONE_PROGLAPANGAN + $item->REKAP_INPROG_PROGLAPANGAN + $item->REKAP_CANCEL_PROGLAPANGAN;
                                ?>
                                <div class="col-3 ">
                                    <div class="row totalprogresslapangan">
                                        <h6 class="m-auto py-2 text-white">Total</h6>
                                    </div>
                                    <div class="row totalisiprogresslapangan">
                                        <h3 class="m-auto py-3 text-white">{{ $totalff }}</h3>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                            <div class="row g-3 justify-content-center my-4">
                                <div class="col-2 d-flex justify-content-center tabel-ruwet">
                                    <table class="table table-kiri-assurance" id="table_id_progress">
                                        <thead>
                                            <th>Olo nama</th>
                                            <th>Jumlah</th>
                                        </thead>
                                        <tbody>
                                            @foreach ($top_proglapangan as $item)
                                            <tr>
                                                <td class="text text-nowrap text-left">{{ $item->REKAP_OLO_NAMA_PROGLAPANGAN }}</td>
                                                <td class="angka">{{ $item->REKAP_OLO_PROGLAPANGAN }}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                </div>

                <div class="progressintegrasi pl-3">
                    <div class="row">
                        <h5 class="ml-2">Progress Integrasi</h5>
                    </div>
                    <form action="{{ route('home.index') }}" method="GET">
                        <div class="row tanggal ">
                            <div class="col-6">
                            <h6 for="tgl_bulan_dr_integrasi">Dari Tanggal</h6>
                                <input type="date" class="form-control" placeholder="Tanggal" name="tgl_bulan_dr_integrasi"
                                        id="tgl_bulan_dr_integrasi">
                            </div>
                            <div class="col-6">
                            <h6 for="tgl_bulan_sd_integrasi">Sampai Tanggal</h6>
                                <input type="date" class="form-control" placeholder="Tanggal" name="tgl_bulan_sd_integrasi"
                                        id="tgl_bulan_sd_integrasi">
                            </div>
                            <div class="col-6">
                                <button class="btn btn-reset px-4 py-2 mt-4 mr-2" type="submit">Reset</button>
                            </div>
                            <div class="col-6">
                                <button class="btn btn-filter px-4 py-2 mt-4 mr-2" type="submit">Filter</button>
                            </div>
                        </div>
                    </form>
         
                        <div class="isi-progressintegrasi mt-4">
                            @foreach ($rekapIntegrasiTiga as $item)
                            <div class="row mx-auto">
                                <div class="col">
                                    <div class="row txtprogresslapangan">
                                        <h6>Done</h6>
                                    </div>
                                    <div class="row bg-doneprogresslapangan">
                                        <h4 class="m-auto text-white  txt-progresslapangan">{{ $item->REKAP_DONE_INTEGRASI }}</h4>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="row txtprogresslapangan">
                                        <h6 class="text-nowrap">In Progress</h6>
                                    </div>
                                    <div class="row bg-inprogresslapangan">
                                        <h4 class="m-auto text-white  txt-progresslapangan">{{$item->REKAP_NOTYET_INTEGRASI }}</h4>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="row txtprogresslapangan">
                                        <h6>Blank</h6>
                                    </div>
                                    <div class="row bg-cancelprogresslapangan">
                                        <h4 class="m-auto text-white txt-progresslapangan">{{ $item->REKAP_BLANK_INTEGRASI }}</h4>
                                    </div>
                                </div>
                                <?php
                                $totalff = 0;
                                $totalff = $item->REKAP_DONE_INTEGRASI + $item->REKAP_NOTYET_INTEGRASI + $item->REKAP_BLANK_INTEGRASI;
                                ?>
                                <div class="col-3 ">
                                    <div class="row totalintegrasi">
                                        <h6 class="m-auto py-2 text-white">Total</h6>
                                    </div>
                                    <div class="row totalisiintegrasi">
                                        <h3 class="m-auto py-3 text-white">{{ $totalff }}</h3>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                            
                            <div class="row g-3 justify-content-center mx-auto my-4">
                                <div class="col-2 d-flex justify-content-center tabel-ruwet">
                                    <table class="table table-kiri-assurance" id="table_id_integrasi">
                                        <thead>
                                            <th>Olo nama</th>
                                            <th>Jumlah</th>
                                        </thead>
                                        <tbody>
                                            @foreach ($topOloIntegrasi as $item)
                                            <tr>
                                                <td class="text text-nowrap text-left">{{ $item->REKAP_OLO_NAMA }}</td>
                                                <td class="angka">{{ $item->REKAP_OLO }}</td>
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



        <!-- Data Row 2 -->
        <div class="text-center mt-4">
            <img src="{{ asset('img/tulisan-home.png') }}" width="45%" alt="">
        </div>
            
        </div>
        
    </div>
        
    </div>
    <!-- Tutup Data Semua -->
</div>
<!-- Chart Assurance -->
<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
    var dropcore = <?php echo($dropcore)?>;
    var odp = <?php echo($odp)?>;
    var cpe = <?php echo($cpe)?>;
    var etc = <?php echo($etc)?>;
    Highcharts.chart('container', {
    chart: {
        type: 'bar',
        
    },
    title: {
        text: 'Segmen Gangguan'
    },
    xAxis: {
        categories: ['DROPCORE', 'ODP', 'CPE', 'LAIN-LAIN'],
        title: {
            text: null
        }
    },
    yAxis: {
        min: 0,
        title: {

        },
        labels: {
            overflow: 'justify'
        }
    },
    tooltip: {
        valueSuffix: ' gangguan'
    },
    plotOptions: {
        bar: {
            dataLabels: {
                enabled: false
            }
        }
    },
    credits: {
        enabled: false
    },
    series: [{
        name : 'Data Gangguan',
        data: [dropcore, odp, cpe, etc],
        color: '#bf9000'
    }]
});
</script>
@endsection

