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

            <!-- /.col -->
        </div>
        <!-- /.row -->

    </section>
@endsection
