<?php

namespace App\Http\Controllers;

use App\Models\Database;
use App\Exports\RekapExport;
use App\Imports\RekapImport;
use App\Http\Controllers\Controller;
use App\Models\Rekap;
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
        $data = DB::select("SELECT wfms.olo_isp, COUNT(IF(wfms.order_type = 'NEW INSTALL',1,NULL))  'AKTIVASI', COUNT(IF(wfms.order_type = 'MODIFY',1,NULL)) 'MODIF', COUNT(IF(wfms.order_type = 'DISCONNECT',1,NULL)) 'DISCONNECT', COUNT(IF(wfms.order_type = 'RESUME',1,NULL)) 'RESUME', COUNT(IF(wfms.order_type = 'SUSPEND',1,NULL)) 'SUSPEND' FROM wfms GROUP BY olo_isp ORDER BY `AKTIVASI` DESC");

        return view('rekap.deployment.index', ['title' => 'Halaman Rekap', 'rekap' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   

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
