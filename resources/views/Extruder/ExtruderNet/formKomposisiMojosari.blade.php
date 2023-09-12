@extends('layouts.appExtruder')
@section('content')
    <input type="text" id="form_name" style="display: none" value="{{ $formName }}">

    <div id="form_komposisi_mojosari" class="form" data-aos="fade-up">
        <form>

            <div class="row mt-3">
                <div class="col-md-7">
                    <label for="select_id_komposisi">Id Komposisi:</label>
                    <select name="select_id_komposisi" id="select_id_komposisi" class="form-select">
                        <option selected disabled>-- Pilih Id Komposisi --</option>
                        @foreach ($formData['listKomposisi'] as $d)
                            <option value="{{ $d->IdKomposisi }}">{{ $d->IdKomposisi . ' | ' . $d->NamaKomposisi }}</option>
                        @endforeach
                    </select>

                    <div class="mt-3">
                        <label for="select_mesin">Mesin:</label>
                        <select name="select_mesin" id="select_mesin" class="form-select" disabled>
                            <option selected disabled>-- Pilih Mesin --</option>
                            @foreach ($formData['listMesin'] as $d)
                                <option value="{{ $d->IdMesin }}">{{ $d->IdMesin . ' | ' . $d->TypeMesin }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mt-3">
                        <label for="select_hp">Hasil Produksi:</label>
                        <select name="select_hp" id="select_hp" class="form-select" disabled>
                            <option selected disabled>-- Pilih Hasil Produksi --</option>
                        </select>
                    </div>

                    <div class="mt-3">
                        <label for="select_hp_ng">Hasil Produksi NG:</label>
                        <select name="select_hp_ng" id="select_hp_ng" class="form-select" disabled>
                            <option selected disabled>-- Pilih Hasil Produksi NG --</option>
                        </select>
                    </div>

                    <div class="mt-3">
                        <label for="select_afalan">Afalan:</label>
                        <select name="select_afalan" id="select_afalan" class="form-select" disabled>
                            <option selected disabled>-- Pilih Afalan --</option>
                            @foreach ($formData['listAfalan'] as $d)
                                <option value="{{ $d->KodeBarang }}">{{ $d->KodeBarang . ' | ' . $d->NamaType }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-5">
                    <div id="row1" class="row" style="height: 20%;">
                        <div id="dawdwqwqd" class="hidden">
                            <div class="col-md-4 row d-flex align-items-center">
                                <div class="form-check" style="display: flex; justify-content: center;">
                                    <input class="form-check-input" type="radio" name="radio_status" id="radio_masuk">
                                    <label class="form-check-label" for="radio_masuk" style="padding-left: 7.5px">
                                        Komposisi
                                    </label>
                                </div>
                            </div>

                            <div class="col-md-4 row d-flex align-items-center">
                                <div class="form-check" style="display: flex; justify-content: center;">
                                    <input class="form-check-input" type="radio" name="radio_status" id="radio_masuk">
                                    <label class="form-check-label" for="radio_masuk" style="padding-left: 7.5px">
                                        Hasil Produksi
                                    </label>
                                </div>
                            </div>

                            <div class="col-md-4 row d-flex align-items-center">
                                <div class="form-check" style="display: flex; justify-content: center;">
                                    <input class="form-check-input" type="radio" name="radio_status" id="radio_masuk">
                                    <label class="form-check-label" for="radio_masuk" style="padding-left: 7.5px">
                                        Afalan
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="row2" class="row" style="height: 80%;">
                        <div class="col-md-4 d-flex align-items-end">
                            <button type="button" class="btn btn-outline-secondary" style="margin-bottom: 7.5px">Tambah
                                Afalan</button>
                        </div>
                        <div class="col-md-8">
                            <table id="table_afalan" class="hover cell-border">
                                <thead>
                                    <tr>
                                        <th>Kode Barang</th>
                                        <th>Nama Type</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>

            <div class="card mt-5">
                <div class="card-body">
                    <table id="table_komposisi" class="hover cell-border">
                        <thead>
                            <tr>
                                <th>Nama Type</th>
                                <th>Qty. Primer</th>
                                <th>Sat. Primer</th>
                                <th>Qty. Sekunder</th>
                                <th>Sat. Sekunder</th>
                                <th>Qty. Tritier</th>
                                <th>Sat. Tritier</th>
                                <th>Persentase</th>
                                <th>Id Objek</th>
                                <th>Nama Objek</th>
                                <th>Id Kelut.</th>
                                <th>Nama Kelut.</th>
                                <th>Id Kelompok</th>
                                <th>Kelompok</th>
                                <th>Id Subkel.</th>
                                <th>Subkel.</th>
                                <th>Kode Barang</th>
                                <th>Cadangan</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>

                    <div class="row mt-3">
                        <div class="col-md-7 form-group">
                            <label for="select_objek">Objek:</label>
                            <select name="select_objek" id="select_objek" class="form-select" disabled>
                                <option selected disabled>-- Pilih Objek --</option>
                            </select>
                        </div>

                        <div class="col-md-4 form-group">
                            <label for="objek">Primer:</label>
                            <div class="input-group">
                                <input type="number" class="form-control" name="primer1" value="0">
                                <input type="text" class="form-control" name="primer2">
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-7 form-group">
                            <label for="select_kelompok_utama">Kelompok Utama:</label>
                            <select name="select_kelompok_utama" id="select_kelompok_utama" class="form-select" disabled>
                                <option selected disabled>-- Pilih Kelompok Utama --</option>
                            </select>
                        </div>

                        <div class="col-md-4 form-group">
                            <label for="objek">Sekunder:</label>
                            <div class="input-group">
                                <input type="number" class="form-control" name="sekunder1" value="0">
                                <input type="text" class="form-control" name="sekunder2">
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-7 form-group">
                            <label for="select_kelompok">Kelompok:</label>
                            <select name="select_kelompok" id="select_kelompok" class="form-select" disabled>
                                <option selected disabled>-- Pilih Kelompok --</option>
                                <option value="loading" style="display: none" disabled>Loading...</option>
                                <option value="temp">haloDunia</option>
                            </select>
                        </div>

                        <div class="col-md-4 form-group">
                            <label for="objek">Tritier:</label>
                            <div class="input-group">
                                <input type="number" class="form-control" name="Tritier1" value="0">
                                <input type="text" class="form-control" name="Tritier2">
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-7 form-group">
                            <label for="select_sub_kelompok">Sub-kelompok:</label>
                            <select name="select_sub_kelompok" id="select_sub_kelompok" class="form-select" disabled>
                                <option selected disabled>-- Pilih Sub-kelompok --</option>
                                <option value="loading" style="display: none" disabled>Loading...</option>
                                <option value="temp">haloDunia</option>
                            </select>
                        </div>

                        <div class="col-md-2 form-group">
                            <label for="objek">Presentase:</label>
                            <div class="input-group">
                                <input type="number" class="form-control" name="presentase" value="0">
                                <span class="input-group-text">%</span>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-7 form-group">
                            <label for="select_type">Type:</label>
                            <select name="select_type" id="select_type" class="form-select" disabled>
                                <option selected disabled>-- Pilih Type --</option>
                            </select>
                        </div>

                        <div class="col-md-4 form-group">
                            <label for="objek">Kode Barang:</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="kode_barang">
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-3" style="padding-left: 25px;">
                            BB: Bahan Baku<br>
                            BP: Bahan Pembantu
                        </div>
                        <div class="col-md-3" style="padding-left: 25px;">
                            HP: Hasil Produksi<br>
                            AF: Afalan
                        </div>
                        <div class="col-md-1"></div>

                        <div class="col-md-2 form-group">
                            <label for="objek">Cadangan:</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="cadangan" value="0">
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-12 d-flex justify-content-center">
                            <button type="button" style="margin-right: 2em;">Tambah<br>Cadangan</button>
                            <button type="button" style="margin-right: 2em;">Tambah<br>Bahan</button>
                            <button type="button" style="margin-right: 2em;">Koreksi</button>
                            <button type="button">Hapus</button>
                        </div>
                    </div>

                </div>
            </div>

        </form>
    </div>

    {{-- <script src="{{ asset('js/Extruder/komposisiMojosari.js') }}"></script> --}}
@endsection
