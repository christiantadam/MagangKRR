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
                    <li class="dropdown"><a href="#"><span>Master</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a href="#" onclick="">Maintenance Komposisi Bahan Tropodo</a></li>
                            <li><a href="#" onclick="">Maintenance Komposisi Bahan Mojosari</a></li>
                            <li><a href="#" onclick="">Maintenance Komposisi Bahan Gedung D Mojosari</a>
                            </li>
                            <li class="dropdown"><a href="#"><span>KITE</span> <i class="bi bi-chevron-right"></i></a>
                                <ul>
                                    <li><a href="#">Master</a></li>
                                    <li><a href="#">Estimasi</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown"><a href="#"><span>Transaksi Tropodo</span> <i
                                class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li class="dropdown"><a href="#"><span>Order</span> <i class="bi bi-chevron-right"></i></a>
                                <ul>
                                    <li><a href="#">Maintenance Order Extruder</a></li>
                                    <li><a href="#">ACC Order</a></li>
                                    <li><a href="#">Maintenance Status Order</a></li>
                                </ul>
                            </li>
                            <li class="dropdown"><a href="#"><span>Konversi</span> <i
                                        class="bi bi-chevron-right"></i></a>
                                <ul>
                                    <li><a href="#">Permohonan Konversi Barang</a></li>
                                    <li><a href="#">ACC Permohonan Konversi</a></li>
                                </ul>
                            </li>
                            <li class="dropdown"><a href="#"><span>Sortir Benang NG</span> <i
                                        class="bi bi-chevron-right"></i></a>
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
                    <li class="dropdown"><a href="#"><span>Transaksi Gedung B MJS</span> <i
                                class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li class="dropdown"><a href="#"><span>Order</span> <i class="bi bi-chevron-right"></i></a>
                                <ul>
                                    <li><a href="#">Maintenance Order</a></li>
                                    <li><a href="#">ACC Order</a></li>
                                    <li><a href="#">Maintenance Status Order</a></li>
                                </ul>
                            </li>
                            <li class="dropdown"><a href="#"><span>Konversi</span> <i
                                        class="bi bi-chevron-right"></i></a>
                                <ul>
                                    <li><a href="#">Permohonan Konversi</a></li>
                                    <li><a href="#">ACC Konversi</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown"><a href="#"><span>Transaksi Gedung D MJS</span> <i
                                class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li class="dropdown"><a href="#"><span>Order</span> <i class="bi bi-chevron-right"></i></a>
                                <ul style="transition: 0.3s; left: -75%;">
                                    <li><a href="#">Maintenance Order</a></li>
                                    <li><a href="#">ACC Order</a></li>
                                    <li><a href="#">Maintenance Status Order</a></li>
                                </ul>
                            </li>
                            <li class="dropdown"><a href="#"><span>Konversi</span> <i
                                        class="bi bi-chevron-right"></i></a>
                                <ul style="transition: 0.3s; left: -75%;">
                                    <li><a href="#">Permohonan Konversi Barang</a></li>
                                    <li><a href="#">ACC Permohonan Konversi</a></li>
                                </ul>
                            </li>
                            <li class="dropdown"><a href="#"><span>Sortir Benang NG</span> <i
                                        class="bi bi-chevron-right"></i></a>
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
            <h2>Extruder.Net</h2>
        </div>

        <div id="komposisi_tropodo" class="form" data-aos="fade-up">
            <form action="#" method="post">

                <div class="row mt-3">
                    <div class="col-md-6 form-group">
                        <label for="id_komposisi">Id Komposisi:</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="id_komposisi1">
                            <input type="text" class="form-control" name="id_komposisi2">
                            <button type="button" class="btn btn-outline-secondary">...</button>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 form-group">
                        <label for="id_komposisi">Mesin:</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="mesin1">
                            <input type="text" class="form-control" name="mesin2">
                            <button type="button" class="btn btn-outline-secondary">...</button>
                        </div>
                    </div>
                </div>

                <div style="width: 100%; overflow-x: auto;">
                    <table class="table mt-5" style="table-layout: fixed;">
                        <colgroup>
                            <col style="width: 300px;">
                            <col style="width: 125px;">
                            <col style="width: 125px;">
                            <col style="width: 125px;">
                            <col style="width: 125px;">
                            <col style="width: 125px;">
                            <col style="width: 125px;">
                        </colgroup>
                        <thead>
                            <tr>
                                <th>Nama Type</th>
                                <th class="text-center">Qty Primer</th>
                                <th class="text-center">Sat Primer</th>
                                <th class="text-center">Qty Sekunder</th>
                                <th class="text-center">Sat Sekunder</th>
                                <th class="text-center">Qty Tertier</th>
                                <th class="text-center">Sat Tertier</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Data 1</td>
                                <td class="text-center">10</td>
                                <td class="text-center">kg</td>
                                <td class="text-center">5</td>
                                <td class="text-center">kg</td>
                                <td class="text-center">3</td>
                                <td class="text-center">kg</td>
                            </tr>
                            <tr>
                                <td>Data 2</td>
                                <td class="text-center">8</td>
                                <td class="text-center">kg</td>
                                <td class="text-center">4</td>
                                <td class="text-center">kg</td>
                                <td class="text-center">2</td>
                                <td class="text-center">kg</td>
                            </tr>
                            <tr>
                                <td>Data 3</td>
                                <td class="text-center">15</td>
                                <td class="text-center">kg</td>
                                <td class="text-center">6</td>
                                <td class="text-center">kg</td>
                                <td class="text-center">1</td>
                                <td class="text-center">kg</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </form>
        </div>

    </div>

</main><!-- End #main -->

@endsection