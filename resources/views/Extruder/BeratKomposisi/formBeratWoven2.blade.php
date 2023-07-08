@extends('layouts.appExtruder')
@section('content')

<div id="berat_woven2" class="form" data-aos="fade-up">
    <form action="#" method="">

        <div class="row mt-3">
            <div class="form-group col-md-3 d-flex justify-content-end">
                <span class="aligned-text">Kode Woven:</span>
            </div>
            <div class="form-group col-md-6 mt-3 mt-md-0">
                <input type="text" class="form-control" name="kode_woven" placeholder="Kode Woven" required>
            </div>
        </div>

        <div class="row mt-3">
            <div class="form-group col-md-3 d-flex justify-content-end">
                <span class="aligned-text">Type:</span>
            </div>
            <div class="form-group col-md-9 mt-3 mt-md-0">
                <textarea class="form-control" name="berat_type" rows="3" placeholder="Type" required></textarea>
            </div>
        </div>

        <div class="row mt-3">
            <div class="form-group col-md-3 d-flex justify-content-end">
                <span class="aligned-text">Berat Standar 1:</span>
            </div>
            <div class="form-group col-md-6 mt-3 mt-md-0">
                <div class="input-group">
                    <input type="number" class="form-control" name="berat_standar1" placeholder="Berat Standar 1"
                        required>
                    <span class="input-group-text">Gram</span>
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="form-group col-md-3 d-flex justify-content-end">
                <span class="aligned-text">Berat Standar 2:</span>
            </div>
            <div class="form-group col-md-6 mt-3 mt-md-0">
                <div class="input-group">
                    <input type="number" class="form-control" name="berat_standar2" placeholder="Berat Standar 2"
                        required>
                    <span class="input-group-text">Gram</span>
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="form-group col-md-3 d-flex justify-content-end">
                <span class="aligned-text">Berat Karung:</span>
            </div>
            <div class="form-group col-md-6 mt-3 mt-md-0">
                <input type="number" class="form-control" name="berat_karung" placeholder="Berat Karung" required>
            </div>
        </div>

        <div class="row mt-3">
            <div class="form-group col-md-3 d-flex justify-content-end">
                <span class="aligned-text">Berat Inner:</span>
            </div>
            <div class="form-group col-md-6 mt-3 mt-md-0">
                <input type="number" class="form-control" name="berat_inner" placeholder="Berat Inner" required>
            </div>
        </div>

        <div class="row mt-3">
            <div class="form-group col-md-3 d-flex justify-content-end">
                <span class="aligned-text">Berat Lami:</span>
            </div>
            <div class="form-group col-md-6 mt-3 mt-md-0">
                <input type="number" class="form-control" name="berat_lami" placeholder="Berat Lami" required>
            </div>
        </div>

        <div class="row mt-3">
            <div class="form-group col-md-3 d-flex justify-content-end">
                <span class="aligned-text">Berat Lain:</span>
            </div>
            <div class="form-group col-md-6 mt-3 mt-md-0">
                <input type="number" class="form-control" name="berat_lain" placeholder="Berat Lain" required>
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