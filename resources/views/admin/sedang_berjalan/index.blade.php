@extends('admin')

@section('title', 'Semua yang Sedang Berjalan')
@section('styles')
<link rel="stylesheet" type="text/css" href="{{asset('css/datatables.min.css')}}">
@endsection
@section('breadcrumb','Sedang Berjalan')
@section('content')
@if(\Illuminate\Support\Facades\Session::has('alert-success'))
<div class="alert alert-success">
    <strong>{{ \Illuminate\Support\Facades\Session::get('alert-success') }}</strong>
    <span class="closebtn float-right" onclick="this.parentElement.style.display='none';">&times;</span>
</div>

@elseif(\Illuminate\Support\Facades\Session::has('alert-warning'))
<div class="alert alert-warning">
    <strong>{{ \Illuminate\Support\Facades\Session::get('alert-warning') }}</strong>
    <span class="closebtn float-right" onclick="this.parentElement.style.display='none';">&times;</span>
</div>

@elseif(\Illuminate\Support\Facades\Session::has('alert-danger'))
<div class="alert alert-danger">
    <strong>{{ \Illuminate\Support\Facades\Session::get('alert-danger') }}</strong>
    <span class="closebtn float-right" onclick="this.parentElement.style.display='none';">&times;</span>
</div>
@endif

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-block">
                <h4 class="card-title">Daftar Semua Penelitian/Pengabdian yang Sedang Berjalan</h4>
                <h6 class="card-subtitle">Silahkan klik tombol <b>Luaran</b> untuk mengunduh file</h6>
                <div class="table-responsive">
                    <table class="table table-bordered" id="datatable">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Jenis Pengajuan</th>
                            <th>Total Dana</th>
                            <th>Nama Ketua</th>
                            <th>Luaran</th>
                            <th>Kelengkapan</th>

                        </tr>
                        </thead>

                        <tbody>
                        @php $no = 1; @endphp
                        @foreach($pengajuans as $pengajuan)

                        <tr>
                            <td class="text-center">{{$no++}}</td>
                            <td>{{$pengajuan->judul_penelitian}}</td>
                            <td>
                                @if($pengajuan->jenis_pengajuan_id == 1)
                                <span class="label label-info">Penelitian</span>
                                @else
                                <span class="label label-info">Pengabdian Masyarakat</span>
                                @endif
                            </td>
                            <td>
                                {{$pengajuan->total_dana}}
                            </td>
                            <td>{{$pengajuan->profils->name}}</td>
                            <td>
                                @if($pengajuan->publikasis != NULL)
                                    @foreach($pengajuan->publikasis as $publikasi)
                                        <a href="{{asset("uploads/file/$publikasi->bukti")}}" class="btn btn-sm btn-success">Publikasi</a>
                                    @endforeach
                                @endif
                                @if($pengajuan->pertemuans != NULL)
                                        @foreach($pengajuan->pertemuans as $pertemuan)
                                            <a href="#" class="btn btn-sm btn-success">Pertemuan</a>
                                        @endforeach
                                    @endif
                                @if($pengajuan->hakis != NULL)
                                        @foreach($pengajuan->hakis as $haki)
                                            <a href="#" class="btn btn-sm btn-success">Haki</a>
                                        @endforeach
                                    @endif
                                @if($pengajuan->prototypes != NULL)
                                        @foreach($pengajuan->prototypes as $prototype)
                                            <a href="#" class="btn btn-sm btn-success">Prototype</a>
                                        @endforeach
                                    @endif
                            </td>
                            <td>
                                @if($pengajuan->kelengkapans->laporan2 != NULL)
                                    <a href="{{asset("uploads/file/")."/".$pengajuan->kelengkapans['laporan2']}}" class="btn btn-sm btn-info" >Laporan 70%</a>
                                @else
                                    Belum Lengkap
                                @endif
                                @if($pengajuan->kelengkapans->laporan != NULL)
                                     <a href="{{asset("uploads/file/")."/".$pengajuan->kelengkapans['laporan']}}" class="btn btn-sm btn-info" >Laporan Final</a>
                                     <a href="{{asset("uploads/file/")."/".$pengajuan->kelengkapans['logbook']}}" class="btn btn-sm btn-info" >Logbook</a>
                                     <a href="{{asset("uploads/file/")."/".$pengajuan->kelengkapans['presentasi']}}" class="btn btn-sm btn-info" >Presentasi</a>
                                     <a href="{{asset("uploads/file/")."/".$pengajuan->kelengkapans['output']}}" class="btn btn-sm btn-info" >Output</a>
                                     <a href="{{asset("uploads/file/")."/".$pengajuan->kelengkapans['spj']}}" class="btn btn-sm btn-info" >SPJ</a>
                                 @endif



                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('javascripts')
<script type="text/javascript" charset="utf8" src="{{asset('js/datatables.min.js')}}"></script>
<script>
    $(document).ready( function () {
        $('#datatable').DataTable();
    });
</script>
@endsection