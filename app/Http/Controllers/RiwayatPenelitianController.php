<?php

namespace App\Http\Controllers;

use App\Profile;
use Illuminate\Http\Request;
use App\Publikasi;
use App\PertemuanIlmiah;
use Illuminate\Support\Facades\Auth;

class RiwayatPenelitianController extends Controller
{
    public function index(){
        if(Profile::where('user_id',Auth::id())->exists()){
            $id_profil = Profile::where('user_id', Auth::id())->first()->id;
            $data['publikasis'] = Publikasi::where('profil_id', $id_profil)->get();
            $data['pertemuans'] = PertemuanIlmiah::where('profil_id', $id_profil)->get();
            return view("users.riwayat.index", $data);
        } else {
            return redirect()->route('profil.create')->with('alert-warning','Anda belum mengisi profil');
        }
    }

    public function indexAdmin(){
        $id_profil = Profile::all()->pluck('id');
        $data['publikasis'] = Publikasi::whereIn('profil_id', $id_profil)->get();
        $data['pertemuans'] = PertemuanIlmiah::whereIn('profil_id', $id_profil)->get();
        return view("admin.riwayat.index", $data);
    }

    public function indexAdminPublikasi(){
        $id_profil = Profile::all()->pluck('id');
        $data['publikasis'] = Publikasi::whereIn('profil_id', $id_profil)->get();
        return view("admin.riwayat.publikasi.index", $data);
    }
    public function indexAdminPertemuan(){
        $id_profil = Profile::all()->pluck('id');
        $data['pertemuans'] = PertemuanIlmiah::whereIn('profil_id', $id_profil)->get();
        return view("admin.riwayat.pertemuan.index", $data);
    }


    public function createPublikasi()
    {
        if(Profile::where('user_id',Auth::id())->exists()){
            return view('users.riwayat.publikasi.create');
        } else {
            return redirect()->route('profil.create')->with('alert-warning','Anda belum mengisi profil');
        }

    }
    public function createPertemuan()
    {
        if(Profile::where('user_id',Auth::id())->exists()){
            return view('users.riwayat.pertemuan.create');
        } else {
            return redirect()->route('profil.create')->with('alert-warning','Anda belum mengisi profil');
        }

    }
    public function storePublikasi(Request $request)
    {
        $data = new Publikasi();
        $data->profil_id = Profile::where('user_id',Auth::id())->first()->id;
        $data->jenis_jurnal = $request->jenis_jurnal;
        $data->judul_penelitian = $request->judul_penelitian;
        $data->tim_penulis = $request->tim_penulis;
        $data->nama_jurnal = $request->nama_jurnal;
        $data->volume = $request->volume;
        $data->no_jurnal = $request->no_jurnal;
        $data->halaman = $request->halaman;
        $data->abstrak = $request->abstrak;
        $data->tahun = $request->tahun;
        $data->url = $request->url;

        $jp = $request->judul_penelitian;

        $bukti = $request->file('bukti');
        $ext = $bukti->getClientOriginalExtension();
        $newName = "Riwayat_Penelitian_".$jp.".".$ext;
        $bukti->move('uploads/file',$newName);
        $data->bukti = $newName;
        $data->save();

        return redirect()->route('riwayat.index')->with('alert-success','Berhasil Menambahkan Data!');
    }
    public function storePertemuan(Request $request)
    {
        $data = new PertemuanIlmiah();
        $data->profil_id = Profile::where('user_id',Auth::id())->first()->id;
        $data->jenis_pertemuan = $request->jenis_pertemuan;
        $data->judul_penelitian = $request->judul_penelitian;
        $data->tim_penulis = $request->tim_penulis;
        $data->nama_kegiatan = $request->nama_kegiatan;
        $data->tgl_pelaksanaan = $request->tgl_pelaksanaan;
        $data->tempat_pelaksanaan = $request->tempat_pelaksanaan;
        $data->penyelenggara = $request->penyelenggara;
        $data->abstrak = $request->abstrak;
        $data->save();
        return redirect()->route('riwayat.index')->with('alert-success','Berhasil Menambahkan Data!');
    }
}
