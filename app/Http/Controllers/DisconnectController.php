<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\DeploymentTabel;
use App\Models\WitelTabel;
use App\Models\OloTabel;
use App\Models\OrderTypeTabel;
use App\Models\ProdukTabel;
use App\Models\StatusNcxTabel;
use App\Models\SiteKriteriaTabel;
use App\Models\SatuanTabel;
use App\Models\StatusIntegrasiTabel;
use App\Models\OdpTabel;
use App\Models\JenisNteTabel;
use App\Models\StatusDisconnectDetailTabel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class DisconnectController extends Controller
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
        ->where('order_type_id', '=', '3')
        ->get();

        $witel_data = DB::table("witel_tabel")
        ->select("witel_id", "witel_nama")
        ->get();

        $olo_data = DB::table("olo_tabel")
        ->select("olo_id","olo_nama")
        ->get();

        $jenis_nte_data = DB::table("jenis_nte_tabel")
        ->select("jenis_nte_id", "jenis_nte_nama")
        ->get();

        $status_disconnect_detail_data = DB::table("status_disconnect_detail_tabel")
        ->select("status_disconnect_detail_id", "status_disconnect_detail_nama")
        ->get();


        return view('disconnect.index', [
            'title' => 'Halaman Disconnect',
            'disconnect' => DeploymentTabel::orderBy('deployment_id')->where('order_type_id', '=', '3')->filter(request(['no_ao', 
        'tanggal', 'witel', 'olo', 'jenis_nte', 'status_disconnect_detail'
        ]))->get(),
        'ao_data' => $ao_data, 
        'witel_data' => $witel_data,
        'olo_data' => $olo_data,
        'jenis_nte_data' => $jenis_nte_data,
        'status_disconnect_detail_data' => $status_disconnect_detail_data
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
    public function edit(DeploymentTabel $disconnect)
    {
        $ao_data = DB::table("deployment_tabel")
        ->select("deployment_tabel.ao as no_ao")
        ->where('order_type_id', '=', '3')
        ->get();

        $witel_data = DB::table("witel_tabel")
        ->select("witel_id", "witel_nama")
        ->get();

        $olo_data = DB::table("olo_tabel")
        ->select("olo_id","olo_nama")
        ->get();

        $jenis_nte_data = DB::table("jenis_nte_tabel")
        ->select("jenis_nte_id", "jenis_nte_nama")
        ->get();

        $status_disconnect_detail_data = DB::table("status_disconnect_detail_tabel")
        ->select("status_disconnect_detail_id", "status_disconnect_detail_nama")
        ->get();

        return view('disconnect.edit', ['title' => 'Halaman Disconnect', 
        'disconnect' => $disconnect,
        'ao_data' => $ao_data, 
        'witel_data' => $witel_data,
        'olo_data' => $olo_data,
        'jenis_nte_data' => $jenis_nte_data,
        'status_disconnect_detail_data' => $status_disconnect_detail_data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DeploymentTabel $disconnect)
    {
        $disconnect->tanggal = $request->tanggal;
        $disconnect->ao = $request->ao;
        $disconnect->witel_id = $request->witel;
        $disconnect->olo_id = $request->olo;
        $disconnect->alamat_asal = $request->alamat_asal;
        $disconnect->jenis_nte_id = $request->jenis_nte;
        $disconnect->jumlah_nte = $request->jumlah_nte;
        $disconnect->status_disconnect_detail_id = $request->status_disconnect_detail;
        $disconnect->tgl_plan_cabut = $request->tgl_plan_cabut;
        $disconnect->save();

        sleep(1);

       
        return redirect()->route('disconnect.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(DeploymentTabel $disconnect)
    {
        $disconnect->delete();
        sleep(1);
        return redirect()->route('disconnect.index');
    }
}
