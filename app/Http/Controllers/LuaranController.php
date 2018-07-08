<?php

namespace App\Http\Controllers;

use App\Prototype;
use App\Publikasi;
use App\Haki;
use App\PertemuanIlmiah;
use Illuminate\Http\Request;
use App\Luaran;
use App\Pengajuan;

class LuaranController extends Controller
{
    public function index(){

    }

    public function create($id)
    {
        if(Luaran::where('pengajuan_id',$id)->exists()){
            return $this->edit($id);
        } else {
            $data['pengajuan'] = Pengajuan::where('id',$id)->first();
            return view('users/sedang_berjalan/luaran.create',$data);
        }

    }
    public function edit($id)
    {
        $data['luaran'] = Luaran::where('pengajuan_id',$id)->first();
        $data['pengajuan'] = Pengajuan::where('id',$id)->first();
        return view('users.sedang_berjalan.luaran.edit',$data);
    }

    public function store(Request $request)
    {
        $data = new Luaran();
        $data->pengajuan_id = $request->pengajuan_id;
        $data->jurnal = $request->jurnal;
        $data->pertemuan_ilmiah = $request->pertemuan_ilmiah;
        $data->haki = $request->haki;
        $data->prototype = $request->prototype;
        $data->save();
        return redirect()->route('sedang_berjalan.index')->with('alert-success','Berhasil Menambahkan Data!');
    }

    public function update(Request $request, $id){
        $data = Luaran::where('id',$id)->first();
        $data->jurnal = $request->jurnal;
        $data->pertemuan_ilmiah = $request->pertemuan_ilmiah;
        $data->haki = $request->haki;
        $data->prototype = $request->prototype;
        $data->save();
        return redirect()->route('sedang_berjalan.index')->with('alert-success','Data berhasil diubah!');
    }

    public function createPublikasi($id)
    {
        $data['pengajuan'] = Pengajuan::where('id',$id)->first();
        return view('users/sedang_berjalan/luaran/publikasi.create',$data);
//        if(Publikasi::where('pengajuan_id',$id)->exists()){
//            return redirect()->route('sedang_berjalan.index')->with('alert-success','Anda sudah menambahkan luaran');
//        } else {
//
//        }
    }
    public function createHaki($id)
    {
        $data['pengajuan'] = Pengajuan::where('id',$id)->first();
        return view('users/sedang_berjalan/luaran/haki.create',$data);
//
    }
    public function createPrototype($id)
    {
        $data['pengajuan'] = Pengajuan::where('id',$id)->first();
        return view('users/sedang_berjalan/luaran/prototype.create',$data);

    }

    public function createPertemuan($id)
    {
        $data['pengajuan'] = Pengajuan::where('id',$id)->first();
        return view('users/sedang_berjalan/luaran/pertemuan.create',$data);
//        if(PertemuanIlmiah::where('pengajuan_id',$id)->exists()){
//            return redirect()->route('sedang_berjalan.index')->with('alert-success','Anda sudah menambahkan luaran');
//        } else {
//
//        }
    }

    public function storePublikasi(Request $request)
    {
        $data = new Publikasi();
        $data->pengajuan_id = $request->pengajuan_id;
        $data->jenis_jurnal = $request->jenis_jurnal;
        $data->judul_penelitian = $request->judul_penelitian;
        $data->tim_penulis = $request->tim_penulis;
        $data->nama_jurnal = $request->nama_jurnal;
        $data->volume = $request->volume;
        $data->tahun = $request->tahun;
        $data->no_jurnal = $request->no_jurnal;
        $data->halaman = $request->halaman;
        $data->abstrak = $request->abstrak;
        $data->save();
        return redirect()->route('sedang_berjalan.index')->with('alert-success','Berhasil Menambahkan Data!');
    }

    public function storeHaki(Request $request){
        $data = new Haki();
        $data->pengajuan_id = $request->pengajuan_id;
        $data->jenis_haki = $request->jenis_haki;
        $data->judul_penelitian = $request->judul_penelitian;
        $data->penulis = $request->penulis;
        $data->abstrak = $request->abstrak;
        $data->tanggal = $request->tanggal;
        $data->save();
        return redirect()->route('sedang_berjalan.index')->with('alert-success','Berhasil Menambahkan Data!');

    }

    public function storePrototype(Request $request){
        $data = new Prototype();
        $data->pengajuan_id = $request->pengajuan_id;
        $data->jenis_prototype = $request->jenis_prototype;
        $data->judul_penelitian = $request->judul_penelitian;
        $data->penulis = $request->penulis;
        $jp = $request->judul_penelitian;
        if($request->gambar != NULL){
            $gambar = $request->file('gambar');
            $ext = $gambar->getClientOriginalExtension();
            $newName = "Luaran_".$request->jenis_prototype.$jp.".".$ext;
            $gambar->move('uploads/file',$newName);
            $data->gambar = $newName;
        }
        $data->tanggal = $request->tanggal;
        $data->save();
        return redirect()->route('sedang_berjalan.index')->with('alert-success','Berhasil Menambahkan Data!');
    }
    public function storePertemuan(Request $request)
    {
        $data = new PertemuanIlmiah();
        $data->pengajuan_id = $request->pengajuan_id;
        $data->jenis_pertemuan = $request->jenis_pertemuan;
        $data->judul_penelitian = $request->judul_penelitian;
        $data->tim_penulis = $request->tim_penulis;
        $data->nama_kegiatan = $request->nama_kegiatan;
        $data->tgl_pelaksanaan = $request->tgl_pelaksanaan;
        $data->tempat_pelaksanaan = $request->tempat_pelaksanaan;
        $data->penyelenggara = $request->penyelenggara;
        $data->abstrak = $request->abstrak;
        $data->save();
        return redirect()->route('sedang_berjalan.index')->with('alert-success','Berhasil Menambahkan Data!');
    }

    public function showPublikasi($id)
    {
        $data['publikasi'] = Publikasi::where('pengajuan_id',$id)->first();
        $anggota = Publikasi::where('pengajuan_id',$id)->first()->tim_penulis;
        $data['anggotas'] = explode(',', $anggota);


        return view('users.sedang_berjalan.luaran.publikasi.show', $data);
    }

    public function showHaki($id)
    {
        $data['haki'] = Haki::where('pengajuan_id',$id)->first();
        $anggota = Haki::where('pengajuan_id',$id)->first()->penulis;
        $data['anggotas'] = explode(',', $anggota);


        return view('users.sedang_berjalan.luaran.haki.show', $data);
    }
    public function showPrototype($id)
    {
        $data['prototype'] = Prototype::where('pengajuan_id',$id)->first();
        $anggota = Prototype::where('pengajuan_id',$id)->first()->penulis;
        $data['anggotas'] = explode(',', $anggota);


        return view('users.sedang_berjalan.luaran.prototype.show', $data);
    }

    public function showPertemuan($id)
    {
        $data['pertemuan'] = PertemuanIlmiah::where('pengajuan_id',$id)->first();
        $anggota = PertemuanIlmiah::where('pengajuan_id',$id)->first()->tim_penulis;
        $data['anggotas'] = explode(',', $anggota);


        return view('users.sedang_berjalan.luaran.pertemuan.show', $data);
    }
}
