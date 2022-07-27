@extends('masterBackend')
@section('title', 'Admin | Dashboard')

@section('backend')
<style>
    .jam-container{
        justify-content: right;
        display: flex;
    }
</style>
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> --}}
        </div>

        <div class="card border-left-dark shadow h-100 py-5">
            <div class="row">
                <div class="col-lg-4 text-center">
                    <img src="{{ asset('assets/img/stok-logo-5.png') }}" style="border-radius:1rem" width="50%"
                        alt="">
                </div>
                <div class="col-lg-8">
                    <div class="jam">
                        <div class="container jam-container">
                            <span><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-calendar-check-fill"
                                    fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M4 .5a.5.5 0 0 0-1 0V1H2a2 2 0 0 0-2 2v1h16V3a2 2 0 0 0-2-2h-1V.5a.5.5 0 0 0-1 0V1H4V.5zM16 14V5H0v9a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2zm-5.146-5.146a.5.5 0 0 0-.708-.708L7.5 10.793 6.354 9.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z" />
                                </svg></span>&nbsp;
                            &nbsp;

                            <span class="f-blk" id="hari"></span>
                            ,
                            &nbsp;
                            <span class="f-blk" id="tanggal"></span>
                            &nbsp;

                            <span class="f-blk" id="bulan"></span>
                            &nbsp;

                            <span class="f-blk" id="tahun"></span>
                            &nbsp;

                            /
                            &nbsp;

                            <span class="f-blk" id="jam"></span>
                            :
                            <span a class="f-blk" id="menit"></span>
                            :
                            <span class="f-blk" id="detik"></span>
                        </div>
                    </div>
                    <br>
                    <h1 class="display-4 text-gray-800">Hallo,
                        <strong>
                            @if (Auth::user()->user_role === 'admin')

                            @elseif(Auth::user()->user_role === 'pimpinan')
                                {{ Auth::user()->name }}
                            @else
                                {{ Auth::user()->name }}
                            @endif
                        </strong>
                    </h1>
                    <hr>
                    <p class="lead text-dark">Selamat datang di <span class="text-primary"><strong>Web Aplikasi Arsip Data Pernikahan</strong></span></p>
                </div>
            </div>

        </div>

        <br>
        <!-- Content Row -->
        <div class="row">
            @if (Auth::user()->user_role === 'pegawai')
                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-4 col-md-4 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Data Pasangan</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $pasangan->count() }}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-users fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-4 col-md-4 mb-4">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                        Data Sudah Menikah</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $approved->count() }}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-user fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-4 col-md-4 mb-4">
                    <div class="card border-left-info shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Data Belum Menikah
                                    </div>
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-auto">
                                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                                {{ $rejected->count() }}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-user fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="col-xl-6 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Jumlah Pasangan Sudah Menikah</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $approved->count() }}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-users fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-md-6 mb-4">
                    <div class="card border-left-warning shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                        Jumlah Pasangan Belum menikah</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $rejected->count() }}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-file fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>

        <!-- Content Row -->
        @if (Auth::user()->user_role === 'penghulu')
            <div class="col-xl-12 col-lg-7">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-center">
                        <h4 class="m-0 font-weight-bold text-dark ">Daftar Jadwal Pernikahan</h4>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body ">
                        @forelse ($rejected as $item)
                            <div class="alert alert-danger" role="alert">
                                <h6>Tanggal : {{ $item->tanggal_pernikahan }}</h6>
                                <h6>Jam : {{ $item->jam_pernikahan }}</h6>
                                <h6>Tempat: {{ $item->tempat }}</h6>
                            </div>
                        @empty
                            <h6 class="text-center"><strong><i>Tidak Ada Jadwal Pernikahan</i></strong></h6>
                        @endforelse
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection


@section('js')
    <script>
        // Hari
        arrHari = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jum'at", "Sabtu"]
        Hari = new Date().getDay();
        document.getElementById("hari").innerHTML = arrHari[Hari];
        // Tanggal
        Tanggal = new Date().getDate();
        document.getElementById("tanggal").innerHTML = Tanggal;
        // Bulan
        arrbulan = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober",
            "November", "Desember"
        ];
        Bulan = new Date().getMonth();
        document.getElementById("bulan").innerHTML = arrbulan[Bulan];
        // Tahun
        Tahun = new Date().getFullYear();
        document.getElementById("tahun").innerHTML = Tahun;
        // Jam
        window.setTimeout("waktu()", 1000);

        function addZero(i) {
            if (i < 10) {
                i = "0" + i;
            }
            return i;
        }

        function waktu() {
            var waktu = new Date();
            setTimeout("waktu()", 1000);
            document.getElementById("jam").innerHTML = addZero(waktu.getHours());
            document.getElementById("menit").innerHTML = addZero(waktu.getMinutes());
            document.getElementById("detik").innerHTML = addZero(waktu.getSeconds());
        }
        //   window.setTimeout("waktu()", 1000);
        // function waktu() {
        // 	var waktu = new Date();
        // 	setTimeout("waktu()", 1000);
        // 	document.getElementById("jam").innerHTML = waktu.getHours();
        // 	document.getElementById("menit").innerHTML = waktu.getMinutes();
        // 	document.getElementById("detik").innerHTML = waktu.getSeconds();
        // }
    </script>
@endsection
