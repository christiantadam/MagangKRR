<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('/images/KRR.png') }}" type="image/gif" sizes="16x16">
    <title style="font-size: 20px">{{ config('app.name', 'Laravel') }}</title>

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
    <link href="{{ asset('css/accounting.css') }}" rel="stylesheet">
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
                    {{ config('app.name', 'Laravel') }}
                </a>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav mr-auto RDZNavContenCenter">
                            <div class="dropdown">
                                <a class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false" style="margin: 10px">
                                    Master
                                </a>
                                <ul class="dropdown-menu" style=" ">
                                    <li><a class="test"style=" color: black;font-size: 14px;display: block; "
                                            tabindex="-1"  href="{{ url('MaintenanceBank') }}">Maintenance Bank </a>
                                    </li>

                                    <li><a class="test"
                                            style=" color: black;font-size: 14px;display: block; "
                                            tabindex="-1" href="{{ url('MaintenanceMataUang') }}">Maintenance Mata Uang</a>
                                    </li>

                                    <li><a class="test"style="  color: black;font-size: 14px;display: block; "
                                            tabindex="-1" href="{{ url('MaintenanceStatusSupplier') }}">Maintenance Status Supplier </a>
                                    </li>
                                </ul>
                            </div>


                            <!-- Hutang -->

                            <div class="dropdown">
                                <a class="dropdown-toggle " type="button" id="dropdownMenuButton" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false" style="margin: 10px">
                                    Hutang
                                </a>
                                <ul class="dropdown-menu " style=" ">
                                    <li><a class="test"style=" color: black;font-size: 14px;display: block; "
                                            tabindex="-1" href="{{ url('MaintenancePenagihan') }}">Maintenance Penagihan</a>
                                    </li>

                                    <li><a class="test"
                                            style="color: black;font-size: 14px;display: block; "
                                            tabindex="-1" href="{{ url('BatalPenagihan') }}">Batal Penagihan</a>
                                    </li>

                                    <li><a class="test"style="color: black;font-size: 14px;display: block; "
                                            tabindex="-1" href="{{ url('UpdatePIB') }}">Update PIB </a>
                                    </li>

                                    <li><a class="test"style=" color: black;font-size: 14px;display: block; "
                                            tabindex="-1" href="{{ url('ACCSerahTerimaPenagihan') }}">Maintenance ACC Serah Terima Penagihan </a>
                                    </li>

                                    <li><a class="test"style=" color: black;font-size: 14px;display: block; "
                                            tabindex="-1" href="{{ url('PenagihandiRETUR') }}">Maintenance Penagihan di RETUR </a>
                                    </li>

                                    <li><a class="test"style=" color: black;font-size: 14px;display: block; "
                                            tabindex="-1" href="{{ url('PelunasanHutang') }}">Maintenance Pelunasan Hutang </a>
                                    </li>

                                    <li><a class="test"style=" color: black;font-size: 14px;display: block; "
                                            tabindex="-1" href="{{ url('MaintenanceJurnalBeli') }}">Maintenance Jurnal </a>
                                    </li>

                                    <li><a class="test"style=" color: black;font-size: 14px;display: block; "
                                            tabindex="-1" href="{{ url('RekapHutang') }}">Rekap Hutang </a>
                                    </li>

                                    <li><a class="test"style=" color: black;font-size: 14px;display: block; "
                                            tabindex="-1" href="{{ url('PenyesuaianSaldoSupplier') }}">Penyesuaian Saldo Supplier </a>
                                    </li>

                                    <li><a class="test"style=" color: black;font-size: 14px;display: block; "
                                            tabindex="-1" href="{{ url('PengajuanBKK') }}">Maintenance Pengajuan BKK </a>
                                    </li>

                                    <li><a class="test"style=" color: black;font-size: 14px;display: block; "
                                            tabindex="-1" href="{{ url('ACCBKK') }}">Maintenance ACC BKK </a>
                                    </li>

                                    <li><a class="test"style=" color: black;font-size: 14px;display: block; "
                                            tabindex="-1" href="{{ url('MaintenanceBKK') }}">Maintenance BKK (KRR2) </a>
                                    </li>

                                    <li><a class="test"style=" color: black;font-size: 14px;display: block; "
                                            tabindex="-1" href="{{ url('MaintenanceTTKRR1') }}">Maintenance TT (KRR1) </a>
                                    </li>

                                    <li><a class="test"style=" color: black;font-size: 14px;display: block; "
                                            tabindex="-1" href="{{ url('ACCBayarTT') }}">Maintenance ACC Bayar TT (KRR1) </a>
                                    </li>

                                    <li><a class="test"style=" color: black;font-size: 14px;display: block; "
                                            tabindex="-1" href="{{ url('MaintenanceBKKKRR1') }}">Maintenance BKK (KRR1) </a>
                                    </li>

                                    <li><a class="test"style=" color: black;font-size: 14px;display: block; "
                                            tabindex="-1" href="{{ url('MaintenanceBKMKRR1') }}">Maintenance BKM (KRR1) </a>
                                    </li>

                                    <li><a class="test"style=" color: black;font-size: 14px;display: block; "
                                            tabindex="-1" href="{{ url('KodePerkiraanBKK') }}">Maintenance Kode Perkiraan BKK </a>
                                    </li>

                                    <li><a class="test"style=" color: black;font-size: 14px;display: block; "
                                            tabindex="-1" href="{{ url('MaintenanceKursBKK') }}">Maintenance Kurs BKK</a>
                                    </li>

                                    <li><a class="test"style=" color: black;font-size: 14px;display: block; "
                                            tabindex="-1" href="{{ url('BatalBKK') }}">Batal BKK </a>
                                    </li>

                                    <li><a class="test"style=" color: black;font-size: 14px;display: block; "
                                            tabindex="-1" href="{{ url('UraianBKK') }}">Maintenance Uraian BKK </a>
                                    </li>
                                </ul>
                            </div>

                            <!--Piutang-->

                            <div class="dropdown">
                                <a class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false" style="margin: 10px">
                                    Piutang
                                </a>
                                <ul class="dropdown-menu" style=" ">
                                    <li><a class="test"style=" color: black;font-size: 14px;display: block;"
                                            tabindex="-1" href="{{ url('MaintenanceBKMPenagihan') }}">Maintenance BKM Penagihan </a>
                                    </li>

                                    <li><a class="test"
                                            style=" color: black;font-size: 14px;display: block;"
                                            tabindex="-1" href="{{ url('BKMNoPenagihan') }}">Maintenance BKM No Penagihan </a>
                                    </li>

                                    <li><a class="test"style="  color: black;font-size: 14px;display: block; "
                                            tabindex="-1">Maintenance BKM Cash Advance &raquo;</a>
                                        <ul class="dropdown-menu dropdown-submenu">
                                            <li><a style="margin: 10px;color: black;font-size: 14px;display: block"
                                                    tabindex="-1" href="{{ url('CreateBKM') }}">Create BKM</a>
                                            </li>
                                            <li><a style="margin: 10px;color: black;font-size: 14px;display: block"
                                                    tabindex="-1" href="{{ url('UpdateDetailBKM') }}">Update Detail BKM</a>
                                            </li>
                                        </ul>
                                    </li>

                                    <li><a class="test"
                                            style=" color: black;font-size: 14px;display: block; "
                                            tabindex="-1" href="{{ url('BKMTransitorisBank') }}">Maintenance BKM Transitoris Bank </a>
                                    </li>

                                    <li><a class="test"
                                            style=" color: black;font-size: 14px;display: block; "
                                            tabindex="-1">Batal BKM Transitoris </a>
                                    </li>

                                    <li><a class="test"
                                            style=" color: black;font-size: 14px;display: block; "
                                            tabindex="-1">Maintenance BKM-BKK Pembulatan </a>
                                    </li>

                                    <li><a class="test"
                                            style=" color: black;font-size: 14px;display: block; "
                                            tabindex="-1">Maintenance BKM DP Utk Pelunasan </a>
                                    </li>

                                    <li><a class="test"
                                            style=" color: black;font-size: 14px;display: block; "
                                            tabindex="-1">Maintenance BKM-BKK Nota Kredit </a>
                                    </li>

                                    <li><a class="test"
                                            style=" color: black;font-size: 14px;display: block; "
                                            tabindex="-1">Maintenance BKM LC </a>
                                    </li>

                                    <li><a class="test"
                                            style=" color: black;font-size: 14px;display: block; "
                                            tabindex="-1">Maintenance BKM Pengembalian K.E. </a>
                                    </li>

                                    <li><a class="test"
                                            style=" color: black;font-size: 14px;display: block; "
                                            tabindex="-1">Maintenance Update Kurs BKM $$ </a>
                                    </li>

                                    <li><a class="test"
                                            style=" color: black;font-size: 14px;display: block; "
                                            tabindex="-1">Maintenance Kode Perkiraan BKM </a>
                                    </li>

                                    <li><a class="test"
                                            style=" color: black;font-size: 14px;display: block; "
                                            tabindex="-1">Informasi Bank &raquo;</a>
                                            <ul class="dropdown-menu dropdown-submenu">
                                            <li><a style="margin: 10px;color: black;font-size: 14px;display: block"
                                                    tabindex="-1" href="{{ url('/') }}">Maintenance Informasi Bank</a>
                                            </li>
                                            <li><a style="margin: 10px;color: black;font-size: 14px;display: block"
                                                    tabindex="-1"
                                                    href="{{ url('/') }}">Analisa Informasi Bank</a>
                                            </li>
                                        </ul>
                                    </li>

                                    <li><a class="test"
                                            style=" color: black;font-size: 14px;display: block; "
                                            tabindex="-1">Maintenance Penjualan Lokal &raquo;</a>
                                            <ul class="dropdown-menu dropdown-submenu">
                                            <li><a style="margin: 10px;color: black;font-size: 14px;display: block"
                                                    tabindex="-1" href="{{ url('/') }}">Faktur Uang Muka</a>
                                            </li>
                                            <li><a style="margin: 10px;color: black;font-size: 14px;display: block"
                                                    tabindex="-1"
                                                    href="{{ url('/') }}">Penagihan Penjualan</a>
                                            </li>
                                        </ul>
                                    </li>

                                    <li><a class="test"
                                            style=" color: black;font-size: 14px;display: block; "
                                            tabindex="-1">Maintenance Nota Penjualan Tunai </a>
                                    </li>

                                    <li><a class="test"
                                            style=" color: black;font-size: 14px;display: block; "
                                            tabindex="-1">Update Surat Jalan U/ Jual Tunai </a>
                                    </li>

                                    <li><a class="test"
                                            style=" color: black;font-size: 14px;display: block; "
                                            tabindex="-1">Acc Penagihan Penjualan </a>
                                    </li>

                                    <li><a class="test"
                                            style=" color: black;font-size: 14px;display: block; "
                                            tabindex="-1">Status Dokumen Tagihan </a>
                                    </li>

                                    <li><a class="test"
                                            style=" color: black;font-size: 14px;display: block; "
                                            tabindex="-1">Acc Penagihan Penjualan Eksport </a>
                                    </li>

                                    <li><a class="test"
                                            style=" color: black;font-size: 14px;display: block; "
                                            tabindex="-1">Maintenance Pelunasan Penjualan </a>
                                    </li>

                                    <li><a class="test"
                                            style=" color: black;font-size: 14px;display: block; "
                                            tabindex="-1">Pelunasan Penjualan Cash Advance </a>
                                    </li>

                                    <li><a class="test"
                                            style=" color: black;font-size: 14px;display: block; "
                                            tabindex="-1">Analisa Status Penjualan </a>
                                    </li>

                                    <li><a class="test"
                                            style=" color: black;font-size: 14px;display: block; "
                                            tabindex="-1">Maintenance Nota Kredit &raquo;</a>
                                            <ul class="dropdown-menu dropdown-submenu">
                                            <li><a style="margin: 10px;color: black;font-size: 15px;display: block"
                                                    tabindex="-1" href="{{ url('/') }}">Nota Kredit Retur</a>
                                            </li>
                                            <li><a style="margin: 10px;color: black;font-size: 14px;display: block"
                                                    tabindex="-1"
                                                    href="{{ url('/') }}">Pot Harga</a>
                                            </li>
                                            <li><a style="margin: 10px;color: black;font-size: 14px;display: block"
                                                    tabindex="-1" href="{{ url('/') }}">Free</a>
                                            </li>
                                            <li><a style="margin: 10px;color: black;font-size: 14px;display: block"
                                                    tabindex="-1"
                                                    href="{{ url('/') }}">Kelebihan Bayar u/ Jual Tunai</a>
                                            </li>
                                            <li><a style="margin: 10px;color: black;font-size: 14px;display: block"
                                                    tabindex="-1"
                                                    href="{{ url('/') }}">Selisih Timbang</a>
                                            </li>
                                        </ul>
                                    </li>

                                    <li><a class="test"
                                            style=" color: black;font-size: 14px;display: block; "
                                            tabindex="-1">Acc Nota Kredit </a>
                                    </li>

                                    <li><a class="test"
                                            style=" color: black;font-size: 14px;display: block; "
                                            tabindex="-1">Maintenance BKK Nota Kredit &raquo;</a>
                                            <ul class="dropdown-menu dropdown-submenu">
                                            <li><a style="margin: 10px;color: black;font-size: 14px;display: block"
                                                    tabindex="-1" href="{{ url('/') }}">Pengajuan</a>
                                            </li>
                                            <li><a style="margin: 10px;color: black;font-size: 14px;display: block"
                                                    tabindex="-1"
                                                    href="{{ url('/') }}">ACC Pengajuan</a>
                                            </li>
                                            <li><a style="margin: 10px;color: black;font-size: 14px;display: block"
                                                    tabindex="-1" href="{{ url('/') }}">Create BKK</a>
                                            </li>
                                        </ul>
                                    </li>

                                </ul>
                            </div>

                            <!--Trans Bank-->

                            <div class="dropdown">
                                <a class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false" style="margin: 10px">
                                    Trans Bank
                                </a>
                                <ul class="dropdown-menu" style=" ">
                                    <li><a class="test"style=" color: black;font-size: 15px;display: block; "
                                            tabindex="-1">BKK </a>
                                    </li>

                                    <li><a class="test"
                                            style=" color: black;font-size: 14px;display: block; "
                                            tabindex="-1">BKM </a>
                                    </li>
                                </ul>
                            </div>

                            <!--Informasi-->

                            <div class="dropdown">
                                <a class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false" style="margin: 10px">
                                    Informasi
                                </a>
                                <ul class="dropdown-menu" style=" ">
                                    <li><a class="test"style=" color: black;font-size: 14px;display: block; "
                                            tabindex="-1">Cek Nota & Faktur </a>
                                    </li>
                                    <li><a class="test"style=" color: black;font-size: 14px;display: block; "
                                            tabindex="-1">Cetak Nota Kredit </a>
                                    </li>
                                    <li><a class="test"
                                            style=" color: black;font-size: 14px;display: block; "
                                            tabindex="-1">Soplang </a>
                                    </li>
                                    <li><a class="test"
                                            style=" color: black;font-size: 14px;display: block; "
                                            tabindex="-1">Rekap Piutang </a>
                                    </li>
                                    <li><a class="test"
                                            style=" color: black;font-size: 1px;display: block; "
                                            tabindex="-1">Kartu Hutang </a>
                                    </li>
                                </ul>
                            </div>

                            <!--Exit-->

                            <div class="dropdown">
                                <a class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false" style="margin: 10px">
                                    Exit
                                </a>
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
