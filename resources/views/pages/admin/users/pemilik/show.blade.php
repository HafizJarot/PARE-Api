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
                        <img class="profile-user-img rounded-circle img-fluid mx-auto d-block" src=""
                             alt="User profile picture">

                        <h3 class="profile-username text-center">{{ $pemilik->nama_perusahaan }}</h3>

                        <div class="row">
                            <div class="col-12">
                                <div class="profile-user-info">
                                    <p>Email address </p>
                                    <h6 class="margin-bottom">{{ $pemilik->email }}</h6>
                                    <p>Phone</p>
                                    <h6 class="margin-bottom">{{ $pemilik->no_hp }}</h6>
                                    <p>Address</p>
                                    <h6 class="margin-bottom">{{ $pemilik->alamat }}</h6>
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
                                    <th>Status</th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($produks as $produk)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td><img src="{{$produk->foto}}" width="90" height="90"/></td>
                                        <td>{{$produk->harga_sewa}}</td>
                                        <td>{{$produk->alamat}}</td>
                                        <td>{{$produk->keterangan}}</td>
                                        <td>{{$produk->sisi}}</td>
                                        @if(isset($produk->order['status']) == 'pending')
                                            <td>sudah di pesan</td>
                                        @else
                                            <td>belum di pesan</td>
                                        @endif
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
