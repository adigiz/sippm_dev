@extends('users.home')

@section('title', 'Daftar Pengajuan')
@section('breadcrumb','Daftar Pengajuan')
@section('content')
    @if(\Illuminate\Support\Facades\Session::has('alert-warning'))
        <div class="alert alert-warning">
            <strong>{{ \Illuminate\Support\Facades\Session::get('alert-warning') }}</strong>
        </div>
    @endif

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-block">
                    <h4 class="card-title">Daftar Pengajuan</h4>
                    <h6 class="card-subtitle">Silahkan klik tombol <b>Download</b> untuk mengunduh file</h6>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Judul</th>
                                <th>Jenis Pengajuan</th>
                                <th>Kelengkapan Data</th>
                                <th>Sebagai</th>
                                <th>Status</th>
                                <th>Periode</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
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
                                        @if($pengajuan->profil_id == $profile->id)
                                            @if(!$anggotas->contains('pengajuan_id',$pengajuan->id))
                                                Belum lengkap
                                            @else
                                                Lengkap
                                            @endif
                                        @else
                                            Lengkap
                                        @endif

                                    </td>
                                    <td>
                                        @if($pengajuan->profil_id == $profile->id)
                                            Ketua
                                        @else
                                            Anggota
                                        @endif
                                    </td>
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
                                    <td>{{date('Y',strtotime($pengajuan->tanggal_buka . "+ 1 day"))}}/{{date('Y',strtotime($pengajuan->tanggal_tutup . "+ 1 year"))}}</td>
                                    <td>
                                        <div class="col-sm-12 text-right">
                                            @if($pengajuan->jenis_pengajuan_id == 1)
                                                <a href="{{ action('PengajuanPenelitianController@show' , $pengajuan['id'])}}" class="btn btn-sm btn btn-info" >Detail Pengajuan</a>
                                                @if($pengajuan->profil_id == $profile->id && $pengajuan->is_current_pengajuan)
                                                    <a href="{{ action('PengajuanPenelitianController@edit', $pengajuan['id'])}}" class="btn btn-sm btn-warning">
                                                        @if(!$anggotas->contains('pengajuan_id',$pengajuan->id))
                                                        Tambah Anggota
                                                        @else
                                                        Edit Pengajuan
                                                        @endif
                                                    </a>
                                                    <form action="{{ route('pengajuan_penelitian.destroy', $pengajuan['id']) }}" method="post">
                                                        {{ csrf_field() }}
                                                        {{ method_field('DELETE') }}
                                                        <button class="btn btn-sm btn-danger" type="submit" onclick="return confirm('Apakah anda yakin ingin menghapus pengajuan?')">Hapus Pengajuan</button>
                                                    </form>
                                                @endif

                                            @else
                                                <a href="{{ action('PengajuanPengabdianController@show', $pengajuan['id'])}}" class="btn btn-sm btn btn-info" >Detail Pengajuan</a>
                                                @if($pengajuan->profil_id == $profile->id && $pengajuan->is_current_pengajuan)
                                                    <a href="{{ action('PengajuanPengabdianController@edit', $pengajuan['id'])}}" class="btn btn-sm btn-warning">
                                                        @if(!$anggotas->contains('pengajuan_id',$pengajuan->id))
                                                            Tambah Anggota
                                                        @else
                                                            Edit Pengajuan
                                                        @endif
                                                    </a>
                                                    <form action="{{ route('pengajuan_pengabdian.destroy', $pengajuan['id']) }}" method="post">
                                                        {{ csrf_field() }}
                                                        {{ method_field('DELETE') }}
                                                        <button class="btn btn-sm btn-danger" type="submit" onclick="return confirm('Apakah anda yakin ingin menghapus pengajuan?')">Hapus Pengajuan</button>
                                                    </form>
                                                @endif
                                            @endif
                                            <a href="{{asset("uploads/file/$pengajuan->proposal")}}" class="btn btn-sm  btn-success" >Download</a>
                                        </div>
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
