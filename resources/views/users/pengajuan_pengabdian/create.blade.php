@extends('users.home')

@section('title', 'Pengajuan Pengabdian Masyarakat')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-block">
                    <h4 class="card-title"> Form Pengajuan Proposal Pengabdiann</h4>
                    <form class="form" action="{{action('PengajuanPengabdianController@store')}}" method="POST">
                        {{csrf_field()}}
                        <div class="form-group m-t-40 row">
                            <label for="judul-penelitian" class="col-2 col-form-label">Judul Penelitian</label>
                            <div class="col-10">
                                <input class="form-control" type="text" name="judul_penelitian">
                            </div>
                        </div>
                        <div class="form-group m-t-40 row">
                            <label for="jenis-pengajuan" class="col-2 col-form-label">Jenis Pengajuan</label>
                            <div class="col-10">
                                <input disabled  class="form-control" type="text" placeholder="{{$jenis_p->nama_jenis}}">
                                <input  class="form-control" type="hidden" name="jenis_pengajuan_id" value="{{$jenis_p->id}}">
                            </div>
                        </div>
                        <div class="form-group m-t-40 row">
                            <label for="judul-penelitian" class="col-2 col-form-label">Nama Ketua</label>
                            <div class="col-10">
                                <input disabled  class="form-control" type="text" placeholder="{{$users->name}}">
                                <input  class="form-control" type="hidden" name="profil_id" value="{{$users->id}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nama-ketua" class="col-2 col-form-label">Abstrak</label>
                            <div class="col-10">
                                <textarea class="form-control" name="abstrak" rows="8"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="niph" class="col-2 col-form-label">Jumlah Anggota</label>
                            <div class="col-10">
                                <input class="form-control" type="number"  name="jumlah_anggota">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="pangkat" class="col-2 col-form-label">Jumlah Lab</label>
                            <div class="col-10">
                                <input class="form-control" type="number"  name="jumlah_lab">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="jabatan" class="col-2 col-form-label">Jumlah Mahasiswa</label>
                            <div class="col-10">
                                <input class="form-control" type="number"  name="jumlah_mhs">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="jabatan" class="col-2 col-form-label">No Telpon</label>
                            <div class="col-10">
                                <input class="form-control" type="text"  name="no_telp">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="jabatan" class="col-2 col-form-label">Dana Pribadi</label>
                            <div class="col-10">
                                <input class="form-control" type="text"  name="dana_pribadi">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="jabatan" class="col-2 col-form-label">Dana Lain</label>
                            <div class="col-10">
                                <input class="form-control" type="text"  name="dana_lain">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12 text-right">
                                <button class="btn btn-success" type="submit">Ajukan</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection