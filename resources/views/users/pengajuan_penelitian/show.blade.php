@extends('users.home')

@section('title', 'Detail Pengajuan')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-block">
                    <h4>Pengajuan Penelitian <span class="pull-right">Dibuat pada tanggal: {{$pengajuan->created_at->format('d M Y')}}</span></h4>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="pull-left">
                                <address>
                                    <h4> <b>{{$pengajuan->judul_penelitian}}</b></h4>
                                    <h4 class="text-muted">Nama ketua: {{$ketua->name}}</h4>
                                </address>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <h4 class="card-title">Data Pengabdian yang Diajukan</h4>
                            <strong>Judul Pengabdian</strong>
                            <br>
                            <p class="text-muted">{{$pengajuan->judul_penelitian}}</p>
                            <strong>Total Dana yang Dibutuhkan</strong>
                            <br>
                            <p class="text-muted">Rp {{$pengajuan->total_dana}}</p>
                            <strong>Jumlah Mahasiswa</strong>
                            <br>
                            <p class="text-muted">{{$pengajuan->jumlah_mhs}}</p>
                            <strong>Jumlah Lab</strong>
                            <br>
                            <p class="text-muted">{{$mitra->nama_mitra}}</p>
                            <strong>No Telp</strong>
                            <br>
                            <p class="text-muted">{{$mitra->telp_mitra}}</p>
                        </div>
                        <div class="col-md-6">
                            <h4 class="card-title">Data Anggota</h4>
                            <div class="table-responsive m-t-40" style="clear: both;">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th>Nama Anggota</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php $no = 1; @endphp
                                    @foreach($profile as $anggota)
                                        <tr>
                                            <td width="10%" class="text-center">{{$no++}}</td>
                                            <td width="90%">{{$anggota->name}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection