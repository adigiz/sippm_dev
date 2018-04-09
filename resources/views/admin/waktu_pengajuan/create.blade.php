@extends('admin')

@section('title', 'Tambah Waktu Pengajuan')
@section('content')
    <div class="row">
        <div class="col-lg-8 col-xlg-9 col-md-7">
            <div class="card">
                <div class="card-block">
                    <form class="form-horizontal" method='post' action="{{route('waktu_pengajuan.store')}}">
                        {{csrf_field()}}
                        <h5  class="col-form-label">Tanggal Buka</h5>
                        <div class="form-group row">
                            <div class="input-group col-12">
                                <input type="date" class="form-control" placeholder="MM/DD/YYYY" name="tanggal_buka">
                                <div class="input-group-addon">
                                    <span class="input-group-text"><i class="icon-calender"></i></span>
                                </div>
                            </div>
                        </div>
                        <h5  class="col-form-label">Waktu Buka</h5>
                        <div class="form-group row">
                            <div class="input-group col-12 clockpicker">
                                <input type="text" class="form-control" name="waktu_buka" placeholder="08:30">
                                <span class="input-group-addon">
                                <span class="input-group-text"><i class="icon-clock"></i></span>
                            </span>
                            </div>
                        </div>
                        <h5  class="col-form-label">Tanggal Tutup</h5>
                        <div class="form-group row">
                            <div class="input-group col-12">
                                <input type="date" class="form-control" placeholder="MM/DD/YYYY" name="tanggal_tutup">
                                <div class="input-group-addon">
                                    <span class="input-group-text"><i class="icon-calender"></i></span>
                                </div>
                            </div>
                        </div>
                        <h5  class="col-form-label">Waktu Tutup</h5>
                        <div class="form-group row">
                            <div class="input-group col-12 clockpicker">
                                <input type="text" class="form-control" name="waktu_tutup" placeholder="08:30">
                                <span class="input-group-addon">
                                <span class="input-group-text"><i class="icon-clock"></i></span>
                            </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12 text-right">
                                <button class="btn btn-success" type="submit">Tambahkan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection