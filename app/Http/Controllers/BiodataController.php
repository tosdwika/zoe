<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BiodataModel;
use App\Models\PendidikanModel;
use App\Models\PelatihanModel;
use App\Models\PengalamanModel;
use App\Models\Apply;
use Illuminate\Support\Facades\DB;
use PDF;

class BiodataController extends Controller
{
    public function __construct()
    {
        $this->BiodataModel = new BiodataModel();
        $this->PendidikanModel = new PendidikanModel();
        $this->PelatihanModel = new PelatihanModel();
        $this->PengalamanModel = new PengalamanModel();
        $this->middleware('auth');
    }

    public function allbiodata()
    {
        $apply = Apply::leftJoin('lowongan', 'lowongan.id_lowongan', '=', 'apply.id_lowongan')
        ->leftJoin('biodata', 'biodata.id_biodata', '=', 'apply.id_biodata')
        ->leftJoin('divisi', 'divisi.id_divisi', '=', 'apply.id_divisi')
        ->get();

        return view('biodata.v_adminbiodata', compact('apply'));
    }
    
    public function tampilbiodata()
    {
        return view('biodata.v_biodata');
    }

    public function tampilbiodataupdate()
    {        
        $data = [
            'biodata' => $this->BiodataModel->showbiodata()
        ];
        return view('biodata.v_biodataupdate', $data);
    }

    public function tampilpendidikan()
    {
        $data = [
            'biodata' => $this->BiodataModel->showpendidikan()
        ];
        return view('biodata.v_pendidikan', $data);
    }

    public function tampilpelatihan()
    {
        $data = [
            'biodata' => $this->BiodataModel->showpelatihan()
        ];
        return view('biodata.v_pelatihan', $data);
    }

    public function tampilpengalaman()
    {
        $data = [
            'biodata' => $this->BiodataModel->showpengalaman()
        ];
        return view('biodata.v_pengalaman', $data);
    }

    public function pdf($id_biodata)
    {
        $biodata = $this->BiodataModel->cekbiodata($id_biodata);
        $id = $biodata->id;
        $pendidikan = $this->BiodataModel->showadminpendidikan($id);
        $pelatihan = $this->BiodataModel->showadminpelatihan($id);
        $pengalaman = $this->BiodataModel->showadminpengalaman($id);

        return view('biodata.v_pdf', compact('id_biodata', 'biodata', 'pendidikan' , 'pelatihan','pengalaman'));
    }

    public function cetak_pdfadmin($id_biodata)
    {
    	$biodata = $this->BiodataModel->cekbiodata($id_biodata);
        $id = $biodata->id;
        $pendidikan = $this->BiodataModel->showadminpendidikan($id);
        $pelatihan = $this->BiodataModel->showadminpelatihan($id);
        $pengalaman = $this->BiodataModel->showadminpengalaman($id);
        
    	$pdf = PDF::loadView('biodata.pdfadmin', compact('biodata', 'pendidikan', 'pelatihan', 'pengalaman'));
    	return $pdf->download('Data Pribadi Pelamar');
        // return view('biodata.pdf', compact('biodata', 'pendidikan', 'pelatihan', 'pengalaman'));

    }

    public function cetak_pdf()
    {
    	$biodata = $this->BiodataModel->showbiodata();
        $pendidikan = $this->BiodataModel->showpendidikan();
        $pelatihan = $this->BiodataModel->showpelatihan();
        $pengalaman = $this->BiodataModel->showpengalaman();
        
    	$pdf = PDF::loadView('biodata.pdf', compact('biodata', 'pendidikan', 'pelatihan', 'pengalaman'));
    	return $pdf->download('Data Pribadi Pelamar');
        // return view('biodata.pdf', compact('biodata', 'pendidikan', 'pelatihan', 'pengalaman'));

    }

    public function cekdaftar()
    {
        $cek = $this->BiodataModel->showbiodata();
        if (!$cek) {
            return redirect()->route('biodata');
        }else{  
            return redirect()->route('biodataupdate');
        }
    }

