<?php

namespace App\Http\Controllers;

use App\File;
use App\Kelengkapan;
use App\Pengajuan;
use Illuminate\Http\Request;

class KelengkapanController extends Controller
{
    public function create()
    {

    }

    public function store(Request $request)
    {
        $data = new Kelengkapan();
        $data->pengajuan_id = $request->pengajuan_id;
        $jp = Pengajuan::where('id',$request->pengajuan_id)->first()->judul_penelitian;
        if($request->laporan2 != NULL){
            $laporan2 = $request->file('laporan2');
            $ext = $laporan2->getClientOriginalExtension();
            $newName = "KH_Laporan_70%_".$jp.".".$ext;
            $laporan2->move('uploads/file',$newName);
            $data->laporan2 = $newName;
        }
        $data->save();
        return redirect()->route('sedang_berjalan.index')->with('alert-success','Berhasil Menambahkan Data!');
    }


    public function update(Request $request, $id){
        $data = Kelengkapan::where('pengajuan_id',$id)->first();
        $jp = Pengajuan::where('id',$data->pengajuan_id)->first()->judul_penelitian;
        if($request->laporan != NULL){
            $laporan = $request->file('laporan');
            $ext = $laporan->getClientOriginalExtension();
            $newName = "KH_Laporan_100%_".$jp.".".$ext;
            $laporan->move('uploads/file',$newName);
            $data->laporan = $newName;
        }
        if($request->logbook != NULL){
            $logbook = $request->file('logbook');
            $ext = $logbook->getClientOriginalExtension();
            $newName = "KH_Logbook_".$jp.".".$ext;
            $logbook->move('uploads/file',$newName);
            $data->logbook = $newName;
        }
        if($request->presentasi != NULL){
            $presentasi = $request->file('presentasi');
            $ext = $presentasi->getClientOriginalExtension();
            $newName = "KH_Presentasi_".$jp.".".$ext;
            $presentasi->move('uploads/file',$newName);
            $data->presentasi = $newName;
        }
        if($request->output != NULL){
            $output = $request->file('output');
            $ext = $output->getClientOriginalExtension();
            $newName = "KH_Output_".$jp.".".$ext;
            $output->move('uploads/file',$newName);
            $data->output = $newName;
        }
        if($request->spj != NULL){
            $spj = $request->file('spj');
            $ext = $spj->getClientOriginalExtension();
            $newName = "KH_SPJ_".$jp.".".$ext;
            $spj->move('uploads/file',$newName);
            $data->spj = $newName;
        }

        $data->save();
        return redirect()->route('sedang_berjalan.index')->with('alert-success','Data berhasil diubah!');
    }
}
