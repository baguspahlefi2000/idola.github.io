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
            <div class="col m-4">
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
            <div class="col m-4">
                <div class="form-row img-teknisi">
                    <img src="{{ asset('img/teknisi-olo.png') }}" alt="">
                </div>
            </div>
            <div class="col m-4">
                <div class="form-row img-teknisi">
                    <img src="{{ asset('img/teknisi-ff.png') }}" alt="">
                </div>
            </div>
        </div>
        <!--Tutup Data Row 1 -->

        <!-- Data Row 2 -->
        <div class="row mx-2">
            <div class="col border border-primary">
                <div class="row">
                    <div class="col">
                        <h5>Top 10 Produk OLO</h5>
                    </div>
                    <div class="col">
                        <h5 class="text-right">Top 10 OLO</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm">
                        <table class="table table-kiri">
                            @foreach ($topProduk as $item)
                            <tr>
                                <td class="angka">{{ $loop->iteration }}</td>
                                <td class="text">{{ $item->REKAP_PRODUK_NAMA }}</td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                    <div class="col-sm">
                        <table class="table table-kanan">
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
            
            <div class="col border border-primary">
                
                
                
            </div>

            <div class="col progressff">
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
                <div class="row text-center text-white mt-1 mb-4 mx-4">
                    <div class="col-4 integrasi">
                        <h4 class="p-3">881</h4>
                    </div>
                    <div class="col-4 integrasi-2">
                        <h4 class="p-3">8</h4>
                    </div>
                    <div class="col-4 integrasi-3">
                        <h4 class="p-3">8</h4>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-7">
                        <div class="row text-center">
                            <div class="col integrasi">
                                @foreach ($witel as $item)
                                <h4 class="mt-1 p-3 text-white">{{ $item->REKAP_WITEL }}</h4>
                                @endforeach
                            </div>
                            <div class="col integrasi-2 mr-4">
                                @foreach ($witel as $item)
                                <h4 class="mt-1 p-3 text-white">{{ $item->REKAP_WITEL }}</h4>
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
                    <div class="col-4 totalff">
                        <h2 class="py-3 text-center text-white">81</h2>
                    </div>
                </div>
                
            </div>
        </div>
        <!-- Data Row 2 -->
    </div>

    </div>

    <!-- Tutup Data Semua -->
</div>
@endsection
