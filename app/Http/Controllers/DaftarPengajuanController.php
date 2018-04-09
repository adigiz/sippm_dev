<?php

namespace App\Http\Controllers;
use App\Anggota;
use App\Pengajuan;
use Illuminate\Support\Facades\Auth;

class DaftarPengajuanController extends Controller
{
    public function index(){
//        $data['pengajuans'] = Pengajuan::where('profil_id','=',Auth::id())->get();
        $data['pengajuans'] = Pengajuan::where('profil_id',Auth::id())->orderBy('created_at','desc')->get();
        $id_pengajuan = Pengajuan::where('profil_id',Auth::id())->orderBy('created_at','desc')->pluck('id');
        $data['anggotas'] = Anggota::whereIn('pengajuan_id',$id_pengajuan)->orderBy('created_at','desc')->get();
        return view('users/daftar_pengajuan.index', $data);
    }


}