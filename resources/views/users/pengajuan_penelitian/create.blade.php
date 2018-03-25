@extends('users.home')

@section('title', 'Pengajuan Penelitian')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-block">
                    <h4 class="card-title"> Form Pengajuan Proposal Penelitian</h4>
                    <form class="form" action="{{action('PengajuanPenelitianController@store')}}" method="POST" enctype="multipart/form-data">
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
                            <label for="nama-ketua" class="col-2 col-form-label">Nama Ketua</label>
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
                            <label for="jml lab" class="col-2 col-form-label">Jumlah Lab</label>
                            <div class="col-10">
                                <input class="form-control" type="number"  name="jumlah_lab">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="jml-mhs" class="col-2 col-form-label">Jumlah Mahasiswa</label>
                            <div class="col-10">
                                <input class="form-control" type="number"  name="jumlah_mhs">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="no-telp" class="col-2 col-form-label">No Telpon</label>
                            <div class="col-10">
                                <input class="form-control" type="text"  name="no_telp">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="dana-pribadi" class="col-2 col-form-label">Dana Pribadi</label>
                            <div class="col-10">
                                <input class="form-control" type="text"  name="dana_pribadi">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="dana-lain" class="col-2 col-form-label">Dana Lain</label>
                            <div class="col-10">
                                <input class="form-control" type="text"  name="dana_lain">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="upload" class="col-2 col-form-label">Upload Proposal</label>
                            <div class="col-10">
                                <input class="form-control" type="file"  name="proposal">
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