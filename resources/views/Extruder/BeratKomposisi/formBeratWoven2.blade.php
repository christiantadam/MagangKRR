@extends('layouts.appExtruder')
@section('content')
    <div id="berat_woven2" class="form" data-aos="fade-up">

        <div class="row mt-3">
            <div class="form-group col-md-2 d-flex justify-content-end">
                <span class="aligned-text">Kode Woven:</span>
            </div>
            <div class="form-group col-md-6 mt-3 mt-md-0">
                <input disabled type="text" class="form-control" id="kode_woven">
            </div>
        </div>

        <div class="row mt-3">
            <div class="form-group col-md-2 d-flex justify-content-end">
                <span class="aligned-text">Type:</span>
            </div>
            <div class="form-group col-md-9 mt-3 mt-md-0">
                <textarea disabled class="form-control" id="berat_type" rows="3"></textarea>
            </div>
        </div>

        <div class="row mt-3">
            <div class="form-group col-md-2 d-flex justify-content-end">
                <span class="aligned-text">Berat Standar 1:</span>
            </div>
            <div class="form-group col-md-6 mt-3 mt-md-0">
                <div class="input-group">
                    <input disabled type="number" class="form-control" id="berat_standar1">
                    <span class="input-group-text">Gram</span>
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="form-group col-md-2 d-flex justify-content-end">
                <span class="aligned-text">Berat Standar 2:</span>
            </div>
            <div class="form-group col-md-6 mt-3 mt-md-0">
                <div class="input-group">
                    <input disabled type="number" class="form-control" id="berat_standar2">
                    <span class="input-group-text">Gram</span>
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="form-group col-md-2 d-flex justify-content-end">
                <span class="aligned-text">Berat Karung:</span>
            </div>
            <div class="form-group col-md-6 mt-3 mt-md-0">
                <input disabled type="number" class="form-control" id="berat_karung">
            </div>
            <div class="col-md-3">
                <input disabled type="number" class="form-control hidden" id="hid_karung">
            </div>
        </div>

        <div class="row mt-3">
            <div class="form-group col-md-2 d-flex justify-content-end">
                <span class="aligned-text">Berat Inner:</span>
            </div>
            <div class="form-group col-md-6 mt-3 mt-md-0">
                <input disabled type="number" class="form-control" id="berat_inner">
            </div>
            <div class="col-md-3">
                <input disabled type="number" class="form-control hidden" id="hid_inner">
            </div>
        </div>

        <div class="row mt-3">
            <div class="form-group col-md-2 d-flex justify-content-end">
                <span class="aligned-text">Berat Lami:</span>
            </div>
            <div class="form-group col-md-6 mt-3 mt-md-0">
                <input disabled type="number" class="form-control" id="berat_lami">
            </div>
            <div class="col-md-3">
                <input disabled type="number" class="form-control hidden" id="hid_lami">
            </div>
        </div>

        <div class="row mt-3">
            <div class="form-group col-md-2 d-flex justify-content-end">
                <span class="aligned-text">Berat Lain:</span>
            </div>
            <div class="form-group col-md-6 mt-3 mt-md-0">
                <input disabled type="number" class="form-control" id="berat_lain">
            </div>
            <div class="col-md-3">
                <input disabled type="number" class="form-control hidden" id="hid_lain">
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-9 row justify-content-md-center">
                <div class="text-center col-md-auto"><button type="button" id="btn_koreksi"
                        class="btn btn-outline-warning">Koreksi</button>
                </div>
                <div class="text-center col-md-auto"><button type="button" id="btn_batal"
                        class="btn btn-outline-danger">Batal</button>
                </div>
                <div class="text-center col-md-auto"><button type="button" id="btn_proses"
                        class="btn btn-outline-success">Proses</button>
                </div>
            </div>

            <div class="text-center col-3"><button type="button" id="btn_keluar"
                    class="btn btn-outline-secondary">Keluar</button></div>
        </div>

    </div>

    <script src="{{ asset('js/Extruder/BeratKomposisi/beratWoven2.js') }}"></script>
@endsection
