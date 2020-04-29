@extends('templates.default')
@section('content')
    <section class="content-header">
        <h1>
            Data Tables
        </h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="breadcrumb-item"><a href="#">Tables</a></li>
            <li class="breadcrumb-item active">Data tables</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Responsive Hover Table</h3>

                        <div class="box-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="table_search" class="form-control pull-right"
                                       placeholder="Search">

                                <div class="input-group-btn">
                                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </div>
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
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$user->no_izin}}</td>
                                        <td>{{$user->nama_perusahaan}}</td>
                                        <td>{{$user->alamat}}</td>
                                        <td>{{$user->no_telp}}</td>
                                        <td>{{$user->email}}</td>

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