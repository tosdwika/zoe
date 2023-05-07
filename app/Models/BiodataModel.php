<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class BiodataModel extends Model
{
    protected $table = 'biodata';

    protected $guarded = [];

    protected $casts = [
        'property_type' => 'array',
    ];

    public function alldata()
    {
        return DB::table('biodata')->get();
    }
    public function getusers()
    {
        return Auth::id();
    }

    public function showadminpendidikan($id)
    {
        return DB::table('pendidikan')
        ->where('pendidikan.id', '=', $id)
        ->get();
    }

    public function showadminpelatihan($id)
    {
        return DB::table('pelatihan')
        ->where('pelatihan.id', '=', $id)
        ->get();
    }

    public function showadminpengalaman($id)
    {
        return DB::table('pengalaman')
        ->where('pengalaman.id', '=', $id)
        ->get();
    }

    public function showpendidikan()
    {
        $id = Auth::id();
        return DB::table('pendidikan')
        ->where('pendidikan.id', '=', $id)
        ->get();
    }

    public function soreng($id)
    {
        return DB::table('pendidikan')
        ->where('pendidikan.id', '=', $id)
        ->get();
    }

    public function showpelatihan()
    {
        $id = Auth::id();
        return DB::table('pelatihan')
        ->where('pelatihan.id', '=', $id)
        ->get();
    }

    public function showpengalaman()
    {
        $id = Auth::id();
        return DB::table('pengalaman')
        ->where('pengalaman.id', '=', $id)
        ->get();
    }

    public function showbiodata()
    {
        $id = Auth::id();
        return DB::table('biodata')
        ->where('biodata.id', '=', $id)
        ->first();
    }

    public function cekbiodata($id_biodata)
    {
        return DB::table('biodata')
        ->where('biodata.id_biodata', '=', $id_biodata)
        ->first();
    }

    public function cekpendidikan($id_pendidikan)
    {
        return DB::table('pendidikan')
        ->where('pendidikan.id_pendidikan', '=', $id_pendidikan)
        ->first();
    }

    public function cekpelatihan($id_pelatihan)
    {
        return DB::table('pelatihan')
        ->where('pelatihan.id_pelatihan', '=', $id_pelatihan)
        ->first();
    }

    public function cekpengalaman($id_pengalaman)
    {
        return DB::table('pengalaman')
        ->where('pengalaman.id_pengalaman', '=', $id_pengalaman)
        ->first();
    }

    public function insertbiodata($biodata)
    {
        DB::table('biodata')->insert($biodata);
    }

    public function insertpendidikan($pendidikan)
    {
        DB::table('pendidikan')->insert($pendidikan);
    }

    public function insertpelatihan($pelatihan)
    {
        DB::table('pelatihan')->insert($pelatihan);
    }

    public function insertpengalaman($pengalaman)
    {
        DB::table('pengalaman')->insert($pengalaman);
    }

    public function updatebiodata($id_biodata, $biodata)
    {
        DB::table('biodata')->where('id_biodata', $id_biodata)->update($biodata);
    }

    public function updatebiodataadmin($id_biodata, $biodata)
    {
        DB::table('biodata')->where('id_biodata', $id_biodata)->update($biodata);
    }

    public function updatependidikan($id_pendidikan, $pendidikan)
    {
        DB::table('pendidikan')->where('id_pendidikan', $id_pendidikan)->update($pendidikan);
    }

    public function updatepelatihan($id_pelatihan, $pelatihan)
    {
        DB::table('pelatihan')->where('id_pelatihan', $id_pelatihan)->update($pelatihan);
    }

    public function updatepengalaman($id_pengalaman, $pengalaman)
    {
        DB::table('pengalaman')->where('id_pengalaman', $id_pengalaman)->update($pengalaman);
    }

    //Delete Method
    public function deletebiodata($id_biodata)
    {
        DB::table('biodata')->where('id_biodata', $id_biodata)->delete();
    }

    public function deletependidikan($id_pendidikan)
    {
        DB::table('pendidikan')->where('id_pendidikan', $id_pendidikan)->delete();
    }

    public function deletepelatihan($id_pelatihan)
    {
        DB::table('pelatihan')->where('id_pelatihan', $id_pelatihan)->delete();
    }

    public function deletepengalaman($id_pengalaman)
    {
        DB::table('pengalaman')->where('id_pengalaman', $id_pengalaman)->delete();
    }
}
