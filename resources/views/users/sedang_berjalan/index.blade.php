@extends('users.home')

@section('title', 'Penelitian yang Sedang Berjalan')
@section('breadcrumb','Sedang Berjalan')
@section('content')
    @if(\Illuminate\Support\Facades\Session::has('alert-warning'))
        <div class="alert alert-warning">
            <strong>{{ \Illuminate\Support\Facades\Session::get('alert-warning') }}</strong>
        </div>
    @endif
    <div class="row">
        <div class="col-12">
            @if($penelitians != NULL || $pengabdians != NULL)
                @if($penelitians != NULL)
                    @foreach($penelitians as $pengajuan)
                        <div class="card">
                            <div class="card-block">
                                @if($pengajuan->jenis_pengajuan_id == 1)
                                    <span class="label label-info">Penelitian</span>
                                @else
                                    <span class="label label-info">Pengabdian Masyarakat</span>
                                @endif

                                <h4 class="card-title">{{$pengajuan->judul_penelitian}}
                                    @if($pengajuan->persetujuan_id == 1)
                                        <span class="label label-success">Disetujui</span>
                                    @endif
                                </h4>
                                <p>{{$pengajuan->abstrak}}</p>
                                <hr>
                                <div class="form-group">
                                    <h5 class="card-title">Luaran Penelitian:</h5>
                                    <div class="text-left">
                                        <ol type="1" style="padding-left: 15px">
                                            @if($pengajuan->jurnal != NULL)
                                                @foreach($publikasis as $publikasi)
                                                    <li class="card-subtitle">Publikasi Ilmiah ({{$publikasi->jenis_jurnal}})
                                                        @if($publikasis != NULL)
                                                            <a href="{{action('LuaranController@showPublikasi', ['id' => $pengajuan->id])}}" class="btn btn-sm btn-info">
                                                                <span class="fa fa-eye" aria-hidden="true"></span>
                                                            </a>
                                                        @endif
                                                    </li>
                                                @endforeach
                                                <li class="card-subtitle">Publikasi Ilmiah
                                                    <a href="{{action('LuaranController@createPublikasi', ['id' => $pengajuan->id])}}" class="btn btn-sm btn-success">
                                                        <span class="fa fa-plus" aria-hidden="true"></span>
                                                    </a>
                                                </li>
                                            @endif
                                            @if($pengajuan->pertemuan_ilmiah != NULL)
                                                @foreach($pertemuans as $pertemuan)
                                                    <li class="card-subtitle">Pertemuan Ilmiah ({{$pertemuan->jenis_jurnal}})
                                                        @if($pertemuan != NULL)
                                                            <a href="{{action('LuaranController@showPertemuan', ['id' => $pengajuan->id])}}" class="btn btn-sm btn-info">
                                                                <span class="fa fa-eye" aria-hidden="true"></span>
                                                            </a>
                                                        @endif
                                                    </li>
                                                @endforeach
                                                <li class="card-subtitle"> Pertemuan Ilmiah
                                                    <a href="{{action('LuaranController@createPertemuan', ['id' => $pengajuan->id])}}" class="btn btn-sm btn-success">
                                                        <span class="fa fa-plus" aria-hidden="true"></span>
                                                    </a>
                                                </li>
                                            @endif
                                            @if($pengajuan->haki != NULL)
                                                @foreach($hakis as $haki)
                                                    <li class="card-subtitle">Haki ({{$haki->jenis_haki}})
                                                        @if($haki != NULL)
                                                            <a href="{{action('LuaranController@showHaki', ['id' => $pengajuan->id])}}" class="btn btn-sm btn-info">
                                                                <span class="fa fa-eye" aria-hidden="true"></span>
                                                            </a>
                                                        @endif
                                                    </li>
                                                @endforeach
                                                <li class="card-subtitle"> Haki
                                                    <a href="{{action('LuaranController@createHaki', ['id' => $pengajuan->id])}}" class="btn btn-sm btn-success">
                                                        <span class="fa fa-plus" aria-hidden="true"></span>
                                                    </a>
                                                </li>
                                            @endif
                                            @if($pengajuan->prototype != NULL)
                                                @foreach($prototypes as $prototype)
                                                    <li class="card-subtitle">Prototype ({{$prototype->jenis_prototype}})
                                                        @if($prototype!= NULL)
                                                            <a href="{{action('LuaranController@showPrototype', ['id' => $pengajuan->id])}}" class="btn btn-sm btn-info">
                                                                <span class="fa fa-eye" aria-hidden="true"></span>
                                                            </a>
                                                        @endif
                                                    </li>
                                                @endforeach
                                                <li class="card-subtitle"> Prototype
                                                    <a href="{{action('LuaranController@createPrototype', ['id' => $pengajuan->id])}}" class="btn btn-sm btn-success">
                                                        <span class="fa fa-plus" aria-hidden="true"></span>
                                                    </a>
                                                </li>
                                            @endif
                                        </ol>

                                    </div>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <h5 class="card-title">Kelengkapan Hasil Penelitian:</h5>
                                    <div class="row">
                                        @if(($kelengkapan['laporan2'] != NULL) && $kelengkapan['laporan'] != NULL)
                                            <div class="col-12">
                                                <div class="card">
                                                    <h6 class="card-subtitle">Silahkan klik tombol <b>Download</b> untuk mengunduh file</h6>
                                                    <div class="table-responsive">
                                                        <table class="table table-bordered">
                                                            <thead>
                                                            <tr>
                                                                <th>No</th>
                                                                <th>Kelengkapan</th>
                                                                <th>Aksi</th>
                                                            </tr>
                                                            </thead>
                                                            <tr>
                                                                <td class="text-center">1</td>
                                                                <td>{{$kelengkapan->laporan}}</td>
                                                                <td>
                                                                    <a href="{{asset("uploads/file/$kelengkapan->laporan")}}" class="btn btn-sm  btn-success" >Download</a>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-center">2</td>
                                                                <td>{{$kelengkapan->logbook}}</td>
                                                                <td>
                                                                    <a href="{{asset("uploads/file/$kelengkapan->logbook")}}" class="btn btn-sm  btn-success" >Download</a>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-center">3</td>
                                                                <td>{{$kelengkapan->presentasi}}</td>
                                                                <td>
                                                                    <a href="{{asset("uploads/file/$kelengkapan->presentasi")}}" class="btn btn-sm  btn-success" >Download</a>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-center">5</td>
                                                                <td>{{$kelengkapan->output}}</td>
                                                                <td>
                                                                    <a href="{{asset("uploads/file/$kelengkapan->output")}}" class="btn btn-sm  btn-success" >Download</a>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-center">6</td>
                                                                <td>{{$kelengkapan->spj}}</td>
                                                                <td>
                                                                    <a href="{{asset("uploads/file/$kelengkapan->spj")}}" class="btn btn-sm  btn-success" >Download</a>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                            @if($kelengkapan['laporan2'] != NULL)
                                                <div class="col-12">
                                                    <div class="card" style="margin-bottom: 5px">
                                                        <h6 class="card-subtitle">Silahkan klik tombol <b>Download</b> untuk mengunduh file</h6>
                                                        <div class="table-responsive">
                                                            <table class="table table-bordered">
                                                                <thead>
                                                                <tr>
                                                                    <th>No</th>
                                                                    <th>Kelengkapan</th>
                                                                    <th>Aksi</th>
                                                                </tr>
                                                                </thead>
                                                                <tr>
                                                                    <td class="text-center">1</td>
                                                                    <td>{{$kelengkapan->laporan2}}</td>
                                                                    <td>
                                                                        <a href="{{asset("uploads/file/$kelengkapan->laporan2")}}" class="btn btn-sm  btn-success" >Download</a>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </div>

                                                    </div>
                                                    <button type="button" class="btn btn-success btn" data-toggle="modal" data-target="#kelengkapan"><span class="fa fa-plus" aria-hidden="true"></span> Tambah Kelengkapan Lainnya</button>
                                                    <div class="modal fade" id="kelengkapan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title" id="exampleModalLabel1">Tambah Kelengkapan</h4>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                </div>
                                                                <form class="form" action="{{route('kelengkapan.update', $pengajuan->id)}}" method="POST" enctype="multipart/form-data">
                                                                    {{csrf_field()}}
                                                                    {{ method_field('PUT') }}
                                                                    <div class="modal-body">
                                                                        <div class="form-group" style="margin-bottom: 10px">
                                                                            <label for="recipient-name" class="control-label">Laporan Final:</label>
                                                                            <input required type="file" class="form-control" name="laporan">
                                                                            <small class="form-control-feedback"> File yang di upload berupa <b>.pdf</b> </small>
                                                                        </div>
                                                                        <div class="form-group" style="margin-bottom: 10px">
                                                                            <label for="message-text" class="control-label">Logbook:</label>
                                                                            <input required type="file" class="form-control" name="logbook">
                                                                            <small class="form-control-feedback"> File yang di upload berupa <b>.pdf</b> </small>
                                                                        </div>
                                                                        <div class="form-group" style="margin-bottom: 10px">
                                                                            <label for="message-text" class="control-label">Presentasi:</label>
                                                                            <input required type="file" class="form-control" name="presentasi">
                                                                            <small class="form-control-feedback"> File yang di upload berupa <b>.pdf</b> </small>
                                                                        </div>
                                                                        <div class="form-group" style="margin-bottom: 10px">
                                                                            <label for="message-text" class="control-label">Output:</label>
                                                                            <input required type="file" class="form-control" name="output">
                                                                            <small class="form-control-feedback"> File yang di upload berupa <b>.zip</b> </small>
                                                                        </div>
                                                                        <div class="form-group" style="margin-bottom: 10px">
                                                                            <label for="message-text" class="control-label">SPJ:</label>
                                                                            <input required type="file" class="form-control" name="spj">
                                                                            <small class="form-control-feedback"> File yang di upload berupa <b>.pdf</b> </small>
                                                                        </div>

                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                        <button type="submit" class="btn btn-success">Tambahkan</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>


                                            @else
                                                <div class="row" style="padding-left: 15px">
                                                    <div class="col-12">
                                                        <button type="button" class="btn btn-success btn" data-toggle="modal" data-target="#kelengkapan"><span class="fa fa-plus" aria-hidden="true"></span> Tambah</button>
                                                        <div class="modal fade" id="kelengkapan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title" id="exampleModalLabel1">Tambah Kelengkapan</h4>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                    </div>
                                                                    <form class="form" action="{{route('kelengkapan.store')}}" method="POST" enctype="multipart/form-data">
                                                                        {{csrf_field()}}
                                                                        <div class="modal-body">
                                                                            <div class="form-group">
                                                                                <input  class="form-control" type="hidden" name="pengajuan_id" value="{{$pengajuan->id}}">
                                                                                <div class="form-group" style="margin-bottom: 10px">
                                                                                    <label for="recipient-name" class="control-label">Laporan Kemajuan 70%:</label>
                                                                                    <input required type="file" class="form-control" name="laporan2">
                                                                                    <small class="form-control-feedback"> File yang di upload berupa <b>.pdf</b> </small>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                            <button type="submit" class="btn btn-success">Tambahkan</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12 text-right">
                                        @if($pengajuan->jenis_pengajuan_id == 1)
                                            <a href="{{ action('PengajuanPenelitianController@show' , $pengajuan->id)}}" class="btn btn-info" >Detail Pengajuan</a>
                                        @else
                                            <a href="{{ action('PengajuanPengabdianController@show', $pengajuan->id)}}" class="btn btn-info" >Detail Pengajuan</a>
                                        @endif
                                        <a href="{{asset("uploads/file/$pengajuan->proposal")}}" class="btn btn-success" >Download</a>
                                        <a href="{{action('LuaranController@create', ['id' => $pengajuan->id])}}" class="btn btn-warning">Edit Luaran</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
                @if($pengabdians != NULL)
                        @foreach($pengabdians as $pengajuan)
                            <div class="card">
                                <div class="card-block">
                                    @if($pengajuan->jenis_pengajuan_id == 1)
                                        <span class="label label-info">Penelitian</span>
                                    @else
                                        <span class="label label-info">Pengabdian Masyarakat</span>
                                    @endif

                                    <h4 class="card-title">{{$pengajuan->judul_penelitian}}
                                        @if($pengajuan->persetujuan_id == 1)
                                            <span class="label label-success">Disetujui</span>
                                        @endif
                                    </h4>
                                    <p>{{$pengajuan->abstrak}}</p>
                                    <hr>
                                    <div class="form-group">
                                        <h5 class="card-title">Luaran Penelitian:</h5>
                                        <div class="text-left">
                                            <ol type="1" style="padding-left: 15px">
                                                @if($pengajuan->jurnal != NULL)
                                                    @foreach($publikasis as $publikasi)
                                                        <li class="card-subtitle">Publikasi Ilmiah ({{$publikasi->jenis_jurnal}})
                                                            @if($publikasis != NULL)
                                                                <a href="{{action('LuaranController@showPublikasi', ['id' => $pengajuan->id])}}" class="btn btn-sm btn-info">
                                                                    <span class="fa fa-eye" aria-hidden="true"></span>
                                                                </a>
                                                            @endif
                                                        </li>
                                                    @endforeach
                                                    <li class="card-subtitle">Publikasi Ilmiah
                                                        <a href="{{action('LuaranController@createPublikasi', ['id' => $pengajuan->id])}}" class="btn btn-sm btn-success">
                                                            <span class="fa fa-plus" aria-hidden="true"></span>
                                                        </a>
                                                    </li>
                                                @endif
                                                @if($pengajuan->pertemuan_ilmiah != NULL)
                                                    @foreach($pertemuans as $pertemuan)
                                                        <li class="card-subtitle">Pertemuan Ilmiah ({{$pertemuan->jenis_jurnal}})
                                                            @if($pertemuan != NULL)
                                                                <a href="{{action('LuaranController@showPertemuan', ['id' => $pengajuan->id])}}" class="btn btn-sm btn-info">
                                                                    <span class="fa fa-eye" aria-hidden="true"></span>
                                                                </a>
                                                            @endif
                                                        </li>
                                                    @endforeach
                                                    <li class="card-subtitle"> Pertemuan Ilmiah
                                                        <a href="{{action('LuaranController@createPertemuan', ['id' => $pengajuan->id])}}" class="btn btn-sm btn-success">
                                                            <span class="fa fa-plus" aria-hidden="true"></span>
                                                        </a>
                                                    </li>
                                                @endif
                                                @if($pengajuan->haki != NULL)
                                                    @foreach($hakis as $haki)
                                                        <li class="card-subtitle">Haki ({{$haki->jenis_haki}})
                                                            @if($haki != NULL)
                                                                <a href="{{action('LuaranController@showHaki', ['id' => $pengajuan->id])}}" class="btn btn-sm btn-info">
                                                                    <span class="fa fa-eye" aria-hidden="true"></span>
                                                                </a>
                                                            @endif
                                                        </li>
                                                    @endforeach
                                                    <li class="card-subtitle"> Haki
                                                        <a href="{{action('LuaranController@createHaki', ['id' => $pengajuan->id])}}" class="btn btn-sm btn-success">
                                                            <span class="fa fa-plus" aria-hidden="true"></span>
                                                        </a>
                                                    </li>
                                                @endif
                                                @if($pengajuan->prototype != NULL)
                                                    @foreach($prototypes as $prototype)
                                                        <li class="card-subtitle">Prototype ({{$prototype->jenis_prototype}})
                                                            @if($prototype!= NULL)
                                                                <a href="{{action('LuaranController@showPrototype', ['id' => $pengajuan->id])}}" class="btn btn-sm btn-info">
                                                                    <span class="fa fa-eye" aria-hidden="true"></span>
                                                                </a>
                                                            @endif
                                                        </li>
                                                    @endforeach
                                                    <li class="card-subtitle"> Prototype
                                                        <a href="{{action('LuaranController@createPrototype', ['id' => $pengajuan->id])}}" class="btn btn-sm btn-success">
                                                            <span class="fa fa-plus" aria-hidden="true"></span>
                                                        </a>
                                                    </li>
                                                @endif
                                            </ol>

                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <h5 class="card-title">Kelengkapan Hasil Penelitian:</h5>
                                        <div class="row">
                                            @if(($kelengkapan['laporan2'] != NULL) && $kelengkapan['laporan'] != NULL)
                                                <div class="col-12">
                                                    <div class="card">
                                                        <h6 class="card-subtitle">Silahkan klik tombol <b>Download</b> untuk mengunduh file</h6>
                                                        <div class="table-responsive">
                                                            <table class="table table-bordered">
                                                                <thead>
                                                                <tr>
                                                                    <th>No</th>
                                                                    <th>Kelengkapan</th>
                                                                    <th>Aksi</th>
                                                                </tr>
                                                                </thead>
                                                                <tr>
                                                                    <td class="text-center">1</td>
                                                                    <td>{{$kelengkapan->laporan}}</td>
                                                                    <td>
                                                                        <a href="{{asset("uploads/file/$kelengkapan->laporan")}}" class="btn btn-sm  btn-success" >Download</a>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-center">2</td>
                                                                    <td>{{$kelengkapan->logbook}}</td>
                                                                    <td>
                                                                        <a href="{{asset("uploads/file/$kelengkapan->logbook")}}" class="btn btn-sm  btn-success" >Download</a>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-center">3</td>
                                                                    <td>{{$kelengkapan->presentasi}}</td>
                                                                    <td>
                                                                        <a href="{{asset("uploads/file/$kelengkapan->presentasi")}}" class="btn btn-sm  btn-success" >Download</a>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-center">5</td>
                                                                    <td>{{$kelengkapan->output}}</td>
                                                                    <td>
                                                                        <a href="{{asset("uploads/file/$kelengkapan->output")}}" class="btn btn-sm  btn-success" >Download</a>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-center">6</td>
                                                                    <td>{{$kelengkapan->spj}}</td>
                                                                    <td>
                                                                        <a href="{{asset("uploads/file/$kelengkapan->spj")}}" class="btn btn-sm  btn-success" >Download</a>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            @else
                                                @if($kelengkapan['laporan2'] != NULL)
                                                    <div class="col-12">
                                                        <div class="card" style="margin-bottom: 5px">
                                                            <h6 class="card-subtitle">Silahkan klik tombol <b>Download</b> untuk mengunduh file</h6>
                                                            <div class="table-responsive">
                                                                <table class="table table-bordered">
                                                                    <thead>
                                                                    <tr>
                                                                        <th>No</th>
                                                                        <th>Kelengkapan</th>
                                                                        <th>Aksi</th>
                                                                    </tr>
                                                                    </thead>
                                                                    <tr>
                                                                        <td class="text-center">1</td>
                                                                        <td>{{$kelengkapan->laporan2}}</td>
                                                                        <td>
                                                                            <a href="{{asset("uploads/file/$kelengkapan->laporan2")}}" class="btn btn-sm  btn-success" >Download</a>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </div>

                                                        </div>
                                                        <button type="button" class="btn btn-success btn" data-toggle="modal" data-target="#kelengkapan"><span class="fa fa-plus" aria-hidden="true"></span> Tambah Kelengkapan Lainnya</button>
                                                        <div class="modal fade" id="kelengkapan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title" id="exampleModalLabel1">Tambah Kelengkapan</h4>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                    </div>
                                                                    <form class="form" action="{{route('kelengkapan.update', $pengajuan->id)}}" method="POST" enctype="multipart/form-data">
                                                                        {{csrf_field()}}
                                                                        {{ method_field('PUT') }}
                                                                        <div class="modal-body">
                                                                            <div class="form-group" style="margin-bottom: 10px">
                                                                                <label for="recipient-name" class="control-label">Laporan Final:</label>
                                                                                <input required type="file" class="form-control" name="laporan">
                                                                                <small class="form-control-feedback"> File yang di upload berupa <b>.pdf</b> </small>
                                                                            </div>
                                                                            <div class="form-group" style="margin-bottom: 10px">
                                                                                <label for="message-text" class="control-label">Logbook:</label>
                                                                                <input required type="file" class="form-control" name="logbook">
                                                                                <small class="form-control-feedback"> File yang di upload berupa <b>.pdf</b> </small>
                                                                            </div>
                                                                            <div class="form-group" style="margin-bottom: 10px">
                                                                                <label for="message-text" class="control-label">Presentasi:</label>
                                                                                <input required type="file" class="form-control" name="presentasi">
                                                                                <small class="form-control-feedback"> File yang di upload berupa <b>.pdf</b> </small>
                                                                            </div>
                                                                            <div class="form-group" style="margin-bottom: 10px">
                                                                                <label for="message-text" class="control-label">Output:</label>
                                                                                <input required type="file" class="form-control" name="output">
                                                                                <small class="form-control-feedback"> File yang di upload berupa <b>.zip</b> </small>
                                                                            </div>
                                                                            <div class="form-group" style="margin-bottom: 10px">
                                                                                <label for="message-text" class="control-label">SPJ:</label>
                                                                                <input required type="file" class="form-control" name="spj">
                                                                                <small class="form-control-feedback"> File yang di upload berupa <b>.pdf</b> </small>
                                                                            </div>

                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                            <button type="submit" class="btn btn-success">Tambahkan</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>


                                                @else
                                                    <div class="row" style="padding-left: 15px">
                                                        <div class="col-12">
                                                            <button type="button" class="btn btn-success btn" data-toggle="modal" data-target="#kelengkapan"><span class="fa fa-plus" aria-hidden="true"></span> Tambah</button>
                                                            <div class="modal fade" id="kelengkapan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h4 class="modal-title" id="exampleModalLabel1">Tambah Kelengkapan</h4>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                        </div>
                                                                        <form class="form" action="{{route('kelengkapan.store')}}" method="POST" enctype="multipart/form-data">
                                                                            {{csrf_field()}}
                                                                            <div class="modal-body">
                                                                                <div class="form-group">
                                                                                    <input  class="form-control" type="hidden" name="pengajuan_id" value="{{$pengajuan->id}}">
                                                                                    <div class="form-group" style="margin-bottom: 10px">
                                                                                        <label for="recipient-name" class="control-label">Laporan Kemajuan 70%:</label>
                                                                                        <input required type="file" class="form-control" name="laporan2">
                                                                                        <small class="form-control-feedback"> File yang di upload berupa <b>.pdf</b> </small>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                                <button type="submit" class="btn btn-success">Tambahkan</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12 text-right">
                                            @if($pengajuan->jenis_pengajuan_id == 1)
                                                <a href="{{ action('PengajuanPenelitianController@show' , $pengajuan->id)}}" class="btn btn-info" >Detail Pengajuan</a>
                                            @else
                                                <a href="{{ action('PengajuanPengabdianController@show', $pengajuan->id)}}" class="btn btn-info" >Detail Pengajuan</a>
                                            @endif
                                            <a href="{{asset("uploads/file/$pengajuan->proposal")}}" class="btn btn-success" >Download</a>
                                            <a href="{{action('LuaranController@create', ['id' => $pengajuan->id])}}" class="btn btn-warning">Edit Luaran</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                @endif
            @else
                <div class="card">
                    <div class="card-block">
                        <h4 class="card-title">Tidak ada penelitian / pengabdian yang sedang berjalan</h4>
                    </div>
                </div>
            @endif
        </div>
    </div>

@endsection