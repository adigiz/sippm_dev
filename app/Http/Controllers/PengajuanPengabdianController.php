<?php

namespace App\Http\Controllers;

use App\Pengajuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\JenisPengajuan;
use Illuminate\Support\Facades\DB;

class PengajuanPengabdianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $user      = User::find(Auth::id());
        $profils  = $user->profils;
        $profilsId = $profils->id;
        $data['pengajuan'] = Pengajuan::where('profil_id',$profilsId)->first();
//        $data = Pengajuan::where('profil_id','2')->first();
        return view('users/daftar_pengajuan.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $var = DB::table('pengajuans')->where('profil_id', Auth::id())->where('jenis_pengajuan_id', 2)->doesntExist();
        if($var) {
            $id = Auth::id();
            $data['users'] = User::find($id);
            $data['jenis_p'] = JenisPengajuan::where('id', '2')->first();
            //$data = PengajuanPenelitian::with('profils')->get();
            return view('users/pengajuan_pengabdian.create', $data);
        } else {
            return redirect()->route('daftar_pengajuan.index')->with('alert-warning','Anda telah mengajukan pengabdian sebagai ketua');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Pengajuan();
        $data->profil_id = $request->profil_id;
        $data->jenis_pengajuan_id = $request->jenis_pengajuan_id;
        $data->judul_penelitian = $request->judul_penelitian;
        $data->abstrak = $request->abstrak;
        $data->jumlah_anggota = $request->jumlah_anggota;
        $data->jumlah_lab = $request->jumlah_lab;
        $data->jumlah_mhs = $request->jumlah_mhs;
        $data->no_telp = $request->no_telp;
        $data->total_dana = $request->total_dana;
        $data->dana_pribadi = $request->dana_pribadi;
        $data->dana_lain = $request->dana_lain;

        $rules = [
            "proposal" => "required|mimes:pdf|max:2048"
        ];
        $this->validate($request, $rules);

        $jp = $request->judul_penelitian;

        $proposal = $request->file('proposal');
        $ext = $proposal->getClientOriginalExtension();
        $newName = "Proposal_Pengabdian_".$jp.".".$ext;
        $proposal->move('uploads/file',$newName);
        $data->proposal = $newName;
        $data->save();
        return redirect()->route('daftar_pengajuan.index')->with('alert-success','Berhasil Menambahkan Data!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pengajuan  $pengajuan
     * @return \Illuminate\Http\Response
     */
    public function show(Pengajuan $pengajuan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pengajuan  $pengajuan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pengajuan $pengajuan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pengajuan  $pengajuan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pengajuan $pengajuan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pengajuan  $pengajuan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pengajuan $pengajuan)
    {
        //
    }
}
