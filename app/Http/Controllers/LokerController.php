<?php

namespace App\Http\Controllers;
use App\Models\LowonganModel;
use App\Models\DivisiModel;
use App\Models\BiodataModel;
use App\Models\Apply;
use App\Models\Riwayat_Daftar;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class LokerController extends Controller
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
        $idBio = $biodata->id_biodata;
        $user_Apply = Apply::where('id_biodata','=', $idBio)->get();
        $id_array = [];
        foreach($user_Apply as $poke){
            array_push($id_array, $poke->id_lowongan);
        }

        //print_r($id_array);
        //print($user);
        $lowongan = LowonganModel::leftJoin('divisi', 'divisi.id_divisi', '=', 'lowongan.id_divisi')
        ->whereNotIn('id_lowongan',$id_array)
        ->get();
        $divisi = DivisiModel::get();


        return view('pelamar.lowongan.v_lowongan', compact('lowongan', 'divisi'));
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
        $data = [
            'id_lowongan' => $request->id_lowongan,
            'id_biodata' => $request->id_biodata,
            'id_divisi' => $request->id_divisi,
        ];

        Apply::insert($data);
        Riwayat_Daftar::insert($data);

        return response()->json([
            'message' => 'Berhasil mendaftar Lowongan',
            'data' => $data
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_lowongan)
    {
        $data = LowonganModel::where('id_lowongan', $id_lowongan)
        ->leftJoin('divisi', 'divisi.id_divisi', '=', 'lowongan.id_divisi')->first();
        
        return response()->json([
            'data' => $data
        ]);
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
