@extends('layouts.appABM')
@section('content')
<script type="text/javascript" src="{{ asset('js/BarcodeRollWoven/CBR2.js') }}"></script>
<body onload="Greeting()">
    <div id="app">
        <div class="form-wrapper mt-4">
            <div class="form-container">
                <div class="card">
                    <div class="card-header">Cetak Barcode Rusak</div>
                    <div class="card-body RDZOverflow RDZMobilePaddingLR0">
                        <div class="form berat_woven">
                            <form action="#" method="post" role="form">
                                <div class="row">
                                    <div class="form-group col-md-3 d-flex justify-content-end">
                                        <span class="aligned-text">Masukan No Barcode: </span>
                                    </div>
                                    <div class="form-group col-md-7 mt-3 mt-md-0">
                                        <input type="text" class="form-control" name="Barcode" id="Barcode" placeholder="Barcode">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-3 d-flex justify-content-end">
                                        <span class="aligned-text">No Roll: </span>
                                    </div>
                                    <div class="form-group col-md-2 mt-3 mt-md-0">
                                        <input type="text" class="form-control" name="Roll" id="Roll" placeholder="Roll">
                                    </div>
                                    <!-- Move the "Print" and "Keluar" buttons below -->
                                    <div class="col-md-2 mt-3 mt-md-0">
                                        <button type="button" class="btn btn-primary" style="width: 120px; height: 60px; padding: 5px 10px;" id="printButton">Print</button>
                                    </div>
                                    <div class="col-md-2 mt-3 mt-md-0">
                                        <button type="button" class="btn btn-secondary" style="width: 120px; height: 60px; padding: 5px 10px;">Keluar</button>
                                    </div>
                                </div>

                                <!-- Input field for "Afalan" remains in its original position -->
                                <div class="row">
                                    <div class="form-group col-md-3 d-flex justify-content-end">
                                        <span class="aligned-text">Afalan: </span>
                                    </div>
                                    <div class="form-group col-md-2 mt-3 mt-md-0">
                                        <input type="text" class="form-control" name="Afalan" id="Afalan" placeholder="Afalan">
                                    </div>
                                    <!-- Keep the <h6> element below the buttons -->
                                <h6 class="text-center mt-3 ml-4">Lakukan Print Ulang Jika Barcode Rusak !!!</h6>
                                </div>
                            </form>
                        </div>
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
