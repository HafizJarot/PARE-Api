@extends('templates.default')
@section('content')
<section class="content-header">
    <h1>
        General Form Elements
    </h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="breadcrumb-item"><a href="#">Forms</a></li>
        <li class="breadcrumb-item active">General Elements</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Tambah Pemilik</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" class="form-element" method="POST" action="{{ route('admin.pemilik.store') }}">
            @csrf
            <div class="box-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">No Izin</label>
                    <input type="text" class="form-control @error('no_izin') is-invalid @enderror"
                    name="no_izin" value="{{ old('no_izin') }}">
                    @error('no_izin')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="nama_perusahaan">Nama Perusahaan</label>
                    <input type="text" class="form-control @error('nama_perusahaan') is-invalid @enderror"
                    value="{{ old('nama_perusahaan') }}" name="nama_perusahaan">
                    @error('nama_perusahaan')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="nama_perusahaan">Alamat</label>
                    <input type="text" class="form-control @error('alamat') is-invalid @enderror"
                    value="{{ old('alamat') }}" name="alamat">
                    @error('alamat')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>

</section>
@endsection