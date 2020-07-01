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
            <div class="col-xl-6 col-md-6 col-12">
                <div class="info-box bg-blue">
                    <span class="info-box-icon push-bottom"><i class="fa fa-address-card-o"></i></span>

                    <div class="info-box-content mb-4">
                        <span class="info-box-text">Penyewa</span>
                        <span class="info-box-number">{{ $penyewa }}</span>

                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-xl-6 col-md-6 col-12">
                <div class="info-box bg-green">
                    <span class="info-box-icon push-bottom"><i class="fa fa-address-card"></i></span>

                    <div class="info-box-content  mb-4">
                        <span class="info-box-text">Pemilik</span>
                        <span class="info-box-number">{{ $pemilik }}</span>

                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
        </div>
    </section>

@endsection