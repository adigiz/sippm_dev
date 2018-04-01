@extends('admin')

@section('title', 'Ditolak')
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
                        @foreach($pengajuan as $pengajuans)
                        <div class="card-block">
                                <form class="form-horizontal form-material" method='post' action="{{route('persetujuan.update', $pengajuans->id)}}">
                                    {{ csrf_field() }}
                                    {{ method_field('PUT') }}
                                    <input name="_method" type="hidden" value="PUT">
                                    <div class="card-block">
                                        <h4 class="card-title">
                                            <small class="text-muted">
                                                @if($pengajuans->jenis_pengajuan_id == 1)
                                                    Penelitian
                                                @else
                                                    Pengabdian Masyarakat
                                                @endif

                                            </small>
                                            <br>
                                            {{$pengajuans->judul_penelitian}}
                                        @if($pengajuans->persetujuan_id == 1)
                                                <span class="label label-success">Disetujui</span>
                                            @elseif($pengajuans->persetujuan_id == 2)
                                                <span class="label label-warning">Direvisi</span>
                                            @elseif($pengajuans->persetujuan_id == 3)
                                                <span class="label label-danger">Ditolak</span>
                                            @else
                                                <span class="label label-primary">Belum diperiksa</span>
                                            @endif
                                        </h4>
                                        <p>{{$pengajuans->abstrak}}</p>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12 text-right">
                                            <button class="btn btn-danger" value="3" name="persetujuan_id" type="submit">Tolak</button>
                                            <button class="btn btn-warning" value="2" name="persetujuan_id" type="submit">Revisi</button>
                                            <button class="btn btn-success" value="1" name="persetujuan_id" type="submit">Setujui</button>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12 text-right">
                                            <a href="{{asset("uploads/file/$pengajuans->proposal")}}" class="btn btn-info" >Download</a>
                                        </div>
                                    </div>
                                </form>
                            <hr>
                        </div>
                        @endforeach
                    </div>

        </div>
    </div>
@endsection