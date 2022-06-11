@extends('layout.base')


@section('content') 
<div class="pcoded-main-container">
    <div class="pcoded-wrapper">
        <div class="pcoded-content">
            <div class="pcoded-inner-content">
                <div class="main-body">
                    <div class="page-wrapper">
                        <!-- [ breadcrumb ] start -->
                        <div class="page-header">
                            <div class="page-block">
                                <div class="row align-items-center">
                                    <div class="col-md-12">
                                        <div class="page-header-title">
                                            <h5 class="m-b-10">Beranda</h5>
                                        </div>
                                        <ul class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="/"><i class="feather icon-home"></i></a></li>
                                            <li class="breadcrumb-item"><a href=""></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- [ breadcrumb ] end -->

                        <!-- [ Main Content ] start -->
                        <div class="row">
                            <!-- product profit start -->
                            <div class="col-xl-3 col-md-6">
                                <div class="card card-dash prod-p-card bg-c-red">
                                    <div class="card-body">
                                        <div class="row align-items-center m-b-25">
                                            <div class="col">
                                                <h6 class="m-b-5 text-white">Jumlah Pasien / Hari</h6>
                                                <h3 class="m-b-0 text-white">{{ $count_patients_today }}</h3>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-user text-c-red f-18"></i>
                                            </div>
                                        </div>
                                        {{-- <p class="m-b-0 text-white"><span class="label label-danger m-r-10">+11%</span>From Previous Month</p> --}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card card-dash prod-p-card bg-c-blue">
                                    <div class="card-body">
                                        <div class="row align-items-center m-b-25">
                                            <div class="col">
                                                <h6 class="m-b-5 text-white">Jumlah Pasien / Bulan</h6>
                                                <h3 class="m-b-0 text-white">{{ $count_patients_month }}</h3>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-database text-c-blue f-18"></i>
                                            </div>
                                        </div>
                                        {{-- <p class="m-b-0 text-white"><span class="label label-primary m-r-10">+12%</span>From Previous Month</p> --}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card card-dash prod-p-card bg-c-green">
                                    <div class="card-body">
                                        <div class="row align-items-center m-b-25">
                                            <div class="col">
                                                <h6 class="m-b-5 text-white">Jumlah Pengguna</h6>
                                                <h3 class="m-b-0 text-white">{{ $count_users }}</h3>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-users text-c-green f-18"></i>
                                            </div>
                                        </div>
                                        {{-- <p class="m-b-0 text-white"><span class="label label-success m-r-10">+52%</span>From Previous Month</p> --}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card card-dash prod-p-card bg-c-yellow">
                                    <div class="card-body">
                                        <div class="row align-items-center m-b-25">
                                            <div class="col">
                                                <h6 class="m-b-5 text-white">Jumlah Obat</h6>
                                                <h3 class="m-b-0 text-white">{{ $count_medicines }}</h3>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-tags text-c-yellow f-18"></i>
                                            </div>
                                        </div>
                                        {{-- <p class="m-b-0 text-white"><span class="label label-warning m-r-10">+52%</span>From Previous Month</p> --}}
                                    </div>
                                </div>
                            </div>
                            <!-- product profit end -->
                        </div>
                        <div class="row mt-3 ml-1">
                            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                                </ol>
                                <div class="carousel-inner" style="width: 45vw; height: 50vh; border-radius: 4px;">
                                    <div class="carousel-item active">
                                    <img class="d-block w-100" src="{{ asset('images/clinic-image.jpg') }}" alt="Clinic image">
                                    </div>
                                    <div class="carousel-item">
                                    <img class="d-block w-100" src="{{ asset('images/hero-login2.jpg') }}" alt="Clinic image">
                                    </div>
                                    <div class="carousel-item">
                                    <img class="d-block w-100" src="{{ asset('images/hero-login3.jpg') }}" alt="Clinic image">
                                    </div>
                                </div>
                                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                            <div class="col-md-5 ml-2">
                                <div class="calendar-container"></div>
                            </div>    
                        </div>
                        <!-- [ Main Content ] end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('css')
    <style>
        .card-dash:hover {
            transform: scale(1.05);
            transition: 0.5s;
        }
    </style>
@endsection
