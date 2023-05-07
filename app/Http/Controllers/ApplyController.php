<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LowonganModel;
use App\Models\BiodataModel;
use App\Models\DivisiModel;
use App\Models\Apply;

class ApplyController extends Controller
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
        // $apply = Apply::leftJoin('lowongan', 'lowongan.id_lowongan', '=', 'apply.id_lowongan')
        // ->leftJoin('biodata', 'biodata.id_biodata', '=', 'apply.id_biodata')
        // ->leftJoin('divisi', 'divisi.id_divisi', '=', 'apply.id_divisi')
        // ->get();

        // return view('pelamar.riwayat.v_lowongan', compact('apply'));
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
    public function destroy($id_apply)
    {
        Apply::where('id_apply', $id_apply)->delete();

        return redirect()->route('allbiodata')->with('pesan', 'Data Berhasil di Hapus');
    }
}