    public function tambah()
    {
        $data = [
            'userid' => $this->BiodataModel->getusers()
        ];
        return view('biodata.v_tambahbiodata', $data);
    }

    public function pendidikan()
    {
        $data = [
            'userid' => $this->BiodataModel->getusers()
        ];
        return view('biodata.v_tambahpendidikan', $data);
    }

    public function pelatihan()
    {
        $data = [
            'userid' => $this->BiodataModel->getusers()
        ];
        return view('biodata.v_tambahpelatihan', $data);
    }

    public function pengalaman()
    {
        $data = [
            'userid' => $this->BiodataModel->getusers()
        ];
        return view('biodata.v_tambahpengalaman', $data);
    }

    //Insert Method
    public function insertbiodata()
    {
        Request()->validate([
            // biodata
            'nama' => 'required',
            'no_ktp' => 'required|numeric',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'golongan_darah' => 'required',
            'status_kawin' => 'required',
            'alamat_ktp' => 'required',
            'alamat_tinggal' => 'required',
            'email' => 'required',
            'no_telp' => 'required|numeric',
            'orang_terdekat' => 'required',
            'skill' => 'required',
            'roaming' => 'required',
            'gaji' => 'required',
        ]);

        $userid = $this->BiodataModel->getusers();
        $biodata = [
            'nama' => Request()->nama,
            'no_ktp' => Request()->no_ktp,
            'tempat_lahir' => Request()->tempat_lahir,
            'tanggal_lahir' => Request()->tanggal_lahir,
            'jenis_kelamin' => Request()->jenis_kelamin,
            'agama' => Request()->agama,
            'golongan_darah' => Request()->golongan_darah,
            'status_kawin' => Request()->status_kawin,
            'alamat_ktp' => Request()->alamat_ktp,
            'alamat_tinggal' => Request()->alamat_tinggal,
            'email' => Request()->email,
            'no_telp' => Request()->no_telp,
            'orang_terdekat' => Request()->orang_terdekat,
            'skill' => Request()->skill,
            'roaming' => Request()->roaming,
            'gaji' => Request()->gaji,
            'id' => $userid
        ];
       
        $this->BiodataModel->insertbiodata($biodata);
        return redirect()->route('biodataupdate')->with('pesan','Biodata Berhasil di Update');
    }
    public function insertpendidikan()
    {
        Request()->validate([
            // pendidikan
            'jenjang_pendidikan' => 'required',
            'nama_sekolah' => 'required',
            'jurusan' => 'required',
            'tahun_lulus' => 'required|numeric',
            'ipk' => 'required',
        ]);
        $userid = $this->BiodataModel->getusers();
        $pendidikan = 
        [
            'jenjang_pendidikan' => Request()->input('jenjang_pendidikan'),
            'nama_sekolah' => Request()->input('nama_sekolah'),
            'jurusan' => Request()->input('jurusan'),
            'tahun_lulus' => Request()->input('tahun_lulus'),
            'ipk' => Request()->input('ipk'),
            'id' => $userid
        ];

        $this->BiodataModel->insertpendidikan($pendidikan);
        return redirect()->route('pendidikan')->with('pesan','Data Berhasil di Tambahkan');
    }

    public function insertpelatihan()
    {     
        Request()->validate([
            //pelatihan
            'nama_kursus' => 'required',
            'sertifikat' => 'required',
            'tahun' => 'required|numeric',
        ]);  
        $userid = $this->BiodataModel->getusers();
        $pelatihan = 
        [
            'nama_kursus' => Request()->nama_kursus,
            'sertifikat' => Request()->sertifikat,
            'tahun' => Request()->tahun,
            'id' => $userid
        ];

        $this->BiodataModel->insertpelatihan($pelatihan);
        return redirect()->route('pelatihan')->with('pesan','Data Berhasil di Tambahkan');
    }

