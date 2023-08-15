@extends('layouts.appABM')
@section('content')
<script type="text/javascript" src="{{ asset('js/BarcodeKerta2/CBR.js') }}"></script>

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
                                        <span class="aligned-text">Masukan Nomor Barcode:</span>
                                    </div>
                                    <div class="form-group col-md-9 mt-3 mt-md-0">
                                        <input type="text" class="form-control" name="Masukan_nomor_barcode"
                                            id="Masukan_nomor_barcode" placeholder="Masukan Nomor Barcode" required>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col- row justify-content-md-center">
                                        <div class="text-center col-md-auto">
                                            <button type="button" style="width: 100px" onclick="window.print()">Print</button>
                                        </div>
                                        <div class="text-center col-md-auto">
                                            <button type="button" style="width: 100px">Keluar</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <h6 class="text-center mt-3">Lakukan Print Ulang Jika Barcode Rusak !!!</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
@endsection
