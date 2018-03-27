<?php

namespace App\Http\Controllers;

use App\Pengajuan;
use App\Persetujuan;
use Illuminate\Http\Request;

class PersetujuanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['pengajuan'] = Pengajuan::all();
        return view('admin.pengajuan.daftar_pengajuan.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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
     * @param  \App\Persetujuan  $persetujuan
     * @return \Illuminate\Http\Response
     */
    public function show(Persetujuan $persetujuan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Persetujuan  $persetujuan
     * @return \Illuminate\Http\Response
     */
    public function edit(Persetujuan $persetujuan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Persetujuan  $persetujuan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Pengajuan::where('id',$id)->first();
        $data->persetujuan_id = $request->persetujuan_id;
        $data->save();
        $id_persetujuan = $request->persetujuan_id;
        if($id_persetujuan == '1'){
            return redirect()->route('persetujuan.index')->with('alert-success','Pengajuan disetujui');
        } elseif ($id_persetujuan == '2'){
            return redirect()->route('persetujuan.index')->with('alert-warning','Pengajuan direvisi');
        } else {
            return redirect()->route('persetujuan.index')->with('alert-danger','Pengajuan ditolak');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Persetujuan  $persetujuan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Persetujuan $persetujuan)
    {
        //
    }
}
