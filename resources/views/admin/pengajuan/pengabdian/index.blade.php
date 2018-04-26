@extends('admin')

@section('title', 'Daftar Pengajuan Pengabdian Masyarakat')
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
                    <h4 class="card-title">Daftar Pengajuan Pengabdian</h4>
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
                                <th>Status</th>
                                <th>Tanggal Diajukan</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>

                            <tbody>
                            @php $no = 1; @endphp
                            @foreach($pengajuans as $pengajuan)

                                <tr>
                                    <td class="text-center">{{$no++}}</td>
                                    <td>{{$pengajuan->judul_penelitian}}</td>
                                    <td>
                                        @if($pengajuan->jenis_pengajuan_id == 2)
                                            <span class="label label-info">Pengabdian Masyarakat</span>
                                        @endif
                                    </td>
                                    <td>
                                        {{$pengajuan->total_dana}}
                                    </td>
                                    <td>{{$pengajuan->name}}</td>
                                    <td>
                                        @if($pengajuan->persetujuan_id == 1)
                                            <span class="label label-success">Disetujui</span>
                                        @elseif($pengajuan->persetujuan_id == 2)
                                            <span class="label label-warning">Direvisi</span>
                                        @elseif($pengajuan->persetujuan_id == 3)
                                            <span class="label label-danger">Ditolak</span>
                                        @else
                                            <span class="label label-primary">Belum diperiksa</span>
                                        @endif
                                    </td>
                                    <td>{{date('d-m-Y',strtotime($pengajuan->created_at))}}</td>
                                    <td>
                                        <form class="form-horizontal form-material" method='post' action="{{route('persetujuan.update', $pengajuan->id)}}">
                                            {{ csrf_field() }}
                                            {{ method_field('PUT') }}
                                            <input name="_method" type="hidden" value="PUT">
                                            <div class="col-sm-12">
                                                <button class="btn btn-sm btn-danger" value="3" name="persetujuan_id" type="submit">Tolak</button>
                                                <button class="btn btn-sm btn-warning" value="2" name="persetujuan_id" type="submit">Revisi</button>
                                                <button class="btn btn-sm btn-success" value="1" name="persetujuan_id" type="submit">Setujui</button>
                                                <a href="{{asset("uploads/file/$pengajuan->proposal")}}" class="btn btn-sm btn-info" >Download</a>
                                            </div>
                                        </form>
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