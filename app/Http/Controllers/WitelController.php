<?php

namespace App\Http\Controllers;

use App\Models\WitelTabel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Exports\ExportWitel;
use Maatwebsite\Excel\Facades\Excel;


class WitelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('db.witel.index', ['title' => 'Halaman Index', 
        'witel' => WitelTabel::orderBy('witel_nama')->skip(1)->take(PHP_INT_MAX)->get()
    ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('db.witel.create', ['title' => 'Tambah Data - Witel' ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $witel = new WitelTabel();
        $witel->witel_nama = $request->witel_nama;
        $witel->save();

        sleep(1);
        return redirect()->route('db_witel.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WitelTabel  $WitelTabel
     * @return \Illuminate\Http\Response
     */
    public function show(WitelTabel $witel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WitelTabel  $WitelTabel
     * @return \Illuminate\Http\Response
     */
    public function edit(WitelTabel $witel)
    {
        return view('db.witel.edit', ['title' => 'Halaman Database Edit', 
        'witel' =>$witel]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\WitelTabel  $WitelTabel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WitelTabel $witel)
    {
        $witel->witel_nama = $request->witel_nama;
        $witel->save();

        sleep(1);
        return redirect()->route('db_witel.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WitelTabel  $WitelTabel
     * @return \Illuminate\Http\Response
     */
    public function destroy(WitelTabel $witel)
    {
        $witel->delete();
        sleep(1);
        return redirect()->route('db_witel.index');
    }

    public function exportWitel(Request $request){
        return Excel::download(new exportWitel, 'data-witel.xlsx');
    }
}
