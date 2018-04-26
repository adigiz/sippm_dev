@extends('users.home')

@section('title', 'Edit Penelitian')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-block">
                    <h4 class="card-title"> Edit Penelitian</h4>
                    <form class="form" action="{{action('PengajuanPenelitianController@update',$pengajuans->id)}}" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <input name="_method" type="hidden" value="PUT">
                        <div class="form-group m-t-40 row">
                            <label for="judul-penelitian" class="col-2 col-form-label">Judul Penelitian</label>
                            <div class="col-10">
                                <input class="form-control" type="text" name="judul_penelitian" value="{{$pengajuans['judul_penelitian']}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nama-ketua" class="col-2 col-form-label">Abstrak</label>
                            <div class="col-10">
                                <textarea class="form-control" name="abstrak" rows="8">{{$pengajuans['abstrak']}}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="jml lab" class="col-2 col-form-label">Jumlah Lab</label>
                            <div class="col-10">
                                <input class="form-control" type="number" min="0" name="jumlah_lab" value="{{$pengajuans['jumlah_lab']}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="jml-mhs" class="col-2 col-form-label">Jumlah Mahasiswa</label>
                            <div class="col-10">
                                <input class="form-control" type="number" min="0" name="jumlah_mhs" value="{{$pengajuans['jumlah_mhs']}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="no-telp" class="col-2 col-form-label">No Telpon</label>
                            <div class="col-10">
                                <input class="form-control" type="text"  name="no_telp" value="{{$pengajuans['no_telp']}}">
                            </div>
                        </div>
                        <hr>
                        @if($mitras != NULL)
                            <h4 class="card-title"> Form Mitra</h4>
                            <div class="form-group row" id="mitra">
                                <label for="nama-mitra" class="col-2 col-form-label">Nama Mitra</label>
                                <div class="col-10">
                                    <input class="form-control" type="text"  name="nama_mitra" value="{{$mitras['nama_mitra']}}">
                                </div>
                            </div>
                            <div class="form-group row" id="mitra2">
                                <label for="cp-mitra" class="col-2 col-form-label">Contact Person</label>
                                <div class="col-10">
                                    <input class="form-control" type="text"  name="cp_mitra" value="{{$mitras['cp_mitra']}}">
                                </div>
                            </div>
                            <div class="form-group row" id="mitra3">
                                <label for="jabatan-mitra" class="col-2 col-form-label">Jabatan</label>
                                <div class="col-10">
                                    <input class="form-control" type="text"  name="jabatan_mitra" value="{{$mitras['jabatan_mitra']}}">
                                </div>
                            </div>
                            <div class="form-group row" id="mitra4">
                                <label for="alamat-mitra" class="col-2 col-form-label">Alamat</label>
                                <div class="col-10">
                                    <input class="form-control" type="text"  name="alamat_mitra" value="{{$mitras['alamat_mitra']}}">
                                </div>
                            </div>
                            <div class="form-group row" id="mitra5" >
                                <label for="telp-mitra" class="col-2 col-form-label">No Telfon</label>
                                <div class="col-10">
                                    <input class="form-control" type="text"  name="telp_mitra" value="{{$mitras['telp_mitra']}}" >
                                </div>
                            </div>
                        @endif
                        <hr>
                        <h4 class="card-title">Form Pendanaan</h4>
                        <div class="form-group row">
                            <label for="total_dana" class="col-2 col-form-label">Total Dana yang Dibutuhkan</label>
                            <div class="col-10">
                                <input class="form-control" type="text"  name="total_dana" value="{{$pengajuans['total_dana']}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="dana-pribadi" class="col-2 col-form-label">Dana Pribadi</label>
                            <div class="col-10">
                                <input class="form-control" type="text"  name="dana_pribadi" value="{{$pengajuans['dana_pribadi']}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="dana-lain" class="col-2 col-form-label">Dana Lain</label>
                            <div class="col-10">
                                <input class="form-control" type="text"  name="dana_lain" value="{{$pengajuans['dana_lain']}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="upload" class="col-2 col-form-label">Upload Proposal</label>
                            <div class="col-10">
                                <input class="form-control" type="file"  name="proposal" value="{{$pengajuans['proposal']}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12 text-right">
                                <button class="btn btn-success" type="submit">Perbaiki</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection