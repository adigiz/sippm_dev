<?php

namespace App\Http\Controllers;

use App\WaktuPengajuan;
use Illuminate\Http\Request;

class WaktuPengajuanController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    public function index()
    {
        $data = WaktuPengajuan::orderBy('created_at', 'desc')->paginate(2);
        return view('admin.waktu_pengajuan.index',compact('data'));
    }

    public function create()
    {
        return view('admin/waktu_pengajuan.create');
    }

    public function store(Request $request)
    {
        $data = new WaktuPengajuan();
        $data->tanggal_buka = $request->tanggal_buka;
        $data->waktu_buka = $request->waktu_buka;
        $data->tanggal_tutup = $request->tanggal_tutup;
        $data->waktu_tutup = $request->waktu_tutup;
        $data->save();
        return redirect()->route('waktu_pengajuan.index')->with('alert-success','Berhasil Menambahkan Data!');
    }

    public  function edit($id){
        $data['waktu'] = WaktuPengajuan::where('id',$id)->first();
        return view('admin.waktu_pengajuan.edit',$data);
    }
    public function update(Request $request, $id)
    {
        $data = WaktuPengajuan::where('id',$id)->first();
        $data->tanggal_buka = $request->tanggal_buka;
        $data->waktu_buka = $request->waktu_buka;
        $data->tanggal_tutup = $request->tanggal_tutup;
        $data->waktu_tutup = $request->waktu_tutup;
        $data->save();
        return redirect()->route('waktu_pengajuan.index')->with('alert-success','Data berhasil diubah!');

    }

    public function destroy($id)
    {
        $data = WaktuPengajuan::where('id',$id)->first();
        $data->delete();
        return redirect()->route('waktu_pengajuan.index')->with('alert-success','Data berhasi dihapus!');
    }
}
