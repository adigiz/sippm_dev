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
                                <input required class="form-control" type="text" name="judul_penelitian" placeholder="e.g. Prototype Robot Pemadam Api Berbasis Mikrokontroller Arduino UNO">
                            </div>
                        </div>
                        <div class="form-group m-t-40 row">
                            <label for="jenis-pengajuan" class="col-2 col-form-label">Jenis Pengajuan</label>
                            <div class="col-10">
                                <input disabled  class="form-control" type="text" placeholder="{{$jenis_p->nama_jenis}}">
                                <input  required class="form-control" type="hidden" name="jenis_pengajuan_id" value="{{$jenis_p->id}}">
                            </div>
                        </div>
                        <div class="form-group m-t-40 row">
                            <label for="nama-ketua" class="col-2 col-form-label">Nama Ketua</label>
                            <div class="col-10">
                                <input disabled  class="form-control" type="text" placeholder="{{$profile->name}}">
                                <input  required class="form-control" type="hidden" name="profil_id" value="{{$profile->id}}">
                            </div>
                        </div>
                        <input required class="form-control" type="hidden" name="waktu_pengajuan_id" value="{{$waktu->id}}">
                        <div class="form-group row">
                            <label for="nama-ketua" class="col-2 col-form-label">Abstrak</label>
                            <div class="col-10">
                                <textarea required class="form-control" name="abstrak" rows="8"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="niph" class="col-2 col-form-label">Jumlah Anggota</label>
                            <div class="col-10">
                                <input required class="form-control" type="number" min="1" max="5" name="jumlah_anggota" placeholder="e.g. 1,2,..5">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="jml lab" class="col-2 col-form-label">Jumlah Lab</label>
                            <div class="col-10">
                                <input required class="form-control" type="number" min="0" max="3" name="jumlah_lab" placeholder="e.g. 1,2,..5">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="jml-mhs" class="col-2 col-form-label">Jumlah Mahasiswa</label>
                            <div class="col-10">
                                <input required class="form-control" type="number" min="0" max="5" name="jumlah_mhs" placeholder="e.g. 1,2,..5">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="no-telp" class="col-2 col-form-label">No Telpon</label>
                            <div class="col-10">
                                <input required class="form-control" type="text"  name="no_telp" placeholder="e.g. 085287915246">
                            </div>
                        </div> <h4 class="card-title"> Form Mitra</h4>
                        <div class="form-group row">
                            <label class="custom-control custom-checkbox">
                                <input class="styled-checkbox" id="mitra-toggle" type="checkbox" name="mitraToggle" onclick="showMitra('mitra','mitra2','mitra3','mitra4','mitra5')">
                                <label for="mitra-toggle">Memiliki Mitra?</label>
                            </label>
                        </div>
                        <div class="form-group row" id="mitra" style="display:none">
                            <label for="nama-mitra" class="col-2 col-form-label">Nama Mitra</label>
                            <div class="col-10">
                                <input class="form-control" type="text"  name="nama_mitra">
                            </div>
                        </div>
                        <div class="form-group row" id="mitra2" style="display:none">
                            <label for="cp-mitra" class="col-2 col-form-label">Contact Person</label>
                            <div class="col-10">
                                <input class="form-control" type="text"  name="cp_mitra">
                            </div>
                        </div>
                        <div class="form-group row" id="mitra3" style="display:none">
                            <label for="jabatan-mitra" class="col-2 col-form-label">Jabatan</label>
                            <div class="col-10">
                                <input class="form-control" type="text"  name="jabatan_mitra">
                            </div>
                        </div>
                        <div class="form-group row" id="mitra4" style="display:none">
                            <label for="alamat-mitra" class="col-2 col-form-label">Alamat</label>
                            <div class="col-10">
                                <input class="form-control" type="text"  name="alamat_mitra">
                            </div>
                        </div>
                        <div class="form-group row" id="mitra5" style="display:none">
                            <label for="telp-mitra" class="col-2 col-form-label">No Telfon</label>
                            <div class="col-10">
                                <input class="form-control" type="text"  name="telp_mitra">
                            </div>
                        </div>
                        <hr>
                        <h4 class="card-title">Form Pendanaan</h4>
                        <div class="form-group row">
                            <label for="total_dana" class="col-2 col-form-label">Total Dana yang Dibutuhkan</label>
                            <div class="col-10">
                                <input required class="form-control" type="text"  name="total_dana" placeholder="e.g. 5000000">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="dana-pribadi" class="col-2 col-form-label">Dana Pribadi</label>
                            <div class="col-10">
                                <input required class="form-control" type="text"  name="dana_pribadi" placeholder="e.g. 5000000 / Tidak Ada">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="dana-lain" class="col-2 col-form-label">Dana Lain</label>
                            <div class="col-10">
                                <input required class="form-control" type="text"  name="dana_lain" placeholder="e.g. 5000000 / Tidak Ada">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="upload" class="col-2 col-form-label">Upload Proposal</label>
                            <div class="col-10">
                                <input required class="form-control" type="file"  name="proposal">
                                @if ($errors->has('proposal'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('proposal') }}</strong>
                                    </span>
                                @endif
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