    public function insertpengalaman()
    {
        Request()->validate([
            //pengalaman
            'nama_perusahaan' => 'required',
            'posisi_terakhir' => 'required',
            'gaji_terakhir' => 'required',
            'tahun' => 'required',
        ]);
        $userid = $this->BiodataModel->getusers();
        $pengalaman = 
        [
            'nama_perusahaan' => Request()->nama_perusahaan,
            'posisi_terakhir' => Request()->posisi_terakhir,
            'gaji_terakhir' => Request()->gaji_terakhir,
            'tahun' => Request()->tahun,
            'id' => $userid
        ];

        $this->BiodataModel->insertpengalaman($pengalaman);
        return redirect()->route('pengalaman')->with('pesan', 'Data Berhasil di Tambahkan');
    }

    //Tampil Data Update
    public function updatebiodataform($id_biodata)
    {
        $id = $this->BiodataModel->getusers();
        $gets = BiodataModel::where('id_biodata', $id_biodata)->first();
        $bio = $gets->id;
        if ($id != $bio) {
            return redirect()->route('cekdaftar');
        }else{
        $data = [
            'biodata' => $this->BiodataModel->cekbiodata($id_biodata)
        ];

        return view('biodata.v_updatebiodata', $data);
        }
    }

    public function updatependidikanform($id_pendidikan)
    {
        $id = $this->BiodataModel->getusers();
        $gets = PendidikanModel::where('id_pendidikan', $id_pendidikan)->first();
        $bio = $gets->id;
        if ($id != $bio) {
            return redirect()->back();
        }else{
        $data = [
            'biodata' => $this->BiodataModel->cekpendidikan($id_pendidikan)
        ];

        return view('biodata.v_updatependidikan', $data);
    }
    }

    public function updatepelatihanform($id_pelatihan)
    {
        $id = $this->BiodataModel->getusers();
        $gets = PelatihanModel::where('id_pelatihan', $id_pelatihan)->first();
        $bio = $gets->id;
        if ($id != $bio) {
            return redirect()->back();
        }else{
        $data = [
            'biodata' => $this->BiodataModel->cekpelatihan($id_pelatihan)
        ];

        return view('biodata.v_updatepelatihan', $data);
    }
    }

    public function updatepengalamanform($id_pengalaman)
    {
        $id = $this->BiodataModel->getusers();
        $gets = PengalamanModel::where('id_pengalaman', $id_pengalaman)->first();
        $bio = $gets->id;
        if ($id != $bio) {
            return redirect()->back();
        }else{
        $data = [
            'biodata' => $this->BiodataModel->cekpengalaman($id_pengalaman)
        ];

        return view('biodata.v_updatepengalaman', $data);
        }
    }

    public function updatebiodata($id_biodata)
    {
        Request()->validate([
            // biodata
            'nama' => 'required',
            'no_ktp' => 'required|numeric',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'golongan_darah' => 'required',
            'status_kawin' => 'required',
            'alamat_ktp' => 'required',
            'alamat_tinggal' => 'required',
            'email' => 'required',
            'no_telp' => 'required|numeric',
            'orang_terdekat' => 'required',
            'skill' => 'required',
            'roaming' => 'required',
            'gaji' => 'required',
        ]);
        $biodata = [
            'nama' => Request()->nama,
            'no_ktp' => Request()->no_ktp,
            'tempat_lahir' => Request()->tempat_lahir,
            'tanggal_lahir' => Request()->tanggal_lahir,
            'jenis_kelamin' => Request()->jenis_kelamin,
            'agama' => Request()->agama,
            'golongan_darah' => Request()->golongan_darah,
            'status_kawin' => Request()->status_kawin,
            'alamat_ktp' => Request()->alamat_ktp,
            'alamat_tinggal' => Request()->alamat_tinggal,
            'email' => Request()->email,
            'no_telp' => Request()->no_telp,
            'orang_terdekat' => Request()->orang_terdekat,
            'skill' => Request()->skill,
            'roaming' => Request()->roaming,
            'gaji' => Request()->gaji
        ];

        $this->BiodataModel->updatebiodata($id_biodata, $biodata);
        return redirect()->route('biodataupdate')->with('pesan', 'Data Berhasil di Update');
    }

