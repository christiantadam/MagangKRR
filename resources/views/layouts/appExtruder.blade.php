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
</head>

<body>
    <!-- ======= Header ======= -->
    <header id="header" class="d-flex align-items-center">
        <div class="container d-flex justify-content-between">

            <div id="logo">
                @if($pageName == 'index')
                <h1><a href="#">Extruder</a></h1>

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

                @else
                <h1><a href="/Extruder">Extruder</a></h1>
                @endif
            </div>

            <nav id="navbar" class="navbar">

                @if($formName == 'index')
                <div id="navbar_full">
                    @if($pageName == 'BeratKomposisi')
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
                        <li><a href="/Extruder">Exit</a></li>
                    </ul>
                    @elseif($pageName == 'ExtruderNet')
                    <ul>
                        <li class="dropdown">
                            <a href="#"><span>Master</span> <i class="bi bi-chevron-down"></i></a>
                            <ul>
                                <li><a href="/Extruder/ExtruderNet/formKomposisiTropodo" onclick="">Maintenance
                                        Komposisi Bahan Tropodo</a></li>
                                <li><a href="/Extruder/ExtruderNet/formKomposisiMojosari" onclick="">Maintenance
                                        Komposisi Bahan Mojosari</a></li>
                                <li><a href="/Extruder/ExtruderNet/formKomposisiGedungD" onclick="">Maintenance
                                        Komposisi Bahan Gedung D Mojosari</a>
                                </li>
                                <li class="dropdown"><a href="#"><span>KITE</span> <i class="bi bi-chevron-right"></i></a>
                                    <ul>
                                        <li><a href="/Extruder/ExtruderNet/formKiteMaster">Master</a></li>
                                        <li><a href="/Extruder/ExtruderNet/formKiteEstimasi">Estimasi</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#"><span>Transaksi Tropodo</span> <i class="bi bi-chevron-down"></i></a>
                            <ul>
                                <li class="dropdown">
                                    <a href="#"><span>Order</span> <i class="bi bi-chevron-right"></i></a>
                                    <ul>
                                        <li><a href="#">Maintenance Order Extruder</a></li>
                                        <li><a href="#">ACC Order</a></li>
                                        <li><a href="#">Maintenance Status Order</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown">
                                    <a href="#"><span>Konversi</span> <i class="bi bi-chevron-right"></i></a>
                                    <ul>
                                        <li><a href="#">Permohonan Konversi Barang</a></li>
                                        <li><a href="#">ACC Permohonan Konversi</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown">
                                    <a href="#"><span>Sortir Benang NG</span> <i class="bi bi-chevron-right"></i></a>
                                    <ul>
                                        <li><a href="#">Permohonan Sortir Benang NG</a></li>
                                        <li><a href="#">ACC Sortir Benang NG</a></li>
                                    </ul>
                                </li>
                                <li><a href="#" onclick="">Pencatatan Gangguan Produksi</a>
                                <li><a href="#" onclick="">Pencatatan KwaH Produksi</a>
                                <li><a href="#" onclick="">Pencatatan Efisiensi</a>
                                <li><a href="#" onclick="">Perawatan</a>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#"><span>Transaksi Gedung B MJS</span> <i class="bi bi-chevron-down"></i></a>
                            <ul>
                                <li class="dropdown">
                                    <a href="#"><span>Order</span> <i class="bi bi-chevron-right"></i></a>
                                    <ul>
                                        <li><a href="#">Maintenance Order</a></li>
                                        <li><a href="#">ACC Order</a></li>
                                        <li><a href="#">Maintenance Status Order</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown">
                                    <a href="#"><span>Konversi</span> <i class="bi bi-chevron-right"></i></a>
                                    <ul>
                                        <li><a href="#">Permohonan Konversi</a></li>
                                        <li><a href="#">ACC Konversi</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#"><span>Transaksi Gedung D MJS</span> <i class="bi bi-chevron-down"></i></a>
                            <ul>
                                <li class="dropdown">
                                    <a href="#"><span>Order</span> <i class="bi bi-chevron-right"></i></a>
                                    <ul style="transition: 0.3s; left: -75%;">
                                        <li><a href="#">Maintenance Order</a></li>
                                        <li><a href="#">ACC Order</a></li>
                                        <li><a href="#">Maintenance Status Order</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown">
                                    <a href="#"><span>Konversi</span> <i class="bi bi-chevron-right"></i></a>
                                    <ul style="transition: 0.3s; left: -75%;">
                                        <li><a href="#">Permohonan Konversi Barang</a></li>
                                        <li><a href="#">ACC Permohonan Konversi</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown">
                                    <a href="#"><span>Sortir Benang NG</span> <i class="bi bi-chevron-right"></i></a>
                                    <ul style="transition: 0.3s; left: -75%;">
                                        <li><a href="#">Permohonan Sortir Benang NG</a></li>
                                        <li><a href="#">ACC Sortir Benang NG</a></li>
                                    </ul>
                                </li>
                                <li><a href="#" onclick="">Pencatatan Gangguan Produksi</a>
                                <li><a href="#" onclick="">Pencatatan KwaH Produksi</a>
                                <li><a href="#" onclick="">Pencatatan Efisiensi</a>
                                <li><a href="#" onclick="">Perawatan</a>
                            </ul>
                        </li>
                        <li><a href="/Extruder">Exit</a></li>
                    </ul>
                    @endif
                </div>
                @else
                <div id="navbar_exit">
                    @if($pageName == 'BeratKomposisi')
                    <ul>
                        <li><a href="/Extruder/BeratKomposisi">Exit</a></li>
                    </ul>
                    @elseif($pageName == 'ExtruderNet')
                    <ul>
                        <li><a href="/Extruder/ExtruderNet">Exit</a></li>
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