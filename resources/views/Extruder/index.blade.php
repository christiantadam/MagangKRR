@extends('layouts.appExtruder')
@section('content')

<!-- ======= Header ======= -->
<header id="header" class="d-flex align-items-center">
    <div class="container d-flex justify-content-between">

        <div id="logo">
            <h1><a href="/Extruder">Extruder</a></h1>
        </div>

    </div>
</header><!-- End Header -->

<main id="main">
    <!-- ======= Section ======= -->
    <section id="services">
        <div class="container" data-aos="fade-up">
            <div class="row gy-4">

                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="box">
                        <div class="icon"><i class="bi bi-briefcase"></i></div>
                        <h4 class="title"><a href="/Extruder/BeratKomposisi">Berat Komposisi 2</a></h4>
                    </div>
                </div>

                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="box">
                        <div class="icon"><i class="bi bi-card-checklist"></i></div>
                        <h4 class="title"><a href="/Extruder/ExtruderNet">Extruder.Net</a></h4>
                    </div>
                </div>

                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="box">
                        <div class="icon"><i class="bi bi-bar-chart"></i></div>
                        <h4 class="title"><a href="/Extruder/WarehouseTerima">Warehouse Terima KRR2</a></h4>
                    </div>
                </div>

            </div>
        </div>
    </section><!-- End Section -->
</main><!-- End #main -->

@endsection