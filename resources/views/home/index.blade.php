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
                            <td class="tahun">2021</td>
                            <td><div class="py-2 px-3 data-1">517</div></td>
                            <td><div class="py-2 px-3 data-1">155</div></td>
                            <td><div class="py-2 px-3 data-1">262</div></td>
                            <td><div class="py-2 px-3 total-1">934</div></td>
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
                            <tr>
                                <td class="angka">1</td>
                                <td class="text">BINA INFORMATIKA SOLUSINDO (FIBERCONNECT)</td>
                            </tr>
                            <tr>
                                <td class="angka">1</td>
                                <td class="text">BINA INFORMATIKA SOLUSINDO (FIBERCONNECT)</td>
                            </tr>
                            <tr>
                                <td class="angka">1</td>
                                <td class="text">BINA INFORMATIKA</td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-sm">
                        <table class="table table-kanan">
                            <tr>
                                <td class="text">Telkomsel</td>
                                <td class="angka">1</td>
                            </tr>
                            <tr>
                                <td class="text">Telkomsel</td>
                                <td class="angka">1</td>
                            </tr>
                            <tr>
                                <td class="text">Telkomsel</td>
                                <td class="angka">1</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col border border-primary">
                
            </div>
            <div class="col border border-primary">

            </div>
        </div>
        <!-- Data Row 2 -->
    </div>

    </div>

    <!-- Tutup Data Semua -->
</div>
@endsection
