@extends('users.home')

@section('title', 'Penambahan Anggota Penelitian')
@section('content')
    <div class="row">
        <div class="col-lg-6 col-xlg-6 col-md-6">
            <div class="card">
                <div class="card-block">
                    <h4 class="card-title">Data Penelitian yang Diajukan</h4>
                    <strong>Judul Penelitian</strong>
                    <br>
                    <p class="text-muted">{{$pengajuan->judul_penelitian}}</p>
                    <strong>Nama Ketua</strong>
                    <br>
                    <p class="text-muted">{{$ketua->name}}</p>
                    <strong>Total Dana yang Dibutuhkan</strong>
                    <br>
                    <p class="text-muted">{{$pengajuan->total_dana}}</p>
                    <strong>Jumlah Lab</strong>
                    <br>
                    <p class="text-muted">{{$pengajuan->jumlah_lab}}</p>
                    <strong>Jumlah Mahasiswa</strong>
                    <br>
                    <p class="text-muted">{{$pengajuan->jumlah_mhs}}</p>
                    <strong>No Telp</strong>
                    <br>
                    <p class="text-muted">{{$pengajuan->no_telp}}</p>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-xlg-6 col-md-6">
            <div class="card">
                <div class="card-block">
                    <h4 class="card-title">Form Anggota</h4>
                    <h6 class="card-subtitle"> Tambahkan Anggota pada Pengajuan ini</h6>
                    <form class="form-inline" action="{{action('AnggotaPenelitianController@store')}}" method="POST">
                        {{csrf_field()}}
                        <div class="form-group row" style="width: 100%; margin-bottom: 15px;">
                            <input  class="form-control" type="hidden" name="pengajuan_id" value="{{$pengajuan->id}}">
                            @for ($i = $pengajuan->jumlah_anggota; $i >= 1; $i--)
                                <div class="input-group col-12" style="margin-bottom: 15px;">
                                    <select name="profil_id[]" class="select2" style="width: 100%">
                                        <option value="">Pilih Anggota</option>
                                        @foreach($profile as $profiles)
                                            <option value="{{ $profiles->id}}">{{ $profiles->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            @endfor

                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12 clearfix">
                                <button class="btn btn-success float-right" type="submit">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection