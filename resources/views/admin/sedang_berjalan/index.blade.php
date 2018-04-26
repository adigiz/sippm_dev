@extends('admin')

@section('title', 'Semua yang Sedang Berjalan')
@section('styles')
<link rel="stylesheet" type="text/css" href="{{asset('css/datatables.min.css')}}">
@endsection
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
    <div class="col-12 m-t-30">
        <div class="card">
            <div class="card-block">
                <h4 class="card-title">Daftar Semua yang Sedang Berjalan</h4>
                <h6 class="card-subtitle">Silahkan klik tombol <b>Download</b> untuk mengunduh file</h6>
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
                            <td>{{$pengajuan->name}}</td>
                            <td>
                                @foreach($publikasis as $publikasi)
                                    <a href="#" class="btn btn-sm btn-success">Publikasi</a>
                                @endforeach
                                @foreach($pertemuans as $pertemuan)
                                    <a href="#" class="btn btn-sm btn-success">Pertemuan</a>
                                @endforeach
                            </td>
                            <td>
                                @if($kelengkapan != NULL)
                                    <a href="{{asset("uploads/file/")."/".$kelengkapan['laporan']}}" class="btn btn-sm btn-info" >Laporan</a>
                                    <a href="{{asset("uploads/file/")."/".$kelengkapan['logbook']}}" class="btn btn-sm btn-info" >Logbook</a>
                                    <a href="{{asset("uploads/file/")."/".$kelengkapan['presentasi']}}" class="btn btn-sm btn-info" >Presentasi</a>
                                    <a href="{{asset("uploads/file/")."/".$kelengkapan['output']}}" class="btn btn-sm btn-info" >Output</a>
                                    <a href="{{asset("uploads/file/")."/".$kelengkapan['spj']}}" class="btn btn-sm btn-info" >SPJ</a>
                                @else
                                    Belum Lengkap
                                @endif

                                {{--<a href="{{asset("uploads/file/$kelengkapan->logbook")}}" class="btn btn-sm btn-info" >Logbook</a>--}}

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