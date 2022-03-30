<?php

namespace App\Http\Controllers;

use App\Models\OloTabel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Exports\ExportOlo;
use Maatwebsite\Excel\Facades\Excel;

class OloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('db.olo.index', ['title' => 'Halaman Index', 
        'olo' => OloTabel::orderBy('olo_nama')->skip(1)->take(PHP_INT_MAX)->get() 
    ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('db.olo.create', ['title' => 'Tambah Data - OLO' ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $olo = new OloTabel();
        $olo->olo_nama = $request->olo_nama;
        $olo->save();

        sleep(1);
        return redirect()->route('db_olo.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OloTabel  $oloTabel
     * @return \Illuminate\Http\Response
     */
    public function show(OloTabel $olo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OloTabel  $oloTabel
     * @return \Illuminate\Http\Response
     */
    public function edit(OloTabel $olo)
    {
        return view('db.olo.edit', ['title' => 'Halaman Database Edit', 
        'olo' =>$olo]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OloTabel  $oloTabel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OloTabel $olo)
    {
        $olo->olo_nama = $request->olo_nama;
        $olo->save();

        sleep(1);
        return redirect()->route('db_olo.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OloTabel  $oloTabel
     * @return \Illuminate\Http\Response
     */
    public function destroy(OloTabel $olo)
    {
        $olo->delete();
        sleep(1);
        return redirect()->route('db_olo.index');
    }

    public function exportOlo(Request $request){
        return Excel::download(new ExportOlo, 'data-olo.xlsx');
    }
}
