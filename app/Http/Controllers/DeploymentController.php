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
use App\Models\StatusIntegrasiTabel;
use App\Models\OdpTabel;
use App\Models\StatusNteTabel;
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

        $status_integrasi_data = DB::table("status_integrasi_tabel")
        ->select("status_integrasi_id", "status_integrasi_nama")
        ->get();
        
        

        

        
        

        

        

        return view('deployment.index', ['title' => 'Halaman Deployment', 
        'deployment' => DeploymentTabel::orderBy('deployment_id')->filter(request(['no_ao', 
        'tanggal', 'witel', 'olo', 'order_type', 'produk', 'status_ncx', 'status_wfm','status_integrasi'
        ]))->get(),
        'ao_data' => $ao_data, 
        'witel_data' => $witel_data,
        'olo_data' => $olo_data,
        'order_type_data' => $order_type_data,
        'produk_data' => $produk_data,
        'status_ncx_data' => $status_ncx_data,
        'status_wfm' => $status_wfm,
        'status_integrasi_data'=> $status_integrasi_data,

    ]);
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
        
        $site_kriteria_data = DB::table("site_kriteria_tabel")
        ->select("site_kriteria_id", "site_kriteria_nama")
        ->get();

        $order_type_data = DB::table("order_type_tabel")
        ->select("order_type_id", "order_type_nama")
        ->get();

        $produk_data = DB::table("produk_tabel")
        ->select("produk_id", "produk_nama")
        ->get();

        $satuan_data = DB::table("satuan_tabel")
        ->select("satuan_id", "satuan_nama")
        ->get();

        $status_ncx_data = DB::table("status_ncx_tabel")
        ->select("status_ncx_id", "status_ncx_nama")
        ->get();

        $status_odp_data = DB::table('odp_tabel')
        ->select("odp_id", "odp_nama")
        ->get();

        $status_integrasi_data = DB::table('status_integrasi_tabel')
        ->select("status_integrasi_id", "status_integrasi_nama")
        ->get();

        return view('deployment.create', ['title' => 'Tambah Data - WFM', 
        'ao_data' => $ao_data, 
        'witel_data' => $witel_data,
        'olo_data' => $olo_data,
        'site_kriteria_data' => $site_kriteria_data,
        'order_type_data' => $order_type_data,
        'produk_data' => $produk_data,
        'satuan_data' => $satuan_data,
        'status_ncx_data' => $status_ncx_data,
        'status_odp_data' => $status_odp_data,
        'status_integrasi_data' => $status_integrasi_data,]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if($request->hasFile('gponcapture')){
            $imgName = $request->gponcapture->getClientOriginalName() . '-' . time() . '.' . $request->gponcapture->extension();
            $request->gponcapture->move(public_path('img'), $imgName);
        }else{
            $imgName = null;
        }
        

        $wfm = new DeploymentTabel();
        $wfm->tanggal = $request->tanggal;
        $wfm->ao = $request->ao;
        $wfm->witel_id = $request->witel;
        $wfm->olo_id = $request->olo;
        $wfm->site_kriteria_id = $request->site_kriteria;
        $wfm->sid = $request->sid;
        $wfm->site_id = $request->site_id;
        $wfm->order_type_id = $request->order_type;
        $wfm->produk_id = $request->produk;
        $wfm->satuan_id = $request->satuan;
        $wfm->kapasitas_bw = $request->kapasitas_bw;
        $wfm->longitude = $request->longitude;
        $wfm->latitude = $request->latitude;
        $wfm->alamat_asal = $request->alamat_asal;
        $wfm->alamat_tujuan = $request->alamat_tujuan;
        $wfm->status_ncx_id = $request->status_ncx;
        $wfm->berita_acara = $request->berita_acara;
        $wfm->tgl_complete_wfm = $request->tgl_complete_wfm;
        $wfm->status_wfm = $request->status_wfm;
        $wfm->alasan_cancel = $request->alasan_cancel;
        $wfm->cancel_by = $request->cancel_by;
        $wfm->start_cancel = $request->start_cancel;
        $wfm->ready_after_cancel = $request->ready_after_cancel;
        $wfm->status_integrasi_id = $request->status_integrasi;
        $wfm->tanggal_integrasi = $request->tanggal_integrasi_b;
        $wfm->metro_backhaul = $request->metro_backhaul;
        $wfm->capture_metro_backhaul = $request->capture_metro_backhaul;
        $wfm->ip_1 = $request->ip_1;
        $wfm->port_1 = $request->port_1;
        $wfm->metro_access = $request->metro_access;
        $wfm->capture_metro_access = $request->capture_metro_access;
        $wfm->ip_2 = $request->ip_2;
        $wfm->port_2 = $request->port_2;
        $wfm->vlan = $request->vlan;
        $wfm->vcid = $request->vcid;
        $wfm->gpon = $request->gpon;
        $wfm->capture_gpon = $request->capture_gpon;
        $wfm->ip_3 = $request->ip_3;
        $wfm->port_3 = $request->port_3;
        $wfm->sn = $request->sn;
        $wfm->odp_id = $request->odp;
        $wfm->odp = $request->isi_odp;
        $wfm->port_4 = $request->port_4;
        $wfm->type_1 = $request->type_1;
        $wfm->kontak_pic_lokasi = $request->kontak_pic_lokasi;
        $wfm->ip_4 = $request->ip_4;
        $wfm->downlink = $request->downlink;
        $wfm->type_2 = $request->type_2;
        $wfm->gponcapture = $imgName;
        $wfm->save();

        sleep(1);
        return redirect()->route('deployment.index');
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
    public function edit(DeploymentTabel $Deployment)
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
        
        $site_kriteria_data = DB::table("site_kriteria_tabel")
        ->select("site_kriteria_id", "site_kriteria_nama")
        ->get();

        $order_type_data = DB::table("order_type_tabel")
        ->select("order_type_id", "order_type_nama")
        ->get();

        $produk_data = DB::table("produk_tabel")
        ->select("produk_id", "produk_nama")
        ->get();

        $satuan_data = DB::table("satuan_tabel")
        ->select("satuan_id", "satuan_nama")
        ->get();

        $status_ncx_data = DB::table("status_ncx_tabel")
        ->select("status_ncx_id", "status_ncx_nama")
        ->get();

        $status_odp_data = DB::table('odp_tabel')
        ->select("odp_id", "odp_nama")
        ->get();

        $status_integrasi_data = DB::table('status_integrasi_tabel')
        ->select("status_integrasi_id", "status_integrasi_nama")
        ->get();

        

        return view('deployment.edit', ['title' => 'Halaman Deployment', 
        'deployment' =>$Deployment,
        'ao_data' => $ao_data, 
        'witel_data' => $witel_data,
        'olo_data' => $olo_data,
        'site_kriteria_data' => $site_kriteria_data,
        'order_type_data' => $order_type_data,
        'produk_data' => $produk_data,
        'satuan_data' => $satuan_data,
        'status_ncx_data' => $status_ncx_data,
        'status_odp_data' => $status_odp_data,
        'status_integrasi_data' => $status_integrasi_data,]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DeploymentTabel $Deployment)
    {
        
        

        $Deployment->tanggal = $request->tanggal;
        $Deployment->ao = $request->ao;
        $Deployment->witel_id = $request->witel;
        $Deployment->olo_id = $request->olo;
        $Deployment->site_kriteria_id = $request->site_kriteria;
        $Deployment->sid = $request->sid;
        $Deployment->site_id = $request->site_id;
        $Deployment->order_type_id = $request->order_type;
        $Deployment->produk_id = $request->produk;
        $Deployment->satuan_id = $request->satuan;
        $Deployment->kapasitas_bw = $request->kapasitas_bw;
        $Deployment->longitude = $request->longitude;
        $Deployment->latitude = $request->latitude;
        $Deployment->alamat_asal = $request->alamat_asal;
        $Deployment->alamat_tujuan = $request->alamat_tujuan;
        $Deployment->status_ncx_id = $request->status_ncx;
        $Deployment->berita_acara = $request->berita_acara;
        $Deployment->tgl_complete_wfm = $request->tgl_complete_wfm;
        $Deployment->status_wfm = $request->status_wfm;
        $Deployment->alasan_cancel = $request->alasan_cancel;
        $Deployment->cancel_by = $request->cancel_by;
        $Deployment->start_cancel = $request->start_cancel;
        $Deployment->ready_after_cancel = $request->ready_after_cancel;
        $Deployment->status_integrasi_id = $request->status_integrasi;
        $Deployment->tanggal_integrasi = $request->tanggal_integrasi_b;
        $Deployment->metro_backhaul = $request->metro_backhaul;
        $Deployment->capture_metro_backhaul = $request->capture_metro_backhaul;
        $Deployment->ip_1 = $request->ip_1;
        $Deployment->port_1 = $request->port_1;
        $Deployment->metro_access = $request->metro_access;
        $Deployment->capture_metro_access = $request->capture_metro_access;
        $Deployment->ip_2 = $request->ip_2;
        $Deployment->port_2 = $request->port_2;
        $Deployment->vlan = $request->vlan;
        $Deployment->vcid = $request->vcid;
        $Deployment->gpon = $request->gpon;
        $Deployment->capture_gpon = $request->capture_gpon;
        $Deployment->ip_3 = $request->ip_3;
        $Deployment->port_3 = $request->port_3;
        $Deployment->sn = $request->sn;
        $Deployment->odp_id = $request->odp;
        $Deployment->odp = $request->isi_odp;
        $Deployment->port_4 = $request->port_4;
        $Deployment->type_1 = $request->type_1;
        $Deployment->kontak_pic_lokasi = $request->kontak_pic_lokasi;
        $Deployment->ip_4 = $request->ip_4;
        $Deployment->downlink = $request->downlink;
        $Deployment->type_2 = $request-> type_2;
        if($request->hasFile('gponcapture')){
            $imgName = $request->gponcapture->getClientOriginalName() . '-' . time() . '.' . $request->gponcapture->extension();
            $request->gponcapture->move(public_path('img'), $imgName);
            $Deployment->gponcapture = $imgName;
        }
        
        $Deployment->save();

        sleep(1);
        return redirect()->route('deployment.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(DeploymentTabel $Deployment)
    {
        $Deployment->delete();
        sleep(1);
        return redirect()->route('deployment.index');
    }
}
