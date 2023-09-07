<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
    <script>
        var msg = '{{ Session::get('alert') }}';
        var exist = '{{ Session::has('alert') }}';
        if (exist) {
            alert(msg);
        }
    </script>
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
    <link href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css" rel="stylesheet">
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
                                                    tabindex="-1" href="{{ url('KaryawanHarian') }}">Harian</a>
                                            </li>
                                            <li><a style="margin: 10px;color: black;font-size: 15px;display: block"
                                                    tabindex="-1" href="{{ url('KaryawanKeluarga') }}">Keluarga</a>
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
                                                    tabindex="-1" href="{{ url('settingDivisiHarian') }}">Harian</a></li>
                                            <li><a style="margin: 10px;color: black;font-size: 15px;display: block"
                                                    tabindex="-1" href="{{ url('settingDivisiStaff') }}">Staff</a>
                                            </li>

                                        </ul>
                                    </li>

                                    <li><a class="test"style="margin: 10px;color: black;font-size: 15px;display: block;cursor: default"
                                            tabindex="-1" href="{{ url('MasterNomer') }}">Nomer</a>
                                    </li>
                                    <li><a class="test"style="margin: 10px;color: black;font-size: 15px;display: block;cursor: default"
                                            tabindex="-1" href="{{ url('MasterKartu') }}">Kartu</a>
                                    </li>
                                    <li><a class="test"style="margin: 10px;color: black;font-size: 15px;display: block;cursor: default"
                                            tabindex="-1" href="{{ url('settingShift') }}">Setting Shift</a>
                                    </li>
                                    <li><a class="test"style="margin: 10px;color: black;font-size: 15px;display: block;cursor: default"
                                            tabindex="-1" href="{{ url('MasterKlinik') }}">Klinik</a>
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
                                            tabindex="-1" href="{{ url('TambahAgenda') }}">Tambah Agenda</a>
                                    </li>
                                    <li><a class="test"style="margin: 10px;color: black;font-size: 15px;display: block;cursor: default"
                                            tabindex="-1" href="{{ url('UbahAgenda') }}">Ubah Agenda</a>
                                    </li>
                                    <li><a class="test"style="margin: 10px;color: black;font-size: 15px;display: block;cursor: default"
                                            tabindex="-1" href="{{ url('HariBesar') }}">Hari Libur & Besar</a>
                                    </li>

                                    <li><a class="test"
                                            style="margin: 10px;color: black;font-size: 15px;display: block;cursor: default"
                                            tabindex="-1">Ganti Shift &raquo;</a>

                                        <ul class="dropdown-menu dropdown-submenu">
                                            <li><a style="margin: 10px;color: black;font-size: 15px;display: block"
                                                    tabindex="-1" href="{{ url('GantiShift/Aturan1_3') }}">Aturan 1_3</a></li>
                                            <li><a style="margin: 10px;color: black;font-size: 15px;display: block"
                                                    tabindex="-1" href="{{ url('ProgramPayroll/Agenda/GantiShift/Aturan2') }}">Aturan 2</a>
                                            </li>

                                        </ul>
                                    </li>

                                    <li><a class="test"style="margin: 10px;color: black;font-size: 15px;display: block;cursor: default"
                                            tabindex="-1" href="{{ url('KoreksiShift') }}">Koreksi Shift Per Periode</a>
                                    </li>
                                    <li><a class="test"style="margin: 10px;color: black;font-size: 15px;display: block;cursor: default"
                                            tabindex="-1" href="{{ url('InsertPegawaiBaru') }}">Insert Agenda Pegawai Baru</a>
                                    </li>
                                    <li><a class="test"style="margin: 10px;color: black;font-size: 15px;display: block;cursor: default"
                                            tabindex="-1" href="{{ url('InsertSupervisor') }}">Insert Agenda Supervisor</a>
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
                                            tabindex="-1" href="{{ url('ProgramPayroll/Transaksi/InputCheckClock') }}">Input Checkclock Nganjuk</a>
                                    </li>
                                    <li><a class="test"style="margin: 10px;color: black;font-size: 15px;display: block;cursor: default"
                                            tabindex="-1" href="{{ url('ProgramPayroll/Transaksi/TransferAbsen') }}">Transfer Absen</a>
                                    </li>
                                    <li><a class="test"style="margin: 10px;color: black;font-size: 15px;display: block;cursor: default"
                                            tabindex="-1" href="{{ url('ProgramPayroll/Transaksi/VerifikasiAbsen') }}">Verifikasi Absen</a>
                                    </li>
                                    <li><a class="test"style="margin: 10px;color: black;font-size: 15px;display: block;cursor: default"
                                            tabindex="-1" href="{{ url('AbsenSimpang') }}">Absen Simpang</a>
                                    </li>
                                    <li><a class="test"style="margin: 10px;color: black;font-size: 15px;display: block;cursor: default"
                                            tabindex="-1" href="{{ url('Kontrak') }}">Perpanjangan/Pembaharuan Kontrak</a>
                                    </li>
                                    <li><a class="test"style="margin: 10px;color: black;font-size: 15px;display: block;cursor: default"
                                            tabindex="-1" href="{{ url('KoreksiAbsen') }}">Koreksi Absen</a>
                                    </li>
                                    <li><a class="test"style="margin: 10px;color: black;font-size: 15px;display: block;cursor: default"
                                            tabindex="-1" href="{{ url('ProgramPayroll/Transaksi/InputLibur') }}">Input Libur/Masuk Pegawai</a>
                                    </li>
                                    <li><a class="test"style="margin: 10px;color: black;font-size: 15px;display: block;cursor: default"
                                            tabindex="-1" href="{{ url('InputRange') }}">Input Range</a>
                                    </li>
                                    <li><a class="test"style="margin: 10px;color: black;font-size: 15px;display: block;cursor: default"
                                            tabindex="-1" href="{{ url('ProgramPayroll/Transaksi/Lembur') }}">Lembur</a>
                                    </li>
                                    <li><a class="test"style="margin: 10px;color: black;font-size: 15px;display: block;cursor: default"
                                            tabindex="-1" href="{{ url('ProgramPayroll/Transaksi/CheckClockError') }}">Check Clock Error</a>
                                    </li>
                                    <li><a class="test"style="margin: 10px;color: black;font-size: 15px;display: block;cursor: default"
                                            tabindex="-1" href="{{ url('ProgramPayroll/Transaksi/CheckClockInOut') }}">Check Clock Masuk Keluar</a>
                                    </li>
                                    <li><a class="test"style="margin: 10px;color: black;font-size: 15px;display: block;cursor: default"
                                            tabindex="-1" href="{{ url('ProgramPayroll/Transaksi/MaintenancePelatihan') }}">Maintenance Pelatihan</a>
                                    </li>
                                    <li><a class="test"style="margin: 10px;color: black;font-size: 15px;display: block;cursor: default"
                                            tabindex="-1" href="{{ url('ProgramPayroll/Transaksi/MaintenanceKoreksi') }}">Koreksi</a>
                                    </li>
                                    <li><a class="test"style="margin: 10px;color: black;font-size: 15px;display: block;cursor: default"
                                            tabindex="-1" href="{{ url('ProgramPayroll/Transaksi/Koperasi') }}">Koperasi</a>
                                    </li>

                                    <li><a class="test"style="margin: 10px;color: black;font-size: 15px;display: block;cursor: default"
                                            tabindex="-1">Mutasi &raquo;</a>

                                        <ul class="dropdown-menu dropdown-submenu">
                                            <li><a style="margin: 10px;color: black;font-size: 15px;display: block"
                                                    tabindex="-1" href="{{ url('ProgramPayroll/Transaksi/Mutasi/Harian') }}">Harian</a>
                                            </li>
                                            <li><a style="margin: 10px;color: black;font-size: 15px;display: block"
                                                    tabindex="-1" href="{{ url('ProgramPayroll/Transaksi/Mutasi/Staff') }}">Staff</a>
                                            </li>
                                            <li><a style="margin: 10px;color: black;font-size: 15px;display: block"
                                                    tabindex="-1" href="{{ url('ProgramPayroll/Transaksi/Mutasi/Histori') }}">Histori Mutasi</a>
                                            </li>

                                        </ul>
                                    </li>
                                    <li><a class="test"style="margin: 10px;color: black;font-size: 15px;display: block;cursor: default"
                                            tabindex="-1" href="{{ url('ProgramPayroll/Transaksi/MaintenanceResign') }}">Resign</a>
                                    </li>
                                    <li><a class="test"style="margin: 10px;color: black;font-size: 15px;display: block;cursor: default"
                                            tabindex="-1" href="{{ url('ProgramPayroll/Transaksi/KenaikanUpah') }}">Kenaikan Upah</a>
                                    </li>
                                    <li><a class="test"style="margin: 10px;color: black;font-size: 15px;display: block;cursor: default"
                                            tabindex="-1" href="{{ url('ProgramPayroll/Transaksi/Absen1') }}">Absen > 1</a>
                                    </li>
                                    <li><a class="test"style="margin: 10px;color: black;font-size: 15px;display: block;cursor: default"
                                            tabindex="-1" >Skorsing &raquo;</a>

                                        <ul class="dropdown-menu dropdown-submenu">
                                            <li><a style="margin: 10px;color: black;font-size: 15px;display: block"
                                                    tabindex="-1" href="{{ url('ProgramPayroll/Transaksi/Skorsing/Permohonan') }}">Permohonan</a>
                                            </li>
                                            <li><a style="margin: 10px;color: black;font-size: 15px;display: block"
                                                    tabindex="-1" href="{{ url('ProgramPayroll/Transaksi/Skorsing/AccBayar') }}">ACC Bayar</a>
                                            </li>


                                        </ul>
                                    </li>
                                    <li><a class="test"style="margin: 10px;color: black;font-size: 15px;display: block;cursor: default"
                                            tabindex="-1">Peringatan &raquo;</a>

                                        <ul class="dropdown-menu dropdown-submenu">
                                            <li><a style="margin: 10px;color: black;font-size: 15px;display: block"
                                                    tabindex="-1" href="{{ url('ProgramPayroll/Transaksi/Peringatan/Permohonan') }}">Permohonan</a>
                                            </li>
                                            <li><a style="margin: 10px;color: black;font-size: 15px;display: block"
                                                    tabindex="-1" href="{{ url('ProgramPayroll/Transaksi/Peringatan/AccPermohonan') }}">Acc Permohonan</a>
                                            </li>


                                        </ul>
                                    </li>
                                    <li><a class="test"style="margin: 10px;color: black;font-size: 15px;display: block;cursor: default"
                                            tabindex="-1">Copy Gaji To. TXT</a>
                                    </li>
                                    <li><a class="test"style="margin: 10px;color: black;font-size: 15px;display: block;cursor: default"
                                            tabindex="-1" href="{{ url('ProgramPayroll/Transaksi/Rekap') }}">Proses Rekap Absen & Lembur</a>
                                    </li>
                                    <li><a class="test"style="margin: 10px;color: black;font-size: 15px;display: block;cursor: default"
                                            tabindex="-1" href="{{ url('ProgramPayroll/Transaksi/EstimasiGaji') }}">Estimasi Gaji</a>
                                    </li>
                                    <li><a class="test"style="margin: 10px;color: black;font-size: 15px;display: block;cursor: default"
                                            tabindex="-1" href="{{ url('ProgramPayroll/Transaksi/HitGajiHarian') }}">Hit Gaji Harian</a>
                                    </li>
                                    <li><a class="test"style="margin: 10px;color: black;font-size: 15px;display: block;cursor: default"
                                            tabindex="-1" href="{{ url('ProgramPayroll/Transaksi/HitTHRHarian') }}">Hit THR Harian</a>
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
                                                    tabindex="-1" href="{{ url('ProgramPayroll/Laporan/Absen/LaporanAbnormal') }}">Laporan Absen Abnormal</a>
                                            </li>
                                            <li><a style="margin: 10px;color: black;font-size: 15px;display: block"
                                                    tabindex="-1" href="{{ url('ProgramPayroll/Laporan/Absen/DaftarLembur') }}">Daftar Lembur By Supervisor (X)</a>
                                            </li>

                                        </ul>
                                    </li>
                                    <!-- Staff -->
                                    <li><a class="test"style="margin: 10px;color: black;font-size: 15px;display: block;cursor: default"
                                            tabindex="-1">Staff &raquo;</a>

                                        <ul class="dropdown-menu dropdown-submenu">
                                            <li><a style="margin: 10px;color: black;font-size: 15px;display: block"
                                                    tabindex="-1" href="{{ url('ProgramPayroll/Laporan/Staff/FormDaftarHadir') }}">Form Daftar Hadir</a>
                                            </li>
                                            <li>
                                                <a style="margin: 10px;color: black;font-size: 15px;display: block" tabindex="-1" href="">Absensi Karyawan &raquo</a>
                                                <ul class="dropdown-menu dropdown-submenu">
                                                    <li>
                                                        <a style="margin: 10px;color: black;font-size: 15px;display: block" tabindex="-1" href="{{ url('ProgramPayroll/Laporan/Staff/AbsensiKaryawan/RekapAbsen') }}">Rekap Absen Per Periodik</a>
                                                    </li>
                                                    <li>
                                                        <a style="margin: 10px;color: black;font-size: 15px;display: block" tabindex="-1" href="{{ url('ProgramPayroll/Laporan/Staff/AbsensiKaryawan/CetakDetailAbsen') }}">Cetak Detail Absen Per Periodik</a>
                                                    </li>
                                                    <li>
                                                        <a style="margin: 10px;color: black;font-size: 15px;display: block" tabindex="-1" href="{{ url('ProgramPayroll/Laporan/Staff/AbsensiKaryawan/RekapPerolehanASI') }}">Rekap Perolehan ASI</a>
                                                    </li>

                                                </ul>
                                            </li>
                                            <li>
                                                <a style="margin: 10px;color: black;font-size: 15px;display: block" tabindex="-1" href="{{ url('ProgramContoh') }}">Lembur &raquo</a>
                                                <ul class="dropdown-menu dropdown-submenu">
                                                    <li>
                                                        <a style="margin: 10px;color: black;font-size: 15px;display: block" tabindex="-1" href="{{ url('ProgramPayroll/Laporan/Staff/Lembur/LemburPerDivisi') }}">Lembur Per Divisi</a>
                                                    </li>
                                                    <li>
                                                        <a style="margin: 10px;color: black;font-size: 15px;display: block" tabindex="-1" href="{{ url('ProgramPayroll/Laporan/Staff/Lembur/LemburPerManager') }}">Lembur Per Manager</a>
                                                    </li>
                                                    <li>
                                                        <a style="margin: 10px;color: black;font-size: 15px;display: block" tabindex="-1" href="{{ url('ProgramPayroll/Laporan/Staff/Lembur/DetailLembur') }}">Detail Lembur Per Bulan</a>
                                                    </li>

                                                </ul>
                                            </li>
                                            <li>
                                                <a style="margin: 10px;color: black;font-size: 15px;display: block" tabindex="-1" href="{{ url('ProgramContoh') }}">Hutang &raquo</a>
                                                <ul class="dropdown-menu dropdown-submenu">
                                                    <li>
                                                        <a style="margin: 10px;color: black;font-size: 15px;display: block" tabindex="-1" href="{{ url('ProgramPayroll/Laporan/Staff/Hutang/KartuHutang') }}">Kartu Hutang</a>
                                                    </li>
                                                    <li>
                                                        <a style="margin: 10px;color: black;font-size: 15px;display: block" tabindex="-1" href="{{ url('ProgramPayroll/Laporan/Staff/Hutang/HutangKoperasi') }}">Hutang Koperasi</a>
                                                    </li>
                                                    <li>
                                                        <a style="margin: 10px;color: black;font-size: 15px;display: block" tabindex="-1" href="{{ url('ProgramPayroll/Laporan/Staff/Hutang/AngsuranKoperasi') }}">Angsuran Koperasi</a>
                                                    </li>
                                                    <li>
                                                        <a style="margin: 10px;color: black;font-size: 15px;display: block" tabindex="-1" href="{{ url('ProgramPayroll/Laporan/Staff/Hutang/DaftarPelunasan') }}">Daftar Pelunasan Hutang</a>
                                                    </li>
                                                    <!-- Tambahkan submenu tambahan di sini jika diperlukan -->
                                                </ul>
                                            </li>
                                            <li><a style="margin: 10px;color: black;font-size: 15px;display: block;cursor: default" href="{{ url('ProgramPayroll/Laporan/PotonganKoperasi') }}"
                                            tabindex="-1">Potongan Koperasi (Toko)</a>
                                            </li>
                                            <li><a style="margin: 10px;color: black;font-size: 15px;display: block;cursor: default" href="{{ url('ProgramPayroll/Laporan/DaftarPotongan') }}"
                                                    tabindex="-1">Daftar Potongan SPTSK & Iuran Koperasi</a>
                                            </li>
                                            <li><a style="margin: 10px;color: black;font-size: 15px;display: block;cursor: default" href="{{ url('ProgramPayroll/Laporan/JumlahPegawai') }}"
                                                    tabindex="-1">Jumlah Pegawai</a>
                                            </li>
                                            <li><a style="margin: 10px;color: black;font-size: 15px;display: block;cursor: default" href="{{ url('ProgramPayroll/Laporan/AngsuranBajuSeragam') }}"
                                                    tabindex="-1">Angsuran Baju Seragam</a>
                                            </li>

                                        </ul>
                                    </li>
                                    <!-- Harian -->
                                    <li><a class="test"style="margin: 10px;color: black;font-size: 15px;display: block;cursor: default"
                                            tabindex="-1">Harian &raquo;</a>

                                        <ul class="dropdown-menu dropdown-submenu">
                                            <li>
                                                <a style="margin: 10px;color: black;font-size: 15px;display: block" tabindex="-1" href="{{ url('ProgramPayroll/Laporan/DaftarHadir') }}">Daftar Hadir</a>
                                            </li>

                                            <li>
                                                <a style="margin: 10px;color: black;font-size: 15px;display: block" tabindex="-1">Daftar Absensi &raquo</a>
                                                <ul class="dropdown-menu dropdown-submenu">
                                                    <li>
                                                        <a style="margin: 10px;color: black;font-size: 15px;display: block" tabindex="-1" href="{{ url('ProgramPayroll/Laporan/AbsensiPerHari') }}">perHari</a>
                                                    </li>
                                                    <li>
                                                        <a style="margin: 10px;color: black;font-size: 15px;display: block" tabindex="-1" href="{{ url('ProgramPayroll/Laporan/AbsensiPerMinggu') }}">perMinggu</a>
                                                    </li>
                                                    <li>
                                                        <a style="margin: 10px;color: black;font-size: 15px;display: block" tabindex="-1" href="{{ url('ProgramPayroll/Laporan/AbsensiPerBulan') }}">perBulan</a>
                                                    </li>
                                                    <li>
                                                        <a style="margin: 10px;color: black;font-size: 15px;display: block" tabindex="-1" href="{{ url('ProgramPayroll/Laporan/AbsensiPerTahun') }}">perTahun</a>
                                                    </li>

                                                </ul>
                                            </li>
                                            <li>
                                                <a style="margin: 10px;color: black;font-size: 15px;display: block" tabindex="-1">Daftar Upah Harian &raquo</a>
                                                <ul class="dropdown-menu dropdown-submenu">
                                                    <li>
                                                        <a style="margin: 10px;color: black;font-size: 15px;display: block" tabindex="-1" href="{{ url('ProgramPayroll/Laporan/UpahHarianManager') }}">Per Manager</a>
                                                    </li>
                                                    <li>
                                                        <a style="margin: 10px;color: black;font-size: 15px;display: block" tabindex="-1" href="{{ url('ProgramPayroll/Laporan/UpahHarianDivisi') }}">Per Divisi</a>
                                                    </li>

                                                </ul>
                                            </li>
                                            <li>
                                                <a style="margin: 10px;color: black;font-size: 15px;display: block" tabindex="-1">Tanda Terima Upah Pegawai &raquo</a>
                                                <ul class="dropdown-menu dropdown-submenu">
                                                    <li>
                                                        <a style="margin: 10px;color: black;font-size: 15px;display: block" tabindex="-1" href="{{ url('ProgramPayroll/Laporan/UpahPerManager') }}">Per Manager</a>
                                                    </li>
                                                    <li>
                                                        <a style="margin: 10px;color: black;font-size: 15px;display: block" tabindex="-1" href="{{ url('ProgramPayroll/Laporan/UpahPerDivisi') }}">Per Divisi</a>
                                                    </li>
                                                    <li>
                                                        <a style="margin: 10px;color: black;font-size: 15px;display: block" tabindex="-1" href="{{ url('ProgramPayroll/Laporan/UpahSkorsing') }}">Upah Skorsing Terbayar</a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li>
                                                <a style="margin: 10px;color: black;font-size: 15px;display: block" tabindex="-1" href="{{ url('ProgramPayroll/Laporan/LaporanUangMakanKecil') }}">Laporan Uang Makan Kecil</a>
                                            </li>
                                            <li>
                                                <a style="margin: 10px;color: black;font-size: 15px;display: block" tabindex="-1">Daftar Pembayaran SPTSK, JHT, Koperasi &raquo</a>
                                                <ul class="dropdown-menu dropdown-submenu">
                                                    <li>
                                                        <a style="margin: 10px;color: black;font-size: 15px;display: block" tabindex="-1" href="{{ url('ProgramPayroll/Laporan/PembayaranPerManager') }}">Per Manager</a>
                                                    </li>
                                                    <li>
                                                        <a style="margin: 10px;color: black;font-size: 15px;display: block" tabindex="-1" href="{{ url('ProgramPayroll/Laporan/SeluruhKaryawan') }}">Seluruh Karyawan</a>
                                                    </li>
                                                    <li>
                                                        <a style="margin: 10px;color: black;font-size: 15px;display: block" tabindex="-1" href="{{ url('ProgramPayroll/Laporan/KaryawanSkorsing') }}">Karyawan Skorsing</a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li>
                                                <a style="margin: 10px;color: black;font-size: 15px;display: block" tabindex="-1" href="{{ url('ProgramPayroll/Laporan/DaftarTunjunganHaid') }}">Daftar Tunjangan Haid</a>
                                            </li>
                                            <li>
                                                <a style="margin: 10px;color: black;font-size: 15px;display: block" tabindex="-1" href="{{ url('ProgramPayroll/Laporan/Slip') }}">Slip</a>
                                            </li>
                                            <li>
                                                <a style="margin: 10px;color: black;font-size: 15px;display: block" tabindex="-1">Lap Lembur Per Minggu &raquo</a>
                                                <ul class="dropdown-menu dropdown-submenu">
                                                    <li>
                                                        <a style="margin: 10px;color: black;font-size: 15px;display: block" tabindex="-1" href="{{ url('ProgramPayroll/Laporan/LaporanMingguanPerManager') }}">per Manager</a>
                                                    </li>
                                                    <li>
                                                        <a style="margin: 10px;color: black;font-size: 15px;display: block" tabindex="-1" href="{{ url('ProgramPayroll/Laporan/LaporanMingguanPerDivisi') }}">per Divisi</a>
                                                    </li>

                                                </ul>
                                            </li>
                                            <li>
                                                <a style="margin: 10px;color: black;font-size: 15px;display: block" tabindex="-1">Laporan Khusus per Manager &raquo</a>
                                                <ul class="dropdown-menu dropdown-submenu">
                                                    <li>
                                                        <a style="margin: 10px;color: black;font-size: 15px;display: block" tabindex="-1" href="{{ url('ProgramPayroll/Laporan/LaporanPerDivisi') }}">Per Divisi</a>
                                                    </li>
                                                    <li>
                                                        <a style="margin: 10px;color: black;font-size: 15px;display: block" tabindex="-1" href="{{ url('ProgramPayroll/Laporan/LaporanPerGroup') }}">Per Group</a>
                                                    </li>

                                                </ul>
                                            </li>
                                            <li>
                                                <a style="margin: 10px;color: black;font-size: 15px;display: block" tabindex="-1">Daftar Lembur &raquo</a>
                                                <ul class="dropdown-menu dropdown-submenu">
                                                    <li>
                                                        <a style="margin: 10px;color: black;font-size: 15px;display: block" tabindex="-1" href="{{ url('ProgramPayroll/Laporan/PerDivisiLembur') }}">Per Divisi</a>
                                                    </li>
                                                    <li>
                                                        <a style="margin: 10px;color: black;font-size: 15px;display: block" tabindex="-1" href="{{ url('ProgramPayroll/Laporan/PerManagerLembur') }}">Per Manager</a>
                                                    </li>
                                                    <li>
                                                        <a style="margin: 10px;color: black;font-size: 15px;display: block" tabindex="-1" href="{{ url('ProgramPayroll/Laporan/JumlahPegawaiLemburPerManager') }}">Jumlah Pegawai Lembur Per Manager</a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li>
                                                <a style="margin: 10px;color: black;font-size: 15px;display: block" tabindex="-1">Peringatan &raquo</a>
                                                <ul class="dropdown-menu dropdown-submenu">
                                                    <li>
                                                        <a style="margin: 10px;color: black;font-size: 15px;display: block" tabindex="-1" href="{{ url('ProgramPayroll/Laporan/PegawaiPerDivisi') }}">Pegawai Per Divisi</a>
                                                    </li>
                                                    <li>
                                                        <a style="margin: 10px;color: black;font-size: 15px;display: block" tabindex="-1" href="{{ url('ProgramPayroll/Laporan/PerPegawai') }}">Per Pegawai</a>
                                                    </li>
                                                    <li>
                                                        <a style="margin: 10px;color: black;font-size: 15px;display: block" tabindex="-1" href="{{ url('ProgramPayroll/Laporan/PegawaiPerBulan') }}">Pegawai Per Bulan</a>
                                                    </li>
                                                    <li>
                                                        <a style="margin: 10px;color: black;font-size: 15px;display: block" tabindex="-1" href="{{ url('ProgramPayroll/Laporan/JumlahPerBulan') }}">Jumlah Per Bulan</a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li>
                                                <a style="margin: 10px;color: black;font-size: 15px;display: block" tabindex="-1">Seragam &raquo</a>
                                                <ul class="dropdown-menu dropdown-submenu">
                                                    <li>
                                                        <a style="margin: 10px;color: black;font-size: 15px;display: block" tabindex="-1">Daftar Cicilan Seragam &raquo</a>
                                                        <ul class="dropdown-menu dropdown-submenu">
                                                            <li>
                                                            <a style="margin: 10px;color: black;font-size: 15px;display: block" tabindex="-1" href="{{ url('ProgramPayroll/Laporan/PerPeriodik') }}">Per Periodik</a>
                                                            </li>
                                                            <li>
                                                                <a style="margin: 10px;color: black;font-size: 15px;display: block" tabindex="-1" href="{{ url('ProgramPayroll/Laporan/PerDivisi') }}">Per Divisi</a>
                                                            </li>
                                                            <li>
                                                                <a style="margin: 10px;color: black;font-size: 15px;display: block" tabindex="-1" href="{{ url('ProgramPayroll/Laporan/PerManager') }}">Per Manager</a>
                                                            </li>

                                                        </ul>
                                                    </li>
                                                    <li>
                                                        <a style="margin: 10px;color: black;font-size: 15px;display: block" tabindex="-1" href="{{ url('ProgramPayroll/Laporan/DaftarPegawaiTidakBeliSeragam') }}">Daftar Pegawai Tidak Beli Seragam</a>
                                                    </li>
                                                    <li>
                                                        <a style="margin: 10px;color: black;font-size: 15px;display: block" tabindex="-1" href="{{ url('ProgramPayroll/Laporan/TandaTerimaPenerimaan') }}">Tanda Terima Penerimaan</a>
                                                    </li>

                                                </ul>
                                            </li>

                                            <li>
                                                <a style="margin: 10px;color: black;font-size: 15px;display: block" tabindex="-1" href="{{ url('ProgramPayroll/Laporan/DaftarGajiLamaBaru') }}">Daftar Gaji Lama & Gaji Baru</a>
                                            </li>
                                            <li>
                                                <a style="margin: 10px;color: black;font-size: 15px;display: block" tabindex="-1">Jumlah Peg Masuk, Keluar, & Mutasi &raquo</a>
                                                <ul class="dropdown-menu dropdown-submenu">
                                                    <li>
                                                        <a style="margin: 10px;color: black;font-size: 15px;display: block" tabindex="-1" href="{{ url('ProgramPayroll/Laporan/Perminggu') }}">Per Minggu</a>
                                                    </li>
                                                    <li>
                                                        <a style="margin: 10px;color: black;font-size: 15px;display: block" tabindex="-1" href="{{ url('ProgramPayroll/Laporan/Perbulan') }}">Per Bulan</a>
                                                    </li>
                                                    <li>
                                                        <a style="margin: 10px;color: black;font-size: 15px;display: block" tabindex="-1" href="{{ url('ProgramPayroll/Laporan/KontrakPerbulan') }}">Kontrak PerBulan</a>
                                                    </li>

                                                </ul>
                                            </li>
                                            <li>
                                                <a style="margin: 10px;color: black;font-size: 15px;display: block" tabindex="-1" href="{{ url('ProgramPayroll/Laporan/DaftarPegawaiMasukKeluar') }}">Daftar Pegawai Masuk & Keluar</a>
                                            </li>
                                            <li>
                                                <a style="margin: 10px;color: black;font-size: 15px;display: block" tabindex="-1" href="{{ url('ProgramPayroll/Laporan/JumlahPegawaiPerManager') }}">Jumlah Pegawai Per Manager</a>
                                            </li>
                                            <li>
                                                <a style="margin: 10px;color: black;font-size: 15px;display: block" tabindex="-1" href="{{ url('ProgramPayroll/Laporan/JumlahPegawaiKontrak') }}">Jumlah Pegawai Kontrak Per Manager</a>
                                            </li>
                                            <li>
                                                <a style="margin: 10px;color: black;font-size: 15px;display: block" tabindex="-1" href="{{ url('ProgramPayroll/Laporan/Daftar3BulanKerja') }}">Daftar 3 Bulan Kerja</a>
                                            </li>
                                            <li>
                                                <a style="margin: 10px;color: black;font-size: 15px;display: block" tabindex="-1" href="{{ url('ProgramPayroll/Laporan/Refrensi') }}">Referensi</a>
                                            </li>
                                            <li>
                                                <a style="margin: 10px;color: black;font-size: 15px;display: block" tabindex="-1">THR &raquo</a>
                                                <ul class="dropdown-menu dropdown-submenu" style="max-height: 200px; overflow-y: auto;">
                                                    <li>
                                                        <a style="margin: 10px;color: black;font-size: 15px;display: block" tabindex="-1" href="{{ url('ProgramPayroll/Laporan/DaftarTHRHarian') }}">Daftar THR Harian</a>
                                                    </li>
                                                    <li>
                                                        <a style="margin: 10px;color: black;font-size: 15px;display: block" tabindex="-1" href="{{ url('ProgramPayroll/Laporan/TandaTerimaTHR') }}">Tanda Terima THR</a>
                                                    </li>
                                                    <li>
                                                        <a style="margin: 10px;color: black;font-size: 15px;display: block" tabindex="-1" href="{{ url('ProgramPayroll/Laporan/RekapTHRHarian') }}">Rekap THR Harian</a>
                                                    </li>
                                                    <li>
                                                        <a style="margin: 10px;color: black;font-size: 15px;display: block" tabindex="-1" href="{{ url('ProgramPayroll/Laporan/DaftarGoodWill') }}">Daftar GoodWill</a>
                                                    </li>
                                                    <li>
                                                        <a style="margin: 10px;color: black;font-size: 15px;display: block" tabindex="-1" href="{{ url('ProgramPayroll/Laporan/RekapGoodWill') }}">Rekap GoodWill</a>
                                                    </li>
                                                    <li>
                                                        <a style="margin: 10px;color: black;font-size: 15px;display: block" tabindex="-1" href="{{ url('ProgramPayroll/Laporan/TandaTerimaTHRLgkp') }}">Tanda Terima THR Lgkp</a>
                                                    </li>
                                                    <li>
                                                        <a style="margin: 10px;color: black;font-size: 15px;display: block" tabindex="-1" href="{{ url('ProgramPayroll/Laporan/DaftarTHRHarianLgkp') }}">Daftar THR Harian Lgkp</a>
                                                    </li>
                                                    <li>
                                                        <a style="margin: 10px;color: black;font-size: 15px;display: block" tabindex="-1" href="{{ url('ProgramPayroll/Laporan/SlipTHRHarian') }}">Slip THR Harian</a>
                                                    </li>
                                                </ul>
                                            </li>

                                        </ul>
                                        <li>
                                            <a style="margin: 10px;color: black;font-size: 15px;display: block" tabindex="-1" href="{{ url('ProgramPayroll/Laporan/DCT') }}">Daftar Cuti Tahunan</a>
                                        </li>
                                        <li>
                                            <a style="margin: 10px;color: black;font-size: 15px;display: block" tabindex="-1">Koperasi &raquo</a>
                                             <ul class="dropdown-menu dropdown-submenu">
                                                <li>
                                                        <a style="margin: 10px;color: black;font-size: 15px;display: block" tabindex="-1" href="{{ url('ProgramPayroll/Laporan/SPH') }}">Slip Potongan Harian</a>
                                                </li>
                                                <li>
                                                        <a style="margin: 10px;color: black;font-size: 15px;display: block" tabindex="-1" href="{{ url('ProgramPayroll/Laporan/SPS') }}">Slip Potongan Staff</a>
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
                                                    tabindex="-1" href="{{ url('ProgramPayroll/Angsuran/Hutang') }}">Staff</a>
                                            </li>
                                            <li><a style="margin: 10px;color: black;font-size: 15px;display: block"
                                                    tabindex="-1" href="{{ url('ProgramPayroll/Angsuran/HutangHarian') }}">Harian</a>
                                            </li>


                                        </ul>
                                    </li>
                                    <li><a class="test"style="margin: 10px;color: black;font-size: 15px;display: block;cursor: default"
                                            tabindex="-1">Angsuran &raquo;</a>

                                        <ul class="dropdown-menu dropdown-submenu">
                                            <li><a style="margin: 10px;color: black;font-size: 15px;display: block"
                                                    tabindex="-1" href="{{ url('ProgramPayroll/Angsuran/AngsuranStaff') }}">Staff</a>
                                            </li>
                                            <li><a style="margin: 10px;color: black;font-size: 15px;display: block"
                                                    tabindex="-1" href="{{ url('ProgramPayroll/Angsuran/AngsuranHutang') }}">Harian</a>
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
                                        <a style="margin: 10px;color: black;font-size: 15px;display: block" tabindex="-1" href="{{ url('ProgramPayroll/Maintenance/Fik') }}">Form Ijin Karyawan</a>
                                    </li>
                                    <li>
                                        <a style="margin: 10px;color: black;font-size: 15px;display: block" tabindex="-1" href="{{ url('ProgramPayroll/Maintenance/Fkik') }}">Form Koreksi Ijin Karyawan</a>
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
