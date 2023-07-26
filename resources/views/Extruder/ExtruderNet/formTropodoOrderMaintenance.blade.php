@extends('layouts.appExtruder')
@section('content')
    <div id="tropodo_order_maintenance" class="form" data-aos="fade-up">
        <div class="row mt-3">
            <div class="col-lg-2 aligned-text">Tanggal:</div>
            <div class="col-lg-3">
                <input type="date" name="tanggal" id="tanggal" class="form-control">
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-lg-2 aligned-text">No. Order:</div>
            <div class="col-lg-3">
                <input type="text" name="no_order" id="no_order" class="form-control">
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-lg-2 aligned-text">Identifikasi Order:</div>
            <div class="col-lg-8">
                <input type="text" name="identifikasi" id="identifikasi" class="form-control">
            </div>
        </div>

        <table class="table table-hover mt-3" style="table-layout: fixed;">
            <colgroup>
                <col style="width: 300px;">
                <col style="width: 125px;">
                <col style="width: 125px;">
                <col style="width: 125px;">
                <col style="width: 125px;">
                <col style="width: 125px;">
                <col style="width: 125px;">
            </colgroup>
            <thead>
                <tr>
                    <th>Nama Type</th>
                    <th class="text-center">Qty Primer</th>
                    <th class="text-center">Sat Primer</th>
                    <th class="text-center">Qty Sekunder</th>
                    <th class="text-center">Sat Sekunder</th>
                    <th class="text-center">Qty Tertier</th>
                    <th class="text-center">Sat Tertier</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Data 1</td>
                    <td class="text-center">10</td>
                    <td class="text-center">kg</td>
                    <td class="text-center">5</td>
                    <td class="text-center">kg</td>
                    <td class="text-center">3</td>
                    <td class="text-center">kg</td>
                </tr>
                <tr>
                    <td>Data 2</td>
                    <td class="text-center">8</td>
                    <td class="text-center">kg</td>
                    <td class="text-center">4</td>
                    <td class="text-center">kg</td>
                    <td class="text-center">2</td>
                    <td class="text-center">kg</td>
                </tr>
                <tr>
                    <td>Data 3</td>
                    <td class="text-center">15</td>
                    <td class="text-center">kg</td>
                    <td class="text-center">6</td>
                    <td class="text-center">kg</td>
                    <td class="text-center">1</td>
                    <td class="text-center">kg</td>
                </tr>
            </tbody>
        </table>

        <div class="card">
            <div class="card-header">Detail Order</div>

            <div class="card-body">
                <div class="form-group mt-3">
                    <label for="select_benang">Type Benang</label>
                    <div class="input-group">
                        <select name="select_benang" id="select_benang" class="form-select">
                            <option selected disabled>-- Pilih Type Benang --</option>
                            <option value="loading" style="display: none" disabled>Loading...</option>
                            @foreach ($formData['listBenang'] as $d)
                                <option value="{{ $d->SatPrimer . ',' . $d->SatSekunder . ',' . $d->SatTritier }}">
                                    {{ $d->NamaType }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group mt-3" style="width: 25vw;">
                    <label for="primer">Primer</label>
                    <div class="input-group">
                        <input type="number" class="form-control" id="primer1" placeholder="0">
                        <input type="text" class="form-control" id="primer2" style="width: 12.5vw;">
                    </div>
                </div>

                <div class="form-group mt-3" style="width: 25vw;">
                    <label for="sekunder">Sekunder</label>
                    <div class="input-group">
                        <input type="number" class="form-control" id="sekunder1" placeholder="0">
                        <input type="text" class="form-control" id="sekunder2" style="width: 12.5vw;">
                    </div>
                </div>

                <div class="form-group mt-3" style="width: 25vw;">
                    <label for="tertier">Tertier</label>
                    <div class="input-group">
                        <input type="number" class="form-control" id="tertier1" placeholder="0">
                        <input type="text" class="form-control" id="tertier2" style="width: 12.5vw;">
                    </div>
                </div>

                <button type="submit" class="btn btn-outline-info float-end">Tambah<br>Detail</button>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-5 text-center">
                <button type="button" class="btn btn-outline-primary" id="btn_baru">Tambah</button>
            </div>
            <div class="col-md-2"></div>
            <div class="col-md-5 text-center">
                <button type="button" class="btn btn-outline-success" id="btn_proses">Proses</button>
                <button type="button" class="btn btn-outline-danger" id="btn_keluar">Keluar</button>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/Extruder/tropodoOrderMaintenance.js') }}"></script>
@endsection
