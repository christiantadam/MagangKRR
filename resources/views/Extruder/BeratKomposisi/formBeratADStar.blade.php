@extends('layouts.appExtruder')
@section('content')

<div id="berat_adstar" class="form" data-aos="fade-up">
    <form action="#" method="post" role="form">

        <div class="row mt-3">
            <div class="form-group col-md-2 d-flex justify-content-end">
                <span class="aligned-text">Kode Barang:</span>
            </div>
            <div class="form-group col-md-6 mt-3 mt-md-0">
                <input type="text" class="form-control" name="kode_barang" placeholder="Kode Barang" required>
            </div>
        </div>

        <div class="row mt-3">
            <div class="form-group col-md-2 d-flex justify-content-end">
                <span class="aligned-text">Type:</span>
            </div>
            <div class="form-group col-md-10 mt-3 mt-md-0">
                <textarea class="form-control" name="berat_type" rows="3" placeholder="Type" required></textarea>
            </div>
        </div>

        <div class="row mt-3">
            <div class="form-group col-md-2 d-flex justify-content-end">
                <span class="aligned-text">Berat Karung:</span>
            </div>
            <div class="form-group col-md-6 mt-3 mt-md-0">
                <input type="number" class="form-control" name="berat_karung" placeholder="Berat Karung" required>
            </div>
        </div>

        <div class="row mt-3">
            <div class="form-group col-md-2 d-flex justify-content-end">
                <span class="aligned-text">Berat Lami:</span>
            </div>
            <div class="form-group col-md-6 mt-3 mt-md-0">
                <input type="number" class="form-control" name="berat_lami" placeholder="Berat Lami" required>
            </div>
        </div>

        <div class="row mt-3">
            <div class="form-group col-md-2 d-flex justify-content-end">
                <span class="aligned-text">Berat Kertas:</span>
            </div>
            <div class="form-group col-md-6 mt-3 mt-md-0">
                <input type="number" class="form-control" name="berat_kertas" placeholder="Berat Kertas" required>
            </div>
        </div>

        <div class="row mt-3">
            <div class="form-group col-md-2 d-flex justify-content-end">
                <span class="aligned-text">Berat Standar Total:</span>
            </div>
            <div class="form-group col-md-6 mt-3 mt-md-0">
                <div class="input-group">
                    <input type="number" class="form-control" name="berat_total" placeholder="Berat Standar Total" required>
                    <span class="input-group-text">Gram</span>
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-9 row justify-content-md-center">
                <div class="text-center col-md-auto"><button type="submit">Koreksi</button></div>
                <div class="text-center col-md-auto"><button type="submit">Batal</button></div>
                <div class="text-center col-md-auto"><button type="submit">Proses</button></div>
            </div>

            <div class="text-center col-3"><button type="submit">Keluar</button></div>
        </div>

    </form>
</div>

@endsection