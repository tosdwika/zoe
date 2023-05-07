<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LowonganModel;
use App\Models\DivisiModel;
use Illuminate\Support\Facades\Validator;

class LowonganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lowongan = LowonganModel::leftJoin('divisi', 'divisi.id_divisi', '=', 'lowongan.id_divisi')->get();
        $divisi = DivisiModel::get();

        return view('admin.lowongan.v_lowongan', compact('lowongan', 'divisi'));
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'posisi'   => 'required',
            'deskripsi'   => 'required',
            'id_divisi'   => 'required',
        ],[
            'posisi.required' => 'Mohon di isi',
            'deskripsi.required' => 'Mohon di isi',
            'id_divisi.required' => 'Mohon di pilih',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //create lowongan
        $data = LowonganModel::create([
            'posisi'   => $request->posisi,
            'deskripsi'   => $request->deskripsi,
            'id_divisi'   => $request->id_divisi,
        ]);

        //return response
        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Disimpan!',
            'data'    => $data  
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
    public function update(Request $request, $lowongan_id)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'posisi'   => 'required',
            'deskripsi' => 'required',
            'id_divisi' => 'required'
        ],[
            'posisi.required' => 'Mohon di isi',
            'deskripsi.required' => 'Mohon di isi',
            'id_divisi.required' => 'Mohon di pilih'
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        
        //update divisi
        $up = LowonganModel::where('id_lowongan', $lowongan_id)->update([
            'posisi' => $request->posisi,
            'deskripsi' => $request->deskripsi,
            'id_divisi' => $request->id_divisi
        ]);

        $data = LowonganModel::where('id_lowongan', $lowongan_id)->first();
        
        //return response
        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Diupdate!',
            'data'    => $data  
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($lowongan_id)
    {
        //delete post by ID
        LowonganModel::where('id_lowongan', $lowongan_id)->delete();

        //return response
        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Dihapus!.',
        ]); 
    }
}
