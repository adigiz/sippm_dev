<?php

namespace App\Http\Controllers;

use App\Anggota;
use App\JenisPengajuan;
use App\Mitra;
use App\Pengajuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Profile;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Helper\Table;

class PengajuanPenelitianController extends Controller
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
        $data['pengajuan'] = Pengajuan::where('profil_id',$profilsId)->orderBy('created_at','desc')->first();
        $id_pengajuan = Pengajuan::where('profil_id',$profilsId)->orderBy('created_at','desc')->first()->id;
        $data['anggotas'] = Anggota::where('pengajuan_id',$id_pengajuan);
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
        $var = DB::table('pengajuans')->where('profil_id', Auth::id())->where('jenis_pengajuan_id', 1)->doesntExist();
        if($var) {
            $id = Auth::id();
            $data['users'] = User::find($id);
            $data['jenis_p'] = JenisPengajuan::where('id', '1')->first();
            //$data = PengajuanPenelitian::with('profils')->get();
            return view('users/pengajuan_penelitian.create', $data);
        } else {
            $id_pengajuan = DB::table('pengajuans')->where('profil_id', Auth::id())->where('jenis_pengajuan_id', 1)->orderBy('created_at', 'desc')->first()->id;
            $check = DB::table('anggotas')->where('pengajuan_id', $id_pengajuan)->exists();
            if($check){
                return redirect()->route('daftar_pengajuan.index')->with('alert-warning','Anda telah mengajukan penelitian sebagai ketua');
            }
            else {
                return redirect()->route('anggota_penelitian.create')->with('alert-warning','Tambahkan Anggota');
            }
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
        $newName = "Proposal_Penelitian_".$jp.".".$ext;
        $proposal->move('uploads/file',$newName);
        $data->proposal = $newName;
        $data->save();

        $mitra = new Mitra();
        $mitra->nama_mitra = $request->nama_mitra;
        $mitra->cp_mitra = $request->cp_mitra;
        $mitra->jabatan_mitra = $request->jabatan_mitra;
        $mitra->alamat_mitra = $request->alamat_mitra;
        $mitra->telp_mitra = $request->telp_mitra;
        $pengajuan =  DB::table('pengajuans')->where('profil_id', Auth::id())->where('jenis_pengajuan_id', 1)->orderBy('created_at', 'desc')->first()->id;
        $mitra->pengajuan_id = $pengajuan;
        $mitra->save();
//        return redirect()->route('daftar_pengajuan.index')->with('alert-success','Berhasil Menambahkan Data!');
        return redirect()->route('anggota_penelitian.create')->with('alert-success','Tambahkan Anggota');
    }

    /**Pengajuan::select('id')->where('profil_id',User::find(Auth::id()))->where('jenis_pengajuan_id',1);
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