    public function updatependidikan($id_pendidikan)
    {
        Request()->validate([
            // pendidikan
            'jenjang_pendidikan' => 'required',
            'nama_sekolah' => 'required',
            'jurusan' => 'required',
            'tahun_lulus' => 'required|numeric',
            'ipk' => 'required',
        ]);
        $pendidikan = 
        [
            'jenjang_pendidikan' => Request()->jenjang_pendidikan,
            'nama_sekolah' => Request()->nama_sekolah,
            'jurusan' => Request()->jurusan,
            'tahun_lulus' => Request()->tahun_lulus,
            'ipk' => Request()->ipk
        ];

        $this->BiodataModel->updatependidikan($id_pendidikan, $pendidikan);
        return redirect()->route('pendidikan')->with('pesan', 'Data Berhasil di Update');
    }

    public function updatepelatihan($id_pelatihan)
    {
        Request()->validate([
            //pelatihan
            'nama_kursus' => 'required',
            'sertifikat' => 'required',
            'tahun' => 'required|numeric',
        ]); 
        $pelatihan = 
            [
                'nama_kursus' => Request()->nama_kursus,
                'sertifikat' => Request()->sertifikat,
                'tahun' => Request()->tahun
            ];

        $this->BiodataModel->updatepelatihan($id_pelatihan, $pelatihan);
        return redirect()->route('pelatihan')->with('pesan', 'Data Berhasil di Update');
    }

    public function updatepengalaman($id_pengalaman)
    {
        Request()->validate([
            //pengalaman
            'nama_perusahaan' => 'required',
            'posisi_terakhir' => 'required',
            'gaji_terakhir' => 'required',
            'tahun' => 'required',
        ]);
        $pengalaman = 
            [
                'nama_perusahaan' => Request()->nama_perusahaan,
                'posisi_terakhir' => Request()->posisi_terakhir,
                'gaji_terakhir' => Request()->gaji_terakhir,
                'tahun' => Request()->tahun
            ];

        $this->BiodataModel->updatepengalaman($id_pengalaman, $pengalaman);
        return redirect()->route('pengalaman')->with('pesan', 'Data Berhasil di Update');
    }

    public function deletependidikan($id_pendidikan)
    {
        $this->BiodataModel->deletependidikan($id_pendidikan);
        return redirect()->route('pendidikan')->with('pesan','Data Berhasil di Hapus');
    }

    public function deletepelatihan($id_pelatihan)
    {
        $this->BiodataModel->deletepelatihan($id_pelatihan);
        return redirect()->route('pelatihan')->with('pesan','Data Berhasil di Hapus');
    }

    public function deletepengalaman($id_pengalaman)
    {
        $this->BiodataModel->deletepengalaman($id_pengalaman);
        return redirect()->route('pengalaman')->with('pesan','Data Berhasil di Hapus');
    }

    public function admindelete($id_biodata)
    {
        $gets = BiodataModel::where('id_biodata', $id_biodata)->first();
        $bio = $gets->id;
        BiodataModel::where('id', $bio)->delete();
        PendidikanModel::where('id', $bio)->delete();
        PelatihanModel::where('id', $bio)->delete();
        PengalamanModel::where('id', $bio)->delete();
        return redirect()->route('allbiodata')->with('pesan','Data Berhasil di Hapus');
    }

    public function tab($id_biodata)
    {   
        $biodata = $this->BiodataModel->cekbiodata($id_biodata);
        $id = $biodata->id;

        return view('biodata.tabadmin', compact('id_biodata', 'id', 'biodata'));
    }

