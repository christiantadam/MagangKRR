<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <title>Stop Order Press</title>

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
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/datatables.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/buttons.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/Rdz.css') }}" rel="stylesheet">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />


    <style>
        .body {
            font-family: Arial, sans-serif;
            max-width: px;
            margin: 0 auto;
            padding: 20px;
        }

        h2 {
            text-align: center;
        }

        .card {
            border: 1px solid #ccc;
            padding: 20px;
            border-radius: 5px;
            margin-bottom: 20px;
            background-color: #f9f9f9;
        }

        .card-title {
            font-weight: bold;
            margin-bottom: 10px;
        }

        .input-container {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }

        .input-container label {
            margin-right: 10px;
        }

        .input-container input[type="text"],
        .input-container input[type="number"] {
            flex: 1;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .input-container button {
            margin-left: 10px;
            cursor: pointer;
        }

        .button-container {
            display: flex;
            max-width: 600px;
            justify-content: space-between;
            margin-top: 20px;
            margin-left: 40px;
        }

        .button-container button {
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            color: #fff;
            cursor: pointer;
        }

        .button-container button.ord {
            background-color: #737573;
            max-width: 200px;
        }

        .button-container button.add {
            background-color: #4CAF50;
            max-width: 100px;
        }

        .button-container button.update {
            background-color: #2196F3;
            max-width: 100px;
        }

        .button-container button.del {
            background-color: #f44336;
            max-width: 100px;
        }


        .scrollable-container {
            max-height: 300px;
            overflow-y: auto;
            margin-top: 20px;
        }

        .form-wrapper {
            display: flex;
            justify-content: center;
        }

        .form-container {
            max-width: 800px;
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

        .mt-md-0 {
            margin-top: 0;
        }

        .text-center {
            text-align: center;
        }

        .row.justify-content-md-center {
            justify-content: center;
            width:2000px ;
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
                                    Order & Hasil
                                </a>
                                <ul class="dropdown-menu" style="cursor: default">
                                    <li><a class="test"style="margin: 10px;color: black;font-size: 15px;display: block;cursor: default"
                                            tabindex="-1" onclick="OpenNewTab('{{ url('UpKdBrng') }}');">Update Kd Barang</a>
                                    </li>

                                    <li><a class="test"
                                            style="margin: 10px;color: black;font-size: 15px;display: block;cursor: default"
                                            tabindex="-1" onclick="OpenNewTab('{{ url('MnOrdPrs') }}');">Main Order Press </a>

                                    </li>

                                    <li><a class="test"
                                            style="margin: 10px;color: black;font-size: 15px;display: block;cursor: default"
                                            tabindex="-1" onclick="OpenNewTab('{{ url('StpOrdPrs') }}');">Stop Order Press </a>
                                    </li>

                                    <li><a class="test"
                                            style="margin: 10px;color: black;font-size: 15px;display: block;cursor: default"
                                            tabindex="-1" onclick="OpenNewTab('{{ url('HslPrdPrs') }}');">Hasil Prod Press </a>
                                    </li>

                                </ul>
                            </div>

                            <div class="dropdown">
                                <a class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false" style="margin: 10px">
                                    Tabel Hitungan
                                </a>
                                <ul class="dropdown-menu" style="cursor: default">

                                    <li><a class="test"
                                            style="margin: 10px;color: black;font-size: 15px;display: block;cursor: default"
                                            tabindex="-1">Open Top</a>
                                    </li>

                                    <li><a class="test"
                                            style="margin: 10px;color: black;font-size: 15px;display: block;cursor: default"
                                            tabindex="-1">Close Top</a>
                                    </li>

                                </ul>
                            </div>

                            <div class="dropdown">
                                <a class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false" style="margin: 10px">
                                    Barcode
                                </a>
                                <ul class="dropdown-menu" style="cursor: default">
                                    <li><a class="test"style="margin: 10px;color: black;font-size: 15px;display: block;cursor: default"
                                            tabindex="-1" onclick="OpenNewTab('{{ url('Schedule') }}');">Schedule</a>
                                    </li>

                                    <li><a class="test"
                                            style="margin: 10px;color: black;font-size: 15px;display: block;cursor: default"
                                            tabindex="-1" onclick="OpenNewTab('{{ url('BtBrcd') }}');">Buat Barcode</a>

                                    </li>

                                    <li><a class="test"
                                            style="margin: 10px;color: black;font-size: 15px;display: block;cursor: default"
                                            tabindex="-1" onclick="OpenNewTab('{{ url('Repress') }}');">Repress </a>
                                    </li>

                                    <li><a class="test"
                                            style="margin: 10px;color: black;font-size: 15px;display: block;cursor: default"
                                            tabindex="-1" onclick="OpenNewTab('{{ url('CtkBrcdRsk') }}');">Cetak Barcode Rusak </a>
                                    </li>

                                    <li><a class="test"
                                        style="margin: 10px;color: black;font-size: 15px;display: block;cursor: default"
                                        tabindex="-1" onclick="OpenNewTab('{{ url('DftPlt') }}');">Daftar Palet </a>
                                    </li>

                                    <li><a class="test"
                                            style="margin: 10px;color: black;font-size: 15px;display: block;cursor: default"
                                            tabindex="-1" onclick="OpenNewTab('{{ url('HngsBrcd') }}');">Hanguskan Barcode </a>
                                    </li>

                                    <li><a class="test"
                                        style="margin: 10px;color: black;font-size: 15px;display: block;cursor: default"
                                        tabindex="-1" onclick="OpenNewTab('{{ url('KrmGdng') }}');"> Kirim Gudang </a>
                                    </li>

                                    <li><a class="test"
                                        style="margin: 10px;color: black;font-size: 15px;display: block;cursor: default"
                                        tabindex="-1" onclick="OpenNewTab('{{ url('BtlKrm') }}');">Batal Kirim </a>
                                    </li>

                                    <li><a class="test"
                                        style="margin: 10px;color: black;font-size: 15px;display: block;cursor: default"
                                        tabindex="-1" onclick="OpenNewTab('{{ url('KnvGdng') }}');">Konversi Gudang JBB </a>
                                    </li>

                                    <li><a class="test"
                                        style="margin: 10px;color: black;font-size: 15px;display: block;cursor: default"
                                        tabindex="-1" onclick="OpenNewTab('{{ url('HslBrcd') }}');">Hasil Barcode </a>
                                </li>

                                </ul>
                            </div>

                            <div class="dropdown">
                                <a onclick="OpenNewTab('{{ url('CpTbl') }}');" class="" type="button" id="" data-toggle=""
                                aria-haspopup="true" aria-expanded="false" style="margin: 10px">
                                    Copy Tabel
                                </a>
                            </div>
                            <div class="dropdown">
                                <a href="http://127.0.0.1:8000" class="" type="button" id="" data-toggle=""
                                aria-haspopup="true" aria-expanded="false" style="margin: 10px">
                                    Print
                                </a>
                            </div>
                            <div class="dropdown">
                                <a onclick="OpenNewTab('{{ url('bntkez') }}');" class="" type="button" id="" data-toggle=""
                                aria-haspopup="true" aria-expanded="false" style="margin: 10px">
                                    Bantu Kez
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

    <h2>Permohonan Barcode</h2>

    <div class="card-body-container" style="display: flex; flex-wrap: nowrap;">
        <div class="card-body" style="flex: 1; margin-right: -20px; margin-left: 75px;">
        <!-- Konten Card Body Kiri -->
        <div class="form-wrapper mt-4">
        <div class="form-container">
        <div class="card">
            <div class="card-body RDZOverflow RDZMobilePaddingLR0">
            <div class="form berat_woven">
                <form action="#" method="post" role="form">
                    <div class="row">
                        <div class="form-group col-md-3 d-flex justify-content-end">
                            <span class="aligned-text">Tanggal:</span>
                        </div>
                        <div class="form-group col-md-9 mt-3 mt-md-0">
                            <input type="date" class="form-control" name="Tanggal" id="Tanggal" placeholder="Tanggal" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-3 d-flex justify-content-end">
                            <span class="aligned-text">Shift:</span>
                        </div>
                        <div class="form-group col-md-9 mt-3 mt-md-0">
                            <input type="text" class="form-control" name="Shift" id="Shift" placeholder="Shift" required>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="form-group col-md-3 d-flex justify-content-end">
                            <span class="aligned-text">Type:</span>
                        </div>
                        <div class="form-group col-md-9 mt-3 mt-md-0">
                            <textarea class="form-control" name="type" rows="3" placeholder="Type" required></textarea>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-3 d-flex justify-content-end">
                            <span class="aligned-text">Jenis:</span>
                        </div>
                        <div class="form-group col-md-9 mt-3 mt-md-0">
                            <input type="text" class="form-control" name="Jenis" id="Jenis" placeholder="Jenis" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-3 d-flex justify-content-end">
                            <span class="aligned-text">Satuan:</span>
                        </div>
                        <div class="form-group col-md-9 mt-3 mt-md-0">
                            <input type="text" class="form-control" name="Satuan" id="Satuan" placeholder="Satuan" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-3 d-flex justify-content-end">
                            <span class="aligned-text">Lembar:</span>
                        </div>
                        <div class="form-group col-md-9 mt-3 mt-md-0">
                            <input type="text" class="form-control" name="Lembar" id="Lembar" placeholder="Lembar" required>
                        </div>
                    </div>


                    <div class="card-body-container" style="display: flex; flex-wrap: nowrap;">
                        <div class="card-body" style="flex: 1; margin-left: 10px;">
                            <!-- Konten Card Body Kanan-->
                            <div class="card">
                            <div class="card-header">Jumlah Barcode</div>
                            <h1 class="form-group">-</h1>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
        </div>
        <div class="card-body" style="flex: 1; margin-left: 10px;">
        <!-- Konten Card Body Kanan-->
        <div class="form-wrapper mt-4">
        <div class="form-container">
        <div class="card">
            <div class="card-body RDZOverflow RDZMobilePaddingLR0">
            <div class="form berat_woven">
                <form action="#" method="post" role="form">
                    <div class="row">
                        <div class="form-group col-md-3 d-flex justify-content-end">
                            <span class="aligned-text">Primer:</span>
                        </div>
                        <div class="form-group col-md-9 mt-3 mt-md-0">
                            <input type="text" class="form-control" name="Primer" id="Primer" placeholder="Primer">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-3 d-flex justify-content-end">
                            <span class="aligned-text">Sekunder:</span>
                        </div>
                        <div class="form-group col-md-9 mt-3 mt-md-0">
                            <input type="text" class="form-control" name="Sekunder" id="Primer" placeholder="Sekunder">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-3 d-flex justify-content-end">
                            <span class="aligned-text">Tertier:</span>
                        </div>
                        <div class="form-group col-md-9 mt-3 mt-md-0">
                            <input type="text" class="form-control" name="Tertier" id="Tertier" placeholder="Tertier">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col- row justify-content-md-center">
                            <div class="text-center col-md-auto"><button type="submit">Pilih Shift</button></div>
                            <div class="text-center col-md-auto"><button type="submit">Divisi</button></div>
                            <div class="text-center col-md-auto"><button type="submit">Isi Jumlah Barang</button></div>
                            <div class="text-center col-md-auto"><button type="submit">Timbang</button></div>
                        </div>
                        <div class="col- row justify-content-md-center mt-4">
                            <div class="text-center col-md-auto"><button type="submit">Print Barcode</button></div>
                            <div class="text-center col-md-auto"><button type="submit">ACC Barcode</button></div>
                            <div class="text-center col-md-auto"><button type="submit">Print Ulang</button></div>
                            <div class="text-center col-md-auto"><button type="submit">Keluar</button></div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

        <div class="scrollable-container">
            <!-- Add content here -->
        </div>
    </div>

    <script>
        // JavaScript for NavBar
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
