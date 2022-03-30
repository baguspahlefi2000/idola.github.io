<?php

namespace App\Http\Controllers;

use App\Models\IncidentDomainTabel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Exports\ExportIncidentDomain;
use Maatwebsite\Excel\Facades\Excel;


class IncidentDomainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('db.incident_domain.index', ['title' => 'Halaman Index', 
        'incident_domain' => IncidentDomainTabel::orderBy('incident_domain_nama')->skip(1)->take(PHP_INT_MAX)->get()
    ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('db.incident_domain.create', ['title' => 'Tambah Data - Incident Domain' ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $incident_domain = new IncidentDomainTabel();
        $incident_domain->incident_domain_nama = $request->incident_domain_nama;
        $incident_domain->save();

        sleep(1);
        return redirect()->route('db_incident_domain.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\IncidentDomainTabel  $incidentDomainTabel
     * @return \Illuminate\Http\Response
     */
    public function show(IncidentDomainTabel $incident_domain)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\IncidentDomainTabel  $incidentDomainTabel
     * @return \Illuminate\Http\Response
     */
    public function edit(IncidentDomainTabel $incident_domain)
    {
        return view('db.incident_domain.edit', ['title' => 'Halaman Database Edit', 
        'incident_domain' =>$incident_domain]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\IncidentDomainTabel  $incidentDomainTabel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, IncidentDomainTabel $incident_domain)
    {
        $incident_domain->incident_domain_nama = $request->incident_domain_nama;
        $incident_domain->save();

        sleep(1);
        return redirect()->route('db_olo.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\IncidentDomainTabel  $incidentDomainTabel
     * @return \Illuminate\Http\Response
     */
    public function destroy(IncidentDomainTabel $incident_domain)
    {
        $incident_domain->delete();
        sleep(1);
        return redirect()->route('db_incident_domain.index');
    }

    public function exportIncidentDomain(Request $request){
        return Excel::download(new ExportIncidentDomain, 'data-incident-domain.xlsx');
    }
}
