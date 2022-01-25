<?php

namespace App\Http\Controllers;


use App\Exports\WfmExport;
use App\Http\Controllers\Controller;
use App\Imports\WfmImport;
use App\Imports\WfmImportBaru;
use App\Models\DeploymentTabel;
use App\Models\WitelTabel;
use App\Models\OloTabel;
use App\Models\OrderTypeTabel;
use App\Models\ProdukTabel;
use App\Models\StatusNcxTabel;
use App\Models\SiteKriteriaTabel;
use Carbon\Carbon;
use Dotenv\Store\File\Reader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Gate;

class DeploymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ao_data = DB::table("deployment_tabel")
        ->select("deployment_tabel.ao as no_ao")
        ->get();

        $witel_data = DB::table("witel_tabel")
        ->select("witel_nama")
        ->get();

        $olo_data = DB::table("olo_tabel")
        ->select("olo_nama")
        ->get();

        $order_type_data = DB::table("order_type_tabel")
        ->select("order_type_nama")
        ->get();

        $produk_data = DB::table("produk_tabel")
        ->select("produk_nama")
        ->get();

        $status_ncx_data = DB::table("status_ncx_tabel")
        ->select("status_ncx_nama")
        ->get();

        $status_wfm = DB::table("deployment_tabel")
        ->select("deployment_tabel.status_wfm as status_wfm")
        ->get();

        $deployment_data = DB::table("deployment_tabel")
        ->join("witel_tabel", function($join){
            $join->on("witel_tabel.witel_id", "=", "deployment_tabel.witel_id");
        })
        ->join("olo_tabel", function($join){
            $join->on("olo_tabel.olo_id", "=", "deployment_tabel.olo_id");
        })
        ->join("site_kriteria_tabel", function($join){
            $join->on("site_kriteria_tabel.site_kriteria_id", "=", "deployment_tabel.site_kriteria_id");
        })
        ->join("order_type_tabel", function($join){
            $join->on("order_type_tabel.order_type_id", "=", "deployment_tabel.order_type_id");
        })
        ->join("produk_tabel", function($join){
            $join->on("produk_tabel.produk_id", "=", "deployment_tabel.order_type_id");
        })
        ->join("satuan_tabel", function($join){
            $join->on("satuan_tabel.satuan_id", "=", "deployment_tabel.satuan_id");
        })
        ->join("status_ncx_tabel", function($join){
            $join->on("status_ncx_tabel.status_ncx_id", "=", "deployment_tabel.status_ncx_id");
        })
        ->select("deployment_tabel.deployment_id", "deployment_tabel.tanggal as tanggal", "deployment_tabel.ao as no_ao", "witel_tabel.witel_nama as witel", "olo_tabel.olo_nama as olo", "site_kriteria_tabel.site_kriteria_nama as site_kriteria", "deployment_tabel.sid as sid", "deployment_tabel.site_id as site_id", "order_type_tabel.order_type_nama as order_type", "produk_tabel.produk_nama as produk", "satuan_tabel.satuan_nama as satuan", "deployment_tabel.kapasitas_bw as kapasitas", "deployment_tabel.longitude as longitude", "deployment_tabel.latitude as latitude", "deployment_tabel.alamat_asal as alamat_asal", "deployment_tabel.alamat_tujuan as alamat_tujuan", "status_ncx_tabel.status_ncx_nama as status_ncx", "deployment_tabel.berita_acara as berita_acara", "deployment_tabel.tgl_complete_wfm as tanggal_complete", "deployment_tabel.status_wfm as status_wfm", "deployment_tabel.alasan_cancel as alasan_cancel", "deployment_tabel.cancel_by as cancel_by", "deployment_tabel.start_cancel as start_cancel", "deployment_tabel.ready_after_cancel as ready_after_cancel", "deployment_tabel.integrasi as integrasi", "deployment_tabel.metro_1 as metro_1", "deployment_tabel.ip_1 as ip_1", "deployment_tabel.port_1 as port_1", "deployment_tabel.metro_2 as metro_2", "deployment_tabel.ip_2 as ip_2", "deployment_tabel.port_2 as port_2", "deployment_tabel.vlan as vlan", "deployment_tabel.vcid as vcid", "deployment_tabel.gpon as gpon", "deployment_tabel.ip_3 as ip_3", "deployment_tabel.port_3 as port_3", "deployment_tabel.sn as sn", "deployment_tabel.port_4 as port_4", "deployment_tabel.type_1 as type_1", "deployment_tabel.odp as odp", "deployment_tabel.kontak_pic_lokasi as kontak_pic_lokasi", "deployment_tabel.ip_4 as ip_4", "deployment_tabel.downlink as downlink", "deployment_tabel.type_2 as type_2")
        ->get();
        

        

        return view('deployment.index', ['title' => 'Halaman Deployment', 
        'deployment' => $deployment_data, 
        'ao_data' => $ao_data, 
        'witel_data' => $witel_data,
        'olo_data' => $olo_data,
        'order_type_data' => $order_type_data,
        'produk_data' => $produk_data,
        'status_ncx_data' => $status_ncx_data,
        'status_wfm' => $status_wfm

    ]);
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
