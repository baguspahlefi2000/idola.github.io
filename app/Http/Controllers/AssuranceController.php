<?php

namespace App\Http\Controllers;

use App\Models\AssuranceTabel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AssuranceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('assurance.index', ['title' => 'Halaman Assurance', 
        'assurance' => AssuranceTabel::firstCal()->orderBy('resolved_date')->get()
    ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    public function edit(AssuranceTabel $assuranceTabel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AssuranceTabel  $assuranceTabel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AssuranceTabel $assuranceTabel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AssuranceTabel  $assuranceTabel
     * @return \Illuminate\Http\Response
     */
    public function destroy(AssuranceTabel $assuranceTabel)
    {
        //
    }
}