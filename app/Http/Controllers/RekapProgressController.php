<?php

namespace App\Http\Controllers;

use App\Exports\RekapProgres;
use App\Models\ProgresLapangan;
use App\Models\RekapProgress;
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
        $rekap_progress = DB::select("SELECT 
        olo_tabel.olo_nama as OLO,
        SUM(CASE WHEN progress_lapangan_tabel.status_p_lapangan_id = '1' THEN 1 ELSE 0 END) as PLAN_AKTIVASI,
        SUM(CASE WHEN progress_lapangan_tabel.status_p_lapangan_id = '2' THEN 0 ELSE 0 END) as PLAN_MODIFY,
        SUM(CASE WHEN progress_lapangan_tabel.status_p_lapangan_id = '3' THEN 0 ELSE 0 END) as PLAN_DISCONNECT
        FROM progress_lapangan_tabel 
        JOIN witel_tabel ON witel_tabel.witel_id = progress_lapangan_tabel.witel_id 
        JOIN olo_tabel ON olo_tabel.olo_id = progress_lapangan_tabel.olo_id 
        JOIN produk_tabel ON produk_tabel.produk_id = progress_lapangan_tabel.produk_id
        JOIN status_p_lapangan_tabel ON status_p_lapangan_tabel.status_p_lapangan_id = progress_lapangan_tabel.status_p_lapangan_id
        GROUP BY olo_tabel.olo_nama
        ORDER BY PLAN_AKTIVASI DESC");


        return view('rekap.progress.index', ['title' => 'Halaman Rekap Progress', 'rekap_pro' => $rekap_progress]);
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
