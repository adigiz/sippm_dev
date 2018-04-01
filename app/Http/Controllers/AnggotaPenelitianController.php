<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Anggota;
use App\Pengajuan;
use App\User;
use App\JenisPengajuan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AnggotaPenelitianController extends Controller
{
    //
    public function create()
    {
        $var = DB::table('pengajuans')->where('profil_id', Auth::id())->where('jenis_pengajuan_id', 1)->exists();
        if($var) {
            $id_pengajuan = DB::table('pengajuans')->where('profil_id', Auth::id())->where('jenis_pengajuan_id', 1)->orderBy('created_at', 'desc')->first()->id;
            $data['user'] = User::find(Auth::id());
            $data['profile'] =  DB::table('users')->join('profils','profils.user_id','=','users.id')->where('profils.id','!=', Auth::id())->select('users.name', 'profils.id')->get();
//            $data['profile'] = Profile::with('users');
            $data['jenis_p'] = JenisPengajuan::where('id', '1')->first();
            $data['pengajuan'] = Pengajuan::where('id',$id_pengajuan)->first();
            return view('users/pengajuan_penelitian/anggota_penelitian.create', $data);
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
        Anggota::insert($datas);
        return view('users/daftar_pengajuan.index');
    }
}
