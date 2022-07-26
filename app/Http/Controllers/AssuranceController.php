<?php

namespace App\Http\Controllers;

use App\Models\AssuranceTabel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ExportAssurance;
use App\Imports\ImportAssurance;
use Illuminate\Support\Facades\DB;
use Session;
use File;

class AssuranceController extends Controller
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
        ->orderBy('witel_nama', 'ASC')
        ->get();

        $olo_data = DB::table("olo_tabel")
        ->select("olo_id","olo_nama")
        ->orderBy('olo_nama', 'ASC')
        ->get();

        $incident_domain_data = DB::table("incident_domain_tabel")
        ->select("incident_domain_id", "incident_domain_nama")
        ->orderBy('incident_domain_id', 'ASC')
        ->get();

        return view('assurance.index', ['title' => 'Halaman Assurance', 
        'assurance' => AssuranceTabel::firstCal()->orderBy('resolved_date')->filter(request([
        'reported_date', 'witel', 'olo', 'incident_domain'
        ]))->get(),
        'witel_data' => $witel_data,
        'olo_data' => $olo_data,
        'incident_domain_data' => $incident_domain_data
    ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(AssuranceTabel $assurance)
    {
        $witel_data = DB::table("witel_tabel")
        ->select("witel_id", "witel_nama")
        ->orderBy('witel_nama', 'ASC')
        ->get();

        $olo_data = DB::table("olo_tabel")
        ->select("olo_id","olo_nama")
        ->orderBy('olo_nama', 'ASC')
        ->get();

        $incident_domain_data = DB::table("incident_domain_tabel")
        ->select("incident_domain_id", "incident_domain_nama")
        ->orderBy('incident_domain_id', 'ASC')
        ->get();


        return view('assurance.create', ["title" => "Create Data - Data Assurance", 
        'witel_data' => $witel_data,
        'olo_data' => $olo_data,
        'incident_domain_data' => $incident_domain_data,]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        AssuranceTabel::create($data);
        return redirect()->route('assurance.index')->with('success','Data Assurance Berhasil Diinput!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AssuranceTabel  $assuranceTabel
     * @return \Illuminate\Http\Response
     */
    public function show(AssuranceTabel $assuranceTabel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AssuranceTabel  $assuranceTabel
     * @return \Illuminate\Http\Response
     */
    public function edit(AssuranceTabel $assurance)
    {
        $witel_data = DB::table("witel_tabel")
        ->select("witel_id", "witel_nama")
        ->orderBy('witel_nama', 'ASC')
        ->get();

        $olo_data = DB::table("olo_tabel")
        ->select("olo_id","olo_nama")
        ->orderBy('olo_nama', 'ASC')
        ->get();

        $incident_domain_data = DB::table("incident_domain_tabel")
        ->select("incident_domain_id", "incident_domain_nama")
        ->orderBy('incident_domain_id', 'ASC')
        ->get();


        return view('assurance.edit', ["title" => "Edit Data - Data Assurance", 
        'assurance' => $assurance,
        'witel_data' => $witel_data,
        'olo_data' => $olo_data,
        'incident_domain_data' => $incident_domain_data,]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AssuranceTabel  $assuranceTabel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AssuranceTabel $assurance)
    {
        $data = $request->all();
        $assurance->update($data);
        sleep(1);
        return redirect()->route('assurance.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AssuranceTabel  $assuranceTabel
     * @return \Illuminate\Http\Response
     */
    public function destroy(AssuranceTabel $assurance)
    {
        $assurance->delete();
        sleep(1);
        return redirect()->route('assurance.index');
    }

    public function exportAssurance(Request $request){
        return Excel::download(new ExportAssurance, 'assurance.xlsx');
    }

    public function importAssurance(Request $request)
    {
        //validate the csv file
        $this->validate($request, array('file' => 'required'));

        if($request->hasFile('file')){
            $extension = File::extension($request->file->getClientOriginalName());
            if ($extension == "csv") {
    
                Excel::import(new ImportAssurance, request()->file('file'));

                return redirect()->route('assurance.index')->with('success','Data Assurance Imported Successfully!');
            } else {
                return redirect()->route('assurance.index')->with('failed','Failed to Import, Format File Must Be a CSV UTF-8!');
            }
        }
    }
}
