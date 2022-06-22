@extends('admin.master')
@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{$data['total_berita']}}</h3>

                            <p>Total Berita</p>
                        </div>
                        <div class="icon">
                        <i class="far fa-newspaper"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{$data['total_truk']}}</h3>

                            <p>Total Truk</p>
                        </div>
                        <div class="icon">
                        <i class="fas fa-truck-moving"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{$data['total_pelanggan']}}</h3>

                            <p>Total Pelanggan</p>
                        </div>
                        <div class="icon">
                        <i class="far fa-building"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{$data['total_penghargaan']}}</h3>

                            <p>Total Penghargaan</p>
                        </div>
                        <div class="icon">
                        <i class="fas fa-trophy"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-secondary">
                        <div class="inner">
                            <h3>{{$data["total_pelamar"]}}</h3>

                            <p>Total Pelamar</p>
                        </div>
                        <div class="icon">
                        <i class="fas fa-user-md"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-primary">
                        <div class="inner">
                            <h3>{{$data["total_lowongan"]}}</h3>

                            <p>Total Lowongan Kerja</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-user-friends"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{$data['visitor']}}</h3>

                            <p>Total Pengunjung</p>
                        </div>
                        <div class="icon">
                        <i class="far fa-eye"></i>
                        </div>
                    </div>
                </div>
                <!-- <div class="col-lg-3 col-6">
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>0987</h3>

                            <p>Total Lolos Interview</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-copy"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>098</h3>

                            <p>Total Semua</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-drafting-compass"></i>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
</div>
@endsection
