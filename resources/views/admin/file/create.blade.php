@extends('admin')

@section('title', 'Tambah File')
@section('content')
    <div class="row">
        <div class="col-lg-8 col-xlg-9 col-md-7">
            <div class="card">
                <div class="card-block">
                    <form class="form-horizontal form-material" method='post' action="{{route('file.store')}}" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-group row">
                            <div class="col-12">
                                <h4 class="card-title">Tambahkan File</h4>
                                <input type="file" class="form-control" name="file"/>
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