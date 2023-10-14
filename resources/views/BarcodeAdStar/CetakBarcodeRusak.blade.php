
@extends('layouts.appBarcodeAdStar')
@section('content')

<link href="{{ asset('css/Barcode/CetakBarcodeRusak.css') }}" rel="stylesheet">
<h2>Cetak Barcode Rusak</h2>

<div class="form-wrapper mt-4">
    <div class="form-container">
    <div class="card">
        <div class="card-body RDZOverflow RDZMobilePaddingLR0">
        <div class="form berat_woven">
            <form action="#" method="post" role="form">
                <div class="row">
                    <div class="form-group col-md-3 d-flex justify-content-end">
                        <span class="aligned-text">Masukan Nomor Barcode:</span>
                    </div>
                    <div class="form-group col-md-9 mt-3 mt-md-0">
                        <input type="text" class="form-control" name="Masukan_nomor_barcode" id="Masukan_nomor_barcode" placeholder="Masukan Nomor Barcode" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col- row justify-content-md-center">
                        <div class="text-center col-md-auto"><button type="submit">Print</button></div>
                    </div>
                    <h6 class="form-group mt-3">Lakukan Print Ulang Jika Barcode Rusak !!!</h6>
                </div>
            </form>
        </div>
    </div>
</div>
</div>

<script src="{{ asset('js\Barcode.js\CetakBarcodeRusak.js')}}"></script>
@endsection
