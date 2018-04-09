@extends('users.home')

@section('title', 'Daftar Pengajuan')
@section('content')
    @if(\Illuminate\Support\Facades\Session::has('alert-warning'))
        <div class="alert alert-warning">
            <strong>{{ \Illuminate\Support\Facades\Session::get('alert-warning') }}</strong>
        </div>
    @endif
    <div class="row">
        <div class="col-12">
            @foreach($pengajuans as $pengajuan)
            <div class="card">
                <div class="card-block">
                    @if($pengajuan->jenis_pengajuan_id == 1)
                        <span class="label label-info">Penelitian</span>
                    @else
                        <span class="label label-info">Pengabdian Masyarakat</span>
                    @endif

                    <h4 class="card-title">{{$pengajuan->judul_penelitian}}</h4>
                    <h5 class="card-subtitle">Kelengkapan data:
                            @if(!$anggotas->contains('pengajuan_id',$pengajuan->id))
                                Belum lengkap
                            @else
                                Lengkap
                            @endif
                    </h5>
                    <p>{{$pengajuan->abstrak}}</p>
                        <div class="form-group">
                            <div class="col-sm-12 text-right">
                                @if($pengajuan->jenis_pengajuan_id == 1)
                                    <a href="{{url('users/pengajuan_penelitian/' . $pengajuan->id)}}" class="btn btn-success" >Detail Pengajuan</a>
                                @else
                                    <a href="{{ action('PengajuanPengabdianController@index',$pengajuan['id'])}}" class="btn btn-success" >Detail Pengajuan</a>
                                @endif
                            </div>
                            <div class="col-sm-12 text-right">
                                <a href="{{asset("uploads/file/$pengajuan->proposal")}}" class="btn btn-success" >Download</a>
                            </div>
                        </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

@endsection