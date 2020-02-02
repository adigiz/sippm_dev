<?php

namespace App\Http\Controllers;
use App\Anggota;
use App\Pengajuan;
use App\Profile;
use App\WaktuPengajuan;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class DaftarPengajuanController extends Controller
{
    public function index(){
        if(Profile::where('user_id',Auth::id())->exists()){
            $id_profil = Profile::where('user_id', Auth::id())->first()->id;
            $data['profile'] = Profile::find($id_profil);
            $pengajuans = Pengajuan::where('profil_id',$id_profil)->orderBy('created_at','desc')->get();
            $id_pengajuan = Pengajuan::where('profil_id',$id_profil)->orderBy('created_at','desc')->pluck('id');
            $data['anggotas'] = Anggota::whereIn('pengajuan_id',$id_pengajuan)->orderBy('created_at','desc')->get();
            $id_pengajuan_as_anggota = Anggota::where('profil_id', $id_profil)->orderBy('created_at','desc')->pluck('pengajuan_id');
            $data['ang'] = Anggota::whereIn('pengajuan_id',$id_pengajuan_as_anggota)->orderBy('created_at','desc')->get();
            $pengajuans_anggota = Pengajuan::whereIn('id', $id_pengajuan_as_anggota)->orderBy('created_at','desc')->get();
            $data['pengajuans'] = new \Illuminate\Database\Eloquent\Collection;
            $data['pengajuans'] = $data['pengajuans']->merge($pengajuans);
            $data['pengajuans'] = $data['pengajuans']->merge($pengajuans_anggota);
            $data['pengajuans']->map(function ($pengajuan) {
                $tanggal_tutup = WaktuPengajuan::where('id', $pengajuan->waktu_pengajuan_id)->first()->tanggal_tutup;
                $tanggal_buka = WaktuPengajuan::where('id', $pengajuan->waktu_pengajuan_id)->first()->tanggal_buka;
                $waktu_tutup = WaktuPengajuan::where('id', $pengajuan->waktu_pengajuan_id)->first()->waktu_tutup;
                $tutup = date('Y-m-d H:i:s', strtotime("$tanggal_tutup $waktu_tutup"));
                $tutup_carbon = Carbon::parse($tutup);
                $sekarang = Carbon::now();
                $pengajuan['is_current_pengajuan'] = $sekarang->lt($tutup_carbon);
                $pengajuan['tanggal_buka'] = $tanggal_buka;
                $pengajuan['tanggal_tutup'] = $tanggal_tutup;
                return $pengajuan;
            });
            return view('users/daftar_pengajuan.index', $data);
        } else {
            return redirect()->route('profil.create')->with('alert-warning','Anda belum mengisi profil');
        }

    }


}
