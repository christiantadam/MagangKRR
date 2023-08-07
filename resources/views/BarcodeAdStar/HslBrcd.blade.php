@extends('layouts.appBarcode')
@section('content')

<link href="{{ asset('css/Barcode/HslBrcd.css') }}" rel="stylesheet">
<h2>Lihat Data Hasil Barcode</h2>
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
                        <span class="aligned-text">Divisi:</span>
                    </div>
                    <div class="form-group col-md-9 mt-3 mt-md-0">
                        <input type="text" class="form-control" name="Divisi" id="Divisi" placeholder="Divisi" required>
                        <div class="text-center col-md-auto"><button type="submit">...</button></div>
                    </div>
                </div>
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
                    </div>
                    <div class="form-group col-md-9 mt-3 mt-md-0">
                        <input type="radio" id="pilihan1" name="pilihan" value="pilihan1">Hasil Produksi
                        {{-- <label for="pilihan1">StarPark</label><br> --}}
                        <input type="radio" id="pilihan2" name="pilihan" value="pilihan2">Hasil Setengah Jadi
                        {{-- <label for="pilihan2">AdStar</label><br> --}}                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col- row justify-content-md-center mt-4">
                        <div class="text-center col-md-auto"><button type="submit">Lihat</button></div>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
</div>

@endsection