    public function tampilbiodataupdateadmin($id_biodata)
    {   
        $biodata = $this->BiodataModel->cekbiodata($id_biodata);
        $id = $biodata->id;

        return view('biodata.v_biodataupdateadmin', compact('id_biodata', 'biodata'));
    }

    public function tampilpendidikanadmin($id_biodata)
    {
        $biodata = $this->BiodataModel->cekbiodata($id_biodata);
        $id = $biodata->id;
        $pendidikan = $this->BiodataModel->showadminpendidikan($id);

        return view('biodata.v_pendidikanadmin', compact('id_biodata', 'id', 'biodata', 'pendidikan'));
    }

    public function tampilpelatihanadmin($id_biodata)
    {
        $biodata = $this->BiodataModel->cekbiodata($id_biodata);
        $id = $biodata->id;
        $pelatihan = $this->BiodataModel->showadminpelatihan($id);

        return view('biodata.v_pelatihanadmin', compact('id_biodata','id', 'biodata', 'pelatihan'));
    }

    public function tampilpengalamanadmin($id_biodata)
    {
        $biodata = $this->BiodataModel->cekbiodata($id_biodata);
        $id = $biodata->id;
        $pengalaman = $this->BiodataModel->showadminpengalaman($id);

        return view('biodata.v_pengalamanadmin', compact('id_biodata','id', 'biodata', 'pengalaman'));
    }

    public function updatebiodataformadmin($id_biodata)
    {        
        $biodata = $this->BiodataModel->cekbiodata($id_biodata);

        return view('biodata.v_updatebiodataadmin', compact('id_biodata', 'biodata'));
    }

    public function updatependidikanformadmin($id_biodata, $id, $id_pendidikan)
    {
        $pendidikan = $this->BiodataModel->cekpendidikan($id_pendidikan);

        return view('biodata.v_updatependidikanadmin', compact('id_biodata', 'id', 'id_pendidikan', 'pendidikan'));
    }

    public function updatepelatihanformadmin($id_biodata, $id, $id_pelatihan)
    {
        $pelatihan = $this->BiodataModel->cekpelatihan($id_pelatihan);

        return view('biodata.v_updatepelatihanadmin', compact('id_biodata', 'id', 'id_pelatihan', 'pelatihan'));
    }

    public function updatepengalamanformadmin($id_biodata, $id, $id_pengalaman)
    {
        $pengalaman = $this->BiodataModel->cekpengalaman($id_pengalaman);

        return view('biodata.v_updatepengalamanadmin', compact('id_biodata', 'id', 'id_pengalaman', 'pengalaman'));
    }

    public function updatebiodataadmin($id_biodata)
    {
        Request()->validate([
            // biodata
            'nama' => 'required',
            'no_ktp' => 'required|numeric',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'golongan_darah' => 'required',
            'status_kawin' => 'required',
            'alamat_ktp' => 'required',
            'alamat_tinggal' => 'required',
            'email' => 'required',
            'no_telp' => 'required|numeric',
            'orang_terdekat' => 'required',
            'skill' => 'required',
            'roaming' => 'required',
            'gaji' => 'required',
        ]);
        $biodata = [
            'nama' => Request()->nama,
            'no_ktp' => Request()->no_ktp,
            'tempat_lahir' => Request()->tempat_lahir,
            'tanggal_lahir' => Request()->tanggal_lahir,
            'jenis_kelamin' => Request()->jenis_kelamin,
            'agama' => Request()->agama,
            'golongan_darah' => Request()->golongan_darah,
            'status_kawin' => Request()->status_kawin,
            'alamat_ktp' => Request()->alamat_ktp,
            'alamat_tinggal' => Request()->alamat_tinggal,
            'email' => Request()->email,
            'no_telp' => Request()->no_telp,
            'orang_terdekat' => Request()->orang_terdekat,
            'skill' => Request()->skill,
            'roaming' => Request()->roaming,
            'gaji' => Request()->gaji
        ];

        $this->BiodataModel->updatebiodata($id_biodata, $biodata);
        $url = '/biodataupdateadmin/{{id_biodata}}';
        $url = str_replace('{{id_biodata}}', $id_biodata, $url);
        return redirect()->to($url)->with('pesan', 'Data Berhasil di Update');
    }

