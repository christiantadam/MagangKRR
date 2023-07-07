<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('/images/KRR.png') }}" type="image/gif" sizes="16x16">
    <title style="font-size: 20px">{{ config('app.name', 'Payroll') }}</title>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js' type='text/javascript'></script>

    <script src="{{ asset('js/app.js') }}"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.1.0.js"></script> -->
    <!-- <script src="//code.jquery.com/jquery-1.11.0.min.js"></script> -->
    <script src="{{ asset('js/datatables.min.js') }}"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/select/1.6.2/js/dataTables.select.min.js"></script>
    <script src="{{ asset('js/jquery-dateformat.js') }}"></script>
    <script src="{{ asset('js/RDZ.js') }}"></script>


    <script src="{{ asset('js/User.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/appPayroll.css') }}" rel="stylesheet">
    <link href="{{ asset('css/datatables.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/buttons.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/Rdz.css') }}" rel="stylesheet">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>

<body onload="Greeting()">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow sticky-top">
            <div class="container col-md-12">
                <a class="navbar-brand RDZNavBrandCenter RDZUnderLine" href="{{ url('/') }}">
                    <img src="{{ asset('/images/KRR.png') }}" width="55" height="50" alt="KRR">
                    {{ config('app.name', 'Payroll') }}
                </a>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav mr-auto RDZNavContenCenter">
                            <div class="dropdown">
                                <a class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false" style="margin: 10px">
                                    Master
                                </a>
                                <ul class="dropdown-menu" style="cursor: default">
                                    <li><a class="test"style="margin: 10px;color: black;font-size: 15px;display: block;cursor: default"
                                            tabindex="-1">Karyawan &raquo;</a>

                                        <ul class="dropdown-menu dropdown-submenu">
                                            <li><a style="margin: 10px;color: black;font-size: 15px;display: block"
                                                    tabindex="-1" href="{{ url('ProgramPayroll/Master/Karyawan/Harian') }}">Harian</a>
                                            </li>
                                            <li><a style="margin: 10px;color: black;font-size: 15px;display: block"
                                                    tabindex="-1" href="{{ url('ProgramPayroll/Master/Karyawan/Keluarga') }}">Keluarga</a>
                                            </li>

                                        </ul>
                                    </li>

                                    <li><a class="test"style="margin: 10px;color: black;font-size: 15px;display: block;cursor: default"
                                            tabindex="-1" href="{{ url('ProgramPayroll/Master/Divisi') }}">Divisi</a>
                                    </li>
                                    <li><a class="test"
                                            style="margin: 10px;color: black;font-size: 15px;display: block;cursor: default"
                                            tabindex="-1">Setting Divisi &raquo;</a>

                                        <ul class="dropdown-menu dropdown-submenu">
                                            <li><a style="margin: 10px;color: black;font-size: 15px;display: block"
                                                    tabindex="-1" href="{{ url('ProgramPayroll/Master/SettingDivisi/Harian') }}">Harian</a></li>
                                            <li><a style="margin: 10px;color: black;font-size: 15px;display: block"
                                                    tabindex="-1" href="{{ url('ProgramPayroll/Master/SettingDivisi/Staff') }}">Staff</a>
                                            </li>

                                        </ul>
                                    </li>

                                    <li><a class="test"style="margin: 10px;color: black;font-size: 15px;display: block;cursor: default"
                                            tabindex="-1" href="{{ url('ProgramPayroll/Master/Nomer') }}">Nomer</a>
                                    </li>
                                    <li><a class="test"style="margin: 10px;color: black;font-size: 15px;display: block;cursor: default"
                                            tabindex="-1" href="{{ url('ProgramPayroll/Master/Kartu') }}">Kartu</a>
                                    </li>
                                    <li><a class="test"style="margin: 10px;color: black;font-size: 15px;display: block;cursor: default"
                                            tabindex="-1" href="{{ url('ProgramPayroll/Master/SettingShift') }}">Setting Shift</a>
                                    </li>
                                    <li><a class="test"style="margin: 10px;color: black;font-size: 15px;display: block;cursor: default"
                                            tabindex="-1" href="{{ url('ProgramPayroll/Master/Klinik') }}">Klinik</a>
                                    </li>

                                </ul>
                            </div>
                            <!-- Agenda -->
                            <div class="dropdown">
                                <a class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false" style="margin: 10px">
                                    Agenda
                                </a>
                                <ul class="dropdown-menu" style="cursor: default">
                                    <li><a class="test"style="margin: 10px;color: black;font-size: 15px;display: block;cursor: default"
                                            tabindex="-1">Agenda Masuk &raquo;</a>

                                        <ul class="dropdown-menu dropdown-submenu">
                                            <li><a style="margin: 10px;color: black;font-size: 15px;display: block"
                                                    tabindex="-1" href="{{ url('ProgramPayroll/Agenda/AgendaMasuk/Jam') }}">Pakai Jam</a>
                                            </li>
                                            <li><a style="margin: 10px;color: black;font-size: 15px;display: block"
                                                    tabindex="-1" href="{{ url('ProgramPayroll/Agenda/AgendaMasuk/Shift') }}">Pakai Shift</a>
                                            </li>

                                        </ul>
                                    </li>

                                    <li><a class="test"style="margin: 10px;color: black;font-size: 15px;display: block;cursor: default"
                                            tabindex="-1" href="{{ url('ProgramPayroll/Agenda/TambahAgenda') }}">Tambah Agenda</a>
                                    </li>
                                    <li><a class="test"style="margin: 10px;color: black;font-size: 15px;display: block;cursor: default"
                                            tabindex="-1" href="{{ url('ProgramPayroll/Agenda/UbahAgenda') }}">Ubah Agenda</a>
                                    </li>
                                    <li><a class="test"style="margin: 10px;color: black;font-size: 15px;display: block;cursor: default"
                                            tabindex="-1" href="{{ url('ProgramPayroll/Agenda/HariBesar') }}">Hari Libur & Besar</a>
                                    </li>

                                    <li><a class="test"
                                            style="margin: 10px;color: black;font-size: 15px;display: block;cursor: default"
                                            tabindex="-1">Ganti Shift &raquo;</a>

                                        <ul class="dropdown-menu dropdown-submenu">
                                            <li><a style="margin: 10px;color: black;font-size: 15px;display: block"
                                                    tabindex="-1" href="{{ url('ProgramPayroll/Agenda/GantiShift/Aturan1') }}">Aturan 1_3</a></li>
                                            <li><a style="margin: 10px;color: black;font-size: 15px;display: block"
                                                    tabindex="-1" href="{{ url('ProgramPayroll/Agenda/GantiShift/Aturan2') }}">Aturan 2</a>
                                            </li>

                                        </ul>
                                    </li>

                                    <li><a class="test"style="margin: 10px;color: black;font-size: 15px;display: block;cursor: default"
                                            tabindex="-1" href="{{ url('ProgramPayroll/Agenda/KoreksiShift') }}">Koreksi Shift Per Periode</a>
                                    </li>
                                    <li><a class="test"style="margin: 10px;color: black;font-size: 15px;display: block;cursor: default"
                                            tabindex="-1" href="{{ url('ProgramPayroll/Agenda/InsertPegawaiBaru') }}">Insert Agenda Pegawai Baru</a>
                                    </li>
                                    <li><a class="test"style="margin: 10px;color: black;font-size: 15px;display: block;cursor: default"
                                            tabindex="-1" href="{{ url('ProgramPayroll/Agenda/InsertSupervisor') }}">Insert Agenda Supervisor</a>
                                    </li>

                                </ul>
                            </div>
                            <!-- Transaksi -->
                            <div class="dropdown">
                                <a class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false" style="margin: 10px">
                                    Transaksi
                                </a>
                                <ul class="dropdown-menu" style="cursor: default">
                                    <li><a class="test"style="margin: 10px;color: black;font-size: 15px;display: block;cursor: default"
                                            tabindex="-1">Input Checkclock Nganjuk</a>
                                    </li>
                                    <li><a class="test"style="margin: 10px;color: black;font-size: 15px;display: block;cursor: default"
                                            tabindex="-1">Transfer Absen</a>
                                    </li>
                                    <li><a class="test"style="margin: 10px;color: black;font-size: 15px;display: block;cursor: default"
                                            tabindex="-1">Verifikasi Absen</a>
                                    </li>
                                    <li><a class="test"style="margin: 10px;color: black;font-size: 15px;display: block;cursor: default"
                                            tabindex="-1">Absen Simpang</a>
                                    </li>
                                    <li><a class="test"style="margin: 10px;color: black;font-size: 15px;display: block;cursor: default"
                                            tabindex="-1">Perpanjangan/Pembaharuan Kontrak</a>
                                    </li>
                                    <li><a class="test"style="margin: 10px;color: black;font-size: 15px;display: block;cursor: default"
                                            tabindex="-1">Koreksi Absen</a>
                                    </li>
                                    <li><a class="test"style="margin: 10px;color: black;font-size: 15px;display: block;cursor: default"
                                            tabindex="-1">Input Libur/Masuk Pegawai</a>
                                    </li>
                                    <li><a class="test"style="margin: 10px;color: black;font-size: 15px;display: block;cursor: default"
                                            tabindex="-1">Input Range</a>
                                    </li>
                                    <li><a class="test"style="margin: 10px;color: black;font-size: 15px;display: block;cursor: default"
                                            tabindex="-1">Lembur</a>
                                    </li>
                                    <li><a class="test"style="margin: 10px;color: black;font-size: 15px;display: block;cursor: default"
                                            tabindex="-1">Check Clock Error</a>
                                    </li>
                                    <li><a class="test"style="margin: 10px;color: black;font-size: 15px;display: block;cursor: default"
                                            tabindex="-1">Check Clock Masuk Keluar</a>
                                    </li>
                                    <li><a class="test"style="margin: 10px;color: black;font-size: 15px;display: block;cursor: default"
                                            tabindex="-1">Maint Pelatihan</a>
                                    </li>
                                    <li><a class="test"style="margin: 10px;color: black;font-size: 15px;display: block;cursor: default"
                                            tabindex="-1">Koreksi</a>
                                    </li>
                                    <li><a class="test"style="margin: 10px;color: black;font-size: 15px;display: block;cursor: default"
                                            tabindex="-1">Koperasi</a>
                                    </li>

                                    <li><a class="test"style="margin: 10px;color: black;font-size: 15px;display: block;cursor: default"
                                            tabindex="-1">Mutasi &raquo;</a>

                                        <ul class="dropdown-menu dropdown-submenu">
                                            <li><a style="margin: 10px;color: black;font-size: 15px;display: block"
                                                    tabindex="-1" href="{{ url('ProgramContoh') }}">Harian</a>
                                            </li>
                                            <li><a style="margin: 10px;color: black;font-size: 15px;display: block"
                                                    tabindex="-1" href="{{ url('ProgramContoh') }}">Staff</a>
                                            </li>
                                            <li><a style="margin: 10px;color: black;font-size: 15px;display: block"
                                                    tabindex="-1" href="{{ url('ProgramContoh') }}">Histori Mutasi</a>
                                            </li>

                                        </ul>
                                    </li>
                                    <li><a class="test"style="margin: 10px;color: black;font-size: 15px;display: block;cursor: default"
                                            tabindex="-1">Resign</a>
                                    </li>
                                    <li><a class="test"style="margin: 10px;color: black;font-size: 15px;display: block;cursor: default"
                                            tabindex="-1">Kenaikan Upah</a>
                                    </li>
                                    <li><a class="test"style="margin: 10px;color: black;font-size: 15px;display: block;cursor: default"
                                            tabindex="-1">Absen > 1</a>
                                    </li>
                                    <li><a class="test"style="margin: 10px;color: black;font-size: 15px;display: block;cursor: default"
                                            tabindex="-1">Skorsing &raquo;</a>

                                        <ul class="dropdown-menu dropdown-submenu">
                                            <li><a style="margin: 10px;color: black;font-size: 15px;display: block"
                                                    tabindex="-1" href="{{ url('ProgramContoh') }}">Permohonan</a>
                                            </li>
                                            <li><a style="margin: 10px;color: black;font-size: 15px;display: block"
                                                    tabindex="-1" href="{{ url('ProgramContoh') }}">ACC Bayar</a>
                                            </li>


                                        </ul>
                                    </li>
                                    <li><a class="test"style="margin: 10px;color: black;font-size: 15px;display: block;cursor: default"
                                            tabindex="-1">Peringatan &raquo;</a>

                                        <ul class="dropdown-menu dropdown-submenu">
                                            <li><a style="margin: 10px;color: black;font-size: 15px;display: block"
                                                    tabindex="-1" href="{{ url('ProgramContoh') }}">Permohonan</a>
                                            </li>
                                            <li><a style="margin: 10px;color: black;font-size: 15px;display: block"
                                                    tabindex="-1" href="{{ url('ProgramContoh') }}">Acc Permohonan</a>
                                            </li>


                                        </ul>
                                    </li>
                                    <li><a class="test"style="margin: 10px;color: black;font-size: 15px;display: block;cursor: default"
                                            tabindex="-1">Copy Gaji To. TXT</a>
                                    </li>
                                    <li><a class="test"style="margin: 10px;color: black;font-size: 15px;display: block;cursor: default"
                                            tabindex="-1">Proses Rekap Absen & Lembur</a>
                                    </li>
                                    <li><a class="test"style="margin: 10px;color: black;font-size: 15px;display: block;cursor: default"
                                            tabindex="-1">Estimasi Gaji</a>
                                    </li>
                                    <li><a class="test"style="margin: 10px;color: black;font-size: 15px;display: block;cursor: default"
                                            tabindex="-1">Hit Gaji Harian</a>
                                    </li>
                                    <li><a class="test"style="margin: 10px;color: black;font-size: 15px;display: block;cursor: default"
                                            tabindex="-1">Hit THR Harian</a>
                                    </li>

                                </ul>
                            </div>

                            <!-- Laporan -->
                            <div class="dropdown">
                                <a class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false" style="margin: 10px">
                                    Laporan
                                </a>

                                <ul class="dropdown-menu" style="cursor: default">
                                    <!-- Absen -->
                                    <li><a class="test"style="margin: 10px;color: black;font-size: 15px;display: block;cursor: default"
                                            tabindex="-1">Absen &raquo;</a>

                                        <ul class="dropdown-menu dropdown-submenu">
                                            <li><a style="margin: 10px;color: black;font-size: 15px;display: block"
                                                    tabindex="-1" href="{{ url('ProgramContoh') }}">Laporan Absen Abnormal</a>
                                            </li>
                                            <li><a style="margin: 10px;color: black;font-size: 15px;display: block"
                                                    tabindex="-1" href="{{ url('ProgramContoh') }}">Daftar Lembur By Supervisor</a>
                                            </li>

                                        </ul>
                                    </li>
                                    <!-- Staff -->
                                    <li><a class="test"style="margin: 10px;color: black;font-size: 15px;display: block;cursor: default"
                                            tabindex="-1">Staff &raquo;</a>

                                        <ul class="dropdown-menu dropdown-submenu">
                                            <li><a style="margin: 10px;color: black;font-size: 15px;display: block"
                                                    tabindex="-1" href="{{ url('ProgramContoh') }}">Form Daftar Hadir</a>
                                            </li>
                                            <li>
                                                <a style="margin: 10px;color: black;font-size: 15px;display: block" tabindex="-1" href="{{ url('ProgramContoh') }}">Absensi Karyawan &raquo</a>
                                                <ul class="dropdown-menu dropdown-submenu">
                                                    <li>
                                                        <a style="margin: 10px;color: black;font-size: 15px;display: block" tabindex="-1" href="{{ url('ProgramContoh') }}">Rekap Absen Per Periodik</a>
                                                    </li>
                                                    <li>
                                                        <a style="margin: 10px;color: black;font-size: 15px;display: block" tabindex="-1" href="{{ url('ProgramContoh') }}">Cetak Detail Absen Per Periodik</a>
                                                    </li>
                                                    <li>
                                                        <a style="margin: 10px;color: black;font-size: 15px;display: block" tabindex="-1" href="{{ url('ProgramContoh') }}">Rekap Perolehan ASI</a>
                                                    </li>

                                                </ul>
                                            </li>
                                            <li>
                                                <a style="margin: 10px;color: black;font-size: 15px;display: block" tabindex="-1" href="{{ url('ProgramContoh') }}">Lembur &raquo</a>
                                                <ul class="dropdown-menu dropdown-submenu">
                                                    <li>
                                                        <a style="margin: 10px;color: black;font-size: 15px;display: block" tabindex="-1" href="{{ url('ProgramContoh') }}">Lembur Per Divisi</a>
                                                    </li>
                                                    <li>
                                                        <a style="margin: 10px;color: black;font-size: 15px;display: block" tabindex="-1" href="{{ url('ProgramContoh') }}">Lembur Per Manager</a>
                                                    </li>
                                                    <li>
                                                        <a style="margin: 10px;color: black;font-size: 15px;display: block" tabindex="-1" href="{{ url('ProgramContoh') }}">Detail Lembur Per Bulan</a>
                                                    </li>

                                                </ul>
                                            </li>
                                            <li>
                                                <a style="margin: 10px;color: black;font-size: 15px;display: block" tabindex="-1" href="{{ url('ProgramContoh') }}">Hutang &raquo</a>
                                                <ul class="dropdown-menu dropdown-submenu">
                                                    <li>
                                                        <a style="margin: 10px;color: black;font-size: 15px;display: block" tabindex="-1" href="{{ url('ProgramContoh') }}">Kartu Hutang</a>
                                                    </li>
                                                    <li>
                                                        <a style="margin: 10px;color: black;font-size: 15px;display: block" tabindex="-1" href="{{ url('ProgramContoh') }}">Hutang Koperasi</a>
                                                    </li>
                                                    <li>
                                                        <a style="margin: 10px;color: black;font-size: 15px;display: block" tabindex="-1" href="{{ url('ProgramContoh') }}">Angsuran Koperasi</a>
                                                    </li>
                                                    <li>
                                                        <a style="margin: 10px;color: black;font-size: 15px;display: block" tabindex="-1" href="{{ url('ProgramContoh') }}">Daftar Pelunasan Hutang</a>
                                                    </li>
                                                    <!-- Tambahkan submenu tambahan di sini jika diperlukan -->
                                                </ul>
                                            </li>
                                            <li><a class="test"style="margin: 10px;color: black;font-size: 15px;display: block;cursor: default"
                                            tabindex="-1">Potongan Koperasi (Toko)</a>
                                            </li>
                                            <li><a class="test"style="margin: 10px;color: black;font-size: 15px;display: block;cursor: default"
                                                    tabindex="-1">Daftar Potongan SPTSK & Iuran Koperasi</a>
                                            </li>
                                            <li><a class="test"style="margin: 10px;color: black;font-size: 15px;display: block;cursor: default"
                                                    tabindex="-1">Jumlah Pegawai</a>
                                            </li>
                                            <li><a class="test"style="margin: 10px;color: black;font-size: 15px;display: block;cursor: default"
                                                    tabindex="-1">Angsuran Baju Seragam</a>
                                            </li>

                                        </ul>
                                    </li>
                                    <!-- Harian -->
                                    <li><a class="test"style="margin: 10px;color: black;font-size: 15px;display: block;cursor: default"
                                            tabindex="-1">Harian &raquo;</a>

                                        <ul class="dropdown-menu dropdown-submenu">
                                            <li>
                                                <a style="margin: 10px;color: black;font-size: 15px;display: block" tabindex="-1" href="{{ url('ProgramContoh') }}">Daftar Hadir</a>
                                            </li>

                                            <li>
                                                <a style="margin: 10px;color: black;font-size: 15px;display: block" tabindex="-1" href="{{ url('ProgramContoh') }}">Daftar Absensi &raquo</a>
                                                <ul class="dropdown-menu dropdown-submenu">
                                                    <li>
                                                        <a style="margin: 10px;color: black;font-size: 15px;display: block" tabindex="-1" href="{{ url('ProgramContoh') }}">perHari</a>
                                                    </li>
                                                    <li>
                                                        <a style="margin: 10px;color: black;font-size: 15px;display: block" tabindex="-1" href="{{ url('ProgramContoh') }}">perMinggu</a>
                                                    </li>
                                                    <li>
                                                        <a style="margin: 10px;color: black;font-size: 15px;display: block" tabindex="-1" href="{{ url('ProgramContoh') }}">perBulan</a>
                                                    </li>
                                                    <li>
                                                        <a style="margin: 10px;color: black;font-size: 15px;display: block" tabindex="-1" href="{{ url('ProgramContoh') }}">perTahun</a>
                                                    </li>

                                                </ul>
                                            </li>
                                            <li>
                                                <a style="margin: 10px;color: black;font-size: 15px;display: block" tabindex="-1" href="{{ url('ProgramContoh') }}">Daftar Upah Harian &raquo</a>
                                                <ul class="dropdown-menu dropdown-submenu">
                                                    <li>
                                                        <a style="margin: 10px;color: black;font-size: 15px;display: block" tabindex="-1" href="{{ url('ProgramContoh') }}">Per Manager</a>
                                                    </li>
                                                    <li>
                                                        <a style="margin: 10px;color: black;font-size: 15px;display: block" tabindex="-1" href="{{ url('ProgramContoh') }}">Per Divisi</a>
                                                    </li>

                                                </ul>
                                            </li>
                                            <li>
                                                <a style="margin: 10px;color: black;font-size: 15px;display: block" tabindex="-1" href="{{ url('ProgramContoh') }}">Tanda Terima Upah Pegawai &raquo</a>
                                                <ul class="dropdown-menu dropdown-submenu">
                                                    <li>
                                                        <a style="margin: 10px;color: black;font-size: 15px;display: block" tabindex="-1" href="{{ url('ProgramContoh') }}">Per Manager</a>
                                                    </li>
                                                    <li>
                                                        <a style="margin: 10px;color: black;font-size: 15px;display: block" tabindex="-1" href="{{ url('ProgramContoh') }}">Per Divisi</a>
                                                    </li>
                                                    <li>
                                                        <a style="margin: 10px;color: black;font-size: 15px;display: block" tabindex="-1" href="{{ url('ProgramContoh') }}">Upah Skorsing Terbayar</a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li>
                                                <a style="margin: 10px;color: black;font-size: 15px;display: block" tabindex="-1" href="{{ url('ProgramContoh') }}">Laporan Uang Makan Kecil</a>
                                            </li>
                                            <li>
                                                <a style="margin: 10px;color: black;font-size: 15px;display: block" tabindex="-1" href="{{ url('ProgramContoh') }}">Daftar Pembayaran SPTSK, JHT, Koperasi &raquo</a>
                                                <ul class="dropdown-menu dropdown-submenu">
                                                    <li>
                                                        <a style="margin: 10px;color: black;font-size: 15px;display: block" tabindex="-1" href="{{ url('ProgramContoh') }}">Per Manager</a>
                                                    </li>
                                                    <li>
                                                        <a style="margin: 10px;color: black;font-size: 15px;display: block" tabindex="-1" href="{{ url('ProgramContoh') }}">Seluruh Karyawan</a>
                                                    </li>
                                                    <li>
                                                        <a style="margin: 10px;color: black;font-size: 15px;display: block" tabindex="-1" href="{{ url('ProgramContoh') }}">Karyawan Skorsing</a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li>
                                                <a style="margin: 10px;color: black;font-size: 15px;display: block" tabindex="-1" href="{{ url('ProgramContoh') }}">Daftar Tunjangan Haid</a>
                                            </li>
                                            <li>
                                                <a style="margin: 10px;color: black;font-size: 15px;display: block" tabindex="-1" href="{{ url('ProgramContoh') }}">Slip</a>
                                            </li>
                                            <li>
                                                <a style="margin: 10px;color: black;font-size: 15px;display: block" tabindex="-1" href="{{ url('ProgramContoh') }}">Lap Lembur Per Minggu &raquo</a>
                                                <ul class="dropdown-menu dropdown-submenu">
                                                    <li>
                                                        <a style="margin: 10px;color: black;font-size: 15px;display: block" tabindex="-1" href="{{ url('ProgramContoh') }}">per Manager</a>
                                                    </li>
                                                    <li>
                                                        <a style="margin: 10px;color: black;font-size: 15px;display: block" tabindex="-1" href="{{ url('ProgramContoh') }}">per Divisi</a>
                                                    </li>

                                                </ul>
                                            </li>
                                            <li>
                                                <a style="margin: 10px;color: black;font-size: 15px;display: block" tabindex="-1" href="{{ url('ProgramContoh') }}">Laporan Khusus per Manager &raquo</a>
                                                <ul class="dropdown-menu dropdown-submenu">
                                                    <li>
                                                        <a style="margin: 10px;color: black;font-size: 15px;display: block" tabindex="-1" href="{{ url('ProgramContoh') }}">Per Divisi</a>
                                                    </li>
                                                    <li>
                                                        <a style="margin: 10px;color: black;font-size: 15px;display: block" tabindex="-1" href="{{ url('ProgramContoh') }}">Per Group</a>
                                                    </li>

                                                </ul>
                                            </li>
                                            <li>
                                                <a style="margin: 10px;color: black;font-size: 15px;display: block" tabindex="-1" href="{{ url('ProgramContoh') }}">Daftar Lembur &raquo</a>
                                                <ul class="dropdown-menu dropdown-submenu">
                                                    <li>
                                                        <a style="margin: 10px;color: black;font-size: 15px;display: block" tabindex="-1" href="{{ url('ProgramContoh') }}">Per Divisi</a>
                                                    </li>
                                                    <li>
                                                        <a style="margin: 10px;color: black;font-size: 15px;display: block" tabindex="-1" href="{{ url('ProgramContoh') }}">Per Manager</a>
                                                    </li>
                                                    <li>
                                                        <a style="margin: 10px;color: black;font-size: 15px;display: block" tabindex="-1" href="{{ url('ProgramContoh') }}">Jumlah Pegawai Lembur Per Manager</a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li>
                                                <a style="margin: 10px;color: black;font-size: 15px;display: block" tabindex="-1" href="{{ url('ProgramContoh') }}">Peringatan &raquo</a>
                                                <ul class="dropdown-menu dropdown-submenu">
                                                    <li>
                                                        <a style="margin: 10px;color: black;font-size: 15px;display: block" tabindex="-1" href="{{ url('ProgramContoh') }}">Pegawai Per Divisi</a>
                                                    </li>
                                                    <li>
                                                        <a style="margin: 10px;color: black;font-size: 15px;display: block" tabindex="-1" href="{{ url('ProgramContoh') }}">Per Pegawai</a>
                                                    </li>
                                                    <li>
                                                        <a style="margin: 10px;color: black;font-size: 15px;display: block" tabindex="-1" href="{{ url('ProgramContoh') }}">Pegawai Per Bulan</a>
                                                    </li>
                                                    <li>
                                                        <a style="margin: 10px;color: black;font-size: 15px;display: block" tabindex="-1" href="{{ url('ProgramContoh') }}">Jumlah Per Bulan</a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li>
                                                <a style="margin: 10px;color: black;font-size: 15px;display: block" tabindex="-1" href="{{ url('ProgramContoh') }}">Seragam &raquo</a>
                                                <ul class="dropdown-menu dropdown-submenu">
                                                    <li>
                                                        <a style="margin: 10px;color: black;font-size: 15px;display: block" tabindex="-1" href="{{ url('ProgramContoh') }}">Daftar Cicilan Seragam &raquo</a>
                                                        <ul class="dropdown-menu dropdown-submenu">
                                                            <li>
                                                            <a style="margin: 10px;color: black;font-size: 15px;display: block" tabindex="-1" href="{{ url('ProgramContoh') }}">Per Periodik</a>
                                                            </li>
                                                            <li>
                                                                <a style="margin: 10px;color: black;font-size: 15px;display: block" tabindex="-1" href="{{ url('ProgramContoh') }}">Per Divisi</a>
                                                            </li>
                                                            <li>
                                                                <a style="margin: 10px;color: black;font-size: 15px;display: block" tabindex="-1" href="{{ url('ProgramContoh') }}">Per Manager</a>
                                                            </li>

                                                        </ul>
                                                    </li>
                                                    <li>
                                                        <a style="margin: 10px;color: black;font-size: 15px;display: block" tabindex="-1" href="{{ url('ProgramContoh') }}">Daftar Pegawai Tidak Beli Seragam</a>
                                                    </li>
                                                    <li>
                                                        <a style="margin: 10px;color: black;font-size: 15px;display: block" tabindex="-1" href="{{ url('ProgramContoh') }}">Tanda Terima Penerimaan</a>
                                                    </li>

                                                </ul>
                                            </li>

                                            <li>
                                                <a style="margin: 10px;color: black;font-size: 15px;display: block" tabindex="-1" href="{{ url('ProgramContoh') }}">Daftar Gaji Lama & Gaji Baru</a>
                                            </li>
                                            <li>
                                                <a style="margin: 10px;color: black;font-size: 15px;display: block" tabindex="-1" href="{{ url('ProgramContoh') }}">Jumlah Peg Masuk, Keluar, & Mutasi &raquo</a>
                                                <ul class="dropdown-menu dropdown-submenu">
                                                    <li>
                                                        <a style="margin: 10px;color: black;font-size: 15px;display: block" tabindex="-1" href="{{ url('ProgramContoh') }}">Per Minggu</a>
                                                    </li>
                                                    <li>
                                                        <a style="margin: 10px;color: black;font-size: 15px;display: block" tabindex="-1" href="{{ url('ProgramContoh') }}">Per Bulan</a>
                                                    </li>
                                                    <li>
                                                        <a style="margin: 10px;color: black;font-size: 15px;display: block" tabindex="-1" href="{{ url('ProgramContoh') }}">Kontrak PerBulan</a>
                                                    </li>

                                                </ul>
                                            </li>
                                            <li>
                                                <a style="margin: 10px;color: black;font-size: 15px;display: block" tabindex="-1" href="{{ url('ProgramContoh') }}">Daftar Pegawai Masuk & Keluar</a>
                                            </li>
                                            <li>
                                                <a style="margin: 10px;color: black;font-size: 15px;display: block" tabindex="-1" href="{{ url('ProgramContoh') }}">Jumlah Pegawai Per Manager</a>
                                            </li>
                                            <li>
                                                <a style="margin: 10px;color: black;font-size: 15px;display: block" tabindex="-1" href="{{ url('ProgramContoh') }}">Jumlah Pegawai Kontrak Per Manager</a>
                                            </li>
                                            <li>
                                                <a style="margin: 10px;color: black;font-size: 15px;display: block" tabindex="-1" href="{{ url('ProgramContoh') }}">Daftar 3 Bulan Kerja</a>
                                            </li>
                                            <li>
                                                <a style="margin: 10px;color: black;font-size: 15px;display: block" tabindex="-1" href="{{ url('ProgramContoh') }}">Referensi</a>
                                            </li>
                                            <li>
                                                <a style="margin: 10px;color: black;font-size: 15px;display: block" tabindex="-1" href="{{ url('ProgramContoh') }}">THR &raquo</a>
                                                <ul class="dropdown-menu dropdown-submenu" style="max-height: 200px; overflow-y: auto;">
                                                    <li>
                                                        <a style="margin: 10px;color: black;font-size: 15px;display: block" tabindex="-1" href="{{ url('ProgramContoh') }}">Daftar THR Harian</a>
                                                    </li>
                                                    <li>
                                                        <a style="margin: 10px;color: black;font-size: 15px;display: block" tabindex="-1" href="{{ url('ProgramContoh') }}">Tanda Terima THR</a>
                                                    </li>
                                                    <li>
                                                        <a style="margin: 10px;color: black;font-size: 15px;display: block" tabindex="-1" href="{{ url('ProgramContoh') }}">Rekap THR Harian</a>
                                                    </li>
                                                    <li>
                                                        <a style="margin: 10px;color: black;font-size: 15px;display: block" tabindex="-1" href="{{ url('ProgramContoh') }}">Daftar GoodWill</a>
                                                    </li>
                                                    <li>
                                                        <a style="margin: 10px;color: black;font-size: 15px;display: block" tabindex="-1" href="{{ url('ProgramContoh') }}">Rekap GoodWill</a>
                                                    </li>
                                                    <li>
                                                        <a style="margin: 10px;color: black;font-size: 15px;display: block" tabindex="-1" href="{{ url('ProgramContoh') }}">Tanda Terima THR Lgkp</a>
                                                    </li>
                                                    <li>
                                                        <a style="margin: 10px;color: black;font-size: 15px;display: block" tabindex="-1" href="{{ url('ProgramContoh') }}">Daftar THR Harian Lgkp</a>
                                                    </li>
                                                    <li>
                                                        <a style="margin: 10px;color: black;font-size: 15px;display: block" tabindex="-1" href="{{ url('ProgramContoh') }}">Slip THR Harian</a>
                                                    </li>
                                                </ul>
                                            </li>

                                        </ul>
                                        <li>
                                            <a style="margin: 10px;color: black;font-size: 15px;display: block" tabindex="-1" href="{{ url('ProgramContoh') }}">Daftar Cuti Tahunan</a>
                                        </li>
                                        <li>
                                            <a style="margin: 10px;color: black;font-size: 15px;display: block" tabindex="-1" href="{{ url('ProgramContoh') }}">Koperasi &raquo</a>
                                             <ul class="dropdown-menu dropdown-submenu">
                                                <li>
                                                        <a style="margin: 10px;color: black;font-size: 15px;display: block" tabindex="-1" href="{{ url('ProgramContoh') }}">Slip Potongan Harian</a>
                                                </li>
                                                <li>
                                                        <a style="margin: 10px;color: black;font-size: 15px;display: block" tabindex="-1" href="{{ url('ProgramContoh') }}">Slip Potongan Staff</a>
                                                </li>

                                             </ul>
                                         </li>
                                    </li>




                                </ul>
                            </div>
                            <!-- Hutang Perusahaan -->
                            <div class="dropdown">
                                <a class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false" style="margin: 10px">
                                    Hutang Perusahaan
                                </a>
                                <ul class="dropdown-menu" style="cursor: default">

                                    <li><a class="test"style="margin: 10px;color: black;font-size: 15px;display: block;cursor: default"
                                            tabindex="-1">Master &raquo;</a>

                                        <ul class="dropdown-menu dropdown-submenu">
                                            <li><a style="margin: 10px;color: black;font-size: 15px;display: block"
                                                    tabindex="-1" href="{{ url('ProgramContoh') }}">Staff</a>
                                            </li>
                                            <li><a style="margin: 10px;color: black;font-size: 15px;display: block"
                                                    tabindex="-1" href="{{ url('ProgramContoh') }}">Harian</a>
                                            </li>


                                        </ul>
                                    </li>
                                    <li><a class="test"style="margin: 10px;color: black;font-size: 15px;display: block;cursor: default"
                                            tabindex="-1">Angsuran &raquo;</a>

                                        <ul class="dropdown-menu dropdown-submenu">
                                            <li><a style="margin: 10px;color: black;font-size: 15px;display: block"
                                                    tabindex="-1" href="{{ url('ProgramContoh') }}">Staff</a>
                                            </li>
                                            <li><a style="margin: 10px;color: black;font-size: 15px;display: block"
                                                    tabindex="-1" href="{{ url('ProgramContoh') }}">Harian</a>
                                            </li>

                                        </ul>
                                    </li>

                                </ul>
                            </div>
                            <!-- Maintenance ijin karyawan -->
                            <div class="dropdown">
                                <a class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false" style="margin: 10px">
                                    Maintenance Ijin Karyawan
                                </a>
                                <ul class="dropdown-menu" style="cursor: default">

                                    <li>
                                        <a style="margin: 10px;color: black;font-size: 15px;display: block" tabindex="-1" href="{{ url('ProgramContoh') }}">Form Ijin Karyawan</a>
                                    </li>
                                    <li>
                                        <a style="margin: 10px;color: black;font-size: 15px;display: block" tabindex="-1" href="{{ url('ProgramContoh') }}">Form Koreksi Ijin Karyawan</a>
                                    </li>

                                </ul>
                            </div>

                        </ul>
                    <!-- Right Side Of Navbar -->

                    <!-- Authentication Links -->

                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <script>
        $(document).ready(function() {
            $('.dropdown-submenu a.test').on("click", function(e) {
                $(this).next('ul').toggle();
                e.stopPropagation();
                e.preventDefault();
            });
        });
    </script>
</body>

</html>
