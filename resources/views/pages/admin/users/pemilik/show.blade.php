@extends('templates.default')
@section('content')
    <section class="content-header">
        <h1>
            User Profile
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-xl-4 col-lg-5">

                <!-- Profile Image -->
                <div class="box box-primary">
                    <div class="box-body box-profile">
                        <img class="profile-user-img rounded-circle img-fluid mx-auto d-block" src="" alt="User profile picture">

                        <h3 class="profile-username text-center">{{ $user->nama_perusahaan }}</h3>

                        <div class="row">
                            <div class="col-12">
                                <div class="profile-user-info">
                                    <p>Email address </p>
                                    <h6 class="margin-bottom">{{ $user->email }}</h6>
                                    <p>Phone</p>
                                    <h6 class="margin-bottom">{{ $user->no_hp }}</h6>
                                    <p>Address</p>
                                    <h6 class="margin-bottom">{{ $user->alamat }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
            <div class="col-8">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title"></h3>

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
                                    <th>Foto</th>
                                    <th>Harga Sewa</th>
                                    <th>Alamat</th>
                                    <th>Keterangan</th>
                                    <th>Sisi</th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($produks as $produk)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$produk->foto}}</td>
                                        <td>{{$produk->harga_sewa}}</td>
                                        <td>{{$produk->alamat}}</td>
                                        <td>{{$produk->keterangan}}</td>
                                        <td>{{$produk->sisi}}</td>

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
            <!-- /.col -->
        </div>
        <!-- /.row -->




    </section>
@endsection
