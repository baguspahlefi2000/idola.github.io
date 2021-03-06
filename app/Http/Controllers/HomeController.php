<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Models\AssuranceTabel;
use App\Models\DeploymentTabel;
use App\Models\ProgressLapanganTabel;
use App\Models\WitelTabel;
use App\Models\OloTabel;
use App\Models\OrderTypeTabel;
use App\Models\ProdukTabel;
use App\Models\StatusNcxTabel;
use App\Models\StatusWfmTabel;
use App\Models\SiteKriteriaTabel;
use App\Models\SatuanTabel;
use App\Models\StatusIntegrasiTabel;
use App\Models\OdpTabel;
use App\Models\StatusNteTabel;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home.index', ['title' => 'idola - Integrated Database OLO TR 3', 
        'witel' => WitelTabel::rekapWitel()->get(),
        'produk' => ProdukTabel::rekapProduk()->get(),
        'customer' => OloTabel::rekapCustomer()->get(),
        'rekapSatu' => DeploymentTabel::rekapSatu()->get(),
        'rekapDua' => DeploymentTabel::rekapDua()->get(),
        'topProduk' => DeploymentTabel::topProduk()->skip(0)->take(10)->get(),
        'topOlo' => DeploymentTabel::topOlo()->skip(0)->take(10)->get(),
        'rekapWfm' => DeploymentTabel::rekapWfm()->filter(request(['tanggal']))->get(),
        'rekapIntegrasiSatu' => DeploymentTabel::rekapIntegrasiSatu()->filter(request(['tanggal']))->get(),
        'rekapIntegrasiDua' => DeploymentTabel::rekapIntegrasiDua()->filter(request(['tanggal']))->get(),
        'rekapIntegrasiTiga' => DeploymentTabel::rekapIntegrasiTiga()->filterIntegrasi(request(['tanggal']))->get(),
        'topOloIntegrasi' => DeploymentTabel::topOlo()->filterIntegrasi(request(['tanggal']))->get(),
        'mttr' => AssuranceTabel::secondCal()->filter(request(['reported_date']))->get(),
        'comply_not_comply' => AssuranceTabel::thirdCal()->filter(request(['reported_date']))->get(),
        'rekap_assurance' => AssuranceTabel::fourthCal()->filter(request(['reported_date']))->get(),
        'segment_gangguan' => AssuranceTabel::fifthCal()->filter(request(['reported_date']))->get(),
        'top_assurance' => AssuranceTabel::sixthCal()->filter(request(['reported_date']))->get(),
        'rekap_status_proglapangan' => ProgressLapanganTabel::rekapProgressLapanganSatu()->filter(request(['tanggal']))->get(),
        'top_proglapangan' => ProgressLapanganTabel::topOloProgressLapangan()->filter(request(['tanggal']))->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
