<?php

namespace App\Http\Controllers;

use App\Anggota;
use App\JenisPengajuan;
use App\Mitra;
use App\Pengajuan;
use App\WaktuPengajuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Profile;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PengajuanPenelitianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function waktuPenelitian(){
        if( DB::table('waktu_pengajuans')->orderBy('created_at', 'desc')->first() == NULL){
            return redirect()->route('daftar_pengajuan.index')->with('alert-warning','Belum masuk waktu pengajuan');
        }

        $tanggal_buka = WaktuPengajuan::orderBy('created_at', 'desc')->first()->tanggal_buka;
        $waktu_buka = WaktuPengajuan::orderBy('created_at', 'desc')->first()->waktu_buka;
        $tanggal_tutup = WaktuPengajuan::orderBy('created_at', 'desc')->first()->tanggal_tutup;
        $waktu_tutup = WaktuPengajuan::orderBy('created_at', 'desc')->first()->waktu_tutup;


        $buka = date('Y-m-d H:i:s', strtotime("$tanggal_buka $waktu_buka"));
        $tutup = date('Y-m-d H:i:s', strtotime("$tanggal_tutup $waktu_tutup"));
        $buka_carbon = Carbon::parse($buka);
        $tutup_carbon = Carbon::parse($tutup);
        $sekarang = Carbon::now();

        if($sekarang->lt($buka_carbon) || $sekarang->gt($tutup_carbon)){
            return redirect()->route('daftar_pengajuan.index')->with('alert-warning','Belum masuk waktu pengajuan');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        if( DB::table('waktu_pengajuans')->orderBy('created_at', 'desc')->first() == NULL){
            return redirect()->route('daftar_pengajuan.index')->with('alert-warning','Belum masuk waktu pengajuan');
        }

        $tanggal_buka = WaktuPengajuan::orderBy('created_at', 'desc')->first()->tanggal_buka;
        $waktu_buka = WaktuPengajuan::orderBy('created_at', 'desc')->first()->waktu_buka;
        $tanggal_tutup = WaktuPengajuan::orderBy('created_at', 'desc')->first()->tanggal_tutup;
        $waktu_tutup = WaktuPengajuan::orderBy('created_at', 'desc')->first()->waktu_tutup;


        $buka = date('Y-m-d H:i:s', strtotime("$tanggal_buka $waktu_buka"));
        $tutup = date('Y-m-d H:i:s', strtotime("$tanggal_tutup $waktu_tutup"));
        $buka_carbon = Carbon::parse($buka);
        $tutup_carbon = Carbon::parse($tutup);
        $sekarang = Carbon::now();
        if($sekarang->lt($buka_carbon)){
            return redirect()->route('daftar_pengajuan.index')->with('alert-warning','Belum masuk waktu pengajuan');
        }
        elseif ( $sekarang->gt($tutup_carbon)){
            return redirect()->route('daftar_pengajuan.index')->with('alert-warning','Telah lewat masa pengajuan');
        }

        if(Profile::where('user_id',Auth::id())->exists()){
            $var = DB::table('pengajuans')->where('profil_id', Auth::id())->where('jenis_pengajuan_id', 1)->orderBy('created_at', 'desc')->doesntExist();
            if($var){
                $checker = FALSE;
            } else {
                $cek = Pengajuan::where('profil_id',Auth::id())->where('jenis_pengajuan_id',1)->orderBy('created_at','desc')->first()->created_at;
                $cek_periode = Carbon::parse($cek);
                $checker = $cek_periode->lt($buka_carbon);
            }
//

            if(($var == FALSE) && ($checker == FALSE)){
                $bool = TRUE;
            } else {
                $bool = FALSE;
            }
            if($bool == FALSE) {
                $id = Auth::id();
                $data['users'] = User::find($id);
                $data['profile'] = Profile::where('user_id',$id)->first();
                $data['jenis_p'] = JenisPengajuan::where('id', '1')->first();
                $data['waktu'] = WaktuPengajuan::orderBy('created_at','desc')->first();
                //$data = PengajuanPenelitian::with('profils')->get();
                return view('users/pengajuan_penelitian.create', $data);
            } else {
                $id_pengajuan = DB::table('pengajuans')->where('profil_id', Auth::id())->where('jenis_pengajuan_id', 1)->orderBy('created_at', 'desc')->first()->id;
                $check = DB::table('anggotas')->where('pengajuan_id', $id_pengajuan)->exists();
                if($check){
                    return redirect()->route('daftar_pengajuan.index')->with('alert-warning','Anda telah mengajukan publikasi sebagai ketua');
                }
                else {
                    return redirect()->route('anggota_penelitian.create')->with('alert-warning','Tambahkan Anggota');
                }
            }

        }  else {
            return redirect()->route('profil.create')->with('alert-warning','Anda belum mengisi profil');
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
        $data->waktu_pengajuan_id = $request->waktu_pengajuan_id;



        $rules = [
            "proposal" => "required|mimes:pdf|max:2048"
        ];
        $this->validate($request, $rules);


        $jp = $request->judul_penelitian;

        $proposal = $request->file('proposal');
        $ext = $proposal->getClientOriginalExtension();
        $newName = "Proposal_Penelitian_".$jp.".".$ext;
        $proposal->move('uploads/file',$newName);
        $data->proposal = $newName;
        $data->save();

        if($request->nama_mitra != NULL){
            $mitra = new Mitra();
            $mitra->nama_mitra = $request->nama_mitra;
            $mitra->cp_mitra = $request->cp_mitra;
            $mitra->jabatan_mitra = $request->jabatan_mitra;
            $mitra->alamat_mitra = $request->alamat_mitra;
            $mitra->telp_mitra = $request->telp_mitra;
            $pengajuan =  DB::table('pengajuans')->where('profil_id', Auth::id())->where('jenis_pengajuan_id', 1)->orderBy('created_at', 'desc')->first()->id;
            $mitra->pengajuan_id = $pengajuan;
            $mitra->save();
        }

//        return redirect()->route('daftar_pengajuan.index')->with('alert-success','Berhasil Menambahkan Data!');
        return redirect()->route('anggota_penelitian.create')->with('alert-success','Tambahkan Anggota');
    }

    /**Pengajuan::select('id')->where('profil_id',User::find(Auth::id()))->where('jenis_pengajuan_id',1);
     * Display the specified resource.
     *
     * @param  \App\Pengajuan  $pengajuan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['pengajuan'] = Pengajuan::find($id);
        $id_ketua = Pengajuan::find($id)->profil_id;
        $data['ketua'] = Profile::find($id_ketua);
        $id_anggota = Anggota::where('pengajuan_id',$id)->pluck('profil_id');
        $data['profile'] = Profile::whereIn('id', $id_anggota)->get();
        $data['mitra'] = Mitra::where('pengajuan_id',$id)->first();


        return view('users.pengajuan_penelitian.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pengajuan  $pengajuan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['pengajuans'] = Pengajuan::where('id',$id)->first();
        $data['mitras'] = Mitra::where('pengajuan_id',$id)->first();
        return view('users/pengajuan_penelitian.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pengajuan  $pengajuan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Pengajuan::where('id',$id)->first();
        $data->judul_penelitian = $request->judul_penelitian;
        $data->abstrak = $request->abstrak;
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
        $newName = "Proposal_Penelitian_".$jp.".".$ext;
        $proposal->move('uploads/file',$newName);
        $data->proposal = $newName;
        $data->save();

        if($request->nama_mitra != NULL){
            $mitra = Mitra::where('pengajuan_id',$id)->first();
            $mitra->nama_mitra = $request->nama_mitra;
            $mitra->cp_mitra = $request->cp_mitra;
            $mitra->jabatan_mitra = $request->jabatan_mitra;
            $mitra->alamat_mitra = $request->alamat_mitra;
            $mitra->telp_mitra = $request->telp_mitra;
            $mitra->save();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pengajuan  $pengajuan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Pengajuan::where('pengajuan_id',$id)->where('persetujuan_id',1)->exists())
        {
            return redirect()->route('daftar_pengajuan.index')->with('alert-warning','Data tidak dapat dihapus!');
        } else {
            if(Mitra::where('pengajuan_id',$id)->exists())
            {
                $mitra = Mitra::where('pengajuan_id',$id)->first();
                $mitra->delete();
            }

            if(Anggota::where('pengajuan_id', $id)->exists())
            {
                $anggota = Anggota::where('pengajuan_id',$id);
                $anggota->delete();
            }

            $pengajuan = Pengajuan::where('id',$id)->first();
            $pengajuan->delete();
            return redirect()->route('daftar_pengajuan.index')->with('alert-success','Data berhasi dihapus!');
        }

    }
}
