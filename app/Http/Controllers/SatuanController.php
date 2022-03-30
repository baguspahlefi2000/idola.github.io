<?php

namespace App\Http\Controllers;

use App\Models\SatuanTabel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Exports\ExportSatuan;
use Maatwebsite\Excel\Facades\Excel;

class SatuanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('db.satuan.index', ['title' => 'Halaman Index', 
        'satuan' => SatuanTabel::orderBy('satuan_nama')->skip(1)->take(PHP_INT_MAX)->get()   
    ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('db.satuan.create', ['title' => 'Tambah Data - satuan' ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $satuan = new satuanTabel();
        $satuan->satuan_nama = $request->satuan_nama;
        $satuan->save();

        sleep(1);
        return redirect()->route('db_satuan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SatuanTabel  $satuanTabel
     * @return \Illuminate\Http\Response
     */
    public function show(SatuanTabel $satuan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\satuan  $satuan
     * @return \Illuminate\Http\Response
     */
    public function edit(SatuanTabel $satuan)
    {
        return view('db.satuan.edit', ['title' => 'Halaman Database Edit', 
        'satuan' =>$satuan]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SatuanTabel  $satuanTabel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SatuanTabel $satuan)
    {
        $satuan->satuan_nama = $request->satuan_nama;
        $satuan->save();

        sleep(1);
        return redirect()->route('db_satuan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SatuanTabel  $satuanTabel
     * @return \Illuminate\Http\Response
     */
    public function destroy(SatuanTabel $satuan)
    {
        $satuan->delete();
        sleep(1);
        return redirect()->route('db_satuan.index');
    }

    public function exportSatuan(Request $request){
        return Excel::download(new ExportSatuan, 'data-satuan.xlsx');
    }
}
