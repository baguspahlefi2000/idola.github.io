<?php

namespace App\Http\Controllers;

use App\Models\ProdukTabel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('db.produk.index', ['title' => 'Halaman Index', 
        'produk' => ProdukTabel::orderBy('produk_id')->get()   
    ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('db.produk.create', ['title' => 'Tambah Data - produk' ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $produk = new produkTabel();
        $produk->produk_nama = $request->produk_nama;
        $produk->save();

        sleep(1);
        return redirect()->route('db_produk.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProdukTabel  $produkTabel
     * @return \Illuminate\Http\Response
     */
    public function show(ProdukTabel $produk)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProdukTabel  $produkTabel
     * @return \Illuminate\Http\Response
     */
    public function edit(ProdukTabel $produk)
    {
        return view('db.produk.edit', ['title' => 'Halaman Database Edit', 
        'produk' =>$produk]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProdukTabel  $produkTabel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProdukTabel $produk)
    {
        $produk->produk_nama = $request->produk_nama;
        $produk->save();

        sleep(1);
        return redirect()->route('db_produk.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProdukTabel  $produkTabel
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProdukTabel $produk)
    {
        $produk->delete();
        sleep(1);
        return redirect()->route('db_produk.index');
    }
}