    public function updatependidikanadmin($id_biodata, $id, $id_pendidikan)
    {
        Request()->validate([
            // pendidikan
            'jenjang_pendidikan' => 'required',
            'nama_sekolah' => 'required',
            'jurusan' => 'required',
            'tahun_lulus' => 'required|numeric',
            'ipk' => 'required',
        ]);
        $pendidikan = 
        [
            'jenjang_pendidikan' => Request()->jenjang_pendidikan,
            'nama_sekolah' => Request()->nama_sekolah,
            'jurusan' => Request()->jurusan,
            'tahun_lulus' => Request()->tahun_lulus,
            'ipk' => Request()->ipk
        ];

        $this->BiodataModel->updatependidikan($id_pendidikan, $pendidikan);
        $url = '/biodataupdateadmin/{{id_biodata}}/pendidikanadmin/{{id}}';
        $url = str_replace('{{id_biodata}}', $id_biodata, $url);
        $url = str_replace('{{id}}', $id, $url);
        return redirect()->to($url)->with('pesan', 'Data Berhasil di Update');
    }

    public function updatepelatihanadmin($id_biodata, $id, $id_pelatihan)
    {
        Request()->validate([
            //pelatihan
            'nama_kursus' => 'required',
            'sertifikat' => 'required',
            'tahun' => 'required|numeric',
        ]); 
        $pelatihan = 
            [
                'nama_kursus' => Request()->nama_kursus,
                'sertifikat' => Request()->sertifikat,
                'tahun' => Request()->tahun
            ];

        
        $url = '/biodataupdateadmin/{{id_biodata}}/pelatihanadmin/{{id}}';
        $url = str_replace('{{id_biodata}}', $id_biodata, $url);
        $url = str_replace('{{id}}', $id, $url);
        $this->BiodataModel->updatepelatihan($id_pelatihan, $pelatihan);
        return redirect()->to($url)->with('pesan', 'Data Berhasil di Update');
    }

    public function updatepengalamanadmin($id_biodata, $id, $id_pengalaman)
    {
        Request()->validate([
            //pengalaman
            'nama_perusahaan' => 'required',
            'posisi_terakhir' => 'required',
            'gaji_terakhir' => 'required',
            'tahun' => 'required',
        ]);
        $pengalaman = 
            [
                'nama_perusahaan' => Request()->nama_perusahaan,
                'posisi_terakhir' => Request()->posisi_terakhir,
                'gaji_terakhir' => Request()->gaji_terakhir,
                'tahun' => Request()->tahun
            ];

        $url = '/biodataupdateadmin/{{id_biodata}}/pengalamanadmin/{{id}}';
        $url = str_replace('{{id_biodata}}', $id_biodata, $url);
        $url = str_replace('{{id}}', $id, $url);
        $this->BiodataModel->updatepengalaman($id_pengalaman, $pengalaman);
        return redirect()->to($url)->with('pesan', 'Data Berhasil di Update');
    }

    public function deletependidikanadmin($id_pendidikan)
    {
        $this->BiodataModel->deletependidikan($id_pendidikan);
        return redirect()->back()->with('pesan','Data Berhasil di Hapus');
    }

    public function deletepelatihanadmin($id_pelatihan)
    {
        $this->BiodataModel->deletepelatihan($id_pelatihan);
        return redirect()->back()->with('pesan','Data Berhasil di Hapus');
    }

    public function deletepengalamanadmin($id_pengalaman)
    {
        $this->BiodataModel->deletepengalaman($id_pengalaman);
        return redirect()->back()->with('pesan','Data Berhasil di Hapus');
    }

