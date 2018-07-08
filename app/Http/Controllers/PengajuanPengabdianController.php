<?php

namespace App\Http\Controllers;

use App\Kelengkapan;
use App\Pengajuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\JenisPengajuan;
use Illuminate\Support\Facades\DB;
use App\Mitra;
use App\Profile;
use App\WaktuPengajuan;
use Carbon\Carbon;
use App\Anggota;
use Illuminate\Support\Facades\Validator;

class PengajuanPengabdianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

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
            $id_profil = Profile::where('user_id', Auth::id())->first()->id;
            $var = DB::table('pengajuans')->where('profil_id', $id_profil)->where('jenis_pengajuan_id', 2)->doesntExist();
            if($var){
                $checker = FALSE;
            } else {
                $cek = Pengajuan::where('profil_id',$id_profil)->where('jenis_pengajuan_id',2)->orderBy('created_at','desc')->first()->created_at;
                $cek_periode = Carbon::parse($cek);
                $checker = $cek_periode->lt($buka_carbon);
            }
            if(($var == FALSE) && ($checker == FALSE)){
                $bool = TRUE;
            } else {
                $bool = FALSE;
            }
            if($bool == FALSE) {
                $id = Auth::id();
                $data['users'] = User::find($id);
                $data['profile'] = Profile::where('user_id',$id)->first();
                $data['jenis_p'] = JenisPengajuan::where('id', '2')->first();
                $data['waktu'] = WaktuPengajuan::orderBy('created_at','desc')->first();
                //$data = PengajuanPenelitian::with('profils')->get();
                return view('users/pengajuan_pengabdian.create', $data);
            } else {
                $id_pengajuan = DB::table('pengajuans')->where('profil_id', $id_profil)->where('jenis_pengajuan_id', 2)->orderBy('created_at', 'desc')->first()->id;
                $check = DB::table('anggotas')->where('pengajuan_id', $id_pengajuan)->exists();
                if($check){
                    return redirect()->route('daftar_pengajuan.index')->with('alert-warning','Anda telah mengajukan pengabdian sebagai ketua');
                }
                else {
                    return redirect()->route('anggota_pengabdian.create')->with('alert-warning','Tambahkan Anggota');
                }
            }
        } else {
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
//        $id_periode = WaktuPengajuan::orderBy('created_at','desc')->first()->id;
//        if(Pengajuan::where('waktu_pengajuan_id',$id_periode)->exists()){
//
//        }
        $data = new Pengajuan();


        $input = $request->all();
        $validator = Validator::make($input,
            [
                'judul_penelitian' => 'required',
                'abstrak' => 'required',
                'jumlah_lab' => 'required|between:1,5',
                'jumlah_anggota' => 'required|between:1,5',
                'jumlah_mhs' => 'required|between:1,5',
                'total_dana' => 'required|numeric',
                'proposal' => 'required|mimes:pdf|max:2048'
            ]
        );
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

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

        $jp = $request->judul_penelitian;

        $proposal = $request->file('proposal');
        $ext = $proposal->getClientOriginalExtension();
        $newName = "Proposal_Pengabdian_".$jp.".".$ext;
        $proposal->move('uploads/file',$newName);
        $data->proposal = $newName;
        $data->save();

        $id = $data->id;
        $mitra = new Mitra();
        $mitra->nama_mitra = $request->nama_mitra;
        $mitra->cp_mitra = $request->cp_mitra;
        $mitra->jabatan_mitra = $request->jabatan_mitra;
        $mitra->alamat_mitra = $request->alamat_mitra;
        $mitra->telp_mitra = $request->telp_mitra;
        $mitra->pengajuan_id = $id;
        $mitra->save();
//        return redirect()->route('daftar_pengajuan.index')->with('alert-success','Berhasil Menambahkan Data!');
        return redirect()->route('anggota_pengabdian.create')->with('alert-success','Tambahkan Anggota');
    }


    /**
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

        return view('users.pengajuan_pengabdian.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pengajuan  $pengajuan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $current_user = Profile::where('user_id',Auth::id())->first()->id;
        $id_pengajuan = Pengajuan::where('profil_id', $current_user)->pluck('id')->toArray();
        if(in_array($id,$id_pengajuan)){
            $data['pengajuans'] = Pengajuan::where('id',$id)->first();
            $data['mitras'] = Mitra::where('pengajuan_id',$id)->first();
            return view('users/pengajuan_pengabdian.edit',$data);
        } else {
            return redirect()->to('users/daftar_pengajuan');
        }

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

        $input = $request->all();
        $validator = Validator::make($input,
            [
                'judul_penelitian' => 'required',
                'abstrak' => 'required',
                'jumlah_lab' => 'required|between:1,5',
                'jumlah_mhs' => 'required|between:1,5',
                'total_dana' => 'required|numeric',
                'proposal' => 'required|mimes:pdf|max:2048'
            ]
        );
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }
        $data->judul_penelitian = $request->judul_penelitian;
        $data->abstrak = $request->abstrak;
        $data->jumlah_lab = $request->jumlah_lab;
        $data->jumlah_mhs = $request->jumlah_mhs;
        $data->no_telp = $request->no_telp;
        $data->total_dana = $request->total_dana;
        $data->dana_pribadi = $request->dana_pribadi;
        $data->dana_lain = $request->dana_lain;

        $jp = $request->judul_penelitian;

        $proposal = $request->file('proposal');
        $ext = $proposal->getClientOriginalExtension();
        $newName = "Proposal_Pengabdian_".$jp.".".$ext;
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
        if(Pengajuan::where('id',$id)->where('persetujuan_id',1)->exists())
        {
            return redirect()->route('daftar_pengajuan.index')->with('alert-warning','Data tidak dapat dihapus!');
        } else {
            if(Mitra::where('pengajuan_id',$id)->exists())
            {
                $mitra = Mitra::where('pengajuan_id',$id)->first();
                $mitra->delete();
            }
            if(Kelengkapan::where('pengajuan_id',$id)->exists()){
                $jenis = Kelengkapan::where('pengajuan_id',$id)->first();
                $jenis->delete();
        }
            if(Prototype::where('pengajuan_id',$id)->exists())
            {
                $proto = Prototype::where('pengajuan_id',$id)->first();
                $proto->delete();
            }
            if(Publikasi::where('pengajuan_id',$id)->exists())
            {
                $publikasi = Publikasi::where('pengajuan_id',$id)->first();
                $publikasi->delete();
            }
            if(PertemuanIlmiah::where('pengajuan_id',$id)->exists())
            {
                $pertemuan = PertemuanIlmiah::where('pengajuan_id',$id)->first();
                $pertemuan->delete();
            }
            if(Haki::where('pengajuan_id',$id)->exists())
            {
                $haki = Haki::where('pengajuan_id',$id)->first();
                $haki->delete();
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
