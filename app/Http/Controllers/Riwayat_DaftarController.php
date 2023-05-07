<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BiodataModel;
use App\Models\DivisiModel;
use App\Models\Riwayat_Daftar;

class Riwayat_DaftarController extends Controller
{
    public function __construct()
    {
        $this->BiodataModel = new BiodataModel();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = $this->BiodataModel->getusers();
        $biodata = BiodataModel::where('id', $user)->first();
        if (!$biodata) {
            return redirect()->route('cekdaftar');
        }else{
        $riwayat = Riwayat_Daftar::leftJoin('lowongan', 'lowongan.id_lowongan', '=', 'riwayat_daftar.id_lowongan')
        ->leftJoin('biodata', 'biodata.id_biodata', '=', 'riwayat_daftar.id_biodata')
        ->leftJoin('divisi', 'divisi.id_divisi', '=', 'riwayat_daftar.id_divisi')
        ->where('id', $user)
        ->get();

        return view('pelamar.riwayat.v_lowongan', compact('riwayat'));
        }
    }

    public function getdivisi()
    {
        $divisi = DivisiModel::get();
        
        return response()->json(compact('divisi'));
    }

    public function getdivisifirst($id_divisi)
    {
        $divisi = DivisiModel::where('id_divisi', $id_divisi)->first();
        
        return response()->json(compact('divisi'));
    }

    public function getbiodatafirst()
    {
        $user = $this->BiodataModel->getusers();
        $biodata = BiodataModel::where('id', $user)->first();

        return response()->json(compact('biodata'));
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
