@extends('users.home')

@section('title', 'Riwayat Penelitian')
@section('content')
    @if(\Illuminate\Support\Facades\Session::has('alert-warning'))
        <div class="alert alert-warning">
            <strong>{{ \Illuminate\Support\Facades\Session::get('alert-warning') }}</strong>
        </div>
    @endif
    @if(\Illuminate\Support\Facades\Session::has('alert-success'))
        <div class="alert alert-success">
            <strong>{{ \Illuminate\Support\Facades\Session::get('alert-success') }}</strong>
        </div>
    @endif

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-block">
                    <h4 class="card-title">Daftar Riwayat</h4>
                    <h6 class="card-subtitle">Silahkan klik tombol <b>Download</b> untuk mengunduh file</h6>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>
                                    Judul
                                </th>
                                <th>Jenis Riwayat</th>
                                <th>Tahun</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            @php $no = 1; @endphp
                            @foreach($publikasis as $publikasi)
                                <tr>
                                    <td class="text-center">{{$no++}}</td>
                                    <td>
                                        <b>
                                            <a href="{{$publikasi->url}}">{{$publikasi->judul_penelitian}}</a>
                                        </b>
                                        <br>
                                        <small>{{$publikasi->nama_jurnal}}
                                            | vol: {{$publikasi->volume}}
                                            | no: {{$publikasi->no_jurnal}}
                                            | halaman: {{$publikasi->halaman}}</small>
                                    </td>
                                    <td>
                                        Publikasi Ilmiah
                                    </td>
                                    <td>
                                        {{$publikasi->tahun}}
                                    </td>
                                    <td>
                                        <a href="{{asset("uploads/file/$publikasi->bukti")}}" class="btn btn-sm  btn-success" >Download</a>
                                    </td>
                                </tr>
                            @endforeach
                            @foreach($pertemuans as $pertemuan)
                                <tr>
                                    <td class="text-center">{{$no++}}</td>
                                    <td>
                                        <b> {{$pertemuan->judul_penelitian}}</b>
                                        <br>
                                        <small>{{$pertemuan->nama_kegiatan}}
                                            | {{$pertemuan->penyelenggara}}
                                            | {{$pertemuan->tempat_pelaksanaan}}
                                            | tgl: {{$pertemuan->tgl_pelaksanaan}}
                                        </small>
                                    </td>
                                    <td>
                                        Pertemuan Ilmiah
                                    </td>
                                    <td>
                                        {{date('Y',strtotime($pertemuan->tgl_pelaksanaan))}}
                                    </td>
                                    <td>
                                        <a href="#" class="btn btn-sm  btn-success" >Lihat Detail</a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection