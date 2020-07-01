@extends('templates.default')
@section('content')
    <section class="content-header">
        <h1>
        </h1>

    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Notification of All Users</h3>

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
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($notifs as $notif)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$notif->no_izin}}</td>
                                    <td>{{$notif->nama_perusahaan}}</td>
                                    <td>{{$notif->alamat}}</td>
                                    <td>{{$notif->no_telp}}</td>
                                    <td>{{$notif->email}}</td>
                                    <td>
                                        <a href="{{route('notif.update',$notif->id)}}" class="btn btn-success">
                                            <i class="fa fa-check"></i>
                                        </a>
                                        <a href="#" class="btn btn-danger">
                                            <i class="fa fa-times-rectangle"></i>
                                        </a>
                                    </td>
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