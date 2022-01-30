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


class ProgresLapanganController extends Controller
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

        return view('progress_lapangan.index', ['title' => 'Halaman Progress lapangan', 
        'progress_lapangan' => ProgressLapanganTabel::orderBy('progress_lapangan_id')->filter(request(['no_ao', 
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
        if (Gate::any(['admin', 'editor'])) {
            return view('progress_lapangan.create', ['title' => 'Tambah Data - Progress Lapangan', 'database' => Database::all(), 'wfm' => Wfm::all()]);
        } else {
            abort(403);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, ProgresLapangan $progress, RekapProgress $rekapPro, Rekap $rekap)
    {
        $progress->tanggal = $request->tanggal;
        $progress->witel = $request->witel;
        $progress->ao = $request->ao;
        $progress->olo = $request->olo;
        $progress->produk = $request->produk;
        $progress->alamat_toko = $request->alamat_toko;
        $progress->tanggal_order_pt1 = $request->tanggal_order_pt1;
        $progress->keterangan_pt1 = $request->keterangan_pt1;
        $progress->tanggal_order_pt2 = $request->tanggal_order_pt2;
        $progress->keterangan_pt2 = $request->keterangan_pt2;
        $progress->datek_odp = $request->datek_odp;
        $progress->datek_gpon = $request->datek_gpon;
        $progress->progress = $request->progress;
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
    public function edit(ProgresLapangan $progress)
    {
        if (Gate::any(['admin', 'editor'])) {
            return view('progress_lapangan.edit', ['title' => 'Update Data - Progress Lapangan', 'progress' => $progress, 'database' => Database::all(), 'wfm' => Wfm::all()]);
        } else {
            abort(403);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProgresLapangan $progress)
    {
        $progress->tanggal = $request->tanggal;
        $progress->witel = $request->witel;
        $progress->ao = $request->ao;
        $progress->olo = $request->olo;
        $progress->produk = $request->produk;
        $progress->alamat_toko = $request->alamat_toko;
        $progress->tanggal_order_pt1 = $request->tanggal_order_pt1;
        $progress->keterangan_pt1 = $request->keterangan_pt1;
        $progress->tanggal_order_pt2 = $request->tanggal_order_pt2;
        $progress->keterangan_pt2 = $request->keterangan_pt2;
        $progress->datek_odp = $request->datek_odp;
        $progress->datek_gpon = $request->datek_gpon;
        $progress->progress = $request->progress;
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
    public function destroy(ProgresLapangan $progress)
    {
        $progress->delete();
        sleep(1);
        return back();
    }

    public function exportProgressLapangan()
    {
        return Excel::download(new ProgressExport, 'progress_lapangan.xlsx');
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
