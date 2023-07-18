@extends('layouts.appExtruder')
@section('content')
    <div id="komposisi_tropodo" class="form" data-aos="fade-up">
        <form>

            <div class="row mt-3">
                <div class="col-md-6 form-group">
                    <label for="id_komposisi">Id Komposisi:</label>
                    <select class="form-select" name="id_komposisi" id="id_komposisi">
                        <option selected disabled>-- Pilih Id Komposisi --</option>
                        @foreach ($formData['idKomposisi'] as $d)
                            <option value="{{ $d->IdKomposisi }}">{{ $d->NamaKomposisi }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-5 form-group">
                    <label for="id_komposisi">Mesin:</label>
                    <select class="form-select" name="id_komposisi" id="id_komposisi">
                        <option selected disabled>-- Pilih Mesin --</option>
                        @foreach ($formData['mesin'] as $d)
                            <option value="{{ $d->IdMesin }}">{{ $d->TypeMesin }}</option>
                        @endforeach
                    </select>
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
                            <label for="objek">Objek:</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="objek1">
                                <input type="text" class="form-control" name="objek2" style="width: 22.5em;">
                                <button type="button" class="btn btn-outline-secondary">...</button>
                            </div>
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
                            <label for="objek">Kelompok Utama:</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="utama1">
                                <input type="text" class="form-control" name="utama2" style="width: 22.5em;">
                                <button type="button" class="btn btn-outline-secondary">...</button>
                            </div>
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
                            <label for="objek">Kelompok:</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="kelompok1">
                                <input type="text" class="form-control" name="kelompok2" style="width: 22.5em;">
                                <button type="button" class="btn btn-outline-secondary">...</button>
                            </div>
                        </div>

                        <div class="col-md-4 form-group">
                            <label for="objek">Tertier:</label>
                            <div class="input-group">
                                <input type="number" class="form-control" name="tertier1" value="0">
                                <input type="text" class="form-control" name="tertier2">
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-7 form-group">
                            <label for="objek">Kelompok:</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="kelompok1">
                                <input type="text" class="form-control" name="kelompok2" style="width: 22.5em;">
                                <button type="button" class="btn btn-outline-secondary">...</button>
                            </div>
                        </div>

                        <div class="col-md-4 form-group">
                            <label for="objek">Tertier:</label>
                            <div class="input-group">
                                <input type="number" class="form-control" name="tertier1" value="0">
                                <input type="text" class="form-control" name="tertier2">
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-7 form-group">
                            <label for="objek">SubKelompok:</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="subkelompok1">
                                <input type="text" class="form-control" name="subkelompok2" style="width: 22.5em;">
                                <button type="button" class="btn btn-outline-secondary">...</button>
                            </div>
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
                            <label for="objek">Type:</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="type1">
                                <input type="text" class="form-control" name="type2" style="width: 22.5em;">
                                <button type="button" class="btn btn-outline-secondary">...</button>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-6">
                            <div class="row mt-2">
                                <div class="col-md-6">BB: Bahan Baku</div>
                                <div class="col-md-6">HP: Hasil Produksi</div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-6">BP: Bahan Pembantu</div>
                                <div class="col-md-6">AF: Afalan</div>
                            </div>
                        </div>

                        <div class="col-md-1"></div>

                        <div class="col-md-4">
                            <div class="row mt-3 justify-content-center">
                                <div class="col-md-4 text-center">
                                    <button type="submit" style="height: -webkit-fill-available; width: 125px;">Tambah
                                        Bahan</button>
                                </div>
                                <div class="col-md-4 text-center">
                                    <button type="submit"
                                        style="height: -webkit-fill-available; width: 125px;">Koreksi</button>
                                </div>
                                <div class="col-md-4 text-center">
                                    <button type="submit"
                                        style="height: -webkit-fill-available; width: 125px;">Hapus</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-6 text-center">
                    <button type="submit">Komposisi Baru</button>
                    <button type="submit">Koreksi</button>
                    <button type="submit">Hapus</button>
                </div>
                <div class="col-md-2"></div>
                <div class="col-md-4 text-center">
                    <button type="submit">Proses</button>
                    <button type="submit">Keluar</button>
                </div>
            </div>

        </form>
    </div>
@endsection
