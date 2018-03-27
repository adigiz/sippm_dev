<?php

namespace App\Http\Controllers;
use App\Pengajuan;
use Illuminate\Support\Facades\Auth;

class DaftarPengajuanController extends Controller
{
    public function index(){
        $data['pengajuans'] = Pengajuan::where('profil_id','=',Auth::id())->get();
        return view('users/daftar_pengajuan.index', $data);
    }
}
