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
use App\Models\SatuanTabel;
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
        ->select("witel_id", "witel_nama")
        ->get();

        $olo_data = DB::table("olo_tabel")
        ->select("olo_id","olo_nama")
        ->get();

        $order_type_data = DB::table("order_type_tabel")
        ->select("order_type_id", "order_type_nama")
        ->get();

        $produk_data = DB::table("produk_tabel")
        ->select("produk_id", "produk_nama")
        ->get();

        $status_ncx_data = DB::table("status_ncx_tabel")
        ->select("status_ncx_id", "status_ncx_nama")
        ->get();

        $status_wfm = DB::table("deployment_tabel")
        ->select("deployment_tabel.status_wfm as status_wfm")
        ->get();

        
        

        

        

        return view('deployment.index', ['title' => 'Halaman Deployment', 
        'deployment' => DeploymentTabel::orderBy('deployment_id')->filter(request(['no_ao', 
        'tanggal', 'witel', 'olo', 'order_type', 'produk', 'status_ncx', 'status_wfm'
        ]))->get(),
        'ao_data' => $ao_data, 
        'witel_data' => $witel_data,
        'olo_data' => $olo_data,
        'order_type_data' => $order_type_data,
        'produk_data' => $produk_data,
        'status_ncx_data' => $status_ncx_data,
        'status_wfm' => $status_wfm,

    ]);
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('wfm.create', ["title" => "Tambah Data - WFM"]);
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
