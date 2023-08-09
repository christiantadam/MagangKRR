@extends('layouts.appBarcode')
@section('content')

<link href="{{ asset('css/Barcode/KnvGdng.css') }}" rel="stylesheet">
<h2>Konversi Barcode</h2>

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
                        <span class="aligned-text">Barcode:</span>
                    </div>
                    <div class="form-group col-md-9 mt-3 mt-md-0">
                        <textarea class="form-control" name="type" rows="3" placeholder="Type" required></textarea>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-3 d-flex justify-content-end">
                        <span class="aligned-text">Type Asal:</span>
                    </div>
                    <div class="form-group col-md-9 mt-3 mt-md-0">
                        <input type="text" class="form-control" name="Jenis" id="Jenis" placeholder="Jenis" required>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-3 d-flex justify-content-end">
                        <span class="aligned-text">Type Tujuan:</span>
                    </div>
                    <div class="form-group col-md-9 mt-3 mt-md-0">
                        <input type="text" class="form-control" name="Satuan" id="Satuan" placeholder="Satuan" required>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-3 d-flex justify-content-end">
                        <span class="aligned-text">Dibisi:</span>
                    </div>
                    <div class="form-group col-md-9 mt-3 mt-md-0">
                        <input type="text" class="form-control" name="Lembar" id="Lembar" placeholder="Lembar" required>
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
                        <div class="text-center col-md-auto"><button type="submit">Scan Barcode</button></div>
                        <div class="text-center col-md-auto"><button type="submit">Pilih Type</button></div>
                        <div class="text-center col-md-auto"><button type="submit">Timbang</button></div>
                    </div>
                    <div class="col- row justify-content-md-center mt-4">
                        <div class="text-center col-md-auto"><button type="submit">Print Barcode</button></div>
                        <div class="text-center col-md-auto"><button type="submit">ACC Barcode</button></div>
                        <div class="text-center col-md-auto"><button type="submit">Print Ulang</button></div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>

@endsection