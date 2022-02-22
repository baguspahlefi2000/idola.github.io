<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\DeploymentTabel;
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
        'rekapWfm' => DeploymentTabel::rekapWfm()->get(),
        'rekapIntegrasiSatu' => DeploymentTabel::rekapIntegrasiSatu()->get(),
        'rekapIntegrasiDua' => DeploymentTabel::rekapIntegrasiDua()->get()]);
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
