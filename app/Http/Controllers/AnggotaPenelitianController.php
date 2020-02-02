<?php

namespace App\Http\Controllers;

use App\Profile;
use Illuminate\Http\Request;
use App\Anggota;
use App\Pengajuan;
use App\User;
use App\JenisPengajuan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AnggotaPenelitianController extends Controller
{
    public function create()
    {
        $id_profil = Profile::where('user_id',Auth::id())->first()->id;
        $has_pengajuan = Pengajuan::where('profil_id', $id_profil)->where('jenis_pengajuan_id', 1)->exists();
        $id_pengajuan = DB::table('pengajuans')->where('profil_id', $id_profil)->where('jenis_pengajuan_id', 1)->orderBy('created_at', 'desc')->first()->id;

        if($has_pengajuan) {
            if(Anggota::where('pengajuan_id',$id_pengajuan)->exists()){
                return redirect()->route('daftar_pengajuan.index');
            } else {
                $data['ketua'] = Profile::where('user_id',Auth::id())->first();
                $data['profile'] =  Profile::where('id','!=',$id_profil)->get();
                $data['jenis_p'] = JenisPengajuan::where('id', '1')->first();
                $data['pengajuan'] = Pengajuan::where('id',$id_pengajuan)->first();
                return view('users/pengajuan_penelitian/anggota_penelitian.create', $data);
            }
        } else {
            return redirect()->route('pengajuan_penelitian.create')->with('alert-warning','Anda belum mengajukan Penelitian');
        }
    }

    public function store(Request $request){
        $anggota = $request->profil_id;
        $pengajuan = $request->pengajuan_id;
        $datas = array();

        foreach($anggota as $anggotas){
            $datas[] = [
                'pengajuan_id' => $pengajuan,
                'profil_id' => $anggotas,
            ];
        }
        if(empty($datas)){
            return view('users.pengajuan_pennelitian.anggota_penelitian.create')->with('alert-danger','Harap mengisi seluruh anggota');
        } else {
            Anggota::insert($datas);
            return redirect()->route('daftar_pengajuan.index');
        }
    }
}
