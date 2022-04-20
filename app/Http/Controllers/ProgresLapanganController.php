<?php

namespace App\Http\Controllers;

use App\Exports\ProgressExport;
use App\Imports\ProgressImport;
use App\Models\Database;
use App\Models\ProgressLapanganTabel;
use App\Models\Rekap;
use App\Models\RekapProgress;
use App\Models\Wfm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Maatwebsite\Excel\Facades\Excel;
use phpDocumentor\Reflection\Types\Null_;

use App\Exports\ExportProgressLapangan;
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


class ProgresLapanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ao_data = DB::table("progress_lapangan_tabel")
        ->select("progress_lapangan_tabel.ao as no_ao")
        ->get();

        $witel_data = DB::table("witel_tabel")
        ->select("witel_id", "witel_nama")
        ->orderBy('witel_nama', 'ASC')
        ->get();

        $olo_data = DB::table("olo_tabel")
        ->select("olo_id","olo_nama")
        ->orderBy('olo_nama', 'ASC')
        ->get();

        $produk_data = DB::table("produk_tabel")
        ->select("produk_id", "produk_nama")
        ->orderBy('produk_nama', 'ASC')
        ->get();

        $status_progress_data = DB::table("status_p_lapangan_tabel")
        ->select("status_p_lapangan_id", "status_p_lapangan_nama")
        ->get();

        



        return view('progress_lapangan.index', ['title' => 'Halaman Progress lapangan', 
        'progress_lapangan' => ProgressLapanganTabel::orderBy('tanggal')->filter(request(['no_ao', 
        'tanggal', 'witel', 'olo', 'produk', 'progress'
        ]))->get(),
        'ao_data' => $ao_data, 
        'witel_data' => $witel_data,
        'olo_data' => $olo_data,
        'produk_data' => $produk_data,
        'status_progress_data' => $status_progress_data,

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ao_data = DB::table("progress_lapangan_tabel")
        ->select("progress_lapangan_tabel.ao as no_ao")
        ->get();

        $witel_data = DB::table("witel_tabel")
        ->select("witel_id", "witel_nama")
        ->orderBy('witel_nama', 'ASC')
        ->get();

        $olo_data = DB::table("olo_tabel")
        ->select("olo_id","olo_nama")
        ->orderBy('olo_nama', 'ASC')
        ->get();

        $produk_data = DB::table("produk_tabel")
        ->select("produk_id", "produk_nama")
        ->orderBy('produk_nama', 'ASC')
        ->get();


        $status_progress_data = DB::table("status_p_lapangan_tabel")
        ->select("status_p_lapangan_id", "status_p_lapangan_nama")
        ->get();

        return view('progress_lapangan.create', ['title' => 'Tambah Data - Progress Lapangan', 
        'ao_data' => $ao_data, 
        'witel_data' => $witel_data,
        'olo_data' => $olo_data,
        'produk_data' => $produk_data,
        'status_progress_data' => $status_progress_data,]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $progress = new ProgressLapanganTabel();
        $progress->tanggal = $request->tanggal;
        $progress->witel_id = $request->witel;
        $progress->ao = $request->ao;
        $progress->olo_id = $request->olo;
        $progress->produk_id = $request->produk;
        $progress->bandwith = $request->bandwith;
        $progress->alamat_toko = $request->alamat_toko;
        $progress->tanggal_order_pt1 = $request->tanggal_order_pt1;
        $progress->keterangan_pt1 = $request->keterangan_pt1;
        $progress->tanggal_order_pt2 = $request->tanggal_order_pt2;
        $progress->keterangan_pt2 = $request->keterangan_pt2;
        $progress->datek_odp = $request->datek_odp;
        $progress->datek_gpon = $request->datek_gpon;
        $progress->status_p_lapangan_id = $request->progress;
        $progress->keterangan = $request->keterangan;
        $progress->save();

        sleep(1);
        return redirect()->route('progress.index');
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
    public function edit(ProgressLapanganTabel $progress)
    {
        $ao_data = DB::table("progress_lapangan_tabel")
        ->select("progress_lapangan_tabel.ao as no_ao")
        ->get();

        $witel_data = DB::table("witel_tabel")
        ->select("witel_id", "witel_nama")
        ->orderBy('witel_nama', 'ASC')
        ->get();

        $olo_data = DB::table("olo_tabel")
        ->select("olo_id","olo_nama")
        ->orderBy('olo_nama', 'ASC')
        ->get();

        $produk_data = DB::table("produk_tabel")
        ->select("produk_id", "produk_nama")
        ->orderBy('produk_nama', 'ASC')
        ->get();

        $status_progress_data = DB::table("status_p_lapangan_tabel")
        ->select("status_p_lapangan_id", "status_p_lapangan_nama")
        ->get();

        return view('progress_lapangan.edit', ["title" => "Update Data - Progress Lapangan", 
        'progress' => $progress,
        'ao_data' => $ao_data, 
        'witel_data' => $witel_data,
        'olo_data' => $olo_data,
        'produk_data' => $produk_data,
        'status_progress_data' => $status_progress_data,]);
        
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProgressLapanganTabel $progress)
    {
        $progress->tanggal = $request->tanggal;
        $progress->witel_id = $request->witel;
        $progress->ao = $request->ao;
        $progress->olo_id = $request->olo;
        $progress->produk_id = $request->produk;
        $progress->bandwith = $request->bandwith;
        $progress->alamat_toko = $request->alamat_toko;
        $progress->tanggal_order_pt1 = $request->tanggal_order_pt1;
        $progress->keterangan_pt1 = $request->keterangan_pt1;
        $progress->tanggal_order_pt2 = $request->tanggal_order_pt2;
        $progress->keterangan_pt2 = $request->keterangan_pt2;
        $progress->datek_odp = $request->datek_odp;
        $progress->datek_gpon = $request->datek_gpon;
        $progress->status_p_lapangan_id = $request->progress;
        $progress->keterangan = $request->keterangan;
        $progress->save();
        sleep(1);
        return redirect()->route('progress.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProgressLapanganTabel $progress)
    {
        $progress->delete();
        sleep(1);
        return redirect()->route('progress.index');
    }

    public function exportProgressLapangan(Request $request){
        return Excel::download(new ExportProgressLapangan, 'progress-lapangan.xlsx');
    }

    public function importProgressLapangan(Request $request, ProgresLapangan $progress)
    {
        $file = $request->file('file');
        $namaFile = $file->getClientOriginalName();
        $file->move('database_temp', $namaFile);

        Excel::import(new ProgressImport, public_path('/database_temp/' . $namaFile));

        return redirect()->route('progress.index')->with('success', 'Data Berhasil diImpor!');
    }
}
