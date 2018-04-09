<?php

namespace App\Http\Controllers;

use App\Pengajuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\WaktuPengajuan;
use Carbon\Carbon;

class PPMSedangBerjalan extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if( DB::table('waktu_pengajuans')->orderBy('created_at', 'desc')->first() == NULL){
            $data['pengajuans'] = NULL;
            return view('users.sedang_berjalan.index',$data)->with('alert-warning','Tidak ada Penlitian yang sedang Berjalan');
        } else {
            $tanggal_tutup = WaktuPengajuan::orderBy('created_at', 'desc')->first()->tanggal_tutup;
            $waktu_tutup = WaktuPengajuan::orderBy('created_at', 'desc')->first()->waktu_tutup;

            $tutup = date('Y-m-d H:i:s', strtotime("$tanggal_tutup $waktu_tutup"));
            $tutup_carbon = Carbon::parse($tutup);
            $sekarang = Carbon::now();
            if($sekarang->gt($tutup_carbon)){
                $tahun_ini = $sekarang->year;
                $data['pengajuans'] = Pengajuan::where('persetujuan_id',1)->whereYear('created_at',$tahun_ini)->orderBy('updated_at','desc')->get();
                return view('users.sedang_berjalan.index',$data);
            } else {
                return view('users.sedang_berjalan.index')->with('alert-warning','Tidak ada Penlitian yang sedang Berjalan');
            }
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
