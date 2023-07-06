@extends('layouts.appExtruder')
@section('content')

<!-- ======= Header ======= -->
<header id="header" class="d-flex align-items-center">
    <div class="container d-flex justify-content-between">

        <div id="logo">
            <h1><a href="/Extruder" id="titleKu">Extruder</a></h1>
        </div>

        <nav id="navbar" class="navbar">

            <div id="navbar_full" class="temp">
                <ul>
                    <li class="dropdown"><a href="#"><span>Berat Standar</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a href="#" onclick="showForm('berat_woven', 'Berat Woven')">Berat Woven</a></li>
                            <li><a href="#" onclick="showForm('berat_jumbo', 'Berat Jumbo')">Berat Jumbo</a></li>
                            <li><a href="#" onclick="showForm('berat_adstar', 'Berat AD Star')">Berat AD Star</a>
                            </li>
                            <li><a href="#" onclick="showForm('berat_circular', 'Berat Circular')">Berat
                                    Gelondongan / Woven Kraft</a></li>
                            <li><a href="#" onclick="showForm('berat_assesoris', 'Berat Assesoris')">Berat Assesoris</a>
                            </li>
                            <li><a href="#" onclick="showForm('update_persen', 'Update Persen Toleransi BS')">Update
                                    Persen Toleransi BS</a></li>
                        </ul>
                    </li>
                    <li><a href="#" onclick="showForm('komposisi_konversi', 'Komposisi Konversi')">Komposisi
                            Konversi</a></li>
                    <li class="dropdown"><a href="#"><span>Berat Standar 2</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a href="#" onclick="showForm('berat_woven2', 'Berat Woven 2')">Berat Woven</a></li>
                            <li><a href="#" onclick="showForm('berat_jumbo2', 'Berat Jumbo 2')">Berat Jumbo</a></li>
                            <li><a href="#" onclick="showForm('berat_adstar2', 'Berat AD Star 2')">Berat AD Star</a>
                            </li>
                            <li><a href="#" onclick="showForm('berat_circular2', 'Berat Circular 2')">Berat
                                    Gelondongan / Woven Kraft</a></li>
                            <li><a href="#" onclick="showForm('berat_assesoris2', 'Berat Assesoris 2')">Berat
                                    Assesoris</a>
                            </li>
                        </ul>
                    </li>
                    <li><a href="#" onclick="showForm('konversi_kg', 'Konversi dalam Kg')">Konversi Kg</a></li>
                    <li><a href="#" onclick="showForm('konversi_barang', 'Konversi Barang')">Konversi</a></li>
                    <li><a href="/Extruder">Exit</a></li>
                </ul>
            </div>

            <div id="navbar_exit" class="hidden">
                <ul>
                    <li><a href="#" onclick="hideForm()">Exit</a></li>
                </ul>
            </div>

            <i class="bi bi-list mobile-nav-toggle"></i>

        </nav><!-- .navbar -->

    </div>
</header><!-- End Header -->

<main id="main">

    <div class="container">

        <div id="page_title" class="section-header" data-aos="fade-up">
            <h2>Berat Standar & Komposisi Konversi 2</h2>
        </div>

        <div id="form_berat_standar">
            @include('Extruder.BeratKomposisi.formBeratStandar')
        </div>

        <div id="form_konversi">
            @include('Extruder.BeratKomposisi.formKonversi')
        </div>

        <div id="form_berat_standar2">
            @include('Extruder.BeratKomposisi.formBeratStandar2')
        </div>

    </div>

</main><!-- End #main -->

@endsection