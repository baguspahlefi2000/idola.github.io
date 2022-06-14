<?php

namespace App\Http\Controllers;

use App\Models\JenisNteTabel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Exports\ExportJenisNte;
use Maatwebsite\Excel\Facades\Excel;

class JenisNteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('db.jenis_nte.index', ['title' => 'Halaman Index', 
        'jenis_nte' => JenisNteTabel::orderBy('jenis_nte_nama')->skip(1)->take(PHP_INT_MAX)->get() 
    ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('db.jenis_nte.create', ['title' => 'Tambah Data - Jenis NTE' ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $jenis_nte = new JenisNteTabel();
        $jenis_nte->jenis_nte_nama = $request->jenis_nte_nama;
        $jenis_nte->save();

        sleep(1);
        return redirect()->route('db_jenis_nte.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OloTabel  $oloTabel
     * @return \Illuminate\Http\Response
     */
    public function show(JenisNteTabel $jenis_nte)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OloTabel  $oloTabel
     * @return \Illuminate\Http\Response
     */
    public function edit(JenisNteTabel $jenis_nte)
    {
        return view('db.jenis_nte.edit', ['title' => 'Halaman Database Edit', 
        'jenis_nte' =>$jenis_nte]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OloTabel  $oloTabel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JenisNteTabel $jenis_nte)
    {
        $jenis_nte->jenis_nte_nama = $request->jenis_nte_nama;
        $jenis_nte->save();

        sleep(1);
        return redirect()->route('db_jenis_nte.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OloTabel  $oloTabel
     * @return \Illuminate\Http\Response
     */
    public function destroy(JenisNteTabel $jenis_nte)
    {
        $jenis_nte->delete();
        sleep(1);
        return redirect()->route('jenis_nte.index');
    }

    public function exportJenisNte(Request $request){
        return Excel::download(new ExportJenisNte, 'data-jenis-nte.xlsx');
    }
}
