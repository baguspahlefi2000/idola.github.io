<?php

namespace App\Http\Controllers;

use App\Exports\RekapProgres;
use App\Models\ProgressLapanganTabel;
use App\Models\RekapProgress;
use App\Models\WitelTabel;
use App\Models\OloTabel;
use App\Models\ProdukTabel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class RekapProgressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $witel_data = DB::table("witel_tabel")
        ->select("witel_id", "witel_nama")
        ->get();

        $olo_data = DB::table("olo_tabel")
        ->select("olo_id","olo_nama")
        ->get();


        $produk_data = DB::table("produk_tabel")
        ->select("produk_id", "produk_nama")
        ->get();


        return view('rekap.progress.index', ['title' => 'Halaman Rekap Progress', 'rekap_pro' => ProgressLapanganTabel::rekapProgress()->filter(request(['tanggal', 'witel', 'olo', 'produk']))->get(),
        'witel_data' => $witel_data,
        'olo_data' => $olo_data,
        'produk_data' => $produk_data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
     * @param  \App\Models\RekapProgress  $rekapProgress
     * @return \Illuminate\Http\Response
     */
    public function show(RekapProgress $rekapProgress)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RekapProgress  $rekapProgress
     * @return \Illuminate\Http\Response
     */
    public function edit(RekapProgress $rekapProgress)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RekapProgress  $rekapProgress
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RekapProgress $rekapProgress)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RekapProgress  $rekapProgress
     * @return \Illuminate\Http\Response
     */
    public function destroy(RekapProgress $rekapProgress, ProgresLapangan $progresLapangan)
    {
        //
    }

    public function exportRekapProgres()
    {
        return Excel::download(new RekapProgres, 'rekap_progres_lapangan.xlsx');
    }
}
