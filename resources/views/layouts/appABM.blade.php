<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="icon" href="{{ asset('/images/KRR.png') }}" type="image/gif" sizes="16x16">
        <title style="font-size: 20px">ABM</title>

        <style>
            .form-wrapper {
                display: flex;
                justify-content: center;
            }

            .form-container {
                max-width: 600px;
                width: 100%;
            }

            .form-group {
                display: flex;
                align-items: center;
            }

            .aligned-text {
                margin-right: 10px;
            }

            .mt-3 {
                margin-top: 15px;
            }

            .mt-4 {
                margin-top: 30px;
            }

            .mt-auto {
                margin-left: 30px;
                margin-right: 30px;
                margin-top: 50px;
            }

            .mt-md-0 {
                margin-top: 0;
            }

            .text-center {
                text-align: center;
            }

            .row.justify-content-md-center {
                justify-content: center;
                width: 2000px;
            }

            button[type="submit"] {
                background-color: #4CAF50;
                color: white;
                padding: 8px 12px;
                border: none;
                border-radius: 4px;
                cursor: pointer;
            }
        </style>

        <!-- Scripts -->
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="{{ asset('js/app.js') }}"></script>
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
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/datatables.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/buttons.dataTables.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/Rdz.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet"
            href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    </head>
<body onload="Greeting()">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow sticky-top">
            <div class="container col-md-12">
                <a class="navbar-brand RDZNavBrandCenter RDZUnderLine" href="{{ url('ABM') }}">
                    <img src="{{ asset('/images/KRR.png') }}" width="55" height="50" alt="KRR">
                    {{ config('app.name', 'ABM') }}
                </a>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto RDZNavContenCenter">
                        <li class="dropdown">
                            <a class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false" style="margin: 10px">
                                Barcode Kerta2
                            </a>
                            <ul class="dropdown-menu" style="cursor: default">
                                <li>
                                    <a class="test"
                                        style="margin: 10px;color: black;font-size: 15px;display: block;cursor: default"
                                        tabindex="-1" href="{{ url('ABM/Schedule') }}">Schedule </a>
                                </li>
                                <li>
                                    <a class="test"
                                        style="margin: 10px;color: black;font-size: 15px;display: block;cursor: default"
                                        tabindex="-1" href="{{ url('ABM/Buat-Barcode') }}">Buat Barcode </a>
                                </li>
                                <li>
                                    <a class="test"
                                        style="margin: 10px; color: black;font-size: 15px;display: block;cursor: default"
                                        tabindex="-1" href="{{ url('ABM/Repress') }}">Repress </a>
                                </li>
                                <li>
                                    <a class="test"
                                        style="margin: 10px; color: black;font-size: 15px;display: block;cursor: default"
                                        tabindex="-1" href="{{ url('ABM/CBR') }}">Cetak Barcode Rusak </a>
                                </li>
                                <li>
                                    <a class="test"
                                        style="margin: 10px; color: black;font-size: 15px;display: block;cursor: default"
                                        tabindex="-1" href="{{ url('ABM/Hanguskan-Barcode') }}">Hanguskan Barcode </a>
                                </li>
                                <li>
                                    <a class="test"
                                        style="margin: 10px; color: black;font-size: 15px;display: block;cursor: default"
                                        tabindex="-1" href="{{ url('ABM/Kirim-Gudang') }}">Kirim Gudang </a>
                                </li>
                                <li>
                                    <a class="test"
                                        style="margin: 10px; color: black;font-size: 15px;display: block;cursor: default"
                                        tabindex="-1" href="{{ url('ABM/Batal-Kirim') }}">Batal Kirim </a>
                                </li>
                                <li>
                                    <a class="test"
                                        style="margin: 10px; color: black;font-size: 15px;display: block;cursor: default"
                                        tabindex="-1" href="{{ url('ABM/Cek-Barcode') }}">Cek Barcode </a>
                                </li>
                                <li>
                                    <a class="test"
                                        style="margin: 10px; color: black;font-size: 15px;display: block;cursor: default"
                                        tabindex="-1" href="{{ url('ABM/CSJ') }}">Cetak Surat Jalan </a>
                                </li>
                                <li>
                                    <a class="test"
                                        style="margin: 10px; color: black;font-size: 15px;display: block;cursor: default"
                                        tabindex="-1" href="{{ url('ABM/Total-Barcode') }}">Total Barcode </a>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false" style="margin: 10px">
                                Barcode Roll Woven
                            </a>
                            <ul class="dropdown-menu" style="cursor: default">
                                <li>
                                    <a class="test"
                                        style="margin: 10px;color: black;font-size: 15px;display: block;cursor: default"
                                        tabindex="-1" href="{{ url('ABM/Buat-Barcode2') }}">Buat Barcode </a>
                                </li>
                                <li>
                                    <a class="test"
                                        style="margin: 10px;color: black;font-size: 15px;display: block;cursor: default"
                                        tabindex="-1" href="{{ url('ABM/BRS') }}">Barcode Roll Sisa </a>
                                </li>
                                <li>
                                    <a class="test"
                                        style="margin: 10px; color: black;font-size: 15px;display: block;cursor: default"
                                        tabindex="-1" href="{{ url('ABM/BBJ') }}">Barcode Barang Jadi </a>
                                </li>
                                <li>
                                    <a class="test"
                                        style="margin: 10px; color: black;font-size: 15px;display: block;cursor: default"
                                        tabindex="-1" href="{{ url('ABM/CBR2') }}">Cetak Barcode Rusak </a>
                                </li>
                                <li>
                                    <a class="test"
                                        style="margin: 10px; color: black;font-size: 15px;display: block;cursor: default"
                                        tabindex="-1" href="{{ url('ABM/Hanguskan-Barcode2') }}">Hanguskan Barcode
                                    </a>
                                </li>
                                <li>
                                    <a class="test"
                                        style="margin: 10px; color: black;font-size: 15px;display: block;cursor: default"
                                        tabindex="-1" href="{{ url('ABM/Kirim-Gudang2') }}">Kirim Gudang </a>
                                </li>
                                <li>
                                    <a class="test"
                                        style="margin: 10px; color: black;font-size: 15px;display: block;cursor: default"
                                        tabindex="-1" href="{{ url('ABM/Kirim-Circular') }}">Kirim Circular </a>
                                </li>
                                <li>
                                    <a class="test"
                                        style="margin: 10px; color: black;font-size: 15px;display: block;cursor: default"
                                        tabindex="-1" href="{{ url('ABM/Batal-Kirim2') }}">Batal Kirim </a>
                                </li>
                                <li>
                                    <a class="test"
                                        style="margin: 10px; color: black;font-size: 15px;display: block;cursor: default"
                                        tabindex="-1" href="{{ url('ABM/Repress2') }}">Repress </a>
                                </li>
                                <li>
                                    <a class="test"
                                        style="margin: 10px; color: black;font-size: 15px;display: block;cursor: default"
                                        tabindex="-1" href="{{ url('ABM/Cek-Barcode2') }}">Cek Barcode </a>
                                </li>
                                <li>
                                    <a class="test"
                                        style="margin: 10px; color: black;font-size: 15px;display: block;cursor: default"
                                        tabindex="-1" href="{{ url('ABM/Penghangusan-Barcode') }}">Penghanguskan
                                        Barcode </a>
                                </li>
                                <li>
                                    <a class="test"
                                        style="margin: 10px; color: black;font-size: 15px;display: block;cursor: default"
                                        tabindex="-1" href="{{ url('ABM/Setting-Timbangan') }}">Setting Timbangan
                                    </a>
                                </li>
                                <li>
                                    <a class="test"
                                        style="margin: 10px; color: black;font-size: 15px;display: block;cursor: default"
                                        tabindex="-1" href="{{ url('ABM/MSD') }}">Mutasi Satu Divisi </a>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false" style="margin: 10px">
                                Laporan Serah Terima
                            </a>
                            <ul class="dropdown-menu" style="cursor: default">
                                <li>
                                    <a class="test"
                                        style="margin: 10px;color: black;font-size: 15px;display: block;cursor: default"
                                        tabindex="-1" href="{{ url('ABM/LST') }}">LST </a>
                                </li>
                            </ul>
                        <li>
                    </ul>
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
