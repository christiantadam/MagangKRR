@extends('layouts.appABM')
@section('content')
    <script type="text/javascript" src="{{ asset('js/BarcodeKerta2/CekBarcode.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <body onload="Greeting()">
        <div id="app">
            <div class="form-wrapper mt-4">
                <div class="form-container">
                    <div class="card">
                        <div class="card-header">Cek Barcode</div>
                        <div class="card-body RDZOverflow RDZMobilePaddingLR0">
                            <div class="form berat_woven">
                                <form action="#" method="post" role="form">
                                    <div class="row">
                                        <div class="form-group col-md-3 d-flex justify-content-end">
                                            <span class="aligned-text">Item Number / Kode Barang:</span>
                                        </div>
                                        <div class="form-group col-md-9 mt-3 mt-md-0">
                                            <input type="text" class="form-control" name="Kode_barang" id="txtbarcode"
                                                placeholder="Kode Barang" required>
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                        <div class="col- row justify-content-md-center">
                                            <div class="text-center col-md-auto"><button style="width: 100px"
                                                    type="button">Keluar</button>
                                            </div>
                                            <div class="text-center col-md-auto"><button id="CekBarcode"
                                                    style="width: 100px" type="button">Cek</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <main class="py-4">
                    @yield('content')
                </main>
            </div>
    </body>
@endsection
