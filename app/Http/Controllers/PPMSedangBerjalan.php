<?php

namespace App\Http\Controllers;

use App\Kelengkapan;
use App\Pengajuan;
use App\PertemuanIlmiah;
use App\Prototype;
use App\Publikasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\WaktuPengajuan;
use Carbon\Carbon;
use App\Profile;
use App\Haki;

class PPMSedangBerjalan extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Profile::where('user_id',Auth::id())->exists()){
            if( DB::table('waktu_pengajuans')->orderBy('created_at', 'desc')->first() == NULL){
                $data['pengajuans'] = NULL;
                return view('users.sedang_berjalan.index',$data)->with('alert-warning','Tidak ada Penelitian yang sedang Berjalan');
            } else {
                $tanggal_tutup = WaktuPengajuan::orderBy('created_at', 'desc')->first()->tanggal_tutup;
                $waktu_tutup = WaktuPengajuan::orderBy('created_at', 'desc')->first()->waktu_tutup;

                $tutup = date('Y-m-d H:i:s', strtotime("$tanggal_tutup $waktu_tutup"));
                $tutup_carbon = Carbon::parse($tutup);
                $sekarang = Carbon::now();
                if($sekarang->gt($tutup_carbon)){
                    $tahun_ini = $sekarang->year;
//                $data['pengajuans'] = Pengajuan::where('profil_id', Auth::id())->where('persetujuan_id',1)->whereYear('created_at',$tahun_ini)->orderBy('updated_at','desc')->get();
                    $id_pengajuan = Pengajuan::where('profil_id', Auth::id())->where('persetujuan_id',1)->whereYear('created_at',$tahun_ini)->orderBy('updated_at','desc')->first()->id;
//                $data['luarans'] = Luaran::whereIn('pengajuan_id', $id_pengajuan)->orderBy('updated_at','desc')->get();
                    $data['pengajuans'] = DB::table('jenis_luarans')
                        ->where('profil_id', Auth::id())->where('persetujuan_id',1)->whereYear('pengajuans.created_at',$tahun_ini)->orderBy('pengajuans.updated_at','desc')
                        ->join('pengajuans', 'pengajuans.id', '=', 'jenis_luarans.pengajuan_id')
                        ->select('pengajuans.id',
                            'pengajuans.jenis_pengajuan_id',
                            'pengajuans.judul_penelitian',
                            'pengajuans.persetujuan_id',
                            'pengajuans.abstrak',
                            'jenis_luarans.jurnal',
                            'jenis_luarans.pertemuan_ilmiah',
                            'jenis_luarans.prototype',
                            'jenis_luarans.haki',
                            'pengajuans.proposal')
                        ->get();
                    $data['publikasis'] = Publikasi::where('pengajuan_id', $id_pengajuan)->get();
                    $data['pertemuans'] = PertemuanIlmiah::where('pengajuan_id', $id_pengajuan)->get();
                    $data['hakis'] = Haki::where('pengajuan_id',$id_pengajuan)->get();
                    $data['prototypes'] = Prototype::where('pengajuan_id',$id_pengajuan)->get();
                    $data['kelengkapan'] = Kelengkapan::where('pengajuan_id', $id_pengajuan)->first();
                    return view('users.sedang_berjalan.index',$data);
                } else {
                    $data['pengajuans'] = NULL;
                    return view('users.sedang_berjalan.index',$data)->with('alert-warning','Tidak ada Penlitian yang sedang Berjalan');
                }
            }

        } else {
            return redirect()->route('profil.create')->with('alert-warning','Anda belum mengisi profil');
        }

    }

    public function indexAdmin()
    {
        $tanggal_tutup = WaktuPengajuan::orderBy('created_at', 'desc')->first()->tanggal_tutup;
        $waktu_tutup = WaktuPengajuan::orderBy('created_at', 'desc')->first()->waktu_tutup;

        $tutup = date('Y-m-d H:i:s', strtotime("$tanggal_tutup $waktu_tutup"));
        $tutup_carbon = Carbon::parse($tutup);
        $sekarang = Carbon::now();
        if($sekarang->gt($tutup_carbon)){
            $tahun_ini = $sekarang->year;
//                $data['pengajuans'] = Pengajuan::where('profil_id', Auth::id())->where('persetujuan_id',1)->whereYear('created_at',$tahun_ini)->orderBy('updated_at','desc')->get();
            $id_profil = Profile::pluck('id');
            $id_pengajuan = Pengajuan::whereIn('profil_id', $id_profil)->where('persetujuan_id',1)->whereYear('created_at',$tahun_ini)->orderBy('updated_at','desc')->pluck('id');

//                $data['luarans'] = Luaran::whereIn('pengajuan_id', $id_pengajuan)->orderBy('updated_at','desc')->get();
            $data['pengajuans'] = DB::table('pengajuans')
                ->whereIn('pengajuans.id', $id_pengajuan)
                ->join('jenis_luarans', 'pengajuans.id', '=', 'jenis_luarans.pengajuan_id')
                ->join('profils', 'profils.id', '=', 'pengajuans.profil_id')
                ->select('pengajuans.id',
                    'pengajuans.jenis_pengajuan_id',
                    'pengajuans.judul_penelitian',
                    'pengajuans.persetujuan_id',
                    'jenis_luarans.jurnal',
                    'jenis_luarans.pertemuan_ilmiah',
                    'jenis_luarans.haki',
                    'jenis_luarans.prototype',
                    'pengajuans.proposal',
                    'pengajuans.total_dana',
                    'profils.name')
                ->get();
            dd($data['pengajuans']);
            $data['publikasis'] = Publikasi::whereIn('pengajuan_id', $id_pengajuan)->get();
            $data['pertemuans'] = PertemuanIlmiah::whereIn('pengajuan_id', $id_pengajuan)->get();
            $data['hakis'] = Haki::whereIn('pengajuan_id',$id_pengajuan)->get();
            $data['prototypes'] = Prototype::whereIn('pengajuan_id',$id_pengajuan)->get();
            $data['kelengkapan'] = Kelengkapan::whereIn('pengajuan_id', $id_pengajuan)->first();
            return view('admin.sedang_berjalan.index',$data);
        } else {
            $data['pengajuans'] = NULL;
            return view('admin.sedang_berjalan.index',$data)->with('alert-warning','Tidak ada Penlitian yang sedang Berjalan');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
