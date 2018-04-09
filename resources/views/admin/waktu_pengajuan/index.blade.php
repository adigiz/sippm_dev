@extends('admin')

@section('title', 'Waktu Pengajuan')
@section('content')
    @if(\Illuminate\Support\Facades\Session::has('alert-success'))
        <div class="alert alert-success">
            <strong>{{ \Illuminate\Support\Facades\Session::get('alert-success') }}</strong>
        </div>
    @endif
    <div class="row">
        <div class="col-12 m-t-30">
            @foreach($data as $waktu)
                <div class="card">
                    <div class="card-block">
                        <h4 class="card-title">Periode Pengajuan ({{$waktu->tanggal_buka}} - {{$waktu->tanggal_tutup}})
                            <br>
                            <small class="text-muted">Waktu buka : {{$waktu->waktu_buka}}</small>
                            <br>
                            <small class="text-muted">Waktu tutup : {{$waktu->waktu_tutup}}</small>
                        </h4>

                        <hr>
                    </div>
                    <form action="{{ route('waktu_pengajuan.destroy', $waktu->id) }}" method="post">
                        <div class="card-block">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <a href="{{ route('waktu_pengajuan.edit',$waktu->id) }}" class=" btn btn-warning">Edit</a>
                            <button class="btn btn-danger" type="submit" onclick="return confirm('Yakin ingin menghapus data?')">Delete</button>
                        </div>
                    </form>
                </div>
            @endforeach
        </div>
    </div>
@endsection