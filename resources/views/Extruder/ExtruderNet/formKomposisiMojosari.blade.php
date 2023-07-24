@extends('layouts.appExtruder')
@section('content')
    <div id="komposisi_mojosari" class="form" data-aos="fade-up">
        <form>

            <div class="row mt-3">
                <div class="col-md-7 row">
                    <div class="row mt-3">
                        <div class="col-md-9 form-group">
                            <label for="select_id_komposisi">Id Komposisi</label>
                            <select name="select_id_komposisi" id="select_id_komposisi" class="form-select">
                                <option selected disabled>-- Pilih Id Komposisi --</option>
                                <option value="loading" style="display: none" disabled>Loading...</option>
                                @foreach ($formData['listIdKomposisi'] as $d)
                                    <option value="{{ $d->IdKomposisi }}">{{ $d->NamaKomposisi }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-3">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault"
                                    id="flexRadioDefault1">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Komposisi
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault"
                                    id="flexRadioDefault2" checked>
                                <label class="form-check-label" for="flexRadioDefault2">
                                    Hasil Produksi
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault"
                                    id="flexRadioDefault2" checked>
                                <label class="form-check-label" for="flexRadioDefault2">
                                    Afalan
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-12 form-group">
                            <label for="select_mesin">Mesin</label>
                            <select name="select_mesin" id="select_mesin" class="form-select" disabled>
                                <option selected disabled>-- Pilih Mesin --</option>
                                <option value="loading" style="display: none" disabled>Loading...</option>
                                <option value="temp">haloDunia</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-12 form-group">
                            <label for="select_hp">Hasil Produksi</label>
                            <select name="select_hp" id="select_hp" class="form-select" disabled>
                                <option selected disabled>-- Pilih Hasil Produksi --</option>
                                <option value="loading" style="display: none" disabled>Loading...</option>
                                <option value="temp">haloDunia</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-12 form-group">
                            <label for="select_hp_ng">Hasil Produksi NG</label>
                            <select name="select_hp_ng" id="select_hp_ng" class="form-select" disabled>
                                <option selected disabled>-- Pilih Hasil Produksi NG --</option>
                                <option value="loading" style="display: none" disabled>Loading...</option>
                                <option value="temp">haloDunia</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-12 form-group">
                            <label for="select_afalan">Afalan</label>
                            <select name="select_afalan" id="select_afalan" class="form-select" disabled>
                                <option selected disabled>-- Pilih Afalan --</option>
                                <option value="loading" style="display: none" disabled>Loading...</option>
                                <option value="temp">haloDunia</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="col-md-5 d-flex align-items-end row">
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-outline-secondary" style="margin-bottom: 15px">Tambah
                            Afalan</button>
                    </div>
                    <div class="col-md-8">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Kode Barang</th>
                                    <th scope="col">Nama Type</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>001</td>
                                    <td>Type A</td>
                                </tr>
                                <tr>
                                    <td>002</td>
                                    <td>Type B</td>
                                </tr>
                                <tr>
                                    <td>003</td>
                                    <td>Type C</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="card mt-5">
                <div class="card-body">
                    <div style="width: 100%; overflow-x: auto;">
                        <table class="table" style="table-layout: fixed;">
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
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-7 form-group">
                            <label for="select_objek">Objek</label>
                            <select name="select_objek" id="select_objek" class="form-select" disabled>
                                <option selected disabled>-- Pilih Objek --</option>
                                <option value="loading" style="display: none" disabled>Loading...</option>
                                <option value="temp">haloDunia</option>
                            </select>
                        </div>

                        <div class="col-md-4 form-group">
                            <label for="objek">Primer</label>
                            <div class="input-group">
                                <input type="number" class="form-control" name="primer1" value="0">
                                <input type="text" class="form-control" name="primer2">
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-7 form-group">
                            <label for="select_kelompok_utama">Kelompok Utama</label>
                            <select name="select_kelompok_utama" id="select_kelompok_utama" class="form-select" disabled>
                                <option selected disabled>-- Pilih Kelompok Utama --</option>
                                <option value="loading" style="display: none" disabled>Loading...</option>
                                <option value="temp">haloDunia</option>
                            </select>
                        </div>

                        <div class="col-md-4 form-group">
                            <label for="objek">Sekunder</label>
                            <div class="input-group">
                                <input type="number" class="form-control" name="sekunder1" value="0">
                                <input type="text" class="form-control" name="sekunder2">
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-7 form-group">
                            <label for="select_kelompok">Kelompok</label>
                            <select name="select_kelompok" id="select_kelompok" class="form-select" disabled>
                                <option selected disabled>-- Pilih Kelompok --</option>
                                <option value="loading" style="display: none" disabled>Loading...</option>
                                <option value="temp">haloDunia</option>
                            </select>
                        </div>

                        <div class="col-md-4 form-group">
                            <label for="objek">Tertier</label>
                            <div class="input-group">
                                <input type="number" class="form-control" name="tertier1" value="0">
                                <input type="text" class="form-control" name="tertier2">
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-7 form-group">
                            <label for="select_sub_kelompok">Sub-kelompok</label>
                            <select name="select_sub_kelompok" id="select_sub_kelompok" class="form-select" disabled>
                                <option selected disabled>-- Pilih Sub-kelompok --</option>
                                <option value="loading" style="display: none" disabled>Loading...</option>
                                <option value="temp">haloDunia</option>
                            </select>
                        </div>

                        <div class="col-md-2 form-group">
                            <label for="objek">Presentase</label>
                            <div class="input-group">
                                <input type="number" class="form-control" name="presentase" value="0">
                                <span class="input-group-text">%</span>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-7 form-group">
                            <label for="select_type">Type</label>
                            <select name="select_type" id="select_type" class="form-select" disabled>
                                <option selected disabled>-- Pilih Type --</option>
                                <option value="loading" style="display: none" disabled>Loading...</option>
                                <option value="temp">haloDunia</option>
                            </select>
                        </div>

                        <div class="col-md-4 form-group">
                            <label for="objek">Kode Barang</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="kode_barang">
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-7" style="padding-left: 25px;">
                            BB: Bahan Baku<br>
                            BP: Bahan Pembantu
                        </div>

                        <div class="col-md-2 form-group">
                            <label for="objek">Cadangan</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="cadangan" value="0">
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-12 d-flex justify-content-center">
                            <button type="submit" style="margin-right: 2em;">Tambah<br>Cadangan</button>
                            <button type="submit" style="margin-right: 2em;">Tambah<br>Bahan</button>
                            <button type="submit" style="margin-right: 2em;">Koreksi</button>
                            <button type="submit">Hapus</button>
                        </div>
                    </div>

                </div>
            </div>

        </form>
    </div>

    <script src="{{ asset('js/Extruder/komposisiMojosari.js') }}"></script>
@endsection
