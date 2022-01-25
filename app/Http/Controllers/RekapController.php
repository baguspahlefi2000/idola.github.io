<?php

namespace App\Http\Controllers;

use App\Models\Database;
use App\Exports\RekapExport;
use App\Imports\RekapImport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

use function Psy\bin;

class RekapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $data = DB::select("SELECT 
        olo_tabel.olo_nama as OLO,
        SUM(CASE WHEN deployment_tabel.order_type_id = '1'  THEN 1 ELSE 0 END) as AKTIVASI,
        SUM(CASE WHEN deployment_tabel.order_type_id = '2'  THEN 1 ELSE 0 END) as MODIFY,
        SUM(CASE WHEN deployment_tabel.order_type_id = '3'  THEN 1 ELSE 0 END) as DISCONNECT,
        SUM(CASE WHEN deployment_tabel.order_type_id = '4'  THEN 1 ELSE 0 END) as RESUME,
        SUM(CASE WHEN deployment_tabel.order_type_id = '5'  THEN 1 ELSE 0 END) as SUSPEND
        FROM deployment_tabel 
        JOIN olo_tabel ON olo_tabel.olo_id = deployment_tabel.olo_id
        GROUP BY olo_tabel.olo_nama
        ORDER BY AKTIVASI DESC");

        return view('rekap.deployment.index', ['title' => 'Halaman Rekap', 'rekap' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Gate::any(['admin', 'editor'])) {
            return view('rekap.deployment.create', ["title" => "Tambah Data - Rekap", 'database' => Database::all()]);
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
    public function store(Request $request, Rekap $rekap)
    {

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
    public function edit(Rekap $rekap)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rekap $rekap)
    {


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rekap $rekap)
    {

    }

    public function exportRekap()
    {
        return Excel::download(new RekapExport, 'rekap.xlsx');
    }
    public function importRekap(Request $request, Rekap $rekap)
    {
        $file = $request->file('file');
        $namaFile = $file->getClientOriginalName();
        $file->move('database_temp', $namaFile);

        Excel::import(new RekapImport, public_path('/database_temp/' . $namaFile));

        return redirect()->route('rekap.index');
    }
}
