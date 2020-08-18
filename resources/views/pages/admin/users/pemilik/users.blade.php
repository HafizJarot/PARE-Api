@extends('templates.default')
@section('content')
    <section class="content-header">
        <h1>
            Data All Users
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title"></h3>

                        <a href="{{ route('admin.pemilik.create') }}" class="btn btn-info">Tambah</a>

                    </div>
                    <!-- /.box-header -->
                    <div class="box-body no-padding">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>No Izin</th>
                                    <th>Nama Pemilik</th>
                                    <th>Alamat</th>
                                    <th>Nomor Telepon</th>
                                    <th>Email</th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($pemiliks as $pemilik)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$pemilik->no_izin}}</td>
                                        <td><a href="{{route('user.show', $pemilik->id)}}">{{$pemilik->nama_perusahaan}}</a></td>
                                        <td>{{$pemilik->alamat}}</td>
                                        <td>{{$pemilik->no_hp}}</td>
                                        <td>{{$pemilik->email}}</td>

                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
        <!-- /.row -->
    </section>
@endsection