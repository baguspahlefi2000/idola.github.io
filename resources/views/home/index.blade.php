@extends('template.main')

@section('contain')
<div class="container-fluid isi">
    <div class="head-text mt-4 mb-4">
        <div class="row">
            <div class="col-md-4 tulisan">
                <h4>OLO CUSTOMER DATA HIGHLIGHTS</h4>
             </div>
            <div class="col">
                <span id="ct" class="mt-3 d-block text-right"></span>
            </div>
        </div>
    </div>

    <!-- Data Semua -->
    <div class="card">
        <!-- Data Row 1 -->
        <div class="row">
            <div class="col-md-lg m-4">
                <div class="form-row row-rumah">
                    <div class="col rumah-1">
                        <label class="mt-4" for="witel">Witel</label><br>
                        @foreach ($witel as $item)
                        <div class="mt-0 mb-3 mx-5 bg-light text-dark rounded isi-rumah">{{ $item->REKAP_WITEL }}</div>
                        @endforeach
                    </div>
                    <div class="col rumah-2">
                        <label class="mt-4" for="produk">Produk</label>
                        @foreach ($produk as $item)
                        <div class="mt-0 mb-3 mx-5 bg-light text-dark rounded isi-rumah">{{ $item->REKAP_PRODUK }}</div>
                        @endforeach
                    </div>
                    <div class="col rumah-3">
                        <label class="mt-4" for="witel">Customer</label>
                        @foreach ($customer as $item)
                        <div class="mt-0 mb-3 mx-5 bg-light text-dark rounded isi-rumah">{{ $item->REKAP_CUSTOMER }}</div>
                        @endforeach
                    </div>
                </div>
                <div class="row mt-4 table-rekap">
                    <table class="table table-borderless ">
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
                            <td><div class="py-2 px-3 data-1">{{ $item->REKAP_AKTIVASI_SATU }}</div></td>
                            <td><div class="py-2 px-3 data-1">{{ $item->REKAP_MODIFY_SATU }}</div></td>
                            <td><div class="py-2 px-3 data-1">{{ $item->REKAP_DISCONNECT_SATU }}</div></td>
                            <?php
                                $totalSatu = $item->REKAP_AKTIVASI_SATU + $item->REKAP_MODIFY_SATU + $item->REKAP_DISCONNECT_SATU;
                            ?>
                            <td><div class="py-2 px-3 total-1">{{ $totalSatu }}</div></td>
                            @endforeach
                        </tbody>
                        <tbody>
                            <?php
                                $totalDua = 0;
                                
                            ?>
                            <td class="tahun">2022</td>
                            @foreach ($rekapDua as $item)
                            <td><div class="py-2 px-3 data-2">{{ $item->REKAP_AKTIVASI_DUA }}</div></td>
                            <td><div class="py-2 px-3 data-2">{{ $item->REKAP_MODIFY_DUA }}</div></td>
                            <td><div class="py-2 px-3 data-2">{{ $item->REKAP_DISCONNECT_DUA }}</div></td>
                            <?php
                                $totalDua = $item->REKAP_AKTIVASI_DUA + $item->REKAP_MODIFY_DUA + $item->REKAP_DISCONNECT_DUA;
                            ?>
                            <td><div class="py-2 px-3 total-2">{{ $totalDua }}</div></td>
                           
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md m-4">
                <div class="form-row img-teknisi">
                    <img src="{{ asset('img/teknisi-olo.png') }}" alt="">
                </div>
            </div>
            <div class="col-md m-4">
                <div class="form-row img-teknisi">
                    <img src="{{ asset('img/teknisi-ff.png') }}" alt="">
                </div>
            </div>
        </div>
        <!--Tutup Data Row 1 -->

        <!-- Data Row 2 -->
        <div class="row mx-2">
            <div class="col">
                <div class="row">
                    <div class="col">
                        <h5>Top 10 Produk OLO</h5>
                    </div>
                    <div class="col">
                        <h5 class="text-right">Top 10 OLO</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md col-sm">
                        <table class="table table-kiri">
                            @foreach ($topProduk as $item)
                            <tr>
                                <td class="angka">{{ $loop->iteration }}</td>
                                <td class="text">{{ $item->REKAP_PRODUK_NAMA }}</td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                    <div class="col-lg-6 col-md col-sm">
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
            
            <div class="col-lg assurance text-center mx-2">
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
                            <div class="row mt-2">
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
                            <div class="row mt-4">
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
                            <table class="table table-kiri-assurance">
                            @foreach ($top_assurance as $item)
                                <tr>
                                    <td class="text text-nowrap text-left">{{ $item->REKAP_OLO_NAMA }}</td>
                                    <td class="angka">{{ $item->REKAP_ASSURANCE }}</td>
                                </tr>
                            @endforeach
                            </table>
                        </div>
                    </div>
                    <div class="row my-2 mb-4">
                        <div class="container">
                            <div id="container">
                        </div>
                            @foreach ($segment_gangguan as $item)
                            <?php
                                $cpe = $item->REKAP_CPE;
                                $odp = $item->REKAP_ODP;
                                $dropcore = $item->REKAP_DROPCORE;
                                $lain = $item->REKAP_LAIN;
                            ?>
                            @endforeach
                            
                        </div>
                    </div>
                </div>
            </div>

            <div class="col progressff">
                <div class="row">
                    <h5 class="ml-2">Progress FF</h5>
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
                            <div class="col-lg integrasi">
                                @foreach ($rekapIntegrasiSatu as $item)
                                <h4 class="mt-1 p-3 text-white">{{ $item->REKAP_DONE_INTEGRASI }}</h4>
                                @endforeach
                            </div>
                            <div class="col-lg integrasi-2 mr-4">
                                @foreach ($rekapIntegrasiDua as $item)
                                <h4 class="mt-1 p-3 text-white">{{ $item->REKAP_NOTYET_INTEGRASI }}</h4>
                                @endforeach
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <h6>Done Integrasi</h6>
                            </div>
                            <div class="col">
                                <h6>Menunggu Integrasi</h6>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="row justify-content-end">
                    <div class="col-4 totaltxtff text-center text-white">
                        <h6 class="pt-2 align-middle">Total</h6>
                    </div>
                </div>
                
                <div class="row justify-content-end">
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
        </div>
        <!-- Data Row 2 -->
        <div class="text-center mt-4">
            <img src="{{ asset('img/tulisan-home.png') }}" width="70%" alt="">
        </div>
    </div>
        
    </div>
    <!-- Tutup Data Semua -->
</div>
<!-- Chart Assurance -->
<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
    var cpe = <?php echo($cpe)?>;
    var odp = <?php echo($odp)?>;
    var dropcore = <?php echo($dropcore)?>;
    var lain = <?php echo($lain)?>;
    Highcharts.chart('container', {
    chart: {
        type: 'bar',
        
    },
    title: {
        text: 'Segmen Gangguan'
    },
    xAxis: {
        categories: ['CPE', 'ODP', 'DROP CORE', 'LAIN - LAIN'],
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
        data: [cpe, odp, dropcore, lain],
        color: '#bf9000'
    }]
});
</script>
@endsection

