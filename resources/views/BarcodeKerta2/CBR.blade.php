@extends('layouts.appABM')
@section('content')
    <title style="font-size: 20px">@yield('title', 'Cetak Barcode Rusak')</title>
    <script type="text/javascript" src="{{ asset('js/BarcodeKerta2/CBR.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/JsBarcode.all.min.js') }}"></script>
    <style>
        @media print {
            .card {
                display: none;
            }

            body {
                transform: rotate(90deg);
                page: landscape;
            }
        }

        #barcode {
            width: 1610px;
            /* or specify a specific width in pixels or other units */
            height: 800px;
            /* or specify a specific height */
            margin-top: -150px;
            margin-left: 250px;
        }

        #barcode-label {
            text-align: center;
            /* Untuk penempatan horizontal di tengah */
            display: flex;
            font-size: 60px;
            margin-left: 300px;
            margin-top: -200px;
            font-weight: bold;
            font-family: Arial, Helvetica, sans-serif
                /* Untuk penempatan vertikal di tengah */
        }

        .barcode-label-container {
            display: flex;
            align-items: center;
            font-weight: bold;
            font-family: Arial, Helvetica, sans-serif
                /* Menengahkan vertikal jika perlu */
        }

        .barcode-label-container>div {
            margin: 0 10px;
            /* Atur ruang horizontal antara elemen-elemen div */
        }

        #barcode-label1,
        #barcode-label2,
        #barcode-label3,
        #barcode-label4,
        #barcode-label5,
        #barcode-label6 {
            text-align: center;
        }
    </style>

    <body onload="Greeting()">
        <div id="app">
            <div class="form-wrapper mt-4">
                <div class="form-container">
                    <div class="card" id="card">
                        <div class="card-header">Cetak Barcode Rusak</div>
                        <div class="card-body RDZOverflow RDZMobilePaddingLR0">
                            <div class="form berat_woven">
                                <form action="#" method="post" role="form">
                                    <div class="row">
                                        <div class="form-group col-md-3 d-flex justify-content-end">
                                            <span class="aligned-text">Masukan Nomor Barcode:</span>
                                        </div>
                                        <div class="form-group col-md-9 mt-3 mt-md-0">
                                            <input type="text" class="form-control" name="Masukan_nomor_barcode"
                                                id="Masukan_nomor_barcode" placeholder="Masukan Nomor Barcode">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col- row justify-content-md-center">
                                            <div class="text-center col-md-auto">
                                                <button type="button" style="width: 100px" id="ButtonPrint">Print</button>
                                            </div>
                                            <div class="text-center col-md-auto">
                                                <button type="button" style="width: 100px">Keluar</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <h6 class="text-center mt-3">Lakukan Print Ulang Jika Barcode Rusak !!!</h6>
                                <h6 class="text-center mt-3">Lakukan Refresh Saat Mau Memasukan Barcode Lainnya</h6>
                            </div>
                        </div>
                    </div>
                    <div class="row" id="printSection" style="margin-top: -200px">
                        <div class="col- row justify-content-md-center">
                            <div id="barcode-container">
                                <svg class="text-center" id="barcode"></svg>
                                <div id="barcode-label"></div>
                                <div class="barcode-label-container">
                                    <div id="barcode-label1"
                                        style="font-size: 60px; margin-left: 300px;">
                                    </div>
                                    <div id="barcode-label2" style="font-size: 60px;"></div>

                                    <div class="barcode-label-container">
                                        <div id="barcode-label3" style="font-size: 60px;margin-left: 250px"> </div>
                                        <div id="barcode-label4" style="font-size: 60px;"> </div>

                                        <div class="barcode-label-container">
                                            <div id="barcode-label5" style="font-size: 60px;margin-left: 250px"></div>
                                            <div id="barcode-label6" style="font-size: 60px;"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
@endsection
