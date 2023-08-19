@extends('layouts.main')
@section('content')
    <div class="panel-header bg-primary-gradient">
        <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                <div>
                    <h2 class="text-white pb-2 fw-bold">Selamat Datang di E-Posyandu Desa Jehem !</h2>
                    <h5 class="text-white op-7 mb-2">Sistem Posyandu Digital</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="page-inner mt--5">
        <div class="row mt--2">
            <div class="col-md-6">
                <div class="card full-height">
                    <div class="card-body">
                        <div class="card-title">Jumlah Keseluruhan Balita</div>
                        <div class="card-category">Informasi Penimbangan Bulanan Balita</div>
                        <div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
                            <div class="px-2 pb-2 pb-md-0 text-center">
                                <div id="circles-1" data-value="{{ $dataTetap }}">{{ $dataTetap }}</div>
                                <h6 class="fw-bold mt-3 mb-0">Tetap</h6>
                            </div>
                            <div class="px-2 pb-2 pb-md-0 text-center">
                                <div id="circles-2" data-value="{{ $dataNaik }}">{{ $dataNaik }}</div>
                                <h6 class="fw-bold mt-3 mb-0">Naik</h6>
                            </div>
                            <div class="px-2 pb-2 pb-md-0 text-center">
                                <div id="circles-3" data-value="{{ $dataTurun }}">{{ $dataTurun }}</div>
                                <h6 class="fw-bold mt-3 mb-0">Turun</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card full-height">
                    <div class="card-body">
                        <div class="card-title">Statistik Penimbangan Balita Di Setiap Dusun</div>
                        <div class="row py-3">
                            <div class="col-md-4 d-flex flex-column justify-content-around">
                                <div>
                                    <h6 class="fw-bold text-uppercase text-success op-8">Rata Rata Berat</h6>
                                    <h3 class="fw-bold">{{ $rataBeratBadan }} kg</h3>
                                </div>
                                <div>
                                    <h6 class="fw-bold text-uppercase text-danger op-8">Rata Rata Tinggi</h6>
                                    <h3 class="fw-bold">{{ $rataTinggiBadan }} cm</h3>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div id="chart-container">
                                    <canvas id="totalIncomeChart" data-value="{{ $grafikEscaped }}"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="card" style="min-height: 580px">
                    <div class="card-header">
                        <div class="card-head-row">
                            <div class="card-title">Statistik Penimbangan Selama 1 Tahun</div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="chart-container" style="min-height: 375px">
                            <canvas id="statisticsChart"></canvas>
                        </div>
                        <div id="myChartLegend"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-primary card-annoucement card-round" style="min-height: 538px">
                    <div class="card-body">
                        <div class="card-opening text-center">Tentang E-Posyandu,</div>
                        <div class="card-desc text-justify">
                            E-Posyandu adalah Sistem Pos Pelayanan Terpadu berbasis digital yang digunakan sebagai
                            pencatatan hasil penimbangan balita, baik tinggi badan maupun berat badan.
                            E-Posyandu dilengkapi dengan fitur-fitur diantaranya, <b>Pencatatan</b>, melakukan pencatatan
                            data dusun, orang tua, balita, dan penimbangan balita. <b>Pencarian</b>, melakukan pencarian
                            secara otomatis dengan beragam kategori pencarian dan <b>Pelaporan</b>, melakukan pelaporan
                            bulanan dan tahunan, maupun rata rata tinggi dan berat badan di setiap dusun secara otomatis.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