    public function pendidikanadmin($id_biodata, $id)
    {
        $biodata = $this->BiodataModel->cekbiodata($id_biodata);
        $id = $biodata->id;
        $userid = $id;
        return view('biodata.v_tambahpendidikanadmin', compact('id_biodata', 'id', 'userid'));
    }

    public function pelatihanadmin($id_biodata, $id)
    {
        $biodata = $this->BiodataModel->cekbiodata($id_biodata);
        $id = $biodata->id;
        $userid = $id;
        return view('biodata.v_tambahpelatihanadmin', compact('id_biodata', 'id', 'userid'));
    }

    public function pengalamanadmin($id_biodata, $id)
    {
        $biodata = $this->BiodataModel->cekbiodata($id_biodata);
        $id = $biodata->id;
        $userid = $id;
        return view('biodata.v_tambahpengalamanadmin', compact('id_biodata', 'id', 'userid'));
    }

    public function insertpendidikanadmin($id_biodata, $id)
    {
        Request()->validate([
            // pendidikan
            'jenjang_pendidikan' => 'required',
            'nama_sekolah' => 'required',
            'jurusan' => 'required',
            'tahun_lulus' => 'required|numeric',
            'ipk' => 'required',
        ]);
        $userid = $id;
        $pendidikan = 
        [
            'jenjang_pendidikan' => Request()->input('jenjang_pendidikan'),
            'nama_sekolah' => Request()->input('nama_sekolah'),
            'jurusan' => Request()->input('jurusan'),
            'tahun_lulus' => Request()->input('tahun_lulus'),
            'ipk' => Request()->input('ipk'),
            'id' => $userid
        ];

        $this->BiodataModel->insertpendidikan($pendidikan);
        $url = '/biodataupdateadmin/{{id_biodata}}/pendidikanadmin/{{id}}';
        $url = str_replace('{{id_biodata}}', $id_biodata, $url);
        $url = str_replace('{{id}}', $id, $url);
        return redirect()->to($url)->with('pesan', 'Data Berhasil di Update');
    }

    public function insertpelatihanadmin($id_biodata, $id)
    {     
        Request()->validate([
            //pelatihan
            'nama_kursus' => 'required',
            'sertifikat' => 'required',
            'tahun' => 'required|numeric',
        ]);  
        $userid = $id;
        $pelatihan = 
        [
            'nama_kursus' => Request()->nama_kursus,
            'sertifikat' => Request()->sertifikat,
            'tahun' => Request()->tahun,
            'id' => $userid
        ];

        $this->BiodataModel->insertpelatihan($pelatihan);
        $url = '/biodataupdateadmin/{{id_biodata}}/pelatihanadmin/{{id}}';
        $url = str_replace('{{id_biodata}}', $id_biodata, $url);
        $url = str_replace('{{id}}', $id, $url);
        return redirect()->to($url)->with('pesan','Data Berhasil di Tambahkan');
    }

    public function insertpengalamanadmin($id_biodata, $id)
    {
        Request()->validate([
            //pengalaman
            'nama_perusahaan' => 'required',
            'posisi_terakhir' => 'required',
            'gaji_terakhir' => 'required',
            'tahun' => 'required',
        ]);
        $userid = $id;
        $pengalaman = 
        [
            'nama_perusahaan' => Request()->nama_perusahaan,
            'posisi_terakhir' => Request()->posisi_terakhir,
            'gaji_terakhir' => Request()->gaji_terakhir,
            'tahun' => Request()->tahun,
            'id' => $userid
        ];

        $this->BiodataModel->insertpengalaman($pengalaman);
        $url = '/biodataupdateadmin/{{id_biodata}}/pengalamanadmin/{{id}}';
        $url = str_replace('{{id_biodata}}', $id_biodata, $url);
        $url = str_replace('{{id}}', $id, $url);
        return redirect()->to($url)->with('pesan', 'Data Berhasil di Tambahkan');
    }
}
