<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Extruder</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('css/extruder_style.css') }}" rel="stylesheet">

    {{-- jQuery --}}
    <script src="{{ asset('js/jquery-3.7.0.min.js') }}"></script>
</head>

<body>
    <!-- ======= Header ======= -->
    <header id="header" class="d-flex align-items-center justify-content-center">
        @if ($pageName == 'WarehouseTerima' && $formName == 'index')
            <div class="container d-flex justify-content-between" style="margin: 0px;">
            @else
                <div class="container d-flex justify-content-between">
        @endif

        <div id="logo">
            @if ($pageName == 'index')
                <h1><a href="#">Extruder</a></h1>
            @elseif($pageName == 'WarehouseTerima' && $formName == 'index')
                <h1></h1>
            @elseif($formName == 'formBeratWoven')
                <h1><a href="#">Berat Woven</a></h1>
            @elseif($formName == 'formBeratJumbo')
                <h1><a href="#">Berat Jumbo</a></h1>
            @elseif($formName == 'formBeratADStar')
                <h1><a href="#">Berat AD Star</a></h1>
            @elseif($formName == 'formBeratCircular')
                <h1><a href="#">Berat Circular</a></h1>
            @elseif($formName == 'formBeratAssesoris')
                <h1><a href="#">Berat Assesoris</a></h1>
            @elseif($formName == 'formUpdatePersen')
                <h1><a href="#">Update Persen Toleransi BS</a></h1>
            @elseif($formName == 'formBeratWoven2')
                <h1><a href="#">Berat Woven 2</a></h1>
            @elseif($formName == 'formBeratJumbo2')
                <h1><a href="#">Berat Jumbo 2</a></h1>
            @elseif($formName == 'formBeratADStar2')
                <h1><a href="#">Berat AD Star 2</a></h1>
            @elseif($formName == 'formBeratCircular2')
                <h1><a href="#">Berat Circular 2</a></h1>
            @elseif($formName == 'formBeratAssesoris2')
                <h1><a href="#">Berat Assesoris 2</a></h1>
            @elseif($formName == 'formKomposisiKonversi')
                <h1><a href="#">Komposisi Konversi</a></h1>
            @elseif($formName == 'formKonversiKg')
                <h1><a href="#">Konversi dalam Kg</a></h1>
            @elseif($formName == 'formKonversiBarang')
                <h1><a href="#">Konversi Barang</a></h1>
            @elseif($formName == 'formKomposisiTropodo')
                <h1><a href="#">Maintenance Komposisi Bahan Tropodo</a></h1>
            @elseif($formName == 'formKomposisiMojosari')
                <h1><a href="#">Maintenance Komposisi Bahan Mojosari</a></h1>
            @elseif($formName == 'formKomposisiGedungD')
                <h1><a href="#">Maintenance Komposisi Bahan Mojosari Gedung D</a></h1>
            @elseif($formName == 'formKiteMaster')
                <h1><a href="#">Master KITE</a></h1>
            @elseif($formName == 'formKiteEstimasi')
                <h1><a href="#">Estimasi KITE</a></h1>
            @elseif($formName == 'formTropodoOrderMaintenance')
                <h1><a href="#">Maintenance Order Tropodo</a></h1>
            @elseif($formName == 'formTropodoOrderACC')
                <h1><a href="#">ACC Order Tropodo</a></h1>
            @elseif($formName == 'formTropodoOrderStatus')
                <h1><a href="#">Pembatalan Order Tropodo</a></h1>
            @elseif($formName == 'formTropodoKonversiMohon')
                <h1><a href="#">Permohonan Konversi Tropodo</a></h1>
            @elseif($formName == 'formTropodoKonversiACC')
                <h1><a href="#">ACC Konversi Tropodo</a></h1>
            @elseif($formName == 'formTropodoBenangMohon')
                <h1><a href="#">Permohonan Konversi NG Tropodo</a></h1>
            @elseif($formName == 'formTropodoBenangACC')
                <h1><a href="#">ACC Konversi NG Tropodo</a></h1>
            @elseif($formName == 'formTropodoGangguanProduksi')
                <h1><a href="#">Gangguan Produksi Tropodo</a></h1>
            @elseif($formName == 'formTropodoDaya')
                <h1><a href="#">Daya Produksi Tropodo</a></h1>
            @elseif($formName == 'formTropodoEfisiensi')
                <h1><a href="#">Efisiensi Tropodo</a></h1>
            @elseif($formName == 'formTropodoPerawatan')
                <h1><a href="#">Perawatan Tropodo</a></h1>
            @elseif($formName == 'formMojosariOrderMaintenance')
                <h1><a href="#">Maintenance Order Mojosari Gedung B</a></h1>
            @elseif($formName == 'formMojosariOrderACC')
                <h1><a href="#">ACC Order Mojosari Gedung B</a></h1>
            @elseif($formName == 'formMojosariOrderStatus')
                <h1><a href="#">Pembatalan Order Mojosari Gedung B</a></h1>
            @elseif($formName == 'formMojosariKonversiMohon')
                <h1><a href="#">Permohonan Konversi Mojosari Gedung B</a></h1>
            @elseif($formName == 'formMojosariKonversiACC')
                <h1><a href="#">ACC Konversi Mojosari Gedung B</a></h1>
            @elseif($formName == 'formMojosariD_OrderMaintenance')
                <h1><a href="#">Maintenance Order Mojosari Gedung D</a></h1>
            @elseif($formName == 'formMojosariD_OrderACC')
                <h1><a href="#">ACC Order Mojosari Gedung D</a></h1>
            @elseif($formName == 'formMojosariD_OrderStatus')
                <h1><a href="#">Pembatalan Order Mojosari Gedung D</a></h1>
            @elseif($formName == 'formMojosariD_KonversiMohon')
                <h1><a href="#">Permohonan Konversi Mojosari Gedung D</a></h1>
            @elseif($formName == 'formMojosariD_KonversiACC')
                <h1><a href="#">ACC Konversi Mojosari Gedung D</a></h1>
            @elseif($formName == 'formMojosariD_BenangMohon')
                <h1><a href="#">Permohonan Konversi NG Mojosari Gedung D</a></h1>
            @elseif($formName == 'formMojosariD_BenangACC')
                <h1><a href="#">ACC Konversi NG Mojosari Gedung D</a></h1>
            @elseif($formName == 'formMojosariD_GangguanProduksi')
                <h1><a href="#">Gangguan Produksi Mojosari Gedung D</a></h1>
            @elseif($formName == 'formMojosariD_Daya')
                <h1><a href="#">Daya Produksi Mojosari Gedung D</a></h1>
            @elseif($formName == 'formMojosariD_Efisiensi')
                <h1><a href="#">Efisiensi Mojosari Gedung D</a></h1>
            @elseif($formName == 'formMojosariD_Perawatan')
                <h1><a href="#">Perawatan Mojosari Gedung D</a></h1>
            @elseif($formName == 'formScanGelondongan')
                <h1><a href="#">Scan Kirim Barcode Gelondongan</a></h1>
            @elseif($formName == 'formBatalGelondongan')
                <h1><a href="#">Batal Kirim Barcode Gelondongan</a></h1>
            @elseif($formName == 'formScanAssesoris')
                <h1><a href="#">Scan Kirim Barcode Assesoris</a></h1>
            @elseif($formName == 'formBatalAssesoris')
                <h1><a href="#">Batal Kirim Barcode Assesoris</a></h1>
            @elseif($formName == 'formScanKRR2')
                <h1><a href="#">Scan Kirim Barcode Kerta 2</a></h1>
            @elseif($formName == 'formBatalKRR2')
                <h1><a href="#">Batal Kirim Barcode Kerta 2</a></h1>
            @elseif($formName == 'formTerimaKRR2')
                <h1><a href="#">Terima JBN-JBK-JBJ-JBL</a></h1>
            @elseif($formName == 'formStokSetengah')
                <h1><a href="#">Kirim KRR2</a></h1>
            @elseif($formName == 'formCekBarcode')
                <h1><a href="#">Cek Barcode</a></h1>
            @elseif($formName == 'formTerimaPeletan')
                <h1><a href="#">Terima Barang Peletan</a></h1>
            @elseif($formName == 'formGagalPeletan')
                <h1><a href="#">Tidak Tersimpan Peletan</a></h1>
            @else
                <h1><a href="/Extruder">Extruder</a></h1>
            @endif
        </div>

        <nav id="navbar" class="navbar">

            @if ($formName == 'index')
                <div id="navbar_full" class="">
                    @if ($pageName == 'BeratKomposisi')
                        <ul>
                            <li class="dropdown">
                                <a href="#"><span>Berat Standar</span> <i class="bi bi-chevron-down"></i></a>
                                <ul>
                                    <li><a href="/Extruder/BeratKomposisi/formBeratWoven">Berat Woven</a></li>
                                    <li><a href="/Extruder/BeratKomposisi/formBeratJumbo">Berat Jumbo</a></li>
                                    <li><a href="/Extruder/BeratKomposisi/formBeratADStar">Berat AD Star</a>
                                    </li>
                                    <li><a href="/Extruder/BeratKomposisi/formBeratCircular">Berat
                                            Gelondongan / Woven Kraft</a></li>
                                    <li><a href="/Extruder/BeratKomposisi/formBeratAssesoris">Berat Assesoris</a>
                                    </li>
                                    <li><a href="/Extruder/BeratKomposisi/formUpdatePersen">Update
                                            Persen Toleransi BS</a></li>
                                </ul>
                            </li>
                            <li><a href="/Extruder/BeratKomposisi/formKomposisiKonversi">Komposisi
                                    Konversi</a></li>
                            <li class="dropdown">
                                <a href="#"><span>Berat Standar 2</span> <i class="bi bi-chevron-down"></i></a>
                                <ul>
                                    <li><a href="/Extruder/BeratKomposisi/formBeratWoven2">Berat Woven</a></li>
                                    <li><a href="/Extruder/BeratKomposisi/formBeratJumbo2">Berat Jumbo</a></li>
                                    <li><a href="/Extruder/BeratKomposisi/formBeratADStar2">Berat AD Star</a>
                                    </li>
                                    <li><a href="/Extruder/BeratKomposisi/formBeratCircular2">Berat
                                            Gelondongan / Woven Kraft</a></li>
                                    <li><a href="/Extruder/BeratKomposisi/formBeratAssesoris2">Berat Assesoris</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a href="/Extruder/BeratKomposisi/formKonversiKg">Konversi Kg</a></li>
                            <li><a href="/Extruder/BeratKomposisi/formKonversiBarang">Konversi</a></li>
                            <li><a href="/Extruder">Keluar</a></li>
                        </ul>
                    @elseif($pageName == 'ExtruderNet')
                        <ul>
                            <li class="dropdown">
                                <a href="#"><span>Master</span> <i class="bi bi-chevron-down"></i></a>
                                <ul>
                                    <li><a href="/Extruder/ExtruderNet/formKomposisiTropodo">Maintenance
                                            Komposisi Bahan Tropodo</a></li>
                                    <li><a href="/Extruder/ExtruderNet/formKomposisiMojosari">Maintenance
                                            Komposisi Bahan Mojosari</a></li>
                                    <li><a href="/Extruder/ExtruderNet/formKomposisiGedungD">Maintenance
                                            Komposisi Bahan Gedung D Mojosari</a>
                                    </li>
                                    <li class="dropdown"><a href="#"><span>KITE</span> <i
                                                class="bi bi-chevron-right"></i></a>
                                        <ul>
                                            <li><a href="/Extruder/ExtruderNet/formKiteMaster">Master</a></li>
                                            <li><a href="/Extruder/ExtruderNet/formKiteEstimasi">Estimasi</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#"><span>Transaksi Tropodo</span> <i
                                        class="bi bi-chevron-down"></i></a>
                                <ul>
                                    <li class="dropdown">
                                        <a href="#"><span>Order</span> <i class="bi bi-chevron-right"></i></a>
                                        <ul>
                                            <li><a href="/Extruder/ExtruderNet/formTropodoOrderMaintenance">Maintenance
                                                    Order Extruder</a></li>
                                            <li><a href="/Extruder/ExtruderNet/formTropodoOrderACC">ACC Order</a></li>
                                            <li><a href="/Extruder/ExtruderNet/formTropodoOrderStatus">Maintenance
                                                    Status
                                                    Order</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown">
                                        <a href="#"><span>Konversi</span> <i
                                                class="bi bi-chevron-right"></i></a>
                                        <ul>
                                            <li><a href="/Extruder/ExtruderNet/formTropodoKonversiMohon">Permohonan
                                                    Konversi
                                                    Barang</a></li>
                                            <li><a href="/Extruder/ExtruderNet/formTropodoKonversiACC">ACC Permohonan
                                                    Konversi</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown">
                                        <a href="#"><span>Sortir Benang NG</span>
                                            <i class="bi bi-chevron-right"></i></a>
                                        <ul>
                                            <li><a href="/Extruder/ExtruderNet/formTropodoBenangMohon">Permohonan
                                                    Sortir
                                                    Benang NG</a></li>
                                            <li><a href="/Extruder/ExtruderNet/formTropodoBenangACC">ACC Sortir Benang
                                                    NG</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="/Extruder/ExtruderNet/formTropodoGangguanProduksi">Pencatatan Gangguan
                                            Produksi</a>
                                    <li><a href="/Extruder/ExtruderNet/formTropodoDaya">Pencatatan KwaH Produksi</a>
                                    <li><a href="/Extruder/ExtruderNet/formTropodoEfisiensi">Pencatatan Efisiensi</a>
                                    <li><a href="/Extruder/ExtruderNet/formTropodoPerawatan">Perawatan</a>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#"><span>Transaksi Gedung B MJS</span> <i
                                        class="bi bi-chevron-down"></i></a>
                                <ul>
                                    <li class="dropdown">
                                        <a href="#"><span>Order</span> <i class="bi bi-chevron-right"></i></a>
                                        <ul>
                                            <li><a href="/Extruder/ExtruderNet/formMojosariOrderMaintenance">Maintenance
                                                    Order Extruder</a></li>
                                            <li><a href="/Extruder/ExtruderNet/formMojosariOrderACC">ACC Order</a></li>
                                            <li><a href="/Extruder/ExtruderNet/formMojosariOrderStatus">Maintenance
                                                    Status
                                                    Order</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown">
                                        <a href="#"><span>Konversi</span> <i
                                                class="bi bi-chevron-right"></i></a>
                                        <ul>
                                            <li><a href="/Extruder/ExtruderNet/formMojosariKonversiMohon">Permohonan
                                                    Konversi
                                                    Barang</a></li>
                                            <li><a href="/Extruder/ExtruderNet/formMojosariKonversiACC">ACC Permohonan
                                                    Konversi</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#"><span>Transaksi Gedung D MJS</span> <i
                                        class="bi bi-chevron-down"></i></a>
                                <ul>
                                    <li class="dropdown">
                                        <a href="#"><span>Order</span> <i class="bi bi-chevron-right"></i></a>
                                        <ul style="transition: 0.3s; left: -75%;">
                                            <li><a href="/Extruder/ExtruderNet/formMojosariD_OrderMaintenance">Maintenance
                                                    Order Extruder</a></li>
                                            <li><a href="/Extruder/ExtruderNet/formMojosariD_OrderACC">ACC Order</a>
                                            </li>
                                            <li><a href="/Extruder/ExtruderNet/formMojosariD_OrderStatus">Maintenance
                                                    Status
                                                    Order</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown">
                                        <a href="#"><span>Konversi</span> <i
                                                class="bi bi-chevron-right"></i></a>
                                        <ul style="transition: 0.3s; left: -75%;">
                                            <li><a href="/Extruder/ExtruderNet/formMojosariD_KonversiMohon">Permohonan
                                                    Konversi
                                                    Barang</a></li>
                                            <li><a href="/Extruder/ExtruderNet/formMojosariD_KonversiACC">ACC
                                                    Permohonan
                                                    Konversi</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown">
                                        <a href="#"><span>Sortir Benang NG</span>
                                            <i class="bi bi-chevron-right"></i></a>
                                        <ul style="transition: 0.3s; left: -75%;">
                                            <li><a href="/Extruder/ExtruderNet/formMojosariD_BenangMohon">Permohonan
                                                    Sortir
                                                    Benang NG</a></li>
                                            <li><a href="/Extruder/ExtruderNet/formMojosariD_BenangACC">ACC Sortir
                                                    Benang
                                                    NG</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="/Extruder/ExtruderNet/formMojosariD_GangguanProduksi">Pencatatan
                                            Gangguan
                                            Produksi</a>
                                    <li><a href="/Extruder/ExtruderNet/formMojosariD_Daya">Pencatatan KwaH Produksi</a>
                                    <li><a href="/Extruder/ExtruderNet/formMojosariD_Efisiensi">Pencatatan
                                            Efisiensi</a>
                                    <li><a href="/Extruder/ExtruderNet/formMojosariD_Perawatan">Perawatan</a>
                                </ul>
                            </li>
                            <li><a href="/Extruder">Keluar</a></li>
                        </ul>
                    @elseif($pageName == 'WarehouseTerima')
                        <ul class="warehouse" style="border: black solid 3px;">
                            <li><a href="/Extruder/WarehouseTerima/formScanGelondongan">Scan Kirim<br>Gelondongan</a>
                            </li>
                            <li><a href="/Extruder/WarehouseTerima/formBatalGelondongan">Batal Kirim<br>Gelondongan</a>
                            </li>
                            <li><a href="/Extruder/WarehouseTerima/formScanAssesoris">Scan Kirim<br>Assesoris</a></li>
                            <li><a href="/Extruder/WarehouseTerima/formBatalAssesoris">Batal Kirim<br>Assesoris</a>
                            </li>
                            <li><a href="/Extruder/WarehouseTerima/formScanKRR2">Scan Kirim<br>KRR2</a></li>
                            <li><a href="/Extruder/WarehouseTerima/formBatalKRR2">Batal Kirim<br>KRR2</a></li>
                            <li><a href="/Extruder/WarehouseTerima/formCekBarcode">Cek<br>Barcode</a></li>
                            <li><a href="/Extruder/WarehouseTerima/formTerimaKRR2">Terima<br>KRR2</a></li>
                            <li><a href="/Extruder/WarehouseTerima/formStokSetengah">Stok<br>Setengah Jadi</a></li>
                            <li><a href="/Extruder/WarehouseTerima/formTerimaPeletan">Scan Terima<br>Peletan</a></li>
                            <li><a href="/Extruder/WarehouseTerima/formGagalPeletan">Gagal Terima<br>Peletan</a></li>
                            <li><a href="/Extruder">Keluar</a></li>
                        </ul>
                    @endif
                </div>
            @else
                <div id="navbar_exit">
                    @if ($pageName == 'BeratKomposisi')
                        <ul>
                            <li><a href="/Extruder/BeratKomposisi">Keluar</a></li>
                        </ul>
                    @elseif($pageName == 'ExtruderNet')
                        <ul>
                            <li><a href="/Extruder/ExtruderNet">Keluar</a></li>
                        </ul>
                    @elseif($pageName == 'WarehouseTerima')
                        <ul>
                            <li><a href="/Extruder/WarehouseTerima">Keluar</a></li>
                        </ul>
                    @endif
                </div>
            @endif

            <i class="bi bi-list mobile-nav-toggle"></i>

        </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->

    <main id="main">

        <div class="container">
            @yield('content')
        </div>

    </main><!-- End #main -->
</body>

<!-- Vendor JS Files -->
<script src="{{ asset('vendor/aos/aos.js') }}"></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('vendor/glightbox/js/glightbox.min.js') }}"></script>
<script src="{{ asset('vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('vendor/swiper/swiper-bundle.min.js') }}"></script>

<!-- Template Main JS File -->
<script src="{{ asset('js/extruder_main.js') }}"></script>

</html>
