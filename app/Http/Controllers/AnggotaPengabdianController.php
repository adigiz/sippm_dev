<?php

namespace App\Http\Controllers;

use App\Mitra;
use App\Profile;
use Illuminate\Http\Request;
use App\Anggota;
use App\Pengajuan;
use App\User;
use App\JenisPengajuan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AnggotaPengabdianController extends Controller
{
    public function create()
    {
        $var = DB::table('pengajuans')->where('profil_id', Auth::id())->where('jenis_pengajuan_id', 2)->exists();
        if($var) {
            $id_pengajuan = DB::table('pengajuans')->where('profil_id', Auth::id())->where('jenis_pengajuan_id', 2)->orderBy('created_at', 'desc')->first()->id;
            $data['ketua'] = Profile::where('user_id',Auth::id())->first();
            $data['profile'] =  Profile::where('user_id','!=',Auth::id())->get();
            $data['jenis_p'] = JenisPengajuan::where('id', '1')->first();
            $data['mitra'] = Mitra::where('pengajuan_id',$id_pengajuan)->first();
            $data['pengajuan'] = Pengajuan::where('id',$id_pengajuan)->orderBy('created_at', 'desc')->first();
            return view('users/pengajuan_pengabdian/anggota_pengabdian.create', $data);
        } else {
            return redirect()->route('pengajuan_pengabdian.create')->with('alert-warning','Anda belum mengajukan Pengabdian Masyarakat');
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
            return view('users.pengajuan_pengabdian.anggota_pengabdian.create')->with('alert-danger','Harap mengisi seluruh anggota');
        } else {
            Anggota::insert($datas);
            return redirect()->route('daftar_pengajuan.index');
        }

    }
}