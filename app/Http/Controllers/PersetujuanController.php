<?php

namespace App\Http\Controllers;

use App\Pengajuan;
use App\Persetujuan;
use App\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PersetujuanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['pengajuans'] = DB::table('profils')
            ->join('pengajuans', 'profils.id', '=', 'pengajuans.profil_id')
            ->select('pengajuans.id','profils.name', 'pengajuans.judul_penelitian', 'pengajuans.jenis_pengajuan_id','pengajuans.total_dana','pengajuans.persetujuan_id','pengajuans.proposal','pengajuans.waktu_pengajuan_id','pengajuans.created_at')
            ->get();
        return view('admin.pengajuan.daftar_pengajuan.index', $data);
    }
    public function indexPenelitian()
    {
        $data['pengajuans'] = DB::table('profils')
            ->join('pengajuans', 'profils.id', '=', 'pengajuans.profil_id')
            ->select('pengajuans.id','profils.name', 'pengajuans.judul_penelitian', 'pengajuans.jenis_pengajuan_id','pengajuans.total_dana','pengajuans.persetujuan_id','pengajuans.proposal','pengajuans.waktu_pengajuan_id','pengajuans.created_at')
            ->where('pengajuans.jenis_pengajuan_id',1)
            ->get();
        return view('admin.pengajuan.publikasi.index', $data);
    }
    public function indexPengabdian()
    {
        $data['pengajuans'] = DB::table('profils')
            ->join('pengajuans', 'profils.id', '=', 'pengajuans.profil_id')
            ->select('pengajuans.id','profils.name', 'pengajuans.judul_penelitian', 'pengajuans.jenis_pengajuan_id','pengajuans.total_dana','pengajuans.persetujuan_id','pengajuans.proposal','pengajuans.waktu_pengajuan_id','pengajuans.created_at')
            ->where('pengajuans.jenis_pengajuan_id',2)
            ->get();
        return view('admin.pengajuan.pengabdian.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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
     * @param  \App\Persetujuan  $persetujuan
     * @return \Illuminate\Http\Response
     */
    public function show(Persetujuan $persetujuan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Persetujuan  $persetujuan
     * @return \Illuminate\Http\Response
     */
    public function edit(Persetujuan $persetujuan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Persetujuan  $persetujuan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Pengajuan::where('id',$id)->first();
        $data->persetujuan_id = $request->persetujuan_id;
        $data->save();
        $id_persetujuan = $request->persetujuan_id;
        if($id_persetujuan == '1'){
            return redirect()->route('persetujuan.index')->with('alert-success','Pengajuan publikasi');
        } elseif ($id_persetujuan == '2'){
            return redirect()->route('persetujuan.index')->with('alert-warning','Pengajuan direvisi');
        } else {
            return redirect()->route('persetujuan.index')->with('alert-danger','Pengajuan pengabdian');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Persetujuan  $persetujuan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Persetujuan $persetujuan)
    {

    }

    public function disetujui(){
        $data['pengajuan'] = Pengajuan::where('persetujuan_id',1)->get();
        return view('admin.pengajuan.publikasi.index', $data);
    }

    public function ditolak(){
        $data['pengajuan'] = Pengajuan::where('persetujuan_id',3);
        return view('admin.pengajuan.pengabdian.index', $data);
    }

    public function belumDiPeriksa(){
        $data['pengajuan'] = Pengajuan::where('persetujuan_id',NULL);
        return view('admin.pengajuan.daftar_pengajuan.index', $data);
    }

    public function revisi(){
        $data['pengajuan'] = Pengajuan::where('persetujuan_id',2);
        return view('admin.pengajuan.revisi.index', $data);
    }
}
